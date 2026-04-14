<?php
/**
 * ===================================================================================
 * TRA UNIFIED ENGINE v6.7 — CATEGORY-INTEGRITY FIX
 * ===================================================================================
 * CHANGES FROM v6.5:
 *
 * CHANGE 1 — BRAND-MATCH: Raw Category is now the priority
 *   • token_reverse() now accepts $rc and boosts brands whose known categories
 *     best match the raw category (30% weight added to token score).
 *   • New helper: verify_in_exact() — after T2A/T2B/T3/T4 resolves a brand+category,
 *     if that exact (norm_brand + norm_category) pair exists in the master index
 *     as a non-DELETE row, the method is upgraded from BRAND-MATCH → EXACT.
 *
 * CHANGE 2 — NONE / NEEDS-AI → HUMAN CHECK
 *   • PHP now returns method='HUMAN-CHECK' instead of 'NEEDS-AI'.
 *   • Frontend renders method cell as a clickable Google Search link:
 *       "Raw Brand + Raw Category" → opens google.com/search in new tab.
 *
 * CHANGE 3 — DELETE: same Google Search link treatment
 *   • Frontend renders DELETE method cell with Google Search link too.
 *   • check_master_for_delete() now calls verify_in_exact() on DELETE-CHECK results:
 *     if the recovered brand+category is in the exact index → method = EXACT.
 *
 * ALL OTHER TIER LOGIC UNCHANGED FROM v6.5:
 *   HC → T1 EXACT → DC DELETE-CHECK → T2A → T2B → T3 → T4 → HUMAN-CHECK
 * ===================================================================================
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('memory_limit', '1024M');
set_time_limit(600);

define('ENGINE_VERSION', 'v6.7.0');

// ── PATHS ─────────────────────────────────────────────────────────────────
$base_dir      = "/var/www/html/ztrad/tra_report";
$DICT_DIR      = "$base_dir/dictionaries";
$MASTER_FILE   = "$DICT_DIR/Raw and corrected 2019-2026.csv";
$REPORTS_CACHE = "$DICT_DIR/reports_list_v67.json";

// ── AI ────────────────────────────────────────────────────────────────────
define('ANTHROPIC_API_KEY', getenv('ANTHROPIC_API_KEY') ?: '');
define('AI_MODEL',          'claude-sonnet-4-20250514');
define('AI_BATCH',          12);

// ── CATEGORY MATCH THRESHOLD ─────────────────────────────────────────────────
// Minimum score for best_cat() to accept a known category instead of falling
// back to the raw category.
//
// Score reference (from score_cat):
//   Exact word match in dict  = 40 pts/word
//   Synonym match             = 35 pts/word
//   Partial substring match   = 20 pts/word
//   similar_text bonus        = pct * 0.15
//
// Verified pairs:
//   TYRE  → TYRES           ~48  ✓ PASS   (SYN match)
//   AC    → AIR CONDITIONERS ~38  ✓ PASS   (SYN match)
//   TV    → TELEVISIONS      ~40  ✓ PASS   (SYN match)
//   BEER  → BEER             ~55  ✓ PASS   (exact match)
//   FRIDGE→ REFRIGERATORS    ~43  ✓ PASS   (SYN match)
//   FANS  → REFRIGERATORS    ~ 5  ✗ BLOCK  → keeps FANS
//   CLOTHING→COSMETICS-PREM  ~ 4  ✗ BLOCK  → keeps CLOTHING
//   ADVERTISING→WAFERS       ~ 7  ✗ BLOCK  → keeps ADVERTISING
//   TYRE  → AIR CONDITIONERS ~ 3  ✗ BLOCK  → keeps TYRE
define('CAT_MATCH_THRESHOLD', 15.0);
define('TOKEN_BLOCKLIST', array_flip([
    'KUMAR','SINGH','SHARMA','GUPTA','LAL','RAM','DEVI','NAGAR','NATH',
    'INDIA','BHARAT','BOMBAY','MADRAS','DELHI','CALCUTTA','MUMBAI','BENGAL',
    'PUNJAB','GUJARAT','RAJASTHAN','ASSAM','KERALA','ANDHRA','MYSORE',
    'EXPRESS','MOTOR','MOTORS','PIZZA','HOTEL','RESORT','RESTAURANT',
    'AGENCY','AGENCIES','TRADERS','TRADING','ENTERPRISES','INDUSTRIES',
    'CORPORATION','COMPANY','LIMITED','PRIVATE','PUBLIC','GROUP',
    'CREATION','CREATIONS','FASHION','STYLE','DESIGNS','ARTS','STUDIO',
    'SERVICES','SOLUTIONS','SYSTEMS','TECHNOLOGIES','TECH',
    'STORE','SHOP','MART','HOUSE','WORLD','ZONE','LAND','CENTRE','CENTER',
    'NATIONAL','INTERNATIONAL','GLOBAL','SUPER','MEGA','ULTRA','GRAND',
    'PREMIUM','ROYAL','CLASSIC','IMPERIAL','ELITE','PRIME','FIRST',
    'BRAND','AGENCY','ONLINE','DIGITAL','SMART','CLOUD','WEB',
    'FRESH','NATURAL','ORGANIC','PURE','GOLD','SILVER','PLATINUM',
    'KING','QUEEN','PRINCE','STAR','SUN','MOON','SKY','BLUE','RED','GREEN',
]));

// ── HARDCODED CORRECTIONS ─────────────────────────────────────────────────
define('BRAND_CORRECTIONS', [
    'PHILIPSAC'                   => ['cb'=>'PHILIPS',      'cc'=>'AIR CONDITIONERS'],
    'PHILIPSACC'                  => ['cb'=>'PHILIPS',      'cc'=>'AIR CONDITIONERS'],
    'PHILIPSAIRCONDITIONING'      => ['cb'=>'PHILIPS',      'cc'=>'AIR CONDITIONERS'],
    'PHILLIPSAIRCONDITIONER'      => ['cb'=>'PHILIPS',      'cc'=>'AIR CONDITIONERS'],
    'HEROHONDAAUTOMOBILE'         => ['cb'=>'HERO MOTOCORP','cc'=>'MOTORCYCLES'],
    'HEROHONDABIKE'               => ['cb'=>'HERO MOTOCORP','cc'=>'MOTORCYCLES'],
    'HEROHONDATWOWHEELER'         => ['cb'=>'HERO MOTOCORP','cc'=>'MOTORCYCLES'],
    'HEROPUCHTWOWHEELER'          => ['cb'=>'HERO ELECTRIC','cc'=>'E-BIKES'],
    'RANBAXYMEDICINE'             => ['cb'=>'SUN PHARMA',   'cc'=>'PHARMACEUTICALS'],
    'RANBAXYPHARMACEUTICALS'      => ['cb'=>'SUN PHARMA',   'cc'=>'PHARMACEUTICALS'],
    'RANBAXYPHARMACOMPANY'        => ['cb'=>'SUN PHARMA',   'cc'=>'PHARMACEUTICALS'],
    'NANOCAR'                     => ['cb'=>'DELETE',        'cc'=>''],
    'TATATWOWHEELER'              => ['cb'=>'TATA',          'cc'=>'COMMERCIAL VEHICLES'],
    'TATAHAIRDYE'                 => ['cb'=>'TATA',          'cc'=>'DIVERSIFIED'],
    'ASTRALTYRES'                 => ['cb'=>'ASTRAL',        'cc'=>'PIPES'],
    // HAIERFANS removed: FANS ≠ REFRIGERATORS — threshold in best_cat() handles this correctly
    // MACCLOTHING removed: CLOTHING ≠ COSMETICS — threshold in best_cat() handles this correctly
    // MITSUBISHITYRE removed: TYRE ≠ AIR CONDITIONERS — TYRE→TYRES handled by SYN+threshold
    'HIMALAYATOOTHBRUSH'          => ['cb'=>'HIMALAYA',      'cc'=>'TOOTHPASTE - AYURVEDIC'],
    'WHIRLPOOLTV'                 => ['cb'=>'WHIRLPOOL',     'cc'=>'WASHING MACHINES'],
    'AMERICANEXPRESSNEWSPAPER'    => ['cb'=>'AMERICAN EXPRESS','cc'=>'CREDIT CARDS'],
    'SHATABDIEXPRESSTRAIN'        => ['cb'=>'DELETE',         'cc'=>''],
    'NAMOBHARATTRAIN'             => ['cb'=>'DELETE',         'cc'=>''],
    // BALAJIADVERTISING removed: ADVERTISING ≠ WAFERS — category kept as-is via threshold
    'MARIEBISCUIT'                => ['cb'=>'MARIE',         'cc'=>'BISCUITS'],
    'MARRIEBISCUIT'               => ['cb'=>'MARIE',         'cc'=>'BISCUITS'],
    'MARRIEBUISCUT'               => ['cb'=>'MARIE',         'cc'=>'BISCUITS'],
    'BINACAPASTA'                 => ['cb'=>'DELETE',         'cc'=>''],
    'BINACAPASTE'                 => ['cb'=>'DELETE',         'cc'=>''],
    'HEROHONDA'    => ['cb'=>'HERO MOTOCORP','cc'=>'MOTORCYCLES'],
    'RANBAXY'      => ['cb'=>'SUN PHARMA',   'cc'=>'PHARMACEUTICALS'],
    'HEROPUCH'     => ['cb'=>'HERO ELECTRIC','cc'=>'E-BIKES'],
    'AKSHAYKUMAR'   => ['cb'=>'DELETE','cc'=>''],
    'AMITABHBACHCHAN'=> ['cb'=>'DELETE','cc'=>''],
    'NARENDRAMODI'  => ['cb'=>'DELETE','cc'=>''],
    'NARINDERMODI'  => ['cb'=>'DELETE','cc'=>''],
    'YOGIADITYANATH'=> ['cb'=>'DELETE','cc'=>''],
    'NITISHKUMAR'   => ['cb'=>'DELETE','cc'=>''],
    'KANGNARANAUT'  => ['cb'=>'DELETE','cc'=>''],
    'ROHITSHARMA'   => ['cb'=>'DELETE','cc'=>''],
    'VIRATKOHLI'    => ['cb'=>'DELETE','cc'=>''],
    'SALMANKHAN'    => ['cb'=>'DELETE','cc'=>''],
    'BASMATI'       => ['cb'=>'DELETE','cc'=>''],
    'COCONUT'       => ['cb'=>'DELETE','cc'=>''],
    'AYURVEDA'      => ['cb'=>'DELETE','cc'=>''],
    'CHARCOAL'      => ['cb'=>'DELETE','cc'=>''],
    'ASSAM'         => ['cb'=>'DELETE','cc'=>''],
    'TRIPHALA'      => ['cb'=>'DELETE','cc'=>''],
    'MOGRA'         => ['cb'=>'DELETE','cc'=>''],
    'CHANDAN'       => ['cb'=>'DELETE','cc'=>''],
    'NAMO'          => ['cb'=>'DELETE','cc'=>''],
    'QUARTZ'        => ['cb'=>'DELETE','cc'=>''],
    'QURTAZ'        => ['cb'=>'DELETE','cc'=>''],
    'NANO'          => ['cb'=>'DELETE','cc'=>''],
    'LED'           => ['cb'=>'DELETE','cc'=>''],
    'TMT'           => ['cb'=>'DELETE','cc'=>''],
    'POP'           => ['cb'=>'DELETE','cc'=>''],
    'UNI'           => ['cb'=>'DELETE','cc'=>''],
    'OM'            => ['cb'=>'DELETE','cc'=>''],
    'RADHA'         => ['cb'=>'DELETE','cc'=>''],
    'RAJASTHAN'     => ['cb'=>'DELETE','cc'=>''],
    'BHILWARA'      => ['cb'=>'DELETE','cc'=>''],
    'MESSENGER'     => ['cb'=>'DELETE','cc'=>''],
    'MENSTRUALCUP'  => ['cb'=>'DELETE','cc'=>''],
    'POLKI'         => ['cb'=>'DELETE','cc'=>''],
    'MLTHOMAS'      => ['cb'=>'DELETE','cc'=>''],
    'AGGARWAL'      => ['cb'=>'DELETE','cc'=>''],
    'BALANKEDA'     => ['cb'=>'DELETE','cc'=>''],
    'GJCREATION'    => ['cb'=>'DELETE','cc'=>''],
    'JANKI'         => ['cb'=>'DELETE','cc'=>''],
    'JANTA'         => ['cb'=>'DELETE','cc'=>''],
    'JIYAS'         => ['cb'=>'DELETE','cc'=>''],
    'LAXMI'         => ['cb'=>'DELETE','cc'=>''],
    'LOOKS'         => ['cb'=>'DELETE','cc'=>''],
    'NAIK'          => ['cb'=>'DELETE','cc'=>''],
    'SETHI'         => ['cb'=>'DELETE','cc'=>''],
    'INAYAGROUP'    => ['cb'=>'DELETE','cc'=>''],
    'DHFL'          => ['cb'=>'DELETE','cc'=>''],
    'IFACE'         => ['cb'=>'DELETE','cc'=>''],
    'POOJA'         => ['cb'=>'DELETE','cc'=>''],
    'SAHARA'        => ['cb'=>'DELETE','cc'=>''],
    'TRIVENDRUM'    => ['cb'=>'DELETE','cc'=>''],
    'VASAN'         => ['cb'=>'DELETE','cc'=>''],
]);

// ── SYNONYM MAP ───────────────────────────────────────────────────────────
define('SYN', [
    'SHOE'=>['FOOTWEAR'],'SHOES'=>['FOOTWEAR'],'SNEAKER'=>['FOOTWEAR','ACTIVE'],
    'BOOT'=>['FOOTWEAR'],'SANDAL'=>['FOOTWEAR'],'SLIPPER'=>['FOOTWEAR'],
    'CLOTHING'=>['APPAREL','WEAR'],'CLOTHES'=>['APPAREL'],'GARMENT'=>['APPAREL'],
    'JACKET'=>['APPAREL'],'SHIRT'=>['APPAREL','TOPS'],'PANT'=>['APPAREL','BOTTOMS'],
    'JEANS'=>['APPAREL','BOTTOMS'],'DRESS'=>['APPAREL'],'SUIT'=>['APPAREL'],
    'BAG'=>['BAGS','ACCESSORIES'],'BACKPACK'=>['BAGS'],'WALLET'=>['ACCESSORIES'],
    'WATCH'=>['WATCHES'],'WATCHES'=>['WATCHES'],
    'JEWELLERY'=>['JEWELLERY'],'JEWELRY'=>['JEWELLERY'],'RING'=>['JEWELLERY'],
    'PERFUME'=>['FRAGRANCE','BEAUTY'],'FRAGRANCE'=>['BEAUTY'],
    'COSMETIC'=>['BEAUTY','COSMETICS'],'COSMETICS'=>['BEAUTY'],
    'MAKEUP'=>['BEAUTY'],'SKINCARE'=>['BEAUTY'],'CREAM'=>['BEAUTY'],
    'LIPSTICK'=>['BEAUTY','COSMETICS'],
    'SPORT'=>['ACTIVE','SPORTS'],'SPORTS'=>['ACTIVE'],'GYM'=>['ACTIVE'],
    'BIKE'=>['VEHICLE','TWO-WHEELER','MOTORCYCLES'],'SCOOTER'=>['VEHICLE','TWO-WHEELER'],
    'MOTORCYCLE'=>['VEHICLE','TWO-WHEELER','MOTORCYCLES'],
    'AUTOMOBILE'=>['VEHICLE','AUTO','COMMERCIAL VEHICLES'],
    'CAR'=>['VEHICLE','AUTOMOBILE'],'TYRE'=>['TYRES'],'TYRES'=>['TYRE'],
    'AC'=>['AIR CONDITIONER','AIR CONDITIONERS','HVAC'],
    'AIRCONDITIONING'=>['AIR CONDITIONER','AIR CONDITIONERS'],
    'TV'=>['TELEVISION','TELEVISIONS'],'TELEVISION'=>['TELEVISIONS'],
    'ELECTRONIC'=>['ELECTRONICS'],'MOBILE'=>['ELECTRONICS'],
    'PHONE'=>['ELECTRONICS','MOBILE'],'LAPTOP'=>['ELECTRONICS'],
    'MEDICINE'=>['PHARMA','HEALTHCARE','PHARMACEUTICALS'],
    'PHARMA'=>['MEDICINE','HEALTHCARE','PHARMACEUTICALS'],
    'BANKING'=>['BANK','BANKS'],'BANK'=>['BANKING'],
    'FANS'=>['APPLIANCES','ELECTRONICS'],'FAN'=>['APPLIANCES'],
    'REFRIGERATOR'=>['REFRIGERATORS','APPLIANCES'],'FRIDGE'=>['REFRIGERATORS'],
    'WASHING'=>['WASHING MACHINES','APPLIANCES'],
    'TOOTHBRUSH'=>['TOOTHPASTE','ORAL CARE'],'TOOTHPASTE'=>['ORAL CARE'],
]);

// =============================================================================
// HELPERS
// =============================================================================
function norm($s): string {
    return preg_replace('/[^A-Z0-9]/', '', strtoupper((string)($s ?? '')));
}
function clean($s): string {
    return trim(preg_replace('/\s+/', ' ', strtoupper(
        preg_replace('/[\r\n\t[:^print:]]/', ' ', (string)($s ?? ''))
    )));
}
function is_del($s): bool {
    return strtoupper(trim((string)$s)) === 'DELETE';
}

// =============================================================================
// CATEGORY SCORER  (UNCHANGED)
// =============================================================================
function score_cat(string $raw, string $dict): float {
    $rw = array_filter(explode(' ', strtoupper(trim($raw))));
    $dw = array_filter(explode(' ', strtoupper(trim($dict))));
    $ds = strtoupper($dict);
    if (!$rw || !$dw) return 0;
    $score = 0;
    foreach ($rw as $w) {
        if (in_array($w, $dw)) { $score += 40; continue; }
        $hit = false;
        foreach (SYN[$w] ?? [] as $s) {
            if (strpos($ds, $s) !== false) { $score += 35; $hit = true; break; }
        }
        if ($hit) continue;
        foreach ($dw as $d) {
            if (strlen($w) >= 3 && (strpos($d, $w) !== false || strpos($w, $d) !== false)) {
                $score += 20; break;
            }
        }
    }
    similar_text(strtoupper($raw), strtoupper($dict), $pct);
    return $score / max(count($rw), 1) + $pct * 0.15;
}

function best_cat(array $cats, string $raw_cat): string {
    if (!$cats) return clean($raw_cat);
    $best = ''; $bs = -1;
    foreach ($cats as $c) {
        $s = score_cat($raw_cat, $c);
        if ($s > $bs) { $bs = $s; $best = $c; }
    }
    // ── CATEGORY INTEGRITY: only accept a known category if it scores above
    // the threshold — meaning it is genuinely a normalisation/synonym of the
    // raw category (e.g. TYRE→TYRES, AC→AIR CONDITIONERS, TV→TELEVISIONS).
    // If the best-scoring known category is unrelated to the raw category
    // (e.g. FANS vs REFRIGERATORS, CLOTHING vs COSMETICS), fall back to the
    // cleaned raw category so we never silently change the product type.
    if ($bs < CAT_MATCH_THRESHOLD) return clean($raw_cat);
    return $best;
}

// =============================================================================
// CHANGE 1 HELPER: verify_in_exact
// After any BRAND-MATCH resolution, if the resulting (corrected_brand +
// corrected_category) key exists in the exact-match index as a non-DELETE row,
// upgrade the method to EXACT.
// =============================================================================
function verify_in_exact(array $idx, string $cb, string $cc): bool {
    if (!$cb || !$cc || is_del($cb)) return false;
    $key = norm($cb) . norm($cc);
    return isset($idx['em'][$key]) && !($idx['em'][$key]['del'] ?? true);
}

// =============================================================================
// CHANGE 1: TOKEN REVERSE — now accepts $rc (raw category) to boost brands
// whose known categories best match the raw category (30 % weight).
// Signature: token_reverse(string $rb, array $idx, string $rc = '')
// =============================================================================
function token_reverse(string $rb, array $idx, string $rc = ''): array {
    $words = array_filter(
        explode(' ', strtoupper(trim($rb))),
        fn($w) => strlen($w) >= 5 && !isset(TOKEN_BLOCKLIST[$w])
    );
    if (!$words) return [null, null];

    $hits = [];
    foreach ($words as $w) {
        foreach ($idx['tok'][$w] ?? [] as $bk) {
            $hits[$bk] = ($hits[$bk] ?? 0) + strlen($w);
        }
    }
    if (!$hits) return [null, null];

    // ── CHANGE 1: category boost ────────────────────────────────────────
    // For each candidate brand key, compute the best category score against
    // the raw category and add 30% of that score to the hit weight so that,
    // when two brands share a token, the one whose category matches wins.
    if ($rc !== '') {
        foreach (array_keys($hits) as $bk) {
            $cats = $idx['cc'][$bk] ?? [];
            $best_cs = 0.0;
            foreach ($cats as $cat) {
                $s = score_cat($rc, $cat);
                if ($s > $best_cs) $best_cs = $s;
            }
            $hits[$bk] += $best_cs * 0.30;
        }
    }
    // ────────────────────────────────────────────────────────────────────

    arsort($hits);
    $best = array_key_first($hits);

    // Require at least one long (≥6) token to confirm match
    $long = array_filter($words, fn($w) => strlen($w) >= 6);
    if ($long) {
        $ok = false;
        foreach ($long as $w) {
            if (in_array($best, $idx['tok'][$w] ?? [])) { $ok = true; break; }
        }
        if (!$ok) return [null, null];
    }
    return [$idx['cb'][$best] ?? null, $best];
}

// =============================================================================
// CHANGE 3: DELETE-CHECK — now upgrades to EXACT when verify_in_exact passes
// =============================================================================
function check_master_for_delete(array $idx, string $nr, string $rc): array {
    if (isset($idx['mcb'][$nr])) {
        $cb   = $idx['mcb'][$nr];
        $cats = $idx['mcc'][$nr] ?? [];
        $cc   = best_cat($cats, $rc);
        // CHANGE 3: if recovered brand+cat is in exact index → EXACT
        if (verify_in_exact($idx, $cb, $cc)) return [$cb, $cc, 'EXACT'];
        return [$cb, $cc, 'DELETE-CHECK'];
    }
    if (isset($idx['mrb'][$nr])) {
        $e  = $idx['mrb'][$nr];
        $cc = best_cat($e['cats'] ?? [], $rc);
        if (verify_in_exact($idx, $e['cb'], $cc)) return [$e['cb'], $cc, 'EXACT'];
        return [$e['cb'], $cc, 'DELETE-CHECK'];
    }
    return ['DELETE', '', 'DELETE'];
}

// =============================================================================
// REPORTS: read unique Report values from master file
// =============================================================================
function get_all_reports(string $master_file, string $reports_cache): array {
    if (file_exists($reports_cache)) {
        $cached = @json_decode(@file_get_contents($reports_cache), true);
        $master_mtime = @filemtime($master_file);
        if ($cached && ($cached['_mtime'] ?? 0) === $master_mtime && !empty($cached['reports'])) {
            return $cached['reports'];
        }
    }
    $reports = [];
    if (!file_exists($master_file)) return [];
    $h = fopen($master_file, 'r');
    if (!$h) return [];
    $bom = fread($h, 3);
    if ($bom !== "\xEF\xBB\xBF") rewind($h);
    fgetcsv($h);
    while (($r = fgetcsv($h, 10000, ',')) !== false) {
        $rep = trim($r[7] ?? '');
        if ($rep !== '' && !in_array($rep, $reports)) $reports[] = $rep;
    }
    fclose($h);
    natsort($reports);
    $reports = array_values($reports);
    file_put_contents($reports_cache, json_encode([
        '_mtime'  => @filemtime($master_file),
        'reports' => $reports,
    ], JSON_UNESCAPED_UNICODE));
    return $reports;
}

// =============================================================================
// INDEX BUILDER — single file, report-filtered
// =============================================================================
function cache_file_for_reports(string $dict_dir, array $selected_reports): string {
    $sorted = $selected_reports;
    sort($sorted);
    $hash = substr(md5(implode('|', $sorted)), 0, 12);
    return "$dict_dir/engine_v6_7_{$hash}.json";
}

function needs_rebuild(string $cache_file, string $master_file): bool {
    if (!file_exists($cache_file)) return true;
    $d = @json_decode(@file_get_contents($cache_file), true);
    if (empty($d) || ($d['_v'] ?? '') !== ENGINE_VERSION) return true;
    if (@filemtime($master_file) > @filemtime($cache_file)) return true;
    return false;
}

function build(string $MASTER, string $CACHE, array $selected_reports): array {
    $sel_set = array_flip($selected_reports);

    $idx = [
        '_v'       => ENGINE_VERSION,
        '_at'      => date('Y-m-d H:i:s'),
        '_reports' => $selected_reports,
        '_rows'    => ['master' => 0, 'skipped' => 0],
        'em'  => [],
        'cb'  => [],
        'cc'  => [],
        'rb'  => [],
        'tok' => [],
        'mcb' => [],
        'mcc' => [],
        'mrb' => [],
    ];

    if (!file_exists($MASTER)) {
        $idx['_rows']['master_err'] = "FILE NOT FOUND: $MASTER"; return $idx;
    }
    $h = fopen($MASTER, 'r');
    if (!$h) {
        $idx['_rows']['master_err'] = "CANNOT OPEN: $MASTER"; return $idx;
    }

    $bom = fread($h, 3);
    if ($bom !== "\xEF\xBB\xBF") rewind($h);
    fgetcsv($h);

    $n = 0; $skipped = 0;

    while (($r = fgetcsv($h, 10000, ',')) !== false) {
        // Columns: rb=0, rc=1, supcat=2, gtotal=3, cb=4, cc=5, supercat=6, report=7
        $rb     = trim($r[0] ?? '');
        $rc     = trim($r[1] ?? '');
        $cb     = trim($r[4] ?? '');
        $cc     = trim($r[5] ?? '');
        $report = trim($r[7] ?? '');

        if (!isset($sel_set[$report])) { $skipped++; continue; }

        $nr  = norm($rb);  $nrc = norm($rc);
        $nb  = norm($cb);  $nc  = clean($cc);
        $cbd = clean($cb);
        $del = is_del($cb);

        if (!$nr && !$nb) continue;
        $n++;

        if ($nr) {
            $ek = $nr . $nrc;
            if (!isset($idx['em'][$ek]) || ($idx['em'][$ek]['del'] && !$del)) {
                $idx['em'][$ek] = ['cb' => $cbd, 'cc' => $del ? '' : $nc, 'del' => $del];
            }
        }

        if ($del || !$nb || !$nc) continue;

        if (!isset($idx['cb'][$nb])) $idx['cb'][$nb] = $cbd;
        if (!isset($idx['cc'][$nb])) $idx['cc'][$nb] = [];
        if (!in_array($nc, $idx['cc'][$nb])) $idx['cc'][$nb][] = $nc;

        if ($nr) {
            if (!isset($idx['rb'][$nr])) $idx['rb'][$nr] = ['cb' => $cbd, 'cats' => []];
            if (!in_array($nc, $idx['rb'][$nr]['cats'])) $idx['rb'][$nr]['cats'][] = $nc;
        }

        foreach (array_filter(explode(' ', $cbd), fn($w) => strlen($w) >= 3) as $w) {
            if (isset(TOKEN_BLOCKLIST[$w])) continue;
            if (!isset($idx['tok'][$w])) $idx['tok'][$w] = [];
            if (!in_array($nb, $idx['tok'][$w])) $idx['tok'][$w][] = $nb;
        }

        if (!isset($idx['mcb'][$nb])) $idx['mcb'][$nb] = $cbd;
        if (!isset($idx['mcc'][$nb])) $idx['mcc'][$nb] = [];
        if (!in_array($nc, $idx['mcc'][$nb])) $idx['mcc'][$nb][] = $nc;

        if ($nr) {
            if (!isset($idx['mrb'][$nr])) $idx['mrb'][$nr] = ['cb' => $cbd, 'cats' => []];
            if (!in_array($nc, $idx['mrb'][$nr]['cats'])) $idx['mrb'][$nr]['cats'][] = $nc;
        }
    }
    fclose($h);
    $idx['_rows']['master']  = $n;
    $idx['_rows']['skipped'] = $skipped;

    file_put_contents($CACHE, json_encode($idx, JSON_UNESCAPED_UNICODE));
    return $idx;
}

// =============================================================================
// CORE CORRECTION — tier logic with CHANGE 1 (category-priority) applied
// =============================================================================
function correct(array $idx, string $rb, string $rc): array {
    $nr  = norm($rb);
    $nrc = norm($rc);

    // ── HC0: Hardcoded rb+rc specific override ────────────────────────────
    $hk = $nr . $nrc;
    if (isset(BRAND_CORRECTIONS[$hk])) {
        $fix = BRAND_CORRECTIONS[$hk];
        if (is_del($fix['cb'])) return check_master_for_delete($idx, $nr, $rc);
        $cb = $fix['cb']; $cc = clean($fix['cc']);
        // CHANGE 1: verify if hardcoded result is also in exact index
        if (verify_in_exact($idx, $cb, $cc)) return [$cb, $cc, 'EXACT'];
        return [$cb, $cc, 'BRAND-MATCH'];
    }

    // ── HC1: Hardcoded brand-only override ────────────────────────────────
    if (isset(BRAND_CORRECTIONS[$nr])) {
        $fix = BRAND_CORRECTIONS[$nr];
        if (!is_del($fix['cb'])) {
            $nb   = norm($fix['cb']);
            $cats = $idx['cc'][$nb] ?? ($idx['mcc'][$nb] ?? []);
            // CHANGE 1: category-priority — pick best_cat using raw category
            $cc   = $cats ? best_cat($cats, $rc) : clean($fix['cc'] ?: $rc);
            $cb   = $fix['cb'];
            if (verify_in_exact($idx, $cb, $cc)) return [$cb, $cc, 'EXACT'];
            return [$cb, $cc, 'BRAND-MATCH'];
        }
        return check_master_for_delete($idx, $nr, $rc);
    }

    // ── T1: EXACT match ───────────────────────────────────────────────────
    $ek = $nr . $nrc;
    if (isset($idx['em'][$ek])) {
        if (!$idx['em'][$ek]['del']) {
            return [$idx['em'][$ek]['cb'], $idx['em'][$ek]['cc'], 'EXACT'];
        }
        $dc = check_master_for_delete($idx, $nr, $rc);
        if ($dc[2] === 'EXACT' || $dc[2] === 'DELETE-CHECK') return $dc;
        // Master also nothing → fall through to T2+
    }

    // ── T2A: corrected brand name index ───────────────────────────────────
    // CHANGE 1: category is the priority — best_cat() selects the category
    // from all known categories for this brand that best matches $rc.
    if (isset($idx['cb'][$nr])) {
        $cb   = $idx['cb'][$nr];
        $cats = $idx['cc'][$nr] ?? [];
        $cc   = best_cat($cats, $rc);          // raw category priority
        if (verify_in_exact($idx, $cb, $cc)) return [$cb, $cc, 'EXACT'];
        return [$cb, $cc, 'BRAND-MATCH'];
    }

    // ── T2B: raw brand index ──────────────────────────────────────────────
    // CHANGE 1: same category-priority via best_cat()
    if (isset($idx['rb'][$nr])) {
        $e  = $idx['rb'][$nr];
        $cc = best_cat($e['cats'] ?? [], $rc); // raw category priority
        if (verify_in_exact($idx, $e['cb'], $cc)) return [$e['cb'], $cc, 'EXACT'];
        return [$e['cb'], $cc, 'BRAND-MATCH'];
    }

    // ── T3: token-reverse (CHANGE 1: passes $rc for category boost) ───────
    [$tb, $tk] = token_reverse($rb, $idx, $rc);
    if ($tb !== null) {
        $cats = $idx['cc'][$tk] ?? [];
        $cc   = best_cat($cats, $rc);          // raw category priority
        if (verify_in_exact($idx, $tb, $cc)) return [$tb, $cc, 'EXACT'];
        return [$tb, $cc, 'BRAND-MATCH'];
    }

    // ── T4: master-only brand index ───────────────────────────────────────
    if (isset($idx['mcb'][$nr])) {
        $cb   = $idx['mcb'][$nr];
        $cats = $idx['mcc'][$nr] ?? [];
        $cc   = best_cat($cats, $rc);
        if (verify_in_exact($idx, $cb, $cc)) return [$cb, $cc, 'EXACT'];
        return [$cb, $cc, 'MASTER-MATCH'];
    }
    if (isset($idx['mrb'][$nr])) {
        $e  = $idx['mrb'][$nr];
        $cc = best_cat($e['cats'] ?? [], $rc);
        if (verify_in_exact($idx, $e['cb'], $cc)) return [$e['cb'], $cc, 'EXACT'];
        return [$e['cb'], $cc, 'MASTER-MATCH'];
    }

    // ── CHANGE 2: NEEDS-AI renamed to HUMAN-CHECK ─────────────────────────
    return [clean($rb), clean($rc), 'HUMAN-CHECK'];
}

// =============================================================================
// AI RESOLVE  (UNCHANGED — still works if needed server-side)
// =============================================================================
function ai_resolve(array $items, string $api_key): array {
    if (!$items || !$api_key) return array_fill(0, count($items), null);

    $lines = '';
    foreach ($items as $i => $it) {
        $ctx = $it['brand_valid'] ? '[Brand exists in other categories]' : '[Unknown brand]';
        $lines .= ($i+1).". Brand: \"{$it['rb']}\"  Cat: \"{$it['rc']}\"  {$ctx}\n";
    }

    $prompt = <<<PROMPT
You are an expert Indian market research analyst. Determine the correct Corrected Brand and Corrected Category for each item.

RULES:
1. Use web_search to verify unfamiliar brands.
2. Fix spelling mistakes (SMIRNOOF→SMIRNOFF, MARRIE→MARIE).
3. Use OFFICIAL registered brand name in UPPERCASE.
4. Mark corrected_brand as "DELETE" ONLY for: celebrities, politicians, generic ingredients, local shops, discontinued brands with no successor, concept words.
5. HERO HONDA → HERO MOTOCORP + MOTORCYCLES (split 2011).
6. RANBAXY → SUN PHARMA + PHARMACEUTICALS (acquired 2015).
7. PHILIPS AC → PHILIPS + AIR CONDITIONERS (valid licensed product in India).
8. Category = standard market research category (e.g. "AIR CONDITIONERS", "MOTORCYCLES").

Items:
{$lines}

RESPOND ONLY with a valid JSON array, one object per item in order:
[{"corrected_brand":"BRAND","corrected_category":"CATEGORY"},...]
PROMPT;

    $body = json_encode([
        'model'      => AI_MODEL,
        'max_tokens' => 1024,
        'tools'      => [['type' => 'web_search_20250305', 'name' => 'web_search']],
        'messages'   => [['role' => 'user', 'content' => $prompt]],
    ], JSON_UNESCAPED_UNICODE);

    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'x-api-key: ' . $api_key,
            'anthropic-version: 2023-06-01',
        ],
    ]);
    $raw = curl_exec($ch); $err = curl_error($ch); curl_close($ch);
    if ($err || !$raw) return array_fill(0, count($items), null);

    $resp = json_decode($raw, true);
    if (isset($resp['error'])) {
        error_log(json_encode($resp['error']));
        return array_fill(0, count($items), null);
    }

    $text = '';
    foreach ($resp['content'] ?? [] as $blk) {
        if (($blk['type'] ?? '') === 'text') $text .= $blk['text'];
    }
    $text   = trim(preg_replace('/^```(?:json)?\s*/im', '', preg_replace('/\s*```\s*$/im', '', $text)));
    $parsed = json_decode($text, true);
    if (!is_array($parsed) && preg_match('/\[.*\]/s', $text, $m)) $parsed = json_decode($m[0], true);
    if (!is_array($parsed)) return array_fill(0, count($items), null);

    $out = [];
    foreach ($items as $i => $item) {
        $p = $parsed[$i] ?? null;
        if ($p && isset($p['corrected_brand'])) {
            $cb    = clean($p['corrected_brand']);
            $cc    = clean($p['corrected_category'] ?? '');
            $out[] = ['cb' => $cb, 'cc' => $cc, 'method' => is_del($cb) ? 'DELETE' : 'AI-RESOLVED'];
        } else {
            $out[] = null;
        }
    }
    return $out;
}

// =============================================================================
// STARTUP
// =============================================================================
$ALL_REPORTS = get_all_reports($MASTER_FILE, $REPORTS_CACHE);
$MASTER_OK   = file_exists($MASTER_FILE);
$AI_SERVER   = ANTHROPIC_API_KEY !== '';

// =============================================================================
// ENDPOINTS
// =============================================================================

// ?get_reports=1
if (isset($_GET['get_reports'])) {
    header('Content-Type: application/json');
    echo json_encode(['reports' => $ALL_REPORTS], JSON_UNESCAPED_UNICODE);
    exit;
}

// ?debug=1
if (isset($_GET['debug'])) {
    header('Content-Type: application/json');
    $all_hash    = substr(md5(implode('|', $ALL_REPORTS)), 0, 12);
    $debug_cache = "$DICT_DIR/engine_v6_7_{$all_hash}.json";
    $IDX_DEBUG   = file_exists($debug_cache)
        ? json_decode(file_get_contents($debug_cache), true) : [];
    echo json_encode([
        'version'        => ENGINE_VERSION,
        'master_file'    => $MASTER_FILE,
        'master_exists'  => $MASTER_OK,
        'all_reports'    => $ALL_REPORTS,
        'rows'           => $IDX_DEBUG['_rows'] ?? [],
        'exact_keys'     => count($IDX_DEBUG['em']   ?? []),
        'corr_brands'    => count($IDX_DEBUG['cb']   ?? []),
        'raw_brands'     => count($IDX_DEBUG['rb']   ?? []),
        'master_brands'  => count($IDX_DEBUG['mcb']  ?? []),
        'tokens'         => count($IDX_DEBUG['tok']  ?? []),
        'hardcoded'      => count(BRAND_CORRECTIONS),
        'token_blocklist'=> count(TOKEN_BLOCKLIST),
    ], JSON_PRETTY_PRINT);
    exit;
}

// ?lookup=1
if (isset($_GET['lookup'])) {
    header('Content-Type: application/json');
    $q           = strtoupper(trim($_GET['q']  ?? ''));
    $rc_in       = strtoupper(trim($_GET['rc'] ?? ''));
    $sel_reports = !empty($_GET['reports'])
        ? array_filter(explode(',', $_GET['reports'])) : $ALL_REPORTS;
    $cache_file  = cache_file_for_reports($DICT_DIR, $sel_reports);
    if (needs_rebuild($cache_file, $MASTER_FILE)) build($MASTER_FILE, $cache_file, $sel_reports);
    $IDX    = json_decode(file_get_contents($cache_file), true);
    $n      = norm($q);
    [$tb,$tk] = token_reverse($q, $IDX, $rc_in);
    $result = correct($IDX, $q, $rc_in);
    echo json_encode([
        'input'    => $q, 'cat' => $rc_in, 'norm' => $n,
        'hc_key'   => BRAND_CORRECTIONS[$n.norm($rc_in)] ?? (BRAND_CORRECTIONS[$n] ?? null),
        'T1_exact' => $IDX['em'][$n.norm($rc_in)] ?? null,
        'T2A'      => isset($IDX['cb'][$n]) ? ['brand'=>$IDX['cb'][$n],'cats'=>$IDX['cc'][$n]??[]] : null,
        'T2B'      => $IDX['rb'][$n] ?? null,
        'T3_token' => $tb ? ['brand'=>$tb,'cats'=>$IDX['cc'][$tk]??[]] : null,
        'T4_master'=> isset($IDX['mcb'][$n]) ? ['brand'=>$IDX['mcb'][$n],'cats'=>$IDX['mcc'][$n]??[]] : null,
        'DC_result'=> check_master_for_delete($IDX, $n, $rc_in),
        'RESULT'   => $result,
        'reports'  => $sel_reports,
    ], JSON_PRETTY_PRINT);
    exit;
}

// ?api=1 — main batch
if (isset($_GET['api'])) {
    header('Content-Type: application/json');
    $t0    = microtime(true);
    $input = json_decode(file_get_contents('php://input'), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['status'=>'error','message'=>'Invalid JSON']); exit;
    }
    $sel_reports = !empty($input['reports']) && is_array($input['reports'])
        ? $input['reports'] : $ALL_REPORTS;
    sort($sel_reports);
    $cache_file = cache_file_for_reports($DICT_DIR, $sel_reports);
    if (needs_rebuild($cache_file, $MASTER_FILE)) build($MASTER_FILE, $cache_file, $sel_reports);
    $IDX = json_decode(file_get_contents($cache_file), true);

    $out = [];
    foreach ($input['items'] ?? [] as $item) {
        [$cb, $cc, $method] = correct($IDX, (string)($item['rb']??''), (string)($item['rc']??''));
        $out[] = ['rb'=>$item['rb'],'rc'=>$item['rc'],'cb'=>$cb,'cc'=>$cc,'method'=>$method];
    }
    echo json_encode([
        'status'     => 'success',
        'data'       => $out,
        'process_ms' => round((microtime(true)-$t0)*1000),
        'reports'    => $sel_reports,
        'cache'      => basename($cache_file),
    ]);
    exit;
}

// ?ai_resolve=1
if (isset($_GET['ai_resolve'])) {
    header('Content-Type: application/json');
    $key = ANTHROPIC_API_KEY ?: trim($_SERVER['HTTP_X_AI_KEY'] ?? '');
    if (!$key) { echo json_encode(['status'=>'error','message'=>'No API key']); exit; }

    $input = json_decode(file_get_contents('php://input'), true);
    $items = $input['items'] ?? [];
    if (!$items) { echo json_encode(['status'=>'success','data'=>[]]); exit; }

    $sel_reports = !empty($input['reports']) && is_array($input['reports'])
        ? $input['reports'] : $ALL_REPORTS;
    sort($sel_reports);
    $cache_file = cache_file_for_reports($DICT_DIR, $sel_reports);
    if (needs_rebuild($cache_file, $MASTER_FILE)) build($MASTER_FILE, $cache_file, $sel_reports);
    $IDX = json_decode(file_get_contents($cache_file), true);

    foreach ($items as &$it) {
        $nr = norm($it['rb']);
        $it['brand_valid'] = isset($IDX['cb'][$nr]) || isset($IDX['rb'][$nr]) || isset($IDX['mcb'][$nr]);
    }
    unset($it);

    $t0 = microtime(true); $out = [];
    foreach (array_chunk($items, AI_BATCH) as $chunk) {
        $res_ai = ai_resolve($chunk, $key);
        foreach ($chunk as $j => $item) {
            $r     = $res_ai[$j] ?? null;
            $out[] = $r
                ? ['rb'=>$item['rb'],'rc'=>$item['rc'],'cb'=>$r['cb'],'cc'=>$r['cc'],'method'=>$r['method']]
                : ['rb'=>$item['rb'],'rc'=>$item['rc'],'cb'=>clean($item['rb']),'cc'=>clean($item['rc']),'method'=>'NONE'];
        }
    }
    echo json_encode(['status'=>'success','data'=>$out,'process_ms'=>round((microtime(true)-$t0)*1000)]);
    exit;
}

// ?reindex=1
if (isset($_GET['reindex'])) {
    foreach (glob("$DICT_DIR/engine_v6_7_*.json") as $f) @unlink($f);
    @unlink($REPORTS_CACHE);
    $ALL_REPORTS = get_all_reports($MASTER_FILE, $REPORTS_CACHE);
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>TRA Data</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;600&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f1f5f9;--sur:#fff;--c2:#f8fafc;--brd:#e2e8f0;--brd2:#cbd5e1;
  --tx:#0f172a;--tx2:#334155;--mu:#64748b;--mu2:#94a3b8;
  --eg:#f0fdf4;--ef:#166534;--eb:#bbf7d0;
  --mg:#fffbeb;--mf:#92400e;--mb:#fde68a;
  --ag:#eff6ff;--af:#1e40af;--ab:#bfdbfe;
  --xg:#fdf4ff;--xf:#6b21a8;--xb:#e9d5ff;
  --ng:#fff1f2;--nf:#9f1239;--nb:#fecdd3;
  --dg:#f5f3ff;--df:#5b21b6;--db:#ddd6fe;
  --og:#fff7ed;--of:#9a3412;--ob:#fed7aa;
  --hcg:#fef2f2;--hcf:#7f1d1d;--hcb:#fca5a5;
  --bl:#2563eb;--gr:#059669;--am:#d97706;--re:#dc2626;--pu:#7c3aed;--or:#ea580c;
  --sh:0 1px 3px 0 rgb(0 0 0/.06),0 1px 2px -1px rgb(0 0 0/.06);
  --shm:0 4px 6px -1px rgb(0 0 0/.08),0 2px 4px -2px rgb(0 0 0/.06);
}
*{box-sizing:border-box;margin:0;padding:0;}
body{background:var(--bg);color:var(--tx);font-family:Inter,sans-serif;font-size:14px;}

.topbar{background:var(--sur);border-bottom:1px solid var(--brd);padding:0 20px;height:54px;display:flex;align-items:center;justify-content:space-between;box-shadow:var(--sh);position:sticky;top:0;z-index:50;gap:10px;flex-wrap:wrap;}
.logo{font-weight:800;font-size:15px;letter-spacing:-.3px;}
.ver{font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;background:var(--bl);color:#fff;padding:2px 7px;border-radius:4px;}
.tb-r{display:flex;align-items:center;gap:6px;flex-wrap:wrap;}
.bdg{font-family:'IBM Plex Mono',monospace;font-size:9px;font-weight:600;padding:3px 8px;border-radius:4px;white-space:nowrap;text-decoration:none;}
.bg{background:var(--eg);color:var(--ef);border:1px solid var(--eb);}
.br{background:var(--ng);color:var(--nf);border:1px solid var(--nb);}
.bz{background:var(--c2);color:var(--mu);border:1px solid var(--brd);}
.bz:hover{background:var(--brd);}

.wrap{max-width:1400px;margin:0 auto;padding:18px 16px 60px;}
.sh{font-size:10px;font-weight:700;color:var(--mu);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;display:flex;align-items:center;gap:8px;}
.sh::after{content:'';flex:1;height:1px;background:var(--brd);}

/* LOOKUP */
.lk{background:var(--sur);border:1px solid var(--brd);border-radius:10px;padding:10px 14px;box-shadow:var(--sh);margin-bottom:14px;display:flex;flex-wrap:wrap;align-items:center;gap:8px;}
.lk-lbl{font-size:10px;font-weight:700;color:var(--mu);text-transform:uppercase;letter-spacing:.7px;white-space:nowrap;}
.lk-inp{border:1px solid var(--brd);border-radius:7px;padding:7px 11px;font-family:'IBM Plex Mono',monospace;font-size:12px;color:var(--tx);background:var(--bg);outline:none;transition:border-color .15s;}
.lk-inp:focus{border-color:var(--bl);background:#fff;}
.lk-res{font-family:'IBM Plex Mono',monospace;font-size:11px;padding:5px 10px;border-radius:6px;display:none;line-height:1.7;}
.lr-g{background:var(--eg);color:var(--ef);border:1px solid var(--eb);}
.lr-a{background:var(--mg);color:var(--mf);border:1px solid var(--mb);}
.lr-b{background:var(--ag);color:var(--af);border:1px solid var(--ab);}
.lr-o{background:var(--og);color:var(--of);border:1px solid var(--ob);}
.lr-r{background:var(--ng);color:var(--nf);border:1px solid var(--nb);}
.lr-d{background:var(--dg);color:var(--df);border:1px solid var(--db);}
.lr-h{background:var(--hcg);color:var(--hcf);border:1px solid var(--hcb);}

/* UPLOAD */
.uz{background:var(--sur);border:1.5px dashed var(--brd2);border-radius:10px;padding:14px 16px;cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:12px;}
.uz:hover{border-color:var(--bl);background:var(--ag);}
.uz.loaded{border-style:solid;border-color:#22c55e;background:var(--eg);}
.uz input{display:none;}
.uz-title{font-weight:700;font-size:12px;color:var(--tx);}
.uz-name{font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--bl);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:300px;}
.uz-hint{font-size:11px;color:var(--mu);}

/* REPORT FILTER */
.rf-wrap{position:relative;display:inline-block;}
.rf-btn{display:inline-flex;align-items:center;gap:7px;background:var(--sur);border:1.5px solid var(--brd2);border-radius:8px;padding:8px 13px;font-size:12px;font-weight:600;color:var(--tx2);cursor:pointer;transition:all .15s;white-space:nowrap;user-select:none;}
.rf-btn:hover,.rf-btn.active{border-color:var(--bl);background:var(--ag);color:var(--bl);}
.rf-count{font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:700;background:var(--bl);color:#fff;padding:1px 6px;border-radius:4px;min-width:22px;text-align:center;}
.rf-count.partial{background:var(--am);}
.rf-arrow{font-size:9px;color:var(--mu);margin-left:2px;transition:transform .15s;}
.rf-btn.active .rf-arrow{transform:rotate(180deg);}
.rf-panel{position:absolute;top:calc(100% + 5px);left:0;z-index:200;background:var(--sur);border:1px solid var(--brd2);border-radius:10px;box-shadow:var(--shm);width:230px;overflow:hidden;display:none;}
.rf-panel.open{display:block;}
.rf-search-wrap{padding:8px 8px 6px;border-bottom:1px solid var(--brd);}
.rf-search{width:100%;border:1px solid var(--brd2);border-radius:6px;padding:6px 10px;font-size:11px;font-family:'IBM Plex Mono',monospace;color:var(--tx);outline:none;background:var(--c2);}
.rf-search:focus{border-color:var(--bl);background:#fff;}
.rf-search::placeholder{color:var(--mu2);}
.rf-list{max-height:260px;overflow-y:auto;padding:4px 0;}
.rf-item{display:flex;align-items:center;gap:8px;padding:6px 12px;cursor:pointer;transition:background .1s;font-size:12px;color:var(--tx2);}
.rf-item:hover{background:var(--c2);}
.rf-item input[type=checkbox]{width:13px;height:13px;cursor:pointer;accent-color:var(--bl);flex-shrink:0;}
.rf-item.select-all{font-weight:700;color:var(--tx);border-bottom:1px solid var(--brd);margin-bottom:2px;}
.rf-item-label{flex:1;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;user-select:none;}
.rf-tag{font-family:'IBM Plex Mono',monospace;font-size:9px;padding:1px 5px;border-radius:3px;margin-left:auto;flex-shrink:0;}
.rf-tag-btr{background:#dbeafe;color:#1d4ed8;}
.rf-tag-mdb{background:#dcfce7;color:#166534;}
.rf-footer{border-top:1px solid var(--brd);padding:7px 10px;display:flex;gap:6px;}
.rf-footer-btn{flex:1;font-size:11px;font-weight:600;padding:5px 8px;border-radius:6px;border:1px solid var(--brd);cursor:pointer;background:var(--c2);color:var(--tx2);transition:all .12s;}
.rf-footer-btn:hover{background:var(--brd);}
.rf-footer-btn.apply{background:var(--bl);color:#fff;border-color:var(--bl);}
.rf-footer-btn.apply:hover{background:#1d4ed8;}
.rf-strip{background:var(--og);border:1px solid var(--ob);border-radius:8px;padding:7px 13px;font-size:11px;color:var(--of);font-family:'IBM Plex Mono',monospace;display:none;margin-bottom:10px;}
.rf-strip.visible{display:block;}

/* ACTION BAR */
.abar{background:var(--sur);border:1px solid var(--brd);border-radius:10px;padding:10px 14px;display:flex;align-items:center;gap:9px;flex-wrap:wrap;margin-bottom:14px;box-shadow:var(--sh);}
.smsg{margin-left:auto;font-size:11px;color:var(--mu);font-family:'IBM Plex Mono',monospace;}
.btn{display:inline-flex;align-items:center;gap:6px;font-family:Inter,sans-serif;font-weight:600;border:none;border-radius:8px;padding:9px 16px;cursor:pointer;font-size:12px;transition:all .15s;white-space:nowrap;}
.btn:disabled{opacity:.4;cursor:not-allowed;}
.b-bl{background:var(--bl);color:#fff;} .b-bl:hover:not(:disabled){background:#1d4ed8;}
.b-gr{background:var(--gr);color:#fff;} .b-gr:hover{background:#047857;}
.b-gh{background:var(--c2);color:var(--tx2);border:1px solid var(--brd);} .b-gh:hover{background:var(--brd);}
.btn-sm{padding:7px 12px;font-size:11px;}
.hide{display:none!important;}

.pw{display:none;margin-bottom:12px;} .pw.on{display:block;}
.ph{display:flex;justify-content:space-between;font-size:11px;font-family:'IBM Plex Mono',monospace;color:var(--mu);margin-bottom:4px;}
.pt{height:5px;background:var(--brd);border-radius:99px;overflow:hidden;}
.pf{height:100%;border-radius:99px;width:0;transition:width .12s;}
.pf-bl{background:var(--bl);}

/* STATS */
.sg{display:grid;grid-template-columns:repeat(8,1fr);gap:8px;margin-bottom:14px;}
@media(max-width:1100px){.sg{grid-template-columns:repeat(4,1fr);}}
@media(max-width:600px){.sg{grid-template-columns:repeat(3,1fr);}}
.sbox{background:var(--sur);border:1px solid var(--brd);border-radius:10px;padding:11px 12px;display:flex;flex-direction:column;gap:2px;box-shadow:var(--sh);}
.sbox.se{border-top:3px solid var(--gr);background:var(--eg);border-color:var(--eb);}
.sbox.sm{border-top:3px solid var(--am);background:var(--mg);border-color:var(--mb);}
.sbox.sh2{border-top:3px solid #b91c1c;background:var(--hcg);border-color:var(--hcb);}
.sbox.sd{border-top:3px solid #7c3aed;background:var(--dg);border-color:var(--db);}
.sbox.si2{border-top:3px solid #4338ca;background:var(--ag);border-color:var(--ab);}
.slbl{font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--mu);}
.sn2{font-size:20px;font-weight:800;line-height:1.1;font-variant-numeric:tabular-nums;}
.ssb{font-size:10px;color:var(--mu);font-family:'IBM Plex Mono',monospace;}
.cg{color:var(--gr);}.ca{color:var(--am);}.cb2{color:var(--bl);}
.cr{color:var(--re);}.cv{color:#7c3aed;}.ci{color:#4338ca;}.cz{color:var(--tx2);}
.chc{color:#b91c1c;}

/* FILTER BAR */
.fr{display:flex;flex-wrap:wrap;gap:5px;margin-bottom:10px;align-items:center;}
.filt{font-family:'IBM Plex Mono',monospace;font-size:10px;font-weight:600;padding:5px 11px;border-radius:6px;cursor:pointer;border:1px solid var(--brd);background:var(--c2);color:var(--mu);transition:all .12s;user-select:none;}
.fa {background:var(--tx);color:#fff;border-color:var(--tx);}
.fe {background:var(--eg);color:var(--ef);border-color:var(--eb);}
.fm {background:var(--mg);color:var(--mf);border-color:var(--mb);}
.fh {background:var(--hcg);color:var(--hcf);border-color:var(--hcb);}
.fd {background:var(--dg);color:var(--df);border-color:var(--db);}
.srch{margin-left:auto;background:var(--sur);border:1px solid var(--brd);border-radius:7px;padding:6px 11px;font-size:11px;color:var(--tx);font-family:'IBM Plex Mono',monospace;outline:none;min-width:180px;transition:border-color .15s;}
.srch:focus{border-color:var(--bl);}
.srch::placeholder{color:var(--mu2);}

/* TABLE */
.tcard{background:var(--sur);border:1px solid var(--brd);border-radius:10px;overflow:hidden;box-shadow:var(--sh);}
.tscroll{overflow-x:auto;max-height:540px;overflow-y:auto;}
table{width:100%;border-collapse:collapse;}
thead th{background:var(--c2);padding:9px 12px;font-size:9px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;color:var(--mu);border-bottom:1px solid var(--brd);white-space:nowrap;position:sticky;top:0;z-index:5;text-align:left;}
thead th.tcc{text-align:center;}
tbody tr{border-bottom:1px solid var(--brd);transition:background .08s;}
tbody tr:hover{background:var(--c2);}
tbody tr:last-child{border-bottom:none;}
td{padding:7px 12px;font-size:12px;vertical-align:middle;}
.tn{font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--mu2);text-align:right;width:40px;}
.tr2{font-family:'IBM Plex Mono',monospace;font-size:11px;color:var(--mu);}
.tcb{font-weight:700;font-size:12px;color:var(--tx);}
.tcc2{font-size:11px;color:var(--bl);font-family:'IBM Plex Mono',monospace;}
.tc3{text-align:center;white-space:nowrap;}
.tag{font-family:'IBM Plex Mono',monospace;font-size:9px;font-weight:700;letter-spacing:.6px;padding:3px 8px;border-radius:4px;text-transform:uppercase;display:inline-block;white-space:nowrap;}
.tg-e{background:var(--eg);color:var(--ef);border:1px solid var(--eb);}
.tg-m{background:var(--mg);color:var(--mf);border:1px solid var(--mb);}
.tg-a{background:var(--ag);color:var(--af);border:1px solid var(--ab);}
.tg-x{background:var(--xg);color:var(--xf);border:1px solid var(--xb);}
.tg-dc{background:var(--og);color:var(--of);border:1px solid var(--ob);}
.tg-d{background:var(--dg);color:var(--df);border:1px solid var(--db);}
/* CHANGE 2+3: Human Check and DELETE with search link */
.tg-h{background:var(--hcg);color:var(--hcf);border:1px solid var(--hcb);}
.search-link{display:inline-flex;align-items:center;gap:3px;margin-left:5px;font-size:10px;font-family:'IBM Plex Mono',monospace;font-weight:700;color:var(--bl);text-decoration:none;padding:2px 6px;border-radius:4px;background:var(--ag);border:1px solid var(--ab);transition:all .12s;vertical-align:middle;}
.search-link:hover{background:var(--bl);color:#fff;border-color:var(--bl);}
.search-link svg{width:10px;height:10px;flex-shrink:0;}

.empty{padding:48px;text-align:center;color:var(--mu);font-size:13px;}
.ei{font-size:28px;margin-bottom:10px;}
::-webkit-scrollbar{width:5px;height:5px;}
::-webkit-scrollbar-track{background:var(--bg);}
::-webkit-scrollbar-thumb{background:var(--brd2);border-radius:3px;}
.toast{position:fixed;bottom:20px;right:20px;background:var(--tx);color:#fff;font-size:11px;font-family:'IBM Plex Mono',monospace;padding:9px 15px;border-radius:8px;box-shadow:var(--shm);transform:translateY(50px);opacity:0;transition:all .25s;z-index:999;}
.toast.on{transform:translateY(0);opacity:1;}
</style>
</head>
<body>

<div class="topbar">
  <div style="display:flex;align-items:center;gap:10px;">
    <div class="logo">TRA DATA</div>
  </div>
  <div class="tb-r">
    <span class="bdg <?= $MASTER_OK ? 'bg' : 'br' ?>"><?= $MASTER_OK ? '✓' : '✗' ?> MASTER (<?= number_format(count($ALL_REPORTS)) ?> reports)</span>
    <span class="bdg <?= $AI_SERVER ? 'bg' : 'br' ?>"><?= $AI_SERVER ? '🤖 AI READY' : '⚠ AI KEY NEEDED' ?></span>
    <!--a href="?reindex=1" class="bdg bz">↺ Reindex</a-->
    <a href="?debug=1" target="_blank" class="bdg bz">🔍 Debug</a>
  </div>
</div>

<div class="wrap">

<!-- LOOKUP -->
<div class="sh">Quick Lookup</div>
<div class="lk">
  <span class="lk-lbl">Lookup:</span>
  <input id="lkBrand" class="lk-inp" type="text" placeholder="e.g. PHILIPS" style="min-width:200px" onkeydown="if(event.key==='Enter')doLookup()">
  <input id="lkCat"   class="lk-inp" type="text" placeholder="e.g. AC"     style="min-width:120px" onkeydown="if(event.key==='Enter')doLookup()">
  <button class="btn b-bl btn-sm" onclick="doLookup()">Check All</button>
  <span id="lkRes" class="lk-res"></span>
</div>

<!-- UPLOAD + REPORT FILTER -->
<div class="sh">Upload Raw File &amp; Configure</div>
<div style="display:grid;grid-template-columns:1fr auto;gap:12px;margin-bottom:12px;align-items:start;">
  <div class="uz" id="uzZone" onclick="document.getElementById('rawF').click()">
    <input type="file" id="rawF" accept=".xlsx,.xls,.csv">
    <span style="font-size:20px">📄</span>
    <div>
      <div class="uz-title">RAW INPUT FILE</div>
      <div class="uz-name" id="rawName">Click to upload (CSV / XLSX)</div>
      <div class="uz-hint">Columns: Raw Brand · Raw Category</div>
    </div>
  </div>
  <div style="display:flex;flex-direction:column;gap:6px;align-items:flex-start;">
    <div style="font-size:10px;font-weight:700;color:var(--mu);text-transform:uppercase;letter-spacing:.7px;">Reference Reports</div>
    <div class="rf-wrap" id="rfWrap">
      <div class="rf-btn" id="rfBtn" onclick="toggleRfPanel()">
        <span>📊 Reports</span>
        <span class="rf-count" id="rfCount">...</span>
        <span class="rf-arrow">▼</span>
      </div>
      <div class="rf-panel" id="rfPanel">
        <div class="rf-search-wrap">
          <input type="text" class="rf-search" id="rfSearch" placeholder="Search" oninput="filterRfList(this.value)">
        </div>
        <div class="rf-list" id="rfList">
          <div class="rf-item select-all" onclick="event.stopPropagation()">
            <input type="checkbox" id="rfChkAll" onchange="selectAll(this.checked)">
            <span class="rf-item-label">(Select All)</span>
          </div>
        </div>
        <div class="rf-footer">
          <button class="rf-footer-btn" onclick="resetRf()">Reset</button>
          <button class="rf-footer-btn apply" onclick="applyRf()">Apply ✓</button>
        </div>
      </div>
    </div>
    <div style="font-size:10px;color:var(--mu);line-height:1.6;">Uncheck reports to<br>exclude from index</div>
  </div>
</div>

<div class="rf-strip" id="rfStrip"></div>

<div class="abar">
  <button class="btn b-bl" id="runBtn" onclick="runMain()" disabled>▶ Run Analysis</button>
  <button class="btn b-gr hide" id="expBtn" onclick="doExport()">↓ Export XLSX</button>
  <button class="btn b-gh btn-sm" onclick="doClear()">✕ Clear</button>
  <span class="smsg" id="smsg"></span>
</div>

<div class="pw" id="pw1">
  <div class="ph"><span id="pl1">Processing…</span><span id="pp1">0%</span></div>
  <div class="pt"><div class="pf pf-bl" id="pf1"></div></div>
</div>

<!-- STATS — 8 boxes -->
<div class="sg" id="sg" style="display:none">
  <div class="sbox"><div class="slbl">Total</div><div class="sn2 cz" id="ss-tot">—</div><div class="ssb">rows</div></div>
  <div class="sbox se"><div class="slbl">Exact</div><div class="sn2 cg" id="ss-e">—</div><div class="ssb" id="ss-e-p">—</div></div>
  <div class="sbox sm"><div class="slbl">Brand Match</div><div class="sn2 ca" id="ss-m">—</div><div class="ssb" id="ss-m-p">—</div></div>
  <div class="sbox sh2"><div class="slbl">Human Check</div><div class="sn2 chc" id="ss-h">—</div><div class="ssb" id="ss-h-p">needs review</div></div>
  <div class="sbox sd"><div class="slbl">Delete</div><div class="sn2 cv" id="ss-d">—</div><div class="ssb">confirmed</div></div>
  <div class="sbox si2"><div class="slbl">Accuracy</div><div class="sn2 ci" id="ss-ac">—</div><div class="ssb">excl. DELETE</div></div>
  <div class="sbox"><div class="slbl">Reports Used</div><div class="sn2 cb2" id="ss-rp">—</div><div class="ssb" id="ss-rp-lbl">of <?= count($ALL_REPORTS) ?> total</div></div>
  <div class="sbox"><div class="slbl">Time</div><div class="sn2 cb2" id="ss-t">—</div><div class="ssb">ms</div></div>
</div>

<!-- FILTER BAR -->
<div class="fr" id="fr" style="display:none">
  <button class="filt fa" onclick="setF('ALL',this)">ALL</button>
  <button class="filt"    onclick="setF('EXACT',this)">✓ EXACT</button>
  <button class="filt"    onclick="setF('BRAND-MATCH',this)">≈ BRAND MATCH</button>
  <button class="filt"    onclick="setF('HUMAN-CHECK',this)">🔍 HUMAN CHECK</button>
  <button class="filt"    onclick="setF('DELETE',this)">DELETE</button>
  <input class="srch" id="srch" placeholder="Search brand / category…" oninput="draw()">
</div>

<!-- TABLE -->
<div class="tcard"><div class="tscroll">
  <table>
    <thead><tr>
      <th class="tcc">#</th>
      <th>Raw Brand</th><th>Raw Category</th>
      <th>Corrected Brand</th><th>Corrected Category</th>
      <th class="tcc">Method</th>
    </tr></thead>
    <tbody id="tb">
      <tr><td colspan="6"><div class="empty"><div class="ei">📂</div>Upload raw file, configure reports, then click Run Analysis</div></td></tr>
    </tbody>
  </table>
</div></div>

</div><!-- /wrap -->
<div class="toast" id="toast"></div>

<script>
// ── STATE ─────────────────────────────────────────────────────────────────────
let raw = [], res = [], curF = 'ALL';
let allReports = [], selectedReports = [], pendingReports = [];
const ALL_REPORTS_PHP = <?= json_encode($ALL_REPORTS) ?>;

// ── INIT ──────────────────────────────────────────────────────────────────────
(function init() {
  allReports = ALL_REPORTS_PHP.slice();
  selectedReports = ALL_REPORTS_PHP.slice();
  pendingReports  = ALL_REPORTS_PHP.slice();
  buildRfList();
  updateRfCount();
})();

// ── REPORT FILTER ─────────────────────────────────────────────────────────────
function toggleRfPanel() {
  const panel = document.getElementById('rfPanel');
  const btn   = document.getElementById('rfBtn');
  if (panel.classList.contains('open')) {
    panel.classList.remove('open'); btn.classList.remove('active');
  } else {
    pendingReports = selectedReports.slice();
    buildRfList();
    document.getElementById('rfSearch').value = '';
    panel.classList.add('open'); btn.classList.add('active');
    document.getElementById('rfSearch').focus();
  }
}
document.addEventListener('click', e => {
  const wrap = document.getElementById('rfWrap');
  if (!wrap.contains(e.target)) {
    document.getElementById('rfPanel').classList.remove('open');
    document.getElementById('rfBtn').classList.remove('active');
  }
});

function buildRfList(filter) {
  const list = document.getElementById('rfList');
  list.querySelectorAll('.rf-report-item').forEach(el => el.remove());
  const q = (filter||'').trim().toUpperCase();
  const visible = allReports.filter(r => !q || r.toUpperCase().includes(q));
  visible.forEach(report => {
    const checked = pendingReports.includes(report);
    const isBTR   = report.startsWith('BTR');
    const div     = document.createElement('div');
    div.className = 'rf-item rf-report-item';
    div.dataset.report = report;
    const chk = document.createElement('input');
    chk.type = 'checkbox'; chk.checked = checked;
    chk.addEventListener('change', () => toggleReport(report, chk.checked));
    const lbl = document.createElement('span');
    lbl.className = 'rf-item-label'; lbl.textContent = report;
    lbl.addEventListener('click', () => { chk.checked = !chk.checked; toggleReport(report, chk.checked); });
    const tag = document.createElement('span');
    tag.className = `rf-tag ${isBTR?'rf-tag-btr':'rf-tag-mdb'}`;
    tag.textContent = isBTR ? 'BTR' : 'MDB';
    div.append(chk, lbl, tag);
    list.appendChild(div);
  });
  syncSelectAll();
}
function filterRfList(v) { buildRfList(v); }
function toggleReport(report, checked) {
  if (checked) { if (!pendingReports.includes(report)) pendingReports.push(report); }
  else { pendingReports = pendingReports.filter(r => r !== report); }
  syncSelectAll();
}
function syncSelectAll() {
  const chkAll = document.getElementById('rfChkAll');
  const items  = document.getElementById('rfList').querySelectorAll('.rf-report-item input');
  const total  = items.length, checked = Array.from(items).filter(c=>c.checked).length;
  chkAll.checked = checked === total && total > 0;
  chkAll.indeterminate = checked > 0 && checked < total;
}
function selectAll(checked) {
  document.getElementById('rfList').querySelectorAll('.rf-report-item').forEach(item => {
    const report = item.dataset.report;
    item.querySelector('input').checked = checked;
    if (checked) { if (!pendingReports.includes(report)) pendingReports.push(report); }
    else { pendingReports = pendingReports.filter(r => r !== report); }
  });
  syncSelectAll();
}
function resetRf() { pendingReports = allReports.slice(); buildRfList(document.getElementById('rfSearch').value); }
function applyRf() {
  if (!pendingReports.length) { toast('⚠ Select at least one report'); return; }
  selectedReports = pendingReports.slice();
  document.getElementById('rfPanel').classList.remove('open');
  document.getElementById('rfBtn').classList.remove('active');
  updateRfCount(); updateRfStrip();
}
function updateRfCount() {
  const cnt = document.getElementById('rfCount');
  const sel = selectedReports.length, total = allReports.length;
  cnt.textContent = sel === total ? 'All' : `${sel}/${total}`;
  cnt.className = 'rf-count' + (sel < total ? ' partial' : '');
}
function updateRfStrip() {
  const strip = document.getElementById('rfStrip');
  const excluded = allReports.filter(r => !selectedReports.includes(r));
  if (!excluded.length) { strip.classList.remove('visible'); return; }
  strip.textContent = `⚠ Excluding ${excluded.length} report(s): ${excluded.join(' · ')}`;
  strip.classList.add('visible');
}

// ── FILE LOAD ─────────────────────────────────────────────────────────────────
document.getElementById('rawF').onchange = async e => {
  const f = e.target.files[0]; if (!f) return;
  const r = new FileReader();
  r.onload = ev => {
    const wb = XLSX.read(new Uint8Array(ev.target.result), {type:'array'});
    const d  = XLSX.utils.sheet_to_json(wb.Sheets[wb.SheetNames[0]], {header:1});
    raw = d.slice(1).filter(row => row[0]||row[1])
           .map(row => ({rb:String(row[0]??'').trim(), rc:String(row[1]??'').trim()}));
    document.getElementById('rawName').textContent = `${f.name}  (${raw.length.toLocaleString()} rows)`;
    document.getElementById('uzZone').classList.add('loaded');
    document.getElementById('runBtn').disabled = false;
    toast(`📄 ${raw.length.toLocaleString()} rows loaded`);
  };
  r.readAsArrayBuffer(f);
};

// ── LOOKUP ────────────────────────────────────────────────────────────────────
async function doLookup() {
  const brand = document.getElementById('lkBrand').value.trim();
  const cat   = document.getElementById('lkCat').value.trim();
  if (!brand) return;
  const rptParam = selectedReports.join(',');
  const resp = await fetch(`?lookup=1&q=${encodeURIComponent(brand)}&rc=${encodeURIComponent(cat)}&reports=${encodeURIComponent(rptParam)}`);
  const j    = await resp.json();
  const box  = document.getElementById('lkRes');
  const r    = j.RESULT || [];
  const MC = {
    'EXACT':'lr-g','BRAND-MATCH':'lr-a','MASTER-MATCH':'lr-b',
    'DELETE-CHECK':'lr-o','DELETE':'lr-d','HUMAN-CHECK':'lr-h','NONE':'lr-r'
  };
  const icons = {
    'EXACT':'T1 ✓','BRAND-MATCH':'T2/T3 ≈','MASTER-MATCH':'T4 📋',
    'DELETE-CHECK':'DC 🔍','DELETE':'⊘ DELETE','HUMAN-CHECK':'🔍 Human Check','NONE':'✗ NONE'
  };
  box.className = 'lk-res ' + (MC[r[2]]||'lr-r');
  box.textContent = `${icons[r[2]]||r[2]} → "${r[0]}" | "${r[1]}"`;
  box.style.display = 'block';
}
document.getElementById('lkBrand').addEventListener('keydown', e => { if(e.key==='Enter') doLookup(); });
document.getElementById('lkCat').addEventListener('keydown',   e => { if(e.key==='Enter') doLookup(); });

// ── MAIN RUN ──────────────────────────────────────────────────────────────────
async function runMain() {
  if (!raw.length)             { toast('⚠ Upload file first'); return; }
  if (!selectedReports.length) { toast('⚠ Select at least one report'); return; }

  const btn = document.getElementById('runBtn');
  btn.disabled = true; btn.textContent = '⏳ Running…';
  prog(1, 'Starting…');
  document.getElementById('sg').style.display = 'none';
  document.getElementById('fr').style.display = 'none';
  res = [];

  const t0 = performance.now(), CHUNK = 300, total = raw.length;
  let sms = 0;

  for (let i = 0; i < total; i += CHUNK) {
    const done = Math.min(i + CHUNK, total);
    prog(Math.round((i/total)*92)+4,
         `Batch ${Math.floor(i/CHUNK)+1} — ${done.toLocaleString()}/${total.toLocaleString()}`);
    setS(`Processing ${done.toLocaleString()} / ${total.toLocaleString()}…`);
    try {
      const rp = await fetch('?api=1', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({items: raw.slice(i, i+CHUNK), reports: selectedReports}),
      });
      const j = await rp.json();
      if (j.status === 'success') { res.push(...j.data); sms += (j.process_ms||0); }
      else { alert('Error: '+(j.message||'?')); break; }
    } catch(e) { console.error(e); toast('❌ Request failed'); }
  }

  prog(100, 'Done');
  await sleep(60);
  renderStats(res, sms || Math.round(performance.now()-t0));
  draw();
  document.getElementById('sg').style.display = 'grid';
  document.getElementById('fr').style.display = 'flex';
  document.getElementById('expBtn').classList.remove('hide');
  document.getElementById('pw1').classList.remove('on');
  btn.textContent = '▶ Run Analysis'; btn.disabled = false;
  const hc = res.filter(r => r.method==='HUMAN-CHECK').length;
  setS(`✓ ${total.toLocaleString()} rows · ${Math.round(performance.now()-t0)}ms · ${hc} need human review`);
  toast(`✅ Done — ${total.toLocaleString()} rows`);
}

// ── STATS ─────────────────────────────────────────────────────────────────────
function renderStats(data, ms) {
  const tot = data.length;
  const e   = data.filter(r => r.method==='EXACT').length;
  const m   = data.filter(r => r.method==='BRAND-MATCH').length;
  const ma  = data.filter(r => r.method==='MASTER-MATCH').length;
  const ai  = data.filter(r => r.method==='AI-RESOLVED').length;
  const dc  = data.filter(r => r.method==='DELETE-CHECK').length;
  const h   = data.filter(r => r.method==='HUMAN-CHECK').length;
  const n   = data.filter(r => r.method==='NONE').length;
  const d   = data.filter(r => r.method==='DELETE').length;
  const resolved = e + m + ma + ai + dc;
  const denom    = tot - d || 1;
  const acc      = tot > 0 ? ((resolved/denom)*100).toFixed(1) : 0;
  const p = v => tot > 0 ? `${((v/tot)*100).toFixed(1)}%` : '—';

  set('ss-tot', tot.toLocaleString());
  set('ss-e',   e.toLocaleString());            set('ss-e-p', p(e));
  set('ss-m',   (m+ma+ai+dc).toLocaleString()); set('ss-m-p', p(m+ma+ai+dc));
  set('ss-h',   (h+n).toLocaleString());        set('ss-h-p', p(h+n));
  set('ss-d',   d.toLocaleString());
  set('ss-ac',  acc+'%');
  set('ss-rp',  selectedReports.length);
  set('ss-t',   ms ? ms.toLocaleString()+'ms' : '—');
}

// ── TABLE RENDER ──────────────────────────────────────────────────────────────
const TAG = {
  'EXACT':'tg-e', 'BRAND-MATCH':'tg-m', 'MASTER-MATCH':'tg-a',
  'AI-RESOLVED':'tg-x', 'DELETE-CHECK':'tg-dc',
  'DELETE':'tg-d', 'HUMAN-CHECK':'tg-h', 'NONE':'tg-h',
};

/**
 * CHANGE 2 + 3: Build the Method cell HTML.
 * For HUMAN-CHECK and DELETE, append a Google Search link
 * using "Raw Brand Raw Category" as the query.
 */
function methodCell(r) {
  const method = r.method;
  const cls    = TAG[method] || 'tg-h';
  const label  = method === 'NONE' ? 'HUMAN-CHECK' : method;
  const tag    = `<span class="tag ${cls}">${esc(label)}</span>`;

  if (method === 'HUMAN-CHECK' || method === 'NONE' || method === 'DELETE') {
    const q   = encodeURIComponent(((r.rb||'') + ' ' + (r.rc||'')).trim());
    const url = `https://www.google.com/search?q=${q}`;
    const link = `<a href="${url}" target="_blank" rel="noopener" class="search-link" title="Google Search: ${esc(r.rb)} ${esc(r.rc)}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>Search
    </a>`;
    return tag + link;
  }
  return tag;
}

function setF(type, el) {
  curF = type;
  document.querySelectorAll('.filt').forEach(b => b.className='filt');
  const m = {ALL:'fa', EXACT:'fe', 'BRAND-MATCH':'fm', 'HUMAN-CHECK':'fh', DELETE:'fd'};
  el.className = 'filt ' + (m[type]||'fa');
  draw();
}

function draw() {
  const q = (document.getElementById('srch').value||'').toUpperCase().trim();
  let d = res;
  if (curF !== 'ALL') {
    if (curF === 'HUMAN-CHECK') d = d.filter(r => r.method==='HUMAN-CHECK' || r.method==='NONE');
    else d = d.filter(r => r.method === curF);
  }
  if (q) d = d.filter(r => [r.rb,r.rc,r.cb,r.cc].some(v => (v||'').toUpperCase().includes(q)));
  if (!d.length) {
    document.getElementById('tb').innerHTML =
      '<tr><td colspan="6"><div class="empty"><div class="ei">🔍</div>No rows match filter</div></td></tr>';
    return;
  }
  const MAX = 2000, shown = d.slice(0, MAX);
  document.getElementById('tb').innerHTML = shown.map((r,i) => `<tr>
    <td class="tn">${i+1}</td>
    <td class="tr2">${esc(r.rb)}</td>
    <td class="tr2">${esc(r.rc)}</td>
    <td class="tcb">${esc(r.cb)}</td>
    <td class="tcc2">${esc(r.cc)}</td>
    <td class="tc3">${methodCell(r)}</td>
  </tr>`).join('') +
  (d.length > MAX ? `<tr><td colspan="6" style="text-align:center;padding:10px;font-family:'IBM Plex Mono',monospace;font-size:10px;color:var(--mu)">Showing first ${MAX.toLocaleString()} of ${d.length.toLocaleString()} — export for full data</td></tr>` : '');
}

// ── EXPORT ────────────────────────────────────────────────────────────────────
function doExport() {
  if (!res.length) return;
  // Build the search URL column for HUMAN-CHECK and DELETE rows
  const rows = [['Raw Brand','Raw Category','Corrected Brand','Corrected Category','Method','Google Search']];
  res.forEach(r => {
    const needsLink = r.method==='HUMAN-CHECK' || r.method==='NONE' || r.method==='DELETE';
    const gUrl = needsLink
      ? `https://www.google.com/search?q=${encodeURIComponent(((r.rb||'')+' '+(r.rc||'')).trim())}`
      : '';
    rows.push([r.rb, r.rc, r.cb, r.cc,
               r.method==='NONE'?'HUMAN-CHECK':r.method,
               gUrl]);
  });
  const ws = XLSX.utils.aoa_to_sheet(rows);
  ws['!cols'] = [22, 26, 26, 32, 16, 50].map(w => ({wch:w}));

  const tot = res.length;
  const cnt = k => res.filter(r => r.method===k).length;
  const e  = cnt('EXACT'), m = cnt('BRAND-MATCH'), ma = cnt('MASTER-MATCH');
  const ai = cnt('AI-RESOLVED'), dc = cnt('DELETE-CHECK');
  const h  = cnt('HUMAN-CHECK') + cnt('NONE'), d = cnt('DELETE');
  const acc = (((e+m+ma+ai+dc)/(tot-d||1))*100).toFixed(1)+'%';

  const ws2 = XLSX.utils.aoa_to_sheet([
    ['Metric','Count','%'],
    ['Total', tot, '100%'],
    ['EXACT', e, pct(e,tot)],
    ['BRAND-MATCH (incl. Master/AI/DC)', m+ma+ai+dc, pct(m+ma+ai+dc,tot)],
    ['HUMAN-CHECK (needs manual review)', h, pct(h,tot)],
    ['DELETE (confirmed)', d, pct(d,tot)],
    [''],
    ['Accuracy (excl. confirmed DELETE)', acc, ''],
    ['Reports used', selectedReports.join(', '), ''],
    ['Engine', 'TRA v6.7', ''],
    ['Generated', new Date().toLocaleString(), ''],
  ]);
  ws2['!cols'] = [{wch:42},{wch:30},{wch:12}];

  const wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws,  'TRA Results');
  XLSX.utils.book_append_sheet(wb, ws2, 'Summary');
  XLSX.writeFile(wb, `TRA_v6_6_${Date.now()}.xlsx`);
  toast('📥 Exported');
}

function doClear() {
  raw = []; res = [];
  document.getElementById('rawF').value = '';
  document.getElementById('rawName').textContent = 'Click to upload (CSV / XLSX)';
  document.getElementById('uzZone').classList.remove('loaded');
  document.getElementById('runBtn').disabled = true;
  document.getElementById('expBtn').classList.add('hide');
  document.getElementById('sg').style.display = 'none';
  document.getElementById('fr').style.display = 'none';
  document.getElementById('tb').innerHTML = '<tr><td colspan="6"><div class="empty"><div class="ei">📂</div>Upload raw file, configure reports, then click Run Analysis</div></td></tr>';
  document.getElementById('lkRes').style.display = 'none';
  setS(''); curF = 'ALL';
}

// ── HELPERS ───────────────────────────────────────────────────────────────────
function esc(s) {
  return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}
function sleep(ms)   { return new Promise(r => setTimeout(r, ms)); }
function setS(m)     { document.getElementById('smsg').textContent = m; }
function set(id, v)  { const e = document.getElementById(id); if(e) e.textContent = v; }
function pct(n, t)   { return t > 0 ? `${((n/t)*100).toFixed(1)}%` : '—'; }
function prog(pctv, lbl) {
  document.getElementById('pw1').classList.add('on');
  document.getElementById('pf1').style.width = pctv + '%';
  if (lbl) document.getElementById('pl1').textContent = lbl;
  document.getElementById('pp1').textContent = pctv + '%';
}
function toast(m) {
  const e = document.getElementById('toast');
  e.textContent = m; e.classList.add('on');
  setTimeout(() => e.classList.remove('on'), 3200);
}
</script>
</body>
</html>
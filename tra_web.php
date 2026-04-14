<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title>Syndicated Market Research Firm - Trust Research Advisory</title>
<meta name="description" content="Elevate your business with TRA, a leading market research firm. Gain valuable insights and make informed decisions for success.">
<link rel="icon" href="Img/favicon-96x96.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- ===== ASK TRA STYLES (Added) ===== -->
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #F8FAFE;
            color: #1E293B;
        }
        .tra-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
			margin-bottom: -25px;
        }
        /* ASK TRA Hero */
        .ask-hero {
            text-align: center;
            margin-bottom: 2rem;
        }
        .ask-hero h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #F97316, #EA580C);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.02em;
        }
        .ask-hero p {
            color: #475569;
            margin-top: 0.5rem;
        }
        /* Toggle Card */
        .toggle-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #E9EDF2;
           /*  margin-bottom: 2rem; */
        }
        .toggle-header {
            background: linear-gradient(95deg, #1E293B 0%, #0F172A 100%);
            padding: 5px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .toggle-header:hover {
            background: #1E293B;
        }
        .toggle-title {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }
        .toggle-title i {
            color: #F97316;
            font-size: 1.4rem;
        }
        .toggle-arrow {
            background: rgba(255,255,255,0.12);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .toggle-arrow i {
            color: #F97316;
            font-size: 1.2rem;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .toggle-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
        }
        .toggle-content.open {
            max-height: 3200px;
        }
        /* Query Interface */
        .query-wrapper {
            padding: 2rem;
            background: #FFFFFF;
            border-bottom: 1px solid #EEF2F6;
        }
        .two-col-query {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        .history-panel {
            background: #FAFCFE;
            border-radius: 20px;
            padding: 1.2rem;
        }
        .section-mini-title {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #F97316;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .query-history-item {
            background: white;
            border: 1px solid #EFF3F8;
            border-radius: 14px;
            padding: 0.8rem 1rem;
            margin-bottom: 0.7rem;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
        }
        .query-history-item:hover {
            background: #FFF4ED;
            border-color: #F97316;
            transform: translateX(6px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.1);
        }
        .search-group {
            display: flex;
            gap: 12px;
            margin-top: 1.5rem;
        }
        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid #E9EDF2;
            border-radius: 18px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.25s ease;
        }
        .search-input:focus {
            border-color: #F97316;
            outline: none;
            box-shadow: 0 0 0 5px rgba(249,115,22,0.15);
        }
        .btn-ask {
            background: linear-gradient(105deg, #F97316, #EA580C);
            border: none;
            padding: 0 32px;
            border-radius: 18px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(249,115,22,0.3);
        }
        .btn-ask:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.4);
        }
        .btn-ask:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        /* Response Card */
        .response-card {
            background: white;
            border-radius: 20px;
            border: 1px solid #EEF2F6;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.03);
            animation: fadeInScale 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @keyframes fadeInScale {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }
        .response-header {
            background: linear-gradient(95deg, #1F3A3A, #0F2A2A);
            padding: 1.3rem 1.6rem;
            color: white;
        }
        .rank-badge-lg {
            background: #F97316;
            display: inline-block;
            padding: 6px 20px;
            border-radius: 40px;
            font-weight: 800;
            font-size: 1.1rem;
        }
        /* Rankings Grid */
        .rankings-full-grid {
            padding: 2rem;
            background: #FEFEFE;
        }
        .grid-3col {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.8rem;
            margin-bottom: 2.5rem;
        }
        .rank-card {
            background: white;
            border-radius: 24px;
            border: 1px solid #EDF2F7;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .rank-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }
        .rank-card-header {
            background: #0F172A;
            padding: 1.1rem 1.4rem;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }
        .rank-list-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.85rem 1.2rem;
            border-bottom: 1px solid #F1F5F9;
        }
        .rank-list-item:last-child {
            border-bottom: none;
        }
        .rank-number {
            width: 32px;
            height: 32px;
            background: #F1F5F9;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.85rem;
        }
        .rank-number.top {
            background: #F97316;
            color: white;
        }
        .leader-cat {
            background: #FFF7ED;
            padding: 0.35rem 0.9rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            color: #EA580C;
        }
        /* Bottom Navigation */
        .bottom-nav {
            background: white;
            border-radius: 60px;
            border: 1px solid #E9EDF2;
            padding: 0.9rem 2.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.04);
        }
        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #334155;
            padding: 8px 16px;
            border-radius: 50px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .nav-item:hover {
            background: #FFF4ED;
            color: #F97316;
        }
        .nav-item i {
            color: #F97316;
        }
        .scroll-top {
            background: linear-gradient(105deg, #F97316, #EA580C);
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(249,115,22,0.3);
        }
        .scroll-top:hover {
            transform: scale(1.1);
        }
        /* Loading Animation */
        .loading {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 2rem;
            color: #F97316;
        }
        .loading-spinner {
            animation: spin 1.2s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        /* Responsive */
        @media (max-width: 1000px) {
            .two-col-query { grid-template-columns: 1fr; gap: 1.5rem; }
            .grid-3col { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .grid-3col { grid-template-columns: 1fr; }
            .search-group { flex-direction: column; }
            .btn-ask { justify-content: center; padding: 14px 0; width: 100%; }
            .toggle-header { padding: 5px 20px; }
        }
    </style>

<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{--red:#D71920;--red-dark:#B5151B;--red-light:#FDE8E9;--red-glow:rgba(215,25,32,.07);--dark:#1A1A2E;--text:#2D2D3A;--text-sec:#4A4A5A;--text-muted:#7B7B8B;--bg:#fff;--bg-alt:#F7F8FA;--border:#E8E8ED;--border-lt:#F0F0F4;--sh-sm:0 2px 8px rgba(0,0,0,.04);--sh:0 4px 24px rgba(0,0,0,.06);--sh-hover:0 12px 40px rgba(0,0,0,.1);--radius:12px;--radius-lg:20px;--nav-h:68px;--max-w:1280px;--sec-pad:45px;--tr:.3s cubic-bezier(.4,0,.2,1)}
html{scroll-behavior:smooth;scroll-padding-top:var(--nav-h)}
body{font-family:'DM Sans',sans-serif;font-size:15px;line-height:1.7;color:var(--text);background:var(--bg);overflow-x:hidden;-webkit-font-smoothing:antialiased}
img{max-width:100%;display:block}a{text-decoration:none;color:inherit;transition:color var(--tr)}ul,ol{list-style:none}
.container{width:100%;max-width:var(--max-w);margin:0 auto;padding:0 24px}
h1,h2,h3,h4,h5,h6{font-family:'Sora',sans-serif;font-weight:700;line-height:1.2;color:var(--dark)}
h1{font-size:clamp(2rem,4.5vw,3.4rem);letter-spacing:-.03em}
h2{font-size:clamp(1.6rem,3vw,2.4rem);letter-spacing:-.02em}
h3{font-size:clamp(1.05rem,1.6vw,1.25rem)}
.sec-label{font-family:'Sora',sans-serif;font-size:21px;font-weight:800;letter-spacing:.14em;text-transform:uppercase;color:orange;display:inline-flex;align-items:center;gap:10px;margin-bottom:14px}
.sec-label::before{content:'';width:24px;height:2px;background:orange;border-radius:2px}
.sec-desc{color:var(--text-muted);font-size:1rem;/* max-width:600px; */line-height:1.8}
.nav{position:fixed;top:0;left:0;right:0;height:var(--nav-h);z-index:1000;transition:background var(--tr),box-shadow var(--tr),backdrop-filter var(--tr)}
.nav.scrolled{background:rgba(255,255,255,.9);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);box-shadow:0 1px 0 var(--border)}
.nav-inner{display:flex;align-items:center;justify-content:space-between;height:100%;max-width:var(--max-w);margin:0 auto;padding:0 24px}
.nav-logo{font-family:'Sora',sans-serif;font-size:1.5rem;font-weight:200;letter-spacing:-.04em;color:var(--dark);display:flex;align-items:center;gap:8px}
.nav-logo img{height:32px;width:auto}
/* .nav-logo span{color:var(--red)} */
.nav-links{display:flex;align-items:center;gap:2px;flex-wrap:wrap;justify-content:flex-end}
.nav-links a{font-size:.78rem;font-weight:500;color:var(--text-sec);padding:7px 11px;border-radius:6px;transition:all var(--tr);white-space:nowrap}
.nav-links a:hover,.nav-links a.active{color:#fff;background:#FFC000;}
.hamburger{display:none;flex-direction:column;justify-content:center;align-items:center;width:42px;height:42px;border:none;background:0 0;cursor:pointer;border-radius:8px;z-index:1100}
.hamburger:hover{background:var(--bg-alt)}
.hamburger span{display:block;width:20px;height:2px;background:var(--dark);border-radius:2px;transition:all .35s cubic-bezier(.4,0,.2,1)}
.hamburger span+span{margin-top:5px}
.hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.hamburger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.mobile-menu{display:none;position:fixed;top:0;right:0;width:100%;height:100vh;height:100dvh;background:rgba(255,255,255,.98);backdrop-filter:blur(24px);z-index:1050;opacity:0;pointer-events:none;transition:opacity .35s}
.mobile-menu.open{opacity:1;pointer-events:all}
.mobile-menu-links{display:flex;flex-direction:column;justify-content:center;align-items:center;height:100%;gap:6px;padding:100px 24px 40px}
.mobile-menu-links a{font-family:'Sora',sans-serif;font-size:1.1rem;font-weight:600;color:var(--dark);padding:12px 24px;border-radius:var(--radius);transition:all var(--tr);text-align:center}
.mobile-menu-links a:hover{color:var(--red);background:var(--red-glow)}
.hero{position:relative;padding:calc(var(--nav-h) + 60px) 0 50px;overflow:hidden;background:var(--bg)}
.hero-grid{position:absolute;top:0;right:0;width:55%;height:100%;opacity:.03;pointer-events:none}
.hero-shape{position:absolute;border-radius:50%;pointer-events:none;filter:blur(80px)}
.hero-shape-1{width:450px;height:450px;background:var(--red);opacity:.06;top:5%;right:-5%;animation:fl1 20s ease-in-out infinite}
.hero-shape-2{width:280px;height:280px;background:var(--red);opacity:.04;bottom:10%;left:25%;animation:fl2 25s ease-in-out infinite}
@keyframes fl1{0%,100%{transform:translate(0,0) scale(1)}50%{transform:translate(-30px,25px) scale(1.08)}}
@keyframes fl2{0%,100%{transform:translate(0,0)}50%{transform:translate(25px,-18px) scale(.95)}}
.hero-inner{position:relative;z-index:2;max-width:760px}
.hero-tag{display:inline-flex;align-items:center;gap:8px;font-family:'Sora',sans-serif;font-size:.75rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--red);background:var(--red-light);padding:7px 16px;border-radius:100px;margin-bottom:28px}
.hero h1{margin-bottom:22px}
.hero h1 .hl{color:var(--red)}
.hero-desc{font-size:1.05rem;color:var(--text-sec);/* max-width:640px; */line-height:1.85;margin-bottom:32px}
.hero-matrices{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:36px}
.matrix-badge{display:inline-flex;align-items:center;gap:7px;font-family:'Sora',sans-serif;font-size:.78rem;font-weight:500;color:var(--dark);background:var(--bg-alt);border:1px solid var(--border);padding:9px 16px;border-radius:8px}
.matrix-badge i{color:var(--red);font-size:.7rem}
.hero-actions{display:flex;gap:12px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:7px;font-family:'DM Sans',sans-serif;font-size:.88rem;font-weight:600;padding:12px 24px;border-radius:8px;border:none;cursor:pointer;transition:all var(--tr);white-space:nowrap}
.btn-primary{background:var(--red);color:#fff;box-shadow:0 4px 16px rgba(215,25,32,.22)}
.btn-primary:hover{background:var(--red-dark);box-shadow:0 6px 24px rgba(215,25,32,.32);transform:translateY(-2px)}
.btn-outline{background:0 0;color:var(--dark);border:1.5px solid var(--border)}
.btn-outline:hover{border-color:var(--red);color:var(--red);background:var(--red-glow);transform:translateY(-2px)}
.btn-sm{padding:8px 16px;font-size:.82rem}
.btn i{font-size:.75rem;transition:transform var(--tr)}
.btn:hover i{transform:translateX(3px)}
.section{padding:var(--sec-pad) 0}
.section-alt{background:var(--bg-alt)}
.sec-head{margin-bottom:15px}
.card{background:var(--bg);border-radius:var(--radius);border:1px solid var(--border-lt);overflow:hidden;transition:all var(--tr)}
.card:hover{box-shadow:var(--sh-hover);border-color:transparent;transform:translateY(-4px)}
.bs-layout{display:flex;gap:0;align-items:flex-start}
.bs-col{flex:0 0 68%;max-width:68%}
.bd-col{flex:0 0 32%;padding-left:20px}
.bs-divider{flex:0 0 1px;background:linear-gradient(to bottom,transparent,#ddd,transparent);margin:20px 0}
.featured-card{background:#fff;border:1px solid var(--border-lt);border-radius:var(--radius-lg);padding:20px;margin-bottom:16px;box-shadow:var(--sh-sm);transition:all var(--tr)}
.featured-card:hover{box-shadow:var(--sh);transform:translateY(-2px)}
.featured-badge{display:inline-block;background:orange;color:#fff;padding:5px 12px;border-radius:4px;font-size:.68rem;font-weight:700;letter-spacing:.5px;margin-bottom:14px}
.featured-content{display:flex;gap:24px;flex-wrap:wrap}
.featured-left{flex:0 0 120px;display:flex;flex-direction:column;align-items:center;gap:14px}
.featured-profile{width:120px;height:120px;border-radius:50%;overflow:hidden;background:#f0f0f0;border:3px solid var(--border)}
.featured-profile img{width:100%;height:100%;object-fit:cover}
.featured-right{flex:1;min-width:200px}
.quote-mark{font-size:42px;color:var(--red);line-height:1;margin-bottom:6px;opacity:.5}
.quote-text{font-size:1.15rem;font-weight:700;color:var(--dark);line-height:1.5;margin-bottom:14px}
.attr-name{font-size:.88rem;font-weight:600;color:var(--dark)}
.attr-title{font-size:.78rem;color:var(--text-muted)}
.featured-actions{display:flex;gap:10px;flex-wrap:wrap;align-items:center;margin-top:14px}
.btn-persp{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:orange;color:#fff;border:none;border-radius:30px;font-size:.8rem;font-weight:600;cursor:pointer;transition:all var(--tr);font-family:inherit}
.btn-persp:hover{background:orange;transform:translateX(2px)}
.btn-bd-link{display:inline-flex;align-items:center;gap:6px;color:black;font-size:.8rem;font-weight:600;padding:8px 14px;border-radius:30px;border:1px solid orange;transition:all var(--tr)}
.btn-bd-link:hover{background:orange;color:#fff}
.persp-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
.persp-card{background:#fff;border:1px solid var(--border-lt);border-radius:var(--radius);padding:14px 12px;text-align:center;transition:all var(--tr);cursor:default}
.persp-card:hover{border-color:var(--red);box-shadow:0 8px 24px rgba(215,25,32,.1);transform:translateY(-4px)}
.persp-card.hidden{display:none}
.p-badge{display:inline-block;background:var(--dark);color:#fff;padding:3px 10px;border-radius:20px;font-size:.65rem;font-weight:700;letter-spacing:.5px;margin-bottom:10px}
.persp-profile{width:60px;height:60px;border-radius:50%;overflow:hidden;margin:0 auto 10px;background:#f0f0f0;border:2px solid var(--border)}
.persp-profile img{width:100%;height:100%;object-fit:cover}
.persp-quote{font-size:.82rem;font-style:italic;color:var(--text);margin-bottom:10px;line-height:1.45}
.p-meta-name{font-size:.8rem;font-weight:700;color:var(--dark)}
.p-meta-title{font-size:.68rem;color:var(--text-muted)}
.persp-company{display:flex;align-items:center;justify-content:center;gap:6px;margin:10px 0;padding:6px;background:var(--bg-alt);border-radius:30px}
.persp-company img{max-width:50px;max-height:24px;object-fit:contain}
.persp-company span{font-size:.65rem;color:var(--text-muted)}
.btn-read-p{display:inline-block;background:none;border:none;color:var(--red);font-size:.78rem;font-weight:600;cursor:pointer;transition:all var(--tr);font-family:inherit;margin-top:6px}
.btn-read-p:hover{text-decoration:underline}
.view-more-wrap{text-align:center;margin-top:28px}
.btn-view-more{display:inline-flex;align-items:center;gap:8px;padding:11px 26px;background:0 0;border:2px solid orange;color:black;border-radius:40px;font-size:.85rem;font-weight:600;cursor:pointer;transition:all var(--tr);font-family:inherit}
.btn-view-more:hover{background:orange;color:#fff;transform:translateY(-2px);box-shadow:0 4px 12px rgba(215,25,32,.25)}
.btn-view-more .icon{transition:transform var(--tr)}
.btn-view-more.less .icon{transform:rotate(180deg)}
.bd-header{display:flex;justify-content:space-between;align-items:flex-start;gap:10px;margin-bottom:18px;flex-wrap:wrap}
.yt-link{display:flex;align-items:center;gap:7px;font-size:.78rem;font-weight:600;color:var(--text-sec);text-decoration:none;transition:opacity var(--tr)}
.yt-link:hover{opacity:.7}
.yt-icon{width:16px;height:16px;flex-shrink:0}
.featured-video{background:#fff;border:1px solid var(--border-lt);border-radius:var(--radius);overflow:hidden;margin-bottom:12px;cursor:pointer;transition:all var(--tr)}
.featured-video:hover{box-shadow:var(--sh);transform:translateY(-2px)}
.fv-badge{display:inline-block;background:orange;color:#fff;padding:4px 10px;border-radius:4px;font-size:.65rem;font-weight:700;letter-spacing:.5px}
.fv-thumb{position:relative;width:100%;aspect-ratio:16/9;background:#000;overflow:hidden}
.fv-thumb img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.featured-video:hover .fv-thumb img{transform:scale(1.05)}
.play-ov{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,.4);opacity:0;transition:opacity var(--tr)}
.featured-video:hover .play-ov,.vd-card:hover .play-ov{opacity:1}
.play-btn{width:50px;height:50px;background:var(--red);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px}
.fv-info{padding:10px 12px}
.fv-title{font-size:.88rem;font-weight:700;color:var(--dark);margin:0 0 4px;line-height:1.4}
.fv-stats{font-size:.75rem;color:var(--text-muted);margin-bottom:8px}
.btn-watch{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;background:orange;color:#fff;border:none;border-radius:20px;font-size:.75rem;font-weight:600;cursor:pointer;transition:all var(--tr);font-family:inherit}
.btn-watch:hover{background:var(--red-dark)}
.vd-list{display:flex;flex-direction:column;gap:8px;max-height:300px;overflow-y:auto;padding-right:4px}
.vd-list::-webkit-scrollbar{width:3px}
.vd-list::-webkit-scrollbar-thumb{background:var(--red);border-radius:3px}
.vd-card{display:flex;gap:10px;padding:6px;background:var(--bg-alt);border:1px solid var(--border-lt);border-radius:10px;cursor:pointer;transition:all var(--tr)}
.vd-card:hover{background:#fff;border-color:var(--red);transform:translateX(3px);box-shadow:var(--sh-sm)}
.vd-thumb{position:relative;flex:0 0 110px;height:68px;border-radius:5px;overflow:hidden;background:#000}
.vd-thumb img{width:100%;height:100%;object-fit:cover}
.play-sm{width:28px;height:28px;background:var(--red);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:10px}
.vd-info{flex:1;overflow:hidden}
.vd-title{font-size:.75rem;font-weight:600;color:var(--dark);line-height:1.35;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin:0 0 4px}
.vd-stats{font-size:.68rem;color:var(--text-muted)}
.view-all-wrap{text-align:center;padding-top:12px;border-top:1px solid var(--border)}
.view-all-link{font-size:.8rem;font-weight:600;color:var(--text-muted);transition:color var(--tr)}
.view-all-link:hover{color:var(--red)}
.carousel-wrap{position:relative}
.carousel-track{display:flex;gap:20px;overflow-x:auto;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;padding:10px 0 20px;scrollbar-width:none}
.carousel-track::-webkit-scrollbar{display:none}
.rpt-card{flex:0 0 260px;scroll-snap-align:start;border-radius:var(--radius);overflow:hidden;border:1px solid var(--border-lt);background:#fff;transition:all var(--tr);cursor:default}
.rpt-card:hover{box-shadow:var(--sh-hover);border-color:transparent;transform:translateY(-6px)}
.rpt-cover{aspect-ratio:3/4;overflow:hidden;background:var(--bg-alt);position:relative}
.rpt-cover img{width:100%;height:100%;object-fit:cover;transition:transform .6s}
.rpt-card:hover .rpt-cover img{transform:scale(1.04)}
.rpt-cover-ov{position:absolute;bottom:0;left:0;right:0;height:55%;background:linear-gradient(to top,rgba(26,26,46,.85),transparent);pointer-events:none}
.rpt-info{position:absolute;bottom:0;left:0;right:0;padding:20px;z-index:2}
.rpt-tag{font-family:'Sora',sans-serif;font-size:.62rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:6px}
.rpt-title{font-family:'Sora',sans-serif;font-size:.95rem;font-weight:700;color:#fff;line-height:1.35;margin-bottom:12px}
.rpt-links{display:flex;flex-wrap:wrap;gap:6px}
.rpt-link{display:inline-block;padding:5px 12px;background:rgba(255,255,255,.15);backdrop-filter:blur(8px);border-radius:20px;color:#fff;font-size:.7rem;font-weight:500;transition:all var(--tr)}
.rpt-link:hover{background:var(--red);transform:translateY(-1px)}
.carousel-nav{display:flex;justify-content:center;gap:10px;margin-top:20px}
.carousel-btn{width:44px;height:44px;border-radius:50%;border:1.5px solid var(--border);background:#fff;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all var(--tr);color:var(--text-sec);font-size:.85rem}
.carousel-btn:hover{border-color:var(--red);color:var(--red);background:var(--red-glow)}
.kn-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px}
.kn-card{background:#fff;border-radius:var(--radius);border:1px solid var(--border-lt);overflow:hidden;transition:all var(--tr)}
.kn-card:hover{box-shadow:var(--sh-hover);border-color:transparent;transform:translateY(-4px)}
.kn-thumb{aspect-ratio:16/10;overflow:hidden;background:var(--bg-alt)}
.kn-thumb img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.kn-card:hover .kn-thumb img{transform:scale(1.05)}
.kn-body{padding:16px}
.kn-title{font-family:'Sora',sans-serif;font-size:.82rem;font-weight:600;color:var(--dark);line-height:1.4;margin-bottom:12px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.kn-links{display:flex;gap:6px;flex-wrap:wrap}
.kn-link{display:inline-block;padding:5px 12px;background:#FFC000;border-radius:20px;color:#fff;font-size:.7rem;font-weight:600;transition:all var(--tr)}
.kn-link:hover{background:orange;color:#fff;transform:translateY(-1px)}
.cr-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:28px}
.cr-card{background:#fff;border-radius:var(--radius-lg);border:1px solid var(--border-lt);padding:36px;transition:all var(--tr);position:relative;overflow:hidden}
.cr-card::before{content:'';position:absolute;top:0;left:0;width:4px;height:100%;background:var(--red);opacity:0;transition:opacity var(--tr)}
.cr-card:hover{box-shadow:var(--sh-hover);border-color:transparent;transform:translateY(-4px)}
.cr-card:hover::before{opacity:1}
.cr-img{width:100%;border-radius:var(--radius);margin-bottom:20px;object-fit:cover;max-height:220px}
.cr-card h3{margin-bottom:14px}
.cr-card p{color:var(--text-muted);font-size:.9rem;line-height:1.8;margin-bottom:20px}
.cr-actions{display:flex;gap:10px}
.lic-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:28px}
.lic-card{position:relative;border-radius:var(--radius-lg);overflow:hidden;min-height:320px;display:flex;flex-direction:column;justify-content:flex-end;cursor:default}
.lic-card-bg{position:absolute;inset:0;background:var(--bg-alt);display:flex;align-items:center;justify-content:center;padding:40px}
.lic-card-bg img{max-width:180px;max-height:180px;object-fit:contain;opacity:.15;filter:grayscale(1)}
.lic-card-ov{position:absolute;inset:0;background:linear-gradient(to top,rgba(26,26,46,.92) 0%,rgba(26,26,46,.4) 60%,transparent);transition:background var(--tr)}
.lic-card:hover .lic-card-ov{background:linear-gradient(to top,rgba(215,25,32,.88),rgba(215,25,32,.35) 60%,transparent)}
.lic-card-content{position:relative;z-index:2;padding:32px}
.lic-label{font-family:'Sora',sans-serif;font-size:.68rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.55);margin-bottom:8px}
.lic-title{font-family:'Sora',sans-serif;font-size:1.4rem;font-weight:700;color:#fff;margin-bottom:8px}
.lic-desc{font-size:.88rem;color:rgba(255,255,255,.7);line-height:1.7}
.lic-notice{margin-top:40px;background:#fff;border-radius:var(--radius);border:1px solid var(--border-lt);padding:32px}
.lic-notice h3{font-size:1.1rem;margin-bottom:14px;color:orange}
.lic-notice p{color:var(--text-sec);font-size:.9rem;line-height:1.8}
.lic-link-row{text-align:center;margin-top:28px}
.lic-link-row a{font-family:'Sora',sans-serif;font-size:.9rem;font-weight:600;color:orange;border-bottom:2px solid var(--red);padding-bottom:2px;transition:all var(--tr)}
.lic-link-row a:hover{color:orange;border-color:var(--red-dark)}
.excerpts-track{display:flex;gap:20px;overflow-x:auto;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;padding:10px 0 20px;scrollbar-width:none}
.excerpts-track::-webkit-scrollbar{display:none}
.excerpt-card{flex:0 0 340px;scroll-snap-align:start;border-radius:var(--radius);overflow:hidden;border:1px solid var(--border-lt);background:#fff;transition:all var(--tr)}
.excerpt-card:hover{box-shadow:var(--sh-hover);transform:translateY(-4px)}
.excerpt-img{aspect-ratio:16/9;overflow:hidden;background:var(--bg-alt)}
.excerpt-img img{width:100%;height:100%;/* object-fit:cover; */transition:transform .5s}
.excerpt-card:hover .excerpt-img img{transform:scale(1.05)}
.excerpt-label{padding:12px 16px;font-family:'Sora',sans-serif;font-size:.78rem;font-weight:600;color:var(--dark)}
.about-grid{display:grid;grid-template-columns:1.2fr 1fr;gap:50px;align-items:start}
.about-text p{color:var(--text-sec);font-size:.95rem;line-height:1.85;margin-bottom:16px}
.about-contact{background:#fff;border-radius:var(--radius-lg);border:1px solid var(--border-lt);padding:36px}
.about-contact h3{margin-bottom:24px}
.ci-item{display:flex;align-items:flex-start;gap:14px;margin-bottom:20px}
.ci-item:last-child{margin-bottom:0}
.ci-icon{width:38px;height:38px;border-radius:8px;background:var(--red-light);display:flex;align-items:center;justify-content:center;color:var(--red);font-size:.8rem;flex-shrink:0;margin-top:2px}
.ci-label{font-size:.72rem;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:.06em;margin-bottom:3px}
.ci-value{font-size:.9rem;color:var(--dark);font-weight:500;line-height:1.6}
.ci-value a{color:var(--red)}
.ci-value a:hover{text-decoration:underline}
.about-socials{display:flex;gap:8px;margin-top:20px;flex-wrap:wrap}
.about-socials a{display:inline-flex;align-items:center;gap:6px;padding:6px 14px;background:var(--bg-alt);border:1px solid var(--border-lt);border-radius:20px;font-size:.75rem;font-weight:500;color:var(--text-sec);transition:all var(--tr)}
.about-socials a:hover{border-color:var(--red);color:var(--red);background:var(--red-glow)}
.footer{background:var(--dark);padding:50px 0 0;color:rgba(255,255,255,.55)}
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr;gap:40px;padding-bottom:40px;border-bottom:1px solid rgba(255,255,255,.07)}
.footer-brand{font-family:'Sora',sans-serif;font-size:1.3rem;font-weight:800;color:#fff;margin-bottom:14px;letter-spacing:-.03em}
.footer-brand span{color:#fff}
.footer-desc{color:#fff;font-size:.85rem;line-height:1.75;max-width:320px;margin-bottom:20px}
.footer-socials{display:flex;gap:8px;color:#fff}
.footer-socials a{width:36px;height:36px;border-radius:8px;border:1px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;font-size:.8rem;color:rgba(255,255,255,.45);transition:all var(--tr)}
.footer-socials a:hover{background:var(--red);border-color:var(--red);color:#fff}
.footer-col-title{font-family:'Sora',sans-serif;font-size:.72rem;font-weight:600;letter-spacing:.08em;text-transform:uppercase;color:#fff;margin-bottom:16px}
.footer-col ul li{margin-bottom:10px}
.footer-col ul li a{font-size:.85rem;color:#fff;transition:color var(--tr)}
.footer-col ul li a:hover{color:#fff}
.footer-bottom{color:#fff;padding:20px 0;display:flex;align-items:center;justify-content:space-between;font-size:.78rem;flex-wrap:wrap;gap:8px}
.footer-bottom a{color:rgba(255,255,255,255)}
.footer-bottom a:hover{color:rgba(255,255,255,255)}
/* ===== PERSPECTIVE MODAL ===== */
.modal-ov{position:fixed;inset:0;background:rgba(0,0,0,.85);backdrop-filter:blur(8px);z-index:10001;display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:all .3s;padding:20px}
.modal-ov.active{opacity:1;visibility:visible}
.modal-box{position:relative;width:100%;max-width:850px;max-height:85vh;background:#fff;border-radius:20px;overflow:hidden;transform:scale(.95);transition:transform .3s;box-shadow:0 30px 60px rgba(0,0,0,.3);display:flex;flex-direction:column}
.modal-ov.active .modal-box{transform:scale(1)}
.modal-close{position:absolute;top:16px;right:16px;width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.2);color:#fff;border:none;font-size:20px;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:10;transition:all var(--tr)}
.modal-close:hover{background:rgba(255,255,255,.35);transform:rotate(90deg)}
.modal-top-bar{height:6px}
.modal-head{padding:28px 28px 20px;display:flex;align-items:center;gap:20px;flex-wrap:wrap}
.modal-sp-img{width:90px;height:90px;border-radius:50%;overflow:hidden;border:3px solid rgba(255,255,255,.25);flex-shrink:0}
.modal-sp-img img{width:100%;height:100%;object-fit:cover}
.modal-sp-info{flex:1;color:#fff}
.modal-sp-name{font-size:1.3rem;font-weight:700;margin:0 0 6px}
.modal-sp-title{font-size:.85rem;opacity:.9;margin-bottom:3px}
.modal-sp-company{font-size:.8rem;opacity:.75}
.modal-logo{flex-shrink:0}
.modal-logo img{max-width:90px;max-height:50px;object-fit:contain}
.modal-body{padding:0 28px 20px;overflow-y:auto;max-height:calc(85vh - 200px)}
.modal-body::-webkit-scrollbar{width:4px}
.modal-body::-webkit-scrollbar-thumb{background:var(--red);border-radius:4px}
.q-header{background:#f8f8f8;padding:10px 18px;margin:0 -28px 18px;border-bottom:1px solid #eee}
.q-header h3{font-size:1rem;font-weight:600;margin:0;color:var(--red)}
.m-content{font-size:.92rem;line-height:1.65;color:#333}
.m-content strong{color:#111}
.m-content ul,.m-content ol{padding-left:20px;margin:10px 0}
.m-content li{margin-bottom:6px}
.modal-foot{padding:16px 28px;background:#f8f8f8;border-top:1px solid #eee;text-align:right;flex-shrink:0}
.modal-foot-btn{padding:9px 24px;background:var(--red);color:#fff;border:none;border-radius:30px;cursor:pointer;font-size:.82rem;font-weight:600;transition:all var(--tr);font-family:inherit}
.modal-foot-btn:hover{background:var(--red-dark)}
/* ===== VIDEO MODAL ===== */
.vm-ov{position:fixed;inset:0;background:rgba(0,0,0,.92);backdrop-filter:blur(12px);z-index:10000;display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:all .3s;padding:20px}
.vm-ov.active{opacity:1;visibility:visible}
.vm-box{width:100%;max-width:900px;background:#fff;border-radius:20px;overflow:hidden;transform:scale(.95);transition:transform .3s}
.vm-ov.active .vm-box{transform:scale(1)}
.vm-head{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid #eee}
.vm-title{font-size:.95rem;font-weight:600;margin:0;flex:1;padding-right:12px}
.vm-close{width:34px;height:34px;border-radius:50%;border:none;background:#f0f0f0;cursor:pointer;font-size:16px;transition:all var(--tr);display:flex;align-items:center;justify-content:center}
.vm-close:hover{background:var(--red);color:#fff}
.vm-player{position:relative;background:#000;aspect-ratio:16/9}
.vm-player iframe{position:absolute;inset:0;width:100%;height:100%;border:none}
.vm-foot{padding:12px 20px;display:flex;align-items:center;justify-content:space-between;background:#fafafa;border-top:1px solid #eee}
.vm-yt-link{display:inline-flex;align-items:center;gap:7px;padding:7px 16px;background:#D32F2F;color:#fff;border-radius:20px;font-size:.75rem;font-weight:500;text-decoration:none;transition:background var(--tr)}
.vm-yt-link:hover{background:#B71C1C}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .65s cubic-bezier(.4,0,.2,1),transform .65s cubic-bezier(.4,0,.2,1)}
.reveal.visible{opacity:1;transform:translateY(0)}
.rd1{transition-delay:.1s}.rd2{transition-delay:.2s}.rd3{transition-delay:.3s}.rd4{transition-delay:.4s}
@media(max-width:1100px){.persp-grid{grid-template-columns:repeat(2,1fr)}.kn-grid{grid-template-columns:repeat(2,1fr)}.footer-grid{grid-template-columns:1fr 1fr;gap:30px}.about-grid{grid-template-columns:1fr;gap:36px}}
@media(max-width:900px){.bs-layout{flex-direction:column}.bs-col,.bd-col{flex:0 0 100%;max-width:100%;padding:0}.bs-divider{display:none}.cr-grid,.lic-grid{grid-template-columns:1fr}:root{--sec-pad:64px}}
@media(max-width:768px){.nav-links{display:none}.hamburger{display:flex}.mobile-menu{display:block}.persp-grid{grid-template-columns:1fr}.kn-grid{grid-template-columns:1fr}.featured-content{flex-direction:column;text-align:center}.featured-left{flex:0 0 auto}.hero-actions{flex-direction:column}.hero-actions .btn{justify-content:center;width:100%}.hero-matrices{flex-direction:column}.footer-grid{grid-template-columns:1fr;gap:24px}.footer-bottom{flex-direction:column;text-align:center}.rpt-card{flex:0 0 220px}.excerpt-card{flex:0 0 280px}.cr-actions{flex-direction:column}}
@media(max-width:480px){.container{padding:0 16px}.rpt-card{flex:0 0 200px}}
@media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}html{scroll-behavior:auto}.reveal{opacity:1;transform:none}}
*:focus-visible{outline:2px solid var(--red);outline-offset:3px;border-radius:4px}
</style>
</head>
<body>

<?php
/* ============================================================
   BRAND DIALOGUES API FETCH
   ============================================================ */
$bd_apiUrl = 'https://trustadvisory.info/ztrad/tra_report/api/brand_dialogues.php';
$bd_html = @file_get_contents($bd_apiUrl);
$bd_videos = array();
$allVideos = array();
$subscriberCount = '4.3k';
$videoCount = '39';

if ($bd_html) {
    preg_match_all('/https:\/\/i\.ytimg\.com\/vi\/([a-zA-Z0-9_-]+)\/hqdefault\.jpg/', $bd_html, $idMatches);
    preg_match_all('/<h[35][^>]*>(.*?)<\/h[35]>/s', $bd_html, $titleMatches);
    preg_match_all('/(\d+(?:\.\d+)?[KMkm]?)\s*views/', $bd_html, $viewMatches);
    $uniqueIds = array_values(array_unique($idMatches[1]));
    $cleanTitles = array();
    foreach ($titleMatches[1] as $t) {
        $stripped = trim(strip_tags($t));
        if (strlen($stripped) > 10 && !preg_match('/^[0-9]+$/', $stripped)) {
            $cleanTitles[] = $stripped;
        }
    }
    $uniqueViews = array_values(array_unique($viewMatches[1]));
    $idx = 0;
    foreach ($uniqueIds as $videoId) {
        $bd_videos[] = array(
            'id'        => $videoId,
            'thumbnail' => "https://i.ytimg.com/vi/{$videoId}/mqdefault.jpg",
            'title'     => isset($cleanTitles[$idx]) ? $cleanTitles[$idx] : 'Brand Dialogue',
            'views'     => isset($uniqueViews[$idx]) ? $uniqueViews[$idx] . ' views' : '',
        );
        $idx++;
    }
    $allVideos = $bd_videos;
}
$featuredVideo = isset($allVideos[0]) ? $allVideos[0] : null;

/* ============================================================
   ALL 22 BRAND PERSPECTIVES
   ============================================================ */
$allPerspectives = array(
    array('image'=>'ADVImg/kent-maheshgupta.jpg','logo'=>'ADVBrandLogos/kent.png','quote'=>'Innovation today is responsibility, not choice.','name'=>'Mahesh Gupta','title'=>'Chairman & Managing Director','company'=>'KENT RO Systems','quoteTheme'=>'ON DESIRE','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q1. What does desire mean to you?</strong></div><div>For us, desire goes beyond aspiration—it is <strong>deep emotional trust.</strong> Desire is when a brand becomes a <strong>non-negotiable choice</strong>, driven by confidence, belief, and relevance in everyday life. At KENT, desire means being the brand families instinctively rely on to protect what matters most—their health.</div><div><strong>Q2. What are the key factors that contribute to your brand\'s desire quotient?</strong></div><div>KENT\'s desire quotient is built on four strong pillars:<ul><li><strong>Uncompromising trust</strong> earned over 25 years</li><li><strong>Proven purity,</strong> backed by NSF &amp; WQA certifications</li><li><strong>Innovation with purpose,</strong> solving everyday changing Indian water challenges</li><li><strong>Honest communication,</strong> especially around water quality, TDS, and filter life</li></ul>Together, these create not just preference, but <strong>emotional reassurance.</strong></div><div><strong>Q3. How does your brand cultivate desire among its stakeholders?</strong></div><div>We cultivate desire by being <strong>consistently responsible and relevant:</strong><ul><li>For <strong>consumers</strong>, we educate, empower, and protect</li><li>For <strong>partners and employees</strong>, we offer credibility, growth, and pride</li><li>For <strong>society</strong>, we advocate awareness around safe drinking water</li></ul></div><div><strong>Q4. How has your brand leveraged its desire in marketing communications?</strong></div><div>Our most significant communication has been \'<strong>Protect Your Family from Water-borne diseases</strong>\'/ \'<strong>Drink only 100% Pure Water</strong>\'. These campaigns transformed desire into <strong>belief and action</strong>, making KENT synonymous with safe drinking water in India.</div><div><strong>Q5. Where does Brand Desire rank among the various aspects of Brand identity?</strong></div><div>Brand desire sits at the <strong>core of our brand identity.</strong> While awareness brings familiarity and trust builds credibility, <strong>desire ensures loyalty</strong>.</div><div><strong>Q6. What would be the five most desired attributes you value in a brand?</strong></div><div><ol><li><strong>Trust</strong> – Because health and safety leave no room for doubt</li><li><strong>Authenticity</strong> – No false claims, quality products for best performance</li><li><strong>Purpose-driven innovation</strong> – Innovation must solve real problems</li><li><strong>Consistency</strong> – Delivering quality, innovative products from last 25 years</li><li><strong>Empathy</strong> – Brands must understand and care for people</li></ol></div></div></div>'),
    array('image'=>'ADVImg/LGElectronics-YoungminHwang.jpg','logo'=>'ADVBrandLogos/LG.jpg','quote'=>'Trust is earned through consistent quality.','name'=>'Youngmin Hwang','title'=>'Director, Home Appliance Solution','company'=>'LG Electronics India Ltd.','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>How do you ensure that your brand consistently delivers on its promises?</strong></div><div>At LG, trust is the foundation of everything we do. Our commitment is guided by three principles: exceptional quality, customer-first innovation, and meaningful connections.<ul><li><strong>Listening to Our Customers:</strong> We actively listen and use feedback to improve. Our refrigerators feature <strong>Smart Learner</strong> AI cooling, <strong>Wi-Fi Convertible</strong> via LG ThinQ App, and <strong>DoorCooling+TM</strong> technology.</li><li><strong>Uncompromising Quality:</strong> Every LG product goes through rigorous testing to ensure durability, performance, and sustainability.</li><li><strong>Support Beyond the Sale:</strong> We offer strong after-sales support, extended warranties, and responsive customer care.</li></ul></div><div><strong>What role does trust play for your brand?</strong></div><div>Trust is at the heart of our relationship with customers. We introduced the flagship <strong>MoodUP Refrigerator</strong> in 2025 with color changing doors and 1.7 Lakh+ color combinations.</div><div><strong>How do you differentiate your brand in terms of trustworthiness?</strong></div><div><ul><li><strong>Innovation That Matters:</strong> Our <strong>InstaView Side-by-Side Refrigerator</strong> lets you see inside by knocking twice, allowing less cold air loss.</li><li><strong>Proven Reliability:</strong> Our recognition by TRA Research is proof of our commitment.</li><li><strong>Transparency &amp; Integrity:</strong> We maintain the legacy of always delivering what customers expect from LG.</li></ul></div><div><strong>How do you use Brand Trust to drive market leadership?</strong></div><div>We introduced <strong>Bottom Freezer Refrigerators</strong> with DoorCooling+ Technology for easier access to frequently used items.</div><div><strong>How do you see trust evolving in the future?</strong></div><div>Trust will be built through digital experiences, sustainability, and personalized solutions. LG is investing in AI-powered customer support and seamless digital experiences.</div></div></div>'),
    array('image'=>'ADVImg/PrincePipes-AshokMehra.jpg','logo'=>'ADVBrandLogos/PrincePipes.jpg','quote'=>'Quality infrastructure builds trust in communities.','name'=>'Ashok Mehra','title'=>'Chief Marketing Officer','company'=>'Prince Pipes & Fittings Ltd.','quoteTheme'=>'ON DESIRE','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>Being the Most Desired Brand is crucial in today\'s competitive market. At Prince Pipes, we believe brand desirability drives consumer behavior and loyalty, leading to increased customer preference and stronger market positioning.</div><div>Over the last 40 years, Prince Pipes has become a leading brand in the piping solutions market. Our products, such as Flowguard Plus CPVC, EasyFit UPVC, and Greenfit PP-R systems, meet high manufacturing standards and address a wide range of applications across industries with a focus on sustainability.</div><div>We are in an exciting growth phase, with intensified marketing activities across India. Our high-decibel branding targets various audiences through plumber campaigns, channel partner engagements, and outreach to architects and building material influencers.</div><div>We are grateful to TRA for ranking Prince Pipes among the Top 2 Most Desired Brands in the Pipes Category in India for 2024. Additionally, we are among the top 10 in India\'s Most Desired Brands 2024 in the Manufacturing sector.</div><div>Prince Pipes is dedicated to the Indian market, consistently introducing global technological innovations that align with consumer aspirations.</div></div></div>'),
    array('image'=>'ADVImg/TTKPrestige-AnilGurnani.png','logo'=>'ADVBrandLogos/TTKPrestige.jpg','quote'=>'Innovation is the bedrock of trust.','name'=>'Anil Gurnani','title'=>'Chief Sales and Marketing Officer','company'=>'TTK Prestige','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>After years in the industry, whenever I am asked about what drives a brand\'s success, my answer can be summed up in one word: innovation!</div><div>Today\'s entrepreneurs often discuss the challenge of cultivating brand loyalty in an era of shrinking attention span. However, like Rome, loyalty can\'t be built in a day—especially in a saturated market where the target audience is constantly evolving.</div><div>Innovation is the bedrock of trust. Despite their propensity to switch sellers, consumers conduct extensive research online, comparing features, pricing, safety and more. Introducing new and useful additions to products signals to consumers that the brand truly cares about adding value to their lives.</div><div>One of the recent innovations of TTK Prestige is the <strong>Flip On Pressure Cookers</strong>—a modular design driven by changing demographics. Neither the cooks nor the kitchens are the same as they were a few decades ago. A pressure cooker lid that fits different utensils is a thoughtful invention.</div><div>Apart from establishing immediate trust through relevant feature addition, innovation is also essential for building a legacy. When companies strive to stay relevant through new initiatives, they continually reinforce their presence in the minds of consumers.</div><div>Perhaps one of the most iconic steps Prestige has taken to create a legacy of trust was in the 1960s, perfecting GRS technology to make pressure cookers safe and ubiquitous.</div><div>Today, the brand offers the country\'s most comprehensive range of non-stick cookware and controls nearly one-third of the Indian market for pressure cookers. TTK Prestige stands out as the undisputed leader in the Kitchen Appliances industry, with its closest competitor less than half its size. 700+ Prestige Xclusive stores are present across 370 towns.</div></div></div>'),
    array('image'=>'ADVImg/Amex-Sanjay.jpeg','logo'=>'ADVBrandLogos/AmericanExpress.jpg','quote'=>'Service excellence is the ultimate differentiator.','name'=>'Sanjay Khanna','title'=>'CEO & Country Manager','company'=>'American Express Banking Corp., India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>Trust is one of the most important aspects for any organization as it is a reflection of the loyalty and respect customers have for the brand. American Express began as a freight forwarding company in 1850, earning a reputation as a company people could trust while transporting some of their most valuable possessions.</div><div>The journey evolved into American Express introducing new financial products and travel services. Today, American Express is one of the largest global payments networks.</div><div>Since our earliest days, we\'ve strived to find new ways to enrich our customers\' lives and provide our special brand of service. Even as our business transformed—from freight forwarding to travel to Cards to innovative digital payment products—one thing has remained constant: our unwavering commitment to earning our customers\' loyalty.</div><div>One of the core values of American Express is to do what\'s right. We earn trust by ensuring everything we do is reliable, consistent, and with the highest level of integrity.</div><div>Our customers trust us as we put the customer first by speaking to what\'s important to them. We show that we value the customer by being personal, patient, and proactive. We make every problem easy to solve. We resolve all issues with humility and understanding.</div><div>Many of our customers don\'t see themselves as simply having or using American Express Cards. They feel they are a part of American Express. Our customers trust us to deliver on our promises.</div></div></div>'),
    array('image'=>'ADVImg/Senco-Joita.jpeg','logo'=>'ADVBrandLogos/SencoGold.jpg','quote'=>'Jewelry is emotion crafted into metal.','name'=>'Joita Sen','title'=>'Director & Head Of Marketing and Design','company'=>'Senco Gold','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. What is the most essential factor that connects your brand to your audience?</strong></div><div>Senco Gold &amp; Diamonds is one of the largest organised jewellery retail players in India. Headquartered in Kolkata, we have more than 120 stores across India. We offer a wide and unique range of gold, diamond, silver jewellery, from work wear to bridal designs catering to customers at different price points, as per regional tastes/preferences.</div><div><strong>Q. What role does trust play for your brand?</strong></div><div>Senco Gold has a rich legacy of more than 5 decades. We have been awarded the Most Trusted Brand for two years in a row. Transparency is one of the important pillars of our brand. We stringently follow the hallmarking process for all our jewellery. All our diamond jewellery is certified by Solitaire Gemological Laboratory.</div><div><strong>Q. How do you infuse trust through your brand communications?</strong></div><div>We have roped in Bollywood diva Kiara Advani as the fresh new face of our brand to reach Gen Z and millennials. We incorporated acclaimed Indian sprinter Dutee Chand as face of our \'Everlite\' collection. We also have Sourav Ganguly as our brand ambassador and have implemented a loyalty program with over 400,000 customers.</div><div><strong>Q. How do you ensure your brand consistently delivers on its promises?</strong></div><div>We take pride in maximizing the use of gold in our jewellery. Our diamond products undergo rigorous scrutiny across three levels of quality checks. Senco Gold &amp; Diamonds boasts a rich legacy spanning over 8 decades.</div><div><strong>Q. How do you differentiate your brand from competitors in terms of trustworthiness?</strong></div><div>At Senco, trust is our cornerstone. We offer lifetime maintenance, exchange and buyback guarantee. Our jewellery comes with EMIs and complimentary insurance, ensuring your precious jewellery is safeguarded.</div><div><strong>Q. How do you see trust evolving in the future?</strong></div><div>Sustainability is the future concept, which we provide through our old gold exchange, exchange of products and buy-back facility, giving customers peace of mind and confidence that translates into trust.</div></div></div>'),
    array('image'=>'ADVBTR2023/IndiaGate/IG.jpg','logo'=>'ADVBrandLogos/IndiaGate.jpg','quote'=>'Heritage and trust are the foundations of a great brand.','name'=>'Kunal Sharma','title'=>'Marketing Head','company'=>'KRBL Limited (India Gate)','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>KRBL is well-positioned to meet consumer demands for transparency in the food industry. Our heritage and traditional values align with modern preferences, and our relationships with farmers and expertise in manufacturing allow us to adapt to changing customer needs. Despite the obstacles of Covid-19, we ensured a steady supply of rice products nationwide.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Yes, consumers today expect brands to be more transparent, ethical, customer-centric, and socially responsible. The pandemic led to a change in consumer preferences with more inclination towards safe and nutrition rich products. India Gate, the flagship brand of KRBL, has been recognized as the World\'s No. 1 Basmati Rice Brand.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>At the core of our brand lies customer partnership and a strong consumer connection. We continuously strive to enhance our relevance by supporting our customers in profitable categories. We are committed to making basmati rice affordable and accessible for everyone, promoting healthier and more flavourful choices. Today, India Gate stands proudly as the world\'s number one basmati rice brand.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>Our R&amp;D team has been engaging in developing innovative and healthy rice based agro products such as India Gate Basmola Rice Bran Oil and India Gate Amaranth, which have helped KRBL gain customer trust and increase its kitchen share.</div></div></div>'),
    array('image'=>'ADVMDB2023/Dell/Dell.jpg','logo'=>'ADVBrandLogos/Dell.jpg','quote'=>'Customer insights sit at the core of all our strategies.','name'=>'Mayuri Saikia','title'=>'Director - Marketing (Consumer)','company'=>'Dell Technologies India','quoteTheme'=>'ON DESIRE','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>It is an honor for Dell Technologies to have been named India\'s Most Desired Brand for the third time in a row. This accomplishment exemplifies our attention to product quality and innovation as well as our commitment to giving our consumers the greatest possible experience.</div><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>At Dell Technologies, we are relentless in our pursuit of providing the best-in-class customer experience. We have been able to retain their trust by maintaining a constant feedback loop combined with our technological expertise. Receiving this industry honour for the fourth time in a row demonstrates our dedication to product innovation, quality, and a thorough understanding of consumer behaviour.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Consumers are more willing to connect with brands to which they can relate. We\'re seeing customers place a high value on how their data is used. A trend that fascinates me the most is the desire of customers to associate themselves with businesses that place a high priority on sustainability.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>At Dell, customer insights sit at the core of all our strategies. Our strong omnichannel approach ensures customers can find us across all touchpoints—Dell.com, Dell Exclusive Stores (DES), retail, and e-tail. We have created a robust portfolio catering to a variety of users and use cases.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>We have an extensive retail network including 632 DES, 852 Large Format Retail outlets, and over 5000 Multi Brand Outlets spread in more than 400 cities in India. Our weekly training sessions for 1,200+ ISPs cover soft skills and cross-selling techniques, enabling them to act as trusted advisors.</div></div></div>'),
    array('image'=>'ADVBTR2023/LE-CJ/LE-CJ.jpg','logo'=>'ADVBrandLogos/Lenovo.jpg','quote'=>'Smarter technology for all builds lasting trust.','name'=>'Chandrika Jain','title'=>'Director Marketing','company'=>'Lenovo India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>As the world continues to adopt and use technological innovations in new ways, from remote learning to hybrid working, Lenovo has been at the forefront of providing targeted products, services, and solutions. Lenovo is moving beyond being a devices leader to an integrated technology provider, spanning from the pocket to the cloud.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>There have been dramatic shifts in consumer behavior. We actively built our e-commerce presence, and with over 520 retail stores across the country, our presence is ubiquitous today. Lenovo.com enables customers to personalize products, ushering in a new era of hyper-personalization. We also offer CO2 Offset Service and the Asset Recovery Service.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>Our innovations are driven by direct customer feedback. We were among the first to identify the importance of providing end-to-end personalization in our product portfolio. We have dashboards that provide a 360-degree view of our customer\'s journey, allowing us to tailor our campaigns, offers, and messaging.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>Over the past year, we launched dual-screen laptops, bigger screens and 5G connectivity for tablets, and a gaming brand for aspirational gamers. In January 2023, we launched India\'s first laptop with a 13th Gen Intel chip, the Yoga 9i. We also launched our first Shared Support Center in Bengaluru. Lenovo\'s Work For Humankind project in Kanthalloor, Kerala reinforces our commitment to society.</div></div></div>'),
    array('image'=>'ADVBTR2023/LG-HEB/LG.jpg','logo'=>'ADVBrandLogos/LG.jpg','quote'=>'Innovation and creativity transform the home entertainment experience.','name'=>'Hak Hyun Kim','title'=>'VP - Home Entertainment Business','company'=>'LG Electronics India Pvt Ltd','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#333E50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>The COVID-19 pandemic dramatically changed how consumers interact with brands. Customers now expect a lot more from their products. To retain our consumer\'s trust, LG Electronics emphasized incorporating confidence, dependability, and consistency into the customer experience. We provide our customers with the best innovation and creativity that transforms their overall home entertainment experience.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Brands are founded on the equity of trust. The global pandemic fundamentally altered how consumers perceive and trust a brand. Most people were confined to their houses, spending a lot of time in front of screens. The focus of consumers sharply moved toward technical details, technology, distinctive designs, and product features. LG OLED and Rollable OLED TVs are the best choice for watching movies, streaming shows, sports, and even playing video games.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>The force of evolution, creativity and innovation is a notion we at LG Electronics India strongly believe in. The cycle starts from understanding the needs of the consumers, followed by making meaningful innovations for them, making those technology solutions accessible for purchase, and then ensuring a free-flowing channel of engagement between our consumers and us.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>LG is proud to be one of the most trusted brands in the country. The company has two manufacturing plants in Noida and Pune with a huge R&amp;D team. LG has invested in expanding its presence beyond the metro cities. The company has opened 800+ brand shops across various states and established a robust service network of 850 service centres.</div></div></div>'),
    array('image'=>'ADVBTR2023/HLG/HSJ.jpg','logo'=>'ADVBrandLogos/LG.jpg','quote'=>'AI-powered innovation creates need-based trust.','name'=>'Hyoung Sub Ji','title'=>'Director - Home Appliances','company'=>'LG Electronics India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#333E50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>Following the pandemic, digitization and accelerated adoption of advanced technology led to an increased need for varied consumer goods. LG Electronics has incorporated advanced technologies like Artificial Intelligence in the products. LG\'s range of Home Appliances, including washing machines, refrigerators and Air Conditioners, are all equipped with AI and LG ThinQ, making lives better. LG strives to introduce products that cater to varied groups across different price points.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Brand trust and transparency are some of the most important values for every consumer brand. The pandemic has transformed the dynamic between the brand and customers. People have become more conscious of the products they purchase. It is only owing to the consumer\'s trust and our ongoing efforts to make need-based innovation that LG has become a market leader in the Home Appliance Business.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>Once a consumer shows interest in the brand, it is important to provide them with accurate and detailed information about the product or service. This includes transparent pricing, product specifications, and honest reviews from other customers. The next step is to ensure a seamless buying experience. After the purchase, it is important to continue building trust through post-sales service and support.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>In recent years, LG Electronics has progressively focused on aligning with the Government\'s vision of Make in India and the Atma Nirbhar Bharat mission. Today, we have two manufacturing facilities in India, located in Pune and Greater Noida. LG has established 800+ brand stores across several states and an expansive service network of 600+ service centres across the country.</div></div></div>'),
    array('image'=>'ADVBTR2023/Amex/Amex.jpg','logo'=>'ADVBrandLogos/AmericanExpress.jpg','quote'=>'Brand trust is built by the actual performance of the product.','name'=>'Manoj Adlakha','title'=>'SVP & CEO','company'=>'American Express Banking Corp., India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#333E50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>American Express began as a freight forwarding company in 1850, and quickly earned people\'s trust while transporting some of their most valuable possessions.</div><div>In the late 19th century and early 20th century, we introduced new financial products and travel services that helped support our customers\' everyday lives. Thereafter, we introduced a charge Card, offering customers a new and convenient way to pay. Today, American Express is the largest global payments network.</div><div>Since inception, we\'ve strived to find new ways to enrich our customers\' lives, have their backs and provide our special brand of service. One thing has remained constant: our unwavering commitment to earning our customers\' loyalty.</div><div>These brand attributes of trust, integrity, and service excellence have always guided us. Living up to this legacy means doing what is right for our colleagues, customers, and communities. Brand value/trust is built over the years by the actual performance of the product, by the delivery of the service, and by the ultimate experience of the customer.</div><div>Our company has shown resiliency in the face of disruption throughout the years, including the September 11 terrorist attacks, the Great Financial Crisis, and the COVID-19 pandemic. Each time, we have emerged as a stronger, more focused company.</div><div>Over the years we have built something undeniably special with our customers. Our customers have a strong emotional connection to our brand and trust us to deliver on our promise.</div></div></div>'),
    array('image'=>'ADVBTR2023/Xiaomi/ASX.jpg','logo'=>'ADVBrandLogos/Xiaomi.jpg','quote'=>'Trust has been a foundation pillar of our journey in India.','name'=>'Anuj Sharma','title'=>'CMO','company'=>'Xiaomi India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#333E50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. What is the most essential factor that connects your brand to your audience?</strong></div><div>The most important factors that have strengthened Xiaomi\'s connection with its audience are the open culture, accessibility, and two-way communication between the brand and our consumers. It helps us to be in sync with the ever-evolving needs of consumers and offer industry-first innovations.</div><div><strong>Q. What role does trust play for your brand?</strong></div><div>Trust has played a crucial role in establishing Xiaomi as a market leader. Trust has been a foundation pillar of our successful 8-year journey in India. Xiaomi has been India\'s number-one smartphone brand for over five years, a testament of the love and trust embodied by our consumers.</div><div><strong>Q. How do you infuse trust through your brand communications?</strong></div><div>Xiaomi has always followed a \'customer-first\' approach by focusing on quality, transparency, and security. We actively engage with our consumers through digital channels. We are \'India\'s Widest Smartphone Service Network\' with a network of over 2000 Service Centers across 19500+ Pin Codes.</div><div><strong>Q. How do you use Brand Trust in your brand for market leadership?</strong></div><div>Brand trust has played a crucial role in helping Xiaomi achieve market leadership. We have been able to differentiate ourselves from our competitors by emphasizing our commitment to building trust with customers. Brand trust has been pivotal in the success of the Redmi Note series that continues to receive overwhelming love from our consumers.</div><div><strong>Q. How important is maintaining a trust relationship with key stakeholders?</strong></div><div>A trustworthy relationship with key stakeholders like customers, employees, investors, suppliers, and other partners is critical to the success of a brand. At Xiaomi India, we have collaborated with various stakeholders including local distributors, EMS partners, and retailers that have contributed to our success in India.</div></div></div>'),
    array('image'=>'ADVBTR2023/Nivea/niv.jpg','logo'=>'ADVBrandLogos/Nivea.jpg','quote'=>'For over 140 years, NIVEA has been a trusted companion.','name'=>'Neil George','title'=>'Managing Director','company'=>'Nivea India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#333E50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>For over 140 years, NIVEA has been a trusted companion in people\'s lives. In response to the shortage of hand sanitizers during the pandemic, NIVEA quickly pivoted parts of its production to make liquid hand sanitizers, which were distributed for free across public hospitals and healthcare institutions. The brand also partnered with Swiggy and Zomato to safely deliver essentials to consumers.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Consumers are now placing a greater emphasis on brand purpose, seeking out brands that align with their own beliefs and stand for something beyond just their products. With over 140 years of experience in skincare, NIVEA has a deep understanding of the space and is well-positioned to connect with consumers through a shared purpose and core values of Care, Trust, Simplicity and Courage.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>NIVEA\'s legacy of over 140 years has made it a trusted and reliable brand across generations. Over the years, the brand has built a loyal following, with many consumers being introduced to NIVEA products through endorsements by family members and recommendations from peers. The brand took a unique step towards connecting with Gen Z by redesigning the packaging of NIVEA Soft.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>Trust is a core value at NIVEA and is reflected in our vision to become Emerging India\'s Most Loved and Trusted Skin Care Brand. All our products are backed by strong R&amp;D and have been consistently delivering effective and safe skincare solutions over the years. Being recognized as a Great Place to Work for two consecutive years has also been a tremendous source of inspiration.</div></div></div>'),
    array('image'=>'ADVBTR2023/Achi/ADP.jpg','logo'=>'ADVBrandLogos/Aachi.jpg','quote'=>'Healthy food boosts immunity — that is our promise.','name'=>'A. D. Padmasingh Isaac','title'=>'Chairman & Managing Director','company'=>'AACHI Group of Companies','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. How has your brand managed to retain the trust of consumers in tough times?</strong></div><div>Aachi Masala in the midst of COVID capitalized on the crisis with sensitivity by focusing on alleviating the suffering and lessening the anxiety by introducing health foods at affordable prices to combat the virus. With over 4500+ exclusive distributors and the brand selling in over 1 Million retail outlets all over India, Aachi has lived up to and even exceeded expectations when it comes to stock availability.</div><div><strong>Q. Do you think the elements of brand trust have altered for consumers?</strong></div><div>Aachi has always been aware of the changing needs of consumers irrespective of their demographics or geographic locations. Staying true to its motto—Unnave Marunthu—Aachi firmly believes that healthy food boosts immunity if taken on a daily basis. Aachi ardently pushes products with medicinal value and other health benefits.</div><div><strong>Q. Please comment on the full cycle of trust in your consumer\'s brand journey.</strong></div><div>Aachi\'s consumers and customers form an integral part of the Aachi family. This is quite evident from the wide-ranging distribution network Aachi has built right through urban cities, towns and districts to rural villages and taluks. Aachi has invested in the production of multiple SKUs for a given product keeping in mind the need and buying capacity of consumers from different backgrounds and classes.</div><div><strong>Q. Please elaborate on how your brand has invested in brand trust.</strong></div><div>The Aachi brand has 200+ products with over 550+ Stock Keeping Units (SKUS). Aachi\'s cold grinding technology installed in its factories processes around 50,000 metric tonnes of Spices and Spice Mixes per annum. It ensures preservation of mineral oils, texture, flavour and taste thereby retaining all the goodness of the spices in its natural form. Aachi\'s R&amp;D centre—Scientific Food Testing Services P Ltd. (SFTS)—conducts stringent tests to achieve the required quality standards.</div></div></div>'),
    array('image'=>'ADVMDB2022/LG/GG.jpg','logo'=>'ADVBrandLogos/LGElectronics.jpg','quote'=>'LG desires to serve the ever-changing demands of its customers.','name'=>'Gireesan Gopi','title'=>'Business Head - Home Entertainment','company'=>'LG Electronics India','quoteTheme'=>'ON DESIRE','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>We at LG Electronics India believe in the power of evolution, creativity, and innovation. The desires and needs of the consumers are ever changing and LG as a brand desires to serve the changing demands of its customers. The covid-19 pandemic in 2020 played an important role in transforming customers\' expectations. Customers now expect a lot more from their products than before.</div><div>LG Electronics is India\'s leading home entertainment brand that focuses on providing products with advanced technology and innovation to cater to the desires of its customers. We are grateful to Trust Research Advisory (TRA) for recognizing our efforts by awarding us the \'Most Desired Brand for TVs\' in India in 2022.</div><div>LG Electronics has completely transformed the world of entertainment for consumers by providing the most immersive visuals and enhanced audio along with the latest technology. The 2022 lineup of LG OLED and Rollable OLED TVs are aesthetically pleasing and come with cutting-edge technology.</div><div>Our latest innovation in the TV space, the SIGNATURE OLED R, is the epitome of exclusivity. It is a work of art that offers game-changing innovation. A flexible OLED display with self-lighting pixel technology and individual dimming control offers superior image quality.</div><div>LG OLED TVs continue to set the standard for picture quality. The line-up includes the 8K OLED TV in the Z2 series, capable of displaying 33 million pixels and providing a profoundly immersive experience.</div><div>Our Smart TV lineup is diverse and appeals to a wide range of consumer groups as it offers the best technology spanning across price points. We are committed to the Indian market, and we have always placed a strong emphasis on thoroughly understanding the desires of the Indian consumer.</div></div></div>'),
    array('image'=>'ADVBTR2022/Ajio/Ajio.jpg','logo'=>'ADVBrandLogos/AJIO.jpg','quote'=>'Brand Trust is not just about the product — it\'s about the experience.','name'=>'Vineeth Nair','title'=>'CEO','company'=>'AJIO Reliance Retail','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>AJIO, a fashion and lifestyle brand, is Reliance Retail\'s digital commerce initiative and is the ultimate fashion destination for styles that are handpicked, on trend and at prices that are the best you\'ll find anywhere. Today, AJIO is a leading digital destination for fashion and lifestyle with a portfolio of over 3,000 labels and brands and listing of over 8 lakh options.</div><div>When AJIO was launched in 2016, online shopping was still evolving. Customers had many doubts over their shopping decisions such as: Is it the right size? The right fit? The right quality? AJIO launched in India with a campaign that said #DoubtIsOut.</div><div>Ajiotrust goes beyond the physical product. In the fashion e-commerce space, trust is also about the experience. Shoppers not only want to be served with discipline, but also indulged with delight.</div><div>Ajio trust further stems from the pricing promise. AJIO\'s success comes from our commitment to giving the best possible offer on every product we retail. When we offer a discount, we mean it. No hidden costs. No conditions apply.</div><div>Brand Trust isn\'t earned overnight. We have invested in building trust at every step of the value chain. We have a large team of in-house designers and also INDIE, a unique artisanal range of clothing born from our commitment to serve and empower India\'s homegrown weavers and craftsmen. Over 95 percent of calls to our customer care team is answered within 20 seconds, while every e-mail is replied to within 4 hours.</div></div></div>'),
    array('image'=>'ADVBTR2022/Amd/Amd.jpg','logo'=>'ADVBrandLogos/AMD.jpg','quote'=>'Consumer trust is dynamic, earned and follows a cyclical pattern.','name'=>'Mukesh Bajpai','title'=>'Marketing Head','company'=>'AMD India','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. What is the most essential factor that connects your brand to your audience?</strong></div><div>AMD has built a strong market momentum in India and continues to demonstrate robust growth across our client, graphic and server businesses. Customer confidence is an indication of how the audience connects, engages, and believes in AMD. In the Indian market, our customers recognize AMD as a tech powerhouse building products that accelerate next-generation computing experiences.</div><div><strong>Q. What role does trust play for your brand?</strong></div><div>Consumer trust is dynamic, earned and follows a cyclical pattern. One of the reasons consumers buy AMD is the fact they trust the brand to make high performance computing products. Our phenomenal increase in market share and business growth across segments in the last few quarters is a testament of consumer trust and confidence consumers have invested in AMD.</div><div><strong>Q. How do you infuse trust through your brand communications?</strong></div><div>We are a customer and product centric organization. The objective is to connect, engage and empower the audience with product information, features, and benefits to help them make the right decision per their needs. We strive to always share information which is transparent, accurate and factual.</div><div><strong>Q. How do you use Brand Trust in your brand for market leadership?</strong></div><div>We are thrilled to be recognized as India\'s Most Trusted Semiconductor Brand in 2021 and 2022. Brand Trust survey scores high on transparency, respect, and accuracy among the consumers. We will continue to deliver the best performance and choice to our Indian customers with AMD Ryzen CPUs, AMD Radeon graphic cards and AMD EPYC server processors.</div></div></div>'),
    array('image'=>'ADVBTR2022/JioMart/JioMart1.jpg','logo'=>'ADVBrandLogos/JioMart.jpg','quote'=>'Moving beyond trust to building long-lasting relationships.','name'=>'Ashwin Khasgiwala','title'=>'COO','company'=>'Reliance Retail (JioMart)','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>JioMart, the digital commerce platform by Reliance Retail, is a multicategory online shopping platform, that offers a wide range of products in grocery, including fresh fruits and vegetables, groceries, snacks, beverages, home and household essentials, beauty and hygiene and baby care.</div><div>JioMart was launched across 200 cities in India in 2020 in the midst of the COVID epidemic. JioMart was created with the goal of assisting millions of Indians in gaining access to their daily supply of basics from the comfort of their own homes. In less than 2 years since launch, the brand has won the trust and patronage of millions of customers.</div><div>The company\'s vision with JioMart is to democratise e-commerce among the masses. JioMart currently offers the broadest geographical reach, providing services in over 260 cities across India through a hyperlocal model.</div><div>JioMart builds on the strong consumer connect and trust established over the years by our portfolio of retail brands such as SMART, Trends, Reliance Digital, and others. JioMart has built an online shopping model by developing a simple, intuitive, and resistance-free digital commerce platform. It was the first in the business to provide free home delivery with no minimum order value.</div><div>Driven by our group\'s core principle of \'Customer First\', JioMart was able to bring smiles to millions of homes across the country by being at their service even during the most trying circumstances, moving beyond trust to building long-lasting relationships.</div></div></div>'),
    array('image'=>'ADVBTR2022/Okaya/Okaya1.jpg','logo'=>'ADVBrandLogos/Okaya.jpg','quote'=>'Trust is the soul of our business.','name'=>'Arush Gupta','title'=>'Director & CEO','company'=>'Okaya Power Group','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div><strong>Q. What is the most essential factor that connects your brand to your audience?</strong></div><div>It\'s the all-round TRUST created over two decades which connects brand Okaya with our target audience. Despite the fact that demography as well as the battery market has shifted, the Trust legacy is maintained.</div><div><strong>Q. What role does trust play for your brand?</strong></div><div>In real terms it\'s the soul of our business. For a century, battery chemistry and technology remains more or so the same. Product attributes have hardly any difference. The only edge which has worked is sustained TRUST over decades of service to end users and channel partners.</div><div><strong>Q. How do you infuse trust through your brand communications?</strong></div><div>Being transparent through all modes of communication (internal or external) and walking the talk. This applies to all our stakeholders—end users, channel partners, vendors, associates and employees. Being a 100% digitized company, regular communication with all stakeholders through various digital platforms attained Okaya\'s numero uno position in the industry for all round engagement.</div><div><strong>Q. How do you use Brand Trust in your brand for market leadership?</strong></div><div>All our collaterals, packaging, citation, presentations, awards, and all brand communication platforms are used to showcase the Brand Trust recognition. Extensively used in social media platforms and PR activities.</div><div><strong>Q. In these challenging times, how has your brand kept the bond of Trust alive?</strong></div><div>The biggest attribute kept our Trust factor intact with onsite customer service—it was never an exception, it is our DNA to provide onsite service always. During the pandemic, OkayaKavach program covered all employees for overall welfare and extended support through teams to channel partners when required.</div></div></div>'),
    array('image'=>'ADVBTR2022/ReSmart/ReSmart1.jpg','logo'=>'ADVBrandLogos/RelianceSmart.jpg','quote'=>'Brand trust is not lip service — it is something lived every day.','name'=>'Damodar Mall','title'=>'President & CEO, Grocery Business','company'=>'Reliance Retail (SMART)','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>Reliance SMART is one of the largest and fastest growing Grocery retail chains in India. The SMART Stores network—which includes the hypermarket SMART Superstore and neighbourhood SMART Point formats—is India\'s largest grocery supermarket chain covering more than 500 cities and 1800+ Stores.</div><div>SMART Stores operate primarily in the Value Grocery space. Every day, multiple times a day, customers interact, use and consume products bought at our stores—and hence by extension, SMART becomes an integral part of their everyday lives.</div><div>A relationship of this nature can last only if built upon a legacy of trust—the confidence that we inspire in our customers by delivering on SMART Brand promises consistently, and demonstrably staying true to our values.</div><div>At SMART Stores, we ensure that customers get everything that she needs—ranging from regular essentials to more aspirational products, across national and regional brands. Special care is taken to ensure that our assortment is minutely attuned to local preferences and needs.</div><div>Another major pillar of trust is its value proposition—SMART kavaada, Savings sabse zyada! In every one of our stores across all markets, we guarantee a minimum 5-8% below MRP, regardless of the day of the week.</div><div>The trust and relationship built with our customers has fuelled SMART\'s growth and rapid expansion. At SMART Stores, brand trust is not simply lip service or mere tokenism—it is something lived by, every minute of every day, at every point of interaction with every valued customer.</div></div></div>'),
    array('image'=>'ADVBTR2022/ReTrend/ReTrend1.jpg','logo'=>'ADVBrandLogos/RelianceRetail.jpg','quote'=>'Fashion at great value — delivered dependably, every time.','name'=>'Akhilesh Prasad','title'=>'CEO, Fashion & Lifestyle','company'=>'Reliance Retail (Trends)','quoteTheme'=>'ON TRUST','themeColor'=>'#BF2F74','themeColorDark'=>'#323F50','detailedContent'=>'<div class="row"><div class="col-md-12 text-left brandqt" style="font-size:16px;padding:5px 0px;"><div>Reliance Trends is the largest value fashion retailer in the country and operates more than 2000+ stores across 900+ cities across India with market leadership across all town classes.</div><div>Trends offers stylish, high-quality products across Womenswear, Menswear, Kidswear and fashion accessories through a diversified portfolio of own brands, national and international brands. Trends delivers \'fashion at great value\'.</div><div>Trends has a very strong own brands portfolio of over 25 brands that offers high quality and trendy merchandise at affordable prices. Together with strong design and sourcing capabilities, Trends is democratizing fashion by offering quality, fashionable clothing at affordable prices.</div><div>Trust is an important tenet for customers patronizing Trends to meet their fashion needs. Millions of customers across India trust Trends as they have experienced quality fashionable clothing every time they have purchased from here. This repeated experience has now given the customers the confidence that they will never go wrong if they purchase from Trends.</div><div>For a physical retail brand, stores are the biggest asset through which trust has been built with consumers over several years. We have been consistent with our message—\'Our promise of delivering On-Trend Fashion\'—and have been delivering it dependably over the years. All our communication either within the store or outside has been transparent and 100% clear with no room for ambiguity.</div><div>In the challenging times of COVID, Trends stayed true to its value proposition. Trends pioneered industry best practices on maintaining safety for its customers and store teams. This trust has enabled Trends to become the preferred destination for value fashion for millions of customers across India.</div></div></div>'),
);

shuffle($allPerspectives);
$featuredPerspective = $allPerspectives[0];
$gridPerspectives = array_slice($allPerspectives, 1);
$initialCount = 3;
$totalGrid = count($gridPerspectives);

function esc_js($s) {
    return addslashes(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));
}
?>

<nav class="nav" id="nav" role="navigation" aria-label="Main navigation">
<div class="nav-inner">
<a href="#" class="nav-logo" aria-label="TRA Home"><img src="Img/TRALOGO.png" alt="TRA" onerror="this.style.display='none'"> TRA <span>RESEARCH</span></a>
<div class="nav-links" role="menubar">
<a href="#home">Home</a>
<a href="#knowledge">TRA Knowledge</a>
<a href="#customized">Customized Reports</a>
<a href="#licensing">Licensing</a>
<a href="https://marketingdecisionindex.com/" target="_blank">Marketing Intelligence</a>
<a href="#about">About Us</a>
<a href="http://services.bluebytes.info/BlueBytes/webupdate/trust_advisory.php" target="_blank">Media Room</a>
<a href="TRASurvey/Maps/HeatMap.php" target="_blank">Respondents</a>
</div>
<button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false"><span></span><span></span><span></span></button>
</div>
<hr style="border-top: 3px solid #ffa500;">

</nav>

<!-- ==================== NEW: ASK TRA SECTION (Added Right After Navbar) ==================== -->
<div class="tra-container" style="margin-top: 50px !important;">
    <!-- Hero -->
    <!-- TOGGLE SECTION -->
    <div class="toggle-card" id="askTraToggleCard">
        <div class="toggle-header" id="toggleHeader">
            <div class="toggle-title">
                <span>ASK TRA - BRAND INTELLIGENCE QUERY</span>
            </div>
            <div class="toggle-arrow" id="toggleArrowBtn">
                <i class="fas fa-chevron-down" id="arrowIcon"></i>
            </div>
        </div>

        <div class="toggle-content" id="toggleContent">

            <!-- QUERY + RESPONSE -->
            <div class="query-wrapper">
                <div class="two-col-query">
                    <!-- LEFT: HISTORY & INPUT -->
                    <div class="history-panel">
                        <div class="section-mini-title">
                            <i class="fa-regular fa-clock"></i> YOUR RECENT QUERIES
                        </div>
                        <div id="historyContainer">
                            <!-- Populated by JS -->
                        </div>
                        <div class="search-group">
                            <input type="text" id="searchQueryInput" class="search-input" placeholder="Ask anything... e.g., 'Samsung rankings', 'Top trusted laptops 2025', 'Apple iPhone trust score'">
                            <button id="askButton" class="btn-ask">
                                <i class="fa-regular fa-paper-plane"></i>
                                ASK TRA
                            </button>
                        </div>
                    </div>

                    <!-- RIGHT: RESPONSE -->
                    <div class="response-panel">
                        <div class="section-mini-title">
                            <i class="fa-regular fa-rectangle-list"></i> TRA INTELLIGENCE RESPONSE
                        </div>
                        <div id="responseArea">
                            <!-- Placeholder -->
                            <div id="responseCardPlaceholder" class="response-card" style="text-align: center; padding: 3rem 2rem; color: #94A3B8;">
                                <i class="fa-solid fa-microchip" style="font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.4;"></i>
                                <h4 style="margin-bottom: 0.5rem;">Your brand intelligence is ready</h4>
                                <p style="font-size: 0.95rem;">Type a query above and hit ASK TRA</p>
                            </div>
                            <div id="dynamicResponseCard" style="display: none;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FULL RANKINGS GRID -->
            <div class="rankings-full-grid">

                <!-- ROW 1 -->
                <div class="grid-3col">
                    <!-- TOP 10 MOST TRUSTED BRANDS -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>🏆 TOP 10 MOST TRUSTED BRANDS</span>
                            <span style="font-size:0.75rem; opacity:0.8;">BTR 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="rank-number top">1</div><div style="flex:1; font-weight:600;">DELL</div><div class="rank-category">LAPTOPS</div></div>
                        <div class="rank-list-item"><div class="rank-number top">2</div><div style="flex:1; font-weight:600;">APPLE IPHONE</div><div class="rank-category">MOBILE PHONES</div></div>
                        <div class="rank-list-item"><div class="rank-number top">3</div><div style="flex:1; font-weight:600;">HEWLETT PACKARD</div><div class="rank-category">LAPTOPS</div></div>
                        <div class="rank-list-item"><div class="rank-number">4</div><div style="flex:1;">SONY</div><div class="rank-category">TELEVISIONS</div></div>
                        <div class="rank-list-item"><div class="rank-number">5</div><div style="flex:1;">HONDA</div><div class="rank-category">MOTORCYCLES</div></div>
                        <div class="rank-list-item"><div class="rank-number">6</div><div style="flex:1;">LIC</div><div class="rank-category">INSURANCE</div></div>
                        <div class="rank-list-item"><div class="rank-number">7</div><div style="flex:1;">TITAN</div><div class="rank-category">WATCHES</div></div>
                        <div class="rank-list-item"><div class="rank-number">8</div><div style="flex:1;">D MART</div><div class="rank-category">RETAIL</div></div>
                        <div class="rank-list-item"><div class="rank-number">9</div><div style="flex:1;">SAMSUNG</div><div class="rank-category">MOBILE PHONES</div></div>
                        <div class="rank-list-item"><div class="rank-number">10</div><div style="flex:1;">TATA MOTORS</div><div class="rank-category">AUTOMOTIVE</div></div>
                    </div>

                    <!-- TOP 10 MOST DESIRED BRANDS -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>🔥 TOP 10 MOST DESIRED BRANDS</span>
                            <span style="font-size:0.75rem; opacity:0.8;">MDB 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="rank-number top">1</div><div style="flex:1; font-weight:600;">APPLE IPHONE</div><div class="rank-category">DESIRE INDEX</div></div>
                        <div class="rank-list-item"><div class="rank-number top">2</div><div style="flex:1; font-weight:600;">HEWLETT PACKARD</div><div class="rank-category">PREMIUM LAPTOPS</div></div>
                        <div class="rank-list-item"><div class="rank-number top">3</div><div style="flex:1; font-weight:600;">SONY</div><div class="rank-category">ENTERTAINMENT</div></div>
                        <div class="rank-list-item"><div class="rank-number">4</div><div style="flex:1;">HONDA</div><div class="rank-category">AUTO</div></div>
                        <div class="rank-list-item"><div class="rank-number">5</div><div style="flex:1;">LIC</div><div class="rank-category">FINANCE</div></div>
                        <div class="rank-list-item"><div class="rank-number">6</div><div style="flex:1;">TITAN</div><div class="rank-category">LIFESTYLE</div></div>
                        <div class="rank-list-item"><div class="rank-number">7</div><div style="flex:1;">D MART</div><div class="rank-category">RETAIL</div></div>
                        <div class="rank-list-item"><div class="rank-number">8</div><div style="flex:1;">SAMSUNG</div><div class="rank-category">MOBILE</div></div>
                        <div class="rank-list-item"><div class="rank-number">9</div><div style="flex:1;">BMW</div><div class="rank-category">LUXURY CARS</div></div>
                        <div class="rank-list-item"><div class="rank-number">10</div><div style="flex:1;">CHANEL</div><div class="rank-category">LUXURY</div></div>
                    </div>

                    <!-- TOP 10 TRUST CATEGORIES -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>📊 TOP 10 TRUST CATEGORIES</span>
                            <span style="font-size:0.75rem; opacity:0.8;">BTR 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="rank-number top">1</div><div style="flex:1;">DIVERSIFIED</div><div class="rank-category">CONGLOMERATE</div></div>
                        <div class="rank-list-item"><div class="rank-number top">2</div><div style="flex:1;">MOBILE PHONES</div><div class="rank-category">TECH</div></div>
                        <div class="rank-list-item"><div class="rank-number top">3</div><div style="flex:1;">AIR CONDITIONERS</div><div class="rank-category">APPLIANCES</div></div>
                        <div class="rank-list-item"><div class="rank-number">4</div><div style="flex:1;">TELEVISIONS</div><div class="rank-category">CONSUMER ELECTRONICS</div></div>
                        <div class="rank-list-item"><div class="rank-number">5</div><div style="flex:1;">SUV - BRAND</div><div class="rank-category">AUTOMOTIVE</div></div>
                        <div class="rank-list-item"><div class="rank-number">6</div><div style="flex:1;">DEO / PERFUME</div><div class="rank-category">BEAUTY</div></div>
                        <div class="rank-list-item"><div class="rank-number">7</div><div style="flex:1;">LUXURY WATCHES</div><div class="rank-category">LIFESTYLE</div></div>
                        <div class="rank-list-item"><div class="rank-number">8</div><div style="flex:1;">ELECTRIC VEHICLES</div><div class="rank-category">AUTO</div></div>
                        <div class="rank-list-item"><div class="rank-number">9</div><div style="flex:1;">PREMIUM LAPTOPS</div><div class="rank-category">TECH</div></div>
                        <div class="rank-list-item"><div class="rank-number">10</div><div style="flex:1;">LIFE INSURANCE</div><div class="rank-category">FINANCE</div></div>
                    </div>
                </div>

                <!-- ROW 2 -->
                <div class="grid-3col">
                    <!-- TOP 10 DESIRED CATEGORIES -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>✨ TOP 10 DESIRED CATEGORIES</span>
                            <span style="font-size:0.75rem; opacity:0.8;">MDB 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="rank-number top">1</div><div style="flex:1;">LUXURY WATCHES</div></div>
                        <div class="rank-list-item"><div class="rank-number top">2</div><div style="flex:1;">PREMIUM SMARTPHONES</div></div>
                        <div class="rank-list-item"><div class="rank-number top">3</div><div style="flex:1;">ELECTRIC VEHICLES</div></div>
                        <div class="rank-list-item"><div class="rank-number">4</div><div style="flex:1;">HIGH-END LAPTOPS</div></div>
                        <div class="rank-list-item"><div class="rank-number">5</div><div style="flex:1;">DESIGNER FASHION</div></div>
                        <div class="rank-list-item"><div class="rank-number">6</div><div style="flex:1;">SMARTWATCHES</div></div>
                        <div class="rank-list-item"><div class="rank-number">7</div><div style="flex:1;">PERFUMES</div></div>
                        <div class="rank-list-item"><div class="rank-number">8</div><div style="flex:1;">LUXURY CARS</div></div>
                        <div class="rank-list-item"><div class="rank-number">9</div><div style="flex:1;">PREMIUM HEADPHONES</div></div>
                        <div class="rank-list-item"><div class="rank-number">10</div><div style="flex:1;">HOME THEATRE SYSTEMS</div></div>
                    </div>

                    <!-- TRUST LEADERS BY CATEGORY -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>📌 TRUST LEADERS BY CATEGORY</span>
                            <span style="font-size:0.75rem; opacity:0.8;">BTR 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="leader-cat">PENCILS</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>NATARAJ</strong> &nbsp; 2 APSARA</div></div>
                        <div class="rank-list-item"><div class="leader-cat">BISCUITS</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>BRITANNIA</strong> &nbsp; 2 PARLE G</div></div>
                        <div class="rank-list-item"><div class="leader-cat">MOBILE PHONES</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>APPLE IPHONE (#2)</strong> &nbsp; 2 SAMSUNG (#9)</div></div>
                        <div class="rank-list-item"><div class="leader-cat">LAPTOPS</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>DELL (#1)</strong> &nbsp; 2 HP (#3)</div></div>
                        <div class="rank-list-item"><div class="leader-cat">TVs</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>SONY (#4)</strong></div></div>
                        <div class="rank-list-item"><div class="leader-cat">MOTORCYCLES</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>HONDA (#5)</strong></div></div>
                    </div>

                    <!-- DESIRE LEADERS BY CATEGORY -->
                    <div class="rank-card">
                        <div class="rank-card-header">
                            <span>💎 DESIRE LEADERS BY CATEGORY</span>
                            <span style="font-size:0.75rem; opacity:0.8;">MDB 2025</span>
                        </div>
                        <div class="rank-list-item"><div class="leader-cat">SMARTWATCHES</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>APPLE</strong> &nbsp; 2 SAMSUNG</div></div>
                        <div class="rank-list-item"><div class="leader-cat">PERFUMES</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>CHANEL</strong> &nbsp; 2 DIOR</div></div>
                        <div class="rank-list-item"><div class="leader-cat">LUXURY CARS</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>BMW</strong> &nbsp; 2 MERCEDES</div></div>
                        <div class="rank-list-item"><div class="leader-cat">PREMIUM LAPTOPS</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>APPLE</strong> &nbsp; 2 DELL</div></div>
                        <div class="rank-list-item"><div class="leader-cat">ELECTRIC VEHICLES</div><div style="margin-left:auto; font-size:0.9rem;">1 <strong>TESLA</strong></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM NAVIGATION -->
    <!--div class="bottom-nav">
        <div class="nav-item" onclick="navigateToSection('brand')"><i class="fa-solid fa-building"></i> BRAND</div>
        <div class="nav-item" onclick="navigateToSection('category')"><i class="fa-solid fa-tag"></i> CATEGORY</div>
        <div class="nav-item" id="askTraBottomBtn"><i class="fa-regular fa-message"></i> ASK TRA</div>
        <div class="scroll-top" id="scrollTopBtn"><i class="fas fa-arrow-up" style="color: white;"></i></div>
    </div-->
</div>>

<div class="mobile-menu" id="mobileMenu" role="dialog" aria-label="Mobile navigation">
<div class="mobile-menu-links">
<a href="#home">Home</a>
<a href="#knowledge">TRA Knowledge</a>
<a href="#customized">Customized Reports</a>
<a href="#licensing">Licensing</a>
<a href="https://marketingdecisionindex.com/" target="_blank">Marketing Intelligence</a>
<a href="#about">About Us</a>
<a href="http://services.bluebytes.info/BlueBytes/webupdate/trust_advisory.php" target="_blank">Media Room</a>
<a href="TRASurvey/Maps/HeatMap.php" target="_blank">Respondents</a>
</div>
</div>

<!-- ===== HERO ===== -->
<!--section class="hero" id="home">
<div class="hero-shape hero-shape-1"></div>
<div class="hero-shape hero-shape-2"></div>
<div class="hero-grid"><svg viewBox="0 0 600 800" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="hp" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width=".5"/></pattern></defs><rect width="100%" height="100%" fill="url(#hp)" style="color:var(--dark)"/><circle cx="300" cy="200" r="80" fill="none" stroke="currentColor" stroke-width=".3" style="color:var(--red)"/><circle cx="300" cy="200" r="120" fill="none" stroke="currentColor" stroke-width=".2" style="color:var(--red)"/><circle cx="450" cy="500" r="60" fill="none" stroke="currentColor" stroke-width=".3" style="color:var(--red)"/></svg></div>
<div class="container hero-inner">
<div class="hero-tag reveal"><i class="fa-solid fa-chart-line"></i> Part of Comniscient Group</div>
<h1 class="reveal rd1">Brand Intelligence &amp; <span class="hl">Data Insights</span></h1>
<p class="hero-desc reveal rd2">Communication is a universal remedy. It helps bridge relationships, sustains knowledge and also makes chance more predictable. TRA's reports are a result of a syndicated primary research on Brand Trust and Brand Attractiveness that generates more than 15Mn data points every year and 16,000 unique brands from over 16,000 hours of fieldwork conducted in 16 cities in India. TRA's study partners with Statistical Institute (ISI) for these studies.</p>
<div class="hero-matrices reveal rd3">
<div class="matrix-badge"><i class="fa-solid fa-shield-halved"></i> Brand Trust Matrix</div>
<div class="matrix-badge"><i class="fa-solid fa-magnet"></i> Brand Attractiveness Matrix</div>
</div>
<div class="hero-actions reveal rd4">
<a href="#research" class="btn btn-primary">Explore Research <i class="fa-solid fa-arrow-right"></i></a>
<a href="#about" class="btn btn-outline">About TRA <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>
</section-->

<!-- ===== RESEARCH (moved right after hero) ===== -->
<section class="section section-alt" id="research">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">Research</div><h2>Our Recent Syndicated Research</h2><p class="hero-desc reveal rd2">Communication is a universal remedy. It helps bridge relationships, sustains knowledge and also makes chance more predictable. TRA's reports are a result of a syndicated primary research on Brand Trust and Brand Attractiveness that generates more than 15Mn data points every year and 16,000 unique brands from over 16,000 hours of fieldwork conducted in 16 cities in India. TRA's study partners with Statistical Institute (ISI) for these studies.</p></div>
<div class="carousel-wrap reveal rd1"><div class="carousel-track" id="rptTrack"></div></div>
<div class="carousel-nav reveal rd2">
<button class="carousel-btn" onclick="scrollC('rptTrack',-300)" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
<button class="carousel-btn" onclick="scrollC('rptTrack',300)" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
</div>
</div>
</section>

<!-- ===== BRANDSPEAK & BRAND DIALOGUES (PHP-powered with full modal data) ===== -->
<section class="section" id="brandspeak">
<div class="container">
<div class="bs-layout">

<!-- LEFT: BRANDSPEAK (68%) -->
<div class="bs-col">
<div class="sec-head reveal"><div class="sec-label">BrandSpeak</div><!--h2>Industry Leader Perspectives</h2><p class="sec-desc">Exclusive viewpoints from India's leading brand custodians on Trust and Desire.</p--></div>

<!-- FEATURED CARD -->
<div class="featured-card reveal rd1">
<div class="featured-badge">FEATURED PERSPECTIVE</div>
<div class="featured-content">
<div class="featured-left">
<div class="featured-profile">
<img src="<?php echo $featuredPerspective['image']; ?>" alt="<?php echo htmlspecialchars($featuredPerspective['name']); ?>" onerror="this.src='https://placehold.co/120x120/e8e8ed/7b7b8b?text=Photo'">
</div>
<img src="<?php echo $featuredPerspective['logo']; ?>" alt="Logo" style="max-width:90px;max-height:44px;object-fit:contain" onerror="this.style.display='none'">
</div>
<div class="featured-right">
<div class="quote-mark">"</div>
<div class="quote-text"><?php echo $featuredPerspective['quote']; ?></div>
<div class="attr-name">— <?php echo $featuredPerspective['name']; ?></div>
<div class="attr-title"><?php echo $featuredPerspective['title']; ?></div>
<div class="featured-actions">
<button class="btn-persp" onclick="openPM('p_featured')"><span>Read Full Perspective</span> <span>→</span></button>
<a href="#bd-section" class="btn-bd-link"><span>◉</span> <span>Brand Dialogues</span></a>
</div>
<!-- Hidden data for featured -->
<div id="data_p_featured" style="display:none"
     data-img="<?php echo addslashes($featuredPerspective['image']); ?>"
     data-logo="<?php echo addslashes($featuredPerspective['logo']); ?>"
     data-name="<?php echo addslashes($featuredPerspective['name']); ?>"
     data-title="<?php echo addslashes($featuredPerspective['title']); ?>"
     data-company="<?php echo addslashes($featuredPerspective['company']); ?>"
     data-theme="<?php echo addslashes($featuredPerspective['quoteTheme']); ?>"
     data-c1="<?php echo addslashes($featuredPerspective['themeColor']); ?>"
     data-c2="<?php echo addslashes($featuredPerspective['themeColorDark']); ?>">
    <?php echo $featuredPerspective['detailedContent']; ?>
</div>
</div>
</div>
</div>

<!-- GRID (hidden by default, toggled by View More) -->
<div class="persp-grid" id="perspGrid" style="display:none;">
<?php foreach ($gridPerspectives as $idx => $p):
    $pid = 'p_' . $idx;
    $hiddenClass = ($idx >= $initialCount) ? ' hidden' : '';
?>
<div class="persp-card<?php echo $hiddenClass; ?>" data-i="<?php echo $idx; ?>">
<div class="p-badge">BRANDSPEAK</div>
<div class="persp-profile"><img src="<?php echo $p['image']; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" onerror="this.src='https://placehold.co/60x60/e8e8ed/7b7b8b?text=Photo'"></div>
<div class="persp-quote">"<?php echo $p['quote']; ?>"</div>
<div class="p-meta-name"><?php echo $p['name']; ?></div>
<div class="p-meta-title"><?php echo $p['title']; ?></div>
<div class="persp-company"><img src="<?php echo $p['logo']; ?>" alt="Logo" onerror="this.style.display='none'"><span><?php echo $p['company']; ?></span></div>
<button class="btn-read-p" onclick="openPM('<?php echo $pid; ?>')">Read Perspective →</button>
<!-- Hidden data -->
<div id="data_<?php echo $pid; ?>" style="display:none"
     data-img="<?php echo addslashes($p['image']); ?>"
     data-logo="<?php echo addslashes($p['logo']); ?>"
     data-name="<?php echo addslashes($p['name']); ?>"
     data-title="<?php echo addslashes($p['title']); ?>"
     data-company="<?php echo addslashes($p['company']); ?>"
     data-theme="<?php echo addslashes($p['quoteTheme']); ?>"
     data-c1="<?php echo addslashes($p['themeColor']); ?>"
     data-c2="<?php echo addslashes($p['themeColorDark']); ?>">
    <?php echo $p['detailedContent']; ?>
</div>
</div>
<?php endforeach; ?>
</div>

<!-- VIEW MORE BUTTON -->
<div class="view-more-wrap" id="viewMoreWrap">
<button class="btn-view-more" id="viewMoreBtn" onclick="togglePersp()"><span class="icon">↓</span> <span id="viewMoreTxt">View More Perspectives (<?php echo $totalGrid; ?> more)</span></button>
</div>

</div><!-- /.bs-col -->

<div class="bs-divider"></div>

<!-- RIGHT: BRAND DIALOGUES (32%) -->
<div class="bd-col" id="bd-section">
<div class="bd-header reveal">
<div>
<div class="sec-label" style="margin-bottom:8px">Brand Dialogues</div>
<a href="https://www.youtube.com/@BrandDialogues" target="_blank" class="yt-link">
<!--svg class="yt-icon" viewBox="0 0 24 24" fill="#FF0000"><path d="M10 15l5.19-3L10 9v6m11.56-7.83c.13.47.22 1.1.28 1.9.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83-.25.9-.83 1.48-1.73 1.73-.47.13-1.33.22-2.65.28-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44-.9-.25-1.48-.83-1.73-1.73-.13-.47-.22-1.1-.28-1.9-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83.25-.9.83-1.48 1.73-1.73.47-.13 1.33-.22 2.65-.28 1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44.9.25 1.48.83 1.73 1.73z"/></svg>
<span><?php echo $subscriberCount; ?> subscribers &bull; <?php echo $videoCount; ?> videos</span-->
</a>
</div>
</div>

<!-- FEATURED VIDEO ONLY (server-side rendered) -->
<?php if ($featuredVideo && !empty($featuredVideo['id'])): ?>
<div class="featured-video" onclick="openVideo('<?php echo $featuredVideo['id']; ?>','<?php echo esc_js($featuredVideo['title']); ?>','<?php echo $featuredVideo['views']; ?>')">
<div class="fv-badge" style="margin:0 0 0 0;position:absolute;z-index:2;margin:8px">FEATURED</div>
<div class="fv-thumb">
<img src="<?php echo $featuredVideo['thumbnail']; ?>" alt="<?php echo htmlspecialchars($featuredVideo['title']); ?>">
<div class="play-ov"><div class="play-btn">▶</div></div>
</div>
<div class="fv-info">
<div class="fv-title"><?php echo htmlspecialchars($featuredVideo['title']); ?></div>
<div class="fv-stats"><?php echo $featuredVideo['views']; ?></div>
<button class="btn-watch" onclick="event.stopPropagation();openVideo('<?php echo $featuredVideo['id']; ?>','<?php echo esc_js($featuredVideo['title']); ?>','<?php echo $featuredVideo['views']; ?>')"><span>▶</span> <span>Watch Now</span></button>
</div>
</div>
<?php else: ?>
<div style="text-align:center;padding:30px;color:var(--text-muted);font-size:.85rem">Loading videos from YouTube channel...</div>
<?php endif; ?>

<!-- Video list hidden, only View All link -->
<div class="view-all-wrap">
<a href="https://www.youtube.com/@BrandDialogues" target="_blank" class="view-all-link">View All <?php echo $videoCount; ?> Dialogues →</a>
</div>

</div><!-- /.bd-col -->

</div><!-- /.bs-layout -->
</div>
</section>

<!-- ===== KNOWLEDGE ===== -->
<section class="section" id="knowledge">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">Knowledge</div><h2>TRA Knowledge</h2><p class="sec-desc">Whitepapers, webinars, and podcasts exploring brand intelligence and consumer insights.</p></div>
<div class="kn-grid" id="knGrid"></div>
</div>
</section>

<!-- ===== CUSTOMIZED REPORTS ===== -->
<section class="section section-alt" id="customized">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">Customized</div><h2>Customized Reports</h2><p class="sec-desc">Bespoke research engagements designed for your brand's specific intelligence needs.</p></div>
<div class="cr-grid">
<div class="cr-card reveal rd1">
<img src="images/BP.jpg" alt="Buying Propensity" class="cr-img" onerror="this.style.display='none'">
<h3>Buying Propensity</h3>
<p>TRA's Competitive Intelligence report on "Buying Propensity" is an in-depth analysis of your brand based on tried and tested matrices of Brand Trust and Brand Attractiveness developed over years of research with psychologists, sociologists and communication experts. The two matrices stand at the two ends of the Buying Propensity axis, the line along which all transaction decisions are made about the brand. The report reveals the perceptual traits and attributes of your brand and the competition based on Trust and Attraction. Apart from being a competitive comparison, this report is also an introspective tool to analyse your own brand's perception, and helps you to optimally allocate resources for your brand: be it money, people, geographies or time. This report is useful for brand custodians, brand owners, investors, partners and other stakeholders who want to understand the underlying nuances of the brand. A customised report for a particular industry or sector can be obtained and can be made available to you within 30 days of your request.</p>
<div class="cr-actions">
<a href="pdf_server.php?file=pdf/Buying Propensity_Sample Report" target="_blank" class="btn btn-outline btn-sm"><i class="fa-solid fa-eye"></i> Demo</a>
<a href="javascript:void(0)" onclick="openEnq('Buying Propensity')" class="btn btn-primary btn-sm"><i class="fa-solid fa-envelope"></i> Enquire</a>
</div>
</div>
<div class="cr-card reveal rd2">
<img src="images/Introspective-intervension.jpg" alt="Introspective Intervention" class="cr-img" onerror="this.style.display='none'">
<h3>Introspective Intervention</h3>
<p>TRA's Introspective Intervention is a brand specific analysis through the application of Trust Matrix to targeted stakeholders of the brand. It involves primary research conducted for the brand initiating the study along with its key competition on the basis of the 61-attributes of Brand Trust. Conducted with the primary stakeholders of the brand, this study gives the brand deep insights into responses the brand generates by its action and communication, thereby giving focused interventions. The Introspective Intervention is a premium tool which enables the brand to undertake introspection into the stakeholder's expectations and perception. This analysis is meant to be a CT scan and a deep diagnosis tool for the top management of the brand. Such introspection will help address issues and opportunities with swiftness. Introspective Intervention is, thus, a benchmarking tool that allows the brand to study best practices in the industry and outside, to help overcome 'paradigm blindness'. The tool helps in taking action and also lends to future organizational direction and strategy.</p>
<div class="cr-actions">
<a href="pdf_server.php?file=pdf/Introspective_Intervention_Demo" target="_blank" class="btn btn-outline btn-sm"><i class="fa-solid fa-eye"></i> Demo</a>
<a href="javascript:void(0)" onclick="openEnq('Introspective Intervention')" class="btn btn-primary btn-sm"><i class="fa-solid fa-envelope"></i> Enquire</a>
</div>
</div>
</div>
</div>
</section>

<!-- ===== LICENSING ===== -->
<section class="section" id="licensing">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">Licensing</div><h2>Proprietary Data Licenses</h2><p class="sec-desc">License TRA's proprietary symbols to showcase your brand's achievement in Trust and Desire.</p></div>
<div class="reveal rd1" style="max-width:800px;margin:0 auto 28px;color:var(--text-sec);font-size:.92rem;line-height:1.8;">While most measure a brand in terms of market share, brand value, growth — the more important invisible and intangible components of brand behaviour are often lost to measurement. TRA with the help of the Brand Trust Report and India's Most Attractive Brand's aim to look at these elements holistically and creates a singular metric in each case, that can measure the intangible and tangible attributes or traits of a brand in one unit. To feature in the report is a matter of great pride for any brand and to display this achievement TRA licenses its symbols so that the brands can carry the mark of their achievement with great pride. Licensing is an integral business development tool that provides brand with a competitive advantage. Several leading brands have used the reports and its extensions to enhance their brand's scope and relevance.</div>
<div class="lic-grid">
<div class="lic-card reveal rd1"><div class="lic-card-bg"><img src="Img/trustedbrands.png" alt="Power of Trust"></div><div class="lic-card-ov"></div><div class="lic-card-content"><div class="lic-label">Licensing Symbol</div><div class="lic-title">Power of Trust</div><div class="lic-desc">Many brands license the Power of Trust Symbol and use it to showcase the trust held in their brand through their marketing communications, internal communications and shareholder communications. Some brands have ordered several of the commemorative plaques to place in points of engagement like their commercial outlets or offices to showcase their achievement.</div></div></div>
<div class="lic-card reveal rd2"><div class="lic-card-bg"><img src="Img/desiredbrands.png" alt="Power of Desire"></div><div class="lic-card-ov"></div><div class="lic-card-content"><div class="lic-label">Licensing Symbol</div><div class="lic-title">Power of Desire</div><div class="lic-desc">TRA's most recent endeavour is licensed to brands that are perceived as being most desired. Brands that feature in the report have the exclusive opportunity to display the Symbol of Desire in their communication, internal, external and in communication to their shareholders. Several brands have displayed the commemorative plaques and the trophy in their offices.</div></div></div>
</div>
<div class="lic-link-row reveal rd3"><a href="pdf/LicensingofTRAproducts.pdf" target="_blank">Click here to see how brands are using our license for communications →</a></div>
<div class="lic-notice reveal rd4"><h3>NOTICE</h3><p>The TRA Brand Trust Report and the TRA Most Desired Brand Report are syndicated consumer-influencer research studies conducted by TRA Research Pvt. Ltd. to determine the most trusted and desired brands in India. TRA provides licensing symbols, including the "Power of Trust" and the "Power of Desire," which are intellectual trademarked properties used by brands to leverage their market position.<br><br>Any communication regarding a brand's position in the reports are strictly under license. TRA takes intellectual property rights very seriously and will take all necessary actions to protect its intellectual property rights, including but not limited to legal proceedings, against any unauthorized use of its intellectual property.<br><br>Any use of TRA's intellectual property without prior written consent from TRA is strictly prohibited.</p></div>
</div>
</section>

<!-- ===== EXCERPTS ===== -->
<section class="section section-alt" id="excerpts">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">Excerpts</div><h2>Report Excerpts</h2></div>
<div class="excerpts-track reveal rd1">
<a href="pdf/DELL_MAB15.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/DellNew.jpg" alt="Dell" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">Dell — Most Attractive Brands 2015</div></a>
<a href="pdf/MAHINDRA_BTR15.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/MahindraNew.jpg" alt="Mahindra" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">Mahindra — Brand Trust Report 2015</div></a>
<a href="pdf/IDBI_MAB15.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/IDBINew.jpg" alt="IDBI" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">IDBI — Most Attractive Brands 2015</div></a>
<a href="pdf/DAINIK BHASKAR_BTR 15.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/Dainik-bhaskarNew.jpg" alt="Dainik Bhaskar" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">Dainik Bhaskar — Brand Trust Report 2015</div></a>
<a href="pdf/BHARTI AXA_BTR16.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/Bharti-AXANew.jpg" alt="Bharti AXA" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">Bharti AXA — Brand Trust Report 2016</div></a>
<a href="pdf/VIDEOCON_BTR16.pdf" target="_blank" class="excerpt-card"><div class="excerpt-img"><img src="Img/VideoconNew.jpg" alt="Videocon" onerror="this.parentElement.style.background='var(--bg-alt)'"></div><div class="excerpt-label">Videocon — Brand Trust Report 2016</div></a>
</div>
<div class="carousel-nav reveal rd2">
<button class="carousel-btn" onclick="scrollC(document.querySelector('.excerpts-track'),-300)" aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>
<button class="carousel-btn" onclick="scrollC(document.querySelector('.excerpts-track'),300)" aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>
</div>
</div>
</section>

<!-- ===== ABOUT ===== -->
<section class="section" id="about">
<div class="container">
<div class="sec-head reveal"><div class="sec-label">About</div><h2>TRA Research</h2></div>
<div class="about-grid">
<div class="about-text reveal rd1">
<p>TRA (formerly Trust Research Advisory), a part of the Comniscient Group, is a Brand Intelligence and Data Insights Company dedicated to understand and analyze stakeholder behavior through 2 globally acclaimed, proprietary matrices of Brand Trust and Brand Attractiveness. Over a decade of research has helped us decipher the numerous characteristics that constitute the foundations of a brand.</p>
<p>TRA conducts a primary research with consumers and stakeholders to assist brands with their business decisions based on our insights on Consumer Behavior. We provide Competitive Intelligence Reports mined from more than 15 million data-points on brand intangibles of 20,000 brands and also custom-made studies for the same.</p>
<p>TRA is also the publisher of 'The Brand Trust Report' and of 'India's Most Attractive Brands'. We have also ventured into mapping Educational Institutes on a much needed factor of trust, based on our Brand Trust Matrix.</p>
</div>
<div class="about-contact reveal rd2">
<h3>Contact Us</h3>
<div class="ci-item"><div class="ci-icon"><i class="fa-solid fa-phone"></i></div><div><div class="ci-label">Talk to us</div><div class="ci-value"><a href="tel:9874978912">9874978912</a></div></div></div>
<div class="ci-item"><div class="ci-icon"><i class="fa-solid fa-envelope"></i></div><div><div class="ci-label">Email</div><div class="ci-value"><a href="mailto:enquiries@trustadvisory.info">enquiries@trustadvisory.info</a></div></div></div>
<div class="ci-item"><div class="ci-icon"><i class="fa-solid fa-location-dot"></i></div><div><div class="ci-label">Address</div><div class="ci-value">5/10, 2nd floor – Grant's Building, Arthur Bunder Road, H.N.A Azmi Marg, Colaba, Mumbai 400005</div></div></div>
<div class="about-socials">
<a href="https://www.facebook.com/TRA.Research" target="_blank"><i class="fa-brands fa-facebook-f"></i> TRA Research</a>
<a href="https://twitter.com/TRA_Research" target="_blank"><i class="fa-brands fa-x-twitter"></i> @TRA_Research</a>
<a href="https://thebrandtrustreport.wordpress.com/" target="_blank"><i class="fa-brands fa-wordpress"></i> Brand Trust Blog</a>
<a href="https://twitter.com/BrandAttractive" target="_blank"><i class="fa-brands fa-x-twitter"></i> @BrandAttractive</a>
</div>
</div>
</div>
</div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer" role="contentinfo">
<div class="container">
<div class="footer-grid">
<div><div class="footer-brand">TRA <span>RESEARCH</span></div><p class="footer-desc">Trust Research Advisory — Brand Intelligence &amp; Data Insights, part of the Comniscient Group. Powered by the Brand Trust and Brand Attractiveness matrices.</p>
<div class="footer-socials"><a href="https://www.facebook.com/TRA.Research" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a><a href="https://twitter.com/TRA_Research" target="_blank" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a><a href="https://thebrandtrustreport.wordpress.com/" target="_blank" aria-label="WordPress"><i class="fa-brands fa-wordpress"></i></a><a href="https://twitter.com/BrandAttractive" target="_blank" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a></div></div>
<div class="footer-col"><div class="footer-col-title">Research</div><ul><li><a href="#brandspeak">BrandSpeak</a></li><li><a href="#research">Syndicated Research</a></li><li><a href="#knowledge">TRA Knowledge</a></li><li><a href="#excerpts">Excerpts</a></li></ul></div>
<div class="footer-col"><div class="footer-col-title">Solutions</div><ul><li><a href="#customized">Buying Propensity</a></li><li><a href="#customized">Introspective Intervention</a></li><li><a href="#licensing">Power of Trust</a></li><li><a href="#licensing">Power of Desire</a></li></ul></div>
</div>
<div class="footer-bottom"><span>Copyright &copy; 2016 Trust Research Advisory. All rights reserved.</span><span><a href="#">Privacy Policy</a> &middot; <a href="#">Terms of Use</a></span></div>
</div>
</footer>

<!-- ===== PERSPECTIVE MODAL ===== -->
<div class="modal-ov" id="perspModal" onclick="if(event.target===this)closePM()">
<div class="modal-box">
<button class="modal-close" onclick="closePM()">&times;</button>
<div id="pmContent"></div>
</div>
</div>

<!-- ===== VIDEO MODAL ===== -->
<div class="vm-ov" id="videoModal" onclick="if(event.target===this)closeVM()">
<div class="vm-box">
<div class="vm-head"><h3 class="vm-title" id="vmTitle"></h3><button class="vm-close" onclick="closeVM()">&times;</button></div>
<div class="vm-player" id="vmPlayer"></div>
<div class="vm-foot">
<div style="display:flex;align-items:center;gap:10px">
<div style="width:36px;height:36px;background:linear-gradient(135deg,#D32F2F,#B71C1C);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.75rem">BD</div>
<div style="font-weight:600;font-size:.85rem">Brand Dialogues</div>
</div>
<a href="#" id="vmYt" target="_blank" class="vm-yt-link"><i class="fa-brands fa-youtube"></i> Watch on YouTube</a>
</div>
</div>
</div>

<!-- ===== ENQUIRY MODAL ===== -->
<div class="modal-ov" id="enqModal" onclick="if(event.target===this)closeEM()">
<div class="modal-box" style="max-width:480px">
<button class="modal-close" style="color:var(--dark);background:var(--bg-alt)" onclick="closeEM()">&times;</button>
<div style="padding:40px 32px;text-align:center">
<div style="width:56px;height:56px;border-radius:50%;background:var(--red-light);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;color:var(--red);font-size:1.3rem"><i class="fa-solid fa-envelope"></i></div>
<h3 style="margin-bottom:8px">Enquire About <span id="enqName"></span></h3>
<p style="color:var(--text-muted);font-size:.9rem;margin-bottom:24px">Fill in your details and our team will get back to you.</p>
<div style="display:flex;flex-direction:column;gap:12px;text-align:left">
<input type="text" placeholder="Your Name" style="padding:11px 16px;border:1px solid var(--border);border-radius:8px;font-size:.9rem;font-family:inherit;outline:none">
<input type="email" placeholder="Email Address" style="padding:11px 16px;border:1px solid var(--border);border-radius:8px;font-size:.9rem;font-family:inherit;outline:none">
<input type="text" placeholder="Company / Brand" style="padding:11px 16px;border:1px solid var(--border);border-radius:8px;font-size:.9rem;font-family:inherit;outline:none">
<textarea placeholder="Your Requirements" rows="3" style="padding:11px 16px;border:1px solid var(--border);border-radius:8px;font-size:.9rem;font-family:inherit;outline:none;resize:vertical"></textarea>
<button class="btn btn-primary" style="width:100%;justify-content:center" onclick="closeEM()">Submit Enquiry</button>
</div>
</div>
</div>
</div>

<script>
/* ========== REPORTS DATA ========== */
var R=[
{n:"TRA's Brand Trust Report, India Study 2026",c:'images/BTR26.png',l:[{t:'All India Listings',u:'AllIndiaListingBTR2026.php'},{t:'Category Wise',u:'categoryListingBTR26.php'},{t:'Methodology',u:'methodologyBTR26.php'}]},
{n:"TRA's Most Desired Brands 2025",c:'images/MDB2025.png',l:[{t:'All India Listings',u:'AllIndiaListingMDB2025.php'},{t:'Category Wise',u:'categoryMDB25.php'},{t:'Methodology',u:'methodologyMDB25.php'}]},
{n:"TRA's Brand Trust Report, India Study 2025",c:'images/BTR2025.png',l:[{t:'All India Listings',u:'AllIndiaListingBTR2025.php'},{t:'Category Wise',u:'categoryListingBTR25.php'},{t:'Methodology',u:'methodologyBTR25.php'}]},
{n:"TRA's Most Desired Brands 2024",c:'images/MDB2024.jpg',l:[{t:'All India Listings',u:'AllIndiaListingMDB2024.php'},{t:'Category Wise',u:'categoryMDB24.php'},{t:'Methodology',u:'methodologyMDB24.php'}]},
{n:"TRA's Brand Trust Report, India Study 2024",c:'images/BTR24.png',l:[{t:'All India Listings',u:'AllIndiaListingBTR2024.php'},{t:'Category Wise',u:'categoryBTRBL24.php'},{t:'Methodology',u:'methodologyBTR24.php'}]},
{n:"TRA's Most Desired Brands 2023",c:'images/MDB23.jpg',l:[{t:'All India Listings',u:'AllIndiaListingsMDB23.php'},{t:'Category Wise',u:'categoryMDBBL23.php'},{t:'Methodology',u:'methodologyMDB23.php'}]},
{n:"TRA's Brand Trust Report, India Study 2023",c:'images/BTR23.jpg',l:[{t:'All India Listings',u:'AllIndiaListingBTR2023.php'},{t:'Category Wise',u:'categoryBTRBL23.php'},{t:'Methodology',u:'methodologyBTR23.php'}]},
{n:"TRA's Most Desired Brands 2022",c:'images/MDB2022.jpeg',l:[{t:'All India Listings',u:'categoryMDB22.php'},{t:'Category Wise',u:'categoryMDBBL22.php'},{t:'Methodology',u:'methodologyMDB22.php'}]},
{n:"TRA's Brand Trust Report, India Study 2022",c:'images/BTR22New.jpg',l:[{t:'All India Listings',u:'categoryBTR22.php'},{t:'Category Wise',u:'categoryBTRBL22.php'},{t:'Methodology',u:'methodologyBTR22.php'}]},
{n:"TRA's Most Desired Brands 2021",c:'images/MDB2021.jpg',l:[{t:'All India Listings',u:'categoryMDB21.php'},{t:'Category Wise',u:'categoryMDBBL21.php'},{t:'Full Report',u:'fullReportMDB21.php'}]},
{n:"TRA's Brand Trust Report, India Study 2020",c:'images/BTR20.jpg',l:[{t:'All India Listings',u:'categoryBTR20.php'},{t:'Category Wise',u:'categoryBTRBL20.php'},{t:'Methodology',u:'methodologyBTR20.php'}]},
{n:"India's Most Desired Brands 2020",c:'images/MDB20.jpg',l:[{t:'All India Listings',u:'categoryMDB20.php'},{t:'Category Wise',u:'categoryMDBBL20.php'},{t:'Full Report',u:'fullReportMDB20.php'}]},
{n:"India's Most Consumer-Focused Brands 2019",c:'images/MCFB19.jpg',l:[{t:'All India Listings',u:'categoryMCFB19.php'},{t:'Category Wise',u:'categoryMCFBBL19.php'},{t:'Full Report',u:'fullReportMCFB19.php'}]},
{n:"TRA's Brand Trust Report, India Study 2019",c:'images/BTR-19.png',l:[{t:'All India Listings',u:'categoryBTR19.php'},{t:'Category Wise',u:'categoryBTRBL19.php'},{t:'Full Report',u:'fullReportBTR19.php'}]},
{n:"INDIA'S MOST ATTRACTIVE BRANDS 2018",c:'images/MAB18.png',l:[{t:'All India Listings',u:'categoryMAB18.php'},{t:'Category Wise',u:'categoryMABBL18.php'},{t:'Full Report',u:'fullReportMAB18.php'},{t:'City Wise',u:'discoveryIndiaMAB18.php'}]},
{n:"India's Most Consumer-Focused Brands 2018",c:'images/IMCFB.jpg',l:[{t:'All India Listings',u:'categoryMCFB18.php'},{t:'Category Wise',u:'categoryMCFBBL18.php'},{t:'Full Report',u:'fullReportMCFB18.php'}]},
{n:"The Brand Trust Report, India Study 2018",c:'images/BTR-2018.jpg',l:[{t:'All India Listings',u:'categoryBTR18.php'},{t:'Category Wise',u:'categoryBTRBL18.php'},{t:'Full Report',u:'fullReportBTR18.php'}]},
{n:"India's Most Attractive Brands 2017",c:'images/MAB17.jpg',l:[{t:'All India Listings',u:'categorymab17.php'},{t:'Category Wise',u:'categorymabBL17.php'},{t:'Full Report',u:'fullReportMAB17.php'}]},
{n:"The Brand Trust Report, India Study 2017",c:'images/BTR17.jpg',l:[{t:'All India Listings',u:'categoryBTR17.php'},{t:'Category Wise',u:'categoryBTRBL17.php'},{t:'Full Report',u:'fullReportBTR17.php'}]},
{n:"India's Most Attractive Brands 2016",c:'images/MAB-2016.jpg',l:[{t:'All India Listings',u:'categorymab.php'},{t:'Category Wise',u:'categorymabBL.php'},{t:'Full Report',u:'fullReportMAB16.php'}]},
{n:"The Brand Trust Report, India Study 2016",c:'images/BTR16.jpg',l:[{t:'All India Listings',u:'category.php'},{t:'Category Wise',u:'categoryBL.php'},{t:'Full Report',u:'fullReportBTR16.php'}]},
{n:"India's Most Attractive Brands 2015",c:'images/MAB15.jpg',l:[{t:'All India Listings',u:'categoryMAB15.php'},{t:'Category Wise',u:'categoryMABBL15.php'},{t:'Full Report',u:'fullReportMAB15.php'}]},
{n:"The Brand Trust Report, India Study 2015",c:'images/BTR15.jpg',l:[{t:'All India Listings',u:'categoryBTR15.php'},{t:'Category Wise',u:'categoryBTRBL15.php'},{t:'Full Report',u:'fullReportBTR15.php'}]},
{n:"India's Most Trusted Educational Institutes 2014",c:'images/MTEI.jpg',l:[{t:'Brand listing',u:'categoryMTEI14.php'},{t:'Executive Summary',u:'javascript:child_open("MTEI14")'},{t:'Full Report',u:'fullReportMTEI14.php'}]},
{n:"The Brand Trust Report, India Study 2014",c:'images/BTR14.jpg',l:[{t:'Brand listing',u:'categoryBTR14.php'},{t:'Executive Summary',u:'javascript:child_open("BTR14")'},{t:'Brand Report',u:'javascript:child_open3("Buy Now")'}]},
{n:"India's Most Attractive Brands 2013",c:'images/MAB13.jpg',l:[{t:'Brand listing',u:'categoryMAB13.php'},{t:'Executive Summary',u:'javascript:child_open("MAB13")'},{t:'Full Report',u:'fullReportMAB13.php'}]},
{n:"The Brand Trust Report, India Study 2013",c:'images/BTR13.jpg',l:[{t:'Brand listing',u:'categoryBTR13.php'},{t:'Executive Summary',u:'javascript:child_open("BTR13")'},{t:'Full Report',u:'fullReportBTR13.php'}]},
{n:"The Brand Trust Report, India Study 2012",c:'images/BTR12.jpg',l:[{t:'Brand listing',u:'categoryBTR12.php'},{t:'Executive Summary',u:'javascript:child_open("BTR12")'},{t:'Full Report',u:'fullReportBTR12.php'}]},
{n:"The Brand Trust Report, India Study, 2011",c:'images/BTR11.jpg',l:[{t:'Executive Summary',u:'javascript:child_open("BTR11")'},{t:'Full Report',u:'fullReportBTR11.php'}]}
];

/* ========== KNOWLEDGE DATA ========== */
var K=[
{n:"TRA's Coronavirus Mental Wellbeing Impact -II October 2021",i:'traKnowledge/whitepaper/TRA-Whitepaper-on-Coronavirus-Mental-Wellbeing-Impact-October-2021.jpg',l:[{t:'View',u:'TRA-Whitepaper-on-Coronavirus-Mental-Wellbeing-Impact-October-2021.html'},{t:'Download',u:'traKnowledge/whitepaper/TRA-Whitepaper-on-Coronavirus-Mental-Wellbeing-Impact-October-2021.pdf'}]},
{n:"TRA's Diwali 2020 Buying Propensity Report",i:'traKnowledge/whitepaper/TRA-DIWALI-2020-Buying-Propensity-Report.jpg',l:[{t:'View',u:'TRA-DIWALI-2020-Buying-Propensity-Report.html'},{t:'Download',u:'traKnowledge/whitepaper/TRA-DIWALI-2020-Buying-Propensity-Report.pdf'}]},
{n:"TRA's Coronavirus Mental Wellbeing Impact 2020",i:'traKnowledge/whitepaper/TRAs-CoronaVirus-Mental-Wellbeing-Impact-2020.jpg',l:[{t:'View',u:'TRAs-CoronaVirus-Mental-Wellbeing-Impact-2020.html'},{t:'Download',u:'traKnowledge/whitepaper/TRAs-CoronaVirus-Mental-Wellbeing-Impact-2020.pdf'}]},
{n:"TRA's Coronavirus Consumer Insights 2020 - 2",i:'traKnowledge/whitepaper/TRAsCoronavirusConsumerInsights-2.jpg',l:[{t:'View',u:'TRAs-Coronavirus-Consumer-Insights-2.html'},{t:'Download',u:'traKnowledge/whitepaper/TRA-Whitepaper-Lockdown-3.0-Consumer-Perceptions.pdf'}]},
{n:"TRA's Coronavirus Corporate Insights 2020",i:'traKnowledge/whitepaper/whitepapercorporatecoronainsights.jpg',l:[{t:'View',u:'TRAs-Coronavirus-Corporate-Insights-May-2020.html'},{t:'Download',u:'traKnowledge/whitepaper/tracoronaviruscorporateinsights2020.pdf'}]},
{n:"Navigating Your Brand Through Turbulence",i:'traKnowledge/webinar/webinarthumbnail.jpg',l:[{t:'View',u:'Videolog-Navigating-your-brand-through-turbulence.html'}]},
{n:"TRA's Coronavirus Consumer Insights 2020",i:'traKnowledge/whitepaper/WhitePaperConsumerResearchCovid.jpg',l:[{t:'View',u:'TRAs-Coronavirus-Consumer-Insights-April-2020.html'},{t:'Download',u:'traKnowledge/whitepaper/Whitepaper-TRAsConsumerResearchoncovid-April 2020.pdf'}]},
{n:"Lockdown Effect - Boosting the mental wellbeing of your employees",i:'traKnowledge/podcast/podcastthumbnail.jpg',l:[{t:'Listen',u:'Podcast-Lockdown-Effect-Boosting-the-mental-wellbeing-of-your-employees.html'}]}
];

/* ========== RENDER REPORTS CAROUSEL ========== */
function esc(s){return s.replace(/'/g,"\\'").replace(/"/g,'&quot;')}
var rh='';
for(var i=0;i<R.length;i++){var r=R[i];var lh='';for(var j=0;j<r.l.length;j++){lh+='<a href="'+r.l[j].u+'" target="_blank" class="rpt-link">'+r.l[j].t+'</a>';}rh+='<div class="rpt-card"><div class="rpt-cover"><img src="'+r.c+'" alt="'+esc(r.n)+'" onerror="this.parentElement.style.background=\'var(--bg-alt)\';this.style.display=\'none\'"><div class="rpt-cover-ov"></div><div class="rpt-info"><div class="rpt-tag">Syndicated Report</div><div class="rpt-title">'+r.n+'</div><div class="rpt-links">'+lh+'</div></div></div></div>';}
document.getElementById('rptTrack').innerHTML=rh;

/* ========== RENDER KNOWLEDGE ========== */
var kh='';
for(var i=0;i<K.length;i++){var k=K[i];var lh='';for(var j=0;j<k.l.length;j++){lh+='<a href="'+k.l[j].u+'" target="_blank" class="kn-link">'+k.l[j].t+'</a>';}kh+='<div class="kn-card"><div class="kn-thumb"><img src="'+k.i+'" alt="'+esc(k.n)+'" onerror="this.parentElement.style.background=\'var(--bg-alt)\';this.style.display=\'none\'"></div><div class="kn-body"><div class="kn-title">'+k.n+'</div><div class="kn-links">'+lh+'</div></div></div>';}
document.getElementById('knGrid').innerHTML=kh;

/* ========== TOGGLE PERSPECTIVES ========== */
var expanded = false;
var INIT = <?php echo $initialCount; ?>;
var totalExtra = <?php echo max(0, $totalGrid - $initialCount); ?>;

function togglePersp() {
    var grid = document.getElementById('perspGrid');
    var btn = document.getElementById('viewMoreBtn');
    var cards = grid.querySelectorAll('.persp-card');

    if (!expanded) {
        // Show grid + first INIT cards
        grid.style.display = 'grid';
        expanded = true;
        btn.classList.add('less');
        document.getElementById('viewMoreTxt').textContent = 'View Less Perspectives';
    } else {
        // Check if hidden cards are visible
        var anyHidden = false;
        for (var i = 0; i < cards.length; i++) {
            if (i >= INIT && !cards[i].classList.contains('hidden')) {
                anyHidden = true;
                break;
            }
        }

        if (anyHidden) {
            // Currently showing all, hide extra
            for (var i = 0; i < cards.length; i++) {
                if (i >= INIT) cards[i].classList.add('hidden');
            }
            document.getElementById('viewMoreTxt').textContent = 'View More Perspectives (' + totalExtra + ' more)';
        } else {
            // Currently showing INIT, show all
            for (var i = 0; i < cards.length; i++) {
                cards[i].classList.remove('hidden');
            }
            document.getElementById('viewMoreTxt').textContent = 'View Less Perspectives';
            return;
        }

        // Hide grid entirely
        grid.style.display = 'none';
        expanded = false;
        btn.classList.remove('less');
        document.getElementById('viewMoreTxt').textContent = 'View More Perspectives (<?php echo $totalGrid; ?> more)';
    }
}

/* ========== PERSPECTIVE MODAL — reads from hidden data divs ========== */
function openPM(pid) {
    var store = document.getElementById('data_' + pid);
    if (!store) return;

    var img     = store.getAttribute('data-img');
    var logo    = store.getAttribute('data-logo');
    var name    = store.getAttribute('data-name');
    var title   = store.getAttribute('data-title');
    var company = store.getAttribute('data-company');
    var theme   = store.getAttribute('data-theme');
    var c1      = store.getAttribute('data-c1');
    var c2      = store.getAttribute('data-c2');
    var content = store.innerHTML;

    var html =
        '<div class="modal-top-bar" style="background:linear-gradient(90deg,'+c1+','+c2+')"></div>' +
        '<div class="modal-head" style="background:linear-gradient(135deg,'+c1+','+c2+')">' +
          '<div class="modal-sp-img"><img src="'+img+'" alt="'+name+'" onerror="this.src=\'https://placehold.co/90x90/ccc/666?text=Photo\'"></div>' +
          '<div class="modal-sp-info"><h2 class="modal-sp-name">'+name+'</h2><div class="modal-sp-title">'+title+'</div><div class="modal-sp-company">'+company+'</div></div>' +
          '<div class="modal-logo"><img src="'+logo+'" alt="Logo" onerror="this.style.display=\'none\'"></div>' +
        '</div>' +
        '<div class="modal-body">' +
          '<div class="q-header"><h3>'+theme+'</h3></div>' +
          '<div class="m-content">'+content+'</div>' +
        '</div>' +
        '<div class="modal-foot"><button class="modal-foot-btn" onclick="closePM()">Close</button></div>';

    document.getElementById('pmContent').innerHTML = html;
    document.getElementById('perspModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closePM() {
    document.getElementById('perspModal').classList.remove('active');
    document.body.style.overflow = '';
}

/* ========== VIDEO MODAL ========== */
function openVideo(id, title, views) {
    document.getElementById('vmTitle').textContent = title || 'Brand Dialogue';
    document.getElementById('vmYt').href = 'https://www.youtube.com/watch?v=' + id;
    document.getElementById('vmPlayer').innerHTML = '<iframe src="https://www.youtube.com/embed/' + id + '?autoplay=1&rel=0&modestbranding=1" allow="autoplay;encrypted-media;picture-in-picture" allowfullscreen></iframe>';
    document.getElementById('videoModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeVM() {
    document.getElementById('vmPlayer').innerHTML = '';
    document.getElementById('videoModal').classList.remove('active');
    document.body.style.overflow = '';
}

/* ========== ENQUIRY MODAL ========== */
function openEnq(name) {
    document.getElementById('enqName').textContent = name;
    document.getElementById('enqModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeEM() {
    document.getElementById('enqModal').classList.remove('active');
    document.body.style.overflow = '';
}

/* ========== CAROUSEL SCROLL ========== */
function scrollC(el, d) {
    if (typeof el === 'string') el = document.getElementById(el);
    el.scrollBy({left: d, behavior: 'smooth'});
}

/* ========== NAV SCROLL ========== */
var nav = document.getElementById('nav');
var navLinks = document.querySelectorAll('.nav-links a');
var sections = document.querySelectorAll('section[id]');
window.addEventListener('scroll', function() {
    if (window.scrollY > 20) nav.classList.add('scrolled'); else nav.classList.remove('scrolled');
    var sp = window.scrollY + 120;
    for (var i = 0; i < sections.length; i++) {
        var s = sections[i];
        if (sp >= s.offsetTop && sp < s.offsetTop + s.offsetHeight) {
            for (var j = 0; j < navLinks.length; j++) {
                navLinks[j].classList.remove('active');
                if (navLinks[j].getAttribute('href') === '#' + s.id) navLinks[j].classList.add('active');
            }
            break;
        }
    }
}, {passive: true});

/* ========== HAMBURGER ========== */
var ham = document.getElementById('hamburger'), mm = document.getElementById('mobileMenu'), mo = false;
ham.addEventListener('click', function() {
    mo = !mo;
    ham.classList.toggle('open', mo);
    mm.classList.toggle('open', mo);
    ham.setAttribute('aria-expanded', mo);
    document.body.style.overflow = mo ? 'hidden' : '';
});
var ml = document.querySelectorAll('.mobile-menu-links a');
for (var i = 0; i < ml.length; i++) {
    ml[i].addEventListener('click', function() {
        if (mo) { mo = false; ham.classList.remove('open'); mm.classList.remove('open'); ham.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; }
    });
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { closePM(); closeVM(); closeEM(); if (mo) { mo = false; ham.classList.remove('open'); mm.classList.remove('open'); document.body.style.overflow = ''; } }
});

/* ========== SMOOTH SCROLL ========== */
var allA = document.querySelectorAll('a[href^="#"]');
for (var i = 0; i < allA.length; i++) {
    allA[i].addEventListener('click', function(e) {
        var t = this.getAttribute('href');
        if (t === '#') return;
        var el = document.querySelector(t);
        if (el) { e.preventDefault(); el.scrollIntoView({behavior: 'smooth', block: 'start'}); }
    });
}

/* ========== REVEAL ========== */
var revEls = document.querySelectorAll('.reveal');
var revObs = new IntersectionObserver(function(entries) {
    for (var i = 0; i < entries.length; i++) {
        if (entries[i].isIntersecting) { entries[i].target.classList.add('visible'); revObs.unobserve(entries[i].target); }
    }
}, {threshold: 0.08, rootMargin: '0px 0px -30px 0px'});
for (var i = 0; i < revEls.length; i++) { revObs.observe(revEls[i]); }
</script>


<script>
    // ==================== PHP-BACKEND INTEGRATED BRAND DATABASE ====================
    const brandDB = {
        'dell': {
            brand: 'DELL',
            subtitle: 'Brand Trust Report (BTR) — COMPUTER | 2025',
            year: '2025',
            rank: '#1',
            change: '↑ 2',
            trend: 'up'
        },
        'apple': {
            brand: 'APPLE IPHONE',
            subtitle: 'Brand Trust Report (BTR) — MOBILE PHONES | 2025',
            year: '2025',
            rank: '#2',
            change: '↑ 3',
            trend: 'up'
        },
        'samsung': {
            brand: 'SAMSUNG',
            subtitle: 'Brand Trust Report (BTR) — MOBILE PHONES | 2025',
            year: '2025',
            rank: '#9',
            change: '↓ 1',
            trend: 'down'
        },
        'sony': {
            brand: 'SONY',
            subtitle: 'Brand Trust Report (BTR) — TELEVISIONS | 2025',
            year: '2025',
            rank: '#4',
            change: '↑ 1',
            trend: 'up'
        },
        'hp': {
            brand: 'HEWLETT PACKARD',
            subtitle: 'Brand Trust Report (BTR) — LAPTOPS | 2025',
            year: '2025',
            rank: '#3',
            change: '↑ 2',
            trend: 'up'
        },
        'honda': {
            brand: 'HONDA',
            subtitle: 'Brand Trust Report (BTR) — MOTORCYCLES | 2025',
            year: '2025',
            rank: '#5',
            change: '—',
            trend: 'neutral'
        },
        'lic': {
            brand: 'LIC',
            subtitle: 'Brand Trust Report (BTR) — LIFE INSURANCE | 2025',
            year: '2025',
            rank: '#6',
            change: '↓ 1',
            trend: 'down'
        },
        'titan': {
            brand: 'TITAN',
            subtitle: 'Brand Trust Report (BTR) — WATCHES | 2025',
            year: '2025',
            rank: '#7',
            change: '↑ 1',
            trend: 'up'
        },
        'bmw': {
            brand: 'BMW',
            subtitle: 'Brand Trust Report (BTR) — LUXURY CARS | 2025',
            year: '2025',
            rank: '#23',
            change: '↑ 4',
            trend: 'up'
        }
    };

    function normalizeQuery(query) {
        const q = query.toLowerCase().trim();
        if (q.includes('dell')) return 'dell';
        if (q.includes('apple') || q.includes('iphone')) return 'apple';
        if (q.includes('samsung')) return 'samsung';
        if (q.includes('sony')) return 'sony';
        if (q.includes('hp') || q.includes('hewlett')) return 'hp';
        if (q.includes('honda')) return 'honda';
        if (q.includes('lic')) return 'lic';
        if (q.includes('titan')) return 'titan';
        if (q.includes('bmw')) return 'bmw';
        return 'dell'; // default fallback
    }

    // ==================== RENDER RESPONSE FROM PHP BACKEND ====================
    function renderResponse(data) {
        const responseHtml = `
            <div class="response-card">
                <div class="response-header">
                    <div style="font-size: 1.55rem; font-weight: 800; display:flex; align-items:center; gap:12px;">
                        ${data.brand}
                        <span class="rank-badge-lg">${data.rank}</span>
                    </div>
                    <div style="font-size: 0.8rem; opacity: 0.85; margin-top:4px;">${data.subtitle}</div>
                </div>
                <div style="padding: 1.4rem 1.6rem;">
                    <table style="width:100%; border-collapse: collapse; font-size:0.95rem;">
                        <thead>
                            <tr style="border-bottom:2px solid #f1f5f9;">
                                <th style="text-align:left; padding-bottom:12px; font-weight:600;">YEAR</th>
                                <th style="text-align:center; padding-bottom:12px; font-weight:600;">ALL-INDIA RANK</th>
                                <th style="text-align:right; padding-bottom:12px; font-weight:600;">TREND</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 14px 0; font-weight:600;">${data.year}</td>
                                <td style="text-align:center;">
                                    <span style="background:#F97316; color:white; padding:6px 22px; border-radius:9999px; font-weight:800;">${data.rank}</span>
                                </td>
                                <td style="text-align:right; font-weight:700; color:${data.trend === 'up' ? '#10b981' : (data.trend === 'down' ? '#ef4444' : '#64748b')};">
                                    ${data.change}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        const placeholder = document.getElementById('responseCardPlaceholder');
        const dynamicCard = document.getElementById('dynamicResponseCard');

        placeholder.style.display = 'none';
        dynamicCard.style.display = 'block';
        dynamicCard.innerHTML = responseHtml;
    }

    // ==================== LOADING STATE ====================
    function showLoading() {
        const placeholder = document.getElementById('responseCardPlaceholder');
        const dynamicCard = document.getElementById('dynamicResponseCard');
        dynamicCard.style.display = 'none';
        placeholder.innerHTML = `
            <div class="loading">
                <i class="fa-solid fa-circle-notch loading-spinner" style="font-size:2rem;"></i>
                <span style="font-weight:600;">Fetching Brand Intelligence from TRA Database...</span>
            </div>
        `;
        placeholder.style.display = 'flex';
    }

    // ==================== FETCH FROM PHP BACKEND ====================
    async function performAsk(query) {
        if (!query.trim()) return;

        showLoading();

        try {
            const response = await fetch(`?action=query&q=${encodeURIComponent(query)}`, {
                method: 'GET',
                headers: { 'Accept': 'application/json' }
            });

            if (!response.ok) throw new Error('Server error');

            const data = await response.json();
            renderResponse(data);

            // Add to history
            addToHistory(query);
        } catch (err) {
            console.error(err);
            // Fallback to default
            const fallbackData = brandDB['dell'];
            renderResponse(fallbackData);
            addToHistory(query);
        }
    }

    // ==================== HISTORY MANAGEMENT ====================
    let historyItems = [];

    function addToHistory(query) {
        const historyDiv = document.getElementById('historyContainer');
        if (historyItems.includes(query)) return;

        historyItems.unshift(query);
        if (historyItems.length > 6) historyItems.pop();

        historyDiv.innerHTML = '';

        historyItems.forEach(q => {
            const item = document.createElement('div');
            item.className = 'query-history-item';
            item.innerHTML = `<i class="fa-solid fa-clock-rotate-left"></i> ${q}`;
            item.onclick = () => {
                document.getElementById('searchQueryInput').value = q;
                performAsk(q);
            };
            historyDiv.appendChild(item);
        });
    }

    // ==================== INITIAL HISTORY (DEMO) ====================
    function initHistory() {
        const demoQueries = [
            "APPLE IPHONE rankings",
            "DELL trust score",
            "Top 10 Most Trusted Brands 2025",
            "Samsung vs Apple",
            "HP laptop trust report"
        ];
        demoQueries.forEach(q => addToHistory(q));
    }

    // ==================== TOGGLE LOGIC (Default DOWN) ====================
    let isExpanded = false;
    const toggleContent = document.getElementById('toggleContent');
    const arrowIcon = document.getElementById('arrowIcon');
    const toggleHeaderDiv = document.getElementById('toggleHeader');

    function updateToggle() {
        if (isExpanded) {
            toggleContent.classList.add('open');
            arrowIcon.className = 'fas fa-chevron-up';
        } else {
            toggleContent.classList.remove('open');
            arrowIcon.className = 'fas fa-chevron-down';
        }
    }

    toggleHeaderDiv.addEventListener('click', (e) => {
        if (e.target.closest('#askTraBottomBtn')) return;
        isExpanded = !isExpanded;
        updateToggle();
    });

    // ==================== BOTTOM NAV ====================
    document.getElementById('askTraBottomBtn').addEventListener('click', () => {
        if (!isExpanded) {
            isExpanded = true;
            updateToggle();
        }
        document.getElementById('askTraToggleCard').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    document.getElementById('scrollTopBtn').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    function navigateToSection(section) {
        // Placeholder for future brand/category pages (fullstack ready)
        alert(`🔥 Navigating to ${section.toUpperCase()} intelligence page... (Ready for PHP routing)`);
    }

    // ==================== EVENT LISTENERS ====================
    function initEventListeners() {
        const askBtn = document.getElementById('askButton');
        const input = document.getElementById('searchQueryInput');

        askBtn.addEventListener('click', () => {
            const q = input.value.trim();
            if (q) performAsk(q);
        });

        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const q = input.value.trim();
                if (q) performAsk(q);
            }
        });

        // Make history clickable again after render
        initHistory();
    }

    // ==================== START THE FULLSTACK APP ====================
    window.onload = function () {
        // Default toggle state = CLOSED (down arrow)
        isExpanded = false;
        updateToggle();

        initEventListeners();

        console.log('%c✅ ASK TRA Fullstack PHP + JS Ready – Smooth & Production Grade', 'color:#F97316; font-weight:700; font-size:13px;');
    };
</script>
</body>
</html>
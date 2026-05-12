<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Easy Billing Pro — My Portal</title>
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700;800;900&family=Yeseva+One&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>tailwind.config={darkMode:['attribute','[data-theme="dark"]'],theme:{extend:{fontFamily:{sans:['Lexend','sans-serif'],display:['Yeseva One','serif'],mono:['JetBrains Mono','monospace']}}}}</script>

<style>
/* ════════════════════════════════════════════════════
   EASY BILLING PRO — DEFINITIVE PORTAL
   Rose Gold · Deep Midnight · Sage · Fully Mobile
════════════════════════════════════════════════════ */
:root {
  --bg:       #faf8f6;
  --bg2:      #f3f0eb;
  --surf:     #ffffff;
  --surf2:    #f8f5f0;
  --surf3:    #f0ebe4;
  --bdr:      #e8e0d6;
  --bdr2:     #d4c8ba;
  --txt:      #1c1510;
  --txt2:     #6b5c4a;
  --txt3:     #a8937e;
  --rose:     #c2636a;   /* rose gold */
  --rose2:    #a8494f;
  --roselt:   rgba(194,99,106,.12);
  --midnight: #1e293b;
  --midlt:    rgba(30,41,59,.08);
  --sage:     #4a7c59;
  --sagelt:   rgba(74,124,89,.1);
  --gold:     #c9920f;
  --goldlt:   rgba(201,146,15,.12);
  --blue:     #2554b8;
  --bluelt:   rgba(37,84,184,.1);
  --red:      #c0202a;
  --redlt:    rgba(192,32,42,.1);
  --sh:       0 1px 4px rgba(0,0,0,.05),0 2px 14px rgba(0,0,0,.05);
  --sh-md:    0 4px 24px rgba(0,0,0,.1);
  --sh-lg:    0 12px 48px rgba(0,0,0,.15);
  --r:        16px;
  --nav:      64px;
}
[data-theme="dark"] {
  --bg:       #0d0c0a;
  --bg2:      #141209;
  --surf:     #1c1a14;
  --surf2:    #242018;
  --surf3:    #2c281e;
  --bdr:      #362f24;
  --bdr2:     #4a4030;
  --txt:      #f0ece0;
  --txt2:     #a89878;
  --txt3:     #706050;
  --sh:       0 1px 4px rgba(0,0,0,.3),0 2px 14px rgba(0,0,0,.2);
  --sh-md:    0 4px 24px rgba(0,0,0,.45);
  --sh-lg:    0 12px 48px rgba(0,0,0,.6);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Lexend',sans-serif;background:var(--bg);color:var(--txt);-webkit-font-smoothing:antialiased;transition:background .3s,color .3s;overflow-x:hidden}
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--bdr2);border-radius:99px}

/* ── NAVBAR ──────────────────────────── */
#nav{
  position:fixed;top:0;left:0;right:0;z-index:60;
  height:var(--nav);background:var(--surf);
  border-bottom:1px solid var(--bdr);box-shadow:var(--sh);
  display:flex;align-items:center;gap:10px;padding:0 16px;
  transition:background .3s,border-color .3s;
}
.brand{
  font-family:'Yeseva One',serif;font-size:18px;color:var(--rose);
  white-space:nowrap;letter-spacing:-.2px;
}
.nav-srch{flex:1;max-width:340px;position:relative}
.nav-srch input{
  width:100%;background:var(--surf2);border:1.5px solid var(--bdr);
  border-radius:12px;padding:8px 12px 8px 36px;
  font-family:'Lexend',sans-serif;font-size:13px;color:var(--txt);
  outline:none;transition:all .2s;
}
.nav-srch input:focus{border-color:var(--rose);box-shadow:0 0 0 3px var(--roselt)}
.nav-srch input::placeholder{color:var(--txt3)}
.nav-srch .si{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--txt3);font-size:13px;pointer-events:none}
#s-drop{position:absolute;top:calc(100%+6px);left:0;right:0;background:var(--surf);border:1px solid var(--bdr);border-radius:14px;box-shadow:var(--sh-md);max-height:300px;overflow-y:auto;display:none;z-index:80}
.nib{width:38px;height:38px;border-radius:11px;background:var(--surf2);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--txt2);transition:all .15s;position:relative;flex-shrink:0}
.nib:hover{background:var(--surf3);color:var(--txt)}
.nbadge{position:absolute;top:-4px;right:-4px;min-width:18px;height:18px;background:var(--rose);color:#fff;border-radius:99px;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;padding:0 4px;border:2px solid var(--surf)}

/* CLOCK */
#clock{font-family:'JetBrains Mono',monospace;font-size:13px;font-weight:600;color:var(--txt2);padding:6px 10px;background:var(--surf2);border:1px solid var(--bdr);border-radius:10px;white-space:nowrap;text-align:center;transition:background .3s}
#clock .cs{color:var(--rose);font-weight:700}
.clock-date{font-size:9px;color:var(--txt3);display:block;text-align:center;letter-spacing:.02em}

/* PAGE OFFSET */
body{padding-top:var(--nav)}

/* ── MOBILE BOTTOM NAV ───────────────── */
#bot-nav{
  display:none;position:fixed;bottom:0;left:0;right:0;z-index:60;
  background:var(--surf);border-top:1px solid var(--bdr);
  height:58px;align-items:center;justify-content:space-around;padding:0 8px;
  box-shadow:0 -4px 20px rgba(0,0,0,.08);
}
.bn-item{display:flex;flex-direction:column;align-items:center;gap:2px;cursor:pointer;padding:4px 12px;border-radius:10px;color:var(--txt3);font-size:10px;font-weight:600;transition:all .15s;text-align:center}
.bn-item.on{color:var(--rose);background:var(--roselt)}
.bn-item i{font-size:18px}
@media(max-width:768px){#bot-nav{display:flex}body{padding-bottom:68px}}

/* ── HERO ────────────────────────────── */
.hero{
  background:linear-gradient(135deg,#1e293b 0%,#374151 30%,#c2636a 70%,#a8494f 100%);
  position:relative;overflow:hidden;
}
.hero::before{content:'';position:absolute;inset:0;background:url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.03'%3E%3Cpath d='M20 0L0 20L20 40L40 20Z'/%3E%3C/g%3E%3C/svg%3E")}
.hero-inner{max-width:1200px;margin:0 auto;padding:32px 16px 28px;position:relative;z-index:1}
@media(max-width:640px){.hero-inner{padding:24px 14px 20px}}

/* AVATAR */
.av{width:88px;height:88px;border-radius:18px;object-fit:cover;border:3px solid rgba(255,255,255,.85);box-shadow:0 8px 32px rgba(0,0,0,.28);transition:transform .2s;flex-shrink:0}
.av:hover{transform:scale(1.04)}
@media(max-width:640px){.av{width:70px;height:70px}}

/* STAT CHIPS */
.schip{display:flex;flex-direction:column;align-items:center;padding:10px 16px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:12px;backdrop-filter:blur(8px);min-width:70px;cursor:default;transition:background .15s}
.schip:hover{background:rgba(255,255,255,.17)}
.scn{font-family:'JetBrains Mono',monospace;font-size:20px;font-weight:700;color:#fff;line-height:1}
.scl{font-size:10px;color:rgba(255,255,255,.6);margin-top:3px;font-weight:500}
@media(max-width:480px){.schip{padding:8px 12px;min-width:60px}.scn{font-size:17px}}

/* BADGES */
.ubadge{display:inline-flex;align-items:center;gap:4px;padding:2px 9px;border-radius:99px;font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.05em}
.bg-gold{background:rgba(201,146,15,.25);color:#fbbf24;border:1px solid rgba(251,191,36,.3)}
.bg-act{background:rgba(74,124,89,.25);color:#6ee7b7;border:1px solid rgba(110,231,183,.3)}

/* ── MAIN LAYOUT ─────────────────────── */
.page-wrap{max-width:1200px;margin:0 auto;padding:0 16px}
.section{padding:28px 0 20px}
@media(max-width:640px){.section{padding:20px 0 14px}}
.sh{display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:8px;margin-bottom:16px}
.stitle{font-family:'Yeseva One',serif;font-size:22px;color:var(--txt);letter-spacing:-.2px}
.ssub{font-size:12.5px;color:var(--txt3);margin-top:1px}
.divider{height:1px;background:linear-gradient(to right,transparent,var(--bdr),transparent);margin:4px 0}

/* ── CARDS ───────────────────────────── */
.card{background:var(--surf);border:1px solid var(--bdr);border-radius:var(--r);box-shadow:var(--sh);transition:background .3s,border-color .3s,box-shadow .22s,transform .22s}
.card:hover{box-shadow:var(--sh-md)}

/* PRODUCT CARD */
.pcard{flex:0 0 186px;background:var(--surf);border:1px solid var(--bdr);border-radius:14px;overflow:hidden;cursor:pointer;box-shadow:var(--sh);transition:box-shadow .22s,transform .22s;position:relative}
.pcard:hover{box-shadow:0 6px 28px rgba(194,99,106,.22),var(--sh-md);transform:translateY(-4px)}
.pc-iw{height:152px;overflow:hidden;position:relative}
.pc-img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .35s}
.pcard:hover .pc-img{transform:scale(1.1)}
.pc-ov{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.72) 0%,transparent 55%);display:flex;align-items:flex-end;padding:10px;opacity:0;transition:opacity .22s}
.pcard:hover .pc-ov{opacity:1}
.pc-qb{width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,.9);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px;transition:all .15s}
.pc-qb:hover{background:#fff;transform:scale(1.1)}
.pc-body{padding:11px}
.pc-name{font-size:13px;font-weight:700;color:var(--txt);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-bottom:3px}
.pc-price{font-family:'JetBrains Mono',monospace;font-size:15px;font-weight:700;color:var(--rose)}
.pc-old{font-family:'JetBrains Mono',monospace;font-size:11px;color:var(--txt3);text-decoration:line-through;margin-left:4px}
.pc-badge{position:absolute;top:8px;left:8px;background:var(--rose);color:#fff;font-size:9.5px;font-weight:700;padding:2px 7px;border-radius:99px}
.pc-heart{position:absolute;top:8px;right:8px;width:28px;height:28px;border-radius:7px;background:rgba(255,255,255,.88);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:13px;transition:all .15s}
.pc-heart:hover,.pc-heart.on{background:#fff;color:var(--red)}
.stars{display:flex;gap:1px;align-items:center;margin-top:3px}
.stars i{font-size:10px;color:#e5e7eb}
.stars i.on{color:#f59e0b}
.stars span{font-size:10.5px;font-weight:700;color:var(--txt2);margin-left:3px}
@media(max-width:480px){.pcard{flex:0 0 160px}.pc-iw{height:132px}}

/* CAROUSEL */
.carousel{display:flex;gap:12px;overflow-x:auto;padding:6px 2px 14px;scroll-behavior:smooth;-webkit-overflow-scrolling:touch}
.carousel::-webkit-scrollbar{height:4px}
.carousel::-webkit-scrollbar-thumb{background:var(--bdr2);border-radius:99px}
.cw{position:relative;margin:0 -4px}
.carr-btn{position:absolute;top:50%;transform:translateY(-60%);width:34px;height:34px;border-radius:50%;background:var(--surf);border:1px solid var(--bdr);box-shadow:var(--sh-md);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:13px;color:var(--txt2);transition:all .15s;z-index:5}
.carr-btn:hover{background:var(--rose);color:#fff;border-color:var(--rose)}
.carr-btn.l{left:-14px}.carr-btn.r{right:-14px}
@media(max-width:640px){.carr-btn{display:none}}

/* WISHLIST GRID */
.wgrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(168px,1fr));gap:12px}
@media(max-width:400px){.wgrid{grid-template-columns:repeat(2,1fr)}}

.wcard{background:var(--surf);border:1px solid var(--bdr);border-radius:14px;overflow:hidden;box-shadow:var(--sh);transition:box-shadow .22s,transform .22s;cursor:pointer;position:relative}
.wcard:hover{box-shadow:var(--sh-md);transform:translateY(-3px)}
.wcard-img{width:100%;height:160px;object-fit:cover;display:block;transition:transform .35s}
.wcard:hover .wcard-img{transform:scale(1.07)}
.wcard-body{padding:12px}

/* ORDER CARD */
.ocard{background:var(--surf);border:1px solid var(--bdr);border-radius:14px;padding:14px;box-shadow:var(--sh);display:flex;gap:12px;align-items:flex-start;transition:box-shadow .2s}
.ocard:hover{box-shadow:var(--sh-md)}
.ocard-img{width:70px;height:70px;border-radius:10px;object-fit:cover;border:1px solid var(--bdr);flex-shrink:0}
@media(max-width:480px){.ocard-img{width:56px;height:56px}}

/* STATUS */
.st{display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:700}
.st::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.st-del{background:var(--sagelt);color:var(--sage)}
.st-pen{background:var(--goldlt);color:var(--gold)}
.st-shi{background:var(--bluelt);color:var(--blue)}
.st-can{background:var(--redlt);color:var(--red)}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:5px;padding:8px 16px;border-radius:10px;font-family:'Lexend',sans-serif;font-size:12.5px;font-weight:700;cursor:pointer;border:none;outline:none;transition:all .15s;white-space:nowrap}
.btn-rose{background:var(--rose);color:#fff;box-shadow:0 2px 10px var(--roselt)}
.btn-rose:hover{background:var(--rose2);transform:translateY(-1px)}
.btn-sage{background:var(--sage);color:#fff}
.btn-sage:hover{background:#3a6247;transform:translateY(-1px)}
.btn-ghost{background:transparent;color:var(--txt2);border:1px solid var(--bdr)}
.btn-ghost:hover{background:var(--surf2);color:var(--txt)}
.btn-sm{padding:5px 11px;font-size:12px}
.btn-xs{padding:4px 9px;font-size:11px;border-radius:8px}

/* AI CARDS */
.ai-card{border-radius:14px;padding:17px;cursor:pointer;transition:transform .22s,box-shadow .22s;flex:0 0 234px;position:relative;overflow:hidden}
.ai-card:hover{transform:translateY(-4px);box-shadow:var(--sh-lg)}
.ai-a{background:linear-gradient(135deg,#c2636a,#7c2d35)}
.ai-b{background:linear-gradient(135deg,#4a7c59,#1b3a28)}
.ai-c{background:linear-gradient(135deg,#2554b8,#1e3a8a)}
.ai-d{background:linear-gradient(135deg,#9333ea,#6d28d9)}
@media(max-width:480px){.ai-card{flex:0 0 200px}}

/* TIMELINE */
.tl{position:relative;padding-left:36px}
.tl::before{content:'';position:absolute;left:15px;top:6px;bottom:6px;width:2px;background:var(--bdr);border-radius:99px}
.tl-item{position:relative;padding-bottom:18px}
.tl-ico{position:absolute;left:-36px;width:32px;height:32px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff;box-shadow:var(--sh-md);z-index:1}

/* MODALS */
.ov{position:fixed;inset:0;background:rgba(0,0,0,.52);backdrop-filter:blur(8px);z-index:100;display:none;align-items:center;justify-content:center;padding:14px}
.ov.open{display:flex}
.modal{background:var(--surf);border:1px solid var(--bdr);border-radius:20px;width:100%;max-width:640px;max-height:92vh;overflow-y:auto;box-shadow:var(--sh-lg);animation:mIn .24s cubic-bezier(.34,1.56,.64,1)}
.modal-sm{max-width:500px}
@keyframes mIn{from{opacity:0;transform:scale(.9) translateY(16px)}to{opacity:1;transform:none}}
.mh{padding:18px 20px 14px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:var(--surf);z-index:2}
.mht{font-family:'Yeseva One',serif;font-size:18px;color:var(--txt)}
.mb{padding:18px 20px}
.mf{padding:12px 20px;border-top:1px solid var(--bdr);display:flex;gap:8px;justify-content:flex-end;position:sticky;bottom:0;background:var(--surf)}

/* CART DRAWER */
#cart-d{
  position:fixed;right:0;top:0;bottom:0;width:380px;max-width:95vw;
  background:var(--surf);border-left:1px solid var(--bdr);box-shadow:var(--sh-lg);z-index:90;
  transform:translateX(100%);transition:transform .3s cubic-bezier(.4,0,.2,1);
  display:flex;flex-direction:column;
}
#cart-d.open{transform:translateX(0)}
.cd-h{padding:16px 18px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between}
.cd-b{flex:1;overflow-y:auto;padding:14px 18px}
.cd-f{padding:14px 18px;border-top:1px solid var(--bdr)}
.ci{display:flex;gap:10px;padding:10px 0;border-bottom:1px solid var(--bdr)}
.ci:last-child{border-bottom:none}
.ci-img{width:54px;height:54px;border-radius:9px;object-fit:cover;border:1px solid var(--bdr);flex-shrink:0}
.qty-ctl{display:inline-flex;align-items:center;gap:4px;border:1.5px solid var(--bdr);border-radius:8px;overflow:hidden}
.qty-btn{width:26px;height:26px;border:none;background:var(--surf2);cursor:pointer;font-size:14px;display:flex;align-items:center;justify-content:center;transition:background .15s;color:var(--txt)}
.qty-btn:hover{background:var(--surf3)}
.qty-n{min-width:28px;text-align:center;font-family:'JetBrains Mono',monospace;font-size:13px;font-weight:700;color:var(--txt);background:var(--surf)}

/* CART BACKDROP */
#cart-bg{position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:80;display:none}
#cart-bg.open{display:block}

/* ORDER MODAL STEPS */
.addr-card{border:1.5px solid var(--bdr);border-radius:12px;padding:12px 14px;cursor:pointer;transition:all .15s}
.addr-card.sel{border-color:var(--rose);background:var(--roselt)}
.pay-opt{border:1.5px solid var(--bdr);border-radius:12px;padding:11px 14px;cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:10px}
.pay-opt.sel{border-color:var(--rose);background:var(--roselt)}

/* FORMS */
.fi{width:100%;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:10px;padding:9px 12px;font-family:'Lexend',sans-serif;font-size:13.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none}
.fi:focus{border-color:var(--rose);box-shadow:0 0 0 3px var(--roselt);background:var(--surf)}
.fi::placeholder{color:var(--txt3)}
.fl{display:block;font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt2);margin-bottom:4px}
.fg{margin-bottom:12px}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
@media(max-width:500px){.g2{grid-template-columns:1fr}}

/* FILTER BAR */
.fbar{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px}
.fsm{background:var(--surf);border:1.5px solid var(--bdr);border-radius:10px;padding:7px 11px;font-family:'Lexend',sans-serif;font-size:12.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none;cursor:pointer}
.fsm:focus{border-color:var(--rose)}
.vtog{display:flex;gap:3px;border:1.5px solid var(--bdr);border-radius:10px;padding:3px;background:var(--surf2)}
.vb{width:30px;height:30px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:13px;cursor:pointer;color:var(--txt2);transition:all .15s}
.vb.on{background:var(--rose);color:#fff}

/* TOAST */
#tw{position:fixed;bottom:70px;right:14px;z-index:999;display:flex;flex-direction:column;gap:7px;pointer-events:none}
@media(min-width:769px){#tw{bottom:22px;right:22px}}
.toast{display:flex;align-items:center;gap:9px;padding:11px 14px;border-radius:12px;background:var(--surf);border:1px solid var(--bdr);box-shadow:var(--sh-lg);font-size:13px;font-weight:600;color:var(--txt);min-width:200px;max-width:300px;pointer-events:all;animation:tIn .26s cubic-bezier(.34,1.56,.64,1);transition:opacity .25s,transform .25s}
@keyframes tIn{from{opacity:0;transform:translateX(60px) scale(.9)}to{opacity:1;transform:none}}
.toast.hiding{opacity:0;transform:translateX(50px)}
.ts .ti{color:var(--sage)}.te .ti{color:var(--red)}.ti2 .ti{color:var(--rose)}.tw2 .ti{color:var(--gold)}

/* SKELETON */
.skel{background:linear-gradient(90deg,var(--surf2) 25%,var(--surf3) 50%,var(--surf2) 75%);background-size:200% 100%;animation:sk 1.4s infinite;border-radius:10px}
@keyframes sk{0%{background-position:-200% 0}100%{background-position:200% 0}}

/* MONO */
.mono{font-family:'JetBrains Mono',monospace}

/* SECTION TABS (mobile) */
.stabs{display:none;gap:0;border-bottom:1px solid var(--bdr);margin-bottom:16px;overflow-x:auto}
.stab{padding:10px 16px;font-size:13px;font-weight:700;color:var(--txt2);cursor:pointer;border-bottom:2px solid transparent;white-space:nowrap;transition:all .15s}
.stab.on{color:var(--rose);border-bottom-color:var(--rose)}
@media(max-width:768px){.stabs{display:flex}}
</style>
</head>
<body>

<!-- CART BACKDROP -->
<div id="cart-bg" onclick="closeCart()"></div>

<!-- TOAST -->
<div id="tw"></div>

<!-- ═══════════════════════════════════
     CART DRAWER
═══════════════════════════════════ -->
<div id="cart-d">
  <div class="cd-h">
    <div>
      <div style="font-family:'Yeseva One',serif;font-size:18px;color:var(--txt)">Shopping Cart</div>
      <div style="font-size:12px;color:var(--txt3)" id="cart-label">0 items</div>
    </div>
    <button class="nib" onclick="closeCart()"><i class="fas fa-times"></i></button>
  </div>
  <div class="cd-b" id="cart-items-el"></div>
  <div class="cd-f">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
      <span style="font-size:13.5px;font-weight:600;color:var(--txt2)">Total</span>
      <span class="mono" style="font-size:20px;font-weight:700;color:var(--rose)" id="cart-total">$0.00</span>
    </div>
    <button class="btn btn-rose" style="width:100%;justify-content:center;padding:11px" onclick="openCheckout()"><i class="fas fa-lock"></i> Secure Checkout</button>
    <button class="btn btn-ghost btn-sm" style="width:100%;justify-content:center;margin-top:8px" onclick="clearCart()"><i class="fas fa-trash"></i> Clear Cart</button>
  </div>
</div>

<!-- ═══════════════════════════════════
     PROFILE MODAL
═══════════════════════════════════ -->
<div id="prof-ov" class="ov">
  <div class="modal modal-sm">
    <div class="mh"><span class="mht">Edit Profile</span><button class="nib" onclick="closeOv('prof-ov')"><i class="fas fa-times"></i></button></div>
    <div class="mb" id="prof-body"></div>
    <div class="mf"><button class="btn btn-ghost btn-sm" onclick="closeOv('prof-ov')">Cancel</button><button class="btn btn-rose btn-sm" onclick="saveProfFn()"><i class="fas fa-save"></i> Save</button></div>
  </div>
</div>

<!-- PRODUCT DETAIL MODAL -->
<div id="prod-ov" class="ov">
  <div class="modal modal-sm">
    <div class="mh"><span class="mht" id="prod-m-t">Product</span><button class="nib" onclick="closeOv('prod-ov')"><i class="fas fa-times"></i></button></div>
    <div class="mb" id="prod-m-b"></div>
    <div class="mf" id="prod-m-f"></div>
  </div>
</div>

<!-- CHECKOUT MODAL -->
<div id="check-ov" class="ov">
  <div class="modal modal-sm">
    <div class="mh"><span class="mht" id="check-t">Checkout</span><button class="nib" onclick="closeOv('check-ov')"><i class="fas fa-times"></i></button></div>
    <div class="mb" id="check-b"></div>
    <div class="mf" id="check-f"></div>
  </div>
</div>

<!-- ═══════════════════════════════════
     NAVBAR
═══════════════════════════════════ -->
<nav id="nav">
  <div class="brand" style="min-width:fit-content">EBP</div>

  <div class="nav-srch">
    <i class="fas fa-search si"></i>
    <input type="text" id="ns" placeholder="Search products…" oninput="doSearch(this.value)" autocomplete="off"/>
    <div id="s-drop"></div>
  </div>

  <div style="display:flex;align-items:center;gap:7px;margin-left:auto">
    <!-- Clock — hidden on very small screens -->
    <div id="clock" class="hidden sm:block">00:00:<span class="cs">00</span><span class="clock-date" id="clock-date"></span></div>

    <!-- Dark mode -->
    <button class="nib" onclick="toggleTheme()" title="Theme"><i class="fas fa-moon" id="theme-i"></i></button>

    <!-- Notifications -->
    <button class="nib hidden sm:flex" onclick="toast('3 new notifications!','info')">
      <i class="fas fa-bell"></i>
      <span class="nbadge" style="background:var(--red)">3</span>
    </button>

    <!-- Cart -->
    <button class="nib" onclick="toggleCart()" title="Cart">
      <i class="fas fa-shopping-cart"></i>
      <span class="nbadge" id="cart-n" style="display:none">0</span>
    </button>

    <!-- Profile avatar -->
    <img id="nav-av" src="" alt="User" style="width:36px;height:36px;border-radius:10px;object-fit:cover;border:2px solid var(--rose);cursor:pointer" onclick="openProfModal()" title="Profile"/>
  </div>
</nav>

<!-- ═══════════════════════════════════
     HERO / PROFILE
═══════════════════════════════════ -->
<section class="hero">
  <div class="hero-inner">
    <div style="display:flex;flex-wrap:wrap;align-items:flex-start;gap:18px">
      <!-- Avatar -->
      <div style="position:relative;flex-shrink:0">
        <img id="h-av" src="" alt="User" class="av"/>
        <button onclick="openProfModal()" style="position:absolute;bottom:-4px;right:-4px;width:26px;height:26px;border-radius:8px;background:var(--rose);color:#fff;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:11px;box-shadow:0 2px 8px rgba(0,0,0,.3)"><i class="fas fa-pencil"></i></button>
      </div>

      <!-- Info -->
      <div style="flex:1;min-width:0">
        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:4px">
          <h1 id="h-name" style="font-family:'Yeseva One',serif;font-size:clamp(20px,4vw,26px);color:#fff;letter-spacing:-.2px"></h1>
          <span class="ubadge bg-gold"><i class="fas fa-crown" style="font-size:8px"></i>Gold</span>
          <span class="ubadge bg-act" style="font-size:9px">Active</span>
        </div>
        <div id="h-email" style="font-size:13px;color:rgba(255,255,255,.72);margin-bottom:2px"></div>
        <div id="h-since" style="font-size:11.5px;color:rgba(255,255,255,.48);margin-bottom:14px"></div>
        <div style="display:flex;flex-wrap:wrap;gap:7px" id="h-stats"></div>
      </div>

      <!-- Buttons (desktop) -->
      <div class="hidden sm:flex" style="flex-direction:column;gap:7px;align-items:flex-end">
        <button class="btn btn-ghost btn-sm" style="background:rgba(255,255,255,.15);color:#fff;border-color:rgba(255,255,255,.25)" onclick="openProfModal()"><i class="fas fa-pencil"></i> Edit</button>
        <button class="btn btn-ghost btn-sm" style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.7);border-color:rgba(255,255,255,.15)" onclick="toast('Settings!','info')"><i class="fas fa-cog"></i> Settings</button>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════
     MOBILE SECTION TABS
═══════════════════════════════════ -->
<div class="page-wrap" style="padding-top:16px">
  <div class="stabs" id="section-tabs">
    <div class="stab on" onclick="showTab('viewed')">Viewed</div>
    <div class="stab" onclick="showTab('ai')">AI Picks</div>
    <div class="stab" onclick="showTab('wishlist')">Wishlist</div>
    <div class="stab" onclick="showTab('browse')">Browse</div>
    <div class="stab" onclick="showTab('orders')">Orders</div>
    <div class="stab" onclick="showTab('timeline')">Activity</div>
  </div>
</div>

<!-- ═══════════════════════════════════
     MAIN CONTENT
═══════════════════════════════════ -->
<main>

  <!-- ── RECENTLY VIEWED ── -->
  <div class="page-wrap" id="sec-viewed">
    <div class="section">
      <div class="sh">
        <div><div class="stitle">Continue Browsing</div><div class="ssub">Products you recently viewed</div></div>
      </div>
      <!-- Skeleton -->
      <div id="sk-viewed" style="display:flex;gap:12px;overflow:hidden">
        <div class="skel" style="flex:0 0 186px;height:236px"></div>
        <div class="skel" style="flex:0 0 186px;height:236px"></div>
        <div class="skel" style="flex:0 0 186px;height:236px"></div>
        <div class="skel" style="flex:0 0 186px;height:236px"></div>
      </div>
      <div class="cw" id="viewed-wrap" style="display:none">
        <button class="carr-btn l" onclick="scroll_c('c-viewed',-1)"><i class="fas fa-chevron-left"></i></button>
        <div class="carousel" id="c-viewed"></div>
        <button class="carr-btn r" onclick="scroll_c('c-viewed',1)"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
    <div class="divider"></div>
  </div>

  <!-- ── AI SECTION ── -->
  <div class="page-wrap" id="sec-ai">
    <div class="section">
      <div class="sh">
        <div>
          <div style="display:flex;align-items:center;gap:9px">
            <div style="width:32px;height:32px;border-radius:9px;background:linear-gradient(135deg,var(--rose),#ea580c);display:flex;align-items:center;justify-content:center;font-size:14px;color:#fff"><i class="fas fa-robot"></i></div>
            <div class="stitle" style="margin:0">AI Picks</div>
          </div>
          <div class="ssub">Smart recommendations just for you</div>
        </div>
      </div>
      <!-- AI Feature Cards -->
      <div style="display:flex;gap:10px;overflow-x:auto;padding:2px 0 14px">
        <div class="ai-card ai-a" onclick="toast('Loading products you may like…','info')">
          <div style="position:relative;z-index:1"><div style="font-size:22px;margin-bottom:7px">✨</div><div style="font-size:14px;font-weight:700;color:#fff;margin-bottom:3px">You May Like</div><div style="font-size:11.5px;color:rgba(255,255,255,.75)">Based on your history</div><div style="margin-top:10px;display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:99px">12 items →</div></div>
        </div>
        <div class="ai-card ai-b" onclick="toast('Trending products loaded!','success')">
          <div style="position:relative;z-index:1"><div style="font-size:22px;margin-bottom:7px">🔥</div><div style="font-size:14px;font-weight:700;color:#fff;margin-bottom:3px">Trending Now</div><div style="font-size:11.5px;color:rgba(255,255,255,.75)">Most viewed this week</div><div style="margin-top:10px;display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:99px">Explore →</div></div>
        </div>
        <div class="ai-card ai-c" onclick="toast('Best deals loading…','info')">
          <div style="position:relative;z-index:1"><div style="font-size:22px;margin-bottom:7px">💰</div><div style="font-size:14px;font-weight:700;color:#fff;margin-bottom:3px">Best Deals</div><div style="font-size:11.5px;color:rgba(255,255,255,.75)">Discounts on saved items</div><div style="margin-top:10px;display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:99px">Save more →</div></div>
        </div>
        <div class="ai-card ai-d" onclick="toast('Popular picks loading…','info')">
          <div style="position:relative;z-index:1"><div style="font-size:22px;margin-bottom:7px">👥</div><div style="font-size:14px;font-weight:700;color:#fff;margin-bottom:3px">Popular Picks</div><div style="font-size:11.5px;color:rgba(255,255,255,.75)">Among similar shoppers</div><div style="margin-top:10px;display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:3px 9px;border-radius:99px">View all →</div></div>
        </div>
      </div>
      <!-- AI Carousel -->
      <div class="cw" style="margin-top:4px">
        <button class="carr-btn l" onclick="scroll_c('c-ai',-1)"><i class="fas fa-chevron-left"></i></button>
        <div class="carousel" id="c-ai"></div>
        <button class="carr-btn r" onclick="scroll_c('c-ai',1)"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
    <div class="divider"></div>
  </div>

  <!-- ── WISHLIST ── -->
  <div class="page-wrap" id="sec-wishlist">
    <div class="section">
      <div class="sh">
        <div><div class="stitle">❤️ Wishlist</div><div class="ssub" id="wish-sub">0 saved items</div></div>
        <div style="display:flex;gap:7px;align-items:center;flex-wrap:wrap">
          <div class="vtog">
            <div class="vb on" id="wg-b" onclick="setWV('grid')" title="Grid"><i class="fas fa-th-large"></i></div>
            <div class="vb" id="wl-b" onclick="setWV('list')" title="List"><i class="fas fa-list"></i></div>
          </div>
          <select class="fsm" id="wcat" onchange="renderWish()"><option value="">All Categories</option><option>Electronics</option><option>Clothing</option><option>Home</option><option>Sports</option><option>Beauty</option><option>Footwear</option></select>
          <select class="fsm" id="wsort" onchange="renderWish()"><option value="">Default</option><option value="price-asc">Price ↑</option><option value="price-desc">Price ↓</option><option value="rating">Top Rated</option></select>
        </div>
      </div>
      <div id="wish-el"></div>
    </div>
    <div class="divider"></div>
  </div>

  <!-- ── BROWSE / FILTER ── -->
  <div class="page-wrap" id="sec-browse">
    <div class="section">
      <div class="sh">
        <div><div class="stitle">Browse Products</div><div class="ssub" id="browse-sub">All products</div></div>
        <div class="vtog">
          <div class="vb on" id="bg-b" onclick="setPV('grid')"><i class="fas fa-th-large"></i></div>
          <div class="vb" id="bl-b" onclick="setPV('list')"><i class="fas fa-list"></i></div>
        </div>
      </div>
      <div class="fbar">
        <div style="position:relative;flex:1;min-width:150px">
          <i class="fas fa-search" style="position:absolute;left:9px;top:50%;transform:translateY(-50%);font-size:11px;color:var(--txt3);pointer-events:none"></i>
          <input class="fsm" id="bq" type="text" placeholder="Search products…" style="padding-left:28px;width:100%" oninput="filterBrowse()"/>
        </div>
        <select class="fsm" id="bcat" onchange="filterBrowse()"><option value="">All Categories</option><option>Electronics</option><option>Clothing</option><option>Home</option><option>Sports</option><option>Beauty</option><option>Footwear</option></select>
        <select class="fsm" id="bprice" onchange="filterBrowse()"><option value="">Any Price</option><option value="0-50">Under $50</option><option value="50-150">$50–$150</option><option value="150-500">$150–$500</option><option value="500+">$500+</option></select>
        <select class="fsm" id="bsort" onchange="filterBrowse()"><option value="popular">Popular</option><option value="price-asc">Price ↑</option><option value="price-desc">Price ↓</option><option value="rating">Rating</option><option value="newest">Newest</option></select>
      </div>
      <div id="browse-el"></div>
      <div id="browse-empty" style="display:none;text-align:center;padding:40px;color:var(--txt3)"><i class="fas fa-search" style="font-size:32px;margin-bottom:12px;display:block;opacity:.4"></i><div style="font-size:15px;font-weight:700;margin-bottom:8px">No products found</div><button class="btn btn-rose btn-sm" onclick="resetBrowse()">Clear Filters</button></div>
    </div>
    <div class="divider"></div>
  </div>

  <!-- ── ORDERS ── -->
  <div class="page-wrap" id="sec-orders">
    <div class="section">
      <div class="sh">
        <div><div class="stitle">📦 My Orders</div><div class="ssub">Purchase history</div></div>
        <select class="fsm" id="ord-f" onchange="renderOrders()"><option value="">All</option><option value="Delivered">Delivered</option><option value="Shipping">Shipping</option><option value="Pending">Pending</option><option value="Cancelled">Cancelled</option></select>
      </div>
      <div id="ord-el" style="display:flex;flex-direction:column;gap:10px"></div>
      <div id="ord-empty" style="display:none;text-align:center;padding:40px;color:var(--txt3)"><i class="fas fa-box-open" style="font-size:32px;margin-bottom:12px;display:block;opacity:.4"></i><div style="font-size:15px;font-weight:700">No orders found</div></div>
    </div>
    <div class="divider"></div>
  </div>

  <!-- ── TIMELINE ── -->
  <div class="page-wrap" id="sec-timeline">
    <div class="section">
      <div class="sh"><div><div class="stitle">Activity Timeline</div><div class="ssub">Your recent interactions</div></div></div>
      <div class="tl" id="tl-el"></div>
    </div>
  </div>

  <div style="height:20px"></div>
</main>

<!-- ═══════════════════════════════════
     MOBILE BOTTOM NAV
═══════════════════════════════════ -->
<div id="bot-nav">
  <div class="bn-item on" onclick="scrollToSec('sec-viewed');setBN(0)"><i class="fas fa-eye"></i><span>Viewed</span></div>
  <div class="bn-item" onclick="scrollToSec('sec-wishlist');setBN(1)"><i class="fas fa-heart"></i><span>Wishlist</span></div>
  <div class="bn-item" onclick="scrollToSec('sec-browse');setBN(2)"><i class="fas fa-th-large"></i><span>Browse</span></div>
  <div class="bn-item" onclick="scrollToSec('sec-orders');setBN(3)"><i class="fas fa-box"></i><span>Orders</span></div>
  <div class="bn-item" onclick="toggleCart();setBN(4)"><i class="fas fa-shopping-cart"></i><span>Cart</span></div>
</div>

<!-- ═══════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════ -->
<script>
/* ════════════════════════════════════════════════
   EASY BILLING PRO — DEFINITIVE COMPLETE JS
   Full mobile responsive · Cart · Checkout · AI
   Orders · Wishlist · Profile · Timeline · Search
════════════════════════════════════════════════ */

/* ── PRODUCTS ─────────────────────────── */
const PRODUCTS=[
  {id:'P01',name:'Sony WH-1000XM5',price:349,old:399,cat:'Electronics',rating:4.8,reviews:2841,img:'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=320&fit=crop',badge:'Bestseller',desc:'Industry-leading noise canceling with 30hr battery life and exceptional sound.'},
  {id:'P02',name:'Nike Air Max 270',price:135,old:165,cat:'Footwear',rating:4.6,reviews:1520,img:'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=320&fit=crop',badge:'Sale',desc:'Maximum cushioning for all-day comfort with Air Max unit heel.'},
  {id:'P03',name:'Samsung 4K Monitor',price:649,old:null,cat:'Electronics',rating:4.7,reviews:890,img:'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&h=320&fit=crop',badge:null,desc:'27" 4K UHD with USB-C, HDR10 and ultra-thin bezel design.'},
  {id:'P04',name:'Linen Throw Blanket',price:48,old:65,cat:'Home',rating:4.5,reviews:430,img:'https://images.unsplash.com/photo-1580301762395-21ce84d00bc6?w=400&h=320&fit=crop',badge:'Sale',desc:'Premium washed linen throw. Soft, breathable, 12 colors available.'},
  {id:'P05',name:'MacBook Air M2',price:1099,old:null,cat:'Electronics',rating:4.9,reviews:5200,img:'https://images.unsplash.com/photo-1611186871525-4f9a0a84b20d?w=400&h=320&fit=crop',badge:'Top Pick',desc:'18hr battery, MagSafe, Liquid Retina display. Supercharged by M2.'},
  {id:'P06',name:'Yoga Mat Premium',price:55,old:72,cat:'Sports',rating:4.4,reviews:710,img:'https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=400&h=320&fit=crop',badge:'Sale',desc:'6mm eco-friendly TPE mat. Non-slip surface with carry strap.'},
  {id:'P07',name:'French Press 1L',price:34,old:null,cat:'Home',rating:4.3,reviews:285,img:'https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?w=400&h=320&fit=crop',badge:null,desc:'Borosilicate glass french press. Stainless steel plunger. 4 cups.'},
  {id:'P08',name:'Leather Bifold Wallet',price:79,old:95,cat:'Clothing',rating:4.6,reviews:620,img:'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&h=320&fit=crop',badge:null,desc:'Full-grain leather with RFID blocking. 6 card slots.'},
  {id:'P09',name:'Whey Protein 5kg',price:65,old:80,cat:'Sports',rating:4.7,reviews:1830,img:'https://images.unsplash.com/photo-1593095948071-474c5cc2989d?w=400&h=320&fit=crop',badge:'Popular',desc:'25g protein per serving. 3 flavors. Fast recovery formula.'},
  {id:'P10',name:'Vitamin C Serum',price:28,old:38,cat:'Beauty',rating:4.5,reviews:2200,img:'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=400&h=320&fit=crop',badge:'Sale',desc:'15% Vitamin C + Hyaluronic Acid. Reduces dark spots. 30ml.'},
  {id:'P11',name:'AirPods Pro 2nd Gen',price:249,old:279,cat:'Electronics',rating:4.8,reviews:4100,img:'https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?w=400&h=320&fit=crop',badge:'Bestseller',desc:'ANC, Adaptive Transparency, Personalized Spatial Audio.'},
  {id:'P12',name:'Running Shorts',price:45,old:58,cat:'Sports',rating:4.3,reviews:390,img:'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=400&h=320&fit=crop',badge:null,desc:'7" lightweight shorts. Built-in liner and zip pocket.'},
  {id:'P13',name:'Mechanical Keyboard',price:189,old:null,cat:'Electronics',rating:4.7,reviews:940,img:'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=400&h=320&fit=crop',badge:'New',desc:'TKL layout, Cherry MX switches, RGB, aluminum frame.'},
  {id:'P14',name:'Coffee Maker Pro',price:89,old:110,cat:'Home',rating:4.4,reviews:540,img:'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=320&fit=crop',badge:null,desc:'12-cup programmable with built-in grinder and keep-warm plate.'},
  {id:'P15',name:'Adidas Ultraboost 23',price:180,old:220,cat:'Footwear',rating:4.6,reviews:2600,img:'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=320&fit=crop',badge:'Popular',desc:'Boost midsole, Primeknit+ upper. The best running shoe.'},
  {id:'P16',name:'SPF 50 Moisturizer',price:42,old:55,cat:'Beauty',rating:4.5,reviews:1200,img:'https://images.unsplash.com/photo-1629380892675-1c2a29e49d52?w=400&h=320&fit=crop',badge:null,desc:'Broad-spectrum SPF 50. Daily moisturizer. Non-greasy formula.'},
];
const VIEWED_IDS=['P01','P05','P11','P03','P13','P08','P02','P09'];
const AI_IDS=['P06','P10','P16','P07','P12','P15','P04','P14'];
const WISH_DEF=['P02','P04','P10','P12','P14','P15','P16'];

/* ── DEFAULT USER ─────────────────────── */
const DEF={name:'Emma Johnson',email:'emma.j@gmail.com',avatar:'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=160&h=160&fit=crop&crop=face',joinDate:'2022-03-14',membership:'Gold',phone:'+1 555 012-3456',addr:'123 Oak St, New York, NY 10001',addr2:'456 Park Ave, NYC 10022',pay:'Visa •••• 4242',pay2:'PayPal',orders:18,wishlistCount:7,viewedCount:34,totalSpent:2860};

/* ── ORDERS SEED ─────────────────────── */
const ORDERS_SEED=[
  {id:'ORD-10021',pid:'P05',qty:1,date:'2025-04-28',status:'Delivered',dDate:'2025-05-01'},
  {id:'ORD-10022',pid:'P11',qty:1,date:'2025-04-14',status:'Delivered',dDate:'2025-04-17'},
  {id:'ORD-10023',pid:'P01',qty:1,date:'2025-03-30',status:'Delivered',dDate:'2025-04-02'},
  {id:'ORD-10024',pid:'P13',qty:1,date:'2025-05-02',status:'Shipping',dDate:null},
  {id:'ORD-10025',pid:'P06',qty:2,date:'2025-05-05',status:'Pending',dDate:null},
  {id:'ORD-10026',pid:'P03',qty:1,date:'2025-02-18',status:'Delivered',dDate:'2025-02-21'},
  {id:'ORD-10027',pid:'P08',qty:1,date:'2024-12-24',status:'Cancelled',dDate:null},
];

/* ── TIMELINE ─────────────────────────── */
const TL_DATA=[
  {ico:'fa-shopping-bag',bg:'#c2636a',type:'Purchase',desc:'Ordered MacBook Air M2',ts:Date.now()-864e5*.5},
  {ico:'fa-heart',bg:'#e11d48',type:'Wishlist',desc:'Saved Adidas Ultraboost 23',ts:Date.now()-864e5*1},
  {ico:'fa-eye',bg:'#4a7c59',type:'Viewed',desc:'Browsed AirPods Pro 2nd Gen',ts:Date.now()-864e5*2},
  {ico:'fa-credit-card',bg:'#c9920f',type:'Payment',desc:'Payment $249 via Visa completed',ts:Date.now()-864e5*3},
  {ico:'fa-truck',bg:'#2554b8',type:'Delivery',desc:'ORD-10022 delivered successfully',ts:Date.now()-864e5*5},
  {ico:'fa-sign-in-alt',bg:'#9333ea',type:'Login',desc:'Signed in from New York, USA',ts:Date.now()-864e5*7},
  {ico:'fa-star',bg:'#c9920f',type:'Review',desc:'5★ review on Sony WH-1000XM5',ts:Date.now()-864e5*10},
  {ico:'fa-tag',bg:'#0891b2',type:'Coupon',desc:'Used code SAVE20 — $40 saved!',ts:Date.now()-864e5*14},
];

/* ── STATE ────────────────────────────── */
let USER=JSON.parse(localStorage.getItem('ebp4_u')||'null')||{...DEF};
let CART=JSON.parse(localStorage.getItem('ebp4_c')||'[]');
let HEARTS=JSON.parse(localStorage.getItem('ebp4_h')||'[]');
let ORDERS=JSON.parse(localStorage.getItem('ebp4_o')||'null')||[...ORDERS_SEED];
let wishView='grid',browseView='grid',checkStep=1,selAddr=0,selPay=0;
let browseQ='',browseCat='',browsePrice='',browseSort='popular',browseData=[...PRODUCTS];

/* ── INIT ─────────────────────────────── */
document.addEventListener('DOMContentLoaded',()=>{
  initTheme();
  renderProfile();
  setTimeout(()=>{
    document.getElementById('sk-viewed').style.display='none';
    document.getElementById('viewed-wrap').style.display='block';
    renderViewed();renderAI();renderWish();filterBrowse();renderOrders();renderTimeline();
    updateCartBadge();
  },700);
  toast('Welcome back, '+USER.name.split(' ')[0]+'! 👋','info');
});

/* ── CLOCK ────────────────────────────── */
function tick(){
  const n=new Date(),h=String(n.getHours()).padStart(2,'0'),m=String(n.getMinutes()).padStart(2,'0'),s=String(n.getSeconds()).padStart(2,'0');
  const el=document.getElementById('clock');
  if(el)el.innerHTML=`${h}:${m}:<span class="cs">${s}</span><span class="clock-date">${['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][n.getDay()]}</span>`;
}
tick();setInterval(tick,1000);

/* ── PROFILE ──────────────────────────── */
function renderProfile(){
  ['nav-av','h-av'].forEach(id=>{const e=document.getElementById(id);if(e)e.src=USER.avatar});
  document.getElementById('h-name').textContent=USER.name;
  document.getElementById('h-email').textContent=USER.email;
  document.getElementById('h-since').textContent=`Member since ${fmtD(USER.joinDate)} · ${USER.membership}`;
  document.getElementById('h-stats').innerHTML=[
    {n:USER.orders,l:'Orders'},{n:USER.wishlistCount,l:'Wishlist'},
    {n:USER.viewedCount,l:'Viewed'},{n:'$'+fmtN(USER.totalSpent),l:'Spent'}
  ].map(x=>`<div class="schip"><div class="scn">${x.n}</div><div class="scl">${x.l}</div></div>`).join('');
}

/* ── STARS ────────────────────────────── */
function mkStars(r){
  let h='<div class="stars">';
  for(let i=1;i<=5;i++)h+=`<i class="fas fa-${r>=i?'star':r>=i-.5?'star-half-alt':'star'} ${r>=i||r>=i-.5?'on':''}"></i>`;
  return h+`<span>${r}</span></div>`;
}

/* ── PRODUCT CARD ─────────────────────── */
function pCard(p,key){
  const isH=HEARTS.includes(p.id);
  const disc=p.old?Math.round((1-p.price/p.old)*100):0;
  return `
  <div class="pcard" onclick="openProdModal('${p.id}')">
    ${p.badge?`<div class="pc-badge">${p.badge}</div>`:''}
    <button class="pc-heart ${isH?'on':''}" id="ph-${key}" onclick="event.stopPropagation();toggleHeart('${p.id}','ph-${key}')">
      <i class="fas fa-heart" style="color:${isH?'var(--red)':'var(--txt3)'}"></i>
    </button>
    <div class="pc-iw">
      <img class="pc-img" src="${p.img}" alt="${esc(p.name)}" loading="lazy" onerror="this.src='https://placehold.co/400x320/f8f5f0/a8937e?text=${encodeURIComponent(p.name[0])}'"/>
      <div class="pc-ov">
        <div style="display:flex;gap:6px">
          <button class="pc-qb" style="color:var(--rose)" onclick="event.stopPropagation();addToCart('${p.id}',1)" title="Add to Cart"><i class="fas fa-cart-plus"></i></button>
          <button class="pc-qb" style="color:var(--sage)" onclick="event.stopPropagation();openProdModal('${p.id}')" title="Quick View"><i class="fas fa-eye"></i></button>
        </div>
      </div>
    </div>
    <div class="pc-body">
      <div class="pc-name">${esc(p.name)}</div>
      <div style="display:flex;align-items:center;flex-wrap:wrap;gap:4px">
        <span class="pc-price">$${p.price}</span>
        ${p.old?`<span class="pc-old">$${p.old}</span><span style="font-size:9.5px;color:var(--sage);font-weight:700">-${disc}%</span>`:''}
      </div>
      ${mkStars(p.rating)}
      <button class="btn btn-rose btn-xs" style="width:100%;justify-content:center;margin-top:8px" onclick="event.stopPropagation();addToCart('${p.id}',1)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
    </div>
  </div>`;
}

/* ── RENDER CAROUSELS ─────────────────── */
function renderViewed(){const el=document.getElementById('c-viewed');if(el)el.innerHTML=VIEWED_IDS.map((id,i)=>{const p=PRODUCTS.find(x=>x.id===id);return p?pCard(p,'v'+i):''}).join('');}
function renderAI(){const el=document.getElementById('c-ai');if(el)el.innerHTML=AI_IDS.map((id,i)=>{const p=PRODUCTS.find(x=>x.id===id);return p?pCard(p,'a'+i):''}).join('');}

/* ── SEARCH ───────────────────────────── */
function doSearch(v){
  const drop=document.getElementById('s-drop');
  if(!v.trim()){drop.style.display='none';return;}
  const q=v.toLowerCase();
  const res=PRODUCTS.filter(p=>p.name.toLowerCase().includes(q)||p.cat.toLowerCase().includes(q)).slice(0,6);
  if(!res.length){drop.innerHTML='<div style="padding:14px;font-size:13px;color:var(--txt3)">No results</div>';drop.style.display='block';return;}
  drop.innerHTML=res.map(p=>`
    <div onclick="openProdModal('${p.id}');document.getElementById('s-drop').style.display='none';document.getElementById('ns').value=''"
      style="display:flex;align-items:center;gap:10px;padding:10px 13px;cursor:pointer;transition:background .15s;border-bottom:1px solid var(--bdr)"
      onmouseenter="this.style.background='var(--surf2)'" onmouseleave="this.style.background=''">
      <img src="${p.img}" style="width:38px;height:38px;border-radius:8px;object-fit:cover;flex-shrink:0"/>
      <div style="flex:1;min-width:0"><div style="font-size:13px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${esc(p.name)}</div><div style="font-size:11px;color:var(--txt3)">${p.cat}</div></div>
      <div class="mono" style="font-size:13px;font-weight:700;color:var(--rose)">$${p.price}</div>
    </div>`).join('');
  drop.style.display='block';
}
document.addEventListener('click',e=>{if(!e.target.closest('.nav-srch'))document.getElementById('s-drop').style.display='none';});

/* ── PRODUCT MODAL ────────────────────── */
function openProdModal(id){
  const p=PRODUCTS.find(x=>x.id===id);if(!p)return;
  const isH=HEARTS.includes(id);
  const disc=p.old?Math.round((1-p.price/p.old)*100):0;
  document.getElementById('prod-m-t').textContent=p.name;
  document.getElementById('prod-m-b').innerHTML=`
    <div style="display:flex;gap:14px;flex-wrap:wrap;margin-bottom:16px">
      <div style="flex:0 0 200px;border-radius:12px;overflow:hidden;border:1px solid var(--bdr);max-width:100%">
        <img src="${p.img}" style="width:100%;height:170px;object-fit:cover;display:block"/>
      </div>
      <div style="flex:1;min-width:160px">
        <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--rose);margin-bottom:5px">${p.cat}</div>
        <div style="font-family:'Yeseva One',serif;font-size:20px;color:var(--txt);margin-bottom:8px">${esc(p.name)}</div>
        ${mkStars(p.rating)}
        <div style="font-size:11.5px;color:var(--txt3);margin-bottom:10px">${p.reviews.toLocaleString()} reviews</div>
        <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px">
          <span class="mono" style="font-size:24px;font-weight:700;color:var(--rose)">$${p.price}</span>
          ${p.old?`<span class="mono" style="font-size:14px;color:var(--txt3);text-decoration:line-through">$${p.old}</span><span style="font-size:11px;font-weight:700;color:var(--sage);background:var(--sagelt);padding:2px 7px;border-radius:99px">-${disc}%</span>`:''}
        </div>
        <div style="font-size:12.5px;color:var(--sage);font-weight:600;margin-bottom:12px"><i class="fas fa-check-circle"></i> In Stock · Ships 2–5 days</div>
        <div style="display:flex;align-items:center;gap:7px;margin-bottom:12px">
          <div style="display:flex;align-items:center;gap:0;border:1.5px solid var(--bdr);border-radius:9px;overflow:hidden">
            <button style="width:32px;height:32px;border:none;background:var(--surf2);cursor:pointer;font-size:15px;color:var(--txt2)" onclick="const v=document.getElementById('pqv');v.value=Math.max(1,+v.value-1)">−</button>
            <input type="number" id="pqv" value="1" min="1" max="99" style="width:40px;border:none;background:var(--surf);text-align:center;font-family:'JetBrains Mono',monospace;font-size:13px;font-weight:700;outline:none;color:var(--txt)"/>
            <button style="width:32px;height:32px;border:none;background:var(--surf2);cursor:pointer;font-size:15px;color:var(--txt2)" onclick="const v=document.getElementById('pqv');v.value=Math.min(99,+v.value+1)">+</button>
          </div>
        </div>
        <div style="display:flex;flex-direction:column;gap:7px">
          <button class="btn btn-rose" style="justify-content:center" onclick="addToCart('${p.id}',+document.getElementById('pqv').value);closeOv('prod-ov')"><i class="fas fa-cart-plus"></i> Add to Cart</button>
          <button class="btn btn-sage" style="justify-content:center" onclick="buyNow('${p.id}')"><i class="fas fa-bolt"></i> Buy Now</button>
        </div>
      </div>
    </div>
    <div style="padding:12px;background:var(--surf2);border-radius:10px;border:1px solid var(--bdr);font-size:13px;color:var(--txt2);line-height:1.65">${p.desc}</div>`;
  document.getElementById('prod-m-f').innerHTML=`
    <button class="btn btn-ghost btn-sm" onclick="closeOv('prod-ov')">Close</button>
    <button class="btn btn-ghost btn-sm" id="pm-h" onclick="toggleHeart('${id}','pm-h')" style="${isH?'color:var(--red)':''}"><i class="fas fa-heart"></i> ${isH?'Saved':'Save'}</button>`;
  document.getElementById('prod-ov').classList.add('open');
}

/* ── CART ─────────────────────────────── */
function addToCart(pid,qty=1){
  const p=PRODUCTS.find(x=>x.id===pid);if(!p)return;
  const idx=CART.findIndex(x=>x.id===pid);
  if(idx!==-1)CART[idx].qty+=qty;else CART.push({id:pid,qty});
  saveCart();updateCartBadge();renderCartEl();
  toast(`${p.name.slice(0,22)}… added to cart!`,'success');
  openCart();
}
function updateCartQty(pid,q){const idx=CART.findIndex(x=>x.id===pid);if(idx!==-1){CART[idx].qty=Math.max(1,q);saveCart();renderCartEl();updateCartBadge();}}
function removeFromCart(pid){CART=CART.filter(x=>x.id!==pid);saveCart();updateCartBadge();renderCartEl();}
function clearCart(){CART=[];saveCart();updateCartBadge();renderCartEl();toast('Cart cleared','warn');}
function saveCart(){localStorage.setItem('ebp4_c',JSON.stringify(CART));}
function cartTotal(){return CART.reduce((s,x)=>{const p=PRODUCTS.find(y=>y.id===x.id);return s+(p?p.price*x.qty:0);},0);}
function updateCartBadge(){
  const n=CART.reduce((s,x)=>s+x.qty,0);
  const b=document.getElementById('cart-n');
  if(b){b.textContent=n;b.style.display=n>0?'flex':'none';}
  document.getElementById('cart-label').textContent=`${n} item${n!==1?'s':''}`;
  document.getElementById('cart-total').textContent='$'+fmtN(cartTotal());
}
function renderCartEl(){
  const el=document.getElementById('cart-items-el');
  if(!CART.length){el.innerHTML=`<div style="text-align:center;padding:40px 16px;color:var(--txt3)"><i class="fas fa-shopping-cart" style="font-size:32px;margin-bottom:12px;display:block;opacity:.4"></i><div style="font-size:15px;font-weight:700">Cart is empty</div></div>`;return;}
  el.innerHTML=CART.map(item=>{
    const p=PRODUCTS.find(x=>x.id===item.id);if(!p)return'';
    return `<div class="ci">
      <img class="ci-img" src="${p.img}" alt="${esc(p.name)}" onerror="this.src='https://placehold.co/54x54/f8f5f0/a8937e?text=P'"/>
      <div style="flex:1;min-width:0">
        <div style="font-size:12.5px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin-bottom:3px">${esc(p.name)}</div>
        <div class="mono" style="font-size:13px;color:var(--rose);font-weight:700;margin-bottom:7px">$${fmtN(p.price*item.qty)}</div>
        <div style="display:flex;align-items:center;gap:7px">
          <div class="qty-ctl">
            <button class="qty-btn" onclick="updateCartQty('${item.id}',${item.qty-1})">−</button>
            <span class="qty-n">${item.qty}</span>
            <button class="qty-btn" onclick="updateCartQty('${item.id}',${item.qty+1})">+</button>
          </div>
          <button onclick="removeFromCart('${item.id}')" style="width:26px;height:26px;border-radius:7px;border:none;background:var(--redlt);color:var(--red);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px"><i class="fas fa-trash"></i></button>
        </div>
      </div>
    </div>`;
  }).join('');
  document.getElementById('cart-total').textContent='$'+fmtN(cartTotal());
  document.getElementById('cart-label').textContent=`${CART.reduce((s,x)=>s+x.qty,0)} items`;
}
function toggleCart(){const d=document.getElementById('cart-d');d.classList.contains('open')?closeCart():openCart();}
function openCart(){renderCartEl();document.getElementById('cart-d').classList.add('open');document.getElementById('cart-bg').classList.add('open');}
function closeCart(){document.getElementById('cart-d').classList.remove('open');document.getElementById('cart-bg').classList.remove('open');}

/* ── BUY NOW ──────────────────────────── */
function buyNow(pid){addToCart(pid,1);closeOv('prod-ov');setTimeout(()=>openCheckout(),350);}

/* ── CHECKOUT ─────────────────────────── */
function openCheckout(){
  if(!CART.length){toast('Cart is empty!','warn');return;}
  checkStep=1;selAddr=0;selPay=0;
  renderCheckStep();
  document.getElementById('check-ov').classList.add('open');
  closeCart();
}
function renderCheckStep(){
  const tot=cartTotal();
  if(checkStep===1){
    document.getElementById('check-t').textContent='Step 1 — Delivery Address';
    document.getElementById('check-b').innerHTML=`
      <div style="margin-bottom:14px">
        <div style="font-size:12.5px;font-weight:700;color:var(--txt2);margin-bottom:9px">Choose delivery address:</div>
        <div style="display:flex;flex-direction:column;gap:8px">
          <div class="addr-card ${selAddr===0?'sel':''}" onclick="selAddr=0;renderCheckStep()">
            <div style="display:flex;align-items:flex-start;gap:9px">
              <i class="fas fa-map-marker-alt" style="color:var(--rose);margin-top:2px;flex-shrink:0"></i>
              <div><div style="font-size:13px;font-weight:700">${esc(USER.name)}</div><div style="font-size:12px;color:var(--txt2);margin-top:1px">${esc(USER.addr)}</div></div>
              ${selAddr===0?`<i class="fas fa-check-circle" style="color:var(--rose);margin-left:auto;flex-shrink:0"></i>`:''}
            </div>
          </div>
          <div class="addr-card ${selAddr===1?'sel':''}" onclick="selAddr=1;renderCheckStep()">
            <div style="display:flex;align-items:flex-start;gap:9px">
              <i class="fas fa-map-marker-alt" style="color:var(--sage);margin-top:2px;flex-shrink:0"></i>
              <div><div style="font-size:13px;font-weight:700">${esc(USER.name)} (Alt)</div><div style="font-size:12px;color:var(--txt2);margin-top:1px">${esc(USER.addr2)}</div></div>
              ${selAddr===1?`<i class="fas fa-check-circle" style="color:var(--rose);margin-left:auto;flex-shrink:0"></i>`:''}
            </div>
          </div>
        </div>
      </div>
      <div style="padding:12px;background:var(--surf2);border-radius:11px;border:1px solid var(--bdr)">
        <div style="font-size:11px;font-weight:700;text-transform:uppercase;color:var(--txt3);margin-bottom:9px;letter-spacing:.05em">Order Summary</div>
        ${CART.map(item=>{const p=PRODUCTS.find(x=>x.id===item.id);return p?`<div style="display:flex;justify-content:space-between;font-size:12.5px;padding:5px 0;border-bottom:1px solid var(--bdr)"><span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:68%">${esc(p.name)} ×${item.qty}</span><span class="mono" style="font-weight:700;color:var(--rose)">$${fmtN(p.price*item.qty)}</span></div>`:''}).join('')}
        <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:800;padding-top:10px;margin-top:4px"><span>Total</span><span class="mono" style="color:var(--rose)">$${fmtN(tot)}</span></div>
      </div>`;
    document.getElementById('check-f').innerHTML=`
      <button class="btn btn-ghost btn-sm" onclick="closeOv('check-ov')">Cancel</button>
      <button class="btn btn-rose btn-sm" onclick="checkStep=2;renderCheckStep()">Next: Payment <i class="fas fa-arrow-right"></i></button>`;
  } else {
    document.getElementById('check-t').textContent='Step 2 — Payment';
    document.getElementById('check-b').innerHTML=`
      <div style="margin-bottom:14px">
        <div style="font-size:12.5px;font-weight:700;color:var(--txt2);margin-bottom:9px">Select payment method:</div>
        <div style="display:flex;flex-direction:column;gap:8px">
          <div class="pay-opt ${selPay===0?'sel':''}" onclick="selPay=0;renderCheckStep()">
            <i class="fab fa-cc-visa" style="font-size:22px;color:#1a56db;flex-shrink:0"></i>
            <div><div style="font-size:13px;font-weight:700">${esc(USER.pay)}</div><div style="font-size:11.5px;color:var(--txt3)">Default card</div></div>
            ${selPay===0?`<i class="fas fa-check-circle" style="color:var(--rose);margin-left:auto"></i>`:''}
          </div>
          <div class="pay-opt ${selPay===1?'sel':''}" onclick="selPay=1;renderCheckStep()">
            <i class="fab fa-paypal" style="font-size:22px;color:#0070ba;flex-shrink:0"></i>
            <div><div style="font-size:13px;font-weight:700">PayPal</div><div style="font-size:11.5px;color:var(--txt3)">Fast & secure</div></div>
            ${selPay===1?`<i class="fas fa-check-circle" style="color:var(--rose);margin-left:auto"></i>`:''}
          </div>
          <div class="pay-opt ${selPay===2?'sel':''}" onclick="selPay=2;renderCheckStep()">
            <i class="fas fa-money-bill-wave" style="font-size:18px;color:var(--sage);flex-shrink:0"></i>
            <div><div style="font-size:13px;font-weight:700">Cash on Delivery</div><div style="font-size:11.5px;color:var(--txt3)">Pay when received</div></div>
            ${selPay===2?`<i class="fas fa-check-circle" style="color:var(--rose);margin-left:auto"></i>`:''}
          </div>
        </div>
      </div>
      <div style="padding:11px 13px;background:var(--roselt);border:1px solid rgba(194,99,106,.25);border-radius:10px;font-size:12.5px;color:var(--txt2)"><i class="fas fa-lock" style="color:var(--rose);margin-right:6px"></i>256-bit SSL encrypted. Your details are safe.</div>`;
    document.getElementById('check-f').innerHTML=`
      <button class="btn btn-ghost btn-sm" onclick="checkStep=1;renderCheckStep()"><i class="fas fa-arrow-left"></i> Back</button>
      <button class="btn btn-sage btn-sm" onclick="placeOrder()"><i class="fas fa-check"></i> Place Order · $${fmtN(tot)}</button>`;
  }
}
function placeOrder(){
  const payMethods=['Visa ••••4242','PayPal','Cash on Delivery'];
  const addrs=[USER.addr,USER.addr2];
  const newOrds=CART.map(item=>({id:'ORD-'+Math.floor(10000+Math.random()*90000),pid:item.id,qty:item.qty,date:new Date().toISOString().split('T')[0],status:'Pending',dDate:null,payMethod:payMethods[selPay],addr:addrs[selAddr]}));
  ORDERS=[...newOrds,...ORDERS];localStorage.setItem('ebp4_o',JSON.stringify(ORDERS));
  USER.orders+=newOrds.length;USER.totalSpent=parseFloat((USER.totalSpent+cartTotal()).toFixed(2));
  localStorage.setItem('ebp4_u',JSON.stringify(USER));
  CART=[];saveCart();updateCartBadge();renderCartEl();
  closeOv('check-ov');renderProfile();renderOrders();
  toast('🎉 Order placed! '+newOrds.map(o=>o.id).join(', '),'success');
  scrollToSec('sec-orders');
}

/* ── WISHLIST ─────────────────────────── */
function toggleHeart(id,btnId){
  const idx=HEARTS.indexOf(id);
  if(idx===-1){HEARTS.push(id);toast('Saved to wishlist ❤️','success');}
  else{HEARTS.splice(idx,1);toast('Removed from wishlist','warn');}
  localStorage.setItem('ebp4_h',JSON.stringify(HEARTS));
  const btn=document.getElementById(btnId);
  if(btn){const ic=btn.querySelector('i');if(ic)ic.style.color=HEARTS.includes(id)?'var(--red)':'var(--txt3)';btn.classList.toggle('on',HEARTS.includes(id));}
  renderWish();
}
function setWV(v){wishView=v;document.getElementById('wg-b').classList.toggle('on',v==='grid');document.getElementById('wl-b').classList.toggle('on',v==='list');renderWish();}
function renderWish(){
  const cat=document.getElementById('wcat')?.value||'';
  const sort=document.getElementById('wsort')?.value||'';
  const ids=HEARTS.length?[...HEARTS]:WISH_DEF;
  let prods=ids.map(id=>PRODUCTS.find(x=>x.id===id)).filter(Boolean);
  if(cat)prods=prods.filter(p=>p.cat===cat);
  if(sort==='price-asc')prods.sort((a,b)=>a.price-b.price);
  else if(sort==='price-desc')prods.sort((a,b)=>b.price-a.price);
  else if(sort==='rating')prods.sort((a,b)=>b.rating-a.rating);
  const sub=document.getElementById('wish-sub');if(sub)sub.textContent=`${prods.length} saved item${prods.length!==1?'s':''}`;
  const el=document.getElementById('wish-el');if(!el)return;
  if(!prods.length){el.innerHTML=`<div style="text-align:center;padding:40px;color:var(--txt3)"><i class="fas fa-heart-broken" style="font-size:32px;margin-bottom:12px;display:block;opacity:.4"></i><div style="font-size:15px;font-weight:700;margin-bottom:8px">Wishlist is empty</div></div>`;return;}
  if(wishView==='grid'){
    el.innerHTML=`<div class="wgrid">${prods.map(p=>wCard(p)).join('')}</div>`;
  } else {
    el.innerHTML=`<div style="display:flex;flex-direction:column;gap:10px">${prods.map(p=>wListItem(p)).join('')}</div>`;
  }
}
function wCard(p){
  const disc=p.old?Math.round((1-p.price/p.old)*100):0;
  return `<div class="wcard" onclick="openProdModal('${p.id}')">
    <div style="position:relative;overflow:hidden">${p.badge?`<div class="pc-badge">${p.badge}</div>`:''}<img class="wcard-img" src="${p.img}" alt="${esc(p.name)}" onerror="this.src='https://placehold.co/400x320/f8f5f0/a8937e?text=P'"/></div>
    <div class="wcard-body">
      <div style="font-size:13px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin-bottom:4px">${esc(p.name)}</div>
      <div style="display:flex;align-items:center;gap:4px;margin-bottom:8px"><span class="mono" style="font-size:15px;font-weight:700;color:var(--rose)">$${p.price}</span>${p.old?`<span class="mono" style="font-size:11px;color:var(--txt3);text-decoration:line-through">$${p.old}</span>`:''}</div>
      <div style="display:flex;gap:5px;flex-wrap:wrap">
        <button class="btn btn-rose btn-xs" onclick="event.stopPropagation();addToCart('${p.id}',1)"><i class="fas fa-cart-plus"></i></button>
        <button class="btn btn-sage btn-xs" onclick="event.stopPropagation();buyNow('${p.id}')"><i class="fas fa-bolt"></i></button>
        <button class="btn btn-xs" style="background:var(--redlt);color:var(--red);border:none;cursor:pointer;font-family:'Lexend',sans-serif;font-weight:700;border-radius:8px" onclick="event.stopPropagation();toggleHeart('${p.id}','')"><i class="fas fa-heart-broken"></i></button>
      </div>
    </div>
  </div>`;
}
function wListItem(p){
  return `<div style="display:flex;gap:12px;align-items:center;background:var(--surf);border:1px solid var(--bdr);border-radius:12px;padding:12px;box-shadow:var(--sh);cursor:pointer" onclick="openProdModal('${p.id}')">
    <img src="${p.img}" style="width:60px;height:60px;border-radius:10px;object-fit:cover;border:1px solid var(--bdr);flex-shrink:0" onerror="this.src='https://placehold.co/60x60/f8f5f0/a8937e?text=P'"/>
    <div style="flex:1;min-width:0"><div style="font-size:13px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${esc(p.name)}</div><div style="font-size:11.5px;color:var(--txt3)">${p.cat}</div></div>
    <div style="text-align:right;flex-shrink:0"><div class="mono" style="font-size:15px;font-weight:700;color:var(--rose)">$${p.price}</div><div style="display:flex;gap:5px;margin-top:6px"><button class="btn btn-rose btn-xs" onclick="event.stopPropagation();addToCart('${p.id}',1)"><i class="fas fa-cart-plus"></i></button><button class="btn btn-sage btn-xs" onclick="event.stopPropagation();buyNow('${p.id}')"><i class="fas fa-bolt"></i></button></div></div>
  </div>`;
}

/* ── BROWSE ───────────────────────────── */
function filterBrowse(){
  browseQ=(document.getElementById('bq')?.value||'').toLowerCase();
  browseCat=document.getElementById('bcat')?.value||'';
  browsePrice=document.getElementById('bprice')?.value||'';
  browseSort=document.getElementById('bsort')?.value||'popular';
  browseData=PRODUCTS.filter(p=>{
    const mq=!browseQ||p.name.toLowerCase().includes(browseQ)||p.cat.toLowerCase().includes(browseQ);
    const mc=!browseCat||p.cat===browseCat;
    let mp=true;
    if(browsePrice==='0-50')mp=p.price<50;
    else if(browsePrice==='50-150')mp=p.price>=50&&p.price<150;
    else if(browsePrice==='150-500')mp=p.price>=150&&p.price<500;
    else if(browsePrice==='500+')mp=p.price>=500;
    return mq&&mc&&mp;
  });
  if(browseSort==='price-asc')browseData.sort((a,b)=>a.price-b.price);
  else if(browseSort==='price-desc')browseData.sort((a,b)=>b.price-a.price);
  else if(browseSort==='rating')browseData.sort((a,b)=>b.rating-a.rating);
  else if(browseSort==='newest')browseData.sort((a,b)=>b.id.localeCompare(a.id));
  else browseData.sort((a,b)=>b.reviews-a.reviews);
  renderBrowse();
  const sub=document.getElementById('browse-sub');if(sub)sub.textContent=`${browseData.length} products`;
}
function resetBrowse(){['bq','bcat','bprice'].forEach(id=>{const e=document.getElementById(id);if(e)e.value='';});document.getElementById('bsort').value='popular';filterBrowse();}
function setPV(v){browseView=v;document.getElementById('bg-b').classList.toggle('on',v==='grid');document.getElementById('bl-b').classList.toggle('on',v==='list');renderBrowse();}
function renderBrowse(){
  const el=document.getElementById('browse-el'),em=document.getElementById('browse-empty');
  if(!browseData.length){el.innerHTML='';em.style.display='block';return;}
  em.style.display='none';
  if(browseView==='grid'){
    el.innerHTML=`<div class="wgrid" style="grid-template-columns:repeat(auto-fill,minmax(168px,1fr))">${browseData.map((p,i)=>pCard(p,'br'+i)).join('')}</div>`;
  } else {
    el.innerHTML=`<div style="display:flex;flex-direction:column;gap:10px">${browseData.map(p=>wListItem(p)).join('')}</div>`;
  }
}

/* ── ORDERS ───────────────────────────── */
function renderOrders(){
  const f=document.getElementById('ord-f')?.value||'';
  const filtered=f?ORDERS.filter(o=>o.status===f):[...ORDERS];
  const el=document.getElementById('ord-el'),em=document.getElementById('ord-empty');
  if(!filtered.length){el.innerHTML='';em.style.display='block';return;}
  em.style.display='none';
  const sm={Delivered:'st-del',Pending:'st-pen',Shipping:'st-shi',Cancelled:'st-can'};
  el.innerHTML=filtered.map(o=>{
    const p=PRODUCTS.find(x=>x.id===o.pid);if(!p)return'';
    return `<div class="ocard">
      <img class="ocard-img" src="${p.img}" alt="${esc(p.name)}" onerror="this.src='https://placehold.co/70x70/f8f5f0/a8937e?text=P'"/>
      <div style="flex:1;min-width:0">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:6px;margin-bottom:4px">
          <div style="min-width:0"><div style="font-size:13px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:200px">${esc(p.name)} ×${o.qty}</div><div class="mono" style="font-size:10.5px;color:var(--txt3)">${o.id}</div></div>
          <span class="st ${sm[o.status]||'st-pen'}">${o.status}</span>
        </div>
        <div style="font-size:11.5px;color:var(--txt2);margin-bottom:8px">Ordered: ${fmtD(o.date)}${o.dDate?` · Delivered: ${fmtD(o.dDate)}`:''}</div>
        <div style="display:flex;flex-wrap:wrap;gap:6px;align-items:center">
          <button class="btn btn-ghost btn-xs" onclick="toast('Invoice for ${o.id}','info')"><i class="fas fa-file-invoice"></i> Invoice</button>
          ${o.status==='Delivered'?`<button class="btn btn-rose btn-xs" onclick="addToCart('${p.id}',1)"><i class="fas fa-redo"></i> Reorder</button>`:''}
          ${o.status==='Pending'?`<button class="btn btn-xs" style="background:var(--redlt);color:var(--red);border:none;cursor:pointer;font-family:'Lexend',sans-serif;font-size:11px;font-weight:700;border-radius:8px;padding:4px 9px" onclick="cancelOrd('${o.id}')"><i class="fas fa-times"></i> Cancel</button>`:''}
          <button class="btn btn-ghost btn-xs" onclick="toast('Tracking ${o.id}','info')"><i class="fas fa-truck"></i> Track</button>
        </div>
      </div>
      <div class="mono" style="font-size:14px;font-weight:700;color:var(--rose);flex-shrink:0">$${fmtN(p.price*o.qty)}</div>
    </div>`;
  }).join('');
}
function cancelOrd(id){const idx=ORDERS.findIndex(o=>o.id===id);if(idx!==-1){ORDERS[idx].status='Cancelled';localStorage.setItem('ebp4_o',JSON.stringify(ORDERS));renderOrders();toast('Order cancelled','warn');}}

/* ── TIMELINE ─────────────────────────── */
function renderTimeline(){
  const el=document.getElementById('tl-el');if(!el)return;
  el.innerHTML=TL_DATA.map((t,i)=>`
    <div class="tl-item" style="animation:tlP .4s ${i*60}ms both">
      <div class="tl-ico" style="background:${t.bg}"><i class="fas ${t.ico}"></i></div>
      <div style="padding-top:4px">
        <div style="font-size:13.5px;font-weight:700">${t.type}</div>
        <div style="font-size:12.5px;color:var(--txt2);margin-top:1px">${t.desc}</div>
        <div style="font-size:11.5px;color:var(--txt3);margin-top:3px">${timeAgo(t.ts)}</div>
      </div>
    </div>`).join('');
}
const tlStyle=document.createElement('style');tlStyle.textContent='@keyframes tlP{from{opacity:0;transform:translateX(-10px)}to{opacity:1;transform:none}}';document.head.appendChild(tlStyle);

/* ── PROFILE MODAL ────────────────────── */
function openProfModal(){
  const body=document.getElementById('prof-body');
  body.innerHTML=`
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;padding:14px;background:linear-gradient(135deg,#1e293b,#c2636a);border-radius:12px">
      <img src="${USER.avatar}" style="width:56px;height:56px;border-radius:12px;object-fit:cover;border:2px solid rgba(255,255,255,.85)"/>
      <div><div style="font-family:'Yeseva One',serif;font-size:18px;color:#fff">${esc(USER.name)}</div><div style="font-size:12px;color:rgba(255,255,255,.7)">${esc(USER.email)}</div></div>
    </div>
    <div class="g2">
      <div class="fg"><label class="fl">Full Name</label><input type="text" class="fi" id="pf-n" value="${esc(USER.name)}"/></div>
      <div class="fg"><label class="fl">Email</label><input type="email" class="fi" id="pf-e" value="${esc(USER.email)}"/></div>
    </div>
    <div class="g2">
      <div class="fg"><label class="fl">Phone</label><input type="tel" class="fi" id="pf-p" value="${esc(USER.phone)}"/></div>
      <div class="fg"><label class="fl">Avatar URL</label><input type="url" class="fi" id="pf-a" value="${esc(USER.avatar)}"/></div>
    </div>
    <div class="fg"><label class="fl">Primary Address</label><input type="text" class="fi" id="pf-ad" value="${esc(USER.addr)}"/></div>
    <div class="fg" style="margin-bottom:0"><label class="fl">Alt. Address</label><input type="text" class="fi" id="pf-ad2" value="${esc(USER.addr2||'')}"/></div>`;
  document.getElementById('prof-ov').classList.add('open');
}
function saveProfFn(){
  USER.name=document.getElementById('pf-n')?.value||USER.name;
  USER.email=document.getElementById('pf-e')?.value||USER.email;
  USER.phone=document.getElementById('pf-p')?.value||USER.phone;
  USER.avatar=document.getElementById('pf-a')?.value||USER.avatar;
  USER.addr=document.getElementById('pf-ad')?.value||USER.addr;
  USER.addr2=document.getElementById('pf-ad2')?.value||USER.addr2;
  localStorage.setItem('ebp4_u',JSON.stringify(USER));
  closeOv('prof-ov');renderProfile();toast('Profile saved! ✅','success');
}

/* ── MOBILE TABS ──────────────────────── */
function showTab(tab){
  const tabs=document.getElementById('section-tabs');
  if(tabs)tabs.querySelectorAll('.stab').forEach((t,i)=>{const labels=['viewed','ai','wishlist','browse','orders','timeline'];t.classList.toggle('on',labels[i]===tab);});
  const map={viewed:'sec-viewed',ai:'sec-ai',wishlist:'sec-wishlist',browse:'sec-browse',orders:'sec-orders',timeline:'sec-timeline'};
  if(map[tab])scrollToSec(map[tab]);
}
function scrollToSec(id){const el=document.getElementById(id);if(el)el.scrollIntoView({behavior:'smooth',block:'start'});}
function setBN(idx){document.querySelectorAll('.bn-item').forEach((b,i)=>b.classList.toggle('on',i===idx));}

/* ── CAROUSEL SCROLL ──────────────────── */
function scroll_c(id,dir){const el=document.getElementById(id);if(el)el.scrollBy({left:dir*400,behavior:'smooth'});}

/* ── THEME ────────────────────────────── */
let dark=false;
function initTheme(){dark=localStorage.getItem('ebp4_dark')==='1';applyTheme();}
function applyTheme(){document.documentElement.setAttribute('data-theme',dark?'dark':'light');document.getElementById('theme-i').className=dark?'fas fa-sun':'fas fa-moon';}
function toggleTheme(){dark=!dark;localStorage.setItem('ebp4_dark',dark?'1':'0');applyTheme();toast(dark?'🌙 Dark mode':'☀️ Light mode','info');}

/* ── TOAST ────────────────────────────── */
function toast(msg,type='info'){
  const icons={success:'fa-check-circle',error:'fa-times-circle',info:'fa-info-circle',warn:'fa-exclamation-triangle'};
  const cls={success:'ts',error:'te',info:'ti2',warn:'tw2'};
  const w=document.getElementById('tw'),d=document.createElement('div');
  d.className=`toast ${cls[type]||'ti2'}`;
  d.innerHTML=`<i class="fas ${icons[type]||'fa-info-circle'} ti" style="font-size:14px;flex-shrink:0"></i><span>${msg}</span>`;
  w.appendChild(d);
  setTimeout(()=>{d.classList.add('hiding');setTimeout(()=>d.remove(),280);},3500);
}

/* ── MODAL UTILS ──────────────────────── */
function closeOv(id){document.getElementById(id)?.classList.remove('open');}
document.querySelectorAll('.ov').forEach(ov=>ov.addEventListener('click',function(e){if(e.target===this)this.classList.remove('open');}));
document.addEventListener('keydown',e=>{if(e.key==='Escape'){document.querySelectorAll('.ov.open').forEach(o=>o.classList.remove('open'));closeCart();}});

/* ── UTILS ────────────────────────────── */
function fmtN(v){return(Math.round((parseFloat(v)||0)*100)/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});}
function fmtD(d){if(!d)return'—';try{return new Date(d+'T00:00:00').toLocaleDateString('en-US',{year:'numeric',month:'short',day:'numeric'})}catch{return d;}}
function timeAgo(ts){const d=Date.now()-ts,m=Math.floor(d/60000);if(m<1)return'just now';if(m<60)return m+'m ago';const h=Math.floor(m/60);if(h<24)return h+'h ago';return Math.floor(h/24)+'d ago';}
function esc(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}
</script>
</body>
</html>
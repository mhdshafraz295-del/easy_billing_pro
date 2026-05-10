<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Easy Billing Pro — Invoice Management</title>

<!-- CDN Dependencies -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Sora:wght@700;800&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>
  tailwind.config = {
    darkMode: ['attribute', '[data-theme="dark"]'],
    theme: { extend: { fontFamily: { sans: ['Figtree','sans-serif'], display: ['Sora','sans-serif'], mono: ['Fira Code','monospace'] } } }
  }
</script>

<style>
/* ═══════════════════════════════════════════════════════
   EASY BILLING PRO — DESIGN SYSTEM
═══════════════════════════════════════════════════════ */
:root {
  --bg:      #f5f4f0;
  --bg2:     #ece9e3;
  --surf:    #ffffff;
  --surf2:   #f8f7f4;
  --surf3:   #f0ede7;
  --bdr:     #e1ddd5;
  --bdr2:    #ccc7bc;
  --txt:     #17150f;
  --txt2:    #5a5247;
  --txt3:    #9b9288;
  --acc:     #2563eb;   /* electric blue */
  --acc2:    #1d4ed8;
  --acclt:   rgba(37,99,235,.1);
  --grn:     #059669;
  --grnlt:   rgba(5,150,105,.1);
  --red:     #dc2626;
  --redlt:   rgba(220,38,38,.1);
  --amb:     #d97706;
  --amblt:   rgba(217,119,6,.1);
  --vlt:     #7c3aed;
  --vltlt:   rgba(124,58,237,.1);
  --rose:    #e11d48;
  --roselt:  rgba(225,29,72,.1);
  --wa:      #25d366;
  --sh:      0 1px 3px rgba(0,0,0,.05), 0 2px 8px rgba(0,0,0,.04);
  --sh-md:   0 4px 18px rgba(0,0,0,.09);
  --sh-lg:   0 12px 44px rgba(0,0,0,.13);
  --r:       13px;
  --sbw:     252px;
}
[data-theme="dark"] {
  --bg:      #0d0c0a;
  --bg2:     #141210;
  --surf:    #1a1816;
  --surf2:   #201e1b;
  --surf3:   #272421;
  --bdr:     #2d2b27;
  --bdr2:    #3c3a35;
  --txt:     #ede9e0;
  --txt2:    #a0988e;
  --txt3:    #6b6560;
  --sh:      0 1px 3px rgba(0,0,0,.28), 0 2px 8px rgba(0,0,0,.2);
  --sh-md:   0 4px 18px rgba(0,0,0,.4);
  --sh-lg:   0 12px 44px rgba(0,0,0,.55);
}

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Figtree',sans-serif;background:var(--bg);color:var(--txt);min-height:100vh;transition:background .25s,color .25s;-webkit-font-smoothing:antialiased}
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--bdr2);border-radius:99px}

/* ── LAYOUT ─────────────────────────────── */
#app{display:flex;min-height:100vh}

/* SIDEBAR */
#sb{
  width:var(--sbw);background:#111827;min-height:100vh;
  position:fixed;top:0;left:0;z-index:50;
  display:flex;flex-direction:column;
  transition:width .3s cubic-bezier(.4,0,.2,1),transform .3s cubic-bezier(.4,0,.2,1);
  overflow:hidden;flex-shrink:0;
}
#sb.col{width:62px}
#sb.col .sl,#sb.col .ss,#sb.col .lt,#sb.col .ui,#sb.col .sbdg{display:none!important}
#sb.col .sbl{padding:0 15px;justify-content:center}
#sb.col .snl{justify-content:center;padding:10px;gap:0}
#sb.col .sft{padding:10px}
#sb.col .sur{justify-content:center;padding:10px}
#main{margin-left:var(--sbw);flex:1;min-width:0;transition:margin-left .3s cubic-bezier(.4,0,.2,1)}
#main.exp{margin-left:62px}
@media(max-width:768px){#sb{transform:translateX(-100%);width:252px!important}#sb.mop{transform:translateX(0)}#main{margin-left:0!important}#mbg{display:block}}

/* Sidebar internals */
.sbl{height:62px;display:flex;align-items:center;gap:10px;padding:0 16px;border-bottom:1px solid rgba(255,255,255,.06);flex-shrink:0}
.sic{width:33px;height:33px;border-radius:9px;background:linear-gradient(135deg,var(--acc),#60a5fa);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.sn{flex:1;overflow-y:auto;overflow-x:hidden;padding:8px 6px}
.ss{font-size:9.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.28);padding:0 10px;margin:14px 0 4px}
.snl{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.52);font-size:13px;font-weight:500;cursor:pointer;transition:all .15s;margin-bottom:1px;white-space:nowrap;text-decoration:none}
.snl:hover{background:rgba(255,255,255,.07);color:rgba(255,255,255,.88)}
.snl.act{background:rgba(37,99,235,.25);color:#93c5fd}
.snl i{font-size:14px;flex-shrink:0;width:18px;text-align:center}
.sbdg{margin-left:auto;background:var(--acc);color:#fff;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:99px}
.sft{padding:8px 6px;border-top:1px solid rgba(255,255,255,.06);flex-shrink:0}
.sur{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;cursor:pointer;transition:background .15s}
.sur:hover{background:rgba(255,255,255,.05)}
.suav{width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,var(--acc),#60a5fa);display:flex;align-items:center;justify-content:center;color:#fff;font-size:11px;font-weight:700;flex-shrink:0}

/* TOPBAR */
#tb{height:62px;background:var(--surf);border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px;padding:0 20px;position:sticky;top:0;z-index:30;transition:background .25s,border-color .25s}
.srch{flex:1;max-width:310px;position:relative}
.srch input{width:100%;background:var(--surf2);border:1px solid var(--bdr);border-radius:9px;padding:8px 13px 8px 34px;font-family:'Figtree',sans-serif;font-size:13px;color:var(--txt);outline:none;transition:all .2s}
.srch input:focus{border-color:var(--acc);box-shadow:0 0 0 3px rgba(37,99,235,.12)}
.srch input::placeholder{color:var(--txt3)}
.srch .si{position:absolute;left:10px;top:50%;transform:translateY(-50%);color:var(--txt3);font-size:13px;pointer-events:none}
.ib{width:36px;height:36px;border-radius:9px;background:var(--surf2);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--txt2);transition:all .15s;position:relative;flex-shrink:0}
.ib:hover{background:var(--surf3);color:var(--txt)}
.nd{position:absolute;top:6px;right:6px;width:7px;height:7px;background:var(--red);border-radius:50%;border:1.5px solid var(--surf)}

/* PAGES */
.page{display:none;padding:22px 20px}
.page.act{display:block}
.ptitle{font-size:21px;font-weight:800;letter-spacing:-.3px;display:flex;align-items:center;gap:8px;font-family:'Sora',sans-serif}
.psub{font-size:12.5px;color:var(--txt3);margin-top:2px}

/* CARDS */
.card{background:var(--surf);border:1px solid var(--bdr);border-radius:var(--r);box-shadow:var(--sh);transition:background .25s,border-color .25s,box-shadow .2s,transform .18s}
.card:hover{box-shadow:var(--sh-md)}
.sc{padding:18px 20px;cursor:default;overflow:hidden;position:relative}
.sc::after{content:'';position:absolute;bottom:-18px;right:-18px;width:80px;height:80px;border-radius:50%;opacity:.06}
.ca::after{background:var(--acc)}.cg::after{background:var(--grn)}.cr::after{background:var(--red)}.cam::after{background:var(--amb)}.cv::after{background:var(--vlt)}.cro::after{background:var(--rose)}
.sico{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:14px}
.sv{font-size:27px;font-weight:700;letter-spacing:-.5px;color:var(--txt);font-family:'Fira Code',monospace;line-height:1}
.slbl{font-size:12.5px;color:var(--txt2);margin-top:4px;font-weight:500}
.sdelta{display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:600;padding:2px 7px;border-radius:99px;margin-top:7px}
.up{background:var(--grnlt);color:var(--grn)}.dn{background:var(--redlt);color:var(--red)}.nt{background:var(--acclt);color:var(--acc)}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:99px;font-size:11.5px;font-weight:600}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.b-paid{background:var(--grnlt);color:var(--grn)}
.b-pending{background:var(--amblt);color:var(--amb)}
.b-overdue{background:var(--redlt);color:var(--red)}
.b-draft{background:rgba(107,114,128,.1);color:#6b7280}
.b-cancelled{background:var(--vltlt);color:var(--vlt)}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:9px;font-family:'Figtree',sans-serif;font-size:13px;font-weight:600;cursor:pointer;border:none;outline:none;transition:all .15s;white-space:nowrap}
.btn-primary{background:var(--acc);color:#fff;box-shadow:0 2px 8px rgba(37,99,235,.28)}
.btn-primary:hover{background:var(--acc2);transform:translateY(-1px)}
.btn-secondary{background:var(--surf2);color:var(--txt);border:1px solid var(--bdr)}
.btn-secondary:hover{background:var(--surf3)}
.btn-danger{background:var(--red);color:#fff}
.btn-danger:hover{background:#b91c1c}
.btn-grn{background:var(--grn);color:#fff}
.btn-grn:hover{background:#047857}
.btn-wa{background:var(--wa);color:#fff}
.btn-wa:hover{background:#1da855}
.btn-dark{background:#111827;color:#fff}
.btn-dark:hover{background:#1f2937;transform:translateY(-1px)}
.btn-sm{padding:6px 12px;font-size:12.5px}
.btn-xs{padding:4px 9px;font-size:11.5px;border-radius:6px}
.btn-ghost{background:transparent;color:var(--txt2)}
.btn-ghost:hover{background:var(--surf2);color:var(--txt)}
.btn-rose{background:var(--rose);color:#fff}
.btn-rose:hover{background:#be123c}

/* TABLE */
.tbl{width:100%;border-collapse:collapse}
.tbl th{font-size:10.5px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:var(--txt3);padding:11px 14px;border-bottom:1px solid var(--bdr);text-align:left;white-space:nowrap;cursor:pointer;user-select:none}
.tbl th:hover{color:var(--txt)}
.tbl td{padding:13px 14px;font-size:13px;border-bottom:1px solid var(--bdr);color:var(--txt);vertical-align:middle;transition:background .1s}
.tbl tr:last-child td{border-bottom:none}
.tbl tbody tr:hover td{background:rgba(37,99,235,.03)}
.tw{overflow-x:auto;-webkit-overflow-scrolling:touch}

/* ACTION BTNS */
.ab{width:28px;height:28px;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;cursor:pointer;transition:all .15s;border:none;outline:none;background:transparent;font-size:12.5px}
.ab-v{color:var(--acc)}.ab-v:hover{background:var(--acclt)}
.ab-e{color:var(--amb)}.ab-e:hover{background:var(--amblt)}
.ab-d{color:var(--red)}.ab-d:hover{background:var(--redlt)}
.ab-p{color:#111827}.ab-p:hover{background:rgba(17,24,39,.08)}
.ab-w{color:var(--wa)}.ab-w:hover{background:rgba(37,211,102,.1)}
.ab-m{color:var(--acc)}.ab-m:hover{background:var(--acclt)}
.ab-dl{color:var(--vlt)}.ab-dl:hover{background:var(--vltlt)}

/* OVERLAYS */
.ov{position:fixed;inset:0;background:rgba(0,0,0,.52);backdrop-filter:blur(7px);z-index:100;display:none;align-items:center;justify-content:center;padding:16px}
.ov.open{display:flex}
.modal{background:var(--surf);border:1px solid var(--bdr);border-radius:17px;width:100%;box-shadow:var(--sh-lg);max-height:93vh;overflow-y:auto;animation:mIn .22s cubic-bezier(.34,1.56,.64,1)}
@keyframes mIn{from{opacity:0;transform:scale(.93) translateY(12px)}to{opacity:1;transform:scale(1)}}
.mh{padding:18px 22px 14px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:var(--surf);z-index:2}
.mt{font-size:16px;font-weight:700;color:var(--txt);font-family:'Sora',sans-serif}
.mb{padding:18px 22px}
.mf{padding:13px 22px;border-top:1px solid var(--bdr);display:flex;gap:8px;justify-content:flex-end;position:sticky;bottom:0;background:var(--surf)}

/* FORMS */
.fg{margin-bottom:13px}
.fl{display:block;font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt2);margin-bottom:5px}
.fi,.fsl{width:100%;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:9px;padding:9px 13px;font-family:'Figtree',sans-serif;font-size:13.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none}
.fi:focus,.fsl:focus{border-color:var(--acc);box-shadow:0 0 0 3px rgba(37,99,235,.12);background:var(--surf)}
.fi::placeholder{color:var(--txt3)}
.fi.err{border-color:var(--red)}
.fe{font-size:11.5px;color:var(--red);margin-top:3px;display:none}
.fe.show{display:block}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.g3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:12px}
@media(max-width:500px){.g2,.g3{grid-template-columns:1fr}}

/* TOAST */
#tw{position:fixed;bottom:20px;right:20px;z-index:999;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:11px 15px;border-radius:11px;background:var(--surf);border:1px solid var(--bdr);box-shadow:var(--sh-lg);font-size:13px;font-weight:500;color:var(--txt);min-width:220px;max-width:320px;pointer-events:all;animation:tIn .27s cubic-bezier(.34,1.56,.64,1);transition:opacity .25s,transform .25s}
@keyframes tIn{from{opacity:0;transform:translateX(70px) scale(.9)}to{opacity:1;transform:none}}
.toast.hiding{opacity:0;transform:translateX(60px)}
.ts .ti{color:var(--grn)}.te .ti{color:var(--red)}.ti2 .ti{color:var(--acc)}.tw2 .ti{color:var(--amb)}

/* LOADER */
#ldr{position:fixed;inset:0;background:rgba(0,0,0,.35);backdrop-filter:blur(3px);z-index:200;display:none;align-items:center;justify-content:center}
.spin{width:42px;height:42px;border:3px solid rgba(37,99,235,.2);border-top-color:var(--acc);border-radius:50%;animation:sp .7s linear infinite}
@keyframes sp{to{transform:rotate(360deg)}}

/* PAGINATION */
.pgb{width:30px;height:30px;border-radius:7px;display:inline-flex;align-items:center;justify-content:center;font-size:12.5px;font-weight:500;cursor:pointer;border:1px solid var(--bdr);color:var(--txt2);background:transparent;transition:all .15s}
.pgb:hover{background:var(--surf2);color:var(--txt)}
.pgb.on{background:var(--acc);border-color:var(--acc);color:#fff}
.pgb:disabled{opacity:.35;cursor:not-allowed;pointer-events:none}

/* FILTER BAR */
.fbar{display:flex;flex-wrap:wrap;gap:8px;align-items:center;padding:13px 16px;border-bottom:1px solid var(--bdr)}
.fsm{background:var(--surf2);border:1px solid var(--bdr);border-radius:8px;padding:7px 11px;font-family:'Figtree',sans-serif;font-size:12.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none}
.fsm:focus{border-color:var(--acc)}

/* AI PANEL */
.ai-panel{background:linear-gradient(145deg,#0a0f1e,#0d1b2e,#111008);border:1px solid rgba(37,99,235,.2);border-radius:var(--r);padding:20px;position:relative;overflow:hidden;color:#e2e8f0}
.ai-panel::before{content:'';position:absolute;top:-50px;right:-50px;width:150px;height:150px;background:radial-gradient(circle,rgba(37,99,235,.18) 0%,transparent 70%)}
.ai-ins{display:flex;align-items:flex-start;gap:10px;padding:10px 12px;border-radius:8px;background:rgba(255,255,255,.04);margin-bottom:7px;transition:background .15s;cursor:default}
.ai-ins:last-child{margin-bottom:0}
.ai-ins:hover{background:rgba(255,255,255,.07)}
.ai-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0;margin-top:5px}
.ai-txt{font-size:13px;color:rgba(226,232,240,.82);line-height:1.55}
.ai-tag{font-size:10px;font-weight:700;padding:2px 7px;border-radius:99px;margin-right:5px}
.at-g{background:rgba(5,150,105,.3);color:#6ee7b7}
.at-r{background:rgba(220,38,38,.3);color:#fca5a5}
.at-a{background:rgba(217,119,6,.3);color:#fde68a}
.at-b{background:rgba(37,99,235,.3);color:#93c5fd}

/* INVOICE DOCUMENT */
.inv-doc{background:var(--surf);border:1px solid var(--bdr);border-radius:12px;padding:28px}
.inv-logo{font-family:'Sora',sans-serif;font-size:24px;font-weight:800;color:var(--acc);letter-spacing:-.3px}
.inv-tbl{width:100%;border-collapse:collapse;margin:14px 0}
.inv-tbl th{font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt3);padding:8px 12px;background:var(--surf2);text-align:left;border-bottom:1px solid var(--bdr)}
.inv-tbl td{padding:10px 12px;font-size:13px;border-bottom:1px solid var(--bdr);color:var(--txt)}
.inv-tbl tr:last-child td{border-bottom:none}

/* INVOICE ITEM ROW */
.irow{display:grid;grid-template-columns:2fr 0.7fr 0.9fr 0.7fr 0.7fr 0.9fr 28px;gap:8px;align-items:end;margin-bottom:10px}
@media(max-width:680px){.irow{grid-template-columns:1fr 60px 80px 60px 60px 80px 28px}}
.irm{width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--red);background:var(--redlt);border:none;transition:background .15s;align-self:flex-end;margin-bottom:1px}
.irm:hover{background:rgba(220,38,38,.2)}

/* WA TEMPLATES */
.wa-card{border-radius:12px;padding:16px;cursor:pointer;transition:all .2s;background:linear-gradient(135deg,#075e54,#128c7e);color:#fff}
.wa-card:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(7,94,84,.3)}

/* EMAIL CARDS */
.em-card{border:1px solid var(--bdr);border-radius:10px;padding:13px;cursor:pointer;transition:all .15s}
.em-card:hover{border-color:var(--acc);background:var(--acclt)}

/* CHART BOX */
.chb{padding:18px 20px}
.ch-title{font-size:14px;font-weight:700;color:var(--txt);font-family:'Sora',sans-serif;margin-bottom:2px}
.ch-sub{font-size:12px;color:var(--txt3);margin-bottom:14px}

/* MISC */
#mbg{display:none;position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:40}
.divider{height:1px;background:var(--bdr);margin:14px 0}
.mono{font-family:'Fira Code',monospace}

/* GRIDS */
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.g2g{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
.g73{display:grid;grid-template-columns:7fr 3fr;gap:14px}
.g64{display:grid;grid-template-columns:3fr 2fr;gap:14px}
@media(max-width:1100px){.g4{grid-template-columns:repeat(2,1fr)}.g73,.g64{grid-template-columns:1fr}}
@media(max-width:640px){.g4,.g3,.g2g{grid-template-columns:1fr}}

/* SKELETON */
.skel{background:linear-gradient(90deg,var(--surf2) 25%,var(--surf3) 50%,var(--surf2) 75%);background-size:200% 100%;animation:sk 1.5s infinite;border-radius:6px}
@keyframes sk{0%{background-position:-200% 0}100%{background-position:200% 0}}

/* EMPTY STATE */
.empty{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:56px 24px;text-align:center}
.empty-ico{width:68px;height:68px;border-radius:50%;background:var(--surf2);border:2px dashed var(--bdr2);display:flex;align-items:center;justify-content:center;color:var(--txt3);margin-bottom:14px;font-size:24px}

/* PRINT */
@media print{
  #sb,#tb,#tw,#ldr,#mbg,.no-print{display:none!important}
  #main{margin-left:0!important}
  .inv-doc{box-shadow:none;border:1px solid #ccc}
  body{background:#fff}
}
</style>
</head>
<body>

<!-- LOADER -->
<div id="ldr"><div style="background:var(--surf);padding:26px 36px;border-radius:14px;display:flex;flex-direction:column;align-items:center;gap:13px"><div class="spin"></div><span style="font-size:13px;color:var(--txt2)">Processing…</span></div></div>

<!-- MOBILE BACKGROUND -->
<div id="mbg" onclick="closeMob()"></div>

<!-- TOAST -->
<div id="tw"></div>

<!-- ═══════════════════════════════════════════════════
     MODALS
═══════════════════════════════════════════════════ -->

<!-- DELETE CONFIRM -->
<div id="del-ov" class="ov">
  <div class="modal" style="max-width:380px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--redlt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--red)"><i class="fas fa-trash"></i></div>
        <span class="mt">Delete Invoice</span>
      </div>
      <button class="ib" onclick="closeOv('del-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb"><p style="font-size:13.5px;color:var(--txt2);line-height:1.6">Delete invoice <strong id="del-inv-id" style="color:var(--txt)"></strong>? This action cannot be undone.</p></div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeOv('del-ov')">Cancel</button>
      <button class="btn btn-danger btn-sm" id="del-confirm-btn"><i class="fas fa-trash"></i> Delete</button>
    </div>
  </div>
</div>

<!-- CREATE / EDIT INVOICE MODAL -->
<div id="inv-ov" class="ov">
  <div class="modal" style="max-width:860px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--acclt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--acc)" id="inv-modal-ico"><i class="fas fa-file-invoice"></i></div>
        <span class="mt" id="inv-modal-title">Create Invoice</span>
      </div>
      <button class="ib" onclick="closeInvModal()"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb">
      <form id="inv-form" onsubmit="submitInvoice(event)" novalidate>

        <!-- Customer Details -->
        <div style="margin-bottom:18px">
          <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--acc);margin-bottom:12px;display:flex;align-items:center;gap:6px"><i class="fas fa-user"></i> Customer Details</div>
          <div class="g2">
            <div class="fg"><label class="fl">Customer Name *</label><input type="text" id="f-cname" class="fi" placeholder="John Smith"/><div class="fe" id="e-cname">Required</div></div>
            <div class="fg"><label class="fl">Phone Number *</label><input type="tel" id="f-phone" class="fi" placeholder="+1 555 000 0000"/><div class="fe" id="e-phone">Required</div></div>
          </div>
          <div class="g3">
            <div class="fg"><label class="fl">WhatsApp Number</label><input type="tel" id="f-wa" class="fi" placeholder="+1 555 000 0000"/></div>
            <div class="fg"><label class="fl">Email *</label><input type="email" id="f-email" class="fi" placeholder="client@email.com"/><div class="fe" id="e-email">Valid email required</div></div>
            <div class="fg"><label class="fl">Address</label><input type="text" id="f-addr" class="fi" placeholder="123 Main St, City"/></div>
          </div>
        </div>

        <!-- Invoice Details -->
        <div style="margin-bottom:18px">
          <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--acc);margin-bottom:12px;display:flex;align-items:center;gap:6px"><i class="fas fa-file-alt"></i> Invoice Details</div>
          <div class="g3">
            <div class="fg"><label class="fl">Invoice Number</label><input type="text" id="f-invno" class="fi" readonly style="opacity:.7;cursor:default"/></div>
            <div class="fg"><label class="fl">Invoice Date</label><input type="date" id="f-date" class="fi"/></div>
            <div class="fg"><label class="fl">Due Date</label><input type="date" id="f-due" class="fi"/></div>
          </div>
          <div class="g3">
            <div class="fg"><label class="fl">Payment Status</label><select id="f-status" class="fsl"><option value="Pending">Pending</option><option value="Paid">Paid</option><option value="Overdue">Overdue</option><option value="Draft">Draft</option><option value="Cancelled">Cancelled</option></select></div>
            <div class="fg"><label class="fl">Payment Method</label><select id="f-method" class="fsl"><option value="Bank Transfer">Bank Transfer</option><option value="Credit Card">Credit Card</option><option value="Cash">Cash</option><option value="PayPal">PayPal</option><option value="Stripe">Stripe</option><option value="Cheque">Cheque</option><option value="Crypto">Crypto</option></select></div>
            <div class="fg"><label class="fl">Currency</label><select id="f-cur" class="fsl"><option value="LKR">LKR (Rs)</option><option value="USD">USD ($)</option><option value="EUR">EUR (€)</option><option value="GBP">GBP (£)</option><option value="AED">AED (د.إ)</option><option value="INR">INR (₹)</option><option value="CAD">CAD (CA$)</option></select></div>
          </div>
        </div>

        <!-- Invoice Items -->
        <div style="margin-bottom:18px">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px">
            <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--acc);display:flex;align-items:center;gap:6px"><i class="fas fa-list"></i> Invoice Items *</div>
            <button type="button" class="btn btn-xs btn-secondary" onclick="addItemRow()"><i class="fas fa-plus"></i> Add Item</button>
          </div>
          <div style="display:grid;grid-template-columns:2fr 0.7fr 0.9fr 0.7fr 0.7fr 0.9fr 28px;gap:6px;padding:0 2px;margin-bottom:7px">
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Description</span>
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Qty</span>
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Price</span>
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Tax %</span>
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Disc %</span>
            <span style="font-size:10px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.05em">Total</span>
            <span></span>
          </div>
          <div id="item-rows"></div>
          <div class="fe" id="e-items" style="margin-top:4px">Add at least one item</div>
        </div>

        <!-- Totals & Notes -->
        <div class="g2">
          <div>
            <div class="fg"><label class="fl">Notes</label><textarea id="f-notes" class="fi" rows="3" placeholder="Payment terms, thank you note…" style="resize:none"></textarea></div>
            <div class="fg" style="margin-bottom:0"><label class="fl">Company / Business Name</label><input type="text" id="f-company" class="fi" placeholder="Your Company Ltd"/></div>
          </div>
          <div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:10px;padding:16px">
            <div style="display:flex;justify-content:space-between;font-size:13px;color:var(--txt2);margin-bottom:6px">Subtotal:<span class="mono" id="s-sub">$0.00</span></div>
            <div style="display:flex;justify-content:space-between;font-size:13px;color:var(--txt2);margin-bottom:6px">Tax:<span class="mono" id="s-tax">$0.00</span></div>
            <div style="display:flex;justify-content:space-between;font-size:13px;color:var(--grn);margin-bottom:6px">Discount:<span class="mono" id="s-disc">-$0.00</span></div>
            <div style="height:1px;background:var(--bdr);margin:10px 0"></div>
            <div style="display:flex;justify-content:space-between;font-size:20px;font-weight:800;color:var(--acc)">TOTAL:<span class="mono" id="s-total">$0.00</span></div>
          </div>
        </div>

        <button type="submit" id="inv-ghost" style="display:none"></button>
      </form>
    </div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeInvModal()">Cancel</button>
      <button class="btn btn-ghost btn-sm" onclick="previewFromModal()"><i class="fas fa-eye"></i> Preview</button>
      <button class="btn btn-primary btn-sm" onclick="document.getElementById('inv-ghost').click()">
        <i class="fas fa-save"></i><span id="inv-save-lbl">Create Invoice</span>
      </button>
    </div>
  </div>
</div>

<!-- INVOICE PREVIEW MODAL -->
<div id="prev-ov" class="ov">
  <div class="modal" style="max-width:760px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--acclt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--acc)"><i class="fas fa-receipt"></i></div>
        <span class="mt">Invoice Preview</span>
      </div>
      <button class="ib" onclick="closeOv('prev-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb" id="prev-body"></div>
    <div class="mf no-print">
      <button class="btn btn-secondary btn-sm" onclick="closeOv('prev-ov')">Close</button>
      <button class="btn btn-wa btn-sm" id="prev-wa-btn"><i class="fab fa-whatsapp"></i> WhatsApp</button>
      <button class="btn btn-sm" style="background:var(--acc);color:#fff" id="prev-email-btn"><i class="fas fa-envelope"></i> Email</button>
      <button class="btn btn-dark btn-sm" onclick="printInvoice()"><i class="fas fa-print"></i> Print / PDF</button>
    </div>
  </div>
</div>

<!-- EMAIL COMPOSE MODAL -->
<div id="email-ov" class="ov">
  <div class="modal" style="max-width:560px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--acclt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--acc)"><i class="fas fa-envelope"></i></div>
        <span class="mt">Send Email</span>
      </div>
      <button class="ib" onclick="closeOv('email-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb">
      <div class="fg"><label class="fl">To</label><input type="email" id="em-to" class="fi" placeholder="client@email.com"/></div>
      <div class="fg"><label class="fl">Subject</label><input type="text" id="em-sub" class="fi"/></div>
      <div class="fg"><label class="fl">Message</label><textarea id="em-msg" class="fi" rows="7" style="resize:vertical"></textarea></div>
      <div style="margin-top:12px">
        <div style="font-size:11px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.07em;margin-bottom:10px">Quick Templates</div>
        <div class="g2g" style="gap:8px" id="email-tmpl-boxes"></div>
      </div>
    </div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeOv('email-ov')">Cancel</button>
      <button class="btn btn-primary btn-sm" onclick="sendEmail()"><i class="fas fa-paper-plane"></i> Send Email</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════
     APP
═══════════════════════════════════════════════════ -->
<div id="app">

  <!-- SIDEBAR -->
  <aside id="sb">
    <div class="sbl">
      <div class="sic"><i class="fas fa-file-invoice-dollar" style="color:#fff;font-size:15px"></i></div>
      <div class="lt">
        <div style="font-size:15px;font-weight:800;color:#fff;letter-spacing:-.2px;font-family:'Sora',sans-serif">Easy Billing</div>
        <div style="font-size:10px;color:rgba(255,255,255,.35)">Pro Edition</div>
      </div>
    </div>
    <nav class="sn">
      <div class="ss">Main</div>
      <a class="snl act" data-pg="dashboard" onclick="goPage('dashboard',this)"><i class="fas fa-home"></i><span class="sl">Dashboard</span></a>
      <a class="snl" data-pg="invoices" onclick="goPage('invoices',this)"><i class="fas fa-file-invoice"></i><span class="sl">Invoices</span><span class="sbdg" id="sb-inv-cnt">0</span></a>
      <a class="snl" data-pg="analytics" onclick="goPage('analytics',this)"><i class="fas fa-chart-bar"></i><span class="sl">Analytics</span></a>
      <a class="snl" data-pg="ai" onclick="goPage('ai',this)"><i class="fas fa-robot"></i><span class="sl">AI Insights</span><span class="sbdg" style="background:var(--vlt)">AI</span></a>
      <a class="snl" data-pg="whatsapp" onclick="goPage('whatsapp',this)"><i class="fab fa-whatsapp"></i><span class="sl">WhatsApp</span></a>
      <a class="snl" data-pg="email" onclick="goPage('email',this)"><i class="fas fa-envelope"></i><span class="sl">Email</span></a>
      <div class="ss">Tools</div>
      <a class="snl" onclick="exportCSV()"><i class="fas fa-download"></i><span class="sl">Export CSV</span></a>
      <a class="snl" onclick="toast('Reports coming soon!','info')"><i class="fas fa-chart-pie"></i><span class="sl">Reports</span></a>
      <a class="snl" onclick="toast('Settings coming soon!','info')"><i class="fas fa-cog"></i><span class="sl">Settings</span></a>
    </nav>
    <div class="sft">
      <!-- Theme toggle -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 10px 10px;border-bottom:1px solid rgba(255,255,255,.06);margin-bottom:4px">
        <span class="sl" style="font-size:12px;color:rgba(255,255,255,.35)">Dark Mode</span>
        <div id="th-track" onclick="toggleTheme()" style="width:38px;height:20px;background:rgba(255,255,255,.15);border-radius:99px;position:relative;cursor:pointer;transition:background .2s;flex-shrink:0">
          <div id="th-thumb" style="position:absolute;top:2px;left:2px;width:16px;height:16px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)"></div>
        </div>
      </div>
      <div class="sur">
        <div class="suav">EB</div>
        <div class="ui"><div style="font-size:13px;font-weight:600;color:rgba(255,255,255,.82)">Admin</div><div style="font-size:11px;color:rgba(255,255,255,.35)">Business Account</div></div>
      </div>
    </div>
  </aside>

  <!-- MAIN CONTENT -->
  <div id="main">

    <!-- TOPBAR -->
    <header id="tb">
      <button class="ib" onclick="toggleSB()"><i class="fas fa-bars" style="font-size:16px"></i></button>
      <div class="srch">
        <i class="fas fa-search si"></i>
        <input type="text" id="gsearch" placeholder="Search invoices, clients…" oninput="onGSearch(this.value)"/>
      </div>
      <div style="display:flex;align-items:center;gap:8px;margin-left:auto">
        <button class="btn btn-primary btn-sm no-print" id="tb-new-btn" onclick="openCreateInv()" style="display:none">
          <i class="fas fa-plus"></i>New Invoice
        </button>
        <button class="ib" onclick="toast('2 invoices overdue today!','warn')">
          <i class="fas fa-bell" style="font-size:16px"></i>
          <span class="nd"></span>
        </button>
        <div style="width:34px;height:34px;border-radius:8px;border:2px solid var(--acc);background:var(--acclt);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;color:var(--acc);cursor:pointer;font-family:'Sora',sans-serif" onclick="toast('Profile settings!','info')">EB</div>
      </div>
    </header>

    <!-- ═══ DASHBOARD ═══ -->
    <div id="page-dashboard" class="page act">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px">
        <div>
          <h1 class="ptitle"><i class="fas fa-home" style="color:var(--acc)"></i>Dashboard</h1>
          <p class="psub" id="dash-sub">Overview of your billing activity</p>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-secondary btn-sm" onclick="goPage('analytics',document.querySelector('[data-pg=analytics]'))"><i class="fas fa-chart-bar"></i>Analytics</button>
          <button class="btn btn-primary btn-sm" onclick="openCreateInv()"><i class="fas fa-plus"></i>New Invoice</button>
        </div>
      </div>

      <!-- Stat Cards -->
      <div class="g4" style="margin-bottom:20px" id="dash-stats"></div>

      <!-- Charts Row -->
      <div class="g73" style="margin-bottom:20px">
        <div class="card chb">
          <div class="ch-title">Monthly Revenue</div>
          <div class="ch-sub">Revenue trend over the last 12 months</div>
          <div style="height:230px"><canvas id="ch-rev"></canvas></div>
        </div>
        <div class="card chb">
          <div class="ch-title">Invoice Status</div>
          <div class="ch-sub">Current breakdown</div>
          <div style="height:185px"><canvas id="ch-status"></canvas></div>
          <div id="status-leg" style="margin-top:12px;display:flex;flex-direction:column;gap:6px"></div>
        </div>
      </div>

      <!-- Recent Invoices -->
      <div class="card">
        <div style="padding:18px 20px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between">
          <div>
            <div style="font-size:14px;font-weight:700;font-family:'Sora',sans-serif">Recent Invoices</div>
            <div style="font-size:12px;color:var(--txt3)">Latest billing activity</div>
          </div>
          <button class="btn btn-xs btn-secondary" onclick="goPage('invoices',document.querySelector('[data-pg=invoices]'))">View All →</button>
        </div>
        <div id="dash-recent" style="padding:4px 0"></div>
      </div>
    </div>

    <!-- ═══ INVOICES ═══ -->
    <div id="page-invoices" class="page">
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px">
        <div>
          <h1 class="ptitle"><i class="fas fa-file-invoice" style="color:var(--acc)"></i>Invoices</h1>
          <p class="psub" id="inv-page-sub">Manage all your invoices</p>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-secondary btn-sm" onclick="exportCSV()"><i class="fas fa-download"></i>Export CSV</button>
          <button class="btn btn-primary btn-sm" onclick="openCreateInv()"><i class="fas fa-plus"></i>New Invoice</button>
        </div>
      </div>

      <!-- Invoice Stat Cards -->
      <div class="g4" style="margin-bottom:20px" id="inv-stats"></div>

      <div class="card">
        <!-- Filter Bar -->
        <div class="fbar">
          <div style="position:relative;flex:1;min-width:180px">
            <i class="fas fa-search" style="position:absolute;left:9px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--txt3);pointer-events:none"></i>
            <input class="fsm" id="inv-q" type="text" placeholder="Search customer, invoice #…" style="padding-left:28px;width:100%" oninput="filterInvs()"/>
          </div>
          <select class="fsm" id="f-inv-status" onchange="filterInvs()">
            <option value="">All Status</option>
            <option>Paid</option><option>Pending</option><option>Overdue</option>
            <option>Draft</option><option>Cancelled</option>
          </select>
          <select class="fsm" id="f-inv-method" onchange="filterInvs()">
            <option value="">All Methods</option>
            <option>Bank Transfer</option><option>Credit Card</option>
            <option>Cash</option><option>PayPal</option><option>Stripe</option>
          </select>
          <input class="fsm" type="date" id="f-inv-from" onchange="filterInvs()" title="From date"/>
          <input class="fsm" type="date" id="f-inv-to" onchange="filterInvs()" title="To date"/>
          <select class="fsm" id="f-inv-sort" onchange="filterInvs()">
            <option value="">Sort By</option>
            <option value="date-desc">Date Newest</option>
            <option value="date-asc">Date Oldest</option>
            <option value="amt-desc">Highest Amount</option>
            <option value="amt-asc">Lowest Amount</option>
            <option value="name-asc">Customer A→Z</option>
          </select>
          <button class="btn btn-xs btn-secondary" onclick="resetFilter()" title="Clear"><i class="fas fa-times"></i></button>
        </div>

        <!-- Results info -->
        <div style="padding:9px 16px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:6px">
          <span style="font-size:12.5px;color:var(--txt3)" id="inv-ri">0 invoices</span>
          <div style="display:flex;align-items:center;gap:8px">
            <span style="font-size:12px;color:var(--txt3)">Per page:</span>
            <select class="fsm" style="padding:4px 8px;font-size:12px" id="inv-pp" onchange="chInvPP()">
              <option value="5">5</option><option value="10" selected>10</option>
              <option value="20">20</option><option value="50">50</option>
            </select>
          </div>
        </div>

        <!-- Table -->
        <div class="tw">
          <table class="tbl">
            <thead><tr>
              <th onclick="sortCol('id')">Invoice # <span id="si-id">↕</span></th>
              <th onclick="sortCol('cname')">Customer <span id="si-cname">↕</span></th>
              <th>Contact</th>
              <th onclick="sortCol('date')">Date <span id="si-date">↕</span></th>
              <th onclick="sortCol('due')">Due Date <span id="si-due">↕</span></th>
              <th onclick="sortCol('total')">Amount <span id="si-total">↕</span></th>
              <th>Method</th>
              <th>Status</th>
              <th style="text-align:center">Actions</th>
            </tr></thead>
            <tbody id="inv-tbody"></tbody>
          </table>
          <div id="inv-empty" class="empty" style="display:none">
            <div class="empty-ico"><i class="fas fa-file-invoice"></i></div>
            <div style="font-size:15px;font-weight:700;margin-bottom:6px">No invoices found</div>
            <p style="font-size:13px;color:var(--txt3);margin-bottom:16px">Create your first invoice to get started.</p>
            <button class="btn btn-primary btn-sm" onclick="openCreateInv()"><i class="fas fa-plus"></i>Create Invoice</button>
          </div>
        </div>

        <!-- Pagination -->
        <div style="padding:12px 16px;border-top:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px">
          <span style="font-size:12.5px;color:var(--txt3)" id="inv-pg-info">Page 1 of 1</span>
          <div style="display:flex;gap:4px" id="inv-pg-ctrl"></div>
        </div>
      </div>
    </div>

    <!-- ═══ ANALYTICS ═══ -->
    <div id="page-analytics" class="page">
      <div style="margin-bottom:22px">
        <h1 class="ptitle"><i class="fas fa-chart-bar" style="color:var(--acc)"></i>Analytics</h1>
        <p class="psub">Detailed financial performance metrics</p>
      </div>
      <div class="g4" style="margin-bottom:18px" id="an-stats"></div>
      <div class="g2g" style="margin-bottom:18px">
        <div class="card chb">
          <div class="ch-title">Revenue vs Invoices</div>
          <div class="ch-sub">Monthly comparison this year</div>
          <div style="height:250px"><canvas id="an-ch1"></canvas></div>
        </div>
        <div class="card chb">
          <div class="ch-title">Monthly Earnings</div>
          <div class="ch-sub">Paid invoice revenue by month</div>
          <div style="height:250px"><canvas id="an-ch2"></canvas></div>
        </div>
      </div>
      <div class="g2g">
        <div class="card" style="padding:18px 20px">
          <div class="ch-title" style="margin-bottom:4px;font-family:'Sora',sans-serif">Top Invoices by Value</div>
          <div class="ch-sub" style="margin-bottom:14px">Highest earning invoices</div>
          <div id="top-invs"></div>
        </div>
        <div class="card chb">
          <div class="ch-title">Payment Methods</div>
          <div class="ch-sub">Revenue by payment type</div>
          <div style="height:220px"><canvas id="an-ch3"></canvas></div>
        </div>
      </div>
    </div>

    <!-- ═══ AI INSIGHTS ═══ -->
    <div id="page-ai" class="page">
      <div style="margin-bottom:22px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:10px">
        <div>
          <h1 class="ptitle"><i class="fas fa-robot" style="color:var(--vlt)"></i>AI Insights</h1>
          <p class="psub">Intelligent analysis of your billing data</p>
        </div>
        <button class="btn btn-sm" style="background:var(--vlt);color:#fff" onclick="refreshAI()"><i class="fas fa-sync-alt"></i>Refresh AI</button>
      </div>
      <div class="g64" style="margin-bottom:18px">
        <div class="ai-panel" id="ai-main"></div>
        <div class="ai-panel" id="ai-sug"></div>
      </div>
      <div class="g3" style="margin-bottom:18px" id="ai-kpis"></div>
      <div class="card" style="padding:18px 20px">
        <div style="font-family:'Sora',sans-serif;font-size:14px;font-weight:700;margin-bottom:4px">Revenue Health Score</div>
        <div style="font-size:12px;color:var(--txt3);margin-bottom:16px">Key billing performance indicators</div>
        <div id="ai-bars"></div>
      </div>
    </div>

    <!-- ═══ WHATSAPP ═══ -->
    <div id="page-whatsapp" class="page">
      <div style="margin-bottom:22px">
        <h1 class="ptitle"><i class="fab fa-whatsapp" style="color:#25d366"></i>WhatsApp Integration</h1>
        <p class="psub">Send invoices and reminders via WhatsApp</p>
      </div>
      <div class="g3" style="margin-bottom:22px" id="wa-tmpl-cards"></div>
      <div class="card" style="padding:20px">
        <div style="font-size:14px;font-weight:700;font-family:'Sora',sans-serif;margin-bottom:14px">Quick Message Center</div>
        <div class="g2">
          <div>
            <div class="fg"><label class="fl">Select Invoice</label><select id="wa-inv-sel" class="fsl" onchange="loadWAMsg()"><option value="">Select invoice…</option></select></div>
            <div class="fg"><label class="fl">Template</label>
              <select id="wa-tmpl-sel" class="fsl" onchange="loadWAMsg()">
                <option value="">Select template…</option>
                <option value="invoice">Invoice Sent</option>
                <option value="reminder">Payment Reminder</option>
                <option value="overdue">Overdue Notice</option>
                <option value="thanks">Thank You</option>
              </select>
            </div>
          </div>
          <div class="fg"><label class="fl">Message Preview</label><textarea id="wa-msg-area" class="fi" rows="7" style="resize:none"></textarea></div>
        </div>
        <div style="display:flex;gap:8px;margin-top:4px">
          <button class="btn btn-wa btn-sm" onclick="sendWAFromCenter()"><i class="fab fa-whatsapp"></i>Open WhatsApp</button>
          <button class="btn btn-secondary btn-sm" onclick="document.getElementById('wa-msg-area').value=''"><i class="fas fa-times"></i>Clear</button>
        </div>
      </div>
    </div>

    <!-- ═══ EMAIL ═══ -->
    <div id="page-email" class="page">
      <div style="margin-bottom:22px">
        <h1 class="ptitle"><i class="fas fa-envelope" style="color:var(--acc)"></i>Email System</h1>
        <p class="psub">Compose and send professional invoice emails</p>
      </div>
      <div class="g2g">
        <div class="card" style="padding:20px">
          <div style="font-size:14px;font-weight:700;font-family:'Sora',sans-serif;margin-bottom:14px">Compose Email</div>
          <div class="fg"><label class="fl">Select Invoice</label><select id="ep-inv" class="fsl" onchange="fillEmailTo()"><option value="">Select invoice…</option></select></div>
          <div class="fg"><label class="fl">To</label><input type="email" id="ep-to" class="fi" placeholder="client@email.com"/></div>
          <div class="fg"><label class="fl">Subject</label><input type="text" id="ep-sub" class="fi"/></div>
          <div class="fg"><label class="fl">Template</label>
            <select id="ep-tmpl" class="fsl" onchange="loadEmailTmpl()">
              <option value="">Select template…</option>
              <option value="invoice">Invoice Sent</option>
              <option value="reminder">Payment Reminder</option>
              <option value="overdue">Overdue Notice</option>
              <option value="thanks">Thank You</option>
              <option value="promo">Promotion</option>
            </select>
          </div>
          <div class="fg"><label class="fl">Message</label><textarea id="ep-msg" class="fi" rows="6" style="resize:vertical"></textarea></div>
          <button class="btn btn-primary btn-sm" style="width:100%" onclick="sendEmailPage()"><i class="fas fa-paper-plane"></i>Send Email</button>
        </div>
        <div>
          <div style="font-size:14px;font-weight:700;font-family:'Sora',sans-serif;margin-bottom:12px">Email Templates</div>
          <div style="display:flex;flex-direction:column;gap:10px" id="email-page-tmpls"></div>
        </div>
      </div>
    </div>

  </div><!-- /main -->
</div><!-- /app -->

<!-- ═══════════════════════════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════════════════════════ -->
<script>
/* ════════════════════════════════════════════════════
   EASY BILLING PRO — COMPLETE JAVASCRIPT
════════════════════════════════════════════════════ */

/* ── HELPERS ──────────────────────────────────── */
const fmt = (v, cur='USD') => {
  const s = { USD:'$', EUR:'€', GBP:'£', AED:'د.إ', INR:'₹', CAD:'CA$' };
  const sym = s[cur] || '$';
  return sym + (Math.round((parseFloat(v)||0)*100)/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});
};
const fmtD = d => { if(!d) return '—'; try{return new Date(d+'T00:00:00').toLocaleDateString('en-US',{year:'numeric',month:'short',day:'numeric'})}catch{return d} };
const esc = s => String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
const randId = prefix => prefix+'-'+String(10000+Math.floor(Math.random()*90000)).padStart(5,'0');
const today = () => new Date().toISOString().split('T')[0];
const addDays = (d,n) => { const dt=new Date(d+'T00:00:00'); dt.setDate(dt.getDate()+n); return dt.toISOString().split('T')[0]; };

/* ── SAMPLE DATA ─────────────────────────────── */
const SERVICES = ['Web Design Package','SEO Optimization','Monthly Retainer','Social Media Management',
  'Brand Identity Kit','Mobile App Development','Logo Design','Content Creation',
  'Email Marketing','Consulting Session','Cloud Hosting (Annual)','UI/UX Audit'];

const SEED_INVOICES = [
  {id:'INV-10001',cname:'Emma Johnson',phone:'+1 555 0101',wa:'+15550101',email:'emma@mail.com',addr:'123 Oak St, New York',company:'Apex Corp',date:'2024-12-01',due:'2024-12-31',status:'Paid',method:'Bank Transfer',currency:'USD',notes:'Quarterly retainer paid.',items:[{desc:'Monthly Retainer',qty:3,price:1200,tax:10,disc:0},{desc:'SEO Optimization',qty:1,price:800,tax:10,disc:5}],createdAt:Date.now()-864e5*40},
  {id:'INV-10002',cname:'Liam Williams',phone:'+1 555 0202',wa:'+15550202',email:'liam@mail.com',addr:'456 Pine Ave, LA',company:'Williams LLC',date:'2024-12-05',due:'2025-01-05',status:'Pending',method:'Credit Card',currency:'USD',notes:'30-day payment terms.',items:[{desc:'Web Design Package',qty:1,price:3500,tax:8,disc:0},{desc:'UI/UX Audit',qty:1,price:600,tax:8,disc:10}],createdAt:Date.now()-864e5*35},
  {id:'INV-10003',cname:'Olivia Brown',phone:'+44 7700 900',wa:'+447700900',email:'olivia@mail.com',addr:'789 Baker St, London',company:'Brown & Co',date:'2024-11-15',due:'2024-12-15',status:'Overdue',method:'PayPal',currency:'GBP',notes:'Follow up required.',items:[{desc:'Brand Identity Kit',qty:1,price:2200,tax:20,disc:0},{desc:'Logo Design',qty:2,price:400,tax:20,disc:0}],createdAt:Date.now()-864e5*55},
  {id:'INV-10004',cname:'Noah Davis',phone:'+1 555 0303',wa:'+15550303',email:'noah@mail.com',addr:'321 Elm Rd, Chicago',company:'Davis Tech',date:'2024-12-10',due:'2025-01-10',status:'Paid',method:'Stripe',currency:'USD',notes:'Thank you for your business!',items:[{desc:'Mobile App Development',qty:1,price:8000,tax:0,disc:10},{desc:'Consulting Session',qty:5,price:150,tax:0,disc:0}],createdAt:Date.now()-864e5*30},
  {id:'INV-10005',cname:'Ava Martinez',phone:'+34 91 1234',wa:'+34911234',email:'ava@mail.com',addr:'654 Sol St, Madrid',company:'Ava Media',date:'2024-12-12',due:'2025-01-12',status:'Pending',method:'Bank Transfer',currency:'EUR',notes:'',items:[{desc:'Content Creation',qty:10,price:200,tax:21,disc:0},{desc:'Social Media Management',qty:2,price:600,tax:21,disc:5}],createdAt:Date.now()-864e5*28},
  {id:'INV-10006',cname:'Ethan Garcia',phone:'+1 555 0404',wa:'+15550404',email:'ethan@mail.com',addr:'987 Maple Dr, Boston',company:'Garcia Ventures',date:'2024-11-20',due:'2024-12-20',status:'Overdue',method:'Cash',currency:'USD',notes:'Send reminder.',items:[{desc:'Cloud Hosting (Annual)',qty:1,price:1800,tax:0,disc:0}],createdAt:Date.now()-864e5*50},
  {id:'INV-10007',cname:'Sophia Wilson',phone:'+61 2 9001',wa:'+61290001',email:'sophia@mail.com',addr:'11 Harbor Rd, Sydney',company:'Wilson Digital',date:'2024-12-15',due:'2025-01-15',status:'Paid',method:'Credit Card',currency:'USD',notes:'',items:[{desc:'Email Marketing',qty:3,price:350,tax:10,disc:0},{desc:'SEO Optimization',qty:1,price:1200,tax:10,disc:0}],createdAt:Date.now()-864e5*25},
  {id:'INV-10008',cname:'James Taylor',phone:'+1 555 0606',wa:'+15550606',email:'james@mail.com',addr:'44 Broadway, NYC',company:'Taylor Group',date:'2024-12-18',due:'2025-01-18',status:'Draft',method:'Stripe',currency:'USD',notes:'Pending approval.',items:[{desc:'Web Design Package',qty:1,price:5500,tax:8,disc:15},{desc:'Logo Design',qty:1,price:800,tax:8,disc:0}],createdAt:Date.now()-864e5*22},
  {id:'INV-10009',cname:'Charlotte Harris',phone:'+1 555 0707',wa:'+15550707',email:'charlotte@mail.com',addr:'55 River Rd, Austin',company:'Harris Co',date:'2024-12-20',due:'2025-01-20',status:'Pending',method:'PayPal',currency:'USD',notes:'',items:[{desc:'Monthly Retainer',qty:1,price:2000,tax:0,disc:0},{desc:'Consulting Session',qty:3,price:200,tax:0,disc:0}],createdAt:Date.now()-864e5*20},
  {id:'INV-10010',cname:'Lucas Moore',phone:'+33 1 4200',wa:'+33142000',email:'lucas@mail.com',addr:'88 Champs, Paris',company:'Moore Agency',date:'2024-12-22',due:'2025-01-22',status:'Paid',method:'Bank Transfer',currency:'EUR',notes:'Excellent work!',items:[{desc:'Brand Identity Kit',qty:1,price:3200,tax:20,disc:0},{desc:'UI/UX Audit',qty:1,price:900,tax:20,disc:0}],createdAt:Date.now()-864e5*18},
  {id:'INV-10011',cname:'Harper Jackson',phone:'+1 555 0909',wa:'+15550909',email:'harper@mail.com',addr:'99 Lake Dr, Seattle',company:'Jackson Studios',date:'2024-12-25',due:'2025-01-25',status:'Pending',method:'Stripe',currency:'USD',notes:'',items:[{desc:'Mobile App Development',qty:1,price:6500,tax:0,disc:5}],createdAt:Date.now()-864e5*15},
  {id:'INV-10012',cname:'Mason Anderson',phone:'+1 555 0505',wa:'+15550505',email:'mason@mail.com',addr:'22 Park Blvd, Miami',company:'Anderson LLC',date:'2024-12-28',due:'2025-01-28',status:'Paid',method:'Credit Card',currency:'USD',notes:'Repeat client.',items:[{desc:'Social Media Management',qty:4,price:500,tax:0,disc:10},{desc:'Content Creation',qty:5,price:150,tax:0,disc:0}],createdAt:Date.now()-864e5*12},
];

/* ── COMPUTE TOTALS ────────────────────────── */
function computeInvoice(inv) {
  const items = inv.items || [];
  const sub  = items.reduce((s,x)=>s+x.qty*x.price,0);
  const taxA = items.reduce((s,x)=>s+x.qty*x.price*(x.tax||0)/100,0);
  const discA= items.reduce((s,x)=>s+x.qty*x.price*(x.disc||0)/100,0);
  const total= Math.max(0, sub+taxA-discA);
  return { sub:+sub.toFixed(2), taxA:+taxA.toFixed(2), discA:+discA.toFixed(2), total:+total.toFixed(2) };
}
function enrichInvoice(inv) {
  const c = computeInvoice(inv);
  return {...inv,...c};
}

/* ── STATE ───────────────────────────────── */
let invoices = [];
let filteredInvs = [];
let invPage = 1, invPP = 10;
let invSortKey = 'createdAt', invSortDir = -1;
let editInvId = null, previewInvId = null;
let itemCount = 0;
let revCh=null, statusCh=null, anCh1=null, anCh2=null, anCh3=null;

/* ── INIT ────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  loadInvoices();
  initTheme();
  setDashSub();
  buildDashboard();
  filterInvs();
  populateInvSelects();
  buildWATemplates();
  buildEmailPageTmpls();
  buildEmailModalTmpls();
  setBadge();
  if (window.innerWidth >= 900) document.getElementById('tb-new-btn').style.display = 'flex';
  setTimeout(() => toast('Welcome to Easy Billing Pro! 💼','info'), 1500);
});
window.addEventListener('resize', () => {
  const b = document.getElementById('tb-new-btn');
  if (b) b.style.display = window.innerWidth >= 900 ? 'flex' : 'none';
});

/* ── STORAGE ─────────────────────────────── */
function loadInvoices() {
  const saved = localStorage.getItem('ebp_invoices');
  if (saved) {
    invoices = JSON.parse(saved).map(enrichInvoice);
  } else {
    invoices = SEED_INVOICES.map(enrichInvoice);
    saveInvoices();
  }
}
function saveInvoices() {
  localStorage.setItem('ebp_invoices', JSON.stringify(invoices));
}

/* ── THEME ───────────────────────────────── */
let dark = false;
function initTheme() {
  dark = localStorage.getItem('ebp_dark') === '1';
  applyTheme();
}
function applyTheme() {
  document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
  document.getElementById('th-track').style.background = dark ? 'var(--acc)' : 'rgba(255,255,255,.15)';
  document.getElementById('th-thumb').style.transform  = dark ? 'translateX(18px)' : 'translateX(0)';
}
function toggleTheme() {
  dark = !dark;
  localStorage.setItem('ebp_dark', dark ? '1' : '0');
  applyTheme();
  setTimeout(() => { destroyCharts(); if (document.getElementById('page-analytics').classList.contains('act')) buildAnalytics(); if (document.getElementById('page-dashboard').classList.contains('act')) buildDashboard(); }, 80);
}

/* ── SIDEBAR / NAVIGATION ─────────────────── */
let sbOpen = true;
function toggleSB() {
  if (window.innerWidth <= 768) { openMob(); return; }
  sbOpen = !sbOpen;
  document.getElementById('sb').classList.toggle('col', !sbOpen);
  document.getElementById('main').classList.toggle('exp', !sbOpen);
}
function openMob() { document.getElementById('sb').classList.add('mop'); document.getElementById('mbg').style.display = 'block'; }
function closeMob() { document.getElementById('sb').classList.remove('mop'); document.getElementById('mbg').style.display = 'none'; }
function goPage(pg, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('act'));
  document.getElementById('page-' + pg).classList.add('act');
  document.querySelectorAll('.snl').forEach(l => l.classList.remove('act'));
  if (el) el.classList.add('act');
  if (pg === 'analytics') setTimeout(() => buildAnalytics(), 80);
  if (pg === 'ai') buildAI();
  if (pg === 'dashboard') buildDashboard();
  if (pg === 'whatsapp') populateWASelect();
  if (pg === 'email') populateEmailSelects();
  closeMob();
}
function setDashSub() {
  const el = document.getElementById('dash-sub'); if (!el) return;
  const d = new Date(), days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
  const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  el.textContent = `${days[d.getDay()]}, ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}`;
}
function onGSearch(v) {
  if (!v.trim()) return;
  goPage('invoices', document.querySelector('[data-pg="invoices"]'));
  document.getElementById('inv-q').value = v;
  filterInvs();
}
function setBadge() {
  const el = document.getElementById('sb-inv-cnt');
  if (el) el.textContent = invoices.length;
}

/* ── DASHBOARD ───────────────────────────── */
function buildDashboard() {
  buildDashStats();
  buildDashRecent();
  setTimeout(() => { buildRevChart(); buildStatusChart(); }, 100);
}
function buildDashStats() {
  const total = invoices.length;
  const paid  = invoices.filter(i => i.status === 'Paid');
  const pend  = invoices.filter(i => i.status === 'Pending');
  const ovd   = invoices.filter(i => i.status === 'Overdue');
  const revenue = paid.reduce((s, i) => s + i.total, 0);
  const pendAmt = pend.reduce((s, i) => s + i.total, 0);
  const defs = [
    { l:'Total Revenue',    v:'$'+formatNum(revenue), icon:'fa-dollar-sign', cls:'ca', bg:'var(--acclt)',  ic:'var(--acc)',  d:'+24%', dt:'up' },
    { l:'Total Invoices',   v:total,                   icon:'fa-file-invoice',cls:'cg', bg:'var(--grnlt)', ic:'var(--grn)',  d:'+'+Math.max(1,Math.round(total*.1)), dt:'up' },
    { l:'Paid Invoices',    v:paid.length,             icon:'fa-check-circle',cls:'cg', bg:'var(--grnlt)', ic:'var(--grn)',  d:Math.round(paid.length/Math.max(total,1)*100)+'%', dt:'nt' },
    { l:'Pending Amount',   v:'$'+formatNum(pendAmt),  icon:'fa-clock',       cls:'cam',bg:'var(--amblt)', ic:'var(--amb)', d:'Collect now', dt:'nt' },
    { l:'Overdue Invoices', v:ovd.length,              icon:'fa-exclamation-triangle',cls:'cr',bg:'var(--redlt)', ic:'var(--red)', d:'Urgent', dt:'dn' },
    { l:'Monthly Earnings', v:'$'+formatNum(revenue/12),icon:'fa-chart-line', cls:'cv', bg:'var(--vltlt)', ic:'var(--vlt)',  d:'Avg/month', dt:'nt' },
  ];
  const w = document.getElementById('dash-stats'); if (!w) return;
  w.style.gridTemplateColumns = 'repeat(auto-fill,minmax(160px,1fr))';
  w.innerHTML = defs.map(d => `<div class="card sc ${d.cls}"><div class="sico" style="background:${d.bg}"><i class="fas ${d.icon}" style="color:${d.ic}"></i></div><div class="sv">${d.v}</div><div class="slbl">${d.l}</div><div class="sdelta ${d.dt}">${d.d}</div></div>`).join('');
}
function formatNum(v) { return (Math.round((parseFloat(v)||0)*100)/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2}); }
function buildDashRecent() {
  const w = document.getElementById('dash-recent'); if (!w) return;
  const recent = [...invoices].sort((a,b) => b.createdAt - a.createdAt).slice(0, 6);
  if (!recent.length) { w.innerHTML = '<p style="padding:16px;font-size:13px;color:var(--txt3)">No invoices yet</p>'; return; }
  w.innerHTML = recent.map(i => `
    <div onclick="openPreviewById('${i.id}')" style="display:flex;align-items:center;gap:12px;padding:12px 20px;border-bottom:1px solid var(--bdr);cursor:pointer;transition:background .12s" onmouseenter="this.style.background='rgba(37,99,235,.03)'" onmouseleave="this.style.background=''">
      <div style="width:36px;height:36px;border-radius:9px;background:var(--acclt);display:flex;align-items:center;justify-content:center;color:var(--acc);font-size:14px;flex-shrink:0"><i class="fas fa-file-invoice"></i></div>
      <div style="flex:1;min-width:0">
        <div style="font-size:13.5px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${esc(i.cname)}</div>
        <div style="font-size:11.5px;color:var(--txt3)">${i.id} · ${fmtD(i.date)}</div>
      </div>
      <div style="text-align:right">
        <div class="mono" style="font-size:14px;font-weight:700;color:var(--acc)">${fmt(i.total, i.currency)}</div>
        <span class="badge b-${i.status.toLowerCase()}">${i.status}</span>
      </div>
    </div>`).join('');
}

/* ── CHARTS ──────────────────────────────── */
const MONTHS = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
const PAL = ['#2563eb','#059669','#dc2626','#d97706','#7c3aed','#e11d48'];
function isDark() { return document.documentElement.getAttribute('data-theme') === 'dark'; }
function cT() { return isDark() ? '#a0988e' : '#5a5247'; }
function cG() { return isDark() ? 'rgba(255,255,255,.05)' : 'rgba(0,0,0,.05)'; }
function destroyCharts() { [revCh,statusCh,anCh1,anCh2,anCh3].forEach(c => c && c.destroy()); revCh=statusCh=anCh1=anCh2=anCh3=null; }

function buildRevChart() {
  const el = document.getElementById('ch-rev'); if (!el) return;
  if (revCh) revCh.destroy();
  const data = [18200,22800,17400,31200,36400,28800,42100,46700,39200,51400,48600,57200];
  revCh = new Chart(el, {
    type:'line',
    data:{ labels:MONTHS, datasets:[{ label:'Revenue', data, borderColor:'#2563eb', backgroundColor:'rgba(37,99,235,.08)', fill:true, tension:.42, pointBackgroundColor:'#2563eb', pointRadius:4 }] },
    options:{ responsive:true, maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{ x:{grid:{color:cG()},ticks:{color:cT(),font:{size:11}}}, y:{grid:{color:cG()},ticks:{color:cT(),font:{size:11},callback:v=>'$'+v.toLocaleString()}} } }
  });
}
function buildStatusChart() {
  const el = document.getElementById('ch-status'); if (!el) return;
  if (statusCh) statusCh.destroy();
  const sm = { Paid:0, Pending:0, Overdue:0, Draft:0, Cancelled:0 };
  invoices.forEach(i => sm[i.status] = (sm[i.status]||0)+1);
  const labels = Object.keys(sm).filter(k => sm[k]>0);
  const data   = labels.map(l => sm[l]);
  const clrs   = { Paid:'#059669', Pending:'#d97706', Overdue:'#dc2626', Draft:'#6b7280', Cancelled:'#7c3aed' };
  statusCh = new Chart(el, {
    type:'doughnut',
    data:{ labels, datasets:[{ data, backgroundColor:labels.map(l=>clrs[l]), borderWidth:0, hoverOffset:8 }] },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'68%', plugins:{legend:{display:false}} }
  });
  const leg = document.getElementById('status-leg');
  if (leg) leg.innerHTML = labels.map((l,i) => `<div style="display:flex;align-items:center;justify-content:space-between"><div style="display:flex;align-items:center;gap:6px"><span style="width:9px;height:9px;border-radius:3px;background:${clrs[l]};display:inline-block"></span><span style="font-size:12px;color:var(--txt2)">${l}</span></div><span class="mono" style="font-size:12px;font-weight:700;color:var(--txt)">${data[i]}</span></div>`).join('');
}

/* ── INVOICE FILTER & TABLE ──────────────── */
function filterInvs() {
  const q     = (document.getElementById('inv-q')?.value||'').toLowerCase();
  const st    = document.getElementById('f-inv-status')?.value||'';
  const meth  = document.getElementById('f-inv-method')?.value||'';
  const from  = document.getElementById('f-inv-from')?.value||'';
  const to    = document.getElementById('f-inv-to')?.value||'';
  const sort  = document.getElementById('f-inv-sort')?.value||'';

  filteredInvs = invoices.filter(i => {
    const mq   = !q  || i.id.toLowerCase().includes(q) || i.cname.toLowerCase().includes(q) || i.email.toLowerCase().includes(q);
    const ms   = !st   || i.status === st;
    const mm   = !meth || i.method === meth;
    const mdf  = !from || i.date >= from;
    const mdt  = !to   || i.date <= to;
    return mq && ms && mm && mdf && mdt;
  });

  if (sort) {
    const [k,d] = sort.split('-');
    const dir = d==='desc'?-1:1;
    if (k==='date')  filteredInvs.sort((a,b)=>a.date.localeCompare(b.date)*dir);
    if (k==='due')   filteredInvs.sort((a,b)=>a.due.localeCompare(b.due)*dir);
    if (k==='amt')   filteredInvs.sort((a,b)=>(a.total-b.total)*dir);
    if (k==='name')  filteredInvs.sort((a,b)=>a.cname.localeCompare(b.cname)*dir);
  } else {
    filteredInvs.sort((a,b) => { let av=a[invSortKey],bv=b[invSortKey]; if(typeof av==='string'){av=av.toLowerCase();bv=bv.toLowerCase();} return av<bv?-invSortDir:av>bv?invSortDir:0; });
  }

  invPage = 1;
  renderInvTable();
  renderInvPg();
  buildInvStats();
  const ri = document.getElementById('inv-ri');
  if (ri) ri.textContent = `${filteredInvs.length} invoice${filteredInvs.length!==1?'s':''}`;
}
function resetFilter() {
  ['inv-q','f-inv-status','f-inv-method','f-inv-from','f-inv-to','f-inv-sort'].forEach(id => { const e=document.getElementById(id); if(e) e.value=''; });
  invSortKey='createdAt'; invSortDir=-1;
  filterInvs();
}
function sortCol(k) {
  if (invSortKey===k) invSortDir*=-1; else { invSortKey=k; invSortDir=1; }
  filterInvs();
}
function chInvPP() { invPP=parseInt(document.getElementById('inv-pp').value); invPage=1; renderInvTable(); renderInvPg(); }

function renderInvTable() {
  const tbody = document.getElementById('inv-tbody'), empty = document.getElementById('inv-empty');
  if (!tbody) return;
  if (!filteredInvs.length) { tbody.innerHTML=''; if(empty) empty.style.display='flex'; return; }
  if (empty) empty.style.display='none';
  const start = (invPage-1)*invPP, slice = filteredInvs.slice(start, start+invPP);
  tbody.innerHTML = slice.map(i => `
    <tr>
      <td><span class="mono" style="color:var(--acc);font-weight:600;font-size:12.5px">${i.id}</span></td>
      <td><div style="font-weight:600;font-size:13.5px">${esc(i.cname)}</div><div style="font-size:11.5px;color:var(--txt3)">${esc(i.company||'')}</div></td>
      <td><div style="font-size:12.5px">${esc(i.phone)}</div><div style="font-size:11.5px;color:var(--txt3)">${esc(i.email)}</div></td>
      <td style="font-size:12.5px">${fmtD(i.date)}</td>
      <td style="font-size:12.5px;${i.status==='Overdue'?'color:var(--red);font-weight:700':''}">${fmtD(i.due)}</td>
      <td><span class="mono" style="font-weight:700;color:var(--acc)">${fmt(i.total,i.currency)}</span></td>
      <td style="font-size:12px;color:var(--txt2)">${esc(i.method)}</td>
      <td><span class="badge b-${i.status.toLowerCase()}">${i.status}</span></td>
      <td>
        <div style="display:flex;align-items:center;justify-content:center;gap:2px">
          <button class="ab ab-v" onclick="openPreviewById('${i.id}')" title="View"><i class="fas fa-eye"></i></button>
          <button class="ab ab-e" onclick="openEditInv('${i.id}')" title="Edit"><i class="fas fa-pencil"></i></button>
          <button class="ab ab-p" onclick="openPreviewById('${i.id}',true)" title="Print"><i class="fas fa-print"></i></button>
          <button class="ab ab-dl" onclick="downloadInv('${i.id}')" title="Download"><i class="fas fa-download"></i></button>
          <button class="ab ab-w" onclick="sendInvWA('${i.id}')" title="WhatsApp"><i class="fab fa-whatsapp"></i></button>
          <button class="ab ab-m" onclick="sendInvEmail('${i.id}')" title="Email"><i class="fas fa-envelope"></i></button>
          <button class="ab ab-d" onclick="openDelModal('${i.id}')" title="Delete"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>`).join('');
}
function renderInvPg() {
  const total = Math.max(1, Math.ceil(filteredInvs.length/invPP));
  const info  = document.getElementById('inv-pg-info'), ctrl = document.getElementById('inv-pg-ctrl');
  if (info) info.textContent = `Page ${invPage} of ${total}`;
  if (!ctrl) return;
  let h = `<button class="pgb" onclick="goInvPg(${invPage-1})" ${invPage===1?'disabled':''}>‹</button>`;
  for (let i=1;i<=total;i++) { if(total>7&&Math.abs(i-invPage)>2&&i!==1&&i!==total){if(i===invPage-3||i===invPage+3)h+=`<span class="pgb" style="cursor:default">…</span>`;continue;}h+=`<button class="pgb ${i===invPage?'on':''}" onclick="goInvPg(${i})">${i}</button>`; }
  h += `<button class="pgb" onclick="goInvPg(${invPage+1})" ${invPage===total?'disabled':''}>›</button>`;
  ctrl.innerHTML = h;
}
function goInvPg(p) { const t=Math.ceil(filteredInvs.length/invPP); if(p<1||p>t) return; invPage=p; renderInvTable(); renderInvPg(); }
function buildInvStats() {
  const paid  = invoices.filter(i=>i.status==='Paid').reduce((s,i)=>s+i.total,0);
  const pend  = invoices.filter(i=>i.status==='Pending').reduce((s,i)=>s+i.total,0);
  const ovd   = invoices.filter(i=>i.status==='Overdue').reduce((s,i)=>s+i.total,0);
  const tot   = invoices.reduce((s,i)=>s+i.total,0);
  const w = document.getElementById('inv-stats'); if (!w) return;
  w.innerHTML = [
    {l:'Total Value',    v:'$'+formatNum(tot), icon:'fa-dollar-sign',bg:'var(--acclt)',ic:'var(--acc)',d:'All invoices',dt:'nt'},
    {l:'Paid Revenue',   v:'$'+formatNum(paid),icon:'fa-check-circle',bg:'var(--grnlt)',ic:'var(--grn)',d:'+5%',dt:'up'},
    {l:'Pending Amount', v:'$'+formatNum(pend),icon:'fa-clock',bg:'var(--amblt)',ic:'var(--amb)',d:'Collect',dt:'nt'},
    {l:'Overdue Amount', v:'$'+formatNum(ovd), icon:'fa-exclamation-triangle',bg:'var(--redlt)',ic:'var(--red)',d:'Act now',dt:'dn'},
  ].map(d=>`<div class="card sc"><div class="sico" style="background:${d.bg}"><i class="fas ${d.icon}" style="color:${d.ic}"></i></div><div class="sv">${d.v}</div><div class="slbl">${d.l}</div><div class="sdelta ${d.dt}">${d.d}</div></div>`).join('');
}

/* ── CREATE / EDIT INVOICE ────────────────── */
function openCreateInv() {
  editInvId = null;
  document.getElementById('inv-modal-title').textContent = 'Create Invoice';
  document.getElementById('inv-save-lbl').textContent = 'Create Invoice';
  document.getElementById('inv-modal-ico').innerHTML = '<i class="fas fa-file-invoice"></i>';
  clearInvForm();
  document.getElementById('f-invno').value = randId('INV');
  document.getElementById('f-date').value  = today();
  document.getElementById('f-due').value   = addDays(today(), 30);
  document.getElementById('item-rows').innerHTML = '';
  itemCount = 0;
  addItemRow();
  calcTotals();
  document.getElementById('inv-ov').classList.add('open');
}
function openEditInv(id) {
  editInvId = id;
  const inv = invoices.find(x=>x.id===id); if (!inv) return;
  document.getElementById('inv-modal-title').textContent = 'Edit Invoice';
  document.getElementById('inv-save-lbl').textContent = 'Save Changes';
  document.getElementById('f-invno').value   = inv.id;
  document.getElementById('f-cname').value   = inv.cname;
  document.getElementById('f-phone').value   = inv.phone;
  document.getElementById('f-wa').value      = inv.wa||'';
  document.getElementById('f-email').value   = inv.email;
  document.getElementById('f-addr').value    = inv.addr||'';
  document.getElementById('f-company').value = inv.company||'';
  document.getElementById('f-date').value    = inv.date;
  document.getElementById('f-due').value     = inv.due;
  document.getElementById('f-status').value  = inv.status;
  document.getElementById('f-method').value  = inv.method;
  document.getElementById('f-cur').value     = inv.currency||'USD';
  document.getElementById('f-notes').value   = inv.notes||'';
  document.getElementById('item-rows').innerHTML = '';
  itemCount = 0;
  inv.items.forEach(it => addItemRow(it));
  calcTotals();
  clearFormErrs();
  document.getElementById('inv-ov').classList.add('open');
}
function closeInvModal() { document.getElementById('inv-ov').classList.remove('open'); }
function clearInvForm() {
  ['f-cname','f-phone','f-wa','f-email','f-addr','f-company','f-notes'].forEach(id=>{const e=document.getElementById(id);if(e)e.value='';});
  document.getElementById('f-status').value='Pending';
  document.getElementById('f-method').value='Bank Transfer';
  document.getElementById('f-cur').value='USD';
  clearFormErrs();
}
function clearFormErrs() { ['e-cname','e-phone','e-email','e-items'].forEach(id=>document.getElementById(id)?.classList.remove('show')); ['f-cname','f-phone','f-email'].forEach(id=>document.getElementById(id)?.classList.remove('err')); }
function showFE(fi,ei,msg) { const f=document.getElementById(fi),e=document.getElementById(ei); if(f)f.classList.add('err'); if(e){e.textContent=msg;e.classList.add('show');} }

/* ── INVOICE ITEMS ────────────────────────── */
function addItemRow(it=null) {
  const idx = itemCount++;
  const row = document.createElement('div');
  row.className = 'irow'; row.id = 'ir-'+idx;
  row.innerHTML = `
    <div><input type="text" class="fi" id="id-${idx}" placeholder="Description" value="${esc(it?.desc||'')}" oninput="calcTotals()" style="font-size:13px;padding:8px 10px"/></div>
    <div><input type="number" class="fi" id="iq-${idx}" min="1" value="${it?.qty||1}" oninput="calcTotals()" style="font-size:13px;padding:8px 10px"/></div>
    <div><input type="number" class="fi" id="ip-${idx}" min="0" step="0.01" value="${it?.price||0}" oninput="calcTotals()" style="font-size:13px;padding:8px 10px"/></div>
    <div><input type="number" class="fi" id="it-${idx}" min="0" max="100" value="${it?.tax||0}" oninput="calcTotals()" style="font-size:13px;padding:8px 10px"/></div>
    <div><input type="number" class="fi" id="idc-${idx}" min="0" max="100" value="${it?.disc||0}" oninput="calcTotals()" style="font-size:13px;padding:8px 10px"/></div>
    <div><input type="text" class="fi" id="il-${idx}" readonly style="font-size:13px;padding:8px 10px;cursor:default;opacity:.7;font-family:'Fira Code',monospace" value="$0.00"/></div>
    <button type="button" class="irm" onclick="removeItemRow(${idx})"><i class="fas fa-times" style="font-size:12px"></i></button>
  `;
  document.getElementById('item-rows').appendChild(row);
  calcTotals();
}
function removeItemRow(idx) { const r=document.getElementById('ir-'+idx); if(r){r.remove();calcTotals();} }
function getItemRows() {
  const rows = [];
  document.querySelectorAll('[id^="ir-"]').forEach(row => {
    const idx  = row.id.replace('ir-','');
    const desc = document.getElementById('id-'+idx)?.value||'';
    const qty  = parseFloat(document.getElementById('iq-'+idx)?.value)||1;
    const price= parseFloat(document.getElementById('ip-'+idx)?.value)||0;
    const tax  = parseFloat(document.getElementById('it-'+idx)?.value)||0;
    const disc = parseFloat(document.getElementById('idc-'+idx)?.value)||0;
    const lineTotal = qty*price*(1+tax/100)*(1-disc/100);
    const el = document.getElementById('il-'+idx);
    if (el) el.value = '$'+formatNum(lineTotal);
    if (desc) rows.push({desc,qty,price,tax,disc});
  });
  return rows;
}
function calcTotals() {
  const items = getItemRows();
  const sub  = items.reduce((s,x)=>s+x.qty*x.price,0);
  const taxA = items.reduce((s,x)=>s+x.qty*x.price*(x.tax/100),0);
  const discA= items.reduce((s,x)=>s+x.qty*x.price*(x.disc/100),0);
  const total= Math.max(0,sub+taxA-discA);
  ['s-sub','s-tax','s-disc','s-total'].forEach((id,i)=>{const e=document.getElementById(id);if(e)e.textContent=['$'+formatNum(sub),'$'+formatNum(taxA),'-$'+formatNum(discA),'$'+formatNum(total)][i];});
}

/* ── SUBMIT INVOICE ───────────────────────── */
function submitInvoice(ev) {
  ev.preventDefault();
  clearFormErrs();
  const cname = document.getElementById('f-cname').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const email = document.getElementById('f-email').value.trim();
  const items = getItemRows();
  let ok = true;
  if (!cname) { showFE('f-cname','e-cname','Required'); ok=false; }
  if (!phone) { showFE('f-phone','e-phone','Required'); ok=false; }
  if (!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showFE('f-email','e-email','Valid email required'); ok=false; }
  if (!items.length) { document.getElementById('e-items').classList.add('show'); ok=false; }
  if (!ok) return;

  showLoader(true);
  setTimeout(() => {
    const invData = {
      cname, phone,
      wa:      document.getElementById('f-wa').value.trim(),
      email,
      addr:    document.getElementById('f-addr').value.trim(),
      company: document.getElementById('f-company').value.trim(),
      date:    document.getElementById('f-date').value,
      due:     document.getElementById('f-due').value,
      status:  document.getElementById('f-status').value,
      method:  document.getElementById('f-method').value,
      currency:document.getElementById('f-cur').value,
      notes:   document.getElementById('f-notes').value.trim(),
      items,
    };
    const enriched = enrichInvoice({ ...invData, id: editInvId||randId('INV'), createdAt: Date.now() });

    if (editInvId) {
      const idx = invoices.findIndex(x=>x.id===editInvId);
      if (idx !== -1) invoices[idx] = {...invoices[idx],...enriched};
      toast('Invoice updated!','success');
    } else {
      invoices.unshift(enriched);
      toast('Invoice created!','success');
    }

    saveInvoices();
    closeInvModal();
    filterInvs();
    buildDashboard();
    populateInvSelects();
    setBadge();
    showLoader(false);
  }, 450);
}

/* ── DELETE ───────────────────────────────── */
function openDelModal(id) {
  const inv = invoices.find(x=>x.id===id); if (!inv) return;
  document.getElementById('del-inv-id').textContent = inv.id + ' (' + inv.cname + ')';
  document.getElementById('del-confirm-btn').onclick = () => {
    showLoader(true);
    setTimeout(()=>{
      invoices = invoices.filter(x=>x.id!==id);
      filteredInvs = filteredInvs.filter(x=>x.id!==id);
      saveInvoices();
      closeOv('del-ov');
      renderInvTable(); renderInvPg(); buildInvStats(); buildDashboard();
      populateInvSelects(); setBadge();
      toast('Invoice deleted.','error');
      showLoader(false);
    },400);
  };
  document.getElementById('del-ov').classList.add('open');
}

/* ── INVOICE PREVIEW ─────────────────────── */
function previewFromModal() {
  const items = getItemRows(); if (!items.length) { toast('Add at least one item!','warn'); return; }
  const cname  = document.getElementById('f-cname').value||'Customer';
  const tmpInv = enrichInvoice({
    id:       document.getElementById('f-invno').value,
    cname, phone:document.getElementById('f-phone').value, email:document.getElementById('f-email').value,
    addr:     document.getElementById('f-addr').value, company:document.getElementById('f-company').value,
    date:     document.getElementById('f-date').value, due:document.getElementById('f-due').value,
    status:   document.getElementById('f-status').value, method:document.getElementById('f-method').value,
    currency: document.getElementById('f-cur').value, notes:document.getElementById('f-notes').value,
    items, createdAt:Date.now(),
  });
  renderPreview(tmpInv, null);
  closeInvModal();
  document.getElementById('prev-ov').classList.add('open');
}
function openPreviewById(id, autoPrint=false) {
  previewInvId = id;
  const inv = invoices.find(x=>x.id===id); if (!inv) return;
  renderPreview(inv, id);
  document.getElementById('prev-ov').classList.add('open');
  if (autoPrint) setTimeout(()=>printInvoice(),300);
}
function renderPreview(inv, id) {
  const c = computeInvoice(inv);
  const statusColors = { Paid:'#059669', Pending:'#d97706', Overdue:'#dc2626', Draft:'#6b7280', Cancelled:'#7c3aed' };
  const sc = statusColors[inv.status]||'#6b7280';
  const body = document.getElementById('prev-body');
  body.innerHTML = `
    <div class="inv-doc" id="invoice-print-area">
      <!-- Header -->
      <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:14px;margin-bottom:26px">
        <div>
          <div class="inv-logo">Easy Billing Pro</div>
          <div style="font-size:12px;color:var(--txt3);margin-top:2px">Professional Billing & Invoicing</div>
          ${inv.company?`<div style="font-size:13px;font-weight:600;color:var(--txt);margin-top:4px">${esc(inv.company)}</div>`:''}
        </div>
        <div style="text-align:right">
          <div style="font-family:'Sora',sans-serif;font-size:24px;font-weight:800;color:var(--txt);letter-spacing:-.3px">INVOICE</div>
          <div class="mono" style="font-size:15px;color:var(--acc);font-weight:600">${esc(inv.id)}</div>
          <span class="badge b-${inv.status.toLowerCase()}" style="margin-top:6px">${inv.status}</span>
        </div>
      </div>

      <!-- Client & Invoice Details -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:22px">
        <div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:10px;padding:14px">
          <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:var(--txt3);margin-bottom:8px">Bill To</div>
          <div style="font-size:15px;font-weight:700;color:var(--txt);margin-bottom:2px">${esc(inv.cname)}</div>
          ${inv.company?`<div style="font-size:12.5px;color:var(--txt2)">${esc(inv.company)}</div>`:''}
          <div style="font-size:12.5px;color:var(--txt2)">${esc(inv.email)}</div>
          <div style="font-size:12.5px;color:var(--txt2)">${esc(inv.phone)}</div>
          ${inv.addr?`<div style="font-size:12px;color:var(--txt3);margin-top:3px">📍 ${esc(inv.addr)}</div>`:''}
        </div>
        <div>
          <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:5px"><span style="color:var(--txt3)">Invoice Date:</span><span style="font-weight:600">${fmtD(inv.date)}</span></div>
          <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:5px"><span style="color:var(--txt3)">Due Date:</span><span style="font-weight:600;${inv.status==='Overdue'?'color:var(--red)':''}">${fmtD(inv.due)}</span></div>
          <div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:5px"><span style="color:var(--txt3)">Payment Method:</span><span style="font-weight:600">${esc(inv.method)}</span></div>
          <div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:var(--txt3)">Currency:</span><span style="font-weight:600">${esc(inv.currency||'USD')}</span></div>
        </div>
      </div>

      <!-- Items Table -->
      <table class="inv-tbl">
        <thead><tr>
          <th>Description</th><th style="text-align:center">Qty</th>
          <th style="text-align:right">Price</th><th style="text-align:right">Tax%</th>
          <th style="text-align:right">Disc%</th><th style="text-align:right">Total</th>
        </tr></thead>
        <tbody>
          ${inv.items.map(it=>{
            const lt=it.qty*it.price*(1+it.tax/100)*(1-it.disc/100);
            return `<tr>
              <td>${esc(it.desc)}</td>
              <td style="text-align:center">${it.qty}</td>
              <td style="text-align:right" class="mono">${fmt(it.price,inv.currency)}</td>
              <td style="text-align:right;color:var(--txt3)">${it.tax}%</td>
              <td style="text-align:right;color:var(--grn)">${it.disc}%</td>
              <td style="text-align:right;font-weight:700" class="mono">${fmt(lt,inv.currency)}</td>
            </tr>`;
          }).join('')}
        </tbody>
      </table>

      <!-- Totals -->
      <div style="display:flex;justify-content:flex-end;margin-top:14px">
        <div style="min-width:240px">
          <div style="display:flex;justify-content:space-between;font-size:13px;color:var(--txt2);padding:4px 0">Subtotal:<span class="mono">${fmt(c.sub,inv.currency)}</span></div>
          <div style="display:flex;justify-content:space-between;font-size:13px;color:var(--txt2);padding:4px 0">Tax:<span class="mono">${fmt(c.taxA,inv.currency)}</span></div>
          ${c.discA>0?`<div style="display:flex;justify-content:space-between;font-size:13px;color:var(--grn);padding:4px 0">Discount:<span class="mono">-${fmt(c.discA,inv.currency)}</span></div>`:''}
          <div style="display:flex;justify-content:space-between;font-size:20px;font-weight:800;color:var(--acc);border-top:2px solid var(--bdr);padding:8px 0 4px;margin-top:6px">TOTAL:<span class="mono">${fmt(c.total,inv.currency)}</span></div>
        </div>
      </div>

      <!-- Notes & Signature -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:20px">
        ${inv.notes?`<div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:9px;padding:12px"><div style="font-size:10.5px;font-weight:700;text-transform:uppercase;color:var(--txt3);letter-spacing:.07em;margin-bottom:6px">Notes</div><div style="font-size:13px;color:var(--txt2);line-height:1.6">${esc(inv.notes)}</div></div>`:'<div></div>'}
        <div style="text-align:right;padding-top:8px">
          <div style="font-size:12px;color:var(--txt3);margin-bottom:32px">Authorized Signature</div>
          <div style="border-top:1.5px solid var(--bdr2);padding-top:8px;font-size:13px;font-weight:600;color:var(--txt2)">Easy Billing Pro</div>
        </div>
      </div>

      <div style="margin-top:20px;padding-top:14px;border-top:1px solid var(--bdr);font-size:12px;color:var(--txt3);text-align:center">
        Thank you for your business! · Generated by Easy Billing Pro · ${new Date().toLocaleDateString()}
      </div>
    </div>
  `;

  // Wire up action buttons
  const waBtn = document.getElementById('prev-wa-btn');
  const emBtn = document.getElementById('prev-email-btn');
  if (waBtn) waBtn.onclick = () => { if(id) sendInvWA(id); else toast('Save invoice first!','warn'); };
  if (emBtn) emBtn.onclick = () => { if(id) sendInvEmail(id); else toast('Save invoice first!','warn'); };
}
function printInvoice() { window.print(); }
function downloadInv(id) {
  openPreviewById(id, false);
  setTimeout(() => { window.print(); toast('Saving as PDF via print dialog…','info'); }, 500);
}

/* ── WHATSAPP ─────────────────────────────── */
const WA_TEMPLATES = {
  invoice:  (n,id,amt,due)=>`Dear ${n},\n\nYour invoice ${id} for ${amt} has been generated.\nDue Date: ${due}\n\nKindly process the payment at your earliest convenience.\n\nThank you!\nEasy Billing Pro`,
  reminder: (n,id,amt,due)=>`Dear ${n},\n\nFriendly reminder: Invoice ${id} for ${amt} is due on ${due}.\n\nPlease arrange payment to avoid late fees.\n\nBest regards,\nEasy Billing Pro`,
  overdue:  (n,id,amt)=>`Dear ${n},\n\nUrgent: Invoice ${id} for ${amt} is now OVERDUE.\n\nPlease settle this immediately to avoid service interruption.\n\nContact us if you need assistance.\n\nEasy Billing Pro`,
  thanks:   (n,id,amt)=>`Dear ${n},\n\nThank you for your payment of ${amt} for invoice ${id}. ✅\n\nWe truly appreciate your business!\n\nLooking forward to working with you again.\n\nEasy Billing Pro 🙏`,
};
function buildWATemplates() {
  const cards = [
    {icon:'fa-file-invoice',title:'Invoice Sent',desc:'Notify client of new invoice',key:'invoice',c:'#075e54'},
    {icon:'fa-bell',title:'Payment Reminder',desc:'Remind about pending payment',key:'reminder',c:'#128c7e'},
    {icon:'fa-exclamation-circle',title:'Overdue Notice',desc:'Alert for overdue payment',key:'overdue',c:'#dc2626'},
    {icon:'fa-heart',title:'Thank You',desc:'Appreciate after payment received',key:'thanks',c:'#075e54'},
  ];
  const w = document.getElementById('wa-tmpl-cards'); if (!w) return;
  w.innerHTML = cards.map(c=>`<div class="wa-card" onclick="setWATmpl('${c.key}')"><i class="fas ${c.icon}" style="font-size:20px;display:block;margin-bottom:8px;opacity:.9"></i><div style="font-size:13.5px;font-weight:700;margin-bottom:3px">${c.title}</div><div style="font-size:12px;opacity:.75">${c.desc}</div></div>`).join('');
}
function setWATmpl(key) {
  goPage('whatsapp', document.querySelector('[data-pg="whatsapp"]'));
  document.getElementById('wa-tmpl-sel').value = key;
  loadWAMsg();
}
function populateWASelect() {
  const sel = document.getElementById('wa-inv-sel'); if (!sel) return;
  sel.innerHTML = '<option value="">Select invoice…</option>' + invoices.map(i=>`<option value="${i.id}">${i.id} — ${esc(i.cname)} (${fmt(i.total,i.currency)})</option>`).join('');
}
function loadWAMsg() {
  const invId = document.getElementById('wa-inv-sel').value;
  const key   = document.getElementById('wa-tmpl-sel').value;
  if (!invId || !key) return;
  const inv = invoices.find(x=>x.id===invId); if (!inv) return;
  const msg = WA_TEMPLATES[key]?.(inv.cname, inv.id, fmt(inv.total,inv.currency), fmtD(inv.due)) || '';
  document.getElementById('wa-msg-area').value = msg;
}
function sendWAFromCenter() {
  const invId = document.getElementById('wa-inv-sel').value;
  const msg   = document.getElementById('wa-msg-area').value;
  if (!invId) { toast('Select an invoice!','warn'); return; }
  if (!msg.trim()) { toast('Write or select a message!','warn'); return; }
  const inv = invoices.find(x=>x.id===invId); if (!inv) return;
  const num = (inv.wa||inv.phone).replace(/\D/g,'');
  window.open(`https://wa.me/${num}?text=${encodeURIComponent(msg)}`,'_blank');
  toast('Opening WhatsApp…','success');
}
function sendInvWA(id) {
  const inv = invoices.find(x=>x.id===id); if (!inv) return;
  const num = (inv.wa||inv.phone).replace(/\D/g,'');
  const msg = WA_TEMPLATES.invoice(inv.cname, inv.id, fmt(inv.total,inv.currency), fmtD(inv.due));
  window.open(`https://wa.me/${num}?text=${encodeURIComponent(msg)}`,'_blank');
  toast(`Sending invoice to ${inv.cname} via WhatsApp…`,'success');
}

/* ── EMAIL ────────────────────────────────── */
const EMAIL_TEMPLATES = {
  invoice:  (n,id,amt,due)=>({sub:`Invoice ${id} — ${amt} Due`,body:`Dear ${n},\n\nPlease find your invoice ${id} for ${amt} attached.\n\nDue Date: ${due}\nPayment Method: Bank Transfer / Online\n\nPlease process payment by the due date.\n\nThank you for your business!\n\nBest regards,\nEasy Billing Pro`}),
  reminder: (n,id,amt,due)=>({sub:`Payment Reminder — Invoice ${id}`,body:`Dear ${n},\n\nThis is a friendly reminder that invoice ${id} for ${amt} is due on ${due}.\n\nPlease arrange payment to avoid late fees.\n\nIf you have already paid, please disregard this message.\n\nBest regards,\nEasy Billing Pro`}),
  overdue:  (n,id,amt)=>({sub:`URGENT: Overdue Invoice ${id}`,body:`Dear ${n},\n\nThis is an urgent notice that invoice ${id} for ${amt} is now past due.\n\nPlease settle the outstanding balance immediately.\n\nContact us at billing@easybilling.pro if you need assistance.\n\nEasy Billing Pro`}),
  thanks:   (n,id,amt)=>({sub:`Payment Received — Thank You!`,body:`Dear ${n},\n\nThank you for your payment of ${amt} for invoice ${id}. ✅\n\nYour account is now up to date.\n\nWe truly appreciate your business!\n\nWarm regards,\nEasy Billing Pro`}),
  promo:    (n)=>({sub:`Special Offer Just for You! 🎉`,body:`Dear ${n},\n\nAs a valued client, we have an exclusive offer!\n\nGet 15% off your next invoice — use code: EASY15\nOffer valid for 30 days.\n\nDon't miss out!\n\nEasy Billing Pro`}),
};
function buildEmailModalTmpls() {
  const tmpls = [{key:'invoice',title:'Invoice Sent'},{key:'reminder',title:'Payment Reminder'},{key:'overdue',title:'Overdue Notice'},{key:'thanks',title:'Thank You'},{key:'promo',title:'Promotion'}];
  const w = document.getElementById('email-tmpl-boxes'); if (!w) return;
  w.innerHTML = tmpls.map(t=>`<div class="em-card" onclick="applyEmailTmpl('${t.key}')"><div style="font-size:13px;font-weight:700;margin-bottom:2px">${t.title}</div></div>`).join('');
}
function buildEmailPageTmpls() {
  const tmpls = [{key:'invoice',title:'Invoice Sent',icon:'fa-file-invoice',desc:'Send new invoice notification'},{key:'reminder',title:'Payment Reminder',icon:'fa-clock',desc:'Remind about pending payment'},{key:'overdue',title:'Overdue Notice',icon:'fa-exclamation-triangle',desc:'Alert for overdue invoice'},{key:'thanks',title:'Thank You',icon:'fa-heart',desc:'Appreciate payment received'},{key:'promo',title:'Promotion',icon:'fa-tag',desc:'Send special offers'}];
  const w = document.getElementById('email-page-tmpls'); if (!w) return;
  w.innerHTML = tmpls.map(t=>`<div class="em-card" onclick="loadEmailTmplByKey('${t.key}')"><div style="display:flex;align-items:center;gap:8px;margin-bottom:3px"><i class="fas ${t.icon}" style="color:var(--acc)"></i><div style="font-size:13px;font-weight:700">${t.title}</div></div><div style="font-size:12px;color:var(--txt3)">${t.desc}</div></div>`).join('');
}
function populateInvSelects() {
  ['wa-inv-sel','ep-inv'].forEach(id=>{
    const sel=document.getElementById(id); if(!sel) return;
    sel.innerHTML='<option value="">Select invoice…</option>'+invoices.map(i=>`<option value="${i.id}">${i.id} — ${esc(i.cname)}</option>`).join('');
  });
}
function populateEmailSelects() { populateInvSelects(); }
function fillEmailTo() {
  const invId = document.getElementById('ep-inv')?.value; if (!invId) return;
  const inv   = invoices.find(x=>x.id===invId); if (!inv) return;
  document.getElementById('ep-to').value  = inv.email;
  document.getElementById('ep-sub').value = `Invoice ${inv.id} — ${fmt(inv.total,inv.currency)}`;
}
function loadEmailTmpl() { loadEmailTmplByKey(document.getElementById('ep-tmpl')?.value,'ep'); }
function loadEmailTmplByKey(key, prefix='ep') {
  const invId = document.getElementById(prefix+'-inv')?.value; if (!invId) return;
  const inv   = invoices.find(x=>x.id===invId); if (!inv) return;
  const tmpl  = EMAIL_TEMPLATES[key]?.(inv.cname, inv.id, fmt(inv.total,inv.currency), fmtD(inv.due));
  if (!tmpl) return;
  const subEl = document.getElementById(prefix+'-sub'), msgEl = document.getElementById(prefix+'-msg');
  if (subEl) subEl.value = tmpl.sub;
  if (msgEl) msgEl.value = tmpl.body;
  if (prefix==='ep') document.getElementById('ep-tmpl').value = key;
}
function applyEmailTmpl(key) { loadEmailTmplByKey(key,'em'); }
function sendEmail() {
  const to = document.getElementById('em-to')?.value; if (!to) { toast('Enter recipient!','warn'); return; }
  showLoader(true);
  setTimeout(()=>{ showLoader(false); closeOv('email-ov'); toast(`Email sent to ${to}!`,'success'); },700);
}
function sendEmailPage() {
  const invId = document.getElementById('ep-inv')?.value; if (!invId) { toast('Select an invoice!','warn'); return; }
  const inv   = invoices.find(x=>x.id===invId); if (!inv) return;
  showLoader(true);
  setTimeout(()=>{ showLoader(false); toast(`Email sent to ${inv.email}!`,'success'); },700);
}
function sendInvEmail(id) {
  const inv = invoices.find(x=>x.id===id); if (!inv) return;
  document.getElementById('em-to').value  = inv.email;
  document.getElementById('em-sub').value = `Invoice ${inv.id} — ${fmt(inv.total,inv.currency)}`;
  document.getElementById('em-msg').value = EMAIL_TEMPLATES.invoice(inv.cname, inv.id, fmt(inv.total,inv.currency), fmtD(inv.due)).body;
  document.getElementById('email-ov').classList.add('open');
}

/* ── ANALYTICS ────────────────────────────── */
function buildAnalytics() {
  buildAnStats();
  buildAnCharts();
  buildTopInvoices();
}
function buildAnStats() {
  const total = invoices.length;
  const paid  = invoices.filter(i=>i.status==='Paid');
  const revenue = paid.reduce((s,i)=>s+i.total,0);
  const pend    = invoices.filter(i=>i.status==='Pending');
  const ovd     = invoices.filter(i=>i.status==='Overdue');
  const avgInv  = total ? invoices.reduce((s,i)=>s+i.total,0)/total : 0;
  const w = document.getElementById('an-stats'); if (!w) return;
  w.innerHTML = [
    {l:'Total Revenue',  v:'$'+formatNum(revenue), icon:'fa-dollar-sign',bg:'var(--acclt)',ic:'var(--acc)',d:'+24%',dt:'up'},
    {l:'Avg Invoice',    v:'$'+formatNum(avgInv),   icon:'fa-chart-bar',  bg:'var(--grnlt)',ic:'var(--grn)',d:'+5%',dt:'up'},
    {l:'Paid Count',     v:paid.length,             icon:'fa-check-circle',bg:'var(--grnlt)',ic:'var(--grn)',d:Math.round(paid.length/Math.max(total,1)*100)+'%',dt:'nt'},
    {l:'Overdue Count',  v:ovd.length,              icon:'fa-exclamation-triangle',bg:'var(--redlt)',ic:'var(--red)',d:'Act now',dt:'dn'},
  ].map(d=>`<div class="card sc"><div class="sico" style="background:${d.bg}"><i class="fas ${d.icon}" style="color:${d.ic}"></i></div><div class="sv">${d.v}</div><div class="slbl">${d.l}</div><div class="sdelta ${d.dt}">${d.d}</div></div>`).join('');
}
function buildAnCharts() {
  const cT2=()=>isDark()?'#a0988e':'#5a5247', cG2=()=>isDark()?'rgba(255,255,255,.05)':'rgba(0,0,0,.05)';
  const el1=document.getElementById('an-ch1'), el2=document.getElementById('an-ch2'), el3=document.getElementById('an-ch3');
  if(el1){if(anCh1)anCh1.destroy();anCh1=new Chart(el1,{type:'bar',data:{labels:MONTHS,datasets:[{label:'Revenue ($)',data:[18200,22800,17400,31200,36400,28800,42100,46700,39200,51400,48600,57200],backgroundColor:'rgba(37,99,235,.7)',borderRadius:6},{label:'Total Invoices',data:[8,11,7,14,16,12,19,22,17,24,21,28].map(x=>x*1800),backgroundColor:'rgba(5,150,105,.7)',borderRadius:6}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{labels:{color:cT2(),font:{size:11}}}},scales:{x:{grid:{color:cG2()},ticks:{color:cT2(),font:{size:11}}},y:{grid:{color:cG2()},ticks:{color:cT2(),font:{size:11},callback:v=>'$'+v.toLocaleString()}}}}})}
  if(el2){if(anCh2)anCh2.destroy();const now=new Date(),m=Array(12).fill(0);invoices.filter(i=>i.status==='Paid').forEach(i=>{const d=new Date(i.date+'T00:00:00');if(d.getFullYear()===now.getFullYear())m[d.getMonth()]+=i.total;});anCh2=new Chart(el2,{type:'line',data:{labels:MONTHS,datasets:[{label:'Earnings',data:m,borderColor:'#059669',backgroundColor:'rgba(5,150,105,.08)',fill:true,tension:.42,pointBackgroundColor:'#059669',pointRadius:4}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false}},scales:{x:{grid:{color:cG2()},ticks:{color:cT2(),font:{size:11}}},y:{grid:{color:cG2()},ticks:{color:cT2(),font:{size:11},callback:v=>'$'+v.toLocaleString()}}}}})}
  if(el3){if(anCh3)anCh3.destroy();const mmap={};invoices.forEach(i=>{mmap[i.method]=(mmap[i.method]||0)+i.total;});const labels=Object.keys(mmap);anCh3=new Chart(el3,{type:'pie',data:{labels,datasets:[{data:labels.map(l=>mmap[l]),backgroundColor:PAL,borderWidth:0}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{position:'bottom',labels:{color:cT2(),font:{size:11},padding:12}}}}})}
}
function buildTopInvoices() {
  const w=document.getElementById('top-invs'); if(!w) return;
  const top5=[...invoices].sort((a,b)=>b.total-a.total).slice(0,5);
  const max=top5[0]?.total||1;
  w.innerHTML=top5.map((i,idx)=>`<div style="display:flex;align-items:center;gap:10px;margin-bottom:13px"><div style="width:22px;height:22px;border-radius:6px;background:var(--surf2);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:var(--txt3)">${idx+1}</div><div style="flex:1;min-width:0"><div style="font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${esc(i.cname)}</div><div style="height:5px;background:var(--surf2);border-radius:99px;margin-top:4px;overflow:hidden"><div style="height:100%;width:${Math.round(i.total/max*100)}%;background:var(--acc);border-radius:99px;transition:width .5s"></div></div></div><span class="mono" style="font-size:12.5px;font-weight:700;color:var(--acc);flex-shrink:0">${fmt(i.total,i.currency)}</span></div>`).join('');
}

/* ── AI INSIGHTS ──────────────────────────── */
function buildAI() {
  const total   = invoices.length;
  const paid    = invoices.filter(i=>i.status==='Paid');
  const pend    = invoices.filter(i=>i.status==='Pending');
  const ovd     = invoices.filter(i=>i.status==='Overdue');
  const revenue = paid.reduce((s,i)=>s+i.total,0);
  const paidPct = Math.round(paid.length/Math.max(total,1)*100);
  const top5Rev = [...invoices].sort((a,b)=>b.total-a.total).slice(0,5).reduce((s,i)=>s+i.total,0);
  const top5Pct = Math.round(top5Rev/Math.max(revenue,.01)*100);
  const topInv  = [...invoices].sort((a,b)=>b.total-a.total)[0];
  const methodMap={};
  invoices.forEach(i=>{methodMap[i.method]=(methodMap[i.method]||0)+1;});
  const topMethod=Object.entries(methodMap).sort((a,b)=>b[1]-a[1])[0]?.[0]||'N/A';

  const insights=[
    {t:'INFO',tc:'at-b',dot:'#93c5fd',txt:`Revenue collection rate: <strong>${paidPct}%</strong> of invoices have been paid.`},
    {t:'TOP',tc:'at-g',dot:'#6ee7b7',txt:`Top 5 invoices contribute <strong>${top5Pct}%</strong> of total revenue ($${formatNum(top5Rev)}).`},
    {t:'WARN',tc:'at-r',dot:'#fca5a5',txt:`<strong>${ovd.length} overdue invoices</strong> totaling $${formatNum(ovd.reduce((s,i)=>s+i.total,0))} need immediate follow-up.`},
    {t:'INFO',tc:'at-a',dot:'#fde68a',txt:`<strong>${pend.length} pending invoices</strong> ($${formatNum(pend.reduce((s,i)=>s+i.total,0))}) awaiting payment.`},
    {t:'TOP',tc:'at-g',dot:'#6ee7b7',txt:`Highest invoice: <strong>${topInv?.id||'N/A'}</strong> from ${topInv?.cname||'N/A'} — ${fmt(topInv?.total||0,topInv?.currency)}.`},
    {t:'INFO',tc:'at-b',dot:'#93c5fd',txt:`Most used payment method: <strong>${topMethod}</strong>. Consider prioritizing it in communications.`},
  ];
  const suggestions=[
    {txt:`Send immediate WhatsApp reminders to ${ovd.length} overdue clients.`},
    {txt:`Follow up ${pend.length} pending invoices with personalized payment reminders.`},
    {txt:`Offer 5% early payment discount to convert pending invoices faster.`},
    {txt:`Top 5 clients generate ${top5Pct}% of revenue — consider loyalty rewards.`},
    {txt:`Automate payment reminders 7 days before due date to reduce overdue rate.`},
    {txt:`Create invoice bundle packages for repeat clients to increase order value.`},
  ];

  const mp=document.getElementById('ai-main'); if(mp) mp.innerHTML=`
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px"><i class="fas fa-brain" style="font-size:18px;color:#93c5fd"></i><span style="font-size:14px;font-weight:800;color:#e2e8f0;font-family:'Sora',sans-serif">Revenue Analysis</span></div>
    ${insights.map(i=>`<div class="ai-ins"><div class="ai-dot" style="background:${i.dot}"></div><div class="ai-txt"><span class="ai-tag ${i.tc}">${i.t}</span>${i.txt}</div></div>`).join('')}
  `;
  const sp=document.getElementById('ai-sug'); if(sp) sp.innerHTML=`
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px"><i class="fas fa-lightbulb" style="font-size:18px;color:#fde68a"></i><span style="font-size:14px;font-weight:800;color:#e2e8f0;font-family:'Sora',sans-serif">AI Suggestions</span></div>
    ${suggestions.map(s=>`<div class="ai-ins"><div class="ai-dot" style="background:#fde68a"></div><div class="ai-txt"><span class="ai-tag at-a">TIP</span>${s.txt}</div></div>`).join('')}
  `;
  const kw=document.getElementById('ai-kpis'); if(kw){
    const ks=[
      {l:'Collection Rate',   v:paidPct+'%',              color:'var(--acc)'},
      {l:'Overdue Rate',      v:Math.round(ovd.length/Math.max(total,1)*100)+'%', color:'var(--red)'},
      {l:'Avg Invoice Value', v:'$'+formatNum(invoices.reduce((s,i)=>s+i.total,0)/Math.max(total,1)), color:'var(--grn)'},
      {l:'Pending Value',     v:'$'+formatNum(pend.reduce((s,i)=>s+i.total,0)), color:'var(--amb)'},
      {l:'Total Revenue',     v:'$'+formatNum(revenue),   color:'var(--acc)'},
      {l:'Top Method',        v:topMethod,                 color:'var(--vlt)'},
    ];
    kw.innerHTML=ks.map(k=>`<div class="card sc"><div class="sv" style="color:${k.color};font-size:20px">${k.v}</div><div class="slbl">${k.l}</div></div>`).join('');
  }
  const bw=document.getElementById('ai-bars'); if(bw){
    const bars=[
      {l:'Invoice Collection Rate', pct:paidPct,                     color:'var(--acc)'},
      {l:'On-time Payment Rate',    pct:Math.max(0,paidPct-8),       color:'var(--grn)'},
      {l:'Revenue Target (mock)',   pct:74,                           color:'var(--vlt)'},
      {l:'Client Satisfaction',     pct:88,                           color:'var(--grn)'},
      {l:'Overdue Resolution',      pct:100-Math.round(ovd.length/Math.max(total,1)*100), color:'var(--amb)'},
    ];
    bw.innerHTML=bars.map(b=>`<div style="margin-bottom:14px"><div style="display:flex;justify-content:space-between;margin-bottom:4px"><span style="font-size:13px;font-weight:600">${b.l}</span><span class="mono" style="font-size:12px;font-weight:700;color:${b.color}">${Math.min(100,b.pct)}%</span></div><div style="height:8px;background:var(--surf2);border-radius:99px;overflow:hidden"><div style="height:100%;width:${Math.min(100,b.pct)}%;background:${b.color};border-radius:99px;transition:width .6s ease"></div></div></div>`).join('');
  }
}
function refreshAI() { showLoader(true); setTimeout(()=>{ buildAI(); showLoader(false); toast('AI insights refreshed!','success'); },700); }

/* ── EXPORT CSV ───────────────────────────── */
function exportCSV() {
  const cols = ['Invoice #','Customer','Company','Phone','Email','Address','Date','Due Date','Status','Method','Currency','Subtotal','Tax','Discount','Total','Notes'];
  const rows = invoices.map(i=>[i.id,`"${i.cname}"`,`"${i.company||''}"`,i.phone,i.email,`"${i.addr||''}"`,i.date,i.due,i.status,i.method,i.currency||'USD',i.sub,i.taxA,i.discA,i.total,`"${(i.notes||'').replace(/"/g,"''")}"`]);
  const csv = [cols,...rows].map(r=>r.join(',')).join('\n');
  const blob = new Blob([csv],{type:'text/csv'});
  const url  = URL.createObjectURL(blob);
  Object.assign(document.createElement('a'),{href:url,download:'easy-billing-invoices.csv'}).click();
  URL.revokeObjectURL(url);
  toast(`Exported ${invoices.length} invoices as CSV!`,'success');
}

/* ── TOAST / LOADER ───────────────────────── */
function showLoader(on) { document.getElementById('ldr').style.display = on?'flex':'none'; }
function toast(msg, type='info') {
  const icons  = {success:'fa-check-circle',error:'fa-times-circle',info:'fa-info-circle',warn:'fa-exclamation-triangle'};
  const classes = {success:'ts',error:'te',info:'ti2',warn:'tw2'};
  const w  = document.getElementById('tw');
  const div= document.createElement('div');
  div.className=`toast ${classes[type]||'ti2'}`;
  div.innerHTML=`<i class="fas ${icons[type]||'fa-info-circle'} ti" style="font-size:15px;flex-shrink:0"></i><span>${msg}</span>`;
  w.appendChild(div);
  setTimeout(()=>{div.classList.add('hiding');setTimeout(()=>div.remove(),280);},3500);
}

/* ── OVERLAYS ─────────────────────────────── */
function closeOv(id) { document.getElementById(id).classList.remove('open'); }
document.querySelectorAll('.ov').forEach(ov=>{ov.addEventListener('click',function(e){if(e.target===this)this.classList.remove('open');});});
document.addEventListener('keydown',e=>{if(e.key==='Escape')document.querySelectorAll('.ov.open').forEach(o=>o.classList.remove('open'));});
</script>
</body>
</html>
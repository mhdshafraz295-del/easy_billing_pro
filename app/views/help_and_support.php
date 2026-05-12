<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Easy Billing Pro — Help & Support</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Playfair+Display:ital,wght@0,700;0,800;1,600&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
  darkMode: ['attribute', '[data-theme="dark"]'],
  theme: { extend: { fontFamily: { sans: ['Nunito','sans-serif'], display: ['Playfair Display','serif'], mono: ['Fira Code','monospace'] } } }
}
</script>

<style>
/* ═══════════════════════════════════════════════════
   EASY BILLING PRO — HELP & SUPPORT CENTER
   Deep Indigo · Warm Coral · Warm Cream
═══════════════════════════════════════════════════ */
:root {
  --bg:      #f5f3f0;
  --bg2:     #edeae4;
  --surf:    #ffffff;
  --surf2:   #f8f6f3;
  --surf3:   #f0ede8;
  --bdr:     #e4dfd8;
  --bdr2:    #ccc6bc;
  --txt:     #1c1a16;
  --txt2:    #6b6058;
  --txt3:    #a89d92;
  --ind:     #3730a3;   /* deep indigo */
  --ind2:    #2d278f;
  --indlt:   rgba(55,48,163,.1);
  --coral:   #e05a3a;  /* warm coral */
  --corallt: rgba(224,90,58,.1);
  --teal:    #0f766e;
  --teallt:  rgba(15,118,110,.1);
  --amber:   #b45309;
  --amberlt: rgba(180,83,9,.1);
  --grn:     #1a6b3a;
  --grnlt:   rgba(26,107,58,.1);
  --red:     #c0202a;
  --redlt:   rgba(192,32,42,.1);
  --sky:     #0369a1;
  --skylt:   rgba(3,105,161,.1);
  --sh:      0 1px 4px rgba(0,0,0,.05),0 2px 14px rgba(0,0,0,.05);
  --sh-md:   0 4px 24px rgba(0,0,0,.1);
  --sh-lg:   0 12px 48px rgba(0,0,0,.15);
  --r:       14px;
  --sbw:     252px;
}
[data-theme="dark"] {
  --bg:      #0c0b08;
  --bg2:     #121009;
  --surf:    #1a1812;
  --surf2:   #221f15;
  --surf3:   #2a261a;
  --bdr:     #342f22;
  --bdr2:    #46402e;
  --txt:     #f0ebe0;
  --txt2:    #a89878;
  --txt3:    #6a6048;
  --sh:      0 1px 4px rgba(0,0,0,.3),0 2px 14px rgba(0,0,0,.2);
  --sh-md:   0 4px 24px rgba(0,0,0,.45);
  --sh-lg:   0 12px 48px rgba(0,0,0,.6);
}
*, *::before, *::after { box-sizing:border-box;margin:0;padding:0 }
html { scroll-behavior:smooth }
body { font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt);min-height:100vh;transition:background .3s,color .3s;-webkit-font-smoothing:antialiased;overflow-x:hidden }
::-webkit-scrollbar { width:5px;height:5px }
::-webkit-scrollbar-track { background:transparent }
::-webkit-scrollbar-thumb { background:var(--bdr2);border-radius:99px }

/* SIDEBAR */
#sb { width:var(--sbw);background:#111827;min-height:100vh;position:fixed;top:0;left:0;z-index:50;display:flex;flex-direction:column;transition:width .3s,transform .3s;overflow:hidden;flex-shrink:0 }
#sb.col { width:62px }
#sb.col .sl,.col .ss,.col .lt,.col .ui { display:none!important }
#sb.col .sbl { padding:0 14px;justify-content:center }
#sb.col .snl { justify-content:center;padding:10px;gap:0 }
#sb.col .sft { padding:10px }
#sb.col .sur { justify-content:center;padding:10px }
#main { margin-left:var(--sbw);flex:1;min-width:0;transition:margin-left .3s }
#main.exp { margin-left:62px }
@media(max-width:768px){#sb{transform:translateX(-100%);width:252px!important}#sb.mop{transform:translateX(0)}#main{margin-left:0!important}#mbg{display:block}}
.sbl{height:64px;display:flex;align-items:center;gap:10px;padding:0 16px;border-bottom:1px solid rgba(255,255,255,.06);flex-shrink:0}
.sic{width:34px;height:34px;border-radius:9px;background:linear-gradient(135deg,var(--ind),var(--coral));display:flex;align-items:center;justify-content:center;flex-shrink:0}
.sn{flex:1;overflow-y:auto;overflow-x:hidden;padding:8px 6px}
.ss{font-size:9.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.28);padding:0 10px;margin:14px 0 4px}
.snl{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.52);font-size:13px;font-weight:600;cursor:pointer;transition:all .15s;margin-bottom:1px;white-space:nowrap;text-decoration:none}
.snl:hover{background:rgba(255,255,255,.07);color:rgba(255,255,255,.88)}
.snl.act{background:rgba(55,48,163,.25);color:#a5b4fc}
.snl i{font-size:14px;flex-shrink:0;width:18px;text-align:center}
.sft{padding:8px 6px;border-top:1px solid rgba(255,255,255,.06);flex-shrink:0}
.sur{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;cursor:pointer;transition:background .15s}
.sur:hover{background:rgba(255,255,255,.05)}
.suav{width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,var(--ind),var(--coral));display:flex;align-items:center;justify-content:center;color:#fff;font-size:11px;font-weight:700;flex-shrink:0}

/* TOPBAR */
#tb{height:64px;background:var(--surf);border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px;padding:0 20px;position:sticky;top:0;z-index:30;transition:background .25s,border-color .25s}
.srch{flex:1;max-width:380px;position:relative}
.srch input{width:100%;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:10px;padding:8px 13px 8px 36px;font-family:'Nunito',sans-serif;font-size:13px;color:var(--txt);outline:none;transition:all .2s}
.srch input:focus{border-color:var(--ind);box-shadow:0 0 0 3px var(--indlt)}
.srch input::placeholder{color:var(--txt3)}
.srch .si{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:var(--txt3);font-size:13px;pointer-events:none}
.ib{width:36px;height:36px;border-radius:10px;background:var(--surf2);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--txt2);transition:all .15s;position:relative;flex-shrink:0}
.ib:hover{background:var(--surf3);color:var(--txt)}

/* PAGES */
.page{display:none;padding:22px 20px}
.page.act{display:block}
.ptitle{font-family:'Playfair Display',serif;font-size:24px;font-weight:800;color:var(--txt);letter-spacing:-.3px;font-style:italic}
.psub{font-size:13px;color:var(--txt3);margin-top:2px}

/* CARDS */
.card{background:var(--surf);border:1px solid var(--bdr);border-radius:var(--r);box-shadow:var(--sh);transition:background .25s,border-color .25s,box-shadow .2s,transform .18s}
.card:hover{box-shadow:var(--sh-md)}

/* STAT CARDS */
.sc{padding:18px 20px;cursor:default;overflow:hidden;position:relative}
.sc::after{content:'';position:absolute;bottom:-18px;right:-18px;width:80px;height:80px;border-radius:50%;opacity:.06}
.ca::after{background:var(--ind)}.cb::after{background:var(--coral)}.cc::after{background:var(--teal)}.cd::after{background:var(--amber)}
.sico{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:14px}
.sv{font-size:28px;font-weight:800;color:var(--txt);font-family:'Fira Code',monospace;line-height:1}
.slbl{font-size:12.5px;color:var(--txt2);margin-top:4px;font-weight:600}
.sdelta{display:inline-flex;align-items:center;gap:3px;font-size:11px;font-weight:700;padding:2px 7px;border-radius:99px;margin-top:6px}
.up{background:var(--grnlt);color:var(--grn)}.dn{background:var(--redlt);color:var(--red)}.nt{background:var(--indlt);color:var(--ind)}

/* BADGES */
.badge{display:inline-flex;align-items:center;gap:4px;padding:3px 9px;border-radius:99px;font-size:11.5px;font-weight:700}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.b-open{background:var(--indlt);color:var(--ind)}
.b-prog{background:var(--amberlt);color:var(--amber)}
.b-res{background:var(--grnlt);color:var(--grn)}
.b-closed{background:rgba(107,114,128,.1);color:#6b7280}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;border-radius:10px;font-family:'Nunito',sans-serif;font-size:13px;font-weight:700;cursor:pointer;border:none;outline:none;transition:all .15s;white-space:nowrap}
.btn-primary{background:var(--ind);color:#fff;box-shadow:0 2px 8px var(--indlt)}
.btn-primary:hover{background:var(--ind2);transform:translateY(-1px)}
.btn-coral{background:var(--coral);color:#fff}
.btn-coral:hover{background:#c44e30;transform:translateY(-1px)}
.btn-ghost{background:transparent;color:var(--txt2);border:1px solid var(--bdr)}
.btn-ghost:hover{background:var(--surf2);color:var(--txt)}
.btn-sm{padding:6px 12px;font-size:12.5px}
.btn-xs{padding:4px 9px;font-size:11.5px;border-radius:7px}

/* FORMS */
.fi{width:100%;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:10px;padding:10px 13px;font-family:'Nunito',sans-serif;font-size:13.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none}
.fi:focus{border-color:var(--ind);box-shadow:0 0 0 3px var(--indlt);background:var(--surf)}
.fi::placeholder{color:var(--txt3)}
.fl{display:block;font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt2);margin-bottom:5px}
.fg{margin-bottom:14px}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
@media(max-width:540px){.g2{grid-template-columns:1fr}}

/* TABLES */
.tbl{width:100%;border-collapse:collapse}
.tbl th{font-size:10.5px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:var(--txt3);padding:11px 14px;border-bottom:1px solid var(--bdr);text-align:left;white-space:nowrap}
.tbl td{padding:13px 14px;font-size:13px;border-bottom:1px solid var(--bdr);color:var(--txt);vertical-align:middle;transition:background .1s}
.tbl tr:last-child td{border-bottom:none}
.tbl tbody tr:hover td{background:rgba(55,48,163,.03)}
.tw{overflow-x:auto;-webkit-overflow-scrolling:touch}

/* OVERLAYS */
.ov{position:fixed;inset:0;background:rgba(0,0,0,.52);backdrop-filter:blur(7px);z-index:100;display:none;align-items:center;justify-content:center;padding:16px}
.ov.open{display:flex}
.modal{background:var(--surf);border:1px solid var(--bdr);border-radius:18px;width:100%;box-shadow:var(--sh-lg);max-height:92vh;overflow-y:auto;animation:mIn .22s cubic-bezier(.34,1.56,.64,1)}
@keyframes mIn{from{opacity:0;transform:scale(.93) translateY(12px)}to{opacity:1;transform:scale(1)}}
.mh{padding:18px 22px 14px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:var(--surf);z-index:2}
.mt{font-family:'Playfair Display',serif;font-size:17px;font-weight:700;font-style:italic;color:var(--txt)}
.mb{padding:18px 22px}
.mf{padding:13px 22px;border-top:1px solid var(--bdr);display:flex;gap:8px;justify-content:flex-end;position:sticky;bottom:0;background:var(--surf)}

/* TOAST */
#tw{position:fixed;bottom:20px;right:20px;z-index:999;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:12px;background:var(--surf);border:1px solid var(--bdr);box-shadow:var(--sh-lg);font-size:13px;font-weight:600;color:var(--txt);min-width:220px;max-width:320px;pointer-events:all;animation:tIn .27s cubic-bezier(.34,1.56,.64,1);transition:opacity .25s,transform .25s}
@keyframes tIn{from{opacity:0;transform:translateX(70px) scale(.9)}to{opacity:1;transform:none}}
.toast.hiding{opacity:0;transform:translateX(60px)}
.ts .ti{color:var(--grn)}.te .ti{color:var(--red)}.ti2 .ti{color:var(--ind)}.tw2 .ti{color:var(--amber)}

/* LOADER */
#ldr{position:fixed;inset:0;background:rgba(0,0,0,.35);backdrop-filter:blur(3px);z-index:200;display:none;align-items:center;justify-content:center}
.spin{width:40px;height:40px;border:3px solid rgba(55,48,163,.2);border-top-color:var(--ind);border-radius:50%;animation:sp .7s linear infinite}
@keyframes sp{to{transform:rotate(360deg)}}

/* ACCORDION */
.acc-item{border:1px solid var(--bdr);border-radius:12px;overflow:hidden;margin-bottom:10px;transition:border-color .2s}
.acc-item.open{border-color:var(--ind)}
.acc-trigger{display:flex;align-items:center;justify-content:space-between;padding:16px 18px;cursor:pointer;font-size:14px;font-weight:700;color:var(--txt);background:var(--surf);transition:background .15s;user-select:none}
.acc-trigger:hover{background:var(--surf2)}
.acc-trigger .acc-ico{font-size:13px;color:var(--txt3);transition:transform .3s,color .2s;flex-shrink:0;margin-left:10px}
.acc-item.open .acc-trigger .acc-ico{transform:rotate(180deg);color:var(--ind)}
.acc-item.open .acc-trigger{color:var(--ind)}
.acc-body{max-height:0;overflow:hidden;transition:max-height .35s cubic-bezier(.4,0,.2,1);background:var(--surf2)}
.acc-item.open .acc-body{max-height:400px}
.acc-content{padding:14px 18px;font-size:13.5px;color:var(--txt2);line-height:1.65}

/* CATEGORY TABS */
.cat-tab{padding:7px 16px;border-radius:99px;font-size:13px;font-weight:700;cursor:pointer;border:1.5px solid var(--bdr);color:var(--txt2);background:transparent;transition:all .15s;white-space:nowrap}
.cat-tab:hover{border-color:var(--ind);color:var(--ind)}
.cat-tab.on{background:var(--ind);border-color:var(--ind);color:#fff}

/* CHAT */
#chat-wrap{display:flex;flex-direction:column;height:480px}
#chat-messages{flex:1;overflow-y:auto;padding:14px 16px;display:flex;flex-direction:column;gap:10px}
#chat-messages::-webkit-scrollbar{width:3px}
#chat-messages::-webkit-scrollbar-thumb{background:var(--bdr2);border-radius:99px}
.msg-row{display:flex;align-items:flex-end;gap:8px}
.msg-row.user{flex-direction:row-reverse}
.msg-av{width:30px;height:30px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0}
.msg-bubble{max-width:72%;padding:10px 13px;border-radius:16px;font-size:13.5px;line-height:1.55;word-break:break-word}
.msg-row.bot .msg-bubble{background:var(--surf2);border:1px solid var(--bdr);border-bottom-left-radius:4px;color:var(--txt)}
.msg-row.user .msg-bubble{background:var(--ind);border-bottom-right-radius:4px;color:#fff}
.msg-time{font-size:10.5px;color:var(--txt3);margin-top:3px}
.typing-dot{width:7px;height:7px;border-radius:50%;background:var(--txt3);display:inline-block;animation:blink 1.2s ease-in-out infinite}
.typing-dot:nth-child(2){animation-delay:.2s}
.typing-dot:nth-child(3){animation-delay:.4s}
@keyframes blink{0%,80%,100%{opacity:.2}40%{opacity:1}}

#chat-input-row{padding:12px 16px;border-top:1px solid var(--bdr);display:flex;gap:8px;align-items:center}
#chat-inp{flex:1;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:10px;padding:9px 13px;font-family:'Nunito',sans-serif;font-size:13.5px;color:var(--txt);outline:none;transition:all .2s}
#chat-inp:focus{border-color:var(--ind);box-shadow:0 0 0 3px var(--indlt)}
#chat-inp::placeholder{color:var(--txt3)}

/* ARTICLE CARDS */
.art-card{padding:16px;border:1px solid var(--bdr);border-radius:12px;background:var(--surf);cursor:pointer;transition:all .18s}
.art-card:hover{border-color:var(--ind);box-shadow:var(--sh-md);transform:translateY(-2px)}
.art-tag{display:inline-flex;align-items:center;gap:3px;padding:2px 8px;border-radius:99px;font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.04em}

/* FILTER */
.fsm{background:var(--surf2);border:1.5px solid var(--bdr);border-radius:9px;padding:7px 11px;font-family:'Nunito',sans-serif;font-size:12.5px;color:var(--txt);outline:none;transition:all .2s;appearance:none}
.fsm:focus{border-color:var(--ind)}

/* GRIDS */
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.g2g{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.g73{display:grid;grid-template-columns:7fr 3fr;gap:14px}
@media(max-width:1100px){.g4{grid-template-columns:repeat(2,1fr)}.g73{grid-template-columns:1fr}}
@media(max-width:640px){.g4,.g3,.g2g{grid-template-columns:1fr}}

/* MISC */
#mbg{display:none;position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:40}
.mono{font-family:'Fira Code',monospace}
.divider{height:1px;background:var(--bdr);margin:6px 0}
.empty{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:48px 24px;text-align:center}
.pgb{width:30px;height:30px;border-radius:7px;display:inline-flex;align-items:center;justify-content:center;font-size:12.5px;font-weight:600;cursor:pointer;border:1px solid var(--bdr);color:var(--txt2);background:transparent;transition:all .15s}
.pgb:hover{background:var(--surf2)}.pgb.on{background:var(--ind);border-color:var(--ind);color:#fff}

/* HERO SEARCH */
.hero-search{background:linear-gradient(135deg,var(--ind) 0%,#4338ca 40%,var(--coral) 100%);border-radius:var(--r);padding:36px 28px;position:relative;overflow:hidden}
.hero-search::before{content:'';position:absolute;inset:0;background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")}
.hero-inp{width:100%;background:rgba(255,255,255,.15);border:1.5px solid rgba(255,255,255,.25);border-radius:11px;padding:12px 14px 12px 42px;font-family:'Nunito',sans-serif;font-size:15px;color:#fff;outline:none;backdrop-filter:blur(8px);transition:all .2s}
.hero-inp:focus{background:rgba(255,255,255,.2);border-color:rgba(255,255,255,.5)}
.hero-inp::placeholder{color:rgba(255,255,255,.7)}
</style>
</head>
<body>

<!-- LOADER -->
<div id="ldr"><div style="background:var(--surf);padding:26px 36px;border-radius:14px;display:flex;flex-direction:column;align-items:center;gap:13px"><div class="spin"></div><span style="font-size:13px;color:var(--txt2)">Processing…</span></div></div>

<!-- MOBILE BG -->
<div id="mbg" onclick="closeMob()"></div>

<!-- TOAST -->
<div id="tw"></div>

<!-- ═══════════════════════════════════
     MODALS
═══════════════════════════════════ -->

<!-- TICKET DETAIL MODAL -->
<div id="ticket-ov" class="ov">
  <div class="modal" style="max-width:620px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--indlt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--ind)"><i class="fas fa-ticket-alt"></i></div>
        <span class="mt" id="td-title">Ticket Details</span>
      </div>
      <button class="ib" onclick="closeOv('ticket-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb" id="td-body"></div>
    <div class="mf">
      <button class="btn btn-ghost btn-sm" onclick="closeOv('ticket-ov')">Close</button>
      <button class="btn btn-coral btn-sm" id="td-resolve-btn"><i class="fas fa-check"></i>Mark Resolved</button>
    </div>
  </div>
</div>

<!-- CREATE TICKET MODAL -->
<div id="create-ov" class="ov">
  <div class="modal" style="max-width:560px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--indlt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--ind)"><i class="fas fa-plus"></i></div>
        <span class="mt">Create Support Ticket</span>
      </div>
      <button class="ib" onclick="closeOv('create-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb">
      <form id="ticket-form" onsubmit="submitTicket(event)" novalidate>
        <div class="g2">
          <div class="fg"><label class="fl">Your Name *</label><input type="text" class="fi" id="tf-name" placeholder="John Smith"/></div>
          <div class="fg"><label class="fl">Email *</label><input type="email" class="fi" id="tf-email" placeholder="john@mail.com"/></div>
        </div>
        <div class="fg"><label class="fl">Subject *</label><input type="text" class="fi" id="tf-subject" placeholder="Describe your issue briefly"/></div>
        <div class="g2">
          <div class="fg"><label class="fl">Category</label><select class="fi" id="tf-cat"><option value="Billing">Billing</option><option value="Products">Products</option><option value="Orders">Orders</option><option value="Users">Users</option><option value="Settings">Settings</option><option value="Technical">Technical</option></select></div>
          <div class="fg"><label class="fl">Priority</label><select class="fi" id="tf-priority"><option value="Low">Low</option><option value="Medium" selected>Medium</option><option value="High">High</option><option value="Critical">Critical</option></select></div>
        </div>
        <div class="fg" style="margin-bottom:0"><label class="fl">Message *</label><textarea class="fi" id="tf-msg" rows="4" placeholder="Describe your issue in detail…" style="resize:none"></textarea></div>
        <button type="submit" id="tf-ghost" style="display:none"></button>
      </form>
    </div>
    <div class="mf">
      <button class="btn btn-ghost btn-sm" onclick="closeOv('create-ov')">Cancel</button>
      <button class="btn btn-primary btn-sm" onclick="document.getElementById('tf-ghost').click()"><i class="fas fa-paper-plane"></i>Submit Ticket</button>
    </div>
  </div>
</div>

<!-- ARTICLE DETAIL MODAL -->
<div id="art-ov" class="ov">
  <div class="modal" style="max-width:600px">
    <div class="mh">
      <span class="mt" id="art-title"></span>
      <button class="ib" onclick="closeOv('art-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb" id="art-body"></div>
  </div>
</div>

<!-- ═══════════════════════════════════
     APP SHELL
═══════════════════════════════════ -->
<div style="display:flex;min-height:100vh">

  <!-- SIDEBAR -->
  <aside id="sb">
    <div class="sbl">
      <div class="sic"><i class="fas fa-headset" style="color:#fff;font-size:15px"></i></div>
      <div class="lt">
        <div style="font-size:14px;font-weight:800;color:#fff;letter-spacing:-.2px;font-family:'Playfair Display',serif;font-style:italic">Easy Billing Pro</div>
        <div style="font-size:10px;color:rgba(255,255,255,.35)">Help & Support</div>
      </div>
    </div>
    <nav class="sn">
      <div class="ss">Support</div>
      <a class="snl act" data-pg="dashboard" onclick="nav('dashboard',this)"><i class="fas fa-home"></i><span class="sl">Help Center</span></a>
      <a class="snl" data-pg="faq" onclick="nav('faq',this)"><i class="fas fa-question-circle"></i><span class="sl">FAQ</span></a>
      <a class="snl" data-pg="chat" onclick="nav('chat',this)"><i class="fas fa-comments"></i><span class="sl">Live Chat AI</span><span style="margin-left:auto;background:var(--coral);color:#fff;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:99px">AI</span></a>
      <a class="snl" data-pg="contact" onclick="nav('contact',this)"><i class="fas fa-envelope"></i><span class="sl">Contact Us</span></a>
      <a class="snl" data-pg="analytics" onclick="nav('analytics',this)"><i class="fas fa-chart-bar"></i><span class="sl">Analytics</span></a>
    </nav>
    <div class="sft">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 10px 10px;border-bottom:1px solid rgba(255,255,255,.06);margin-bottom:4px">
        <span class="sl" style="font-size:12px;color:rgba(255,255,255,.35)">Dark Mode</span>
        <div id="th-tr" onclick="toggleTheme()" style="width:38px;height:20px;background:rgba(255,255,255,.15);border-radius:99px;position:relative;cursor:pointer;transition:background .2s;flex-shrink:0">
          <div id="th-tb" style="position:absolute;top:2px;left:2px;width:16px;height:16px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)"></div>
        </div>
      </div>
      <div class="sur"><div class="suav">EB</div><div class="ui"><div style="font-size:13px;font-weight:600;color:rgba(255,255,255,.82)">Admin</div><div style="font-size:11px;color:rgba(255,255,255,.35)">Support Team</div></div></div>
    </div>
  </aside>

  <!-- MAIN -->
  <div id="main" style="flex:1;min-width:0">
    <header id="tb">
      <button class="ib" onclick="toggleSB()"><i class="fas fa-bars" style="font-size:16px"></i></button>
      <div class="srch">
        <i class="fas fa-search si"></i>
        <input type="text" id="global-search" placeholder="Search help articles, FAQ…" oninput="onGlobalSearch(this.value)"/>
      </div>
      <div style="display:flex;align-items:center;gap:8px;margin-left:auto">
        <button class="ib" onclick="toast('No new notifications','info')"><i class="fas fa-bell" style="font-size:16px"></i></button>
      </div>
    </header>

    <!-- ═══ HELP CENTER DASHBOARD ═══ -->
    <div id="page-dashboard" class="page act">
      <div style="margin-bottom:22px">
        <h1 class="ptitle">Help Center</h1>
        <p class="psub">Find answers, get support, and manage your requests</p>
      </div>

      <!-- Hero search -->
      <div class="hero-search" style="margin-bottom:24px">
        <div style="position:relative;z-index:1;text-align:center">
          <h2 style="font-family:'Playfair Display',serif;font-size:clamp(22px,4vw,32px);font-weight:800;color:#fff;font-style:italic;margin-bottom:6px">How can we help you?</h2>
          <p style="font-size:14px;color:rgba(255,255,255,.75);margin-bottom:20px">Search our knowledge base or browse categories below</p>
          <div style="position:relative;max-width:520px;margin:0 auto">
            <i class="fas fa-search" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,.7);font-size:15px;pointer-events:none"></i>
            <input type="text" class="hero-inp" id="hero-search" placeholder="Search help articles…" oninput="heroSearch(this.value)"/>
          </div>
          <div style="display:flex;gap:8px;justify-content:center;flex-wrap:wrap;margin-top:14px" id="hero-popular-tags">
            <span onclick="heroSearch('invoice')" style="cursor:pointer;padding:4px 12px;border-radius:99px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);font-size:12px;font-weight:600;color:rgba(255,255,255,.85);transition:background .15s" onmouseenter="this.style.background='rgba(255,255,255,.22)'" onmouseleave="this.style.background='rgba(255,255,255,.14)'">Invoice</span>
            <span onclick="heroSearch('payment')" style="cursor:pointer;padding:4px 12px;border-radius:99px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);font-size:12px;font-weight:600;color:rgba(255,255,255,.85);transition:background .15s" onmouseenter="this.style.background='rgba(255,255,255,.22)'" onmouseleave="this.style.background='rgba(255,255,255,.14)'">Payment</span>
            <span onclick="heroSearch('product')" style="cursor:pointer;padding:4px 12px;border-radius:99px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);font-size:12px;font-weight:600;color:rgba(255,255,255,.85);transition:background .15s" onmouseenter="this.style.background='rgba(255,255,255,.22)'" onmouseleave="this.style.background='rgba(255,255,255,.14)'">Products</span>
            <span onclick="heroSearch('user')" style="cursor:pointer;padding:4px 12px;border-radius:99px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);font-size:12px;font-weight:600;color:rgba(255,255,255,.85);transition:background .15s" onmouseenter="this.style.background='rgba(255,255,255,.22)'" onmouseleave="this.style.background='rgba(255,255,255,.14)'">Users</span>
            <span onclick="heroSearch('account')" style="cursor:pointer;padding:4px 12px;border-radius:99px;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.2);font-size:12px;font-weight:600;color:rgba(255,255,255,.85);transition:background .15s" onmouseenter="this.style.background='rgba(255,255,255,.22)'" onmouseleave="this.style.background='rgba(255,255,255,.14)'">Account</span>
          </div>
        </div>
      </div>

      <!-- Search results -->
      <div id="search-results" style="display:none;margin-bottom:20px">
        <h3 style="font-size:14px;font-weight:700;margin-bottom:12px;color:var(--txt2)">Search Results</h3>
        <div id="search-results-list"></div>
      </div>

      <!-- Category cards -->
      <div style="margin-bottom:22px">
        <h3 style="font-size:15px;font-weight:800;margin-bottom:14px;color:var(--txt)">Browse by Category</h3>
        <div class="g3">
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--ind)" onclick="nav('faq',document.querySelector('[data-pg=faq]'));filterCat('Orders')">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--indlt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--ind)"><i class="fas fa-shopping-bag"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">Orders</div>
            <div style="font-size:12px;color:var(--txt3)">7 articles</div>
          </div>
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--coral)" onclick="nav('faq',document.querySelector('[data-pg=faq]'));filterCat('Products')">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--corallt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--coral)"><i class="fas fa-box-open"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">Products</div>
            <div style="font-size:12px;color:var(--txt3)">9 articles</div>
          </div>
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--teal)" onclick="nav('faq',document.querySelector('[data-pg=faq]'));filterCat('Users')">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--teallt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--teal)"><i class="fas fa-users"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">Users</div>
            <div style="font-size:12px;color:var(--txt3)">6 articles</div>
          </div>
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--amber)" onclick="nav('faq',document.querySelector('[data-pg=faq]'));filterCat('Billing')">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--amberlt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--amber)"><i class="fas fa-file-invoice-dollar"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">Billing</div>
            <div style="font-size:12px;color:var(--txt3)">8 articles</div>
          </div>
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--sky)" onclick="nav('faq',document.querySelector('[data-pg=faq]'));filterCat('Settings')">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--skylt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--sky)"><i class="fas fa-cog"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">Settings</div>
            <div style="font-size:12px;color:var(--txt3)">5 articles</div>
          </div>
          <div class="card" style="padding:20px;cursor:pointer;text-align:center;border-top:3px solid var(--grn)" onclick="nav('chat',document.querySelector('[data-pg=chat]'))">
            <div style="width:44px;height:44px;border-radius:12px;background:var(--grnlt);display:flex;align-items:center;justify-content:center;margin:0 auto 12px;font-size:20px;color:var(--grn)"><i class="fas fa-robot"></i></div>
            <div style="font-size:14px;font-weight:800;margin-bottom:4px">AI Support</div>
            <div style="font-size:12px;color:var(--txt3)">Ask anything</div>
          </div>
        </div>
      </div>

      <!-- Popular Articles -->
      <div>
        <h3 style="font-size:15px;font-weight:800;margin-bottom:14px">Popular Articles</h3>
        <div id="popular-articles" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:12px"></div>
      </div>
    </div>

    <!-- ═══ FAQ ═══ -->
    <div id="page-faq" class="page">
      <div style="margin-bottom:22px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px">
        <div><h1 class="ptitle">FAQ</h1><p class="psub">Find quick answers to common questions</p></div>
      </div>

      <!-- Cat filter & search -->
      <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:18px;align-items:center">
        <div style="position:relative;flex:1;min-width:200px">
          <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--txt3);pointer-events:none"></i>
          <input class="fsm" type="text" id="faq-q" placeholder="Search FAQ…" style="padding-left:30px;width:100%" oninput="filterFAQ()"/>
        </div>
        <div id="faq-cats" style="display:flex;gap:7px;flex-wrap:wrap">
          <button class="cat-tab on" onclick="setFaqCat('All',this)">All</button>
          <button class="cat-tab" onclick="setFaqCat('Orders',this)">Orders</button>
          <button class="cat-tab" onclick="setFaqCat('Products',this)">Products</button>
          <button class="cat-tab" onclick="setFaqCat('Users',this)">Users</button>
          <button class="cat-tab" onclick="setFaqCat('Billing',this)">Billing</button>
          <button class="cat-tab" onclick="setFaqCat('Settings',this)">Settings</button>
        </div>
      </div>

      <div id="faq-list"></div>
      <div id="faq-empty" class="empty" style="display:none">
        <i class="fas fa-search" style="font-size:32px;color:var(--txt3);margin-bottom:12px"></i>
        <div style="font-size:15px;font-weight:700;margin-bottom:6px">No results found</div>
        <p style="font-size:13px;color:var(--txt3)">Try a different search term or category</p>
      </div>
    </div>

    <!-- ═══ LIVE CHAT ═══ -->
    <div id="page-chat" class="page">
      <div style="margin-bottom:22px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px">
        <div><h1 class="ptitle">AI Support Chat</h1><p class="psub">Ask our AI assistant anything — available 24/7</p></div>
        <button class="btn btn-ghost btn-sm" onclick="clearChat()"><i class="fas fa-trash"></i>Clear Chat</button>
      </div>

      <div class="g73">
        <!-- Chat panel -->
        <div class="card" style="overflow:hidden">
          <!-- Chat header -->
          <div style="padding:14px 16px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:12px">
            <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--ind),var(--coral));display:flex;align-items:center;justify-content:center;font-size:18px;color:#fff;flex-shrink:0"><i class="fas fa-robot"></i></div>
            <div>
              <div style="font-size:14px;font-weight:800">EasyBot AI</div>
              <div style="font-size:12px;color:var(--grn);font-weight:600;display:flex;align-items:center;gap:4px"><span style="width:7px;height:7px;border-radius:50%;background:var(--grn);display:inline-block"></span>Online</div>
            </div>
            <div style="margin-left:auto;font-size:12px;color:var(--txt3)">Avg. reply: 1s</div>
          </div>

          <!-- Messages -->
          <div id="chat-wrap">
            <div id="chat-messages"></div>
            <div id="chat-input-row">
              <input type="text" id="chat-inp" placeholder="Type your question…" onkeydown="if(event.key==='Enter')sendChat()"/>
              <button class="btn btn-primary btn-sm" onclick="sendChat()" style="flex-shrink:0"><i class="fas fa-paper-plane"></i></button>
            </div>
          </div>
        </div>

        <!-- AI Suggestions panel -->
        <div style="display:flex;flex-direction:column;gap:12px">
          <div class="card" style="padding:16px">
            <div style="font-size:13px;font-weight:800;margin-bottom:12px;display:flex;align-items:center;gap:6px"><i class="fas fa-lightbulb" style="color:var(--amber)"></i>Quick Suggestions</div>
            <div id="quick-suggestions" style="display:flex;flex-direction:column;gap:7px"></div>
          </div>
          <div class="card" style="padding:16px">
            <div style="font-size:13px;font-weight:800;margin-bottom:12px;display:flex;align-items:center;gap:6px"><i class="fas fa-history" style="color:var(--ind)"></i>Detected Topics</div>
            <div id="detected-topics" style="font-size:13px;color:var(--txt3)">Send a message to see detected topics.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══ CONTACT FORM ═══ -->
    <div id="page-contact" class="page">
      <div style="margin-bottom:22px"><h1 class="ptitle">Contact Support</h1><p class="psub">Send us a message and we'll get back to you within 24 hours</p></div>
      <div class="g2g">
        <!-- Form -->
        <div class="card" style="padding:24px">
          <h3 style="font-size:16px;font-weight:800;margin-bottom:18px;display:flex;align-items:center;gap:7px"><i class="fas fa-envelope" style="color:var(--ind)"></i>Send a Message</h3>
          <form onsubmit="submitContact(event)" novalidate>
            <div class="g2">
              <div class="fg"><label class="fl">Full Name *</label><input type="text" class="fi" id="cf-name" placeholder="John Smith"/></div>
              <div class="fg"><label class="fl">Email *</label><input type="email" class="fi" id="cf-email" placeholder="john@mail.com"/></div>
            </div>
            <div class="fg"><label class="fl">Subject *</label><input type="text" class="fi" id="cf-subject" placeholder="What's your question about?"/></div>
            <div class="fg"><label class="fl">Category</label><select class="fi" id="cf-cat"><option>Billing</option><option>Products</option><option>Orders</option><option>Users</option><option>Settings</option><option>Technical</option><option>Other</option></select></div>
            <div class="fg"><label class="fl">Message *</label><textarea class="fi" id="cf-msg" rows="5" placeholder="Describe your issue in detail…" style="resize:none"></textarea></div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">
              <div class="spin" id="cf-spin" style="display:none;width:18px;height:18px;border-width:2px;margin:0 auto"></div>
              <span id="cf-lbl"><i class="fas fa-paper-plane"></i> Send Message</span>
            </button>
          </form>
        </div>

        <!-- Contact info -->
        <div style="display:flex;flex-direction:column;gap:14px">
          <div class="card" style="padding:20px">
            <h3 style="font-size:14px;font-weight:800;margin-bottom:14px">Other Ways to Reach Us</h3>
            <div style="display:flex;flex-direction:column;gap:12px">
              <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--surf2);border-radius:10px">
                <div style="width:36px;height:36px;border-radius:9px;background:var(--indlt);display:flex;align-items:center;justify-content:center;color:var(--ind);flex-shrink:0"><i class="fas fa-envelope"></i></div>
                <div><div style="font-size:13px;font-weight:700">Email Support</div><div style="font-size:12px;color:var(--txt3)">mhdshafraz295@gmail.com</div></div>
              </div>
              <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--surf2);border-radius:10px">
                <div style="width:36px;height:36px;border-radius:9px;background:var(--corallt);display:flex;align-items:center;justify-content:center;color:var(--coral);flex-shrink:0"><i class="fas fa-phone"></i></div>
                <div><div style="font-size:13px;font-weight:700">Phone Support</div><div style="font-size:12px;color:var(--txt3)">+94768700546</div></div>
              </div>
              <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--surf2);border-radius:10px">
                <div style="width:36px;height:36px;border-radius:9px;background:var(--teallt);display:flex;align-items:center;justify-content:center;color:var(--teal);flex-shrink:0"><i class="fas fa-comments"></i></div>
                <div><div style="font-size:13px;font-weight:700">Live Chat</div><div style="font-size:12px;color:var(--txt3)">Available Mon–Fri 9am–6pm</div></div>
              </div>
            </div>
          </div>
          <div class="card" style="padding:20px">
            <h3 style="font-size:14px;font-weight:800;margin-bottom:12px">Response Times</h3>
            <div style="display:flex;flex-direction:column;gap:8px">
              <div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:var(--txt2)">Live Chat</span><span style="font-weight:700;color:var(--grn)">~1 minute</span></div>
              <div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:var(--txt2)">Email</span><span style="font-weight:700;color:var(--amber)">2–4 hours</span></div>
              <div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:var(--txt2)">Ticket System</span><span style="font-weight:700;color:var(--ind)">4–24 hours</span></div>
              <div style="display:flex;justify-content:space-between;font-size:13px"><span style="color:var(--txt2)">Phone</span><span style="font-weight:700;color:var(--coral)">Immediate</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══ ANALYTICS ═══ -->
    <div id="page-analytics" class="page">
      <div style="margin-bottom:22px"><h1 class="ptitle">Support Analytics</h1><p class="psub">Track support performance metrics</p></div>
      <div class="g4" style="margin-bottom:20px" id="an-stats"></div>
      <div class="g2g" style="margin-bottom:20px">
        <div class="card" style="padding:18px 20px">
          <div style="font-size:14px;font-weight:800;margin-bottom:14px">Tickets by Category</div>
          <div id="an-cat-bars"></div>
        </div>
        <div class="card" style="padding:18px 20px">
          <div style="font-size:14px;font-weight:800;margin-bottom:14px">Status Distribution</div>
          <div id="an-status-bars"></div>
        </div>
      </div>
      <div class="card" style="padding:18px 20px">
        <div style="font-size:14px;font-weight:800;margin-bottom:14px">Recent Activity</div>
        <div id="an-activity"></div>
      </div>
    </div>

  </div><!-- /main -->
</div><!-- /app -->

<!-- ═══════════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════════ -->
<script>
/* ══════════════════════════════════════════════════
   EASY BILLING PRO — HELP & SUPPORT COMPLETE JS
   FAQ · AI Chat · Tickets · Analytics · LocalStorage
══════════════════════════════════════════════════ */

/* ── FAQ DATA ─────────────────────────── */
const FAQS = [
  // BILLING
  { id:'f1', cat:'Billing', q:'How do I generate an invoice?', a:'Go to Invoices → New Invoice. Fill in customer details, add line items with quantities and prices, set tax/discount if needed, and click Create Invoice. The system auto-generates a unique invoice number and sends it to the customer.' },
  { id:'f2', cat:'Billing', q:'How do I download a PDF invoice?', a:'Open any invoice from the Invoices page, click the Download PDF button in the Actions menu. The system will use your browser\'s print-to-PDF feature to save a professional invoice document.' },
  { id:'f3', cat:'Billing', q:'What payment methods are supported?', a:'Easy Billing Pro supports Bank Transfer, Credit Card, PayPal, Stripe, Cash, and Cheque. You can set the payment method on each invoice individually or set a default in Settings.' },
  { id:'f4', cat:'Billing', q:'How do I set up automatic payment reminders?', a:'Go to Settings → Notifications → Payment Reminders. You can configure reminders 7, 14, or 30 days before the due date, and again when invoices become overdue.' },
  { id:'f5', cat:'Billing', q:'Can I add tax to invoices?', a:'Yes! When creating or editing an invoice, each line item has a Tax % field. You can also set a default tax rate in Settings → Tax Configuration. The system automatically calculates and displays tax totals.' },
  // PRODUCTS
  { id:'f6', cat:'Products', q:'How do I add a new product?', a:'Navigate to Products → Add Product. Enter the product name, description, price, category, and stock quantity. Upload a product image using the image upload field. Click Save to add the product to your catalogue.' },
  { id:'f7', cat:'Products', q:'How do I manage product stock?', a:'Go to Products, find your product, and click Edit. Update the Stock Quantity field. The system will automatically track low stock and alert you when inventory falls below your threshold set in Settings.' },
  { id:'f8', cat:'Products', q:'Can I add product variants?', a:'Yes, Pro plan supports product variants like size, color, and material. On the product edit page, scroll to the Variants section and add options. Each variant can have its own price and stock level.' },
  { id:'f9', cat:'Products', q:'How do I apply a discount to products?', a:'You can apply discounts at the product level (permanent discount) or at the invoice level (per-transaction discount). Go to the product and set a Sale Price, or add a Discount % when creating an invoice line item.' },
  // ORDERS
  { id:'f10', cat:'Orders', q:'How do I create a new order?', a:'Go to Orders → New Order. Select a customer, add products from your catalogue, set quantities, and confirm. Orders automatically update inventory and can trigger invoice generation if configured.' },
  { id:'f11', cat:'Orders', q:'How do I cancel an order?', a:'Find the order in your Orders list, click the three-dot menu, and select Cancel Order. You\'ll be prompted to confirm and optionally add a cancellation reason. Stock will be automatically restored if applicable.' },
  { id:'f12', cat:'Orders', q:'Can customers track their orders?', a:'Yes! When an order is created, customers receive an email with a tracking link. You can also manually update order status from the Orders page. Customers see real-time status updates through the customer portal.' },
  { id:'f13', cat:'Orders', q:'How do I export order history?', a:'Go to Orders → Export. You can export as CSV or Excel. Use the date range filter to export specific periods. The export includes all order details, customer information, and financial totals.' },
  // USERS
  { id:'f14', cat:'Users', q:'How do I add a new user?', a:'Go to Users → Add User. Enter the user\'s name, email, role (Admin/Staff/Customer), and phone number. The system will send an invitation email with login credentials. You can also import users in bulk via CSV.' },
  { id:'f15', cat:'Users', q:'How do I change a user\'s role?', a:'Find the user in the Users list, click Edit, and update the Role field. Changes take effect immediately. Be careful when changing Admin roles — always ensure at least one admin account remains.' },
  { id:'f16', cat:'Users', q:'How do I reset a user\'s password?', a:'Go to Users, find the user, click the three-dot menu, and select Reset Password. This sends a secure password reset link to their email valid for 24 hours. Admins can also set a temporary password manually.' },
  // SETTINGS
  { id:'f17', cat:'Settings', q:'How do I change the company logo?', a:'Go to Settings → Company Profile. Click the logo area to upload a new image. Accepted formats are PNG, JPG, and SVG, maximum 2MB. The logo appears on all invoices and customer communications.' },
  { id:'f18', cat:'Settings', q:'How do I set up email notifications?', a:'Go to Settings → Notifications. You can configure email alerts for new orders, invoice payments, low stock, new user registrations, and system alerts. Each notification type can be individually enabled or disabled.' },
  { id:'f19', cat:'Settings', q:'Can I connect a payment gateway?', a:'Yes! Go to Settings → Integrations → Payment Gateways. We support Stripe, PayPal, Square, and more. Enter your API keys and test the connection. Payments will flow directly to your connected account.' },
];

/* ── ARTICLES DATA ───────────────────── */
const ARTICLES = [
  { id:'a1', title:'Getting Started Guide', cat:'General', icon:'fa-rocket', color:var_color('ind'), reads:1240, desc:'Complete setup guide for new Easy Billing Pro accounts' },
  { id:'a2', title:'Invoice PDF Customization', cat:'Billing', icon:'fa-file-invoice', color:var_color('amber'), reads:892, desc:'Brand your invoices with logos, colors, and custom fields' },
  { id:'a3', title:'Setting Up WhatsApp Notifications', cat:'Settings', icon:'fa-whatsapp', color:var_color('grn'), reads:748, desc:'Send invoices and payment reminders via WhatsApp' },
  { id:'a4', title:'Bulk Import Products via CSV', cat:'Products', icon:'fa-file-csv', color:var_color('coral'), reads:634, desc:'Upload hundreds of products at once with our CSV template' },
  { id:'a5', title:'Managing User Roles & Permissions', cat:'Users', icon:'fa-user-shield', color:var_color('teal'), reads:561, desc:'Control what each team member can see and do' },
  { id:'a6', title:'Understanding Invoice Statuses', cat:'Billing', icon:'fa-info-circle', color:var_color('sky'), reads:498, desc:'Learn the difference between Draft, Pending, Paid, and Overdue' },
];
function var_color(n){ return `var(--${n})`; }

/* ── AI CHAT KNOWLEDGE BASE ──────────── */
const AI_KB = [
  { patterns:['hello','hi','hey','good','greetings','start','ennada','ennada suhama','mcn','machan','suhama'], reply:'👋 Hello! I\'m EasyBot, your AI support assistant. I can help you with invoices, products, users, orders, billing, and account settings. What can I help you with today?' },
  { patterns:['invoice','invoic'], reply:'📄 For invoice issues:\n\n• **Create invoice**: Go to Invoices → New Invoice\n• **Download PDF**: Open invoice → Actions → Download PDF\n• **Send via WhatsApp**: Open invoice → Actions → Share WhatsApp\n• **Edit invoice**: Click the pencil icon on any invoice\n\nWhich invoice issue are you experiencing?' },
  { patterns:['payment','pay','paid','unpaid','overdue'], reply:'💳 For payment questions:\n\n• **Mark as paid**: Open invoice → Change status to Paid\n• **Payment reminders**: Settings → Notifications → Payment Reminders\n• **Payment methods**: We support Bank Transfer, Credit Card, PayPal, Stripe, Cash, Cheque\n• **Overdue invoices**: Check the red "Overdue" badge in your invoice list\n\nAre you trying to record a payment or configure payment settings?' },
  { patterns:['product','item','stock','inventory','catalogue'], reply:'📦 For product management:\n\n• **Add product**: Products → Add Product → Fill details → Save\n• **Update stock**: Products → Edit → Update Stock Quantity\n• **Low stock alert**: Settings → Stock → Set minimum threshold\n• **Bulk import**: Products → Import → Download CSV template\n\nAre you experiencing a specific product issue?' },
  { patterns:['user','staff','employee','team','role','permission','admin'], reply:'👥 For user management:\n\n• **Add user**: Users → Add User → Enter details → Send invite\n• **Change role**: Users → Edit → Update Role (Admin/Staff/Customer)\n• **Reset password**: Users → Three dots → Reset Password\n• **Deactivate user**: Users → Edit → Set Status to Inactive\n\nWhat user management task do you need help with?' },
  { patterns:['order','orders','purchase','buy'], reply:'🛒 For order management:\n\n• **Create order**: Orders → New Order → Select customer & products\n• **Update status**: Orders → Find order → Change Status\n• **Cancel order**: Orders → Three dots → Cancel Order\n• **Export orders**: Orders → Export → Choose CSV or Excel\n\nWhat order issue can I help you solve?' },
  { patterns:['setting','config','setup','account'], reply:'⚙️ For settings & configuration:\n\n• **Company info**: Settings → Company Profile\n• **Email templates**: Settings → Email Configuration\n• **Tax settings**: Settings → Tax Configuration\n• **Integrations**: Settings → Integrations\n• **Notifications**: Settings → Notifications\n\nWhich setting are you trying to configure?' },
  { patterns:['error','problem','issue','bug','broken','crash','not working','fail'], reply:'🔧 Troubleshooting steps:\n\n1. **Refresh** your browser (Ctrl+F5 or Cmd+Shift+R)\n2. **Clear cache**: Browser Settings → Clear Cache & Cookies\n3. **Try incognito/private** browser window\n4. **Check internet connection**\n5. **Different browser**: Try Chrome, Firefox, or Edge\n\nIf the issue persists, please create a support ticket with details about the error message and what you were doing. I\'ve logged this as a potential bug report.' },
  { patterns:['pdf','download','export','print'], reply:'📥 For downloading & exporting:\n\n• **Invoice PDF**: Open invoice → Actions → Download PDF (uses browser print)\n• **Order export**: Orders → Export button → CSV/Excel\n• **User export**: Users → Export → CSV\n• **Report**: Analytics → Download Report\n\n💡 Tip: Make sure popups aren\'t blocked in your browser for PDF downloads.' },
  { patterns:['whatsapp','message','sms','notify','notification'], reply:'📱 For WhatsApp & notifications:\n\n• **Send invoice via WhatsApp**: Open invoice → Actions → Share WhatsApp\n• **Payment reminders**: Settings → Notifications → Enable WhatsApp\n• **Phone number format**: Use international format: +1555000000\n• **Not receiving messages**: Ensure WhatsApp is installed and the number is active\n\nAre you trying to send a specific message or configure notifications?' },
  { patterns:['password','login','sign in','access','locked','forgot'], reply:'🔐 For login & access issues:\n\n• **Forgot password**: Click "Forgot Password" on login page → Check email\n• **Change password**: Settings → Security → Change Password\n• **Account locked**: Contact admin or email support@easybilling.pro\n• **2FA issues**: Settings → Security → Manage Two-Factor Auth\n\nIf you\'re completely locked out, please contact our support team at support@easybilling.pro.' },
  { patterns:['plan','upgrade','pricing','subscription','billing','cost'], reply:'💰 For account & subscription:\n\n• **Current plan**: Settings → Subscription\n• **Upgrade plan**: Settings → Subscription → Upgrade\n• **Billing history**: Settings → Subscription → Invoice History\n• **Cancel plan**: Settings → Subscription → Cancel (we\'re sad to see you go!)\n\nOur plans: Free (5 invoices/mo), Pro ($19/mo unlimited), Enterprise (custom).' },
  { patterns:['tax','vat','gst','discount'], reply:'🧾 For tax & discount settings:\n\n• **Set default tax rate**: Settings → Tax Configuration → Default Rate\n• **Add tax to invoice**: Invoice line item → Tax % field\n• **Tax-exempt customers**: Customer profile → Tax Exempt toggle\n• **Apply discount**: Invoice creation → Discount % per line item or invoice total\n\nWhat specific tax or discount scenario are you working with?' },
  { patterns:['thank','thanks','great','perfect','solved','help'], reply:'😊 You\'re welcome! I\'m glad I could help!\n\nIf you have more questions, feel free to ask. You can also:\n• 📚 Browse our **FAQ** for more answers\n• 🎫 **Create a ticket** for complex issues\n• 📧 **Email us** at support@easybilling.pro\n\nHave a great day! 🚀' },
];

const AI_DEFAULT = '🤔 I\'m not sure I fully understand your question. Could you provide more details?\n\nYou can also try:\n• Browsing our **FAQ** section\n• Using specific keywords like "invoice", "product", "payment", "user"\n• Creating a **support ticket** for personalized help\n\nOr type **"help"** to see what I can assist with.';

/* ── TICKET SEED DATA ────────────────── */
const SEED_TICKETS = [
  { id:'TKT-10001', name:'Emma Johnson', email:'emma@mail.com', subject:'Invoice not sending to client email', cat:'Billing', priority:'High', status:'In Progress', msg:'When I try to email the invoice directly from the system, the client says they never receive it. I have checked spam. Invoice #INV-1042.', date:'2025-05-08', updates:['2025-05-08: Ticket received and assigned to billing team.','2025-05-09: Engineering is investigating email delivery issue.'] },
  { id:'TKT-10002', name:'Liam Williams', email:'liam@mail.com', subject:'Can\'t add more than 10 products', cat:'Products', priority:'Medium', status:'Open', msg:'When I try to add an 11th product, the page just refreshes and nothing saves. On Free plan. Is there a limit?', date:'2025-05-09', updates:['2025-05-09: Ticket received.'] },
  { id:'TKT-10003', name:'Olivia Brown', email:'olivia@mail.com', subject:'Invoice PDF download not working on mobile', cat:'Technical', priority:'Medium', status:'Open', msg:'The Download PDF button on mobile Safari opens a blank page. Works fine on desktop Chrome.', date:'2025-05-10', updates:['2025-05-10: Ticket received, mobile issue logged.'] },
  { id:'TKT-10004', name:'Noah Davis', email:'noah@mail.com', subject:'Stripe payment integration setup help', cat:'Settings', priority:'Low', status:'Resolved', msg:'Need step-by-step guide for connecting Stripe account to easy billing pro.', date:'2025-05-06', updates:['2025-05-06: Ticket received.','2025-05-07: Solution sent via email with full Stripe setup guide.'] },
  { id:'TKT-10005', name:'Ava Martinez', email:'ava@mail.com', subject:'WhatsApp messages going to wrong number', cat:'Settings', priority:'High', status:'Resolved', msg:'System is sending WhatsApp notifications to an old phone number that I already updated in settings 3 days ago.', date:'2025-05-05', updates:['2025-05-05: Ticket received.','2025-05-06: Cache issue identified — fixed in v2.4.1.'] },
];

/* ── STATE ─────────────────────────── */
let TICKETS = JSON.parse(localStorage.getItem('ebp_tickets')||'null') || [...SEED_TICKETS];
let faqCat='All', faqQ='';
let tPage=1, tPP=10;
let filteredTickets=[...TICKETS];
let chatHistory=[];
let dark=false;

/* ── INIT ─────────────────────────── */
document.addEventListener('DOMContentLoaded',()=>{
  initTheme();
  renderPopularArticles();
  renderFAQ();
  initChat();
  renderTickets();
  renderTicketStats();
  renderAnalytics();
  setBadge();
  setTimeout(()=>toast('Welcome to Help & Support! How can we help?','info'),1200);
});

/* ── THEME ──────────────────────────── */
function initTheme(){ dark=localStorage.getItem('ebp_support_dark')==='1'; applyTheme(); }
function applyTheme(){
  document.documentElement.setAttribute('data-theme',dark?'dark':'light');
  document.getElementById('th-tr').style.background=dark?'var(--ind)':'rgba(255,255,255,.15)';
  document.getElementById('th-tb').style.transform=dark?'translateX(18px)':'translateX(0)';
}
function toggleTheme(){ dark=!dark; localStorage.setItem('ebp_support_dark',dark?'1':'0'); applyTheme(); toast(dark?'🌙 Dark mode on':'☀️ Light mode on','info'); }

/* ── SIDEBAR ───────────────────────── */
let sbOpen=true;
function toggleSB(){ if(window.innerWidth<=768){openMob();return;} sbOpen=!sbOpen; document.getElementById('sb').classList.toggle('col',!sbOpen); document.getElementById('main').classList.toggle('exp',!sbOpen); }
function openMob(){ document.getElementById('sb').classList.add('mop'); document.getElementById('mbg').style.display='block'; }
function closeMob(){ document.getElementById('sb').classList.remove('mop'); document.getElementById('mbg').style.display='none'; }

function nav(pg,el){
  document.querySelectorAll('.page').forEach(p=>p.classList.remove('act'));
  document.getElementById('page-'+pg).classList.add('act');
  document.querySelectorAll('.snl').forEach(l=>l.classList.remove('act'));
  if(el) el.classList.add('act');
  if(pg==='analytics') renderAnalytics();
  if(pg==='tickets'){ renderTickets(); renderTicketStats(); }
  closeMob();
}

function setBadge(){
  const open=TICKETS.filter(t=>t.status==='Open').length;
  const b=document.getElementById('sb-badge');
  if(b){ b.textContent=open; b.style.display=open>0?'inline':'none'; }
}

/* ── GLOBAL SEARCH ─────────────────── */
function onGlobalSearch(v){
  if(!v.trim()) return;
  nav('faq',document.querySelector('[data-pg=faq]'));
  document.getElementById('faq-q').value=v;
  filterFAQ();
}
function heroSearch(v){
  document.getElementById('hero-search').value=v;
  if(!v.trim()){ document.getElementById('search-results').style.display='none'; return; }
  const q=v.toLowerCase();
  const hits=FAQS.filter(f=>f.q.toLowerCase().includes(q)||f.a.toLowerCase().includes(q)||f.cat.toLowerCase().includes(q));
  const results=document.getElementById('search-results'), list=document.getElementById('search-results-list');
  if(!hits.length){ list.innerHTML='<p style="font-size:13px;color:var(--txt3);padding:8px 0">No results found</p>'; results.style.display='block'; return; }
  list.innerHTML=hits.slice(0,5).map(f=>`
    <div onclick="nav('faq',document.querySelector('[data-pg=faq]'));setFaqCat('${f.cat}',null);openFaqById('${f.id}')" 
      style="display:flex;align-items:center;gap:12px;padding:12px;border:1px solid var(--bdr);border-radius:11px;background:var(--surf);cursor:pointer;margin-bottom:8px;transition:all .15s" 
      onmouseenter="this.style.borderColor='var(--ind)'" onmouseleave="this.style.borderColor='var(--bdr)'">
      <div style="width:34px;height:34px;border-radius:8px;background:var(--indlt);display:flex;align-items:center;justify-content:center;color:var(--ind);flex-shrink:0"><i class="fas fa-question-circle"></i></div>
      <div style="flex:1;min-width:0">
        <div style="font-size:13.5px;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${esc(f.q)}</div>
        <div style="font-size:11.5px;color:var(--txt3)">${f.cat}</div>
      </div>
      <i class="fas fa-arrow-right" style="color:var(--txt3);font-size:12px;flex-shrink:0"></i>
    </div>`).join('');
  results.style.display='block';
}

/* ── POPULAR ARTICLES ─────────────── */
function renderPopularArticles(){
  const el=document.getElementById('popular-articles');if(!el)return;
  el.innerHTML=ARTICLES.map(a=>`
    <div class="art-card" onclick="openArticle('${a.id}')">
      <div style="display:flex;align-items:flex-start;gap:12px">
        <div style="width:38px;height:38px;border-radius:9px;background:${a.color}1a;display:flex;align-items:center;justify-content:center;font-size:16px;color:${a.color};flex-shrink:0"><i class="fas ${a.icon}"></i></div>
        <div style="flex:1;min-width:0">
          <div style="font-size:13.5px;font-weight:800;margin-bottom:3px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${esc(a.title)}</div>
          <div style="font-size:12px;color:var(--txt3);margin-bottom:8px">${esc(a.desc)}</div>
          <div style="display:flex;align-items:center;justify-content:space-between">
            <span class="art-tag" style="background:${a.color}1a;color:${a.color}">${a.cat}</span>
            <span style="font-size:11.5px;color:var(--txt3)"><i class="fas fa-eye" style="margin-right:3px"></i>${a.reads.toLocaleString()} reads</span>
          </div>
        </div>
      </div>
    </div>`).join('');
}
function openArticle(id){
  const a=ARTICLES.find(x=>x.id===id);if(!a)return;
  document.getElementById('art-title').textContent=a.title;
  document.getElementById('art-body').innerHTML=`
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:16px;flex-wrap:wrap">
      <span class="art-tag" style="background:${a.color}1a;color:${a.color}">${a.cat}</span>
      <span style="font-size:12px;color:var(--txt3)"><i class="fas fa-eye" style="margin-right:3px"></i>${a.reads.toLocaleString()} reads</span>
    </div>
    <p style="font-size:14px;color:var(--txt2);line-height:1.7;margin-bottom:16px">${esc(a.desc)}</p>
    <div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:10px;padding:16px">
      <p style="font-size:13.5px;color:var(--txt2);line-height:1.7">This is a sample article preview. The full article includes step-by-step instructions, screenshots, and video tutorials. In a production environment, article content would be loaded from your knowledge base API.</p>
    </div>
    <div style="margin-top:18px;padding-top:16px;border-top:1px solid var(--bdr)">
      <div style="font-size:13px;font-weight:700;margin-bottom:8px">Was this article helpful?</div>
      <div style="display:flex;gap:8px">
        <button class="btn btn-ghost btn-sm" onclick="toast('Thanks for your feedback! 👍','success')"><i class="fas fa-thumbs-up"></i> Yes</button>
        <button class="btn btn-ghost btn-sm" onclick="toast('Sorry! We\'ll improve this article.','warn')"><i class="fas fa-thumbs-down"></i> No</button>
      </div>
    </div>`;
  openOv('art-ov');
}

/* ── FAQ ────────────────────────────── */
function setFaqCat(cat,el){
  faqCat=cat;
  document.querySelectorAll('.cat-tab').forEach(t=>t.classList.remove('on'));
  if(el) el.classList.add('on');
  filterFAQ();
}
function filterCat(cat){
  faqCat=cat;
  document.querySelectorAll('.cat-tab').forEach(t=>{ t.classList.toggle('on', t.textContent===cat); });
  filterFAQ();
}
function filterFAQ(){
  faqQ=(document.getElementById('faq-q')?.value||'').toLowerCase();
  let items=FAQS.filter(f=>faqCat==='All'||f.cat===faqCat);
  if(faqQ) items=items.filter(f=>f.q.toLowerCase().includes(faqQ)||f.a.toLowerCase().includes(faqQ));
  const el=document.getElementById('faq-list'), emp=document.getElementById('faq-empty');
  if(!items.length){el.innerHTML='';emp.style.display='flex';return;}
  emp.style.display='none';
  el.innerHTML=items.map(f=>`
    <div class="acc-item" id="acc-${f.id}">
      <div class="acc-trigger" onclick="toggleAcc('${f.id}')">
        <span>${esc(f.q)}</span>
        <div style="display:flex;align-items:center;gap:8px">
          <span style="font-size:10.5px;font-weight:700;padding:2px 8px;border-radius:99px;background:${catColor(f.cat)};color:${catTextColor(f.cat)}">${f.cat}</span>
          <i class="fas fa-chevron-down acc-ico"></i>
        </div>
      </div>
      <div class="acc-body"><div class="acc-content">${esc(f.a).replace(/\n/g,'<br/>')}</div></div>
    </div>`).join('');
}
function renderFAQ(){ filterFAQ(); }
function openFaqById(id){
  filterFAQ();
  setTimeout(()=>{ toggleAcc(id,true); document.getElementById('acc-'+id)?.scrollIntoView({behavior:'smooth',block:'start'}); },100);
}
function toggleAcc(id, forceOpen=false){
  const el=document.getElementById('acc-'+id);if(!el)return;
  if(forceOpen){ el.classList.add('open'); return; }
  const wasOpen=el.classList.contains('open');
  document.querySelectorAll('.acc-item.open').forEach(a=>a.classList.remove('open'));
  if(!wasOpen) el.classList.add('open');
}
function catColor(cat){ const m={Orders:'var(--indlt)',Products:'var(--corallt)',Users:'var(--teallt)',Billing:'var(--amberlt)',Settings:'var(--skylt)'}; return m[cat]||'var(--surf3)'; }
function catTextColor(cat){ const m={Orders:'var(--ind)',Products:'var(--coral)',Users:'var(--teal)',Billing:'var(--amber)',Settings:'var(--sky)'}; return m[cat]||'var(--txt2)'; }

/* ── AI CHAT ───────────────────────── */
const SUGGESTIONS=[
  'How do I create an invoice?','Invoice PDF not downloading','How to add a product?','Reset user password','Payment not received','WhatsApp notifications not working','How to export orders?','Setting up tax rates'
];
function initChat(){
  renderSuggestions();
  addBotMsg("👋 Hi there! I'm **EasyBot**, your AI support assistant.\n\nI can help you with:\n• 📄 Invoice & billing issues\n• 📦 Product management\n• 🛒 Order questions\n• 👥 User management\n• ⚙️ Settings & configuration\n\nType your question or click a suggestion below to get started!");
}
function renderSuggestions(){
  const el=document.getElementById('quick-suggestions');if(!el)return;
  el.innerHTML=SUGGESTIONS.map(s=>`
    <button onclick="useSuggestion('${esc(s)}')" style="text-align:left;padding:8px 12px;background:var(--surf2);border:1px solid var(--bdr);border-radius:9px;font-family:'Nunito',sans-serif;font-size:12.5px;font-weight:600;color:var(--txt2);cursor:pointer;transition:all .15s;width:100%" 
      onmouseenter="this.style.borderColor='var(--ind)';this.style.color='var(--ind)'"
      onmouseleave="this.style.borderColor='var(--bdr)';this.style.color='var(--txt2)'">${esc(s)}</button>`).join('');
}
function useSuggestion(text){ document.getElementById('chat-inp').value=text; sendChat(); }
function clearChat(){
  chatHistory=[];
  document.getElementById('chat-messages').innerHTML='';
  document.getElementById('detected-topics').textContent='Send a message to see detected topics.';
  initChat();
  toast('Chat cleared','info');
}

function addBotMsg(text){
  const el=document.getElementById('chat-messages');
  const div=document.createElement('div');
  div.className='msg-row bot';
  div.innerHTML=`
    <div class="msg-av" style="background:linear-gradient(135deg,var(--ind),var(--coral));color:#fff"><i class="fas fa-robot" style="font-size:13px"></i></div>
    <div>
      <div class="msg-bubble">${mdToHtml(text)}</div>
      <div class="msg-time">${getTime()}</div>
    </div>`;
  el.appendChild(div);
  el.scrollTop=el.scrollHeight;
}
function addUserMsg(text){
  const el=document.getElementById('chat-messages');
  const div=document.createElement('div');
  div.className='msg-row user';
  div.innerHTML=`
    <div class="msg-av" style="background:var(--surf2);border:1px solid var(--bdr);color:var(--ind);font-size:12px;font-weight:800">U</div>
    <div>
      <div class="msg-bubble">${esc(text).replace(/\n/g,'<br/>')}</div>
      <div class="msg-time" style="text-align:right">${getTime()}</div>
    </div>`;
  el.appendChild(div);
  el.scrollTop=el.scrollHeight;
}
function addTypingIndicator(){
  const el=document.getElementById('chat-messages');
  const div=document.createElement('div');
  div.id='typing-ind';div.className='msg-row bot';
  div.innerHTML=`
    <div class="msg-av" style="background:linear-gradient(135deg,var(--ind),var(--coral));color:#fff"><i class="fas fa-robot" style="font-size:13px"></i></div>
    <div class="msg-bubble" style="padding:12px 16px">
      <span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>
    </div>`;
  el.appendChild(div);
  el.scrollTop=el.scrollHeight;
  return div;
}

function sendChat(){
  const inp=document.getElementById('chat-inp');
  const text=inp.value.trim();if(!text)return;
  inp.value='';
  addUserMsg(text);
  chatHistory.push({role:'user',text});
  const typing=addTypingIndicator();
  updateDetectedTopics(text);
  const delay=600+Math.random()*600;
  setTimeout(()=>{
    typing.remove();
    const reply=getAIReply(text);
    addBotMsg(reply);
    chatHistory.push({role:'bot',text:reply});
  },delay);
}

function getAIReply(msg){
  const lower=msg.toLowerCase();
  for(const entry of AI_KB){
    if(entry.patterns.some(p=>lower.includes(p))) return entry.reply;
  }
  // Context awareness
  if(lower.includes('?')) return `Good question! Let me help you with that.\n\n${AI_DEFAULT}`;
  return AI_DEFAULT;
}

function updateDetectedTopics(msg){
  const lower=msg.toLowerCase();
  const topics=[];
  if(lower.includes('invoice')||lower.includes('bill')) topics.push({label:'Billing / Invoice',color:'var(--amber)'});
  if(lower.includes('product')||lower.includes('stock')||lower.includes('item')) topics.push({label:'Product Management',color:'var(--coral)'});
  if(lower.includes('order')||lower.includes('purchase')) topics.push({label:'Orders',color:'var(--ind)'});
  if(lower.includes('user')||lower.includes('staff')||lower.includes('team')) topics.push({label:'User Management',color:'var(--teal)'});
  if(lower.includes('payment')||lower.includes('pay')) topics.push({label:'Payments',color:'var(--grn)'});
  if(lower.includes('setting')||lower.includes('config')) topics.push({label:'Settings',color:'var(--sky)'});
  if(lower.includes('error')||lower.includes('bug')||lower.includes('issue')) topics.push({label:'Technical Issue',color:'var(--red)'});
  const el=document.getElementById('detected-topics');if(!el)return;
  if(!topics.length){ el.textContent='No specific topic detected — general inquiry.'; return; }
  el.innerHTML=topics.map(t=>`<div style="display:flex;align-items:center;gap:7px;margin-bottom:7px"><span style="width:8px;height:8px;border-radius:50%;background:${t.color};flex-shrink:0"></span><span style="font-size:13px;font-weight:600">${t.label}</span></div>`).join('');
}

function mdToHtml(text){
  return esc(text)
    .replace(/\*\*(.+?)\*\*/g,'<strong>$1</strong>')
    .replace(/\n•/g,'<br>•')
    .replace(/\n/g,'<br>');
}

/* ── TICKETS ────────────────────────── */
function saveTickets(){ localStorage.setItem('ebp_tickets',JSON.stringify(TICKETS)); }
function genId(){ return 'TKT-'+String(10000+Math.floor(Math.random()*90000)).padStart(5,'0'); }

function submitTicket(e){
  e.preventDefault();
  const name=document.getElementById('tf-name').value.trim();
  const email=document.getElementById('tf-email').value.trim();
  const subject=document.getElementById('tf-subject').value.trim();
  const msg=document.getElementById('tf-msg').value.trim();
  if(!name||!email||!subject||!msg){toast('Please fill all required fields','warn');return;}
  showLoader(true);
  setTimeout(()=>{
    const t={ id:genId(), name, email, subject, cat:document.getElementById('tf-cat').value, priority:document.getElementById('tf-priority').value, status:'Open', msg, date:today(), updates:[today()+': Ticket submitted successfully.'] };
    TICKETS.unshift(t);
    saveTickets();
    closeOv('create-ov');
    clearTicketForm();
    renderTickets();
    renderTicketStats();
    setBadge();
    showLoader(false);
    toast(`Ticket ${t.id} created!`,'success');
  },600);
}
function clearTicketForm(){ ['tf-name','tf-email','tf-subject','tf-msg'].forEach(id=>{const e=document.getElementById(id);if(e)e.value='';}); }

function filterTickets(){
  const q=(document.getElementById('ticket-q')?.value||'').toLowerCase();
  const st=document.getElementById('ticket-status-f')?.value||'';
  const cat=document.getElementById('ticket-cat-f')?.value||'';
  const sort=document.getElementById('ticket-sort')?.value||'newest';
  filteredTickets=TICKETS.filter(t=>{
    const mq=!q||t.id.toLowerCase().includes(q)||t.subject.toLowerCase().includes(q)||t.name.toLowerCase().includes(q);
    return mq&&(!st||t.status===st)&&(!cat||t.cat===cat);
  });
  if(sort==='oldest') filteredTickets.sort((a,b)=>a.date.localeCompare(b.date));
  else if(sort==='priority'){const p={Critical:0,High:1,Medium:2,Low:3};filteredTickets.sort((a,b)=>p[a.priority]-p[b.priority]);}
  else filteredTickets.sort((a,b)=>b.date.localeCompare(a.date));
  tPage=1;renderTicketTable();renderTicketPg();
  const ri=document.getElementById('ticket-ri');if(ri)ri.textContent=`${filteredTickets.length} ticket${filteredTickets.length!==1?'s':''}`;
}
function resetTicketFilter(){ ['ticket-q','ticket-status-f','ticket-cat-f'].forEach(id=>{const e=document.getElementById(id);if(e)e.value='';}); document.getElementById('ticket-sort').value='newest'; filterTickets(); }

function renderTickets(){ filteredTickets=[...TICKETS]; filterTickets(); }
function renderTicketTable(){
  const tbody=document.getElementById('ticket-tbody'), empty=document.getElementById('ticket-empty');
  if(!filteredTickets.length){tbody.innerHTML='';empty.style.display='flex';return;}
  empty.style.display='none';
  const start=(tPage-1)*tPP, slice=filteredTickets.slice(start,start+tPP);
  const prioColor={Low:'var(--grn)',Medium:'var(--amber)',High:'var(--coral)',Critical:'var(--red)'};
  const sCls={Open:'b-open','In Progress':'b-prog',Resolved:'b-res'};
  tbody.innerHTML=slice.map(t=>`
    <tr>
      <td><span class="mono" style="font-size:12px;font-weight:700;color:var(--ind)">${t.id}</span></td>
      <td><div style="font-weight:700;font-size:13.5px;max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${esc(t.subject)}</div><div style="font-size:11.5px;color:var(--txt3)">${esc(t.name)}</div></td>
      <td style="font-size:12.5px;color:var(--txt2)">${t.cat}</td>
      <td><span style="font-size:12px;font-weight:700;color:${prioColor[t.priority]||'var(--txt2)'}">${t.priority}</span></td>
      <td><span class="badge ${sCls[t.status]||'b-closed'}">${t.status}</span></td>
      <td style="font-size:12.5px;color:var(--txt3)">${fmtD(t.date)}</td>
      <td>
        <div style="display:flex;align-items:center;justify-content:center;gap:4px">
          <button class="btn btn-xs btn-ghost" onclick="viewTicket('${t.id}')"><i class="fas fa-eye"></i></button>
          ${t.status!=='Resolved'?`<button class="btn btn-xs" style="background:var(--grnlt);color:var(--grn);border:none;cursor:pointer;font-family:'Nunito',sans-serif;font-size:11px;font-weight:700;border-radius:7px;padding:4px 9px" onclick="resolveTicket('${t.id}')"><i class="fas fa-check"></i></button>`:''}
          <button class="btn btn-xs" style="background:var(--redlt);color:var(--red);border:none;cursor:pointer;font-family:'Nunito',sans-serif;font-size:11px;font-weight:700;border-radius:7px;padding:4px 9px" onclick="deleteTicket('${t.id}')"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>`).join('');
}
function renderTicketPg(){
  const total=Math.max(1,Math.ceil(filteredTickets.length/tPP));
  const info=document.getElementById('ticket-pg-info'),ctrl=document.getElementById('ticket-pg-ctrl');
  if(info)info.textContent=`Page ${tPage} of ${total}`;
  if(!ctrl)return;
  let h=`<button class="pgb" onclick="goTPg(${tPage-1})" ${tPage===1?'disabled':''}>‹</button>`;
  for(let i=1;i<=total;i++){h+=`<button class="pgb ${i===tPage?'on':''}" onclick="goTPg(${i})">${i}</button>`;}
  h+=`<button class="pgb" onclick="goTPg(${tPage+1})" ${tPage===total?'disabled':''}>›</button>`;
  ctrl.innerHTML=h;
}
function goTPg(p){const t=Math.ceil(filteredTickets.length/tPP);if(p<1||p>t)return;tPage=p;renderTicketTable();renderTicketPg();}

function viewTicket(id){
  const t=TICKETS.find(x=>x.id===id);if(!t)return;
  document.getElementById('td-title').textContent=t.id+' — '+t.subject.slice(0,30);
  const prioColor={Low:'var(--grn)',Medium:'var(--amber)',High:'var(--coral)',Critical:'var(--red)'};
  const sCls={Open:'b-open','In Progress':'b-prog',Resolved:'b-res'};
  document.getElementById('td-body').innerHTML=`
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:16px">
      <span class="badge ${sCls[t.status]||'b-closed'}">${t.status}</span>
      <span style="font-size:12px;font-weight:700;padding:2px 8px;border-radius:99px;background:${prioColor[t.priority]||'var(--txt3)'}1a;color:${prioColor[t.priority]||'var(--txt3)'}">${t.priority} Priority</span>
      <span style="font-size:12px;color:var(--txt3)">${t.cat}</span>
    </div>
    <div class="g2" style="margin-bottom:14px">
      <div><label class="fl">From</label><div style="font-size:13.5px;font-weight:700">${esc(t.name)}</div><div style="font-size:12px;color:var(--txt3)">${esc(t.email)}</div></div>
      <div><label class="fl">Submitted</label><div style="font-size:13.5px;font-weight:700">${fmtD(t.date)}</div></div>
    </div>
    <div style="margin-bottom:16px"><label class="fl">Message</label><div style="background:var(--surf2);border:1px solid var(--bdr);border-radius:10px;padding:13px;font-size:13.5px;color:var(--txt2);line-height:1.65">${esc(t.msg).replace(/\n/g,'<br/>')}</div></div>
    ${t.updates&&t.updates.length?`
    <div><label class="fl">Updates (${t.updates.length})</label>
    <div style="border-left:2px solid var(--ind);padding-left:12px;display:flex;flex-direction:column;gap:8px">
      ${t.updates.map(u=>`<div style="font-size:13px;color:var(--txt2)">${esc(u)}</div>`).join('')}
    </div></div>`:''}
  `;
  document.getElementById('td-resolve-btn').onclick=()=>{resolveTicket(id);closeOv('ticket-ov');};
  document.getElementById('td-resolve-btn').style.display=t.status==='Resolved'?'none':'flex';
  openOv('ticket-ov');
}
function resolveTicket(id){
  const idx=TICKETS.findIndex(x=>x.id===id);if(idx===-1)return;
  TICKETS[idx].status='Resolved';
  TICKETS[idx].updates=[...(TICKETS[idx].updates||[]),today()+': Ticket marked as resolved.'];
  saveTickets();filterTickets();renderTicketStats();setBadge();toast(`Ticket ${id} resolved!`,'success');
}
function deleteTicket(id){
  if(!confirm('Delete this ticket?'))return;
  TICKETS=TICKETS.filter(x=>x.id!==id);
  saveTickets();filterTickets();renderTicketStats();setBadge();toast('Ticket deleted','warn');
}

function renderTicketStats(){
  const total=TICKETS.length, open=TICKETS.filter(t=>t.status==='Open').length;
  const prog=TICKETS.filter(t=>t.status==='In Progress').length, res=TICKETS.filter(t=>t.status==='Resolved').length;
  const el=document.getElementById('ticket-stats');if(!el)return;
  el.innerHTML=[
    {l:'Total Tickets',v:total,ico:'fa-ticket-alt',cls:'ca',bg:'var(--indlt)',ic:'var(--ind)',d:'All time',dt:'nt'},
    {l:'Open',v:open,ico:'fa-exclamation-circle',cls:'cb',bg:'var(--corallt)',ic:'var(--coral)',d:'Needs attention',dt:open>5?'dn':'nt'},
    {l:'In Progress',v:prog,ico:'fa-clock',cls:'cc',bg:'var(--amberlt)',ic:'var(--amber)',d:'Being handled',dt:'nt'},
    {l:'Resolved',v:res,ico:'fa-check-circle',cls:'cd',bg:'var(--grnlt)',ic:'var(--grn)',d:Math.round(res/Math.max(total,1)*100)+'% rate',dt:'up'},
  ].map(d=>`<div class="card sc ${d.cls}"><div class="sico" style="background:${d.bg}"><i class="fas ${d.ico}" style="color:${d.ic}"></i></div><div class="sv">${d.v}</div><div class="slbl">${d.l}</div><div class="sdelta ${d.dt}">${d.d}</div></div>`).join('');
}

/* ── ANALYTICS ─────────────────────── */
function renderAnalytics(){
  const total=TICKETS.length,open=TICKETS.filter(t=>t.status==='Open').length;
  const res=TICKETS.filter(t=>t.status==='Resolved').length,prog=TICKETS.filter(t=>t.status==='In Progress').length;
  // Stat cards
  const el=document.getElementById('an-stats');if(!el)return;
  el.innerHTML=[
    {l:'Total Tickets',v:total,ico:'fa-ticket-alt',cls:'ca',bg:'var(--indlt)',ic:'var(--ind)',d:'All time',dt:'nt'},
    {l:'Open Tickets',v:open,ico:'fa-folder-open',cls:'cb',bg:'var(--corallt)',ic:'var(--coral)',d:open+' pending',dt:open>3?'dn':'nt'},
    {l:'Resolved',v:res,ico:'fa-check-circle',cls:'cc',bg:'var(--grnlt)',ic:'var(--grn)',d:Math.round(res/Math.max(total,1)*100)+'% success',dt:'up'},
    {l:'Avg Response',v:'2.4h',ico:'fa-clock',cls:'cd',bg:'var(--amberlt)',ic:'var(--amber)',d:'Last 30 days',dt:'nt'},
  ].map(d=>`<div class="card sc ${d.cls}"><div class="sico" style="background:${d.bg}"><i class="fas ${d.ico}" style="color:${d.ic}"></i></div><div class="sv">${d.v}</div><div class="slbl">${d.l}</div><div class="sdelta ${d.dt}">${d.d}</div></div>`).join('');
  // Category bars
  const catEl=document.getElementById('an-cat-bars');if(catEl){
    const cats=['Billing','Products','Orders','Users','Settings','Technical'];
    const catMap={};TICKETS.forEach(t=>{catMap[t.cat]=(catMap[t.cat]||0)+1;});
    const max=Math.max(...cats.map(c=>catMap[c]||0),1);
    const colors=['var(--ind)','var(--coral)','var(--teal)','var(--amber)','var(--sky)','var(--grn)'];
    catEl.innerHTML=cats.map((c,i)=>`<div style="margin-bottom:12px"><div style="display:flex;justify-content:space-between;margin-bottom:4px"><span style="font-size:13px;font-weight:700">${c}</span><span class="mono" style="font-size:12px;color:var(--txt2)">${catMap[c]||0}</span></div><div style="height:7px;background:var(--surf2);border-radius:99px;overflow:hidden"><div style="height:100%;width:${Math.round((catMap[c]||0)/max*100)}%;background:${colors[i]};border-radius:99px;transition:width .6s ease"></div></div></div>`).join('');
  }
  // Status bars
  const stEl=document.getElementById('an-status-bars');if(stEl){
    const statuses=[{l:'Open',v:open,c:'var(--coral)'},{l:'In Progress',v:prog,c:'var(--amber)'},{l:'Resolved',v:res,c:'var(--grn)'}];
    const mx=Math.max(open,prog,res,1);
    stEl.innerHTML=statuses.map(s=>`<div style="margin-bottom:12px"><div style="display:flex;justify-content:space-between;margin-bottom:4px"><span style="font-size:13px;font-weight:700">${s.l}</span><span class="mono" style="font-size:12px;color:var(--txt2)">${s.v}</span></div><div style="height:7px;background:var(--surf2);border-radius:99px;overflow:hidden"><div style="height:100%;width:${Math.round(s.v/mx*100)}%;background:${s.c};border-radius:99px;transition:width .6s ease"></div></div></div>`).join('');
  }
  // Activity
  const actEl=document.getElementById('an-activity');if(actEl){
    const recent=[...TICKETS].sort((a,b)=>b.date.localeCompare(a.date)).slice(0,5);
    const sCls={Open:'b-open','In Progress':'b-prog',Resolved:'b-res'};
    actEl.innerHTML=recent.map(t=>`<div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--bdr);flex-wrap:wrap;gap:8px"><div style="min-width:0"><div style="font-size:13.5px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:300px">${esc(t.subject)}</div><div style="font-size:11.5px;color:var(--txt3)">${t.id} · ${esc(t.name)} · ${t.cat}</div></div><span class="badge ${sCls[t.status]||'b-closed'}">${t.status}</span></div>`).join('')||'<div style="font-size:13px;color:var(--txt3);padding:20px 0;text-align:center">No tickets yet</div>';
  }
}

/* ── CONTACT FORM ──────────────────── */
function submitContact(e){
  e.preventDefault();
  const name=document.getElementById('cf-name').value.trim(), email=document.getElementById('cf-email').value.trim(), subject=document.getElementById('cf-subject').value.trim(), msg=document.getElementById('cf-msg').value.trim();
  if(!name||!email||!subject||!msg){toast('Please fill all required fields','warn');return;}
  document.getElementById('cf-spin').style.display='block'; document.getElementById('cf-lbl').style.display='none';
  setTimeout(()=>{
    document.getElementById('cf-spin').style.display='none'; document.getElementById('cf-lbl').style.display='';
    ['cf-name','cf-email','cf-subject','cf-msg'].forEach(id=>{const el=document.getElementById(id);if(el)el.value='';});
    toast('Message sent! We\'ll reply within 24 hours. 📧','success');
    // Auto-create ticket
    const t={id:genId(),name,email,subject:'[Contact Form] '+subject,cat:document.getElementById('cf-cat').value,priority:'Medium',status:'Open',msg,date:today(),updates:[today()+': Contact form submission received.']};
    TICKETS.unshift(t);saveTickets();setBadge();
  },1000);
}

/* ── UTILS ──────────────────────────── */
function today(){ return new Date().toISOString().split('T')[0]; }
function getTime(){ const n=new Date(); return String(n.getHours()).padStart(2,'0')+':'+String(n.getMinutes()).padStart(2,'0'); }
function fmtD(d){ if(!d)return'—'; try{return new Date(d+'T00:00:00').toLocaleDateString('en-US',{year:'numeric',month:'short',day:'numeric'})}catch{return d;} }
function esc(s){ return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
function showLoader(on){ document.getElementById('ldr').style.display=on?'flex':'none'; }
function toast(msg,type='info'){
  const icons={success:'fa-check-circle',error:'fa-times-circle',info:'fa-info-circle',warn:'fa-exclamation-triangle'};
  const cls={success:'ts',error:'te',info:'ti2',warn:'tw2'};
  const w=document.getElementById('tw'),d=document.createElement('div');
  d.className=`toast ${cls[type]||'ti2'}`;
  d.innerHTML=`<i class="fas ${icons[type]||'fa-info-circle'} ti" style="font-size:15px;flex-shrink:0"></i><span>${msg}</span>`;
  w.appendChild(d);
  setTimeout(()=>{d.classList.add('hiding');setTimeout(()=>d.remove(),280);},4000);
}
function openOv(id){ document.getElementById(id)?.classList.add('open'); }
function closeOv(id){ document.getElementById(id)?.classList.remove('open'); }
document.querySelectorAll('.ov').forEach(ov=>ov.addEventListener('click',function(e){if(e.target===this)this.classList.remove('open');}));
document.addEventListener('keydown',e=>{if(e.key==='Escape')document.querySelectorAll('.ov.open').forEach(o=>o.classList.remove('open'));});
</script>
</body>
</html>
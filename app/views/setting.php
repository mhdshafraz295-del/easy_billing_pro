<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Easy Billing Pro — Settings</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700;800;900&family=Crimson+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
  darkMode: ['attribute', '[data-theme="dark"]'],
  theme: { extend: { fontFamily: { sans: ['Geist','sans-serif'], display: ['Crimson Pro','serif'], mono: ['JetBrains Mono','monospace'] } } }
}
</script>

<style>
/* ══════════════════════════════════════════════════════
   EASY BILLING PRO — SETTINGS CONTROL CENTER
   Warm Slate · Electric Cyan · Refined Minimal
   Typography: Geist × Crimson Pro × JetBrains Mono
══════════════════════════════════════════════════════ */
:root {
  --bg:      #f4f2ef;
  --bg2:     #ede9e4;
  --surf:    #ffffff;
  --surf2:   #f8f6f3;
  --surf3:   #f0ece7;
  --bdr:     #e2ddd6;
  --bdr2:    #cec8be;
  --txt:     #1a1816;
  --txt2:    #6a5f54;
  --txt3:    #a89880;
  --acc:     #0891b2;  /* electric cyan */
  --acc2:    #0e7490;
  --acclt:   rgba(8,145,178,.1);
  --grn:     #1a7a4a;
  --grnlt:   rgba(26,122,74,.1);
  --red:     #c0202a;
  --redlt:   rgba(192,32,42,.1);
  --amb:     #b05c00;
  --amblt:   rgba(176,92,0,.1);
  --vlt:     #6a28d4;
  --vltlt:   rgba(106,40,212,.1);
  --rose:    #d4185a;
  --roselt:  rgba(212,24,90,.1);
  --sh:      0 1px 3px rgba(0,0,0,.04),0 2px 12px rgba(0,0,0,.05);
  --sh-md:   0 4px 20px rgba(0,0,0,.09);
  --sh-lg:   0 12px 44px rgba(0,0,0,.14);
  --r:       14px;
  --sbw:     248px;

  /* Theme accent — changes with color picker */
  --theme:   #0891b2;
  --themelt: rgba(8,145,178,.1);
}
[data-theme="dark"] {
  --bg:      #0d0c0a;
  --bg2:     #131210;
  --surf:    #1a1816;
  --surf2:   #221f1b;
  --surf3:   #2a261f;
  --bdr:     #322c25;
  --bdr2:    #443c33;
  --txt:     #ede8de;
  --txt2:    #a8907a;
  --txt3:    #6a5848;
  --sh:      0 1px 3px rgba(0,0,0,.3),0 2px 12px rgba(0,0,0,.2);
  --sh-md:   0 4px 20px rgba(0,0,0,.45);
  --sh-lg:   0 12px 44px rgba(0,0,0,.58);
}

*, *::before, *::after { box-sizing:border-box;margin:0;padding:0 }
html { scroll-behavior:smooth }
body { font-family:'Geist',sans-serif;background:var(--bg);color:var(--txt);min-height:100vh;transition:background .3s,color .3s;-webkit-font-smoothing:antialiased;overflow-x:hidden }
::-webkit-scrollbar { width:5px;height:5px }
::-webkit-scrollbar-track { background:transparent }
::-webkit-scrollbar-thumb { background:var(--bdr2);border-radius:99px }

/* ── APP LAYOUT ──────────────────────── */
#app { display:flex;min-height:100vh }

/* ── SIDEBAR ─────────────────────────── */
#sb { width:var(--sbw);background:#0f0d0b;min-height:100vh;position:fixed;top:0;left:0;z-index:50;display:flex;flex-direction:column;transition:width .3s cubic-bezier(.4,0,.2,1),transform .3s;overflow:hidden;flex-shrink:0 }
#sb.col { width:62px }
#sb.col .sl,#sb.col .ss,#sb.col .lt,#sb.col .ui,#sb.col .sbg { display:none!important }
#sb.col .sbl { padding:0 14px;justify-content:center }
#sb.col .snl { justify-content:center;padding:10px;gap:0 }
#sb.col .sft,.col .sur { padding:10px }
#sb.col .sur { justify-content:center }
#main { margin-left:var(--sbw);flex:1;min-width:0;transition:margin-left .3s }
#main.exp { margin-left:62px }
@media(max-width:768px){#sb{transform:translateX(-100%);width:248px!important}#sb.mop{transform:translateX(0)}#main{margin-left:0!important}#mbg{display:block}}

.sbl { height:64px;display:flex;align-items:center;gap:10px;padding:0 16px;border-bottom:1px solid rgba(255,255,255,.06);flex-shrink:0 }
.sic { width:34px;height:34px;border-radius:9px;background:var(--theme);display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:background .3s }
.sn { flex:1;overflow-y:auto;overflow-x:hidden;padding:8px 6px }
.ss { font-size:9.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.28);padding:0 10px;margin:14px 0 4px }
.snl { display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;color:rgba(255,255,255,.5);font-size:13px;font-weight:500;cursor:pointer;transition:all .15s;margin-bottom:1px;white-space:nowrap;text-decoration:none }
.snl:hover { background:rgba(255,255,255,.07);color:rgba(255,255,255,.88) }
.snl.act { background:rgba(8,145,178,.2);color:#67e8f9 }
.snl i { font-size:14px;flex-shrink:0;width:18px;text-align:center }
.sbg { margin-left:auto;background:var(--theme);color:#fff;font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:99px;transition:background .3s }
.sft { padding:8px 6px;border-top:1px solid rgba(255,255,255,.06);flex-shrink:0 }
.sur { display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:9px;cursor:pointer;transition:background .15s }
.sur:hover { background:rgba(255,255,255,.05) }
.suav { width:30px;height:30px;border-radius:8px;background:var(--theme);display:flex;align-items:center;justify-content:center;color:#fff;font-size:11px;font-weight:700;flex-shrink:0;overflow:hidden;transition:background .3s }
.suav img { width:100%;height:100%;object-fit:cover }

/* ── TOPBAR ──────────────────────────── */
#tb { height:64px;background:var(--surf);border-bottom:1px solid var(--bdr);display:flex;align-items:center;gap:10px;padding:0 20px;position:sticky;top:0;z-index:30;transition:background .3s }
.ib { width:36px;height:36px;border-radius:10px;background:var(--surf2);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--txt2);transition:all .15s;flex-shrink:0;position:relative }
.ib:hover { background:var(--surf3);color:var(--txt) }

/* ── SETTINGS LAYOUT ─────────────────── */
.settings-layout { display:grid;grid-template-columns:220px 1fr 280px;gap:20px;padding:22px 20px;max-width:1400px;margin:0 auto }
@media(max-width:1200px){.settings-layout{grid-template-columns:200px 1fr}}
@media(max-width:900px){.settings-layout{grid-template-columns:1fr}.settings-nav-col{display:none}}
@media(max-width:1200px){.ai-col{display:none}}

/* Settings Nav */
.settings-nav { position:sticky;top:80px }
.snav-item { display:flex;align-items:center;gap:9px;padding:9px 12px;border-radius:9px;font-size:13px;font-weight:600;color:var(--txt2);cursor:pointer;transition:all .15s;margin-bottom:2px }
.snav-item:hover { background:var(--surf2);color:var(--txt) }
.snav-item.on { background:var(--acclt);color:var(--acc);border-right:2px solid var(--acc) }
.snav-item i { font-size:14px;width:16px;text-align:center;flex-shrink:0 }

/* ── SECTION CARDS ───────────────────── */
.card { background:var(--surf);border:1px solid var(--bdr);border-radius:var(--r);box-shadow:var(--sh);transition:background .3s,border-color .3s }
.s-card { margin-bottom:20px;overflow:hidden }
.s-card-header { padding:18px 22px 16px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between }
.s-card-title { font-family:'Crimson Pro',serif;font-size:18px;font-weight:700;color:var(--txt);letter-spacing:-.2px;font-style:italic;display:flex;align-items:center;gap:8px }
.s-card-body { padding:20px 22px }
.s-row { display:flex;align-items:center;justify-content:space-between;padding:14px 0;border-bottom:1px solid var(--bdr) }
.s-row:last-child { border-bottom:none;padding-bottom:0 }
.s-row:first-child { padding-top:0 }
.s-label { font-size:14px;font-weight:600;color:var(--txt) }
.s-desc { font-size:12.5px;color:var(--txt3);margin-top:2px }

/* ── FORM FIELDS ─────────────────────── */
.fi { width:100%;background:var(--surf2);border:1.5px solid var(--bdr);border-radius:10px;padding:10px 13px;font-family:'Geist',sans-serif;font-size:14px;color:var(--txt);outline:none;transition:all .2s;appearance:none }
.fi:focus { border-color:var(--acc);box-shadow:0 0 0 3px var(--acclt);background:var(--surf) }
.fi::placeholder { color:var(--txt3) }
.fi.err { border-color:var(--red) }
.fi.ok { border-color:var(--grn) }
.fl { display:block;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt2);margin-bottom:5px }
.fg { margin-bottom:14px }
.g2 { display:grid;grid-template-columns:1fr 1fr;gap:12px }
@media(max-width:540px) { .g2 { grid-template-columns:1fr } }
.fi-icon { position:relative }
.fi-icon .fi { padding-right:38px }
.fi-icon .icon { position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:14px;cursor:pointer;color:var(--txt3);transition:color .15s }
.fi-icon .icon:hover { color:var(--txt) }

/* ── TOGGLE SWITCH ───────────────────── */
.toggle-wrap { display:flex;align-items:center;cursor:pointer;user-select:none;gap:0 }
.toggle-track { width:44px;height:24px;border-radius:99px;background:var(--bdr2);position:relative;transition:background .25s;flex-shrink:0 }
.toggle-track.on { background:var(--acc) }
.toggle-track.on { background:var(--theme) }
.toggle-thumb { position:absolute;top:2px;left:2px;width:20px;height:20px;border-radius:50%;background:#fff;transition:transform .25s cubic-bezier(.34,1.56,.64,1);box-shadow:0 1px 4px rgba(0,0,0,.2) }
.toggle-track.on .toggle-thumb { transform:translateX(20px) }

/* ── BUTTONS ─────────────────────────── */
.btn { display:inline-flex;align-items:center;gap:6px;padding:9px 18px;border-radius:10px;font-family:'Geist',sans-serif;font-size:13px;font-weight:600;cursor:pointer;border:none;outline:none;transition:all .15s;white-space:nowrap }
.btn-primary { background:var(--theme);color:#fff;box-shadow:0 2px 8px color-mix(in srgb, var(--theme) 30%, transparent) }
.btn-primary:hover { filter:brightness(.9);transform:translateY(-1px) }
.btn-ghost { background:transparent;color:var(--txt2);border:1.5px solid var(--bdr) }
.btn-ghost:hover { background:var(--surf2);color:var(--txt) }
.btn-danger { background:var(--red);color:#fff }
.btn-danger:hover { background:#a01818;transform:translateY(-1px) }
.btn-sm { padding:6px 13px;font-size:12.5px }
.btn-xs { padding:4px 10px;font-size:11.5px;border-radius:7px }

/* ── THEME COLOR SWATCH ──────────────── */
.swatch { width:32px;height:32px;border-radius:8px;cursor:pointer;transition:transform .15s,box-shadow .15s;border:2px solid transparent }
.swatch:hover { transform:scale(1.12) }
.swatch.sel { border-color:var(--txt);transform:scale(1.1);box-shadow:0 0 0 3px rgba(0,0,0,.15) }

/* ── FONT SIZE SLIDER ────────────────── */
.range-wrap { position:relative;width:100% }
input[type=range] { width:100%;height:6px;border-radius:99px;outline:none;cursor:pointer;-webkit-appearance:none;background:var(--bdr2);accent-color:var(--theme) }
input[type=range]::-webkit-slider-thumb { -webkit-appearance:none;width:20px;height:20px;border-radius:50%;background:var(--theme);cursor:pointer;box-shadow:0 2px 6px rgba(0,0,0,.15);transition:transform .15s }
input[type=range]::-webkit-slider-thumb:hover { transform:scale(1.1) }

/* ── PASSWORD STRENGTH ───────────────── */
.str-bar { height:4px;border-radius:99px;background:var(--bdr);overflow:hidden;margin-top:6px }
.str-fill { height:100%;border-radius:99px;transition:width .4s,background .4s }

/* ── AI PANEL ────────────────────────── */
.ai-panel-card { background:linear-gradient(145deg,#0a0f1e,#0d1a24,#10080a);border:1px solid rgba(8,145,178,.2);border-radius:var(--r);padding:18px;position:relative;overflow:hidden;box-shadow:var(--sh) }
.ai-panel-card::before { content:'';position:absolute;top:-40px;right:-40px;width:120px;height:120px;background:radial-gradient(circle,rgba(8,145,178,.18),transparent 70%) }
.ai-item { display:flex;align-items:flex-start;gap:10px;padding:10px 12px;border-radius:9px;background:rgba(255,255,255,.04);margin-bottom:7px;cursor:default;transition:background .15s }
.ai-item:last-child { margin-bottom:0 }
.ai-item:hover { background:rgba(255,255,255,.07) }
.ai-dot { width:7px;height:7px;border-radius:50%;flex-shrink:0;margin-top:4px }
.ai-txt { font-size:12.5px;color:rgba(226,232,240,.82);line-height:1.55 }
.ai-tag { font-size:9.5px;font-weight:700;padding:2px 6px;border-radius:99px;margin-right:5px }

/* ── DEVICE / SESSION ITEMS ──────────── */
.device-item { display:flex;align-items:center;gap:12px;padding:13px 0;border-bottom:1px solid var(--bdr) }
.device-item:last-child { border-bottom:none }
.device-ico { width:40px;height:40px;border-radius:10px;background:var(--surf2);border:1px solid var(--bdr);display:flex;align-items:center;justify-content:center;font-size:17px;color:var(--txt2);flex-shrink:0 }

/* ── MODALS ──────────────────────────── */
.ov { position:fixed;inset:0;background:rgba(0,0,0,.54);backdrop-filter:blur(8px);z-index:100;display:none;align-items:center;justify-content:center;padding:16px }
.ov.open { display:flex }
.modal { background:var(--surf);border:1px solid var(--bdr);border-radius:18px;width:100%;max-width:460px;box-shadow:var(--sh-lg);animation:mIn .23s cubic-bezier(.34,1.56,.64,1) }
@keyframes mIn { from{opacity:0;transform:scale(.92) translateY(14px)}to{opacity:1;transform:none} }
.mh { padding:18px 22px 14px;border-bottom:1px solid var(--bdr);display:flex;align-items:center;justify-content:space-between }
.mt { font-family:'Crimson Pro',serif;font-size:17px;font-weight:700;font-style:italic;color:var(--txt) }
.mb { padding:18px 22px }
.mf { padding:13px 22px;border-top:1px solid var(--bdr);display:flex;gap:8px;justify-content:flex-end }

/* ── TOAST ───────────────────────────── */
#tw { position:fixed;bottom:22px;right:22px;z-index:999;display:flex;flex-direction:column;gap:8px;pointer-events:none }
.toast { display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:12px;background:var(--surf);border:1px solid var(--bdr);box-shadow:var(--sh-lg);font-size:13px;font-weight:600;color:var(--txt);min-width:220px;max-width:320px;pointer-events:all;animation:tIn .27s cubic-bezier(.34,1.56,.64,1);transition:opacity .25s,transform .25s }
@keyframes tIn{from{opacity:0;transform:translateX(70px) scale(.9)}to{opacity:1;transform:none}}
.toast.hiding { opacity:0;transform:translateX(60px) }
.ts .ti{color:var(--grn)}.te .ti{color:var(--red)}.ti2 .ti{color:var(--acc)}.tw2 .ti{color:var(--amb)}

/* LOADER */
#ldr{position:fixed;inset:0;background:rgba(0,0,0,.35);backdrop-filter:blur(3px);z-index:200;display:none;align-items:center;justify-content:center}
.spin{width:40px;height:40px;border:3px solid rgba(8,145,178,.2);border-top-color:var(--acc);border-radius:50%;animation:sp .7s linear infinite}
@keyframes sp{to{transform:rotate(360deg)}}

/* STATUS BADGE */
.status-dot { width:8px;height:8px;border-radius:50%;display:inline-block;margin-right:5px }
.status-active { background:var(--grn) }
.status-inactive { background:var(--bdr2) }

/* AVATAR UPLOAD */
.avatar-upload { position:relative;display:inline-block }
.avatar-img { width:88px;height:88px;border-radius:20px;object-fit:cover;border:3px solid var(--bdr);cursor:pointer;transition:opacity .2s }
.avatar-img:hover { opacity:.85 }
.avatar-overlay { position:absolute;inset:0;border-radius:20px;background:rgba(0,0,0,.5);display:flex;align-items:center;justify-content:center;color:#fff;font-size:20px;opacity:0;transition:opacity .2s;cursor:pointer }
.avatar-upload:hover .avatar-overlay { opacity:1 }

/* MOBILE NAV TABS */
.mob-tabs { display:none;padding:12px 16px;gap:8px;overflow-x:auto;border-bottom:1px solid var(--bdr);background:var(--surf) }
@media(max-width:900px){.mob-tabs{display:flex}}
.mob-tab { padding:6px 14px;border-radius:99px;font-size:12.5px;font-weight:600;border:1.5px solid var(--bdr);color:var(--txt2);cursor:pointer;white-space:nowrap;transition:all .15s }
.mob-tab.on { background:var(--theme);border-color:var(--theme);color:#fff }

/* MISC */
#mbg{display:none;position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:40}
.mono { font-family:'JetBrains Mono',monospace }
</style>
</head>
<body>

<!-- LOADER -->
<div id="ldr"><div style="background:var(--surf);padding:26px 36px;border-radius:14px;display:flex;flex-direction:column;align-items:center;gap:13px"><div class="spin"></div><span style="font-size:13px;color:var(--txt2)">Saving…</span></div></div>

<!-- MOBILE BG -->
<div id="mbg" onclick="closeMob()"></div>

<!-- TOAST -->
<div id="tw"></div>

<!-- DELETE ACCOUNT MODAL -->
<div id="del-ov" class="ov">
  <div class="modal">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--redlt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--red)"><i class="fas fa-exclamation-triangle"></i></div>
        <span class="mt">Delete Account</span>
      </div>
      <button class="ib" onclick="closeOv('del-ov')"><i class="fas fa-times"></i></button>
    </div>
    <div class="mb">
      <div style="background:var(--redlt);border:1px solid rgba(192,32,42,.2);border-radius:10px;padding:12px 14px;margin-bottom:16px">
        <p style="font-size:13.5px;color:var(--red);font-weight:600;line-height:1.5">⚠️ This action is permanent and cannot be undone. All your data, invoices, and settings will be deleted.</p>
      </div>
      <div class="fg"><label class="fl">Type your email to confirm *</label><input type="email" class="fi" id="del-confirm-email" placeholder="your@email.com"/></div>
      <div class="fg" style="margin-bottom:0"><label class="fl">Type "DELETE" to confirm *</label><input type="text" class="fi" id="del-confirm-text" placeholder="DELETE"/></div>
    </div>
    <div class="mf">
      <button class="btn btn-ghost btn-sm" onclick="closeOv('del-ov')">Cancel</button>
      <button class="btn btn-danger btn-sm" onclick="confirmDelete()"><i class="fas fa-trash"></i>Delete Account</button>
    </div>
  </div>
</div>

<!-- 2FA SETUP MODAL -->
<div id="tfa-ov" class="ov">
  <div class="modal">
    <div class="mh"><span class="mt">Setup Two-Factor Auth</span><button class="ib" onclick="closeOv('tfa-ov')"><i class="fas fa-times"></i></button></div>
    <div class="mb">
      <div style="text-align:center;margin-bottom:18px">
        <div style="width:140px;height:140px;background:var(--surf2);border:1px solid var(--bdr);border-radius:12px;margin:0 auto 12px;display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--txt3)">
          <div>
            <div style="font-size:48px;margin-bottom:4px">📱</div>
            <div>QR Code here</div>
          </div>
        </div>
        <p style="font-size:13px;color:var(--txt2)">Scan with your authenticator app<br/><strong style="color:var(--txt)">(Google Authenticator, Authy)</strong></p>
      </div>
      <div class="fg"><label class="fl">Enter 6-digit verification code</label>
        <input type="text" class="fi" id="tfa-code" placeholder="000000" maxlength="6" style="text-align:center;font-family:'JetBrains Mono',monospace;font-size:20px;font-weight:600;letter-spacing:.4em"/>
      </div>
    </div>
    <div class="mf"><button class="btn btn-ghost btn-sm" onclick="closeOv('tfa-ov')">Cancel</button><button class="btn btn-primary btn-sm" onclick="enable2FA()"><i class="fas fa-shield-alt"></i>Enable 2FA</button></div>
  </div>
</div>

<!-- ══════════════════════════════════════
     APP SHELL
══════════════════════════════════════ -->
<div id="app">

  <!-- SIDEBAR -->
  <aside id="sb">
    <div class="sbl">
      <div class="sic"><i class="fas fa-cog" style="color:#fff;font-size:15px"></i></div>
      <div class="lt">
        <div style="font-size:14px;font-weight:800;color:#fff;letter-spacing:-.2px;font-family:'Crimson Pro',serif;font-style:italic">Easy Billing Pro</div>
        <div style="font-size:10px;color:rgba(255,255,255,.35)">Settings</div>
      </div>
    </div>
    <nav class="sn">
      <div class="ss">Account</div>
      <a class="snl act" href="#"><i class="fas fa-cog"></i><span class="sl">Settings</span><span class="sbg">Active</span></a>
      <a class="snl" href="#" onclick="window.location.href='/easy_billing_pro/app/views/help_and_support.php/'">
        <i class="fas fa-question-circle"></i><span class="sl">Help & Support</span>
      </a>
    </nav>
    <div class="sft">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 10px 10px;border-bottom:1px solid rgba(255,255,255,.06);margin-bottom:4px">
        <span class="sl" style="font-size:12px;color:rgba(255,255,255,.35)">Dark Mode</span>
        <div id="sb-th-track" onclick="toggleDark()" style="width:38px;height:20px;background:rgba(255,255,255,.15);border-radius:99px;position:relative;cursor:pointer;transition:background .2s;flex-shrink:0">
          <div id="sb-th-thumb" style="position:absolute;top:2px;left:2px;width:16px;height:16px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)"></div>
        </div>
      </div>
      <div class="sur" onclick="scrollTo('#s-profile')">
        <div class="suav" id="sb-avatar"><i class="fas fa-user" style="font-size:12px"></i></div>
        <div class="ui"><div style="font-size:13px;font-weight:600;color:rgba(255,255,255,.82)" id="sb-name">Admin User</div><div style="font-size:11px;color:rgba(255,255,255,.35)" id="sb-email">admin@company.com</div></div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div id="main">
    <!-- TOPBAR -->
    <header id="tb">
      <button class="ib" onclick="toggleSB()"><i class="fas fa-bars" style="font-size:16px"></i></button>
      <div style="flex:1">
        <div style="font-size:18px;font-weight:700;font-family:'Crimson Pro',serif;font-style:italic;color:var(--txt)">Settings</div>
        <div style="font-size:12px;color:var(--txt3)">Manage your account, appearance, security & preferences</div>
      </div>
      <div style="display:flex;align-items:center;gap:8px;margin-left:auto">
        <button class="btn btn-ghost btn-sm" onclick="resetAllSettings()"><i class="fas fa-rotate-left"></i>Reset</button>
        <button class="btn btn-primary btn-sm" onclick="saveAllSettings()"><i class="fas fa-save"></i>Save All</button>
      </div>
    </header>

    <!-- MOBILE SECTION TABS -->
    <div class="mob-tabs" id="mob-tabs">
      <div class="mob-tab on" onclick="scrollToSection('s-profile',this)">Profile</div>
      <div class="mob-tab" onclick="scrollToSection('s-account',this)">Account</div>
      <div class="mob-tab" onclick="scrollToSection('s-general',this)">General</div>
      <div class="mob-tab" onclick="scrollToSection('s-appearance',this)">Appearance</div>
      <div class="mob-tab" onclick="scrollToSection('s-notifications',this)">Notifications</div>
      <div class="mob-tab" onclick="scrollToSection('s-security',this)">Security</div>
    </div>

    <div class="settings-layout">

      <!-- ── LEFT NAV (desktop) ── -->
      <div class="settings-nav-col">
        <div class="settings-nav card" style="padding:8px">
          <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--txt3);padding:8px 12px 4px">Sections</div>
          <div class="snav-item on" onclick="scrollToSection('s-profile',this)"><i class="fas fa-user-circle"></i><span>Profile</span></div>
          <div class="snav-item" onclick="scrollToSection('s-account',this)"><i class="fas fa-lock"></i><span>Account</span></div>
          <div class="snav-item" onclick="scrollToSection('s-general',this)"><i class="fas fa-globe"></i><span>General</span></div>
          <div class="snav-item" onclick="scrollToSection('s-appearance',this)"><i class="fas fa-palette"></i><span>Appearance</span></div>
          <div class="snav-item" onclick="scrollToSection('s-notifications',this)"><i class="fas fa-bell"></i><span>Notifications</span></div>
          <div class="snav-item" onclick="scrollToSection('s-security',this)"><i class="fas fa-shield-alt"></i><span>Security</span></div>
          <div style="margin:8px 12px;height:1px;background:var(--bdr)"></div>
          <div style="padding:8px 12px">
            <div style="font-size:12px;color:var(--txt3);margin-bottom:4px">Account Status</div>
            <div style="font-size:13px;font-weight:700;color:var(--grn)"><span class="status-dot status-active"></span><span id="nav-status">Active</span></div>
            <div style="font-size:11.5px;color:var(--txt3);margin-top:5px">Last login:<br/><span class="mono" style="font-size:11px" id="nav-last-login">Today, 09:42 AM</span></div>
          </div>
        </div>
      </div>

      <!-- ── CENTER CONTENT ── -->
      <div id="settings-content">

        <!-- ════ PROFILE SETTINGS ════ -->
        <div class="card s-card" id="s-profile">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-user-circle" style="color:var(--acc)"></i>Profile Settings</div>
            <button class="btn btn-primary btn-sm" onclick="saveProfile()"><i class="fas fa-save"></i>Save Profile</button>
          </div>
          <div class="s-card-body">
            <!-- Avatar -->
            <div style="display:flex;align-items:flex-start;gap:18px;margin-bottom:22px;flex-wrap:wrap">
              <div>
                <div class="avatar-upload" onclick="document.getElementById('avatar-file').click()">
                  <img id="profile-avatar-img" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=88&h=88&fit=crop&crop=face" alt="Avatar" class="avatar-img" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 88 88%22><rect width=%2288%22 height=%2288%22 fill=%22%23e2ddd6%22/><text x=%2244%22 y=%2256%22 font-size=%2232%22 text-anchor=%22middle%22 fill=%22%23a89880%22>👤</text></svg>'"/>
                  <div class="avatar-overlay"><i class="fas fa-camera"></i></div>
                </div>
                <input type="file" id="avatar-file" accept="image/*" style="display:none" onchange="handleAvatarFile(this)"/>
              </div>
              <div style="flex:1;min-width:200px">
                <div style="font-size:14px;font-weight:700;margin-bottom:4px">Profile Photo</div>
                <p style="font-size:12.5px;color:var(--txt3);margin-bottom:12px">Upload a photo or enter an image URL. Recommended size: 200×200px</p>
                <div class="fg" style="margin-bottom:0"><label class="fl">Avatar URL</label><input type="url" class="fi" id="avatar-url" placeholder="https://example.com/photo.jpg" oninput="previewAvatar(this.value)"/></div>
              </div>
            </div>

            <div class="g2">
              <div class="fg"><label class="fl">Full Name *</label><input type="text" class="fi" id="p-name" placeholder="John Smith"/></div>
              <div class="fg"><label class="fl">Email Address *</label><input type="email" class="fi" id="p-email" placeholder="john@company.com"/></div>
            </div>
            <div class="g2">
              <div class="fg"><label class="fl">Phone Number</label><input type="tel" class="fi" id="p-phone" placeholder="+1 555 000 0000"/></div>
              <div class="fg"><label class="fl">Company / Business</label><input type="text" class="fi" id="p-company" placeholder="Acme Corp"/></div>
            </div>
            <div class="fg"><label class="fl">Address</label><input type="text" class="fi" id="p-address" placeholder="123 Main St, City, Country"/></div>
            <div class="fg" style="margin-bottom:0"><label class="fl">Bio / Job Title</label><input type="text" class="fi" id="p-bio" placeholder="e.g. CEO at Acme Corp"/></div>
          </div>
        </div>

        <!-- ════ ACCOUNT SETTINGS ════ -->
        <div class="card s-card" id="s-account">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-lock" style="color:var(--acc)"></i>Account Settings</div>
          </div>
          <div class="s-card-body">
            <!-- Change Password -->
            <div style="margin-bottom:22px">
              <div style="font-size:14px;font-weight:700;margin-bottom:14px;color:var(--txt2)">Change Password</div>
              <div class="fg"><label class="fl">Current Password</label>
                <div class="fi-icon"><input type="password" class="fi" id="pwd-current" placeholder="Enter current password"/>
                  <span class="icon" onclick="togglePwd('pwd-current',this)"><i class="fas fa-eye"></i></span></div>
              </div>
              <div class="g2">
                <div class="fg"><label class="fl">New Password</label>
                  <div class="fi-icon"><input type="password" class="fi" id="pwd-new" placeholder="Minimum 8 characters" oninput="checkPwdStrength(this.value)"/>
                    <span class="icon" onclick="togglePwd('pwd-new',this)"><i class="fas fa-eye"></i></span></div>
                  <div class="str-bar"><div class="str-fill" id="str-fill" style="width:0;background:var(--red)"></div></div>
                  <div style="font-size:11px;font-weight:700;color:var(--txt3);margin-top:4px" id="str-label"></div>
                </div>
                <div class="fg"><label class="fl">Confirm New Password</label>
                  <div class="fi-icon"><input type="password" class="fi" id="pwd-confirm" placeholder="Repeat new password" oninput="checkPwdMatch()"/>
                    <span class="icon" onclick="togglePwd('pwd-confirm',this)"><i class="fas fa-eye"></i></span></div>
                  <div id="pwd-match-msg" style="font-size:11.5px;margin-top:4px;display:none"></div>
                </div>
              </div>
              <button class="btn btn-primary btn-sm" onclick="changePassword()"><i class="fas fa-key"></i>Update Password</button>
            </div>

            <div style="height:1px;background:var(--bdr);margin:18px 0"></div>

            <!-- Account Status -->
            <div class="s-row">
              <div>
                <div class="s-label">Account Status</div>
                <div class="s-desc">Enable or disable your account access</div>
              </div>
              <div style="display:flex;align-items:center;gap:10px">
                <span id="acct-status-lbl" style="font-size:12.5px;font-weight:700;color:var(--grn)">Active</span>
                <div class="toggle-wrap" onclick="toggleAccountStatus()">
                  <div class="toggle-track on" id="acct-toggle"><div class="toggle-thumb"></div></div>
                </div>
              </div>
            </div>

            <!-- Delete Account -->
            <div class="s-row" style="border-bottom:none">
              <div>
                <div class="s-label" style="color:var(--red)">Delete Account</div>
                <div class="s-desc">Permanently delete your account and all data</div>
              </div>
              <button class="btn btn-danger btn-sm" onclick="openOv('del-ov')"><i class="fas fa-trash"></i>Delete Account</button>
            </div>
          </div>
        </div>

        <!-- ════ GENERAL SETTINGS ════ -->
        <div class="card s-card" id="s-general">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-globe" style="color:var(--acc)"></i>General Settings</div>
            <button class="btn btn-primary btn-sm" onclick="saveGeneral()"><i class="fas fa-save"></i>Save</button>
          </div>
          <div class="s-card-body">
            <div class="g2">
              <div class="fg"><label class="fl">Language</label>
                <select class="fi" id="g-lang">
                  <option value="en">🇺🇸 English (US)</option>
                  <option value="en-gb">🇬🇧 English (UK)</option>
                  <option value="fr">🇫🇷 French</option>
                  <option value="de">🇩🇪 German</option>
                  <option value="es">🇪🇸 Spanish</option>
                  <option value="pt">🇧🇷 Portuguese</option>
                  <option value="ar">🇸🇦 Arabic</option>
                  <option value="zh">🇨🇳 Chinese</option>
                  <option value="ja">🇯🇵 Japanese</option>
                </select>
              </div>
              <div class="fg"><label class="fl">Currency</label>
                <select class="fi" id="g-currency">
                  <option value="USD">$ USD — US Dollar</option>
                  <option value="EUR">€ EUR — Euro</option>
                  <option value="GBP">£ GBP — British Pound</option>
                  <option value="AED">د.إ AED — UAE Dirham</option>
                  <option value="INR">₹ INR — Indian Rupee</option>
                  <option value="CAD">CA$ CAD — Canadian Dollar</option>
                  <option value="AUD">A$ AUD — Australian Dollar</option>
                  <option value="JPY">¥ JPY — Japanese Yen</option>
                </select>
              </div>
            </div>
            <div class="g2">
              <div class="fg"><label class="fl">Timezone</label>
                <select class="fi" id="g-timezone">
                  <option value="UTC">UTC (Universal)</option>
                  <option value="EST">EST (UTC-5) — New York</option>
                  <option value="PST">PST (UTC-8) — Los Angeles</option>
                  <option value="GMT">GMT — London</option>
                  <option value="CET">CET (UTC+1) — Paris</option>
                  <option value="IST">IST (UTC+5:30) — Mumbai</option>
                  <option value="GST">GST (UTC+4) — Dubai</option>
                  <option value="JST">JST (UTC+9) — Tokyo</option>
                </select>
              </div>
              <div class="fg"><label class="fl">Date Format</label>
                <select class="fi" id="g-dateformat">
                  <option value="MM/DD/YYYY">MM/DD/YYYY (12/31/2025)</option>
                  <option value="DD/MM/YYYY">DD/MM/YYYY (31/12/2025)</option>
                  <option value="YYYY-MM-DD">YYYY-MM-DD (2025-12-31)</option>
                  <option value="DD MMM YYYY">DD MMM YYYY (31 Dec 2025)</option>
                  <option value="MMM DD, YYYY">MMM DD, YYYY (Dec 31, 2025)</option>
                </select>
              </div>
            </div>
            <div class="fg" style="margin-bottom:0"><label class="fl">Number Format</label>
              <select class="fi" id="g-numformat">
                <option value="en-US">1,234.56 (US style)</option>
                <option value="de-DE">1.234,56 (European style)</option>
                <option value="fr-FR">1 234,56 (French style)</option>
              </select>
            </div>
          </div>
        </div>

        <!-- ════ APPEARANCE ════ -->
        <div class="card s-card" id="s-appearance">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-palette" style="color:var(--acc)"></i>Appearance</div>
          </div>
          <div class="s-card-body">

            <!-- Dark Mode -->
            <div class="s-row">
              <div>
                <div class="s-label">Dark Mode</div>
                <div class="s-desc">Switch between light and dark interface theme</div>
              </div>
              <div class="toggle-wrap" onclick="toggleDark()">
                <div class="toggle-track" id="dark-toggle"><div class="toggle-thumb"></div></div>
              </div>
            </div>

            <!-- Theme Color -->
            <div class="s-row">
              <div>
                <div class="s-label">Accent Color</div>
                <div class="s-desc">Primary color used across the interface</div>
              </div>
              <div style="display:flex;gap:8px;align-items:center" id="theme-swatches">
                <div class="swatch sel" data-color="#0891b2" style="background:#0891b2" onclick="setTheme('#0891b2',this)" title="Cyan"></div>
                <div class="swatch" data-color="#2563eb" style="background:#2563eb" onclick="setTheme('#2563eb',this)" title="Blue"></div>
                <div class="swatch" data-color="#7c3aed" style="background:#7c3aed" onclick="setTheme('#7c3aed',this)" title="Violet"></div>
                <div class="swatch" data-color="#db2777" style="background:#db2777" onclick="setTheme('#db2777',this)" title="Pink"></div>
                <div class="swatch" data-color="#d97706" style="background:#d97706" onclick="setTheme('#d97706',this)" title="Amber"></div>
                <div class="swatch" data-color="#16a34a" style="background:#16a34a" onclick="setTheme('#16a34a',this)" title="Green"></div>
                <div class="swatch" data-color="#dc2626" style="background:#dc2626" onclick="setTheme('#dc2626',this)" title="Red"></div>
                <div class="swatch" data-color="#0f766e" style="background:#0f766e" onclick="setTheme('#0f766e',this)" title="Teal"></div>
              </div>
            </div>

            <!-- Font Size -->
            <div class="s-row" style="border-bottom:none">
              <div style="flex:1;margin-right:16px">
                <div class="s-label">Font Size</div>
                <div class="s-desc">Adjust the text size: <strong id="font-size-lbl">Medium (16px)</strong></div>
                <div style="margin-top:12px">
                  <input type="range" id="font-size-range" min="13" max="20" value="16" oninput="changeFontSize(this.value)" style="width:100%"/>
                  <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--txt3);margin-top:4px"><span>Small</span><span>Medium</span><span>Large</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ════ NOTIFICATIONS ════ -->
        <div class="card s-card" id="s-notifications">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-bell" style="color:var(--acc)"></i>Notification Settings</div>
            <button class="btn btn-primary btn-sm" onclick="saveNotifications()"><i class="fas fa-save"></i>Save</button>
          </div>
          <div class="s-card-body">
            <div id="notif-rows"></div>
          </div>
        </div>

        <!-- ════ SECURITY ════ -->
        <div class="card s-card" id="s-security">
          <div class="s-card-header">
            <div class="s-card-title"><i class="fas fa-shield-alt" style="color:var(--acc)"></i>Security</div>
          </div>
          <div class="s-card-body">

            <!-- 2FA -->
            <div class="s-row">
              <div>
                <div class="s-label">Two-Factor Authentication</div>
                <div class="s-desc" id="tfa-desc">Add an extra layer of security to your account</div>
              </div>
              <div style="display:flex;align-items:center;gap:10px">
                <span id="tfa-status-lbl" style="font-size:12.5px;font-weight:700;color:var(--txt3)">Disabled</span>
                <div class="toggle-wrap" onclick="handle2FA()">
                  <div class="toggle-track" id="tfa-toggle"><div class="toggle-thumb"></div></div>
                </div>
              </div>
            </div>

            <!-- Login History -->
            <div style="margin-top:18px">
              <div style="font-size:14px;font-weight:700;margin-bottom:14px;color:var(--txt2)">Recent Login Activity</div>
              <div id="login-activity-list"></div>
            </div>

            <!-- Active Devices -->
            <div style="margin-top:18px">
              <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px">
                <div style="font-size:14px;font-weight:700;color:var(--txt2)">Active Sessions</div>
                <button class="btn btn-ghost btn-xs" onclick="revokeAllSessions()"><i class="fas fa-sign-out-alt"></i>Revoke All</button>
              </div>
              <div id="devices-list"></div>
            </div>
          </div>
        </div>

      </div><!-- /center -->

      <!-- ── AI ASSISTANT PANEL ── -->
      <div class="ai-col" style="display:flex;flex-direction:column;gap:14px">

        <!-- Account Overview Card -->
        <div class="card" style="padding:16px">
          <div style="font-size:13px;font-weight:700;margin-bottom:12px;color:var(--txt)">Account Overview</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
            <div style="text-align:center;padding:10px;background:var(--surf2);border-radius:10px;border:1px solid var(--bdr)">
              <div class="mono" style="font-size:20px;font-weight:700;color:var(--acc)" id="ov-sessions">2</div>
              <div style="font-size:11px;color:var(--txt3);margin-top:2px">Active Sessions</div>
            </div>
            <div style="text-align:center;padding:10px;background:var(--surf2);border-radius:10px;border:1px solid var(--bdr)">
              <div style="font-size:16px;font-weight:700;color:var(--grn)" id="ov-status">Active</div>
              <div style="font-size:11px;color:var(--txt3);margin-top:2px">Account Status</div>
            </div>
          </div>
          <div style="margin-top:10px;padding:9px 11px;background:var(--surf2);border-radius:9px;border:1px solid var(--bdr)">
            <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt3);margin-bottom:3px">Last Login</div>
            <div class="mono" style="font-size:12px;color:var(--txt)" id="ov-last-login">Today, 09:42 AM</div>
          </div>
        </div>

        <!-- AI Assistant -->
        <div class="ai-panel-card">
          <div style="position:relative;z-index:1;display:flex;align-items:center;gap:8px;margin-bottom:14px">
            <div style="width:32px;height:32px;border-radius:9px;background:rgba(8,145,178,.2);border:1px solid rgba(8,145,178,.3);display:flex;align-items:center;justify-content:center;font-size:15px">🤖</div>
            <div>
              <div style="font-size:13px;font-weight:700;color:#e2e8f0">AI Security Advisor</div>
              <div style="font-size:11px;color:rgba(226,232,240,.5)">Smart recommendations</div>
            </div>
          </div>
          <div id="ai-tips"></div>
        </div>

        <!-- Security Score -->
        <div class="card" style="padding:16px">
          <div style="font-size:13px;font-weight:700;margin-bottom:12px">Security Score</div>
          <div style="text-align:center;margin-bottom:12px">
            <div style="font-size:42px;font-weight:900;color:var(--acc);font-family:'JetBrains Mono',monospace" id="sec-score">60</div>
            <div style="font-size:12px;color:var(--txt3)" id="sec-score-lbl">Fair — Improve your security</div>
          </div>
          <div id="sec-checks" style="display:flex;flex-direction:column;gap:6px"></div>
        </div>

      </div><!-- /ai col -->

    </div><!-- /settings layout -->
  </div><!-- /main -->
</div><!-- /app -->

<!-- ════════════════════════════════════════
     JAVASCRIPT — COMPLETE SETTINGS LOGIC
════════════════════════════════════════ -->
<script>
/* ═══════════════════════════════════════════════════
   EASY BILLING PRO — SETTINGS COMPLETE JS
   Profile · Account · General · Appearance
   Notifications · Security · AI Tips · LocalStorage
═══════════════════════════════════════════════════ */

/* ── DEFAULT SETTINGS ────────────────── */
const DEFAULTS = {
  profile: { name:'Alex Johnson', email:'alex@company.com', phone:'+1 555 0123', company:'Acme Corp', address:'123 Main St, New York, USA', bio:'CEO at Acme Corp', avatar:'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=88&h=88&fit=crop&crop=face' },
  general: { lang:'en', currency:'USD', timezone:'EST', dateformat:'MM/DD/YYYY', numformat:'en-US' },
  appearance: { dark:false, theme:'#0891b2', fontSize:16 },
  notifications: {
    email_invoices:true, email_payments:true, email_reminders:true, email_weekly:false,
    sms_payments:false, sms_alerts:false,
    order_new:true, order_status:true, order_cancelled:false,
    product_lowstock:true, product_updates:false
  },
  security: { twofa:false, accountEnabled:true },
  meta: { lastLogin: new Date().toLocaleString('en-US',{hour12:true,hour:'numeric',minute:'2-digit'})+' today', sessions:2 }
};

const NOTIF_CONFIG = [
  { section:'Email Notifications', key:'email_invoices',  label:'Invoice emails',         desc:'Email when invoice is created or paid' },
  { section:'Email Notifications', key:'email_payments',  label:'Payment confirmations',  desc:'Email when payment is received' },
  { section:'Email Notifications', key:'email_reminders', label:'Payment reminders',      desc:'Email reminder before invoice due date' },
  { section:'Email Notifications', key:'email_weekly',    label:'Weekly summary',         desc:'Weekly report of activity' },
  { section:'SMS Notifications',   key:'sms_payments',    label:'Payment SMS alerts',     desc:'SMS when payment received' },
  { section:'SMS Notifications',   key:'sms_alerts',      label:'Security SMS alerts',    desc:'SMS for login or security events' },
  { section:'Order Alerts',        key:'order_new',        label:'New order alerts',       desc:'Alert when new order is placed' },
  { section:'Order Alerts',        key:'order_status',     label:'Order status updates',   desc:'Alert when order status changes' },
  { section:'Order Alerts',        key:'order_cancelled',  label:'Cancelled order alerts', desc:'Alert when order is cancelled' },
  { section:'Product Alerts',      key:'product_lowstock', label:'Low stock alerts',       desc:'Alert when product stock is low' },
  { section:'Product Alerts',      key:'product_updates',  label:'Product update alerts',  desc:'Alert when product is updated' },
];

const DEVICES = [
  { name:'Chrome — Windows 11', icon:'fa-desktop', loc:'New York, USA', time:'Active now', current:true },
  { name:'Safari — iPhone 15', icon:'fa-mobile-alt', loc:'New York, USA', time:'2 hours ago', current:false },
  { name:'Firefox — macOS', icon:'fa-laptop', loc:'London, UK', time:'3 days ago', current:false },
];

const LOGIN_ACTIVITY = [
  { event:'Successful login', ip:'192.168.1.1', loc:'New York, USA', time:'Today, 09:42 AM', ok:true },
  { event:'Successful login', ip:'192.168.1.1', loc:'New York, USA', time:'Yesterday, 07:18 PM', ok:true },
  { event:'Failed login attempt', ip:'45.23.110.88', loc:'Unknown', time:'Yesterday, 03:05 PM', ok:false },
  { event:'Successful login', ip:'10.0.0.5', loc:'London, UK', time:'3 days ago, 11:30 AM', ok:true },
];

/* ── STATE ────────────────────────────── */
let S = JSON.parse(localStorage.getItem('ebp_settings') || 'null') || JSON.parse(JSON.stringify(DEFAULTS));
let dark = S.appearance.dark;

/* ── INIT ─────────────────────────────── */
window.addEventListener('DOMContentLoaded', () => {
  applyAllSettings();
  populateForm();
  renderNotifications();
  renderDevices();
  renderLoginActivity();
  updateAITips();
  updateSecurityScore();
  updateOverview();
  updateNavInfo();
  setTimeout(() => toast('Settings loaded from your profile 🎉', 'info'), 1000);
});

/* ── APPLY ALL SETTINGS ────────────────── */
function applyAllSettings() {
  applyTheme(S.appearance.dark);
  applyThemeColor(S.appearance.theme);
  applyFontSize(S.appearance.fontSize);
  // Theme swatches
  document.querySelectorAll('.swatch').forEach(s => s.classList.toggle('sel', s.dataset.color === S.appearance.theme));
  // Font slider
  const slider = document.getElementById('font-size-range');
  if (slider) slider.value = S.appearance.fontSize;
  updateFontLabel(S.appearance.fontSize);
  // Dark toggle
  updateDarkToggle(S.appearance.dark);
}

/* ── POPULATE FORM ─────────────────────── */
function populateForm() {
  const p = S.profile;
  setVal('p-name', p.name); setVal('p-email', p.email);
  setVal('p-phone', p.phone); setVal('p-company', p.company);
  setVal('p-address', p.address); setVal('p-bio', p.bio);
  setVal('avatar-url', p.avatar);
  if (p.avatar) { const img=document.getElementById('profile-avatar-img'); if(img) img.src=p.avatar; }
  setVal('g-lang', S.general.lang); setVal('g-currency', S.general.currency);
  setVal('g-timezone', S.general.timezone); setVal('g-dateformat', S.general.dateformat);
  setVal('g-numformat', S.general.numformat);
  // Account status toggle
  setToggle('acct-toggle', S.security.accountEnabled);
  setToggle('tfa-toggle', S.security.twofa);
  const tfa2FA = document.getElementById('tfa-status-lbl');
  if (tfa2FA) { tfa2FA.textContent = S.security.twofa ? 'Enabled' : 'Disabled'; tfa2FA.style.color = S.security.twofa ? 'var(--grn)' : 'var(--txt3)'; }
}

/* ── THEME / DARK MODE ─────────────────── */
function applyTheme(isDark) {
  document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
}
function applyThemeColor(color) {
  document.documentElement.style.setProperty('--theme', color);
  document.documentElement.style.setProperty('--acc', color);
  // Generate light version
  const r=parseInt(color.slice(1,3),16), g=parseInt(color.slice(3,5),16), b=parseInt(color.slice(5,7),16);
  document.documentElement.style.setProperty('--acclt', `rgba(${r},${g},${b},.1)`);
  document.documentElement.style.setProperty('--themelt', `rgba(${r},${g},${b},.1)`);
}
function applyFontSize(size) {
  document.documentElement.style.fontSize = size + 'px';
}
function toggleDark() {
  dark = !dark;
  S.appearance.dark = dark;
  applyTheme(dark);
  updateDarkToggle(dark);
  saveSettings();
  toast(dark ? '🌙 Dark mode enabled' : '☀️ Light mode enabled', 'info');
}
function updateDarkToggle(isDark) {
  ['dark-toggle','sb-th-track'].forEach(id => {
    const t = document.getElementById(id);
    if(t) t.classList.toggle('on', isDark);
  });
  const thumb = document.getElementById('sb-th-thumb');
  if (thumb) thumb.style.transform = isDark ? 'translateX(18px)' : 'translateX(0)';
}
function setTheme(color, el) {
  S.appearance.theme = color;
  applyThemeColor(color);
  document.querySelectorAll('.swatch').forEach(s => s.classList.remove('sel'));
  if (el) el.classList.add('sel');
  saveSettings();
  toast('Theme color updated', 'success');
}
function changeFontSize(val) {
  S.appearance.fontSize = parseInt(val);
  applyFontSize(val);
  updateFontLabel(val);
  saveSettings();
}
function updateFontLabel(val) {
  const labels = { 13:'XS (13px)', 14:'Small (14px)', 15:'Medium-S (15px)', 16:'Medium (16px)', 17:'Medium-L (17px)', 18:'Large (18px)', 19:'XL (19px)', 20:'2XL (20px)' };
  const el = document.getElementById('font-size-lbl');
  if (el) el.textContent = labels[val] || val + 'px';
}

/* ── PROFILE SAVE ──────────────────────── */
function saveProfile() {
  const name = getVal('p-name'), email = getVal('p-email');
  if (!name || !email) { toast('Name and email are required', 'warn'); return; }
  if (!isEmail(email)) { toast('Enter a valid email address', 'warn'); return; }
  S.profile = { name, email, phone:getVal('p-phone'), company:getVal('p-company'), address:getVal('p-address'), bio:getVal('p-bio'), avatar:getVal('avatar-url') || S.profile.avatar };
  saveSettings();
  updateNavInfo();
  toast('Profile saved successfully ✓', 'success');
  updateAITips();
}

function previewAvatar(url) {
  if (!url) return;
  const img = document.getElementById('profile-avatar-img');
  if (img) img.src = url;
}
function handleAvatarFile(input) {
  if (!input.files || !input.files[0]) return;
  const reader = new FileReader();
  reader.onload = e => {
    S.profile.avatar = e.target.result;
    const img = document.getElementById('profile-avatar-img');
    if (img) img.src = e.target.result;
    document.getElementById('avatar-url').value = '';
    saveSettings(); updateNavInfo();
    toast('Profile photo updated', 'success');
  };
  reader.readAsDataURL(input.files[0]);
}

/* ── PASSWORD CHANGE ──────────────────── */
let pwdVisible = { 'pwd-current':false, 'pwd-new':false, 'pwd-confirm':false };
function togglePwd(id, icon) {
  pwdVisible[id] = !pwdVisible[id];
  const inp = document.getElementById(id);
  if (inp) inp.type = pwdVisible[id] ? 'text' : 'password';
  if (icon) icon.innerHTML = `<i class="fas fa-eye${pwdVisible[id]?'-slash':''}"></i>`;
}

function checkPwdStrength(val) {
  const fill = document.getElementById('str-fill'), lbl = document.getElementById('str-label');
  if (!fill) return;
  const checks = [val.length >= 8, /[A-Z]/.test(val), /[0-9]/.test(val), /[^A-Za-z0-9]/.test(val)];
  const score = checks.filter(Boolean).length;
  const cfg = [
    {pct:'0%',col:'var(--bdr)',lbl:''},
    {pct:'25%',col:'var(--red)',lbl:'⚠️ Weak'},
    {pct:'50%',col:'var(--amb)',lbl:'😐 Fair'},
    {pct:'75%',col:'var(--acc)',lbl:'🙂 Good'},
    {pct:'100%',col:'var(--grn)',lbl:'💪 Strong'},
  ][score];
  fill.style.width = cfg.pct; fill.style.background = cfg.col;
  if (lbl) { lbl.textContent = val ? cfg.lbl : ''; lbl.style.color = cfg.col; }
  // AI tip
  if (val && score <= 1) setTimeout(() => { updateAITips(['weak-password']); }, 200);
}
function checkPwdMatch() {
  const np = getVal('pwd-new'), cp = getVal('pwd-confirm');
  const msg = document.getElementById('pwd-match-msg');
  if (!msg || !cp) { msg.style.display='none'; return; }
  msg.style.display = 'block';
  if (np === cp) { msg.textContent = '✓ Passwords match'; msg.style.color = 'var(--grn)'; }
  else { msg.textContent = '✗ Passwords do not match'; msg.style.color = 'var(--red)'; }
}
function changePassword() {
  const cur = getVal('pwd-current'), np = getVal('pwd-new'), cp = getVal('pwd-confirm');
  if (!cur || !np || !cp) { toast('Please fill all password fields', 'warn'); return; }
  if (np !== cp) { toast('New passwords do not match', 'error'); return; }
  if (np.length < 8) { toast('Password must be at least 8 characters', 'warn'); return; }
  showLoader(true);
  setTimeout(() => {
    showLoader(false);
    setVal('pwd-current',''); setVal('pwd-new',''); setVal('pwd-confirm','');
    toast('Password updated successfully 🔐', 'success');
    const fill = document.getElementById('str-fill'); if(fill) fill.style.width='0';
    updateAITips();
  }, 700);
}

/* ── ACCOUNT STATUS ────────────────────── */
function toggleAccountStatus() {
  S.security.accountEnabled = !S.security.accountEnabled;
  setToggle('acct-toggle', S.security.accountEnabled);
  const lbl = document.getElementById('acct-status-lbl');
  if (lbl) { lbl.textContent = S.security.accountEnabled ? 'Active' : 'Disabled'; lbl.style.color = S.security.accountEnabled ? 'var(--grn)' : 'var(--red)'; }
  const ovStatus = document.getElementById('ov-status');
  if (ovStatus) { ovStatus.textContent = S.security.accountEnabled ? 'Active' : 'Disabled'; ovStatus.style.color = S.security.accountEnabled ? 'var(--grn)' : 'var(--red)'; }
  saveSettings();
  toast(S.security.accountEnabled ? 'Account activated ✓' : 'Account disabled', S.security.accountEnabled ? 'success' : 'warn');
}

/* ── DELETE ACCOUNT ────────────────────── */
function confirmDelete() {
  const email = getVal('del-confirm-email'), text = getVal('del-confirm-text');
  if (!email || !text) { toast('Please fill all confirmation fields', 'warn'); return; }
  if (email !== S.profile.email) { toast('Email does not match your account', 'error'); return; }
  if (text !== 'DELETE') { toast('Please type DELETE to confirm', 'error'); return; }
  showLoader(true);
  setTimeout(() => {
    showLoader(false);
    closeOv('del-ov');
    localStorage.removeItem('ebp_settings');
    toast('Account deleted. Redirecting…', 'error');
    setTimeout(() => location.reload(), 2500);
  }, 1000);
}

/* ── GENERAL SETTINGS ─────────────────── */
function saveGeneral() {
  S.general = { lang:getVal('g-lang'), currency:getVal('g-currency'), timezone:getVal('g-timezone'), dateformat:getVal('g-dateformat'), numformat:getVal('g-numformat') };
  saveSettings();
  toast('General settings saved ✓', 'success');
}

/* ── NOTIFICATIONS ─────────────────────── */
function renderNotifications() {
  const el = document.getElementById('notif-rows'); if (!el) return;
  let lastSection = '';
  el.innerHTML = NOTIF_CONFIG.map(n => {
    const sectionHeader = n.section !== lastSection ? `<div style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--txt3);margin-top:${lastSection?'18px':'0'};margin-bottom:8px">${n.section}</div>` : '';
    lastSection = n.section;
    const on = S.notifications[n.key];
    return `${sectionHeader}<div class="s-row">
      <div><div class="s-label">${n.label}</div><div class="s-desc">${n.desc}</div></div>
      <div class="toggle-wrap" onclick="toggleNotif('${n.key}',this)">
        <div class="toggle-track ${on?'on':''}" id="nt-${n.key}"><div class="toggle-thumb"></div></div>
      </div>
    </div>`;
  }).join('');
}
function toggleNotif(key, wrap) {
  S.notifications[key] = !S.notifications[key];
  const track = document.getElementById('nt-' + key);
  if (track) track.classList.toggle('on', S.notifications[key]);
  saveSettings();
  toast(`${key.replace(/_/g,' ')} ${S.notifications[key]?'enabled':'disabled'}`, 'info');
  updateAITips();
}
function saveNotifications() { saveSettings(); toast('Notification preferences saved ✓', 'success'); }

/* ── 2FA ─────────────────────────────── */
function handle2FA() {
  if (!S.security.twofa) { openOv('tfa-ov'); return; }
  S.security.twofa = false;
  setToggle('tfa-toggle', false);
  const lbl = document.getElementById('tfa-status-lbl');
  if (lbl) { lbl.textContent = 'Disabled'; lbl.style.color = 'var(--txt3)'; }
  saveSettings(); updateAITips(); updateSecurityScore();
  toast('Two-factor authentication disabled', 'warn');
}
function enable2FA() {
  const code = getVal('tfa-code');
  if (!code || code.length !== 6 || !/^\d+$/.test(code)) { toast('Enter a valid 6-digit code', 'warn'); return; }
  showLoader(true);
  setTimeout(() => {
    showLoader(false);
    S.security.twofa = true;
    setToggle('tfa-toggle', true);
    const lbl = document.getElementById('tfa-status-lbl');
    if (lbl) { lbl.textContent = 'Enabled'; lbl.style.color = 'var(--grn)'; }
    setVal('tfa-code', '');
    closeOv('tfa-ov');
    saveSettings(); updateAITips(); updateSecurityScore();
    toast('Two-factor authentication enabled 🔐', 'success');
  }, 700);
}

/* ── DEVICES / SESSIONS ─────────────────── */
function renderDevices() {
  const el = document.getElementById('devices-list'); if (!el) return;
  el.innerHTML = DEVICES.map((d,i) => `
    <div class="device-item">
      <div class="device-ico"><i class="fas ${d.icon}"></i></div>
      <div style="flex:1;min-width:0">
        <div style="font-size:13.5px;font-weight:700;display:flex;align-items:center;gap:7px">
          ${esc(d.name)}
          ${d.current ? '<span style="font-size:10px;font-weight:700;background:var(--grnlt);color:var(--grn);padding:1px 6px;border-radius:99px">Current</span>' : ''}
        </div>
        <div style="font-size:12px;color:var(--txt3)">${d.loc} · ${d.time}</div>
      </div>
      ${!d.current ? `<button class="btn btn-xs btn-ghost" onclick="revokeDevice(${i})"><i class="fas fa-sign-out-alt"></i>Revoke</button>` : ''}
    </div>`).join('');
}
function revokeDevice(idx) {
  toast(`Session revoked: ${DEVICES[idx].name}`, 'warn');
  DEVICES.splice(idx, 1);
  renderDevices();
  const ov = document.getElementById('ov-sessions');
  if (ov) ov.textContent = DEVICES.length;
}
function revokeAllSessions() {
  const others = DEVICES.filter(d => !d.current);
  others.forEach((_, i) => DEVICES.splice(DEVICES.indexOf(_), 1));
  renderDevices();
  const ov = document.getElementById('ov-sessions');
  if (ov) ov.textContent = DEVICES.length;
  toast('All other sessions revoked', 'warn');
}
function renderLoginActivity() {
  const el = document.getElementById('login-activity-list'); if (!el) return;
  el.innerHTML = LOGIN_ACTIVITY.map(l => `
    <div class="device-item">
      <div class="device-ico" style="background:${l.ok?'var(--grnlt)':'var(--redlt)'};color:${l.ok?'var(--grn)':'var(--red)'}">
        <i class="fas ${l.ok?'fa-check':'fa-times'}"></i>
      </div>
      <div style="flex:1;min-width:0">
        <div style="font-size:13.5px;font-weight:700">${l.event}</div>
        <div style="font-size:12px;color:var(--txt3)">${l.ip} · ${l.loc} · ${l.time}</div>
      </div>
    </div>`).join('');
}

/* ── AI TIPS ─────────────────────────── */
function updateAITips(extras=[]) {
  const tips = [];
  if (!S.security.twofa) tips.push({ type:'warn', label:'SECURITY', dot:'#fbbf24', msg:'Enable Two-Factor Authentication for significantly better account security.' });
  if (!S.security.accountEnabled) tips.push({ type:'info', label:'ACCOUNT', dot:'#93c5fd', msg:'Your account is currently disabled. Enable it to restore access.' });
  if (!S.notifications.email_payments) tips.push({ type:'tip', label:'TIP', dot:'#6ee7b7', msg:'Enable payment confirmation emails to stay informed about all transactions.' });
  if (DEVICES.length >= 3) tips.push({ type:'warn', label:'SESSIONS', dot:'#fca5a5', msg:`You have ${DEVICES.length} active sessions. Revoke unused ones for better security.` });
  if (extras.includes('weak-password')) tips.push({ type:'warn', label:'PASSWORD', dot:'#fca5a5', msg:'Your new password is weak. Use 8+ characters with uppercase, numbers, and symbols.' });
  tips.push({ type:'tip', label:'TIP', dot:'#c4b5fd', msg:'Your security score can be improved by enabling 2FA and using a strong password.' });
  const el = document.getElementById('ai-tips'); if (!el) return;
  const colors = { warn:'rgba(251,191,36,.3)', tip:'rgba(196,181,253,.3)', info:'rgba(147,197,253,.3)' };
  el.innerHTML = tips.slice(0,5).map(t => `
    <div class="ai-item">
      <div class="ai-dot" style="background:${t.dot}"></div>
      <div class="ai-txt"><span class="ai-tag" style="background:${colors[t.type]||colors.tip};color:${t.dot}">${t.label}</span>${t.msg}</div>
    </div>`).join('');
}

/* ── SECURITY SCORE ─────────────────────── */
function updateSecurityScore() {
  let score = 0;
  const checks = [
    { done: S.security.twofa, label:'Two-Factor Auth enabled', points:25 },
    { done: true, label:'Account has a password set', points:20 },
    { done: S.security.accountEnabled, label:'Account is active', points:10 },
    { done: S.notifications.email_payments, label:'Payment notifications on', points:15 },
    { done: S.profile.phone && S.profile.phone.length > 5, label:'Phone number added', points:15 },
    { done: DEVICES.length <= 2, label:'Limited active sessions', points:15 },
  ];
  checks.forEach(c => { if (c.done) score += c.points; });
  const el = document.getElementById('sec-score'), lbl = document.getElementById('sec-score-lbl');
  if (el) el.textContent = score;
  if (lbl) {
    const info = score >= 80 ? {txt:'Excellent security!', col:'var(--grn)'} : score >= 60 ? {txt:'Fair — Improve your security', col:'var(--acc)'} : {txt:'Weak — Take action now', col:'var(--red)'};
    lbl.textContent = info.txt; lbl.style.color = info.col;
    el.style.color = info.col;
  }
  const chEl = document.getElementById('sec-checks'); if (!chEl) return;
  chEl.innerHTML = checks.map(c => `
    <div style="display:flex;align-items:center;gap:8px;font-size:12.5px">
      <i class="fas fa-${c.done?'check-circle':'times-circle'}" style="color:${c.done?'var(--grn)':'var(--red)'};flex-shrink:0"></i>
      <span style="color:${c.done?'var(--txt)':'var(--txt3)'}">${c.label}</span>
      ${c.done?`<span class="mono" style="margin-left:auto;font-size:10.5px;color:var(--grn)">+${c.points}</span>`:''}
    </div>`).join('');
}

/* ── OVERVIEW ────────────────────────── */
function updateOverview() {
  const ov = document.getElementById('ov-sessions');
  if (ov) ov.textContent = DEVICES.length;
  const ovS = document.getElementById('ov-status');
  if (ovS) { ovS.textContent = S.security.accountEnabled ? 'Active' : 'Disabled'; ovS.style.color = S.security.accountEnabled ? 'var(--grn)' : 'var(--red)'; }
  const lt = new Date().toLocaleString('en-US',{hour12:true,hour:'numeric',minute:'2-digit',weekday:'short'});
  ['ov-last-login','nav-last-login'].forEach(id => { const e=document.getElementById(id); if(e) e.textContent = lt; });
}
function updateNavInfo() {
  const nbName = document.getElementById('sb-name'); if (nbName) nbName.textContent = S.profile.name;
  const nbEmail = document.getElementById('sb-email'); if (nbEmail) nbEmail.textContent = S.profile.email;
  const sbAv = document.getElementById('sb-avatar');
  if (sbAv && S.profile.avatar) sbAv.innerHTML = `<img src="${S.profile.avatar}" style="width:100%;height:100%;object-fit:cover;border-radius:8px" onerror="this.parentElement.innerHTML='<i class=\\'fas fa-user\\'style=\\'font-size:12px\\'></i>'"/>`;
}

/* ── SAVE ALL BUTTON ─────────────────── */
function saveAllSettings() {
  saveProfile();
  saveGeneral();
  saveNotifications();
  toast('All settings saved ✓', 'success');
}

/* ── RESET SETTINGS ─────────────────── */
function resetAllSettings() {
  if (!confirm('Reset all settings to defaults?')) return;
  S = JSON.parse(JSON.stringify(DEFAULTS));
  saveSettings();
  dark = false;
  applyAllSettings();
  populateForm();
  renderNotifications();
  updateAITips();
  updateSecurityScore();
  updateOverview();
  updateNavInfo();
  toast('Settings reset to defaults', 'warn');
}

/* ── SIDEBAR/NAV ─────────────────────── */
let sbOpen = true;
function toggleSB() {
  if (window.innerWidth <= 768) { openMob(); return; }
  sbOpen = !sbOpen;
  document.getElementById('sb').classList.toggle('col', !sbOpen);
  document.getElementById('main').classList.toggle('exp', !sbOpen);
}
function openMob() { document.getElementById('sb').classList.add('mop'); document.getElementById('mbg').style.display='block'; }
function closeMob() { document.getElementById('sb').classList.remove('mop'); document.getElementById('mbg').style.display='none'; }

function scrollToSection(id, el) {
  const target = document.getElementById(id);
  if (target) { target.scrollIntoView({ behavior:'smooth', block:'start' }); target.style.outline = '2px solid var(--acc)'; setTimeout(() => target.style.outline='', 1500); }
  // Update nav
  document.querySelectorAll('.snav-item').forEach(i => i.classList.remove('on'));
  document.querySelectorAll('.mob-tab').forEach(t => t.classList.remove('on'));
  if (el) el.classList.add('on');
}

/* ── LOCALSTORAGE ─────────────────────── */
function saveSettings() { localStorage.setItem('ebp_settings', JSON.stringify(S)); }

/* ── TOGGLE HELPERS ─────────────────── */
function setToggle(id, on) {
  const t = document.getElementById(id);
  if (t) t.classList.toggle('on', on);
}

/* ── OVERLAYS ─────────────────────────── */
function openOv(id) { document.getElementById(id)?.classList.add('open'); }
function closeOv(id) { document.getElementById(id)?.classList.remove('open'); }
document.querySelectorAll('.ov').forEach(ov => ov.addEventListener('click', function(e) { if(e.target===this) this.classList.remove('open'); }));
document.addEventListener('keydown', e => { if(e.key==='Escape') document.querySelectorAll('.ov.open').forEach(o=>o.classList.remove('open')); });

/* ── LOADER ──────────────────────────── */
function showLoader(on) { document.getElementById('ldr').style.display = on ? 'flex' : 'none'; }

/* ── TOAST ───────────────────────────── */
function toast(msg, type='info') {
  const icons = {success:'fa-check-circle',error:'fa-times-circle',info:'fa-info-circle',warn:'fa-exclamation-triangle'};
  const cls   = {success:'ts',error:'te',info:'ti2',warn:'tw2'};
  const w = document.getElementById('tw'), d = document.createElement('div');
  d.className = `toast ${cls[type]||'ti2'}`;
  d.innerHTML = `<i class="fas ${icons[type]||'fa-info-circle'} ti" style="font-size:15px;flex-shrink:0"></i><span>${msg}</span>`;
  w.appendChild(d);
  setTimeout(() => { d.classList.add('hiding'); setTimeout(()=>d.remove(), 280); }, 4000);
}

/* ── UTILS ────────────────────────────── */
function getVal(id) { return document.getElementById(id)?.value || ''; }
function setVal(id, val) { const e=document.getElementById(id); if(e) e.value=val||''; }
function isEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }
function esc(s) { return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
</script>
</body>
</html>
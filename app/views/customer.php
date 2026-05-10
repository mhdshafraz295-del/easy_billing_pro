<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PulseHub CRM — Customer Management</title>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<!-- Lucide Icons CDN -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet"/>

<script>
  tailwind.config = {
    darkMode: ['attribute','[data-theme="dark"]'],
    theme: { extend: { fontFamily: { sans: ['Instrument Sans','sans-serif'], serif: ['Instrument Serif','serif'], mono: ['IBM Plex Mono','monospace'] } } }
  }
</script>

<style>
/* ══════════════════════════════════════════
   DESIGN SYSTEM — CSS VARIABLES
══════════════════════════════════════════ */
:root {
  /* Light — warm cream + deep teal */
  --bg:        #f7f5f0;
  --surface:   #ffffff;
  --surface2:  #f0ede6;
  --surface3:  #e8e3d9;
  --border:    #e0dbd0;
  --border2:   #ccc7bb;
  --text:      #1c1a16;
  --text2:     #5a5548;
  --text3:     #9b9487;
  --accent:    #0d6e6e;   /* deep teal */
  --accent2:   #0a5252;
  --accent-lt: rgba(13,110,110,0.1);
  --gold:      #b5860d;
  --gold-lt:   rgba(181,134,13,0.12);
  --rose:      #c0392b;
  --rose-lt:   rgba(192,57,43,0.1);
  --green:     #1a7a4a;
  --green-lt:  rgba(26,122,74,0.1);
  --blue:      #2563eb;
  --blue-lt:   rgba(37,99,235,0.1);
  --amber:     #b45309;
  --amber-lt:  rgba(180,83,9,0.1);
  --violet:    #6d28d9;
  --violet-lt: rgba(109,40,217,0.1);
  --wa:        #25d366;  /* WhatsApp green */
  --shadow:    0 1px 3px rgba(0,0,0,.05), 0 2px 10px rgba(0,0,0,.04);
  --shadow-md: 0 4px 20px rgba(0,0,0,.09);
  --shadow-lg: 0 12px 40px rgba(0,0,0,.14);
  --r:         13px;
  --sidebar:   258px;
}
[data-theme="dark"] {
  --bg:        #111009;
  --surface:   #1a1816;
  --surface2:  #221f1c;
  --surface3:  #2a2723;
  --border:    #2e2b26;
  --border2:   #3d3a34;
  --text:      #ede9e0;
  --text2:     #a09990;
  --text3:     #6b6560;
  --shadow:    0 1px 3px rgba(0,0,0,.3), 0 2px 10px rgba(0,0,0,.2);
  --shadow-md: 0 4px 20px rgba(0,0,0,.4);
  --shadow-lg: 0 12px 40px rgba(0,0,0,.5);
}

/* ══════════════════════════════════════════
   BASE
══════════════════════════════════════════ */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Instrument Sans', sans-serif;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  transition: background .25s, color .25s;
  -webkit-font-smoothing: antialiased;
}
::-webkit-scrollbar { width: 5px; height: 5px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 99px; }

/* ══════════════════════════════════════════
   LAYOUT
══════════════════════════════════════════ */
#app { display: flex; min-height: 100vh; }

/* SIDEBAR */
#sb {
  width: var(--sidebar);
  background: var(--surface);
  border-right: 1px solid var(--border);
  display: flex; flex-direction: column;
  position: fixed; top: 0; left: 0; height: 100vh;
  z-index: 50; overflow: hidden;
  transition: width .3s cubic-bezier(.4,0,.2,1), transform .3s cubic-bezier(.4,0,.2,1);
}
#sb.col { width: 66px; }
#sb.col .sl, #sb.col .ss, #sb.col .lt, #sb.col .ui, #sb.col .sb-badge { display: none !important; }
#sb.col .sb-logo { padding: 0 16px; justify-content: center; }
#sb.col .snav-link { justify-content: center; padding: 9px; gap: 0; }
#sb.col .sb-foot { padding: 10px; }
#sb.col .su-row { justify-content: center; padding: 9px; }
#main { margin-left: var(--sidebar); flex: 1; min-width: 0; transition: margin-left .3s cubic-bezier(.4,0,.2,1); }
#main.exp { margin-left: 66px; }

@media (max-width: 768px) {
  #sb { transform: translateX(-100%); width: 258px !important; }
  #sb.mob-open { transform: translateX(0); }
  #main { margin-left: 0 !important; }
  #mob-bg { display: block; }
}

/* SIDEBAR INTERNALS */
.sb-logo {
  height: 60px; display: flex; align-items: center; gap: 10px;
  padding: 0 16px; border-bottom: 1px solid var(--border); flex-shrink: 0;
}
.sb-icon {
  width: 32px; height: 32px; border-radius: 8px; flex-shrink: 0;
  background: var(--accent); display: flex; align-items: center; justify-content: center;
}
.snav { flex: 1; overflow-y: auto; overflow-x: hidden; padding: 8px 6px; }
.ss { font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--text3); padding: 0 10px; margin: 14px 0 4px; }
.snav-link {
  display: flex; align-items: center; gap: 9px;
  padding: 9px 10px; border-radius: 9px;
  color: var(--text2); font-size: 13.5px; font-weight: 500;
  cursor: pointer; transition: all .15s; text-decoration: none;
  margin-bottom: 1px; white-space: nowrap;
}
.snav-link:hover { background: var(--surface2); color: var(--text); }
.snav-link.act { background: var(--accent-lt); color: var(--accent); }
.snav-link svg { flex-shrink: 0; width: 17px; height: 17px; }
.sb-badge {
  margin-left: auto; background: var(--accent); color: #fff;
  font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 99px;
}
.sb-foot { padding: 8px 6px; border-top: 1px solid var(--border); flex-shrink: 0; }
.su-row {
  display: flex; align-items: center; gap: 9px;
  padding: 9px 10px; border-radius: 9px; cursor: pointer;
  transition: background .15s;
}
.su-row:hover { background: var(--surface2); }
.su-av {
  width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
  background: linear-gradient(135deg, var(--accent), var(--gold));
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 11px; font-weight: 700;
}

/* ══════════════════════════════════════════
   TOPBAR
══════════════════════════════════════════ */
#topbar {
  height: 60px; background: var(--surface);
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; gap: 10px;
  padding: 0 18px; position: sticky; top: 0; z-index: 30;
  transition: background .25s, border-color .25s;
}
.srch {
  flex: 1; max-width: 320px; position: relative;
}
.srch input {
  width: 100%; background: var(--surface2);
  border: 1px solid var(--border); border-radius: 9px;
  padding: 7.5px 13px 7.5px 34px;
  font-family: 'Instrument Sans', sans-serif; font-size: 13px; color: var(--text);
  outline: none; transition: all .2s;
}
.srch input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(13,110,110,.12); }
.srch input::placeholder { color: var(--text3); }
.srch svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: var(--text3); pointer-events: none; }
.ib {
  width: 36px; height: 36px; border-radius: 9px;
  background: var(--surface2); border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; color: var(--text2); transition: all .15s; position: relative; flex-shrink: 0;
}
.ib:hover { background: var(--surface3); color: var(--text); }
.nd { position: absolute; top: 6px; right: 6px; width: 7px; height: 7px; background: var(--rose); border-radius: 50%; border: 1.5px solid var(--surface); }

/* ══════════════════════════════════════════
   PAGES
══════════════════════════════════════════ */
.page { display: none; padding: 22px 18px; }
.page.act { display: block; }
.pg-title { font-size: 21px; font-weight: 800; letter-spacing: -.3px; display: flex; align-items: center; gap: 8px; }
.pg-sub { font-size: 12.5px; color: var(--text3); margin-top: 2px; }

/* ══════════════════════════════════════════
   CARDS
══════════════════════════════════════════ */
.card {
  background: var(--surface); border: 1px solid var(--border);
  border-radius: var(--r); box-shadow: var(--shadow);
  transition: background .25s, border-color .25s, box-shadow .2s, transform .2s;
}
.card:hover { box-shadow: var(--shadow-md); }
.sc { padding: 18px 20px; cursor: default; overflow: hidden; position: relative; }
.sc::after {
  content: ''; position: absolute; bottom: -20px; right: -20px;
  width: 80px; height: 80px; border-radius: 50%; opacity: .07;
}
.c-teal::after  { background: var(--accent); }
.c-gold::after  { background: var(--gold); }
.c-rose::after  { background: var(--rose); }
.c-green::after { background: var(--green); }
.c-blue::after  { background: var(--blue); }
.sicon { width: 38px; height: 38px; border-radius: 9px; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; }
.sval { font-size: 26px; font-weight: 800; letter-spacing: -.5px; color: var(--text); font-family: 'IBM Plex Mono', monospace; line-height: 1; }
.slbl { font-size: 12.5px; color: var(--text2); margin-top: 4px; font-weight: 500; }
.sdelta { display: inline-flex; align-items: center; gap: 3px; font-size: 11px; font-weight: 600; padding: 2px 7px; border-radius: 99px; margin-top: 7px; }
.up { background: var(--green-lt); color: var(--green); }
.dn { background: var(--rose-lt); color: var(--rose); }
.nt { background: var(--accent-lt); color: var(--accent); }

/* ══════════════════════════════════════════
   BADGES & TAGS
══════════════════════════════════════════ */
.badge {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 3px 9px; border-radius: 99px; font-size: 11.5px; font-weight: 600;
}
.badge::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: currentColor; flex-shrink: 0; }
.b-active   { background: var(--green-lt); color: var(--green); }
.b-inactive { background: var(--rose-lt);  color: var(--rose); }

.tag { display: inline-flex; align-items: center; gap: 3px; padding: 2px 7px; border-radius: 5px; font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; }
.t-vip     { background: var(--gold-lt);   color: var(--gold);   border: 1px solid rgba(181,134,13,.2); }
.t-regular { background: var(--blue-lt);   color: var(--blue);   border: 1px solid rgba(37,99,235,.15); }
.t-new     { background: var(--green-lt);  color: var(--green);  border: 1px solid rgba(26,122,74,.15); }
.t-at-risk { background: var(--rose-lt);   color: var(--rose);   border: 1px solid rgba(192,57,43,.15); }

/* ══════════════════════════════════════════
   BUTTONS
══════════════════════════════════════════ */
.btn {
  display: inline-flex; align-items: center; gap: 6px;
  padding: 9px 16px; border-radius: 9px;
  font-family: 'Instrument Sans', sans-serif; font-size: 13px; font-weight: 600;
  cursor: pointer; border: none; outline: none; transition: all .15s; white-space: nowrap;
}
.btn-primary { background: var(--accent); color: #fff; box-shadow: 0 2px 8px rgba(13,110,110,.25); }
.btn-primary:hover { background: var(--accent2); transform: translateY(-1px); }
.btn-primary:active { transform: translateY(0); }
.btn-secondary { background: var(--surface2); color: var(--text); border: 1px solid var(--border); }
.btn-secondary:hover { background: var(--surface3); }
.btn-danger { background: var(--rose); color: #fff; }
.btn-danger:hover { background: #a93226; }
.btn-wa { background: var(--wa); color: #fff; }
.btn-wa:hover { background: #1da855; }
.btn-sm  { padding: 6px 12px; font-size: 12.5px; }
.btn-xs  { padding: 4px 9px;  font-size: 11.5px; border-radius: 6px; }
.btn-gold { background: var(--gold-lt); color: var(--gold); border: 1px solid rgba(181,134,13,.2); }
.btn-gold:hover { background: rgba(181,134,13,.18); }

/* ══════════════════════════════════════════
   TABLE
══════════════════════════════════════════ */
.tbl { width: 100%; border-collapse: collapse; }
.tbl th {
  font-size: 11px; font-weight: 700; letter-spacing: .07em; text-transform: uppercase;
  color: var(--text3); padding: 11px 14px; border-bottom: 1px solid var(--border);
  text-align: left; white-space: nowrap; cursor: pointer; user-select: none;
}
.tbl th:hover { color: var(--text); }
.tbl td { padding: 13px 14px; font-size: 13.5px; border-bottom: 1px solid var(--border); color: var(--text); transition: background .1s; vertical-align: middle; }
.tbl tr:last-child td { border-bottom: none; }
.tbl tbody tr:hover td { background: var(--accent-lt); }
.tbl-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }
.sort-ico { opacity: .35; font-size: 10px; margin-left: 2px; }
.sort-ico.on { opacity: 1; color: var(--accent); }

/* ══════════════════════════════════════════
   ACTION BUTTONS
══════════════════════════════════════════ */
.ab {
  width: 28px; height: 28px; border-radius: 6px;
  display: inline-flex; align-items: center; justify-content: center;
  cursor: pointer; transition: all .15s; border: none; outline: none; background: transparent;
}
.ab-view { color: var(--accent); }  .ab-view:hover { background: var(--accent-lt); }
.ab-edit { color: var(--gold); }    .ab-edit:hover { background: var(--gold-lt); }
.ab-del  { color: var(--rose); }    .ab-del:hover  { background: var(--rose-lt); }
.ab-wa   { color: var(--wa); }      .ab-wa:hover   { background: rgba(37,211,102,.1); }

/* ══════════════════════════════════════════
   OVERLAYS / MODALS
══════════════════════════════════════════ */
.ov {
  position: fixed; inset: 0; background: rgba(0,0,0,.52);
  backdrop-filter: blur(6px); z-index: 100;
  display: none; align-items: center; justify-content: center; padding: 16px;
}
.ov.open { display: flex; }
.modal {
  background: var(--surface); border: 1px solid var(--border);
  border-radius: 17px; width: 100%; box-shadow: var(--shadow-lg);
  max-height: 93vh; overflow-y: auto;
  animation: mIn .22s cubic-bezier(.34,1.56,.64,1);
}
@keyframes mIn { from { opacity: 0; transform: scale(.93) translateY(12px); } to { opacity: 1; transform: scale(1); } }
.mh {
  padding: 19px 22px 15px; border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  position: sticky; top: 0; background: var(--surface); z-index: 2;
}
.mt { font-size: 16px; font-weight: 700; color: var(--text); }
.mb { padding: 20px 22px; }
.mf {
  padding: 14px 22px; border-top: 1px solid var(--border);
  display: flex; gap: 8px; justify-content: flex-end;
  position: sticky; bottom: 0; background: var(--surface);
}

/* ══════════════════════════════════════════
   FORMS
══════════════════════════════════════════ */
.fg { margin-bottom: 14px; }
.fl { display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .05em; color: var(--text2); margin-bottom: 5px; }
.fi, .fsel {
  width: 100%; background: var(--surface2); border: 1.5px solid var(--border);
  border-radius: 9px; padding: 9px 13px;
  font-family: 'Instrument Sans', sans-serif; font-size: 13.5px; color: var(--text);
  outline: none; transition: all .2s; appearance: none;
}
.fi:focus, .fsel:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(13,110,110,.12); background: var(--surface); }
.fi::placeholder { color: var(--text3); }
.fi.err { border-color: var(--rose); }
.fe { font-size: 11.5px; color: var(--rose); margin-top: 3px; display: none; }
.fe.show { display: block; }
.g2 { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media (max-width: 480px) { .g2 { grid-template-columns: 1fr; } }

/* ══════════════════════════════════════════
   TOAST
══════════════════════════════════════════ */
#tw { position: fixed; bottom: 20px; right: 20px; z-index: 999; display: flex; flex-direction: column; gap: 8px; pointer-events: none; }
.toast {
  display: flex; align-items: center; gap: 10px;
  padding: 11px 15px; border-radius: 11px;
  background: var(--surface); border: 1px solid var(--border);
  box-shadow: var(--shadow-lg); font-size: 13px; font-weight: 500; color: var(--text);
  min-width: 220px; max-width: 310px; pointer-events: all;
  animation: tIn .27s cubic-bezier(.34,1.56,.64,1);
  transition: opacity .25s, transform .25s;
}
@keyframes tIn { from { opacity: 0; transform: translateX(70px) scale(.9); } to { opacity: 1; transform: none; } }
.toast.hiding { opacity: 0; transform: translateX(60px); }
.toast.ts .ti { color: var(--green); }
.toast.te .ti { color: var(--rose); }
.toast.ti2 .ti { color: var(--accent); }
.toast.tw .ti { color: var(--amber); }

/* ══════════════════════════════════════════
   LOADER
══════════════════════════════════════════ */
#loader { position: fixed; inset: 0; background: rgba(0,0,0,.35); backdrop-filter: blur(3px); z-index: 200; display: none; align-items: center; justify-content: center; }
.spin { width: 40px; height: 40px; border: 3px solid rgba(13,110,110,.2); border-top-color: var(--accent); border-radius: 50%; animation: sp .7s linear infinite; }
@keyframes sp { to { transform: rotate(360deg); } }

/* ══════════════════════════════════════════
   PAGINATION
══════════════════════════════════════════ */
.pgb { width: 30px; height: 30px; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; font-size: 12.5px; font-weight: 500; cursor: pointer; border: 1px solid var(--border); color: var(--text2); background: transparent; transition: all .15s; }
.pgb:hover { background: var(--surface2); color: var(--text); }
.pgb.on { background: var(--accent); border-color: var(--accent); color: #fff; }
.pgb:disabled { opacity: .3; cursor: not-allowed; pointer-events: none; }

/* ══════════════════════════════════════════
   PROFILE CARD
══════════════════════════════════════════ */
.prof-av {
  width: 60px; height: 60px; border-radius: 14px; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px; font-weight: 800; font-family: 'Instrument Serif', serif;
  color: #fff;
}
.prof-mini-av {
  width: 38px; height: 38px; border-radius: 9px; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 14px; font-weight: 800; font-family: 'Instrument Serif', serif; color: #fff;
}

/* ══════════════════════════════════════════
   AI PANEL
══════════════════════════════════════════ */
.ai-panel {
  background: linear-gradient(140deg, #0d1a1a 0%, #0f2424 50%, #1a1208 100%);
  border: 1px solid rgba(13,110,110,.3); border-radius: var(--r);
  padding: 20px; color: #e8f5f5; position: relative; overflow: hidden;
}
.ai-panel::before {
  content: ''; position: absolute; top: -40px; right: -40px;
  width: 140px; height: 140px;
  background: radial-gradient(circle, rgba(13,110,110,.25) 0%, transparent 70%);
}
.ai-ins {
  display: flex; align-items: flex-start; gap: 10px;
  padding: 10px 12px; border-radius: 8px;
  background: rgba(255,255,255,.04); margin-bottom: 7px;
  transition: background .15s; cursor: default;
}
.ai-ins:last-child { margin-bottom: 0; }
.ai-ins:hover { background: rgba(255,255,255,.07); }
.ai-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; margin-top: 5px; }
.ai-txt { font-size: 13px; color: rgba(232,245,245,.8); line-height: 1.5; }
.ai-tag { font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 99px; margin-right: 5px; }
.at-top  { background: rgba(26,122,74,.25);  color: #6ee7b7; }
.at-warn { background: rgba(192,57,43,.25);  color: #fca5a5; }
.at-tip  { background: rgba(181,134,13,.25); color: #fde68a; }
.at-info { background: rgba(13,110,110,.25); color: #99f6e4; }

/* ══════════════════════════════════════════
   BIRTHDAY BANNER
══════════════════════════════════════════ */
.bday-banner {
  background: linear-gradient(135deg, var(--gold-lt), rgba(181,134,13,.06));
  border: 1px solid rgba(181,134,13,.25); border-radius: 11px;
  padding: 12px 16px; display: flex; align-items: center; gap: 12px;
  margin-bottom: 18px;
}

/* ══════════════════════════════════════════
   FILTER BAR
══════════════════════════════════════════ */
.fbar { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; padding: 13px 16px; border-bottom: 1px solid var(--border); }
.fi-sm { background: var(--surface2); border: 1px solid var(--border); border-radius: 8px; padding: 7px 11px; font-family: 'Instrument Sans', sans-serif; font-size: 12.5px; color: var(--text); outline: none; transition: all .2s; appearance: none; }
.fi-sm:focus { border-color: var(--accent); box-shadow: 0 0 0 2px rgba(13,110,110,.1); }

/* ══════════════════════════════════════════
   MISC
══════════════════════════════════════════ */
.divider { height: 1px; background: var(--border); margin: 14px 0; }
.mono { font-family: 'IBM Plex Mono', monospace; }
#mob-bg { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.4); z-index: 40; }

/* Layout grids */
.g4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.g3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
.g2g { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
.g73 { display: grid; grid-template-columns: 7fr 3fr; gap: 14px; }
.g64 { display: grid; grid-template-columns: 3fr 2fr; gap: 14px; }
@media (max-width: 1100px) { .g4 { grid-template-columns: repeat(2, 1fr); } .g73, .g64 { grid-template-columns: 1fr; } }
@media (max-width: 640px) { .g4, .g3, .g2g { grid-template-columns: 1fr; } }

/* Chart */
.ch-box { padding: 18px 20px; }
.ch-title { font-size: 14px; font-weight: 700; color: var(--text); margin-bottom: 2px; }
.ch-sub { font-size: 12px; color: var(--text3); margin-bottom: 16px; }

/* Empty state */
.empty { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 56px 24px; text-align: center; }
.empty-ico { width: 66px; height: 66px; border-radius: 50%; background: var(--surface2); border: 2px dashed var(--border2); display: flex; align-items: center; justify-content: center; color: var(--text3); margin-bottom: 14px; }

/* Timeline */
.tl-item { display: flex; gap: 12px; padding: 10px 0; border-bottom: 1px solid var(--border); }
.tl-item:last-child { border-bottom: none; }
.tl-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; margin-top: 5px; }
</style>
</head>

<body>

<!-- LOADER -->
<div id="loader">
  <div style="background:var(--surface);padding:24px 32px;border-radius:14px;display:flex;flex-direction:column;align-items:center;gap:12px;">
    <div class="spin"></div>
    <span style="font-size:13px;color:var(--text2);">Processing…</span>
  </div>
</div>

<!-- MOBILE BG -->
<div id="mob-bg" onclick="closeMob()"></div>

<!-- TOAST WRAP -->
<div id="tw"></div>

<!-- ════════════════════════════════════
     DELETE CONFIRM
════════════════════════════════════ -->
<div id="del-ov" class="ov">
  <div class="modal" style="max-width:380px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--rose-lt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--rose)"><i data-lucide="user-x" style="width:17px;height:17px"></i></div>
        <span class="mt">Delete Customer</span>
      </div>
      <button class="ib" onclick="closeDel()"><i data-lucide="x" style="width:15px;height:15px"></i></button>
    </div>
    <div class="mb">
      <p style="font-size:13.5px;color:var(--text2);line-height:1.6">Delete <strong id="del-name" style="color:var(--text)"></strong>? This will remove all their data permanently.</p>
    </div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeDel()">Cancel</button>
      <button class="btn btn-danger btn-sm" onclick="doDelete()"><i data-lucide="trash-2" style="width:13px;height:13px"></i> Delete</button>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════
     ADD / EDIT CUSTOMER MODAL
════════════════════════════════════ -->
<div id="cust-ov" class="ov">
  <div class="modal" style="max-width:580px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div id="modal-icon-box" style="width:33px;height:33px;background:var(--accent-lt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--accent)"><i data-lucide="user-plus" style="width:17px;height:17px" id="modal-main-icon"></i></div>
        <span class="mt" id="modal-title">Add Customer</span>
      </div>
      <button class="ib" onclick="closeModal()"><i data-lucide="x" style="width:15px;height:15px"></i></button>
    </div>
    <div class="mb">
      <form id="cust-form" onsubmit="submitForm(event)" novalidate>
        <div class="g2">
          <div class="fg">
            <label class="fl">Full Name *</label>
            <input type="text" id="f-name" class="fi" placeholder="John Smith" autocomplete="off"/>
            <div class="fe" id="e-name">Full name is required</div>
          </div>
          <div class="fg">
            <label class="fl">Phone *</label>
            <input type="tel" id="f-phone" class="fi" placeholder="+1 555 000 0000"/>
            <div class="fe" id="e-phone">Phone number is required</div>
          </div>
        </div>
        <div class="fg">
          <label class="fl">Email Address *</label>
          <input type="email" id="f-email" class="fi" placeholder="customer@email.com"/>
          <div class="fe" id="e-email">Valid email required</div>
        </div>
        <div class="fg">
          <label class="fl">Address</label>
          <input type="text" id="f-addr" class="fi" placeholder="123 Street, City, Country"/>
        </div>
        <div class="g2">
          <div class="fg">
            <label class="fl">Birthday</label>
            <input type="date" id="f-bday" class="fi"/>
          </div>
          <div class="fg">
            <label class="fl">Tag</label>
            <select id="f-tag" class="fsel">
              <option value="New">New</option>
              <option value="Regular">Regular</option>
              <option value="VIP">VIP</option>
              <option value="At Risk">At Risk</option>
            </select>
          </div>
        </div>
        <div class="fg" style="margin-bottom:0">
          <label class="fl">Notes</label>
          <textarea id="f-notes" class="fi" rows="2" placeholder="Any notes about this customer…" style="resize:none"></textarea>
        </div>
        <button type="submit" id="form-ghost" style="display:none"></button>
      </form>
    </div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeModal()">Cancel</button>
      <button class="btn btn-primary btn-sm" onclick="document.getElementById('form-ghost').click()">
        <i data-lucide="save" style="width:13px;height:13px" id="save-icon"></i>
        <span id="save-label">Add Customer</span>
      </button>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════
     VIEW CUSTOMER MODAL
════════════════════════════════════ -->
<div id="view-ov" class="ov">
  <div class="modal" style="max-width:660px">
    <div class="mh">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:33px;height:33px;background:var(--accent-lt);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--accent)"><i data-lucide="user" style="width:17px;height:17px"></i></div>
        <span class="mt" id="view-title">Customer Profile</span>
      </div>
      <button class="ib" onclick="closeView()"><i data-lucide="x" style="width:15px;height:15px"></i></button>
    </div>
    <div class="mb" id="view-body"><!-- JS fills --></div>
    <div class="mf">
      <button class="btn btn-secondary btn-sm" onclick="closeView()">Close</button>
      <button class="btn btn-wa btn-sm" id="wa-btn"><i data-lucide="message-circle" style="width:13px;height:13px"></i> WhatsApp</button>
      <button class="btn btn-primary btn-sm" id="edit-from-view-btn"><i data-lucide="pencil" style="width:13px;height:13px"></i> Edit</button>
    </div>
  </div>
</div>

<!-- ════════════════════════════════════
     APP
════════════════════════════════════ -->
<div id="app">

  <!-- SIDEBAR -->
  <aside id="sb">
    <div class="sb-logo">
      <div class="sb-icon"><i data-lucide="users" style="width:16px;height:16px;color:#fff"></i></div>
      <div class="lt">
        <div style="font-size:15px;font-weight:800;color:var(--text);letter-spacing:-.3px">Easy Billing Pro</div>
        <div style="font-size:10px;color:var(--text3);font-weight:500">Super Platform</div>
      </div>
    </div>
    <nav class="snav">
      <div class="ss">Main</div>
      <a class="snav-link act" data-pg="customers" onclick="nav('customers',this)"><i data-lucide="users"></i><span class="sl">Customers</span><span class="sb-badge" id="sb-count">0</span></a>
      <a class="snav-link" data-pg="analytics" onclick="nav('analytics',this)"><i data-lucide="bar-chart-2"></i><span class="sl">Analytics</span></a>
      <a class="snav-link" data-pg="ai" onclick="nav('ai',this)"><i data-lucide="sparkles"></i><span class="sl">AI Insights</span><span class="sb-badge" style="background:var(--violet)" class="sl">AI</span></a>
      <a class="snav-link" data-pg="birthdays" onclick="nav('birthdays',this)"><i data-lucide="cake"></i><span class="sl">Birthdays</span><span class="sb-badge" style="background:var(--gold)" id="bday-badge">0</span></a>
      <div class="ss">Tools</div>
      <a class="snav-link" onclick="exportCSV()"><i data-lucide="download"></i><span class="sl">Export CSV</span></a>
      <a class="snav-link" onclick="toast('Settings coming soon!','info')"><i data-lucide="settings"></i><span class="sl">Settings</span></a>
    </nav>
    <div class="sb-foot">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 10px 9px;border-bottom:1px solid var(--border);margin-bottom:4px">
        <span class="sl" style="font-size:12px;color:var(--text3)">Dark Mode</span>
        <div id="theme-track" onclick="toggleTheme()" style="width:38px;height:20px;background:var(--border2);border-radius:99px;position:relative;cursor:pointer;transition:background .2s;flex-shrink:0">
          <div id="theme-thumb" style="position:absolute;top:2px;left:2px;width:16px;height:16px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)"></div>
        </div>
      </div>
      <div class="su-row">
        <div class="su-av">CR</div>
        <div class="ui">
          <div style="font-size:13px;font-weight:600;color:var(--text)">CRM Admin</div>
          <div style="font-size:11px;color:var(--text3)">Super Admin</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div id="main">
    <header id="topbar">
      <button class="ib" onclick="toggleSidebar()"><i data-lucide="menu" style="width:17px;height:17px"></i></button>
      <div class="srch">
        <i data-lucide="search" style="width:14px;height:14px"></i>
        <input type="text" id="gsearch" placeholder="Search customers…" oninput="onGSearch(this.value)"/>
      </div>
      <div style="display:flex;align-items:center;gap:8px;margin-left:auto">
        <button class="btn btn-primary btn-sm" id="tb-add" onclick="openAdd()" style="display:none">
          <i data-lucide="plus" style="width:13px;height:13px"></i>Add Customer
        </button>
        <button class="ib" onclick="toast('3 birthdays this week! 🎂','warn')">
          <i data-lucide="cake" style="width:17px;height:17px"></i>
          <span class="nd"></span>
        </button>
        <button class="ib" onclick="toast('No new notifications','info')">
          <i data-lucide="bell" style="width:17px;height:17px"></i>
        </button>
        <img src="https://api.dicebear.com/8.x/lorelei/svg?seed=crm&backgroundColor=d4f0e8" style="width:34px;height:34px;border-radius:8px;border:2px solid var(--accent);cursor:pointer;background:var(--accent-lt)" alt="user" onclick="toast('Profile settings coming soon!','info')"/>
      </div>
    </header>

    <!-- ═══ PAGE: CUSTOMERS ═══ -->
    <div id="page-customers" class="page act">
      <!-- Birthday banner -->
      <div id="bday-banner" style="display:none"></div>

      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:20px">
        <div>
          <h1 class="pg-title"><i data-lucide="users" style="width:21px;height:21px;color:var(--accent)"></i>Customers</h1>
          <p class="pg-sub" id="pg-sub">All customers · CRM Dashboard</p>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-secondary btn-sm" onclick="exportCSV()"><i data-lucide="download" style="width:13px;height:13px"></i>Export</button>
          <button class="btn btn-primary btn-sm" onclick="openAdd()"><i data-lucide="plus" style="width:13px;height:13px"></i>Add Customer</button>
        </div>
      </div>

      <!-- Stat cards -->
      <div class="g4" style="margin-bottom:20px" id="stat-cards"></div>

      <!-- Table card -->
      <div class="card">
        <div class="fbar">
          <div style="position:relative;flex:1;min-width:180px">
            <i data-lucide="search" style="position:absolute;left:9px;top:50%;transform:translateY(-50%);width:13px;height:13px;color:var(--text3);pointer-events:none"></i>
            <input class="fi-sm" id="tbl-q" type="text" placeholder="Search name, email, phone…" style="padding-left:28px;width:100%" oninput="applyFilter()"/>
          </div>
          <select class="fi-sm" id="f-status" onchange="applyFilter()">
            <option value="">All Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
          <select class="fi-sm" id="f-tag-f" onchange="applyFilter()">
            <option value="">All Tags</option>
            <option value="VIP">VIP</option>
            <option value="Regular">Regular</option>
            <option value="New">New</option>
            <option value="At Risk">At Risk</option>
          </select>
          <select class="fi-sm" id="f-sort" onchange="applyFilter()">
            <option value="">Sort By</option>
            <option value="name-asc">Name A→Z</option>
            <option value="name-desc">Name Z→A</option>
            <option value="spent-desc">Highest Spent</option>
            <option value="spent-asc">Lowest Spent</option>
            <option value="orders-desc">Most Orders</option>
            <option value="newest">Newest</option>
          </select>
          <button class="btn btn-xs btn-secondary" onclick="resetFilter()" title="Clear"><i data-lucide="x" style="width:13px;height:13px"></i></button>
        </div>
        <div style="padding:9px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:6px">
          <span style="font-size:12.5px;color:var(--text3)" id="result-info">0 customers</span>
          <div style="display:flex;align-items:center;gap:8px">
            <span style="font-size:12px;color:var(--text3)">Per page:</span>
            <select class="fi-sm" style="padding:4px 8px;font-size:12px" id="pps" onchange="changePP()">
              <option value="5">5</option><option value="10" selected>10</option><option value="20">20</option><option value="50">50</option>
            </select>
          </div>
        </div>
        <div class="tbl-wrap">
          <table class="tbl">
            <thead>
              <tr>
                <th onclick="sortCol('id')">ID <span class="sort-ico" id="si-id">↕</span></th>
                <th onclick="sortCol('name')">Customer <span class="sort-ico" id="si-name">↕</span></th>
                <th>Contact</th>
                <th onclick="sortCol('orders')">Orders <span class="sort-ico" id="si-orders">↕</span></th>
                <th onclick="sortCol('spent')">Spent <span class="sort-ico" id="si-spent">↕</span></th>
                <th>Tag</th>
                <th>Status</th>
                <th style="text-align:center">Actions</th>
              </tr>
            </thead>
            <tbody id="cust-tbody"></tbody>
          </table>
          <div id="empty-state" class="empty" style="display:none">
            <div class="empty-ico"><i data-lucide="users" style="width:26px;height:26px"></i></div>
            <div style="font-size:15px;font-weight:700;color:var(--text);margin-bottom:6px">No customers found</div>
            <p style="font-size:13px;color:var(--text3);margin-bottom:16px">Adjust your filters or add your first customer.</p>
            <button class="btn btn-primary btn-sm" onclick="openAdd()"><i data-lucide="plus" style="width:13px;height:13px"></i>Add Customer</button>
          </div>
        </div>
        <div style="padding:12px 16px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px">
          <span style="font-size:12.5px;color:var(--text3)" id="pg-info">Page 1 of 1</span>
          <div style="display:flex;gap:4px" id="pg-ctrls"></div>
        </div>
      </div>
    </div>

    <!-- ═══ PAGE: ANALYTICS ═══ -->
    <div id="page-analytics" class="page">
      <div style="margin-bottom:20px">
        <h1 class="pg-title"><i data-lucide="bar-chart-2" style="width:21px;height:21px;color:var(--accent)"></i>Customer Analytics</h1>
        <p class="pg-sub">Insights and performance metrics</p>
      </div>
      <div class="g4" style="margin-bottom:18px" id="an-stats"></div>
      <div class="g73" style="margin-bottom:18px">
        <div class="card ch-box">
          <div class="ch-title">Spending Distribution</div>
          <div class="ch-sub">Top customers by total spend</div>
          <div style="height:240px"><canvas id="ch-spend"></canvas></div>
        </div>
        <div class="card ch-box">
          <div class="ch-title">Tag Breakdown</div>
          <div class="ch-sub">Customer segments</div>
          <div style="height:190px"><canvas id="ch-tag"></canvas></div>
          <div id="tag-legend" style="margin-top:12px;display:flex;flex-direction:column;gap:6px"></div>
        </div>
      </div>
      <div class="g2g">
        <div class="card ch-box">
          <div class="ch-title">Monthly New Customers</div>
          <div class="ch-sub">Acquisition trend</div>
          <div style="height:220px"><canvas id="ch-new"></canvas></div>
        </div>
        <div class="card" style="padding:18px 20px">
          <div class="ch-title" style="margin-bottom:14px">Top 5 Spenders</div>
          <div id="top-spenders"></div>
        </div>
      </div>
    </div>

    <!-- ═══ PAGE: AI INSIGHTS ═══ -->
    <div id="page-ai" class="page">
      <div style="margin-bottom:20px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:10px">
        <div>
          <h1 class="pg-title"><i data-lucide="sparkles" style="width:21px;height:21px;color:var(--violet)"></i>AI Insights</h1>
          <p class="pg-sub">Intelligent customer analysis powered by data</p>
        </div>
        <button class="btn btn-sm" style="background:var(--violet);color:#fff" onclick="refreshAI()">
          <i data-lucide="refresh-cw" style="width:13px;height:13px"></i>Refresh
        </button>
      </div>
      <div class="g64" style="margin-bottom:18px">
        <div class="ai-panel" id="ai-insights-panel"></div>
        <div class="ai-panel" id="ai-suggest-panel"></div>
      </div>
      <div class="g3" id="ai-kpis" style="margin-bottom:18px"></div>
      <div class="card" style="padding:18px 20px">
        <div class="ch-title" style="margin-bottom:4px">Customer Health Score</div>
        <div class="ch-sub" style="margin-bottom:16px">Engagement and retention metrics</div>
        <div id="health-bars"></div>
      </div>
    </div>

    <!-- ═══ PAGE: BIRTHDAYS ═══ -->
    <div id="page-birthdays" class="page">
      <div style="margin-bottom:20px">
        <h1 class="pg-title"><i data-lucide="cake" style="width:21px;height:21px;color:var(--gold)"></i>Birthday Reminders</h1>
        <p class="pg-sub">Upcoming customer birthdays — send personal greetings</p>
      </div>
      <div class="g3" style="margin-bottom:18px" id="bday-cards"></div>
      <div class="card" style="padding:18px 20px">
        <div class="ch-title" style="margin-bottom:14px">All Customers with Birthdays</div>
        <div id="bday-table"></div>
      </div>
    </div>

  </div><!-- /main -->
</div><!-- /app -->

<script>
/* ════════════════════════════════════
   AVATAR COLORS
════════════════════════════════════ */
const AV_COLORS = ['#0d6e6e','#b5860d','#c0392b','#2563eb','#6d28d9','#1a7a4a','#0891b2','#be185d','#854d0e','#1d4ed8'];
function avColor(name) { let h=0; for(let c of name) h=(h+c.charCodeAt(0))%AV_COLORS.length; return AV_COLORS[h]; }
function initials(n) { const p=n.trim().split(' '); return (p[0]?.[0]||'')+(p[1]?.[0]||''); }

/* ════════════════════════════════════
   SEED DATA
════════════════════════════════════ */
const SEED = [
  {name:'Emma Johnson',    phone:'+1 555 0101',email:'emma@email.com',   addr:'123 Oak St, New York, USA',    bday:'1990-03-15',tag:'VIP',     notes:'Long-time client. Prefers email contact.'},
  {name:'Liam Williams',   phone:'+1 555 0202',email:'liam@email.com',   addr:'456 Pine Ave, LA, USA',        bday:'1985-07-22',tag:'Regular', notes:'Interested in seasonal promotions.'},
  {name:'Olivia Brown',    phone:'+44 7700 900',email:'olivia@email.com', addr:'789 Baker St, London, UK',     bday:'1992-11-08',tag:'VIP',     notes:'High-value repeat customer.'},
  {name:'Noah Davis',      phone:'+1 555 0303',email:'noah@email.com',   addr:'321 Elm Rd, Chicago, USA',     bday:'1995-02-28',tag:'New',     notes:'First purchase last month.'},
  {name:'Ava Martinez',    phone:'+34 91 123',  email:'ava@email.com',   addr:'654 Sol St, Madrid, Spain',    bday:'1988-05-19',tag:'Regular', notes:'Spanish-speaking preferred.'},
  {name:'Ethan Garcia',    phone:'+1 555 0404',email:'ethan@email.com',  addr:'987 Maple Dr, Boston, USA',    bday:'1993-09-03',tag:'At Risk', notes:'No orders in 45 days. Needs re-engagement.'},
  {name:'Sophia Wilson',   phone:'+61 2 9001',  email:'sophia@email.com',addr:'11 Harbor Rd, Sydney, AUS',    bday:'1990-12-25',tag:'VIP',     notes:'Refer 3 new customers this year.'},
  {name:'Mason Anderson',  phone:'+1 555 0505',email:'mason@email.com',  addr:'22 Park Blvd, Miami, USA',     bday:'1986-06-14',tag:'Regular', notes:'Bulk orders frequently.'},
  {name:'Isabella Lee',    phone:'+82 2 1234',  email:'isa@email.com',   addr:'33 Gangnam, Seoul, South Korea',bday:'1994-04-09',tag:'New',    notes:'International customer.'},
  {name:'James Taylor',    phone:'+1 555 0606',email:'james@email.com',  addr:'44 Broadway, NYC, USA',        bday:'1989-08-30',tag:'VIP',     notes:'Premium membership holder.'},
  {name:'Charlotte Harris',phone:'+1 555 0707',email:'charlotte@email.com',addr:'55 River Rd, Austin, USA',   bday:'1991-01-17',tag:'Regular', notes:'Monthly subscription.'},
  {name:'Oliver White',    phone:'+49 30 1234', email:'oliver@email.com',addr:'66 Berlin St, Berlin, Germany',bday:'1987-10-22',tag:'At Risk', notes:'Churned after complaint. Follow up needed.'},
  {name:'Amelia Thomas',   phone:'+1 555 0808',email:'amelia@email.com', addr:'77 Sunset Blvd, LA, USA',      bday:'1996-03-05',tag:'New',     notes:'Referred by Emma Johnson.'},
  {name:'Lucas Moore',     phone:'+33 1 4200',  email:'lucas@email.com', addr:'88 Champs, Paris, France',     bday:'1992-07-19',tag:'VIP',     notes:'Brand ambassador.'},
  {name:'Harper Jackson',  phone:'+1 555 0909',email:'harper@email.com', addr:'99 Lake Dr, Seattle, USA',     bday:'1993-12-11',tag:'Regular', notes:'Prefers phone contact.'},
];

function genOrders() { return Math.floor(Math.random()*20)+1; }
function genSpent(o) { return parseFloat((o * (Math.random()*120+40)).toFixed(2)); }
function genDate() {
  const d = new Date(Date.now() - Math.random()*365*864e5);
  return d.toISOString().split('T')[0];
}
function genStatus() { return Math.random() > .25 ? 'Active' : 'Inactive'; }
function genId(i) { return 'CUS-' + String(1000+i).padStart(5,'0'); }

/* ════════════════════════════════════
   STATE
════════════════════════════════════ */
let customers = [];
let filtered  = [];
let page      = 1;
let pp        = 10;
let sKey      = 'createdAt';
let sDir      = -1;
let deleteId  = null;
let editId    = null;
let viewId    = null;
let spendCh, tagCh, newCh;

/* ════════════════════════════════════
   INIT
════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
  loadCustomers();
  initTheme();
  renderStats();
  applyFilter();
  updateSBBadge();
  setBdayBanner();
  setBdayBadge();
  if (window.innerWidth >= 900) document.getElementById('tb-add').style.display = 'flex';
  lucide.createIcons();
  setTimeout(() => toast('Welcome to PulseHub CRM! 👋', 'info'), 2000);
});

window.addEventListener('resize', () => {
  const b = document.getElementById('tb-add');
  if (b) b.style.display = window.innerWidth >= 900 ? 'flex' : 'none';
});

/* ════════════════════════════════════
   STORAGE
════════════════════════════════════ */
function loadCustomers() {
  const s = localStorage.getItem('ph_customers');
  if (s) { customers = JSON.parse(s); }
  else {
    customers = SEED.map((c, i) => {
      const orders = genOrders();
      return {
        id: genId(i), ...c, orders, spent: genSpent(orders),
        status: genStatus(), createdAt: new Date(genDate()).getTime(),
        lastOrder: genDate(),
      };
    });
    save();
  }
  filtered = [...customers];
}
function save() { localStorage.setItem('ph_customers', JSON.stringify(customers)); }

/* ════════════════════════════════════
   THEME
════════════════════════════════════ */
let dark = false;
function initTheme() {
  dark = localStorage.getItem('ph_dark') === '1';
  if (dark) applyDark();
}
function applyDark() {
  document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
  document.getElementById('theme-track').style.background = dark ? 'var(--accent)' : 'var(--border2)';
  document.getElementById('theme-thumb').style.transform = dark ? 'translateX(18px)' : 'translateX(0)';
}
function toggleTheme() {
  dark = !dark;
  localStorage.setItem('ph_dark', dark ? '1' : '0');
  applyDark();
  setTimeout(() => { destroyCharts(); if (document.getElementById('page-analytics').classList.contains('act')) buildAnalytics(); }, 80);
}

/* ════════════════════════════════════
   SIDEBAR / NAV
════════════════════════════════════ */
let sbOpen = true;
function toggleSidebar() {
  if (window.innerWidth <= 768) { openMob(); return; }
  sbOpen = !sbOpen;
  document.getElementById('sb').classList.toggle('col', !sbOpen);
  document.getElementById('main').classList.toggle('exp', !sbOpen);
}
function openMob() {
  document.getElementById('sb').classList.add('mob-open');
  document.getElementById('mob-bg').style.display = 'block';
}
function closeMob() {
  document.getElementById('sb').classList.remove('mob-open');
  document.getElementById('mob-bg').style.display = 'none';
}
function nav(pg, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('act'));
  document.getElementById('page-' + pg).classList.add('act');
  document.querySelectorAll('.snav-link').forEach(l => l.classList.remove('act'));
  if (el) el.classList.add('act');
  if (pg === 'analytics') setTimeout(() => buildAnalytics(), 80);
  if (pg === 'ai') buildAI();
  if (pg === 'birthdays') buildBirthdays();
  closeMob();
  lucide.createIcons();
}

/* ════════════════════════════════════
   GLOBAL SEARCH
════════════════════════════════════ */
function onGSearch(v) {
  if (v.trim()) {
    nav('customers', document.querySelector('[data-pg="customers"]'));
    document.getElementById('tbl-q').value = v;
    applyFilter();
  }
}

/* ════════════════════════════════════
   STAT CARDS
════════════════════════════════════ */
function renderStats() {
  const total    = customers.length;
  const active   = customers.filter(c => c.status === 'Active').length;
  const inactive = total - active;
  const now      = new Date();
  const newC     = customers.filter(c => {
    const d = new Date(c.createdAt);
    return d.getMonth() === now.getMonth() && d.getFullYear() === now.getFullYear();
  }).length;
  const revenue  = customers.reduce((s, c) => s + c.spent, 0);

  const defs = [
    { lbl: 'Total Customers', val: total,         icon: 'users',       cls: 'c-teal',  bg: 'var(--accent-lt)', ic: 'var(--accent)', delta: '+' + newC + ' this month', dt: 'up' },
    { lbl: 'New This Month',  val: newC,           icon: 'user-plus',   cls: 'c-green', bg: 'var(--green-lt)',  ic: 'var(--green)',  delta: 'Acquired',                dt: 'nt' },
    { lbl: 'Active',          val: active,         icon: 'user-check',  cls: 'c-teal',  bg: 'var(--accent-lt)', ic: 'var(--accent)', delta: Math.round(active/Math.max(total,1)*100) + '% rate', dt: 'up' },
    { lbl: 'Inactive',        val: inactive,       icon: 'user-x',      cls: 'c-rose',  bg: 'var(--rose-lt)',   ic: 'var(--rose)',   delta: 'Need re-engagement',      dt: 'dn' },
    { lbl: 'Total Revenue',   val: '$' + fmt(revenue), icon: 'dollar-sign', cls: 'c-gold', bg: 'var(--gold-lt)', ic: 'var(--gold)', delta: 'All time', dt: 'nt' },
  ];

  const wrap = document.getElementById('stat-cards');
  if (!wrap) return;
  wrap.style.gridTemplateColumns = 'repeat(auto-fill, minmax(170px, 1fr))';
  wrap.innerHTML = defs.map(d => `
    <div class="card sc ${d.cls}">
      <div class="sicon" style="background:${d.bg}"><i data-lucide="${d.icon}" style="width:17px;height:17px;color:${d.ic}"></i></div>
      <div class="sval">${d.val}</div>
      <div class="slbl">${d.lbl}</div>
      <div class="sdelta ${d.dt}">${d.delta}</div>
    </div>
  `).join('');
  lucide.createIcons();
}

/* ════════════════════════════════════
   TABLE
════════════════════════════════════ */
function applyFilter() {
  const q      = (document.getElementById('tbl-q')?.value || '').toLowerCase();
  const status = document.getElementById('f-status')?.value || '';
  const tagF   = document.getElementById('f-tag-f')?.value || '';
  const sort   = document.getElementById('f-sort')?.value  || '';

  filtered = customers.filter(c => {
    const mq = !q || c.name.toLowerCase().includes(q) || c.email.toLowerCase().includes(q) || c.phone.includes(q) || c.id.includes(q);
    const ms = !status || c.status === status;
    const mt = !tagF || c.tag === tagF;
    return mq && ms && mt;
  });

  if (sort) {
    const [k, d] = sort.split('-');
    const dir = d === 'desc' ? -1 : 1;
    if (k === 'name')   filtered.sort((a,b) => a.name.localeCompare(b.name) * dir);
    if (k === 'spent')  filtered.sort((a,b) => (a.spent - b.spent) * dir);
    if (k === 'orders') filtered.sort((a,b) => (a.orders - b.orders) * dir);
    if (k === 'newest') filtered.sort((a,b) => (b.createdAt - a.createdAt));
  } else {
    filtered.sort((a,b) => {
      let av = a[sKey], bv = b[sKey];
      if (typeof av === 'string') av = av.toLowerCase(), bv = bv.toLowerCase();
      return av < bv ? -sDir : av > bv ? sDir : 0;
    });
  }

  page = 1;
  renderTable();
  renderPagination();
  renderStats();
  updateSBBadge();
}

function resetFilter() {
  ['tbl-q','f-status','f-tag-f','f-sort'].forEach(id => { const e = document.getElementById(id); if(e) e.value = ''; });
  sKey = 'createdAt'; sDir = -1;
  applyFilter();
}
function sortCol(k) {
  if (sKey === k) sDir *= -1; else { sKey = k; sDir = 1; }
  document.querySelectorAll('.sort-ico').forEach(e => e.classList.remove('on'));
  const si = document.getElementById('si-' + k);
  if (si) { si.classList.add('on'); si.textContent = sDir === 1 ? '↑' : '↓'; }
  applyFilter();
}
function changePP() { pp = parseInt(document.getElementById('pps').value); page = 1; renderTable(); renderPagination(); }

function renderTable() {
  const tbody = document.getElementById('cust-tbody');
  const empty = document.getElementById('empty-state');
  const ri    = document.getElementById('result-info');
  if (!tbody) return;
  if (ri) ri.textContent = `${filtered.length} customer${filtered.length!==1?'s':''}`;

  if (!filtered.length) {
    tbody.innerHTML = '';
    if (empty) empty.style.display = 'flex';
    return;
  }
  if (empty) empty.style.display = 'none';

  const start = (page - 1) * pp;
  const items = filtered.slice(start, start + pp);

  tbody.innerHTML = items.map(c => `
    <tr>
      <td><span class="mono" style="font-size:12px;color:var(--text3)">${c.id}</span></td>
      <td>
        <div style="display:flex;align-items:center;gap:10px">
          <div class="prof-mini-av" style="background:${avColor(c.name)}">${initials(c.name)}</div>
          <div>
            <div style="font-weight:600;font-size:13.5px">${esc(c.name)}</div>
            <div style="font-size:11.5px;color:var(--text3)">${esc(c.email)}</div>
          </div>
        </div>
      </td>
      <td>
        <div style="font-size:13px">${esc(c.phone)}</div>
        <div style="font-size:11.5px;color:var(--text3)">${c.addr ? esc(c.addr.split(',').pop().trim()) : ''}</div>
      </td>
      <td><span class="mono" style="font-weight:700">${c.orders}</span></td>
      <td><span class="mono" style="font-weight:700;color:var(--accent)">$${fmt(c.spent)}</span></td>
      <td>${tagBadge(c.tag)}</td>
      <td><span class="badge ${c.status === 'Active' ? 'b-active' : 'b-inactive'}">${c.status}</span></td>
      <td>
        <div style="display:flex;align-items:center;justify-content:center;gap:3px">
          <button class="ab ab-view" onclick="viewCustomer('${c.id}')" title="View Profile"><i data-lucide="eye" style="width:15px;height:15px"></i></button>
          <button class="ab ab-edit" onclick="openEdit('${c.id}')" title="Edit"><i data-lucide="pencil" style="width:15px;height:15px"></i></button>
          <button class="ab ab-wa" onclick="openWhatsApp('${c.id}')" title="WhatsApp"><i data-lucide="message-circle" style="width:15px;height:15px"></i></button>
          <button class="ab ab-del" onclick="openDel('${c.id}')" title="Delete"><i data-lucide="trash-2" style="width:15px;height:15px"></i></button>
        </div>
      </td>
    </tr>
  `).join('');
  lucide.createIcons();
}

function tagBadge(t) {
  const m = { VIP: 't-vip', Regular: 't-regular', New: 't-new', 'At Risk': 't-at-risk' };
  return `<span class="tag ${m[t] || 't-regular'}">${t}</span>`;
}

/* ════════════════════════════════════
   PAGINATION
════════════════════════════════════ */
function renderPagination() {
  const total = Math.max(1, Math.ceil(filtered.length / pp));
  const info  = document.getElementById('pg-info');
  const ctrl  = document.getElementById('pg-ctrls');
  if (info) info.textContent = `Page ${page} of ${total}`;
  if (!ctrl) return;
  let h = `<button class="pgb" onclick="goPg(${page-1})" ${page===1?'disabled':''}>‹</button>`;
  for (let i=1;i<=total;i++) {
    if (total>7 && Math.abs(i-page)>2 && i!==1 && i!==total) { if(i===page-3||i===page+3) h+=`<span class="pgb" style="cursor:default">…</span>`; continue; }
    h += `<button class="pgb ${i===page?'on':''}" onclick="goPg(${i})">${i}</button>`;
  }
  h += `<button class="pgb" onclick="goPg(${page+1})" ${page===total?'disabled':''}>›</button>`;
  ctrl.innerHTML = h;
}
function goPg(p) {
  const t = Math.ceil(filtered.length/pp);
  if (p<1||p>t) return;
  page = p;
  renderTable(); renderPagination();
}

/* ════════════════════════════════════
   VIEW CUSTOMER PROFILE
════════════════════════════════════ */
function viewCustomer(id) {
  viewId = id;
  const c = customers.find(x => x.id === id);
  if (!c) return;
  document.getElementById('view-title').textContent = c.name;

  // WhatsApp button
  const waBtn = document.getElementById('wa-btn');
  waBtn.onclick = () => openWhatsApp(id);

  // Edit button
  const editBtn = document.getElementById('edit-from-view-btn');
  editBtn.onclick = () => { closeView(); openEdit(id); };

  // Simulate order history
  const fakeOrders = Array.from({length: Math.min(c.orders, 5)}, (_, i) => {
    const d = new Date(c.createdAt + i * 864e5 * 10);
    return {
      oid: 'ORD-' + String(10000 + Math.floor(Math.random()*9000)).slice(-4),
      date: d.toISOString().split('T')[0],
      amount: fmt(Math.random()*300+20),
      status: ['Delivered','Shipped','Processing'][Math.floor(Math.random()*3)],
    };
  });

  const col = avColor(c.name);
  const body = document.getElementById('view-body');
  body.innerHTML = `
    <!-- Header -->
    <div style="display:flex;align-items:flex-start;gap:16px;margin-bottom:20px;flex-wrap:wrap">
      <div class="prof-av" style="background:${col};font-size:24px">${initials(c.name)}</div>
      <div style="flex:1">
        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:6px">
          <h2 style="font-size:20px;font-weight:800;color:var(--text);letter-spacing:-.3px">${esc(c.name)}</h2>
          ${tagBadge(c.tag)}
          <span class="badge ${c.status==='Active'?'b-active':'b-inactive'}">${c.status}</span>
        </div>
        <div style="font-size:13px;color:var(--text2);margin-bottom:3px">${esc(c.email)}</div>
        <div style="font-size:13px;color:var(--text2)">${esc(c.phone)}</div>
        ${c.addr ? `<div style="font-size:12.5px;color:var(--text3);margin-top:2px">📍 ${esc(c.addr)}</div>` : ''}
      </div>
      <div style="text-align:right">
        <div style="font-size:10px;color:var(--text3);text-transform:uppercase;letter-spacing:.05em;margin-bottom:3px">Customer ID</div>
        <div class="mono" style="font-size:13px;color:var(--accent);font-weight:600">${c.id}</div>
      </div>
    </div>

    <!-- Stats row -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:18px">
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:14px;text-align:center">
        <div class="mono" style="font-size:22px;font-weight:700;color:var(--accent)">${c.orders}</div>
        <div style="font-size:12px;color:var(--text3);margin-top:2px">Total Orders</div>
      </div>
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:14px;text-align:center">
        <div class="mono" style="font-size:22px;font-weight:700;color:var(--gold)">$${fmt(c.spent)}</div>
        <div style="font-size:12px;color:var(--text3);margin-top:2px">Total Spent</div>
      </div>
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:14px;text-align:center">
        <div style="font-size:15px;font-weight:700;color:var(--text)">${formatDate(c.lastOrder)}</div>
        <div style="font-size:12px;color:var(--text3);margin-top:2px">Last Order</div>
      </div>
    </div>

    ${c.bday ? `
    <div style="display:flex;align-items:center;gap:10px;background:var(--gold-lt);border:1px solid rgba(181,134,13,.2);border-radius:9px;padding:11px 14px;margin-bottom:16px">
      <span style="font-size:20px">🎂</span>
      <div>
        <div style="font-size:13px;font-weight:600;color:var(--gold)">Birthday: ${formatDate(c.bday)}</div>
        <div style="font-size:11.5px;color:var(--text3)">${bdayCountdown(c.bday)}</div>
      </div>
    </div>` : ''}

    <!-- Order History -->
    <div style="margin-bottom:16px">
      <div style="font-size:13.5px;font-weight:700;color:var(--text);margin-bottom:10px">Recent Orders</div>
      ${fakeOrders.map(o => `
        <div class="tl-item">
          <div class="tl-dot" style="background:${o.status==='Delivered'?'var(--green)':o.status==='Shipped'?'var(--blue)':'var(--amber)'}"></div>
          <div style="flex:1">
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:4px">
              <span class="mono" style="font-size:12.5px;font-weight:600">${o.oid}</span>
              <span class="mono" style="font-size:13px;font-weight:700;color:var(--accent)">$${o.amount}</span>
            </div>
            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:2px">
              <span style="font-size:11.5px;color:var(--text3)">${formatDate(o.date)}</span>
              <span class="badge ${o.status==='Delivered'?'b-active':'b-inactive'}" style="font-size:10px;padding:1px 7px">${o.status}</span>
            </div>
          </div>
        </div>`).join('')}
    </div>

    <!-- Notes -->
    <div>
      <div style="font-size:13.5px;font-weight:700;color:var(--text);margin-bottom:8px">Notes</div>
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:9px;padding:12px">
        <p style="font-size:13px;color:var(--text2);line-height:1.6">${c.notes ? esc(c.notes) : '<span style="color:var(--text3)">No notes added.</span>'}</p>
      </div>
      <div style="margin-top:8px">
        <textarea id="notes-edit-${c.id}" class="fi" rows="2" placeholder="Add / update notes…" style="resize:none">${esc(c.notes||'')}</textarea>
        <button class="btn btn-xs btn-secondary" style="margin-top:6px" onclick="saveNotes('${c.id}')">Save Notes</button>
      </div>
    </div>
  `;

  document.getElementById('view-ov').classList.add('open');
  lucide.createIcons();
}
function saveNotes(id) {
  const c = customers.find(x => x.id === id);
  if (!c) return;
  c.notes = document.getElementById('notes-edit-' + id)?.value || '';
  save();
  toast('Notes saved!', 'success');
}
function closeView() { document.getElementById('view-ov').classList.remove('open'); }

/* ════════════════════════════════════
   WHATSAPP
════════════════════════════════════ */
function openWhatsApp(id) {
  const c = customers.find(x => x.id === id);
  if (!c) return;
  const phone = c.phone.replace(/\D/g, '');
  const msg   = encodeURIComponent(`Hi ${c.name}, thank you for being a valued customer! 🙏`);
  window.open(`https://wa.me/${phone}?text=${msg}`, '_blank');
  toast(`Opening WhatsApp for ${c.name}`, 'success');
}

/* ════════════════════════════════════
   ADD / EDIT
════════════════════════════════════ */
function openAdd() {
  editId = null;
  document.getElementById('modal-title').textContent = 'Add Customer';
  document.getElementById('save-label').textContent = 'Add Customer';
  document.getElementById('modal-main-icon').setAttribute('data-lucide', 'user-plus');
  clearForm();
  document.getElementById('cust-ov').classList.add('open');
  lucide.createIcons();
}
function openEdit(id) {
  editId = id;
  const c = customers.find(x => x.id === id);
  if (!c) return;
  document.getElementById('modal-title').textContent = 'Edit Customer';
  document.getElementById('save-label').textContent = 'Save Changes';
  document.getElementById('modal-main-icon').setAttribute('data-lucide', 'pencil');
  document.getElementById('f-name').value  = c.name;
  document.getElementById('f-phone').value = c.phone;
  document.getElementById('f-email').value = c.email;
  document.getElementById('f-addr').value  = c.addr || '';
  document.getElementById('f-bday').value  = c.bday || '';
  document.getElementById('f-tag').value   = c.tag || 'Regular';
  document.getElementById('f-notes').value = c.notes || '';
  clearFormErrs();
  document.getElementById('cust-ov').classList.add('open');
  lucide.createIcons();
}
function closeModal() { document.getElementById('cust-ov').classList.remove('open'); }

function clearForm() {
  ['f-name','f-phone','f-email','f-addr','f-bday','f-notes'].forEach(id => { const e = document.getElementById(id); if (e) e.value = ''; });
  const tag = document.getElementById('f-tag'); if (tag) tag.value = 'New';
  clearFormErrs();
}
function clearFormErrs() {
  ['e-name','e-phone','e-email'].forEach(id => document.getElementById(id)?.classList.remove('show'));
  ['f-name','f-phone','f-email'].forEach(id => document.getElementById(id)?.classList.remove('err'));
}
function showErr(fi, ei, msg) {
  const f = document.getElementById(fi), e = document.getElementById(ei);
  if (f) f.classList.add('err');
  if (e) { e.textContent = msg; e.classList.add('show'); }
}

function submitForm(ev) {
  ev.preventDefault();
  clearFormErrs();
  const name  = document.getElementById('f-name').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const email = document.getElementById('f-email').value.trim();
  const addr  = document.getElementById('f-addr').value.trim();
  const bday  = document.getElementById('f-bday').value;
  const tag   = document.getElementById('f-tag').value;
  const notes = document.getElementById('f-notes').value.trim();

  let ok = true;
  if (!name)  { showErr('f-name',  'e-name',  'Full name is required'); ok = false; }
  if (!phone) { showErr('f-phone', 'e-phone', 'Phone number is required'); ok = false; }
  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showErr('f-email', 'e-email', 'Valid email required'); ok = false; }
  if (!ok) return;

  showLoader(true);
  setTimeout(() => {
    if (editId) {
      const idx = customers.findIndex(c => c.id === editId);
      if (idx !== -1) Object.assign(customers[idx], { name, phone, email, addr, bday, tag, notes });
      toast(`${name} updated successfully!`, 'success');
    } else {
      const orders = 0;
      customers.unshift({
        id: genId(customers.length),
        name, phone, email, addr, bday, tag, notes,
        orders, spent: 0, status: 'Active',
        createdAt: Date.now(), lastOrder: null,
      });
      toast(`${name} added to CRM!`, 'success');
    }
    save();
    closeModal();
    applyFilter(); renderStats(); updateSBBadge(); setBdayBadge();
    showLoader(false);
  }, 450);
}

/* ════════════════════════════════════
   DELETE
════════════════════════════════════ */
function openDel(id) {
  deleteId = id;
  const c = customers.find(x => x.id === id);
  document.getElementById('del-name').textContent = c ? c.name : id;
  document.getElementById('del-ov').classList.add('open');
  lucide.createIcons();
}
function closeDel() { deleteId = null; document.getElementById('del-ov').classList.remove('open'); }
function doDelete() {
  if (!deleteId) return;
  showLoader(true);
  setTimeout(() => {
    const c = customers.find(x => x.id === deleteId);
    customers = customers.filter(x => x.id !== deleteId);
    filtered  = filtered.filter(x => x.id !== deleteId);
    save();
    closeDel();
    renderTable(); renderPagination(); renderStats(); updateSBBadge();
    toast(`${c?.name || 'Customer'} removed from CRM.`, 'error');
    showLoader(false);
  }, 400);
}

/* ════════════════════════════════════
   EXPORT CSV
════════════════════════════════════ */
function exportCSV() {
  const cols = ['ID','Name','Phone','Email','Address','Birthday','Tag','Orders','Spent','Status','Last Order','Notes'];
  const rows = customers.map(c => [c.id,`"${c.name}"`,c.phone,c.email,`"${c.addr||''}"`,c.bday||'',c.tag,c.orders,c.spent,c.status,c.lastOrder||'',`"${(c.notes||'').replace(/"/g,"''")}"`]);
  const csv  = [cols,...rows].map(r => r.join(',')).join('\n');
  const blob = new Blob([csv], { type: 'text/csv' });
  const url  = URL.createObjectURL(blob);
  Object.assign(document.createElement('a'), { href: url, download: 'pulsehub-customers.csv' }).click();
  URL.revokeObjectURL(url);
  toast(`Exported ${customers.length} customers as CSV!`, 'success');
}

/* ════════════════════════════════════
   SIDEBAR BADGE
════════════════════════════════════ */
function updateSBBadge() {
  const e = document.getElementById('sb-count');
  if (e) e.textContent = customers.length;
}

/* ════════════════════════════════════
   BIRTHDAY SYSTEM
════════════════════════════════════ */
function bdayCountdown(bday) {
  if (!bday) return '';
  const now  = new Date();
  const bDate = new Date(bday);
  const next  = new Date(now.getFullYear(), bDate.getMonth(), bDate.getDate());
  if (next < now) next.setFullYear(now.getFullYear() + 1);
  const days  = Math.round((next - now) / 864e5);
  if (days === 0) return '🎉 Birthday today!';
  if (days === 1) return '🎁 Birthday tomorrow!';
  if (days <= 7)  return `🎂 ${days} days away!`;
  return `Birthday in ${days} days`;
}

function setBdayBanner() {
  const banner = document.getElementById('bday-banner');
  if (!banner) return;
  const today = new Date();
  const soon = customers.filter(c => {
    if (!c.bday) return false;
    const b  = new Date(c.bday);
    const nb = new Date(today.getFullYear(), b.getMonth(), b.getDate());
    if (nb < today) nb.setFullYear(today.getFullYear() + 1);
    return (nb - today) / 864e5 <= 7;
  });
  if (!soon.length) { banner.style.display = 'none'; return; }
  banner.style.display = 'flex';
  banner.innerHTML = `
    <span style="font-size:24px;flex-shrink:0">🎂</span>
    <div>
      <div style="font-size:14px;font-weight:700;color:var(--gold)">Upcoming Birthdays!</div>
      <div style="font-size:12.5px;color:var(--text2)">${soon.map(c => `${c.name} (${bdayCountdown(c.bday)})`).join(' · ')}</div>
    </div>
    <button class="btn btn-xs btn-gold" style="margin-left:auto;flex-shrink:0" onclick="nav('birthdays',document.querySelector('[data-pg=birthdays]'))">View All</button>
  `;
}

function setBdayBadge() {
  const b = document.getElementById('bday-badge');
  if (!b) return;
  const today = new Date();
  const cnt = customers.filter(c => {
    if (!c.bday) return false;
    const bd = new Date(c.bday);
    const nb = new Date(today.getFullYear(), bd.getMonth(), bd.getDate());
    if (nb < today) nb.setFullYear(today.getFullYear() + 1);
    return (nb - today) / 864e5 <= 30;
  }).length;
  b.textContent = cnt;
}

function buildBirthdays() {
  const today = new Date();
  const withBday = customers.filter(c => c.bday).map(c => {
    const b  = new Date(c.bday);
    const nb = new Date(today.getFullYear(), b.getMonth(), b.getDate());
    if (nb < today) nb.setFullYear(today.getFullYear() + 1);
    const days = Math.round((nb - today) / 864e5);
    return { ...c, nextBday: nb, days };
  }).sort((a,b) => a.days - b.days);

  // Cards for next 3
  const cards = document.getElementById('bday-cards');
  const top3  = withBday.slice(0, 3);
  if (cards) {
    if (!top3.length) { cards.innerHTML = '<p style="color:var(--text3);font-size:13px">No birthdays recorded.</p>'; }
    else cards.innerHTML = top3.map(c => `
      <div class="card" style="padding:20px;border:2px solid rgba(181,134,13,.2)">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:14px">
          <div class="prof-av" style="background:${avColor(c.name)};font-size:18px;width:50px;height:50px">${initials(c.name)}</div>
          <div>
            <div style="font-size:15px;font-weight:700;color:var(--text)">${esc(c.name)}</div>
            <div style="font-size:12px;color:var(--text3)">${formatDate(c.bday)}</div>
          </div>
        </div>
        <div style="text-align:center;padding:12px;background:var(--gold-lt);border-radius:9px;margin-bottom:12px">
          <div style="font-size:28px;font-weight:800;color:var(--gold);font-family:'IBM Plex Mono',monospace">${c.days === 0 ? '🎉 Today!' : c.days === 1 ? 'Tomorrow!' : c.days + ' days'}</div>
          <div style="font-size:12px;color:var(--amber)">${c.days === 0 ? 'Happy Birthday!' : 'until birthday'}</div>
        </div>
        <button class="btn btn-wa btn-sm" style="width:100%" onclick="openWhatsApp('${c.id}')">
          <i data-lucide="message-circle" style="width:13px;height:13px"></i>Send Wishes
        </button>
      </div>
    `).join('');
    lucide.createIcons();
  }

  // Full table
  const tbl = document.getElementById('bday-table');
  if (tbl) {
    if (!withBday.length) { tbl.innerHTML = '<p style="color:var(--text3);font-size:13px;padding:12px 0">No birthdays recorded. Edit customers to add their birthdays.</p>'; return; }
    tbl.innerHTML = `<table class="tbl"><thead><tr><th>Customer</th><th>Birthday</th><th>Countdown</th><th>Tag</th><th>Action</th></tr></thead><tbody>
      ${withBday.map(c => `<tr>
        <td>
          <div style="display:flex;align-items:center;gap:9px">
            <div class="prof-mini-av" style="background:${avColor(c.name)}">${initials(c.name)}</div>
            <div>
              <div style="font-weight:600">${esc(c.name)}</div>
              <div style="font-size:11.5px;color:var(--text3)">${esc(c.email)}</div>
            </div>
          </div>
        </td>
        <td>${formatDate(c.bday)}</td>
        <td><span style="font-weight:700;color:${c.days<=7?'var(--gold)':'var(--text)'}">${c.days===0?'🎉 Today':c.days===1?'🎁 Tomorrow':c.days+' days'}</span></td>
        <td>${tagBadge(c.tag)}</td>
        <td><button class="btn btn-wa btn-xs" onclick="openWhatsApp('${c.id}')"><i data-lucide="message-circle" style="width:12px;height:12px"></i>Wish</button></td>
      </tr>`).join('')}
    </tbody></table>`;
    lucide.createIcons();
  }
}

/* ════════════════════════════════════
   ANALYTICS
════════════════════════════════════ */
function destroyCharts() { [spendCh, tagCh, newCh].forEach(c => c && c.destroy()); spendCh = tagCh = newCh = null; }
function isDark() { return document.documentElement.getAttribute('data-theme') === 'dark'; }
function cT() { return isDark() ? '#a09990' : '#5a5548'; }
function cG() { return isDark() ? 'rgba(255,255,255,.05)' : 'rgba(0,0,0,.05)'; }
const PAL = ['#0d6e6e','#b5860d','#c0392b','#2563eb','#6d28d9','#1a7a4a','#0891b2','#be185d'];
const MONTHS = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

function buildAnalytics() {
  const total = customers.length;
  const active = customers.filter(c => c.status === 'Active').length;
  const rev = customers.reduce((s,c) => s+c.spent, 0);
  const avg = total ? rev/total : 0;
  const defs = [
    { lbl:'Total Revenue', val:'$'+fmt(rev),  icon:'dollar-sign', bg:'var(--accent-lt)', ic:'var(--accent)', delta:'+8%',  dt:'up' },
    { lbl:'Avg Spent',     val:'$'+fmt(avg),  icon:'trending-up', bg:'var(--gold-lt)',   ic:'var(--gold)',   delta:'+5%',  dt:'up' },
    { lbl:'Active Rate',   val:Math.round(active/Math.max(total,1)*100)+'%', icon:'user-check', bg:'var(--green-lt)', ic:'var(--green)', delta:'Good', dt:'nt' },
    { lbl:'VIP Customers', val:customers.filter(c=>c.tag==='VIP').length, icon:'crown', bg:'var(--gold-lt)', ic:'var(--gold)', delta:'High Value', dt:'nt' },
  ];
  const aw = document.getElementById('an-stats');
  if (aw) {
    aw.innerHTML = defs.map(d => `
      <div class="card sc">
        <div class="sicon" style="background:${d.bg}"><i data-lucide="${d.icon}" style="width:17px;height:17px;color:${d.ic}"></i></div>
        <div class="sval">${d.val}</div>
        <div class="slbl">${d.lbl}</div>
        <div class="sdelta ${d.dt}">${d.delta}</div>
      </div>`).join('');
    lucide.createIcons();
  }

  // Spending chart
  const sc = document.getElementById('ch-spend');
  if (sc) {
    if (spendCh) spendCh.destroy();
    const top10 = [...customers].sort((a,b) => b.spent-a.spent).slice(0,10);
    spendCh = new Chart(sc, {
      type: 'bar',
      data: {
        labels: top10.map(c => c.name.split(' ')[0]),
        datasets: [{ label: 'Total Spent', data: top10.map(c => c.spent), backgroundColor: PAL, borderRadius: 6 }]
      },
      options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color: cG() }, ticks: { color: cT(), font: { size: 11 } } },
          y: { grid: { color: cG() }, ticks: { color: cT(), font: { size: 11 }, callback: v => '$'+v } }
        }
      }
    });
  }

  // Tag donut
  const tc = document.getElementById('ch-tag');
  if (tc) {
    if (tagCh) tagCh.destroy();
    const tagMap = {};
    customers.forEach(c => { tagMap[c.tag] = (tagMap[c.tag]||0)+1; });
    const labels = Object.keys(tagMap);
    const data   = labels.map(l => tagMap[l]);
    const colors = { VIP: '#b5860d', Regular: '#2563eb', New: '#1a7a4a', 'At Risk': '#c0392b' };
    const clrs   = labels.map(l => colors[l] || '#888');
    tagCh = new Chart(tc, {
      type: 'doughnut',
      data: { labels, datasets: [{ data, backgroundColor: clrs, borderWidth: 0, hoverOffset: 8 }] },
      options: { responsive: true, maintainAspectRatio: false, cutout: '65%', plugins: { legend: { display: false } } }
    });
    const leg = document.getElementById('tag-legend');
    if (leg) leg.innerHTML = labels.map((l,i) => `
      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="display:flex;align-items:center;gap:6px">
          <span style="width:9px;height:9px;border-radius:3px;background:${clrs[i]};display:inline-block"></span>
          <span style="font-size:12px;color:var(--text2)">${l}</span>
        </div>
        <span class="mono" style="font-size:12px;font-weight:700;color:var(--text)">${data[i]}</span>
      </div>`).join('');
  }

  // New customers per month
  const nc = document.getElementById('ch-new');
  if (nc) {
    if (newCh) newCh.destroy();
    const now  = new Date();
    const mData = Array(12).fill(0);
    customers.forEach(c => {
      const d = new Date(c.createdAt);
      if (d.getFullYear() === now.getFullYear()) mData[d.getMonth()]++;
    });
    newCh = new Chart(nc, {
      type: 'line',
      data: {
        labels: MONTHS,
        datasets: [{ label: 'New Customers', data: mData, borderColor: 'var(--accent)', backgroundColor: 'rgba(13,110,110,.08)', fill: true, tension: .42, pointBackgroundColor: 'var(--accent)', pointRadius: 4 }]
      },
      options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color: cG() }, ticks: { color: cT(), font: { size: 11 } } },
          y: { grid: { color: cG() }, ticks: { color: cT(), font: { size: 11 } } }
        }
      }
    });
  }

  // Top spenders list
  const ts = document.getElementById('top-spenders');
  if (ts) {
    const top5 = [...customers].sort((a,b) => b.spent-a.spent).slice(0,5);
    const max = top5[0]?.spent || 1;
    ts.innerHTML = top5.map((c,i) => `
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
        <div style="width:22px;height:22px;border-radius:6px;background:var(--surface2);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:var(--text3);flex-shrink:0">${i+1}</div>
        <div class="prof-mini-av" style="background:${avColor(c.name)};width:30px;height:30px;font-size:11px">${initials(c.name)}</div>
        <div style="flex:1;min-width:0">
          <div style="font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">${esc(c.name)}</div>
          <div style="height:5px;background:var(--surface2);border-radius:99px;margin-top:4px;overflow:hidden">
            <div style="height:100%;width:${Math.round(c.spent/max*100)}%;background:var(--accent);border-radius:99px;transition:width .5s"></div>
          </div>
        </div>
        <span class="mono" style="font-size:12.5px;font-weight:700;color:var(--accent);flex-shrink:0">$${fmt(c.spent)}</span>
      </div>`).join('');
  }
}

/* ════════════════════════════════════
   AI INSIGHTS
════════════════════════════════════ */
function buildAI() {
  const total   = customers.length;
  const vip     = customers.filter(c => c.tag === 'VIP');
  const atRisk  = customers.filter(c => c.tag === 'At Risk');
  const inactive= customers.filter(c => c.status === 'Inactive');
  const revenue = customers.reduce((s,c) => s+c.spent, 0);
  const vipRev  = vip.reduce((s,c) => s+c.spent, 0);
  const vipPct  = Math.round(vipRev / Math.max(revenue,1) * 100);
  const topCust = [...customers].sort((a,b) => b.spent-a.spent)[0];
  const newThis = customers.filter(c => {
    const d = new Date(c.createdAt), n = new Date();
    return d.getMonth()===n.getMonth() && d.getFullYear()===n.getFullYear();
  }).length;

  const insights = [
    { tag:'top',  tc:'at-top',  dot:'#6ee7b7', text:`VIP customers (${vip.length}) generate <strong>${vipPct}%</strong> of total revenue ($${fmt(vipRev)}).` },
    { tag:'info', tc:'at-info', dot:'#99f6e4', text:`<strong>${topCust?.name||'N/A'}</strong> is your top customer with $${fmt(topCust?.spent||0)} total spent.` },
    { tag:'warn', tc:'at-warn', dot:'#fca5a5', text:`<strong>${inactive.length}</strong> customers are inactive — they haven't ordered recently.` },
    { tag:'warn', tc:'at-warn', dot:'#fca5a5', text:`<strong>${atRisk.length}</strong> at-risk customers need immediate re-engagement.` },
    { tag:'info', tc:'at-info', dot:'#99f6e4', text:`<strong>${newThis}</strong> new customers acquired this month.` },
    { tag:'top',  tc:'at-top',  dot:'#6ee7b7', text:`Average customer lifetime value: <strong>$${fmt(revenue/Math.max(total,1))}</strong>.` },
  ];
  const suggestions = [
    { tag:'tip', tc:'at-tip', dot:'#fde68a', text:'Send exclusive discounts to inactive customers to drive re-engagement.' },
    { tag:'tip', tc:'at-tip', dot:'#fde68a', text:`Reward VIP customers with a loyalty program — they drive ${vipPct}% of revenue.` },
    { tag:'tip', tc:'at-tip', dot:'#fde68a', text:'Create targeted email campaigns for "At Risk" segment before they churn.' },
    { tag:'tip', tc:'at-tip', dot:'#fde68a', text:'Offer referral bonuses — ask satisfied VIP customers to refer new clients.' },
    { tag:'tip', tc:'at-tip', dot:'#fde68a', text:'Send birthday greetings with a coupon code for a personal touch.' },
  ];

  const ip = document.getElementById('ai-insights-panel');
  if (ip) ip.innerHTML = `
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
      <i data-lucide="zap" style="width:18px;height:18px;color:#6ee7b7"></i>
      <span style="font-size:14px;font-weight:800;color:#e8f5f5">Customer Insights</span>
    </div>
    ${insights.map(i => `<div class="ai-ins"><div class="ai-dot" style="background:${i.dot}"></div><div class="ai-txt"><span class="ai-tag ${i.tc}">${i.tag.toUpperCase()}</span>${i.text}</div></div>`).join('')}
  `;

  const sp = document.getElementById('ai-suggest-panel');
  if (sp) sp.innerHTML = `
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
      <i data-lucide="lightbulb" style="width:18px;height:18px;color:#fde68a"></i>
      <span style="font-size:14px;font-weight:800;color:#e8f5f5">Engagement Strategies</span>
    </div>
    ${suggestions.map(s => `<div class="ai-ins"><div class="ai-dot" style="background:${s.dot}"></div><div class="ai-txt"><span class="ai-tag ${s.tc}">TIP</span>${s.text}</div></div>`).join('')}
  `;

  // KPI cards
  const kpis = document.getElementById('ai-kpis');
  if (kpis) {
    const ks = [
      { lbl:'Retention Rate',    val:Math.round((1-inactive.length/Math.max(total,1))*100)+'%', color:'var(--accent)' },
      { lbl:'VIP Conversion',    val:Math.round(vip.length/Math.max(total,1)*100)+'%',          color:'var(--gold)' },
      { lbl:'At-Risk Count',     val:atRisk.length,                                              color:'var(--rose)' },
      { lbl:'Avg Orders/Cust.',  val:fmt(customers.reduce((s,c)=>s+c.orders,0)/Math.max(total,1)), color:'var(--blue)' },
      { lbl:'New This Month',    val:newThis,                                                    color:'var(--green)' },
      { lbl:'Revenue/Customer',  val:'$'+fmt(revenue/Math.max(total,1)),                        color:'var(--violet)' },
    ];
    kpis.innerHTML = ks.map(k => `
      <div class="card sc">
        <div class="sval" style="color:${k.color}">${k.val}</div>
        <div class="slbl">${k.lbl}</div>
      </div>`).join('');
  }

  // Health bars
  const hb = document.getElementById('health-bars');
  if (hb) {
    const bars = [
      { lbl:'Customer Retention',    pct: Math.round((1-inactive.length/Math.max(total,1))*100), color:'var(--accent)' },
      { lbl:'VIP Engagement',        pct: Math.round(vip.length/Math.max(total,1)*100)*3,        color:'var(--gold)' },
      { lbl:'Revenue Concentration', pct: vipPct,                                                 color:'var(--rose)' },
      { lbl:'New Customer Growth',   pct: Math.min(100, newThis*10),                             color:'var(--green)' },
      { lbl:'Profile Completeness',  pct: Math.round(customers.filter(c=>c.email&&c.phone&&c.addr).length/Math.max(total,1)*100), color:'var(--blue)' },
    ];
    hb.innerHTML = bars.map(b => `
      <div style="margin-bottom:14px">
        <div style="display:flex;justify-content:space-between;margin-bottom:4px">
          <span style="font-size:13px;font-weight:600;color:var(--text)">${b.lbl}</span>
          <span class="mono" style="font-size:12px;font-weight:700;color:${b.color}">${Math.min(100,b.pct)}%</span>
        </div>
        <div style="height:8px;background:var(--surface2);border-radius:99px;overflow:hidden">
          <div style="height:100%;width:${Math.min(100,b.pct)}%;background:${b.color};border-radius:99px;transition:width .6s ease"></div>
        </div>
      </div>`).join('');
  }
  lucide.createIcons();
}

function refreshAI() {
  showLoader(true);
  setTimeout(() => { buildAI(); showLoader(false); toast('AI insights refreshed!', 'success'); }, 700);
}

/* ════════════════════════════════════
   TOAST / LOADER
════════════════════════════════════ */
function showLoader(on) { document.getElementById('loader').style.display = on ? 'flex' : 'none'; }
function toast(msg, type='info') {
  const icons = { success:'check-circle', error:'x-circle', info:'info', warn:'alert-triangle' };
  const cls   = { success:'ts', error:'te', info:'ti2', warn:'tw' };
  const wrap  = document.getElementById('tw');
  const div   = document.createElement('div');
  div.className = `toast ${cls[type]||'ti2'}`;
  div.innerHTML = `<i data-lucide="${icons[type]}" class="ti" style="width:16px;height:16px;flex-shrink:0"></i><span>${msg}</span>`;
  wrap.appendChild(div);
  lucide.createIcons();
  setTimeout(() => { div.classList.add('hiding'); setTimeout(() => div.remove(), 280); }, 3500);
}

/* ════════════════════════════════════
   UTILITIES
════════════════════════════════════ */
function esc(s) { return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
function fmt(n) { return (Math.round((parseFloat(n)||0)*100)/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2}); }
function formatDate(d) {
  if (!d) return '—';
  try { return new Date(d+'T00:00:00').toLocaleDateString('en-US',{year:'numeric',month:'short',day:'numeric'}); } catch { return d; }
}

// Close overlays on backdrop
['del-ov','cust-ov','view-ov'].forEach(id => {
  document.getElementById(id).addEventListener('click', function(e) { if(e.target===this) this.classList.remove('open'); });
});
document.addEventListener('keydown', e => {
  if (e.key==='Escape') ['del-ov','cust-ov','view-ov'].forEach(id => document.getElementById(id).classList.remove('open'));
});
</script>
</body>
</html>
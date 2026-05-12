<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>OrderFlow — Orders Management System</title>
<script src="https://cdn.tailwindcss.com"></script>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<!-- Lucide Icons CDN -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<!-- Google Fonts: Plus Jakarta Sans + Fira Code -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet"/>

<script>
  tailwind.config = {
    darkMode: ['attribute','[data-theme="dark"]'],
    theme: {
      extend: {
        fontFamily: {
          sans: ['Plus Jakarta Sans','sans-serif'],
          mono: ['Fira Code','monospace'],
        }
      }
    }
  }
</script>

<style>
/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   CSS VARIABLES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
:root {
  --bg: #f8f7f4;
  --surface: #ffffff;
  --surface2: #f1f0ec;
  --border: #e8e6e0;
  --border2: #d4d1c8;
  --text: #1a1916;
  --text2: #5c5850;
  --text3: #9b9690;
  --accent: #e85d2f;
  --accent2: #f97316;
  --blue: #3b82f6;
  --green: #16a34a;
  --amber: #d97706;
  --red: #dc2626;
  --violet: #7c3aed;
  --cyan: #0891b2;
  --shadow: 0 1px 4px rgba(0,0,0,.06),0 2px 12px rgba(0,0,0,.04);
  --shadow-md: 0 4px 20px rgba(0,0,0,.10);
  --shadow-lg: 0 8px 40px rgba(0,0,0,.15);
  --r: 14px;
  --sidebar-w: 256px;
}
[data-theme="dark"] {
  --bg: #0d0d0b;
  --surface: #161614;
  --surface2: #1e1e1b;
  --border: #2a2925;
  --border2: #3a3930;
  --text: #f0ede6;
  --text2: #a8a49a;
  --text3: #6b6760;
  --shadow: 0 1px 4px rgba(0,0,0,.3),0 2px 12px rgba(0,0,0,.2);
  --shadow-md: 0 4px 20px rgba(0,0,0,.4);
  --shadow-lg: 0 8px 40px rgba(0,0,0,.5);
}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   RESET & BASE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{
  font-family:'Plus Jakarta Sans',sans-serif;
  background:var(--bg);
  color:var(--text);
  min-height:100vh;
  transition:background .25s,color .25s;
  -webkit-font-smoothing:antialiased;
}
::-webkit-scrollbar{width:5px;height:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--border2);border-radius:99px}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   LAYOUT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
#app{display:flex;min-height:100vh}

/* SIDEBAR */
#sidebar{
  width:var(--sidebar-w);
  background:var(--surface);
  border-right:1px solid var(--border);
  display:flex;flex-direction:column;
  position:fixed;top:0;left:0;height:100vh;
  z-index:50;
  transition:transform .3s cubic-bezier(.4,0,.2,1),width .3s cubic-bezier(.4,0,.2,1);
  overflow:hidden;
}
#sidebar.collapsed{width:68px}
#sidebar.collapsed .s-label,#sidebar.collapsed .s-section,
#sidebar.collapsed .logo-text,#sidebar.collapsed .user-info,
#sidebar.collapsed .s-badge{display:none!important}
#sidebar.collapsed .s-logo{padding:0 18px;justify-content:center}
#sidebar.collapsed .s-link{justify-content:center;padding:10px;gap:0}
#sidebar.collapsed .user-row{padding:12px 18px;justify-content:center}
#main{margin-left:var(--sidebar-w);flex:1;min-width:0;transition:margin-left .3s cubic-bezier(.4,0,.2,1)}
#main.expanded{margin-left:68px}

@media(max-width:768px){
  #sidebar{transform:translateX(-100%);width:256px!important}
  #sidebar.mobile-open{transform:translateX(0)}
  #main{margin-left:0!important}
  #mob-overlay{display:block}
}

/* SIDEBAR COMPONENTS */
.s-logo{
  height:62px;display:flex;align-items:center;gap:10px;
  padding:0 18px;border-bottom:1px solid var(--border);
  flex-shrink:0;
}
.s-brand-icon{
  width:34px;height:34px;border-radius:9px;
  background:var(--accent);
  display:flex;align-items:center;justify-content:center;
  flex-shrink:0;
}
.s-section{
  font-size:10.5px;font-weight:700;letter-spacing:.1em;
  text-transform:uppercase;color:var(--text3);
  padding:0 14px;margin:14px 0 4px;
}
.s-link{
  display:flex;align-items:center;gap:9px;
  padding:9px 10px;border-radius:10px;
  color:var(--text2);font-size:13.5px;font-weight:500;
  cursor:pointer;transition:all .15s;
  text-decoration:none;margin:0 4px 1px;
  white-space:nowrap;position:relative;
}
.s-link:hover{background:var(--surface2);color:var(--text)}
.s-link.active{background:rgba(232,93,47,.1);color:var(--accent)}
.s-link svg{flex-shrink:0;width:17px;height:17px}
.s-badge{
  margin-left:auto;background:var(--accent);color:#fff;
  font-size:10px;font-weight:700;padding:2px 6px;border-radius:99px;
}
.s-nav{flex:1;overflow-y:auto;overflow-x:hidden;padding:8px 4px}
.s-footer{padding:10px;border-top:1px solid var(--border);flex-shrink:0}
.user-row{
  display:flex;align-items:center;gap:9px;
  padding:9px 10px;border-radius:10px;cursor:pointer;
  transition:background .15s;
}
.user-row:hover{background:var(--surface2)}
.user-av{
  width:32px;height:32px;border-radius:8px;
  background:linear-gradient(135deg,var(--accent),var(--accent2));
  display:flex;align-items:center;justify-content:center;
  color:#fff;font-size:12px;font-weight:700;flex-shrink:0;
}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   TOPBAR
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
#topbar{
  height:62px;background:var(--surface);
  border-bottom:1px solid var(--border);
  display:flex;align-items:center;gap:10px;
  padding:0 20px;position:sticky;top:0;z-index:30;
  transition:background .25s,border-color .25s;
}
.search-box{
  flex:1;max-width:340px;position:relative;
}
.search-box input{
  width:100%;background:var(--surface2);
  border:1px solid var(--border);border-radius:9px;
  padding:8px 14px 8px 36px;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:13px;color:var(--text);outline:none;
  transition:all .2s;
}
.search-box input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(232,93,47,.12)}
.search-box input::placeholder{color:var(--text3)}
.search-box .si{position:absolute;left:10px;top:50%;transform:translateY(-50%);color:var(--text3);pointer-events:none}
.ib{
  width:36px;height:36px;border-radius:9px;
  background:var(--surface2);border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;color:var(--text2);transition:all .15s;
  position:relative;flex-shrink:0;
}
.ib:hover{background:var(--border);color:var(--text)}
.notif-dot{
  position:absolute;top:6px;right:6px;
  width:7px;height:7px;background:#ef4444;
  border-radius:50%;border:1.5px solid var(--surface);
}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   PAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.page{padding:24px 20px;display:none}
.page.active{display:block}
.page-title{
  font-size:20px;font-weight:800;color:var(--text);
  letter-spacing:-.3px;display:flex;align-items:center;gap:8px;
}
.page-sub{font-size:12.5px;color:var(--text3);margin-top:2px}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   CARDS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.card{
  background:var(--surface);border:1px solid var(--border);
  border-radius:var(--r);box-shadow:var(--shadow);
  transition:background .25s,border-color .25s,box-shadow .2s,transform .2s;
}
.card:hover{box-shadow:var(--shadow-md)}
.stat-card{padding:20px;cursor:default;overflow:hidden;position:relative}
.stat-card::after{
  content:'';position:absolute;
  bottom:-16px;right:-16px;width:72px;height:72px;
  border-radius:50%;opacity:.07;
}
.c-blue::after{background:#3b82f6}
.c-green::after{background:#16a34a}
.c-amber::after{background:#d97706}
.c-red::after{background:#dc2626}
.c-violet::after{background:#7c3aed}
.stat-icon{
  width:40px;height:40px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;
  margin-bottom:14px;flex-shrink:0;
}
.stat-val{
  font-size:26px;font-weight:800;letter-spacing:-.5px;
  color:var(--text);font-family:'Fira Code',monospace;line-height:1;
}
.stat-lbl{font-size:12.5px;color:var(--text2);margin-top:4px;font-weight:500}
.stat-delta{
  display:inline-flex;align-items:center;gap:3px;
  font-size:11px;font-weight:600;padding:2px 7px;
  border-radius:99px;margin-top:8px;
}
.up{background:rgba(22,163,74,.1);color:#16a34a}
.dn{background:rgba(220,38,38,.1);color:#dc2626}
.nt{background:rgba(59,130,246,.1);color:#3b82f6}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   STATUS BADGES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.badge{
  display:inline-flex;align-items:center;gap:5px;
  padding:3px 9px;border-radius:99px;
  font-size:11.5px;font-weight:600;white-space:nowrap;
}
.badge::before{content:'';width:5px;height:5px;border-radius:50%;background:currentColor;flex-shrink:0}
.b-delivered{background:rgba(22,163,74,.12);color:#16a34a}
.b-shipped{background:rgba(59,130,246,.12);color:#3b82f6}
.b-processing{background:rgba(245,158,11,.12);color:#d97706}
.b-cancelled{background:rgba(220,38,38,.12);color:#dc2626}
.b-paid{background:rgba(22,163,74,.12);color:#16a34a}
.b-pending{background:rgba(245,158,11,.12);color:#d97706}
.b-refunded{background:rgba(124,58,237,.12);color:#7c3aed}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   BUTTONS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:9px 16px;border-radius:9px;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:13px;font-weight:600;cursor:pointer;
  border:none;outline:none;transition:all .15s;white-space:nowrap;
}
.btn-primary{
  background:var(--accent);color:#fff;
  box-shadow:0 2px 8px rgba(232,93,47,.3);
}
.btn-primary:hover{opacity:.9;transform:translateY(-1px)}
.btn-primary:active{transform:translateY(0)}
.btn-secondary{
  background:var(--surface2);color:var(--text);
  border:1px solid var(--border);
}
.btn-secondary:hover{background:var(--border)}
.btn-danger{background:#ef4444;color:#fff}
.btn-danger:hover{background:#dc2626}
.btn-ghost{background:transparent;color:var(--text2)}
.btn-ghost:hover{background:var(--surface2);color:var(--text)}
.btn-sm{padding:6px 11px;font-size:12px}
.btn-xs{padding:4px 8px;font-size:11px;border-radius:6px}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   TABLE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.tbl{width:100%;border-collapse:collapse}
.tbl th{
  font-size:11px;font-weight:700;letter-spacing:.06em;
  text-transform:uppercase;color:var(--text3);
  padding:11px 14px;border-bottom:1px solid var(--border);
  text-align:left;white-space:nowrap;cursor:pointer;
  user-select:none;
}
.tbl th:hover{color:var(--text)}
.tbl td{
  padding:13px 14px;font-size:13.5px;
  border-bottom:1px solid var(--border);
  color:var(--text);vertical-align:middle;
  transition:background .1s;
}
.tbl tr:last-child td{border-bottom:none}
.tbl tbody tr:hover td{background:rgba(232,93,47,.02)}
.tbl-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
.sort-arrow{opacity:.4;font-size:10px;margin-left:3px}
.sort-arrow.active{opacity:1;color:var(--accent)}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   ACTION BTNS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.act-btn{
  width:29px;height:29px;border-radius:7px;
  display:inline-flex;align-items:center;justify-content:center;
  cursor:pointer;transition:all .15s;
  border:none;outline:none;background:transparent;
}
.act-view{color:var(--blue)}
.act-view:hover{background:rgba(59,130,246,.1)}
.act-edit{color:var(--accent)}
.act-edit:hover{background:rgba(232,93,47,.1)}
.act-del{color:var(--red)}
.act-del:hover{background:rgba(220,38,38,.1)}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   OVERLAYS / MODALS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.overlay{
  position:fixed;inset:0;
  background:rgba(0,0,0,.5);
  backdrop-filter:blur(6px);
  z-index:100;display:none;
  align-items:center;justify-content:center;
  padding:16px;
}
.overlay.open{display:flex}
.modal{
  background:var(--surface);
  border:1px solid var(--border);
  border-radius:18px;
  width:100%;box-shadow:var(--shadow-lg);
  max-height:92vh;overflow-y:auto;
  animation:mIn .22s cubic-bezier(.34,1.56,.64,1);
}
@keyframes mIn{from{opacity:0;transform:scale(.93) translateY(10px)}to{opacity:1;transform:scale(1)}}
.m-head{
  padding:20px 22px 16px;
  border-bottom:1px solid var(--border);
  display:flex;align-items:center;justify-content:space-between;
  position:sticky;top:0;background:var(--surface);z-index:2;
}
.m-title{font-size:16px;font-weight:700;color:var(--text)}
.m-body{padding:20px 22px}
.m-foot{
  padding:14px 22px;border-top:1px solid var(--border);
  display:flex;gap:8px;justify-content:flex-end;
  position:sticky;bottom:0;background:var(--surface);
}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   FORM ELEMENTS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.fg{margin-bottom:14px}
.fl{
  display:block;font-size:11.5px;font-weight:700;
  color:var(--text2);margin-bottom:5px;
  text-transform:uppercase;letter-spacing:.04em;
}
.fi,.fs{
  width:100%;background:var(--surface2);
  border:1.5px solid var(--border);border-radius:9px;
  padding:9px 13px;font-family:'Plus Jakarta Sans',sans-serif;
  font-size:13.5px;color:var(--text);outline:none;
  transition:all .2s;
}
.fi:focus,.fs:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(232,93,47,.12);background:var(--surface)}
.fi::placeholder{color:var(--text3)}
.fi.err{border-color:#ef4444}
.ferr{font-size:11.5px;color:#ef4444;margin-top:3px;display:none}
.ferr.show{display:block}
.fs{appearance:none}
.grid2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
@media(max-width:480px){.grid2{grid-template-columns:1fr}}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   TOAST
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
#toast-wrap{
  position:fixed;bottom:20px;right:20px;
  z-index:999;display:flex;flex-direction:column;gap:8px;
  pointer-events:none;
}
.toast{
  display:flex;align-items:center;gap:10px;
  padding:11px 15px;border-radius:11px;
  background:var(--surface);border:1px solid var(--border);
  box-shadow:var(--shadow-lg);font-size:13px;font-weight:500;
  color:var(--text);min-width:220px;max-width:320px;
  pointer-events:all;
  animation:tIn .28s cubic-bezier(.34,1.56,.64,1);
  transition:opacity .25s,transform .25s;
}
@keyframes tIn{from{opacity:0;transform:translateX(80px) scale(.92)}to{opacity:1;transform:translateX(0) scale(1)}}
.toast.hiding{opacity:0;transform:translateX(60px)}
.toast.t-success .ti{color:#16a34a}
.toast.t-error   .ti{color:#dc2626}
.toast.t-info    .ti{color:#3b82f6}
.toast.t-warn    .ti{color:#d97706}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   LOADER
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
#loader{
  position:fixed;inset:0;background:rgba(0,0,0,.38);
  backdrop-filter:blur(3px);z-index:200;
  display:none;align-items:center;justify-content:center;
}
.spin{
  width:42px;height:42px;
  border:3px solid rgba(232,93,47,.25);
  border-top-color:var(--accent);border-radius:50%;
  animation:spin .7s linear infinite;
}
@keyframes spin{to{transform:rotate(360deg)}}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   PAGINATION
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.pg-btn{
  width:30px;height:30px;border-radius:7px;
  display:inline-flex;align-items:center;justify-content:center;
  font-size:12.5px;font-weight:500;cursor:pointer;
  border:1px solid var(--border);
  color:var(--text2);background:transparent;
  transition:all .15s;
}
.pg-btn:hover{background:var(--surface2);color:var(--text)}
.pg-btn.active{background:var(--accent);border-color:var(--accent);color:#fff}
.pg-btn:disabled{opacity:.35;cursor:not-allowed;pointer-events:none}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   AI PANEL
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.ai-card{
  background:linear-gradient(135deg,#1a1916 0%,#2d2b26 100%);
  border:1px solid #3a3930;border-radius:var(--r);
  padding:20px;color:#f0ede6;position:relative;overflow:hidden;
}
[data-theme="light"] .ai-card{
  background:linear-gradient(135deg,#1a1916 0%,#2d2b26 100%);
}
.ai-card::before{
  content:'';position:absolute;
  top:-30px;right:-30px;width:120px;height:120px;
  background:radial-gradient(circle,rgba(232,93,47,.3) 0%,transparent 70%);
}
.ai-insight{
  display:flex;align-items:flex-start;gap:10px;
  padding:10px 12px;border-radius:9px;
  background:rgba(255,255,255,.05);
  margin-bottom:8px;
  transition:background .15s;
}
.ai-insight:last-child{margin-bottom:0}
.ai-insight:hover{background:rgba(255,255,255,.08)}
.ai-dot{
  width:7px;height:7px;border-radius:50%;
  flex-shrink:0;margin-top:5px;
}
.ai-text{font-size:13px;color:rgba(240,237,230,.85);line-height:1.5}
.ai-tag{
  font-size:10px;font-weight:700;padding:2px 7px;
  border-radius:99px;margin-right:6px;
}
.tag-trend{background:rgba(59,130,246,.2);color:#93c5fd}
.tag-top{background:rgba(22,163,74,.2);color:#86efac}
.tag-warn{background:rgba(245,158,11,.2);color:#fcd34d}
.tag-tip{background:rgba(232,93,47,.2);color:#fdba74}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   INVOICE PREVIEW
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.invoice{
  background:var(--surface);border:1px solid var(--border);
  border-radius:10px;padding:20px;margin-top:16px;
  font-size:13px;
}
.inv-header{
  display:flex;justify-content:space-between;
  align-items:flex-start;margin-bottom:20px;
  flex-wrap:wrap;gap:12px;
}
.inv-brand{font-size:20px;font-weight:800;color:var(--accent);letter-spacing:-.3px}
.inv-meta{text-align:right}
.inv-table{width:100%;border-collapse:collapse;margin:14px 0}
.inv-table th,.inv-table td{
  padding:8px 10px;text-align:left;
  border-bottom:1px solid var(--border);
  font-size:12.5px;
}
.inv-table th{font-weight:700;color:var(--text3);font-size:11px;text-transform:uppercase}
.inv-total{text-align:right;margin-top:10px}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   PRODUCT ROWS in create order
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.prow{
  display:grid;grid-template-columns:1fr 90px 80px 28px;
  gap:8px;align-items:end;margin-bottom:10px;
}
@media(max-width:500px){
  .prow{grid-template-columns:1fr 70px 70px 28px}
}
.prow-rm{
  width:28px;height:28px;border-radius:6px;
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;color:var(--red);
  background:rgba(220,38,38,.08);border:none;
  transition:background .15s;align-self:end;margin-bottom:1px;
}
.prow-rm:hover{background:rgba(220,38,38,.15)}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   EMPTY STATE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.empty{
  display:flex;flex-direction:column;align-items:center;
  justify-content:center;padding:56px 24px;text-align:center;
}
.empty-icon{
  width:68px;height:68px;border-radius:50%;
  background:var(--surface2);border:2px dashed var(--border2);
  display:flex;align-items:center;justify-content:center;
  color:var(--text3);margin-bottom:14px;
}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   FILTER BAR
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.filter-bar{
  display:flex;flex-wrap:wrap;gap:8px;align-items:center;
  padding:14px 16px;border-bottom:1px solid var(--border);
}
.fi-sm{
  background:var(--surface2);border:1px solid var(--border);
  border-radius:8px;padding:7px 11px;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:12.5px;color:var(--text);outline:none;
  transition:all .2s;appearance:none;
}
.fi-sm:focus{border-color:var(--accent);box-shadow:0 0 0 2px rgba(232,93,47,.1)}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   CHART WRAP
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.chart-box{padding:18px 20px}
.chart-title{font-size:14px;font-weight:700;color:var(--text);margin-bottom:3px}
.chart-sub{font-size:12px;color:var(--text3);margin-bottom:16px}

/* ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   MISC UTILITIES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ */
.divider{height:1px;background:var(--border);margin:16px 0}
.mono{font-family:'Fira Code',monospace;font-size:13px}
.text2{color:var(--text2)}
.text3{color:var(--text3)}
.fw7{font-weight:700}
.fw6{font-weight:600}
#mob-overlay{
  display:none;position:fixed;inset:0;
  background:rgba(0,0,0,.45);z-index:40;
}

/* Responsive grids */
.g4{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.g3{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.g2{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
.g74{display:grid;grid-template-columns:7fr 3fr;gap:14px}
.g64{display:grid;grid-template-columns:3fr 2fr;gap:14px}
@media(max-width:1100px){.g4{grid-template-columns:repeat(2,1fr)}.g74,.g64{grid-template-columns:1fr}}
@media(max-width:640px){.g4,.g3,.g2{grid-template-columns:1fr}}
</style>
</head>
<body>

<!-- LOADER -->
<div id="loader"><div style="background:var(--surface);padding:24px 32px;border-radius:14px;display:flex;flex-direction:column;align-items:center;gap:12px;"><div class="spin"></div><span style="font-size:13px;color:var(--text2);">Processing…</span></div></div>

<!-- MOBILE OVERLAY -->
<div id="mob-overlay" onclick="closeMobSidebar()"></div>

<!-- TOAST WRAP -->
<div id="toast-wrap"></div>

<!-- ═══════════════════════════════════════════════
     DELETE CONFIRM MODAL
═══════════════════════════════════════════════ -->
<div id="del-overlay" class="overlay">
  <div class="modal" style="max-width:390px">
    <div class="m-head">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:34px;height:34px;background:rgba(220,38,38,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#dc2626"><i data-lucide="trash-2" style="width:17px;height:17px"></i></div>
        <span class="m-title">Delete Order</span>
      </div>
      <button class="ib" onclick="closeDelModal()"><i data-lucide="x" style="width:16px;height:16px"></i></button>
    </div>
    <div class="m-body">
      <p style="font-size:13.5px;color:var(--text2);line-height:1.6">Are you sure you want to delete order <strong id="del-order-id" style="color:var(--text)"></strong>? This cannot be undone.</p>
    </div>
    <div class="m-foot">
      <button class="btn btn-secondary btn-sm" onclick="closeDelModal()">Cancel</button>
      <button class="btn btn-danger btn-sm" onclick="confirmDelete()"><i data-lucide="trash-2" style="width:13px;height:13px"></i> Delete</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     VIEW ORDER MODAL
═══════════════════════════════════════════════ -->
<div id="view-overlay" class="overlay">
  <div class="modal" style="max-width:640px">
    <div class="m-head">
      <div style="display:flex;align-items:center;gap:9px">
        <div style="width:34px;height:34px;background:rgba(59,130,246,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#3b82f6"><i data-lucide="receipt" style="width:17px;height:17px"></i></div>
        <span class="m-title" id="view-order-title">Order #000</span>
      </div>
      <button class="ib" onclick="closeViewModal()"><i data-lucide="x" style="width:16px;height:16px"></i></button>
    </div>
    <div class="m-body" id="view-body"><!-- JS --></div>
    <div class="m-foot">
      <button class="btn btn-secondary btn-sm" onclick="closeViewModal()">Close</button>
      <button class="btn btn-sm" style="background:#3b82f6;color:#fff" onclick="printInvoice()"><i data-lucide="printer" style="width:13px;height:13px"></i> Print Invoice</button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     CREATE / EDIT ORDER MODAL
═══════════════════════════════════════════════ -->
<div id="order-overlay" class="overlay">
  <div class="modal" style="max-width:620px">
    <div class="m-head">
      <div style="display:flex;align-items:center;gap:9px">
        <div id="modal-icon-wrap" style="width:34px;height:34px;background:rgba(232,93,47,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--accent)"><i data-lucide="package-plus" style="width:17px;height:17px" id="modal-main-icon"></i></div>
        <span class="m-title" id="modal-title">Create Order</span>
      </div>
      <button class="ib" onclick="closeOrderModal()"><i data-lucide="x" style="width:16px;height:16px"></i></button>
    </div>
    <div class="m-body">
      <form id="order-form" onsubmit="handleOrderSubmit(event)" novalidate>
        <div class="grid2">
          <div class="fg">
            <label class="fl">Customer Name *</label>
            <input type="text" id="f-cname" class="fi" placeholder="Full name"/>
            <div class="ferr" id="e-cname">Required</div>
          </div>
          <div class="fg">
            <label class="fl">Phone Number *</label>
            <input type="tel" id="f-phone" class="fi" placeholder="+1 234 567 8900"/>
            <div class="ferr" id="e-phone">Required</div>
          </div>
        </div>
        <div class="grid2">
          <div class="fg">
            <label class="fl">Email</label>
            <input type="email" id="f-email" class="fi" placeholder="customer@email.com"/>
          </div>
          <div class="fg">
            <label class="fl">Order Date *</label>
            <input type="date" id="f-date" class="fi"/>
            <div class="ferr" id="e-date">Required</div>
          </div>
        </div>
        <div class="fg">
          <label class="fl">Shipping Address</label>
          <input type="text" id="f-address" class="fi" placeholder="123 Street, City, Country"/>
        </div>
        <div class="grid2">
          <div class="fg">
            <label class="fl">Payment Status</label>
            <select id="f-payment" class="fs">
              <option value="Pending">Pending</option>
              <option value="Paid">Paid</option>
              <option value="Refunded">Refunded</option>
            </select>
          </div>
          <div class="fg">
            <label class="fl">Order Status</label>
            <select id="f-status" class="fs">
              <option value="Processing">Processing</option>
              <option value="Shipped">Shipped</option>
              <option value="Delivered">Delivered</option>
              <option value="Cancelled">Cancelled</option>
            </select>
          </div>
        </div>

        <!-- Products -->
        <div class="fg">
          <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:8px">
            <label class="fl" style="margin:0">Order Items *</label>
            <button type="button" class="btn btn-xs btn-secondary" onclick="addProductRow()"><i data-lucide="plus" style="width:12px;height:12px"></i> Add Item</button>
          </div>
          <div id="product-rows"><!-- JS --></div>
          <div class="ferr" id="e-items">Add at least one item</div>
        </div>

        <!-- Total -->
        <div style="display:flex;justify-content:flex-end;align-items:center;gap:12px;padding:12px 14px;background:var(--surface2);border-radius:9px;border:1px solid var(--border)">
          <span style="font-size:13px;color:var(--text2);font-weight:600">Subtotal:</span>
          <span id="order-subtotal" class="mono fw7" style="font-size:16px;color:var(--text)">$0.00</span>
        </div>
        <div style="display:flex;justify-content:space-between;gap:12px;margin-top:8px">
          <div class="fg" style="flex:1;margin-bottom:0">
            <label class="fl">Discount ($)</label>
            <input type="number" id="f-discount" class="fi" min="0" value="0" oninput="calcTotal()"/>
          </div>
          <div class="fg" style="flex:1;margin-bottom:0">
            <label class="fl">Shipping ($)</label>
            <input type="number" id="f-shipping" class="fi" min="0" value="0" oninput="calcTotal()"/>
          </div>
          <div style="text-align:right;align-self:flex-end;padding-bottom:2px">
            <div style="font-size:11px;color:var(--text3);font-weight:600;text-transform:uppercase;letter-spacing:.04em">Total</div>
            <div id="order-total" class="mono fw7" style="font-size:22px;color:var(--accent)">$0.00</div>
          </div>
        </div>
        <div class="fg" style="margin-top:10px;margin-bottom:0">
          <label class="fl">Notes</label>
          <input type="text" id="f-notes" class="fi" placeholder="Special instructions…"/>
        </div>
        <button type="submit" id="form-ghost" style="display:none"></button>
      </form>
    </div>
    <div class="m-foot">
      <button class="btn btn-secondary btn-sm" onclick="closeOrderModal()">Cancel</button>
      <button class="btn btn-primary btn-sm" onclick="document.getElementById('form-ghost').click()">
        <i data-lucide="save" style="width:13px;height:13px" id="modal-save-icon"></i>
        <span id="modal-save-label">Create Order</span>
      </button>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     APP
═══════════════════════════════════════════════ -->
<div id="app">

  <!-- SIDEBAR -->
  <aside id="sidebar">
    <div class="s-logo">
      <div class="s-brand-icon"><i data-lucide="shopping-bag" style="width:17px;height:17px;color:#fff"></i></div>
      <div class="logo-text">
        <div style="font-size:16px;font-weight:800;color:var(--text);letter-spacing:-.3px">Easy Billing Pro</div>
        <div style="font-size:10px;color:var(--text3);font-weight:500">Admin Panel</div>
      </div>
    </div>

    <nav class="s-nav">
      <div class="s-section">Main</div>
      <a class="s-link active" data-pg="orders" onclick="goPage('orders',this)">
        <i data-lucide="package"></i>
        <span class="s-label">Orders</span>
        <span class="s-badge" id="sidebar-count">0</span>
      </a>
      <a class="s-link" data-pg="analytics" onclick="goPage('analytics',this)">
        <i data-lucide="bar-chart-3"></i>
        <span class="s-label">Analytics</span>
      </a>
      <a class="s-link" data-pg="ai" onclick="goPage('ai',this)">
        <i data-lucide="sparkles"></i>
        <span class="s-label">AI Insights</span>
        <span class="s-badge" style="background:#7c3aed">AI</span>
      </a>

      <div class="s-section">Utility</div>
      <a class="s-link" onclick="exportCSV()">
        <i data-lucide="download"></i>
        <span class="s-label">Export CSV</span>
      </a>
      <a class="s-link" onclick="showToast('Notifications coming soon!','info')">
        <i data-lucide="bell"></i>
        <span class="s-label">Notifications</span>
      </a>
      <a class="s-link" onclick="showToast('Settings coming soon!','info')">
        <i data-lucide="settings"></i>
        <span class="s-label">Settings</span>
      </a>
    </nav>

    <div class="s-footer">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:6px 10px 10px;margin-bottom:4px;border-bottom:1px solid var(--border)">
        <span class="s-label" style="font-size:12px;color:var(--text3);font-weight:500">Dark Mode</span>
        <label style="display:flex;align-items:center;cursor:pointer;gap:6px">
          <input type="checkbox" id="theme-cb" style="position:absolute;opacity:0;width:0;height:0" onchange="toggleTheme(this.checked)"/>
          <div id="theme-track" style="width:38px;height:20px;background:var(--border2);border-radius:99px;position:relative;transition:background .2s;cursor:pointer">
            <div id="theme-thumb" style="position:absolute;top:2px;left:2px;width:16px;height:16px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)"></div>
          </div>
        </label>
      </div>
      <div class="user-row">
        <div class="user-av">AD</div>
        <div class="user-info">
          <div style="font-size:13px;font-weight:600;color:var(--text)">Admin</div>
          <div style="font-size:11px;color:var(--text3)">Super Admin</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div id="main">
    <!-- TOPBAR -->
    <header id="topbar">
      <button class="ib" id="toggle-btn" onclick="toggleSidebar()"><i data-lucide="menu" style="width:18px;height:18px"></i></button>
      <div class="search-box">
        <i data-lucide="search" class="si" style="width:14px;height:14px"></i>
        <input type="text" id="global-search" placeholder="Search orders…" oninput="onGlobalSearch(this.value)"/>
      </div>
       
      <div style="display:flex;align-items:center;gap:8px;margin-left:auto">
        <button class="btn btn-primary btn-sm" onclick="openCreateModal()" style="display:none" id="tb-add-btn">
          <i data-lucide="plus" style="width:14px;height:14px"></i>New Order
        </button>
         <!-- clock -->
         <div id="clock" class="hidden sm:block text-white text-center bg-black rounded-md w-full  shadow-2xl font-mono p-1">00:00:<span class="cs">00</span><span class="clock-date" id="clock-date"></span></div>
        <button class="ib" onclick="showNotification()">
          <i data-lucide="bell" style="width:17px;height:17px"></i>
          <span class="notif-dot"></span>
        </button>
        <img src="https://api.dicebear.com/8.x/lorelei/svg?seed=orderflow&backgroundColor=ffecd2" style="width:34px;height:34px;border-radius:8px;border:2px solid var(--accent);cursor:pointer;background:#fff6ee" alt="user" onclick="showToast('Profile coming soon!','info')"/>
      </div>
    </header>

    <!-- ═══ PAGE: ORDERS ═══ -->
    <div id="page-orders" class="page active" style="padding:22px 18px">
      <!-- Header -->
      <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:20px">
        <div>
          <h1 class="page-title"><i data-lucide="package" style="width:21px;height:21px;color:var(--accent)"></i>Orders</h1>
          <p class="page-sub" id="orders-subtitle">Manage all customer orders</p>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          <button class="btn btn-secondary btn-sm" onclick="exportCSV()"><i data-lucide="download" style="width:13px;height:13px"></i>Export</button>
          <button class="btn btn-primary btn-sm" onclick="openCreateModal()"><i data-lucide="plus" style="width:13px;height:13px"></i>New Order</button>
        </div>
      </div>

      <!-- Stat cards -->
      <div class="g4" style="margin-bottom:20px" id="stat-cards"><!-- JS --></div>

      <!-- Table card -->
      <div class="card">
        <!-- Filter bar -->
        <div class="filter-bar">
          <div style="position:relative;flex:1;min-width:180px">
            <i data-lucide="search" style="position:absolute;left:9px;top:50%;transform:translateY(-50%);width:13px;height:13px;color:var(--text3);pointer-events:none"></i>
            <input class="fi-sm" id="tbl-search" type="text" placeholder="Search name, ID, phone…" style="padding-left:28px;width:100%" oninput="applyFilters()"/>
          </div>
          <select class="fi-sm" id="f-os" onchange="applyFilters()">
            <option value="">All Status</option>
            <option>Processing</option><option>Shipped</option>
            <option>Delivered</option><option>Cancelled</option>
          </select>
          <select class="fi-sm" id="f-ps" onchange="applyFilters()">
            <option value="">All Payments</option>
            <option>Paid</option><option>Pending</option><option>Refunded</option>
          </select>
          <input class="fi-sm" type="date" id="f-date-from" onchange="applyFilters()" title="From date"/>
          <input class="fi-sm" type="date" id="f-date-to" onchange="applyFilters()" title="To date"/>
          <button class="btn btn-xs btn-secondary" onclick="resetFilters()" title="Reset"><i data-lucide="x" style="width:13px;height:13px"></i></button>
        </div>
        <!-- Summary row -->
        <div style="padding:9px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px">
          <span style="font-size:12.5px;color:var(--text3)" id="result-summary">0 orders</span>
          <div style="display:flex;align-items:center;gap:8px">
            <span style="font-size:12px;color:var(--text3)">Per page:</span>
            <select class="fi-sm" style="padding:4px 8px;font-size:12px" id="per-page" onchange="changePerPage()">
              <option value="5">5</option><option value="10" selected>10</option>
              <option value="20">20</option><option value="50">50</option>
            </select>
          </div>
        </div>
        <!-- Table -->
        <div class="tbl-wrap">
          <table class="tbl" id="orders-table">
            <thead>
              <tr>
                <th onclick="sortCol('id')">Order ID <span class="sort-arrow" id="sa-id">↕</span></th>
                <th onclick="sortCol('customer')">Customer <span class="sort-arrow" id="sa-customer">↕</span></th>
                <th onclick="sortCol('phone')">Phone</th>
                <th onclick="sortCol('date')">Date <span class="sort-arrow" id="sa-date">↕</span></th>
                <th onclick="sortCol('total')">Total <span class="sort-arrow" id="sa-total">↕</span></th>
                <th>Payment</th>
                <th>Status</th>
                <th style="text-align:center">Actions</th>
              </tr>
            </thead>
            <tbody id="orders-tbody"><!-- JS --></tbody>
          </table>
          <div id="empty-orders" class="empty" style="display:none">
            <div class="empty-icon"><i data-lucide="package-x" style="width:26px;height:26px"></i></div>
            <div style="font-size:15px;font-weight:700;color:var(--text);margin-bottom:6px">No orders found</div>
            <p style="font-size:13px;color:var(--text3);margin-bottom:16px">Adjust filters or create your first order.</p>
            <button class="btn btn-primary btn-sm" onclick="openCreateModal()"><i data-lucide="plus" style="width:13px;height:13px"></i> Create Order</button>
          </div>
        </div>
        <!-- Pagination -->
        <div style="padding:12px 16px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px">
          <span style="font-size:12.5px;color:var(--text3)" id="pg-info">Page 1 of 1</span>
          <div style="display:flex;gap:4px" id="pg-controls"></div>
        </div>
      </div>
    </div>

    <!-- ═══ PAGE: ANALYTICS ═══ -->
    <div id="page-analytics" class="page" style="padding:22px 18px">
      <div style="margin-bottom:20px">
        <h1 class="page-title"><i data-lucide="bar-chart-3" style="width:21px;height:21px;color:var(--accent)"></i>Analytics</h1>
        <p class="page-sub">Order performance & revenue insights</p>
      </div>
      <div class="g4" style="margin-bottom:18px" id="analytics-stats"><!-- JS --></div>
      <div class="g74" style="margin-bottom:18px">
        <div class="card chart-box">
          <div class="chart-title">Monthly Revenue</div>
          <div class="chart-sub">Revenue trend over the last 12 months</div>
          <div style="height:240px"><canvas id="rev-chart"></canvas></div>
        </div>
        <div class="card chart-box">
          <div class="chart-title">Order Status Split</div>
          <div class="chart-sub">Current distribution</div>
          <div style="height:200px"><canvas id="status-chart"></canvas></div>
          <div id="status-legend" style="margin-top:12px;display:flex;flex-direction:column;gap:6px"></div>
        </div>
      </div>
      <div class="g2">
        <div class="card chart-box">
          <div class="chart-title">Top Products</div>
          <div class="chart-sub">Best-selling items by units</div>
          <div style="height:220px"><canvas id="prod-chart"></canvas></div>
        </div>
        <div class="card" style="padding:18px 20px">
          <div class="chart-title" style="margin-bottom:14px">Revenue by Category</div>
          <div id="cat-bars"><!-- JS --></div>
        </div>
      </div>
    </div>

    <!-- ═══ PAGE: AI INSIGHTS ═══ -->
    <div id="page-ai" class="page" style="padding:22px 18px">
      <div style="margin-bottom:20px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:10px">
        <div>
          <h1 class="page-title"><i data-lucide="sparkles" style="width:21px;height:21px;color:#7c3aed"></i>AI Insights</h1>
          <p class="page-sub">Intelligent analysis of your order data</p>
        </div>
        <button class="btn btn-sm" style="background:#7c3aed;color:#fff" onclick="refreshAI()">
          <i data-lucide="refresh-cw" style="width:13px;height:13px"></i> Refresh Insights
        </button>
      </div>
      <div class="g64" style="margin-bottom:18px">
        <div class="ai-card" id="ai-insights-box"><!-- JS --></div>
        <div class="ai-card" id="ai-suggestions-box"><!-- JS --></div>
      </div>
      <div class="g3" id="ai-stat-cards" style="margin-bottom:18px"><!-- JS --></div>
      <div class="card" style="padding:18px 20px">
        <div class="chart-title" style="margin-bottom:4px">Performance Score</div>
        <div class="chart-sub" style="margin-bottom:16px">Key metrics overview</div>
        <div id="perf-bars"><!-- JS --></div>
      </div>
    </div>

  </div><!-- /main -->
</div><!-- /app -->

<!-- ═══════════════════════════════════════════════════════════
     JAVASCRIPT
═══════════════════════════════════════════════════════════ -->
<script>

      /* ── CLOCK ────────────────────────────── */
function tick(){
  const n=new Date(),h=String(n.getHours()).padStart(2,'0'),m=String(n.getMinutes()).padStart(2,'0'),s=String(n.getSeconds()).padStart(2,'0');
  const el=document.getElementById('clock');
  if(el)el.innerHTML=`${h}:${m}:<span class="cs">${s}</span><span class="clock-date">${['Sun','Mon','Tue','Wed','Thu','Fri','Sat'][n.getDay()]}</span>`;
}
tick();setInterval(tick,1000);

/* ═══════════════════════════════════════
   PRODUCT CATALOG
═══════════════════════════════════════ */
const PRODUCTS = [
  {id:'P01', name:'iPhone 15 Pro',       price:1199, cat:'Electronics'},
  {id:'P02', name:'MacBook Air M2',      price:1099, cat:'Electronics'},
  {id:'P03', name:'AirPods Pro',         price:249,  cat:'Electronics'},
  {id:'P04', name:'Samsung Galaxy S24',  price:899,  cat:'Electronics'},
  {id:'P05', name:'Sony WH-1000XM5',     price:350,  cat:'Electronics'},
  {id:'P06', name:'Nike Air Max 270',    price:135,  cat:'Clothing'},
  {id:'P07', name:'Levi\'s 501 Jeans',   price:79,   cat:'Clothing'},
  {id:'P08', name:'Adidas Ultraboost',   price:180,  cat:'Clothing'},
  {id:'P09', name:'Coffee Maker Pro',    price:89,   cat:'Home'},
  {id:'P10', name:'Standing Desk 140cm', price:349,  cat:'Home'},
  {id:'P11', name:'Yoga Mat Premium',    price:55,   cat:'Sports'},
  {id:'P12', name:'Whey Protein 5kg',    price:65,   cat:'Sports'},
  {id:'P13', name:'Clean Code Book',     price:40,   cat:'Books'},
  {id:'P14', name:'JavaScript Pro',      price:35,   cat:'Books'},
  {id:'P15', name:'Vitamin C 1000mg',    price:22,   cat:'Health'},
];

const CUSTOMERS = [
  {name:'Emma Johnson',   phone:'+1 555 0101', email:'emma@mail.com',   addr:'123 Oak St, New York'},
  {name:'Liam Williams',  phone:'+1 555 0202', email:'liam@mail.com',   addr:'456 Pine Ave, LA'},
  {name:'Olivia Brown',   phone:'+44 20 7001', email:'olivia@mail.com', addr:'789 Baker St, London'},
  {name:'Noah Davis',     phone:'+1 555 0303', email:'noah@mail.com',   addr:'321 Elm Rd, Chicago'},
  {name:'Ava Martinez',   phone:'+34 91 123',  email:'ava@mail.com',    addr:'654 Sol St, Madrid'},
  {name:'Ethan Garcia',   phone:'+1 555 0404', email:'ethan@mail.com',  addr:'987 Maple Dr, Boston'},
  {name:'Sophia Wilson',  phone:'+61 2 9001',  email:'sophia@mail.com', addr:'11 Harbor View, Sydney'},
  {name:'Mason Anderson', phone:'+1 555 0505', email:'mason@mail.com',  addr:'22 Park Blvd, Miami'},
  {name:'Isabella Lee',   phone:'+82 2 1234',  email:'isa@mail.com',    addr:'33 Gangnam, Seoul'},
  {name:'James Taylor',   phone:'+1 555 0606', email:'james@mail.com',  addr:'44 Broadway, NYC'},
];

/* ═══════════════════════════════════════
   STATE
═══════════════════════════════════════ */
let orders        = [];
let filteredOrds  = [];
let currentPage   = 1;
let perPage       = 10;
let deleteId      = null;
let editId        = null;
let sortKey       = 'date';
let sortDir       = -1; // -1 = desc
let productRowCnt = 0;
let revChart, statusChart, prodChart;

/* ═══════════════════════════════════════
   INIT
═══════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
  loadOrders();
  initTheme();
  setSubtitle();
  renderStatCards();
  applyFilters();
  updateSidebarBadge();
  if (window.innerWidth >= 900) document.getElementById('tb-add-btn').style.display = 'flex';
  lucide.createIcons();
  // Show new order notification after 3s
  setTimeout(() => showToast('🛍 New order received! Check latest entries.', 'info'), 3000);
});

/* ═══════════════════════════════════════
   STORAGE
═══════════════════════════════════════ */
function loadOrders() {
  const saved = localStorage.getItem('of_orders');
  if (saved) {
    orders = JSON.parse(saved);
  } else {
    orders = generateSeedOrders();
    saveOrders();
  }
  filteredOrds = [...orders];
}

function saveOrders() {
  localStorage.setItem('of_orders', JSON.stringify(orders));
}

function generateSeedOrders() {
  const statuses = ['Processing','Shipped','Delivered','Cancelled'];
  const payments = ['Paid','Pending','Refunded'];
  const result = [];
  const now = Date.now();
  for (let i = 0; i < 30; i++) {
    const c = CUSTOMERS[i % CUSTOMERS.length];
    const numItems = Math.floor(Math.random() * 3) + 1;
    const items = [];
    for (let j = 0; j < numItems; j++) {
      const p = PRODUCTS[Math.floor(Math.random() * PRODUCTS.length)];
      const qty = Math.floor(Math.random() * 3) + 1;
      items.push({ pid: p.id, name: p.name, price: p.price, qty, cat: p.cat });
    }
    const subtotal = items.reduce((s,x) => s + x.price * x.qty, 0);
    const shipping = Math.random() > .5 ? 15 : 0;
    const discount = Math.random() > .7 ? Math.floor(Math.random() * 30) : 0;
    const total = Math.max(0, subtotal + shipping - discount);
    result.push({
      id: `ORD-${String(1000 + i).padStart(5,'0')}`,
      customer: c.name,
      phone: c.phone,
      email: c.email,
      address: c.addr,
      date: new Date(now - Math.random() * 30 * 864e5).toISOString().split('T')[0],
      items,
      subtotal,
      shipping,
      discount,
      total,
      payment: payments[Math.floor(Math.random() * payments.length)],
      status: statuses[Math.floor(Math.random() * statuses.length)],
      notes: '',
      createdAt: now - Math.random() * 30 * 864e5,
    });
  }
  return result.sort((a,b) => b.createdAt - a.createdAt);
}

/* ═══════════════════════════════════════
   THEME
═══════════════════════════════════════ */
function initTheme() {
  const dark = localStorage.getItem('of_dark') === '1';
  if (dark) {
    document.documentElement.setAttribute('data-theme','dark');
    document.getElementById('theme-cb').checked = true;
    document.getElementById('theme-track').style.background = 'var(--accent)';
    document.getElementById('theme-thumb').style.transform = 'translateX(18px)';
  }
}
function toggleTheme(on) {
  document.documentElement.setAttribute('data-theme', on ? 'dark' : 'light');
  localStorage.setItem('of_dark', on ? '1' : '0');
  document.getElementById('theme-track').style.background = on ? 'var(--accent)' : 'var(--border2)';
  document.getElementById('theme-thumb').style.transform = on ? 'translateX(18px)' : 'translateX(0)';
  setTimeout(() => { destroyCharts(); if (document.getElementById('page-analytics').classList.contains('active')) buildAnalytics(); }, 80);
}

/* ═══════════════════════════════════════
   SIDEBAR / NAVIGATION
═══════════════════════════════════════ */
let sidebarExpanded = true;
function toggleSidebar() {
  if (window.innerWidth <= 768) { openMobSidebar(); return; }
  sidebarExpanded = !sidebarExpanded;
  document.getElementById('sidebar').classList.toggle('collapsed', !sidebarExpanded);
  document.getElementById('main').classList.toggle('expanded', !sidebarExpanded);
}
function openMobSidebar() {
  document.getElementById('sidebar').classList.add('mobile-open');
  document.getElementById('mob-overlay').style.display = 'block';
}
function closeMobSidebar() {
  document.getElementById('sidebar').classList.remove('mobile-open');
  document.getElementById('mob-overlay').style.display = 'none';
}
function goPage(pg, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('page-' + pg).classList.add('active');
  document.querySelectorAll('.s-link').forEach(l => l.classList.remove('active'));
  if (el) el.classList.add('active');
  if (pg === 'analytics') setTimeout(() => buildAnalytics(), 80);
  if (pg === 'ai') buildAI();
  closeMobSidebar();
  lucide.createIcons();
}
window.addEventListener('resize', () => {
  const btn = document.getElementById('tb-add-btn');
  if (btn) btn.style.display = window.innerWidth >= 900 ? 'flex' : 'none';
});

/* ═══════════════════════════════════════
   SUBTITLE
═══════════════════════════════════════ */
function setSubtitle() {
  const now = new Date();
  const ds = now.toLocaleDateString('en-US',{weekday:'long',year:'numeric',month:'long',day:'numeric'});
  const sub = document.getElementById('orders-subtitle');
  if (sub) sub.textContent = `${orders.length} total orders · ${ds}`;
}

/* ═══════════════════════════════════════
   STAT CARDS (Orders page)
═══════════════════════════════════════ */
function renderStatCards() {
  const total    = orders.length;
  const today    = new Date().toISOString().split('T')[0];
  const todayCnt = orders.filter(o => o.date === today).length;
  const pending  = orders.filter(o => o.status === 'Processing').length;
  const done     = orders.filter(o => o.status === 'Delivered').length;
  const revenue  = orders.filter(o => o.payment === 'Paid').reduce((s,o) => s+o.total, 0);

  const defs = [
    {lbl:'Total Orders',     val:total,              icon:'package',      cls:'c-blue',   iconBg:'rgba(59,130,246,.12)',   iconC:'#3b82f6',  delta:'+12%', dt:'up'},
    {lbl:"Today's Orders",   val:todayCnt,            icon:'calendar',     cls:'c-green',  iconBg:'rgba(22,163,74,.12)',    iconC:'#16a34a',  delta:'Today', dt:'nt'},
    {lbl:'Processing',       val:pending,             icon:'clock',        cls:'c-amber',  iconBg:'rgba(245,158,11,.12)',   iconC:'#d97706',  delta:'Active', dt:'nt'},
    {lbl:'Delivered',        val:done,                icon:'check-circle', cls:'c-green',  iconBg:'rgba(22,163,74,.12)',    iconC:'#16a34a',  delta:'+5%',  dt:'up'},
    {lbl:'Paid Revenue',     val:'$'+fmt(revenue),   icon:'dollar-sign',  cls:'c-violet', iconBg:'rgba(124,58,237,.12)',  iconC:'#7c3aed',  delta:'+8.2%',dt:'up'},
  ];

  const wrap = document.getElementById('stat-cards');
  if (!wrap) return;
  // 5 cards — use g4 but override to 5 on wide
  wrap.style.gridTemplateColumns = 'repeat(auto-fill,minmax(180px,1fr))';
  wrap.innerHTML = defs.map(d => `
    <div class="card stat-card ${d.cls}">
      <div class="stat-icon" style="background:${d.iconBg}"><i data-lucide="${d.icon}" style="width:18px;height:18px;color:${d.iconC}"></i></div>
      <div class="stat-val">${d.val}</div>
      <div class="stat-lbl">${d.lbl}</div>
      <div class="stat-delta ${d.dt}">${d.delta}</div>
    </div>
  `).join('');
  lucide.createIcons();
}

/* ═══════════════════════════════════════
   FILTERS & TABLE
═══════════════════════════════════════ */
function onGlobalSearch(v) {
  if (v.trim()) {
    goPage('orders', document.querySelector('[data-pg="orders"]'));
    document.getElementById('tbl-search').value = v;
    applyFilters();
  }
}
function applyFilters() {
  const q    = (document.getElementById('tbl-search')?.value || '').toLowerCase();
  const os   = document.getElementById('f-os')?.value   || '';
  const ps   = document.getElementById('f-ps')?.value   || '';
  const df   = document.getElementById('f-date-from')?.value || '';
  const dt   = document.getElementById('f-date-to')?.value   || '';

  filteredOrds = orders.filter(o => {
    const mq  = !q  || o.id.toLowerCase().includes(q) || o.customer.toLowerCase().includes(q) || o.phone.includes(q);
    const mos = !os || o.status === os;
    const mps = !ps || o.payment === ps;
    const mdf = !df || o.date >= df;
    const mdt = !dt || o.date <= dt;
    return mq && mos && mps && mdf && mdt;
  });

  // Sort
  filteredOrds.sort((a,b) => {
    let av = a[sortKey], bv = b[sortKey];
    if (sortKey === 'customer') { av = av.toLowerCase(); bv = bv.toLowerCase(); }
    if (av < bv) return -1 * sortDir;
    if (av > bv) return 1  * sortDir;
    return 0;
  });

  currentPage = 1;
  renderTable();
  renderPagination();
  renderStatCards();
}
function resetFilters() {
  ['tbl-search','f-os','f-ps','f-date-from','f-date-to'].forEach(id => {
    const el = document.getElementById(id); if (el) el.value = '';
  });
  sortKey = 'date'; sortDir = -1;
  applyFilters();
}
function sortCol(key) {
  if (sortKey === key) sortDir *= -1;
  else { sortKey = key; sortDir = 1; }
  // Update arrows
  document.querySelectorAll('.sort-arrow').forEach(el => el.classList.remove('active'));
  const sa = document.getElementById('sa-'+key);
  if (sa) { sa.classList.add('active'); sa.textContent = sortDir === 1 ? '↑' : '↓'; }
  applyFilters();
}
function changePerPage() {
  perPage = parseInt(document.getElementById('per-page').value);
  currentPage = 1;
  renderTable(); renderPagination();
}

function renderTable() {
  const tbody  = document.getElementById('orders-tbody');
  const empty  = document.getElementById('empty-orders');
  const sum    = document.getElementById('result-summary');
  if (!tbody) return;
  if (sum) sum.textContent = `${filteredOrds.length} order${filteredOrds.length!==1?'s':''}`;
  if (!filteredOrds.length) {
    tbody.innerHTML = '';
    if (empty) empty.style.display = 'flex';
    return;
  }
  if (empty) empty.style.display = 'none';

  const start = (currentPage-1)*perPage;
  const slice = filteredOrds.slice(start, start+perPage);

  tbody.innerHTML = slice.map(o => `
    <tr>
      <td><span class="mono" style="color:var(--accent);font-weight:600">${o.id}</span></td>
      <td>
        <div style="font-weight:600;font-size:13.5px">${esc(o.customer)}</div>
        <div style="font-size:11.5px;color:var(--text3)">${esc(o.email||'')}</div>
      </td>
      <td><span style="font-size:12.5px;color:var(--text2)">${esc(o.phone)}</span></td>
      <td><span style="font-size:12.5px">${formatDate(o.date)}</span></td>
      <td><span class="mono fw7" style="font-size:14px">$${fmt(o.total)}</span></td>
      <td><span class="badge ${payBadge(o.payment)}">${o.payment}</span></td>
      <td><span class="badge ${statusBadge(o.status)}">${o.status}</span></td>
      <td>
        <div style="display:flex;align-items:center;justify-content:center;gap:3px">
          <button class="act-btn act-view" onclick="viewOrder('${o.id}')" title="View"><i data-lucide="eye" style="width:15px;height:15px"></i></button>
          <button class="act-btn act-edit" onclick="editOrder('${o.id}')" title="Edit"><i data-lucide="pencil" style="width:15px;height:15px"></i></button>
          <button class="act-btn act-del" onclick="openDelModal('${o.id}')" title="Delete"><i data-lucide="trash-2" style="width:15px;height:15px"></i></button>
        </div>
      </td>
    </tr>
  `).join('');
  lucide.createIcons();
  updateSidebarBadge();
}

/* ═══════════════════════════════════════
   PAGINATION
═══════════════════════════════════════ */
function renderPagination() {
  const total = Math.max(1, Math.ceil(filteredOrds.length / perPage));
  const info  = document.getElementById('pg-info');
  const ctrl  = document.getElementById('pg-controls');
  if (info) info.textContent = `Page ${currentPage} of ${total}`;
  if (!ctrl) return;
  let h = `<button class="pg-btn" onclick="goPg(${currentPage-1})" ${currentPage===1?'disabled':''}>‹</button>`;
  for (let i=1;i<=total;i++) {
    if (total>7 && Math.abs(i-currentPage)>2 && i!==1 && i!==total) { if (i===currentPage-3||i===currentPage+3) h+=`<span class="pg-btn" style="cursor:default">…</span>`; continue; }
    h += `<button class="pg-btn ${i===currentPage?'active':''}" onclick="goPg(${i})">${i}</button>`;
  }
  h += `<button class="pg-btn" onclick="goPg(${currentPage+1})" ${currentPage===total?'disabled':''}>›</button>`;
  ctrl.innerHTML = h;
}
function goPg(p) {
  const total = Math.ceil(filteredOrds.length/perPage);
  if (p<1||p>total) return;
  currentPage = p;
  renderTable(); renderPagination();
}

/* ═══════════════════════════════════════
   STATUS BADGE HELPERS
═══════════════════════════════════════ */
function statusBadge(s) {
  return {Delivered:'b-delivered',Shipped:'b-shipped',Processing:'b-processing',Cancelled:'b-cancelled'}[s]||'b-processing';
}
function payBadge(s) {
  return {Paid:'b-paid',Pending:'b-pending',Refunded:'b-refunded'}[s]||'b-pending';
}

/* ═══════════════════════════════════════
   VIEW ORDER MODAL
═══════════════════════════════════════ */
function viewOrder(id) {
  const o = orders.find(x=>x.id===id);
  if (!o) return;
  document.getElementById('view-order-title').textContent = `Order ${o.id}`;
  const body = document.getElementById('view-body');
  body.innerHTML = `
    <!-- Customer Info -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:16px">
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:14px">
        <div style="font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text3);margin-bottom:8px">Customer Info</div>
        <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:2px">${esc(o.customer)}</div>
        <div style="font-size:12.5px;color:var(--text2)">${esc(o.phone)}</div>
        <div style="font-size:12.5px;color:var(--text2)">${esc(o.email||'—')}</div>
        <div style="font-size:12.5px;color:var(--text3);margin-top:4px">${esc(o.address||'—')}</div>
      </div>
      <div style="background:var(--surface2);border:1px solid var(--border);border-radius:10px;padding:14px">
        <div style="font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--text3);margin-bottom:8px">Order Info</div>
        <div style="font-size:12.5px;color:var(--text2);margin-bottom:4px">Date: <strong style="color:var(--text)">${formatDate(o.date)}</strong></div>
        <div style="margin-bottom:4px"><span class="badge ${statusBadge(o.status)}">${o.status}</span></div>
        <div><span class="badge ${payBadge(o.payment)}">${o.payment}</span></div>
        ${o.notes ? `<div style="font-size:12px;color:var(--text3);margin-top:6px">📝 ${esc(o.notes)}</div>` : ''}
      </div>
    </div>

    <!-- Invoice Preview -->
    <div class="invoice">
      <div class="inv-header">
        <div>
          <div class="inv-brand">OrderFlow</div>
          <div style="font-size:12px;color:var(--text3)">Invoice #INV-${o.id.replace('ORD-','')}</div>
        </div>
        <div class="inv-meta">
          <div style="font-size:12px;color:var(--text3)">Date: ${formatDate(o.date)}</div>
          <div style="font-size:12px;color:var(--text3)">${esc(o.customer)}</div>
        </div>
      </div>
      <table class="inv-table">
        <thead><tr><th>Item</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
        <tbody>
          ${o.items.map(it=>`
          <tr>
            <td style="color:var(--text)">${esc(it.name)}</td>
            <td style="color:var(--text2)">${it.qty}</td>
            <td style="font-family:'Fira Code',monospace">$${fmt(it.price)}</td>
            <td style="font-family:'Fira Code',monospace;font-weight:700">$${fmt(it.price*it.qty)}</td>
          </tr>`).join('')}
        </tbody>
      </table>
      <div class="inv-total">
        <div style="display:inline-block;min-width:220px;text-align:right">
          <div style="display:flex;justify-content:space-between;font-size:12.5px;color:var(--text2);margin-bottom:3px">
            <span>Subtotal</span><span class="mono">$${fmt(o.subtotal)}</span>
          </div>
          ${o.shipping>0?`<div style="display:flex;justify-content:space-between;font-size:12.5px;color:var(--text2);margin-bottom:3px"><span>Shipping</span><span class="mono">$${fmt(o.shipping)}</span></div>`:''}
          ${o.discount>0?`<div style="display:flex;justify-content:space-between;font-size:12.5px;color:#16a34a;margin-bottom:3px"><span>Discount</span><span class="mono">-$${fmt(o.discount)}</span></div>`:''}
          <div style="display:flex;justify-content:space-between;font-size:16px;font-weight:800;color:var(--accent);border-top:2px solid var(--border);padding-top:6px;margin-top:6px">
            <span>Total</span><span class="mono">$${fmt(o.total)}</span>
          </div>
        </div>
      </div>
    </div>
  `;
  document.getElementById('view-overlay').classList.add('open');
  lucide.createIcons();
}
function closeViewModal() { document.getElementById('view-overlay').classList.remove('open'); }
function printInvoice() {
  showToast('Opening print dialog…','info');
  setTimeout(() => window.print(), 400);
}

/* ═══════════════════════════════════════
   DELETE
═══════════════════════════════════════ */
function openDelModal(id) {
  deleteId = id;
  document.getElementById('del-order-id').textContent = id;
  document.getElementById('del-overlay').classList.add('open');
  lucide.createIcons();
}
function closeDelModal() {
  deleteId = null;
  document.getElementById('del-overlay').classList.remove('open');
}
function confirmDelete() {
  if (!deleteId) return;
  showLoader(true);
  setTimeout(() => {
    orders = orders.filter(o=>o.id!==deleteId);
    filteredOrds = filteredOrds.filter(o=>o.id!==deleteId);
    saveOrders();
    closeDelModal();
    renderTable(); renderPagination(); renderStatCards();
    updateSidebarBadge(); setSubtitle();
    showToast(`Order ${deleteId} deleted.`, 'error');
    showLoader(false);
  }, 450);
}

/* ═══════════════════════════════════════
   CREATE / EDIT MODAL
═══════════════════════════════════════ */
function openCreateModal() {
  editId = null;
  document.getElementById('modal-title').textContent = 'Create Order';
  document.getElementById('modal-save-label').textContent = 'Create Order';
  document.getElementById('modal-main-icon').setAttribute('data-lucide','package-plus');
  clearForm();
  // Set today's date
  document.getElementById('f-date').value = new Date().toISOString().split('T')[0];
  // Add one empty product row
  document.getElementById('product-rows').innerHTML = '';
  productRowCnt = 0;
  addProductRow();
  calcTotal();
  document.getElementById('order-overlay').classList.add('open');
  lucide.createIcons();
}

function editOrder(id) {
  editId = id;
  const o = orders.find(x=>x.id===id);
  if (!o) return;
  document.getElementById('modal-title').textContent = 'Edit Order';
  document.getElementById('modal-save-label').textContent = 'Save Changes';
  document.getElementById('modal-main-icon').setAttribute('data-lucide','pencil');
  clearForm();
  document.getElementById('f-cname').value    = o.customer;
  document.getElementById('f-phone').value    = o.phone;
  document.getElementById('f-email').value    = o.email||'';
  document.getElementById('f-date').value     = o.date;
  document.getElementById('f-address').value  = o.address||'';
  document.getElementById('f-payment').value  = o.payment;
  document.getElementById('f-status').value   = o.status;
  document.getElementById('f-discount').value = o.discount||0;
  document.getElementById('f-shipping').value = o.shipping||0;
  document.getElementById('f-notes').value    = o.notes||'';
  // Populate product rows
  document.getElementById('product-rows').innerHTML = '';
  productRowCnt = 0;
  o.items.forEach(it => addProductRow(it));
  calcTotal();
  document.getElementById('order-overlay').classList.add('open');
  lucide.createIcons();
}

function closeOrderModal() { document.getElementById('order-overlay').classList.remove('open'); }

function clearForm() {
  ['f-cname','f-phone','f-email','f-address','f-notes'].forEach(id => {
    const el = document.getElementById(id); if (el) el.value = '';
  });
  document.getElementById('f-payment').value = 'Pending';
  document.getElementById('f-status').value  = 'Processing';
  document.getElementById('f-discount').value = '0';
  document.getElementById('f-shipping').value = '0';
  clearFormErrors();
}
function clearFormErrors() {
  ['e-cname','e-phone','e-date','e-items'].forEach(id => document.getElementById(id)?.classList.remove('show'));
  ['f-cname','f-phone','f-date'].forEach(id => document.getElementById(id)?.classList.remove('err'));
}

/* ─── Product Rows ─── */
function addProductRow(item=null) {
  const idx = productRowCnt++;
  const opts = PRODUCTS.map(p => `<option value="${p.id}" data-price="${p.price}" ${item&&item.pid===p.id?'selected':''}>${p.name} — $${p.price}</option>`).join('');
  const row = document.createElement('div');
  row.className = 'prow'; row.id = `prow-${idx}`;
  row.innerHTML = `
    <div>
      <label class="fl" style="margin-bottom:4px">Product</label>
      <select class="fs" id="psel-${idx}" onchange="calcTotal()">
        <option value="">Select product…</option>
        ${opts}
      </select>
    </div>
    <div>
      <label class="fl" style="margin-bottom:4px">Qty</label>
      <input type="number" id="pqty-${idx}" class="fi" min="1" value="${item?item.qty:1}" oninput="calcTotal()"/>
    </div>
    <div>
      <label class="fl" style="margin-bottom:4px">Price</label>
      <input type="text" id="pprice-${idx}" class="fi" readonly style="cursor:default;opacity:.7" value="${item?'$'+fmt(item.price):''}"/>
    </div>
    <button type="button" class="prow-rm" onclick="removeProductRow(${idx})" title="Remove">
      <i data-lucide="x" style="width:13px;height:13px"></i>
    </button>
  `;
  document.getElementById('product-rows').appendChild(row);
  if (item) {
    // set select value after append
    const sel = document.getElementById(`psel-${idx}`);
    if (sel) sel.value = item.pid;
  }
  lucide.createIcons();
}
function removeProductRow(idx) {
  const row = document.getElementById(`prow-${idx}`);
  if (row) { row.remove(); calcTotal(); }
}
function getProductRows() {
  const rows = [];
  document.querySelectorAll('[id^="prow-"]').forEach(row => {
    const idx   = row.id.replace('prow-','');
    const sel   = document.getElementById(`psel-${idx}`);
    const qty   = parseInt(document.getElementById(`pqty-${idx}`)?.value)||1;
    if (!sel || !sel.value) return;
    const opt   = sel.options[sel.selectedIndex];
    const price = parseFloat(opt.dataset.price)||0;
    const pid   = sel.value;
    const name  = opt.text.split(' — ')[0];
    const cat   = PRODUCTS.find(p=>p.id===pid)?.cat||'';
    rows.push({ pid, name, price, qty, cat });
    // update price display
    const pf = document.getElementById(`pprice-${idx}`);
    if (pf) pf.value = '$' + fmt(price);
  });
  return rows;
}
function calcTotal() {
  const items    = getProductRows();
  const subtotal = items.reduce((s,x) => s + x.price*x.qty, 0);
  const discount = parseFloat(document.getElementById('f-discount')?.value)||0;
  const shipping = parseFloat(document.getElementById('f-shipping')?.value)||0;
  const total    = Math.max(0, subtotal + shipping - discount);
  const se = document.getElementById('order-subtotal');
  const te = document.getElementById('order-total');
  if (se) se.textContent = '$'+fmt(subtotal);
  if (te) te.textContent = '$'+fmt(total);
}

/* ─── Submit ─── */
function handleOrderSubmit(e) {
  e.preventDefault();
  clearFormErrors();
  let ok = true;
  const cname = document.getElementById('f-cname').value.trim();
  const phone = document.getElementById('f-phone').value.trim();
  const date  = document.getElementById('f-date').value;
  const items = getProductRows();

  if (!cname) { showFErr('f-cname','e-cname'); ok=false; }
  if (!phone) { showFErr('f-phone','e-phone'); ok=false; }
  if (!date)  { showFErr('f-date', 'e-date');  ok=false; }
  if (!items.length) { document.getElementById('e-items').classList.add('show'); ok=false; }
  if (!ok) return;

  showLoader(true);
  setTimeout(() => {
    const subtotal = items.reduce((s,x)=>s+x.price*x.qty,0);
    const discount = parseFloat(document.getElementById('f-discount').value)||0;
    const shipping = parseFloat(document.getElementById('f-shipping').value)||0;
    const total    = Math.max(0, subtotal+shipping-discount);

    if (editId) {
      const idx = orders.findIndex(o=>o.id===editId);
      if (idx !== -1) {
        orders[idx] = { ...orders[idx],
          customer:cname, phone, email:document.getElementById('f-email').value.trim(),
          address:document.getElementById('f-address').value.trim(),
          date, items, subtotal, discount, shipping, total,
          payment:document.getElementById('f-payment').value,
          status:document.getElementById('f-status').value,
          notes:document.getElementById('f-notes').value.trim(),
        };
      }
      showToast(`Order ${editId} updated!`, 'success');
    } else {
      const newId = `ORD-${String(100000 + orders.length + 1).slice(-5).padStart(5,'0')}`;
      orders.unshift({
        id:newId, customer:cname, phone,
        email:document.getElementById('f-email').value.trim(),
        address:document.getElementById('f-address').value.trim(),
        date, items, subtotal, discount, shipping, total,
        payment:document.getElementById('f-payment').value,
        status:document.getElementById('f-status').value,
        notes:document.getElementById('f-notes').value.trim(),
        createdAt:Date.now(),
      });
      showToast(`Order ${newId} created!`, 'success');
    }
    saveOrders();
    closeOrderModal();
    applyFilters(); renderStatCards(); updateSidebarBadge(); setSubtitle();
    showLoader(false);
  }, 500);
}
function showFErr(fi, ei) {
  document.getElementById(fi)?.classList.add('err');
  document.getElementById(ei)?.classList.add('show');
}

/* ═══════════════════════════════════════
   EXPORT CSV
═══════════════════════════════════════ */
function exportCSV() {
  const cols = ['Order ID','Customer','Phone','Email','Date','Subtotal','Discount','Shipping','Total','Payment','Status','Notes'];
  const rows = orders.map(o=>[o.id,`"${o.customer}"`,o.phone,o.email||'',o.date,o.subtotal,o.discount||0,o.shipping||0,o.total,o.payment,o.status,`"${o.notes||''}"`]);
  const csv  = [cols,...rows].map(r=>r.join(',')).join('\n');
  const blob = new Blob([csv],{type:'text/csv'});
  const url  = URL.createObjectURL(blob);
  Object.assign(document.createElement('a'),{href:url,download:'orderflow-orders.csv'}).click();
  URL.revokeObjectURL(url);
  showToast(`Exported ${orders.length} orders as CSV!`,'success');
}

/* ═══════════════════════════════════════
   SIDEBAR BADGE
═══════════════════════════════════════ */
function updateSidebarBadge() {
  const el = document.getElementById('sidebar-count');
  if (el) el.textContent = orders.length;
}

/* ═══════════════════════════════════════
   NOTIFICATIONS
═══════════════════════════════════════ */
function showNotification() {
  const pending = orders.filter(o=>o.status==='Processing').length;
  showToast(`${pending} orders are currently being processed.`, 'warn');
}

/* ═══════════════════════════════════════
   ANALYTICS
═══════════════════════════════════════ */
function destroyCharts() {
  [revChart,statusChart,prodChart].forEach(c=>c&&c.destroy());
  revChart=statusChart=prodChart=null;
}
function isDark() { return document.documentElement.getAttribute('data-theme')==='dark'; }
function cText()  { return isDark()?'#a8a49a':'#5c5850'; }
function cGrid()  { return isDark()?'rgba(255,255,255,.05)':'rgba(0,0,0,.06)'; }
const MONTHS=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
const PALETTE=['#e85d2f','#3b82f6','#16a34a','#d97706','#7c3aed','#0891b2','#ec4899'];

function buildAnalytics() {
  // Stat cards
  const total    = orders.length;
  const revenue  = orders.filter(o=>o.payment==='Paid').reduce((s,o)=>s+o.total,0);
  const avgOrder = total ? revenue/total : 0;
  const delivered= orders.filter(o=>o.status==='Delivered').length;
  const defs = [
    {lbl:'Total Revenue', val:'$'+fmt(revenue), icon:'dollar-sign', iconBg:'rgba(232,93,47,.12)', iconC:'var(--accent)', delta:'+8%', dt:'up'},
    {lbl:'Total Orders',  val:total,             icon:'package',     iconBg:'rgba(59,130,246,.12)', iconC:'#3b82f6',       delta:'+12%',dt:'up'},
    {lbl:'Avg Order Val', val:'$'+fmt(avgOrder), icon:'trending-up', iconBg:'rgba(22,163,74,.12)', iconC:'#16a34a',       delta:'+5%', dt:'up'},
    {lbl:'Fulfilled',     val:delivered,         icon:'check-circle',iconBg:'rgba(124,58,237,.12)',iconC:'#7c3aed',       delta:Math.round(delivered/Math.max(total,1)*100)+'%', dt:'nt'},
  ];
  const aw = document.getElementById('analytics-stats');
  if (aw) {
    aw.innerHTML = defs.map(d=>`
      <div class="card stat-card">
        <div class="stat-icon" style="background:${d.iconBg}"><i data-lucide="${d.icon}" style="width:18px;height:18px;color:${d.iconC}"></i></div>
        <div class="stat-val">${d.val}</div>
        <div class="stat-lbl">${d.lbl}</div>
        <div class="stat-delta ${d.dt}">${d.delta}</div>
      </div>`).join('');
    lucide.createIcons();
  }

  // Revenue chart (monthly mock)
  const rc = document.getElementById('rev-chart');
  if (rc) {
    if (revChart) revChart.destroy();
    const revData = [21200,25800,19600,31400,34000,28500,38200,41700,37100,44800,42300,51600];
    revChart = new Chart(rc,{
      type:'line',
      data:{labels:MONTHS,datasets:[{
        label:'Revenue ($)',data:revData,
        borderColor:'#e85d2f',backgroundColor:'rgba(232,93,47,.08)',
        fill:true,tension:.42,pointBackgroundColor:'#e85d2f',pointRadius:4,
      }]},
      options:{
        responsive:true,maintainAspectRatio:false,
        plugins:{legend:{display:false}},
        scales:{
          x:{grid:{color:cGrid()},ticks:{color:cText(),font:{size:11}}},
          y:{grid:{color:cGrid()},ticks:{color:cText(),font:{size:11},callback:v=>'$'+v.toLocaleString()}},
        }
      }
    });
  }

  // Status donut
  const sc = document.getElementById('status-chart');
  if (sc) {
    if (statusChart) statusChart.destroy();
    const sMap = {};
    orders.forEach(o=>{sMap[o.status]=(sMap[o.status]||0)+1});
    const labels = Object.keys(sMap);
    const data   = labels.map(l=>sMap[l]);
    const clrs   = labels.map(l=>({Delivered:'#16a34a',Shipped:'#3b82f6',Processing:'#d97706',Cancelled:'#dc2626'}[l]||'#aaa'));
    statusChart = new Chart(sc,{
      type:'doughnut',
      data:{labels,datasets:[{data,backgroundColor:clrs,borderWidth:0,hoverOffset:6}]},
      options:{responsive:true,maintainAspectRatio:false,cutout:'68%',plugins:{legend:{display:false}}}
    });
    const leg = document.getElementById('status-legend');
    if (leg) leg.innerHTML = labels.map((l,i)=>`
      <div style="display:flex;align-items:center;justify-content:space-between">
        <div style="display:flex;align-items:center;gap:6px">
          <span style="width:9px;height:9px;border-radius:3px;background:${clrs[i]};display:inline-block"></span>
          <span style="font-size:12px;color:var(--text2)">${l}</span>
        </div>
        <span style="font-size:12px;font-weight:700;color:var(--text);font-family:'Fira Code',monospace">${data[i]}</span>
      </div>`).join('');
  }

  // Top products bar
  const pc = document.getElementById('prod-chart');
  if (pc) {
    if (prodChart) prodChart.destroy();
    const pMap = {};
    orders.forEach(o=>o.items.forEach(it=>{pMap[it.name]=(pMap[it.name]||0)+it.qty}));
    const sorted = Object.entries(pMap).sort((a,b)=>b[1]-a[1]).slice(0,8);
    prodChart = new Chart(pc,{
      type:'bar',
      data:{
        labels:sorted.map(x=>x[0].length>18?x[0].slice(0,16)+'…':x[0]),
        datasets:[{label:'Units Sold',data:sorted.map(x=>x[1]),backgroundColor:PALETTE,borderRadius:6}]
      },
      options:{
        indexAxis:'y',responsive:true,maintainAspectRatio:false,
        plugins:{legend:{display:false}},
        scales:{
          x:{grid:{color:cGrid()},ticks:{color:cText(),font:{size:11}}},
          y:{grid:{display:false},ticks:{color:cText(),font:{size:11}}}
        }
      }
    });
  }

  // Category revenue bars
  const catMap = {};
  orders.filter(o=>o.payment==='Paid').forEach(o=>o.items.forEach(it=>{
    catMap[it.cat]=(catMap[it.cat]||0)+it.price*it.qty;
  }));
  const maxCat = Math.max(...Object.values(catMap),1);
  const catEl = document.getElementById('cat-bars');
  if (catEl) {
    catEl.innerHTML = Object.entries(catMap).sort((a,b)=>b[1]-a[1]).map(([cat,val],i)=>`
      <div style="margin-bottom:14px">
        <div style="display:flex;justify-content:space-between;margin-bottom:4px">
          <span style="font-size:13px;font-weight:600;color:var(--text)">${cat}</span>
          <span style="font-size:12.5px;font-weight:700;color:var(--text);font-family:'Fira Code',monospace">$${fmt(val)}</span>
        </div>
        <div style="height:7px;background:var(--surface2);border-radius:99px;overflow:hidden">
          <div style="height:100%;width:${Math.round(val/maxCat*100)}%;background:${PALETTE[i%PALETTE.length]};border-radius:99px;transition:width .6s ease"></div>
        </div>
      </div>`).join('');
  }
}

/* ═══════════════════════════════════════
   AI INSIGHTS
═══════════════════════════════════════ */
function buildAI() {
  const total     = orders.length;
  const delivered = orders.filter(o=>o.status==='Delivered').length;
  const cancelled = orders.filter(o=>o.status==='Cancelled').length;
  const pending   = orders.filter(o=>o.status==='Processing').length;
  const revenue   = orders.filter(o=>o.payment==='Paid').reduce((s,o)=>s+o.total,0);
  const paidPct   = Math.round(orders.filter(o=>o.payment==='Paid').length/Math.max(total,1)*100);

  // Top product
  const pMap={};
  orders.forEach(o=>o.items.forEach(it=>{pMap[it.name]=(pMap[it.name]||0)+it.qty}));
  const topProd = Object.entries(pMap).sort((a,b)=>b[1]-a[1])[0];
  const lowProd = Object.entries(pMap).sort((a,b)=>a[1]-b[1])[0];

  // Avg delivery time mock
  const cancelRate = Math.round(cancelled/Math.max(total,1)*100);
  const fillRate   = Math.round(delivered/Math.max(total,1)*100);

  const insights = [
    {tag:'trend',  tagLabel:'Trend',   dot:'#3b82f6', text:`Orders are up <strong>20% this week</strong> compared to last week. Total orders: ${total}.`},
    {tag:'top',    tagLabel:'Top',     dot:'#16a34a', text:`<strong>${topProd?topProd[0]:'N/A'}</strong> is your best-selling product with ${topProd?topProd[1]:0} units sold.`},
    {tag:'warn',   tagLabel:'Alert',   dot:'#d97706', text:`${pending} orders are currently in <strong>Processing</strong> status — review for delays.`},
    {tag:'warn',   tagLabel:'Alert',   dot:'#dc2626', text:`Cancellation rate is <strong>${cancelRate}%</strong>. ${cancelRate>15?'Action needed — investigate causes.':'Performing well.'}`},
    {tag:'trend',  tagLabel:'Trend',   dot:'#7c3aed', text:`Payment collection rate is <strong>${paidPct}%</strong>. ${paidPct<60?'Consider follow-up on pending invoices.':'Great payment conversion!'}`},
    {tag:'top',    tagLabel:'Top',     dot:'#16a34a', text:`Order fulfillment rate: <strong>${fillRate}%</strong> delivered successfully.`},
  ];
  const suggestions = [
    {tag:'tip', tagLabel:'Tip',    dot:'#f97316', text:'Improve delivery time: Consider partnering with additional logistics providers.'},
    {tag:'tip', tagLabel:'Tip',    dot:'#f97316', text:`Promote <strong>${topProd?topProd[0]:'top products'}</strong> with bundles or discounts to increase AOV.`},
    {tag:'tip', tagLabel:'Tip',    dot:'#f97316', text:`<strong>${lowProd?lowProd[0]:'Slow products'}</strong> has low sales. Consider running a promotion or discontinuing.`},
    {tag:'tip', tagLabel:'Tip',    dot:'#f97316', text:'Send automated follow-up emails for orders pending >48 hours to reduce abandonment.'},
    {tag:'tip', tagLabel:'Tip',    dot:'#f97316', text:'Set up restock alerts for products with <5 units in inventory.'},
  ];

  const insBox = document.getElementById('ai-insights-box');
  if (insBox) {
    insBox.innerHTML = `
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
        <i data-lucide="zap" style="width:18px;height:18px;color:#f97316"></i>
        <span style="font-size:14px;font-weight:800;color:#f0ede6">Auto Insights</span>
      </div>
      ${insights.map(i=>`
        <div class="ai-insight">
          <div class="ai-dot" style="background:${i.dot}"></div>
          <div class="ai-text">
            <span class="ai-tag tag-${i.tag}">${i.tagLabel}</span>${i.text}
          </div>
        </div>`).join('')}
    `;
  }

  const sugBox = document.getElementById('ai-suggestions-box');
  if (sugBox) {
    sugBox.innerHTML = `
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
        <i data-lucide="lightbulb" style="width:18px;height:18px;color:#fbbf24"></i>
        <span style="font-size:14px;font-weight:800;color:#f0ede6">Smart Suggestions</span>
      </div>
      ${suggestions.map(s=>`
        <div class="ai-insight">
          <div class="ai-dot" style="background:${s.dot}"></div>
          <div class="ai-text">
            <span class="ai-tag tag-${s.tag}">${s.tagLabel}</span>${s.text}
          </div>
        </div>`).join('')}
    `;
  }

  // AI stat mini cards
  const aiStats = document.getElementById('ai-stat-cards');
  if (aiStats) {
    const stats = [
      {lbl:'Conversion Rate',  val:paidPct+'%',         color:'#e85d2f', icon:'percent'},
      {lbl:'Cancel Rate',      val:cancelRate+'%',       color:'#dc2626', icon:'x-circle'},
      {lbl:'Fulfillment Rate', val:fillRate+'%',         color:'#16a34a', icon:'check-circle'},
      {lbl:'Avg Order Value',  val:'$'+fmt(revenue/Math.max(total,1)), color:'#7c3aed', icon:'dollar-sign'},
      {lbl:'Pending Payments', val:orders.filter(o=>o.payment==='Pending').length, color:'#d97706', icon:'clock'},
      {lbl:'Revenue (Paid)',   val:'$'+fmt(revenue),    color:'#3b82f6', icon:'trending-up'},
    ];
    aiStats.innerHTML = stats.map(s=>`
      <div class="card stat-card" style="cursor:default">
        <div class="stat-icon" style="background:${s.color}18"><i data-lucide="${s.icon}" style="width:17px;height:17px;color:${s.color}"></i></div>
        <div class="stat-val" style="font-size:22px">${s.val}</div>
        <div class="stat-lbl">${s.lbl}</div>
      </div>`).join('');
  }

  // Performance bars
  const perfEl = document.getElementById('perf-bars');
  if (perfEl) {
    const bars = [
      {lbl:'Order Fulfillment',  pct:fillRate,   color:'#16a34a'},
      {lbl:'Payment Collection', pct:paidPct,    color:'#3b82f6'},
      {lbl:'Customer Retention', pct:72,          color:'#7c3aed'},
      {lbl:'On-time Delivery',   pct:Math.max(0,fillRate-8), color:'#e85d2f'},
      {lbl:'Product Availability', pct:88,        color:'#d97706'},
    ];
    perfEl.innerHTML = bars.map(b=>`
      <div style="margin-bottom:14px">
        <div style="display:flex;justify-content:space-between;margin-bottom:4px">
          <span style="font-size:13px;font-weight:600;color:var(--text)">${b.lbl}</span>
          <span style="font-size:12px;font-weight:700;color:${b.color};font-family:'Fira Code',monospace">${b.pct}%</span>
        </div>
        <div style="height:8px;background:var(--surface2);border-radius:99px;overflow:hidden">
          <div style="height:100%;width:${b.pct}%;background:${b.color};border-radius:99px;transition:width .6s ease"></div>
        </div>
      </div>`).join('');
  }

  lucide.createIcons();
}

function refreshAI() {
  showLoader(true);
  setTimeout(() => { buildAI(); showLoader(false); showToast('AI insights refreshed!', 'success'); }, 800);
}

/* ═══════════════════════════════════════
   LOADER / TOAST
═══════════════════════════════════════ */
function showLoader(on) { document.getElementById('loader').style.display = on ? 'flex' : 'none'; }

function showToast(msg, type='info') {
  const icons = {success:'check-circle',error:'x-circle',info:'info',warn:'alert-triangle'};
  const wrap  = document.getElementById('toast-wrap');
  const div   = document.createElement('div');
  div.className = `toast t-${type}`;
  div.innerHTML = `<i data-lucide="${icons[type]||'info'}" class="ti" style="width:16px;height:16px;flex-shrink:0"></i><span>${msg}</span>`;
  wrap.appendChild(div);
  lucide.createIcons();
  setTimeout(() => {
    div.classList.add('hiding');
    setTimeout(() => div.remove(), 280);
  }, 3500);
}

/* ═══════════════════════════════════════
   UTILITIES
═══════════════════════════════════════ */
function esc(s) {
  return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}
function fmt(n) {
  return (Math.round((parseFloat(n)||0)*100)/100).toLocaleString('en-US',{minimumFractionDigits:2,maximumFractionDigits:2});
}
function formatDate(d) {
  if (!d) return '—';
  return new Date(d+'T00:00:00').toLocaleDateString('en-US',{year:'numeric',month:'short',day:'numeric'});
}

// Close overlays on backdrop click
['del-overlay','view-overlay','order-overlay'].forEach(id=>{
  document.getElementById(id).addEventListener('click', function(e){ if(e.target===this) this.classList.remove('open'); });
});
// ESC key
document.addEventListener('keydown', e=>{
  if(e.key==='Escape') ['del-overlay','view-overlay','order-overlay'].forEach(id=>document.getElementById(id).classList.remove('open'));
});
</script>
</body>
</html>
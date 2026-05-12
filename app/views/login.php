<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<title>Easy Billing Pro — Sign In</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300;12..96,400;12..96,500;12..96,600;12..96,700;12..96,800&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400;0,6..96,700;1,6..96,400;1,6..96,700&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
  darkMode: ['attribute', '[data-theme="dark"]'],
  theme: {
    extend: {
      fontFamily: {
        sans:    ['Bricolage Grotesque', 'sans-serif'],
        display: ['Bodoni Moda', 'serif'],
        mono:    ['Fira Code', 'monospace'],
      }
    }
  }
}
</script>

<style>
/* ══════════════════════════════════════════════════════════
   EASY BILLING PRO — PREMIUM MOBILE-RESPONSIVE LOGIN
   Warm Cream · Forest Green · Terracotta Accents
   Typography: Bricolage Grotesque × Bodoni Moda × Fira Code
══════════════════════════════════════════════════════════ */
:root {
  /* LIGHT theme */
  --bg:       #f7f3ed;
  --surf:     #ffffff;
  --surf2:    #f2ede5;
  --surf3:    #ebe4d9;
  --bdr:      #ddd5c5;
  --bdr2:     #ccc0ab;
  --txt:      #1a1510;
  --txt2:     #6b5a46;
  --txt3:     #a8927a;
  --forest:   #1e5631;  /* deep forest green */
  --forest2:  #163d24;
  --forestlt: rgba(30,86,49,.1);
  --terra:    #c0522a;  /* terracotta */
  --terralt:  rgba(192,82,42,.1);
  --gold:     #b59010;
  --goldlt:   rgba(181,144,16,.1);
  --red:      #c0202a;
  --redlt:    rgba(192,32,42,.1);
  --grn:      #1a6b3a;
  --grnlt:    rgba(26,107,58,.1);
  --sh:       0 1px 4px rgba(0,0,0,.06), 0 4px 20px rgba(0,0,0,.08);
  --sh-md:    0 8px 36px rgba(0,0,0,.12);
  --sh-lg:    0 16px 56px rgba(0,0,0,.16);
  --sh-card:  0 2px 1px rgba(255,255,255,.8) inset, 0 20px 60px rgba(0,0,0,.14);
}
[data-theme="dark"] {
  --bg:       #0d0c08;
  --surf:     #1a1710;
  --surf2:    #221f15;
  --surf3:    #2a261a;
  --bdr:      #352f20;
  --bdr2:     #46402e;
  --txt:      #f0ebe0;
  --txt2:     #a8987a;
  --txt3:     #6a5e48;
  --sh:       0 1px 4px rgba(0,0,0,.3), 0 4px 20px rgba(0,0,0,.2);
  --sh-md:    0 8px 36px rgba(0,0,0,.45);
  --sh-lg:    0 16px 56px rgba(0,0,0,.6);
  --sh-card:  0 2px 1px rgba(255,255,255,.04) inset, 0 20px 60px rgba(0,0,0,.5);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { height: 100%; -webkit-text-size-adjust: 100%; }
body {
  font-family: 'Bricolage Grotesque', sans-serif;
  background: var(--bg);
  color: var(--txt);
  min-height: 100vh;
  -webkit-font-smoothing: antialiased;
  transition: background .3s, color .3s;
  overflow-x: hidden;
}
::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-thumb { background: var(--bdr2); border-radius: 99px; }

/* ══════════════════════════════════
   LAYOUT — SPLIT SCREEN
══════════════════════════════════ */
.layout {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1.1fr 1fr;
}

/* ══════════════════════════════════
   LEFT PANEL — BRAND + INFO
══════════════════════════════════ */
.left {
  background: var(--forest);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: clamp(36px,5vw,56px);
  min-height: 100vh;
}

/* SVG mesh animation */
.mesh-bg {
  position: absolute;
  inset: 0;
  overflow: hidden;
  pointer-events: none;
}
.mesh-bg svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
}

/* Decorative circles */
.decor-ring {
  position: absolute;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,.07);
  pointer-events: none;
}

/* Floating blobs */
.blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(70px);
  pointer-events: none;
  animation: blobDrift 15s ease-in-out infinite;
}
@keyframes blobDrift {
  0%,100% { transform: translate(0,0) scale(1); }
  33% { transform: translate(20px,-30px) scale(1.08); }
  66% { transform: translate(-20px,20px) scale(.94); }
}

/* Grain texture */
.grain {
  position: absolute;
  inset: 0;
  pointer-events: none;
  opacity: .04;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  background-size: 200px 200px;
}

/* Animated underline */
.anim-line {
  display: inline-block;
  position: relative;
}
.anim-line::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 100%;
  height: 2px;
  background: rgba(255,255,255,.35);
  transform-origin: left;
  animation: lineGrow 1.2s cubic-bezier(.77,0,.18,1) 1s both;
}
@keyframes lineGrow {
  from { transform: scaleX(0); }
  to   { transform: scaleX(1); }
}

/* Feature badges */
.feat-row {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 14px;
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 12px;
  backdrop-filter: blur(4px);
  transition: background .2s;
  animation: slideInLeft .6s cubic-bezier(.34,1.56,.64,1) both;
}
.feat-row:hover { background: rgba(255,255,255,.12); }
.feat-row:nth-child(1) { animation-delay: .15s; }
.feat-row:nth-child(2) { animation-delay: .25s; }
.feat-row:nth-child(3) { animation-delay: .35s; }
@keyframes slideInLeft {
  from { opacity: 0; transform: translateX(-20px); }
  to   { opacity: 1; transform: none; }
}

.feat-ico {
  width: 36px; height: 36px;
  border-radius: 9px;
  background: rgba(255,255,255,.12);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 15px;
  color: rgba(255,255,255,.9);
  flex-shrink: 0;
}

/* Stat pills */
.stat-pill {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 12px 18px;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 12px;
  text-align: center;
  flex: 1;
  min-width: 0;
}
.stat-n { font-family: 'Fira Code', monospace; font-size: 22px; font-weight: 600; color: #fff; }
.stat-l { font-size: 10.5px; color: rgba(255,255,255,.55); margin-top: 2px; font-weight: 500; }

/* Testimonial card */
.testimonial {
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 14px;
  padding: 16px;
  animation: fadeUp .7s ease .5s both;
}
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(16px); }
  to   { opacity: 1; transform: none; }
}

/* ══════════════════════════════════
   RIGHT PANEL — FORM
══════════════════════════════════ */
.right {
  background: var(--surf);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: clamp(32px,5vw,64px) clamp(24px,5vw,56px);
  position: relative;
  transition: background .3s;
  min-height: 100vh;
  overflow-y: auto;
}

/* Subtle texture on right */
.right::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 100% 0%, rgba(30,86,49,.03) 0%, transparent 60%),
              radial-gradient(ellipse at 0% 100%, rgba(192,82,42,.03) 0%, transparent 60%);
  pointer-events: none;
}

/* Theme toggle button */
.theme-btn {
  position: fixed;
  top: 18px;
  right: 18px;
  width: 38px; height: 38px;
  border-radius: 10px;
  background: var(--surf2);
  border: 1px solid var(--bdr);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: var(--txt2);
  font-size: 15px;
  transition: all .15s;
  z-index: 80;
  box-shadow: var(--sh);
}
.theme-btn:hover { background: var(--surf3); color: var(--txt); }

/* ══════════════════════════════════
   FORM COMPONENTS
══════════════════════════════════ */
.form-wrap {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

/* Stagger animations */
.fi { animation: formIn .55s cubic-bezier(.34,1.56,.64,1) both; }
.fi:nth-child(1) { animation-delay: .06s; }
.fi:nth-child(2) { animation-delay: .12s; }
.fi:nth-child(3) { animation-delay: .18s; }
.fi:nth-child(4) { animation-delay: .24s; }
.fi:nth-child(5) { animation-delay: .30s; }
.fi:nth-child(6) { animation-delay: .36s; }
.fi:nth-child(7) { animation-delay: .42s; }
.fi:nth-child(8) { animation-delay: .48s; }
.fi:nth-child(9) { animation-delay: .54s; }
@keyframes formIn {
  from { opacity: 0; transform: translateY(18px) scale(.97); }
  to   { opacity: 1; transform: none; }
}

/* Logo mark */
.logo {
  width: 48px; height: 48px;
  border-radius: 13px;
  background: linear-gradient(135deg, var(--forest), #2d8a4b);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Bodoni Moda', serif;
  font-size: 22px;
  font-weight: 700;
  font-style: italic;
  color: #fff;
  box-shadow: 0 6px 20px rgba(30,86,49,.28);
  flex-shrink: 0;
}

/* Field */
.field {
  position: relative;
  margin-bottom: 14px;
}
.field-inp {
  width: 100%;
  background: var(--surf2);
  border: 1.5px solid var(--bdr);
  border-radius: 12px;
  padding: 14px 44px;
  font-family: 'Bricolage Grotesque', sans-serif;
  font-size: 14.5px;
  font-weight: 500;
  color: var(--txt);
  outline: none;
  transition: all .22s;
  caret-color: var(--forest);
  -webkit-appearance: none;
}
.field-inp.no-rpad { padding-right: 14px; }
.field-inp::placeholder { color: transparent; }
.field-inp:focus {
  border-color: var(--forest);
  background: var(--surf);
  box-shadow: 0 0 0 3px var(--forestlt);
}
.field-inp.err {
  border-color: var(--red);
  background: var(--redlt);
  box-shadow: 0 0 0 3px rgba(192,32,42,.1);
}
.field-inp.ok {
  border-color: rgba(26,107,58,.4);
  background: var(--grnlt);
}
.field-lbl {
  position: absolute;
  left: 44px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
  font-weight: 500;
  color: var(--txt3);
  pointer-events: none;
  transition: all .2s cubic-bezier(.4,0,.2,1);
  background: transparent;
}
.field-lbl.no-icon { left: 16px; }
.field-inp:focus ~ .field-lbl,
.field-inp.has-val ~ .field-lbl {
  top: -9px;
  transform: none;
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: .05em;
  text-transform: uppercase;
  color: var(--forest);
  background: var(--surf);
  padding: 0 5px;
  left: 10px;
}
[data-theme="dark"] .field-inp:focus ~ .field-lbl,
[data-theme="dark"] .field-inp.has-val ~ .field-lbl {
  background: var(--surf);
}
.field-inp.err:focus ~ .field-lbl,
.field-inp.err ~ .field-lbl { color: var(--red); }
.field-ico {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 15px;
  color: var(--txt3);
  transition: color .2s;
  pointer-events: none;
  z-index: 1;
}
.field-inp:focus ~ .field-lbl ~ .field-ico,
.field-inp:focus + .field-lbl + .field-ico { color: var(--forest); }
.field-right {
  position: absolute;
  right: 13px;
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  align-items: center;
  gap: 5px;
  z-index: 1;
}
.eye-btn {
  background: none;
  border: none;
  color: var(--txt3);
  cursor: pointer;
  font-size: 14px;
  padding: 5px;
  transition: color .15s;
  line-height: 1;
  -webkit-tap-highlight-color: transparent;
}
.eye-btn:hover { color: var(--txt); }
.tick-i { font-size: 13px; color: var(--grn); display: none; animation: pop .2s cubic-bezier(.34,1.56,.64,1); }
.err-i  { font-size: 13px; color: var(--red); display: none; animation: pop .2s cubic-bezier(.34,1.56,.64,1); }
@keyframes pop { from{opacity:0;transform:scale(.5)}to{opacity:1;transform:scale(1)} }

/* Validation message */
.v-msg {
  display: none;
  align-items: center;
  gap: 5px;
  margin-top: 4px;
  margin-left: 2px;
  font-size: 12px;
  font-weight: 600;
  color: var(--red);
  animation: msgIn .2s ease;
}
.v-msg.ok-msg { color: var(--grn); }
@keyframes msgIn { from{opacity:0;transform:translateY(-4px)}to{opacity:1;transform:none} }

/* ══ DIVIDER ══ */
.divider {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--txt3);
  font-size: 11.5px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .08em;
}
.divider::before, .divider::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--bdr);
}

/* ══ SOCIAL BTNS ══ */
.soc-btn {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 9px;
  padding: 12px;
  background: var(--surf2);
  border: 1.5px solid var(--bdr);
  border-radius: 11px;
  font-family: 'Bricolage Grotesque', sans-serif;
  font-size: 13.5px;
  font-weight: 600;
  color: var(--txt2);
  cursor: pointer;
  transition: all .18s;
  -webkit-tap-highlight-color: transparent;
}
.soc-btn:hover { background: var(--surf3); border-color: var(--bdr2); color: var(--txt); transform: translateY(-1px); }
.soc-btn:active { transform: translateY(0); }

/* ══ CHECKBOX ══ */
.cbx {
  width: 19px; height: 19px;
  border-radius: 6px;
  border: 1.5px solid var(--bdr2);
  background: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all .15s;
  flex-shrink: 0;
}
.cbx.on { background: var(--forest); border-color: var(--forest); box-shadow: 0 0 0 2px var(--forestlt); }
.cbx i { font-size: 10px; color: #fff; display: none; }
.cbx.on i { display: block; }

/* ══ PRIMARY BUTTON ══ */
.login-btn {
  width: 100%;
  padding: 14px;
  border-radius: 12px;
  background: var(--forest);
  color: #fff;
  font-family: 'Bricolage Grotesque', sans-serif;
  font-size: 15px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all .2s;
  letter-spacing: .01em;
  box-shadow: 0 4px 18px rgba(30,86,49,.28), 0 1px 4px rgba(0,0,0,.1);
  -webkit-tap-highlight-color: transparent;
}
.login-btn::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255,255,255,.12), transparent 60%);
  pointer-events: none;
}
.login-btn:hover:not(:disabled) {
  background: var(--forest2);
  transform: translateY(-2px);
  box-shadow: 0 8px 28px rgba(30,86,49,.35), 0 2px 8px rgba(0,0,0,.1);
}
.login-btn:active:not(:disabled) { transform: translateY(0); }
.login-btn:disabled { opacity: .55; cursor: not-allowed; transform: none; }
.login-btn .spin {
  display: none;
  width: 20px; height: 20px;
  border: 2.5px solid rgba(255,255,255,.3);
  border-top-color: #fff;
  border-radius: 50%;
  animation: spinAnim .7s linear infinite;
  margin: 0 auto;
}
@keyframes spinAnim { to { transform: rotate(360deg); } }

/* ══ RIPPLE ══ */
.ripple {
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,.25);
  transform: scale(0);
  animation: rippleGo .65s linear;
  pointer-events: none;
}
@keyframes rippleGo { to { transform: scale(5); opacity: 0; } }

/* ══ 2FA OTP ══ */
.otp-grid {
  display: flex;
  gap: clamp(6px,2vw,12px);
  justify-content: center;
}
.otp-inp {
  width: clamp(44px,12vw,56px);
  height: clamp(52px,14vw,66px);
  border-radius: 13px;
  background: var(--surf2);
  border: 1.5px solid var(--bdr);
  font-family: 'Fira Code', monospace;
  font-size: clamp(20px,5vw,26px);
  font-weight: 600;
  color: var(--txt);
  text-align: center;
  outline: none;
  transition: all .2s;
  caret-color: var(--forest);
  -webkit-appearance: none;
  -webkit-tap-highlight-color: transparent;
}
.otp-inp:focus {
  border-color: var(--forest);
  background: var(--surf);
  box-shadow: 0 0 0 3px var(--forestlt);
  transform: scale(1.06);
}
.otp-inp.filled {
  border-color: rgba(30,86,49,.4);
  color: var(--forest);
}
.otp-inp.otp-err {
  border-color: var(--red);
  background: var(--redlt);
  animation: shake .4s ease;
}

/* ══ FORGOT PWD MODAL ══ */
#fp-ov {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  z-index: 200;
  display: none;
  align-items: flex-end;
  justify-content: center;
  padding: 0;
}
#fp-ov.open { display: flex; }
#fp-modal {
  background: var(--surf);
  border-radius: 24px 24px 0 0;
  width: 100%;
  max-width: 480px;
  padding: 28px 24px clamp(28px,8vw,44px);
  box-shadow: 0 -8px 48px rgba(0,0,0,.2);
  animation: slideUp .35s cubic-bezier(.34,1.56,.64,1);
  border-top: 1px solid var(--bdr);
}
@keyframes slideUp {
  from { transform: translateY(100%); opacity: 0; }
  to   { transform: none; opacity: 1; }
}
.drag-handle {
  width: 40px; height: 4px;
  background: var(--bdr2);
  border-radius: 99px;
  margin: 0 auto 20px;
  cursor: grab;
}

/* ══ TOAST ══ */
#toast {
  position: fixed;
  top: 16px;
  left: 50%;
  transform: translateX(-50%) translateY(-80px);
  z-index: 999;
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 12px 18px;
  border-radius: 12px;
  background: var(--surf);
  border: 1px solid var(--bdr);
  box-shadow: var(--sh-lg);
  font-size: 13.5px;
  font-weight: 600;
  color: var(--txt);
  white-space: nowrap;
  transition: transform .35s cubic-bezier(.34,1.56,.64,1);
  max-width: calc(100vw - 32px);
  overflow: hidden;
  text-overflow: ellipsis;
}
#toast.show { transform: translateX(-50%) translateY(0); }

/* ══ SUCCESS ══ */
#success-panel { display: none; }
.check-wrap {
  width: 68px; height: 68px;
  border-radius: 50%;
  background: var(--grnlt);
  border: 2px solid rgba(26,107,58,.25);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  color: var(--grn);
  margin: 0 auto 20px;
  animation: checkPop .5s cubic-bezier(.34,1.56,.64,1);
}
@keyframes checkPop {
  from { transform: scale(0) rotate(-90deg); opacity: 0; }
  to   { transform: none; opacity: 1; }
}
@keyframes dotPulse {
  0%,100%{transform:scale(.8);opacity:.5}50%{transform:scale(1.2);opacity:1}
}

/* ══ RECENT ACCOUNTS ══ */
.acct-chip {
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 9px 12px;
  background: var(--surf2);
  border: 1px solid var(--bdr);
  border-radius: 11px;
  cursor: pointer;
  transition: all .15s;
  -webkit-tap-highlight-color: transparent;
}
.acct-chip:hover { background: var(--surf3); border-color: var(--forest); transform: translateY(-1px); }
.acct-av {
  width: 30px; height: 30px;
  border-radius: 8px;
  object-fit: cover;
  border: 1px solid var(--bdr);
  flex-shrink: 0;
}

/* ══ SHAKE ══ */
@keyframes shake {
  0%,100%{transform:translateX(0)}
  15%{transform:translateX(-7px)}30%{transform:translateX(7px)}
  45%{transform:translateX(-5px)}60%{transform:translateX(5px)}
  75%{transform:translateX(-3px)}90%{transform:translateX(3px)}
}

/* ══════════════════════════════════
   MOBILE RESPONSIVE
══════════════════════════════════ */
@media (max-width: 860px) {
  .layout { grid-template-columns: 1fr; }
  .left   { display: none; }
  .right  { min-height: 100vh; padding: 32px 20px 40px; }
  .mobile-brand { display: flex !important; }
  #fp-ov { align-items: flex-end; }
}
@media (min-width: 861px) {
  .mobile-brand { display: none !important; }
  #fp-ov { align-items: center; justify-content: center; }
  #fp-modal { border-radius: 20px; max-width: 420px; animation: cardIn .3s cubic-bezier(.34,1.56,.64,1); }
  @keyframes cardIn { from{opacity:0;transform:scale(.9) translateY(16px)}to{opacity:1;transform:none} }
  .drag-handle { display: none; }
}

/* Very small screens */
@media (max-width: 380px) {
  .right { padding: 24px 16px 36px; }
  .form-wrap { max-width: 100%; }
}
</style>
</head>
<body>

<!-- THEME TOGGLE -->
<button class="theme-btn" onclick="toggleTheme()" id="theme-btn" title="Toggle theme">
  <i class="fas fa-moon" id="theme-ico"></i>
</button>

<!-- TOAST -->
<div id="toast"><i id="toast-ico" class="fas fa-info-circle" style="flex-shrink:0;font-size:15px"></i><span id="toast-txt"></span></div>

<!-- FORGOT PASSWORD BOTTOM SHEET / MODAL -->
<div id="fp-ov">
  <div id="fp-modal">
    <div class="drag-handle"></div>
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
      <div style="width:40px;height:40px;border-radius:11px;background:var(--forestlt);border:1px solid rgba(30,86,49,.2);display:flex;align-items:center;justify-content:center;color:var(--forest);font-size:16px"><i class="fas fa-key"></i></div>
      <div>
        <div style="font-size:16px;font-weight:800;color:var(--txt)">Reset Password</div>
        <div style="font-size:12.5px;color:var(--txt2)">We'll email you a secure link</div>
      </div>
      <button onclick="closeFP()" style="margin-left:auto;width:34px;height:34px;border-radius:9px;background:var(--surf2);border:1px solid var(--bdr);color:var(--txt2);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:14px"><i class="fas fa-times"></i></button>
    </div>
    <div class="field" style="margin-bottom:16px">
      <input type="email" class="field-inp no-rpad" id="fp-email" style="padding-left:44px" placeholder="Email address"/>
      <label class="field-lbl" id="fp-lbl">Email address</label>
      <i class="fas fa-envelope field-ico"></i>
    </div>
    <div id="fp-success" style="display:none;padding:11px 13px;background:var(--grnlt);border:1px solid rgba(26,107,58,.2);border-radius:10px;font-size:13px;color:var(--grn);margin-bottom:14px;text-align:center">
      <i class="fas fa-check-circle" style="margin-right:6px"></i> Reset link sent! Check your inbox.
    </div>
    <div id="fp-err" style="display:none;font-size:12px;color:var(--red);font-weight:600;margin-bottom:10px;display:flex;align-items:center;gap:5px"><i class="fas fa-exclamation-circle"></i><span></span></div>
    <button class="login-btn" id="fp-btn" onclick="sendReset()" style="margin-bottom:10px">
      <div class="spin" id="fp-spin"></div>
      <span id="fp-txt"><i class="fas fa-paper-plane" style="margin-right:7px"></i>Send Reset Link</span>
    </button>
  </div>
</div>

<!-- ════════════════════════════════════════
     MAIN LAYOUT
════════════════════════════════════════ -->
<div class="layout">

  <!-- ──── LEFT PANEL ──── -->
  <div class="left">
    <div class="mesh-bg">
      <!-- Animated SVG mesh -->
      <svg viewBox="0 0 800 900" preserveAspectRatio="xMidYMid slice">
        <defs>
          <radialGradient id="g1" cx="30%" cy="20%"><stop offset="0%" stop-color="rgba(255,255,255,.08)"/><stop offset="100%" stop-color="transparent"/></radialGradient>
          <radialGradient id="g2" cx="80%" cy="70%"><stop offset="0%" stop-color="rgba(192,82,42,.15)"/><stop offset="100%" stop-color="transparent"/></radialGradient>
        </defs>
        <circle cx="400" cy="450" r="400" fill="url(#g1)">
          <animateTransform attributeName="transform" type="scale" values="1;1.06;1" dur="12s" repeatCount="indefinite"/>
        </circle>
        <circle cx="600" cy="700" r="300" fill="url(#g2)">
          <animateTransform attributeName="transform" type="translate" values="0,0;-30,-20;0,0" dur="16s" repeatCount="indefinite"/>
        </circle>
        <!-- Grid lines -->
        <g stroke="rgba(255,255,255,.04)" stroke-width="1">
          <line x1="0" y1="200" x2="800" y2="200"/><line x1="0" y1="400" x2="800" y2="400"/>
          <line x1="0" y1="600" x2="800" y2="600"/><line x1="0" y1="800" x2="800" y2="800"/>
          <line x1="200" y1="0" x2="200" y2="900"/><line x1="400" y1="0" x2="400" y2="900"/>
          <line x1="600" y1="0" x2="600" y2="900"/>
        </g>
        <!-- Decorative dots -->
        <g fill="rgba(255,255,255,.1)">
          <circle cx="200" cy="200" r="3"/><circle cx="400" cy="200" r="3"/><circle cx="600" cy="200" r="3"/>
          <circle cx="200" cy="400" r="3"/><circle cx="400" cy="400" r="3"/><circle cx="600" cy="400" r="3"/>
          <circle cx="200" cy="600" r="3"/><circle cx="400" cy="600" r="3"/><circle cx="600" cy="600" r="3"/>
          <circle cx="200" cy="800" r="3"/><circle cx="400" cy="800" r="3"/><circle cx="600" cy="800" r="3"/>
        </g>
        <!-- Large circle outlines -->
        <circle cx="400" cy="450" r="380" fill="none" stroke="rgba(255,255,255,.05)" stroke-width="1">
          <animateTransform attributeName="transform" type="rotate" values="0 400 450;360 400 450" dur="60s" repeatCount="indefinite"/>
        </circle>
        <circle cx="400" cy="450" r="260" fill="none" stroke="rgba(255,255,255,.04)" stroke-width="1">
          <animateTransform attributeName="transform" type="rotate" values="360 400 450;0 400 450" dur="40s" repeatCount="indefinite"/>
        </circle>
      </svg>
      <div class="grain"></div>
    </div>

    <!-- Blobs -->
    <div class="blob" style="width:350px;height:350px;background:rgba(192,82,42,.1);top:-80px;right:-80px;animation-delay:0s"></div>
    <div class="blob" style="width:250px;height:250px;background:rgba(255,255,255,.04);bottom:100px;left:-60px;animation-delay:-7s"></div>

    <!-- Decorative rings -->
    <div class="decor-ring" style="width:600px;height:600px;top:50%;left:50%;margin:-300px 0 0 -300px;animation:rotate 60s linear infinite"></div>
    <div class="decor-ring" style="width:400px;height:400px;top:50%;left:50%;margin:-200px 0 0 -200px;animation:rotate 40s linear infinite reverse"></div>
    <style>@keyframes rotate{to{transform:rotate(360deg)}}</style>

    <!-- Content -->
    <div style="position:relative;z-index:1">
      <!-- Brand -->
      <div style="display:flex;align-items:center;gap:13px;margin-bottom:clamp(40px,6vw,64px)">
        <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;font-family:'Bodoni Moda',serif;font-size:20px;font-weight:700;font-style:italic;color:#fff;flex-shrink:0">E</div>
        <div style="font-size:15px;font-weight:700;color:rgba(255,255,255,.9);letter-spacing:-.1px">Easy Billing Pro</div>
      </div>

      <!-- Hero text -->
      <div style="margin-bottom:clamp(32px,5vw,48px)">
        <h1 style="font-family:'Bodoni Moda',serif;font-size:clamp(36px,4.5vw,56px);font-weight:700;font-style:italic;color:#fff;line-height:1.12;letter-spacing:-.5px;margin-bottom:14px">
          Your billing,<br/>
          <span class="anim-line">beautifully</span><br/>
          managed.
        </h1>
        <p style="font-size:15px;color:rgba(255,255,255,.65);line-height:1.7;max-width:340px;font-weight:400">
          The invoice platform trusted by 50,000+ businesses worldwide. Fast, secure, and intelligent.
        </p>
      </div>

      <!-- Features -->
      <div style="display:flex;flex-direction:column;gap:10px">
        <div class="feat-row">
          <div class="feat-ico"><i class="fas fa-bolt"></i></div>
          <div>
            <div style="font-size:14px;font-weight:700;color:#fff">Create invoices instantly</div>
            <div style="font-size:12px;color:rgba(255,255,255,.55)">Professional invoices in under 60 seconds</div>
          </div>
        </div>
        <div class="feat-row">
          <div class="feat-ico"><i class="fas fa-brain"></i></div>
          <div>
            <div style="font-size:14px;font-weight:700;color:#fff">AI-powered insights</div>
            <div style="font-size:12px;color:rgba(255,255,255,.55)">Smart analytics and revenue forecasting</div>
          </div>
        </div>
        <div class="feat-row">
          <div class="feat-ico"><i class="fas fa-shield-alt"></i></div>
          <div style="margin:auto;">
            <div style="font-size:14px;font-weight:700;color:#fff;">Bank-level security</div>
            <div style="font-size:12px;color:rgba(255,255,255,.55)">256-bit SSL · SOC 2 · GDPR compliant</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom: stats + testimonial -->
    <div style="position:relative;z-index:1">
      <!-- Stats -->
      <div style="display:flex;gap:10px;margin-bottom:18px">
        <div class="stat-pill"><div class="stat-n">50K+</div><div class="stat-l">Businesses</div></div>
        <div class="stat-pill"><div class="stat-n">$2B+</div><div class="stat-l">Processed</div></div>
        <div class="stat-pill"><div class="stat-n">4.9★</div><div class="stat-l">App Rating</div></div>
      </div>
      <!-- Testimonial -->
      <div class="testimonial">
        <div style="font-size:13px;color:rgba(255,255,255,.75);line-height:1.6;margin-bottom:10px;font-style:italic">
          "Easy Billing Pro cut our invoicing time by 80%. The AI insights are genuinely useful."
        </div>
        <div style="display:flex;align-items:center;gap:9px">
          <div style="width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;font-family:'Bodoni Moda',serif;font-size:13px;font-weight:700;color:#fff;font-style:italic">S</div>
          <div><div style="font-size:12.5px;font-weight:700;color:rgba(255,255,255,.9)">Sarah Chen</div><div style="font-size:11px;color:rgba(255,255,255,.45)">CEO, Pixel Studio</div></div>
        </div>
      </div>
    </div>
  </div>

  <!-- ──── RIGHT PANEL ──── -->
  <div class="right">
    <div class="form-wrap">

      <!-- Mobile brand (only on mobile) -->
      <div class="mobile-brand" style="display:none;align-items:center;justify-content:center;flex-direction:column;gap:12px;margin-bottom:32px;text-align:center">
        <div class="logo">E</div>
        <div>
          <div style="font-family:'Bodoni Moda',serif;font-size:20px;font-weight:700;font-style:italic;color:var(--txt)">Easy Billing Pro</div>
          <div style="font-size:12.5px;color:var(--txt2)">Smart invoicing platform</div>
        </div>
      </div>

      <!-- ═══ LOGIN FORM ═══ -->
      <div id="login-panel">

        <!-- Header -->
        <div class="fi" style="margin-bottom:26px">
          <h1 style="font-family:'Bodoni Moda',serif;font-size:clamp(26px,4vw,34px);font-weight:700;font-style:italic;color:var(--txt);letter-spacing:-.4px;line-height:1.2;margin-bottom:6px">Sign in</h1>
          <p style="font-size:14px;color:var(--txt2);font-weight:500">Welcome back — we missed you.</p>
        </div>

        <!-- Recent accounts (if saved) -->
        <div class="fi" id="recent-sec" style="display:none;margin-bottom:18px">
          <div style="font-size:10.5px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--txt3);margin-bottom:8px">Recent accounts</div>
          <div style="display:flex;flex-direction:column;gap:7px" id="recent-chips"></div>
        </div>

        <!-- Social buttons -->
        <div class="fi" style="display:flex;gap:9px;margin-bottom:20px">
          <button class="soc-btn" onclick="socialLogin('Google')">
            <svg width="16" height="16" viewBox="0 0 24 24" style="flex-shrink:0"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
            Google
          </button>
          <button class="soc-btn" onclick="socialLogin('Apple')">
            <i class="fab fa-apple" style="font-size:18px;color:var(--txt);flex-shrink:0"></i>
            Apple
          </button>
          <button class="soc-btn" onclick="socialLogin('GitHub')">
            <i class="fab fa-github" style="font-size:17px;color:var(--txt);flex-shrink:0"></i>
            GitHub
          </button>
        </div>

        <!-- Divider -->
        <div class="fi divider" style="margin-bottom:20px">or with email</div>

        <!-- Email -->
        <div class="fi field">
          <input type="email" class="field-inp" id="inp-email" autocomplete="email"
            oninput="onEmailChange(this)" onfocus="liftLabel(this)" onblur="dropLabel(this)"
            onkeydown="if(event.key==='Enter')document.getElementById('inp-pwd').focus()"/>
          <label class="field-lbl" id="lbl-email">Email address</label>
          <i class="fas fa-at field-ico"></i>
          <div class="field-right">
            <i class="fas fa-check-circle tick-i" id="tick-email"></i>
            <i class="fas fa-times-circle err-i" id="erri-email"></i>
          </div>
          <div class="v-msg" id="msg-email"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span id="msg-email-txt"></span></div>
        </div>

        <!-- Password -->
        <div class="fi field">
          <input type="password" class="field-inp" id="inp-pwd" autocomplete="current-password"
            oninput="onPwdChange(this)" onfocus="liftLabel(this)" onblur="dropLabel(this)"
            onkeydown="if(event.key==='Enter')doLogin()"/>
          <label class="field-lbl" id="lbl-pwd">Password</label>
          <i class="fas fa-lock field-ico"></i>
          <div class="field-right">
            <i class="fas fa-check-circle tick-i" id="tick-pwd"></i>
            <button type="button" class="eye-btn" id="eye-btn" onclick="togglePwd()"><i class="fas fa-eye"></i></button>
          </div>
          <div class="v-msg" id="msg-pwd"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span id="msg-pwd-txt"></span></div>
        </div>

        <!-- Remember + Forgot -->
        <div class="fi" style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px">
          <label style="display:flex;align-items:center;gap:9px;cursor:pointer;-webkit-tap-highlight-color:transparent" onclick="toggleRem()">
            <div class="cbx on" id="rem-cbx"><i class="fas fa-check"></i></div>
            <span style="font-size:14px;font-weight:500;color:var(--txt2)">Remember me</span>
          </label>
          <button type="button" onclick="openFP()" style="background:none;border:none;font-family:'Bricolage Grotesque',sans-serif;font-size:14px;font-weight:700;color:var(--forest);cursor:pointer;padding:4px 0;-webkit-tap-highlight-color:transparent;transition:opacity .15s" onmouseenter="this.style.opacity='.7'" onmouseleave="this.style.opacity='1'">
            Forgot password?
          </button>
        </div>

        <!-- Submit -->
        <div class="fi">
          <button class="login-btn" id="login-btn" onclick="doLogin()">
            <div class="spin" id="login-spin"></div>
            <span id="login-txt"><i class="fas fa-arrow-right" style="margin-right:7px"></i>Sign In</span>
          </button>
        </div>

        <!-- Security row -->
        <div class="fi" style="display:flex;align-items:center;justify-content:center;gap:14px;flex-wrap:wrap;margin-top:14px">
          <span style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--txt3);font-weight:500"><i class="fas fa-lock" style="color:var(--forest);font-size:11px"></i>SSL Secured</span>
          <span style="width:3px;height:3px;border-radius:50%;background:var(--txt3)"></span>
          <span style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--txt3);font-weight:500"><i class="fas fa-shield-alt" style="color:var(--forest);font-size:11px"></i>SOC 2 Certified</span>
          <span style="width:3px;height:3px;border-radius:50%;background:var(--txt3)"></span>
          <span style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--txt3);font-weight:500"><i class="fas fa-user-shield" style="color:var(--forest);font-size:11px"></i>GDPR Ready</span>
        </div>

        <!-- Register link -->
        <div class="fi" style="text-align:center;margin-top:22px;font-size:14px;color:var(--txt2)">
          No account yet?
          <a href="/easy_billing_pro/app/views/register.php/" style="color:var(--forest);font-weight:700;text-decoration:none;margin-left:4px;transition:opacity .15s" onmouseenter="this.style.opacity='.7'" onmouseleave="this.style.opacity='1'">
            Create one free →
          </a>
        </div>

      </div><!-- /login-panel -->

      <!-- ═══ 2FA PANEL ═══ -->
      <div id="mfa-panel" style="display:none;animation:formIn .5s cubic-bezier(.34,1.56,.64,1)">
        <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px">
          <button onclick="backToLogin()" style="width:38px;height:38px;border-radius:10px;background:var(--surf2);border:1px solid var(--bdr);color:var(--txt2);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:15px;transition:all .15s;flex-shrink:0;-webkit-tap-highlight-color:transparent" onmouseenter="this.style.background='var(--surf3)'" onmouseleave="this.style.background='var(--surf2)'"><i class="fas fa-arrow-left"></i></button>
          <div>
            <div style="font-family:'Bodoni Moda',serif;font-size:22px;font-weight:700;font-style:italic;color:var(--txt)">Two-Factor Auth</div>
            <div style="font-size:13px;color:var(--txt2)">Enter your 6-digit verification code</div>
          </div>
        </div>

        <!-- Illustration -->
        <div style="text-align:center;margin-bottom:22px">
          <div style="width:64px;height:64px;border-radius:18px;background:var(--forestlt);border:1px solid rgba(30,86,49,.2);display:flex;align-items:center;justify-content:center;font-size:28px;margin:0 auto 10px">🔐</div>
          <div style="font-size:12.5px;color:var(--txt3)">
            Code sent to <strong style="color:var(--txt)" id="mfa-email-lbl"></strong>
          </div>
          <div style="font-size:12.5px;color:var(--txt3);margin-top:3px">
            Expires in <span class="mono" style="color:var(--forest);font-weight:700" id="otp-timer">30</span>s
          </div>
        </div>

        <!-- OTP inputs -->
        <div class="otp-grid" style="margin-bottom:8px" id="otp-wrap">
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp0" oninput="otpIn(this,0)" onkeydown="otpKey(event,0)" autocomplete="one-time-code"/>
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp1" oninput="otpIn(this,1)" onkeydown="otpKey(event,1)"/>
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp2" oninput="otpIn(this,2)" onkeydown="otpKey(event,2)"/>
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp3" oninput="otpIn(this,3)" onkeydown="otpKey(event,3)"/>
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp4" oninput="otpIn(this,4)" onkeydown="otpKey(event,4)"/>
          <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-inp" id="otp5" oninput="otpIn(this,5)" onkeydown="otpKey(event,5)"/>
        </div>
        <div id="otp-err-msg" style="display:none;text-align:center;font-size:12.5px;color:var(--red);font-weight:600;margin-bottom:10px;animation:msgIn .2s ease"><i class="fas fa-exclamation-circle" style="margin-right:4px"></i><span id="otp-err-txt"></span></div>

        <button class="login-btn" id="otp-btn" onclick="verifyCode()" style="margin-bottom:14px">
          <div class="spin" id="otp-spin"></div>
          <span id="otp-txt"><i class="fas fa-check-circle" style="margin-right:7px"></i>Verify Code</span>
        </button>

        <div style="text-align:center;font-size:13.5px;color:var(--txt2)">
          Didn't receive code?
          <button onclick="resendCode()" style="background:none;border:none;font-family:'Bricolage Grotesque',sans-serif;font-size:13.5px;font-weight:700;color:var(--forest);cursor:pointer;margin-left:4px;-webkit-tap-highlight-color:transparent;transition:opacity .15s" onmouseenter="this.style.opacity='.7'" onmouseleave="this.style.opacity='1'">Resend →</button>
        </div>

      </div><!-- /mfa-panel -->

      <!-- ═══ SUCCESS PANEL ═══ -->
      <div id="success-panel">
        <div style="text-align:center;padding:20px 0">
          <div class="check-wrap"><i class="fas fa-check"></i></div>
          <h2 style="font-family:'Bodoni Moda',serif;font-size:28px;font-weight:700;font-style:italic;color:var(--txt);margin-bottom:8px">You're in!</h2>
          <p style="font-size:14px;color:var(--txt2);margin-bottom:22px" id="success-lbl">Signed in successfully.</p>
          <div style="display:flex;justify-content:center;gap:6px;margin-bottom:22px">
            <div style="width:8px;height:8px;border-radius:50%;background:var(--forest);animation:dotPulse 1.2s .0s ease-in-out infinite"></div>
            <div style="width:8px;height:8px;border-radius:50%;background:var(--forest);animation:dotPulse 1.2s .2s ease-in-out infinite"></div>
            <div style="width:8px;height:8px;border-radius:50%;background:var(--forest);animation:dotPulse 1.2s .4s ease-in-out infinite"></div>
          </div>
          <div style="font-size:13px;color:var(--txt3);margin-bottom:20px">Redirecting to your dashboard…</div>
          <a href="#" onclick="location.reload()" style="display:inline-flex;align-items:center;gap:7px;padding:11px 22px;background:var(--forest);color:#fff;border-radius:11px;font-family:'Bricolage Grotesque',sans-serif;font-size:14px;font-weight:700;text-decoration:none;box-shadow:0 4px 16px rgba(30,86,49,.25);transition:all .15s" onmouseenter="this.style.transform='translateY(-1px)'" onmouseleave="this.style.transform=''">
            <i class="fas fa-arrow-right"></i> Go to Dashboard
          </a>
        </div>
      </div>

    </div><!-- /form-wrap -->
  </div><!-- /right -->

</div><!-- /layout -->

<!-- ════════════════════════════════════
     JAVASCRIPT
════════════════════════════════════ -->
<script>
/* ════════════════════════════════════════════════════
   EASY BILLING PRO LOGIN — COMPLETE MOBILE-RESPONSIVE JS
   Theme · Validation · 2FA · Recent accounts · LocalStorage
════════════════════════════════════════════════════ */

/* ── DEMO CREDENTIALS ─────────────────── */
const DEMO = [
  { email:'demo@easybilling.pro',  password:'Demo@1234',  name:'Demo User',    avatar:'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=60&h=60&fit=crop&crop=face' },
  { email:'admin@company.com',     password:'Admin@2024', name:'Admin Account', avatar:'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=face' },
  { email:'test@test.com',         password:'123456',     name:'Test User',     avatar:'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=60&h=60&fit=crop&crop=face' },
];
const OTP_VALID = '123456';

/* ── STATE ────────────────────────────── */
let rememberMe   = true;
let loginFails   = 0;
let currentPanel = 'login';
let otpInterval;
let otpLeft      = 30;

/* ── THEME ────────────────────────────── */
let dark = localStorage.getItem('ebp_login_dark') === '1';
function initTheme(){
  document.documentElement.setAttribute('data-theme', dark?'dark':'light');
  document.getElementById('theme-ico').className = dark?'fas fa-sun':'fas fa-moon';
}
function toggleTheme(){
  dark = !dark;
  localStorage.setItem('ebp_login_dark', dark?'1':'0');
  initTheme();
  toast(dark ? '🌙 Dark mode on' : '☀️ Light mode on', 'info');
}
initTheme();

/* ── LOAD SAVED DATA ──────────────────── */
window.addEventListener('DOMContentLoaded', () => {
  loadRecent();
  prefillSaved();
  setTimeout(() => toast('Demo: demo@easybilling.pro / Demo@1234','info'), 1800);
});

function loadRecent(){
  const list = JSON.parse(localStorage.getItem('ebp_recents') || '[]');
  if (!list.length) return;
  const sec   = document.getElementById('recent-sec');
  const chips = document.getElementById('recent-chips');
  sec.style.display = 'block';
  chips.innerHTML = list.slice(0,3).map(a => `
    <div class="acct-chip" onclick="fillAccount('${esc(a.email)}')">
      <img class="acct-av" src="${esc(a.avatar)}" onerror="this.style.display='none'" alt="${esc(a.name)}"/>
      <div>
        <div style="font-size:13px;font-weight:700;color:var(--txt)">${esc(a.name)}</div>
        <div style="font-size:11.5px;color:var(--txt3)">${esc(a.email)}</div>
      </div>
      <i class="fas fa-chevron-right" style="margin-left:auto;color:var(--txt3);font-size:11px"></i>
    </div>`).join('');
}
function fillAccount(email){
  const inp = document.getElementById('inp-email');
  inp.value = email;
  inp.classList.add('has-val');
  liftLabel(inp);
  onEmailChange(inp);
  document.getElementById('inp-pwd').focus();
}
function prefillSaved(){
  const s = JSON.parse(localStorage.getItem('ebp_saved_email') || 'null');
  if (s) {
    const inp = document.getElementById('inp-email');
    inp.value = s;
    inp.classList.add('has-val');
    liftLabel(inp);
    onEmailChange(inp);
  }
}

/* ── LABEL FLOAT ──────────────────────── */
function liftLabel(inp){
  const key = inp.id.replace('inp-','').replace('fp-','');
  const lbl = document.getElementById('lbl-' + (inp.id.startsWith('fp-')?'fp':'') + key);
  if (!lbl) return;
  lbl.style.top = '-9px';
  lbl.style.transform = 'none';
  lbl.style.fontSize = '10.5px';
  lbl.style.fontWeight = '700';
  lbl.style.letterSpacing = '.05em';
  lbl.style.textTransform = 'uppercase';
  lbl.style.color = 'var(--forest)';
  lbl.style.background = 'var(--surf)';
  lbl.style.padding = '0 5px';
  lbl.style.left = '10px';
}
function dropLabel(inp){
  if (inp.value) return;
  const key = inp.id.replace('inp-','').replace('fp-','');
  const lbl = document.getElementById('lbl-' + (inp.id.startsWith('fp-')?'fp':'') + key);
  if (!lbl) return;
  lbl.style.top = '50%';
  lbl.style.transform = 'translateY(-50%)';
  lbl.style.fontSize = '14px';
  lbl.style.fontWeight = '500';
  lbl.style.letterSpacing = '0';
  lbl.style.textTransform = 'none';
  lbl.style.color = 'var(--txt3)';
  lbl.style.background = 'transparent';
  lbl.style.padding = '0';
  lbl.style.left = '44px';
}

/* ── FIELD VALIDATION ─────────────────── */
function onEmailChange(inp){
  inp.classList.add('has-val');
  const v    = inp.value.trim();
  const ok   = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
  const tick = document.getElementById('tick-email');
  const errI = document.getElementById('erri-email');
  const msgEl= document.getElementById('msg-email');
  inp.classList.toggle('err', v.length > 3 && !ok);
  inp.classList.toggle('ok',  ok);
  if (tick) tick.style.display = ok ? 'block' : 'none';
  if (errI) errI.style.display = (v.length>3 && !ok) ? 'block' : 'none';
  if (msgEl) {
    msgEl.style.display = (v.length>3 && !ok) ? 'flex' : 'none';
    const s = document.getElementById('msg-email-txt');
    if (s) s.textContent = 'Enter a valid email address';
  }
  // Label color
  const lbl = document.getElementById('lbl-email');
  if (lbl && v) lbl.style.color = ok ? 'var(--forest)' : (v.length>3?'var(--red)':'var(--forest)');
}

function onPwdChange(inp){
  inp.classList.add('has-val');
  const v    = inp.value;
  const ok   = v.length >= 6;
  const tick = document.getElementById('tick-pwd');
  const msgEl= document.getElementById('msg-pwd');
  inp.classList.remove('err','ok');
  if (v.length) inp.classList.add(ok?'ok':'err');
  if (tick) tick.style.display = ok ? 'block' : 'none';
  if (msgEl) {
    msgEl.style.display = (v.length>0 && !ok) ? 'flex' : 'none';
    const s = document.getElementById('msg-pwd-txt');
    if (s) s.textContent = 'At least 6 characters required';
  }
}

/* ── TOGGLE PASSWORD ──────────────────── */
let pwdShow = false;
function togglePwd(){
  pwdShow = !pwdShow;
  const inp = document.getElementById('inp-pwd');
  const btn = document.getElementById('eye-btn');
  inp.type = pwdShow ? 'text' : 'password';
  if (btn) btn.innerHTML = `<i class="fas fa-eye${pwdShow?'-slash':''}"></i>`;
}

/* ── REMEMBER ME ──────────────────────── */
function toggleRem(){
  rememberMe = !rememberMe;
  document.getElementById('rem-cbx').classList.toggle('on', rememberMe);
}

/* ── RIPPLE ───────────────────────────── */
function addRipple(btn, e){
  const r    = document.createElement('div');
  r.className = 'ripple';
  const rc   = btn.getBoundingClientRect();
  const sz   = Math.max(rc.width, rc.height);
  r.style.cssText = `width:${sz}px;height:${sz}px;left:${e.clientX-rc.left-sz/2}px;top:${e.clientY-rc.top-sz/2}px`;
  btn.appendChild(r);
  setTimeout(() => r.remove(), 750);
}
document.getElementById('login-btn').addEventListener('click', function(e){ addRipple(this, e); });

/* ── LOGIN SUBMIT ─────────────────────── */
function doLogin(){
  const email = document.getElementById('inp-email').value.trim();
  const pwd   = document.getElementById('inp-pwd').value;

  // Validate email
  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
    setFieldErr('email','Enter a valid email address');
    shakeEl('inp-email'); return;
  }
  // Validate pwd
  if (!pwd || pwd.length < 6){
    setFieldErr('pwd', pwd?'At least 6 characters required':'Password is required');
    shakeEl('inp-pwd'); return;
  }

  setLoading('login-spin','login-txt',true);
  document.getElementById('login-btn').disabled = true;
  loginFails++;

  const match = DEMO.find(d => d.email===email && d.password===pwd);

  setTimeout(() => {
    setLoading('login-spin','login-txt',false);
    document.getElementById('login-btn').disabled = false;

    if (match){
      // Save
      if (rememberMe){
        localStorage.setItem('ebp_saved_email', email);
        saveRecent({ email, name: match.name, avatar: match.avatar });
      }
      toast('✓ Credentials verified — 2FA code sent','success');
      setTimeout(() => go2FA(email), 500);
    } else if (loginFails >= 3){
      toast('Too many failed attempts — locked for 30s','error');
      document.getElementById('login-btn').disabled = true;
      shakeEl('login-btn');
      setTimeout(() => { document.getElementById('login-btn').disabled=false; loginFails=0; }, 30000);
    } else {
      setFieldErr('pwd','Incorrect email or password');
      shakeEl('inp-pwd');
      toast(`Wrong credentials (${loginFails}/3 attempts)`,'error');
    }
  }, 1100);
}

function setFieldErr(key, msg){
  const inp  = document.getElementById('inp-' + key);
  const msgEl= document.getElementById('msg-' + key);
  if (inp){ inp.classList.add('err'); inp.classList.remove('ok'); }
  if (msgEl){
    msgEl.style.display = 'flex';
    const s = document.getElementById('msg-'+key+'-txt');
    if (s) s.textContent = msg;
  }
}

/* ── 2FA ──────────────────────────────── */
function go2FA(email){
  currentPanel = 'mfa';
  document.getElementById('login-panel').style.display = 'none';
  document.getElementById('mfa-panel').style.display   = 'block';
  const lbl = document.getElementById('mfa-email-lbl');
  if (lbl) lbl.textContent = email.replace(/(.{2}).+(@.+)/, '$1***$2');
  startTimer();
  clearOTP();
  setTimeout(() => document.getElementById('otp0').focus(), 150);
}
function backToLogin(){
  currentPanel = 'login';
  document.getElementById('mfa-panel').style.display   = 'none';
  document.getElementById('login-panel').style.display = 'block';
  clearInterval(otpInterval);
}
function startTimer(){
  otpLeft = 30;
  clearInterval(otpInterval);
  const el = document.getElementById('otp-timer');
  otpInterval = setInterval(() => {
    otpLeft--;
    if (el) { el.textContent = otpLeft; el.style.color = otpLeft<=10?'var(--terra)':'var(--forest)'; }
    if (otpLeft <= 0) clearInterval(otpInterval);
  }, 1000);
}
function clearOTP(){
  for (let i=0;i<6;i++){
    const el=document.getElementById('otp'+i);
    if(el){el.value='';el.classList.remove('filled','otp-err');}
  }
  document.getElementById('otp-err-msg').style.display='none';
}
function resendCode(){
  clearOTP();
  startTimer();
  document.getElementById('otp-timer').style.color='var(--forest)';
  toast('New code sent! (Use: 123456)','info');
  setTimeout(()=>document.getElementById('otp0').focus(), 100);
}

/* OTP inputs */
function otpIn(inp, idx){
  inp.value = inp.value.replace(/\D/g,'').slice(-1);
  inp.classList.toggle('filled', inp.value.length>0);
  if (inp.value && idx<5) document.getElementById('otp'+(idx+1)).focus();
  const all = Array.from({length:6},(_,i)=>document.getElementById('otp'+i).value).join('');
  if (all.length===6) setTimeout(verifyCode, 300);
}
function otpKey(e, idx){
  if (e.key==='Backspace' && !e.target.value && idx>0) document.getElementById('otp'+(idx-1)).focus();
  if (e.key==='ArrowLeft'  && idx>0) document.getElementById('otp'+(idx-1)).focus();
  if (e.key==='ArrowRight' && idx<5) document.getElementById('otp'+(idx+1)).focus();
  // Handle paste
  if (e.ctrlKey && e.key==='v') return;
}
// Paste support
document.getElementById('otp0').addEventListener('paste', e => {
  const txt = (e.clipboardData||window.clipboardData).getData('text').replace(/\D/g,'').slice(0,6);
  if (!txt) return;
  e.preventDefault();
  for (let i=0;i<6;i++){
    const el=document.getElementById('otp'+i);
    if(el){el.value=txt[i]||'';el.classList.toggle('filled',!!txt[i]);}
  }
  if (txt.length===6) setTimeout(verifyCode, 300);
});

function verifyCode(){
  const code = Array.from({length:6},(_,i)=>document.getElementById('otp'+i).value).join('');
  if (code.length<6){ toast('Enter all 6 digits','warn'); return; }
  setLoading('otp-spin','otp-txt',true);
  document.getElementById('otp-btn').disabled=true;

  setTimeout(()=>{
    setLoading('otp-spin','otp-txt',false);
    document.getElementById('otp-btn').disabled=false;

    if (code===OTP_VALID){
      clearInterval(otpInterval);
      showSuccess();
    } else {
      for(let i=0;i<6;i++){const el=document.getElementById('otp'+i);if(el)el.classList.add('otp-err');}
      document.getElementById('otp-err-msg').style.display='block';
      document.getElementById('otp-err-txt').textContent='Incorrect code. Try 123456 for demo.';
      shakeEl('otp-wrap');
      setTimeout(()=>{clearOTP(); document.getElementById('otp0').focus();}, 1500);
    }
  }, 900);
}

/* ── SUCCESS ──────────────────────────── */
function showSuccess(){
  currentPanel='success';
  document.getElementById('mfa-panel').style.display='none';
  document.getElementById('success-panel').style.display='block';
  const email=document.getElementById('inp-email').value;
  const lbl=document.getElementById('success-lbl');
  if(lbl) lbl.textContent = 'Signed in as ' + email;
  toast('🎉 Welcome back! Login successful.','success');
}

/* ── FORGOT PASSWORD ──────────────────── */
function openFP(){ document.getElementById('fp-ov').classList.add('open'); setTimeout(()=>document.getElementById('fp-email').focus(),200); }
function closeFP(){ document.getElementById('fp-ov').classList.remove('open'); document.getElementById('fp-success').style.display='none'; document.getElementById('fp-err').style.display='none'; document.getElementById('fp-email').value=''; }
document.getElementById('fp-ov').addEventListener('click',function(e){if(e.target===this)closeFP();});
document.getElementById('fp-email').addEventListener('focus',function(){liftLabel(this);});
document.getElementById('fp-email').addEventListener('blur',function(){dropLabel(this);});
document.getElementById('fp-email').addEventListener('keydown',e=>{if(e.key==='Enter')sendReset();});

function sendReset(){
  const email=document.getElementById('fp-email').value.trim();
  const errEl=document.getElementById('fp-err');
  if(!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
    errEl.style.display='flex';
    errEl.querySelector('span').textContent='Enter a valid email address';
    shakeEl('fp-email'); return;
  }
  errEl.style.display='none';
  setLoading('fp-spin','fp-txt',true);
  document.getElementById('fp-btn').disabled=true;
  setTimeout(()=>{
    setLoading('fp-spin','fp-txt',false);
    document.getElementById('fp-btn').disabled=false;
    document.getElementById('fp-success').style.display='block';
    toast('Reset link sent to '+email,'success');
    setTimeout(closeFP, 3000);
  },1200);
}

/* ── SOCIAL LOGIN ─────────────────────── */
function socialLogin(provider){
  toast(`Connecting to ${provider}…`,'info');
  setTimeout(()=>toast(`${provider} SSO coming soon!`,'warn'),1000);
}

/* ── SAVE RECENT ACCOUNTS ─────────────── */
function saveRecent(acct){
  let list=JSON.parse(localStorage.getItem('ebp_recents')||'[]');
  list=list.filter(a=>a.email!==acct.email);
  list.unshift(acct);
  localStorage.setItem('ebp_recents',JSON.stringify(list.slice(0,3)));
}

/* ── LOADING STATE ────────────────────── */
function setLoading(spinId,txtId,on){
  const spin=document.getElementById(spinId),txt=document.getElementById(txtId);
  if(spin) spin.style.display=on?'block':'none';
  if(txt)  txt.style.display =on?'none':'';
}

/* ── SHAKE ────────────────────────────── */
function shakeEl(id){
  const el=document.getElementById(id); if(!el) return;
  el.style.animation='none';
  requestAnimationFrame(()=>{ el.style.animation='shake .45s ease'; el.addEventListener('animationend',()=>{el.style.animation='';},{once:true}); });
}

/* ── TOAST ────────────────────────────── */
let toastT;
function toast(msg,type='info'){
  const el=document.getElementById('toast'),ico=document.getElementById('toast-ico'),txt=document.getElementById('toast-txt');
  const icons={success:'fa-check-circle',error:'fa-times-circle',info:'fa-info-circle',warn:'fa-exclamation-triangle'};
  const colors={success:'#1a6b3a',error:'#c0202a',info:'#1e5631',warn:'#b59010'};
  if(ico){ico.className='fas '+icons[type];ico.style.color=colors[type]||colors.info;}
  if(txt) txt.textContent=msg;
  el.classList.add('show');
  clearTimeout(toastT);
  toastT=setTimeout(()=>el.classList.remove('show'),3500);
}

/* ── KEYBOARD ─────────────────────────── */
document.addEventListener('keydown',e=>{
  if(e.key==='Escape') closeFP();
  if(e.key==='Enter' && currentPanel==='login') doLogin();
});

/* ── UTILS ────────────────────────────── */
function esc(s){ return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
</script>
</body>
</html>
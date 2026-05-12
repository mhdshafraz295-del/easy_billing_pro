<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Easy Billing Pro — Create Account</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Syne', 'sans-serif'],
        serif: ['Instrument Serif', 'serif'],
        mono: ['Fira Code', 'monospace'],
      }
    }
  }
}
</script>

<style>
/* ═══════════════════════════════════════════════════
   PREMIUM REGISTER PAGE — EDITORIAL DARK SPLIT
   Deep Onyx · Electric Amber · Sage White
═══════════════════════════════════════════════════ */

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --amber: #f59e0b;
  --amber2: #d97706;
  --amberlt: rgba(245,158,11,.12);
  --onyx: #0a0908;
  --panel: #111009;
  --card: #181611;
  --bdr: #2a2620;
  --bdr2: #3a3530;
  --txt: #f5f0e8;
  --txt2: #9a8f7e;
  --txt3: #5a5248;
  --grn: #22c55e;
  --red: #ef4444;
  --sh: 0 0 0 1px rgba(245,158,11,.15), 0 4px 24px rgba(0,0,0,.5);
}

html, body {
  min-height: 100vh;
  font-family: 'Syne', sans-serif;
  background: var(--onyx);
  color: var(--txt);
  -webkit-font-smoothing: antialiased;
}

::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--bdr2); border-radius: 99px; }

/* ── PAGE LAYOUT ─────────────────────── */
.page {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
}
@media (max-width: 900px) {
  .page { grid-template-columns: 1fr; }
  .left-panel { display: none; }
  .right-panel { padding: 32px 20px; }
}

/* ── LEFT PANEL ─────────────────────── */
.left-panel {
  background: var(--panel);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 48px;
}

/* Animated geometric background */
.geo-bg {
  position: absolute;
  inset: 0;
  overflow: hidden;
}
.geo-ring {
  position: absolute;
  border-radius: 50%;
  border: 1px solid rgba(245,158,11,.08);
  animation: rotate 20s linear infinite;
}
.geo-ring:nth-child(2) { animation-duration: 30s; animation-direction: reverse; }
.geo-ring:nth-child(3) { animation-duration: 25s; }
@keyframes rotate { to { transform: rotate(360deg); } }

.geo-line {
  position: absolute;
  background: linear-gradient(90deg, transparent, rgba(245,158,11,.06), transparent);
  height: 1px;
  animation: shimmer 4s ease-in-out infinite;
}
@keyframes shimmer {
  0%, 100% { opacity: 0; transform: scaleX(0.3); }
  50% { opacity: 1; transform: scaleX(1); }
}

/* Mesh gradient blob */
.blob {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  animation: breathe 8s ease-in-out infinite;
}
@keyframes breathe {
  0%, 100% { transform: scale(1); opacity: .3; }
  50% { transform: scale(1.2); opacity: .5; }
}

/* Feature items */
.feat-item {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  animation: slideUp .6s cubic-bezier(.34,1.56,.64,1) both;
}
.feat-item:nth-child(1) { animation-delay: .1s; }
.feat-item:nth-child(2) { animation-delay: .2s; }
.feat-item:nth-child(3) { animation-delay: .3s; }
.feat-item:nth-child(4) { animation-delay: .4s; }

.feat-ico {
  width: 36px; height: 36px;
  border-radius: 9px;
  background: var(--amberlt);
  border: 1px solid rgba(245,158,11,.2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  color: var(--amber);
  flex-shrink: 0;
  margin-top: 1px;
}

/* Stat counter cards */
.stat-card {
  background: rgba(245,158,11,.06);
  border: 1px solid rgba(245,158,11,.14);
  border-radius: 12px;
  padding: 14px 18px;
  backdrop-filter: blur(8px);
}

/* ── RIGHT PANEL ─────────────────────── */
.right-panel {
  background: var(--card);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 48px 52px;
  position: relative;
  overflow: hidden;
}
@media (max-width: 1100px) { .right-panel { padding: 40px 36px; } }

/* Subtle grid texture */
.right-panel::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: linear-gradient(rgba(245,158,11,.02) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(245,158,11,.02) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
}

/* Progress stepper */
.step-dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: var(--bdr2);
  transition: all .3s;
}
.step-dot.active {
  background: var(--amber);
  box-shadow: 0 0 8px rgba(245,158,11,.5);
}
.step-dot.done {
  background: var(--grn);
}
.step-line {
  flex: 1;
  height: 1px;
  background: var(--bdr);
  transition: background .3s;
}
.step-line.done { background: var(--grn); }

/* Input styling */
.inp-wrap {
  position: relative;
}
.inp-ico {
  position: absolute;
  left: 14px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
  color: var(--txt3);
  transition: color .2s;
  pointer-events: none;
}
.inp-eye {
  position: absolute;
  right: 14px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 14px;
  color: var(--txt3);
  cursor: pointer;
  transition: color .2s;
  background: none;
  border: none;
  padding: 4px;
}
.inp-eye:hover { color: var(--amber); }

.inp {
  width: 100%;
  background: rgba(255,255,255,.03);
  border: 1.5px solid var(--bdr);
  border-radius: 11px;
  padding: 12px 14px 12px 42px;
  font-family: 'Syne', sans-serif;
  font-size: 14px;
  color: var(--txt);
  outline: none;
  transition: all .22s;
  caret-color: var(--amber);
}
.inp:focus {
  border-color: var(--amber);
  background: rgba(245,158,11,.04);
  box-shadow: 0 0 0 3px rgba(245,158,11,.1);
}
.inp:focus + .inp-label, .inp.has-val + .inp-label {
  top: -8px;
  font-size: 10px;
  color: var(--amber);
  background: var(--card);
  padding: 0 5px;
}
.inp.err { border-color: var(--red); box-shadow: 0 0 0 3px rgba(239,68,68,.1); }
.inp.ok  { border-color: var(--grn); }
.inp.no-icon { padding-left: 14px; }
.inp-label {
  position: absolute;
  left: 42px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 13.5px;
  color: var(--txt3);
  pointer-events: none;
  transition: all .2s;
  background: transparent;
  letter-spacing: .01em;
}
.inp-label.no-icon { left: 14px; }

/* Validation message */
.v-msg {
  font-size: 11.5px;
  margin-top: 4px;
  display: flex;
  align-items: center;
  gap: 4px;
  animation: fadeIn .2s ease;
}
@keyframes fadeIn { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: none; } }

/* Password strength */
.str-bar {
  height: 3px;
  border-radius: 99px;
  background: var(--bdr);
  overflow: hidden;
  margin-top: 8px;
}
.str-fill {
  height: 100%;
  border-radius: 99px;
  transition: width .4s, background .4s;
}

/* Social buttons */
.soc-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 9px;
  padding: 11px;
  background: rgba(255,255,255,.04);
  border: 1.5px solid var(--bdr);
  border-radius: 11px;
  font-family: 'Syne', sans-serif;
  font-size: 13px;
  font-weight: 600;
  color: var(--txt2);
  cursor: pointer;
  transition: all .18s;
}
.soc-btn:hover {
  background: rgba(255,255,255,.07);
  border-color: var(--bdr2);
  color: var(--txt);
  transform: translateY(-1px);
}

/* Submit button */
.sub-btn {
  width: 100%;
  padding: 13px;
  border-radius: 11px;
  background: var(--amber);
  color: #0a0908;
  font-family: 'Syne', sans-serif;
  font-size: 14px;
  font-weight: 700;
  border: none;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all .2s;
  letter-spacing: .01em;
}
.sub-btn::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(255,255,255,.15), transparent);
}
.sub-btn:hover {
  background: var(--amber2);
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(245,158,11,.3);
}
.sub-btn:active { transform: translateY(0); }
.sub-btn:disabled {
  opacity: .5;
  cursor: not-allowed;
  transform: none;
}
.sub-btn .spinner {
  display: none;
  width: 18px; height: 18px;
  border: 2px solid rgba(10,9,8,.3);
  border-top-color: #0a0908;
  border-radius: 50%;
  animation: spin .7s linear infinite;
}
@keyframes spin { to { transform: rotate(360deg); } }

/* Checkbox */
.cbx {
  width: 18px; height: 18px;
  border-radius: 5px;
  border: 1.5px solid var(--bdr2);
  background: transparent;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all .15s;
  flex-shrink: 0;
  margin-top: 1px;
}
.cbx.checked {
  background: var(--amber);
  border-color: var(--amber);
}
.cbx i { font-size: 10px; color: #0a0908; display: none; }
.cbx.checked i { display: block; }

/* Toast */
#toast {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 999;
  min-width: 260px;
  max-width: 340px;
  padding: 14px 18px;
  border-radius: 13px;
  background: var(--card);
  border: 1px solid var(--bdr);
  box-shadow: 0 16px 48px rgba(0,0,0,.5);
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 13px;
  font-weight: 600;
  color: var(--txt);
  transform: translateX(120%);
  transition: transform .35s cubic-bezier(.34,1.56,.64,1);
}
#toast.show { transform: translateX(0); }

/* Success overlay */
#success-screen {
  position: fixed;
  inset: 0;
  background: var(--onyx);
  z-index: 200;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
  transition: opacity .4s;
}
#success-screen.show { opacity: 1; pointer-events: all; }

/* Animations */
@keyframes slideUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}
.form-section {
  animation: slideUp .5s cubic-bezier(.34,1.56,.64,1) both;
}
.form-section:nth-child(1) { animation-delay: .05s; }
.form-section:nth-child(2) { animation-delay: .1s; }
.form-section:nth-child(3) { animation-delay: .15s; }
.form-section:nth-child(4) { animation-delay: .2s; }
.form-section:nth-child(5) { animation-delay: .25s; }
.form-section:nth-child(6) { animation-delay: .3s; }

/* Divider */
.or-line {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--txt3);
  font-size: 11.5px;
  font-weight: 600;
  letter-spacing: .08em;
  text-transform: uppercase;
}
.or-line::before, .or-line::after {
  content: '';
  flex: 1;
  height: 1px;
  background: var(--bdr);
}

/* Confetti particle */
.confetti-dot {
  position: fixed;
  width: 8px;
  height: 8px;
  border-radius: 2px;
  pointer-events: none;
  animation: fall linear both;
}
@keyframes fall {
  from { transform: translateY(-20px) rotate(0); opacity: 1; }
  to   { transform: translateY(100vh) rotate(720deg); opacity: 0; }
}

/* Mobile brand bar */
.mobile-brand {
  display: none;
  align-items: center;
  gap: 10px;
  margin-bottom: 28px;
  justify-content: center;
}
@media (max-width: 900px) { .mobile-brand { display: flex; } }
</style>
</head>
<body>

<!-- ═══════════════════════════════════════
     TOAST
═══════════════════════════════════════ -->
<div id="toast">
  <i id="toast-ico" class="fas fa-check-circle" style="font-size:16px;flex-shrink:0"></i>
  <span id="toast-msg"></span>
</div>

<!-- ═══════════════════════════════════════
     SUCCESS SCREEN
═══════════════════════════════════════ -->
<div id="success-screen">
  <div style="text-align:center;padding:32px;max-width:440px;animation:slideUp .6s cubic-bezier(.34,1.56,.64,1)">
    <div style="width:80px;height:80px;border-radius:24px;background:rgba(34,197,94,.12);border:2px solid rgba(34,197,94,.3);display:flex;align-items:center;justify-content:center;font-size:32px;color:#22c55e;margin:0 auto 24px">
      <i class="fas fa-check"></i>
    </div>
    <div style="font-family:'Instrument Serif',serif;font-size:36px;color:var(--txt);margin-bottom:8px;font-style:italic">Account Created!</div>
    <div style="font-size:14px;color:var(--txt2);line-height:1.7;margin-bottom:28px">Welcome to Easy Billing Pro. Your account has been set up successfully. Redirecting you to your dashboard…</div>
    <div style="display:flex;justify-content:center;gap:6px;margin-bottom:20px" id="dot-loader">
      <div style="width:8px;height:8px;border-radius:50%;background:var(--amber);animation:dotPulse 1.2s .0s ease-in-out infinite"></div>
      <div style="width:8px;height:8px;border-radius:50%;background:var(--amber);animation:dotPulse 1.2s .2s ease-in-out infinite"></div>
      <div style="width:8px;height:8px;border-radius:50%;background:var(--amber);animation:dotPulse 1.2s .4s ease-in-out infinite"></div>
    </div>
    <a href="/easy_billing_pro/app/views/login.php/" id="dash-link" onclick="location.reload()" style="display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:var(--amber);color:#0a0908;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;transition:all .15s">
      <i class="fas fa-arrow-right"></i> Go to Login Page
    </a>
  </div>
</div>

<style>
@keyframes dotPulse {
  0%,100%{transform:scale(.8);opacity:.5}
  50%{transform:scale(1.2);opacity:1}
}
</style>

<!-- ═══════════════════════════════════════
     MAIN PAGE
═══════════════════════════════════════ -->
<div class="page">

  <!-- ── LEFT PANEL ── -->
  <div class="left-panel">

    <!-- Geo background -->
    <div class="geo-bg">
      <div class="blob" style="width:400px;height:400px;background:rgba(245,158,11,.06);top:-100px;left:-100px"></div>
      <div class="blob" style="width:300px;height:300px;background:rgba(245,158,11,.04);bottom:-80px;right:-80px;animation-delay:4s"></div>

      <div class="geo-ring" style="width:500px;height:500px;top:50%;left:50%;margin-top:-250px;margin-left:-250px"></div>
      <div class="geo-ring" style="width:700px;height:700px;top:50%;left:50%;margin-top:-350px;margin-left:-350px;border-color:rgba(245,158,11,.04)"></div>
      <div class="geo-ring" style="width:300px;height:300px;top:50%;left:50%;margin-top:-150px;margin-left:-150px"></div>

      <div class="geo-line" style="width:100%;top:30%;animation-delay:0s"></div>
      <div class="geo-line" style="width:100%;top:60%;animation-delay:2s"></div>
      <div class="geo-line" style="width:100%;top:80%;animation-delay:1s"></div>
    </div>

    <!-- Brand -->
    <div style="position:relative;z-index:1">
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:48px">
        <div style="width:38px;height:38px;border-radius:10px;background:var(--amber);display:flex;align-items:center;justify-content:center;font-size:16px;color:#0a0908;font-weight:900;font-family:'Instrument Serif',serif;flex-shrink:0">E</div>
        <div style="font-family:'Syne',sans-serif;font-size:16px;font-weight:800;color:var(--txt);letter-spacing:-.2px">Easy Billing Pro</div>
      </div>
      <div style="font-family:'Instrument Serif',serif;font-size:clamp(28px,3.5vw,42px);color:var(--txt);line-height:1.2;margin-bottom:14px;font-style:italic">
        The smartest way<br/>to <span style="color:var(--amber)">manage billing.</span>
      </div>
      <div style="font-size:14px;color:var(--txt2);line-height:1.7;margin-bottom:44px;max-width:380px">
        Join over 50,000 businesses that use Easy Billing Pro to create invoices, track payments, and grow faster.
      </div>

      <!-- Features -->
      <div style="display:flex;flex-direction:column;gap:16px">
        <div class="feat-item">
          <div class="feat-ico"><i class="fas fa-bolt"></i></div>
          <div><div style="font-size:14px;font-weight:700;margin-bottom:2px">Instant invoicing</div><div style="font-size:12.5px;color:var(--txt3)">Create professional invoices in under 60 seconds</div></div>
        </div>
        <div class="feat-item">
          <div class="feat-ico"><i class="fas fa-chart-line"></i></div>
          <div><div style="font-size:14px;font-weight:700;margin-bottom:2px">Revenue analytics</div><div style="font-size:12.5px;color:var(--txt3)">Real-time dashboards with AI-powered insights</div></div>
        </div>
        <div class="feat-item">
          <div class="feat-ico"><i class="fas fa-shield-alt"></i></div>
          <div><div style="font-size:14px;font-weight:700;margin-bottom:2px">Bank-level security</div><div style="font-size:12.5px;color:var(--txt3)">256-bit encryption with SOC 2 compliance</div></div>
        </div>
        <div class="feat-item">
          <div class="feat-ico"><i class="fas fa-mobile-alt"></i></div>
          <div><div style="font-size:14px;font-weight:700;margin-bottom:2px">Works everywhere</div><div style="font-size:12.5px;color:var(--txt3)">Mobile, desktop, and tablet ready</div></div>
        </div>
      </div>
    </div>

    <!-- Stats -->
    <div style="position:relative;z-index:1;display:grid;grid-template-columns:repeat(3,1fr);gap:10px">
      <div class="stat-card" style="text-align:center">
        <div style="font-family:'Fira Code',monospace;font-size:22px;font-weight:700;color:var(--amber)">50K+</div>
        <div style="font-size:11px;color:var(--txt3);margin-top:2px">Businesses</div>
      </div>
      <div class="stat-card" style="text-align:center">
        <div style="font-family:'Fira Code',monospace;font-size:22px;font-weight:700;color:var(--amber)">$2B+</div>
        <div style="font-size:11px;color:var(--txt3);margin-top:2px">Processed</div>
      </div>
      <div class="stat-card" style="text-align:center">
        <div style="font-family:'Fira Code',monospace;font-size:22px;font-weight:700;color:var(--amber)">4.9★</div>
        <div style="font-size:11px;color:var(--txt3);margin-top:2px">Rated</div>
      </div>
    </div>
  </div>

  <!-- ── RIGHT PANEL ── -->
  <div class="right-panel">
    <div style="position:relative;z-index:1;max-width:440px;width:100%;margin:0 auto">

      <!-- Mobile brand -->
      <div class="mobile-brand">
        <div style="width:34px;height:34px;border-radius:9px;background:var(--amber);display:flex;align-items:center;justify-content:center;font-size:14px;color:#0a0908;font-weight:900;font-family:'Instrument Serif',serif">E</div>
        <div style="font-size:15px;font-weight:800">Easy Billing Pro</div>
      </div>

      <!-- Step indicator -->
      <div class="form-section" style="display:flex;align-items:center;gap:6px;margin-bottom:28px">
        <div class="step-dot active" id="sd1"></div>
        <div class="step-line" id="sl1"></div>
        <div class="step-dot" id="sd2"></div>
        <div class="step-line" id="sl2"></div>
        <div class="step-dot" id="sd3"></div>
        <div style="margin-left:10px;font-size:11.5px;color:var(--txt3);font-weight:600" id="step-label">Step 1 of 3 — Account Info</div>
      </div>

      <!-- Header -->
      <div class="form-section" style="margin-bottom:28px">
        <h1 style="font-family:'Instrument Serif',serif;font-size:clamp(26px,3vw,34px);color:var(--txt);font-style:italic;margin-bottom:6px;line-height:1.2" id="form-title">Create your account</h1>
        <p style="font-size:13.5px;color:var(--txt2)" id="form-sub">Start your free 14-day trial. No credit card required.</p>
      </div>

      <!-- STEP 1: Account Info -->
      <form id="step1" onsubmit="return false">
        <!-- Full Name -->
        <div class="form-section fg" style="margin-bottom:16px">
          <div class="inp-wrap">
            <i class="fas fa-user inp-ico" id="ico-name"></i>
            <input type="text" class="inp" id="inp-name" autocomplete="name" oninput="validateField('name')" onfocus="focusField(this,'ico-name')" onblur="blurField(this,'ico-name')"/>
            <label class="inp-label" id="lbl-name">Full name</label>
            <div id="tick-name" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:13px;color:var(--grn);display:none"><i class="fas fa-check-circle"></i></div>
          </div>
          <div class="v-msg" id="err-name" style="color:var(--red);display:none"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span></span></div>
        </div>

        <!-- Email -->
        <div class="form-section fg" style="margin-bottom:16px">
          <div class="inp-wrap">
            <i class="fas fa-envelope inp-ico" id="ico-email"></i>
            <input type="email" class="inp" id="inp-email" autocomplete="email" oninput="validateField('email')" onfocus="focusField(this,'ico-email')" onblur="blurField(this,'ico-email')"/>
            <label class="inp-label" id="lbl-email">Email address</label>
            <div id="tick-email" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:13px;color:var(--grn);display:none"><i class="fas fa-check-circle"></i></div>
          </div>
          <div class="v-msg" id="err-email" style="color:var(--red);display:none"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span></span></div>
        </div>

        <!-- Phone -->
        <div class="form-section fg" style="margin-bottom:16px">
          <div class="inp-wrap">
            <i class="fas fa-phone inp-ico" id="ico-phone"></i>
            <input type="tel" class="inp" id="inp-phone" autocomplete="tel" oninput="validateField('phone')" onfocus="focusField(this,'ico-phone')" onblur="blurField(this,'ico-phone')"/>
            <label class="inp-label" id="lbl-phone">Phone number</label>
            <div id="tick-phone" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:13px;color:var(--grn);display:none"><i class="fas fa-check-circle"></i></div>
          </div>
          <div class="v-msg" id="err-phone" style="color:var(--red);display:none"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span></span></div>
        </div>

        <!-- Company -->
        <div class="form-section fg" style="margin-bottom:22px">
          <div class="inp-wrap">
            <i class="fas fa-building inp-ico" id="ico-company"></i>
            <input type="text" class="inp" id="inp-company" autocomplete="organization" onfocus="focusField(this,'ico-company')" onblur="blurField(this,'ico-company')"/>
            <label class="inp-label" id="lbl-company">Company name (optional)</label>
          </div>
        </div>

        <div class="form-section">
          <button type="button" class="sub-btn" onclick="goStep2()">
            <span id="btn1-txt">Continue</span>
            <i class="fas fa-arrow-right" style="margin-left:6px" id="btn1-ico"></i>
            <div class="spinner" id="btn1-spin" style="display:none;margin:0 auto"></div>
          </button>
        </div>

        <div class="form-section" style="margin-top:20px">
          <div class="or-line">or</div>
        </div>

        <!-- Social -->
        <div class="form-section" style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:16px">
          <button type="button" class="soc-btn" onclick="socialReg('Google')">
            <svg width="16" height="16" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
            Continue with Google
          </button>
          <button type="button" class="soc-btn" onclick="window.location.href='/easy_billing_pro/app/views/login.php'">
            <i class="fab fa-github" style="font-size:16px;color:var(--txt)"></i>
            Continue with GitHub
          </button>
        </div>

        <div class="form-section" style="text-align:center;margin-top:22px;font-size:13px;color:var(--txt3)">
          Already have an account? <a href="/easy_billing_pro/app/views/login.php" style="color:var(--amber);font-weight:700;text-decoration:none">Sign in</a>
        </div>
      </form>

      <!-- STEP 2: Security -->
      <form id="step2" style="display:none" onsubmit="return false">
        <!-- Password -->
        <div class="form-section fg" style="margin-bottom:6px">
          <div class="inp-wrap">
            <i class="fas fa-lock inp-ico" id="ico-pwd"></i>
            <input type="password" class="inp" id="inp-pwd" oninput="validateField('pwd');checkStrength()" onfocus="focusField(this,'ico-pwd')" onblur="blurField(this,'ico-pwd')"/>
            <label class="inp-label" id="lbl-pwd">Create password</label>
            <button type="button" class="inp-eye" onclick="togglePwd('inp-pwd','eye-pwd')" id="eye-pwd"><i class="fas fa-eye"></i></button>
          </div>
          <div class="str-bar">
            <div class="str-fill" id="str-fill" style="width:0%;background:var(--red)"></div>
          </div>
          <div style="display:flex;justify-content:space-between;margin-top:5px">
            <div class="v-msg" id="err-pwd" style="color:var(--red);display:none"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span></span></div>
            <div style="font-size:11px;color:var(--txt3);font-weight:600;margin-left:auto" id="str-label"></div>
          </div>
        </div>

        <!-- Confirm Password -->
        <div class="form-section fg" style="margin-bottom:16px">
          <div class="inp-wrap">
            <i class="fas fa-lock inp-ico" id="ico-cpwd"></i>
            <input type="password" class="inp" id="inp-cpwd" oninput="validateField('cpwd')" onfocus="focusField(this,'ico-cpwd')" onblur="blurField(this,'ico-cpwd')"/>
            <label class="inp-label" id="lbl-cpwd">Confirm password</label>
            <button type="button" class="inp-eye" onclick="togglePwd('inp-cpwd','eye-cpwd')" id="eye-cpwd"><i class="fas fa-eye"></i></button>
            <div id="tick-cpwd" style="position:absolute;right:38px;top:50%;transform:translateY(-50%);font-size:13px;color:var(--grn);display:none"><i class="fas fa-check-circle"></i></div>
          </div>
          <div class="v-msg" id="err-cpwd" style="color:var(--red);display:none"><i class="fas fa-exclamation-circle" style="font-size:11px"></i><span></span></div>
        </div>

        <!-- Password requirements -->
        <div class="form-section" style="background:rgba(255,255,255,.03);border:1px solid var(--bdr);border-radius:10px;padding:13px;margin-bottom:20px">
          <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase;letter-spacing:.07em;margin-bottom:8px">Password requirements</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px">
            <div style="font-size:12px;color:var(--txt3);display:flex;align-items:center;gap:5px" id="req-len"><i class="fas fa-circle" style="font-size:6px"></i> 8+ characters</div>
            <div style="font-size:12px;color:var(--txt3);display:flex;align-items:center;gap:5px" id="req-upper"><i class="fas fa-circle" style="font-size:6px"></i> Uppercase letter</div>
            <div style="font-size:12px;color:var(--txt3);display:flex;align-items:center;gap:5px" id="req-num"><i class="fas fa-circle" style="font-size:6px"></i> Number</div>
            <div style="font-size:12px;color:var(--txt3);display:flex;align-items:center;gap:5px" id="req-spec"><i class="fas fa-circle" style="font-size:6px"></i> Special character</div>
          </div>
        </div>

        <div class="form-section" style="display:flex;gap:10px;margin-bottom:0">
          <button type="button" class="sub-btn" style="background:rgba(255,255,255,.06);color:var(--txt);flex:0 0 48px" onclick="goStep(1)">
            <i class="fas fa-arrow-left"></i>
          </button>
          <button type="button" class="sub-btn" style="flex:1" onclick="goStep3()">
            <span id="btn2-txt">Continue</span>
            <i class="fas fa-arrow-right" style="margin-left:6px" id="btn2-ico"></i>
          </button>
        </div>
      </form>

      <!-- STEP 3: Preferences + Agreement -->
      <form id="step3" style="display:none" onsubmit="return false">
        <!-- Plan selection -->
        <div class="form-section" style="margin-bottom:16px">
          <div style="font-size:11px;font-weight:700;color:var(--txt3);text-transform:uppercase;letter-spacing:.07em;margin-bottom:10px">Choose your plan</div>
          <div style="display:flex;flex-direction:column;gap:8px" id="plan-group">
            <div class="addr-style" id="plan-free" onclick="selectPlan('free')" style="border:1.5px solid var(--amber);background:rgba(245,158,11,.06);border-radius:11px;padding:13px 14px;cursor:pointer;display:flex;align-items:center;justify-content:space-between;transition:all .15s">
              <div><div style="font-size:14px;font-weight:700">Free</div><div style="font-size:11.5px;color:var(--txt3);margin-top:1px">Up to 5 invoices/mo · Perfect to start</div></div>
              <div style="font-family:'Fira Code',monospace;font-size:16px;font-weight:700;color:var(--amber)">LKR0</div>
            </div>
            <div id="plan-pro" onclick="selectPlan('pro')" style="border:1.5px solid var(--bdr);border-radius:11px;padding:13px 14px;cursor:pointer;display:flex;align-items:center;justify-content:space-between;transition:all .15s">
              <div>
                <div style="display:flex;align-items:center;gap:7px"><span style="font-size:14px;font-weight:700">Pro</span><span style="font-size:10px;font-weight:700;background:var(--amber);color:#0a0908;padding:2px 7px;border-radius:99px">POPULAR</span></div>
                <div style="font-size:11.5px;color:var(--txt3);margin-top:1px">Unlimited invoices · AI insights · Priority support</div>
              </div>
              <div><span style="font-family:'Fira Code',monospace;font-size:16px;font-weight:700;color:var(--txt)">LKR1000</span><span style="font-size:11px;color:var(--txt3)">/mo</span></div>
            </div>
          </div>
        </div>

        <!-- Business type -->
        <div class="form-section fg" style="margin-bottom:16px">
          <div class="inp-wrap">
            <i class="fas fa-briefcase inp-ico" id="ico-type"></i>
            <select class="inp text-amber-600 rounded-md shadow-2xl" id="inp-type" style="appearance:none;cursor:pointer" onfocus="focusField(this,'ico-type')" onblur="blurField(this,'ico-type')">
              <option value="" disabled selected></option>
              <option>Freelancer / Consultant</option>
              <option>Small Business</option>
              <option>Agency / Studio</option>
              <option>Enterprise</option>
              <option>Other</option>
            </select>
            <label class="inp-label" id="lbl-type">Business type</label>
            <i class="fas fa-chevron-down" style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:11px;color:var(--txt3);pointer-events:none"></i>
          </div>
        </div>

        <!-- Referral -->
        <div class="form-section fg" style="margin-bottom:18px">
          <div class="inp-wrap">
            <i class="fas fa-gift inp-ico" id="ico-ref"></i>
            <input type="text" class="inp" id="inp-ref" oninput="checkPromo()" onfocus="focusField(this,'ico-ref')" onblur="blurField(this,'ico-ref')"/>
            <label class="inp-label" id="lbl-ref">Referral / promo code (optional)</label>
            <div id="promo-tick" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:12px;color:var(--grn);display:none;font-weight:700;font-family:'Fira Code',monospace">✓ Applied</div>
          </div>
        </div>

        <!-- Agreements -->
        <div class="form-section" style="display:flex;flex-direction:column;gap:11px;margin-bottom:22px">
          <label style="display:flex;align-items:flex-start;gap:11px;cursor:pointer" onclick="toggleCbx('cbx1')">
            <div class="cbx checked" id="cbx1"><i class="fas fa-check"></i></div>
            <span style="font-size:12.5px;color:var(--txt2);line-height:1.5">I agree to the <a href="#" style="color:var(--amber);text-decoration:none" onclick="event.stopPropagation()">Terms of Service</a> and <a href="#" style="color:var(--amber);text-decoration:none" onclick="event.stopPropagation()">Privacy Policy</a></span>
          </label>
          <label style="display:flex;align-items:flex-start;gap:11px;cursor:pointer" onclick="toggleCbx('cbx2')">
            <div class="cbx" id="cbx2"><i class="fas fa-check"></i></div>
            <span style="font-size:12.5px;color:var(--txt2);line-height:1.5">Send me product updates, tips, and offers (optional)</span>
          </label>
        </div>

        <div class="form-section" style="display:flex;gap:10px">
          <button type="button" class="sub-btn" style="background:rgba(255,255,255,.06);color:var(--txt);flex:0 0 48px" onclick="goStep(2)">
            <i class="fas fa-arrow-left"></i>
          </button>
          <button type="button" class="sub-btn" id="submit-btn" style="flex:1" onclick="submitForm()">
            <div class="spinner" id="sub-spin"></div>
            <span id="sub-txt"><i class="fas fa-user-plus" style="margin-right:6px"></i>Create Account</span>
          </button>
        </div>

        <div class="form-section" style="margin-top:14px;text-align:center;display:flex;align-items:center;justify-content:center;gap:6px;font-size:11.5px;color:var(--txt3)">
          <i class="fas fa-shield-alt" style="color:var(--amber)"></i>
          Your data is encrypted and never shared
        </div>
      </form>

    </div><!-- /max-w -->
  </div><!-- /right-panel -->

</div><!-- /page -->

<!-- ═══════════════════════════════════════
     JAVASCRIPT — FULL VALIDATION & LOGIC
═══════════════════════════════════════ -->
<script>
/* ════════════════════════════════════════════════
   EASY BILLING PRO REGISTER — COMPLETE JS
   Step navigation · Real-time validation
   Password strength · Promo codes · LocalStorage
════════════════════════════════════════════════ */

let currentStep = 1;
let selectedPlan = 'free';
const agreeMap = { cbx1: true, cbx2: false };

/* ── FIELD FOCUS/BLUR ─────────────────── */
function focusField(inp, icoId) {
  const ico = document.getElementById(icoId);
  if (ico) ico.style.color = '#f59e0b';
  const lbl = document.getElementById('lbl-' + inp.id.replace('inp-',''));
  if (lbl) {
    lbl.style.top = '-9px';
    lbl.style.fontSize = '10px';
    lbl.style.color = '#f59e0b';
    lbl.style.background = 'var(--card)';
    lbl.style.padding = '0 5px';
  }
}
function blurField(inp, icoId) {
  const ico = document.getElementById(icoId);
  if (ico && !inp.classList.contains('err')) ico.style.color = '';
  const key = inp.id.replace('inp-','');
  const lbl = document.getElementById('lbl-' + key);
  if (lbl && !inp.value) {
    lbl.style.top = '50%';
    lbl.style.transform = 'translateY(-50%)';
    lbl.style.fontSize = '13.5px';
    lbl.style.color = 'var(--txt3)';
    lbl.style.background = 'transparent';
    lbl.style.padding = '0';
  } else if (lbl && inp.value) {
    lbl.style.top = '-9px';
    lbl.style.transform = 'none';
    lbl.style.fontSize = '10px';
    lbl.style.background = 'var(--card)';
    lbl.style.padding = '0 5px';
    if (!inp.classList.contains('err')) lbl.style.color = 'var(--txt2)';
  }
}

/* ── VALIDATION ───────────────────────── */
const validators = {
  name:  { fn: v => v.trim().split(' ').length >= 2 && v.trim().length >= 4, msg: 'Please enter your full name (first & last)' },
  email: { fn: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v), msg: 'Please enter a valid email address' },
  phone: { fn: v => /^[\+\d\s\-\(\)]{7,18}$/.test(v.trim()), msg: 'Enter a valid phone number (e.g. +1 555 000 0000)' },
  pwd:   { fn: v => v.length >= 8, msg: 'Password must be at least 8 characters' },
  cpwd:  { fn: v => v === document.getElementById('inp-pwd').value && v.length > 0, msg: "Passwords don't match" },
};

function validateField(key) {
  const inp = document.getElementById('inp-' + key);
  const err = document.getElementById('err-' + key);
  const tick = document.getElementById('tick-' + key);
  if (!inp || !validators[key]) return true;
  const val = inp.value;
  const ok = val.length > 0 && validators[key].fn(val);
  const hasVal = val.length > 0;
  inp.classList.toggle('err', hasVal && !ok);
  inp.classList.toggle('ok', ok);
  if (err) {
    if (hasVal && !ok) {
      err.style.display = 'flex';
      err.querySelector('span').textContent = validators[key].msg;
    } else {
      err.style.display = 'none';
    }
  }
  if (tick) tick.style.display = ok ? 'block' : 'none';
  // Update ico color
  const icoId = 'ico-' + key;
  const ico = document.getElementById(icoId);
  if (ico) ico.style.color = ok ? '#22c55e' : hasVal ? '#ef4444' : '';
  return ok;
}

/* ── PASSWORD STRENGTH ────────────────── */
function checkStrength() {
  const v = document.getElementById('inp-pwd').value;
  const reqs = {
    'req-len':   v.length >= 8,
    'req-upper': /[A-Z]/.test(v),
    'req-num':   /[0-9]/.test(v),
    'req-spec':  /[^A-Za-z0-9]/.test(v),
  };
  Object.entries(reqs).forEach(([id, pass]) => {
    const el = document.getElementById(id);
    if (el) el.style.color = pass ? '#22c55e' : 'var(--txt3)';
  });
  const score = Object.values(reqs).filter(Boolean).length;
  const fill = document.getElementById('str-fill');
  const lbl  = document.getElementById('str-label');
  const configs = [
    { pct: '0%',   color: '#ef4444', label: '' },
    { pct: '25%',  color: '#ef4444', label: '😟 Weak' },
    { pct: '50%',  color: '#f59e0b', label: '😐 Fair' },
    { pct: '75%',  color: '#f59e0b', label: '🙂 Good' },
    { pct: '100%', color: '#22c55e', label: '💪 Strong' },
  ];
  const c = configs[score];
  if (fill) { fill.style.width = c.pct; fill.style.background = c.color; }
  if (lbl)  lbl.textContent = v.length ? c.label : '';
}

/* ── TOGGLE PASSWORD ──────────────────── */
function togglePwd(inpId, eyeId) {
  const inp = document.getElementById(inpId);
  const eye = document.getElementById(eyeId);
  if (inp.type === 'password') {
    inp.type = 'text';
    if (eye) eye.innerHTML = '<i class="fas fa-eye-slash"></i>';
  } else {
    inp.type = 'password';
    if (eye) eye.innerHTML = '<i class="fas fa-eye"></i>';
  }
}

/* ── PROMO CODE ───────────────────────── */
const PROMO_CODES = ['SAVE20', 'EBP2025', 'WELCOME', 'FREE30'];
function checkPromo() {
  const val = document.getElementById('inp-ref').value.toUpperCase().trim();
  const tick = document.getElementById('promo-tick');
  if (PROMO_CODES.includes(val)) {
    tick.style.display = 'block';
    document.getElementById('inp-ref').classList.add('ok');
  } else {
    tick.style.display = 'none';
    document.getElementById('inp-ref').classList.remove('ok');
  }
}

/* ── PLAN SELECTION ───────────────────── */
function selectPlan(plan) {
  selectedPlan = plan;
  const freePlan = document.getElementById('plan-free');
  const proPlan  = document.getElementById('plan-pro');
  if (plan === 'free') {
    freePlan.style.border = '1.5px solid var(--amber)';
    freePlan.style.background = 'rgba(245,158,11,.06)';
    proPlan.style.border = '1.5px solid var(--bdr)';
    proPlan.style.background = 'transparent';
  } else {
    proPlan.style.border = '1.5px solid var(--amber)';
    proPlan.style.background = 'rgba(245,158,11,.06)';
    freePlan.style.border = '1.5px solid var(--bdr)';
    freePlan.style.background = 'transparent';
  }
}

/* ── CHECKBOX TOGGLE ──────────────────── */
function toggleCbx(id) {
  const el = document.getElementById(id);
  if (el) {
    const isChecked = el.classList.contains('checked');
    el.classList.toggle('checked', !isChecked);
    agreeMap[id] = !isChecked;
  }
}

/* ── STEP NAVIGATION ──────────────────── */
function goStep(n) {
  document.getElementById('step1').style.display = n===1 ? 'block' : 'none';
  document.getElementById('step2').style.display = n===2 ? 'block' : 'none';
  document.getElementById('step3').style.display = n===3 ? 'block' : 'none';
  currentStep = n;
  updateStepUI();
}

function updateStepUI() {
  const n = currentStep;
  // Dots
  ['sd1','sd2','sd3'].forEach((id, i) => {
    const el = document.getElementById(id);
    if (!el) return;
    el.classList.remove('active','done');
    if (i+1 < n) el.classList.add('done');
    else if (i+1 === n) el.classList.add('active');
    // Color done dots
    el.style.background = i+1 < n ? 'var(--grn)' : i+1===n ? 'var(--amber)' : 'var(--bdr2)';
    el.style.boxShadow = i+1===n ? '0 0 8px rgba(245,158,11,.5)' : '';
  });
  // Lines
  document.getElementById('sl1').style.background = n >= 2 ? 'var(--grn)' : 'var(--bdr)';
  document.getElementById('sl2').style.background = n >= 3 ? 'var(--grn)' : 'var(--bdr)';
  // Labels + titles
  const titles = ['Create your account', 'Secure your account', 'Almost done!'];
  const subs   = ['Start your free 14-day trial. No credit card required.', 'Choose a strong password to protect your data.', 'Choose a plan and finalize your account.'];
  const labels = ['Step 1 of 3 — Account Info','Step 2 of 3 — Security','Step 3 of 3 — Plan & Preferences'];
  document.getElementById('form-title').textContent  = titles[n-1];
  document.getElementById('form-sub').textContent    = subs[n-1];
  document.getElementById('step-label').textContent  = labels[n-1];
}

function goStep2() {
  const nameOk  = validateField('name');
  const emailOk = validateField('email');
  const phoneOk = validateField('phone');
  if (!nameOk)  { shakeField('inp-name');  showToast('Please enter your full name','error'); return; }
  if (!emailOk) { shakeField('inp-email'); showToast('Please enter a valid email','error'); return; }
  if (!phoneOk) { shakeField('inp-phone'); showToast('Please enter a valid phone','error'); return; }
  // Simulate checking email
  setLoading('btn1-txt','btn1-ico','btn1-spin',true);
  setTimeout(() => {
    setLoading('btn1-txt','btn1-ico','btn1-spin',false);
    goStep(2);
  }, 800);
}

function goStep3() {
  const pwdOk  = validateField('pwd');
  const cpwdOk = validateField('cpwd');
  if (!pwdOk)  { shakeField('inp-pwd');  showToast('Password must be at least 8 characters','error'); return; }
  if (!cpwdOk) { shakeField('inp-cpwd'); showToast("Passwords don't match",'error'); return; }
  goStep(3);
}

/* ── SUBMIT ───────────────────────────── */
function submitForm() {
  if (!agreeMap['cbx1']) {
    shakeField('submit-btn');
    showToast('Please accept the Terms of Service','error');
    return;
  }
  const type = document.getElementById('inp-type').value;
  if (!type) { showToast('Please select your business type','warn'); return; }

  setLoading('sub-txt',null,'sub-spin',true);
  document.getElementById('submit-btn').disabled = true;

  // Save to LocalStorage
  const userData = {
    name:    document.getElementById('inp-name').value,
    email:   document.getElementById('inp-email').value,
    phone:   document.getElementById('inp-phone').value,
    company: document.getElementById('inp-company').value,
    plan:    selectedPlan,
    type,
    promo:   document.getElementById('inp-ref').value,
    joinDate: new Date().toISOString().split('T')[0],
    createdAt: Date.now(),
  };
  localStorage.setItem('ebp_reg_user', JSON.stringify(userData));

  setTimeout(() => {
    launchConfetti();
    setTimeout(() => {
      document.getElementById('success-screen').classList.add('show');
    }, 400);
  }, 1800);
}

/* ── HELPER: LOADING STATE ────────────── */
function setLoading(txtId, icoId, spinId, loading) {
  const txt  = document.getElementById(txtId);
  const ico  = icoId ? document.getElementById(icoId) : null;
  const spin = document.getElementById(spinId);
  if (loading) {
    if (txt)  txt.style.display  = 'none';
    if (ico)  ico.style.display  = 'none';
    if (spin) spin.style.display = 'block';
  } else {
    if (txt)  txt.style.display  = '';
    if (ico)  ico.style.display  = '';
    if (spin) spin.style.display = 'none';
  }
}

/* ── SHAKE ANIMATION ──────────────────── */
function shakeField(id) {
  const el = document.getElementById(id);
  if (!el) return;
  el.style.animation = 'none';
  const style = document.createElement('style');
  style.textContent = '@keyframes shake{0%,100%{transform:translateX(0)}20%{transform:translateX(-6px)}40%{transform:translateX(6px)}60%{transform:translateX(-4px)}80%{transform:translateX(4px)}}';
  document.head.appendChild(style);
  el.style.animation = 'shake .4s ease';
  setTimeout(() => { el.style.animation = ''; style.remove(); }, 450);
}

/* ── SOCIAL REGISTER ──────────────────── */
function socialReg(provider) {
  showToast(`Connecting with ${provider}…`, 'info');
  setTimeout(() => showToast(`${provider} auth coming soon!`, 'warn'), 1000);
}

/* ── TOAST ────────────────────────────── */
let toastTimer;
function showToast(msg, type = 'info') {
  const el  = document.getElementById('toast');
  const ico = document.getElementById('toast-ico');
  const txt = document.getElementById('toast-msg');
  const icons = { success: 'fa-check-circle', error: 'fa-times-circle', info: 'fa-info-circle', warn: 'fa-exclamation-triangle' };
  const colors = { success: '#22c55e', error: '#ef4444', info: '#f59e0b', warn: '#f59e0b' };
  ico.className = `fas ${icons[type]||'fa-info-circle'}`;
  ico.style.color = colors[type] || '#f59e0b';
  txt.textContent = msg;
  el.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => el.classList.remove('show'), 3500);
}

/* ── CONFETTI ─────────────────────────── */
function launchConfetti() {
  const colors = ['#f59e0b','#22c55e','#ef4444','#3b82f6','#a855f7','#ec4899','#ffffff'];
  for (let i = 0; i < 80; i++) {
    const dot = document.createElement('div');
    dot.className = 'confetti-dot';
    dot.style.cssText = `
      left: ${Math.random()*100}vw;
      top: -10px;
      background: ${colors[Math.floor(Math.random()*colors.length)]};
      width: ${4+Math.random()*8}px;
      height: ${4+Math.random()*8}px;
      animation: fall ${2+Math.random()*3}s ${Math.random()*1.5}s linear both;
      border-radius: ${Math.random()>.5?'50%':'3px'};
    `;
    document.body.appendChild(dot);
    setTimeout(() => dot.remove(), 5000);
  }
}

/* ── INIT ─────────────────────────────── */
// Initialize label positions for selects
document.getElementById('inp-type').addEventListener('change', function() {
  blurField(this, 'ico-type');
});

// Focus labels for inputs that may have autofill
window.addEventListener('load', () => {
  document.querySelectorAll('.inp').forEach(inp => {
    if (inp.value) blurField(inp, 'ico-' + inp.id.replace('inp-',''));
  });
});
</script>
</body>
</html>
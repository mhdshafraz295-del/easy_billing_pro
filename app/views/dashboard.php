<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Easy Billing Pro— Admin Dashboard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet"/>

  <script>
    tailwind.config = {
      darkMode: ['attribute', '[data-theme="dark"]'],
      theme: {
        extend: {
          fontFamily: {
            sans: ['Outfit', 'sans-serif'],
            mono: ['JetBrains Mono', 'monospace'],
          }
        }
      }
    }
  </script>

  <style>
    /* ============================================
       CSS VARIABLES & THEME
    ============================================ */
    :root {
      --bg-base: #f5f4f0;
      --bg-card: #ffffff;
      --bg-sidebar: #0f0f0f;
      --text-primary: #0f0f0f;
      --text-secondary: #6b7280;
      --text-muted: #9ca3af;
      --border: #e5e4df;
      --accent: #6366f1;
      --accent-2: #f59e0b;
      --accent-3: #10b981;
      --danger: #ef4444;
      --sidebar-text: #e5e7eb;
      --sidebar-muted: #6b7280;
      --sidebar-hover: rgba(255,255,255,0.06);
      --sidebar-active: rgba(99,102,241,0.2);
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
      --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
      --shadow-lg: 0 8px 32px rgba(0,0,0,0.12);
      --radius: 14px;
    }

    [data-theme="dark"] {
      --bg-base: #0a0a0a;
      --bg-card: #111111;
      --bg-sidebar: #0a0a0a;
      --text-primary: #f0efeb;
      --text-secondary: #9ca3af;
      --text-muted: #6b7280;
      --border: #1f1f1f;
      --sidebar-text: #e5e7eb;
      --sidebar-muted: #6b7280;
      --sidebar-hover: rgba(255,255,255,0.04);
      --sidebar-active: rgba(99,102,241,0.15);
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.3);
      --shadow-md: 0 4px 16px rgba(0,0,0,0.4);
      --shadow-lg: 0 8px 32px rgba(0,0,0,0.5);
    }

    /* ============================================
       BASE RESET
    ============================================ */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Outfit', sans-serif;
      background: var(--bg-base);
      color: var(--text-primary);
      min-height: 100vh;
      transition: background 0.3s ease, color 0.3s ease;
    }

    ::-webkit-scrollbar { width: 5px; height: 5px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 99px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--text-muted); }

    /* ============================================
       LAYOUT
    ============================================ */
    #app { display: flex; min-height: 100vh; }

    /* SIDEBAR */
    #sidebar {
      width: 260px;
      min-height: 100vh;
      background: var(--bg-sidebar);
      border-right: 1px solid rgba(255,255,255,0.04);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0;
      z-index: 50;
      transition: width 0.3s cubic-bezier(0.4,0,0.2,1), transform 0.3s cubic-bezier(0.4,0,0.2,1);
      overflow: hidden;
    }

    #sidebar.collapsed { width: 68px; }
    #sidebar.collapsed .sidebar-label,
    #sidebar.collapsed .sidebar-section-label,
    #sidebar.collapsed .logo-text { display: none !important; }
    #sidebar.collapsed .sidebar-logo { justify-content: center; padding: 0 16px; }
    #sidebar.collapsed .nav-link { justify-content: center; padding: 10px; }
    #sidebar.collapsed .nav-link .nav-badge { display: none; }

    #main { margin-left: 260px; flex: 1; min-width: 0; transition: margin-left 0.3s cubic-bezier(0.4,0,0.2,1); }
    #main.expanded { margin-left: 68px; }

    /* Mobile */
    @media (max-width: 768px) {
      #sidebar { transform: translateX(-100%); width: 260px !important; }
      #sidebar.mobile-open { transform: translateX(0); }
      #main { margin-left: 0 !important; }
      #sidebar-overlay { display: block; }
    }

    /* ============================================
       SIDEBAR COMPONENTS
    ============================================ */
    .sidebar-logo {
      height: 64px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0 20px;
      border-bottom: 1px solid rgba(255,255,255,0.04);
      flex-shrink: 0;
    }

    .logo-icon {
      width: 32px; height: 32px;
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }

    .sidebar-nav { flex: 1; padding: 16px 10px; overflow-y: auto; overflow-x: hidden; }

    .sidebar-section-label {
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--sidebar-muted);
      padding: 0 12px;
      margin: 16px 0 6px;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 9px 12px;
      border-radius: 10px;
      cursor: pointer;
      color: var(--sidebar-muted);
      font-size: 14px;
      font-weight: 500;
      transition: all 0.15s ease;
      position: relative;
      white-space: nowrap;
      text-decoration: none;
      margin-bottom: 2px;
    }

    .nav-link:hover { background: var(--sidebar-hover); color: var(--sidebar-text); }
    .nav-link.active { background: var(--sidebar-active); color: #818cf8; }
    .nav-link.active svg { color: #818cf8; }

    .nav-link svg { flex-shrink: 0; width: 18px; height: 18px; }

    .nav-badge {
      margin-left: auto;
      background: #6366f1;
      color: white;
      font-size: 10px;
      font-weight: 600;
      padding: 2px 7px;
      border-radius: 99px;
    }

    .sidebar-footer {
      padding: 12px 10px;
      border-top: 1px solid rgba(255,255,255,0.04);
      flex-shrink: 0;
    }

    .user-card {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 12px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.15s;
    }
    .user-card:hover { background: var(--sidebar-hover); }

    /* ============================================
       TOPBAR
    ============================================ */
    #topbar {
      height: 64px;
      background: var(--bg-card);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0 24px;
      position: sticky;
      top: 0;
      z-index: 30;
      transition: background 0.3s, border-color 0.3s;
    }

    .search-wrap {
      flex: 1;
      max-width: 380px;
      position: relative;
    }

    .search-wrap input {
      width: 100%;
      background: var(--bg-base);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 8px 14px 8px 38px;
      font-family: 'Outfit', sans-serif;
      font-size: 13px;
      color: var(--text-primary);
      outline: none;
      transition: all 0.2s;
    }

    .search-wrap input:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,0.12); }
    .search-wrap input::placeholder { color: var(--text-muted); }
    .search-wrap .search-icon { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); color: var(--text-muted); pointer-events: none; }

    .icon-btn {
      width: 38px; height: 38px;
      border-radius: 10px;
      background: var(--bg-base);
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      color: var(--text-secondary);
      transition: all 0.15s;
      position: relative;
      flex-shrink: 0;
    }
    .icon-btn:hover { background: var(--border); color: var(--text-primary); }

    .notif-dot {
      position: absolute; top: 7px; right: 7px;
      width: 7px; height: 7px;
      background: #ef4444;
      border-radius: 50%;
      border: 1.5px solid var(--bg-card);
    }

    /* ============================================
       PAGE CONTENT
    ============================================ */
    .page-content { padding: 28px 24px; }

    .page-header { margin-bottom: 24px; }

    .page-title {
      font-size: 22px;
      font-weight: 700;
      color: var(--text-primary);
      letter-spacing: -0.3px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .page-subtitle { font-size: 13px; color: var(--text-secondary); margin-top: 3px; }

    /* ============================================
       CARDS
    ============================================ */
    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow-sm);
      transition: background 0.3s, border-color 0.3s, box-shadow 0.2s, transform 0.2s;
    }

    .card:hover { box-shadow: var(--shadow-md); }

    .stat-card {
      padding: 22px;
      cursor: default;
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0; right: 0;
      width: 80px; height: 80px;
      border-radius: 0 var(--radius) 0 80px;
      opacity: 0.06;
    }

    .stat-card.indigo::before { background: #6366f1; }
    .stat-card.amber::before { background: #f59e0b; }
    .stat-card.emerald::before { background: #10b981; }
    .stat-card.rose::before { background: #f43f5e; }

    .stat-icon {
      width: 40px; height: 40px;
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 16px;
    }

    .stat-value {
      font-size: 28px;
      font-weight: 800;
      letter-spacing: -0.5px;
      color: var(--text-primary);
      line-height: 1;
      margin-bottom: 4px;
      font-family: 'Outfit', sans-serif;
    }

    .stat-label { font-size: 13px; color: var(--text-secondary); font-weight: 500; }

    .stat-badge {
      display: inline-flex;
      align-items: center;
      gap: 3px;
      font-size: 11px;
      font-weight: 600;
      padding: 3px 8px;
      border-radius: 99px;
      margin-top: 8px;
    }

    .badge-up { background: rgba(16,185,129,0.1); color: #10b981; }
    .badge-down { background: rgba(239,68,68,0.1); color: #ef4444; }
    .badge-warn { background: rgba(245,158,11,0.1); color: #f59e0b; }
    .badge-neutral { background: rgba(99,102,241,0.1); color: #6366f1; }

    /* ============================================
       CHART CARDS
    ============================================ */
    .chart-card { padding: 22px; }
    .chart-card-title { font-size: 15px; font-weight: 600; color: var(--text-primary); margin-bottom: 4px; }
    .chart-card-sub { font-size: 12px; color: var(--text-muted); }
    .chart-wrap { position: relative; margin-top: 20px; }

    /* ============================================
       TABLE
    ============================================ */
    .data-table { width: 100%; border-collapse: collapse; }

    .data-table th {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--text-muted);
      padding: 12px 16px;
      border-bottom: 1px solid var(--border);
      text-align: left;
      white-space: nowrap;
    }

    .data-table td {
      padding: 14px 16px;
      font-size: 13.5px;
      border-bottom: 1px solid var(--border);
      color: var(--text-primary);
      transition: background 0.12s;
      vertical-align: middle;
    }

    .data-table tr:last-child td { border-bottom: none; }
    .data-table tbody tr:hover td { background: rgba(99,102,241,0.03); }

    .product-img {
      width: 40px; height: 40px;
      border-radius: 8px;
      object-fit: cover;
      background: var(--bg-base);
      border: 1px solid var(--border);
    }

    /* ============================================
       BADGES & CHIPS
    ============================================ */
    .chip {
      display: inline-flex;
      align-items: center;
      padding: 3px 10px;
      border-radius: 99px;
      font-size: 12px;
      font-weight: 500;
    }

    .chip-indigo { background: rgba(99,102,241,0.1); color: #6366f1; }
    .chip-emerald { background: rgba(16,185,129,0.1); color: #10b981; }
    .chip-amber { background: rgba(245,158,11,0.1); color: #d97706; }
    .chip-rose { background: rgba(239,68,68,0.1); color: #ef4444; }
    .chip-sky { background: rgba(14,165,233,0.1); color: #0ea5e9; }
    .chip-violet { background: rgba(139,92,246,0.1); color: #7c3aed; }
    .chip-gray { background: rgba(107,114,128,0.1); color: #6b7280; }

    /* ============================================
       TOGGLE SWITCH
    ============================================ */
    .toggle { position: relative; display: inline-flex; align-items: center; cursor: pointer; }
    .toggle input { position: absolute; opacity: 0; width: 0; height: 0; }

    .toggle-track {
      width: 40px; height: 22px;
      background: var(--border);
      border-radius: 99px;
      transition: background 0.2s;
      position: relative;
    }

    .toggle input:checked + .toggle-track { background: #10b981; }

    .toggle-thumb {
      position: absolute;
      top: 3px; left: 3px;
      width: 16px; height: 16px;
      background: white;
      border-radius: 50%;
      transition: transform 0.2s cubic-bezier(0.4,0,0.2,1);
      box-shadow: 0 1px 3px rgba(0,0,0,0.15);
    }

    .toggle input:checked ~ .toggle-thumb { transform: translateX(18px); }

    /* ============================================
       ACTION BUTTONS
    ============================================ */
    .action-btn {
      width: 30px; height: 30px;
      border-radius: 7px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.15s;
      border: none;
      outline: none;
      background: transparent;
    }

    .action-btn.edit { color: #6366f1; }
    .action-btn.edit:hover { background: rgba(99,102,241,0.1); }
    .action-btn.del { color: #ef4444; }
    .action-btn.del:hover { background: rgba(239,68,68,0.1); }

    /* ============================================
       BUTTONS
    ============================================ */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 9px 16px;
      border-radius: 10px;
      font-family: 'Outfit', sans-serif;
      font-size: 13.5px;
      font-weight: 600;
      cursor: pointer;
      border: none;
      outline: none;
      transition: all 0.15s;
      white-space: nowrap;
    }

    .btn-primary {
      background: linear-gradient(135deg, #6366f1, #8b5cf6);
      color: white;
      box-shadow: 0 2px 8px rgba(99,102,241,0.3);
    }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99,102,241,0.4); }
    .btn-primary:active { transform: translateY(0); }

    .btn-secondary {
      background: var(--bg-base);
      color: var(--text-primary);
      border: 1px solid var(--border);
    }
    .btn-secondary:hover { background: var(--border); }

    .btn-danger { background: #ef4444; color: white; }
    .btn-danger:hover { background: #dc2626; }

    .btn-sm { padding: 6px 12px; font-size: 12.5px; }

    /* ============================================
       MODAL
    ============================================ */
    .overlay {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.55);
      backdrop-filter: blur(4px);
      z-index: 100;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .overlay.show { display: flex; }

    .modal-box {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: 18px;
      width: 100%;
      max-width: 520px;
      max-height: 90vh;
      overflow-y: auto;
      animation: modalIn 0.2s cubic-bezier(0.34,1.56,0.64,1);
      box-shadow: var(--shadow-lg);
    }

    @keyframes modalIn {
      from { opacity: 0; transform: scale(0.93) translateY(10px); }
      to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    .modal-header {
      padding: 22px 24px 18px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .modal-title { font-size: 17px; font-weight: 700; color: var(--text-primary); }
    .modal-body { padding: 22px 24px; }
    .modal-footer {
      padding: 16px 24px;
      border-top: 1px solid var(--border);
      display: flex;
      gap: 10px;
      justify-content: flex-end;
    }

    /* ============================================
       FORM ELEMENTS
    ============================================ */
    .form-group { margin-bottom: 16px; }

    .form-label {
      display: block;
      font-size: 12.5px;
      font-weight: 600;
      color: var(--text-secondary);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .form-input, .form-select {
      width: 100%;
      background: var(--bg-base);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 10px 14px;
      font-family: 'Outfit', sans-serif;
      font-size: 14px;
      color: var(--text-primary);
      outline: none;
      transition: all 0.2s;
      appearance: none;
    }

    .form-input:focus, .form-select:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
      background: var(--bg-card);
    }

    .form-input.error { border-color: #ef4444; }
    .form-input::placeholder { color: var(--text-muted); }

    .form-error { font-size: 11.5px; color: #ef4444; margin-top: 4px; display: none; }
    .form-error.show { display: block; }

    /* ============================================
       TOAST
    ============================================ */
    #toast-container {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 999;
      display: flex;
      flex-direction: column;
      gap: 8px;
      pointer-events: none;
    }

    .toast {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 16px;
      border-radius: 12px;
      background: var(--bg-card);
      border: 1px solid var(--border);
      box-shadow: var(--shadow-lg);
      font-size: 13.5px;
      font-weight: 500;
      color: var(--text-primary);
      min-width: 240px;
      max-width: 340px;
      pointer-events: all;
      animation: toastIn 0.3s cubic-bezier(0.34,1.56,0.64,1);
      transition: opacity 0.25s, transform 0.25s;
    }

    @keyframes toastIn {
      from { opacity: 0; transform: translateX(100%) scale(0.9); }
      to   { opacity: 1; transform: translateX(0) scale(1); }
    }

    .toast.hiding { opacity: 0; transform: translateX(50px); }
    .toast-icon { flex-shrink: 0; }
    .toast.success .toast-icon { color: #10b981; }
    .toast.error   .toast-icon { color: #ef4444; }
    .toast.info    .toast-icon { color: #6366f1; }
    .toast.warning .toast-icon { color: #f59e0b; }

    /* ============================================
       LOADING
    ============================================ */
    #global-loader {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.4);
      backdrop-filter: blur(3px);
      z-index: 200;
      display: none;
      align-items: center;
      justify-content: center;
    }

    .spinner {
      width: 44px; height: 44px;
      border: 3px solid rgba(99,102,241,0.2);
      border-top-color: #6366f1;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }

    /* ============================================
       EMPTY STATE
    ============================================ */
    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 24px;
      text-align: center;
    }

    .empty-icon {
      width: 72px; height: 72px;
      background: var(--bg-base);
      border: 2px dashed var(--border);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 16px;
      color: var(--text-muted);
    }

    /* ============================================
       RECENT ACTIVITY
    ============================================ */
    .activity-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 12px 0;
      border-bottom: 1px solid var(--border);
    }
    .activity-item:last-child { border-bottom: none; padding-bottom: 0; }

    .activity-dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      flex-shrink: 0;
      margin-top: 5px;
    }

    /* ============================================
       PAGINATION
    ============================================ */
    .page-btn {
      width: 32px; height: 32px;
      border-radius: 8px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 500;
      cursor: pointer;
      border: 1px solid var(--border);
      color: var(--text-secondary);
      background: transparent;
      transition: all 0.15s;
    }

    .page-btn:hover { background: var(--bg-base); color: var(--text-primary); }
    .page-btn.active { background: #6366f1; border-color: #6366f1; color: white; }
    .page-btn:disabled { opacity: 0.35; cursor: not-allowed; pointer-events: none; }

    /* ============================================
       FILTER BAR
    ============================================ */
    .filter-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      align-items: center;
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
    }

    .filter-input, .filter-select {
      background: var(--bg-base);
      border: 1px solid var(--border);
      border-radius: 9px;
      padding: 7px 12px;
      font-family: 'Outfit', sans-serif;
      font-size: 13px;
      color: var(--text-primary);
      outline: none;
      transition: all 0.2s;
      appearance: none;
    }

    .filter-input:focus, .filter-select:focus {
      border-color: #6366f1;
      box-shadow: 0 0 0 2px rgba(99,102,241,0.12);
    }

    .filter-input::placeholder { color: var(--text-muted); }

    /* ============================================
       MISC
    ============================================ */
    .section { display: none; }
    .section.active { display: block; }

    .divider { height: 1px; background: var(--border); margin: 16px 0; }

    /* Quick actions card */
    .quick-action-card {
      padding: 14px;
      border-radius: 10px;
      background: var(--bg-base);
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      transition: all 0.15s;
    }

    .quick-action-card:hover {
      background: var(--bg-card);
      border-color: #6366f1;
      box-shadow: 0 0 0 3px rgba(99,102,241,0.08);
      transform: translateY(-1px);
    }

    /* Sidebar overlay mobile */
    #sidebar-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.5);
      z-index: 40;
    }

    /* Grid helpers */
    .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
    .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .grid-7-3 { display: grid; grid-template-columns: 7fr 3fr; gap: 16px; }
    .grid-6-4 { display: grid; grid-template-columns: 6fr 4fr; gap: 16px; }

    @media (max-width: 1200px) {
      .grid-4 { grid-template-columns: repeat(2, 1fr); }
      .grid-7-3, .grid-6-4 { grid-template-columns: 1fr; }
    }

    @media (max-width: 640px) {
      .grid-4, .grid-3, .grid-2 { grid-template-columns: 1fr; }
      .page-content { padding: 20px 16px; }
      #topbar { padding: 0 16px; }
    }

    /* Mono numbers */
    .num { font-family: 'JetBrains Mono', monospace; }

    /* Gradient accent line */
    .accent-line {
      height: 3px;
      background: linear-gradient(90deg, #6366f1, #8b5cf6, #ec4899);
      border-radius: 99px;
    }

    /* Image preview */
    #img-preview-wrap {
      margin-top: 8px;
      display: none;
    }
    #img-preview-wrap.visible { display: block; }
    #img-preview-el {
      width: 56px; height: 56px;
      border-radius: 8px;
      object-fit: cover;
      border: 1.5px solid var(--border);
    }

    /* Table responsive wrapper */
    .table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }

    /* Collapse sidebar on < 900px */
    @media (max-width: 900px) and (min-width: 769px) {
      #sidebar { width: 68px; }
      #sidebar .sidebar-label,
      #sidebar .sidebar-section-label,
      #sidebar .logo-text { display: none !important; }
      #sidebar .sidebar-logo { justify-content: center; padding: 0 16px; }
      #sidebar .nav-link { justify-content: center; padding: 10px; }
      #sidebar .nav-badge { display: none; }
      #main { margin-left: 68px; }
    }

    /* Dropdown for sort header */
    th.sortable { cursor: pointer; user-select: none; }
    th.sortable:hover { color: #6366f1; }
  </style>
</head>
<body>

<!-- =============================================
     GLOBAL LOADER
============================================= -->
<div id="global-loader">
  <div style="background:var(--bg-card);padding:28px 36px;border-radius:16px;display:flex;flex-direction:column;align-items:center;gap:14px;box-shadow:var(--shadow-lg);">
    <div class="spinner"></div>
    <span style="font-size:14px;font-weight:500;color:var(--text-secondary);">Processing…</span>
  </div>
</div>

<!-- =============================================
     SIDEBAR OVERLAY (mobile)
============================================= -->
<div id="sidebar-overlay" onclick="closeMobileSidebar()"></div>

<!-- =============================================
     DELETE CONFIRM MODAL
============================================= -->
<div id="delete-overlay" class="overlay">
  <div class="modal-box" style="max-width:400px;">
    <div class="modal-header">
      <div style="display:flex;align-items:center;gap:10px;">
        <div style="width:36px;height:36px;background:rgba(239,68,68,0.1);border-radius:9px;display:flex;align-items:center;justify-content:center;color:#ef4444;">
          <i data-lucide="trash-2" style="width:18px;height:18px;"></i>
        </div>
        <span class="modal-title">Delete Product</span>
      </div>
      <button class="icon-btn" onclick="closeDeleteModal()" style="width:32px;height:32px;">
        <i data-lucide="x" style="width:16px;height:16px;"></i>
      </button>
    </div>
    <div class="modal-body">
      <p style="font-size:14px;color:var(--text-secondary);line-height:1.6;">Are you sure you want to delete <strong id="delete-product-name" style="color:var(--text-primary);"></strong>? This action cannot be undone.</p>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary btn-sm" onclick="closeDeleteModal()">Cancel</button>
      <button class="btn btn-danger btn-sm" onclick="confirmDeleteProduct()">
        <i data-lucide="trash-2" style="width:14px;height:14px;"></i> Delete
      </button>
    </div>
  </div>
</div>

<!-- =============================================
     ADD / EDIT PRODUCT MODAL
============================================= -->
<div id="product-overlay" class="overlay">
  <div class="modal-box">
    <div class="modal-header">
      <div style="display:flex;align-items:center;gap:10px;">
        <div id="modal-icon-wrap" style="width:36px;height:36px;background:rgba(99,102,241,0.1);border-radius:9px;display:flex;align-items:center;justify-content:center;color:#6366f1;">
          <i data-lucide="package-plus" style="width:18px;height:18px;" id="modal-icon"></i>
        </div>
        <span class="modal-title" id="modal-title-text">Add Product</span>
      </div>
      <button class="icon-btn" onclick="closeProductModal()" style="width:32px;height:32px;">
        <i data-lucide="x" style="width:16px;height:16px;"></i>
      </button>
    </div>
    <div class="modal-body">
      <form id="product-form" onsubmit="handleProductSubmit(event)" novalidate>
        <!-- Name -->
        <div class="form-group">
          <label class="form-label">Product Name *</label>
          <input type="text" id="f-name" class="form-input" placeholder="e.g. Sony WH-1000XM5" autocomplete="off"/>
          <div class="form-error" id="e-name">Product name is required</div>
        </div>

        <!-- Price + Stock -->
        <div class="grid-2" style="margin-bottom:0;">
          <div class="form-group">
            <label class="form-label">Price ($) *</label>
            <input type="number" id="f-price" class="form-input" placeholder="0.00" min="0" step="0.01"/>
            <div class="form-error" id="e-price">Valid price required</div>
          </div>
          <div class="form-group">
            <label class="form-label">Stock Qty *</label>
            <input type="number" id="f-stock" class="form-input" placeholder="0" min="0"/>
            <div class="form-error" id="e-stock">Stock quantity required</div>
          </div>
        </div>

        <!-- Category -->
        <div class="form-group">
          <label class="form-label">Category *</label>
          <select id="f-category" class="form-select">
            <option value="">Select a category…</option>
            <option value="Electronics">Electronics</option>
            <option value="Clothing">Clothing</option>
            <option value="Home & Living">Home & Living</option>
            <option value="Books">Books</option>
            <option value="Sports">Sports</option>
            <option value="Beauty">Beauty</option>
            <option value="Toys">Toys</option>
            <option value="Food & Drink">Food & Drink</option>
          </select>
          <div class="form-error" id="e-category">Please select a category</div>
        </div>

        <!-- Image URL -->
        <div class="form-group">
          <label class="form-label">Image URL</label>
          <input type="url" id="f-image" class="form-input" placeholder="https://example.com/image.jpg" oninput="previewModalImage(this.value)"/>
          <div id="img-preview-wrap">
            <img id="img-preview-el" src="" alt="preview" onerror="document.getElementById('img-preview-wrap').classList.remove('visible')"/>
          </div>
        </div>

        <!-- Status -->
        <div class="form-group" style="margin-bottom:0;">
          <label class="form-label">Status</label>
          <div style="display:flex;align-items:center;gap:12px;padding:12px 14px;background:var(--bg-base);border-radius:10px;border:1.5px solid var(--border);">
            <label class="toggle">
              <input type="checkbox" id="f-status" checked>
              <div class="toggle-track"><div class="toggle-thumb"></div></div>
            </label>
            <div>
              <div style="font-size:13.5px;font-weight:600;color:var(--text-primary);">In Stock</div>
              <div style="font-size:12px;color:var(--text-muted);">Toggle to mark as out of stock</div>
            </div>
          </div>
        </div>

        <button type="submit" style="display:none;" id="form-submit-btn"></button>
      </form>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary btn-sm" onclick="closeProductModal()">Cancel</button>
      <button class="btn btn-primary btn-sm" onclick="document.getElementById('form-submit-btn').click()">
        <i data-lucide="save" style="width:14px;height:14px;" id="modal-save-icon"></i>
        <span id="modal-save-label">Add Product</span>
      </button>
    </div>
  </div>
</div>

<!-- =============================================
     TOAST CONTAINER
============================================= -->
<div id="toast-container"></div>

<!-- =============================================
     APP ROOT
============================================= -->
<div id="app">

  <!-- =========================================
       SIDEBAR
  ========================================= -->
  <aside id="sidebar">

    <!-- Logo -->
    <div class="sidebar-logo">
      <div class="logo-icon">
        <i data-lucide="layers" style="width:16px;height:16px;color:white;"></i>
      </div>
      <div class="logo-text">
        <div style="font-size:17px;font-weight:800;color:#f0efeb;letter-spacing:-0.3px;">Easy Billing Pro</div>
        <div style="font-size:10px;color:#6b7280;font-weight:500;">Admin v2.0</div>
      </div>
    </div>

    <!-- Nav -->
    <nav class="sidebar-nav">
      <div class="sidebar-section-label">Workspace</div>

      <a class="nav-link active" data-section="dashboard" onclick="navigate('dashboard',this)">
        <i data-lucide="layout-dashboard"></i>
        <span class="sidebar-label">Dashboard</span>
      </a>

      <a class="nav-link" data-section="products" onclick="navigate('products',this)">
        <i data-lucide="package-2"></i>
        <span class="sidebar-label">Products</span>
        <span class="nav-badge" id="sidebar-count">0</span>
      </a>

      <a class="nav-link" data-section="analytics" onclick="navigate('analytics',this)">
        <i data-lucide="trending-up"></i>
        <span class="sidebar-label">Analytics</span>
      </a>

      <a class="nav-link" onclick="showToast('Coming soon!','info')">
        <i data-lucide="shopping-cart"></i>
        <span class="sidebar-label">
          Orders</span>
      </a>

      <a class="nav-link" onclick="showToast('Coming soon!','info')">
        <i data-lucide="users"></i>
        <span class="sidebar-label">Customers</span>
      </a>

      <div class="sidebar-section-label">Manage</div>

      <a class="nav-link" onclick="exportCSV()">
        <i data-lucide="download"></i>
        <span class="sidebar-label">Export CSV</span>
      </a>

      <a class="nav-link" onclick="showToast('Coming soon!','info')">
        <i data-lucide="settings"></i>
        <span class="sidebar-label">Settings</span>
      </a>

      <a class="nav-link" onclick="showToast('Coming soon!','info')">
        <i data-lucide="help-circle"></i>
        <span class="sidebar-label">Help</span>
      </a>
    </nav>

    <!-- Footer -->
    <div class="sidebar-footer">
      <!-- Theme toggle row -->
      <div style="display:flex;align-items:center;justify-content:space-between;padding:0 4px 10px;margin-bottom:8px;border-bottom:1px solid rgba(255,255,255,0.06);">
        <span style="font-size:12px;color:#6b7280;font-weight:500;" class="sidebar-label">Dark Mode</span>
        <label class="toggle">
          <input type="checkbox" id="theme-toggle" onchange="toggleTheme(this.checked)">
          <div class="toggle-track" style="background:rgba(255,255,255,0.1);">
            <div class="toggle-thumb"></div>
          </div>
        </label>
      </div>
      <!-- User -->
      <div class="user-card">
        <img src="https://api.dicebear.com/8.x/lorelei/svg?seed=prism&backgroundColor=b6e3f4" style="width:34px;height:34px;border-radius:9px;background:#1a1a2e;border:1px solid rgba(255,255,255,0.1);" alt="user"/>
        <div class="sidebar-label" style="flex:1;min-width:0;">
          <div style="font-size:13px;font-weight:600;color:#e5e7eb;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Alex Carter</div>
          <div style="font-size:11px;color:#6b7280;">Super Admin</div>
        </div>
        <i data-lucide="log-out" style="width:15px;height:15px;color:#6b7280;flex-shrink:0;" class="sidebar-label"></i>
      </div>
    </div>
  </aside>

  <!-- =========================================
       MAIN
  ========================================= -->
  <div id="main">

    <!-- TOPBAR -->
    <header id="topbar">
      <!-- Menu toggle (desktop collapse + mobile open) -->
      <button class="icon-btn" id="sidebar-toggle-btn" onclick="toggleSidebar()">
        <i data-lucide="menu" style="width:18px;height:18px;"></i>
      </button>

      <!-- Search -->
      <div class="search-wrap">
        <i data-lucide="search" class="search-icon" style="width:15px;height:15px;"></i>
        <input type="text" id="global-search" placeholder="Search products…" oninput="onGlobalSearch(this.value)"/>
      </div>

      <div style="display:flex;align-items:center;gap:8px;margin-left:auto;">
        <!-- Add product quick btn (desktop) -->
        <button class="btn btn-primary btn-sm" onclick="openAddModal()" style="display:none;" id="topbar-add-btn">
          <i data-lucide="plus" style="width:14px;height:14px;"></i>
          <span>Add Product</span>
        </button>

        <!-- Notifications -->
        <button class="icon-btn" onclick="showToast('No new notifications','info')">
          <i data-lucide="bell" style="width:17px;height:17px;"></i>
          <span class="notif-dot"></span>
        </button>

        <!-- Avatar -->
        <img src="https://api.dicebear.com/8.x/lorelei/svg?seed=prism&backgroundColor=b6e3f4" style="width:36px;height:36px;border-radius:9px;cursor:pointer;border:2px solid #6366f1;background:#1a1a2e;" alt="user" onclick="showToast('Profile coming soon!','info')"/>
      </div>
    </header>

    <!-- =========================================
         SECTION: DASHBOARD
    ========================================= -->
    <div id="section-dashboard" class="section active page-content">

      <!-- Page header -->
      <div class="page-header">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
          <div>
            <h1 class="page-title">
              <i data-lucide="layout-dashboard" style="width:22px;height:22px;color:#6366f1;"></i>
              Dashboard
            </h1>
            <p class="page-subtitle" id="dash-subtitle">Welcome back, Alex · Monday, 9 Jun 2025</p>
          </div>
          <div style="display:flex;gap:10px;">
            <button class="btn btn-secondary btn-sm" onclick="navigate('analytics',document.querySelector('[data-section=analytics]'))">
              <i data-lucide="bar-chart-2" style="width:14px;height:14px;"></i>
              Reports
            </button>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()">
              <i data-lucide="plus" style="width:14px;height:14px;"></i>
              Add Product
            </button>
          </div>
        </div>
        <div class="accent-line" style="margin-top:16px;width:60px;"></div>
      </div>

      <!-- STAT CARDS -->
      <div class="grid-4" id="stat-cards" style="margin-bottom:20px;"></div>

      <!-- Charts row -->
      <div class="grid-7-3" style="margin-bottom:20px;" id="charts-row">
        <!-- Sales Chart -->
        <div class="card chart-card">
          <div style="display:flex;align-items:flex-start;justify-content:space-between;">
            <div>
              <div class="chart-card-title">Monthly Revenue</div>
              <div class="chart-card-sub">Sales performance over the last 12 months</div>
            </div>
            <div style="display:flex;gap:14px;align-items:center;">
              <div style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--text-muted);">
                <span style="width:10px;height:10px;border-radius:3px;background:#6366f1;display:inline-block;"></span> Revenue
              </div>
              <div style="display:flex;align-items:center;gap:5px;font-size:12px;color:var(--text-muted);">
                <span style="width:10px;height:10px;border-radius:3px;background:#f59e0b;display:inline-block;"></span> Orders
              </div>
            </div>
          </div>
          <div class="chart-wrap" style="height:240px;">
            <canvas id="sales-chart"></canvas>
          </div>
        </div>
        <!-- Category donut -->
        <div class="card chart-card">
          <div class="chart-card-title">By Category</div>
          <div class="chart-card-sub">Product distribution</div>
          <div class="chart-wrap" style="height:175px;">
            <canvas id="cat-chart"></canvas>
          </div>
          <div id="cat-legend" style="margin-top:14px;display:flex;flex-direction:column;gap:6px;"></div>
        </div>
      </div>

      <!-- Bottom row: Recent + Quick Actions -->
      <div class="grid-6-4">
        <!-- Recent products -->
        <div class="card">
          <div style="padding:20px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;">
            <div>
              <div style="font-size:15px;font-weight:600;color:var(--text-primary);">Recently Added</div>
              <div style="font-size:12px;color:var(--text-muted);">Latest product additions</div>
            </div>
            <button class="btn btn-secondary btn-sm" onclick="navigate('products',document.querySelector('[data-section=products]'))">View All</button>
          </div>
          <div id="recent-list" style="padding:8px 0;"></div>
        </div>
        <!-- Activity + Quick Actions -->
        <div style="display:flex;flex-direction:column;gap:16px;">
          <!-- Quick Actions -->
          <div class="card" style="padding:20px;">
            <div style="font-size:15px;font-weight:600;color:var(--text-primary);margin-bottom:4px;">Quick Actions</div>
            <div style="font-size:12px;color:var(--text-muted);margin-bottom:14px;">Common tasks at a glance</div>
            <div style="display:flex;flex-direction:column;gap:8px;" id="quick-actions"></div>
          </div>
          <!-- Activity Log -->
          <div class="card" style="padding:20px;">
            <div style="font-size:15px;font-weight:600;color:var(--text-primary);margin-bottom:14px;">Activity Log</div>
            <div id="activity-log" style="max-height:200px;overflow-y:auto;"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- =========================================
         SECTION: PRODUCTS
    ========================================= -->
    <div id="section-products" class="section page-content">
      <div class="page-header">
        <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;">
          <div>
            <h1 class="page-title">
              <i data-lucide="package-2" style="width:22px;height:22px;color:#6366f1;"></i>
              Products
            </h1>
            <p class="page-subtitle">Manage your product catalogue</p>
          </div>
          <button class="btn btn-primary btn-sm" onclick="openAddModal()">
            <i data-lucide="plus" style="width:14px;height:14px;"></i>
            Add Product
          </button>
        </div>
        <div class="accent-line" style="margin-top:16px;width:60px;"></div>
      </div>

      <div class="card">
        <!-- Filter Bar -->
        <div class="filter-bar">
          <div style="position:relative;flex:1;min-width:200px;">
            <i data-lucide="search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);width:14px;height:14px;color:var(--text-muted);pointer-events:none;"></i>
            <input class="filter-input" id="p-search" type="text" placeholder="Search products…" style="padding-left:32px;width:100%;" oninput="applyFilters()"/>
          </div>
          <select class="filter-select" id="p-cat" onchange="applyFilters()">
            <option value="">All Categories</option>
            <option value="Electronics">Electronics</option>
            <option value="Clothing">Clothing</option>
            <option value="Home & Living">Home & Living</option>
            <option value="Books">Books</option>
            <option value="Sports">Sports</option>
            <option value="Beauty">Beauty</option>
            <option value="Toys">Toys</option>
            <option value="Food & Drink">Food & Drink</option>
          </select>
          <select class="filter-select" id="p-sort" onchange="applyFilters()">
            <option value="">Sort By</option>
            <option value="name-asc">Name A → Z</option>
            <option value="name-desc">Name Z → A</option>
            <option value="price-asc">Price: Low → High</option>
            <option value="price-desc">Price: High → Low</option>
            <option value="stock-asc">Stock: Low → High</option>
            <option value="stock-desc">Stock: High → Low</option>
            <option value="newest">Newest First</option>
          </select>
          <select class="filter-select" id="p-status" onchange="applyFilters()">
            <option value="">All Status</option>
            <option value="active">In Stock</option>
            <option value="inactive">Out of Stock</option>
          </select>
          <button class="btn btn-secondary btn-sm" onclick="resetFilters()" title="Clear filters">
            <i data-lucide="x" style="width:14px;height:14px;"></i>
          </button>
        </div>

        <!-- Results summary -->
        <div style="padding:10px 20px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border);">
          <span style="font-size:13px;color:var(--text-muted);" id="results-summary">0 products</span>
          <div style="display:flex;align-items:center;gap:8px;">
            <span style="font-size:12px;color:var(--text-muted);">Per page:</span>
            <select class="filter-select" id="per-page-sel" style="padding:4px 8px;font-size:12px;" onchange="changePerPage()">
              <option value="5">5</option>
              <option value="10" selected>10</option>
              <option value="20">20</option>
              <option value="50">50</option>
            </select>
          </div>
        </div>

        <!-- Table -->
        <div class="table-wrap">
          <table class="data-table" id="product-table">
            <thead>
              <tr>
                <th>Product</th>
                <th class="sortable" onclick="sortByCol('category')">Category ⇅</th>
                <th class="sortable" onclick="sortByCol('price')">Price ⇅</th>
                <th class="sortable" onclick="sortByCol('stock')">Stock ⇅</th>
                <th>Status</th>
                <th style="text-align:center;">Actions</th>
              </tr>
            </thead>
            <tbody id="product-tbody"></tbody>
          </table>
          <div id="empty-state-products" class="empty-state" style="display:none;">
            <div class="empty-icon">
              <i data-lucide="package-x" style="width:28px;height:28px;"></i>
            </div>
            <div style="font-size:16px;font-weight:600;color:var(--text-primary);margin-bottom:6px;">No products found</div>
            <p style="font-size:13px;color:var(--text-muted);margin-bottom:18px;">Try adjusting your filters or add a new product.</p>
            <button class="btn btn-primary btn-sm" onclick="openAddModal()">
              <i data-lucide="plus" style="width:14px;height:14px;"></i> Add Product
            </button>
          </div>
        </div>

        <!-- Pagination -->
        <div style="padding:14px 20px;border-top:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;">
          <span style="font-size:13px;color:var(--text-muted);" id="pagination-info">Page 1 of 1</span>
          <div style="display:flex;gap:5px;" id="pagination-controls"></div>
        </div>
      </div>
    </div>

    <!-- =========================================
         SECTION: ANALYTICS
    ========================================= -->
    <div id="section-analytics" class="section page-content">
      <div class="page-header">
        <div>
          <h1 class="page-title">
            <i data-lucide="trending-up" style="width:22px;height:22px;color:#6366f1;"></i>
            Analytics
          </h1>
          <p class="page-subtitle">Detailed performance insights</p>
        </div>
        <div class="accent-line" style="margin-top:16px;width:60px;"></div>
      </div>
      <div class="grid-2" style="margin-bottom:20px;">
        <div class="card chart-card">
          <div class="chart-card-title">Revenue vs Orders</div>
          <div class="chart-card-sub">Monthly comparison</div>
          <div class="chart-wrap" style="height:260px;"><canvas id="analytics-chart-1"></canvas></div>
        </div>
        <div class="card chart-card">
          <div class="chart-card-title">Category Breakdown</div>
          <div class="chart-card-sub">Stock by category</div>
          <div class="chart-wrap" style="height:260px;"><canvas id="analytics-chart-2"></canvas></div>
        </div>
      </div>
      <div class="card" style="padding:22px;">
        <div style="font-size:15px;font-weight:600;color:var(--text-primary);margin-bottom:16px;">Stock Health by Category</div>
        <div id="stock-health-bars"></div>
      </div>
    </div>

  </div><!-- /main -->
</div><!-- /app -->


<!-- =============================================
     JAVASCRIPT
============================================= -->
<script>
/* =============================================
   SEED / DEFAULT PRODUCTS
============================================= */
const SEED_PRODUCTS = [
  {id:1,  name:"Sony WH-1000XM5",             price:349.99, category:"Electronics",  stock:28,  status:"active",   image:"https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*10},
  {id:2,  name:"Nike Air Max 270",             price:134.99, category:"Clothing",     stock:4,   status:"active",   image:"https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*9},
  {id:3,  name:"Samsung 27\" 4K Monitor",     price:649.00, category:"Electronics",  stock:11,  status:"active",   image:"https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*8},
  {id:4,  name:"Linen Throw Blanket",         price:48.00,  category:"Home & Living",stock:62,  status:"active",   image:"https://images.unsplash.com/photo-1580301762395-21ce84d00bc6?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*7},
  {id:5,  name:"Clean Code – Robert Martin",  price:39.99,  category:"Books",        stock:90,  status:"active",   image:"https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*6},
  {id:6,  name:"Yoga Mat 6mm",                price:55.00,  category:"Sports",       stock:3,   status:"active",   image:"https://images.unsplash.com/photo-1601925260368-ae2f83cf8b7f?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*5},
  {id:7,  name:"Vitamin C Serum 30ml",        price:29.99,  category:"Beauty",       stock:0,   status:"inactive", image:"https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*4},
  {id:8,  name:"LEGO Architecture Set",       price:119.99, category:"Toys",         stock:17,  status:"active",   image:"https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*3},
  {id:9,  name:"Mechanical Keyboard TKL",     price:189.00, category:"Electronics",  stock:2,   status:"active",   image:"https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*2},
  {id:10, name:"French Press 1L",             price:34.00,  category:"Home & Living",stock:44,  status:"active",   image:"https://images.unsplash.com/photo-1570968915860-54d5c301fa9f?w=80&h=80&fit=crop", createdAt: Date.now()-864e5*1},
  {id:11, name:"Running Shorts Pro",          price:44.99,  category:"Sports",       stock:38,  status:"active",   image:"https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=80&h=80&fit=crop", createdAt: Date.now()-3600e3*6},
  {id:12, name:"Matcha Green Tea 100g",       price:19.50,  category:"Food & Drink", stock:75,  status:"active",   image:"https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=80&h=80&fit=crop", createdAt: Date.now()-3600e3*2},
];

/* =============================================
   STATE
============================================= */
let products       = [];
let filteredList   = [];
let currentPage    = 1;
let perPage        = 10;
let deleteId       = null;
let editId         = null;
let activityLog    = [];
let salesChartInst = null, catChartInst = null, a1Inst = null, a2Inst = null;
let colSort        = null; // current sort column from header click
let colSortDir     = 1;

/* =============================================
   INIT
============================================= */
document.addEventListener('DOMContentLoaded', () => {
  loadFromStorage();
  applyThemeFromStorage();
  setSubtitle();
  buildDashboard();
  renderProductTable();
  updateSidebarBadge();
  // Show add btn on desktop
  if (window.innerWidth >= 900) {
    document.getElementById('topbar-add-btn').style.display = 'flex';
  }
  lucide.createIcons();
});

/* =============================================
   STORAGE
============================================= */
function loadFromStorage() {
  const saved = localStorage.getItem('prism_products');
  products = saved ? JSON.parse(saved) : JSON.parse(JSON.stringify(SEED_PRODUCTS));
  const savedLog = localStorage.getItem('prism_log');
  activityLog = savedLog ? JSON.parse(savedLog) : [];
}

function save() {
  localStorage.setItem('prism_products', JSON.stringify(products));
}

function saveLog() {
  localStorage.setItem('prism_log', JSON.stringify(activityLog.slice(0, 60)));
}

function addLog(msg, color) {
  activityLog.unshift({ msg, color, time: Date.now() });
  saveLog();
}

/* =============================================
   THEME
============================================= */
function applyThemeFromStorage() {
  const dark = localStorage.getItem('prism_dark') === '1';
  document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
  document.getElementById('theme-toggle').checked = dark;
}

function toggleTheme(isDark) {
  document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
  localStorage.setItem('prism_dark', isDark ? '1' : '0');
  // Rebuild charts to update colors
  setTimeout(() => { destroyCharts(); buildCharts(); }, 80);
}

/* =============================================
   SIDEBAR / NAVIGATION
============================================= */
let sidebarOpen = true;

function toggleSidebar() {
  const sb = document.getElementById('sidebar');
  const main = document.getElementById('main');
  if (window.innerWidth <= 768) {
    // Mobile: slide in
    openMobileSidebar();
  } else {
    // Desktop: collapse
    sidebarOpen = !sidebarOpen;
    sb.classList.toggle('collapsed', !sidebarOpen);
    main.classList.toggle('expanded', !sidebarOpen);
  }
}

function openMobileSidebar() {
  document.getElementById('sidebar').classList.add('mobile-open');
  document.getElementById('sidebar-overlay').style.display = 'block';
}

function closeMobileSidebar() {
  document.getElementById('sidebar').classList.remove('mobile-open');
  document.getElementById('sidebar-overlay').style.display = 'none';
}

function navigate(sectionId, el) {
  // Update active nav
  document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
  if (el) el.classList.add('active');
  // Show section
  document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
  document.getElementById('section-' + sectionId).classList.add('active');
  // Side effects
  if (sectionId === 'products') { applyFilters(); }
  if (sectionId === 'analytics') { setTimeout(() => buildAnalytics(), 60); }
  if (sectionId === 'dashboard') { buildDashboard(); }
  closeMobileSidebar();
  lucide.createIcons();
}

/* =============================================
   SUBTITLE DATE
============================================= */
function setSubtitle() {
  const now = new Date();
  const days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
  const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const str = `Welcome back, Alex · ${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
  const el = document.getElementById('dash-subtitle');
  if (el) el.textContent = str;
}

/* =============================================
   GLOBAL SEARCH
============================================= */
function onGlobalSearch(val) {
  if (val.trim()) {
    navigate('products', document.querySelector('[data-section="products"]'));
    document.getElementById('p-search').value = val;
    applyFilters();
  }
}

/* =============================================
   DASHBOARD BUILD
============================================= */
function buildDashboard() {
  buildStatCards();
  buildRecentList();
  buildActivityLog();
  buildQuickActions();
  setTimeout(() => buildCharts(), 80);
}

function buildStatCards() {
  const total    = products.length;
  const revenue  = 72400 + total * 1450;
  const lowStock = products.filter(p => p.stock > 0 && p.stock <= 5).length;
  const outStock = products.filter(p => p.stock === 0).length;

  const cards = [
    {
      label: "Total Products", value: total.toLocaleString(), cls: "indigo",
      icon: "package-2", iconBg: "rgba(99,102,241,0.1)", iconColor: "#6366f1",
      badge: "+12%", badgeCls: "badge-up"
    },
    {
      label: "Total Revenue", value: "$" + revenue.toLocaleString(), cls: "amber",
      icon: "dollar-sign", iconBg: "rgba(245,158,11,0.1)", iconColor: "#f59e0b",
      badge: "+8.3%", badgeCls: "badge-up"
    },
    {
      label: "Total Orders", value: "1,284", cls: "emerald",
      icon: "shopping-bag", iconBg: "rgba(16,185,129,0.1)", iconColor: "#10b981",
      badge: "-2.1%", badgeCls: "badge-down"
    },
    {
      label: "Low Stock Items", value: (lowStock + outStock).toString(), cls: "rose",
      icon: "alert-triangle", iconBg: "rgba(244,63,94,0.1)", iconColor: "#f43f5e",
      badge: "Alert", badgeCls: "badge-warn"
    },
  ];

  const wrap = document.getElementById('stat-cards');
  if (!wrap) return;
  wrap.innerHTML = cards.map(c => `
    <div class="card stat-card ${c.cls}">
      <div class="stat-icon" style="background:${c.iconBg};">
        <i data-lucide="${c.icon}" style="width:18px;height:18px;color:${c.iconColor};"></i>
      </div>
      <div class="stat-value num">${c.value}</div>
      <div class="stat-label">${c.label}</div>
      <div class="stat-badge ${c.badgeCls}">${c.badge}</div>
    </div>
  `).join('');
  lucide.createIcons();
}

/* =============================================
   RECENT LIST
============================================= */
function buildRecentList() {
  const wrap = document.getElementById('recent-list');
  if (!wrap) return;
  const recent = [...products].sort((a,b) => b.createdAt - a.createdAt).slice(0, 6);
  if (!recent.length) {
    wrap.innerHTML = '<div style="padding:24px;text-align:center;color:var(--text-muted);font-size:13px;">No products yet</div>';
    return;
  }
  wrap.innerHTML = recent.map(p => `
    <div style="display:flex;align-items:center;gap:12px;padding:11px 20px;border-bottom:1px solid var(--border);cursor:pointer;transition:background 0.12s;"
         onmouseenter="this.style.background='rgba(99,102,241,0.03)'" onmouseleave="this.style.background=''"
         onclick="navigate('products',document.querySelector('[data-section=products]'))">
      <img src="${p.image}" class="product-img" alt="${esc(p.name)}"
        onerror="this.src='https://placehold.co/40x40/e5e4df/9ca3af?text=${encodeURIComponent(p.name[0])}'"/>
      <div style="flex:1;min-width:0;">
        <div style="font-size:13.5px;font-weight:600;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${esc(p.name)}</div>
        <div style="font-size:12px;color:var(--text-muted);">${p.category}</div>
      </div>
      <div style="text-align:right;">
        <div style="font-size:13.5px;font-weight:700;color:var(--text-primary);font-family:'JetBrains Mono',monospace;">$${p.price.toFixed(2)}</div>
        <div style="font-size:11px;${p.status==='active'?'color:#10b981;':'color:#ef4444;'}">${p.status==='active'?'● In Stock':'● Out of Stock'}</div>
      </div>
    </div>
  `).join('');
}

/* =============================================
   ACTIVITY LOG
============================================= */
function buildActivityLog() {
  const wrap = document.getElementById('activity-log');
  if (!wrap) return;
  if (!activityLog.length) {
    wrap.innerHTML = '<div style="font-size:12px;color:var(--text-muted);text-align:center;padding:12px 0;">No activity yet</div>';
    return;
  }
  wrap.innerHTML = activityLog.slice(0, 8).map(l => `
    <div class="activity-item">
      <div class="activity-dot" style="background:${l.color || '#6366f1'};"></div>
      <div style="flex:1;min-width:0;">
        <div style="font-size:12.5px;color:var(--text-primary);font-weight:500;">${l.msg}</div>
        <div style="font-size:11px;color:var(--text-muted);margin-top:2px;">${timeAgo(l.time)}</div>
      </div>
    </div>
  `).join('');
}

/* =============================================
   QUICK ACTIONS
============================================= */
function buildQuickActions() {
  const wrap = document.getElementById('quick-actions');
  if (!wrap) return;
  const actions = [
    { icon: 'plus-circle', label: 'Add New Product',    color: '#6366f1', fn: 'openAddModal()' },
    { icon: 'package-2',   label: 'Manage Products',    color: '#10b981', fn: "navigate('products',document.querySelector('[data-section=products]'))" },
    { icon: 'bar-chart-2', label: 'View Analytics',     color: '#f59e0b', fn: "navigate('analytics',document.querySelector('[data-section=analytics]'))" },
    { icon: 'download',    label: 'Export CSV',          color: '#f43f5e', fn: 'exportCSV()' },
  ];
  wrap.innerHTML = actions.map(a => `
    <div class="quick-action-card" onclick="${a.fn}">
      <div style="width:32px;height:32px;border-radius:8px;background:${a.color}18;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <i data-lucide="${a.icon}" style="width:15px;height:15px;color:${a.color};"></i>
      </div>
      <span style="font-size:13.5px;font-weight:600;color:var(--text-primary);">${a.label}</span>
      <i data-lucide="arrow-right" style="width:13px;height:13px;color:var(--text-muted);margin-left:auto;"></i>
    </div>
  `).join('');
  lucide.createIcons();
}

/* =============================================
   CHARTS
============================================= */
const PALETTE = ['#6366f1','#f59e0b','#10b981','#f43f5e','#0ea5e9','#8b5cf6','#ec4899','#14b8a6'];
const MONTHS  = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

function isDark() { return document.documentElement.getAttribute('data-theme') === 'dark'; }
function chartText()  { return isDark() ? '#9ca3af' : '#6b7280'; }
function chartGrid()  { return isDark() ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.06)'; }

function destroyCharts() {
  [salesChartInst, catChartInst, a1Inst, a2Inst].forEach(c => c && c.destroy());
  salesChartInst = catChartInst = a1Inst = a2Inst = null;
}

function buildCharts() {
  buildSalesChart();
  buildCatChart();
}

function buildSalesChart() {
  const el = document.getElementById('sales-chart');
  if (!el) return;
  if (salesChartInst) salesChartInst.destroy();
  const revenue = [21.2,25.8,19.6,31.4,34.0,28.5,38.2,41.7,37.1,44.8,42.3,51.6];
  const orders  = [148,181,162,241,261,213,294,318,280,332,311,358];
  salesChartInst = new Chart(el, {
    type: 'line',
    data: {
      labels: MONTHS,
      datasets: [
        {
          label: 'Revenue ($k)',
          data: revenue,
          borderColor: '#6366f1',
          backgroundColor: 'rgba(99,102,241,0.08)',
          fill: true,
          tension: 0.42,
          pointRadius: 4,
          pointBackgroundColor: '#6366f1',
          yAxisID: 'yRev',
        },
        {
          label: 'Orders',
          data: orders,
          borderColor: '#f59e0b',
          backgroundColor: 'transparent',
          tension: 0.42,
          borderDash: [6,3],
          pointRadius: 4,
          pointBackgroundColor: '#f59e0b',
          yAxisID: 'yOrd',
        }
      ]
    },
    options: {
      responsive: true, maintainAspectRatio: false,
      plugins: { legend: { display: false } },
      scales: {
        x:    { grid: { color: chartGrid() }, ticks: { color: chartText(), font: { size: 11 } } },
        yRev: { grid: { color: chartGrid() }, ticks: { color: chartText(), font: { size: 11 }, callback: v => '$'+v+'k' } },
        yOrd: { position: 'right', grid: { display: false }, ticks: { color: chartText(), font: { size: 11 } } },
      }
    }
  });
}

function buildCatChart() {
  const el = document.getElementById('cat-chart');
  if (!el) return;
  if (catChartInst) catChartInst.destroy();
  const stats = getCatStats();
  catChartInst = new Chart(el, {
    type: 'doughnut',
    data: {
      labels: stats.labels,
      datasets: [{ data: stats.data, backgroundColor: PALETTE, borderWidth: 0, hoverOffset: 8 }]
    },
    options: {
      responsive: true, maintainAspectRatio: false, cutout: '68%',
      plugins: {
        legend: { display: false },
        tooltip: { callbacks: { label: c => ` ${c.label}: ${c.raw}` } }
      }
    }
  });

  // Legend
  const leg = document.getElementById('cat-legend');
  if (leg) {
    leg.innerHTML = stats.labels.map((l, i) => `
      <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
        <div style="display:flex;align-items:center;gap:7px;">
          <span style="width:9px;height:9px;border-radius:3px;background:${PALETTE[i%PALETTE.length]};flex-shrink:0;display:inline-block;"></span>
          <span style="font-size:12px;color:var(--text-secondary);">${l}</span>
        </div>
        <span style="font-size:12px;font-weight:600;color:var(--text-primary);font-family:'JetBrains Mono',monospace;">${stats.data[i]}</span>
      </div>
    `).join('');
  }
}

function getCatStats() {
  const m = {};
  products.forEach(p => { m[p.category] = (m[p.category]||0) + 1; });
  const sorted = Object.entries(m).sort((a,b) => b[1]-a[1]);
  return { labels: sorted.map(x=>x[0]), data: sorted.map(x=>x[1]) };
}

/* =============================================
   ANALYTICS
============================================= */
function buildAnalytics() {
  // Chart 1 — Grouped bar
  const el1 = document.getElementById('analytics-chart-1');
  if (el1) {
    if (a1Inst) a1Inst.destroy();
    a1Inst = new Chart(el1, {
      type: 'bar',
      data: {
        labels: MONTHS,
        datasets: [
          { label: 'Revenue ($k)', data: [21.2,25.8,19.6,31.4,34,28.5,38.2,41.7,37.1,44.8,42.3,51.6], backgroundColor: 'rgba(99,102,241,0.7)', borderRadius: 5 },
          { label: 'Orders ×100',  data: [1.48,1.81,1.62,2.41,2.61,2.13,2.94,3.18,2.8,3.32,3.11,3.58], backgroundColor: 'rgba(245,158,11,0.7)', borderRadius: 5 },
        ]
      },
      options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: chartText(), font: { size: 11 } } } },
        scales: {
          x: { grid: { color: chartGrid() }, ticks: { color: chartText(), font: { size: 11 } } },
          y: { grid: { color: chartGrid() }, ticks: { color: chartText(), font: { size: 11 } } }
        }
      }
    });
  }

  // Chart 2 — Horizontal bar (stock by category)
  const el2 = document.getElementById('analytics-chart-2');
  if (el2) {
    if (a2Inst) a2Inst.destroy();
    const stats = getCatStats();
    const stockByCat = {};
    products.forEach(p => { stockByCat[p.category] = (stockByCat[p.category]||0) + p.stock; });
    a2Inst = new Chart(el2, {
      type: 'bar',
      data: {
        labels: stats.labels,
        datasets: [{
          label: 'Total Stock',
          data: stats.labels.map(l => stockByCat[l]||0),
          backgroundColor: PALETTE,
          borderRadius: 5,
        }]
      },
      options: {
        indexAxis: 'y',
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color: chartGrid() }, ticks: { color: chartText(), font: { size: 11 } } },
          y: { grid: { display: false }, ticks: { color: chartText(), font: { size: 11 } } }
        }
      }
    });
  }

  // Stock health bars
  const wrap = document.getElementById('stock-health-bars');
  if (wrap) {
    const cats = getCatStats();
    const maxStock = Math.max(...cats.labels.map(l => {
      return products.filter(p=>p.category===l).reduce((s,p)=>s+p.stock,0);
    }),1);
    wrap.innerHTML = cats.labels.map((cat,i) => {
      const totalStock = products.filter(p=>p.category===cat).reduce((s,p)=>s+p.stock,0);
      const pct = Math.round((totalStock/maxStock)*100);
      return `
        <div style="margin-bottom:14px;">
          <div style="display:flex;justify-content:space-between;margin-bottom:5px;">
            <span style="font-size:13px;font-weight:600;color:var(--text-primary);">${cat}</span>
            <span style="font-size:12px;color:var(--text-muted);font-family:'JetBrains Mono',monospace;">${totalStock} units</span>
          </div>
          <div style="height:8px;background:var(--bg-base);border-radius:99px;overflow:hidden;">
            <div style="height:100%;width:${pct}%;background:${PALETTE[i%PALETTE.length]};border-radius:99px;transition:width 0.6s ease;"></div>
          </div>
        </div>
      `;
    }).join('');
  }
  lucide.createIcons();
}

/* =============================================
   PRODUCT TABLE
============================================= */
function applyFilters() {
  const q      = (document.getElementById('p-search')?.value || '').trim().toLowerCase();
  const cat    = document.getElementById('p-cat')?.value    || '';
  const status = document.getElementById('p-status')?.value || '';
  const sort   = document.getElementById('p-sort')?.value   || '';

  filteredList = products.filter(p => {
    const mq  = !q || p.name.toLowerCase().includes(q) || p.category.toLowerCase().includes(q);
    const mc  = !cat    || p.category === cat;
    const ms  = !status || p.status === status;
    return mq && mc && ms;
  });

  // Sort
  if (colSort) {
    filteredList.sort((a,b) => {
      const av = a[colSort], bv = b[colSort];
      return typeof av === 'string' ? av.localeCompare(bv)*colSortDir : (av-bv)*colSortDir;
    });
  } else {
    if (sort === 'name-asc')   filteredList.sort((a,b) => a.name.localeCompare(b.name));
    if (sort === 'name-desc')  filteredList.sort((a,b) => b.name.localeCompare(a.name));
    if (sort === 'price-asc')  filteredList.sort((a,b) => a.price - b.price);
    if (sort === 'price-desc') filteredList.sort((a,b) => b.price - a.price);
    if (sort === 'stock-asc')  filteredList.sort((a,b) => a.stock - b.stock);
    if (sort === 'stock-desc') filteredList.sort((a,b) => b.stock - a.stock);
    if (sort === 'newest')     filteredList.sort((a,b) => b.createdAt - a.createdAt);
  }

  currentPage = 1;
  renderProductTable();
}

function sortByCol(col) {
  if (colSort === col) { colSortDir *= -1; }
  else { colSort = col; colSortDir = 1; }
  applyFilters();
}

function resetFilters() {
  colSort = null; colSortDir = 1;
  ['p-search','p-cat','p-sort','p-status'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.value = '';
  });
  applyFilters();
}

function changePerPage() {
  perPage = parseInt(document.getElementById('per-page-sel').value);
  currentPage = 1;
  renderProductTable();
}

function renderProductTable() {
  if (!filteredList.length && !products.length) {
    filteredList = [...products];
  }
  // If filteredList not initialized for this render, do default
  const tbody    = document.getElementById('product-tbody');
  const emptyEl  = document.getElementById('empty-state-products');
  const summary  = document.getElementById('results-summary');
  if (!tbody) return;

  if (!filteredList.length) {
    tbody.innerHTML = '';
    if (emptyEl) emptyEl.style.display = 'flex';
    if (summary) summary.textContent = '0 products';
    renderPagination(0);
    return;
  }

  if (emptyEl) emptyEl.style.display = 'none';
  if (summary) summary.textContent = `${filteredList.length} product${filteredList.length !== 1 ? 's' : ''}`;

  const start   = (currentPage - 1) * perPage;
  const pageItems = filteredList.slice(start, start + perPage);

  const CAT_CHIPS = {
    'Electronics':'chip-indigo','Clothing':'chip-amber','Home & Living':'chip-sky',
    'Books':'chip-violet','Sports':'chip-emerald','Beauty':'chip-rose',
    'Toys':'chip-sky','Food & Drink':'chip-emerald'
  };

  tbody.innerHTML = pageItems.map(p => `
    <tr>
      <td>
        <div style="display:flex;align-items:center;gap:10px;">
          <img src="${p.image}" class="product-img" alt="${esc(p.name)}"
            onerror="this.src='https://placehold.co/40x40/e5e4df/9ca3af?text=${encodeURIComponent(p.name[0])}'"/>
          <div>
            <div style="font-size:13.5px;font-weight:600;color:var(--text-primary);max-width:180px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${esc(p.name)}</div>
            <div style="font-size:11px;color:var(--text-muted);font-family:'JetBrains Mono',monospace;">#${String(p.id).padStart(4,'0')}</div>
          </div>
        </div>
      </td>
      <td><span class="chip ${CAT_CHIPS[p.category]||'chip-gray'}">${p.category}</span></td>
      <td><span style="font-family:'JetBrains Mono',monospace;font-size:14px;font-weight:600;">$${p.price.toFixed(2)}</span></td>
      <td>
        <span style="font-family:'JetBrains Mono',monospace;font-size:14px;font-weight:600;${
          p.stock === 0 ? 'color:#ef4444;' : p.stock <= 5 ? 'color:#f59e0b;' : 'color:var(--text-primary);'
        }">${p.stock}</span>
        ${p.stock > 0 && p.stock <= 5 ? '<span class="chip chip-amber" style="font-size:10px;padding:1px 6px;margin-left:4px;">Low</span>' : ''}
        ${p.stock === 0 ? '<span class="chip chip-rose" style="font-size:10px;padding:1px 6px;margin-left:4px;">None</span>' : ''}
      </td>
      <td>
        <label class="toggle" title="Toggle stock status">
          <input type="checkbox" ${p.status==='active'?'checked':''} onchange="toggleStatus(${p.id}, this.checked)">
          <div class="toggle-track"><div class="toggle-thumb"></div></div>
        </label>
      </td>
      <td>
        <div style="display:flex;align-items:center;justify-content:center;gap:4px;">
          <button class="action-btn edit" onclick="openEditModal(${p.id})" title="Edit">
            <i data-lucide="pencil" style="width:15px;height:15px;"></i>
          </button>
          <button class="action-btn del" onclick="openDeleteModal(${p.id})" title="Delete">
            <i data-lucide="trash-2" style="width:15px;height:15px;"></i>
          </button>
        </div>
      </td>
    </tr>
  `).join('');

  renderPagination(filteredList.length);
  updateSidebarBadge();
  lucide.createIcons();
}

/* =============================================
   PAGINATION
============================================= */
function renderPagination(total) {
  const totalPages = Math.max(1, Math.ceil(total / perPage));
  const info    = document.getElementById('pagination-info');
  const ctrlEl  = document.getElementById('pagination-controls');
  if (info) info.textContent = `Page ${currentPage} of ${totalPages}`;
  if (!ctrlEl) return;

  let html = `<button class="page-btn" onclick="goPage(${currentPage-1})" ${currentPage===1?'disabled':''}>‹</button>`;
  for (let i = 1; i <= totalPages; i++) {
    if (totalPages > 7 && Math.abs(i - currentPage) > 2 && i !== 1 && i !== totalPages) {
      if (i === currentPage - 3 || i === currentPage + 3) html += `<span class="page-btn" style="cursor:default;">…</span>`;
      continue;
    }
    html += `<button class="page-btn ${i===currentPage?'active':''}" onclick="goPage(${i})">${i}</button>`;
  }
  html += `<button class="page-btn" onclick="goPage(${currentPage+1})" ${currentPage===totalPages?'disabled':''}>›</button>`;
  ctrlEl.innerHTML = html;
}

function goPage(p) {
  const totalPages = Math.ceil(filteredList.length / perPage);
  if (p < 1 || p > totalPages) return;
  currentPage = p;
  renderProductTable();
}

/* =============================================
   TOGGLE STATUS
============================================= */
function toggleStatus(id, checked) {
  const p = products.find(x => x.id === id);
  if (!p) return;
  p.status = checked ? 'active' : 'inactive';
  save();
  addLog(`${p.name} → ${p.status === 'active' ? 'In Stock' : 'Out of Stock'}`, p.status === 'active' ? '#10b981' : '#ef4444');
  showToast(`${p.name}: ${p.status === 'active' ? 'In Stock' : 'Out of Stock'}`, p.status === 'active' ? 'success' : 'warning');
  buildStatCards();
  buildRecentList();
  buildActivityLog();
}

/* =============================================
   ADD MODAL
============================================= */
function openAddModal() {
  editId = null;
  document.getElementById('modal-title-text').textContent = 'Add Product';
  document.getElementById('modal-save-label').textContent = 'Add Product';
  document.getElementById('modal-icon').setAttribute('data-lucide', 'package-plus');
  clearForm();
  document.getElementById('product-overlay').classList.add('show');
  lucide.createIcons();
}

function openEditModal(id) {
  editId = id;
  const p = products.find(x => x.id === id);
  if (!p) return;
  document.getElementById('modal-title-text').textContent = 'Edit Product';
  document.getElementById('modal-save-label').textContent = 'Save Changes';
  document.getElementById('modal-icon').setAttribute('data-lucide', 'pencil');
  document.getElementById('f-name').value     = p.name;
  document.getElementById('f-price').value    = p.price;
  document.getElementById('f-stock').value    = p.stock;
  document.getElementById('f-category').value = p.category;
  document.getElementById('f-image').value    = p.image;
  document.getElementById('f-status').checked = p.status === 'active';
  previewModalImage(p.image);
  clearFormErrors();
  document.getElementById('product-overlay').classList.add('show');
  lucide.createIcons();
}

function closeProductModal() {
  document.getElementById('product-overlay').classList.remove('show');
}

function clearForm() {
  ['f-name','f-price','f-stock','f-image'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.value = '';
  });
  const cat = document.getElementById('f-category');
  if (cat) cat.value = '';
  const st = document.getElementById('f-status');
  if (st) st.checked = true;
  document.getElementById('img-preview-wrap').classList.remove('visible');
  clearFormErrors();
}

function clearFormErrors() {
  ['e-name','e-price','e-stock','e-category'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.classList.remove('show');
  });
  ['f-name','f-price','f-stock','f-category','f-image'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.classList.remove('error');
  });
}

function previewModalImage(url) {
  const wrap = document.getElementById('img-preview-wrap');
  const img  = document.getElementById('img-preview-el');
  if (url && url.startsWith('http')) {
    img.src = url;
    wrap.classList.add('visible');
  } else {
    wrap.classList.remove('visible');
  }
}

function handleProductSubmit(e) {
  e.preventDefault();
  const name     = document.getElementById('f-name').value.trim();
  const price    = parseFloat(document.getElementById('f-price').value);
  const stock    = parseInt(document.getElementById('f-stock').value);
  const category = document.getElementById('f-category').value;
  const image    = document.getElementById('f-image').value.trim();
  const status   = document.getElementById('f-status').checked ? 'active' : 'inactive';

  clearFormErrors();
  let ok = true;

  if (!name)             { showFieldErr('f-name','e-name');     ok = false; }
  if (isNaN(price)||price<0) { showFieldErr('f-price','e-price');  ok = false; }
  if (isNaN(stock)||stock<0) { showFieldErr('f-stock','e-stock');  ok = false; }
  if (!category)         { showFieldErr('f-category','e-category'); ok = false; }
  if (!ok) return;

  showLoader(true);
  setTimeout(() => {
    if (editId) {
      const p = products.find(x => x.id === editId);
      if (p) {
        Object.assign(p, { name, price, stock, category, image: image||p.image, status });
        addLog(`Edited: ${name}`, '#6366f1');
        showToast(`"${name}" updated!`, 'success');
      }
    } else {
      const newId = products.length ? Math.max(...products.map(x=>x.id)) + 1 : 1;
      products.push({ id: newId, name, price, stock, category, image, status, createdAt: Date.now() });
      addLog(`Added: ${name}`, '#10b981');
      showToast(`"${name}" added!`, 'success');
    }
    save();
    closeProductModal();
    applyFilters();
    buildDashboard();
    updateSidebarBadge();
    showLoader(false);
  }, 500);
}

function showFieldErr(inputId, errId) {
  document.getElementById(inputId)?.classList.add('error');
  document.getElementById(errId)?.classList.add('show');
}

/* =============================================
   DELETE MODAL
============================================= */
function openDeleteModal(id) {
  deleteId = id;
  const p = products.find(x => x.id === id);
  document.getElementById('delete-product-name').textContent = p ? p.name : '';
  document.getElementById('delete-overlay').classList.add('show');
  lucide.createIcons();
}

function closeDeleteModal() {
  deleteId = null;
  document.getElementById('delete-overlay').classList.remove('show');
}

function confirmDeleteProduct() {
  if (!deleteId) return;
  showLoader(true);
  setTimeout(() => {
    const p = products.find(x => x.id === deleteId);
    const name = p ? p.name : 'Product';
    products = products.filter(x => x.id !== deleteId);
    filteredList = filteredList.filter(x => x.id !== deleteId);
    save();
    addLog(`Deleted: ${name}`, '#ef4444');
    showToast(`"${name}" deleted.`, 'error');
    closeDeleteModal();
    applyFilters();
    buildDashboard();
    updateSidebarBadge();
    showLoader(false);
  }, 450);
}

/* =============================================
   SIDEBAR BADGE
============================================= */
function updateSidebarBadge() {
  const el = document.getElementById('sidebar-count');
  if (el) el.textContent = products.length;
}

/* =============================================
   EXPORT CSV
============================================= */
function exportCSV() {
  const header = ['ID','Name','Price','Category','Stock','Status'];
  const rows   = products.map(p => [p.id, `"${p.name}"`, p.price, p.category, p.stock, p.status]);
  const csv    = [header, ...rows].map(r => r.join(',')).join('\n');
  const blob   = new Blob([csv], { type: 'text/csv' });
  const url    = URL.createObjectURL(blob);
  const a      = Object.assign(document.createElement('a'), { href: url, download: 'prism-products.csv' });
  a.click();
  URL.revokeObjectURL(url);
  showToast('CSV exported successfully!', 'success');
}

/* =============================================
   LOADER
============================================= */
function showLoader(show) {
  document.getElementById('global-loader').style.display = show ? 'flex' : 'none';
}

/* =============================================
   TOAST
============================================= */
function showToast(msg, type = 'info') {
  const icons  = { success:'check-circle', error:'x-circle', info:'info', warning:'alert-triangle' };
  const wrap   = document.getElementById('toast-container');
  const div    = document.createElement('div');
  div.className = `toast ${type}`;
  div.innerHTML = `
    <i data-lucide="${icons[type]}" class="toast-icon" style="width:17px;height:17px;flex-shrink:0;"></i>
    <span>${msg}</span>
  `;
  wrap.appendChild(div);
  lucide.createIcons();
  setTimeout(() => {
    div.classList.add('hiding');
    setTimeout(() => div.remove(), 280);
  }, 3000);
}

/* =============================================
   UTILITIES
============================================= */
function esc(str) {
  return String(str||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function timeAgo(ts) {
  const d = Date.now() - ts;
  const m = Math.floor(d / 60000);
  if (m < 1) return 'just now';
  if (m < 60) return `${m}m ago`;
  const h = Math.floor(m / 60);
  if (h < 24) return `${h}h ago`;
  return `${Math.floor(h/24)}d ago`;
}

// Close modals on overlay click
document.getElementById('product-overlay').addEventListener('click', function(e) {
  if (e.target === this) closeProductModal();
});
document.getElementById('delete-overlay').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});

// ESC key
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') { closeProductModal(); closeDeleteModal(); }
});

// Responsive show/hide topbar add btn
window.addEventListener('resize', () => {
  const btn = document.getElementById('topbar-add-btn');
  if (btn) btn.style.display = window.innerWidth >= 900 ? 'flex' : 'none';
});
</script>
</body>
</html>
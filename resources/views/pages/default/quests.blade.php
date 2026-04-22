<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Challenges — MojoLux</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
    <style>
    :root {
        --ink:        #1A1714;
        --ink-soft:   #5C5650;
        --gold:       #B8963E;
        --gold-warm:  #D4AF6A;
        --gold-pale:  #F7EDD8;
        --gold-faint: #FBF5EA;
        --white:      #FFFFFF;
        --paper:      #FAF7F2;
        --paper-deep: #F2EDE4;
        --rule:       #E8E0D4;
        --nav-h:      74px;
        --ease:       cubic-bezier(.4,0,.2,1);
        --shadow:     0 8px 40px rgba(26,23,20,.10);
        --radius:     14px;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'DM Sans', sans-serif;
        background: var(--paper);
        color: var(--ink);
        min-height: 100vh;
        -webkit-font-smoothing: antialiased;
    }

    /* ── NAV ── */
    .nav-bar {
        position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
        background: rgba(255,255,255,.97);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(212,175,55,.18);
        padding: 1.5rem 3rem;
    }
    .nav-content {
        display: flex; justify-content: space-between; align-items: center;
        max-width: 1200px; margin: auto;
    }
    .logo {
        font-family: 'DM Serif Display', serif;
        font-size: 1.8rem; font-weight: 400;
        text-decoration: none; color: var(--ink);
    }
    .nav-links { display: flex; gap: 3rem; }
    .nav-links a {
        font-size: .75rem; letter-spacing: 2px; text-transform: uppercase;
        color: var(--ink); text-decoration: none; font-weight: 500;
        transition: color .2s;
    }
    .nav-links a:hover { color: var(--gold); }

    /* ── PAGE WRAPPER ── */
    .page-wrap {
        margin-top: calc(var(--nav-h) + 3.5rem);
        max-width: 1100px;
        margin-left: auto;
        margin-right: auto;
        padding: 3.5rem 2.5rem 6rem;
    }

    /* ── BACK BTN ── */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        margin-bottom: 2rem;
        padding: .55rem 1.1rem;
        font-size: .65rem;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        font-weight: 500;
        color: var(--gold);
        background: transparent;
        border: 1px solid rgba(184,150,62,.3);
        border-radius: 999px;
        text-decoration: none;
        transition: all .25s var(--ease);
    }
    .back-btn svg { transition: transform .25s var(--ease); }
    .back-btn:hover {
        background: var(--gold-faint);
        border-color: var(--gold);
    }
    .back-btn:hover svg { transform: translateX(-3px); }

    /* ── HERO ── */
    .quests-hero { margin-bottom: 3rem; }

    .eyebrow-row {
        display: flex; align-items: center; gap: .7rem; margin-bottom: 1rem;
    }
    .eyebrow-line { width: 24px; height: 1px; background: var(--gold); flex-shrink: 0; }
    .eyebrow-text {
        font-size: .6rem; letter-spacing: 3px; text-transform: uppercase;
        color: var(--gold); font-weight: 500;
    }

    .quests-hero h1 {
        font-family: 'DM Serif Display', serif;
        font-size: clamp(2.2rem, 5vw, 3.4rem);
        font-weight: 400;
        color: var(--ink);
        line-height: 1.1;
    }
    .quests-hero h1 em {
        font-style: italic;
        color: var(--gold-warm);
    }
    .quests-hero p {
        margin-top: .65rem;
        color: var(--ink-soft);
        font-size: .88rem;
        font-weight: 300;
        max-width: 440px;
        line-height: 1.75;
    }

    /* ── POINTS BANNER ── */
    .points-banner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--ink);
        border-radius: var(--radius);
        padding: 1.6rem 2.2rem;
        margin-bottom: 2.8rem;
        box-shadow: 0 16px 48px rgba(26,23,20,.2);
        position: relative;
        overflow: hidden;
    }
    /* Subtle grain texture overlay */
    .points-banner::before {
        content: '';
        position: absolute; inset: 0;
        background: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
        opacity: .25; pointer-events: none;
    }
    /* Gold accent line top */
    .points-banner::after {
        content: '';
        position: absolute; top: 0; left: 2.2rem; right: 2.2rem;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(184,150,62,.4), transparent);
    }
    .pb-left { display: flex; align-items: center; gap: 1.2rem; position: relative; }
    .pb-icon {
        width: 44px; height: 44px; border-radius: 50%;
        background: rgba(184,150,62,.1);
        border: 1px solid rgba(184,150,62,.2);
        display: flex; align-items: center; justify-content: center;
    }
    /* SVG star icon instead of emoji */
    .pb-icon svg { width: 18px; height: 18px; }

    .pb-label {
        font-size: .58rem; letter-spacing: 3px; text-transform: uppercase;
        color: rgba(255,255,255,.3); font-weight: 500; margin-bottom: .2rem;
    }
    .pb-value {
        font-family: 'DM Serif Display', serif;
        font-size: 1.6rem; font-weight: 400;
        color: var(--gold-warm);
        transition: all .4s var(--ease);
    }
    .pb-right {
        font-size: .72rem; color: rgba(255,255,255,.2);
        letter-spacing: .5px; text-align: right; line-height: 1.7;
        position: relative;
    }

    /* ── SECTION LABEL ── */
    .section-label {
        font-size: .58rem; letter-spacing: 3px; text-transform: uppercase;
        color: var(--gold); font-weight: 500; margin-bottom: 1.2rem;
    }

    /* ── GAME CARDS ── */
    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
        gap: 1.4rem;
    }

    .game-card {
        background: var(--white);
        border-radius: var(--radius);
        border: 1px solid var(--rule);
        overflow: hidden;
        transition: transform .28s var(--ease), box-shadow .28s var(--ease), border-color .28s var(--ease);
        cursor: pointer;
    }
    .game-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(26,23,20,.12);
        border-color: rgba(184,150,62,.25);
    }

    /* Card thumbs — no emoji, pure graphic */
    .game-card-thumb {
        width: 100%; height: 168px;
        display: flex; align-items: center; justify-content: center;
        position: relative; overflow: hidden;
    }
    .thumb-memory  { background: var(--ink); }
    .thumb-wheel   { background: #1E1A14; }
    .thumb-quiz    { background: #1A1720; }

    /* Radial glow per card */
    .thumb-memory::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 35% 45%, rgba(184,150,62,.22) 0%, transparent 65%);
    }
    .thumb-wheel::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 60% 40%, rgba(212,175,106,.18) 0%, transparent 65%);
    }
    .thumb-quiz::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 40% 55%, rgba(140,110,180,.2) 0%, transparent 65%);
    }

    /* SVG monogram / icon inside thumb */
    .thumb-icon {
        position: relative; z-index: 1;
        opacity: .55;
    }

    .game-card-body { padding: 1.3rem 1.4rem 1.5rem; }

    .game-card-cat {
        font-size: .58rem; letter-spacing: 2.5px; text-transform: uppercase;
        color: var(--gold); font-weight: 500; margin-bottom: .3rem;
    }
    .game-card-body h3 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.18rem; font-weight: 400;
        color: var(--ink); line-height: 1.3; margin-bottom: .45rem;
    }
    .game-card-body p {
        font-size: .8rem; color: var(--ink-soft);
        line-height: 1.7; margin-bottom: 1rem; font-weight: 300;
    }

    .badge-row { display: flex; gap: .4rem; margin-bottom: 1rem; flex-wrap: wrap; }
    .badge {
        font-size: .62rem; font-weight: 500;
        padding: .2rem .7rem; border-radius: 50px;
        letter-spacing: .03em;
    }
    .badge-points {
        background: rgba(184,150,62,.08);
        border: 1px solid rgba(184,150,62,.2);
        color: var(--gold-warm);
    }
    .badge-daily  { background: #EDF5EE; color: #2E7D32; border: 1px solid #C8E6C9; }
    .badge-free   { background: #EEF4FB; color: #1560A8; border: 1px solid #C5D9F1; }

    .btn-play {
        width: 100%;
        padding: .68rem .9rem;
        background: var(--ink);
        color: var(--white);
        border: none;
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: .74rem; font-weight: 500;
        letter-spacing: .5px;
        cursor: pointer;
        transition: background .22s, transform .15s, color .22s;
        display: flex; align-items: center; justify-content: center; gap: .45rem;
    }
    .btn-play:hover  { background: var(--gold); color: var(--ink); }
    .btn-play:disabled {
        background: var(--rule); color: var(--ink-soft);
        cursor: not-allowed; pointer-events: none;
    }

    /* ── MODAL ── */
    .modal-overlay {
        display: none;
        position: fixed; inset: 0;
        background: rgba(26,23,20,.7);
        backdrop-filter: blur(8px);
        z-index: 1000;
        align-items: center; justify-content: center;
        padding: 16px;
    }
    .modal-overlay.open { display: flex; }

    .modal-box {
        background: var(--white);
        border-radius: 20px;
        width: 100%; max-width: 560px;
        max-height: 90vh; overflow-y: auto;
        box-shadow: 0 40px 90px rgba(26,23,20,.28);
        animation: modalIn .32s cubic-bezier(.34,1.56,.64,1) both;
    }
    @keyframes modalIn {
        from { opacity: 0; transform: scale(.88) translateY(24px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    .modal-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1.5rem 1.75rem 1rem;
        border-bottom: 1px solid var(--rule);
    }
    .modal-header-left { display: flex; align-items: center; gap: .7rem; }
    .modal-header-icon {
        width: 36px; height: 36px; border-radius: 9px;
        background: var(--gold-faint);
        border: 1px solid var(--rule);
        display: flex; align-items: center; justify-content: center;
    }
    .modal-header-icon svg { width: 16px; height: 16px; }
    .modal-header h2 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.15rem; font-weight: 400; color: var(--ink);
    }
    .modal-close {
        width: 32px; height: 32px; border-radius: 8px;
        border: 1px solid var(--rule);
        background: var(--paper);
        color: var(--ink-soft); font-size: 13px;
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        transition: background .2s, border-color .2s;
        font-family: inherit;
    }
    .modal-close:hover { background: var(--gold-faint); border-color: var(--gold-warm); }

    .modal-body { padding: 1.5rem 1.75rem 2rem; }

    /* ── TOAST ── */
    .toast {
        position: fixed; bottom: 32px; left: 50%;
        transform: translateX(-50%) translateY(80px);
        background: var(--ink); color: var(--gold-warm);
        padding: .85rem 1.8rem;
        border-radius: 100px;
        font-size: .8rem; font-weight: 500;
        z-index: 2000;
        transition: transform .35s cubic-bezier(.34,1.56,.64,1);
        pointer-events: none; white-space: nowrap;
        box-shadow: 0 8px 32px rgba(26,23,20,.2);
        letter-spacing: .3px;
    }
    .toast.show { transform: translateX(-50%) translateY(0); }

    /* ════ MEMORY MATCH ════ */
    .memory-info {
        display: flex; justify-content: space-between;
        margin-bottom: 1rem;
        padding: .7rem 1rem;
        background: var(--paper); border-radius: 9px;
        border: 1px solid var(--rule);
        font-size: .75rem; color: var(--ink-soft);
    }
    .memory-info span b { color: var(--ink); font-weight: 500; }

    .memory-grid {
        display: grid; grid-template-columns: repeat(4, 1fr);
        gap: 8px; margin-bottom: 1rem;
    }

    .mem-card {
        aspect-ratio: 1; border-radius: 9px; cursor: pointer;
        position: relative; transform-style: preserve-3d;
        transition: transform .45s ease;
    }
    .mem-card.flipped { transform: rotateY(180deg); }
    .mem-card.matched { transform: rotateY(180deg); pointer-events: none; }

    .mem-card-face {
        position: absolute; inset: 0; border-radius: 9px;
        display: flex; align-items: center; justify-content: center;
        backface-visibility: hidden; font-size: 24px;
    }
    .mem-card-back {
        background: var(--paper-deep);
        border: 1px solid var(--rule);
    }
    /* Diamond pattern on card back */
    .mem-card-back::after {
        content: '';
        position: absolute; inset: 0; border-radius: 9px;
        background-image: repeating-linear-gradient(
            45deg,
            rgba(184,150,62,.06) 0px,
            rgba(184,150,62,.06) 1px,
            transparent 1px,
            transparent 12px
        );
    }
    .mem-card-front {
        background: var(--white);
        border: 1px solid var(--gold-pale);
        transform: rotateY(180deg);
    }
    .mem-card.matched .mem-card-front {
        background: var(--gold-faint);
        border-color: var(--gold-warm);
    }

    #memory-result {
        text-align: center; padding: 1.1rem 1.2rem;
        background: var(--paper);
        border: 1px solid var(--rule);
        border-radius: 10px; display: none;
    }
    #memory-result h3 {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem; margin-bottom: .3rem;
    }
    #memory-result p { color: var(--ink-soft); font-size: .8rem; }

    .btn-secondary {
        width: 100%; padding: .62rem .9rem;
        background: var(--paper);
        border: 1px solid var(--rule);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: .74rem; font-weight: 500;
        color: var(--ink-soft);
        cursor: pointer; margin-top: .75rem;
        transition: border-color .2s, color .2s, background .2s;
    }
    .btn-secondary:hover { border-color: var(--gold); color: var(--ink); background: var(--gold-faint); }

    /* ════ SPIN THE WHEEL ════ */
    .wheel-wrap {
        display: flex; flex-direction: column;
        align-items: center; gap: 1.2rem;
    }
    .wheel-container { position: relative; width: 290px; height: 290px; }
    .wheel-pointer {
        position: absolute; top: -14px; left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }
    #wheelCanvas {
        border-radius: 50%;
        box-shadow: 0 8px 36px rgba(26,23,20,.18);
    }

    .wheel-prize-label {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem; font-weight: 400;
        color: var(--ink); min-height: 28px; text-align: center;
    }

    #spin-btn {
        padding: .78rem 2.6rem;
        background: var(--gold); color: var(--ink);
        border: none; border-radius: 50px;
        font-family: 'DM Sans', sans-serif;
        font-size: .82rem; font-weight: 500;
        cursor: pointer; letter-spacing: .08em; text-transform: uppercase;
        transition: background .2s, transform .15s, box-shadow .2s;
    }
    #spin-btn:hover { background: var(--gold-warm); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(184,150,62,.28); }
    #spin-btn:disabled { background: var(--rule); color: var(--ink-soft); cursor: not-allowed; transform: none; box-shadow: none; }

    .wheel-note {
        font-size: .72rem; color: var(--ink-soft);
        text-align: center; letter-spacing: .2px;
    }

    /* ════ DAILY QUIZ ════ */
    #quiz-options { display: flex; flex-direction: column; gap: .65rem; margin-top: 1.2rem; }

    .quiz-opt-btn {
        padding: .9rem 1.1rem;
        background: var(--paper);
        border: 1px solid var(--rule);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif; font-size: .83rem;
        text-align: left; cursor: pointer; color: var(--ink);
        transition: border-color .2s, background .2s;
    }
    .quiz-opt-btn:hover:not(:disabled) {
        border-color: var(--gold);
        background: var(--gold-faint);
    }
    .quiz-opt-btn.correct { background: #EDF5EE; border-color: #388E3C; color: #1B5E20; }
    .quiz-opt-btn.wrong   { background: #FEECEC; border-color: #C62828; color: #B71C1C; }
    .quiz-opt-btn:disabled { cursor: not-allowed; }

    .quiz-question {
        font-family: 'DM Serif Display', serif;
        font-size: 1.15rem; line-height: 1.45; color: var(--ink);
    }
    .quiz-already {
        text-align: center; padding: 2.2rem 1rem;
        color: var(--ink-soft);
    }
    .quiz-already .big {
        width: 52px; height: 52px;
        border-radius: 50%;
        background: var(--gold-faint);
        border: 1px solid var(--rule);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto .9rem;
    }
    .quiz-already p {
        font-family: 'DM Serif Display', serif;
        font-size: 1.1rem; color: var(--ink);
    }

    @media(max-width: 640px) {
        .page-wrap { padding: 2rem 1.2rem 5rem; }
        .nav-bar { padding: 1rem 1.5rem; }
        .points-banner { flex-direction: column; gap: .9rem; text-align: center; }
        .pb-right { text-align: center; }
        .games-grid { grid-template-columns: 1fr; }
    }
    </style>
</head>
<body>

<!-- NAV -->
<nav class="nav-bar">
  <div class="nav-content">
    <a href="{{ route('home') }}" class="logo">
      Mojo<span style="color: var(--gold); font-style: italic;">Lux</span>
    </a>
    <div class="nav-links">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active-link' : '' }}">Home</a>
      <a href="{{ route('store.index') }}" class="{{ request()->routeIs('store.*') ? 'active-link' : '' }}">Collections</a>
      <a href="{{ route('dressup') }}" class="{{ request()->routeIs('dressup') ? 'active-link' : '' }}">Style Lab</a>
      <a href="{{ route('wagclub.index') }}" class="{{ request()->routeIs('wagclub.*') ? 'active-link' : '' }}">Wag Club</a>
      <a href="{{ route('cart.index') }}" class="{{ request()->routeIs('cart.*') ? 'active-link' : '' }}">Cart</a>
    </div>
  </div>
</nav>

<div class="page-wrap">

    {{-- ── HERO ── --}}
    <div class="quests-hero">
        <a href="javascript:history.back()" class="back-btn">
            <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5 2.5L4 7L8.5 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back
        </a>
        <div class="eyebrow-row">
            <span class="eyebrow-line"></span>
            <span class="eyebrow-text">Wag Club Rewards</span>
        </div>
        <h1>Play. Earn. <em>Spoil.</em></h1>
        <p>Complete mini challenges to earn points and treat your pet to something special.</p>
    </div>

    {{-- ── POINTS BANNER ── --}}
    <div class="points-banner">
        <div class="pb-left">
            <div class="pb-icon">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        stroke="#B8963E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="pb-label">Your Balance</div>
                <div class="pb-value" id="points-display">{{ $wallet->points_balance ?? 0 }} pts</div>
            </div>
        </div>
        <div class="pb-right">
            Earn points with every game<br>& redeem them at checkout
        </div>
    </div>

    {{-- ── SECTION LABEL ── --}}
    <div class="section-label">Mini Challenges</div>

    {{-- ── GAME CARDS ── --}}
    <div class="games-grid">

        {{-- Memory Match --}}
        <div class="game-card" onclick="openModal('memory-modal')">
            <div class="game-card-thumb thumb-memory">
                <svg class="thumb-icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="8" y="8" width="24" height="24" rx="4" stroke="#B8963E" stroke-width="1.5"/>
                    <rect x="40" y="8" width="24" height="24" rx="4" stroke="#B8963E" stroke-width="1.5"/>
                    <rect x="8" y="40" width="24" height="24" rx="4" stroke="#B8963E" stroke-width="1.5"/>
                    <rect x="40" y="40" width="24" height="24" rx="4" stroke="#D4AF6A" stroke-width="1.5"/>
                    <path d="M16 20H24M20 16V24" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M48 20H56M52 16V24" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M16 52H24M20 48V56" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <circle cx="52" cy="52" r="5" stroke="#D4AF6A" stroke-width="1.5"/>
                </svg>
            </div>
            <div class="game-card-body">
                <div class="game-card-cat">Memory</div>
                <h3>Memory Match</h3>
                <p>Flip the cards, find matching pet pairs. Fewer moves means more points.</p>
                <div class="badge-row">
                    <span class="badge badge-points">Up to 80 pts</span>
                    <span class="badge badge-free">Unlimited plays</span>
                </div>
                <button class="btn-play">
                    Play Now
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2.5 6H9.5M6.5 3L9.5 6L6.5 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>

        {{-- Paw Roulette --}}
        <div class="game-card" onclick="openModal('wheel-modal')">
            <div class="game-card-thumb thumb-wheel">
                <svg class="thumb-icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="36" cy="36" r="28" stroke="#B8963E" stroke-width="1.5"/>
                    <circle cx="36" cy="36" r="6" stroke="#D4AF6A" stroke-width="1.5"/>
                    <line x1="36" y1="8" x2="36" y2="22" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="36" y1="50" x2="36" y2="64" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="8" y1="36" x2="22" y2="36" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="50" y1="36" x2="64" y2="36" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round"/>
                    <line x1="16.7" y1="16.7" x2="26.6" y2="26.6" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round" opacity=".5"/>
                    <line x1="45.4" y1="45.4" x2="55.3" y2="55.3" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round" opacity=".5"/>
                    <line x1="55.3" y1="16.7" x2="45.4" y2="26.6" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round" opacity=".5"/>
                    <line x1="26.6" y1="45.4" x2="16.7" y2="55.3" stroke="#B8963E" stroke-width="1.5" stroke-linecap="round" opacity=".5"/>
                    <polygon points="36,4 38.5,13 33.5,13" fill="#D4AF6A"/>
                </svg>
            </div>
            <div class="game-card-body">
                <div class="game-card-cat">Luck</div>
                <h3>Paw Roulette</h3>
                <p>Spin the luxury wheel for a chance to win up to 500 bonus points.</p>
                <div class="badge-row">
                    <span class="badge badge-points">Up to 500 pts</span>
                    <span class="badge badge-daily">Once daily</span>
                </div>
                <button class="btn-play">
                    Spin Now
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2.5 6H9.5M6.5 3L9.5 6L6.5 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>

        {{-- Daily Quiz --}}
        <div class="game-card" onclick="openModal('quiz-modal')">
            <div class="game-card-thumb thumb-quiz">
                <svg class="thumb-icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M36 12C24.954 12 16 20.954 16 32C16 38.2 18.8 43.75 23.2 47.5L22 58L32.5 53.5C33.6 53.8 34.8 54 36 54C47.046 54 56 45.046 56 34C56 22.954 47.046 12 36 12Z" stroke="#9B7FD4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30 27C30 23.686 32.686 21 36 21C39.314 21 42 23.686 42 27C42 29.5 40.5 31.6 38.4 32.7C37.3 33.3 36 34.2 36 35.5V38" stroke="#9B7FD4" stroke-width="1.5" stroke-linecap="round"/>
                    <circle cx="36" cy="43" r="1.5" fill="#9B7FD4"/>
                </svg>
            </div>
            <div class="game-card-body">
                <div class="game-card-cat">Trivia</div>
                <h3>Daily Quiz</h3>
                <p>Answer today's pet question correctly and pocket your reward points.</p>
                <div class="badge-row">
                    <span class="badge badge-points">50 pts</span>
                    <span class="badge badge-daily">Once daily</span>
                </div>
                <button class="btn-play" @if($alreadyAnswered) disabled @endif>
                    @if($alreadyAnswered)
                        Completed
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2 6.5L4.5 9L10 3.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @else
                        Play Now
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M2.5 6H9.5M6.5 3L9.5 6L6.5 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    @endif
                </button>
            </div>
        </div>

    </div>
</div>


{{-- ════ MODAL: MEMORY MATCH ════ --}}
<div class="modal-overlay" id="memory-modal">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-left">
                <div class="modal-header-icon">
                    <svg viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="#B8963E" stroke-width="1.2"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="#B8963E" stroke-width="1.2"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="#B8963E" stroke-width="1.2"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="#B8963E" stroke-width="1.2"/></svg>
                </div>
                <h2>Memory Match</h2>
            </div>
            <button class="modal-close" onclick="closeModal('memory-modal')">&#x2715;</button>
        </div>
        <div class="modal-body">
            <div class="memory-info">
                <span>Moves: <b id="mem-moves">0</b></span>
                <span>Matched: <b id="mem-matched">0</b> / 8</span>
                <span>Time: <b id="mem-timer">0s</b></span>
            </div>
            <div class="memory-grid" id="memory-grid"></div>
            <div id="memory-result">
                <h3 id="mem-result-title">All matched!</h3>
                <p id="mem-result-sub">Submitting your score…</p>
            </div>
            <button class="btn-secondary" onclick="resetMemory()">New Game</button>
        </div>
    </div>
</div>


{{-- ════ MODAL: PAW ROULETTE ════ --}}
<div class="modal-overlay" id="wheel-modal">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-left">
                <div class="modal-header-icon">
                    <svg viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6.5" stroke="#B8963E" stroke-width="1.2"/><circle cx="8" cy="8" r="1.5" stroke="#B8963E" stroke-width="1.2"/><line x1="8" y1="1.5" x2="8" y2="5" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round"/><line x1="8" y1="11" x2="8" y2="14.5" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round"/><line x1="1.5" y1="8" x2="5" y2="8" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round"/><line x1="11" y1="8" x2="14.5" y2="8" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round"/></svg>
                </div>
                <h2>Paw Roulette</h2>
            </div>
            <button class="modal-close" onclick="closeModal('wheel-modal')">&#x2715;</button>
        </div>
        <div class="modal-body">
            <div class="wheel-wrap">
                <div class="wheel-container">
                    <!-- SVG pointer instead of emoji -->
                    <div class="wheel-pointer">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <polygon points="10,2 16,14 10,11 4,14" fill="#B8963E"/>
                        </svg>
                    </div>
                    <canvas id="wheelCanvas" width="290" height="290"></canvas>
                </div>
                <div class="wheel-prize-label" id="wheel-prize-label">&nbsp;</div>
                <button id="spin-btn" onclick="spinWheel()">Spin the Wheel</button>
                <p class="wheel-note" id="wheel-note">One spin per day — good luck</p>
            </div>
        </div>
    </div>
</div>

{{-- ════ MODAL: DAILY QUIZ ════ --}}
<div class="modal-overlay" id="quiz-modal">
    <div class="modal-box">
        <div class="modal-header">
            <div class="modal-header-left">
                <div class="modal-header-icon">
                    <svg viewBox="0 0 16 16" fill="none"><path d="M8 2C5.24 2 3 4.24 3 7C3 8.55 3.7 9.94 4.8 10.88L4.5 14L7.63 12.63C7.75 12.66 7.87 12.68 8 12.68C10.76 12.68 13 10.44 13 7.68C13 4.24 10.76 2 8 2Z" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.5 5.5C6.5 4.67 7.17 4 8 4C8.83 4 9.5 4.67 9.5 5.5C9.5 6.12 9.12 6.65 8.58 6.9C8.3 7.02 8 7.28 8 7.6V8.5" stroke="#B8963E" stroke-width="1.2" stroke-linecap="round"/><circle cx="8" cy="10.5" r=".6" fill="#B8963E"/></svg>
                </div>
                <h2>Daily Quiz</h2>
            </div>
            <button class="modal-close" onclick="closeModal('quiz-modal')">&#x2715;</button>
        </div>
        <div class="modal-body">
            @if($quiz)
                @if($alreadyAnswered)
                    <div class="quiz-already">
                        <div class="big">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><path d="M4 11L9 16L18 6" stroke="#388E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <p>Already answered today</p>
                        <p style="color:var(--ink-soft);font-size:.8rem;margin-top:.5rem;font-family:'DM Sans',sans-serif;font-weight:300;">Come back tomorrow for a new question.</p>
                    </div>
                @else
                    <p class="quiz-question">{{ $quiz->question }}</p>
                    <div id="quiz-options">
                        @php $options = ['A' => $quiz->option_a, 'B' => $quiz->option_b, 'C' => $quiz->option_c, 'D' => $quiz->option_d]; @endphp
                        @foreach($options as $key => $label)
                            <button class="quiz-opt-btn" onclick="submitQuiz('{{ $key }}', this)">
                                <b style="color:var(--gold);margin-right:.4rem;">{{ $key }}.</b>{{ $label }}
                            </button>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="quiz-already">
                    <div class="big">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"><rect x="3" y="5" width="16" height="14" rx="2" stroke="#B8963E" stroke-width="1.4"/><path d="M7 5V4C7 2.895 7.895 2 9 2H13C14.105 2 15 2.895 15 4V5" stroke="#B8963E" stroke-width="1.4"/><line x1="8" y1="10" x2="14" y2="10" stroke="#B8963E" stroke-width="1.4" stroke-linecap="round"/><line x1="8" y1="14" x2="12" y2="14" stroke="#B8963E" stroke-width="1.4" stroke-linecap="round"/></svg>
                    </div>
                    <p>No quiz today</p>
                    <p style="color:var(--ink-soft);font-size:.8rem;margin-top:.5rem;font-family:'DM Sans',sans-serif;font-weight:300;">Check back tomorrow!</p>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Toast --}}
<div class="toast" id="toast"></div>

<script>
/* ─────────────────────────────────────────────
   HELPERS
───────────────────────────────────────────── */
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function openModal(id) {
    document.getElementById(id).classList.add('open');
    if (id === 'memory-modal' && !memoryStarted) initMemory();
    if (id === 'wheel-modal') drawWheel();
}
function closeModal(id) {
    document.getElementById(id).classList.remove('open');
}

function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3200);
}

function updatePointsDisplay(newBalance) {
    const el = document.getElementById('points-display');
    el.textContent = newBalance + ' pts';
    el.style.transform = 'scale(1.15)';
    el.style.color = '#F7EDD8';
    setTimeout(() => { el.style.transform = 'scale(1)'; el.style.color = ''; }, 500);
}

/* ─────────────────────────────────────────────
   DAILY QUIZ
───────────────────────────────────────────── */
function submitQuiz(answer, btn) {
    document.querySelectorAll('.quiz-opt-btn').forEach(b => b.disabled = true);
    fetch("{{ route('quests.quiz.submit') }}", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: JSON.stringify({ answer })
    })
    .then(r => r.json())
    .then(data => {
        btn.classList.add(data.correct ? 'correct' : 'wrong');
        showToast(data.correct ? `Correct — +${data.points} pts` : 'Wrong answer. Better luck tomorrow.');
        if (data.correct) updatePointsDisplay(data.new_balance);
    })
    .catch(() => showToast('Something went wrong. Try again.'));
}

/* ─────────────────────────────────────────────
   MEMORY MATCH
───────────────────────────────────────────── */
const MEMORY_GAME_ID = 2;

const petCards = ['🐶','🐱','🐰','🦜','🐠','🐹','🦔','🐸'];
let memFlipped = [], memMatched = 0, memMoves = 0, memLocked = false;
let memTimer = 0, memTimerInterval = null, memoryStarted = false;

function initMemory() {
    memoryStarted = true;
    memFlipped = []; memMatched = 0; memMoves = 0; memLocked = false; memTimer = 0;
    clearInterval(memTimerInterval);
    document.getElementById('mem-moves').textContent   = 0;
    document.getElementById('mem-matched').textContent = 0;
    document.getElementById('mem-timer').textContent   = '0s';
    document.getElementById('memory-result').style.display = 'none';

    const deck = [...petCards, ...petCards].sort(() => Math.random() - 0.5);
    const grid = document.getElementById('memory-grid');
    grid.innerHTML = '';

    deck.forEach((emoji, i) => {
        const card = document.createElement('div');
        card.className = 'mem-card';
        card.dataset.value = emoji;
        card.innerHTML = `
            <div class="mem-card-face mem-card-back"></div>
            <div class="mem-card-face mem-card-front">${emoji}</div>
        `;
        card.addEventListener('click', () => memFlipCard(card));
        grid.appendChild(card);
    });

    memTimerInterval = setInterval(() => {
        memTimer++;
        document.getElementById('mem-timer').textContent = memTimer + 's';
    }, 1000);
}

function memFlipCard(card) {
    if (memLocked || card.classList.contains('flipped') || card.classList.contains('matched')) return;
    card.classList.add('flipped');
    memFlipped.push(card);
    if (memFlipped.length === 2) {
        memLocked = true;
        memMoves++;
        document.getElementById('mem-moves').textContent = memMoves;
        if (memFlipped[0].dataset.value === memFlipped[1].dataset.value) {
            memFlipped.forEach(c => c.classList.add('matched'));
            memMatched++;
            document.getElementById('mem-matched').textContent = memMatched;
            memFlipped = []; memLocked = false;
            if (memMatched === 8) memGameComplete();
        } else {
            setTimeout(() => {
                memFlipped.forEach(c => c.classList.remove('flipped'));
                memFlipped = []; memLocked = false;
            }, 900);
        }
    }
}

function memGameComplete() {
    clearInterval(memTimerInterval);
    const rawScore = Math.max(10, 80 - Math.max(0, memMoves - 8) * 2 - Math.floor(memTimer / 5));
    const resultBox = document.getElementById('memory-result');
    resultBox.style.display = 'block';
    document.getElementById('mem-result-title').textContent = 'All matched!';
    document.getElementById('mem-result-sub').textContent   = 'Submitting score…';

    fetch("{{ route('quests.memory') }}", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: JSON.stringify({ game_id: MEMORY_GAME_ID, score: rawScore })
    })
    .then(r => r.json())
    .then(data => {
        if (data.error) {
            document.getElementById('mem-result-sub').textContent = data.error;
        } else {
            document.getElementById('mem-result-sub').textContent =
                `You earned ${data.points_earned} pts — Balance: ${data.new_balance} pts`;
            updatePointsDisplay(data.new_balance);
            showToast(`+${data.points_earned} pts earned`);
        }
    })
    .catch(() => {
        document.getElementById('mem-result-sub').textContent = 'Could not save score. Try again later.';
    });
}

function resetMemory() {
    memoryStarted = false;
    initMemory();
}

/* ─────────────────────────────────────────────
   PAW ROULETTE
───────────────────────────────────────────── */
const WHEEL_GAME_ID = 3;

const wheelSegments = [
    { label: '50 pts',     points: 50,   color: '#B8963E' },
    { label: 'Try Again',  points: 0,    color: '#E8E0D4' },
    { label: '100 pts',    points: 100,  color: '#2A2118' },
    { label: '200 pts',    points: 200,  color: '#D4AF6A' },
    { label: '25 pts',     points: 25,   color: '#F2EDE4' },
    { label: '500 pts',    points: 500,  color: '#1A1714' },
    { label: '75 pts',     points: 75,   color: '#B8963E' },
    { label: '150 pts',    points: 150,  color: '#2A2118' },
];

let wheelSpinning = false;
let currentAngle  = 0;

function drawWheel(extraAngle = 0) {
    const canvas = document.getElementById('wheelCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    const cx = canvas.width  / 2;
    const cy = canvas.height / 2;
    const r  = cx - 4;
    const n  = wheelSegments.length;
    const segAngle = (Math.PI * 2) / n;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.save();
    ctx.beginPath();
    ctx.arc(cx, cy, r + 2, 0, Math.PI * 2);
    ctx.strokeStyle = 'rgba(184,150,62,0.35)';
    ctx.lineWidth = 4;
    ctx.stroke();
    ctx.restore();

    wheelSegments.forEach((seg, i) => {
        const startA = i * segAngle + extraAngle;
        const endA   = startA + segAngle;

        ctx.beginPath();
        ctx.moveTo(cx, cy);
        ctx.arc(cx, cy, r, startA, endA);
        ctx.closePath();
        ctx.fillStyle = seg.color;
        ctx.fill();
        ctx.strokeStyle = '#FAF7F2';
        ctx.lineWidth = 1.5;
        ctx.stroke();

        ctx.save();
        ctx.translate(cx, cy);
        ctx.rotate(startA + segAngle / 2);
        ctx.textAlign  = 'right';
        const lightBg = seg.color === '#F2EDE4' || seg.color === '#E8E0D4' || seg.color === '#D4AF6A';
        ctx.fillStyle  = lightBg ? '#1A1714' : '#F7EDD8';
        ctx.font       = 'bold 11px DM Sans, sans-serif';
        ctx.fillText(seg.label, r - 12, 4);
        ctx.restore();
    });

    // Centre circle
    ctx.beginPath();
    ctx.arc(cx, cy, 22, 0, Math.PI * 2);
    ctx.fillStyle = '#FAF7F2';
    ctx.fill();
    ctx.strokeStyle = '#B8963E';
    ctx.lineWidth = 2.5;
    ctx.stroke();

    // M monogram instead of emoji
    ctx.font = 'italic bold 14px DM Serif Display, serif';
    ctx.fillStyle = '#B8963E';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText('M', cx, cy);
}

function getSegmentAtPointer(angle) {
    const n = wheelSegments.length;
    const segAngle = (Math.PI * 2) / n;
    const norm = (((-angle - Math.PI / 2) % (Math.PI * 2)) + Math.PI * 2) % (Math.PI * 2);
    return Math.floor(norm / segAngle) % n;
}

function spinWheel() {
    if (wheelSpinning) return;
    wheelSpinning = true;

    const btn   = document.getElementById('spin-btn');
    const note  = document.getElementById('wheel-note');
    const label = document.getElementById('wheel-prize-label');
    btn.disabled = true;
    label.textContent = '';

    const n = wheelSegments.length;
    const segAngle = (Math.PI * 2) / n;
    const winIndex = Math.floor(Math.random() * n);

    const segCentre = winIndex * segAngle + segAngle / 2;
    const spinRounds = (5 + Math.floor(Math.random() * 4)) * Math.PI * 2;
    const desiredAngle = -segCentre - Math.PI / 2;
    const normalised = ((desiredAngle - currentAngle) % (Math.PI * 2) + Math.PI * 2) % (Math.PI * 2);
    const totalSpin  = spinRounds + normalised;

    const duration  = 4500;
    const startTime = performance.now();
    const startAngle = currentAngle;

    function easeOut(t) { return 1 - Math.pow(1 - t, 4); }

    function frame(now) {
        const elapsed  = now - startTime;
        const progress = Math.min(elapsed / duration, 1);
        currentAngle   = startAngle + totalSpin * easeOut(progress);
        drawWheel(currentAngle);

        if (progress < 1) {
            requestAnimationFrame(frame);
        } else {
            wheelSpinning = false;
            const landed = getSegmentAtPointer(currentAngle);
            const winner = wheelSegments[landed];
            label.textContent = winner.points > 0
                ? `You won ${winner.label}`
                : 'Better luck next time';

            fetch("{{ route('quests.other') }}", {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ game_id: WHEEL_GAME_ID, score: winner.points })
            })
            .then(r => r.json())
            .then(data => {
                if (data.error) {
                    note.textContent = data.error;
                    btn.disabled = false;
                } else if (winner.points > 0) {
                    updatePointsDisplay(data.new_balance);
                    showToast(`+${data.points_earned} pts from Paw Roulette`);
                    note.textContent = 'Come back tomorrow for another spin';
                } else {
                    note.textContent = 'No luck today — come back tomorrow';
                }
            })
            .catch(() => showToast('Could not save points. Try again.'));
        }
    }

    requestAnimationFrame(frame);
}

/* close on backdrop click */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', e => {
        if (e.target === overlay) overlay.classList.remove('open');
    });
});
</script>

</body>
</html>

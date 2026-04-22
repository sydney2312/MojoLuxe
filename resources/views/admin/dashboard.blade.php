<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink: #111827;
            --ink-mid: #374151;
            --ink-muted: #6b7280;
            --ink-faint: #9ca3af;
            --surface: #ffffff;
            --surface-2: #f9fafb;
            --surface-3: #f3f4f6;
            --border: #e5e7eb;
            --accent: #111827;
            --active: #16a34a;
            --inactive: #dc2626;
            --radius: 12px;
            --radius-sm: 8px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f2f5;
            color: var(--ink);
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 220px;
            height: 100vh;
            background: var(--ink);
            display: flex;
            flex-direction: column;
            padding: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-brand .brand-name {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            letter-spacing: -0.02em;
        }

        .sidebar-brand .brand-sub {
            font-size: 11px;
            color: rgba(255,255,255,0.4);
            margin-top: 3px;
            font-family: 'DM Mono', monospace;
        }

        .sidebar-nav {
            padding: 16px 10px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.25);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 8px 10px 4px;
            margin-top: 8px;
        }

        .nav-label:first-child { margin-top: 0; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            color: rgba(255,255,255,0.6);
            font-size: 13.5px;
            font-weight: 500;
            transition: background 0.15s, color 0.15s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .nav-link.active {
            background: rgba(255,255,255,0.12);
            color: #fff;
        }

        .nav-icon {
            width: 18px;
            height: 18px;
            opacity: 0.7;
            flex-shrink: 0;
        }

        .sidebar-footer {
            padding: 12px 10px 16px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: var(--radius-sm);
            background: rgba(220,38,38,0.15);
            color: #fca5a5;
            font-size: 13.5px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            width: 100%;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.15s;
        }

        .logout-btn:hover { background: rgba(220,38,38,0.25); }

        /* MAIN CONTENT */
        .main {
            margin-left: 220px;
            padding: 32px 32px 32px;
            min-height: 100vh;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .topbar-left h1 {
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.03em;
            color: var(--ink);
        }

        .topbar-left p {
            font-size: 13px;
            color: var(--ink-muted);
            margin-top: 3px;
        }

        .topbar-right {
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            background: var(--surface);
            color: var(--ink);
            border: 1px solid var(--border);
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--ink);
            color: #fff;
            border: 1px solid var(--ink);
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            display: inline-block;
        }

        /* STAT GRID */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--surface);
            border-radius: var(--radius);
            padding: 18px 20px;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
        }

        .stat-card.accent-dark::before { background: var(--ink); }
        .stat-card.accent-green::before { background: #16a34a; }
        .stat-card.accent-red::before { background: #dc2626; }
        .stat-card.accent-amber::before { background: #d97706; }
        .stat-card.accent-blue::before { background: #2563eb; }

        .stat-label {
            font-size: 11.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--ink-muted);
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -0.04em;
            color: var(--ink);
            line-height: 1;
            font-family: 'DM Mono', monospace;
        }

        .stat-sub {
            font-size: 12px;
            color: var(--ink-faint);
            margin-top: 5px;
        }

        /* CONTENT GRID */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 18px;
        }

        /* PANEL */
        .panel {
            background: var(--surface);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            border-bottom: 1px solid var(--border);
        }

        .panel-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .panel-action {
            font-size: 12px;
            color: var(--ink-muted);
            text-decoration: none;
            font-weight: 500;
        }

        .panel-action:hover { color: var(--ink); }

        /* PRODUCT ROW */
        .product-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 18px;
            border-bottom: 1px solid var(--border);
            transition: background 0.1s;
        }

        .product-row:last-child { border-bottom: none; }
        .product-row:hover { background: var(--surface-2); }

        .product-info { display: flex; align-items: center; gap: 12px; }

        .product-icon {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: var(--surface-3);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }

        .product-name {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--ink);
        }

        .product-price {
            font-size: 12px;
            color: var(--ink-muted);
            margin-top: 2px;
            font-family: 'DM Mono', monospace;
        }

        .badge {
            padding: 3px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .badge-active { background: #dcfce7; color: #15803d; }
        .badge-inactive { background: #fee2e2; color: #b91c1c; }

        /* QUICK STATS SIDE */
        .quick-stats { display: flex; flex-direction: column; gap: 18px; }

        .mini-panel { padding: 16px 18px; }

        .mini-stat-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
        }

        .mini-stat-row:last-child { border-bottom: none; }

        .mini-stat-label { color: var(--ink-muted); }

        .mini-stat-value {
            font-weight: 600;
            color: var(--ink);
            font-family: 'DM Mono', monospace;
            font-size: 12.5px;
        }

        /* PROGRESS BARS */
        .progress-item { margin-bottom: 14px; }
        .progress-item:last-child { margin-bottom: 0; }

        .progress-head {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .progress-name { font-size: 12.5px; color: var(--ink-muted); }
        .progress-pct { font-size: 12px; font-weight: 600; color: var(--ink); font-family: 'DM Mono', monospace; }

        .progress-track {
            height: 5px;
            background: var(--surface-3);
            border-radius: 99px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 99px;
            background: var(--ink);
        }

        .progress-fill.green { background: #16a34a; }
        .progress-fill.amber { background: #d97706; }
        .progress-fill.red { background: #dc2626; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-name">&#9632; Admin Panel</div>
        <div class="brand-sub">v2.0 &mdash; Production</div>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-label">Overview</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
            Dashboard
        </a>

        <div class="nav-label">Manage</div>
        <a href="{{ route('admin.users.index') }}" class="nav-link">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="9" cy="7" r="4"/><path d="M3 21v-2a4 4 0 014-4h4a4 4 0 014 4v2"/><path d="M19 7v6m3-3h-6"/></svg>
            Users
        </a>
        <a href="{{ route('admin.products.index') }}" class="nav-link">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20 7H4a1 1 0 00-1 1v10a1 1 0 001 1h16a1 1 0 001-1V8a1 1 0 00-1-1z"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
            Products
        </a>
        <a href="{{ route('admin.products.create') }}" class="nav-link">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v8M8 12h8"/></svg>
            Add Product
        </a>
        <a href="{{ route('admin.quiz.index') }}" class="nav-link">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Quiz
        </a>

        <div class="nav-label">Site</div>
        <a href="{{ route('home') }}" class="nav-link">
            <svg class="nav-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Site Home
        </a>
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- MAIN -->
<main class="main">

    <div class="topbar">
        <div class="topbar-left">
            <h1>Dashboard Overview</h1>
            <p>Manage products, users, quizzes and stock</p>
        </div>
        <div class="topbar-right">
            <a href="{{ route('admin.products.create') }}" class="btn-primary">+ Add Product</a>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="stat-grid">
        <div class="stat-card accent-dark">
            <div class="stat-label">Total Products</div>
            <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
            <div class="stat-sub">Across all categories</div>
        </div>
        <div class="stat-card accent-green">
            <div class="stat-label">Active Products</div>
            <div class="stat-value">{{ $activeProducts ?? 0 }}</div>
            <div class="stat-sub">Currently listed</div>
        </div>
        <div class="stat-card accent-red">
            <div class="stat-label">Inactive Products</div>
            <div class="stat-value">{{ $inactiveProducts ?? 0 }}</div>
            <div class="stat-sub">Unlisted or archived</div>
        </div>
        <div class="stat-card accent-amber">
            <div class="stat-label">Low Stock</div>
            <div class="stat-value">{{ $lowStock ?? 0 }}</div>
            <div class="stat-sub">Needs restocking</div>
        </div>
        <div class="stat-card accent-dark">
            <div class="stat-label">Total Stock</div>
            <div class="stat-value">{{ $totalStock ?? 0 }}</div>
            <div class="stat-sub">Units in inventory</div>
        </div>
        <div class="stat-card accent-blue">
            <div class="stat-label">Average Price</div>
            <div class="stat-value">${{ number_format($averagePrice ?? 0, 2) }}</div>
            <div class="stat-sub">Per product</div>
        </div>
        <div class="stat-card accent-dark">
            <div class="stat-label">Total Users</div>
            <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
            <div class="stat-sub">Registered accounts</div>
        </div>
        <div class="stat-card accent-dark">
            <div class="stat-label">Quiz Questions</div>
            <div class="stat-value">{{ $totalQuiz ?? 0 }}</div>
            <div class="stat-sub">In question bank</div>
        </div>
    </div>

    <!-- CONTENT GRID -->
    <div class="content-grid">

        <!-- LATEST PRODUCTS -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Latest Products</span>
                <a href="{{ route('admin.products.index') }}" class="panel-action">View all &rarr;</a>
            </div>

            @foreach($latestProducts ?? [] as $product)
            <div class="product-row">
                <div class="product-info">
                    <div class="product-icon">&#128230;</div>
                    <div>
                        <div class="product-name">{{ $product->title }}</div>
                        <div class="product-price">${{ $product->price }}</div>
                    </div>
                </div>
                <span class="badge {{ $product->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                    {{ ucfirst($product->status) }}
                </span>
            </div>
            @endforeach
        </div>

        <!-- SIDEBAR PANELS -->
        <div class="quick-stats">

            <!-- STOCK HEALTH -->
            <div class="panel mini-panel">
                <div class="panel-header" style="padding: 0 0 12px; margin-bottom: 14px;">
                    <span class="panel-title">Stock Health</span>
                </div>
                <div class="progress-item">
                    <div class="progress-head">
                        <span class="progress-name">Active rate</span>
                        <span class="progress-pct">
                            @php $activeRate = $totalProducts > 0 ? round(($activeProducts / $totalProducts) * 100) : 0; @endphp
                            {{ $activeRate }}%
                        </span>
                    </div>
                    <div class="progress-track"><div class="progress-fill green" style="width: {{ $activeRate ?? 0 }}%;"></div></div>
                </div>
                <div class="progress-item">
                    <div class="progress-head">
                        <span class="progress-name">Low stock alerts</span>
                        <span class="progress-pct">
                            @php $lowRate = $totalProducts > 0 ? round(($lowStock / $totalProducts) * 100) : 0; @endphp
                            {{ $lowRate }}%
                        </span>
                    </div>
                    <div class="progress-track"><div class="progress-fill amber" style="width: {{ $lowRate ?? 0 }}%;"></div></div>
                </div>
                <div class="progress-item">
                    <div class="progress-head">
                        <span class="progress-name">Inactive rate</span>
                        <span class="progress-pct">
                            @php $inactiveRate = $totalProducts > 0 ? round(($inactiveProducts / $totalProducts) * 100) : 0; @endphp
                            {{ $inactiveRate }}%
                        </span>
                    </div>
                    <div class="progress-track"><div class="progress-fill red" style="width: {{ $inactiveRate ?? 0 }}%;"></div></div>
                </div>
            </div>

            <!-- QUICK NUMBERS -->
            <div class="panel mini-panel">
                <div class="panel-header" style="padding: 0 0 12px; margin-bottom: 0px;">
                    <span class="panel-title">Quick Numbers</span>
                </div>
                <div class="mini-stat-row">
                    <span class="mini-stat-label">Total users</span>
                    <span class="mini-stat-value">{{ $totalUsers ?? 0 }}</span>
                </div>
                <div class="mini-stat-row">
                    <span class="mini-stat-label">Quiz bank</span>
                    <span class="mini-stat-value">{{ $totalQuiz ?? 0 }} qs</span>
                </div>
                <div class="mini-stat-row">
                    <span class="mini-stat-label">Avg. price</span>
                    <span class="mini-stat-value">${{ number_format($averagePrice ?? 0, 2) }}</span>
                </div>
                <div class="mini-stat-row">
                    <span class="mini-stat-label">Total stock</span>
                    <span class="mini-stat-value">{{ $totalStock ?? 0 }} units</span>
                </div>
            </div>

        </div>
    </div>

</main>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MojoLux — Subscription Confirmed</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --ink: #1A1714;
            --gold: #B8963E;
            --gold-warm: #D4AF6A;
            --gold-faint: #FBF5EA;
            --gold-pale: #F7EDD8;
            --white: #FFFFFF;
            --paper: #FAF7F2;
            --rule: #E8E0D4;
            --ease: cubic-bezier(.4, 0, .2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--paper);
            color: var(--ink);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            background: var(--white);
            border: 1px solid var(--rule);
            border-radius: 24px;
            padding: 3.5rem;
            max-width: 480px;
            width: 100%;
            text-align: center;
        }

        .icon {
            width: 64px;
            height: 64px;
            background: var(--gold-faint);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            border: 1px solid var(--gold-pale);
        }

        .icon svg {
            width: 28px;
            height: 28px;
            stroke: var(--gold);
            fill: none;
            stroke-width: 1.8;
        }

        .eyebrow {
            font-size: .6rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: .75rem;
        }

        .title {
            font-family: 'DM Serif Display', serif;
            font-size: 2rem;
            font-weight: 400;
            color: var(--ink);
            line-height: 1.2;
            margin-bottom: .75rem;
        }

        .title em {
            font-style: italic;
            color: var(--gold-warm);
        }

        .sub {
            font-size: .84rem;
            color: #5C5650;
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .divider {
            height: 1px;
            background: var(--rule);
            margin-bottom: 2rem;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        .btn-primary {
            background: var(--ink);
            color: var(--white);
            padding: .8rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: .8rem;
            font-weight: 500;
            transition: background .2s;
            display: block;
        }

        .btn-primary:hover {
            background: var(--gold);
            color: var(--ink);
        }

        .btn-secondary {
            background: transparent;
            color: #5C5650;
            padding: .8rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: .8rem;
            border: 1px solid var(--rule);
            transition: border-color .2s, color .2s;
            display: block;
        }

        .btn-secondary:hover {
            border-color: var(--gold);
            color: var(--ink);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon">
            <svg viewBox="0 0 24 24">
                <polyline points="20 6 9 17 4 12" />
            </svg>
        </div>
        <div class="eyebrow">You're all set</div>
        <div class="title">Welcome to the<br><em>MojoLux Box.</em></div>
        <p class="sub">Your subscription is confirmed. Your first box will be on its way soon — keep an eye on your
            email for shipping updates.</p>
        <div class="divider"></div>
        <div class="actions">
            <a href="{{ route('store.index') }}" class="btn-primary">Continue Shopping</a>
            <a href="{{ route('wagclub.index') }}" class="btn-secondary">Back to Wag Club</a>
        </div>
    </div>
</body>

</html>

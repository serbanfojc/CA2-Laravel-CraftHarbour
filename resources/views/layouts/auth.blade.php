<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ filled($title ?? null) ? $title.' - CraftHarbour' : 'CraftHarbour' }}</title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

            body {
                font-family: 'Poppins', sans-serif;
                min-height: 100vh;
                background: linear-gradient(135deg, #1a3009 0%, #2D5016 50%, #3d6b1e 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
            }

            .auth-bg-text {
                position: fixed;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20vw;
                font-weight: 900;
                color: rgba(255, 255, 255, 0.04);
                letter-spacing: -0.05em;
                pointer-events: none;
                user-select: none;
                z-index: 0;
                white-space: nowrap;
            }

            .auth-card {
                position: relative;
                z-index: 1;
                background: white;
                border-radius: 20px;
                padding: 2.5rem;
                width: 100%;
                max-width: 440px;
                box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            }

            .auth-logo {
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .auth-logo a {
                text-decoration: none;
                color: #2D5016;
                font-size: 1.8rem;
                font-weight: 800;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            h2 {
                font-size: 1.3rem;
                font-weight: 700;
                color: #1a3009;
                margin-bottom: 0.25rem;
                text-align: center;
            }

            .auth-subtitle {
                font-size: 0.875rem;
                color: #666;
                text-align: center;
                margin-bottom: 1.5rem;
                display: block;
            }

            label {
                font-size: 0.875rem;
                font-weight: 500;
                color: #333;
                display: block;
                margin-bottom: 4px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select {
                width: 100%;
                padding: 10px 14px;
                border: 1px solid #ddd;
                border-radius: 8px;
                font-size: 0.9rem;
                font-family: 'Poppins', sans-serif;
                color: #333;
                background: #fafafa;
                transition: border-color 0.2s, box-shadow 0.2s;
                margin-bottom: 1rem;
                display: block;
            }

            input:focus,
            select:focus {
                outline: none;
                border-color: #2D5016;
                box-shadow: 0 0 0 3px rgba(45, 80, 22, 0.1);
                background: white;
            }

            .auth-btn {
                width: 100%;
                padding: 12px;
                background: #2D5016;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 0.95rem;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                cursor: pointer;
                transition: background 0.2s, transform 0.1s;
                margin-top: 0.5rem;
                display: block;
            }

            .auth-btn:hover {
                background: #1a3009;
                transform: translateY(-1px);
            }

            .auth-divider {
                display: flex;
                align-items: center;
                gap: 12px;
                margin: 1.25rem 0;
            }

            .auth-divider hr {
                flex: 1;
                border: none;
                border-top: 1px solid #e5e5e5;
            }

            .auth-divider span {
                font-size: 0.75rem;
                color: #999;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                white-space: nowrap;
            }

            .google-btn {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                width: 100%;
                padding: 10px 14px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background: white;
                color: #333;
                font-size: 0.9rem;
                font-weight: 500;
                font-family: 'Poppins', sans-serif;
                text-decoration: none;
                cursor: pointer;
                transition: background 0.2s, border-color 0.2s;
            }

            .google-btn:hover {
                background: #f5f5f5;
                border-color: #ccc;
                color: #333;
            }

            .auth-footer {
                text-align: center;
                margin-top: 1.25rem;
                font-size: 0.875rem;
                color: #666;
            }

            .auth-footer a {
                color: #2D5016;
                font-weight: 600;
                text-decoration: none;
            }

            .auth-error {
                color: #dc2626;
                font-size: 0.8rem;
                margin-top: -0.75rem;
                margin-bottom: 0.75rem;
                display: block;
            }

            .remember-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1rem;
            }

            .remember-row label {
                display: flex;
                align-items: center;
                gap: 6px;
                margin-bottom: 0;
                cursor: pointer;
            }

            .remember-row input[type="checkbox"] {
                width: auto;
                margin-bottom: 0;
                display: inline;
            }

            .forgot-link {
                font-size: 0.8rem;
                color: #2D5016;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="auth-bg-text">CraftHarbour</div>
        <div class="auth-card">
            <div class="auth-logo">
                <a href="{{ route('home') }}">🏺 CraftHarbour</a>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
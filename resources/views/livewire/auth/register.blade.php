<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - CraftHarbour</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

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
            font-size: 1.4rem;
            font-weight: 800;
            display: flex;
            justify-content: center;
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
            margin-top: 0.5rem;
            display: block;
        }

        .auth-btn:hover {
            background: #1a3009;
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
        }

        .google-btn:hover {
            background: #f5f5f5;
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
    </style>
</head>

<body>
    <div class="auth-bg-text">CraftHarbour</div>
    <div class="auth-card">
        <div class="auth-logo">
            <a href="{{ route('home') }}">🏺 CraftHarbour</a>
        </div>

        <h2>Create an account</h2>
        <span class="auth-subtitle">Join CraftHarbour and discover local artisans</span>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label for="name">Full name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                placeholder="Your full name">
            @error('name') <span class="auth-error">{{ $message }}</span> @enderror

            <label for="email">Email address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                placeholder="email@example.com">
            @error('email') <span class="auth-error">{{ $message }}</span> @enderror

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required autocomplete="new-password"
                placeholder="Password">
            @error('password') <span class="auth-error">{{ $message }}</span> @enderror

            <label for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                autocomplete="new-password" placeholder="Confirm password">
            @error('password_confirmation') <span class="auth-error">{{ $message }}</span> @enderror

            <label for="role">I am a...</label>
            <select id="role" name="role">
                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member — I want to find and review
                    artisans</option>
                <option value="artisan" {{ old('role') == 'artisan' ? 'selected' : '' }}>Artisan — I want to list my craft
                </option>
            </select>
            @error('role') <span class="auth-error">{{ $message }}</span> @enderror

            <button type="submit" class="auth-btn">Create account</button>
        </form>

        <div class="auth-divider">
            <hr><span>or sign up with</span>
            <hr>
        </div>

        <a href="{{ route('social.redirect', 'google') }}" class="google-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" style="flex-shrink:0;">
                <path
                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"
                    fill="#4285F4" />
                <path
                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                    fill="#34A853" />
                <path
                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                    fill="#FBBC05" />
                <path
                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                    fill="#EA4335" />
            </svg>
            Continue with Google
        </a>

        <div class="auth-footer">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>
</body>

</html>
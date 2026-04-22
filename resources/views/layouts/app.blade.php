<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraftHarbour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdf8f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .navbar {
            background: rgba(45, 80, 22, 0.90) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar:hover {
            background: rgba(45, 80, 22, 0.98) !important;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            color: white !important;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.3s ease, text-shadow 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.02);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        .navbar-brand .brand-icon {
            display: inline-block;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .navbar-brand:hover .brand-icon {
            transform: rotate(15deg) scale(1.1);
        }

        .nav-link-plain {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            font-size: 0.9rem;
            text-decoration: none;
            padding: 6px 4px;
            transition: color 0.2s ease;
        }

        .nav-link-plain:hover {
            color: white !important;
        }

        .navbar-btn {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            text-decoration: none;
            display: inline-block;
        }

        .navbar-btn-outline {
            color: white;
            border-color: rgba(255, 255, 255, 0.6);
            background: transparent;
        }

        .navbar-btn-outline:hover {
            background: white;
            color: #2D5016;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: white;
        }

        .navbar-btn-solid {
            background: white;
            color: #2D5016 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn-solid:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.3);
            background: #fdf8f4;
            color: #1a3009 !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #2D5016, #7CB342);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
        }

        .hero-section h1 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .badge.bg-secondary {
            background-color: #7CB342 !important;
            color: white;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #2D5016;
            border-color: #2D5016;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #1a3009;
            border-color: #1a3009;
        }

        .btn-outline-primary {
            color: #2D5016;
            border-color: #2D5016;
            border-radius: 8px;
        }

        .btn-outline-primary:hover {
            background-color: #2D5016;
            border-color: #2D5016;
            color: white;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2D5016;
            box-shadow: 0 0 0 0.2rem rgba(45, 80, 22, 0.15);
        }

        .page-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
        }

        .card-footer {
            background-color: transparent;
            border-top: 1px solid #e8f5e9;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #e8f5e9;
            padding: 12px 0;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            border-radius: 10px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            border-radius: 10px;
        }

        footer {
            background-color: #2D5016;
            color: #a5d6a7;
            padding: 20px 0;
            margin-top: auto;
        }

        .hello-text {
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.9rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.15);
            padding: 6px 14px;
            border-radius: 20px;
            backdrop-filter: blur(5px);
            transition: background 0.3s ease, transform 0.2s ease;
            align-self: center;
        }

        .hello-text:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.02);
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }

            .hero-section {
                padding: 40px 0;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span class="brand-icon">🏺</span> CraftHarbour
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(255,255,255,0.3);">
                <span class="navbar-toggler-icon" style="background-image: url(&quot;data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e&quot;);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="ms-auto d-flex gap-3 align-items-center flex-column flex-lg-row mt-3 mt-lg-0">
                    <a href="/artisans" class="nav-link-plain">Artisans</a>
                    <a href="/workshops" class="nav-link-plain">Workshops</a>
                    <a href="/about" class="nav-link-plain">About</a>
                    @auth
                        <a href="/profile" class="hello-text text-decoration-none d-flex align-items-center gap-2"
                            title="View Profile">
                            <div
                                style="width: 28px; height: 28px; background-color: rgba(255,255,255,0.25); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            {{ auth()->user()->name }}
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="/admin" class="navbar-btn navbar-btn-solid"
                                style="font-size: 0.85rem; color: #2D5016 !important; text-decoration: none;">Admin</a>
                        @endif
                        <a href="/dashboard" class="navbar-btn navbar-btn-outline">Dashboard</a>
                        <form method="POST" action="/logout" class="m-0">
                            @csrf
                            <button type="submit" class="navbar-btn navbar-btn-outline w-100">Logout</button>
                        </form>
                    @else
                        <a href="/login" class="navbar-btn navbar-btn-outline">Login</a>
                        <a href="/register" class="navbar-btn navbar-btn-solid">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container text-center">
            <p class="mb-1 fw-600">🏺 CraftHarbour</p>
            <p class="mb-0" style="font-size: 0.85rem;">Discover and support local artisans in your community</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
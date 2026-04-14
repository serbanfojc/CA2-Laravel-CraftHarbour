<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discoverly</title>
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
            background-color: #e8623a !important;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #e8623a;
        }

        .hero-section {
            background: linear-gradient(135deg, #e8623a, #f5a067);
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
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        .badge.bg-secondary {
            background-color: #f5a067 !important;
            color: white;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #e8623a;
            border-color: #e8623a;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #d4562f;
            border-color: #d4562f;
        }

        .btn-outline-primary {
            color: #e8623a;
            border-color: #e8623a;
            border-radius: 8px;
        }

        .btn-outline-primary:hover {
            background-color: #e8623a;
            border-color: #e8623a;
            color: white;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #e8623a;
            box-shadow: 0 0 0 0.2rem rgba(232, 98, 58, 0.15);
        }

        .page-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
        }

        .card-footer {
            background-color: transparent;
            border-top: 1px solid #f0e8e0;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #f0e8e0;
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
            background-color: #333;
            color: #aaa;
            padding: 20px 0;
            margin-top: auto;
        }

        .hello-text {
            color: white;
            font-size: 0.85rem;
            opacity: 0.9;
            align-self: center;
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
        <a class="navbar-brand" href="/">🔍 Discoverly</a>
        <div class="ms-auto d-flex gap-2 align-items-center flex-wrap">
            @auth
                <span class="hello-text">Hello, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                <a href="/dashboard" class="btn btn-outline-light btn-sm">Dashboard</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
                <a href="/register" class="btn btn-light btn-sm" style="color: #e8623a; font-weight: 600;">Register</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</main>

<footer>
    <div class="container text-center">
        <p class="mb-0">🔍 Discoverly — Discover your community</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
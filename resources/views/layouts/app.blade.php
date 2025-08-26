<!DOCTYPE html>
<html lang="id" class="{{ session('theme', 'light') }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel App')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background-color: #343a40;
            color: #fff;
            flex-shrink: 0;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 16px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
        }

        /* 🌙 Dark Mode */
        .dark body {
            background-color: #121212;
            color: #e0e0e0;
        }
        .dark .sidebar {
            background-color: #1e1e1e;
        }
        .dark .sidebar a {
            color: #e0e0e0;
        }
        .dark .sidebar a:hover {
            background-color: #333;
        }
        .dark .navbar {
            background-color: #1f1f1f !important;
        }
        .dark .navbar .navbar-brand,
        .dark .navbar span,
        .dark .navbar button {
            color: #e0e0e0 !important;
        }
        .dark .card {
            background-color: #2a2a2a;
            color: #e0e0e0;
        }
        .dark table {
            color: #e0e0e0;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="p-3">{{__('messages.myapp')}}</h4>
        <a href="{{ url('/dashboard') }}">{{__('messages.dashboard')}}</a>
        <a href="{{ route('products.index') }}" class="{{ request()->is('products*') ? 'active' : '' }}">{{__('messages.products')}}</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">@yield('title')</span>
                <div class="d-flex align-items-center">
                    <span class="me-3">Halo, Indra 👋</span>

                    <!-- Tombol Toggle Dark Mode -->
                    <a href="{{ route('toggle.theme') }}" class="btn btn-outline-secondary btn-sm me-2">
                        {{ session('theme', 'light') === 'light' ? '🌙 Dark' : '☀️ Light' }}
                    </a>
    
                    <!-- Language Switcher -->
                    <a href="{{ route('lang.switch', 'en') }}" class="btn btn-outline-primary btn-sm me-2">EN</a>
                    <a href="{{ route('lang.switch', 'id') }}" class="btn btn-outline-success btn-sm me-2">ID</a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">{{ __('messages.logout') }}</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>

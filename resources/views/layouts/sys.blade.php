<!-- resources/views/layouts/sys.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '🚚SYS Express')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link.active {
            border-bottom: 2px solid #ffc107; /* Yellow underline for active */
        }
    </style>
</head>
<body>

<!-- SYS Express Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(90deg, #ffc107, #ff9800);">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/sys') }}">
            <img src="{{ asset('images/sys.png') }}" alt="SYS Logo" style="height:36px; margin-right:8px;">
            <span class="fw-bold">SYS Express</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#sysNav" aria-controls="sysNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="sysNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('sys/about') ? 'active' : '' }}" href="{{ url('/sys/about') }}">
                        About
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('sys/project') ? 'active' : '' }}" href="{{ url('/sys/project') }}">
                        Project
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('sys/product') ? 'active' : '' }}" href="{{ url('/sys/product') }}">
                        Product
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('sys/catalog') ? 'active' : '' }}" href="{{ url('/sys/catalog') }}">
                        Catalog
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('sys/distributor') ? 'active' : '' }}" href="{{ url('/sys/distributor') }}">
                        Distributor
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

</body>
</html>

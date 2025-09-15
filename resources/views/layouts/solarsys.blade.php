<!-- resources/views/layouts/solarsys.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/me.jpg') }}" type="image/png">
    <title>@yield('title', '🌞Solarsys Energy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link.active {
            border-bottom: 2px solid #f39c12; /* Orange underline */
        }
    </style>
</head>
<body>

<!-- Solarsys Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(90deg, #f39c12, #e67e22);">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/solarsys') }}">
            <img src="{{ asset('images/solarsys-logo.png') }}" alt="Solarsys Logo" style="height:36px; margin-right:8px;">
            <span class="fw-bold">Solarsys Energy</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#solarsysNav" aria-controls="solarsysNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="solarsysNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/about') ? 'active' : '' }}" href="{{ url('/solarsys/about') }}">
                        About
                    </a>
                </li>

                 <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/service') ? 'active' : '' }}" href="{{ url('/solarsys/service') }}">
                        Service
                    </a>
                </li>

                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/project') ? 'active' : '' }}" href="{{ url('/solarsys/project') }}">
                        Project
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/product') ? 'active' : '' }}" href="{{ url('/solarsys/product') }}">
                        Product
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/catalog') ? 'active' : '' }}" href="{{ url('/solarsys/catalog') }}">
                        Catalog
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('solarsys/distributor') ? 'active' : '' }}" href="{{ url('/solarsys/distributor') }}">
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

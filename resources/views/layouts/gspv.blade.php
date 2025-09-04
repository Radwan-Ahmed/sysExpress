<!-- resources/views/layouts/gspv.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GSPV New Energy BD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link.active {
            border-bottom: 2px solid #28a745; /* Green underline for active */
        }
    </style>
</head>
<body>

<!-- GSPV Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background: linear-gradient(90deg, #28a745, #218838);">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/gspv') }}">
            <img src="{{ asset('images/gspv-logo.png') }}" alt="GSPV Logo" style="height:36px; margin-right:8px;">
            <span class="fw-bold">GSPV New Energy BD</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#gspvNav" aria-controls="gspvNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="gspvNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/about') ? 'active' : '' }}" href="{{ url('/gspv/about') }}">
                        About
                    </a>
                </li>
               <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/service') ? 'active' : '' }}" href="{{ url('/gspv/service') }}">
                        Service
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/project') ? 'active' : '' }}" href="{{ url('/gspv/project') }}">
                        Project
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/product') ? 'active' : '' }}" href="{{ url('/gspv/product') }}">
                        Product
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/catalog') ? 'active' : '' }}" href="{{ url('/gspv/catalog') }}">
                        Catalog
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('gspv/distributor') ? 'active' : '' }}" href="{{ url('/gspv/distributor') }}">
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

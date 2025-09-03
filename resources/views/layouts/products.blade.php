<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SYS Express')</title>

    <!-- Favicon (Title Bar Icon) -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Open Graph (For Social Media Sharing) -->
    <meta property="og:title" content="SYS Express Gallery">
    <meta property="og:description" content="Explore our SYS Express gallery of images and videos.">
    <meta property="og:image" content="{{ asset('images/gallery-banner.jpg') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Prevent content from hiding under navbar */
        }
        .navbar-brand {
            color: #28a745 !important; /* Green branding */
            font-weight: bold;
            font-size: 1.4rem;
        }
        .nav-link.active {
            border-bottom: 2px solid #28a745; /* Green underline for active page */
        }
    </style>
</head>
<body>


 <!-- Floating Success Message -->
    @if(session('success'))
        <div id="success-alert"
             class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
             style="z-index: 1050; width: auto; min-width: 250px; text-align:center;">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                let alertBox = document.getElementById("success-alert");
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    <!-- Floating Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/products') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->is('customers') ? 'active' : '' }}" href="{{ url('/customers') }}"target="_blank">Customer Page</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('products/manage') ? 'active' : '' }}" href="{{ url('/products/manage') }}">Manage</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/products/admins') }}">Admins</a></li>
                       <li class="nav-item"><a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Products</a></li>
                       <li class="nav-item"><a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="{{ url('/gallery') }}">Gallery</a></li>
                       <li class="nav-item"><a class="btn btn-success ms-2 {{ request()->is('login') ? 'active' : '' }}" href="{{ url('/login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="container py-4">
        @yield('content')
    </main>
</body>
</html>

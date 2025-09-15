<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SYS Express') }}</title>

    <!-- Bootstrap CSS & Bundle -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* =========================
           Reset body margin/padding
        ============================ */

        /* =========================
           Navbar
        ============================ */
        .navbar {
    padding: 1rem 2rem;            /* Taller navbar */
    font-size: 1.1rem;             /* Slightly bigger text */
    font-weight: 600;              /* Make it bold */
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);  /* Subtle shadow */
    background: linear-gradient(90deg, #1d3557, #457b9d); /* Pro gradient */
}

.navbar-brand {
    font-size: 1.5rem;             /* Make logo/brand bigger */
    font-weight: 700;
    letter-spacing: 1px;
    color: #fff !important;
}
.navbar-brand:hover { transform: scale(1.05); }

.navbar-nav .nav-link {
    padding: 0.7rem 1rem;          /* Larger click area */
    color: #f1faee !important;     /* Lighter text */
    transition: color 0.3s ease, transform 0.2s ease;
}

.navbar-nav .nav-link:hover {
    color: #a8dadc !important;     /* Hover effect */
    transform: translateY(-2px);   /* Subtle lift */
}

.navbar-toggler {
    border: none;
    font-size: 1.3rem;
    color: #fff;
}



        .nav-link.active {
            color: #28a745 !important;
            border-bottom: 3px solid #28a745;
            background: rgba(255,255,255,0.05);
            border-radius: 5px;
        }

        /* Dropdown Menu */
        .custom-dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            transition: all 0.3s ease-in-out;
        }
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            background: #ffffff;
            border-radius: 10px;
            border: none;
            padding: 0.5rem 0;
            min-width: 260px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .dropdown-item {
            border-radius: 5px;
            font-weight: 500;
            color: #333;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease-in-out;
        }
        .dropdown-item:hover, .dropdown-item.active {
            background: #28a745;
            color: #fff !important;
            transform: translateX(5px);
        }

        /* Navbar Toggler */
        .navbar-toggler {
            background-color: rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }
        .navbar-toggler:hover { background-color: rgba(255,255,255,0.2); }

        /* =========================
           Footer
        ============================ */
        footer {
            background: #0056b3;
            color: #bbb;
            padding: 40px 0;
            margin-top: 50px;
        }
        footer a {
            color: #28a745;
            text-decoration: none;
        }
        footer a:hover { text-decoration: underline; }

        /* =========================
           Floating Social Sidebar
        ============================ */
        .social-sidebar {
    position: fixed;
    bottom: 20px;  /* stick sidebar to bottom */
    right: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 1000;
}


        .social-sidebar a {
            color: #fff;
            padding: 10px 12px;
            border-radius: 5px 0 0 5px;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-align: center;
        }
        .social-sidebar a:hover { transform: translateX(-10px); }
        .social-sidebar a.email { background: #f3a932; }
        .social-sidebar a.facebook { background: #2389f0; }
        .social-sidebar a.whatsapp { background: #4df88c; }
        .social-sidebar a.youtube { background: #ec2c2c; }

        /* =========================
           Scroll-to-Top Button
        ============================ */
/* Scroll-to-Top Button */
.scroll-top-btn {
    position: fixed;
    bottom: 20px;
    right: 60px; /* more left so it doesn't overlap sidebar */
    width: 50px;
    height: 50px;
    background: #28a745;
    color: #fff;
    border: none;
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    cursor: pointer;
    z-index: 9999;
    transition: all 0.3s ease;
}
.scroll-top-btn:hover {
    background: #218838;
    transform: scale(1.1);
}

/* Tablet view */
@media (max-width: 992px) {
    .scroll-top-btn {
        right: 60px; /* move a bit closer */
        width: 45px;
        height: 45px;
        font-size: 24px;
    }
}

/* Mobile view */
@media (max-width: 576px) {
    .scroll-top-btn {
        right: 50px; /* even more left for narrow screens */
        width: 40px;
        height: 40px;
        font-size: 22px;
    }
}


    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-lg" style="background: linear-gradient(90deg, #0d47a1, #0056b3);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/home') }}">
            <img src="{{ asset('images/sys.png') }}" alt="SYS Express Logo" style="height:36px; margin-right:8px;">
            SYS Express
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item mx-1"><a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a></li>
                <li class="nav-item mx-1"><a class="nav-link {{ request()->is('navProduct') ? 'active' : '' }}" href="{{ url('/navProduct') }}">Products</a></li>
                <li class="nav-item dropdown custom-dropdown mx-1">
                    <a class="nav-link dropdown-toggle {{ request()->is('services*') ? 'active' : '' }}" href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                        <li><a class="dropdown-item {{ request()->is('services/solarsys') ? 'active' : '' }}" href="{{ url('/services/solarsys') }}" target="_blank">🌞 SOLARSYS ENERGY</a></li>
                        <li><a class="dropdown-item {{ request()->is('services/sys') ? 'active' : '' }}" href="{{ url('/services/sys') }}" target="_blank">🚚 SYS Express</a></li>
                        <li><a class="dropdown-item {{ request()->is('services/agrosys') ? 'active' : '' }}" href="{{ url('/services/agrosys') }}" target="_blank">🌾 AGROSYS FARM FRESH</a></li>
                        <li><a class="dropdown-item {{ request()->is('services/gspv') ? 'active' : '' }}" href="{{ url('/services/gspv') }}" target="_blank">⚡ GSPV NEW ENERGY BD</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-1"><a class="nav-link {{ request()->is('user-gallery') ? 'active' : '' }}" href="{{ url('/user-gallery') }}">Gallery</a></li>
                <li class="nav-item mx-1"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item mx-1"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="p-0 m-0" style="width:100%; max-width:100%;">
    @yield('content')
</main>


<!-- Footer -->
<footer class="text-white mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">About us</h5>
                <p>Solarsys Renewable Energy Expert.<br>Agrosys Sustainable Agriculture.<br>GSPV Empower Your Business with GSPV New Energy BD.<br>SYS EXPRESS Seamless China Imports</p>
                <div class="d-flex gap-3">
                    <a href="https://www.facebook.com/profile.php?id=61578824953717" class="text-white fs-5" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://wa.me/qr/PGHMN3BPU2JEO1" class="text-white fs-5"><i class="bi bi-whatsapp"></i></a>
                    <a href="mailto:sysexpress.business@gmail.com" class="text-white fs-5"><i class="bi bi-envelope"></i></a>
                    <a href="#" class="text-white fs-5"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Quick navigation</h5>
                <ul class="list-unstyled">
                    <li><a class="text-white text-decoration-none {{ request()->is('services/solarsys') ? 'active' : '' }}" href="{{ url('/services/solarsys') }}" target="_blank">> 🌞 SOLARSYS ENERGY DISTRIBUTION LTD.</a></li>
                    <li><a class="text-white text-decoration-none {{ request()->is('services/gspv') ? 'active' : '' }}" href="{{ url('/services/gspv') }}" target="_blank">> ⚡ GSPV NEW ENERGY BD</a></li>
                    <li><a class="text-white text-decoration-none {{ request()->is('services/sys') ? 'active' : '' }}" href="{{ url('/services/sys') }}" target="_blank">> 🚚 SYS Express</a></li>
                    <li><a class="text-white text-decoration-none {{ request()->is('services/agrosys') ? 'active' : '' }}" href="{{ url('/services/agrosys') }}" target="_blank">> 🌾 AGROSYS FARM FRESH</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Contact us</h5>
                <p>Tel: +8801976527797</p>
                <p>Email: <a href="mailto:sysexpress.business@gmail.com" class="text-white">sysexpress.business@gmail.com</a></p>
                <p><i class="bi bi-geo-alt-fill"></i> Office address: Plot-1, Road - 27/ka, Dhaka-1216, Bangladesh</p>
                <div class="map-container rounded overflow-hidden" style="height:200px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.0427031073873!2d90.35352247385538!3d23.817080486216025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c10038e40b3d%3A0xa8062b2e95c7548e!2sSYS%20Express!5e0!3m2!1sbn!2sbd!4v1756883773402!5m2!1sbn!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <hr class="border-light">
        <p class="text-center mb-0">&copy; {{ date('Y') }} SYS Express. All Rights Reserved.</p>
    </div>
</footer>

<!-- Floating Social Sidebar -->
<div class="social-sidebar">
    <a href="https://www.facebook.com/profile.php?id=61578824953717" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
    <a href="https://wa.me/qr/PGHMN3BPU2JEO1" target="_blank" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
    <a href="mailto:sysexpress.business@gmail.com" target="_blank" class="email"><i class="bi bi-envelope-fill"></i></a>
    <a href="https://youtube.com" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
</div>

<!-- Scroll to Top Button -->
<button id="scrollTopBtn" class="scroll-top-btn" aria-label="Scroll to top"><i class="bi bi-arrow-up-short"></i></button>

<script>
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    window.addEventListener("scroll", () => {
        scrollTopBtn.style.display = window.scrollY > 200 ? "flex" : "none";
    });
    scrollTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
</script>

</body>
</html>

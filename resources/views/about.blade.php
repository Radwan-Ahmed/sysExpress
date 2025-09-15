
@extends('layouts.customers')
@section('title', 'About Us')
<title>@yield('title', 'About Us')</title>

@section('content')
<div class="container py-5">

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-success">About SYS Express</h1>
        <p class="text-muted fs-5">Empowering lives with innovation, sustainability, and reliable services.</p>
    </div>

    <!-- Mission & Vision -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">

        </div>
        <div class="col-md-6">
            <h3 class="text-success">🌱 Our Mission</h3>
            <p>
                At <strong>SYS Express</strong>, we believe in creating better opportunities for people and communities.
                From renewable energy to logistics, agriculture, and international trade, our goal is to provide
                sustainable and innovative solutions for a brighter future.
            </p>
            <h3 class="text-success mt-4">🎯 Our Vision</h3>
            <p>
                To become a trusted global brand that delivers excellence while promoting eco-friendly
                and community-driven services.
            </p>
        </div>
    </div>

    <!-- Business Sectors -->
    <div class="row text-center g-4">
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h4 class="text-success">🌞 Renewable Energy</h4>
                    <p class="text-muted">SOLARSYS ENERGY & GSPV NEW ENERGY BD drive clean energy solutions for a sustainable tomorrow.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h4 class="text-success">🌾 Agriculture</h4>
                    <p class="text-muted">AGROSYS FARM FRESH delivers organic and farm-fresh produce straight from fields to homes.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h4 class="text-success">🚚 Logistics</h4>
                    <p class="text-muted">SYS Express ensures reliable, fast, and secure nationwide delivery services.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h4 class="text-success">🌍 International</h4>
                    <p class="text-muted">INSYS INTERNATIONAL connects businesses with global markets and trade solutions.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Closing Statement -->
    <div class="text-center mt-5">
        <blockquote class="blockquote">
            <p class="fw-bold text-success fs-4">“Better Service for a Better Life.”</p>
        </blockquote>
    </div>

</div>
@endsection

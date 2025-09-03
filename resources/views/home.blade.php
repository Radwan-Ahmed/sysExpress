@extends('layouts.customers')

@section('title', 'Homepage')

@section('content')

<div class="py-5 mb-5 text-white rounded position-relative"
     style="background: url('{{ asset('images/background.jpg') }}') center/cover no-repeat; background-size: cover;">
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100"
         style="background: rgba(0,0,0,0.45); border-radius: inherit;"></div>

    <div class="container text-center position-relative" style="z-index: 2;">
        <h1 class="fw-bold display-4 text-shadow">Welcome to Our Product Center</h1>
        <p class="lead mb-0 text-shadow">Explore top-notch solutions tailored for you</p>
        <a href="#products" class="btn btn-lg btn-light mt-3 shadow-sm btn-hover-scale">Shop Now</a>
    </div>
</div>

<!-- Main Content -->
<div class="container pb-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="list-group shadow-sm rounded">
                <a class="list-group-item list-group-item-action fw-bold bg-primary text-white">
                    Eastops Security Solution
                </a>
                <a href="#" class="list-group-item list-group-item-action">🔒 Wireless Security</a>
                <a href="#" class="list-group-item list-group-item-action">📱 Phones & Tablets</a>
                <a href="#" class="list-group-item list-group-item-action">⌚ Smart Watches</a>
                <a href="#" class="list-group-item list-group-item-action">💻 Laptops</a>
                <a href="#" class="list-group-item list-group-item-action">🎧 Accessories</a>

                <a class="list-group-item list-group-item-action fw-bold bg-primary text-white mt-3">
                    Digital Display Solution
                </a>
                <a href="#" class="list-group-item list-group-item-action">🖥 Interactive Display Stand</a>
                <a href="#" class="list-group-item list-group-item-action">📺 Digital Signage</a>
                <a href="#" class="list-group-item list-group-item-action">🏷 Electronic Shelf Label</a>

                <a class="list-group-item list-group-item-action fw-bold bg-primary text-white mt-3">
                    Software Solution
                </a>
                <a href="#" class="list-group-item list-group-item-action">💡 Custom Applications</a>
                <a href="#" class="list-group-item list-group-item-action">☁ Cloud Integration</a>
                <a href="#" class="list-group-item list-group-item-action">🔧 IT Support</a>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <h2 class="mb-4 fw-bold">Product Center</h2>
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0 rounded-3 hover-shadow">
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="card-img-top p-3"
                             style="height: 200px; object-fit: contain;"
                             alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h6 class="card-title fw-semibold">{{ $product->name }}</h6>
                            <p class="card-text text-muted small">
                                {{ Str::limit($product->description, 50) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Custom CSS -->
<style>
/* Text shadow for better readability on background */
.text-shadow {
    text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
}

/* Button hover effect */
.btn-hover-scale {
    transition: all 0.3s ease;
}
.btn-hover-scale:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}
</style>
@endsection

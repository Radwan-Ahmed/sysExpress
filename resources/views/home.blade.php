@extends('layouts.customers')

@section('title', 'Homepage')
<title>@yield('title', 'Homepage')</title>

@section('content')
<div class="flip-card" id="flipCard">
    <div class="flip-card-inner" id="flipInner">
        <!-- Faces injected dynamically -->
    </div>

    <!-- Navigation arrows -->
    <button class="nav prev" id="prev">&#10094;</button>
    <button class="nav next" id="next">&#10095;</button>
</div>

    <!-- About Section -->
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left: Image -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/sys.png') }}"
                     alt="About SYS Express"
                     class="img-fluid rounded shadow">
            </div>

            <!-- Right: Text -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">About <span class="text-primary">SYS Express</span></h2>
                <p class="text-muted" style="font-size: 1.1rem; line-height: 1.7;">
                    SYS Express is your trusted partner for seamless China imports,
                    renewable energy solutions, and sustainable growth.
                    We are committed to delivering reliable logistics, green energy,
                    and farm-fresh products that power your business and lifestyle.
                </p>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Fast & secure logistics solutions</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Trusted renewable energy expertise</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Farm-fresh sustainable products</li>
                </ul>
                <a href="{{ url('/about') }}" class="btn btn-success mt-3 px-4 py-2">
                    Learn More
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Product Centre Section -->
<section id="product-centre" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-start mb-4">
            <!-- Left Column: Title + Description + More Button -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <h2 class="fw-bold">Product <span class="text-primary">Centre</span></h2>
                <p class="text-muted">
                    Explore our innovative solutions designed to meet your needs.
                    From cutting-edge technology to sustainable solutions, we have
                    products that make a difference.
                    Hola
                    hola
                    holahola
                    hola\
                    eddddddddddd.
                    retre.
                    yrtyt.
                    fsdgrdgfd
                    dfgdf


                    dfgdfgdf
                    dfgdfg

                </p>
                <a href="{{ url('navProduct') }}" class="btn btn-primary mt-2">More Products</a>
            </div>

            <!-- Right Column: Carousel -->
            <div class="col-lg-8 position-relative">
                <div class="product-carousel d-flex overflow-hidden" id="productCarousel">
                    @foreach($products as $product)
                        <div class="product-card flex-shrink-0 me-3">
                            <div class="product-image-wrapper position-relative">
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="product-img">
                                <div class="overlay d-flex align-items-center justify-content-center">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-light">View</a>
                                </div>
                            </div>
                            <div class="p-2 text-center">
                                <h6 class="mb-1">{{ $product->name }}</h6>
                                <p class="text-muted small">{{ Str::limit($product->short_description, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Arrows -->
                <button class="carousel-arrow prev" id="prevArrow">&#10094;</button>
                <button class="carousel-arrow next" id="nextArrow">&#10095;</button>
            </div>
        </div>
    </div>
</section>





<style>
.flip-card {
    perspective: 1000px;
    width: 100vw;          /* Full viewport width */
    max-width: 100%;       /* Prevent overflow */
    height: 580px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.flip-card-inner {
     position: relative;
    width: 100%;
    height: 100%;
    transition: transform .5s ease-in-out;
    transform-style: preserve-3d;
}

.flip-card-face {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    backface-visibility: hidden;
}

.flip-card-face img {
    width: 100vw;           /* Full viewport width */
    max-width: 100%;        /* Prevent overflow */
    height: 100%;
    object-fit: cover;
    display: block;
}

.back { transform: rotateY(180deg); }

/* Arrows */
.nav {
    position: absolute;       /* stays inside carousel, not scrolling */
    top: 50%;
    transform: translateY(-50%);
    background: rgba(116, 114, 114, 0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    outline: none;      /* Remove focus outline */
    user-select: none;
    cursor: pointer;
    font-size: 24px;
    z-index: 20;
    user-select: none;
    transition: all 0.3s ease;
}
.nav:focus {
    outline: none;      /* Ensure no focus styling */
}
.nav:hover { background: rgba(0,0,0,0.8); }

/* Flip-card Arrows */
.nav.prev {
    left: 10px;   /* closer to the card */
}
.nav.next {
    right: 10px;  /* closer to the card */
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .nav.prev { left: 5px; }
    .nav.next { right: 5px; }
}
@media (max-width: 576px) {
    .nav.prev, .nav.next {
        top: 45%;
        font-size: 20px;
        padding: 10px;
    }
}


@media (max-width: 768px) {
    .flip-card { height: 200px; }
}

.product-carousel { display:flex; gap:1rem; scroll-behavior:smooth; overflow-x:auto; }
.product-carousel::-webkit-scrollbar { display:none; }

.product-card { width:220px; border-radius:12px; overflow:hidden; transition: transform 0.3s ease; flex-shrink:0; }
.product-card:hover { transform: translateY(-5px); }

.product-image-wrapper { position:relative; overflow:hidden; border-radius:inherit; height:140px; }
.product-img { width:100%; height:100%; object-fit:cover; display:block; }

/* Hover Light Effect */
.product-card::after {
    content:'';
    position:absolute;
    top:-50%;
    left:-75%;
    width:50%;
    height:200%;
    background:rgba(255,255,255,0.3);
    transform:rotate(25deg) translateX(-100%);
    opacity:0;
    border-radius:50%;
    transition: transform 0.7s ease, opacity 0.7s ease;
}
.product-card:hover::after { transform:rotate(25deg) translateX(250%); opacity:1; }

.overlay { position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0); opacity:0; border-radius:inherit; display:flex; align-items:center; justify-content:center; transition: all 0.3s ease; }
.product-card:hover .overlay { background: rgba(255,255,255,0.2); opacity:1; }
.overlay .btn { opacity:0; transition: opacity 0.3s ease; }
.product-card:hover .overlay .btn { opacity:1; }
@media(max-width:768px){
    .product-card { width:140px; }
    .product-image-wrapper { height:100px; }
    .prev,.next{top:45%; font-size:18px; padding:10px;}
}


/* Carousel Arrows */
.carousel-arrow {
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    background:rgba(116,114,114,0.5);
    color:#fff;
    border:none;
    padding:12px;
    font-size:24px;
    cursor:pointer;
    border-radius:50%;
    z-index:10;
    transition: background 0.3s;
}
.carousel-arrow:hover { background: rgba(0,0,0,0.8); }
.prev { left:10px; } .next { right:10px; }
@media(max-width:992px){ .prev{left:-10px;} .next{right:-10px;} }
@media(max-width:768px){ .prev,.next{top:45%; font-size:20px; padding:12px;} }
@media(max-width:576px){ .product-card{width:160px;} }

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(255,255,255,0);
    opacity: 0;
    transition: all 0.3s ease;
    border-radius: inherit;
}
.product-card:hover .overlay {
    background: rgba(255,255,255,0.2);
    opacity: 1;
}
.overlay .btn {
    opacity: 0;
    transition: opacity 0.3s ease;
}
.product-card:hover .overlay .btn {
    opacity: 1;
}



/* Make arrows responsive */
.carousel-control-prev, .carousel-control-next {
    width: 40px;
    height: 40px;
}
@media (max-width: 992px) {
    .carousel-control-prev, .carousel-control-next {
        width: 30px;
        height: 30px;
    }
}
@media (max-width: 576px) {
    .carousel-control-prev, .carousel-control-next {
        width: 25px;
        height: 25px;
    }
}

</style>

<script>
const images = ["images/background.jpg", "images/m2.webp"];
const flipCard = document.getElementById('flipCard');
const flipInner = document.getElementById('flipInner');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

let current = 0;
let totalRotation = 0;
let flipInterval = null;
let hoverPaused = false;
let isFlipping = false;

// Create front/back faces
const front = document.createElement('div');
front.classList.add('flip-card-face', 'front');
front.innerHTML = `<img src="${images[0]}" alt="Image">`;

const back = document.createElement('div');
back.classList.add('flip-card-face', 'back');
back.innerHTML = `<img src="${images[1]}" alt="Image">`;

flipInner.appendChild(front);
flipInner.appendChild(back);

// Flip function for infinite 2-image carousel
function flipTo(direction = 'right') {
    if (isFlipping) return;
    isFlipping = true;

    const nextIndex = current === 0 ? 1 : 0;

    totalRotation += 180 * (direction === 'right' ? 1 : -1);
    flipInner.style.transform = `rotateY(${totalRotation}deg)`;

    // Keep the current image visible until next flip
    setTimeout(() => {
        current = nextIndex;
        isFlipping = false;
    }, 1000); // match the transition duration
}

// Arrow clicks
nextBtn.addEventListener('click', () => { flipTo('right'); resetAutoFlip(); });
prevBtn.addEventListener('click', () => { flipTo('left'); resetAutoFlip(); });

// Auto-flip
function autoFlip() { flipTo('right'); }
function startAutoFlip() {
    stopAutoFlip();
    if(!hoverPaused) flipInterval = setInterval(autoFlip, 3000);
}
function stopAutoFlip() { clearInterval(flipInterval); }
function resetAutoFlip() { stopAutoFlip(); if(!hoverPaused) startAutoFlip(); }

// Pause only when hovering over arrows
[prevBtn, nextBtn].forEach(el => {
    el.addEventListener('mouseenter', () => { hoverPaused = true; stopAutoFlip(); });
    el.addEventListener('mouseleave', () => { hoverPaused = false; startAutoFlip(); });
});

// Start auto flip
startAutoFlip();
</script>
<script>
const carousel = document.getElementById('productCarousel');
const prevArrow = document.getElementById('prevArrow');
const nextArrow = document.getElementById('nextArrow');

const scrollAmount = carousel.querySelector('.product-card').offsetWidth + 16; // card width + gap

nextArrow.addEventListener('click', ()=>{ carousel.scrollBy({ left:scrollAmount, behavior:'smooth' }); });
prevArrow.addEventListener('click', ()=>{ carousel.scrollBy({ left:-scrollAmount, behavior:'smooth' }); });
</script>
@endsection

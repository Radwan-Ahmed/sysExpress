@extends('layouts.customers')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Product List</h2>

    <div class="row g-4">
        @forelse($customers as $customer)
            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                <div class="card h-100 shadow border-0">
                    <!-- Image Background -->
                    @if($customer->image)
                    <img src="{{ asset('storage/' . $customer->image) }}"
                        class="card-img-top img-fluid"
                        style="height: 220px; object-fit: contain; background: #f8f9fa;">
                   @else
                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white"
                        style="height: 220px;">
                        No Image
                    </div>
                     @endif


                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $customer->name }}</h5>
                        <p class="card-text text-muted">{{ $customer->description }}</p>
                        @if(isset($customer->price))
                            <p class="fw-bold">💲 {{ number_format($customer->price, 2) }}</p>
                        @endif

                        <!-- Spacer pushes button to bottom -->
                        <div class="mt-auto">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary w-100">
                                ✏️ See Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No customers found.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $customers->links('pagination::bootstrap-5') }}
    </div>
</div>

<style>
/* Custom 5-column layout for large screens */
@media (min-width: 992px) {
    .col-lg-2-4 {
        flex: 0 0 20%;
        max-width: 20%;
    }
}
</style>
@endsection

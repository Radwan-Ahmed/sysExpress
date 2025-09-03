@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">➕ Add New Product</h2>

    <!-- Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
        @csrf

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter price" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" id="imageInput" class="form-control">

            {{-- Laravel validation error --}}
            @error('image')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            {{-- Client-side error message --}}
            <div id="imageError" class="text-danger small mt-1" style="display: none;"></div>
        </div>


        <div class="d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">⬅ Back</a>
            <button type="submit" class="btn btn-success">💾 Save Product</button>
        </div>
    </form>
</div>


<script>
document.getElementById('imageInput').addEventListener('change', function () {
    let file = this.files[0];
    let errorDiv = document.getElementById('imageError');

    if (file) {
        // Check size (20MB max for Laravel)
        if (file.size > 100 * 1024 * 1024) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = "⚠️ File too big! Max allowed is 20MB.";
            this.value = ''; // Clear the file input
        }
        // Also prevent >40MB (PHP limit)
        else if (file.size > 100 * 1024 * 1024) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = "⚠️ File too big! Absolute limit is 40MB.";
            this.value = '';
        }
        else {
            errorDiv.style.display = 'none';
        }
    }
});
</script>

@endsection

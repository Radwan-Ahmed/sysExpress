@extends('layouts.products')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">➕ Add Multiple Products</h2>

    <form action="{{ route('products.storeMultiple') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div id="products-wrapper">
            <div class="product-item border rounded p-3 mb-3 shadow-sm bg-light">
                <h5>Product 1</h5>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="products[0][name]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="products[0][description]" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="number" name="products[0][price]" class="form-control" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="products[0][image]" class="form-control">
                </div>

                <button type="button" class="btn btn-danger remove-item d-none">❌ Remove</button>
            </div>
        </div>

        <button type="button" id="addMore" class="btn btn-secondary mb-3">➕ Add More</button>
        <br>
        <button type="submit" class="btn btn-success">💾 Save All</button>
    </form>
</div>

<script>
    let index = 1;
    document.getElementById('addMore').addEventListener('click', function () {
        let wrapper = document.getElementById('products-wrapper');
        let newItem = `
        <div class="product-item border rounded p-3 mb-3 shadow-sm bg-light">
            <h5>Product ${index + 1}</h5>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="products[${index}][name]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="products[${index}][description]" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" name="products[${index}][price]" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="products[${index}][image]" class="form-control">
            </div>

            <button type="button" class="btn btn-danger remove-item">❌ Remove</button>
        </div>`;
        wrapper.insertAdjacentHTML('beforeend', newItem);
        index++;

        // Enable remove button
        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.classList.remove('d-none');
            btn.addEventListener('click', function () {
                this.parentElement.remove();
            });
        });
    });
</script>
@endsection

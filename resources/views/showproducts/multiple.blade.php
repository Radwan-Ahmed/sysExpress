@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add Multiple Products (No Image)</h2>

    <form action="{{ route('products.storeMultiple') }}" method="POST">
        @csrf
        <div id="productsWrapper">
            <div class="product-group mb-3 p-3 border rounded">
                <input type="text" name="products[0][name]" placeholder="Name" class="form-control mb-2" required>
                <input type="text" name="products[0][description]" placeholder="Description" class="form-control mb-2">
                <input type="number" step="0.01" name="products[0][price]" placeholder="Price" class="form-control mb-2" required>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" id="addProduct">+ Add Another Product</button>
        <button type="submit" class="btn btn-success">💾 Save All</button>
    </form>
</div>

<script>
let index = 1;
document.getElementById('addProduct').addEventListener('click', function() {
    let wrapper = document.getElementById('productsWrapper');
    let html = `
        <div class="product-group mb-3 p-3 border rounded">
            <input type="text" name="products[${index}][name]" placeholder="Name" class="form-control mb-2" required>
            <input type="text" name="products[${index}][description]" placeholder="Description" class="form-control mb-2">
            <input type="number" step="0.01" name="products[${index}][price]" placeholder="Price" class="form-control mb-2" required>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
    index++;
});
</script>
@endsection

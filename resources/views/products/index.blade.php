@extends('layouts.products')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Product List</h2>


    <!-- Top Buttons -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">➕ Add New Product</a>
    <a href="{{ route('products.create-multiple') }}" class="btn btn-info">➕➕ Add Multiple Products</a>
        <!-- Bulk Delete Form -->
 <form action="{{ route('products.bulkDelete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    <button type="submit" class="btn btn-danger" onclick="submitBulkDelete(event)">🗑️ Delete Selected</button>
</form>

    </div>

    <!-- Products Table -->
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price ($)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td><input type="checkbox" class="product-checkbox" value="{{ $product->id }}"></td>
  <td>
    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="60" class="rounded">
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>

                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>

                    <!-- Single Delete Form -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">❌ Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Bulk Delete Script -->
<script>
    // Select/Deselect all checkboxes
    document.getElementById("select-all").addEventListener("change", function() {
        const checkboxes = document.querySelectorAll(".product-checkbox");
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    // Submit bulk delete
    function submitBulkDelete(event) {
        event.preventDefault();
        const form = document.getElementById("bulkDeleteForm");

        // Remove old hidden inputs
        document.querySelectorAll("#bulkDeleteForm input[name='ids[]']").forEach(el => el.remove());

        // Collect selected IDs
        const selectedIds = Array.from(document.querySelectorAll(".product-checkbox:checked")).map(cb => cb.value);

        if (selectedIds.length === 0) {
            alert("Please select at least one product to delete.");
            return;
        }

        // Add hidden inputs for each ID
        selectedIds.forEach(id => {
            let hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = "ids[]";
            hidden.value = id;
            form.appendChild(hidden);
        });

        form.submit();
    }
</script>
@endsection

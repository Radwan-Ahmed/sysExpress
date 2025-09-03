
@extends('layouts.products')

@section('content')
<div class="container">
    <h2 class="mb-4">Add Multiple Gallery Items</h2>

    <form action="{{ route('gallery.storeMultiple') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div id="multiple-items">
            <div class="item border rounded p-3 mb-3 shadow-sm bg-light position-relative">
                <h5 class="mb-3">Item 1</h5>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="items[0][title]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="items[0][type]" class="form-control" required>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">File</label>
                    <input type="file" name="items[0][file]" class="form-control" required>
                </div>

                <!-- Delete button -->
                <button type="button" class="btn btn-danger btn-sm remove-item" style="position: absolute; top: 10px; right: 10px;">
                    ✕
                </button>
            </div>
        </div>

        <button type="button" id="addMore" class="btn btn-secondary mb-3">+ Add More</button>
        <br>
        <button type="submit" class="btn btn-success">Save All</button>
    </form>
</div>

<script>
    let index = 1;
    document.getElementById('addMore').addEventListener('click', function () {
        let container = document.getElementById('multiple-items');
        let newItem = `
        <div class="item border rounded p-3 mb-3 shadow-sm bg-light position-relative">
            <h5 class="mb-3">Item ${index + 1}</h5>

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="items[${index}][title]" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="items[${index}][type]" class="form-control" required>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">File</label>
                <input type="file" name="items[${index}][file]" class="form-control" required>
            </div>

            <!-- Delete button -->
            <button type="button" class="btn btn-danger btn-sm remove-item" style="position: absolute; top: 10px; right: 10px;">
                ✕
            </button>
        </div>
        `;
        container.insertAdjacentHTML('beforeend', newItem);
        index++;
    });

    // Event delegation for delete buttons
    document.getElementById('multiple-items').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.item').remove();
        }
    });
</script>
@endsection

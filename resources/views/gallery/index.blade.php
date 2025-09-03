
@extends('layouts.products')

@section('content')
<div class="container">
    <h1 class="mb-4">Gallery List</h1>

    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> ➕ Add New Media
            </a>
            <a href="{{ route('gallery.create-multiple') }}" class="btn btn-info text-white">
                <i class="bi bi-plus-square-dotted"></i>➕➕ Add Multiple Media
            </a>
        </div>

      <form id="bulkDeleteForm" action="{{ route('gallery.bulkDelete') }}" method="POST"
      onsubmit="return confirm('Are you sure to delete selected items?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        🗑️ Delete Selected
    </button>
</form>


    </div>

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0 align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th style="width:40px;">
                            <input type="checkbox" id="selectAll">
                        </th>
                        <th>Media</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th style="width:160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                        <tr>


                            <td>
                                <input type="checkbox" class="gallery-checkbox" name="ids[]" value="{{ $gallery->id }}" form="bulkDeleteForm">

                            </td>
                            <td>
                                @if($gallery->type == 'image')
                                    <img src="{{ asset('storage/' . $gallery->file) }}"
                                         alt="{{ $gallery->title }}"
                                         style="max-width:80px; max-height:80px; object-fit:cover;">
                                @else
                                    <video width="120" height="80" controls>
                                        <source src="{{ asset('storage/' . $gallery->file) }}" type="video/mp4">
                                        Your browser does not support video.
                                    </video>
                                @endif
                            </td>
                            <td>{{ $gallery->title }}</td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($gallery->type) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $gallery->id) }}"
                                   class="btn btn-warning btn-sm">
                                   <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No media found in gallery.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    // Select/Deselect all
    document.getElementById("selectAll").addEventListener("change", function () {
        const checkboxes = document.querySelectorAll(".gallery-checkbox");
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    // Handle bulk delete submit
    document.getElementById("bulkDeleteForm").addEventListener("submit", function (event) {
        // Remove old hidden inputs
        document.querySelectorAll("#bulkDeleteForm input[name='ids[]']").forEach(el => el.remove());

        // Collect selected checkboxes
        const selectedIds = Array.from(document.querySelectorAll(".gallery-checkbox:checked"))
                                .map(cb => cb.value);

        if (selectedIds.length === 0) {
            event.preventDefault();
            alert("Please select at least one item to delete.");
            return;
        }

        // Add hidden inputs
        selectedIds.forEach(id => {
            let hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = "ids[]";
            hidden.value = id;
            document.getElementById("bulkDeleteForm").appendChild(hidden);
        });
    });
</script>
@endsection

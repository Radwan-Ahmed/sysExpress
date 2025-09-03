@extends('layouts.products')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Gallery Item</h2>

    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="form-control" required>
        </div>

        <!-- Type -->
        <div class="mb-3">
            <label class="form-label">Type</label>
            <select name="type" id="mediaType" class="form-control" required>
                <option value="image" {{ $gallery->type == 'image' ? 'selected' : '' }}>Image</option>
                <option value="video" {{ $gallery->type == 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>

        <!-- Current File -->
        <div class="mb-3">
            <label class="form-label">Current File</label><br>
            @if($gallery->type == 'image')
                <img src="{{ asset('storage/' . $gallery->file) }}" width="150" id="currentPreview">
            @else
                <video width="200" controls id="currentPreview">
                    <source src="{{ asset('storage/' . $gallery->file) }}" type="video/mp4">
                </video>
            @endif
        </div>

        <!-- New File Upload -->
        <div class="mb-3">
            <label class="form-label">Replace File</label>
            <input type="file" name="file" id="fileInput" class="form-control">
        </div>

        <!-- Live Preview -->
        <div class="mb-3" id="newPreviewContainer" style="display:none;">
            <label class="form-label">New File Preview</label><br>
            <img id="newImagePreview" style="max-width:200px; display:none;" />
            <video id="newVideoPreview" width="200" controls style="display:none;">
                <source id="newVideoSource" src="" type="video/mp4">
            </video>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    document.getElementById("fileInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById("newPreviewContainer");
        const imagePreview = document.getElementById("newImagePreview");
        const videoPreview = document.getElementById("newVideoPreview");
        const videoSource  = document.getElementById("newVideoSource");

        if (file) {
            previewContainer.style.display = "block";

            if (file.type.startsWith("image/")) {
                imagePreview.style.display = "block";
                videoPreview.style.display = "none";
                imagePreview.src = URL.createObjectURL(file);
            } else if (file.type.startsWith("video/")) {
                videoPreview.style.display = "block";
                imagePreview.style.display = "none";
                videoSource.src = URL.createObjectURL(file);
                videoPreview.load();
            }
        } else {
            previewContainer.style.display = "none";
        }
    });
</script>
@endsection

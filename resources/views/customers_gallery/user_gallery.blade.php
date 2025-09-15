@extends('layouts.customers')
<title>@yield('title', 'Gallery')</title>
@section('title', 'Gallery')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">User Gallery</h2>

    @if($galleryItems->isEmpty())
        <p class="text-center text-muted">No gallery items available.</p>
    @else
        <div class="row">
            @foreach($galleryItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="media-wrapper" style="height: 250px; display: flex; align-items: center; justify-content: center; overflow: hidden; background-color: #f8f9fa;">
                            @if($item->type === 'image')
                                <img src="{{ asset('storage/'.$item->file) }}"
                                     alt="{{ $item->title }}"
                                     class="img-fluid gallery-item"
                                     style="max-height: 100%; max-width: 100%; cursor: pointer;"
                                     data-bs-toggle="modal"
                                     data-bs-target="#mediaModal"
                                     data-type="image"
                                     data-src="{{ asset('storage/'.$item->file) }}"
                                     data-title="{{ $item->title }}">
                            @elseif($item->type === 'video')
                                <video class="w-100 gallery-item" style="max-height: 100%; cursor: pointer;"
                                       data-bs-toggle="modal"
                                       data-bs-target="#mediaModal"
                                       data-type="video"
                                       data-src="{{ asset('storage/'.$item->file) }}"
                                       data-title="{{ $item->title }}"
                                       controls>
                                    <source src="{{ asset('storage/'.$item->file) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text text-muted">
                                {{ ucfirst($item->type) }} • {{ $item->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" aria-labelledby="mediaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center" style="min-height: 60vh; overflow: hidden;">
                <img id="modalImage" class="img-fluid d-none modal-zoom" alt="" style="max-height: 90vh; max-width: 100%;">
                <video id="modalVideo" class="w-100 d-none" controls style="max-height: 90vh;">
                    <source id="modalVideoSource" src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
/* Smooth zoom effect for image */
.modal-zoom {
    transform: scale(0.7);
    transition: transform 0.4s ease-in-out;
}

.modal.show .modal-zoom {
    transform: scale(1);
}
</style>
@endsection

@section('scripts')
<script>
const mediaModal = document.getElementById('mediaModal');

mediaModal.addEventListener('show.bs.modal', event => {
    const trigger = event.relatedTarget;
    const type = trigger.getAttribute('data-type');
    const src = trigger.getAttribute('data-src');
    const title = trigger.getAttribute('data-title');

    const modalTitle = mediaModal.querySelector('.modal-title');
    const modalImage = document.getElementById('modalImage');
    const modalVideo = document.getElementById('modalVideo');
    const modalVideoSource = document.getElementById('modalVideoSource');

    modalTitle.textContent = title;

    if(type === 'image') {
        modalVideo.classList.add('d-none');
        modalVideo.pause();

        modalImage.src = src;
        modalImage.classList.remove('d-none');
    } else if(type === 'video') {
        modalImage.classList.add('d-none');

        modalVideoSource.src = src;
        modalVideo.load();
        modalVideo.classList.remove('d-none');
    }
});

mediaModal.addEventListener('hidden.bs.modal', () => {
    const modalVideo = document.getElementById('modalVideo');
    modalVideo.pause();
});
</script>
@endsection

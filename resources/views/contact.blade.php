@extends('layouts.customers')
@section('title', 'Contact Us')
<title>@yield('title', 'Contact Us')</title>
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

              @if(session('success'))
        <div id="success-alert"
             class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3 shadow"
             style="z-index: 1050; width: auto; min-width: 250px; text-align:center;">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                let alertBox = document.getElementById("success-alert");
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-4">
                    <h3 class="text-center text-success mb-4">📩 Contact Us</h3>

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Enter your name" value="{{ old('name') }}">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Enter your email" value="{{ old('email') }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="5"
                                      class="form-control @error('message') is-invalid @enderror"
                                      placeholder="Write your message here...">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold">Send Message</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Our Services</h1>
    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 mb-3">
                <div class="card shadow rounded-3">
                    <div class="card-body text-center">
                        <h5>{{ $service->icon }} {{ $service->name }}</h5>
                        <p>{{ Str::limit($service->description, 80) }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="btn btn-success">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $service->icon }} {{ $service->name }}</h1>
    <p>{{ $service->description ?? 'Details coming soon.' }}</p>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">← Back to Services</a>
</div>
@endsection

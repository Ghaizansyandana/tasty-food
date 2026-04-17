@extends('layouts.app')

@section('content')
<div class="bg-hero">
    <div class="container">
        <h1 class="display-4">GALERI KAMI</h1>
    </div>
</div>

<div class="container my-5">
    @auth
        @if(Auth::user()->role === 'admin')
            <div class="mb-4">
                <a href="{{ route('admin.galleries.create', ['is_carousel' => 1]) }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3 me-2">
                    <i class="bi bi-plus-circle pe-1"></i> Tambah Foto Slide
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3">
                    <i class="bi bi-pencil-square pe-1"></i> Kelola Foto Slide
                </a>
            </div>
        @endif
    @endauth

    <div id="galleryCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4 shadow">
            @forelse($carouselImages as $index => $item)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    @php
                        $galBase = str_contains($item->image, 'galeri') ? asset('images/' . $item->image) : (str_contains($item->image, '/') ? asset('storage/' . $item->image) : asset('storage/galleries/' . $item->image));
                    @endphp
                    <img src="{{ $galBase }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Gallery Slide">
                </div>
            @empty
                <div class="carousel-item active">
                    <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Default Slide">
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
        </button>
    </div>

    <div class="row g-3">
        @foreach($galleries as $item)
        <div class="col-6 col-md-3">
            <div class="ratio ratio-1x1 overflow-hidden rounded-4 shadow-sm gallery-hover">
                @php
                    $galGrid = str_contains($item->image, 'galeri') ? asset('images/' . $item->image) : (str_contains($item->image, '/') ? asset('storage/' . $item->image) : asset('storage/galleries/' . $item->image));
                @endphp
                <img src="{{ $galGrid }}" class="img-fluid object-fit-cover w-100 h-100" alt="Gallery Image">
            </div>
        </div>
        @endforeach
    </div>

    @auth
        @if(Auth::user()->role === 'admin')
            <div class="text-center mt-5">
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3">
                    <i class="bi bi-plus-circle pe-1"></i> Tambah Foto Galeri
                </a>
            </div>
        @endif
    @endauth
</div>

<style>
    .gallery-hover img {
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .gallery-hover:hover img {
        transform: scale(1.1);
    }
    .form-control {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 10px;
    }
</style>
@endsection
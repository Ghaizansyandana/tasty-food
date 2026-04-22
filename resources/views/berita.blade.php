@extends('layouts.app')
@section('title', 'Berita Kami')

@section('content')
<div class="bg-hero">
    <div class="container">
        <h1 class="display-4">BERITA KAMI</h1>
    </div>
</div>

<div class="container my-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="{{ asset('images/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}" class="img-fluid rounded-4 shadow-sm w-100" style="height: 480px; object-fit: cover;" alt="Main News">
        </div>
        <div class="col-md-6 px-lg-5">
            <h2 class="fw-bold mb-4" style="color: #111;">APA SAJA MAKANAN KHAS<br>NUSANTARA?</h2>
            
            <p class="text-muted mb-4" style="line-height: 1.8; font-size: 14.5px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
            </p>
            
            <p class="text-muted mb-5" style="line-height: 1.8; font-size: 14.5px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
            </p>
            
            <button class="btn btn-black fw-bold px-4 py-3" style="font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;">BACA SELENGKAPNYA</button>
        </div>
    </div>

    <h4 class="mb-4">BERITA LAINNYA</h4>
    <div class="row g-4">
        @forelse ($news as $item)
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                @if($item->image)
                    @php
                        $itemImg = str_contains($item->image, 'berita') ? asset('images/' . $item->image) : (str_contains($item->image, '/') ? asset('storage/' . $item->image) : asset('storage/news/' . $item->image));
                    @endphp
                    <img src="{{ $itemImg }}" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;" alt="{{ $item->title }}">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;" alt="No Image">
                @endif
                <div class="card-body">
                    <h6 class="fw-bold text-uppercase">{{ $item->title }}</h6>
                    <p class="small text-muted">{{ Str::limit($item->excerpt, 80) }}</p>
                    <a href="{{ route('berita.show', $item->slug) }}" class="text-warning text-decoration-none small">Baca selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada berita terbaru.</p>
        </div>
        @endforelse
    </div>
            </div>
        @auth
            @if(Auth::user()->role === 'admin')
                <div class="text-center mt-5">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3 me-2">
                        <i class="bi bi-plus-circle pe-1"></i> Tambah Berita
                    </a>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3">
                        <i class="bi bi-pencil-square pe-1"></i> Kelola Berita
                    </a>
                </div>
            @endif
        @endauth
    </div>
    
    <div class="mt-5 d-flex justify-content-center">
        {{ $news->links() }}
    </div>
</div>
@endsection
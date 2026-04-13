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
        @php
            $newsImages = [
                'images/sanket-shah-SVA7TyHxojY-unsplash.jpg',
                'images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
                'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
                'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg',
                'images/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
                'images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
                'images/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
                'images/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg',
            ];
        @endphp
        @foreach ($newsImages as $img)
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <img src="{{ asset($img) }}" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;" alt="Berita">
                <div class="card-body">
                    <h6 class="fw-bold">LOREM IPSUM</h6>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="text-warning text-decoration-none small">Baca selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
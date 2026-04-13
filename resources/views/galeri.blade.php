@extends('layouts.app')

@section('content')
<div class="bg-hero">
    <div class="container">
        <h1 class="display-4">GALERI KAMI</h1>
    </div>
</div>

<div class="container my-5">
    <div id="galleryCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded-4 shadow">
            <div class="carousel-item active">
                <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Salmon Dish">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" class="d-block w-100" style="height: 500px; object-fit: cover;" alt="Salad Dish">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-control="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-control="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
        </button>
    </div>

    <div class="row g-3">
        @php 
            $galleryImages = [
                'images/anh-nguyen-kcA-c3f_3FE-unsplash.jpg',
                'images/anna-pelzer-IGfIGP5ONV0-unsplash.jpg',
                'images/brooke-lark-nBtmglfY0HU-unsplash.jpg',
                'images/brooke-lark-oaz0raysASk-unsplash.jpg',
                'images/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
                'images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
                'images/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
                'images/jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
                'images/luisa-brimble-HvXEbkcXjSk-unsplash.jpg',
                'images/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg',
                'images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg',
                'images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg',
            ];
        @endphp
        @foreach($galleryImages as $img)
        <div class="col-6 col-md-3">
            <div class="ratio ratio-1x1 overflow-hidden rounded-4 shadow-sm gallery-hover">
                <img src="{{ asset($img) }}" class="img-fluid object-fit-cover w-100 h-100" alt="Gallery">
            </div>
        </div>
        @endforeach
    </div>
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
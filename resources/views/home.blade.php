@extends('layouts.app')

@section('hide_layout_navbar', true)

@section('content')
<style>
    /* Navbar Styles */
    .navbar-custom {
        background: transparent;
        padding: 25px 0;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }
    .navbar-brand-custom {
        font-size: 18px;
        font-weight: 700;
        color: #111;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        text-decoration: none;
    }
    .navbar-nav-custom {
        display: flex;
        gap: 25px;
        align-items: center;
        list-style: none;
        margin: 0 0 0 40px;
        padding: 0;
    }
    .nav-link-custom {
        color: #111;
        text-decoration: none;
        font-size: 11px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        transition: color 0.3s ease;
    }
    .nav-link-custom:hover,
    .nav-link-custom.active {
        color: #666;
    }

    /* Hero Section */
    .hero-home {
        background: #f8f9fa; /* Light grey background */
        min-height: 100vh;
        padding: 140px 0 60px;
        position: relative;
        overflow: hidden;
    }
    .hero-content {
        padding-top: 80px;
        max-width: 500px;
    }
    .hero-line {
        width: 60px;
        height: 3px;
        background: #111;
        margin-bottom: 40px;
    }
    .hero-content h1 {
        font-size: 52px;
        letter-spacing: 0.02em;
        font-weight: 300;
        color: #111;
        margin-bottom: 30px;
        line-height: 1.1;
    }
    .hero-content h1 .bold {
        font-weight: 900;
        display: block;
    }
    .hero-content p {
        color: #111;
        font-size: 14px;
        line-height: 1.9;
        margin-bottom: 40px;
        max-width: 420px;
    }
    .btn-black-solid {
        background: #111;
        color: #fff;
        padding: 16px 40px;
        font-size: 12px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-black-solid:hover {
        background: #333;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    .hero-img-container {
        position: absolute;
        top: 50%;
        right: -10%;
        transform: translateY(-50%);
        width: 60%;
        max-width: 800px;
        z-index: 10;
        display: flex;
        justify-content: flex-end;
    }
    .hero-img-container img {
        width: 100%;
        max-width: 100%;
        height: auto;
        object-fit: contain;
    }

    /* About Section */
    .about-section {
        padding: 100px 0;
        text-align: center;
        background: #fff;
    }
    .about-section h2 {
        font-size: 28px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 25px;
        color: #111;
    }
    .about-section p {
        color: #666;
        font-size: 15px;
        max-width: 700px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }
    .about-line {
        width: 80px;
        height: 3px;
        background: #ddd;
        margin: 0 auto;
    }

    /* Cards Strip Section */
    .cards-strip {
        padding: 120px 0 80px;
        background-image: url('{{ asset('images/Group 70.png') }}');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .cards-strip::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, rgba(0,0,0,0.75), rgba(0,0,0,0.4));
    }
    .cards-strip .container {
        position: relative;
        z-index: 1;
    }
    .strip-card {
        background: #fff;
        border-radius: 20px;
        overflow: visible;
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        text-align: center;
        position: relative;
        padding-top: 70px;
        margin-bottom: 40px;
        transition: transform 0.3s ease;
    }
    .strip-card:hover {
        transform: translateY(-10px);
    }
    .strip-card .media {
        width: 120px;
        height: 120px;
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 50%;
        border: 5px solid #fff;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        overflow: hidden;
        background: #fff;
    }
    .strip-card .media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .strip-card .body {
        padding: 30px 25px;
    }
    .strip-card h4 {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 15px;
        letter-spacing: 0.05em;
        color: #111;
    }
    .strip-card p {
        font-size: 13px;
        color: #666;
        line-height: 1.6;
        margin: 0;
    }

    /* News Section */
    .news-section {
        padding: 100px 0;
        background: #f9fafb;
    }
    .news-section h2 {
        font-size: 28px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-weight: 700;
        text-align: center;
        margin-bottom: 60px;
        color: #111;
    }
    .news-card-large {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        height: 100%;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .news-card-large:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.1);
    }
    .news-card-large .media {
        height: 380px;
        overflow: hidden;
    }
    .news-card-large .media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .news-card-large:hover .media img {
        transform: scale(1.05);
    }
    .news-card-large .body {
        padding: 35px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .news-card-large h4 {
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 20px;
        line-height: 1.4;
        color: #111;
        letter-spacing: 0.02em;
    }
    .news-card-large p {
        font-size: 13px;
        color: #666;
        line-height: 1.7;
        margin-bottom: 30px;
    }
    .news-card-small {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .news-card-small:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }
    .news-card-small .media {
        height: 180px;
        overflow: hidden;
    }
    .news-card-small .media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .news-card-small:hover .media img {
        transform: scale(1.05);
    }
    .news-card-small .body {
        padding: 25px 20px;
        text-align: left;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .news-card-small h5 {
        font-size: 15px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 15px;
        color: #111;
        letter-spacing: 0.02em;
    }
    .news-card-small p {
        font-size: 11px;
        color: #666;
        line-height: 1.7;
        margin-bottom: 25px;
    }
    .link-yellow {
        color: #f59e0b;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.05em;
        transition: color 0.3s ease;
    }
    .link-yellow:hover {
        color: #d97706;
    }

    /* Gallery Section */
    .gallery-section {
        padding: 100px 0;
        background: #fff;
        text-align: center;
    }
    .gallery-section h2 {
        font-size: 28px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 60px;
        color: #111;
    }
    .gallery-item {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        height: 280px;
        margin-bottom: 30px;
        transition: transform 0.3s ease;
    }
    .gallery-item:hover {
        transform: scale(1.02);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }

    @media (max-width: 991px) {
        .hero-home {
            min-height: auto;
            padding: 100px 0 400px;
        }
        .hero-img-container {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 400px;
            top: auto;
            right: auto;
        }
        .hero-content {
            padding-top: 80px;
        }
        .hero-content h1 {
            font-size: 40px;
        }
        .navbar-nav-custom {
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 32px;
        }
        .strip-card {
            margin-bottom: 80px;
        }
        .news-card-small {
            margin-bottom: 20px;
        }
        .gallery-item {
            height: 220px;
        }
        .navbar-nav-custom {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>

@php
    $galleryImages = [
        'images/anh-nguyen-kcA-c3f_3FE-unsplash.jpg',
        'images/anna-pelzer-IGfIGP5ONV0-unsplash.jpg',
        'images/brooke-lark-1Rm9GLHV0UA-unsplash.jpg',
        'images/brooke-lark-nBtmglfY0HU-unsplash.jpg',
        'images/ella-olsson-mmnKI8kMxpc-unsplash.jpg',
        'images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
    ];
@endphp

{{-- Navbar --}}
<nav class="navbar-custom">
    <div class="container">
        <div class="d-flex align-items-center">
            <a href="{{ route('welcome') }}" class="navbar-brand-custom">TASTY FOOD</a>
            <ul class="navbar-nav-custom d-none d-md-flex">
                <li><a href="{{ route('home') }}" class="nav-link-custom active">HOME</a></li>
                <li><a href="{{ route('tentang') }}" class="nav-link-custom">TENTANG</a></li>
                <li><a href="{{ route('berita.index') }}" class="nav-link-custom">BERITA</a></li>
                <li><a href="{{ route('galeri') }}" class="nav-link-custom">GALERI</a></li>
                <li><a href="{{ route('kontak') }}" class="nav-link-custom">KONTAK</a></li>
                                    @guest
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-3 d-none d-lg-block" href="{{ route('register') }}">DAFTAR</a></li>
                        <li class="nav-item"><a class="nav-link btn-black ms-lg-2 px-4 shadow-sm" href="{{ route('login') }}" style="color: white !important;">LOGIN</a></li>
                    @else
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle btn-profile-custom px-3 py-2 d-flex align-items-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                                <div class="profile-icon-circle">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 animated-fade-in" aria-labelledby="profileDropdown">
                                <li><h6 class="dropdown-header text-dark fw-bold">Halo, {{ Auth::user()->name }}!</h6></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear"></i> Pengaturan Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger">
                                            <i class="bi bi-box-arrow-right"></i> Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
            </ul>
        </div>
        <button class="d-md-none border-0 bg-transparent p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
            <span style="font-size: 20px;">&#9776;</span>
        </button>
    </div>
</nav>

{{-- Mobile Menu Offcanvas --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">MENU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li class="mb-3"><a href="{{ route('home') }}" class="text-decoration-none text-dark fw-bold">HOME</a></li>
            <li class="mb-3"><a href="{{ route('tentang') }}" class="text-decoration-none text-dark fw-bold">TENTANG</a></li>
            <li class="mb-3"><a href="{{ route('berita.index') }}" class="text-decoration-none text-dark fw-bold">BERITA</a></li>
            <li class="mb-3"><a href="{{ route('galeri') }}" class="text-decoration-none text-dark fw-bold">GALERI</a></li>
            <li class="mb-3"><a href="{{ route('kontak') }}" class="text-decoration-none text-dark fw-bold">KONTAK</a></li>
            
        </ul>
    </div>
</div>

{{-- Hero Section --}}
<section class="hero-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="hero-line"></div>
                    <h1>{!! str_replace('TASTY FOOD', '<span class="bold">TASTY FOOD</span>', $settings['home_hero_title'] ?? 'HEALTHY <br> TASTY FOOD') !!}</h1>
                    <p>{{ $settings['home_hero_description'] ?? 'Lorem ipsum dolor sit amet...' }}</p>
                    <a href="{{ route('tentang') }}" class="btn-black-solid">TENTANG KAMI</a>
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.website_settings.index') }}" class="btn btn-sm btn-warning mb-3 shadow-sm rounded-pill px-3">
                                <i class="bi bi-pencil-square pe-1"></i> Edit Landing Page
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="hero-img-container d-none d-lg-flex">
        <img src="{{ asset('images/img-4-2000x2000.png') }}" alt="Healthy Tasty Food">
    </div>
</section>

{{-- About Section --}}
<section class="about-section">
    <div class="container">
        <h2>Tentang Kami</h2>
        <p>{{ $settings['home_about_description'] ?? 'Lorem ipsum dolor sit amet...' }}</p>
        <div class="about-line"></div>
        @auth
            @if(Auth::user()->role === 'admin')
                <div class="mt-4">
                    <a href="{{ route('admin.website_settings.index') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3">
                        <i class="bi bi-pencil-square pe-1"></i> Edit Deskripsi
                    </a>
                </div>
            @endif
        @endauth
    </div>
</section>

{{-- Cards Strip Section --}}
<section class="cards-strip">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($cards as $card)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="strip-card">
                    <div class="media">
                        <img src="{{ str_contains($card->image, 'images/') ? asset($card->image) : asset('storage/' . $card->image) }}" alt="{{ $card->title }}">
                    </div>
                    <div class="body">
                        <h4>{{ $card->title }}</h4>
                        <p>{{ $card->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @auth
            @if(Auth::user()->role === 'admin')
                <div class="text-center mt-4">
                    <a href="{{ route('admin.home_cards.create') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3 me-2">
                        <i class="bi bi-plus-circle pe-1"></i> Tambah Card
                    </a>
                    <a href="{{ route('admin.home_cards.index') }}" class="btn btn-sm btn-warning shadow-sm rounded-pill px-3">
                        <i class="bi bi-pencil-square pe-1"></i> Kelola Card
                    </a>
                </div>
            @endif
        @endauth
    </div>
</section>

{{-- News Section --}}
<section class="news-section">
    <div class="container">
        <h2>Berita Kami</h2>
        <div class="row g-4">
            @php $featured = $news->shift(); @endphp
            @if($featured)
            <div class="col-lg-6">
                <div class="news-card-large">
                    <div class="media">
                        @php
                            $featuredImg = str_contains($featured->image, 'berita') ? asset('images/' . $featured->image) : (str_contains($featured->image, '/') ? asset('storage/' . $featured->image) : asset('storage/news/' . $featured->image));
                        @endphp
                        <img src="{{ $featuredImg }}" alt="{{ $featured->title }}">
                    </div>
                    <div class="body">
                        <h4>{{ $featured->title }}</h4>
                        <p>{{ Str::limit($featured->excerpt, 250) }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <a href="{{ route('berita.show', $featured->slug) }}" class="link-yellow text-capitalize" style="font-size: 11px;">Baca selengkapnya</a>
                            <span class="text-muted fw-bold" style="letter-spacing: 2px; line-height: 1;">...</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-6">
                <div class="row g-4">
                    @forelse($news as $item)
                    <div class="col-6">
                        <div class="news-card-small">
                            <div class="media">
                                @php
                                    $itemImg = str_contains($item->image, 'berita') ? asset('images/' . $item->image) : (str_contains($item->image, '/') ? asset('storage/' . $item->image) : asset('storage/news/' . $item->image));
                                @endphp
                                <img src="{{ $itemImg }}" alt="{{ $item->title }}">
                            </div>
                            <div class="body">
                                <h5>{{ $item->title }}</h5>
                                <p>{{ Str::limit($item->excerpt, 100) }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="{{ route('berita.show', $item->slug) }}" class="link-yellow text-capitalize" style="font-size: 11px;">Baca selengkapnya</a>
                                    <span class="text-muted fw-bold" style="letter-spacing: 2px; line-height: 1;">...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12">
                            <p class="text-muted">Belum ada berita lainnya.</p>
                        </div>
                    @endforelse
                </div>
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
</section>

{{-- Gallery Section --}}
<section class="gallery-section">
    <div class="container">
        <h2>Galeri Kami</h2>
        <div class="row g-4">
            @foreach($galleries as $item)
            <div class="col-lg-4 col-md-6">
                <div class="gallery-item">
                    @php
                        $galImg = str_contains($item->image, 'galeri') ? asset('images/' . $item->image) : (str_contains($item->image, '/') ? asset('storage/' . $item->image) : asset('storage/galleries/' . $item->image));
                    @endphp
                    <img src="{{ $galImg }}" alt="Gallery Image">
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ route('galeri') }}" class="btn-black-solid mt-5">Lihat Lebih Banyak</a>
    </div>
</section>

@endsection
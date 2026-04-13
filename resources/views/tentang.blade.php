@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary: #f59e0b;
        --dark: #111827;
        --light-bg: #f9fafb;
        --text-main: #374151;
        --text-muted: #6b7280;
        --radius: 16px;
        --shadow-sm: 0 4px 6px -1px rgba(0,0,0,0.08);
        --shadow-lg: 0 20px 40px -10px rgba(0,0,0,0.12);
    }

    /* ─── Hero ─── */
    .hero-about {
        background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
                    url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=1470')
                    center / cover no-repeat;
        padding: 120px 0 70px;
        color: #fff;
    }

    .hero-about h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin: 0;
    }

    .hero-about p {
        font-size: 1rem;
        opacity: 0.8;
        margin-top: 12px;
    }

    /* ─── Sections ─── */
    .section { padding: 80px 0; }
    .section-alt { background: var(--light-bg); }

    .section-label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--primary);
        margin-bottom: 10px;
    }

    .section-title {
        font-size: 32px;
        font-weight: 800;
        color: #111;
        text-transform: uppercase;
        line-height: 1.2;
        margin: 0 0 25px;
    }

    .text-body {
        font-size: 15px;
        line-height: 1.85;
        color: var(--text-main);
        margin-bottom: 16px;
        text-align: justify;
    }

    /* ─── Grid & Images ─── */
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .img-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .img-card {
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        transition: transform 0.3s ease;
    }

    .img-card:hover { transform: translateY(-6px); }

    .img-card img {
        width: 100%;
        height: 380px;
        object-fit: cover;
        display: block;
    }

    /* ─── Visi Misi ─── */
    .vm-list { display: flex; flex-direction: column; gap: 24px; }

    .vm-card {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 32px;
        background: #fff;
        padding: 32px;
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        align-items: center;
    }

    .vm-card.reverse { grid-template-columns: 1.3fr 1fr; }

    .vm-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: var(--primary);
        margin: 0 0 14px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .vm-card img {
        width: 100%;
        height: 260px;
        border-radius: 12px;
        object-fit: cover;
    }

    /* ─── Responsive ─── */
    @media (max-width: 768px) {
        .grid-2,
        .vm-card,
        .vm-card.reverse { grid-template-columns: 1fr; }

        .vm-card.reverse img { order: -1; }

        .section { padding: 56px 0; }
    }
</style>

{{-- Hero --}}
<div class="hero-about">
    <div class="container text-center">
        <h1>Tentang Kami</h1>
        <p>Kenalan lebih dekat dengan cerita di balik Tasty Food</p>
    </div>
</div>

{{-- Profil --}}
<section class="section">
    <div class="container">
        <div class="grid-2">
            <div>
                <h2 class="section-title">TASTY FOOD</h2>
                <p class="text-body fw-bold text-dark mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                </p>
                <p class="text-body text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                </p>
            </div>
            <div class="img-grid">
                <div class="img-card shadow-sm" style="box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" alt="Foto Makanan">
                </div>
                <div class="img-card shadow-sm" style="box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="Foto Chef">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Visi & Misi --}}
<section class="section section-alt">
    <div class="container">
        <div class="vm-list">

            {{-- Visi --}}
            <div class="vm-card">
                <img src="{{ asset('images/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}" alt="Visi Kami">
                <div>
                    <h3>Visi Kami</h3>
                    <p class="text-body">
                        Menjadi restoran rujukan utama yang dikenal karena kualitas rasa, inovasi menu, dan standar
                        pelayanan terbaik di Indonesia — sekaligus mempromosikan kekayaan rempah lokal ke kancah
                        internasional.
                    </p>
                </div>
            </div>

            {{-- Misi --}}
            <div class="vm-card reverse">
                <div>
                    <h3>Misi Kami</h3>
                    <p class="text-body">
                        Menjaga standar kualitas bahan pangan terbaik dalam setiap hidangan, terus berkreasi
                        menciptakan menu unik tanpa kehilangan identitas rasa asli, serta memberikan pengalaman
                        makan yang nyaman dan berkesan bagi setiap tamu.
                    </p>
                </div>
                <img src="{{ asset('images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="Misi Kami">
            </div>

        </div>
    </div>
</section>

@endsection
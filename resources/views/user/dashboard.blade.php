@extends('layouts.app')

@section('title', 'User Dashboard')
@section('hide_layout_navbar', true)

@section('content')
<style>
    .dashboard-container {
        padding: 80px 0;
    }
    .user-badge {
        background: #28a745;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .dashboard-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }
    .profile-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: #666;
        margin: 0 auto 20px;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="user-badge">User</span>
                <h1 class="mt-2">Dashboard User</h1>
                <p class="text-muted">Selamat datang, {{ Auth::user()->name }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="profile-img">
                        <i class="bi bi-person"></i>
                    </div>
                    <h4>{{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <p class="text-muted">Member sejak {{ Auth::user()->created_at->format('d M Y') }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark mt-3 w-100">Edit Profil</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dashboard-card">
                    <h4>Menu User</h4>
                    <div class="row mt-3">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('berita.index') }}" class="btn btn-dark w-100 py-3">Lihat Berita</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('galeri') }}" class="btn btn-dark w-100 py-3">Lihat Galeri</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('tentang') }}" class="btn btn-outline-dark w-100 py-3">Tentang Kami</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('kontak') }}" class="btn btn-outline-dark w-100 py-3">Kontak</a>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-dark w-100 py-3">Lihat Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<style>
    .dashboard-container {
        padding: 80px 0;
    }
    .admin-badge {
        background: #dc3545;
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
    .stats-number {
        font-size: 36px;
        font-weight: 700;
        color: #111;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="admin-badge">Admin</span>
                <h1 class="mt-2">Dashboard Admin</h1>
                <p class="text-muted">Selamat datang, {{ Auth::user()->name }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark">Edit Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $userCount }}</div>
                    <p class="text-muted mb-0">Total Users</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $newsCount }}</div>
                    <p class="text-muted mb-0">Total Berita</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $galleryCount }}</div>
                    <p class="text-muted mb-0">Total Galeri</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $galleryCount }}</div>
                    <p class="text-muted mb-0">Total Kontak</p>
                </div>
            </div>
        </div>

        <div class="dashboard-card mt-4">
            <h4>Menu Admin</h4>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-dark w-100 py-3">Kelola Users</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-dark w-100 py-3">Kelola Berita</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-dark w-100 py-3">Kelola Galeri</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-dark w-100 py-3">Kelola Tentang</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.company_profile.edit') }}" class="btn btn-dark w-100 py-3">Kelola Profil</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.website_settings.index') }}" class="btn btn-dark w-100 py-3">Kelola Landing Page</a>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="{{ route('admin.home_cards.index') }}" class="btn btn-dark w-100 py-3">Kelola Landing Cards</a>
                </div>
                <div class="col-md-6 mb-3">
                      <a href="{{ route('admin.galleries.index') }}" class="btn btn-dark w-100 py-3">Kelola Kontak</a>
                </div>
                <div class="col-md-12 mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark w-100 py-3">Lihat Website</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

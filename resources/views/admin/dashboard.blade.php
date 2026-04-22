@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('hide_layout_navbar', true)

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
            <div class="col-md-3">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $userCount }}</div>
                    <p class="text-muted mb-0">Total Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $newsCount }}</div>
                    <p class="text-muted mb-0">Total Berita</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $galleryCount }}</div>
                    <p class="text-muted mb-0">Total Galeri</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card text-center">
                    <div class="stats-number">{{ $contactCount }}</div>
                    <p class="text-muted mb-0">Pesan Masuk</p>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <div class="dashboard-card text-center bg-warning text-white">
                    <div class="stats-number text-white">{{ $uniqueVisitors }}</div>
                    <p class="mb-0 fw-bold">Total Pengunjung (Unik)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center bg-dark text-white">
                    <div class="stats-number text-white">{{ $totalHits }}</div>
                    <p class="mb-0 fw-bold">Total Kunjungan (Hits)</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card text-center" style="background: #ef4444; color: white;">
                    <div class="stats-number text-white">{{ $returningVisitors }}</div>
                    <p class="mb-0 fw-bold">Pengunjung Lama (Bulak-balik)</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-5 mb-4">
                <div class="dashboard-card pt-4 h-100">
                    <h5 class="mb-4 text-center fw-bold">Distribusi Data</h5>
                    <div style="height: 220px; position: relative;">
                        <canvas id="distributionChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mb-4">
                <div class="dashboard-card pt-4 h-100">
                    <h5 class="mb-4 fw-bold">Tren Konten Baru</h5>
                    <div style="height: 220px;">
                        <canvas id="growthChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-card mt-2">
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
                      <a href="{{ route('admin.contacts.index') }}" class="btn btn-dark w-100 py-3">Kelola Kontak</a>
                </div>
                <div class="col-md-12 mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark w-100 py-3">Lihat Website</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Distribution Chart (Doughnut for aesthetics)
    const ctxDist = document.getElementById('distributionChart').getContext('2d');
    new Chart(ctxDist, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($chartData['labels']) !!},
            datasets: [{
                data: {!! json_encode($chartData['data']) !!},
                backgroundColor: [
                    '#f59e0b', // Amber (Users)
                    '#111111', // Dark (News)
                    '#ef4444', // Red (Gallery)
                    '#3b82f6', // Blue (Contacts)
                    '#10b981'  // Green (Unique Vis.)
                ],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 12, family: 'Poppins' }
                    }
                }
            }
        }
    });

    // Growth Chart (Line with Gradient)
    const ctxGrowth = document.getElementById('growthChart').getContext('2d');
    const gradient = ctxGrowth.createLinearGradient(0, 0, 0, 200);
    gradient.addColorStop(0, 'rgba(245, 158, 11, 0.4)');
    gradient.addColorStop(1, 'rgba(245, 158, 11, 0)');

    new Chart(ctxGrowth, {
        type: 'line',
        data: {
            labels: {!! json_encode($growthChart['labels']) !!},
            datasets: [
                {
                    label: 'Postingan Baru',
                    data: {!! json_encode($growthChart['data']) !!},
                    borderColor: '#111',
                    borderWidth: 2,
                    backgroundColor: 'transparent',
                    fill: false,
                    tension: 0.4,
                    pointBackgroundColor: '#111',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                },
                {
                    label: 'Pengunjung Baru',
                    data: {!! json_encode($growthChart['visitorData']) !!},
                    borderColor: '#f59e0b',
                    borderWidth: 3,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#f59e0b',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { 
                    display: true,
                    labels: {
                        usePointStyle: true,
                        font: { family: 'Poppins' }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f0f0f0' },
                    ticks: { stepSize: 1, font: { family: 'Poppins' } }
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { family: 'Poppins' } }
                }
            }
        }
    });
</script>
@endpush

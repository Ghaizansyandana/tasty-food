@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<style>
    .dashboard-container {
        padding: 80px 0;
        min-height: 100vh;
    }
    .profile-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        max-width: 600px;
        margin: 0 auto;
    }
    .btn-dark {
        background-color: #111;
        border-color: #111;
    }
    .btn-dark:hover {
        background-color: #333;
        border-color: #333;
    }
</style>

<div class="dashboard-container">
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center mb-4" style="max-width: 600px; margin: 0 auto;">
            <h1 class="mb-0" style="font-size: 28px;">Edit Profil</h1>
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">Kembali</a>
            @else
                <a href="{{ route('user.dashboard') }}" class="btn btn-outline-dark">Kembali</a>
            @endif
        </div>

        <div class="profile-card">
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <hr class="my-4">
                <h5 class="mb-3">Ubah Password (Opsional)</h5>
                <p class="text-muted small">Kosongkan input di bawah ini jika tidak ingin mengubah password Anda.</p>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <button type="submit" class="btn btn-dark w-100 mt-4 py-3 font-weight-bold">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection

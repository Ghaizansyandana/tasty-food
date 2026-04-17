@extends('layouts.app')

@section('title', 'Kelola Profil Perusahaan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Kelola Profil Perusahaan</h1>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Kembali ke Dashboard</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4 p-4">
                <form action="{{ route('admin.company_profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Nama Restoran / Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $profile->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="desc_bold" class="form-label fw-semibold">Deskripsi (Bold/Tebal)</label>
                                <textarea class="form-control @error('desc_bold') is-invalid @enderror" id="desc_bold" name="desc_bold" rows="6">{{ old('desc_bold', $profile->desc_bold) }}</textarea>
                                @error('desc_bold')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="desc_muted" class="form-label fw-semibold">Deskripsi (Muted/Abu-abu)</label>
                                <textarea class="form-control @error('desc_muted') is-invalid @enderror" id="desc_muted" name="desc_muted" rows="6">{{ old('desc_muted', $profile->desc_muted) }}</textarea>
                                @error('desc_muted')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="image1" class="form-label fw-semibold">Gambar 1 (Kiri)</label>
                                <div class="mb-2">
                                    <img src="{{ str_contains($profile->image1, 'images/') ? asset($profile->image1) : asset('storage/' . $profile->image1) }}" class="rounded-3" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" id="image1" name="image1">
                                @error('image1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="image2" class="form-label fw-semibold">Gambar 2 (Kanan)</label>
                                <div class="mb-2">
                                    <img src="{{ str_contains($profile->image2, 'images/') ? asset($profile->image2) : asset('storage/' . $profile->image2) }}" class="rounded-3" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                                <input type="file" class="form-control @error('image2') is-invalid @enderror" id="image2" name="image2">
                                @error('image2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary py-3 fw-bold rounded-3">Perbarui Profil Perusahaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

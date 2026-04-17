@extends('layouts.app')

@section('title', 'Tambah Konten Tentang')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Tambah Konten Baru</h1>
                <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary">Kembali</a>
            </div>

            <div class="card shadow-sm border-0 rounded-4 p-4">
                <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Judul (Caption)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Contoh: Fokus Pada Kualitas">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Masukkan deskripsi lengkap di sini...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        <div class="form-text">Rekomendasi rasio 16:9 atau landskap. Maks 2MB.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-3 fw-bold rounded-3">Simpan Konten</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

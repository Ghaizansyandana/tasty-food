@extends('layouts.app')

@section('hide_layout_navbar', true)

@section('title', 'Edit Home Card')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Edit Card</h1>
                <a href="{{ route('admin.home_cards.index') }}" class="btn btn-outline-secondary">Kembali</a>
            </div>

            <div class="card shadow-sm border-0 rounded-4 p-4">
                <form action="{{ route('admin.home_cards.update', $home_card->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Judul Card</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $home_card->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $home_card->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Icon / Foto</label>
                        <div class="mb-2">
                            <img src="{{ str_contains($home_card->image, 'images/') ? asset($home_card->image) : asset('storage/' . $home_card->image) }}" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; background: #eee;">
                        </div>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary py-3 fw-bold rounded-3">Update Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

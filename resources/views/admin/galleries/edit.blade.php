@extends('layouts.app')

@section('title', 'Tambah/Edit Gambar Galeri')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>{{ isset($gallery) ? 'Edit Gambar' : 'Tambah Gambar ke Galeri' }}</h2>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-dark">Kembali</a>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ isset($gallery) ? route('admin.galleries.update', $gallery->id) : route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($gallery)) @method('PUT') @endif
                        
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $gallery->category ?? '') }}" placeholder="Misal: Breakfast, Lunch" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">File Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*" {{ isset($gallery) ? '' : 'required' }}>
                            @if(isset($gallery) && $gallery->image)
                                <small class="text-muted mt-2 d-block">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">{{ isset($gallery) ? 'Update Gambar' : 'Simpan Gambar' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

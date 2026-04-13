@extends('layouts.app')

@section('title', 'Tambah/Edit Berita')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>{{ isset($news) ? 'Edit Berita' : 'Tambah Berita' }}</h2>
                <a href="{{ route('admin.news.index') }}" class="btn btn-outline-dark">Kembali</a>
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

                    <form action="{{ isset($news) ? route('admin.news.update', $news->id) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($news)) @method('PUT') @endif
                        
                        <div class="mb-3">
                            <label class="form-label">Judul Berita</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Gambar Berita</label>
                            <input type="file" name="image" class="form-control" accept="image/*" {{ isset($news) ? '' : 'required' }}>
                            @if(isset($news) && $news->image)
                                <small class="text-muted mt-2 d-block">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ringkasan (Excerpt)</label>
                            <textarea name="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $news->excerpt ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Isi Lengkap (Body)</label>
                            <textarea name="body" class="form-control" rows="6" required>{{ old('body', $news->body ?? '') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">{{ isset($news) ? 'Update Berita' : 'Simpan Berita' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

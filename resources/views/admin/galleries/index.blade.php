@extends('layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Galeri</h2>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark me-2">Kembali</a>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-dark">Tambah Gambar</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th class="py-3 border-0">Kategori</th>
                            <th class="py-3 border-0">Slide?</th>
                            <th class="px-4 py-3 border-0 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $key => $gallery)
                            <tr>
                                <td>{{ $galleries->firstItem() + $key }}</td>
                                <td>
                                    @php
                                        // Quick fallback check for dummy seeded images vs uploaded ones
                                        $imgPath = Str::contains($gallery->image, 'galeri') ? asset('images/'.$gallery->image) : asset('storage/'.$gallery->image);
                                    @endphp
                                    <img src="{{ $imgPath }}" alt="Gallery img" height="60" class="rounded">
                                </td>
                                <td class="py-3 border-0">{{ $gallery->category }}</td>
                                <td class="py-3 border-0">
                                    @if($gallery->is_carousel)
                                        <span class="badge bg-success">Slide</span>
                                    @else
                                        <span class="badge bg-light text-dark">Grid</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 border-0 text-end">
                                    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus gambar ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Belum ada gambar di galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

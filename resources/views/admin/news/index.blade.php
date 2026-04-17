@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 50px; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kelola Berita</h2>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark me-2">Kembali</a>
            <a href="{{ route('admin.news.create') }}" class="btn btn-dark">Tambah Berita</a>
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($newsList as $key => $news)
                            <tr>
                                <td>{{ $newsList->firstItem() + $key }}</td>
                                <td>
                                    @php
                                        // Quick fallback check for dummy seeded images vs uploaded ones
                                        $imgPath = Str::contains($news->image, 'berita') ? asset('images/'.$news->image) : asset('storage/'.$news->image);
                                    @endphp
                                    <img src="{{ $imgPath }}" alt="News img" width="60" class="rounded">
                                </td>
                                <td>{{ Str::limit($news->title, 50) }}</td>
                                <td>{{ $news->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('admin.news.destroy', $news->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Belum ada berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $newsList->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

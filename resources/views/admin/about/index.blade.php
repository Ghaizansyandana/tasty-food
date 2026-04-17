@extends('layouts.app')

@section('title', 'Kelola Tentang')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kelola Konten Tentang</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">Kembali ke Dashboard</a>
            <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Tambah Konten Baru</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 border-0">Gambar</th>
                        <th class="py-3 border-0">Judul (Caption)</th>
                        <th class="py-3 border-0">Deskripsi</th>
                        <th class="px-4 py-3 border-0 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $content)
                        <tr>
                            <td class="px-4 py-3 border-0">
                                <img src="{{ asset('storage/' . $content->image) }}" alt="{{ $content->title }}" 
                                     class="rounded-3" style="width: 100px; height: 60px; object-fit: cover;">
                            </td>
                            <td class="py-3 border-0 fw-semibold">{{ $content->title }}</td>
                            <td class="py-3 border-0 text-muted">
                                {{ Str::limit($content->description, 100) }}
                            </td>
                            <td class="px-4 py-3 border-0 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.about.edit', $content->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.about.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-center text-muted">
                                Tidak ada konten. Silakan tambah konten baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

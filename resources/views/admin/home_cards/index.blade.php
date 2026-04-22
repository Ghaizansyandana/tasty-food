@extends('layouts.app')

@section('hide_layout_navbar', true)

@section('title', 'Kelola Home Cards')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kelola Landing Page Cards</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary me-2">Kembali</a>
            <a href="{{ route('admin.home_cards.create') }}" class="btn btn-primary">Tambah Card Baru</a>
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
                        <th class="px-4 py-3 border-0">Icon/Foto</th>
                        <th class="py-3 border-0">Judul</th>
                        <th class="py-3 border-0">Deskripsi</th>
                        <th class="px-4 py-3 border-0 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cards as $card)
                        <tr>
                            <td class="px-4 py-3 border-0">
                                <img src="{{ str_contains($card->image, 'images/') ? asset($card->image) : asset('storage/' . $card->image) }}" alt="{{ $card->title }}" 
                                     class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover; background: #eee;">
                            </td>
                            <td class="py-3 border-0 fw-semibold">{{ $card->title }}</td>
                            <td class="py-3 border-0 text-muted">
                                {{ Str::limit($card->description, 100) }}
                            </td>
                            <td class="px-4 py-3 border-0 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.home_cards.edit', $card->id) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.home_cards.destroy', $card->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger delete-confirm" data-message="Hapus card ini?">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-center text-muted"> Belum ada card. </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Detail Kontak')
@section('hide_layout_navbar', true)

@section('content')
<div class="container" style="padding-top: 50px; padding-bottom: 50px; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Detail Pesan</h2>
            <p class="text-muted">Membaca pesan dari {{ $contact->name }}.</p>
        </div>
        <div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-dark">Kembali ke Daftar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $contact->subject }}</h5>
                            <p class="text-muted small mb-0">{{ $contact->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="text-end">
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus Pesan</button>
                            </form>
                        </div>
                    </div>
                    
                    <hr class="opacity-10 mb-4">
                    
                    <div class="contact-info mb-4 bg-light p-3 rounded-3">
                        <div class="row">
                            <div class="col-md-6 mb-2 mb-md-0">
                                <label class="small text-muted d-block">Dari:</label>
                                <span class="fw-semibold text-dark">{{ $contact->name }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small text-muted d-block">Email:</label>
                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none text-amber fw-semibold">{{ $contact->email }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="message-body">
                        <label class="small text-muted d-block mb-2">Isi Pesan:</label>
                        <div class="p-4 bg-white border border-light rounded-3" style="min-height: 200px; line-height: 1.6;">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>
                    
                    @if($contact->reply_message)
                    <div class="mt-5">
                        <label class="small text-muted d-block mb-2 text-success fw-bold">Balasan Anda (Dikirim pada {{ $contact->replied_at->format('d M Y, H:i') }}):</label>
                        <div class="p-4 bg-light border border-success rounded-3" style="line-height: 1.6;">
                            {!! nl2br(e($contact->reply_message)) !!}
                        </div>
                    </div>
                    @else
                    <div class="mt-5">
                        <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="reply_message" class="form-label fw-bold">Balas Pesan Ini:</label>
                                <textarea class="form-control" id="reply_message" name="reply_message" rows="6" placeholder="Tulis balasan Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark px-4 py-2">
                                Kirim Balasan ke Email User
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4 text-center">
                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-person-fill fs-1 text-dark"></i>
                    </div>
                    <h5 class="fw-bold mb-1">{{ $contact->name }}</h5>
                    <p class="text-muted small mb-3">{{ $contact->email }}</p>
                    <hr>
                    <p class="small text-muted text-start mt-3">
                        Anda dapat membalas pesan ini langsung ke alamat email pengirim menggunakan tombol di samping.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-amber { color: #f59e0b; }
</style>
@endsection

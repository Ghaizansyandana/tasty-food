@extends('layouts.app')

@section('content')
<div class="bg-hero">
    <div class="container">
        <h1 class="display-4">KONTAK KAMI</h1>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h3 class="fw-bold">KONTAK KAMI</h3>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="Subject">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control py-3" placeholder="Name">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control py-3" placeholder="Email">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <textarea class="form-control" rows="8" placeholder="Message"></textarea>
            </div>
        </div>

        <div class="col-12 mt-3">
            <button class="btn btn-black w-100 py-3 fw-bold">KIRIM</button>
        </div>
    </div>

    <div class="row text-center mt-5 py-5">
        <div class="col-md-4">
            <div class="rounded-circle bg-black text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <h6 class="fw-bold">EMAIL</h6>
            <p class="small text-muted">{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}</p>
        </div>
        <div class="col-md-4">
            <div class="rounded-circle bg-black text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <h6 class="fw-bold">PHONE</h6>
            <p class="small text-muted">{{ $settings['contact_phone'] ?? '+62 812 3456 7890' }}</p>
        </div>
        <div class="col-md-4">
            <div class="rounded-circle bg-black text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <h6 class="fw-bold">LOCATION</h6>
            <p class="small text-muted">{{ $settings['contact_location'] ?? 'Kota Bandung, Jawa Barat' }}</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="rounded-4 overflow-hidden shadow-sm">
                <iframe src="{{ $settings['contact_maps_url'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.573116!3d-6.903444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e63982548ad7%3A0x391dbad39031336a!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000' }}" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
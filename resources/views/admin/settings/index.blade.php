@extends('layouts.app')

@section('hide_layout_navbar', true)

@section('title', 'Kelola Landing Page')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Kelola Konten Landing Page</h1>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Kembali</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 rounded-4 p-4">
                <form action="{{ route('admin.website_settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <h4 class="mb-4 text-primary fw-bold">Hero Section</h4>
                    <div class="mb-4">
                        <label for="home_hero_title" class="form-label fw-semibold">Judul Hero (Gunakan 'TASTY FOOD' untuk tulisan tebal)</label>
                        <input type="text" class="form-control" id="home_hero_title" name="home_hero_title" value="{{ $settings['home_hero_title'] ?? 'HEALTHY TASTY FOOD' }}">
                    </div>

                    <div class="mb-5">
                        <label for="home_hero_description" class="form-label fw-semibold">Deskripsi Hero</label>
                        <textarea class="form-control" id="home_hero_description" name="home_hero_description" rows="4">{{ $settings['home_hero_description'] ?? '' }}</textarea>
                    </div>

                    <h4 class="mb-4 text-primary fw-bold">About Section</h4>
                    <div class="mb-5">
                        <label for="home_about_description" class="form-label fw-semibold">Deskripsi Tentang Kami (Landing Page)</label>
                        <textarea class="form-control" id="home_about_description" name="home_about_description" rows="5">{{ $settings['home_about_description'] ?? '' }}</textarea>
                    </div>

                    <h4 class="mb-4 text-primary fw-bold">Informasi Kontak & Footer</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="contact_email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="contact_phone" class="form-label fw-semibold">Phone</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="contact_location" class="form-label fw-semibold">Lokasi (Alamat Singkat)</label>
                        <input type="text" class="form-control" id="contact_location" name="contact_location" value="{{ $settings['contact_location'] ?? '' }}">
                    </div>
                    <div class="mb-4">
                        <label for="contact_maps_url" class="form-label fw-semibold">Google Maps Embed URL (src link dari iframe)</label>
                        <input type="text" class="form-control" id="contact_maps_url" name="contact_maps_url" value="{{ $settings['contact_maps_url'] ?? '' }}">
                        <div class="form-text">Buka Google Maps -> Share -> Embed a map -> Salin link di dalam atribut 'src'.</div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary py-3 fw-bold rounded-3 text-uppercase">Gaskeun Update!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        h1, h2, h3, .navbar-brand { font-family: 'Montserrat', sans-serif; font-weight: bold; }
        .bg-hero { 
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            color: white;
        }
        .navbar { background: transparent !important; position: absolute; width: 100%; z-index: 10; }
        .nav-link { color: white !important; font-weight: 500; text-transform: uppercase; font-size: 0.8rem; }
        .btn-black { background: black; color: white; border-radius: 0; padding: 10px 30px; }

        /* Footer Styles */
        .footer-custom {
            background: #1a1a1a;
            color: #fff;
            padding: 60px 0 30px;
        }
        .footer-brand h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
        }
        .footer-brand p {
            font-size: 13px;
            line-height: 1.8;
            color: #b0b0b0;
            margin-bottom: 25px;
            max-width: 300px;
        }
        .footer-social {
            display: flex;
            gap: 12px;
        }
        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .social-icon.facebook {
            background: #3b5998;
            color: #fff;
        }
        .social-icon.facebook:hover {
            background: #2d4373;
        }
        .social-icon.twitter {
            background: #1da1f2;
            color: #fff;
        }
        .social-icon.twitter:hover {
            background: #0c85d0;
        }
        .footer-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links li {
            margin-bottom: 12px;
        }
        .footer-links a {
            color: #b0b0b0;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s ease;
        }
        .footer-links a:hover {
            color: #fff;
        }
        .footer-contact {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-contact li {
            margin-bottom: 15px;
            display: flex;
            align-items: start;
            gap: 10px;
            font-size: 13px;
            color: #b0b0b0;
        }
        .footer-contact i {
            margin-top: 3px;
            color: #fff;
        }
        .footer-bottom {
            border-top: 1px solid #333;
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
        }
        .footer-bottom p {
            font-size: 12px;
            color: #888;
            margin: 0;
        }
        .footer .footer-brand,
        .footer .footer-section {
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .footer-brand,
            .footer-section {
                margin-bottom: 40px;
            }
        }
    </style>
</head>
<body>

    @unless(View::hasSection('hide_layout_navbar'))
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="/">TASTY FOOD</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tentang">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="/berita">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="/galeri">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">KONTAK</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-3 d-none d-lg-block" href="{{ route('register') }}">DAFTAR</a></li>
                        <li class="nav-item d-lg-none"><a class="nav-link" href="{{ route('register') }}">DAFTAR</a></li>
                        <li class="nav-item"><a class="nav-link btn btn-black ms-lg-2 px-4" href="{{ route('login') }}" style="color: white !important;">LOGIN</a></li>
                    @else
                        @if(Auth::user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link btn btn-black ms-lg-3 px-4" href="{{ route('admin.dashboard') }}" style="color: white !important;">DASHBOARD</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link btn btn-black ms-lg-3 px-4" href="{{ route('user.dashboard') }}" style="color: white !important;">DASHBOARD</a></li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @endunless

    @yield('content')

{{-- Footer --}}
<footer class="footer-custom">
    <div class="container">
        <div class="row">
            {{-- Brand & Social --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-brand">
                    <h3>Tasty Food</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Useful Links --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-section">
                    <h4 class="footer-title">Useful links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('berita.index') }}">Blog</a></li>
                        <li><a href="#">Hewan</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                        <li><a href="#">Testimonial</a></li>
                    </ul>
                </div>
            </div>

            {{-- Privacy --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-section">
                    <h4 class="footer-title">Privacy</h4>
                    <ul class="footer-links">
                        <li><a href="#">Karir</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
                        <li><a href="#">Servis</a></li>
                    </ul>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="footer-section">
                    <h4 class="footer-title">Contact Info</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>{{ $settings['contact_email'] ?? 'tastyfood@gmail.com' }}</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>{{ $settings['contact_phone'] ?? '+62 812 3456 7890' }}</span>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $settings['contact_location'] ?? 'Kota Bandung, Jawa Barat' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="footer-bottom">
            <p>Copyright ©2023 All rights reserved</p>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        h1, h2, h3, .navbar-brand { font-family: 'Montserrat', sans-serif; font-weight: bold; }
        
        /* Navbar Enhancements */
        .navbar { 
            background: transparent !important; 
            position: fixed; 
            width: 100%; 
            z-index: 1000; 
            padding: 20px 0;
            transition: all 0.4s ease;
        }
        .navbar.scrolled {
            background: rgba(0, 0, 0, 0.95) !important;
            padding: 12px 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
        }
        
        .nav-link { 
            color: white !important; 
            font-weight: 500; 
            text-transform: uppercase; 
            font-size: 0.8rem; 
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }
        .nav-link:hover { color: #000000ff !important; }
        
        .btn-black { 
            background: black; 
            color: white; 
            border-radius: 8px; 
            padding: 10px 30px; 
            font-weight: 600;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .btn-black:hover {
            background: #222;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Profile Dropdown "Tidak Biasa" Style */
        .btn-profile-custom {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white !important;
            transition: all 0.3s ease;
        }
        .btn-profile-custom:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: #f59e0b;
        }
        .profile-icon-circle {
            width: 32px;
            height: 32px;
            background: #f59e0b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.4);
        }
        .dropdown-menu {
            border-radius: 15px;
            padding: 10px;
            min-width: 220px;
        }
        .dropdown-item {
            border-radius: 10px;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }
        .dropdown-item:hover {
            background-color: #fffbeb;
            color: #f59e0b;
        }
        .animated-fade-in {
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .bg-hero { 
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');
            background-size: cover;
            background-position: center;
            height: 450px;
            display: flex;
            align-items: center;
            color: white;
        }

        /* Rest of Styles */

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
            
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="/tentang">TENTANG</a></li>
                    <li class="nav-item"><a class="nav-link" href="/berita">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="/galeri">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">KONTAK</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-lg-3 px-3 d-none d-lg-block" href="{{ route('register') }}">DAFTAR</a></li>
                        <li class="nav-item"><a class="nav-link btn-black ms-lg-2 px-4 shadow-sm" href="{{ route('login') }}" style="color: white !important;">LOGIN</a></li>
                    @else
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle btn-profile-custom px-3 py-2 d-flex align-items-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                                <div class="profile-icon-circle">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 animated-fade-in" aria-labelledby="profileDropdown">
                                <li><h6 class="dropdown-header text-dark fw-bold">Halo, {{ Auth::user()->name }}!</h6></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear"></i> Pengaturan Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger">
                                            <i class="bi bi-box-arrow-right"></i> Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @endunless
    
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 10px;">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 10px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @stack('scripts')
    <script>
        // AOS Initialization
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // SweetAlert2 Flash Messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        // Global Delete Confirmation
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-confirm')) {
                e.preventDefault();
                const form = e.target.closest('form');
                const message = e.target.closest('.delete-confirm').dataset.message || 'Data ini akan dihapus permanen!';
                
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#000',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    </script>
</body>
</html>
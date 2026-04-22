<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - Welcome</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=Montserrat:wght@300;400;700;900&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --amber: #f59e0b;
            --white: #ffffff;
            --black: #0c0c0c;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--black);
        }

        /* Immersive Background */
        .immersive-hero {
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 80px 20px;
        }

        /* Central Vignette Effect */
        .immersive-hero::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 100%);
            pointer-events: none;
        }

        /* Content Container */
        .welcome-center {
            text-align: center;
            z-index: 10;
            color: var(--white);
            max-width: 900px;
            width: 100%;
        }

        .welcome-pre {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 10px;
            text-transform: uppercase;
            margin-bottom: 15px;
            color: var(--amber);
            display: block;
        }

        .welcome-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 8vw, 5.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .welcome-desc {
            font-size: 15px;
            font-weight: 300;
            color: rgba(255,255,255,0.7);
            letter-spacing: 0.5px;
            margin-bottom: 45px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        /* Entry Button */
        .btn-enter {
            display: inline-block;
            padding: 20px 60px;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.05);
            color: var(--white);
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 5px;
            text-transform: uppercase;
            backdrop-filter: blur(10px);
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-enter:hover {
            background: var(--white);
            color: var(--black);
            border-color: var(--white);
            transform: translateY(-5px);
            letter-spacing: 8px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .btn-enter::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s ease;
        }

        .btn-enter:hover::before {
            left: 100%;
        }

        /* Ambient Decoration */
        .decoration-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90vw;
            height: 90vh;
            border: 1px solid rgba(255,255,255,0.1);
            pointer-events: none;
            z-index: 1;
        }

        .copyright-vertical {
            position: absolute;
            left: 40px;
            bottom: 60px;
            transform: rotate(-90deg);
            transform-origin: left bottom;
            font-size: 10px;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.3);
            text-transform: uppercase;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .welcome-pre { font-size: 10px; letter-spacing: 8px; }
            .welcome-title { font-size: 3.5rem; }
            .btn-enter { padding: 18px 40px; width: 100%; max-width: 250px; }
            .decoration-box { display: none; }
            .copyright-vertical { display: none; }
        }
    </style>
</head>
<body>

    <section class="immersive-hero">
        <div class="decoration-box" data-aos="zoom-in" data-aos-duration="2000"></div>
        
        <div class="copyright-vertical">ESTABLISHED 2023 &copy; TASTY FOOD</div>

        <div class="welcome-center">
            <span class="welcome-pre" data-aos="fade-down" data-aos-delay="400">Welcome To</span>
            <h1 class="welcome-title" data-aos="fade-up" data-aos-delay="600">
                Tasty<br>Food Excellence
            </h1>
            <p class="welcome-desc" data-aos="fade-up" data-aos-delay="800">
                Experience culinary perfection through a curated journey of flavors, where every dish tells a story of passion and heritage.
            </p>
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="1000">
                <div class="col-auto">
                    <a href="{{ route('home') }}" class="btn-enter">HOME</a>
                </div>
                <div class="col-auto">
                    <a href="{{ route('tentang') }}" class="btn-enter" style="background: transparent; border-color: rgba(255,255,255,0.5);">TENTANG KAMI</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200,
            once: true
        });
    </script>
</body>
</html>

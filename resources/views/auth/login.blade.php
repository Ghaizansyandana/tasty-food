<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tasty Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
        }
        .login-container {
            background: #fff;
            border-radius: 28px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); /* very subtle box shadow */
            width: 100%;
            max-width: 440px;
            padding: 48px 40px 36px;
            box-sizing: border-box;
            z-index: 2;
        }
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-header .logo {
            font-size: 26px;
            font-weight: 500;
            color: #202124;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }
        /* Google colored logo mockup */
        .g-blue { color: #4285F4; }
        .g-red { color: #EA4335; }
        .g-yellow { color: #FBBC05; }
        .g-green { color: #34A853; }
        
        .login-header h1 {
            font-size: 36px;
            font-weight: 400;
            color: #1f1f1f;
            margin-bottom: 8px;
        }
        .login-header p {
            color: #444746;
            font-size: 16px;
            margin: 0;
        }
        .form-floating {
            margin-bottom: 16px;
        }
        .form-floating input {
            border-radius: 4px;
            border: 1px solid #747775;
            color: #1f1f1f;
        }
        .form-floating input:focus {
            border-color: #0b57d0;
            box-shadow: inset 0 0 0 1px #0b57d0;
            outline: none;
        }
        .form-floating label {
            color: #444746;
            padding-left: 1rem;
        }
        .form-floating input:focus ~ label {
            color: #0b57d0;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 36px;
        }
        .btn-create {
            background: transparent;
            color: #0b57d0;
            font-weight: 500;
            border: none;
            padding: 8px 12px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn-create:hover {
            background: rgba(11, 87, 208, 0.08); /* light blue hover */
            color: #0b57d0;
        }
        .btn-login {
            background: #0b57d0;
            color: #fff;
            border: none;
            border-radius: 24px;
            padding: 10px 24px;
            font-weight: 500;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn-login:hover {
            background: #0842a0;
        }
        .alert {
            border-radius: 8px;
            font-size: 14px;
        }
        .footer-link {
            position: absolute;
            bottom: 24px;
            text-align: center;
            width: 100%;
        }
        .footer-link a {
            color: #444746;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
        }
        .footer-link a:hover {
            background: rgba(68, 71, 70, 0.08);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <span class="g-blue">T</span><span class="g-red">a</span><span class="g-yellow">s</span><span class="g-blue">t</span><span class="g-green">y</span> <span class="g-red">F</span><span class="g-yellow">o</span><span class="g-blue">o</span><span class="g-green">d</span>
            </div>
            <h1>Login</h1>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger p-2 mb-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Sandi</label>
            </div>
            
            <div class="d-flex justify-content-start">
                <a href="#" class="text-decoration-none" style="color: #0b57d0; font-weight: 500; font-size: 14px;">Lupa sandi?</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('google.login') }}" class="btn btn-outline-danger w-100">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="20"> 
                    Login dengan Google
                </a>
                <a href="{{ url('/auth/facebook') }}" class="btn btn-primary w-100 mt-2">
                    <i class="fab fa-facebook"></i> Login dengan Facebook
                </a>
            </div>
            <div class="actions">
                <a href="{{ route('register') }}" class="btn-create">Buat akun</a>
                <button type="submit" class="btn btn-login">Selanjutnya</button>
            </div>

        </form>
    </div>

    <!-- Back to home outside container, mimicking language selection / footer -->
    <div class="footer-link">
         <a href="{{ route('home') }}">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

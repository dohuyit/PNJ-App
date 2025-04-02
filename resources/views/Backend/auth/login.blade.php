<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MISA AMIS | Đăng nhập</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Backend/dist/css/adminlte.min.css') }}">
    <style>
        body {
            background-image: url('{{ asset('Backend/dist/img/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            width: 800px;
            display: flex;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-left {
            width: 50%;
            background: linear-gradient(to bottom, #0078d4, #005a9e);
            color: white;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .platform-label {
            background-color: white;
            color: #333;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }

        .platform-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .mascot-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .mascot-img {
            max-width: 80%;
            max-height: 300px;
        }

        .login-right {
            width: 50%;
            padding: 40px;
        }

        .login-logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            height: 40px;
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .login-tabs {
            display: flex;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
        }

        .login-tab {
            padding: 10px 0;
            margin-right: 30px;
            font-weight: 500;
            color: #777;
            cursor: pointer;
            position: relative;
        }

        .login-tab.active {
            color: #0078d4;
            font-weight: bold;
        }

        .login-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #0078d4;
        }

        .form-control {
            border-radius: 4px;
            padding: 10px 12px;
            height: auto;
            margin-bottom: 15px;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 12px;
            color: #999;
            cursor: pointer;
        }

        .btn-login {
            background-color: #0078d4;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 12px;
            font-weight: bold;
            width: 100%;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 15px;
        }

        .forgot-password a {
            color: #0078d4;
            text-decoration: none;
        }

        .register-link {
            text-align: right;
        }

        .register-link a {
            color: #0078d4;
            text-decoration: none;
        }

        .social-divider {
            text-align: center;
            margin: 20px 0;
            color: #777;
            position: relative;
        }

        .social-divider::before,
        .social-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: #e0e0e0;
        }

        .social-divider::before {
            left: 0;
        }

        .social-divider::after {
            right: 0;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e0e0e0;
            cursor: pointer;
            transition: all 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .social-btn img {
            width: 20px;
            height: 20px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 10px;
            color: white;
            font-size: 14px;
        }

        .footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer-divider {
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <div class="platform-label">NỀN TẢNG</div>
            <div class="platform-title">QUẢN TRỊ DOANH NGHIỆP<br>HỢP NHẤT</div>
            <div class="mascot-container">
                <img src="{{ asset('Backend/dist/img/misa-mascot.png') }}" alt="MISA Mascot" class="mascot-img">
            </div>
        </div>
        <div class="login-right">
            <div class="login-logo">
                <img src="{{ asset('Backend/dist/img/misa-logo.png') }}" alt="MISA Logo">
                <img src="{{ asset('Backend/dist/img/misa-30-logo.png') }}" alt="MISA 30 Years">
            </div>
            <h1 class="login-title">Đăng nhập</h1>

            <div class="login-tabs">
                <div class="login-tab active">Với mật khẩu</div>
                <div class="login-tab">Với mã QR</div>
            </div>

            <form action="{{ route('admin.login.process') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Số điện thoại/email"
                        value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group password-field">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                        value="{{ old('password') }}">
                    <span class="password-toggle">
                        <i class="fas fa-eye-slash"></i>
                    </span>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="forgot-password">
                    <a href="#">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn btn-login">Đăng nhập</button>

                <div class="register-link">
                    <a href="#">Đăng ký</a>
                </div>

                <div class="social-divider">Hoặc đăng nhập với</div>

                <div class="social-login">
                    <div class="social-btn">
                        <img src="{{ asset('Backend/dist/img/google-icon.png') }}" alt="Google">
                    </div>
                    <div class="social-btn">
                        <img src="{{ asset('Backend/dist/img/apple-icon.png') }}" alt="Apple">
                    </div>
                    <div class="social-btn">
                        <img src="{{ asset('Backend/dist/img/microsoft-icon.png') }}" alt="Microsoft">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <a href="#">Trợ giúp</a>
        <span class="footer-divider">|</span>
        <a href="#">Tiếng Việt <i class="fas fa-chevron-down"></i></a>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('Backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('Backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Backend/dist/js/adminlte.js') }}"></script>
    <script>
        $(function() {
            // Toggle password visibility
            $('.password-toggle').click(function() {
                var passwordField = $(this).prev('input');
                var icon = $(this).find('i');

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });

            // Tab switching
            $('.login-tab').click(function() {
                $('.login-tab').removeClass('active');
                $(this).addClass('active');
            });

            // Toast notification
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500
            });

            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            @elseif (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            @endif
        });
    </script>
</body>

</html>

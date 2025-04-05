<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PNJ ADMIN | Đăng nhập</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/dist/css/login-admin.css') }}">

</head>

<body>
    <div class="container">
        <div class="login-container row g-0">
            <!-- Left section with blue background -->
            <div class="col-md-6 login-left">
                <div class="platform-label">NỀN TẢNG</div>
                <div class="platform-title">QUẢN TRỊ WEBSITE<br>PNJ ADMIN</div>
            </div>

            <!-- Right section with login form -->
            <div class="col-md-6 login-right p-4">
                <div class="login-logo">
                    <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" alt="MISA Logo">
                </div>

                <h1 class="login-title my-2">Đăng nhập</h1>

                <!-- Tab điều hướng -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-primary" data-bs-toggle="tab" href="#password-form">Với mật
                            khẩu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" data-bs-toggle="tab" href="#qr-form">Với mã QR</a>
                    </li>
                </ul>

                <!-- Nội dung tab -->
                <div class="tab-content">
                    <!-- Form đăng nhập bằng mật khẩu -->
                    <div id="password-form" class="tab-pane fade show active">
                        <form action="{{ route('admin.login.process') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control"
                                    placeholder="Email của bạn...">
                                @error('email')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group password-field ">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Mật khẩu của bạn...">
                                <span class="password-toggle">
                                    <i class="fas fa-eye-slash"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="login-links">
                                <div class="forgot-password">
                                    <input type="checkbox" name="" id=""
                                        class="form-check-input align-baseline">
                                    <label for="">Ghi nhớ mật khẩu</label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                        </form>

                        <div class="social mt-3 d-flex justify-content-center align-items-center flex-column">
                            <div class="social-title mb-2">Đăng nhập với</div>
                            <div class="social-icons gap-3 d-flex justify-content-center align-items-center">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Đăng nhập bằng mã QR -->
                    <div id="qr-form" class="tab-pane fade">
                        <div class="text-center mt-4 mb-3">
                        </div>
                        <p class="text-center">Quét mã QR để đăng nhập</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>



    <script>
        function onScanSuccess(qrCodeMessage) {
            window.location.href = qrCodeMessage; // Chuyển hướng đến URL trong mã QR
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: 250
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password visibility toggle
            const togglePassword = document.querySelector('.password-toggle');
            const passwordInput = document.querySelector('input[type="password"]');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                if (type === 'password') {
                    this.querySelector('i').classList.remove('fa-eye');
                    this.querySelector('i').classList.add('fa-eye-slash');
                } else {
                    this.querySelector('i').classList.remove('fa-eye-slash');
                    this.querySelector('i').classList.add('fa-eye');
                }
            });
        });
    </script>
</body>

</html>

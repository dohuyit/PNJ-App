<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/login-register.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <section id="main-form">
            <div class="header-form text-center w-100 mb-5">
                <h3>
                    <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" alt="" class="logo-login" />
                </h3>
                <p class="sub-title">Chào mừng bạn đến với PNJ của chúng tôi</p>
            </div>
            <form class="form-action" action="{{ route('client.login.process') }}" method="post">
                @csrf
                <div class="mb-2 position-relative">
                    <i
                        class="fa-solid fa-envelope position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email của bạn..."
                        value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="mb-2 position-relative">
                    <i
                        class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn..." />
                </div>
                @error('password')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="link-group d-flex justify-content-between my-3">
                    <div class="register-link d-flex align-items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" />
                        <label for="remember">Remember me</label>
                    </div>
                    <div class="fogot-password">
                        <a href="#" class="text-dark d-flex align-items-center gap-2">
                            <span>Quên mật khẩu</span>
                            <span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <button type="submit" class="btn-submit btn btn-primary w-100">
                    Đăng nhập
                </button>
                <div class="signin-orther-title">
                    <h4 class="text-dart">Hoặc</h4>
                    <div class="form-media">
                        <div
                            class="item-media py-0 px-2 rounded-2 d-flex align-items-center justify-content-between mb-3">
                            <p>Đăng nhập với Google</p>
                            <img src="{{ asset('frontend/image/icons8-google-48.png') }}" alt="" />
                        </div>
                        <div class="item-media py-0 px-2 rounded-2 d-flex align-items-center justify-content-between">
                            <p>Đăng nhập với Facebook</p>
                            <img src="{{ asset('frontend/image/icons8-facebook-48.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="group-link-register mt-3 d-flex justify-content-center align-items-center gap-2">
                    <span class="text-secondary">Bạn chưa có tài khoản?</span>
                    <a href="{{ route('client.register.form') }}" class="text-primary blink-text">Đăng kí ngay</a>
                </div>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1800
            });
        @elseif (session('error'))
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1800
            });
        @endif
    </script>
</body>

</html>

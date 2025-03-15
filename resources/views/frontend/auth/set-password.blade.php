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
                <p class="sub-title">Thiết lập mật khẩu của bạn</p>
            </div>
            <form class="form-action" action="{{ route('password.process') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $idUser }}">
                <div class="mb-2 position-relative">
                    <i
                        class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn..." />
                </div>
                @error('password')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="mb-2 position-relative">
                    <i
                        class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="password" name="confirm-password" class="form-control"
                        placeholder="Nhập lại mật khẩu của bạn..." />
                </div>
                @error('confirm-password')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn-submit btn btn-primary w-100">
                    Đăng nhập
                </button>
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

@extends('frontend.layouts.app')
@section('title', 'Đăng kí tài khoản')

@section('content')
    <div class="wrapper-form">
        <section id="main-form">
            <div class="header-form text-center w-100 mb-5">
                <h3>
                    <img src="{{ asset('frontend/image/pnj.com.vn.png') }}" alt="" class="logo-login" />
                </h3>
                <p class="sub-title">
                    Đăng kí tài khoản để trải nghiệm dịch vụ của chúng tôi
                </p>
            </div>
            <form class="form-action" action="{{ route('client.register.process') }}" method="post">
                @csrf
                <div class="mb-2 position-relative">
                    <i class="fa-solid fa-user position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="text" name="username" class="form-control" placeholder="Họ và tên của bạn..."
                        value="{{ old('username') }}" />
                </div>
                @error('username')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="mb-2 position-relative">
                    <i class="fa-solid fa-envelope position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email của bạn..."
                        value="{{ old('email') }}" />
                </div>
                @error('email')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="mb-2 position-relative">
                    <i class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn..." />
                </div>
                @error('password')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="link-group d-flex justify-content-end my-3">
                    {{-- <div class="remember-link d-flex align-items-center gap-2 text-dark">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div> --}}
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
                    Đăng ký
                </button>
                <div class="signin-orther-title">
                    <h4 class="text-dark">Hoặc</h4>
                    <div class="form-media">
                        <div class="item-media py-0 px-2 rounded-2 d-flex align-items-center justify-content-between mb-3">
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
                    <span class="text-secondary">Bạn đã có tài khoản?</span>
                    <a href="{{ route('client.login.form') }}" class="text-primary blink-text">Đăng nhập ngay</a>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/login-register.css') }}" />
@endpush

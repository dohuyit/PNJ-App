@extends('frontend.layouts.app')
@section('title', 'Đăng nhập tài khoản')

@section('content')
    <div class="wrapper-form">
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
                        <div class="item-media py-0 px-2 rounded-2 mb-3">
                            <a href="{{ route('auth.google') }}" class="d-flex align-items-center justify-content-between">
                                <p class="text-primary">Đăng nhập với Google</p>
                                <img src="{{ asset('frontend/image/icons8-google-48.png') }}" alt="" />
                            </a>
                        </div>
                        <div class="item-media py-0 px-2 rounded-2 mb-3">
                            <a href="{{ route('auth.facebook') }}"
                                class="d-flex align-items-center justify-content-between">
                                <p class="text-primary">Đăng nhập với Facebook</p>
                                <img src="{{ asset('frontend/image/icons8-facebook-48.png') }}" alt="" />
                            </a>
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
@endsection

@push('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/login-register.css') }}" />
@endpush

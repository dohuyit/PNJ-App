@extends('frontend.layouts.app')
@section('title', 'Đăng nhập tài khoản')

@section('content')
    <div class="wrapper-form">
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
                    <i class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn..." />
                </div>
                @error('password')
                    <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="mb-2 position-relative">
                    <i class="fa-solid fa-unlock position-absolute end-0 top-50 translate-middle-y me-3 text-primary"></i>
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
@endsection

@push('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/login-register.css') }}" />
@endpush

@extends('frontend.layouts.app')
@section('title', 'Trang chi tiết sản phẩm PNJ ')

@section('content')
    @include('frontend.layouts.include.header')
    <main id="main">
        <section id="group-content">
            <div class="container">
                <div class="body text-center mt-4 rounded-2 mx-auto border">
                    <h2 class="mt-3 text-primary">Đặt Hàng Thành Công!</h2>
                    <lord-icon src="https://cdn.lordicon.com/ohcuigqh.json" trigger="loop" delay="1000"
                        colors="primary:#003468,secondary:#2b599e" style="width: 150px; height: 150px">
                    </lord-icon>
                    <p class="text-muted">
                        Cảm ơn bạn đã tin tưởng và lựa chọn sản phẩm của chúng tôi.
                        Chúng tôi sẽ sớm liên hệ để xác nhận đơn hàng.
                    </p>
                    <div class="mt-4">
                        <a href="index.html" class="btn btn-primary btn-custom">
                            <i class="fa-solid fa-house"></i>
                            <span class="ms-2">Quay Lại Trang Chủ</span>
                        </a>
                        <a href="order-tracking.html" class="btn btn-outline-dark btn-custom ms-2">
                            <i class="fa-solid fa-truck"></i>
                            <span class="ms-2">Xem Đơn Hàng</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('frontend.layouts.include.footer')
@endsection

@push('link')
    <link rel="stylesheet" href="{{ asset('frontend/css/order-success.css') }}" />
@endpush

@push('script')
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.2"></script>
    <script>
        window.onload = function() {
            var defaults = {
                startVelocity: 30,
                spread: 360,
                ticks: 60,
                zIndex: 0
            };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            function fireConfetti() {
                var particleCount = 300;
                confetti({
                    ...defaults,
                    particleCount,
                    origin: {
                        x: randomInRange(0.1, 0.3),
                        y: Math.random()
                    },
                });
                confetti({
                    ...defaults,
                    particleCount,
                    origin: {
                        x: randomInRange(0.7, 0.9),
                        y: Math.random()
                    },
                });
            }

            setTimeout(fireConfetti, 500);
            setTimeout(fireConfetti, 1500);
            setTimeout(fireConfetti, 2500);
            setTimeout(fireConfetti, 3500);
        };
    </script>
@endpush

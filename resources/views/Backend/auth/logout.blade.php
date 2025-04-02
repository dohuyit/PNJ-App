<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('backend/dist/css/logout.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <title>Logout</title>
</head>

<body>
    <div class="wrapper-main">
        <section class="card-body">
            <lord-icon src="https://cdn.lordicon.com/peeuicbd.json" trigger="loop" delay="100"
                colors="primary:#5cc4f7,secondary:#86fffd" style="width: 220px; height: 220px;">
            </lord-icon>
            <article>
                <h3>Bạn đã đăng xuất thành công!</h3>
                <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi</p>
            </article>
            <a href="{{ route('admin.login.form') }}" class="btn-submit">
                <i class="fas fa-sign-in-alt"></i> Đăng nhập lại
            </a>
            <a href="{{ route('client.home') }}" class="btn-home">
                <i class="fas fa-home"></i> Trang chủ Client
            </a>
        </section>
    </div>
</body>

</html>

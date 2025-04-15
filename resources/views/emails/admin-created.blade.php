<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản quản trị viên</title>
</head>

<body>
    <h2>Xin chào {{ $username }},</h2>

    <p>Bạn đã được cấp tài khoản quản trị viên trên hệ thống.</p>

    <p><strong>Thông tin tài khoản:</strong></p>
    <p><strong>Email:</strong> {{ $email }}</p> <!-- Dùng biến email -->
    <p><strong>Mật khẩu mặc định:</strong> {{ $password }}</p> <!-- Dùng biến password -->

    <p><strong>Mã vạch:</strong></p>
    <img src="{{ $message->embed($barcodePath) }}" alt="Mã vạch đăng nhập"> <!-- Hiển thị mã vạch -->

    <br><br>
    <p>Vui lòng đổi mật khẩu sau khi đăng nhập để đảm bảo bảo mật.</p>

    <p>Trân trọng,<br>Hệ thống quản lý</p>
</body>

</html>

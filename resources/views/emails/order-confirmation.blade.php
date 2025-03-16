<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
</head>

<body>
    <h2>Xin chào {{ $order->user->name }},</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!</p>
    <p>Mã đơn hàng: <strong>#{{ $order->id }}</strong></p>
    <p>Ngày đặt hàng: {{ $order->created_at }}</p>
    <p>Tổng tiền: {{ formatPrice($order->total_amount) }}</p>
    <p>Chúng tôi sẽ sớm xử lý đơn hàng của bạn.</p>
    <p>Trân trọng,</p>
    <p><strong>PNJ-App</strong></p>
</body>

</html>

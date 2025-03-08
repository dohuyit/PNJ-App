<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn mua hàng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            background: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .header h2 {
            margin: 5px 0;
            color: #003468;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        .text-right {
            text-align: right;
        }

        .total {
            font-weight: bold;
            font-size: 16px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('frontend/image/pnj.com.vn.png') }}" alt="Logo">
            <h2>HÓA ĐƠN MUA HÀNG</h2>
            <p>Ngày xuất: {{ now()->format('d/m/Y') }}</p>
        </div>

        <!-- Thông tin khách hàng -->
        <div class="info">
            <p><strong>Khách hàng:</strong> {{ $order->name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
            <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        </div>

        <!-- Danh sách sản phẩm -->
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->variant->product->product_name }}</td>
                        <td>{{ formatPrice($item->unit_price) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ formatPrice($item->total_price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Ghi chú -->
        <div class="footer">
            <p>Cảm ơn quý khách đã mua hàng!</p>
        </div>
    </div>
</body>

</html>

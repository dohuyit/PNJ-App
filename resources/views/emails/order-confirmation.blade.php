<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Sang Trọng</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 20px;
        }


        .invoice-header {
            background: linear-gradient(135deg, #779bbe 0%, #094f96 100%);
            color: white;
            padding: 30px;
            text-align: center
        }

        .invoice-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .invoice-subtitle {
            font-size: 16px;
            opacity: 0.8;
        }

        .invoice-link {
            text-align: center;
            margin-top: 5px;
        }

        .invoice-link a {
            display: inline-block;
            color: white;
            text-decoration: underline;
            font-style: italic;
        }

        .invoice-body {
            padding: 30px;
        }

        .title-address {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        .invoice-details {
            margin-top: 20px;
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 20px;
        }

        .invoice-details td {
            margin: 5px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
        }

        .invoice-table th {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: left;
        }

        .invoice-table td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #ccc;
        }

        .thank-you {
            font-size: 24px;
            font-weight: 700;
            margin: 30px 0;
            text-align: center;
            color: #2c3e50;
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="invoice-title">Xác nhận đơn hàng</div>
            <div class="invoice-subtitle">Số: {{ $order->order_code }}</div>
            <div class="invoice-link">
                <a href="#">Xem chi tiết đơn hàng tại đây</a>
            </div>
        </div>

        <div class="invoice-body">
            <table class="invoice-address" width="100%" cellspacing="0" cellpadding="10">
                <tr>
                    <td align="left" valign="top">
                        <h5 class="title-address">Từ:</h5>
                        <p>
                            <strong>CÔNG TY TNHH PNJ JEWELRY</strong><br>
                            Trịnh Văn Bô, Nam Từ Liêm,<br>
                            Hà Nội, Việt Nam<br>
                            SĐT: 0123456789<br>
                            Email: pnj@jewelry.vn
                        </p>
                    </td>
                    <td align="right" valign="top">
                        <h5 class="title-address">Đến:</h5>
                        <p>
                            <strong>{{ $order->name }}</strong><br>
                            {{ $order->ward->name }}, {{ $order->district->name }}<br>
                            {{ $order->city->name }}, Việt Nam<br>
                            SĐT: {{ $order->phone }}<br>
                            Email: {{ $order->email }}
                        </p>
                    </td>
                </tr>
            </table>

            <table class="invoice-details" width="100%" cellspacing="0" cellpadding="10" border="0">
                <tr>
                    <td align="left">
                        <p class="mb-0">
                            <strong>Ngày tạo đơn:</strong><br>
                            {{ $order->created_at->format('d/m/Y') }}
                        </p>
                    </td>
                    <td align="center">
                        @if ($order->payment_method_id == 1)
                            <p class="mb-0">
                                <strong>Thực hiện mua hàng:</strong><br>
                                Qua website PNJ
                            </p>
                        @else
                            <p class="mb-0">
                                <strong>Hạn thanh toán:</strong><br>
                                {{ $order->created_at->addDays(14)->format('d/m/Y') }}
                            </p>
                        @endif
                    </td>
                    <td align="center">
                        <p class="mb-0">
                            <strong>Phương thức:</strong><br>
                            {{ $order->paymentMethod->name }}
                        </p>
                    </td>
                    <td align="right">
                        <p class="mb-0">
                            <strong>Trạng thái:</strong><br>
                            <span class="badge bg-warning">{{ $order->orderStatus->name }}</span>
                        </p>
                    </td>
                </tr>
            </table>

            <div class="invoice-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $key => $orderItem)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span>
                                        {{ $orderItem->variant->product->product_name }}
                                    </span>
                                </td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ formatPrice($orderItem->unit_price) }}
                                </td>
                                <td>{{ formatPrice($orderItem->total_price) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <table class="invoice-total" width="100%" cellspacing="0" cellpadding="10">
                <tr>
                    <td width="50%" align="right" valign="top">
                        <table width="100%" cellspacing="0" cellpadding="5" border="0"
                            style="border-collapse: collapse;">
                            <tr>
                                <td align="right"
                                    style="font-weight: bold; padding-right: 20px; font-size: 16px; width: 90%">Tổng
                                    cộng:
                                </td>
                                <td align="right">{{ formatPrice($order->total_amount) }}</td>
                            </tr>
                            <tr>
                                <td align="right"
                                    style="font-weight: bold; padding-right: 20px; font-size: 16px; width: 90%">
                                    Khuyến mãi:
                                </td>
                                <td align="right">
                                    {{ $order->discount_amount ? '-' . formatPrice($order->discount_amount) : '0' }}
                                </td>
                            </tr>
                            <tr>
                                <td align="right"
                                    style="font-weight: bold; padding-right: 20px; font-size: 16px; width: 90%">Tổng
                                    thanh
                                    toán:</td>
                                <td align="right">
                                    {{ formatPrice(floatval($order->total_amount) - floatval($order->discount_amount ?? 0)) }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="thank-you">
                Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p class="mb-0">© 2025 CÔNG TY TNHH LUXURY DESIGN</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

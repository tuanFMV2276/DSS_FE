<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Luxury Diamond</title>
    <link rel="stylesheet" href="{{ asset('css/PurchaseOrder.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @include('Layout.Header.Header')
    <div class="tab mt-3">
        <div id="exTab3" class="container" style="padding: 0">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#all" data-bs-toggle="tab">Tất cả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pending" data-bs-toggle="tab">Chờ thanh toán</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#preparing" data-bs-toggle="tab">Chuẩn bị hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#delivering" data-bs-toggle="tab">Vận chuyển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#finished" data-bs-toggle="tab">Hoàn thành</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cancelled" data-bs-toggle="tab">Đã hủy</a>
                </li>
            </ul>

            <div class="tab-content">
                @foreach (['all', 'pending', 'preparing', 'delivering', 'finished', 'cancelled'] as $status)
                <div class="tab-pane fade {{ $status == 'all' ? 'show active' : '' }}" id="{{ $status }}">
                    @if (empty($orders[$status]))
                    <h5 class="text-center mt-3 mb-3">Chưa có đơn hàng</h5>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders[$status] as $orderIndex => $order)
                            @foreach ($orderDetails as $detail)
                            @if ($detail['order_id'] == $order['id'])
                            <tr>
                                <td>{{ $orderIndex + 1 }}</td>
                                <td><img src="/Picture_Product/{{$products[array_search($detail['product_id'], array_column($products, 'id'))]['image']}}"
                                        width="100px" height="100px">
                                </td>
                                <td>{{ $products[array_search($detail['product_id'], array_column($products, 'id'))]['product_name'] }}
                                </td>
                                <td>{{ $products[array_search($detail['product_id'], array_column($products, 'id'))]['quantity'] }}
                                </td>
                                <td>{{ number_format($detail['unit_price'], 0, ',', '.') }}₫</td>
                                <td>
                                    @switch($order['status'])
                                    @case(0)
                                    Chờ thanh toán
                                    @break
                                    @case(1)
                                    Đã chấp nhận
                                    @break
                                    @case(2)
                                    Chuẩn bị hàng
                                    @break
                                    @case(3)
                                    Đang giao hàng
                                    @break
                                    @case(4)
                                    Hoàn thành
                                    @break
                                    @case(5)
                                    Đã hủy
                                    @break
                                    @default
                                    Không xác định
                                    @endswitch
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('Layout.Footer.Footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 50px;
    }

    .cart-item {
        display: flex;
        border-bottom: 1px solid #e5e5e5;
        padding: 15px 0;
    }

    .cart-item img {
        max-width: 100%;
        height: auto;
    }

    .cart-item-details {
        flex: 1;
        margin-left: 15px;
    }

    .cart-item-title a {
        color: #000;
        text-decoration: none;
        font-weight: 700;
    }

    .cart-item-title a:hover {
        color: #ff8e31;
    }

    .cart-item-price b {
        font-size: 18px;
        color: #ff8e31;
    }

    .cart-remove {
        color: #000;
        cursor: pointer;
        display: block;
        margin-top: 10px;
    }

    .cart-remove:hover {
        text-decoration: none !important;
        background: #ff0000 !important;
        color: #fff !important;
    }

    .btn-link {
        color: #ff0000 !important;
    }

    .order-summary {
        border: 1px solid #e5e5e5;
        padding: 15px;
    }

    .order-summary h2 {
        text-align: center;
        margin-bottom: 15px;
    }

    .order-summary table {
        width: 100%;
    }

    .order-summary td {
        padding: 5px 0;
    }

    .order-summary .text-right {
        text-align: right;
    }

    .checkout-button {
        text-align: center;
        margin-top: 15px;
    }

    .btn-orange {
        background-color: #ff8e31 !important;
        color: #fff !important;
        width: 100%;
        border: none;
        padding: 10px 0;
        font-size: 18px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .btn-orange:hover {
        background-color: #ffa800 !important;
        color: #000 !important;
    }

    .cart-fee {
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #e5e5e5;
    }

    .cart-fee-title {
        font-weight: 700;
    }

    .cart-fee-amount {
        color: #ff8e31;
    }

    .voucher-section {
        margin-top: 15px;
        text-align: center;
    }

    .voucher-section input[type="text"] {
        width: calc(100% - 120px);
        padding: 10px;
        border: 1px solid #e5e5e5;
        margin-right: 10px;
        display: inline-block;
    }

    .voucher-section .apply-voucher-btn {
        padding: 10px;
        border: none;
        background-color: #ff8e31;
        color: #fff;
        cursor: pointer;
        text-transform: uppercase;
    }

    .voucher-section .apply-voucher-btn:hover {
        background-color: #ffa800;
    }
    </style>
</head>

<body>
    @include('Layout.Header.Header')
    <div class="container" id="cart-container">
        <div class="row mb-3">
            <div class="col-md-8">
                <div class="cart-items">
                    @if(count($cart) > 0)
                    @foreach($cart as $index => $item)
                    <div class="cart-item">
                        <input type="hidden" name="code" value="{{ $item['product_code'] }}">
                        <input type="hidden" name="ringsize" value="{{ $item['ringsize'] }}">
                        <div class="text-center">
                            <a href="{{ route('product.show', $item['id']) }}" style="text-decoration: none">
                                <img src="{{ $item['image'] }}" alt="Product Image" style="width: 150px; height: 150px">
                            </a>
                            <form action="{{ route('cart.remove', $index) }}" method="POST" style="display:inline;"
                                class="cart-remove-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="cart-remove btn btn-link">Xoá</button>
                            </form>
                        </div>
                        <div class="cart-item-details">
                            <h4 class="cart-item-title">
                                <a href="{{ route('product.show', $item['id']) }}"
                                    style="text-decoration: none">{{ $item['product_name'] }}
                                    {{$item['product_code']}}</a>
                            </h4>
                            <div class="cart-item-price">
                                Giá: <b>{{ number_format($item['total_price'], 0, ',', '.') }}₫</b>
                            </div>
                            <div class="cart-item-ringsize">
                                Size: <b>{{ $item['ringsize'] }}</b>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Giỏ hàng của bạn trống.</p>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-summary">
                    <h2>Đơn hàng</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tổng phụ</td>
                                <td class="text-right">
                                    {{ number_format(array_sum(array_column($cart, 'total_price')), 0, ',', '.') }} VND
                                </td>
                            </tr>
                            <tr>
                                <td>Vận chuyển</td>
                                <td class="text-right">0 VND</td>
                            </tr>
                            <tr>
                                <td>Tất cả</td>
                                <td class="text-right">
                                    {{ number_format(array_sum(array_column($cart, 'total_price')), 0, ',', '.') }} VND
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <div class="voucher-section">
                        <input type="text" placeholder="Nhập mã voucher">
                        <button class="apply-voucher-btn">Áp dụng</button>
                    </div> -->
                    <div class="checkout-button">
                        <a href="/Payment" class="btn btn-orange">Thanh Toán Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layout.Footer.Footer')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpERiu6uJkX1er2Jdr6UUB6UGmMxG1e1OBm0GidFV/gIoMjnNpD8SB9gWlrP" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('.cart-remove').on('click', function(e) {
            e.preventDefault();

            var button = $(this);
            var form = button.closest('form');
            var url = form.attr('action');

            $.ajax({
                type: 'DELETE',
                url: url,
                data: form.serialize(),
                success: function(response) {
                    $('#cart-container').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    </script>


</body>

</html>
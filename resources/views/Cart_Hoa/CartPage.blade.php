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
    @include('Header_Hoa.Header')
    <div class="container" id="cart-container">
        <div class="row">
            <!-- Cart Items Section -->
            <div class="col-md-8">
                <div class="cart-items">
                    @foreach($cart as $item)
                    <div class="cart-item">
                        <div class="text-center">
                            <a href="#">
                                <img src="{{ asset($item['image']) }}" alt="Product Image"
                                    style="width: 150px; height: 150px">
                            </a>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger cart-remove">Xoá</button>
                            </form>
                        </div>
                        <div class="cart-item-details">
                            <h4 class="cart-item-title">
                                <a href="#">{{ $item['name'] }}</a>
                            </h4>
                            <ul class="list-unstyled">
                                @if($item['type'] == 'diamond')
                                <li><strong>Carat:</strong> {{ $item['carat'] }}</li>
                                <li><strong>Color:</strong> {{ $item['color'] }}</li>
                                <li><strong>Clarity:</strong> {{ $item['clarity'] }}</li>
                                <li><strong>Cut:</strong> {{ $item['cut'] }}</li>
                                @else
                                <li><strong>Ring Size:</strong> {{ $item['ringsize'] }}</li>
                                @endif
                            </ul>
                            <div class="cart-item-price">
                                <b>{{ number_format($item['price'], 0, ',', '.') }} VND</b>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Order Summary Section -->
            <div class="col-md-4">
                <div class="order-summary">
                    <h2>Đơn hàng</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Tổng phụ</td>
                                <td class="text-right">{{ number_format($totalPrice, 0, ',', '.') }} VND</td>
                            </tr>
                            <tr>
                                <td>Vận chuyển</td>
                                <td class="text-right">0 VND</td>
                            </tr>
                            <tr>
                                <td>Tất cả</td>
                                <td class="text-right">{{ number_format($totalPrice, 0, ',', '.') }} VND</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="voucher-section">
                        <input type="text" placeholder="Nhập mã voucher">
                        <button class="apply-voucher-btn">Áp dụng</button>
                    </div>
                    <div class="checkout-button">
                        <button class="btn btn-orange" onclick="proceedToPayment()">Thanh Toán Ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Footer_Hoa.Footer')
    <script>
    function proceedToPayment() {
        const cartItems = [];
        document.querySelectorAll('.cart-item').forEach(item => {
            const id = item.querySelector('strong').innerText.split(': ')[1];
            const name = item.querySelector('.cart-item-title a').innerText;
            const price = item.querySelector('.cart-item-price b').innerText.replace(/\D/g, '');
            const image = item.querySelector('img').src;
            cartItems.push({
                id,
                name,
                price,
                image
            });
        });

        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        window.location.href = '/Payment';
    }
    </script>
</body>

</html>
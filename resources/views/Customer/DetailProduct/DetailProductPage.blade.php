<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{ $product['product_name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/DetailProduct.css') }}">
</head>

<body>
    @include('Layout.Header.Header')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-7">
                <img src="{{ asset('/Picture_Product/' . $product['image']) }}" alt="ring">
            </div>
            <div class="col-sm-5 text-center">
                <h3>{{ $product['product_name'] }} {{ $product['product_code'] }}</h3>
                <h4>Giá: {{ number_format($product['total_price'], 0, ',', '.') }}₫</h4>
                <h5>Chất Liệu: Vàng trắng 14K</h5>
                <div class="col-sm-12 ring-size-wrapper mt-4">
                    <h4>Kích Thước Nhẫn</h4>
                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <input type="number" name="ringsize" id="ringSizeInput" min="4" max="9" step="0.25"
                                value="4" class="form-control me-2" style="width: 80px;">
                        </div>
                        <input type="hidden" name="name" value="{{ $product['product_name'] }}">
                        <input type="hidden" name="total_price" value="{{ $product['total_price'] }}">
                        <input type="hidden" name="image" value="{{ asset('/Picture_Product/' . $product['image']) }}">
                        <input type="hidden" name="product_code" value="{{ $product['product_code'] }}">
                        <div>
                            <button type="button" id="add-to-cart-button" class="btn btn-orange">Thêm vào giỏ
                                hàng</button>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <button type="submit" class="btn btn-orange">Mua ngay</button>
                        </div>
                    </form>
                    <div id="add-to-cart-message" class="text-success mt-2" style="display: none;">Sản phẩm đã được thêm
                        vào giỏ hàng!</div>
                </div>
                <strong>
                    <p id="delivery-date" class="text-center mt-3"></p>
                </strong>
                <div class="extend">
                    <div><i class="fas fa-lightbulb"></i> Đưa ra gợi ý</div>
                    <div><i class="fas fa-comments"></i> Trò chuyện ngay</div>
                    <div><i class="fas fa-phone"></i> Gọi cho chúng tôi</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Thông tin chi tiết chiếc nhẫn</h2>
        <table>
            <tr>
                <th>Thuộc tính</th>
                <th>Giá trị</th>
            </tr>
            <tr>
                <td>Kim loại</td>
                <td>Vàng trắng 14k</td>
            </tr>
            <tr>
                <td>Đường kính</td>
                <td>4mm</td>
            </tr>
        </table>

        <h2 class="text-center">Chi tiết kim cương đính ở trung tâm</h2>
        <table class="diamond-details">
            <tr>
                <td>Shape:</td>
                <td>{{ $mainDiamond['shape'] }}</td>
                <td>Polish:</td>
                <td>{{ $mainDiamond['polish'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Carat Weight:</td>
                <td>{{ $mainDiamond['cara_weight'] }} ct.</td>
                <td>Symmetry:</td>
                <td>{{ $mainDiamond['symmetry'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Color:</td>
                <td>{{ $mainDiamond['color'] }}</td>
                <td>Measurements:</td>
                <td>{{ $mainDiamond['measurements'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Clarity:</td>
                <td>{{ $mainDiamond['clarity'] }}</td>
                <td>Culet:</td>
                <td>{{ $mainDiamond['culet'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Cut:</td>
                <td>{{ $mainDiamond['cut'] }}</td>
                <td>Fluorescence:</td>
                <td>{{ $mainDiamond['fluorescence'] ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Certification:</td>
                <td>{{ $mainDiamond['certification'] ?? 'GIA Certified' }}</td>
            </tr>
        </table>
    </div>
    @include('Layout.Footer.Footer')

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const deliveryDateElement = document.getElementById("delivery-date");
        const today = new Date();
        const deliveryDate = new Date(today);
        deliveryDate.setDate(today.getDate() + 14);

        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };

        const formattedDeliveryDate = deliveryDate.toLocaleDateString('vi-VN', options);
        deliveryDateElement.textContent = "Ngày giao hàng dự kiến: " + formattedDeliveryDate;
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#add-to-cart-button').click(function() {
            $.ajax({
                url: $('#add-to-cart-form').attr('action'),
                method: 'POST',
                data: $('#add-to-cart-form').serialize(),
                success: function(response) {
                    $('#add-to-cart-message').show().delay(3000).fadeOut();
                },
                error: function(response) {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        });
    });
    </script>
</body>

</html>
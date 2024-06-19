<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brilliance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css_Manh/detailshell.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-7">
                <img src="{{ asset('/Picture_Hoa/ShellDiamond/' . $product['image']) }}" alt="ring">
            </div>
            <div class="col-sm-5 text-center">
                <h3>{{ $product['product_name'] }}</h3>
                <h4>Giá: {{ number_format($product['price_rate'], 0, ',', '.') }}₫</h4>
                <h5>Chất Liệu: Vàng trắng 14K</h5>
                <div class="col-sm-12 ring-size-wrapper mt-4">
                    <h4>Kích Thước Nhẫn</h4>
                </div>
                <div class="display_btn mt-3">
                    <div>
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="number" name="ringsize" id="ringSizeInput" min="4" max="9" step="0.25"
                                value="4">
                            <input type="hidden" name="name" value="{{ $product['product_name'] }}">
                            <input type="hidden" name="price" value="{{ $product['price_rate'] }}">
                            <input type="hidden" name="image"
                                value="{{ asset('/Picture_Hoa/ShellDiamond/' . $product['image']) }}">
                            <!-- <input type="hidden" name="type" value="product"> Specify the type as product -->
                            <input type="submit" name="addcart" value="Thêm vào giỏ hàng">
                        </form>

                    </div>
                </div>
                <p class="text-center mt-3">Dự kiến giao hàng ngày 20/6/2024</p>
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
                <td>Số lượng tồn kho</td>
                <td>17072</td>
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
        <table>
            <tr>
                <th>Hình dạng</th>
                <th>Carat</th>
            </tr>
            <tr>
                <td>Round:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Princess:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Asscher:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Radiant:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Cushion:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Emerald:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Marquise:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Oval:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Pear:</td>
                <td>0.20 - 2.60</td>
            </tr>
            <tr>
                <td>Heart:</td>
                <td>0.20 - 2.60</td>
            </tr>
        </table>
    </div>
    @include('Footer_Hoa/Footer')
</body>

</html>
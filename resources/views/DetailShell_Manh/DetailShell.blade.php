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
                <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring">
            </div>
            <div class="col-sm-5 text-center">
                <h3>Nhẫn Kim Cương Nữ R.2235</h3>
                <h4>Giá của chúng tôi 4,200,000</h4>
                <div class="col-sm-12 attribute flex-center last-no-margin" style="flex-wrap: wrap;"
                    radio-name="attributes[13]">
                    <label onclick="radioChange(this, '14K White Gold', 13, 54)" class="text-center active">
                        <input type="radio" name="attributes[13]" value="54" checked="">
                        14K White Gold </label>
                    <label onclick="radioChange(this, '18K White Gold, +2,600,000', 13, 55)" class="text-center">
                        <input type="radio" name="attributes[13]" value="55">
                        18K White Gold + 2,600,000 đ </label>
                </div>
                <div class="col-sm-12 ring-size-wrapper mt-4">
                    <h4>Kích Thước Nhẫn</h4>
                    <select id="ringSizeSelect">
                        <option value="4">4</option>
                        <option value="4.25">4.25</option>
                        <option value="4.5">4.5</option>
                        <option value="4.75">4.75</option>
                        <option value="5">5</option>
                        <option value="5.25">5.25</option>
                        <option value="5.5">5.5</option>
                        <option value="5.75">5.75</option>
                        <option value="6">6</option>
                        <option value="6.25">6.25</option>
                        <option value="6.5">6.5</option>
                        <option value="6.75">6.75</option>
                        <option value="7">7</option>
                        <option value="7.25">7.25</option>
                        <option value="7.5">7.5</option>
                        <option value="7.75">7.75</option>
                        <option value="8">8</option>
                        <option value="8.25">8.25</option>
                        <option value="8.5">8.5</option>
                        <option value="8.75">8.75</option>
                        <option value="9">9</option>
                        <option value="I Don't Know">I Don't Know</option>
                    </select>
                </div>

                <div class="display_btn mt-3">
                    <div>
                        <div class="abtn">
                            <a href="{{ URL::to('/CompletedProduct') }}" class="btn btn-lg custom-btn">Xem thành
                                phẩm</a>
                        </div>

                    </div>
                    <div>
                        <div class="abtn">
                            <a href="{{ URL::to('/Cart') }}" class="btn btn-lg custom-btn">Tới giỏ hàng</a>
                        </div>

                    </div>

                </div>

                <p class="text-center">Dự kiến giao hàng ngày 7/6/2024</p>
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
                <td>Vàng trắng 14k hoặc 18k</td>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brilliance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css_Manh/style.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container mt-5">
        <div class="dashboardgold-header">
            <h1>BẢNG GIÁ VÀNG</h1>
            <p>Áp dụng đối với các Doanh Nghiệp Kinh Doanh Vàng (tiệm vàng)</p>
            <p>Cập nhật từ 18/05/2024 09:17:45 đến 20/5/2024 08:09:35</p>
            <p>(ĐVT: 1.000đ/Chỉ)</p>

        </div>
        <h5 class="mt-5 headergoldpricelist">
            Giá Vàng tại TpHCM
        </h5>
        <table>
            <thead>
                <tr>
                    <th>Loại vàng </th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Vàng miếng SJC 999.9</td>
                    <td>
                        <span>8,095</span>
                    </td>
                    <td>
                        <span>8,350</span>
                    </td>
                </tr>
                <tr>
                    <td>Nhẫn Trơn PNJ 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,570</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng Kim Bảo 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,570</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng Phúc Lộc Tài 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,580</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 999.9</td>
                    <td>
                        <span>7,390</span>
                    </td>
                    <td>
                        <span>7,470</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 999</td>
                    <td>
                        <span>7,383</span>
                    </td>
                    <td>
                        <span>7,463</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 99</td>
                    <td>
                        <span>7,305</span>
                    </td>
                    <td>
                        <span>7,405</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 750 (18K)</td>
                    <td>
                        <span>5,478</span>
                    </td>
                    <td>
                        <span>5,618</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 585 (14K)</td>
                    <td>
                        <span>4,245</span>
                    </td>
                    <td>
                        <span>4,385</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 416 (10K)</td>
                    <td>
                        <span>2,983</span>
                    </td>
                    <td>
                        <span>3,123</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng miếng PNJ (999.9)</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,580</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 916 (22K)</td>
                    <td>
                        <span>6,803</span>
                    </td>
                    <td>
                        <span>6,853</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 650 (15.6K)</td>
                    <td>
                        <span>4,731</span>
                    </td>
                    <td>
                        <span>4,871</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 680 (16.3K)</td>
                    <td>
                        <span>4,955</span>
                    </td>
                    <td>
                        <span>5,095</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 610 (14.6K)</td>
                    <td>
                        <span>4,432</span>
                    </td>
                    <td>
                        <span>4,572</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 375 (9K)</td>
                    <td>
                        <span>2,676</span>
                    </td>
                    <td>
                        <span>2,816</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 333 (8K)</td>
                    <td>
                        <span>2,340</span>
                    </td>
                    <td>
                        <span>2,480</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <h5 class="mt-5 headergoldpricelist">
            Giá Vàng tại Cần Thơ
        </h5>

        <table>
            <thead>
                <tr>
                    <th>Loại vàng | ĐVT: 1.000đ/Chỉ</th>
                    <th>Giá mua</th>
                    <th>Giá bán</th>
                </tr>
            </thead>
            <tbody id="content-price">
                <tr>
                    <td>Vàng miếng SJC 999.9</td>
                    <td>
                        <span>8,170</span>
                    </td>
                    <td>
                        <span>8,450</span>
                    </td>
                </tr>
                <tr>
                    <td>Nhẫn Trơn PNJ 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,570</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng Kim Bảo 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,570</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng Phúc Lộc Tài 999.9</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,580</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 999.9</td>
                    <td>
                        <span>7,390</span>
                    </td>
                    <td>
                        <span>7,470</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 999</td>
                    <td>
                        <span>7,383</span>
                    </td>
                    <td>
                        <span>7,463</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng nữ trang 99</td>
                    <td>
                        <span>7,305</span>
                    </td>
                    <td>
                        <span>7,405</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 750 (18K)</td>
                    <td>
                        <span>5,478</span>
                    </td>
                    <td>
                        <span>5,618</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 585 (14K)</td>
                    <td>
                        <span>4,245</span>
                    </td>
                    <td>
                        <span>4,385</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 416 (10K)</td>
                    <td>
                        <span>2,983</span>
                    </td>
                    <td>
                        <span>3,123</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng miếng PNJ (999.9)</td>
                    <td>
                        <span>7,400</span>
                    </td>
                    <td>
                        <span>7,580</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 916 (22K)</td>
                    <td>
                        <span>6,803</span>
                    </td>
                    <td>
                        <span>6,853</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 650 (15.6K)</td>
                    <td>
                        <span>4,731</span>
                    </td>
                    <td>
                        <span>4,871</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 680 (16.3K)</td>
                    <td>
                        <span>4,955</span>
                    </td>
                    <td>
                        <span>5,095</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 610 (14.6K)</td>
                    <td>
                        <span>0</span>
                    </td>
                    <td>
                        <span>4,572</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 375 (9K)</td>
                    <td>
                        <span>2,676</span>
                    </td>
                    <td>
                        <span>2,816</span>
                    </td>
                </tr>
                <tr>
                    <td>Vàng 333 (8K)</td>
                    <td>
                        <span>2,340</span>
                    </td>
                    <td>
                        <span>2,480</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    @include('Footer_Hoa/Footer')

    <script src="https://kit.fontawesome.com/a5f04f16e7.js" crossorigin="anonymous"></script>
</body>

</html>

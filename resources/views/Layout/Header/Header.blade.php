<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Luxury Diamond</title>
    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="top-header">
            <div class="left">
                <img src="/Picture_web/Diamond.jpg" alt="Brilliance Logo" class="logo" />
                <div class="address">
                    <p>Hệ thống showrooms</p>
                    <p>CN HCM: 35 Trần Phú, Phường 4, quận 5, TP.HCM</p>
                    <p>CN CT: 53 Trần Phú, Ninh Kiều, Cần Thơ</p>
                </div>
            </div>
            <div class="center">
                <a href="/">
                    <h1>Luxury Diamond</h1>
                </a>
            </div>
            <div class="right">
                <div class="cart-login">
                    <button class="cart-btn">
                        <a href="/Cart"><i class="bx bxs-cart"> GIỎ HÀNG</i></a>
                    </button>
                    <button class="login-btn"><a href="/Login"><i class="bx bx-user"> ĐĂNG NHẬP</i></a></button>
                </div>
                <div>
                    <form class="search">
                        <button class="search-btn"><i class="bx bx-search"></i></button>
                        <input class="search-input" type="text" placeholder=" Tìm kiếm..." />

                    </form>
                </div>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="/">Trang Chủ</a></li>
                <!-- <li>
                    <a href="/NaturalDiamondPage">Kim Cương Tự Nhiên <i class='bx bx-chevron-down'></i></a>
                    <ul class="sub-menu">
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Round.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Round</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Oval.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Oval</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Emerald.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Emerald</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Heart.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Heart</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Pear.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Pear</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Marquise.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Marquise</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/LabDiamondPage">Kim Cương Nhân Tạo <i class='bx bx-chevron-down'></i></a>
                    <ul class="sub-menu">
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Round.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Round</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Oval.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Oval</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Emerald.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Emerald</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Heart.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Heart</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Pear.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Pear</a></li>
                        <li><a href="#"><img src="{{asset('/Picture_Hoa/MaterialDiamond/Marquise.jpg')}}"
                                    style="width: 20px; height: 20px;" /> Marquise</a></li>
                    </ul>
                </li> -->
                <li><a href="/ListProduct">Nhẫn Kim Cương <i class='bx bx-chevron-down'></i></a>
                    <ul class="sub-menu">
                        <li><a href="#">Nhẫn Kim Cương Nam</a></li>
                        <li><a href="#">Nhẫn Kim Cương Nữ</a></li>
                    </ul>
                </li>
                <li><a href="#">Dịch Vụ <i class='bx bx-chevron-down'></i></a>
                    <ul class="sub-menu">
                        <li><a href="#">Chính Sách Bảo Hành, Thu Hồi & Đổi Trả</a></li>
                        <li><a href="#">Chính Sách Bảo Mật Thông Tin</a></li>
                        <li><a href="#">Phương Thức Thanh Toán</a></li>
                        <li><a href="/IntroduceDiamondGIA">Giới thiệu kim cương GIA</a></li>
                    </ul>
                </li>
                <li><a href="#">Tin Tức</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>
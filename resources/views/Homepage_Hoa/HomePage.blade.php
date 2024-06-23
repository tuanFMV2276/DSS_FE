<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/HomePage.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container-xxl">
        <div class="slide-show">
            <div class="list-images">
                <div class="list-image-item">
                    <img src="{{ asset('/Picture/HomePage/anh1.jpg') }}" alt="Trang sức" />
                </div>
                <div class="list-image-item">
                    <img src="{{ asset('/Picture/HomePage/anh2.jpg') }}" alt="Trang sức" />
                </div>
                <div class="list-image-item">
                    <img src="{{ asset('/Picture/HomePage/anh3.jpg') }}" alt="Trang sức" />
                </div>
                <div class="list-image-item">
                    <img src="{{ asset('/Picture/HomePage/anh4.jpg') }}" alt="Trang sức" />
                </div>
            </div>
            <div class="btns">
                <div class="btn-left btn"><i class="bx bx-chevron-left"></i></div>
                <div class="btn-right btn"><i class="bx bx-chevron-right"></i></div>
            </div>
            <div class="index-images">
                <div class="index-item index-item-0 active"></div>
                <div class="index-item index-item-1"></div>
                <div class="index-item index-item-2"></div>
                <div class="index-item index-item-3"></div>
            </div>
        </div>
    </div>
    <div class="pos1">
        <div class="title">
            <h2>
                <span>Luxury Diamond</span><br />
                Điểm đến của Người Sành Kim Cương
            </h2>
        </div>
        <div class="list-item">
            <div class="item item-0">
                <img src="{{ asset('/Picture/HomePage/pos1-1.jpg') }}" alt="Kim Cương" />
            </div>
            <div class="item item-1">
                <img src="{{ asset('/Picture/HomePage/pos1-2.jpg') }}" alt="Kim Cương" />
            </div>
            <div class="item item-0">
                <img src="{{ asset('/Picture/HomePage/pos1-3.jpg') }}" alt="Kim Cương" />
            </div>
        </div>
        <div class="content">
            <span class="title">D</span>
            <div class="summary">Diamond</div>
        </div>
        <div class="content-default">
            Chúng tôi chỉ bán những Viên Kim Cương có độ tinh khiết hoàn hảo và nước
            màu đẹp nhất
        </div>
    </div>
    <div class="pos2">
        <div class="feature">
            <img src="{{ asset('/Picture/HomePage/pos2-1.jpg') }}" alt="Dịch vụ VIP" />
            <h3>DỊCH VỤ VIP</h3>
            <p>Dịch vụ chăm sóc khách hàng Private trọn đời dành cho VIP</p>
        </div>
        <div class="feature">
            <img src="{{ asset('/Picture/HomePage/pos2-2.jpg') }}" alt="Chứng nhận quốc tế" />
            <h3>CHỨNG NHẬN QUỐC TẾ</h3>
            <p>
                100% Kim cương đạt chứng nhận GIA - Chứng nhận uy tín số 1 thế giới về
                kim cương tự nhiên
            </p>
        </div>
        <div class="feature">
            <img src="{{ asset('/Picture/HomePage/pos2-3.jpg') }}" alt="Độc đáo & đẳng cấp" />
            <h3>ĐỘC ĐÁO & ĐẲNG CẤP</h3>
            <p>
                Thể hiện chất riêng độc nhất với những viên kim cương độc bản và Bộ
                sưu tập giới hạn
            </p>
        </div>
    </div>
    <div class="pos3">
        <h2>Sản Phẩm Nổi Bật</h2>
        <div class="tab tab-2">
            <div class="title">Nhẫn Kim cương</div>
            <div class="carousel-inner">
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond1.jpg') }}" alt="Diamond 1" />
                    <p>{{ $diamondShells[0]['name'] }}</p>
                    <strong>{{ $diamondShells[0]['price'] }}₫</strong>
                </div>
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond2.jpg') }}" alt="Diamond 2" />
                    <p>{{ $diamondShells[1]['name'] }}</p>
                    <strong>{{ $diamondShells[1]['price'] }}₫</strong>
                </div>
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond3.jpg') }}" alt="Diamond 3" />
                    <p>{{ $diamondShells[2]['name'] }}</p>
                    <strong>{{ $diamondShells[2]['price'] }}₫</strong>
                </div>
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond4.jpg') }}" alt="Diamond 4" />
                    <p>{{ $diamondShells[3]['name'] }}</p>
                    <strong>{{ $diamondShells[3]['price'] }}₫</strong>
                </div>
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond5.jpg') }}" alt="Diamond 5" />
                    <p>{{ $diamondShells[4]['name'] }}</p>
                    <strong>{{ $diamondShells[4]['price'] }}₫</strong>
                </div>
                <div class="product">
                    <img src="{{ asset('/Picture_Hoa/ShellDiamond/ShellDiamond6.jpg') }}" alt="Diamond 6" />
                    <p>{{ $diamondShells[5]['name'] }}</p>
                    <strong>{{ $diamondShells[5]['price'] }}₫</strong>
                </div>
            </div>
            <div class="carousel-controls">
                <a href="/ListShell"><button class="view-all">Xem Tất Cả</button></a>
            </div>
        </div>
    </div>
    <div class="pos5">
        <div class="container">
            <div class="title-special">
                Kim Cương Tự Nhiên<br />
                Nguồn Năng Lượng Tinh Khiết<br />
                Từ Vũ Trụ
            </div>
            <div class="image">
                <img src="{{ asset('/Picture/HomePage/pos5.jpg') }}" alt="Kim Cương" />
            </div>
            <div class="strength-box">
                <div class="strength-item">
                    <div class="title-1">NĂNG LƯỢNG ĐẾN TỪ SỰ NGƯỠNG MỘ</div>
                </div>
                <div class="strength-item">
                    <div class="title-2">
                        NĂNG LƯỢNG TÍCH CỰC CHO SỨC KHỎE NGƯỜI DÙNG
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos6">
        <div class="container">
            <div class="block-newslist">
                <div class="title-defauls">
                    <div class="title">Tin mới nhất</div>
                    <div class="button-new-default">
                        <a href="#">XEM TẤT CẢ</a>
                    </div>
                </div>
                <div class="news-list-default row">
                    <div class="news-item col-4">
                        <img src="{{ asset('/Picture/HomePage/pos6-1.jpg') }}" alt="Tin tức" />
                        <div class="title">Siêu Sale 11.11</div>
                    </div>
                    <div class="news-item col-4">
                        <img src="{{ asset('/Picture/HomePage/pos6-2.jpg') }}" alt="Tin tức" />
                        <div class="title">20/10 Rạng rỡ như hoa</div>
                    </div>
                    <div class="news-item col-4">
                        <img src="{{ asset('/Picture/HomePage/pos6-3.jpg') }}" alt="Tin tức" />
                        <div class="title">Đón thu sang - Ngàn ưu đãi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Footer_Hoa/Footer')
    <script src="{{ asset('js/HomePage.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6677a8889d7f358570d26d8f/1i11mkmli';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>

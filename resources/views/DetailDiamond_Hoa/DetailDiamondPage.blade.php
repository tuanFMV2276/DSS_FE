<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Detail</title>
        <link
            rel="stylesheet"
            href="{{ asset('css_Hoa/DetailDiamondPage.css') }}"
        />
        <link
            href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
        />
    </head>
    <body>
        @include('Header_Hoa/Header')
        <div class="container">
            <div class="diamond-detail row">
                <div class="image-diamond col-md-5 col-lg-7">
                    <figure>
                        <img
                            width="100%"
                            height="100%"
                            src="{{asset('/Picture_Hoa/DetailDiamondPage/DetailDiamond.jpg')}}"
                            alt="0.35 Carat Emerald Loose Diamond, D, VS2, Super Ideal, GIA Certified"
                        />
                    </figure>
                </div>
                <div class="info-diamond col-md-7 col-lg-5">
                    <h1
                        style="padding-left: 10px; padding-right: 10px"
                        class="title"
                    >
                        0.35 Carat Emerald Loose Diamond, D, VS2, Super Ideal,
                        GIA Certified
                    </h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="product-availability text-center">
                                <strong>Sẵn có:</strong>
                                <small
                                    ><span class="product-available"
                                        >Còn hàng</span
                                    >
                                    (có sẵn 1)</small
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-pricing text-center"
                        style="border-top: none; margin-top: 15px"
                    >
                        Giá tiền:
                        <span class="vnd">
                            <span itemprop="price">12,700,000</span>
                            <span itemprop="priceCurrency">VND</span>
                        </span>
                    </div>
                    <div style="display: inline" class="btn text-center">
                        <div class="btn-1">
                            <button>
                                <span style="text-transform: none"
                                    >Chọn vỏ nhẫn
                                    <img
                                        style="width: 17px; margin-left: 5px"
                                        src="{{asset('/Picture_Hoa/DetailDiamondPage/big-ring-setting-icon.jpg')}}"
                                /></span>
                            </button>
                        </div>
                        <div class="btn-2">
                            <button>
                                <span
                                    >Vào giỏ hàng<i
                                        class="bx bxs-cart"
                                        style="color: #1c6392"
                                    ></i
                                ></span>
                            </button>
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col-sm-12 text-center">
                            <div class="shipping-estimate">
                                <i class="bx bxs-truck"></i>Dự kiến giao hàng:
                                <span class="shipping-estimate-text"
                                    >Thứ 4, ngày 12 tháng 6</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-page">
                <div class="title text-center">
                    <h2>
                        <span>Brilliance</span><br />
                        Điểm đến của Người Sành Kim Cương
                    </h2>
                </div>
                <div class="banner">
                    <div class="feature">
                        <img
                            src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-1.jpg')}}"
                            alt="Dịch vụ VIP"
                        />
                        <h3>DỊCH VỤ VIP</h3>
                        <p>
                            Dịch vụ chăm sóc khách hàng Private trọn đời dành
                            cho VIP
                        </p>
                    </div>
                    <div class="feature">
                        <img
                            src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-2.jpg')}}"
                            alt="Chứng nhận quốc tế"
                        />
                        <h3>CHỨNG NHẬN QUỐC TẾ</h3>
                        <p>
                            100% Kim cương đạt chứng nhận GIA - Chứng nhận uy
                            tín số 1 thế giới về kim cương tự nhiên
                        </p>
                    </div>
                    <div class="feature">
                        <img
                            src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-3.jpg')}}"
                            alt="Độc đáo & đẳng cấp"
                        />
                        <h3>ĐỘC ĐÁO & ĐẲNG CẤP</h3>
                        <p>
                            Thể hiện chất riêng độc nhất với những viên kim
                            cương độc bản và Bộ sưu tập giới hạn
                        </p>
                    </div>
                </div>
            </div>
            <div class="description-diamond col-sm-12">
                <h2 class="title text-center">Chi tiết kim cương</h2>
                <table class="diamond-details">
                    <tr>
                        <td>Stock Number:</td>
                        <td>DI24808705</td>
                        <td>Polish:</td>
                        <td>Excellent</td>
                    </tr>
                    <tr>
                        <td>Shape:</td>
                        <td>Emerald</td>
                        <td>Symmetry:</td>
                        <td>Very Good</td>
                    </tr>
                    <tr>
                        <td>Carat Weight:</td>
                        <td>0.35 ct.</td>
                        <td>Measurements:</td>
                        <td>5.04x3.29x2.14 mm</td>
                    </tr>
                    <tr>
                        <td>Color:</td>
                        <td>D</td>
                        <td>Length to Width:</td>
                        <td>1.53</td>
                    </tr>
                    <tr>
                        <td>Clarity:</td>
                        <td>VS2</td>
                        <td>Girdle:</td>
                        <td>S.L. Thick - Thick</td>
                    </tr>
                    <tr>
                        <td>Cut:</td>
                        <td>Super Ideal</td>
                        <td>Fluorescence:</td>
                        <td>None</td>
                    </tr>
                    <tr>
                        <td>Certification:</td>
                        <td>GIA</td>
                    </tr>
                    <tr>
                        <td>Depth %:</td>
                        <td>65.2 %</td>
                    </tr>
                    <tr>
                        <td>Table %:</td>
                        <td>68 %</td>
                    </tr>
                </table>
            </div>
            <div class="related-diamoonds-outer">
                <div class="container">
                    <section class="related-products">
                        <h2 class="text-center">Similar Diamonds</h2>
                        <div class="similar-diamond">
                            <div class="row related-inner">
                                <div class="col-md-3 col-sm-6 related-item">
                                    <a href="#">
                                        <img
                                            src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar1.jpg')}}"
                                            alt="Diamond 1"
                                        />
                                        <p>
                                            0.37 Carat Emerald Loose Diamond, D,
                                            IF, Super Ideal, GIA Certified
                                        </p>
                                        <p class="price">
                                            Giá tiền: 12,100,000đ
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 related-item">
                                    <a href="#">
                                        <img
                                            src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar2.jpg')}}"
                                            alt="Diamond 2"
                                        />
                                        <p>
                                            0.36 Carat Emerald Loose Diamond, D,
                                            VVS2, Super Ideal, GIA Certified
                                        </p>
                                        <p class="price">
                                            Giá tiền: 12,000,000đ
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 related-item">
                                    <a href="#">
                                        <img
                                            src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar3.jpg')}}"
                                            alt="Diamond 3"
                                        />
                                        <p>
                                            0.35 Carat Emerald Loose Diamond, D,
                                            SI1, Ideal, GIA Certified
                                        </p>
                                        <p class="price">
                                            Giá tiền: 12,100,000đ
                                        </p>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 related-item">
                                    <a href="#">
                                        <img
                                            src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar4.jpg')}}"
                                            alt="Diamond 4"
                                        />
                                        <p>
                                            0.38 Carat Emerald Loose Diamond, E,
                                            VVS1, Ideal, GIA Certified
                                        </p>
                                        <p class="price">
                                            Giá tiền: 13,400,000đ
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @include('Footer_Hoa/Footer')
    </body>
</html>

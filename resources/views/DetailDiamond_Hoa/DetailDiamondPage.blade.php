<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Completed Product</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/CompletedProduct.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="row">
        <div class="col-md-6">
            {{-- <img
                    class="img-product"
                    width="100%"
                    height="100%"
                    src="{{asset('/Picture/CompletedProduct/CompletedProduct.jpg')}}"
            alt="Nhẫn đính hôn Solitaire sáu chấu bằng vàng vàng"
            /> --}}
            <img class="img-product ml-5 pl-5" width="100%" height="100%" src="{{ asset('img_Manh/image/ring.png') }}"
                alt="ring">
        </div>
        <div class="col-md-6 text-center content">
            <h2 class="title">Chiếc nhẫn của bạn đã hoàn thành</h2>
            <div class="complete-setting-title">
                Nhẫn Kim Cương Nữ R1
            </div>
            <div class="complete-setting-price">Giá:4,200,000đ</div>
            <div class="complete-diamond-title">
                0.35 Carat Emerald Loose Diamond, D, VS2, Super Ideal, GIA
                Certified
            </div>
            <div class="complete-diamond-price">Giá: 34,800,000</div>
            <div class="complete-total-price">
                <strong>Tổng giá: <span>39,000,000đ</span></strong>
            </div>
            <div class="text-center mt-30">
                <a href="/Cart">
                    <div class="btn-complete">
                        <button>Thêm vào giỏ</button>
                    </div>
                </a>

            </div>
            <div class="complete-icons-wrapper row">
                <div class="complete-icons-block col-4">
                    <div class="complete-icon-img flex-center">
                        <img src="{{asset('/Picture/CompletedProduct/icon-complete-1.jpg')}}" />
                        <div class="text">Giao hàng miễn phí</div>
                    </div>
                </div>
                <div class="complete-icons-block col-4">
                    <div class="complete-icon-img flex-center">
                        <img src="{{asset('/Picture/CompletedProduct/icon-complete-2.jpg')}}" />
                        <div class="text">Tài chính dễ dàng</div>
                    </div>
                </div>
<<<<<<< HEAD
                <div class="complete-icons-block col-4">
                    <div class="complete-icon-img flex-center">
                        <img src="{{asset('/Picture/CompletedProduct/icon-complete-3.jpg')}}" />
                        <div class="text">Trả hàng trong 30 ngày</div>
=======
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
                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-1.jpg')}}" alt="Dịch vụ VIP" />
                    <h3>DỊCH VỤ VIP</h3>
                    <p>
                        Dịch vụ chăm sóc khách hàng Private trọn đời dành
                        cho VIP
                    </p>
                </div>
                <div class="feature">
                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-2.jpg')}}" alt="Chứng nhận quốc tế" />
                    <h3>CHỨNG NHẬN QUỐC TẾ</h3>
                    <p>
                        100% Kim cương đạt chứng nhận GIA - Chứng nhận uy
                        tín số 1 thế giới về kim cương tự nhiên
                    </p>
                </div>
                <div class="feature">
                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/pos2-3.jpg')}}" alt="Độc đáo & đẳng cấp" />
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
                                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar1.jpg')}}"
                                        alt="Diamond 1" />
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
                                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar2.jpg')}}"
                                        alt="Diamond 2" />
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
                                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar3.jpg')}}"
                                        alt="Diamond 3" />
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
                                    <img src="{{asset('/Picture_Hoa/DetailDiamondPage/Similar4.jpg')}}"
                                        alt="Diamond 4" />
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
    </div> -->
    <div class="container">
        <div class="diamond-detail row">
            <div class="image-diamond col-md-5 col-lg-7">
                <figure>
                    <img width="100%" height="100%" src="{{asset('/Picture_Hoa/DetailDiamondPage/DetailDiamond.jpg')}}"
                        alt="{{ $diamond['cara_weight'] }} Carat {{ $diamond['diamond_name'] }}, {{ $diamond['color'] }}, {{ $diamond['clarity'] }}, {{ $diamond['cut'] }}, GIA Certified" />
                </figure>
            </div>
            <div class="info-diamond col-md-7 col-lg-5">
                <h1 style="padding-left: 10px; padding-right: 10px" class="title">
                    {{ $diamond['cara_weight'] }} Carat {{ $diamond['diamond_name'] }}, {{ $diamond['color'] }},
                    {{ $diamond['clarity'] }}, {{ $diamond['cut'] }}, GIA Certified
                </h1>
                <div class="product-pricing text-center" style="border-top: none; margin-top: 15px">
                    Giá tiền:
                    <span class="vnd">
                        <span itemprop="price">{{ number_format($diamond['price'], 0, ',', '.') }}</span>
                        <span itemprop="priceCurrency">₫</span>
                    </span>
                </div>
                <div style="display: inline" class="btn text-center">
                    <div class="btn-1">
                        <!-- <a href="/ListShell?diamond_id={{ $diamond['id'] }}">
                            <button>
                                <span style="text-transform: none">Chọn vỏ nhẫn
                                    <img style="width: 17px; margin-left: 5px"
                                        src="{{asset('/Picture/DetailDiamondPage/big-ring-setting-icon.jpg')}}" /></span>
                            </button>
                        </a> -->
                    </div>
                    <div class="btn-2">
                        <!-- <a href="{{ URL::to('/Cart') }}">
                            <button>
                                <span>Thêm vào giỏ hàng<i class="bx bxs-cart" style="color: #1c6392"></i></span>
                            </button>
                        </a> -->
                        <div>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="image" value="{{ $diamond['image'] }}">
                                <input type="hidden" name="carat" value="{{ $diamond['cara_weight'] }}">
                                <input type="hidden" name="name" value="{{ $diamond['diamond_name'] }}">
                                <input type="hidden" name="color" value="{{ $diamond['color'] }}">
                                <input type="hidden" name="clarity" value="{{ $diamond['clarity'] }}">
                                <input type="hidden" name="cut" value="{{ $diamond['cut'] }}">
                                <input type="hidden" name="price" value="{{ $diamond['price'] }}">
                                <input type="hidden" name="type" value="diamond"> <!-- Specify the type as diamond -->
                                <input type="submit" name="addcart" value="Thêm vào giỏ hàng">
                            </form>

                        </div>
>>>>>>> 8f8357b9e4a051a018867f4441752e4d9c15676b
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="title col-sm-12 text-center">Chi tiết kim cương</div>
        <div class="tab-content col-sm-12">
            <div class="tabpanel">
                <h2 class="d-flex">
                    0.35 Carat Emerald Loose Diamond, D, VS2, Super Ideal,
                    GIA Certified
                </h2>
                <div class="tab-price text-center">Giá: 12,700,000đ</div>
            </div>
            <div class="description-diamond">
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
                        <td>Culet:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Certification:</td>
                        <td>GIA</td>
                        <td>Fluorescence:</td>
                        <td>None</td>
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
        </div>
    </div>
    <div class="row">
        <div class="title col-sm-12 text-center">Chi tiết vỏ nhẫn</div>
        <div class="tab-content col-sm-12">
            <div class="tabpanel">
                <h2 class="d-flex">
                    Nhẫn Kim Cương Nữ R.2235
                </h2>
                <div class="tab-price text-center">Giá: 4,200,000đ</div>
            </div>
            <div class="description-shell">
                <table class="shell-details">
                    <tr>
                        <td>Stock Number:</td>
                        <td>15304</td>
                        <td>Chiều rộng:</td>
                        <td>2.5mm</td>
                    </tr>
                    <tr>
                        <td>Loại kim loại:</td>
                        <td>Vàng 14K hoặc 18K</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @include('Footer_Hoa/Footer')
</body>

</html>
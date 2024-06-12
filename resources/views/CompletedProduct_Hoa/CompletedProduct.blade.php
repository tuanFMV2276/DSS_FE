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
                Nhẫn Kim Cương Nữ R.2235
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
                <div class="complete-icons-block col-4">
                    <div class="complete-icon-img flex-center">
                        <img src="{{asset('/Picture/CompletedProduct/icon-complete-3.jpg')}}" />
                        <div class="text">Trả hàng trong 30 ngày</div>
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
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brilliance</title>

    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/css_Quan_main.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')
    <main class="dark-page-wrapper mt-5">
      <div class="container" id="cart-container">
          <div class="row">
              <!-- Cart Items Section -->
              <div class="col-md-8">
                  <div class="cart-items">
                      <div class="row">
                          <div class="col-12">
                              <div class="cart-item">
                                  <div class="row">
                                    <div>
                                      <div class="col-md-3 text-center">
                                          <a href="#">
                                              <img src="{{asset('/Picture/DetailDiamondPage/DetailDiamond.jpg')}}" alt="Product Image" class="img-responsive center-block" style="height: 150px; width: 150px;">
                                          </a>
                                          <span class="cart-remove" onclick="#">Xoá</span>
                                      </div>
                                      <div class="col-md-9">
                                          <div class="cart-item-details">
                                              <h4 class="cart-item-title h4_Manh">
                                                  <a href="#" style="text-decoration: none; font-weight: 700">0.30 carat Oval Loose Diamond, E, VVS2, Super Ideal, GIA Certified</a>
                                              </h4>
                                              <ul class="list-unstyled">
                                                  <li><strong>Mã chứng khoán:</strong> D123138308</li>
                                              </ul>
                                              <div class="cart-item-price">
                                                  <b>19,000,000VND</b>
                                              </div>
                                          </div>
                                          
                                      </div>
                                    </div>
                                    <div class="mt-2">
                                      <div class="col-md-3 text-center">
                                          <a href="#">
                                              <img src="{{asset('/Picture/DetailDiamondPage/DetailDiamond.jpg')}}" alt="Product Image" class="img-responsive center-block" style="height: 150px; width: 150px;">
                                          </a>
                                          <span class="cart-remove" onclick="#">Xoá</span>
                                      </div>
                                      <div class="col-md-9">
                                          <div class="cart-item-details">
                                              <h4 class="cart-item-title h4_Manh">
                                                  <a href="#" style="text-decoration: none; font-weight: 700">0.30 carat Oval Loose Diamond, E, VVS2, Super Ideal, GIA Certified</a>
                                              </h4>
                                              <ul class="list-unstyled">
                                                  <li><strong>Mã chứng khoán:</strong> D123138308</li>
                                              </ul>
                                              <div class="cart-item-price">
                                                  <b>19,000,000VND</b>
                                              </div>
                                          </div>
                                          
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- Order Summary Section -->
              <div class="col-md-4">
                  <div class="order-summary">
                      <h2 class="text-center">Đơn hàng</h2>
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td>Tổng phụ</td>
                                  <td class="text-right">39,000,000VND</td>
                              </tr>
                              <tr>
                                  <td>Vận chuyển</td>
                                  <td class="text-right">0VND</td>
                              </tr>
                              <tr>
                                  <td>Tất cả</td>
                                  <td class="text-right">39,000,000VND</td>
                              </tr>
                          </tbody>
                      </table>
                      <div class="checkout-button text-center">
                          <a href="{{ route('Payment1') }}" class="btn btn-lg btn-orange">
                              <span>Thanh Toán Ngay</span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </main>
  

    {{-- <main class="dark-page-wrapper">
        <div class="container" id="cart-container">
            <div class="row-side">
                <div class="col-xs-12 col-sm-12 col-md-8" style="width: 66.666667%;">
                    <div id="" style="min-height: 215px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="cart__item-wrap">
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-3 col-md-3 text-center">
                                            <a href="">
                                                <img height="500" width="500" src=""
                                                    class="img-responsive center-block">
                                            </a>
                                            <span class="cart__remove" onClick="">Xoá</span>
                                        </div>
                                        <div class="col-xs-7 col-sm-9 col-md-9">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="cart__item-top">
                                                        <h2 class="cart__item-title">
                                                            <a href="">0.30 carat Oval Loose Diamond, E, VVS2,
                                                                Super Ideal, GIA Certified</a>
                                                        </h2>
                                                    </div>
                                                    <ul class="list-unstyled">
                                                        <li class="product__item-title">
                                                            <strong>Mã chứng khoán</strong>
                                                            D123138308
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div id="cart__price-wrap"
                                                    class="hidden-xs col-sm-2 col-md-2 product__title-item">
                                                    <div>
                                                        <b>19,000,000VND</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4" style="width: 33.33333333%;">
                    <div class="row" id="side-cart">
                        <div class="col-xs-12">
                            <h2 style="text-align: center;">Đơn hàng</h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Tổng phụ</td>
                                        <td class="text-right">39,000,000VND</td>
                                    </tr>
                                    <tr>
                                        <td>Vận chuyển</td>
                                        <td class="text-right">0VND</td>
                                    </tr>
                                    <tr>
                                        <td>Tất cả</td>
                                        <td class="text-right">39,000,000VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12">

                        </div>
                        <div class="col-xs-12">
                            <div id="cart-promo-code">
                                <a href="{{ route('Payment1') }}"
                                    class="cart__btn_checkout_mobile cart__btn btn btn-brl btn-lg btn-orange fb-click-secure-checkout"
                                    onlick="" style="margin: auto">
                                    <span class="fb-click-secure-checkout">
                                        Thanh Toán Ngay
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main> --}}


    @include('Footer_Hoa/Footer')
</body>

</html>

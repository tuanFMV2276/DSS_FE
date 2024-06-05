<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brilliance</title>
    
    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/Footer.css') }}">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/css_Quan_main.css') }}">
  </head>
  <body>
    <header>
      <div class="top-header">
        <div class="left">
          <img src="/Picture/img153.png" alt="Brilliance Logo" class="logo" />
          <div class="address">
            <p>Hệ thống showrooms</p>
            <p>CN HCM: 35 Trần Phú, Phường 4, quận 5, TP.HCM</p>
            <p>CN CT: 53 Trần Phú, Ninh Kiều, Cần Thơ</p>
          </div>
        </div>
        <div class="center">
          <h1>Brilliance</h1>
        </div>
        <div class="right">
          <div class="cart-login">
            <button class="cart-btn">
              <i class="bx bxs-cart"> GIỎ HÀNG</i>
            </button>
            <button class="login-btn">ĐĂNG NHẬP</button>
          </div>
          <div class="searchform-wrapper">
            <form class="searchform">
              <input
                class="search-input"
                type="text"
                placeholder="Tìm kiếm..."
              />
              <button class="search-btn"><i class="bx bx-search"></i></button>
            </form>
          </div>
        </div>
      </div>
      <nav>
        <ul>
          <li><a href="#">Trang Chủ</a></li>
          <li>
            <a href="#">Kim Cương Tự Nhiên <i class='bx bx-chevron-down'></i></a>
            <ul class="sub-menu">
              <li><a href="#">Round</a></li>
              <li><a href="#">Princess</a></li>
              <li><a href="#">Cushion</a></li>
              <li><a href="#">Oval</a></li>
              <li><a href="#">Emerald</a></li>
              <li><a href="#">Heard</a></li>
              <li><a href="#">Pear</a></li>
              <li><a href="#">Marquise</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Kim Cương Nhân Tạo <i class='bx bx-chevron-down'></i></a>
            <ul class="sub-menu">
              <li><a href="#">Round</a></li>
              <li><a href="#">Princess</a></li>
              <li><a href="#">Cushion</a></li>
              <li><a href="#">Oval</a></li>
              <li><a href="#">Emerald</a></li>
              <li><a href="#">Heard</a></li>
              <li><a href="#">Pear</a></li>
              <li><a href="#">Marquise</a></li>
            </ul>
          </li>
          <li><a href="#">Nhẫn Kim Cương <i class='bx bx-chevron-down'></i></a>
            <ul class="sub-menu">
              <li><a href="#">Nhẫn Kim Cương Nam</a></li>
              <li><a href="#">Nhẫn Kim Cương Nữ</a></li>
            </ul>
        </li>
          <li><a href="#">Nhẫn Cưới</a></li>
          <li><a href="#">Nhẫn Cầu Hôn</a></li>
          <li><a href="#">Dịch Vụ <i class='bx bx-chevron-down'></i></a>
            <ul class="sub-menu">
              <li><a href="#">Chính Sách Bảo Hành, Thu Hồi & Đổi Trả</a></li>
              <li><a href="#">Chính Sách Bảo Mật Thông Tin</a></li>
              <li><a href="#">Phương Thức Thanh Toán</a></li>
            </ul>
        </li>
          <li><a href="#">Tin Tức</a></li>
          <li><a href="#">Liên Hệ</a></li>
        </ul>
      </nav>
    </header>

    <main>
    <div class="region region-content-top">
        <div class="block block-brl-blocks" id="block-brl-blocks-brl-cart-nav">
          <div class="content">
            <div class="container">
              <h1>Địa chỉ và Thanh toán</h1>
              <ul id="cart-tabs" class="tabs__ list-unstyled text-center clearfix">
                <li class="tabs__tab done" id="cart-tab-1">
                  <span>
                    <b>1</b>
                    "Vận chuyển"
                  </span>
                </li>
                <li class="tabs__tab active" id="cart-tab-2">
                  <span>
                    <b>2</b>
                    "Thanh toán"
                  </span>
                </li>
                <li class="tabs__tab" id="cart-tab-3">
                  <span>
                    <b>3</b>
                    "Xem lại & Xác nhận"
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container" style="min-height: 100vmin;">
    <div class="col-md-8 col-sm-12 col-xs-12">
      <section class="brl-cart-checkout-wrap">
        <div class="region region-content">
          <form class="uc-cart-checkout-form">
            <div>
              <legend>
                <h2 class="">Chọn phương thức vận chuyển</h2>
              </legend>
              <fieldset class="form-wrapper" id="quotes-pane">
                                        <legend>
                                            <span class="fieldset-legend">Calculate shipping cost</span>
                                        </legend>
                                        <div class="fieldset-wrapper">
                                            <div id="quote">
                                                <div class="form-item form-type-radio form-item-panes-quotes-quotes-quote-option">
                                                    <input type="radio" id="" name="panes[quotes][quotes][quote_option]" value="flatrate_2---0" checked="checked" class="form-radio"/>
                                                    <label class="option" for="">Giao hàng miễn phí: 0VND </label>
                                                </div>
                                                <input type="hidden" name="panes[quotes][quotes][flatrate_2---0][rate]" value="0.0000"/>
                                                <div class="form-item form-type-radio form-item-panes-quotes-quotes-quote-option">
                                                    <input type="radio" id="" name="panes[quotes][quotes][quote_option]" value="flatrate_6---0" class="form-radio"/>
                                                    <label class="option" for="">Ngày làm việc tiếp theo (Khi sẵn sàng): 900,000VND </label>
                                                </div>
                                                <input type="hidden" name="panes[quotes][quotes][flatrate_6---0][rate]" value="900,000"/>
                                                <div class="form-item form-type-radio form-item-panes-quotes-quotes-quote-option">
                                                    <input type="radio" id="" name="panes[quotes][quotes][quote_option]" value="flatrate_3---0" class="form-radio"/>
                                                    <label class="option" for="">Giao hàng vào thứ bảy (Khi sẵn sàng): 1,200,000VND </label>
                                                </div>
                                                <input type="hidden" name="panes[quotes][quotes][flatrate_3---0][rate]" value="1,200,000"/>
                                                <div class="form-item form-type-radio form-item-panes-quotes-quotes-quote-option">
                                                    <input type="radio" id="" name="panes[quotes][quotes][quote_option]" value="flatrate_4---0" class="form-radio"/>
                                                    <label class="option" for="">Giữ hàng tại địa điểm (FedEx): 0VND </label>
                                                </div>
                                                <input type="hidden" name="panes[quotes][quotes][flatrate_4---0][rate]" value="0.0000"/>
                                                <div id="edit-panes-quotes-quotes-quote-option" class="form-radios"></div>
                                            </div>
                </div>
              </fieldset>
              <div clas="row">
                <div class="col-sm-12">
                                                            <legend>
                                                                <h2 class="cart__headline">Payment Method</h2>
                                                            </legend>
                                                            <p>Select a payment method from the following options.</p>
                                                            <div class="">
                                                                <label class="element-invisible" for="">
                                                                    Payment method <span class="" title="">*</span>
                                                                </label>
                                                                <div id="" class="form-radios">
                                                                    <div class="">
                                                                        <input type="radio" id="" name="panes[payment][payment_method]" value="credit" checked="checked" class="form-radio"/>
                                                                        <label class="option" for="">
                                                                            Credit card: <img class="uc-credit-cctype uc-credit-cctype-visa" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/visa.gif" alt="Visa"/>
                                                                            <img class="uc-credit-cctype uc-credit-cctype-mastercard" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/mastercard.gif" alt="MasterCard"/>
                                                                            <img class="uc-credit-cctype uc-credit-cctype-discover" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/discover.gif" alt="Discover"/>
                                                                            <img class="uc-credit-cctype uc-credit-cctype-amex" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/amex.gif" alt="American Express"/>
                                                                        </label>
                                                                    </div>
                                                                    <div class="">
                                                                        <input type="radio" id="" name="panes[payment][payment_method]" value="paypal_wps" class="form-radio"/>
                                                                        <label class="option" for="">
                                                                            <img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" alt="PayPal" class="uc-credit-cctype"/>
                                                                            PayPal<br/>
                                                                            <span id="paypal-includes">
                                                                                Includes: <img class="uc-credit-cctype uc-credit-cctype-visa" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/visa.gif" alt="Visa"/>
                                                                                <img class="uc-credit-cctype uc-credit-cctype-mastercard" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/mastercard.gif" alt="MasterCard"/>
                                                                                <img class="uc-credit-cctype uc-credit-cctype-discover" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/discover.gif" alt="Discover"/>
                                                                                <img class="uc-credit-cctype uc-credit-cctype-amex" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/amex.gif" alt="American Express"/>
                                                                                <img class="uc-credit-cctype uc-credit-cctype-echeck" src="https://www.brilliance.com/sites/all/modules/contrib/ubercart/payment/uc_credit/images/echeck.gif" alt="eCheck"/>
                                                                                <img src="https://www.paypal.com/en_US/i/logo/PayPal_mark_37x23.gif" alt="PayPal" class="uc-credit-cctype"/>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="">
                                                                        <input type="radio" id="" name="panes[payment][payment_method]" value="affirm" class="form-radio"/>
                                                                        <label class="option" for="">Affirm financing </label>
                                                                    </div>
                                                                    <div class="">
                                                                        <input type="radio" id="" name="panes[payment][payment_method]" value="bank_transfer" class="form-radio"/>
                                                                        <label class="option" for="">Bank Transfer (2% Discount) </label>
                                                                    </div>
                                                                    <div class="">
                                                                        <input type="radio" id="r" name="panes[payment][payment_method]" value="phone_order" class="form-radio"/>
                                                                        <label class="option" for="">Phone Order </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
    
    <div class="col-md-4 hidden-sx hidden-sm">
          <section class="brl-cart-checkout-aside-wrap" id="side-cart">
            <div class="row">
              <div class="col-xs-12">
                <div id="cart-promo-code">
                    <a href="{{ route('CartPage') }}" class="cart__btn btn btn-br1 btn-lg btn-orange center">
                      <span>
                        Xem lại đơn đặt hàng của bạn
                      </span>
                    </a>
                </div>
              </div>
              <div class="col-xs-12">
                <h2 style="text-align: center;">Đơn hàng</h2>
              </div>
              <div class="col-xs-12">
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
                <div id="cart-promo-code">
                    <a href="{{ route('Payment3') }}" class="cart__btn btn btn-br1 btn-lg btn-orange center">
                      <span>
                        Tiếp tục thanh toán
                      </span>
                    </a>
                </div>
              </div>
            </div>
          </section>
        </div>
    </div>
    </main>


    <footer class="text-center text-lg-start bg-body-tertiary line">
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Brilliance
              </h6>
              <div class="link-icons">
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-linkedin"></i>
                </a>
              </div>
              <div>
                <i class="bx bxs-phone-call"></i> 0933 1977 55 - 0877 0566 88
              </div>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">Về chúng tôi</h6>
              <p>
                <a href="#!" class="text-reset">Giới thiệu</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Giấy chứng nhận</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Hướng dẫn sử dụng</h6>
              <p>
                <a href="#!" class="text-reset">Đo size</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Bảo quản trang sức</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Hướng dẫn chọn nhẫn cưới</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Cẩm nang kim cương</a>
              </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase fw-bold mb-4">Hỗ trợ</h6>
              <p>
                <a href="#!" class="text-reset">Chính sách mua hàng</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Chính sách thu hồi</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Bảo mật thông tin</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Giá vàng hôm nay</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Phương thức thanh toán</a>
              </p>
            </div>
          </div>
        </div>
      </section>
      <div
        class="text-center p-4"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2021 Copyright
      </div>
    </footer>
  </body>
</html>
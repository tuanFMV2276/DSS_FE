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
    @include('Header_Hoa/Header')

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
                <li class="tabs__tab" id="cart-tab-2">
                  <span>
                    <b>2</b>
                    "Thanh toán"
                  </span>
                </li>
                <li class="tabs__tab active" id="cart-tab-3">
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
    
    <div class="container">
      <div calss="row">
        <div class="col-md-7 col-lg-8">
          <legend style="margin-bottom: 0;">Chi tiết đơn hàng</legend>
          <div id="cart__summary-wrap">
            <div class="row">
              <div class="col-sm-12">
                <div class="cart__item-wrap cart__item-wrap-alt">
                  <div class="row">
                    <div class="col-xs-3 col-sm-2 text-center">
                      <div>
                        <img width="500" height="500" src="https://www.brilliance.com/images.brilliance.com/images/loose-diamonds/hd-images/oval-500x500.jpg" class="img-responsive center-block">
                      </div>
                    </div>
                    <div class="col-xs-9 col-sm-10">
                      <div class="row">
                        <div class="col-sm-5 col-md-8">
                          1.30 Carat Oval Loose Diamond, E, VVS1, Ideal, GIA Certified
                        </div>
                        <div class="col-xs-12 col-sm-4 product__title-item">
                          <div>
                            <a>19,000,000VND</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="font-size: 1.6rem">
                  <div class="col-sm-6" style="margin-top: 30px">
                    <legend style="font-size: 21px">Địa chỉ giao hàng/thanh toán</legend>
                    <ul class="list-unstyled" style="padding-left: 30px; font-size: 15px">
                      <li>Nhà văn hóa</li>
                      <li>Quân 9</li>
                      <li>TP HCM</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 col-lg-4">
      <div id="cart__totals-inner">
        <legend style="margin-bottom: 0;">Tổng số đơn hàng</legend>
        <ul class="brl-cart-total list-unstyled">
          <li>
            <div class="brl-cart-total-label">
              <span>Tổng phụ</span>
            </div>
            <div class="brl-cart-total-value">
              <span>39,000,000VND</span>
            </div>
          </li>
          <li>
            <div class="brl-cart-total-label">
              <span>Vận chuyển</span>
            </div>
            <div class="brl-cart-total-value">
              <span>0VND</span>
            </div>
          </li>
          <li>
            <div class="brl-cart-total-label">
              <span>Tất cả</span>
            </div>
            <div class="brl-cart-total-value">
              <span>39,000,000VND</span>
            </div>
          </li>
        </ul>
        <div class="" id="" style="display: block;">
          <button class="cart__btn btn btn-br1 btn-lg btn-orange center">
            <span class="">
              Tiếp tục PayPal
            </span>
          </button>
        </div>
        <div class="order-legal-term" style="margin-bottom: 30px">
          <small>Bằng cách gửi đơn đặt hàng, bạn đòng ý với các điều khoản & điều kiện sử dụng của Brilliance</small>
        </div>
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
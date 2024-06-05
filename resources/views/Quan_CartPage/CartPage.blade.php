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
    <div>
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
    </div>
    </header>

    <main class="dark-page-wrapper">
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
                            <img height="500" width="500" src="" class="img-responsive center-block">
                          </a>
                          <span class="cart__remove" onClick="">Xoá</span>
                        </div>
                        <div class="col-xs-7 col-sm-9 col-md-9">
                          <div class="row">
                            <div class="col-sm-10">
                              <div class="cart__item-top">
                                <h2 class="cart__item-title">
                                  <a href="">0.30 carat Oval Loose Diamond, E, VVS2, Super Ideal, GIA Certified</a>
                                </h2>
                              </div>
                              <ul class="list-unstyled">
                                <li class="product__item-title">
                                  <strong>Mã chứng khoán</strong>
                                  D123138308
                                </li>
                              </ul>
                            </div>
                            <div id="cart__price-wrap" class="hidden-xs col-sm-2 col-md-2 product__title-item">
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
                  <a href="{{ route('Payment1') }}" class="cart__btn_checkout_mobile cart__btn btn btn-brl btn-lg btn-orange fb-click-secure-checkout" onlick="" style="margin: auto">
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
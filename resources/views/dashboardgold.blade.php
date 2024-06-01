<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brilliance</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Brilliance</title>
    <link rel="stylesheet" href="{{ asset('css/Header.css') }}">
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
</head>
<body>
    <header>
        <div class="top-header">
          <div class="left">
            <img src="/Picture/Diamond.jpg" alt="Brilliance Logo" class="logo" />
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
            <div>
              <form class="search">
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
        <nav >
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
                <li><a href="#">Asscher</a></li>
                <li><a href="#">Radiant</a></li>
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
                <li><a href="#">Asscher</a></li>
                <li><a href="#">Radiant</a></li>
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
      <div class="container mt-5">
        <div class="dashboardgold-header">
            <h1>BẢNG GIÁ VÀNG</h1>
            <p>Áp dụng đối với các Doanh Nghiệp Kinh Doanh Vàng (tiệm vàng)</p>
            <p>Cập nhật từ  18/05/2024 09:17:45 đến 20/5/2024 08:09:35</p>
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
      
      <script src="https://kit.fontawesome.com/a5f04f16e7.js" crossorigin="anonymous"></script>    
</body>
</html>
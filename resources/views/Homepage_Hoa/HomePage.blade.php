<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/HomePage.css') }}">
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
    <div class="container-xxl">
      <div class="slide-show">
        <div class="list-images">
          <div class="list-image-item">
            <img src="{{asset('/Picture/HomePage/anh1.jpg')}}" alt="Trang sức" />
          </div>
          <div class="list-image-item">
            <img src="{{asset('/Picture/HomePage/anh2.jpg')}}" alt="Trang sức" />
          </div>
          <div class="list-image-item">
            <img src="{{asset('/Picture/HomePage/anh3.jpg')}}" alt="Trang sức" />
          </div>
          <div class="list-image-item">
            <img src="{{asset('/Picture/HomePage/anh4.jpg')}}" alt="Trang sức" />
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
          <img src="{{asset('/Picture/HomePage/pos1-1.jpg')}}" alt="Kim Cương" />
        </div>
        <div class="item item-1">
          <img src="{{asset('/Picture/HomePage/pos1-2.jpg')}}" alt="Kim Cương" />
        </div>
        <div class="item item-0">
          <img src="{{asset('/Picture/HomePage/pos1-3.jpg')}}" alt="Kim Cương" />
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
        <img src="{{asset('/Picture/HomePage/pos2-1.jpg')}}" alt="Dịch vụ VIP" />
        <h3>DỊCH VỤ VIP</h3>
        <p>Dịch vụ chăm sóc khách hàng Private trọn đời dành cho VIP</p>
      </div>
      <div class="feature">
        <img src="{{asset('/Picture/HomePage/pos2-2.jpg')}}" alt="Chứng nhận quốc tế" />
        <h3>CHỨNG NHẬN QUỐC TẾ</h3>
        <p>
          100% Kim cương đạt chứng nhận GIA - Chứng nhận uy tín số 1 thế giới về
          kim cương tự nhiên
        </p>
      </div>
      <div class="feature">
        <img src="{{asset('/Picture/HomePage/pos2-3.jpg')}}" alt="Độc đáo & đẳng cấp" />
        <h3>ĐỘC ĐÁO & ĐẲNG CẤP</h3>
        <p>
          Thể hiện chất riêng độc nhất với những viên kim cương độc bản và Bộ
          sưu tập giới hạn
        </p>
      </div>
    </div>
    <div class="pos3">
      <h2>Sản Phẩm Nổi Bật</h2>
      <div class="tab tab-1">
        <div class="title">Nhẫn cầu hôn</div>
        <div class="carousel-inner">
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-1.jpg')}}" alt="Diamond 1" />
            <p>
              0.35 Carat Emerald Loose Diamond, D, VS2, Super Ideal, GIA
              Certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-2.jpg')}}" alt="Diamond 2" />
            <p>
              0.30 Carat Round Loose Diamond, F, SI1, Excellent, GIA Certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-3.jpg')}}" alt="Diamond 3" />
            <p>
              0.30 Carat Round Loose Diamond, E, SI1, Super Ideal, GIA Certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-4.jpg')}}" alt="Diamond 4" />
            <p>
              0.28 Carat Princess Loose Diamond, D, VVS2, Very Good, GIA
              Certified
            </p>
            <p>13,000,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-5.jpg')}}" alt="Diamond 5" />
            <p>
              0.30 Carat Pear Loose Diamond, F, SI1, Super Ideal, GIA Certified
            </p>
            <p>12,800,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-1-6.jpg')}}" alt="Diamond 6" />
            <p>
              0.44 Carat Oval Loose Diamond, F, SI1, Super Ideal, GIA Certified
            </p>
            <p>12,700,000đ</p>
          </div>
        </div>
        <div class="carousel-controls">
          <button class="view-all">Xem Tất Cả</button>
        </div>
      </div>
      <div class="tab tab-2">
        <div class="title">Nhẫn Kim cương</div>
        <div class="carousel-inner">
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-1.jpg')}}" alt="Diamond 1" />
            <p>
              1.02 Carat Round Loose Diamond, E, VVS2, Super Ideal, IGI
              certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-2.jpg')}}" alt="Diamond 2" />
            <p>
              0.80 Carat Round Loose Diamond, D, VVS2, Super Ideal, IGI
              certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-3.jpg')}}" alt="Diamond 3" />
            <p>
              0.80 Carat Round Loose Diamond, D, VVS2, Super Ideal, IGI
              certified
            </p>
            <p>12,750,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-4.jpg')}}" alt="Diamond 4" />
            <p>
              1.05 Carat Round Loose Diamond, D, VS2, Super Ideal, IGI certified
            </p>
            <p>13,000,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-5.jpg')}}" alt="Diamond 5" />
            <p>
              0.80 Carat Round Loose Diamond, D, VVS2, Super Ideal, IGI
              certified
            </p>
            <p>12,800,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-2-6.jpg')}}" alt="Diamond 6" />
            <p>
              0.73 Carat Round Loose Diamond, D, VVS1, Super Ideal, IGI
              certified
            </p>
            <p>12,700,000đ</p>
          </div>
        </div>
        <div class="carousel-controls">
          <button class="view-all">Xem Tất Cả</button>
        </div>
      </div>
      <div class="tab tab-3">
        <div class="title">Nhẫn Cưới</div>
        <div class="carousel-inner">
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-1.jpg')}}" alt="Diamond 1" />
            <p>Nhẫn Kim Cương Nữ R.2250</p>
            <p>6.720.000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-2.jpg')}}" alt="Diamond 2" />
            <p>Nhẫn Kim Cương Nữ R.2263</p>
            <p>9.120.000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-3.jpg')}}" alt="Diamond 3" />
            <p>Nhẫn Kim Cương Nữ R.2238</p>
            <p>11.250.000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-4.jpg')}}" alt="Diamond 4" />
            <p>Nhẫn Kim Cương Nữ R.2237</p>
            <p>4,500,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-6.jpg')}}" alt="Diamond 5" />
            <p>Nhẫn Kim Cương Nữ R.2235</p>
            <p>4,200,000đ</p>
          </div>
          <div class="product">
            <img src="{{asset('/Picture/HomePage/pos3-3-7.jpg')}}" alt="Diamond 6" />
            <p>Nhẫn Kim Cương Nữ R.2234</p>
            <p>4.860.000đ</p>
          </div>
        </div>
        <div class="carousel-controls">
          <button class="view-all">Xem Tất Cả</button>
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
          <img src="{{asset('/Picture/HomePage/pos5.jpg')}}" alt="Kim Cương" />
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
              <img src="{{asset('/Picture/HomePage/pos6-1.jpg')}}" alt="Tin tức" />
              <div class="title">Siêu Sale 11.11</div>
            </div>
            <div class="news-item col-4">
              <img src="{{asset('/Picture/HomePage/pos6-2.jpg')}}" alt="Tin tức" />
              <div class="title">20/10 Rạng rỡ như hoa</div>
            </div>
            <div class="news-item col-4">
              <img src="{{asset('/Picture/HomePage/pos6-3.jpg')}}" alt="Tin tức" />
              <div class="title">Đón thu sang - Ngàn ưu đãi</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('Footer_Hoa/Footer')
    <script src="{{asset('js/HomePage.js')}}"></script>
  </body>
</html>

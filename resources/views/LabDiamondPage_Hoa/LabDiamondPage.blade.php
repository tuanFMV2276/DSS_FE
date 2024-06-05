<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kim Cương Tự Nhiên</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/LabDiamondPage.css') }}">
  </head>
  <body>
    @include('Header_Hoa/Header')
    <div class="container">
      <div class="filter">
        <div class="title">
          <h1>CÔNG CỤ TÌM KIM CƯƠNG</h1>
        </div>
        <div class="summary">
          <h2>Lọc để tìm viên kim cương hoàn hảo của bạn</h2>
        </div>
        <div class="body-filter-diamond">
          <div class="filter-diamond-area"></div>
          <div class="filter-diamond-milimetres"></div>
        </div>
      </div>
        <div class="table-container">
          <table class="table-diamond">
            <tr class="diamond-row">
              <td>Shape</td>
              <td>Giá Tham Khảo(VNĐ)</td>
              <td>Milimetre(mm)</td>
              <td>Carat</td>
              <td>Cut</td>
              <td>Color</td>
              <td>Calarity</td>
            </tr>
            <tr class="diamond-row clickable" data-url="/DetailDiamondPage">
              <td>Oval</td>
              <td>12,700,000</td>
              <td>7.15 - 4.92 3.02</td>
              <td>0.66</td>
              <td>Very Good</td>
              <td>D</td>
              <td>VVS1</td>
            </tr>
            <tr class="diamond-row clickable" data-url="/DetailDiamondPage">
              <td>Oval</td>
              <td>11,300,000</td>
              <td>7.01 - 4.88 2.91</td>
              <td>0.62</td>
              <td>Very Good</td>
              <td>D</td>
              <td>VS1</td>
            </tr>
            <tr class="diamond-row clickable" data-url="/DetailDiamondPage">
              <td>Oval</td>
              <td>12,100,000</td>
              <td>6.55 - 4.88 2.98</td>
              <td>0.6</td>
              <td>Very Good</td>
              <td>D</td>
              <td>VVS1</td>
            </tr>
            <tr class="diamond-row clickable" data-url="/DetailDiamondPage">
              <td>Marquise</td>
              <td>11,900,000</td>
              <td>9.20 - 4.46 2.56</td>
              <td>0.63</td>
              <td>Very Good</td>
              <td>D</td>
              <td>VVS2</td>
            </tr>
            <tr class="diamond-row clickable" data-url="/DetailDiamondPage">
              <td>Princess</td>
              <td>13,200,000</td>
              <td>4.68 - 4.65 3.40</td>
              <td>0.63</td>
              <td>Very Good</td>
              <td>D</td>
              <td>VVS2</td>
            </tr>
          </table>
      </div>
      <div class="introduce">
        <div class="summary-content">
          <p dir="ltr" style="text-align: center">
            <span style="font-size: 28px">
              <strong
                >Kim Cương GIA - Hàng thật, giá thật, chất lượng thật!</strong
              ></span
            >
          </p>
          <p dir="ltr" style="text-align: justify">
            Kim cương đang dần chứng minh được sức hút của mình trong thế giới
            trang sức. Cũng vì lẽ đó mà trong những năm gần đây, việc mua bán và
            trao đổi kim cương đã trở nên nhộn nhịp hơn bao giờ hết. Vậy nên,
            giấy chứng nhận <strong>Kim Cương GIA</strong> được ra đời như một
            chuẩn mực về chất lượng của kim cương để giúp mọi người dễ dàng phân
            biệt được ''hàng thật'' và ''những kẻ mạo danh''. Hãy cùng
            <a href="https://trangkimluxury.vn/" target="_blank"> Brillian</a>
            tìm hiểu về loại giấy chứng nhận quyền lực số 1 thế giới dành cho
            kim cương qua bài viết sau.
          </p>
          <h2 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 22px"
                >1. Kim Cương GIA là gì? - Giấy chứng nhận uy tín số 1 thế
                giới!</span
              ></strong
            >
          </h2>
          <p dir="ltr" style="text-align: justify">
            GIA là từ viết tắt của
            <a
              href="https://en.wikipedia.org/wiki/Gemological_Institute_of_America"
              target="_blank"
              >Gemological Institute of America</a
            >, đây là một tổ chức phi lợi nhuận về giám định đá quý của Mỹ. GIA
            không trao đổi hay mua bán kim cương, đá quý và cũng không đại diện
            cho một tổ chức, doanh nghiệp nào. Chính vì lý do này mà giấy chứng
            nhận của GIA luôn khách quan và đảm bảo quyền lợi cho người mua bán
            kim cương, đá quý.
          </p>
          <p dir="ltr" style="text-align: justify">
            Kim Cương GIA là một khái niệm dùng để chỉ những viên kim cương đã
            được tổ chức GIA cấp giấy chứng nhận về chất lượng. Đây được xem là
            tổ chức giám định kim cương uy tín nhất thế giới hiện nay.
          </p>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-1-1.jpg')}}"
                alt="Giấy chứng nhận GIA về chất lượng của kim cương"
                width="770"
              />
              <figcaption>
                <em>Giấy chứng nhận GIA về chất lượng của kim cương</em>
              </figcaption>
            </figure>
          </div>
          <p dir="ltr" style="text-align: justify">
            Trong giấy chứng nhận của GIA sẽ có tất cả thông tin cần thiết về
            viên kim cương, bao gồm:
          </p>
          <ul dir="ltr">
            <li style="text-align: justify">Màu sắc (Color)</li>
            <li style="text-align: justify">Giác cắt (Cut)</li>
            <li style="text-align: justify">Mức độ tinh khiết (Clarity)</li>
            <li style="text-align: justify">Trọng lượng (Carat)</li>
            <li style="text-align: justify">
              Các thông số về tỷ lệ (Proportions)
            </li>
            <li style="text-align: justify">
              Vị trí của những tạp chất trong viên kim cương (Clarity
              Characteristics)
            </li>
          </ul>
          <p dir="ltr" style="text-align: justify">
            Kim Cương GIA được nhiều người ưa chuộng vì sự minh bạch, rõ ràng
            trong nguồn gốc và chất lượng của viên kim cương, tạo điều kiện
            thuận lợi trong các giao dịch trao đổi hoặc mua bán.
          </p>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-1-2.jpg')}}"
                alt="Tiêu chuẩn 4C của Kim Cương GIA"
                width="800"
              />
              <figcaption>
                <em>Tiêu chuẩn 4C của Kim Cương GIA</em>
              </figcaption>
            </figure>
          </div>
          <h2 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 22px"
                >2. Không phải tất cả kim cương đều là Kim Cương GIA!</span
              ></strong
            >
          </h2>
          <p dir="ltr" style="text-align: justify">
            Phần lớn những viên kim cương trên thị trường hiện nay là Kim Cương
            GIA, tuy nhiên không phải tất cả các viên kim cương đều được tổ chức
            GIA giám định qua. Những viên kim cương quá nhỏ và không có giá trị
            lớn thường không được đem đi giám định. Bên cạnh đó, cũng có nhiều
            viên kim cương được giám định bởi các tổ chức khác, thay vì GIA.
          </p>
          <p dir="ltr" style="text-align: justify">
            Để đảm bảo được chất lượng cũng như tính minh bạch của viên kim
            cương, bạn hãy yêu cầu những cơ sở kinh doanh đá quý cho bạn xem
            giấy chứng nhận của viên kim cương đó. Những thương hiệu kinh doanh
            kim cương uy tín, chất lượng sẽ luôn chủ động trong việc đảm bảo
            tính minh bạch của sản phẩm bằng cách cung cấp đầy đủ thông tin về
            giấy chứng nhận hoặc hướng dẫn khách hàng tra cứu thông tin online
            trên website của tổ chức GIA.
          </p>
          <h2 dir="ltr" style="text-align: justify">
            <strong>
              <span style="font-size: 22px"
                >3. Tiêu chuẩn 4C của Kim Cương GIA</span
              >
            </strong>
          </h2>
          <p dir="ltr">
            Vào năm 1939, GIA đã kết hợp cùng
            <a href="#" target="_blank">Đế chế Kim Cương De Beers</a> hùng mạnh
            thiết lập ''Tiêu chí 4C'' để đánh giá chất lượng kim cương, dựa trên
            4 yếu tố.
          </p>
          <h3 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 18px">4.1. Color - Màu sắc</span></strong
            >
          </h3>
          <p dir="ltr" style="text-align: justify">
            Màu sắc của kim cương còn được những người thợ kim hoàn gọi là nước
            màu kim cương, ví dụ như: Kim Cương GIA nước D, nước E,.... Thang
            chuẩn của nước màu kim cương theo tiêu chuẩn của GIA sẽ bắt đầu từ
            D. Lý do vì sao GIA không bắt đầu ở những nước màu cao hơn như A, B,
            C mà phải bắt đầu từ D là để tránh sự nhầm lẫn với những hệ thống
            phân loại nước màu kim cương ngẫu nhiên của nhiều công ty khác.
          </p>
          <p dir="ltr" style="text-align: justify">
            Các cấp màu của Kim Cương GIA từ nước D đến nước Z không liên quan
            đến màu sắc mà liên quan đến độ trong của màu sắc và được chia thành
            5 nhóm như sau:
          </p>
          <ul dir="ltr">
            <li style="text-align: justify">
              Kim cương nước D, E, F được xếp vào nhóm không màu
            </li>
            <li style="text-align: justify">
              Kim cương nước G, H, I, J thuộc vào nhóm gần như không màu
            </li>
            <li style="text-align: justify">
              Kim cương nước K, L, M sẽ bị lẫn một ít sắc vàng nhưng khó nhận
              biết bằng mắt thường
            </li>
            <li style="text-align: justify">
              Kim cương nước N, O, P, Q, R thường sẽ có màu vàng rất nhạt
            </li>
            <li style="text-align: justify">
              Kim cương nước S - Z sẽ có màu vàng nhạt.
            </li>
          </ul>
          <p dir="ltr" style="text-align: justify">
            Vậy nên, kim cương nước D là những viên kim cương tinh khiết và quý
            giá nhất. Khi kim cương có nước màu càng thấp thì giá trị sẽ không
            cao. Tuy nhiên, nếu một viên kim cương có sắc vàng dưới nước Z trong
            thang chuẩn 4C của Kim Cương GIA thì lại được xem là có màu sắc lạ
            mắt và có giá trị cao. Những màu sắc lạ của Kim Cương GIA bao gồm
            đỏ, hồng, xanh da trời, vàng, xanh lam, đen. Nâu và vàng được xem là
            những màu sắc lạ phổ biến nhất.
          </p>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-3-1.jpg')}}"
                alt="Các nước màu của kim cương theo tiêu chuẩn GIA"
                width="800"
              />
              <figcaption>
                <em>Các nước màu của kim cương theo tiêu chuẩn GIA</em>
              </figcaption>
            </figure>
          </div>
          <h3 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 18px"
                >4.2. Clarity - Độ tinh khiết</span
              ></strong
            >
          </h3>
          <p dir="ltr" style="text-align: justify">
            Độ tinh khiết của kim cương đại diện cho khả năng hiển thị những tạp
            chất, đặc điểm trong và ngoài của viên Kim Cương GIA. Các tạp chất
            và tỳ vết này xảy ra trong suốt quá trình hình thành của kim cương
            nên chúng thể hiện rõ sự phát triển của tinh thể Carbon.
          </p>
          <p dir="ltr" style="text-align: justify">
            Để kiểm tra được độ tinh khiết thì các chuyên gia kiểm định Kim
            Cương GIA sẽ sử dụng các thiết bị kính lúp (loup) ở x10 hay các kính
            hiển vi trong phòng thí nghiệm. Mặc dù phân loại kim cương là một
            công việc mang tính chủ quan, tuy nhiên với tiêu chuẩn 4C của Kim
            Cương GIA thì các nhà kiểm định có thể dễ dàng phân loại được độ
            tinh khiết và độ trong của kim cương. Một viên kim cương có độ tinh
            khiết càng cao thì giá trị của chúng sẽ càng cao.
          </p>
          <p dir="ltr" style="text-align: justify">
            Một viên kim cương được đánh giá là F (Flawless) được xem là một
            viên kim cương hoàn hảo, không tỳ vết. Còn nếu được đánh giá là IF
            (Internal Flawless) nghĩa là hoàn hảo ở bên trong. Đây là những viên
            kim cương không phát hiện được tạp chất hoặc tỳ vết khi soi dưới
            kính loup có x10.
          </p>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-3-2.jpg')}}"
                alt="Các cấp bậc về độ tinh khiết của kim cương theo tiêu chuẩn GIA"
                width="800"
              />
              <figcaption>
                <em
                  >Các cấp bậc về độ tinh khiết của kim cương theo tiêu chuẩn
                  GIA</em
                >
              </figcaption>
            </figure>
          </div>
          <h3 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 18px">4.3. Cut - Giác cắt</span></strong
            >
          </h3>
          <p dir="ltr" style="text-align: justify">
            Nhiều bạn vẫn nhầm lẫn giác cắt với hình dáng bên ngoài của viên kim
            cương. “Cut” trong tiêu chuẩn 4C của Kim Cương GIA sẽ được đánh giá
            theo tỷ lệ, không phải dựa vào hình dáng bên ngoài.
          </p>
          <p dir="ltr" style="text-align: justify">
            Khi đánh giá giác cắt của Kim Cương GIA, các mặt của viên kim cương
            sẽ được đo lường cụ thể về góc, chiều dài, độ đối xứng. Các thông số
            cơ bản sẽ bao gồm:
          </p>
          <ul>
            <li dir="ltr">
              <p dir="ltr" style="text-align: justify">
                Table (mặt bàn): Thường có hình lục giác, là giao diện lớn nhất
                của viên kim cương. Kích thước của table sẽ được đo theo đơn vị
                mm rồi chia cho đường kính trung bình để ra được phần trăm. Khi
                phần trăm của table càng lớn thì độ phản xạ ánh sáng sẽ giảm đi
                rất nhiều. Kích thước của table lý tưởng là 53-60%.
              </p>
            </li>
            <li dir="ltr">
              <p dir="ltr" style="text-align: justify">
                Depth (chiều sâu): Chiều sâu của Kim Cương GIA sẽ bằng tổng độ
                dài từ đỉnh đến đáy của viên kim cương chia cho đường kính trung
                bình. Chiều sâu lý tưởng là 60%. Nếu viên kim cương quá sâu, nó
                sẽ xuất hiện những màu tối. Còn nếu viên kim cương quá nông, ánh
                sáng sẽ bị lọt ra ngoài.
              </p>
            </li>
            <li dir="ltr">
              <p dir="ltr" style="text-align: justify">
                Độ dày cạnh: Đây là nơi giao nhau giữa mặt trên và mặt dưới của
                một viên kim cương. Nếu viền quá dày thì sẽ làm giảm vẻ đẹp tổng
                thể và tăng khối lượng của viên kim cương một cách không cần
                thiết.
              </p>
            </li>
            <li dir="ltr">
              <p dir="ltr" style="text-align: justify">
                Culet: Là điểm dưới cùng nằm ở phần đáy của viên kim cương. Nếu
                culet quá lớn thì sẽ ảnh hưởng đến các góc cắt và làm mất vẻ đẹp
                thẩm mỹ. Vì vậy, nhiều viên Kim Cương GIA không có culet hoặc là
                sẽ được xử lý để culet trở nên nhỏ hơn.
              </p>
            </li>
          </ul>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-3-3.jpg')}}"
                alt="Các thông số quan trọng trong việc đánh giá giác cắt của Kim Cương GIA"
                width="800"
              />
              <figcaption>
                <em
                  >Các thông số quan trọng trong việc đánh giá giác cắt của Kim
                  Cương GIA</em
                >
              </figcaption>
            </figure>
          </div>
          <h3 dir="ltr" style="text-align: justify">
            <strong
              ><span style="font-size: 18px"
                >4.4. Carat Weight - Trọng lượng</span
              ></strong
            >
          </h3>
          <p dir="ltr" style="text-align: justify">
            Carat là đơn vị đo trọng lượng của kim cương. Một carat tương đương
            với 0.2 gram. Kim cương phải được cân bằng những chiếc cân điện tử
            có độ chính xác rất cao, độ chia nhỏ nhất của chúng sẽ đến phần
            nghìn carat. Đơn vị của Kim Cương GIA sẽ được tính đến chữ số thập
            phân thứ 2, ví dụ như 2.65 carat, 4.00 carat,... Trọng lượng là một
            trong những đặc điểm quan trọng nhất để định giá một viên kim cương.
            Trọng lượng của viên kim cương càng lớn thì sẽ càng đắt đỏ.
          </p>
          <div style="text-align: center">
            <figure class="image" style="display: inline-block">
              <img
              src="{{asset('/Picture/LabDiamondPage/LabPage-3-4.jpg')}}"
                alt="Carat (ct) là đơn vị đo trọng lượng của kim cương"
                width="800"
              />
              <figcaption>
                <em>Carat (ct) là đơn vị đo trọng lượng của kim cương</em>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </div>
    @include('Footer_Hoa/Footer')
    <script>
      document.querySelectorAll('.diamond-row.clickable').forEach(row => {
        row.addEventListener('click', () => {
          location.assign(row.dataset.url);
        });
      });
    </script>
  </body>
</html>

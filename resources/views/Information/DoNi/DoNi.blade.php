<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hướng Dẫn Đo Size Nhẫn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/DoSize.css') }}">

</head>

<body>
    @include('Layout.Header.Header')
    <div class="container container1 mt-3 mb-3">
        <h1>Hướng Dẫn Đo Size Nhẫn</h1>
        <p style="font-size: 16px;font-weight: 500">Nhẫn cưới, nhẫn đính hôn hay nhẫn trang sức đều là những món đồ quan
            trọng, mang
            tính cá nhân cao, cần phải
            phù hợp và vừa vặn với chủ nhân. Đôi khi, sự không thuận tiện về khoảng cách địa lý, thời gian gây khó khăn
            cho việc thử nhẫn trực tiếp tại cửa hàng. Cùng Brilliance khám phá cách đo chuẩn xác nhất tại nhà, đảm bảo
            sự ưng ý tuyệt đối dành cho món trang sức quý giá.</p>
        <div class="step">
            <h5>1. Đo đường kính của chiếc nhẫn có sẵn</h5>
            <p>Nếu ở nhà bạn đã có sẵn chiếc nhẫn vừa vặn, thoải mái khi đeo, hãy tiến hành cách đo đơn giản: lấy thước
                kẻ đo đường kính lòng trong của chiếc nhẫn (Không tính độ dày nhẫn của phần thân nhẫn) để dựa vào đó tìm
                được size nhẫn phù hợp. Bảng size nhẫn quy chuẩn, cơ bản trên toàn thế giới đều được quy định dựa trên
                độ dài đường kính đường tròn, vậy nên bạn có thể yên tâm gửi số đo chính xác cho chúng tôi và nói rõ đó
                là đường kính lòng trong nhẫn (tránh nhầm chu vi hay size tay)</p>
            <img src="{{ asset('/Picture_web/Service/DoNi/DoNi1.png') }}" alt="thước đo đường kính nhẫn">
            <p class="text-center">Thước đo đường kính nhẫn</p>
            <p>Nếu nhà bạn không có sẵn thước kẻ, bạn có thể tải ứng dụng thước kẻ online trên điện thoại của mình, đặt
                nhẫn trên một phẳng và để điện thoại song song với mặt phẳng đó. Khi mở camera, ứng dụng sẽ quét 3D cảnh
                vật mà nó thu được và ước tính kích thước tương đối chính xác của vật thể, dựa vào tỉ lệ bối cảnh. Bạn
                có thể đo và ghi lại kết quả của 3 lần đo sát nhau và gửi cho cửa hàng để nhờ tư vấn viên hỗ trợ chi
                tiết.</p>
        </div>
        <div class="step">
            <h5>2. Quấn Dây Quanh Ngón Tay</h5>
            <p>Trong trường hợp bạn không tìm được chiếc nhẫn mẫu, có thể tham khảo cách đo thủ công khác: lấy một sợi
                dây hoặc một mảnh giấy dạng thuôn, dài quấn quanh ngón tay đeo nhẫn mong muốn. Sau đó, dùng một chiếc
                bút đánh dấu kĩ điểm giao nhau của sợi dây/ mảnh giấy và lấy thước kẻ đo chiều dài của đoạn thẳng vừa
                tạo.</p>
            <img src="{{ asset('/Picture_web/Service/DoNi/DoNi2.png') }}" alt="Quấn dây quanh ngón tay">
            <p class="text-center">Đo Size nhẫn bằng sợi dây đơn giản </p>
            <p>Bằng cách này, thay vì có đường kính trực tiếp, chúng ta đã có được chu vi ngón tay. Bạn nên đo lại 2-3
                lần một cách cẩn thận để tránh sai số, đảm bảo vị trí cần đeo nhẫn cảm thấy thoải mái và vừa vặn nhất.
                Từ chu vi ngón tay, chia cho số Pi 3,14 ta có thể có được đường kính lòng trong của nhẫn; bạn có thể gửi
                cả 2 kết quả này cho tiệm kim hoàn và nói rõ đâu là đường kính, đâu là chu vi để cửa hàng có thể tư vấn
                chính xác. </p>
        </div>
        <div class="step">
            <h5>3. Một số lưu ý khi đo Size nhẫn</h5>
            <h6>3.1. Nhiệt độ</h6>
            <p>Thực tế, nhiệt độ môi trường xung quanh có thể tác động đến kích cỡ tương đối của ngón tay. Khi trời
                lạnh, ngón tay có thể bị co lại một chút, nên bạn có thể cộng thêm 1mm vào kết quả chu vi ngón tay và
                trừ ngược lại 1mm khi trời nóng. </p>
            <img src="{{ asset('/Picture_web/Service/DoNi/DoNi3.png') }}" alt="Lưu ý đo size">
            <p class="text-center">Một số lưu ý khi đo để tìm Size nhẫn phù hợp</p>
            <h6>3.2. Khớp tay </h6>
            <p>Phần khớp xương tay có thể có chiều rộng lớn hơn phần gốc ngón tay nối liền với bàn tay. Bạn nên đo cả
                phần gốc và khớp tay rồi chọn kết quả tương đối giữa 2 số đo, cũng như lưu ý khi đo khớp thì nên đo cách
                xương khớp vài mm thay vì đo trực tiếp trên đoạn xương gồ lên, để đảm bảo nhẫn vẫn đeo vào dễ dàng nhưng
                không dễ bị rơi, tuột.</p>
            <h6>3.3. Độ dày nhẫn </h6>
            <p>Mỗi thiết kế nhẫn khác nhau sẽ có sự khác biệt về kết cấu và độ dày của đai nhẫn. Nếu bạn ưa chuộng những
                mẫu nhẫn thân tết kim cương cầu kỳ, cá tính hơn nhẫn mảnh, trơn đơn giản, bạn cần xác định rõ mẫu nhẫn
                mong muốn và hỏi kỹ tư vấn viên về yếu tố này. Việc đeo một chiếc nhẫn không vừa vặn sẽ gây vướng víu,
                gò bò khi sử dụng, làm giảm đi giá trị và sự yêu thích dành cho món trang sức quý giá.</p>
            <p>Với những chia sẻ hữu của Brilliance về cách đo size nhẫn, hi vọng bạn sẽ tìm được một chiếc nhẫn ưng ý,
                vừa vặn, toát lên khí chất và phong thái riêng biệt! </p>

        </div>
        <div class="step">
            <h5>4. Tra Cứu Size Nhẫn</h5>
            <p>Sử dụng bảng dưới đây để tra cứu size nhẫn tương ứng với chiều dài bạn vừa đo được.</p>
            <table>
                <thead>
                    <tr>
                        <th>Chiều dài (mm)</th>
                        <th>Size nhẫn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>44.2</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>46.8</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>49.3</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>51.9</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>54.4</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>57.0</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>59.5</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>62.1</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>64.6</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>67.2</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>69.7</td>
                        <td>13</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('Layout.Footer.Footer')
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa chỉ & Thanh toán</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css_Hoa/Payment.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container mt-3">
        <h2 class="mb-4">Địa chỉ & Thanh toán</h2>
        <!-- Stepper component -->
        <div class="md-stepper-horizontal orange mb-4">
            <div class="md-step active" id="step-1-stepper">
                <div class="md-step-circle"><span>1</span></div>
                <div class="md-step-title">Vẫn chuyển</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
            <div class="md-step" id="step-2-stepper">
                <div class="md-step-circle"><span>2</span></div>
                <div class="md-step-title">Thanh toán</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
            <div class="md-step" id="step-3-stepper">
                <div class="md-step-circle"><span>3</span></div>
                <div class="md-step-title">Xem lại & Xác nhận</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="steps">
                    <div class="step" id="step-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>
                        <form id="checkout-form">
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <h4 class="mb-3">Thông tin vận chuyển</h4>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">Tên</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Họ</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">Thành phố</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Mã bưu chính</label>
                                    <input type="text" class="form-control" id="zip" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="subscribe">
                                <label class="form-check-label" for="subscribe">Đăng ký cho tôi nhận ưu đãi độc quyền từ
                                    Luxury Diamond</label>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="nextStep(2)">Thanh
                                toán</button>
                        </form>
                    </div>

                    <div class="step" id="step-2" style="display: none;">
                        <h2 class="mb-4">Địa chỉ & Thanh toán</h2>
                        <h4 class="mb-3">Chọn phương thức vận chuyển</h4>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shippingMethod" id="freeShipping"
                                    value="free" checked>
                                <label class="form-check-label" for="freeShipping">Giao hàng miễn phí: 0đ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shippingMethod" id="officeHours"
                                    value="900000">
                                <label class="form-check-label" for="officeHours">Ngày làm việc tiếp theo (khi sẵn
                                    sàng): 900,000đ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shippingMethod" id="saturdayDelivery"
                                    value="1200000">
                                <label class="form-check-label" for="saturdayDelivery">Giao hàng vào Thứ Bảy (khi sẵn
                                    sàng): 1,200,000đ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shippingMethod" id="fedexDelivery"
                                    value="fedex">
                                <label class="form-check-label" for="fedexDelivery">Giao hàng tại địa điểm (FedEx):
                                    0đ</label>
                            </div>

                            <h4 class="mb-3 mt-4">Phương thức thanh toán</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard"
                                    value="credit" checked>
                                <label class="form-check-label" for="creditCard">Thẻ tín dụng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal"
                                    value="paypal">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="financial"
                                    value="financial">
                                <label class="form-check-label" for="financial">Khẳng định tài chính</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer"
                                    value="bank">
                                <label class="form-check-label" for="bankTransfer">Chuyển khoản ngân hàng (Giảm giá
                                    2%)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="phoneOrder"
                                    value="phone">
                                <label class="form-check-label" for="phoneOrder">Đặt hàng qua điện thoại</label>
                            </div>

                            <div class="form-row mt-4">
                                <div class="form-group col-md-6">
                                    <label for="cardNumber">Số thẻ</label>
                                    <input type="text" class="form-control" id="cardNumber" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="expiryMonth">Ngày hết hạn</label>
                                    <select class="form-control" id="expiryMonth" required>
                                        <option value="01">01 - Tháng 1</option>
                                        <option value="02">02 - Tháng 2</option>
                                        <!-- Add more months as needed -->
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="expiryYear">Năm hết hạn</label>
                                    <select class="form-control" id="expiryYear" required>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <!-- Add more years as needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" required>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Thông tin vận
                                chuyển</button>
                            <button type="button" class="btn btn-primary" onclick="nextStep(3)">Thanh
                                toán</button>
                        </form>
                    </div>

                    <div class="step" id="step-3" style="display: none;">
                        <h2 class="mb-4">Địa chỉ & Thanh toán</h2>
                        <h4 class="mb-3">Review</h4>
                        <!-- Add your review content here -->
                        <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Xem lại đơn đặt
                            hàng</button>
                        <a href="/PaymentSuccessful"><button type="submit" class="btn btn-success">Hoàn tất đặt
                                hàng</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-summary">
                    <h3>Đơn hàng</h3>
                    <div class="order-item">
                        <img src="{{asset('/Picture/DetailDiamondPage/DetailDiamond.jpg')}}" alt="Product Image">
                        <div>
                            <p>0.30 carat Oval Loose Diamond</p>
                            <p>19,000,000đ</p>
                        </div>
                    </div>
                    <div class="order-item">
                        <img src="{{ asset('img_Manh/image/ring.png') }}" alt="Product Image">
                        <div>
                            <p>Chevron Solitaire Engagement Ring</p>
                            <p>18,000,000đ</p>
                        </div>
                    </div>
                    <div class="order-summary-totals">
                        <p>Tổng phụ: 39,000,000đ</p>
                        <p>Vận chuyển: 0đ</p>
                        <p>Tất cả: 39,000,000đ</p>
                    </div>
                    <div class="voucher">
                        <h4>Thêm mã khuyến mãi</h4>
                        <input type="text" class="form-control" placeholder="Nhập mã khuyến mãi">
                        <button class="btn btn-primary mt-2">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Footer_Hoa/Footer')
    <script>
    function nextStep(step) {
        document.querySelectorAll('.step').forEach(function(el) {
            el.style.display = 'none';
        });
        document.getElementById('step-' + step).style.display = 'block';

        document.querySelectorAll('.md-step').forEach(function(el) {
            el.classList.remove('active');
        });
        document.getElementById('step-' + step + '-stepper').classList.add('active');
    }

    function prevStep(step) {
        document.querySelectorAll('.step').forEach(function(el) {
            el.style.display = 'none';
        });
        document.getElementById('step-' + step).style.display = 'block';

        document.querySelectorAll('.md-step').forEach(function(el) {
            el.classList.remove('active');
        });
        document.getElementById('step-' + step + '-stepper').classList.add('active');
    }

    // Initially display the first step
    document.getElementById('step-1').style.display = 'block';
    document.getElementById('step-1-stepper').classList.add('active');
    </script>
</body>

</html>
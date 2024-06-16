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
                <div class="md-step-title">Vận chuyển</div>
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

        <form id="checkout-form" action="{{ route('orders.store') }}" method="POST">
            @csrf
            <input type="hidden" name="total_price" id="total_price" value="0">
            <input type="hidden" name="cartItems" id="cartItems" value="">

            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="steps">
                        <div class="step" id="step-1">
                            <h4 class="mb-3">Thông tin khách hàng</h4>
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-row">
                                <label for="name">Họ và Tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="subscribe" name="subscribe">
                                <label class="form-check-label" for="subscribe">Đăng ký cho tôi nhận ưu đãi độc quyền từ
                                    Luxury Diamond</label>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="nextStep(2)">Thanh toán</button>
                        </div>

                        <div class="step" id="step-2" style="display: none;">
                            <h4 class="mb-3">Phương thức vận chuyển</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shippingMethod" id="freeShipping"
                                    value="free" checked>
                                <label class="form-check-label" for="freeShipping">Giao hàng miễn phí: 0đ</label>
                            </div>
                            <h4 class="mb-3 mt-4">Phương thức thanh toán</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paypal"
                                    value="paypal">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer"
                                    value="bank">
                                <label class="form-check-label" for="bankTransfer">Chuyển khoản ngân hàng</label>
                            </div>
                            <div id="paypal-info" class="payment-info" style="display: none;">
                                <p>Thông tin về PayPal sẽ được hiển thị ở đây.</p>
                            </div>
                            <div id="bank-info" class="payment-info" style="display: none;">
                                <h4>Thông tin chuyển khoản ngân hàng</h4>
                                <p>Vui lòng chuyển khoản theo thông tin dưới đây:</p>
                                <ul>
                                    <li><strong>Tên ngân hàng:</strong> Ngân hàng Vietcombank</li>
                                    <li><strong>Số tài khoản:</strong> 123456789</li>
                                    <li><strong>Chủ tài khoản:</strong> Công ty Luxury Diamond</li>
                                </ul>
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Thông tin vận
                                chuyển</button>
                            <button type="button" class="btn btn-primary" onclick="nextStep(3)">Xem lại & Xác
                                nhận</button>
                        </div>

                        <div class="step" id="step-3" style="display: none;">
                            <h4 class="mb-3">Xem lại & Xác nhận</h4>
                            <div id="review-content">
                                <!-- Add your review content here -->
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Xem lại đơn đặt
                                hàng</button>
                            <button type="submit" class="btn btn-success">Hoàn tất đặt hàng</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-summary">
                        <h3>Đơn hàng</h3>
                        <div id="order-items"></div>
                        <div class="order-summary-totals">
                            <p id="subtotal">Tổng phụ: 0đ</p>
                            <p>Vận chuyển: 0đ</p>
                            <p id="total">Tất cả: 0đ</p>
                        </div>
                        <div class="voucher">
                            <h4>Thêm mã khuyến mãi</h4>
                            <input type="text" class="form-control" placeholder="Nhập mã khuyến mãi">
                            <button class="btn btn-primary mt-2">Áp dụng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

    document.addEventListener('DOMContentLoaded', () => {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        const orderItemsContainer = document.getElementById('order-items');
        let subtotal = 0;

        cartItems.forEach(item => {
            subtotal += parseInt(item.price, 10);

            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item');

            const img = document.createElement('img');
            img.src = item.image;
            img.alt = 'Product Image';

            const details = document.createElement('div');
            details.innerHTML = `<p>${item.name}</p><p>${parseInt(item.price).toLocaleString()}đ</p>`;

            orderItem.appendChild(img);
            orderItem.appendChild(details);

            orderItemsContainer.appendChild(orderItem);
        });

        document.getElementById('subtotal').innerText = `Tổng phụ: ${subtotal.toLocaleString()}đ`;
        document.getElementById('total').innerText = `Tất cả: ${subtotal.toLocaleString()}đ`;

        document.getElementById('total_price').value = subtotal;
        document.getElementById('cartItems').value = JSON.stringify(cartItems);
    });

    // Payment method display logic
    document.addEventListener('DOMContentLoaded', () => {
        const paypalInfo = document.getElementById('paypal-info');
        const bankInfo = document.getElementById('bank-info');

        document.getElementById('paypal').addEventListener('change', () => {
            if (document.getElementById('paypal').checked) {
                paypalInfo.style.display = 'block';
                bankInfo.style.display = 'none';
            }
        });

        document.getElementById('bankTransfer').addEventListener('change', () => {
            if (document.getElementById('bankTransfer').checked) {
                paypalInfo.style.display = 'none';
                bankInfo.style.display = 'block';
            }
        });
    });
    </script>
</body>

</html>
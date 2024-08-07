<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa chỉ & Thanh toán</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Payment.css') }}">
</head>

<body>
    @include('Layout.Header.Header')
    <div class="container mt-3">
        <h2 class="mb-4">Địa chỉ & Thanh toán</h2>
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
            <input type="hidden" name="order_date" id="order_date">
            <input type="hidden" name="total_price" id="total_price"
                value="{{ array_sum(array_column($cartItems, 'total_price')) }}">

            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="steps">
                        <div class="step" id="step-1">
                            <h4 class="mb3">Thông tin khách hàng</h4>
                            <div class="form-group">
                                <label for="email">Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập địa chỉ email hợp lệ.
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <label for="name">Họ và Tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập họ và tên.
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" id="address" name="address_line1" required>
                                    <div class="invalid-feedback">
                                        Vui lòng nhập địa chỉ.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="district">Quận/Huyện</label>
                                    <input type="text" class="form-control" id="district" name="address_line2" required>
                                    <div class="invalid-feedback">
                                        Vui lòng nhập quận/huyện.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">Tỉnh/Thành phố</label>
                                    <input type="text" class="form-control" id="city" name="address_line3" required>
                                    <div class="invalid-feedback">
                                        Vui lòng nhập tỉnh/thành phố.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                    <div class="invalid-feedback">
                                        Vui lòng nhập số điện thoại.
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-orange" onclick="combineAddressAndNextStep()">Thanh
                                toán</button>
                        </div>
                        <input type="hidden" name="address" id="full_address">

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
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer"
                                    value="bank">
                                <label class="form-check-label" for="bankTransfer">Chuyển khoản ngân hàng</label>
                            </div>
                            <div id="paypal-info" class="payment-info" style="display: none; margin-bottom: 1rem">
                                <h4>Thông tin thanh toán qua PayPal</h4>
                                <img src="/Picture_web/Payment/QRpaypal.jpg" alt="PayPal QR" width="500" height="500">
                            </div>
                            <div id="bank-info" class="payment-info" style="display: none; margin-bottom: 1rem">
                                <h4>Thông tin chuyển khoản ngân hàng</h4>
                                <img src="/Picture_web/Payment/QRVCB.jpg" alt="Bank QR" width="500" height="700">
                            </div>
                            <button type="button" class="btn btn-orange" onclick="prevStep(1)">Quay lại</button>
                            <button type="button" class="btn btn-orange" onclick="nextStep(3)">Tiếp tục</button>
                        </div>

                        <div class="step" id="step-3" style="display: none;">
                            <h4 class="mb-3">Xem lại đơn hàng</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['product_name'] }} {{ $item['product_code'] }}</td>
                                        <td>{{ number_format($item['total_price'], 0, ',', '.') }}₫</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Tổng cộng:</strong></td>
                                        <td>{{ number_format(array_sum(array_column($cartItems, 'total_price')), 0, ',', '.') }}₫
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <button type="button" class="btn btn-orange" onclick="prevStep(2)">Quay lại</button>
                            <button type="submit" class="btn btn-orange">Đặt hàng</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">Thông tin đơn hàng</div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($cartItems as $item)
                                <input type="hidden" name="product_code" value="{{ $item['product_code'] }}">
                                <input type="hidden" name="unitprice" value="{{ $item['total_price'] }}">
                                <input type="hidden" name="size" value="{{ $item['ringsize'] }}">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="{{ $item['image'] }}" alt="{{ $item['product_name'] }}" width="50">
                                        <strong>{{ $item['product_name'] }} {{ $item['product_code'] }}</strong>
                                    </div>
                                    <span>{{ number_format($item['total_price'], 0, ',', '.') }}₫</span>
                                </li>
                                @endforeach
                            </ul>
                            <p class="mt-3"><strong>Tổng cộng:</strong>
                                {{ number_format(array_sum(array_column($cartItems, 'total_price')), 0, ',', '.') }}₫
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @include('Layout.Footer.Footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function combineAddressAndNextStep() {
        const email = document.getElementById('email');
        const name = document.getElementById('name');
        const addressLine1 = document.getElementById('address');
        const addressLine2 = document.getElementById('district');
        const addressLine3 = document.getElementById('city');
        const phone = document.getElementById('phone');

        [email, name, addressLine1, addressLine2, addressLine3, phone].forEach(input => input.classList.remove(
            'is-invalid'));

        // Kiểm tra thông tin
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let isValid = true;

        if (!emailPattern.test(email.value)) {
            email.classList.add('is-invalid');
            isValid = false;
        }
        if (name.value.trim() === '') {
            name.classList.add('is-invalid');
            isValid = false;
        }
        if (addressLine1.value.trim() === '') {
            addressLine1.classList.add('is-invalid');
            isValid = false;
        }
        if (addressLine2.value.trim() === '') {
            addressLine2.classList.add('is-invalid');
            isValid = false;
        }
        if (addressLine3.value.trim() === '') {
            addressLine3.classList.add('is-invalid');
            isValid = false;
        }
        const phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone.value)) {
            phone.classList.add('is-invalid');
            isValid = false;
        }

        if (!isValid) return;

        const fullAddress = addressLine1.value + ', ' + addressLine2.value + ', ' + addressLine3.value;

        document.getElementById('full_address').value = fullAddress;

        nextStep(2);
    }

    function nextStep(step) {
        $(".step").hide();
        $("#step-" + step).show();
        $(".md-step").removeClass("active");
        $("#step-" + step + "-stepper").addClass("active");

        if (step === 2) {
            $('input[name="paymentMethod"][value="paypal"]').prop('checked', true);
            $('.payment-info').hide();
            $('#paypal-info').show();
        }
    }

    function prevStep(step) {
        $(".step").hide();
        $("#step-" + step).show();
        $(".md-step").removeClass("active");
        $("#step-" + step + "-stepper").addClass("active");
    }

    $('input[name="paymentMethod"]').on('change', function() {
        $('.payment-info').hide();
        $('#' + $(this).val() + '-info').show();
    });

    function setOrderDate() {
        const date = new Date();
        const formattedDate = date.getFullYear() + '-' +
            ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
            ('0' + date.getDate()).slice(-2);
        document.getElementById('order_date').value = formattedDate;
    }
    </script>
</body>

</html>
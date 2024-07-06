<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Contact.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>Liên hệ</title>
</head>

<body>
    @include('Layout.Header.Header')
    <div class="container mt-3 mb-3">
        <div class="address_contact">
            <div class="block_address address-_discount address_0 block" id="block_id_164">
                <div class="block_title text-center">
                    <h2>Chào mừng bạn đến với Luxury Diamond</h2>
                </div>
            </div>
        </div>
        <div class="contact container1170">
            <div class="row top cls">
                <div class="col-lg-8 cls">
                    <div class="contact_right">
                        <img src="{{ asset('/Picture_web/Service/Contact.jpg') }}" alt="">
                    </div>
                </div>

                <div class="col-lg-4 cls">
                    <h1 class="img-title-cat page_title">
                        <span>Liên hệ</span>
                    </h1>
                    <form method="post" action="#" name="contact" class="form">
                        <div class="contact_table" width="100%">
                            <div class="mbl contact_name">
                                <label>Họ và tên *</label>
                                <input type="text" maxlength="255" placeholder="Họ và tên" value="" name="contact_name"
                                    id="contact_name" class="txtinput">
                            </div>
                            <div class="mbl contact_phone">
                                <label>Điện thoại *</label>
                                <input type="text" maxlength="255" placeholder="Điện thoại" value=""
                                    name="contact_phone" id="contact_phone" class="txtinput">
                            </div>
                            <div class="mbl contact_email">
                                <label>Email</label>
                                <input type="text" maxlength="255" placeholder="Email" value="" name="contact_email"
                                    id="contact_email" class="txtinput">
                            </div>

                            <div class="mbl message">
                                <label>Nội dung *</label>
                                <textarea placeholder="Nội dung" rows="8" cols="30" name="message"
                                    id="message"></textarea>
                            </div>
                            <div class="mbl">
                                <a class="btn" id="submitbt">
                                    <span>Gửi liên hệ</span>
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="module" value="contact">
                        <input type="hidden" name="task" value="save">
                        <input type="hidden" name="view" value="contact">
                        <input type="hidden" name="Itemid" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('Layout.Footer.Footer')
</body>

</html>
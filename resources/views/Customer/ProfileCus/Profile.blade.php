<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tài khoản của tôi</title>
    <link rel="stylesheet" href="{{ asset('css/Profile.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>
    @include('Layout.Header.Header')
    <div class="container light-style flex-grow-1 container-p-y p-3">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0" style="border-right: 1px solid #dee2e6">
                    <div class="avatar-name" style="display: flex; align-items: center; padding: 1rem">
                        <img src="/Picture_web/Avatar.jpg" alt="Ảnh của tôi" class="card-img-top"
                            style="width: 60px; height: 60px; border-radius: 50%;">
                        <h6 style="padding-left: 0.5rem">{{ $user[Session::get('id')-1]['name'] }}</h6>
                    </div>
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general"><i class="fa-solid fa-user"></i> Tài khoản của tôi</a>
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#change-password"><i
                                class="fa-solid fa-key"></i> Đổi mật khẩu</a> -->
                        <!-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password"><i class="fa-regular fa-calendar"></i> Đơn mua</a> -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <!-- <div class="card-body media align-items-center">
                                <img src="/Picture_web/Avatar.jpg" alt class="d-block ui-w-80"
                                    style="width: 100px; height: 100px; border-radius: 50%;" />
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput" />
                                    </label>
                                    &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">
                                        Reset
                                    </button>
                                    <div class="text-light small mt-1">
                                        Allowed JPG, GIF or PNG. Max size of 800K
                                    </div>
                                </div>
                            </div> -->
                            <hr class="border-light m-0" />
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.update', ['id' => Session::get('id')]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="form-label">Tên</label>
                                        <input type="text" class="form-control mb-1" name="name"
                                            value="{{ $user[Session::get('id')-1]['name']}}" placeholder="Tên" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control mb-1" name="email"
                                            value="{{ $user[Session::get('id')-1]['email'] }}" placeholder="Email" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control mb-1" name="phone"
                                            value="{{ $user[Session::get('id')-1]['phone']}}"
                                            placeholder="Số điện thoại" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" style="margin-right: 0.5rem">Giới tính</label>
                                        <input type="radio" name="gender" value="Nam"
                                            {{ $user[Session::get('id')-1]['gender'] == 'Nam' ? 'checked' : '' }} />
                                        <label class="form-label" style="margin-right: 0.3rem">Nam</label>
                                        <input type="radio" name="gender" value="Nữ"
                                            {{ $user[Session::get('id')-1]['gender'] == 'Nữ' ? 'checked' : '' }} />
                                        <label class="form-label" style="margin-right: 0.3rem">Nữ</label>
                                        <input type="radio" name="gender" value="Khác"
                                            {{ $user[Session::get('id')-1]['gender'] == 'Khác' ? 'checked' : '' }} />
                                        <label class="form-label">Khác</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control mb-1" name="date_of_birth"
                                            value="{{ $user[Session::get('id')-1]['date_of_birth'] }}"
                                            placeholder="Ngày sinh" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $user[Session::get('id')-1]['address'] }}"
                                            placeholder="Địa chỉ" />
                                    </div>
                                    <button type="submit" class="btn btn-orange">Lưu</button>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="change-password">
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ route('user.change-password', ['id' => Session::get('id')]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="form-label">Mật khẩu hiện tại</label>
                                        <input type="password" class="form-control" name="current_password" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Mật khẩu mới</label>
                                        <input type="password" class="form-control" name="new_password" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nhập lại mật khẩu mới</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Layout.Footer.Footer')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
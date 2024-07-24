<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Login_Register.css') }}">
    <title>Đăng nhập</title>
</head>

<body>
    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>Đăng nhập</header>
            </div>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off"
                    required>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="color:red;list-style-type: none;text-align: center">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Nhớ mật khẩu</label>
                </section>
                <section>
                    <a href="#">Quên mật khẩu</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Đăng nhập</label>
            </div>
            <div class="sign-up-link">
                <p>Bạn chưa có tài khoản? <a href="/register">Đăng ký</a></p>
            </div>
        </div>
    </form>
</body>

</html>
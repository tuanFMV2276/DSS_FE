<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Login_Register.css') }}">
    <title>Đăng ký</title>
</head>

<body>
    <form action="{{ url('register') }}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>Đăng ký</header>
            </div>
            <div class="input-box">
                <input type="text" name="name" class="input-field" placeholder="Name" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off"
                    required>
            </div>
            <div class="input-box">
                <input type="date" class="input-field" name="date_of_birth" placeholder="Date of birth"
                    autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="number" class="input-field" name="phone" placeholder="Phone" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="address" placeholder="Address" autocomplete="off" required>
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
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Đăng ký</label>
            </div>
        </div>
    </form>
</body>

</html>
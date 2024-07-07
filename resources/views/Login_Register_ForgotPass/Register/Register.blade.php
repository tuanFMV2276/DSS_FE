<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Login_Register.css') }}">
    <title>Login | Ludiflex</title>
</head>

<body>
    <form action="{{ url('register') }}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>Register</header>
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
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </div>
    </form>
</body>

</html>
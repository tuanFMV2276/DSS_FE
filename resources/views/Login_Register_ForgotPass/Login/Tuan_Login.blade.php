{{-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="{{ asset('css/Login_Register/style.css') }}">
    <title>Login | Ludiflex</title>
</head>
<body>
    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>Login</header>
            </div>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
            <div class="sign-up-link">
                <p>Don't have account? <a href="/register">Sign Up</a></p>
            </div>
        </div>
    </form>
</body>
</html>

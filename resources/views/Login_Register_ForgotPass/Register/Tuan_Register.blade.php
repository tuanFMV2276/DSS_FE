{{-- <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('register') }}" method="post">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
    </form>
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
    <form action="{{ url('register') }}" method="post">
        @csrf
        <div class="login-box">
            <div class="login-header">
                <header>Register</header>
            </div>
            <div class="input-box">
                <input type="text" name="name" class="input-field"  placeholder="Name" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </div>
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('css_Hoa/Login.css') }}"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
        font-size: 62.5%;
        font-family: Arial, sans-serif;
    }

    body {
        font-size: 1.6rem;
    }

    .gradient-form {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        display: flex;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 2rem;
    }

    .gradient-custom-2 {
        background: linear-gradient(to right, #E8BE6F, #bf8720);
    }

    .text-white {
        color: #fff;
    }

    .text-black {
        color: #000;
    }

    .form-outline {
        margin-bottom: 1.5rem;
    }

    .form-outline input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        outline: none;
    }

    .form-label {
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
    }

    .btn {
        display: inline-block;
        padding: 0.75rem 1.25rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: box-shadow 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(to right, #E8BE6F, #bf8720);
        color: #fff;
    }

    .btn-primary:hover {
        box-shadow: 0 4px 12px black;
    }

    .btn-outline-danger {
        border: 2px solid #E8BE6F;
        color: #E8BE6F;
        background: transparent;
    }

    .btn-outline-danger:hover {
        background: #E8BE6F;
        color: #fff;
    }

    .text-muted {
        color: #c7b74f !important;
    }

    h4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .name {
        font-family: kapakana;
    }

    p {
        margin-bottom: 1rem;
    }

    .text-center {
        text-align: center;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .mb-5 {
        margin-bottom: 3rem;
    }

    .pb-1 {
        padding-bottom: 0.25rem;
    }

    .pb-4 {
        padding-bottom: 1.5rem;
    }

    .pt-1 {
        padding-top: 0.25rem;
    }

    .mx-md-4 {
        margin-left: 1.5rem;
        margin-right: 1.5rem;
    }

    .mx-md-5 {
        margin-left: 3rem;
        margin-right: 3rem;
    }

    .px-3 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .px-md-4 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .p-md-5 {
        padding: 3rem;
    }
    </style>
</head>

<body>
    <section class=" gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="icon" onclick="goBack()"><button class="btn btn-outline-danger"><i
                                                class="fa-solid fa-arrow-left"></i> Back</button></div>
                                    <div class="text-center">
                                        <img src="{{asset('/Picture_web/Diamond.jpg')}}" style="width: 140px;"
                                            alt="logo">
                                        <h4 class="name mt-1 mb-5 pb-1">Luxury Diamond</h4>
                                    </div>

                                    <form>
                                        <p>Please login to your account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Username</label>
                                            <input type="email" id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <input type="password" id="form2Example22" class="form-control"
                                                placeholder="Password" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-primary btn-block gradient-custom-2 mb-3"
                                                type="button">Log
                                                in</button>
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="/Register"><button type="button" data-mdb-button-init
                                                    data-mdb-ripple-init class="btn btn-outline-danger">Create
                                                    new</button></a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Diamonds are forever</h4>
                                    <h4 class="mb-4">My youth is not</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</body>

</html>
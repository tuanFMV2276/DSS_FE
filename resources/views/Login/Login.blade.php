<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="/public/Picture/Diamond.jpg"
                          style="width: 140px;" alt="logo">
                        <h4 class="name mt-1 mb-5 pb-1">Brilliance</h4>
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
                          <input type="password" id="form2Example22" class="form-control" placeholder="Password" />
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                            in</button>
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
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
</body>
</html>
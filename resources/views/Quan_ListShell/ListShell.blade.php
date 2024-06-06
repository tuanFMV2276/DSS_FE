<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brilliance</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/LabDiamondPage.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container mt-3 mb-3">
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-70 clickable" data-url="/DetailShell">
                    <img src="{{ asset('img_Manh/image/ring.png') }}" alt="ring" class="card-img-top">
                    <div class="card-body">

                        <p class="card-text">
                            Nhẫn Kim Cương Nữ R.2235
                        </p>
                        <h6 class="card-title text-center">4.200.000₫</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Footer_Hoa/Footer')
    <script>
        document.querySelectorAll('.card.clickable').forEach(card => {
            card.addEventListener('click', () => {
                location.assign(card.dataset.url);
            });
        });
    </script>

</body>

</html>

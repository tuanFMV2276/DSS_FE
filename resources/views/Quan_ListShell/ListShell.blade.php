<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brilliance</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/ListShell.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container">
        <div class="shell-grid mt-3 mb-3">
            @foreach ($products as $product)
            <a class="link" href="{{route('shell.show', $product['id'])}}">
                <div class="col">
                    <div class="card h-70 clickable">
                        <img src="{{ asset('/Picture_Hoa/ShellDiamond/' . $product['image']) }}" alt="ring"
                            class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $product['product_name'] }}
                            </p>
                            <h6 class="card-title text-center">{{ number_format($product['price'], 0, ',', '.') }}₫
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination mb-3">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> -->
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
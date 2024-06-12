<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kim Cương Tự Nhiên</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/LabDiamondPage.css') }}">
</head>

<body>
    @include('Header_Hoa/Header')
    <div class="container">
        <div class="filter">
            <div class="title">
                <h1>CÔNG CỤ TÌM KIM CƯƠNG</h1>
            </div>
            <div class="summary">
                <h2>Lọc để tìm viên kim cương hoàn hảo của bạn</h2>
            </div>
            <div class="body-filter-diamond">
                <div class="filter-diamond-area"></div>
                <div class="filter-diamond-milimetres"></div>
            </div>
        </div>
        <div class="diamond-grid mt-3 mb-3">
            @foreach ($diamonds as $diamond)
            <div class="card h-100 clickable" data-url="/DetailDiamondPage">
                <img src="{{ asset('/Picture_Hoa/LabDiamondPage/image' . $loop->iteration . '.jpg') }}" alt="Diamond"
                    class="card-img-top">
                <div class="card-body">
                    <p class="card-text text-center">
                        {{ $diamond['cara_weight'] }} Carat {{ $diamond['diamond_name'] }} Loose Diamond
                        {{ $diamond['color'] }} {{ $diamond['clarity'] }} {{ $diamond['cut'] }}
                    </p>
                    <h6 class="card-title text-center">{{ $diamond['price'] }}₫</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination mb-3 justify-content-center">
            {{ $diamonds->links() }}
        </ul>
    </nav>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nhẫn Kim Cương</title>
    <link rel="stylesheet" href="{{ asset('css/ListProduct.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .custom-select {
        appearance: none;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='none' stroke='gray' stroke-linecap='round' stroke-width='1' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 8px 10px;
    }

    .custom-select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    </style>
</head>

<body>
    @include('Layout.Header/Header')
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-md-3">
                <select id="sort_by" class="form-select custom-select">
                    <option value="price_asc">Price: Low to High</option>
                    <option value="price_desc">Price: High to Low</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="price_range" class="form-select custom-select">
                    <option value="">Select Price Range</option>
                    <option value="0-15000000">0₫–15.000.000₫</option>
                    <option value="15000000-30000000">15.000.000₫–30.000.000₫</option>
                    <option value="30000000-45000000">30.000.000₫–45.000.000₫</option>
                    <option value="45000000">45.000.000₫+</option>
                </select>
            </div>
            <div class="col-md-3">
                <select id="type" class="form-select custom-select">
                    <option value="">Select Type</option>
                    <option value="Nhẫn Kim Cương Nam">Nhẫn Kim Cương Nam</option>
                    <option value="Nhẫn Kim Cương Nữ">Nhẫn Kim Cương Nữ</option>
                </select>
            </div>
        </div>
        <div id="product-list" class="shell-grid mt-3 mb-3">
            @foreach ($products as $product)
            <a class="link" href="{{route('product.show', $product['id'])}}">
                <div class="col">
                    <div class="card h-70 clickable">
                        <img src="{{ asset('/Picture_Product/' . $product['image']) }}" alt="ring" class="card-img-top">
                        <div class="card-body" style="padding-left: 0.5rem;padding-right: 0.5rem;">
                            <p class="card-text text-center">
                                {{ $product['product_name'] }} {{ $product['product_code'] }}
                            </p>
                            <h6 class="card-title text-center">
                                {{ number_format($product['total_price'], 0, ',', '.') }}₫
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @include('Layout.Footer/Footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    const updateProductList = (products) => {
        if (!Array.isArray(products)) {
            console.error("Expected an array but got:", products);
            return;
        }

        let productHtml = '';
        products.forEach(product => {
            productHtml += `
                    <a class="link" href="/Product/${product.id}">
                        <div class="col">
                            <div class="card h-70 clickable">
                                <img src="/Picture_Product/${product.image}" alt="ring" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text text-center">
                                        ${product.product_name}
                                    </p>
                                    <h6 class="card-title text-center">${new Intl.NumberFormat().format(product.total_price)}₫</h6>
                                </div>
                            </div>
                        </div>
                    </a>`;
        });
        document.getElementById('product-list').innerHTML = productHtml;
    }

    const updateURLParams = () => {
        const priceRange = document.getElementById('price_range').value;
        const sortBy = document.getElementById('sort_by').value;
        const productType = document.getElementById('type').value;

        $.ajax({
            url: '/filter-products',
            data: {
                sort: sortBy,
                price_range: priceRange,
                product_name: productType
            },
            success: (response) => {
                console.log("AJAX response:", response);
                updateProductList(response);
            },
            error: (error) => {
                console.error("AJAX error:", error);
            }
        });
    }

    document.getElementById('price_range').addEventListener('change', updateURLParams);
    document.getElementById('sort_by').addEventListener('change', updateURLParams);
    document.getElementById('type').addEventListener('change', updateURLParams);
    </script>

</body>

</html>
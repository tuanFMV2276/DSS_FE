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

    .filter-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 1rem;
    }

    .filter-group .slider {
        width: 200px;
        margin-top: 1rem;
    }

    #shape {
        display: flex;
        justify-content: space-around;
    }

    #shape button {
        background-color: white;
        border: 1px solid #ced4da;
        border-radius: 50%;
        padding: 0.5rem;
    }

    #shape button img {
        width: 30px;
        height: 30px;
    }

    .filter-label {
        font-weight: bold;
    }
    </style>
</head>

<body>
    @include('Layout.Header/Header')
    <div class="container">
        <div class="row mb-3 mt-3 justify-content-center">
            <!-- Diamond Search Filters -->
            <div class="filter-group">
                <label for="shape" class="form-label filter-label">Shape</label>
                <div id="shape" class="d-flex">
                    <!-- Add shape buttons here -->
                    <button class="btn btn-outline-secondary" data-value="Round"><img
                            src="/Picture_web/MaterialDiamond/Round.jpg" alt="Round"></button>
                    <button class="btn btn-outline-secondary" data-value="Emerald"><img
                            src="/Picture_web/MaterialDiamond/Emerald.jpg" alt="Emerald"></button>
                    <button class="btn btn-outline-secondary" data-value="Oval"><img
                            src="/Picture_web/MaterialDiamond/Oval.jpg" alt="Oval"></button>
                    <button class="btn btn-outline-secondary" data-value="Pear"><img
                            src="/Picture_web/MaterialDiamond/Pear.jpg" alt="Pear"></button>
                    <button class="btn btn-outline-secondary" data-value="Marquise"><img
                            src="/Picture_web/MaterialDiamond/Marquise.jpg" alt="Marquise"></button>
                    <button class="btn btn-outline-secondary" data-value="Heart"><img
                            src="/Picture_web/MaterialDiamond/Heart.jpg" alt="Heart"></button>
                    <button class="btn btn-outline-secondary" data-value="Princess"><img
                            src="/Picture_web/MaterialDiamond/Princess.jpg" alt="Princess"></button>
                    <button class="btn btn-outline-secondary" data-value="Cushion"><img
                            src="/Picture_web/MaterialDiamond/Cushion.jpg" alt="Cushion"></button>
                </div>
            </div>
            <div class="filter-group">
                <label for="carat" class="form-label filter-label">Carat</label>
                <select id="carat" class="form-select custom-select">
                    <option value="">Select Carat Range</option>
                    <option value="0-0.7">0ct - 0,7ct</option>
                    <option value="0.7-2">0,7ct - 2ct</option>
                    <option value="2-4">2ct - 4ct</option>
                    <option value="4">4ct+ </option>
                </select>
            </div>
            <div class="filter-group">
                <label for="cut" class="form-label filter-label">Cut</label>
                <select id="cut" class="form-select custom-select">
                    <option value="">Select Cut</option>
                    <option value="Good">Good</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Ideal">Ideal</option>
                    <option value="Super Ideal">Super Ideal</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="color" class="form-label filter-label">Color</label>
                <select id="color" class="form-select custom-select">
                    <option value="">Select Color</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="K">K</option>
                    <option value="J">J</option>
                    <option value="I">I</option>
                    <option value="H">H</option>
                    <option value="G">G</option>
                    <option value="F">F</option>
                    <option value="E">E</option>
                    <option value="D">D</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="clarity" class="form-label filter-label">Clarity</label>
                <select id="clarity" class="form-select custom-select">
                    <option value="">Select Clarity</option>
                    <option value="I1">I1</option>
                    <option value="SI3">SI3</option>
                    <option value="SI2">SI2</option>
                    <option value="SI1">SI1</option>
                    <option value="VS2">VS2</option>
                    <option value="VS1">VS1</option>
                    <option value="VVS2">VVS2</option>
                    <option value="VVS1">VVS1</option>
                    <option value="IF">IF</option>
                    <option value="FL">FL</option>
                </select>
            </div>
        </div>
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
    let selectedShape = '';

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
                            <div class="card-body" style="padding-left: 0.5rem;padding-right: 0.5rem;">
                                <p class="card-text text-center">${product.product_name} ${product.product_code}</p>
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
        const shape = selectedShape;
        const carat = document.getElementById('carat').value;
        const cut = document.getElementById('cut').value;
        const color = document.getElementById('color').value;
        const clarity = document.getElementById('clarity').value;

        const filters = {
            sort: sortBy,
            price_range: priceRange,
            product_name: productType,
            shape: shape,
            carat: carat,
            cut: cut,
            color: color,
            clarity: clarity
        };

        $.ajax({
            url: '/filter-products',
            data: filters,
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

    const shapeButtons = document.querySelectorAll('#shape button');
    shapeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentValue = this.getAttribute('data-value');
            if (currentValue === selectedShape) {
                // Nếu shape đã được chọn rồi, click lần nữa để bỏ chọn
                selectedShape = '';
                this.classList.remove('active');
            } else {
                // Nếu chưa được chọn, chọn shape và đánh dấu là đã chọn
                selectedShape = currentValue;
                shapeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
            }
            updateURLParams();
        });
    });

    document.getElementById('carat').addEventListener('change', updateURLParams);
    document.getElementById('cut').addEventListener('change', updateURLParams);
    document.getElementById('color').addEventListener('change', updateURLParams);
    document.getElementById('clarity').addEventListener('change', updateURLParams);

    // Initial load
    updateURLParams();
    </script>
</body>

</html>
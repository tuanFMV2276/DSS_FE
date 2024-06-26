<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Product</h2>
        <form id="product-form" action="{{ route('manager.updateProduct', $product['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="product_code"><i class="fas fa-barcode"></i> Product Code</label>
                <input type="text" class="form-control" id="product_code" name="product_code" value="{{ old('product_code', $product['product_code']) }}" required>
            </div>

            <div class="form-group">
                <label for="product_name"><i class="fas fa-tag"></i> Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $product['product_name']) }}" required>
            </div>

            <div class="form-group">
                <label for="image"><i class="fas fa-image"></i> Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($product['image'])
                    <img src="{{ asset('/Picture_Product/' . $product['image']) }}" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="main_diamond_id"><i class="fas fa-gem"></i> Main Diamond ID</label>
                <input type="number" class="form-control" id="main_diamond_id" name="main_diamond_id" value="{{ old('main_diamond_id', $product['main_diamond_id']) }}">
            </div>

            <div class="form-group">
                <label for="extra_diamond_id"><i class="fas fa-gem"></i> Extra Diamond ID</label>
                <input type="number" class="form-control" id="extra_diamond_id" name="extra_diamond_id" value="{{ old('extra_diamond_id', $product['extra_diamond_id']) }}">
            </div>

            <div class="form-group">
                <label for="number_ex_diamond"><i class="fas fa-cubes"></i> Number of Extra Diamonds</label>
                <input type="number" class="form-control" id="number_ex_diamond" name="number_ex_diamond" value="{{ old('number_ex_diamond', $product['number_ex_diamond']) }}">
            </div>

            <div class="form-group">
                <label for="quantity"><i class="fas fa-sort-numeric-up"></i> Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product['quantity']) }}" required>
            </div>

            <div class="form-group">
                <label for="diamond_shell_id"><i class="fas fa-box"></i> Diamond Shell ID</label>
                <input type="number" class="form-control" id="diamond_shell_id" name="diamond_shell_id" value="{{ old('diamond_shell_id', $product['diamond_shell_id']) }}">
            </div>

            <div class="form-group">
                <label for="size"><i class="fas fa-ruler"></i> Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $product['size']) }}">
            </div>

            <div class="form-group">
                <label for="price_rate"><i class="fas fa-dollar-sign"></i> Price Rate</label>
                <input type="number" step="0.01" class="form-control" id="price_rate" name="price_rate" value="{{ old('price_rate', $product['price_rate']) }}" required>
            </div>

            <div class="form-group">
                <label for="status"><i class="fas fa-toggle-on"></i> Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ old('status', $product['status']) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $product['status']) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"> Save</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('product-form').addEventListener('submit', function(event) {
            if (!confirm('Are you sure you want to save changes?')) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>

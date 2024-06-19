<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Create Product</h1>
            <form action="{{ route('manager.storeProduct') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_code">Product Code:</label>
                    <input type="text" class="form-control" id="product_code" name="product_code">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="form-group">
                    <label for="main_diamond_id">Main Diamond ID:</label>
                    <input type="text" class="form-control" id="main_diamond_id" name="main_diamond_id">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="text" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="extra_diamond_id">Extra Diamond ID:</label>
                    <input type="text" class="form-control" id="extra_diamond_id" name="extra_diamond_id">
                </div>
                <div class="form-group">
                    <label for="number_ex_diamond">Number Ex Diamond:</label>
                    <input type="text" class="form-control" id="number_ex_diamond" name="number_ex_diamond">
                </div>
                <div class="form-group">
                    <label for="number">Number:</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>
                <div class="form-group">
                    <label for="diamond_shell_id">Diamond Shell ID:</label>
                    <input type="text" class="form-control" id="diamond_shell_id" name="diamond_shell_id">
                </div>
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" class="form-control" id="size" name="size">
                </div>
                <div class="form-group">
                    <label for="price_rate">Price Rate:</label>
                    <input type="text" class="form-control" id="price_rate" name="price_rate">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

                {{-- <a href="{{ route('manager.home')}}"> <button class="btn btn-primary">Back</button></a> --}}
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

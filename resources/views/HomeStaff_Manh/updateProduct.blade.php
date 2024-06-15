<!-- DSS_FE/resources/views/HomeStaff_Manh/updateProduct.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form action="{{ route('products.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="product_code">Product Code:</label>
        <input type="text" id="product_code" name="product_code" value="{{ $product['product_code'] }}"><br>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="{{ $product['product_name'] }}"><br>
        <label for="main_diamond_id">Main Diamond ID:</label>
        <input type="text" id="main_diamond_id" name="main_diamond_id" value="{{ $product['main_diamond_id'] }}"><br>
        <label for="image">Image:</label>
        <input type="text" id="image" name="image" value="{{ $product['image'] }}"><br>
        <label for="extra_diamond_id">Extra Diamond ID:</label>
        <input type="text" id="extra_diamond_id" name="extra_diamond_id" value="{{ $product['extra_diamond_id'] }}"><br>
        <label for="number_ex_diamond">Number Ex Diamond:</label>
       

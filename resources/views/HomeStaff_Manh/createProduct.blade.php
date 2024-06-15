<!-- DSS_FE/resources/views/HomeStaff_Manh/createProduct.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="product_code">Product Code:</label>
        <input type="text" id="product_code" name="product_code"><br>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name"><br>
        <label for="main_diamond_id">Main Diamond ID:</label>
        <input type="text" id="main_diamond_id" name="main_diamond_id"><br>
        <label for="image">Image:</label>
        <input type="text" id="image" name="image"><br>
        <label for="extra_diamond_id">Extra Diamond ID:</label>
        <input type="text" id="extra_diamond_id" name="extra_diamond_id"><br>
        <label for="number_ex_diamond">Number Ex Diamond:</label>
        <input type="text" id="number_ex_diamond" name="number_ex_diamond"><br>
        <label for="number">Number:</label>
        <input type="text" id="number" name="number"><br>
        <label for="diamond_shell_id">Diamond Shell ID:</label>
        <input type="text" id="diamond_shell_id" name="diamond_shell_id"><br>
        <label for="size">Size:</label>
        <input type="text" id="size" name="size"><br>
        <label for="price_rate">Price Rate:</label>
        <input type="text" id="price_rate" name="price_rate"><br>
        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity"><br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

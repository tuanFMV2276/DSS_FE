<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            margin: 5px 0;
        }
        .terms {
            margin-top: 20px;
            border-top: 1px solid #000;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Warranty Information</h1>
        </div>
        <div class="content">
            <p><strong>Warranty ID:</strong> {{ $warranty['id'] }}</p>
            <p><strong>Product Name:</strong> {{ $product['product_name'] }}</p>
            <p><strong>Product Code:</strong> {{ $product['product_code'] }}</p>
            <p><strong>Invoice Code:</strong> {{ $order['id'] }}</p>
            <p><strong>Customer Name:</strong> {{ $order['name'] }}</p>
            <p><strong>Customer Email:</strong> {{ $order['email'] }}</p>
            <p><strong>Customer Phone:</strong> {{ $order['phone'] }}</p>
            <p><strong>Issue Date:</strong> {{ $warranty['issue_date'] }}</p>
            <p><strong>Expiry Date:</strong> {{ $warranty['expiry_date'] }}</p>
        </div>
        <div class="terms">
            <h2>Terms and Conditions</h2>
            <p>1. The warranty covers manufacturing defects only.</p>
            <p>2. The warranty does not cover damage caused by misuse or accidents.</p>
            <p>3. The warranty is valid only with the original purchase receipt.</p>
            <p>4. Warranty claims must be accompanied by the warranty certificate.</p>
            <p>5. For any warranty issues, please contact our customer service.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Luxury Diamond</p>
        </div>
    </div>
</body>
</html>

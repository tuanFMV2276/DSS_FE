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
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
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
            <p><strong>Product ID:</strong> {{ $warranty['product_id'] }}</p>
            <p><strong>Issue Date:</strong> {{ $warranty['issue_date']}}</p>
            <p><strong>Expiry Date:</strong> {{ $warranty['expiry_date']}}</p>
            
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company</p>
        </div>
    </div>
</body>
</html>

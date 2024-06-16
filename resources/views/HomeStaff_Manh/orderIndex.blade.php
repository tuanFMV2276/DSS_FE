<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Order Details</h1>
    <table class="table">
        <tr>
            <th>Order ID</th>
            <td>{{ $order['id'] }}</td>
        </tr>
        <tr>
            <th>Customer ID</th>
            <td>{{ $order['customer_id'] }}</td>
        </tr>
        <tr>
            <th>Order Date</th>
            <td>{{ $order['order_date'] }}</td>
        </tr>
        <tr>
            <th>Total Price</th>
            <td>{{ $order['total_price'] }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order['status'] }}</td>
        </tr>
    </table>
    <a href="{{ route('salestaff.home')}}"> <button class="btn btn-primary">Back</button></a>
</div>
</body>
</html>

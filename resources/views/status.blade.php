<!-- resources/views/products/status.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
        @if ( $status === '0')
            <h2>Pending Order</h2>
        @elseif ( $status === '1')
            <h2>Accepted Order</h2>
        @elseif ( $status === '2')
            <h2>Accepted Order</h2>
        @elseif ( $status === '3')
            <h2>Accepted Order</h2>
        @elseif ( $status === '4')
            <h2>Accepted Order</h2>
        @elseif ( $status === '5')
            <h2>Accepted Order</h2>
        @endif
        <table>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Totel Price</th>
                <th>Status</th>
            </tr>
            @foreach($order as $order)
                <tr>
                    <td>{{$order['id']}}</td>
                    <td>{{$order['customer_id']}}</td>
                    <td>{{$order['order_date']}}</td>
                    <td>{{$order['total_price']}}</td>
                    <td>{{$order['status']}}</td>
                </tr>
            @endforeach
    </table>
        
    <a href="{{ route('order.filter', ['status' => '0']) }}">Pending Order</a>
    <a href="{{ route('order.filter', ['status' => '1']) }}">Accepted Order</a>
    <a href="{{ route('order.filter', ['status' => '2']) }}">Inactive Products</a>
    <a href="{{ route('order.filter', ['status' => '3']) }}">Inactive Products</a>
    <a href="{{ route('order.filter', ['status' => '4']) }}">Inactive Products</a>
    <a href="{{ route('order.filter', ['status' => '5']) }}">Inactive Products</a>
</body>
</html>
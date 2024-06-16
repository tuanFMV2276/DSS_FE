@extends('DeliveryStaff.layout')

@section('content')
    <h1 class="my-4">Order Details</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2>Customer Information</h2>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $customer['name'] }}</p>
            <p><strong>Email:</strong> {{ $customer['email'] }}</p>
            <p><strong>Phone:</strong> {{ $customer['phone'] }}</p>
            <p><strong>Address:</strong> {{ $customer['address'] }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h2>Order Details</h2>
        </div>
        <div class="card-body">
            <p><strong>Order ID:</strong> {{ $order['id'] }}</p>
            <p><strong>Order Date:</strong> {{ $order['order_date'] }}</p>
            <p><strong>Total Price:</strong> {{ $order['total_price'] }}</p>

            <h3>Products</h3>
            <ul class="list-group">

                <li class="list-group-item">
                    {{ $product['product_name'] }}<br>
                    Product Code: {{ $product['product_code'] }}
                </li>

            </ul>

            <h3>Diamond</h3>
            <ul class="list-group">


                {{-- <li class="list-group-item">
                    Name: {{ $maindiamond['diamond_name'] }}<br>
                    Origin: {{ $maindiamond['origin'] }} <br>
                    Carat Weight: {{ $maindiamond['cara_weight'] }} <br>
                    Clarity: {{ $maindiamond['clarity'] }} <br>
                    Color: {{ $maindiamond['color'] }} <br>
                    Description: {{ $maindiamond['describe'] }} <br>
                    Quantity: {{ $maindiamond['quantity'] }} <br>
                    Cut: {{ $maindiamond['cut'] }} <br>
                    Polish: {{ $maindiamond['polish'] }} <br>
                    Symmetry: {{ $maindiamond['symmetry'] }} <br>
                    Measurements: {{ $maindiamond['measurements'] }} <br>
                    Culet: {{ $maindiamond['culet'] }} <br>
                    Fluorescence: {{ $maindiamond['fluorescence'] }} <br>
                </li> --}}

            </ul>
        </div>
    </div>

    <a href="{{ route('delivery-staff.orders') }}" class="btn btn-secondary">Back to Orders</a>
@endsection

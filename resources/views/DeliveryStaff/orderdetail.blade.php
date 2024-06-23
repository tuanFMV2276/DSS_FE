@extends('DeliveryStaff.layout')

@section('content')
    <h1 class="my-4">Order Details</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2><i class="fas fa-user"></i> Customer Information</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong><i class="fas fa-user-circle"></i> Name:</strong> {{ $customer['name'] }}</p>
                    <p><strong><i class="fas fa-venus-mars"></i> Gender:</strong> {{ $customer['gender'] }}</p>
                    <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $customer['email'] }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong><i class="fas fa-phone"></i> Phone:</strong> {{ $customer['phone'] }}</p>
                    <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong> {{ $customer['address'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h2><i class="fas fa-shopping-cart"></i> Order Details</h2>
        </div>
        <div class="card-body">
            <div class="row">
                @php
                                    $payment = collect($payments)->firstWhere('order_id', $order['id']);
                                    $statusLabels = [
                                        0 => 'Pending',
                                        1 => 'Accepted',
                                        2 => 'Prepare Product',
                                        3 => 'Delivering',
                                        4 => 'Finished',
                                        5 => 'Cancelled',
                                    ];
                                @endphp
                <div class="col-md-6">
                    <p><strong><i class="fas fa-id-card"></i> Order ID:</strong> {{ $order['id'] }}</p>
                    <p><strong><i class="far fa-calendar-alt"></i> Date:</strong> {{ $order['order_date'] }}</p>
                    <p><strong></i> Status:</strong> {{ $statusLabels[$order['status']] ?? 'Unknown' }}</p>
                </div>
                <div class="col-md-6">

                    <p><strong><i class="fas fa-credit-card"></i> Payment method:</strong>
                        {{ $payment ? $payment['payment_method'] : 'Unknown' }}</p>
                    <p><strong><i class="fas fa-dollar-sign"></i> Total Price:</strong> {{ $order['total_price'] }}</p>
                </div>
            </div>

            <h3><i class="fas fa-box-open"></i> Products</h3>
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img src="{{ $product['image'] }}" alt="Product Image" class="img-thumbnail mb-2">
                            <br>
                            <strong>Name:</strong> {{ $product['product_name'] }}<br>
                            <strong>Product Code:</strong> {{ $product['product_code'] }}
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Uncomment if you have diamond details --}}
            {{-- 
            <h3><i class="fas fa-gem"></i> Diamond</h3>
            <ul class="list-group">
                <li class="list-group-item">
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
                </li>
            </ul> 
            --}}

        </div>
    </div>

    <div class="text-center">
        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Orders</a>
    </div>
@endsection

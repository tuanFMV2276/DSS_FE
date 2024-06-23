@extends('HomeStaff_Manh.Manager.Order.layout')

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
            <h2><i class="fas fa-shopping-cart"></i> Order</h2>
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
                    <form action="{{ route('manager.updateOrderStatus', $order['id']) }}" method="POST"
                        onsubmit="return confirmUpdate()">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label"><strong>Status:</strong></label>
                            <div class="col-sm-10">
                                <select class="form-control" id="status" name="status">
                                    <option value="0" {{ $order['status'] == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $order['status'] == 1 ? 'selected' : '' }}>Accepted</option>
                                    <option value="2" {{ $order['status'] == 2 ? 'selected' : '' }}>Prepare Product
                                    </option>
                                    <option value="3" {{ $order['status'] == 3 ? 'selected' : '' }}>Delivering
                                    </option>
                                    <option value="4" {{ $order['status'] == 4 ? 'selected' : '' }}>Finished</option>
                                    <option value="5" {{ $order['status'] == 5 ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>


                </div>
                <div class="col-md-6">

                    <p><strong><i class="fas fa-credit-card"></i> Payment method:</strong>
                        {{ $payment ? $payment['payment_method'] : 'Unknown' }}</p>
                    <p><strong><i class="fas fa-dollar-sign"></i> Total Price:</strong> {{ number_format($order['total_price'], 0, ',', '.') }}₫</p>
                    
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
                            <strong>Product Code:</strong> {{ $product['product_code'] }}<br>
                            <strong>Size:</strong> {{ $product['size'] }}<br>
                            <h5>Main Diamond</h5>
                            <strong>Name:</strong> {{ $maindiamond['shape'] }}<br>
                            <strong>Origin:</strong> {{ $maindiamond['origin'] }} <br>
                            <strong>Carat Weight:</strong> {{ $maindiamond['cara_weight'] }} <br>
                            <strong>Clarity:</strong> {{ $maindiamond['clarity'] }} <br>
                            <strong>Color:</strong> {{ $maindiamond['color'] }} <br>
                            <strong>Description:</strong> {{ $maindiamond['describe'] }} <br>
                            <strong>Quantity:</strong> {{ $maindiamond['quantity'] }} <br>
                            <strong>Cut:</strong> {{ $maindiamond['cut'] }} <br>
                            <strong>Polish:</strong> {{ $maindiamond['polish'] }} <br>
                            <strong>Symmetry:</strong> {{ $maindiamond['symmetry'] }} <br>
                            <strong>Measurements:</strong> {{ $maindiamond['measurements'] }} <br>
                            <strong>Culet:</strong> {{ $maindiamond['culet'] }} <br>
                            <strong>Culet:</strong> {{ $maindiamond['fluorescence'] }} <br>
                            <h5>Extra Diamond</h5>
                            <strong>Culet:</strong> {{ $exiamond['name'] }}<br>
                            <h5>Diamond Shell</h5>
                            <strong>Name:</strong> {{ $diamondshell['name'] }}<br>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Uncomment if you have diamond details --}}

            {{-- <h3><i class="fas fa-gem"></i> Diamond</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    Name: {{ $maindiamond['shape'] }}<br>
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
            </ul>  --}}


        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
    </form>

    <div class="text-center">
        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Orders</a>
    </div>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update the order status?");
        }
    </script>
@endsection

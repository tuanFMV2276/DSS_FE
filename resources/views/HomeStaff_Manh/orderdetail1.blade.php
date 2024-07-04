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
                <p><strong><i class="fas fa-user-circle"></i> Name:</strong> {{ $order['name'] }}</p>
                {{-- <p><strong><i class="fas fa-venus-mars"></i> Gender:</strong> {{ $order['gender'] }}</p> --}}
                <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $order['email'] }}</p>
            </div>
            <div class="col-md-6">
                <p><strong><i class="fas fa-phone"></i> Phone:</strong> {{ $order['phone'] }}</p>
                <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong> {{ $order['address'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h2><i class="fas fa-shopping-cart"></i> Order</h2>
    </div>
    <form action="{{ route('salestaff.updateOrderStatus', $order['id']) }}" method="POST"
        onsubmit="return confirmUpdate()">
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

                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label"><strong>Status:</strong></label>
                        <div class="col-sm-10">
                            @if(in_array($order['status'], [3, 4, 5]))

                            <p class="form-control-static mt-2">
                                @switch($order['status'])
                                @case(3)
                                Delivering
                                @break
                                @case(4)
                                Finished
                                @break
                                @case(5)
                                Cancelled
                                @break
                                @endswitch
                            </p>
                            @else
                            <select class="form-control" id="status" name="status" style="width: min-content">
                                <option value="0" {{ $order['status'] == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $order['status'] == 1 ? 'selected' : '' }}>Accepted</option>
                                <option value="2" {{ $order['status'] == 2 ? 'selected' : '' }}>Prepare Product</option>
                                <!-- <option value="3" {{ $order['status'] == 3 ? 'selected' : '' }} disabled>Delivering
                                </option>
                                <option value="4" {{ $order['status'] == 4 ? 'selected' : '' }} disabled>Finished
                                </option>
                                <option value="5" {{ $order['status'] == 5 ? 'selected' : '' }} disabled>Cancelled
                                </option> -->
                            </select>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="col-md-6">

                    <p><strong><i class="fas fa-credit-card"></i> Payment method:</strong>
                        {{ $payment ? $payment['payment_method'] : 'Unknown' }}</p>
                    <p><strong><i class="fas fa-dollar-sign"></i> Total Price:</strong>
                        {{ number_format($order['total_price'], 0, ',', '.') }}₫</p>

                </div>
            </div>

            <h3><i class="fas fa-box-open"></i> Products</h3>
            <div class="border">
                <div class="row mt-3">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('/Picture_Product/' . $product['image']) }}" alt="Product Image"
                            class="img-thumbnail mb-2" width="100%">
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5 mt-5">
                        <h1>{{ $product['product_name'] }}</h1>
                        <p class="mt-5" style="font-size: 20px"><strong>Product Code:</strong>
                            {{ $product['product_code'] }}</p>
                        <p style="font-size: 20px"><strong>Size:</strong> {{ $product['size'] }}</p>
                        <p style="font-size: 20px"><strong>Shell: </strong>{{ $diamondshell['name'] }}</p>
                        <p><strong><i class="fas fa-calendar-check"></i> Warranty Expiry Date:</strong>
                            {{ $warrantycertificate ? $warrantycertificate['expiry_date'] : 'Updating' }}
                        </p>
                    </div>
                </div>

                <h4 class="text-center mt-5">Chi tiết kim cương đính ở trung tâm</h4>
                <table class="diamond-details">
                    <tr>
                        <td><strong>Shape:</strong></td>
                        <td>{{ $maindiamond['shape'] }}</td>
                        <td><strong>Polish:</strong></td>
                        <td>{{ $maindiamond['polish'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Carat Weight:</strong></td>
                        <td>{{ $maindiamond['cara_weight'] }} ct.</td>
                        <td><strong>Symmetry:</strong></td>
                        <td>{{ $maindiamond['symmetry'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Color:</strong></td>
                        <td>{{ $maindiamond['color'] }}</td>
                        <td><strong>Measurements:</strong></td>
                        <td>{{ $maindiamond['measurements'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Clarity:</strong></td>
                        <td>{{ $maindiamond['clarity'] }}</td>
                        <td><strong>Culet:</strong></td>
                        <td>{{ $maindiamond['culet'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cut:</strong></td>
                        <td>{{ $maindiamond['cut'] }}</td>
                        <td><strong>Fluorescence:</strong></td>
                        <td>{{ $maindiamond['fluorescence'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Certification:</strong></td>
                        <td>{{ $maindiamond['certification'] ?? 'GIA Certified' }}</td>
                    </tr>
                </table>
            </div>


        </div>
        <div class="text-center mt-3"><button type="submit" class="btn btn-primary">Update Status</button></div>
    </form>

    <div class="text-center mt-3">
        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to
            Orders</a>
    </div>


    <script>
    function confirmUpdate() {
        return confirm("Are you sure you want to update the order status?");
    }
    </script>
    @endsection
<!-- DSS_FE/resources/views/DeliveryStaff/orders.blade.php -->
@extends('DeliveryStaff.layout')

@section('content')
    <h1 class="my-4">Delivery Staff Orders</h1>

    @foreach(['Prepare Product' => 2, 'Delivering' => 3, 'Finished' => 4, 'Cancelled' => 5] as $statusName => $statusCode)
        <h2 class="mt-5">{{ $statusName }}</h2>
        @if(isset($filteredOrders[$statusCode]))
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredOrders[$statusCode] as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order['id'] }}</td>
                                <td>{{ $order['customer_id'] }}</td>
                                <td>{{ $order['order_date'] }}</td>
                                <td>{{ $order['total_price'] }}</td>
                                <td>
                                    <form action="{{ route('delivery-staff.orders.updateStatus', $order['id']) }}" method="POST" class="form-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value='2' {{ $order['status'] == '2' ? 'selected' : '' }}>Prepare Product</option>
                                            <option value='3' {{ $order['status'] == '3' ? 'selected' : '' }}>Delivering</option>
                                            <option value='4' {{ $order['status'] == '4' ? 'selected' : '' }}>Finished</option>
                                            <option value='5' {{ $order['status'] == '5' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('delivery-staff.orders.show', $order['id']) }}" class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">No orders with status {{ $statusName }}.</p>
        @endif
    @endforeach
@endsection

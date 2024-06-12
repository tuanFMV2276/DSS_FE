@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Add employee</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('order.index') }}" class="btn btn-primary float-end">Order list</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Customer ID</strong>
                                <input type="text" name="customer_id" 
                                    class="form-control" placeholder="Enter id">
                            </div>
                            <div class="form-group">
                                <strong>Order date</strong>
                                <input type="date" name="order_date" value="{{ $order->order_date }}"
                                    class="form-control" placeholder="Enter order-date">
                            </div>
                            
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

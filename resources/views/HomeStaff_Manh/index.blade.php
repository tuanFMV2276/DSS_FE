@extends('layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Update employee</h3>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('employees.index') }}" class="btn btn-primary float-end">Employees list</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="user_name" value="{{ $employee->user_name }}" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <strong>Email</strong>
                            <input type="email" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <strong>Role</strong>
                            <select name="role_id" class="form-control">
                                <option value="3" {{ $employee->role_id == 3 ? 'selected' : '' }}>Sale staff</option>
                                <option value="4" {{ $employee->role_id == 4 ? 'selected' : '' }}>Support staff</option>
                                <option value="5" {{ $employee->role_id == 5 ? 'selected' : '' }}>Technician</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Phone</strong>
                            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <strong>Address</strong>
                            <input type="text" name="address" value="{{ $employee->address }}" class="form-control" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <strong>Date of Birth</strong>
                            <input type="date" name="date_of_birth" value="{{ $employee->date_of_birth }}" class="form-control" placeholder="Enter date of birth">
                        </div>
                        <div class="form-group">
                            <strong>Gender</strong>
                            <select name="gender" class="form-control">
                                <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Status</strong>
                            <select name="status" class="form-control">
                                <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
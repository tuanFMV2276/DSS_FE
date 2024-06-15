@extends('layouts.manager')

@section('content')
    <div class="main-content">
        <h1>Employee List</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee['user_name'] }}</td>
                        <td>{{ $employee['gender'] }}</td>
                        <td>
                            <form action="{{ route('employees.updateRole', $employee['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role_id" onchange="this.form.submit()">
                                    <option value="2" {{ $employee['role_id'] == 2 ? 'selected' : '' }}>Sale staff</option>
                                    <option value="4" {{ $employee['role_id'] == 4 ? 'selected' : '' }}>Delivery staff</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Accounts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Manage Accounts</h1>
        {{-- <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary mb-3">Create New Account</a> --}}
        <form action="/employees/create" method="GET">
            @csrf
            <button type="submit">ADD Employee</button>
        </form>

        <h2>Employees</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee['id'] }}</td>
                        <td>{{ $employee['user_name'] }}</td>
                        <td>{{ $employee['email'] }}</td>
                        <td>

                            <a href="{{ route('employees.show', $employee['id']) }}" class="btn btn-warning">Edit</a>
                            {{-- <a href="{{ route('admin.accounts.edit', $employee['id']) }}" class="btn btn-warning">Edit</a> --}}
                            {{-- <form action="{{ route('admin.accounts.destroy', $employee['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form> --}}
                            <form action="{{ route('employees.destroy', $employee['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Customers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer['id'] }}</td>
                        <td>{{ $customer['name'] }}</td>
                        <td>{{ $customer['email'] }}</td>
                        <td>
                            <a href="{{ route('admin.accounts.edit', $customer['id']) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.accounts.destroy', $customer['id']) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

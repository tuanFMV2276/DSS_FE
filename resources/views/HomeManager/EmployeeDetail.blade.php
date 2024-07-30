<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    body {
        background-color: #f8f9fa;
        padding-top: 50px;
    }

    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
    <script>
    function confirmSave() {
        return confirm("Are you sure you want to save the changes?");
    }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Employee Details</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h2><i class="fas fa-user"></i>Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('manager.updateEmployee', $employee['id']) }}" method="POST"
                    onsubmit="return confirmSave()">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-user-circle"></i> Username:</strong>
                                {{ $employee['name'] }}</p>
                            <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $employee['email'] }}</p>
                            {{-- <p><strong><i class="fas fa-key"></i> Password:</strong> {{ $employee['password'] }}</p> --}}
                            <p><strong><i class="fas fa-phone"></i> Phone:</strong> {{ $employee['phone'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong>
                                {{ $employee['address'] }}</p>
                            <p><strong><i class="fas fa-birthday-cake"></i> Date of Birth:</strong>
                                {{ $employee['date_of_birth'] }}</p>
                            <p><strong><i class="fas fa-venus-mars"></i> Gender:</strong> {{ $employee['gender'] }}</p>
                            <p><strong><i class="fas fa-user-check"></i> Status:</strong>
                                {{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id"><i class="fas fa-user-tag"></i> Assign Role</label>
                        <select class="form-control" id="role_id" name="role" style="width: min-content">
                            <option value='salestaff' {{ old('role_id', $employee['role']) == 'salestaff' ? 'selected' : '' }}>Sales
                                Staff</option>
                            <option value='deliverystaff' {{ old('role_id', $employee['role']) == 'deliverystaff' ? 'selected' : '' }}>
                                Delivery Staff</option>
                        </select>
                    </div>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                        Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
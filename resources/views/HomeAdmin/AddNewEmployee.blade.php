<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
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
        <h1 class="my-4">Add New Employee</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h2><i class="fas fa-user"></i>Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.storeNewEmployee') }}" method="POST" onsubmit="return confirmSave()">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_name"><i class="fas fa-user-circle"></i> Username:</label>
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    value="{{ old('user_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-key"></i> Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fas fa-phone"></i> Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address"><i class="fas fa-map-marker-alt"></i> Address:</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth"><i class="fas fa-birthday-cake"></i> Date of Birth:</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gender"><i class="fas fa-venus-mars"></i> Gender:</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status"><i class="fas fa-user-check"></i> Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id"><i class="fas fa-user-tag"></i> Assign Role</label>
                        <select class="form-control" id="role_id" name="role_id" required>
                            <option value="" disabled selected>Select role</option>
                            <option value="2" {{ old('role_id') == '2' ? 'selected' : '' }}>Manager</option>
                            <option value="3" {{ old('role_id') == '3' ? 'selected' : '' }}>Sales Staff</option>
                            <option value="4" {{ old('role_id') == '4' ? 'selected' : '' }}>Delivery Staff</option>
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
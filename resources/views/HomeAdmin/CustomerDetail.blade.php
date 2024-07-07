<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
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

        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <script>
        function confirmSave() {
            return confirm("Are you sure you want to save the changes?");
        }

        function enableSaveButton() {
            document.getElementById('save-button').disabled = false;
        }

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-password-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Customer Details</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h2><i class="fas fa-user"></i> Information</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateCustomer', $customer['id']) }}" method="POST" onsubmit="return confirmSave()">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-user-circle"></i> Username:</strong> {{ $customer['name'] }}</p>
                            <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $customer['email'] }}</p>
                            <div class="form-group">
                                <label for="password"><strong><i class="fas fa-key"></i> Password:</strong></label>
                                <div class="input-group">
                                    <input type="password" id="password" class="form-control" value="{{ $customer['password'] }}" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" onclick="togglePasswordVisibility()">
                                            <i class="fas fa-eye" id="toggle-password-icon"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <p><strong><i class="fas fa-phone"></i> Phone:</strong> {{ $customer['phone'] }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong> {{ $customer['address'] }}</p>
                            <p><strong><i class="fas fa-birthday-cake"></i> Date of Birth:</strong> {{ $customer['date_of_birth'] }}</p>
                            <p><strong><i class="fas fa-venus-mars"></i> Gender:</strong> {{ $customer['gender'] }}</p>
                            <div class="form-group form-inline">
                                <label for="status" class="mr-2"><strong><i class="fas fa-user-check"></i> Status:</strong></label>
                                <select name="status" id="status" class="form-control" onchange="enableSaveButton()">
                                    <option value="1" {{ $customer['status'] == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $customer['status'] == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <button type="submit" class="btn btn-primary" id="save-button">Save</button>
                    </div>
                </form>
                <form action="{{ route('admin.destroyCustomer', $customer['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

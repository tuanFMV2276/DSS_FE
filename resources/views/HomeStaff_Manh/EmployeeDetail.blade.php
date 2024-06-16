<body>
    <div class="container">
        <h2>Edit Employee</h2>

        <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name', $employee['user_name']) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee['email']) }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $employee['password']) }}">
            </div>

            <div class="form-group">
                <label for="role_id">Role ID</label>
                <input type="text" class="form-control" id="role_id" name="role_id" value="{{ old('role_id', $employee['role_id']) }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee['phone']) }}">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee['address']) }}">
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $employee['date_of_birth']) }}">
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" {{ old('gender', $employee['gender']) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $employee['gender']) == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ old('status', $employee['status']) == '1' ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ old('status', $employee['status']) == '2' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
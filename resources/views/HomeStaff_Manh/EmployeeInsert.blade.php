<body>
    <div class="container">
        <h2>Create New Employee</h2>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="">
            </div>
    
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="">
            </div>
    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>
    
            <div class="form-group">
                <label for="role_id">Role ID</label>
                <select class="form-control" id="role_id" name="role_id">
                    <!-- Populate options dynamically from your database -->
                    @foreach ($roles as $role)
                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="">
            </div>
    
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="">
            </div>
    
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="">
            </div>
    
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" >Male</option>
                    <option value="female" >Female</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" >Active</option>
                    <option value="2" >Inactive</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
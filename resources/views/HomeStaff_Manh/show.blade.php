

<!-- Thay đổi form cập nhật để sử dụng AJAX -->
<div>
    <h2>Employee Details</h2>
    <form id="updateEmployeeForm" action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p><strong>Name:</strong> <input type="text" name="user_name" value="{{ $employee->user_name }}"></p>
        <p><strong>Email:</strong> <input type="email" name="email" value="{{ $employee->email }}"></p>
        <p><strong>Role:</strong>
            <select name="role_id">
                <option value="3" {{ $employee->role_id == 3 ? 'selected' : '' }}>Sale staff</option>
                <option value="4" {{ $employee->role_id == 4 ? 'selected' : '' }}>Support staff</option>
                <option value="5" {{ $employee->role_id == 5 ? 'selected' : '' }}>Technician</option>
            </select>
        </p>
        <p><strong>Gender:</strong> <input type="text" name="gender" value="{{ $employee->gender }}"></p>
        <p><strong>Status:</strong> 
            <select name="status">
                <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </p>
        <p><strong>Phone:</strong> <input type="text" name="phone" value="{{ $employee->phone }}"></p>
        <button type="submit" class="btn btn-danger">Update</button>
        <!-- Bạn cũng có thể thêm nút "Cancel" nếu cần -->
    </form>

    <!-- Nút xóa nhân viên -->
    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
    </form>
</div>
<!-- Thêm mã JavaScript vào cuối của tệp show.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện submit của form cập nhật
        document.getElementById('updateEmployeeForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của nút "Update"

            const formData = new FormData(this); // Lấy dữ liệu từ form
            const url = this.action; // Lấy URL từ action của form

            fetch(url, {
                method: 'PUT',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text(); // Trả về phản hồi dưới dạng văn bản
            })
            .then(data => {
                // Cập nhật nội dung của trang
                document.querySelector('.main-content').innerHTML = data;
            })
            .catch(error => {
                console.error('There was a problem with the update:', error);
            });
        });
    });
</script>

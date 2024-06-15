<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home manager </title>
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaff.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaffv2.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/button.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#" onclick="showTable('dashboard')">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#" onclick="showTable('bill-management')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#" onclick="showTable('product-management')">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Product Management</span>
                </a>
                <span class="tooltip">Product Management</span>
            </li>
            <li>
                <a href="#" onclick="showTable('staff-management')">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Staff Management</span>
                </a>
                <span class="tooltip">Staff Management</span>
            </li>


            <li class="profile">

                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div>
            <div class="main-content ">
                <div id="dashboard" class="table-container" style="display:contents;">
                    <h1>Dashboard</h1>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Statistics</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Products</h5>
                                            <p class="card-text">{{ $productCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Orders</h5>
                                            <p class="card-text">{{ $orderCount }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Users</h5>
                                            <p class="card-text">{{ $customerCount }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="bill-management" class="table-container" style="display: none;">
                    <h1>List Orders</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order['id'] }}</td>
                                    <td>{{ $order['customer_id'] }}</td>
                                    <td>{{ $order['order_date'] }}</td>
                                    <td>{{ $order['total_price'] }}</td>
                                    <td>
                                        <form action="{{ route('orders.updateStatus', $order['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()">
                                                <option value="pending"
                                                    {{ $order['status'] == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="processing"
                                                    {{ $order['status'] == 'processing' ? 'selected' : '' }}>Processing
                                                </option>
                                                <option value="completed"
                                                    {{ $order['status'] == 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                                <option value="cancelled"
                                                    {{ $order['status'] == 'cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('orders.destroy', $order['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="product-management" class="table-container" style="display: none;">
                    <h1>List Products</h1>
                    <a href="{{ route('products.create') }}">Create New Product</a>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Main Diamond ID</th>
                                <th>Image</th>
                                <th>Extra Diamond ID</th>
                                <th>Number Ex Diamond</th>
                                <th>Number</th>
                                <th>Diamond Shell ID</th>
                                <th>Size</th>
                                <th>Price Rate</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product['id'] }}</td>
                                    <td>{{ $product['product_code'] }}</td>
                                    <td>{{ $product['product_name'] }}</td>
                                    <td>{{ $product['main_diamond_id'] }}</td>
                                    <td>{{ $product['image'] }}</td>
                                    <td>{{ $product['extra_diamond_id'] }}</td>
                                    <td>{{ $product['number_ex_diamond'] }}</td>
                                    <td>{{ $product['number'] }}</td>
                                    <td>{{ $product['diamond_shell_id'] }}</td>
                                    <td>{{ $product['size'] }}</td>
                                    <td>{{ $product['price_rate'] }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['status'] }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product['id']) }}">Edit</a>
                                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST"
                                            style="display:inline-block">
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


                <div id="staff-management" class="table-container" style="display: none;">
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
                                        <form action="{{ route('employees.updateRole', $employee['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="role_id" onchange="this.form.submit()">
                                                <option value="2"
                                                    {{ $employee['role_id'] == 2 ? 'selected' : '' }}>Sale staff
                                                </option>
                                                <option value="4"
                                                    {{ $employee['role_id'] == 4 ? 'selected' : '' }}>Delivery staff
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <button>Detail</button>
                                    </td>
                                    <td>
                                        <form action="{{ route('employees.destroy', $employee['id']) }}"
                                            method="POST">
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
            </div>
        </div>

    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }

        function showTable(tableId) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');
            document.getElementById(tableId).style.display = 'block';
        }
    </script>

</body>

</html>

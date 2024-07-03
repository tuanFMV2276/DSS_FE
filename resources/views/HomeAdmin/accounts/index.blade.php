<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaff.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaffv2.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/staffchat.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/searchfield.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <header class="sidebar">
        <div class="logo-details">
            <i class="fa-solid fa-ellipsis-vertical" id="btn"></i>
            <span class="links_name"></span>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#" onclick="showTable('account-customer')">
                    <i class="fa-regular fa-user"></i>
                    <span class="links_name">Customer</span>
                </a>
                <span class="tooltip">Customer</span>
            </li>
            <li>
                <a href="#" onclick="showTable('staff-management')" class="status-btn active" data-status="all">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Employees</span>
                </a>
                <span class="tooltip">Employees</span>
            </li>
            <li class="profile">
                <i class="fa-solid fa-arrow-right-to-bracket" id="log_out"></i>
            </li>
        </ul>
    </header>

    <section class="home-section">
        <div class="main-content">
          
            <div id="account-customer" class="table-container" style="display:contents;">
              <h1>Customer Account List</h1> 
              <div class="top-bar">
                  <div id="div_search_product">
                      <form id="search-form">
                          <div class="search-bar">
                              <input type="text" id="customer_name" name="customer_name" placeholder="Customer Name">
                              <i class="fas fa-user"></i>
                              <input type="text" id="order_date" name="order_date" placeholder="Order Date">
                              <i class="fas fa-calendar-alt"></i>
                              <button type="submit">
                                  <div>Search</div>
                              </button>
                          </div>
                      </form>
                  </div>
                  <a href="{{ route('manager.createProduct') }}" class="btn btn-success"><button class="add-st"><i class="fas fa-plus"></i>Add New Account</button></a>
              </div>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date_of_birth</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="order-list">
                        @foreach ($customers as $customer)
                            <tr">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer['id'] }}</td>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['password'] }}</td>
                                <td>{{ $customer['phone'] }}</td>
                                <td>{{ $customer['address'] }}</td>
                                <td>{{ $customer['date_of_birth'] }}</td>
                                <td>{{ $customer['gender'] }}</td>
                                <td>{{ $customer['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                <td><button>Update</button></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div id="staff-management" class="table-container" style="display: none;">
                <h1>Employee Account List</h1>
                <div class="top-bar">
                    <div id="div_search_product">
                        <form id="search-form">
                            <div class="search-bar">
                                <input type="text" id="customer_name" name="customer_name" placeholder="Customer Name">
                                <i class="fas fa-user"></i>
                                <input type="text" id="order_date" name="order_date" placeholder="Order Date">
                                <i class="fas fa-calendar-alt"></i>
                                <button type="submit">
                                    <div>Search</div>
                                </button>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('manager.createProduct') }}" class="btn btn-success"><button class="add-st"><i class="fas fa-plus"></i>Add New Account</button></a>
                </div>
                {{-- <div class="status-bar">
                  <button onclick="showTable('staff-management')">
                       All employees
                  </button>
                  <button  onclick="showTable('salestaff-management')">
                       Sale staffs
                  </button>
                  <button onclick="showTable('deliverystaff-management')">
                      Delivery staffs
                  </button>
              </div> --}}
                <div class="status-bar more-margintop">
                    <button class="status-btn active" data-status="all">
                        <i class="fas fa-list icon-status"></i> All employee
                    </button>
                    <button class="status-btn" data-status="3">
                        <i class="fa-solid fa-user-tie icon-status"></i>Sale staffs
                    </button>
                    <button class="status-btn" data-status="4">
                        <i class="fa-solid fa-truck icon-status"></i> Delivery staffs
                    </button>
                    <button class="status-btn" data-status="2">
                        <i class="fa-solid fa-truck icon-status"></i> Manager
                    </button>

                </div>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>View detail</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $rolesLabels = [
                                2 => 'Manager',
                                3 => 'Sale Staff',
                                4 => 'Delivery Staff',
                            ];
                        @endphp
                        @foreach ($filteredEmployees as $employee)
                            <tr class="order-row" data-status="{{ $employee['role_id'] }}">
                                <td>{{ $employee['user_name'] }}</td>
                                <td>{{ $employee['gender'] }}</td>
                                <td>{{ $rolesLabels[$employee['role_id']] ?? 'Unknown' }}</td>
                                <td>{{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('admin.showEmployeeDetail', $employee['id']) }}">
                                        <i class="fa-regular fa-eye icon-blue"></i>
                                    </a>
                                </td>
                                {{-- <td>
                                  <form action="{{ route('employees.destroy', $employee['id']) }}"
                                      method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" >Delete</button>
                                  </form>
                              </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer>
        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");

            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search icon
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            // Following are the code to change sidebar button(optional)
            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the icons class
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the icons class
                }
            }

            function showTable(tableId) {
                const tables = document.querySelectorAll('.table-container');
                tables.forEach(table => table.style.display = 'none');
                document.getElementById(tableId).style.display = 'block';
            }
        </script>
        <script>
            const statusButtons = document.querySelectorAll('.status-btn');
            const orderRows = document.querySelectorAll('.order-row');

            statusButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const status = btn.getAttribute('data-status');

                    // Update active button
                    statusButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    // Filter orders based on status
                    orderRows.forEach(row => {
                        if (status === 'all' || row.getAttribute('data-status') === status) {
                            row.style.display = 'table-row';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </footer>
</body>

</html>

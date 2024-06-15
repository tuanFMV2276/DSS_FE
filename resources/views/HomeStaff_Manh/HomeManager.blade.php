<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
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
            <li style="display: none;">
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="{{ route('manager.dashboard') }}">
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
                <a href="#">
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
            <div class="main-content">

                <div id="bill-management" class="table-container" style="display: none;">
                    <table>
                        <tr>
                            <th>OrderID</th>
                            <th>ProductID</th>
                            <th>CustomerName</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Note</th>
                            <th>Detail</th>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>01</td>
                            <td>Manh</td>
                            <td>0946381264</td>
                            <td>365 Le Van Viet Street</td>
                            <td>13,000,000đ</td>
                            <td>Giao hàng trước ngày 09/6</td>
                            <td><button>Detail</button></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>02</td>
                            <td>Quan</td>
                            <td>0947392164</td>
                            <td>365 Le Van Viet Street</td>
                            <td>23,000,000đ</td>
                            <td></td>
                            <td><button>Detail</button></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>03</td>
                            <td>Tuan</td>
                            <td>0947261455</td>
                            <td>832 Hoang Dieu 2 Street</td>
                            <td>26,900,000đ</td>
                            <td></td>
                            <td><button>Detail</button></td>
                        </tr>
                    </table>
                </div>

                <div id="staff-management" class="table-container">
                    <h1>Employee List</h1>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->user_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        @if ($employee->role_id == 3)
                                            Sale staff
                                        @elseif ($employee->role_id == 4)
                                            Support staff
                                        @elseif ($employee->role_id == 5)
                                            Technician
                                        @endif
                                    </td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td><form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-ibfo">Update</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                    </form></td>
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

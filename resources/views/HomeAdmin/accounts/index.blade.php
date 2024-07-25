<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                <a href="#" onclick="showTable('account-customer')" class="status-btn active" data-status="all">
                    <i class="fa-regular fa-user"></i>
                    <span class="links_name">Customer</span>
                </a>
                <span class="tooltip">Customer</span>
            </li>
            <li>
                <a href="#" onclick="showTable('staff-management')" class="status-btn" data-status="all">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Employees</span>
                </a>
                <span class="tooltip">Employees</span>
            </li>
            <li class="profile">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="padding: 0; background-color: #1d1b31;border: none">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </button>
                </form>
            </li>
        </ul>
    </header>

    <section class="home-section">
        <div class="main-content">

            <div id="account-customer" class="table-container" style="display:contents;">
                <h1>Customer Account List</h1>
                <div class="top-bar"></div>
                <div class="status-bar more-margintop">
                    <button class="status-btn active" data-status="all">All</button>
                    <button class="status-btn" data-status="1">Active</button>
                    <button class="status-btn" data-status="0">Inactive</button>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th>Id</th> --}}
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>View Detail</th>
                        </tr>
                    </thead>
                    <tbody id="order-list">
                        @foreach ($filteredCustomers as $customer)
                            <tr class="filter-row" data-status="{{ $customer['status'] }}">
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $customer['id'] }}</td> --}}
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['gender'] }}</td>
                                <td>{{ $customer['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('admin.showCustomerDetail', $customer['id']) }}">
                                        <i class="fa-regular fa-eye icon-blue"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    <button id="prev-btn-order" onclick="prevPageOrder()" disabled>&laquo; Previous</button>
                    <span id="page-num-order">1</span> / <span id="total-pages-order">1</span>
                    <button id="next-btn-order" onclick="nextPageOrder()">Next &raquo;</button>
                    <input type="number" id="goto-page-input-order" min="1" placeholder="Page" style="width: 55px;">
                    <button id="goto-page-btn-order">Go</button>
                </div>
            </div>

            <div id="staff-management" class="table-container" style="display: none;">
                <h1>Employee Account List</h1>
                <div class="status-bar more-margintop">
                    <button class="status-btn active" data-status="all">All employee</button>
                    <button class="status-btn" data-status="manager">Managers</button>
                    <button class="status-btn" data-status="salestaff">Sale staffs</button>
                    <button class="status-btn" data-status="deliverystaff">Delivery staffs</button>
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
                    <tbody id="staff-list">
                        @foreach ($filteredEmployees as $employee)
                            <tr class="filter-row" data-status="{{ $employee['role'] }}">
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['gender'] }}</td>
                                <td>{{ $employee['role'] ?? 'Unknown' }}</td>
                                <td>{{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('admin.showEmployeeDetail', $employee['id']) }}">
                                        <i class="fa-regular fa-eye icon-blue"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    <button id="prev-btn-staff" onclick="prevPageStaff()" disabled>&laquo; Previous</button>
                    <span id="page-num-staff">1</span> / <span id="total-pages-staff">1</span>
                    <button id="next-btn-staff" onclick="nextPageStaff()">Next &raquo;</button>
                    <input type="number" id="goto-page-input-staff" min="1" placeholder="Page" style="width: 55px;">
                    <button id="goto-page-btn-staff">Go</button>
                </div>
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
            document.addEventListener('DOMContentLoaded', () => {
                // Pagination and filtering for orders
                const orderStatusButtons = document.querySelectorAll('#account-customer .status-btn');
                const orderRows = document.querySelectorAll('#order-list .filter-row');
                const rowsPerPageOrder = 15;
                let currentPageOrder = 1;
        
                orderStatusButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const status = btn.getAttribute('data-status');
        
                        // Update active button
                        orderStatusButtons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
        
                        // Filter orders based on status and reset pagination
                        filterOrders(status);
                        currentPageOrder = 1;
                        displayOrderRows();
                        updateTotalPages();
                    });
                });
        
                function filterOrders(status) {
                    orderRows.forEach(row => {
                        if (status === 'all' || row.getAttribute('data-status') === status) {
                            row.style.display = 'table-row';
                            row.classList.remove('filtered-out');
                        } else {
                            row.style.display = 'none';
                            row.classList.add('filtered-out');
                        }
                    });
                }
        
                function displayOrderRows() {
                    let displayedRows = 0;
                    let start = (currentPageOrder - 1) * rowsPerPageOrder;
                    let end = start + rowsPerPageOrder;
        
                    orderRows.forEach((row, index) => {
                        if (!row.classList.contains('filtered-out')) {
                            row.style.display = 'none';
                            if (displayedRows >= start && displayedRows < end) {
                                row.style.display = 'table-row';
                            }
                            displayedRows++;
                        }
                    });
        
                    document.getElementById('page-num-order').textContent = currentPageOrder;
                    document.getElementById('prev-btn-order').disabled = currentPageOrder === 1;
                    document.getElementById('next-btn-order').disabled = currentPageOrder >= totalPages();
                }
        
                function prevPageOrder() {
                    if (currentPageOrder > 1) {
                        currentPageOrder--;
                        displayOrderRows();
                    }
                }
        
                function nextPageOrder() {
                    if (currentPageOrder < totalPages()) {
                        currentPageOrder++;
                        displayOrderRows();
                    }
                }
        
                function updateTotalPages() {
                    document.getElementById('total-pages-order').textContent = totalPages();
                }
        
                function totalPages() {
                    let visibleRows = Array.from(orderRows).filter(row => !row.classList.contains('filtered-out'));
                    return Math.ceil(visibleRows.length / rowsPerPageOrder);
                }
        
                document.getElementById('prev-btn-order').addEventListener('click', prevPageOrder);
                document.getElementById('next-btn-order').addEventListener('click', nextPageOrder);
        
                document.getElementById('goto-page-btn-order').addEventListener('click', () => {
                    const gotoPageInput = document.getElementById('goto-page-input-order').value;
                    const pageNumber = parseInt(gotoPageInput, 10);
                    const totalPagesCount = totalPages();
        
                    if (isNaN(pageNumber) || pageNumber <= 0 || pageNumber > totalPagesCount) {
                        alert('Invalid page number. Please enter a number between 1 and ' + totalPagesCount + '.');
                    } else {
                        currentPageOrder = pageNumber;
                        displayOrderRows();
                    }
                });
        
                // Initial display
                filterOrders('all');
                displayOrderRows();
                updateTotalPages();
        
                // Pagination and filtering for staff
                const staffStatusButtons = document.querySelectorAll('#staff-management .status-btn');
                const staffRows = document.querySelectorAll('#staff-list .filter-row');
                const rowsPerPageStaff = 10;
                let currentPageStaff = 1;
        
                staffStatusButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const status = btn.getAttribute('data-status');
        
                        // Update active button
                        staffStatusButtons.forEach(b => b.classList.remove('active'));
                        btn.classList.add('active');
        
                        // Filter staff based on status and reset pagination
                        filterStaff(status);
                        currentPageStaff = 1;
                        displayStaffRows();
                        updateTotalPagesStaff();
                    });
                });
        
                function filterStaff(status) {
                    staffRows.forEach(row => {
                        if (status === 'all' || row.getAttribute('data-status') === status) {
                            row.style.display = 'table-row';
                            row.classList.remove('filtered-out');
                        } else {
                            row.style.display = 'none';
                            row.classList.add('filtered-out');
                        }
                    });
                }
        
                function displayStaffRows() {
                    let displayedRows = 0;
                    let start = (currentPageStaff - 1) * rowsPerPageStaff;
                    let end = start + rowsPerPageStaff;
        
                    staffRows.forEach((row, index) => {
                        if (!row.classList.contains('filtered-out')) {
                            row.style.display = 'none';
                            if (displayedRows >= start && displayedRows < end) {
                                row.style.display = 'table-row';
                            }
                            displayedRows++;
                        }
                    });
        
                    document.getElementById('page-num-staff').textContent = currentPageStaff;
                    document.getElementById('prev-btn-staff').disabled = currentPageStaff === 1;
                    document.getElementById('next-btn-staff').disabled = currentPageStaff >= totalPagesStaff();
                }
        
                function prevPageStaff() {
                    if (currentPageStaff > 1) {
                        currentPageStaff--;
                        displayStaffRows();
                    }
                }
        
                function nextPageStaff() {
                    if (currentPageStaff < totalPagesStaff()) {
                        currentPageStaff++;
                        displayStaffRows();
                    }
                }
        
                function updateTotalPagesStaff() {
                    document.getElementById('total-pages-staff').textContent = totalPagesStaff();
                }
        
                function totalPagesStaff() {
                    let visibleRows = Array.from(staffRows).filter(row => !row.classList.contains('filtered-out'));
                    return Math.ceil(visibleRows.length / rowsPerPageStaff);
                }
        
                document.getElementById('prev-btn-staff').addEventListener('click', prevPageStaff);
                document.getElementById('next-btn-staff').addEventListener('click', nextPageStaff);
        
                document.getElementById('goto-page-btn-staff').addEventListener('click', () => {
                    const gotoPageInput = document.getElementById('goto-page-input-staff').value;
                    const pageNumber = parseInt(gotoPageInput, 10);
                    const totalPagesCount = totalPagesStaff();
        
                    if (isNaN(pageNumber) || pageNumber <= 0 || pageNumber > totalPagesCount) {
                        alert('Invalid page number. Please enter a number between 1 and ' + totalPagesCount + '.');
                    } else {
                        currentPageStaff = pageNumber;
                        displayStaffRows();
                    }
                });
        
                // Initial display
                filterStaff('all');
                displayStaffRows();
                updateTotalPagesStaff();
            });
        </script>
        
    </footer>
</body>

</html>

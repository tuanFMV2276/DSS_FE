<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Home delivery-staff</title>
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaff.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaffv2.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/button.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/searchfield.css') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="fa-solid fa-ellipsis-vertical" id="btn"></i>
            <span class="links_name"></span>
        </div>
        <ul class="nav-list">

            <li>
                <a href="#" onclick="showTable('bill-management')" class="status-btn active" data-status="all">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li class="profile">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="padding: 0; background-color: #1d1b31;border: none"
                       >
                        <i class="fa-solid fa-arrow-right-to-bracket" ></i>
                    </button>
                </form>             
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div>
            <div class="main-content">
                <div id="bill-management" class="table-container" style="display: contents;">
                    <h1>List Orders</h1>
                    <div class="status-bar">
                        <button class="status-btn active" data-status="all">
                            <i class="fas fa-list icon-status"></i> All Orders
                        </button>
                        <button class="status-btn" data-status="2">
                            <i class="fas fa-box-open icon-status"></i> Prepare Product
                        </button>
                        <button class="status-btn" data-status="3">
                            <i class="fas fa-shipping-fast icon-status"></i> Delivering
                        </button>
                        <button class="status-btn" data-status="4">
                            <i class="fas fa-check icon-status"></i> Finished
                        </button>
                        <button class="status-btn" data-status="5">
                            <i class="fas fa-times-circle icon-status"></i> Cancelled
                        </button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                                {{-- <th>Payment Method</th> --}}
                                <th>Customer</th>
                                <th>Status</th>
                                <th>View Detail</th>
                            </tr>
                        </thead>
                        <tbody id="order-list">
                            @foreach ($orders as $index => $order)
                                @php
                                    //$customer = collect($customers)->firstWhere('id', $order['customer_id']);
                                    $payment = collect($payments)->firstWhere('order_id', $order['id']);
                                    $statusLabels = [
                                        2 => 'Prepare Product',
                                        3 => 'Delivering',
                                        4 => 'Finished',
                                        5 => 'Cancelled',
                                    ];
                                @endphp
                                <tr class="status-row" data-status="{{ $order['status'] }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order['id'] }}</td>
                                    <td>{{ $order['order_date'] }}</td>
                                    <td>{{ number_format($order['total_price'], 0) }}</td>
                                    {{-- <td>{{ $payment ? $payment['payment_method'] : 'Unknown' }}</td> --}}
                                    <td style="text-align: left;">Name: {{ $order ? $order['name'] : 'Unknown' }}<br>
                                        Address: {{ $order ? $order['address'] : 'Unknown' }}<br>
                                        Phone: {{ $order ? $order['phone'] : 'Unknown' }}</td>
                                    <td>
                                        <form id="status-form-{{ $order['id'] }}"
                                            action="{{ route('delivery-staff.orders.updateStatus', $order['id']) }}"
                                            method="POST" class="form-inline">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control"
                                                onchange="confirmAndUpdateStatus({{ $order['id'] }})">
                                                <option value='2' {{ $order['status'] == '2' ? 'selected' : '' }}>
                                                    Prepare Product</option>
                                                <option value='3' {{ $order['status'] == '3' ? 'selected' : '' }}>
                                                    Delivering</option>
                                                <option value='4' {{ $order['status'] == '4' ? 'selected' : '' }}>
                                                    Finished</option>
                                                <option value='5' {{ $order['status'] == '5' ? 'selected' : '' }}>
                                                    Cancelled</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('delivery-staff.orders.show', $order['id']) }}">
                                            <i class="fa-regular fa-eye icon-blue"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-order" onclick="prevPageOrder()" disabled>&laquo; Previous</button>
                        <span id="page-num-order">1</span> / <span id="total-pages">1</span>
                        <button id="next-btn-order" onclick="nextPageOrder()">Next &raquo;</button>
                        <input type="number" id="goto-page-input" min="1" placeholder="Page" style="width: 60px;">
                        <button id="goto-page-btn">Go</button>
                    </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusButtons = document.querySelectorAll('.status-btn');
            const orderRows = document.querySelectorAll('.status-row');
            const rowsPerPageOrder = 5;
            let currentPageOrder = 1;
    
            statusButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const status = btn.getAttribute('data-status');
    
                    // Cập nhật nút đang hoạt động
                    statusButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
    
                    // Lọc đơn hàng theo trạng thái và đặt lại phân trang
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
                document.getElementById('total-pages').textContent = totalPages();
            }
    
            function totalPages() {
                let visibleRows = Array.from(orderRows).filter(row => !row.classList.contains('filtered-out'));
                return Math.ceil(visibleRows.length / rowsPerPageOrder);
            }
    
            document.getElementById('prev-btn-order').addEventListener('click', prevPageOrder);
            document.getElementById('next-btn-order').addEventListener('click', nextPageOrder);
    
            document.getElementById('goto-page-btn').addEventListener('click', () => {
                const gotoPageInput = document.getElementById('goto-page-input').value;
                const pageNumber = parseInt(gotoPageInput, 10);
                const totalPagesCount = totalPages();
    
                if (isNaN(pageNumber) || pageNumber <= 0 || pageNumber > totalPagesCount) {
                    alert('Invalid page number. Please enter a number between 1 and ' + totalPagesCount + '.');
                } else {
                    currentPageOrder = pageNumber;
                    displayOrderRows();
                }
            });
    
            // Hiển thị trang đầu tiên
            filterOrders('all');
            displayOrderRows();
            updateTotalPages();
        });
    </script>
    

    <script>
        function confirmAndUpdateStatus(orderId) {
            if (confirm('Are you sure you want to update the status?')) {
                document.getElementById('status-form-' + orderId).submit();
            }
        }
    </script>

</body>

</html>


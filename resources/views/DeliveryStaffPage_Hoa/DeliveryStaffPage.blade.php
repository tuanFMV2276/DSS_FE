<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Staff Page</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/DeliveryStaffPage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <img src="profile.jpg" alt="Profile Picture">
                <h2>Ann Smith</h2>
                <p>ann_s@mdbootstrap.com</p>
            </div>
            <ul class="menu">
                <li><a href="#" onclick="showTable('order-pending')"><i
                            class="fa-solid fa-hourglass-half pr-3"></i>Order Pending</a></li>
                <li><a href="#" onclick="showTable('order-on-going')"><i
                            class="fa-sharp fa-solid fa-truck-fast pr-3"></i>Order On-going</a></li>
                <li><a href="#" onclick="showTable('order-done')"><i class="fa-solid fa-clipboard-check pr-3"></i>Order
                        Done</a></li>
                <li><a href="/Login"><i class="fa-solid fa-right-from-bracket pr-3"></i>Log out</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <h1>Delivery Staff Dashboard</h1>
            </div>
            <div id="order-pending" class="table-container">
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
                        <td><a href="#"
                                onclick="showDetails('01', '01', 'Manh', '0946381264', '365 Le Van Viet Street', '13,000,000đ', 'Giao hàng trước ngày 09/6')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>02</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('02', '02', 'Quan', '0947392164', '365 Le Van Viet Street', '23,000,000đ', '')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>03</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('03', '03', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '26,900,000đ', '')">Detail</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="order-on-going" class="table-container" style="display: none;">
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
                        <td>04</td>
                        <td>04</td>
                        <td>Manh</td>
                        <td>0946381264</td>
                        <td>365 Le Van Viet Street</td>
                        <td>13,000,000đ</td>
                        <td>Giao hàng trước ngày 09/6</td>
                        <td><a href="#"
                                onclick="showDetails('04', '04', 'Manh', '0946381264', '365 Le Van Viet Street', '13,000,000đ', 'Giao hàng trước ngày 09/6')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>05</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('05', '05', 'Quan', '0947392164', '365 Le Van Viet Street', '23,000,000đ', '')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>06</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('06', '06', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '26,900,000đ', '')">Detail</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="order-done" class="table-container" style="display: none;">
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
                        <td>07</td>
                        <td>07</td>
                        <td>Manh</td>
                        <td>0946381264</td>
                        <td>365 Le Van Viet Street</td>
                        <td>13,000,000đ</td>
                        <td>Giao hàng trước ngày 09/6</td>
                        <td><a href="#"
                                onclick="showDetails('07', '07', 'Manh', '0946381264', '365 Le Van Viet Street', '13,000,000đ', 'Giao hàng trước ngày 09/6')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>08</td>
                        <td>08</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('08', '08', 'Quan', '0947392164', '365 Le Van Viet Street', '23,000,000đ', '')">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>09</td>
                        <td>09</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#"
                                onclick="showDetails('09', '09', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '26,900,000đ', '')">Detail</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="orderDetailModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Order Detail</h2>
            <div class="table-container-detail">
                <table>
                    <tr>
                        <td><strong>OrderID: </strong><span id="modalOrderID"></span></td>
                        <td><strong>Delivery Name: </strong><span id="delivertName">Hoa</span></td>
                    </tr>
                    <tr>
                        <td><strong>Product Name: </strong></td>
                        <td><span id="modalProductID"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        showTable('order-pending');
    });

    function showTable(tableId) {
        const tables = document.querySelectorAll('.table-container');
        tables.forEach(table => table.style.display = 'none');
        document.getElementById(tableId).style.display = 'block';
    }

    function showDetails(orderID, productID, customerName, phone, address, price, note) {
        document.getElementById('modalOrderID').innerText = orderID;
        document.getElementById('modalProductID').innerText = productID;
        document.getElementById('modalCustomerName').innerText = customerName;
        document.getElementById('modalPhone').innerText = phone;
        document.getElementById('modalAddress').innerText = address;
        document.getElementById('modalPrice').innerText = price;
        document.getElementById('modalNote').innerText = note;

        document.getElementById('orderDetailModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('orderDetailModal').style.display = 'none';
    }
    </script>
</body>

</html>
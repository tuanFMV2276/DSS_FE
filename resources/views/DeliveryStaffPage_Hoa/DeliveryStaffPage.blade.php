<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Staff Page</title>
    <link rel="stylesheet" href="{{ asset('css_Hoa/DeliveryStaffPage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <li><a href="#" onclick="showTable('order-pending')"><i class="fa-solid fa-hourglass-half pr-3"></i>Order Pending</a></li>
                <li><a href="#" onclick="showTable('order-on-going')"><i class="fa-sharp fa-solid fa-truck-fast pr-3"></i>Order On-going</a></li>
                <li><a href="#" onclick="showTable('order-done')"><i class="fa-solid fa-clipboard-check pr-3"></i>Order Done</a></li>
                <li><a href="/Login"><i class="fa-solid fa-right-from-bracket pr-3"></i>Log out</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header"><h1>Delivery Staff Dashboard</h1></div>
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
                        <td>Detail</td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td>04</td>
                        <td>Manh</td>
                        <td>0946381264</td>
                        <td>365 Le Van Viet Street</td>
                        <td>13,000,000đ</td>
                        <td>Giao hàng trước ngày 09/6</td>
                        <td><button>Detail</button></td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>05</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><button>Detail</button></td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>06</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><button>Detail</button></td>
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
                        <td>Detail</td>
                    </tr>
                    <tr>
                        <td>07</td>
                        <td>07</td>
                        <td>Manh</td>
                        <td>0946381264</td>
                        <td>365 Le Van Viet Street</td>
                        <td>13,000,000đ</td>
                        <td>Giao hàng trước ngày 09/6</td>
                        <td><button>Detail</button></td>
                    </tr>
                    <tr>
                        <td>08</td>
                        <td>08</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><button>Detail</button></td>
                    </tr>
                    <tr>
                        <td>09</td>
                        <td>09</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><button>Detail</button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hiển thị bảng Order Pending mặc định khi trang được tải
            showTable('order-pending');
        });

        function showTable(tableId) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');
            document.getElementById(tableId).style.display = 'block';
        }
    </script>
</body>
</html>

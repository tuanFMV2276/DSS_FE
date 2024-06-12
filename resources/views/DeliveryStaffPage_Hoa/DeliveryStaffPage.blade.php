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

    .invoice {
        width: 80%;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        font-family: Arial, sans-serif;
    }

    .invoice h2 {
        text-align: center;
    }

    .invoice .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .invoice .header p {
        margin: 5px 0;
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
    }

    .invoice .info {
        margin: 20px;
        border: none;
    }

    .invoice .header .info table,
    .invoice .header .info th,
    .invoice .header .info td {
        border: none;
        text-align: left;
    }

    .invoice table,
    .invoice th,
    .invoice td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .invoice th {
        background-color: #f4f4f4;
    }

    .invoice .totals {
        text-align: right;
    }

    .invoice .totals td {
        border: none;
    }

    .invoice .footer {
        text-align: right;
        margin-top: 20px;
    }

    .invoice .footer p {
        font-size: 18px;
        font-weight: bold;
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
            <div id="order-pending" class="table-container" style="display: block;">
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
                        <td><a href="#" onclick="showDetails('01', 'Manh', '0946381264', '365 Le Van Viet Street', 'Giao hàng trước ngày 09/6', [
                                {productID: '01', price: 13000000, quantity: 3},
                                {productID: '02', price: 15000000, quantity: 2}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>02</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('02', 'Quan', '0947392164', '365 Le Van Viet Street', '', [
                                {productID: '03', price: 23000000, quantity: 1},
                                {productID: '04', price: 25000000, quantity: 1}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td>03</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('03', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '', [
                                {productID: '05', price: 26900000, quantity: 1},
                                {productID: '06', price: 10000000, quantity: 3}
                            ])">Detail</a></td>
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
                        <td><a href="#" onclick="showDetails('04', 'Manh', '0946381264', '365 Le Van Viet Street', 'Giao hàng trước ngày 09/6', [
                                {productID: '01', price: 13000000, quantity: 3},
                                {productID: '02', price: 15000000, quantity: 2}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td>05</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('05', 'Quan', '0947392164', '365 Le Van Viet Street', '', [
                                {productID: '03', price: 23000000, quantity: 1},
                                {productID: '04', price: 25000000, quantity: 1}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>06</td>
                        <td>06</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('06', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '', [
                                {productID: '05', price: 26900000, quantity: 1},
                                {productID: '06', price: 10000000, quantity: 3}
                            ])">Detail</a></td>
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
                        <td><a href="#" onclick="showDetails('07', 'Manh', '0946381264', '365 Le Van Viet Street', 'Giao hàng trước ngày 09/6', [
                                {productID: '01', price: 13000000, quantity: 3},
                                {productID: '02', price: 15000000, quantity: 2}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>08</td>
                        <td>08</td>
                        <td>Quan</td>
                        <td>0947392164</td>
                        <td>365 Le Van Viet Street</td>
                        <td>23,000,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('08', 'Quan', '0947392164', '365 Le Van Viet Street', '', [
                                {productID: '03', price: 23000000, quantity: 1},
                                {productID: '04', price: 25000000, quantity: 1}
                            ])">Detail</a></td>
                    </tr>
                    <tr>
                        <td>09</td>
                        <td>09</td>
                        <td>Tuan</td>
                        <td>0947261455</td>
                        <td>832 Hoang Dieu 2 Street</td>
                        <td>26,900,000đ</td>
                        <td></td>
                        <td><a href="#" onclick="showDetails('09', 'Tuan', '0947261455', '832 Hoang Dieu 2 Street', '', [
                                {productID: '05', price: 26900000, quantity: 1},
                                {productID: '06', price: 10000000, quantity: 3}
                            ])">Detail</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div id="details"></div>
        </div>
    </div>

    <script>
    function showDetails(orderID, customerName, phone, address, note, products) {
        const detailsDiv = document.getElementById("details");

        // Clear any previous content
        detailsDiv.innerHTML = "";

        // Calculate total price
        let totalPrice = 0;
        products.forEach(product => {
            totalPrice += product.price * product.quantity;
        });

        // Create invoice layout
        const invoiceHTML = `
                <div class="invoice">
                    <div class="header">
                        <h2>Luxury Diamond</h2>
                        <table class="info">
                            <tr>
                                <td><strong>Order ID: </strong>${orderID}</td>
                                <td><strong>Customer Name: </strong>${customerName}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone: </strong>${phone}</td>
                                <td><strong>Address: </strong>${address}</td>
                            </tr>
                            <tr>
                                <td><strong>Note: </strong>${note}</td>
                            </tr>
                        </table>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${products.map(product => `
                            <tr>
                                <td>${product.productID}</td>
                                <td>${product.price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                                <td>${product.quantity}</td>
                                <td>${(product.price * product.quantity).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                            </tr>`).join('')}
                        </tbody>
                    </table>
                    <div class="footer">
                        <p>Total: ${totalPrice.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</p>
                    </div>
                </div>
            `;

        // Append the invoice to the modal content
        detailsDiv.innerHTML = invoiceHTML;

        // Display the modal
        const modal = document.getElementById("myModal");
        modal.style.display = "block";
    }

    function closeModal() {
        const modal = document.getElementById("myModal");
        modal.style.display = "none";
    }

    function showTable(tableId) {
        const tables = document.getElementsByClassName("table-container");
        for (let i = 0; i < tables.length; i++) {
            tables[i].style.display = "none";
        }
        const tableToShow = document.getElementById(tableId);
        tableToShow.style.display = "block";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

</html>
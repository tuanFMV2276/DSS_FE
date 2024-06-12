<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu | CodingLab </title>
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaff.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaffv2.css') }}">
    <link rel="stylesheet" href="{{ asset('css_Manh/staffchat.css') }}">
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
                <a href="#" onclick="showTable('chat-with-customer')">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#" onclick="showTable('bill-management')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li class="profile">

                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div>
            <div class="main-content">

                <div id="chat-with-customer" class="table-container" >
                    <div class="container">
                        <div class="chat-container">
                            <div class="chat-header">
                                Customer Interaction
                            </div>
                            <div class="customer-list" id="customer-list">
                                <!-- Customer items will be here -->
                            </div>
                            <div class="chat-body" id="chat-body">
                                <!-- Chat messages will appear here -->
                            </div>
                            <div class="chat-footer">
                                <input type="text" class="form-control" id="chat-input" placeholder=" Type a message"
                                    style="height: 35px; border-radius: 10px; outline:none">
                                <button class="btn btn-primary" id="send-button">Send</button>
                            </div>
                        </div>
                    </div>

                    <script>
                        const customers = [{
                                id: 1,
                                name: 'John Doe',
                                icon: 'https://via.placeholder.com/50',
                                messages: [{
                                        type: 'customer',
                                        text: 'Hello, I need help with my order.'
                                    },
                                    {
                                        type: 'staff',
                                        text: 'Sure, I\'d be happy to help! Can you provide your order ID?'
                                    }
                                ]
                            },
                            {
                                id: 2,
                                name: 'Jane Smith',
                                icon: 'https://via.placeholder.com/50',
                                messages: [{
                                        type: 'customer',
                                        text: 'Hi, I have a question about my account.'
                                    },
                                    {
                                        type: 'staff',
                                        text: 'Absolutely, what would you like to know?'
                                    }
                                ]
                            },
                            // Add more customers as needed
                        ];

                        function loadCustomerList() {
                            const customerList = document.getElementById('customer-list');
                            customers.forEach(customer => {
                                const customerItem = document.createElement('div');
                                customerItem.className = 'customer-item';
                                customerItem.innerHTML =
                                    `<img src="${customer.icon}" alt="${customer.name}"><span>${customer.name}</span>`;
                                customerItem.addEventListener('click', () => loadChatMessages(customer.id));
                                customerList.appendChild(customerItem);
                            });
                        }

                        function loadChatMessages(customerId) {
                            const customer = customers.find(c => c.id === customerId);
                            const chatBody = document.getElementById('chat-body');
                            chatBody.innerHTML = ''; // Clear previous messages
                            customer.messages.forEach(msg => {
                                const messageDiv = document.createElement('div');
                                messageDiv.className = 'chat-message ' + msg.type;
                                messageDiv.innerHTML = `<div class="message">${msg.text}</div>`;
                                chatBody.appendChild(messageDiv);
                            });
                            chatBody.scrollTop = chatBody.scrollHeight;
                        }

                        document.getElementById('send-button').addEventListener('click', function() {
                            const message = document.getElementById('chat-input').value;
                            if (message) {
                                const chatBody = document.getElementById('chat-body');
                                const newMessage = document.createElement('div');
                                newMessage.className = 'chat-message staff';
                                newMessage.innerHTML = '<div class="message">' + message + '</div>';
                                chatBody.appendChild(newMessage);
                                document.getElementById('chat-input').value = '';
                                chatBody.scrollTop = chatBody.scrollHeight;
                            }
                        });

                        // Load initial customer list
                        loadCustomerList();
                    </script>
                </div>
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
                            <td><button id="myButton">Detail</button></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>02</td>
                            <td>Quan</td>
                            <td>0947392164</td>
                            <td>365 Le Van Viet Street</td>
                            <td>23,000,000đ</td>
                            <td></td>
                            <td><button id="myButton1">Detail</button></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>03</td>
                            <td>Tuan</td>
                            <td>0947261455</td>
                            <td>832 Hoang Dieu 2 Street</td>
                            <td>26,900,000đ</td>
                            <td></td>
                            <td><button id="myButton2">Detail</button></td>
                        </tr>
                    </table>
                </div>
                <!-- Popup -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Some text in the Modal..</p>
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
        // JavaScript để điều khiển popup
        document.getElementById('myButton').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'block';
        });

        document.getElementsByClassName('close')[0].addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('myModal')) {
                document.getElementById('myModal').style.display = 'none';
            }
        });
    </script>
</body>

</html>

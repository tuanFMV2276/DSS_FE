<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Home Sales staff </title>
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
            <span class="links_name"></span>
        </div>
        <ul class="nav-list">
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
                                        <form action="{{ route('salestaff.updateOrderStatus', $order['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()">
                                                <option value='0'
                                                    {{ $order['status'] == '0' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value='1'
                                                    {{ $order['status'] == '1' ? 'selected' : '' }}>Accepted
                                                </option>
                                                <option value='2'
                                                    {{ $order['status'] == '2' ? 'selected' : '' }}>Prepare Product
                                                </option>
                                                <option value='3'
                                                    {{ $order['status'] == '3' ? 'selected' : '' }}>Delivering
                                                </option>
                                                <option value='4'
                                                    {{ $order['status'] == '4' ? 'selected' : '' }}>Finished
                                                </option>
                                                <option value='5'
                                                    {{ $order['status'] == '5' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('manager.showOrderDetail', $order['id']) }}" class="btn btn-info"><button>View Details</button></a>                           
                                    </td>
                                    {{-- <td>
                                        <form action="{{ route('orders.destroy', $order['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                        </form>
                                    </td> --}}
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

        searchBtn.addEventListener("click", () => { // Sidebar open wshen you click on the search iocn
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

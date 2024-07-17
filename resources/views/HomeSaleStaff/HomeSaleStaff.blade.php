<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Sales staff</title>
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
                <a href="#" onclick="showTable('chat-with-customer')">
                    <i class="fa-solid fa-message"></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#" onclick="showTable('bill-management')" class="status-btn active" data-status="all">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li class="profile">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit"
                       >
                        <i class="fa-solid fa-arrow-right-to-bracket" id="log_out"></i>
                    </button>
                </form>
            </li>
        </ul>
    </header>

    <section class="home-section">
        <div class="main-content">
            <div id="chat-with-customer" class="table-container" style="display:contents;">
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
                            <input type="text" class="form-control" id="chat-input" placeholder="Type a message">
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
                <!-- Search Form -->
                <div id="div_search_order">
                    <form id="search-form">
                        <div class="search-bar">
                            <input type="text" id="customer_name" name="customer_name" placeholder="Customer Name">
                            <i class="fas fa-user"></i>
                            <input type="text" id="order_date" name="order_date" placeholder="Order Date">
                            <i class="fas fa-calendar-alt"></i>
                            <button type="submit">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="status-bar">
                    <button class="status-btn active" data-status="all">
                        <i class="fas fa-list icon-status"></i> All Orders
                    </button>
                    <button class="status-btn" data-status="0">
                        <i class="fas fa-clock icon-status"></i> Pending
                    </button>
                    <button class="status-btn" data-status="1">
                        <i class="fas fa-check-circle icon-status"></i> Accepted
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
                            <!-- <th>Payment Method</th> -->
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
                        0 => 'Pending',
                        1 => 'Accepted',
                        2 => 'Prepare Product',
                        3 => 'Delivering',
                        4 => 'Finished',
                        5 => 'Cancelled',
                        ];
                        @endphp
                        <tr class="order-row" data-status="{{ $order['status'] }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['order_date'] }}</td>
                            <td>{{ $order['total_price'] }}</td>
                            <!-- <td>{{ $payment ? $payment['payment_method'] : 'Unknown' }}</td> -->
                            {{-- <td style="text-align: left;">
                                    <div class="customer-info">
                                        @if ($customer)
                                            @if ($customer['gender'] == 'Male')
                                                <i class="fa-solid fa-mars icon-gender"></i>
                                            @else
                                                <i class="fa-solid fa-venus icon-gender"></i>
                                            @endif
                                        @else
                                            <i class="bx bx-user avatar icon-gender"></i>
                                        @endif
                                        <div class="customer-details">
                                            Name: {{ $customer ? $customer['name'] : 'Unknown' }}<br>
                            Email: {{ $customer ? $customer['email'] : 'Unknown' }}
            </div>
        </div>
        </td> --}}
        <td style="text-align: left;">Name: {{ $order ? $order['name'] : 'Unknown' }}<br>
            Email: {{ $order ? $order['email'] : 'Unknown' }}</td>
        <td>{{ $statusLabels[$order['status']] ?? 'Unknown' }}</td>
        <td>
            <a href="{{ route('salestaff.showOrderDetail', $order['id']) }}">
                <i class="fa-regular fa-eye icon-blue"></i>
            </a>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>

        <div class="pagination">
            <button id="prev-btn-order" onclick="prevPageOrder()" disabled>&laquo; Previous</button>
            <span id="page-num-order">1</span>
            <button id="next-btn-order" onclick="nextPageOrder()">Next &raquo;</button>
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
        <!--Start of Tawk.to Script-->
        {{-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6677a8889d7f358570d26d8f/1i11mkmli';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> --}}
        <!--End of Tawk.to Script-->
    </footer>
</body>

</html>
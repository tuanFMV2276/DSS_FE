<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css_Manh/homestaff.css') }}">
</head>

<body>
    <div class="container-content">
        <div class="row">
            <div class="sidebar col-lg-2">
                <div class="profile">
                    <img src="profile.jpg" alt="Profile Picture">
                    <h2>Ann Smith</h2>
                    <p>ann_s@mdbootstrap.com</p>
                </div>
                <ul class="menu">
                    <li><a href="#" onclick="showTable('chat-with-customer')"><i class="fa-regular fa-comment pr-3"></i>Chat with customer</a></li>
                    <li><a href="#" onclick="showTable('bill-management')"><i class="fa-solid fa-money-bill-1-wave pr-3"></i>Bill management</a></li>
                    <li><a href="/Login"><i class="fa-solid fa-right-from-bracket pr-3"></i>Log out</a></li>
                </ul>
            </div>
            <div class="main-content col-lg-10">
                <div class="header">
                    <h1>Sale Staff Dashboard</h1>
                </div>
                
                <div id="chat-with-customer" class="table-container" style="display: none;">
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
                        const customers = [
                            { id: 1, name: 'John Doe', icon: 'https://via.placeholder.com/50', messages: [
                                { type: 'customer', text: 'Hello, I need help with my order.' },
                                { type: 'staff', text: 'Sure, I\'d be happy to help! Can you provide your order ID?' }
                            ]},
                            { id: 2, name: 'Jane Smith', icon: 'https://via.placeholder.com/50', messages: [
                                { type: 'customer', text: 'Hi, I have a question about my account.' },
                                { type: 'staff', text: 'Absolutely, what would you like to know?' }
                            ]},
                            // Add more customers as needed
                        ];
                    
                        function loadCustomerList() {
                            const customerList = document.getElementById('customer-list');
                            customers.forEach(customer => {
                                const customerItem = document.createElement('div');
                                customerItem.className = 'customer-item';
                                customerItem.innerHTML = `<img src="${customer.icon}" alt="${customer.name}"><span>${customer.name}</span>`;
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
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>07</td>
                            <td>Manh</td>
                            <td>0946381264</td>
                            <td>365 Le Van Viet Street</td>
                            <td>13,000,000đ</td>
                            <td>Giao hàng trước ngày 09/6</td>
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>08</td>
                            <td>Quan</td>
                            <td>0947392164</td>
                            <td>365 Le Van Viet Street</td>
                            <td>23,000,000đ</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>09</td>
                            <td>09</td>
                            <td>Tuan</td>
                            <td>0947261455</td>
                            <td>832 Hoang Dieu 2 Street</td>
                            <td>26,900,000đ</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showTable(tableId) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');
            document.getElementById(tableId).style.display = 'block';
        }
    </script>
</body>

</html>



</body>

</html>

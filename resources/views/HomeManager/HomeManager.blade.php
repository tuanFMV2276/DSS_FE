<!DOCTYPE html>

<?php
//Data for Customer rating and Shell chart
$dataPointsCustomerMen = [['label' => 'T1', 'y' => 2.3], ['label' => 'T2', 'y' => 3.0], ['label' => 'T3', 'y' => 2.6], ['label' => 'T4', 'y' => 2.1], ['label' => 'T5', 'y' => 1.9], ['label' => 'T6', 'y' => 2.0]];
$dataPointsCustomerWoMen = [['label' => 'T1', 'y' => 3.1], ['label' => 'T2', 'y' => 3.5], ['label' => 'T3', 'y' => 3.8], ['label' => 'T4', 'y' => 4.0], ['label' => 'T5', 'y' => 3.7], ['label' => 'T6', 'y' => 3.4]];
$dataPointsPieShell = [['label' => 'Nhẫn kim cương nam', 'y' => 60], ['label' => 'Nhẫn kim cương nữ', 'y' => 40]];
?>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home manager </title>
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
                <a href="#" onclick="showTable('dashboard')">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#" onclick="showTable('bill-management')" class="status-btn active" data-status="all">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#" onclick="showTable('product-management')">
                    <i class="fa-solid fa-table-cells"></i>
                    <span class="links_name">Product Management</span>
                </a>
                <span class="tooltip">Product Management</span>
            </li>
            <li>
                <a href="#" onclick="showTable('price-list')">
                    <i class="fa-solid fa-tags"></i>
                    <span class="links_name">Price List</span>
                </a>
                <span class="tooltip">Price List</span>
            </li>
            <li>
                <a href="#" onclick="showTable('staff-management')" class="status-btn active" data-status="all">
                    <i class="fa-solid fa-users"></i>
                    <span class="links_name">Staff Management</span>
                </a>
                <span class="tooltip">Staff Management</span>
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
    </div>
    <section class="home-section">
        <div>
            <div class="main-content">
                <div id="dashboard" class="table-container" style="display:contents;">
                    <h1>Dashboard</h1>
                    <div class="dashboard-overall-wrap">
                        <!-- Product for Sale Card -->
                        <div class="dashboard-top-card-border">
                            <div class="item-align">
                                <div style="flex-grow: 1;">
                                    <p class="item-top-font">Product for Sale</p>
                                    684
                                </div>
                                <i class="fas fa-calendar fa-2x icon-top-font"></i>
                            </div>
                        </div>

                        <!-- Products left Card -->
                        <div class="dashboard-top-card-border">
                            <div class="item-align">
                                <div style="flex-grow: 1;">
                                    <p class="item-top-font">Products Left
                                    </p>
                                    1500
                                </div>
                                <i class="fas fa-dollar-sign fa-2x icon-top-font"></i>
                            </div>
                        </div>

                        <!-- Customer Card -->
                        <div class="dashboard-top-card-border">
                            <div class="item-align">
                                <div style="flex-grow: 1;">
                                    <p class="item-top-font">Total Customer
                                    </p>
                                    1,732
                                </div>
                                <i class="fas fa-users fa-2x icon-top-font"></i>
                            </div>
                        </div>

                        <!-- Total Product Sale -->
                        <div class="dashboard-top-card-border">
                            <div class="item-align">
                                <div style="flex-grow: 1;">
                                    <p class="item-top-font">Total Product Sale
                                    </p>
                                    900
                                </div>
                                <i class="fa-solid fa-money-bill-wave fa-2x icon-top-font"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Body section -->
                    <div class="dashboard-overall-wrap">

                        <!-- Chart Column -->
                        <div class="chart-wrap">
                            <h3 style="flex-wrap: wrap;">Overall Revenue
                                <button onclick="fetchAndUpdateChart('year')">Year</button>
                                <button onclick="fetchAndUpdateChart('month')">Month</button>
                                <button onclick="fetchAndUpdateChart('day')">Daily</button>
                            </h3>
                            <h2>43,000,000VND</h2>
                            <div id="chartContainer" style="height: 330px; width: 100%;"></div>
                            <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                            <div style="flex-wrap: wrap;">
                                <h2 style="text-align:center;">Extra Chart</h2>
                                <div id="chartContainer2" style="height: 300px; width: 48%;display: inline-block;">
                                </div>
                                <div id="chartContainer3" style="height: 300px; width: 48%;display: inline-block;">
                                </div>
                            </div>
                        </div>


                        <!-- Side content column -->
                        <div class="order-history-wrap">

                            <h4 style="font-size: 1.5rem;text-align:center;">Order history</h4>
                            <!-- Order history section -->
                            <div class="order-history-card">

                                <div class="item-align margin-bottom-card">
                                    <span class="card-font-style">Order A</span>
                                    <span>Customer A<img src="{{ asset('img/customer.png') }}" class="icon"
                                            alt="Sale Icon"></span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Total Price</span>
                                    <span>3,460,000VND</span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Current Status</span>
                                    <span>Pending Order</span>
                                </div>

                            </div>

                            <div class="order-history-card">

                                <div class="item-align margin-bottom-card">
                                    <span class="card-font-style">Order B</span>
                                    <span>Customer B<img src="{{ asset('img/customer.png') }}" class="icon"
                                            alt="Sale Icon"></span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Total Price</span>
                                    <span>4,280,000VND</span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Current Status</span>
                                    <span>Pending Order</span>
                                </div>

                            </div>

                            <div class="order-history-card">

                                <div class="item-align margin-bottom-card">
                                    <span class="card-font-style">Order C</span>
                                    <span>Customer C<img src="{{ asset('img/customer.png') }}" class="icon"
                                            alt="Sale Icon"></span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Total Price</span>
                                    <span>5,130,000VND</span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Current Status</span>
                                    <span>Accepted Order</span>
                                </div>

                            </div>

                            <div class="order-history-card">

                                <div class="item-align margin-bottom-card">
                                    <span class="card-font-style">Order D</span>
                                    <span>Customer D<img src="{{ asset('img/customer.png') }}" class="icon"
                                            alt="Sale Icon"></span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Total Price</span>
                                    <span>20,356,000VND</span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Current Status</span>
                                    <span>Delivering Order</span>
                                </div>

                            </div>

                            <div class="order-history-card">

                                <div class="item-align margin-bottom-card">
                                    <span class="card-font-style">Order E</span>
                                    <span>Customer E<img src="{{ asset('img/customer.png') }}" class="icon"
                                            alt="Sale Icon"></span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Total Price</span>
                                    <span>8,652,000VND</span>
                                </div>
                                <div class="item-align margin-bottom-card">
                                    <span>Current Status</span>
                                    <span>Accepted Order</span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div id="bill-management" class="table-container" style="display: none;">
                    <h1>List Orders</h1>
                    <!-- Search Form -->
                    <div id="div_search_order">
                        <form id="search-form">
                            <div class="search-bar">
                                <input type="text" id="customer_name" name="customer_name"
                                    placeholder="Customer Name">
                                <i class="fas fa-user"></i>
                                <input type="date" data-date-format="YYYY-MM-DD" id="order_date" name="order_date" placeholder="Order Date">
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

                    <table class="table" id="billing_table">
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
                                        0 => 'Pending',
                                        1 => 'Accepted',
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
                                    <td>{{ $order['total_price'] }}</td>
                                    {{-- <td>{{ $payment ? $payment['payment_method'] : 'Unknown' }}</td> --}}
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
                                        <a href="{{ route('manager.showOrderDetail', $order['id']) }}">
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
                        <input type="number" id="goto-page-input" min="1" placeholder="Page" style="width: 55px;">
                        <button id="goto-page-btn">Go</button>
                    </div>
                </div>

                <div id="product-management" class="table-container" style="display: none;">
                    <h1>List Product</h1>
                    <div class="top-bar" style="justify-content: end">

                        <a href="{{ route('manager.createProduct') }}" class="btn btn-success"><button
                                class="add-st"><i class="fas fa-plus"></i>Add New Product</button></a>
                    </div>

                    <div class="status-bar">
                        <button class="status-btn active" onclick="showTable('product-management')">
                            <i class="fas fa-box"></i> Products
                        </button>
                        <button class="status-btn" onclick="showTable('maindiamond-management')">
                            <i class="fas fa-gem"></i> Main Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('exdiamond-management')">
                            <i class="fas fa-diamond"></i> Ex Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('shell-management')">
                            <i class="fa-solid fa-ring"></i> Diamond Shells
                        </button>
                    </div>

                    <table border="1" data-status="products">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Main Diamond ID</th>
                                <th>Extra Diamond ID</th>
                                <th>Number Ex Diamond</th>
                                <th>Diamond Shell ID</th>
                                {{-- <th>Size</th> --}}
                                <th>Price Rate</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-body">
                            @foreach ($products as $index => $product)
                                <tr class="product-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $product['id'] }}</td>
                                    <td>{{ $product['product_code'] }}</td>
                                    <td>{{ $product['product_name'] }}</td>
                                    <td><img src="{{ asset('/Picture_Product/' . $product['image']) }}"
                                            alt="Product Image" width="50%"></td>
                                    <td>{{ $product['main_diamond_id'] }}</td>
                                    <td>{{ $product['extra_diamond_id'] == null ? 'None' : $product['extra_diamond_id'] }}
                                    </td>
                                    <td>{{ $product['number_ex_diamond'] == null ? 'None' : $product['number_ex_diamond'] }}
                                    </td>
                                    <td>{{ $product['diamond_shell_id'] }}</td>
                                    {{-- <td>{{ number_format($product['size'], 2) }}</td> --}}
                                    <td>{{ number_format($product['price_rate'], 2) }}</td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td>{{ $product['status'] }}</td>
                                    <td>
                                        <a href="{{ route('manager.editProduct', $product['id']) }}"
                                            style="display:inline-block;">
                                            <button type="button" class="update-st">Update</button>
                                        </a>
                                        <form action="{{ route('manager.destroyProduct', $product['id']) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="more-margintop delete-st"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn" onclick="prevPage()" disabled>&laquo; Previous</button>
                        <span id="page-num">1</span>
                        <button id="next-btn" onclick="nextPage()">Next &raquo;</button>
                    </div>
                </div>
                

                <div id="maindiamond-management" class="table-container" style="display: none;">
                    <h1>List Diamond</h1>
                    <div class="top-bar" style="justify-content: end">
                        <a href="{{ route('manager.createMainDiamond') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Diamond</button>
                        </a>
                    </div>

                    <div class="status-bar">
                        <button class="status-btn active" onclick="showTable('product-management')">
                            <i class="fas fa-box"></i> Products
                        </button>
                        <button class="status-btn" onclick="showTable('maindiamond-management')">
                            <i class="fas fa-gem"></i> Main Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('exdiamond-management')">
                            <i class="fas fa-diamond"></i> Ex Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('shell-management')">
                            <i class="fa-solid fa-ring"></i> Diamond Shells
                        </button>
                    </div>

                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Origin</th>
                                <th>Cara weight</th>
                                <th>Clarity</th>
                                <th>Color</th>
                                <th>Describe</th>
                                <th>Quantity</th>
                                <th>Cut</th>
                                <th>Polish</th>
                                <th>Symmetry</th>
                                <th>Measurements</th>
                                <th>Culet</th>
                                <th>Fluorescence</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="diamond-body">
                            @foreach ($maindiamonds as $index => $maindiamond)
                                <tr class="diamond-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $maindiamond['id'] }}</td>
                                    <td>{{ $maindiamond['shape'] }}</td>
                                    <td>{{ $maindiamond['origin'] }}</td>
                                    <td>{{ $maindiamond['cara_weight'] }}</td>
                                    <td>{{ $maindiamond['clarity'] }}</td>
                                    <td>{{ $maindiamond['color'] }}</td>
                                    <td>{{ $maindiamond['describe'] }}</td>
                                    <td>{{ $maindiamond['quantity'] }}</td>
                                    <td>{{ $maindiamond['cut'] }}</td>
                                    <td>{{ $maindiamond['polish'] }}</td>
                                    <td>{{ $maindiamond['symmetry'] }}</td>
                                    <td>{{ $maindiamond['measurements'] }}</td>
                                    <td>{{ $maindiamond['culet'] }}</td>
                                    <td>{{ $maindiamond['fluorescence'] }}</td>
                                    <td>{{ $maindiamond['status'] }}</td>
                                    <td>{{ $maindiamond['price'] }}</td>
                                    <td>
                                        <a href="{{ route('manager.editMainDiamond', $maindiamond['id']) }}"
                                            style="display:inline-block;">
                                            <button type="button" class="update-st">Update</button>
                                        </a>
                                        <form action="{{ route('manager.destroyMainDiamond', $maindiamond['id']) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="more-margintop delete-st"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-diamond" onclick="prevPageDiamond()" disabled>&laquo; Previous</button>
                        <span id="page-num-diamond">1</span>
                        <button id="next-btn-diamond" onclick="nextPageDiamond()">Next &raquo;</button>
                    </div>
                </div>

                <div id="exdiamond-management" class="table-container" style="display: none;">
                    <h1>List Extra Diamond</h1>
                    <div class="top-bar" style="justify-content: end">

                        <a href="{{ route('manager.createExDiamond') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Extra Diamond</button>
                        </a>
                    </div>

                    <div class="status-bar">
                        <button class="status-btn active" onclick="showTable('product-management')">
                            <i class="fas fa-box"></i> Products
                        </button>
                        <button class="status-btn" onclick="showTable('maindiamond-management')">
                            <i class="fas fa-gem"></i> Main Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('exdiamond-management')">
                            <i class="fas fa-diamond"></i> Ex Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('shell-management')">
                            <i class="fa-solid fa-ring"></i> Diamond Shells
                        </button>
                    </div>

                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="exdiamond-body">
                            @foreach ($exdiamonds as $index => $exdiamond)
                                <tr class="exdiamond-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $exdiamond['id'] }}</td>
                                    <td>{{ $exdiamond['name'] }}</td>
                                    <td>{{ $exdiamond['quantity'] }}</td>
                                    <td>{{ $exdiamond['price'] }}</td>
                                    <td>{{ $exdiamond['status'] }}</td>
                                    <td>
                                        <a href="{{ route('manager.editExDiamond', $exdiamond['id']) }}"
                                            style="display:inline-block;">
                                            <button type="button" class="update-st">Update</button>
                                        </a>
                                        <form action="{{ route('manager.destroyExDiamond', $exdiamond['id']) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="more-margintop delete-st"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-exdiamond" onclick="prevPageExDiamond()" disabled>&laquo;
                            Previous</button>
                        <span id="page-num-exdiamond">1</span>
                        <button id="next-btn-exdiamond" onclick="nextPageExDiamond()">Next &raquo;</button>
                    </div>
                </div>

                <div id="shell-management" class="table-container" style="display: none;">
                    <h1>List Diamond Shell</h1>
                    <div class="top-bar" style="justify-content: end">

                        <a href="{{ route('manager.createDiamondShell') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Shell</button>
                        </a>
                    </div>

                    <div class="status-bar">
                        <button class="status-btn active" onclick="showTable('product-management')">
                            <i class="fas fa-box"></i> Products
                        </button>
                        <button class="status-btn" onclick="showTable('maindiamond-management')">
                            <i class="fas fa-gem"></i> Main Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('exdiamond-management')">
                            <i class="fas fa-diamond"></i> Ex Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('shell-management')">
                            <i class="fa-solid fa-ring"></i> Diamond Shells
                        </button>
                    </div>

                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="shell-body">
                            @foreach ($shelldiamonds as $index => $shell)
                                <tr class="shell-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $shell['id'] }}</td>
                                    <td>{{ $shell['name'] }}</td>
                                    <td><img src="{{ asset('/Picture_Product/' . $shell['image']) }}"
                                            alt="Shell Image" width="20%"></td>
                                    <td>{{ $shell['price'] }}</td>
                                    <td>{{ $shell['status'] }}</td>
                                    <td>
                                        <a href="{{ route('manager.editDiamondShell', $shell['id']) }}"
                                            style="display:inline-block;">
                                            <button type="button" class="update-st">Update</button>
                                        </a>
                                        <form action="{{ route('manager.destroyDiamondShell', $shell['id']) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="more-margintop delete-st"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-shell" onclick="prevPageShell()" disabled>&laquo; Previous</button>
                        <span id="page-num-shell">1</span>
                        <button id="next-btn-shell" onclick="nextPageShell()">Next &raquo;</button>
                    </div>
                </div>

                <div id="price-list" class="table-container" style="display: none;">
                    <h1>List Price</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createPrice') }}" class="btn btn-success"><button
                                class="add-st"><i class="fas fa-plus"></i>Add New Price</button></a>
                    </div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Clarity</th>
                                <th>Color</th>
                                <th>Origin</th>
                                <th>Cut</th>
                                <th>Cara weight</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="listprice-body">
                            @foreach ($diamondpricelists as $index => $diamondpricelist)
                                <tr class="listprice-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $diamondpricelist['id'] }}</td>
                                    <td>{{ $diamondpricelist['clarity'] }}</td>
                                    <td>{{ $diamondpricelist['color'] }}</td>
                                    <td>{{ $diamondpricelist['origin'] }}</td>
                                    <td>{{ $diamondpricelist['cut'] }}</td>
                                    <td>{{ $diamondpricelist['cara_weight'] }}</td>
                                    <td>{{ number_format($diamondpricelist['price'], 0) }}</td>
                                    <td>
                                        <button class="update-btn update-st"
                                            data-id="{{ $diamondpricelist['id'] }}">Update
                                        </button>
                                        <form action="{{ route('manager.destroyPrice', $diamondpricelist['id']) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="more-margintop delete-st"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-price" onclick="prevPagePrice()" disabled>&laquo; Previous</button>
                        <span id="page-num-price">1</span> / <span id="total-pages-price"></span>
                        <button id="next-btn-price" onclick="nextPagePrice()">Next &raquo;</button>
                        <input type="number" id="page-input-price" min="1" placeholder="Page" style="width: 55px;">
                        <button id="go-to-page-price">Go</button>
                    </div>
                </div>

                <div id="staff-management" class="table-container" style="display: none;">
                    <h1>Employee List</h1>

                    <div class="status-bar more-margintop">
                        <button class="status-btn active" data-status="all">
                            <i class="fas fa-list icon-status"></i> All employees
                        </button>
                        <button class="status-btn" data-status="3">
                            <i class="fa-solid fa-user-tie icon-status"></i> Sale staffs
                        </button>
                        <button class="status-btn" data-status="4">
                            <i class="fa-solid fa-truck icon-status"></i> Delivery staffs
                        </button>
                    </div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>View detail</th>
                            </tr>
                        </thead>
                        <tbody id="employee-body">
                            @foreach ($employees as $index => $employee)
                                <tr class="status-row-emp" data-status="{{ $employee['role_id'] }}">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $employee['user_name'] }}</td>
                                    <td>{{ $employee['gender'] }}</td>
                                    <td>{{ $employee['role_id'] == 3 ? 'Sales Staff' : 'Delivery Staff' }}</td>
                                    <td>{{ $employee['status'] == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('manager.showEmployeeDetail', $employee['id']) }}">
                                            <i class="fa-regular fa-eye icon-blue"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination">
                        <button id="prev-btn-employee" onclick="prevPageEmployee()" disabled>&laquo; Previous</button>
                        <span id="page-num-employee">1</span>
                        <button id="next-btn-employee" onclick="nextPageEmployee()">Next &raquo;</button>
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
    {{-- pageBill --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusButtons = document.querySelectorAll('.status-btn');
            const orderRows = document.querySelectorAll('.status-row');
            const rowsPerPageOrder = 5;
            let currentPageOrder = 1;

            statusButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const status = btn.getAttribute('data-status');

                    // Update active button
                    statusButtons.forEach(b => b.classList.remove('active'));
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
                let end = start + rowsPerPageOrder ;

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
                if (!isNaN(pageNumber) && pageNumber > 0 && pageNumber <= totalPages()) {
                    currentPageOrder = pageNumber;
                    displayOrderRows();
                }
            });

            // Initial display
            filterOrders('all');
            displayOrderRows();
            updateTotalPages();
        });
    </script>
    {{-- pageProduct --}}
    <script>
        const rows = document.querySelectorAll('.product-row');
        const rowsPerPage = 5;
        let currentPage = 1;

        function displayRows() {
            rows.forEach((row, index) => {
                row.style.display = 'none';
                if (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) {
                    row.style.display = 'table-row';
                }
            });

            document.getElementById('page-num').textContent = currentPage;
            document.getElementById('prev-btn').disabled = currentPage === 1;
            document.getElementById('next-btn').disabled = currentPage * rowsPerPage >= rows.length;
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                displayRows();
            }
        }

        function nextPage() {
            if (currentPage * rowsPerPage < rows.length) {
                currentPage++;
                displayRows();
            }
        }

        displayRows(); // Initial display
    </script>
    
    {{-- pageDiamond --}}
    <script>
        const diamondRows = document.querySelectorAll('.diamond-row');
        const rowsPerPageDiamond = 5;
        let currentPageDiamond = 1;

        function displayDiamondRows() {
            diamondRows.forEach((row, index) => {
                row.style.display = 'none';
                if (index >= (currentPageDiamond - 1) * rowsPerPageDiamond && index < currentPageDiamond *
                    rowsPerPageDiamond) {
                    row.style.display = 'table-row';
                }
            });

            document.getElementById('page-num-diamond').textContent = currentPageDiamond;
            document.getElementById('prev-btn-diamond').disabled = currentPageDiamond === 1;
            document.getElementById('next-btn-diamond').disabled = currentPageDiamond * rowsPerPageDiamond >= diamondRows
                .length;
        }

        function prevPageDiamond() {
            if (currentPageDiamond > 1) {
                currentPageDiamond--;
                displayDiamondRows();
            }
        }

        function nextPageDiamond() {
            if (currentPageDiamond * rowsPerPageDiamond < diamondRows.length) {
                currentPageDiamond++;
                displayDiamondRows();
            }
        }

        displayDiamondRows(); // Initial display
    </script>
    {{-- pageExDiamond --}}
    <script>
        const exdiamondRows = document.querySelectorAll('.exdiamond-row');
        const rowsPerPageExDiamond = 5;
        let currentPageExDiamond = 1;

        function displayExDiamondRows() {
            exdiamondRows.forEach((row, index) => {
                row.style.display = 'none';
                if (index >= (currentPageExDiamond - 1) * rowsPerPageExDiamond && index < currentPageExDiamond *
                    rowsPerPageExDiamond) {
                    row.style.display = 'table-row';
                }
            });

            document.getElementById('page-num-exdiamond').textContent = currentPageExDiamond;
            document.getElementById('prev-btn-exdiamond').disabled = currentPageExDiamond === 1;
            document.getElementById('next-btn-exdiamond').disabled = currentPageExDiamond * rowsPerPageExDiamond >=
                exdiamondRows.length;
        }

        function prevPageExDiamond() {
            if (currentPageExDiamond > 1) {
                currentPageExDiamond--;
                displayExDiamondRows();
            }
        }

        function nextPageExDiamond() {
            if (currentPageExDiamond * rowsPerPageExDiamond < exdiamondRows.length) {
                currentPageExDiamond++;
                displayExDiamondRows();
            }
        }

        displayExDiamondRows(); // Initial display
    </script>
    {{-- pageShell --}}
    <script>
        const shellRows = document.querySelectorAll('.shell-row');
        const rowsPerPageShell = 5;
        let currentPageShell = 1;

        function displayShellRows() {
            shellRows.forEach((row, index) => {
                row.style.display = 'none';
                if (index >= (currentPageShell - 1) * rowsPerPageShell && index < currentPageShell *
                    rowsPerPageShell) {
                    row.style.display = 'table-row';
                }
            });

            document.getElementById('page-num-shell').textContent = currentPageShell;
            document.getElementById('prev-btn-shell').disabled = currentPageShell === 1;
            document.getElementById('next-btn-shell').disabled = currentPageShell * rowsPerPageShell >= shellRows.length;
        }

        function prevPageShell() {
            if (currentPageShell > 1) {
                currentPageShell--;
                displayShellRows();
            }
        }

        function nextPageShell() {
            if (currentPageShell * rowsPerPageShell < shellRows.length) {
                currentPageShell++;
                displayShellRows();
            }
        }

        displayShellRows(); // Initial display
    </script>
    {{-- page pricelist --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let priceRows = Array.from(document.querySelectorAll('.listprice-row'));
            const rowsPerPagePrice = 10;
            let currentPagePrice = 1;
            let filteredPriceRows = priceRows;
            let totalPagesPrice = Math.ceil(filteredPriceRows.length / rowsPerPagePrice);

            function displayPriceRows() {
                filteredPriceRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (index >= (currentPagePrice - 1) * rowsPerPagePrice && index < currentPagePrice *
                        rowsPerPagePrice) {
                        row.style.display = 'table-row';
                    }
                });

                document.getElementById('page-num-price').textContent = currentPagePrice;
                document.getElementById('total-pages-price').textContent = totalPagesPrice;
                document.getElementById('prev-btn-price').disabled = currentPagePrice === 1;
                document.getElementById('next-btn-price').disabled = currentPagePrice === totalPagesPrice;
            }

            function prevPagePrice() {
                if (currentPagePrice > 1) {
                    currentPagePrice--;
                    displayPriceRows();
                }
            }

            function nextPagePrice() {
                if (currentPagePrice < totalPagesPrice) {
                    currentPagePrice++;
                    displayPriceRows();
                }
            }

            function goToPagePrice() {
                const inputPage = parseInt(document.getElementById('page-input-price').value);
                if (inputPage >= 1 && inputPage <= totalPagesPrice) {
                    currentPagePrice = inputPage;
                    displayPriceRows();
                } else {
                    alert('Invalid page number');
                }
            }

            document.getElementById('prev-btn-price').addEventListener('click', prevPagePrice);
            document.getElementById('next-btn-price').addEventListener('click', nextPagePrice);
            document.getElementById('go-to-page-price').addEventListener('click', goToPagePrice);

            document.querySelectorAll('.update-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    const row = event.target.closest('tr');
                    const priceCell = row.querySelector('td:nth-child(8)');
                    const price = priceCell.textContent.trim();
                    priceCell.innerHTML =
                        `<input type="text" pattern="[0-9]*" value="${price.replace(/,/g, '')}" placeholder="${price}"> <button class="save-btn">Save</button> <button class="cancel-btn">Cancel</button>`;

                    const input = priceCell.querySelector('input');
                    input.addEventListener('input', function(event) {
                        const newValue = event.target.value.replace(/\D/g, '');
                        event.target.value = newValue.replace(/\B(?=(\d{3})+(?!\d))/g,
                            ',');
                    });

                    priceCell.querySelector('.save-btn').addEventListener('click', async () => {
                        const newPrice = priceCell.querySelector('input').value
                            .replace(/,/g, '');
                        const id = row.querySelector('td:nth-child(2)').textContent
                            .trim(); // Lấy ID từ cột ID

                        if (confirm('Are you sure you want to update the price?')) {
                            try {
                                const response = await fetch(
                                    `/pricelist/update/${id}`, {
                                        method: 'PUT',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrfToken,
                                        },
                                        body: JSON.stringify({
                                            price: newPrice
                                        }),
                                    });
                                if (response.ok) {
                                    const data = await response.json();
                                    priceCell.innerHTML = data.price.replace(
                                        /\B(?=(\d{3})+(?!\d))/g, ',');
                                } else {
                                    throw new Error('Failed to update price');
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                alert('Failed to update price.');
                                priceCell.innerHTML = price.replace(
                                    /\B(?=(\d{3})+(?!\d))/g, ',');
                            }
                        } else {
                            priceCell.innerHTML = price.replace(
                                /\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    });

                    priceCell.querySelector('.cancel-btn').addEventListener('click', () => {
                        priceCell.innerHTML = price.replace(/\B(?=(\d{3})+(?!\d))/g,
                            ',');
                    });
                });
            });

            displayPriceRows();
        });
    </script>
    {{-- pageEmployee --}}
    <script>
        const employeeRows = document.querySelectorAll('.employee-row');
        const rowsPerPageEmployee = 10;
        let currentPageEmployee = 1;

        function displayEmployeeRows() {
            employeeRows.forEach((row, index) => {
                row.style.display = 'none';
                if (index >= (currentPageEmployee - 1) * rowsPerPageEmployee && index < currentPageEmployee *
                    rowsPerPageEmployee) {
                    row.style.display = 'table-row';
                }
            });

            document.getElementById('page-num-employee').textContent = currentPageEmployee;
            document.getElementById('prev-btn-employee').disabled = currentPageEmployee === 1;
            document.getElementById('next-btn-employee').disabled = currentPageEmployee * rowsPerPageEmployee >=
                employeeRows.length;
        }

        function prevPageEmployee() {
            if (currentPageEmployee > 1) {
                currentPageEmployee--;
                displayEmployeeRows();
            }
        }

        function nextPageEmployee() {
            if (currentPageEmployee * rowsPerPageEmployee < employeeRows.length) {
                currentPageEmployee++;
                displayEmployeeRows();
            }
        }

        displayEmployeeRows(); // Initial display
    </script>
    <script>
        const statusButtons = document.querySelectorAll('.status-btn');
        const orderRows = document.querySelectorAll('.status-row-emp');

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
    {{-- search ajax --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault();

                var customerName = $('#customer_name').val();
                var orderDate = $('#order_date').val();
                $.ajax({
                    url: "{{ route('manager.searchOrdersAjax') }}",
                    method: 'GET',
                    data: {
                        customer_Name: customerName || 'null',
                        order_Date: orderDate || 'null',
                    },
                    success: function(response) {
                        var orders = response.orders;
                        var statusLabels = {
                            0: 'Pending',
                            1: 'Accepted',
                            2: 'Prepare Product',
                            3: 'Delivering',
                            4: 'Finished',
                            5: 'Cancelled'
                        };

                        var orderList = $('#billing_table tbody');
                        orderList.empty();
                        var array_orders = Array.from(orders.orders);
                        if (array_orders) {
                            array_orders.forEach(function(orders, index) {
                                var customerName = orders ? orders.name : 'Unknown';
                                var customerEmail = orders ? orders.email : 'Unknown';
                                var status = statusLabels[orders.status] || 'Unknown';
                                var orderRow = `
                                <tr class='order-row' data-status="${orders.status}">
                                    <td>${index+1}</td>
                                    <td>${orders.id}</td>
                                    <td>${orders.order_date}</td>
                                    <td>${orders.total_price}</td>
                                    
                                    <td style="text-align: left;">
                                        Name: ${customerName}<br>
                                        Email: ${customerEmail}
                                    </td>
                                    <td>${status}</td>
                                    <td>
                                        <a href="/manager_orders/${orders.id}/detail">
                                            <i class="fa-regular fa-eye icon-blue"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                                orderList.append(orderRow);
                            });
                        } else {
                            orderList.append('<tr><td colspan="8">No orders found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching orders:', error);
                        alert('An error occurred while fetching orders. Please try again.');
                    }
                });
            });
        });
    </script>
    {{-- dashboard chart --}}
    <script>
        let chart;
        //Data for custom line chart
        const dataForYear = [{
                "x": new Date(2019, 1, 6),
                "y": 5278000
            },
            {
                "x": new Date(2020, 1, 6),
                "y": 3289000
            },
            {
                "x": new Date(2021, 1, 6),
                "y": 3830000
            },
            {
                "x": new Date(2022, 1, 6),
                "y": 2560000
            },
            {
                "x": new Date(2023, 1, 6),
                "y": 4860000
            },
            {
                "x": new Date(2024, 1, 6),
                "y": 2700000
            },
            // Add more data points for the year
        ];

        const dataForMonth = [{
                "x": new Date(2020, 1, 6),
                "y": 3289000
            },
            {
                "x": new Date(2020, 2, 6),
                "y": 3830000
            },
            {
                "x": new Date(2020, 3, 6),
                "y": 5240000
            },
            {
                "x": new Date(2020, 4, 6),
                "y": 3615000
            },
            {
                "x": new Date(2020, 5, 6),
                "y": 2865000
            },
            {
                "x": new Date(2020, 6, 6),
                "y": 2454000
            },
            {
                "x": new Date(2020, 7, 6),
                "y": 1452000
            },
            {
                "x": new Date(2020, 8, 6),
                "y": 3562000
            },
            {
                "x": new Date(2020, 9, 6),
                "y": 4547000
            },
            {
                "x": new Date(2020, 10, 6),
                "y": 1475000
            },
            {
                "x": new Date(2020, 11, 6),
                "y": 2649000
            },
            {
                "x": new Date(2020, 12, 6),
                "y": 3572000
            },
            // Add more data points for the month
        ];

        const dataForDay = [{
                "x": new Date(2020, 1, 6),
                "y": 3289000
            },
            {
                "x": new Date(2020, 1, 7),
                "y": 3830000
            },
            {
                "x": new Date(2020, 1, 8),
                "y": 2009000
            },
            {
                "x": new Date(2020, 1, 9),
                "y": 2840000
            },
            {
                "x": new Date(2020, 1, 10),
                "y": 2396000
            },
            {
                "x": new Date(2020, 1, 11),
                "y": 1613000
            },
            {
                "x": new Date(2020, 1, 12),
                "y": 1821000
            },
            {
                "x": new Date(2020, 1, 13),
                "y": 2000000
            },
            {
                "x": new Date(2020, 1, 14),
                "y": 1397000
            },
            {
                "x": new Date(2020, 1, 15),
                "y": 2506000
            },
            {
                "x": new Date(2020, 1, 16),
                "y": 6704000
            },
            {
                "x": new Date(2020, 1, 17),
                "y": 5704000
            },
            {
                "x": new Date(2020, 1, 18),
                "y": 4009000
            },
            {
                "x": new Date(2020, 1, 19),
                "y": 3026000
            },
            {
                "x": new Date(2020, 1, 20),
                "y": 2394000
            },
            {
                "x": new Date(2020, 1, 21),
                "y": 1872000
            },
            {
                "x": new Date(2020, 1, 22),
                "y": 2140000
            }
        ];
        //Map data into chart
        const dataMap = {
            year: dataForYear,
            month: dataForMonth,
            day: dataForDay
        };
        //Draw line chart function
        function updateChart(criteria) {

            const dataPoints = dataMap[criteria];
            let xValueFormatString;

            switch (criteria) {
                case 'year':
                    xValueFormatString = "YYYY";
                    break;
                case 'month':
                    xValueFormatString = "MM";
                    break;
                case 'day':
                    xValueFormatString = "DD";
                    break;
            }

            const chartOptions = {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Revenue"
                },
                axisY: {
                    title: "Revenue in VND",
                    valueFormatString: "#0,,.",
                    suffix: "mn",
                    prefix: "VND"
                },
                axisX: {
                    valueFormatString: xValueFormatString
                },
                data: [{
                    type: "spline",
                    showInLegend: true,
                    name: "Overall Revenue",
                    xValueFormatString: xValueFormatString,
                    yValueFormatString: "VND#,##0.##",
                    markerType: "square",
                    color: "#F08080",
                    dataPoints: dataPoints
                }]
            };

            if (chart) {
                chart.options = chartOptions;
                chart.render();
            } else {
                chart = new CanvasJS.Chart("chartContainer", chartOptions);
                chart.render();
            }
        }

        function fetchAndUpdateChart(criteria) {
            updateChart(criteria);
        }

        // Initial load
        fetchAndUpdateChart('day'); // Default to 'day' criteria on initial load
        //Draw pie chart for ring
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                fontSize: 20,
                text: "Product Sales based on Ring Types",
            },
            subtitles: [{
                text: "Q1 2024"
            }],
            data: [{
                type: "pie",
                indexLabel: "{y}",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "#36454F",
                indexLabelFontSize: 15,
                indexLabelFontWeight: "bolder",
                showInLegend: true,
                legendText: "{label}",
                dataPoints: <?php echo json_encode($dataPointsPieShell, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();
        //Draw chart for Customer rating
        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Overall Customer Rating from T1 2024"
            },
            axisY: {
                includeZero: true
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "center",
                horizontalAlign: "right",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Men",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPointsCustomerMen, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "column",
                name: "Women",
                indexLabel: "{y}",
                yValueFormatString: "#0.##",
                showInLegend: true,
                dataPoints: <?php echo json_encode($dataPointsCustomerWoMen, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart3.render();
        //Tongle Data for Customer chart
        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart3.render();
        }
    </script>

</body>

</html>

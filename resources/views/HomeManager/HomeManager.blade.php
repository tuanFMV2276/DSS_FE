<!DOCTYPE html>

<?php
//Data for Customer rating and Shell chart
$dataPointsCustomerMen = [['label' => 'T1', 'y' => 2.3], ['label' => 'T2', 'y' => 3.0], ['label' => 'T3', 'y' => 2.6], ['label' => 'T4', 'y' => 2.1], ['label' => 'T5', 'y' => 1.9], ['label' => 'T6', 'y' => 2.0]];
$dataPointsCustomerWoMen = [['label' => 'T1', 'y' => 3.1], ['label' => 'T2', 'y' => 3.5], ['label' => 'T3', 'y' => 3.8], ['label' => 'T4', 'y' => 4.0], ['label' => 'T5', 'y' => 3.7], ['label' => 'T6', 'y' => 3.4]];
$statusLabels = [
    0 => 'Pending',
    1 => 'Accepted',
    2 => 'Prepare Product',
    3 => 'Delivering',
    4 => 'Finished',
    5 => 'Cancelled',
];
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
                                    {{ $product_for_sale }}
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
                                    {{ $available_product }}
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
                                    {{ $total_user }}
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
                                    {{ $total_sale }}
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
                            <h2 id="totalAmount"></h2>
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
                            @foreach ($recentOrders as $recent)
                                <div class="order-history-card">
                                    <div class="item-align margin-bottom-card">
                                        <span class="card-font-style">{{ $recent['order_date'] }}</span>
                                        <span>{{ $recent['name'] }}</span>
                                    </div>
                                    <div class="item-align margin-bottom-card">
                                        <span>Total Price</span>
                                        <span>{{ number_format($recent['total_price'], 0) }}</span>
                                    </div>
                                    <div class="item-align margin-bottom-card">
                                        <span>Current Status</span>
                                        <span>{{ $statusLabels[$recent['status']] }}</span>
                                    </div>
                                </div>
                            @endforeach
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
                                <input type="date" data-date-format="YYYY-MM-DD" id="order_date"
                                    name="order_date" placeholder="Order Date">
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
                                @endphp
                                <tr class="status-row" data-status="{{ $order['status'] }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order['id'] }}</td>
                                    <td>{{ $order['order_date'] }}</td>
                                    <td>{{ number_format($order['total_price'], 0) }}</td>
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
                        <input type="number" id="goto-page-input" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="goto-page-btn">Go</button>
                    </div>
                </div>

                <div id="product-management" class="table-container" style="display: none;">
                    <h1>List Product</h1>
                    <div class="top-bar" style="justify-content: end">
                        <a href="{{ route('manager.createProduct') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Product</button>
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
                        <button id="prev-btn-product" disabled>&laquo; Previous</button>
                        <span id="page-num-product">1</span> / <span id="total-pages-product">1</span>
                        <button id="next-btn-product">Next &raquo;</button>
                        <input type="number" id="goto-page-input-product" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="goto-page-btn-product">Go</button>
                    </div>
                </div>
                <!-- Main Diamond Management -->
                <div id="maindiamond-management" class="table-container" style="display: none;">
                    <h1>List Main Diamond</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createMainDiamond') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Main Diamond</button>
                        </a>
                    </div>
                    <div class="status-bar">
                        <button class="status-btn" onclick="showTable('product-management')">
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
                        <span id="page-num-diamond">1</span> / <span id="total-pages-diamond">1</span>
                        <button id="next-btn-diamond" onclick="nextPageDiamond()">Next &raquo;</button>
                        <input type="number" id="goto-page-input-diamond" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="goto-page-btn-diamond">Go</button>
                    </div>
                </div>
                <!-- Ex Diamond Management -->
                <div id="exdiamond-management" class="table-container" style="display: none;">
                    <h1>List Extra Diamond</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createExDiamond') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Extra Diamond</button>
                        </a>
                    </div>
                    <div class="status-bar">
                        <button class="status-btn" onclick="showTable('product-management')">
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
                        <span id="page-num-exdiamond">1</span> / <span id="total-pages-exdiamond">1</span>
                        <button id="next-btn-exdiamond" onclick="nextPageExDiamond()">Next &raquo;</button>
                        <input type="number" id="goto-page-input-exdiamond" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="goto-page-btn-exdiamond">Go</button>
                    </div>
                </div>

                <div id="shell-management" class="table-container" style="display: none;">
                    <h1>List Diamond Shell</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createDiamondShell') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Shell</button>
                        </a>
                    </div>

                    <div class="status-bar">
                        <button class="status-btn" onclick="showTable('product-management')">
                            <i class="fas fa-box"></i> Products
                        </button>
                        <button class="status-btn" onclick="showTable('maindiamond-management')">
                            <i class="fas fa-gem"></i> Main Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('exdiamond-management')">
                            <i class="fas fa-diamond"></i> Ex Diamonds
                        </button>
                        <button class="status-btn active" onclick="showTable('shell-management')">
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
                                <th>Material</th>
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
                                    <td>{{ number_format($shell['price'], 0) }}</td>
                                    <td>{{ $shell['material_name'] }}</td>
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
                        <span id="page-num-shell">1</span> / <span id="total-pages-shell">1</span>
                        <button id="next-btn-shell" onclick="nextPageShell()">Next &raquo;</button>
                        <input type="number" id="goto-page-input-shell" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="goto-page-btn-shell">Go</button>
                    </div>

                </div>

                <div id="price-list" class="table-container" style="display: none;">
                    <h1>List Price</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createPrice') }}" class="btn btn-success"><button
                                class="add-st"><i class="fas fa-plus"></i>Add New Price</button></a>
                    </div>
                    <div class="status-bar">
                        <button class="status-btn active" onclick="showTable('price-list')">
                            Diamonds
                        </button>
                        <button class="status-btn" onclick="showTable('material')">
                            Materials
                        </button>
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
                        <input type="number" id="page-input-price" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="go-to-page-price">Go</button>
                    </div>
                </div>

                <div id="material" class="table-container" style="display: none;">
                    <h1>List Price</h1>
                    <div class="top-bar" style="justify-content: end;">
                        <a href="{{ route('manager.createMaterial') }}" class="btn btn-success">
                            <button class="add-st"><i class="fas fa-plus"></i>Add New Material</button>
                        </a>
                    </div>
                    <div class="status-bar">
                        <button class="status-btn" onclick="showTable('price-list')">Diamonds</button>
                        <button class="status-btn active" onclick="showTable('material')">Materials</button>
                    </div>
                    <table border="1">
                        <thead>
                            <tr>
                                <th style="display: none;">#</th>
                                <th>ID</th>
                                <th>Material name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="material-body">
                            @foreach ($material as $index => $materialItem)
                                <tr class="material-row">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $materialItem['id'] }}</td>
                                    <td>{{ $materialItem['material_name'] }}</td>
                                    <td>{{ number_format($materialItem['price'], 0) }}</td>
                                    <td>{{ $materialItem['status'] }}</td>
                                    <td>
                                        <button class="update-btn update-st" data-id="{{ $materialItem['id'] }}">Update</button>
                                        <form action="{{ route('manager.destroyMaterial', $materialItem['id']) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="more-margintop delete-st" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        <button id="prev-btn-material" disabled>&laquo; Previous</button>
                        <span id="page-num-material">1</span> / <span id="total-pages-material">1</span>
                        <button id="next-btn-material">Next &raquo;</button>
                        <input type="number" id="goto-page-input-material" min="1" placeholder="Page" style="width: 55px;">
                        <button id="goto-page-btn-material">Go</button>
                    </div>
                </div>

                <div id="staff-management" class="table-container" style="display: none;">
                    <h1>List Employee</h1>

                    <div class="status-bar more-margintop">
                        <button class="status-btn active" data-status="all">
                            <i class="fas fa-list icon-status"></i> All employees
                        </button>
                        <button class="status-btn" data-status="salestaff">
                            <i class="fa-solid fa-user-tie icon-status"></i> Sale staffs
                        </button>
                        <button class="status-btn" data-status="deliverystaff">
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
                                <tr class="employee-row" data-role="{{ $employee['role'] }}">
                                    <td style="display: none;">{{ $index + 1 }}</td>
                                    <td>{{ $employee['name'] }}</td>
                                    <td>{{ $employee['gender'] }}</td>
                                    <td>{{ $employee['role'] }}</td>
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
                        <button id="prev-btn-employee" disabled>&laquo; Previous</button>
                        <span id="page-num-employee">1</span> / <span id="total-pages-employee">1</span>
                        <button id="next-btn-employee">Next &raquo;</button>
                        <input type="number" id="goto-page-input-employee" min="1" placeholder="Page"
                            style="width: 55px;">
                        <button id="go-to-page-employee">Go</button>
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
                if (isNaN(pageNumber) || pageNumber <= 0 || pageNumber > totalPages()) {
                    alert('Invalid page number.');
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

    {{-- pageProduct --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rowsPerPageProduct = 5;
            let currentPageProduct = 1;

            function displayProductRows() {
                const productRows = document.querySelectorAll('.product-row');
                let start = (currentPageProduct - 1) * rowsPerPageProduct;
                let end = start + rowsPerPageProduct;

                productRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (index >= start && index < end) {
                        row.style.display = 'table-row';
                    }
                });

                document.getElementById('page-num-product').textContent = currentPageProduct;
                document.getElementById('prev-btn-product').disabled = currentPageProduct === 1;
                document.getElementById('next-btn-product').disabled = currentPageProduct >= totalPagesProduct();
            }

            function prevPageProduct() {
                if (currentPageProduct > 1) {
                    currentPageProduct--;
                    displayProductRows();
                }
            }

            function nextPageProduct() {
                if (currentPageProduct < totalPagesProduct()) {
                    currentPageProduct++;
                    displayProductRows();
                }
            }

            function totalPagesProduct() {
                const productRows = document.querySelectorAll('.product-row');
                return Math.ceil(productRows.length / rowsPerPageProduct);
            }

            function updateTotalPagesProduct() {
                document.getElementById('total-pages-product').textContent = totalPagesProduct();
            }

            document.getElementById('prev-btn-product').addEventListener('click', prevPageProduct);
            document.getElementById('next-btn-product').addEventListener('click', nextPageProduct);

            document.getElementById('goto-page-btn-product').addEventListener('click', () => {
                const gotoPageInput = document.getElementById('goto-page-input-product').value;
                const pageNumber = parseInt(gotoPageInput, 10);
                if (isNaN(pageNumber) || pageNumber < 1 || pageNumber > totalPagesProduct()) {
                    alert('Invalid page number');
                } else {
                    currentPageProduct = pageNumber;
                    displayProductRows();
                }
            });

            // Initial display
            displayProductRows();
            updateTotalPagesProduct();
        });
    </script>
    {{-- pageDiamond --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Diamond Management
            let diamondRows = Array.from(document.querySelectorAll('.diamond-row'));
            const rowsPerPageDiamond = 5;
            let currentPageDiamond = 1;
            let filteredDiamondRows = diamondRows;
            let totalPagesDiamond = Math.ceil(filteredDiamondRows.length / rowsPerPageDiamond);

            function displayDiamondRows() {
                filteredDiamondRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (index >= (currentPageDiamond - 1) * rowsPerPageDiamond && index <
                        currentPageDiamond * rowsPerPageDiamond) {
                        row.style.display = 'table-row';
                    }
                });

                document.getElementById('page-num-diamond').textContent = currentPageDiamond;
                document.getElementById('total-pages-diamond').textContent = totalPagesDiamond;
                document.getElementById('prev-btn-diamond').disabled = currentPageDiamond === 1;
                document.getElementById('next-btn-diamond').disabled = currentPageDiamond === totalPagesDiamond;
            }

            function prevPageDiamond() {
                if (currentPageDiamond > 1) {
                    currentPageDiamond--;
                    displayDiamondRows();
                }
            }

            function nextPageDiamond() {
                if (currentPageDiamond < totalPagesDiamond) {
                    currentPageDiamond++;
                    displayDiamondRows();
                }
            }

            function goToPageDiamond() {
                const inputPage = parseInt(document.getElementById('goto-page-input-diamond').value);
                if (inputPage >= 1 && inputPage <= totalPagesDiamond) {
                    currentPageDiamond = inputPage;
                    displayDiamondRows();
                } else {
                    alert('Invalid page number');
                }
            }

            document.getElementById('prev-btn-diamond').addEventListener('click', prevPageDiamond);
            document.getElementById('next-btn-diamond').addEventListener('click', nextPageDiamond);
            document.getElementById('goto-page-btn-diamond').addEventListener('click', goToPageDiamond);

            displayDiamondRows();
        });
    </script>
    {{-- pageExDiamond --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Ex Diamond Management
            let exdiamondRows = Array.from(document.querySelectorAll('.exdiamond-row'));
            const rowsPerPageExDiamond = 5;
            let currentPageExDiamond = 1;
            let filteredExDiamondRows = exdiamondRows;
            let totalPagesExDiamond = Math.ceil(filteredExDiamondRows.length / rowsPerPageExDiamond);

            function displayExDiamondRows() {
                filteredExDiamondRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (index >= (currentPageExDiamond - 1) * rowsPerPageExDiamond && index <
                        currentPageExDiamond * rowsPerPageExDiamond) {
                        row.style.display = 'table-row';
                    }
                });

                document.getElementById('page-num-exdiamond').textContent = currentPageExDiamond;
                document.getElementById('total-pages-exdiamond').textContent = totalPagesExDiamond;
                document.getElementById('prev-btn-exdiamond').disabled = currentPageExDiamond === 1;
                document.getElementById('next-btn-exdiamond').disabled = currentPageExDiamond ===
                    totalPagesExDiamond;
            }

            function prevPageExDiamond() {
                if (currentPageExDiamond > 1) {
                    currentPageExDiamond--;
                    displayExDiamondRows();
                }
            }

            function nextPageExDiamond() {
                if (currentPageExDiamond < totalPagesExDiamond) {
                    currentPageExDiamond++;
                    displayExDiamondRows();
                }
            }

            function goToPageExDiamond() {
                const inputPage = parseInt(document.getElementById('goto-page-input-exdiamond').value);
                if (inputPage >= 1 && inputPage <= totalPagesExDiamond) {
                    currentPageExDiamond = inputPage;
                    displayExDiamondRows();
                } else {
                    alert('Invalid page number');
                }
            }

            document.getElementById('prev-btn-exdiamond').addEventListener('click', prevPageExDiamond);
            document.getElementById('next-btn-exdiamond').addEventListener('click', nextPageExDiamond);
            document.getElementById('goto-page-btn-exdiamond').addEventListener('click', goToPageExDiamond);

            displayExDiamondRows();
        });
    </script>
    {{-- pageShell --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const shellRows = Array.from(document.querySelectorAll('.shell-row'));
            const rowsPerPageShell = 5;
            let currentPageShell = 1;

            function displayShellRows() {
                const totalPages = totalPagesShell();
                let start = (currentPageShell - 1) * rowsPerPageShell;
                let end = start + rowsPerPageShell;

                shellRows.forEach((row, index) => {
                    row.style.display = (index >= start && index < end) ? 'table-row' : 'none';
                });

                document.getElementById('page-num-shell').textContent = currentPageShell;
                document.getElementById('total-pages-shell').textContent = totalPages;
                document.getElementById('prev-btn-shell').disabled = currentPageShell === 1;
                document.getElementById('next-btn-shell').disabled = currentPageShell === totalPages;
            }

            function prevPageShell() {
                if (currentPageShell > 1) {
                    currentPageShell--;
                    displayShellRows();
                }
            }

            function nextPageShell() {
                if (currentPageShell < totalPagesShell()) {
                    currentPageShell++;
                    displayShellRows();
                }
            }

            function totalPagesShell() {
                return Math.ceil(shellRows.length / rowsPerPageShell);
            }

            document.getElementById('goto-page-btn-shell').addEventListener('click', () => {
                const gotoPageInput = document.getElementById('goto-page-input-shell').value;
                const pageNumber = parseInt(gotoPageInput, 10);
                if (isNaN(pageNumber) || pageNumber < 1 || pageNumber > totalPagesShell()) {
                    alert('Invalid page number');
                } else {
                    currentPageShell = pageNumber;
                    displayShellRows();
                }
            });

            document.getElementById('prev-btn-shell').addEventListener('click', prevPageShell);
            document.getElementById('next-btn-shell').addEventListener('click', nextPageShell);

            // Initial display
            displayShellRows();
        });
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
    {{-- page material --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const rowsPerPageMaterial = 10;
            const materialRows = Array.from(document.querySelectorAll('.material-row'));
            let currentPageMaterial = 1;
    
            function displayMaterialRows() {
                const totalPages = Math.ceil(materialRows.length / rowsPerPageMaterial);
                const start = (currentPageMaterial - 1) * rowsPerPageMaterial;
                const end = start + rowsPerPageMaterial;
    
                materialRows.forEach((row, index) => {
                    row.style.display = (index >= start && index < end) ? 'table-row' : 'none';
                });
    
                document.getElementById('page-num-material').textContent = currentPageMaterial;
                document.getElementById('total-pages-material').textContent = totalPages;
                document.getElementById('prev-btn-material').disabled = currentPageMaterial === 1;
                document.getElementById('next-btn-material').disabled = currentPageMaterial === totalPages;
            }
    
            function prevPageMaterial() {
                if (currentPageMaterial > 1) {
                    currentPageMaterial--;
                    displayMaterialRows();
                }
            }
    
            function nextPageMaterial() {
                const totalPages = Math.ceil(materialRows.length / rowsPerPageMaterial);
                if (currentPageMaterial < totalPages) {
                    currentPageMaterial++;
                    displayMaterialRows();
                }
            }
    
            function goToPageMaterial() {
                const inputPage = parseInt(document.getElementById('goto-page-input-material').value, 10);
                const totalPages = Math.ceil(materialRows.length / rowsPerPageMaterial);
                if (inputPage >= 1 && inputPage <= totalPages) {
                    currentPageMaterial = inputPage;
                    displayMaterialRows();
                } else {
                    alert('Invalid page number');
                }
            }
    
            document.getElementById('prev-btn-material').addEventListener('click', prevPageMaterial);
            document.getElementById('next-btn-material').addEventListener('click', nextPageMaterial);
            document.getElementById('goto-page-btn-material').addEventListener('click', goToPageMaterial);
    
            // Initial display
            displayMaterialRows();
    
            document.querySelectorAll('.update-btn').forEach(button => {
                button.addEventListener('click', async (event) => {
                    const row = event.target.closest('tr');
                    const priceCell = row.querySelector('td:nth-child(4)');
                    const price = priceCell.textContent.trim();
    
                    // Display input for editing
                    priceCell.innerHTML = `
                        <input type="text" pattern="[0-9]*" value="${price.replace(/,/g, '')}" placeholder="${price}">
                        <button class="save-btn">Save</button>
                        <button class="cancel-btn">Cancel</button>
                    `;
    
                    const input = priceCell.querySelector('input');
    
                    // Format the input value with commas
                    input.addEventListener('input', function(event) {
                        const newValue = event.target.value.replace(/\D/g, '');
                        event.target.value = newValue.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    });
    
                    // Save button click handler
                    priceCell.querySelector('.save-btn').addEventListener('click', async () => {
                        const newPrice = priceCell.querySelector('input').value.replace(/,/g, '');
                        const id = row.querySelector('td:nth-child(2)').textContent.trim(); // Get ID from ID column
    
                        if (confirm('Are you sure you want to update the price?')) {
                            try {
                                const response = await fetch(`/material/update/${id}`, {
                                    method: 'PUT',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken, // Ensure csrfToken is defined
                                    },
                                    body: JSON.stringify({ price: newPrice }),
                                });
    
                                if (response.ok) {
                                    const data = await response.json();
                                    priceCell.innerHTML = data.price.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                } else {
                                    throw new Error('Failed to update price');
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                alert('Failed to update price.');
                                priceCell.innerHTML = price.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                            }
                        } else {
                            priceCell.innerHTML = price.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        }
                    });
    
                    // Cancel button click handler
                    priceCell.querySelector('.cancel-btn').addEventListener('click', () => {
                        priceCell.innerHTML = price.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    });
                });
            });
        });
    </script>
    {{-- pageEmployee --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rowsPerPageEmployee = 10; // Số hàng mỗi trang
            let currentPageEmployee = 1;
            const employeeRows = Array.from(document.querySelectorAll('.employee-row'));
            let filteredRows = [...employeeRows]; // Lọc nhân viên theo trạng thái
            const statusButtons = document.querySelectorAll('.status-btn');
            const totalPagesElement = document.getElementById('total-pages-employee');
            const gotoPageInput = document.getElementById('goto-page-input-employee');
            const gotoPageBtn = document.getElementById('go-to-page-employee');

            // Hiển thị hàng của nhân viên dựa trên trang hiện tại
            function displayEmployeeRows() {
                const start = (currentPageEmployee - 1) * rowsPerPageEmployee;
                const end = start + rowsPerPageEmployee;

                // Ẩn tất cả các hàng và chỉ hiển thị những hàng trong trang hiện tại
                employeeRows.forEach((row, index) => {
                    row.style.display = 'none';
                    if (filteredRows.includes(row) && index >= start && index < end) {
                        row.style.display = 'table-row';
                    }
                });

                const totalPages = Math.ceil(filteredRows.length / rowsPerPageEmployee);
                document.getElementById('page-num-employee').textContent = currentPageEmployee;
                totalPagesElement.textContent = totalPages;
                document.getElementById('prev-btn-employee').disabled = currentPageEmployee === 1;
                document.getElementById('next-btn-employee').disabled = currentPageEmployee === totalPages;
                gotoPageInput.max = totalPages; // Cập nhật giá trị tối đa của input
            }

            // Chuyển đến trang trước
            function prevPageEmployee() {
                if (currentPageEmployee > 1) {
                    currentPageEmployee--;
                    displayEmployeeRows();
                }
            }

            // Chuyển đến trang tiếp theo
            function nextPageEmployee() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPageEmployee);
                if (currentPageEmployee < totalPages) {
                    currentPageEmployee++;
                    displayEmployeeRows();
                }
            }

            // Chuyển đến trang cụ thể
            function goToPageEmployee() {
                const inputPage = parseInt(gotoPageInput.value, 10);
                const totalPages = Math.ceil(filteredRows.length / rowsPerPageEmployee);
                if (inputPage >= 1 && inputPage <= totalPages) {
                    currentPageEmployee = inputPage;
                    displayEmployeeRows();
                } else {
                    alert('Invalid page number');
                }
            }

            // Lọc nhân viên theo trạng thái
            function filterEmployees(status) {
                if (status === 'all') {
                    filteredRows = employeeRows;
                } else {
                    filteredRows = employeeRows.filter(row => row.getAttribute('data-role') === status);
                }
                currentPageEmployee = 1;
                displayEmployeeRows();
            }

            // Cập nhật trạng thái khi nhấp vào nút
            statusButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const status = btn.getAttribute('data-status');

                    // Cập nhật nút đang hoạt động
                    statusButtons.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    // Lọc và hiển thị hàng
                    filterEmployees(status);
                });
            });

            // Gán sự kiện cho các nút phân trang
            document.getElementById('prev-btn-employee').addEventListener('click', prevPageEmployee);
            document.getElementById('next-btn-employee').addEventListener('click', nextPageEmployee);
            gotoPageBtn.addEventListener('click', goToPageEmployee);

            // Hiển thị trang đầu tiên khi tải trang
            displayEmployeeRows();
        });
    </script>



    {{-- search ajax --}}
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
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

        async function fetchAndUpdateChart(criteria) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/home_manager/dashboard/${criteria}`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();

                const dataPoints = data.map(item => {
                    let x;
                    switch (criteria) {
                        case 'year':
                            x = new Date(item.x, 0); // January 1st of the year
                            break;
                        case 'month':
                            const year = new Date().getFullYear();
                            x = new Date(year, item.x - 1); // First day of the month
                            break;
                        case 'day':
                            const currentMonth = new Date().getMonth();
                            const currentYear = new Date().getFullYear();
                            x = new Date(currentYear, currentMonth, item.x);
                            break;
                    }
                    return {
                        x,
                        y: Number(item.y)
                    };
                });

                const totalAmount = dataPoints.reduce((total, point) => total + point.y, 0);

                document.getElementById('totalAmount').textContent =
                    `Total Revenue: VND ${totalAmount.toLocaleString()}`;
                console.log('Data Points:', dataPoints);
                updateChart(criteria, dataPoints);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }




        function updateChart(criteria, dataPoints) {
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
                    suffix: "m",
                    prefix: "VND"
                },
                axisX: {
                    valueFormatString: xValueFormatString
                },
                data: [{
                    type: "line",
                    showInLegend: true,
                    name: "Overall Revenue",
                    xValueFormatString: xValueFormatString,
                    yValueFormatString: "VND#,##0.##",
                    markerType: "circle",
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


        // Initial load
        fetchAndUpdateChart('day'); // Default to 'day' criteria on initial load
        //Draw pie chart for ring
        async function fetchChart2Data() {
            try {
                const response = await fetch('http://127.0.0.1:8000/home_manager/shell_sale/data');
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();

                const dataFetch = [{
                        label: 'Nhẫn kim cương Nam',
                        y: data.percent_male // Use 'y' for the value key
                    },
                    {
                        label: 'Nhẫn kim cương Nữ',
                        y: data.percent_female // Correct key 'percent_female'
                    }
                ];

                drawChart2(dataFetch);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        function drawChart2(dataForChart2) {
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
                    dataPoints: dataForChart2,
                }]
            });
            chart2.render();
        }

        fetchChart2Data();

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

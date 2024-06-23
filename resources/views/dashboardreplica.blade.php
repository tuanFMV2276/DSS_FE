<?php

$dataPointsCustomerMen = array(
	array("label"=> "T1", "y"=> 2.3),
	array("label"=> "T2", "y"=> 3.0),
	array("label"=> "T3", "y"=> 2.6),
	array("label"=> "T4", "y"=> 2.1),
	array("label"=> "T5", "y"=> 1.9),
	array("label"=> "T6", "y"=> 2.0),
);
$dataPointsCustomerWoMen = array(
	array("label"=> "T1", "y"=> 3.1),
	array("label"=> "T2", "y"=> 3.5),
	array("label"=> "T3", "y"=> 3.8),
	array("label"=> "T4", "y"=> 4.0),
	array("label"=> "T5", "y"=> 3.7),
	array("label"=> "T6", "y"=> 3.4),
);
$dataPointsPieShell = array(
	array("label"=>"Nhẫn kim cương nam", "y"=>60),
	array("label"=>"Nhẫn kim cương nữ", "y"=>40),
)

?>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Top section -->
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
                <div id="chartContainer2" style="height: 300px; width: 48%;display: inline-block;"></div>
                <div id="chartContainer3" style="height: 300px; width: 48%;display: inline-block;"></div>
            </div>
        </div>


        <!-- Side content column -->
        <div class="order-history-wrap">

            <h4 style="font-size: 1.5rem;text-align:center;">Order history</h4>
            <!-- Order history section -->
            <div class="order-history-card">

                <div class="item-align margin-bottom-card">
                    <span style="font-weight: 700;color: rgba(16, 73, 64, 0.77);">Order A</span>
                    <span>Customer A<img src="{{ asset('img/customer.png') }}" class="icon" alt="Sale Icon"></span>
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
                    <span class="card-font-style">Order A</span>
                    <span>Customer B<img src="{{ asset('img/customer.png') }}" class="icon" alt="Sale Icon"></span>
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
                    <span class="card-font-style">Order A</span>
                    <span>Customer C<img src="{{ asset('img/customer.png') }}" class="icon" alt="Sale Icon"></span>
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
                    <span class="card-font-style">Order A</span>
                    <span>Customer D<img src="{{ asset('img/customer.png') }}" class="icon" alt="Sale Icon"></span>
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
                    <span class="card-font-style">Order A</span>
                    <span>Customer E<img src="{{ asset('img/customer.png') }}" class="icon" alt="Sale Icon"></span>
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

<script>


let chart;

const dataForYear = [
    { "x": new Date(2019, 1, 6), "y": 5278000 },
    { "x": new Date(2020, 1, 6), "y": 3289000 },
    { "x": new Date(2021, 1, 6), "y": 3830000 },
    { "x": new Date(2022, 1, 6), "y": 2560000 },
    { "x": new Date(2023, 1, 6), "y": 4860000 },
    { "x": new Date(2024, 1, 6), "y": 2700000 },
    // Add more data points for the year
];

const dataForMonth = [
    { "x": new Date(2020, 1, 6), "y": 3289000 },
    { "x": new Date(2020, 2, 6), "y": 3830000 },
    { "x": new Date(2020, 3, 6), "y": 5240000 },
    { "x": new Date(2020, 4, 6), "y": 3615000 },
    { "x": new Date(2020, 5, 6), "y": 2865000 },
    { "x": new Date(2020, 6, 6), "y": 2454000 },
    { "x": new Date(2020, 7, 6), "y": 1452000 },
    { "x": new Date(2020, 8, 6), "y": 3562000 },
    { "x": new Date(2020, 9, 6), "y": 4547000 },
    { "x": new Date(2020, 10, 6), "y": 1475000 },
    { "x": new Date(2020, 11, 6), "y": 2649000 },
    { "x": new Date(2020, 12, 6), "y": 3572000 },
    // Add more data points for the month
];

const dataForDay = [
    { "x": new Date(2020, 1, 6), "y": 3289000 },
    { "x": new Date(2020, 1, 7), "y": 3830000 },
    { "x": new Date(2020, 1, 8), "y": 2009000 },
    { "x": new Date(2020, 1, 9), "y": 2840000 },
    { "x": new Date(2020, 1, 10), "y": 2396000 },
    { "x": new Date(2020, 1, 11), "y": 1613000 },
    { "x": new Date(2020, 1, 12), "y": 1821000 },
    { "x": new Date(2020, 1, 13), "y": 2000000 },
    { "x": new Date(2020, 1, 14), "y": 1397000 },
    { "x": new Date(2020, 1, 15), "y": 2506000 },
    { "x": new Date(2020, 1, 16), "y": 6704000 },
    { "x": new Date(2020, 1, 17), "y": 5704000 },
    { "x": new Date(2020, 1, 18), "y": 4009000 },
    { "x": new Date(2020, 1, 19), "y": 3026000 },
    { "x": new Date(2020, 1, 20), "y": 2394000 },
    { "x": new Date(2020, 1, 21), "y": 1872000 },
    { "x": new Date(2020, 1, 22), "y": 2140000 }
];

const dataMap = {
    year: dataForYear,
    month: dataForMonth,
    day: dataForDay
};

function updateChart(criteria) {

            const dataPoints = dataMap[criteria];
            let xValueFormatString;

            switch(criteria) {
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

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Overall Customer Rating from T1 2024"
	},
	axisY:{
		includeZero: true
	},
	legend:{
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
	},{
		type: "column",
		name: "Women",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPointsCustomerWoMen, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart3.render();
}

document.addEventListener("DOMContentLoaded", function() {
        // Order list script
        const orders = [
            {
                customer: "John Doe",
                products: ["Product 1", "Product 2", "Product 3", "Product 4"]
            },
            {
                customer: "Jane Smith",
                products: ["Product A", "Product B"]
            },
            {
                customer: "Michael Johnson",
                products: ["Item X", "Item Y", "Item Z"]
            }
        ];

        function createOrderRow(order) {
            const row = document.createElement('tr');
            const cell = document.createElement('td');

            const icon = document.createElement('span');
            icon.classList.add('icon');

            const customerName = document.createElement('span');
            customerName.textContent = order.customer;

            const orderDetails = document.createElement('span');
            orderDetails.classList.add('order-details');

            const productList = order.products.slice(0, 2).join(', ');
            const hiddenProducts = order.products.length > 2 ? '...' : '';
            orderDetails.textContent = `: ${productList} ${hiddenProducts}`;

            cell.appendChild(icon);
            cell.appendChild(customerName);
            cell.appendChild(orderDetails);
            row.appendChild(cell);

            return row;
        }

        const tbody = document.querySelector('.order-table tbody');
        orders.forEach(order => {
            const row = createOrderRow(order);
            tbody.appendChild(row);
        });
    });
</script>

</body>

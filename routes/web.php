<?php

use App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\NaturalDiamondPage;
use App\Http\Controllers\LabDiamondPage;
use App\Http\Controllers\DetailDiamond;
use App\Http\Controllers\ListShell;
use App\Http\Controllers\DetailShell;
use App\Http\Controllers\CompletedProduct;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Login;
use App\Http\Controllers\PaymentSuccessful;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Manager\EmployeeController;
use App\Http\Controllers\Manager\ProductController;
use App\Http\Controllers\Manager\OrderController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//------------------------------------------------------------------------------------------
// Route của manager '/home-manager'
Route::resource('employees', EmployeeController::class)->except(['index']);

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/create', [EmployeeController::class, 'create']);
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::put('/employees/update/{id}', [EmployeeController::class, 'updateRole'])->name('employees.update');
Route::delete('/employees/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employees.destroy');

Route::resource('products', ProductController::class)->except(['index']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::resource('orders', OrderController::class)->except(['index']);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::put('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');


Route::get('/home-manager', function () {
    $employees = Http::get('http://127.0.0.1:8000/api/employee')->json();
    $employees = collect($employees)->whereNotIn('role_id', [1, 3]);
    $products = Http::get('http://127.0.0.1:8000/api/product')->json();
    $orders = Http::get('http://127.0.0.1:8000/api/order')->json();

    return view('HomeStaff_Manh.HomeManager', compact('employees', 'products', 'orders'));
});
// End route manager
//------------------------------------------------------------------------------------------
// Route của sale staff '/home-salestaff'
Route::get('/home-salestaff', function () {
    $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
    $orders = collect($orders)->where('status', 1);

    return view('HomeStaff_Manh.HomeSaleStaff', compact ('orders'));
});
// End route của sale staff
//------------------------------------------------------------------------------------------
//route Admin
Route::resource('roles', RoleController::class);

// Các route đã được sắp xếp theo thứ tự coreflow


// Route::get('/Login', [Login::class, 'login']);

Route::get('/', [HomePage::class, 'index']);

Route::get('/NaturalDiamondPage', [NaturalDiamondPage::class, 'index']);

Route::get('/LabDiamondPage', [LabDiamondPage::class, 'index']);

// Route::get('/DetailDiamondPage/{id}', [DetailDiamond::class, 'index']);

Route::get('/NaturalDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('diamond.show');

Route::get('/LabDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('labdiamond.show');

Route::get('/ListShell', [ListShell::class, 'index']);

Route::get('/ListShell/{id}/show', [DetailShell::class, 'show'])->name('shell.show');

// Route::get('/DetailShell', [DetailShell::class, 'index']);

Route::get('/CompletedProduct', [CompletedProduct::class, 'index']);

Route::get('/Cart', [Cart::class, 'index']);

Route::get('/Payment', [Payment::class, 'index']);

Route::get('/PaymentSuccessful', [PaymentSuccessful::class, 'index']);

// Route::get('/HomeSaleStaff', [PageController::class, 'homeSaleStaff']);

// Route::get('/DeliveryStaffPage', [PageController::class, 'deliveryStaff']);

// Route::get('/DoNi', [PageController::class, 'doNi']);

// Route::get('/PriceGold', [PageController::class, 'priceGold']);

// Route::get('/PriceDiamond', [PageController::class, 'priceDiamond']);

// Route::get('/customer', [Customer::class, 'index']);

// Route::get('/author', [ViewsController::class, 'index'])->name('author.index');

// Route::get('/author/create', [ViewsController::class, 'create'])->name('author.create');

// Route::get('/author/{id}/edit', [ViewsController::class, 'edit'])->name('author.edit');

// Route::Post('/author/store', [ViewsController::class, 'store'])->name('author.store');

// Route::put('/author/{id}}', [ViewsController::class, 'update'])->name('author.update');

// Route::delete('/author/{id}}', [ViewsController::class, 'destroy'])->name('author.destroy');
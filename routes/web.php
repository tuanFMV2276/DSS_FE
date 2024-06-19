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
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\SaleStaff\SaleStaffController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\DeliveryStaff\DeliveryStaffController;
use App\Http\Controllers\OrderCustomerController;

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
    
Route::get('/home-manager', function () {
    $employees = Http::get('http://127.0.0.1:8000/api/employee')->json();
    $employees = collect($employees)->whereIn('role_id', [2, 4]);
    $products = Http::get('http://127.0.0.1:8000/api/product')->json();
    $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
    return view('HomeStaff_Manh.HomeManager', compact('employees', 'products', 'orders'));
})->name('manager.home');

Route::get('/manager_employees/{id}/detail', [ManagerController::class, 'showEmployeeDetail'])->name('manager.showEmployeeDetail');
Route::put('/manager_employees/{id}/update', [ManagerController::class, 'updateEmployee'])->name('manager.updateEmployee');
Route::put('/manager_orders/{id}/update_status', [ManagerController::class, 'updateOrderStatus'])->name('manager.updateOrderStatus');
Route::get('/manager_orders/{id}/detail', [ManagerController::class, 'showOrderDetail'])->name('manager.showOrderDetail');
Route::delete('/manager_orders/{id}/delete', [ManagerController::class, 'destroyOrder'])->name('manager.destroyOrder');
Route::get('/products/create', [ManagerController::class, 'createProduct'])->name('manager.createProduct');
Route::post('/products', [ManagerController::class, 'storeProduct'])->name('manager.storeProduct');
Route::get('/products/edit/{id}', [ManagerController::class, 'editProduct'])->name('manager.editProduct');
Route::delete('/products/delete/{id}', [ManagerController::class, 'destroyProduct'])->name('manager.destroyProduct');
Route::put('/products/update/{id}', [ManagerController::class, 'updateProduct'])->name('manager.updateProduct');



// End route manager
//------------------------------------------------------------------------------------------
// Route của sale staff '/home-salestaff'
Route::get('/home-salestaff', function () {
    $orders = Http::get('http://127.0.0.1:8000/api/order')->json();
    $orders = collect($orders)->whereIn('status', [0,1,5]);

    return view('HomeStaff_Manh.HomeSaleStaff', compact ('orders'));
})->name('salestaff.home');
Route::put('/salestaff_orders/{id}/update_status', [SaleStaffController::class, 'updateOrderStatus'])->name('salestaff.updateOrderStatus');



// End route của sale staff
//------------------------------------------------------------------------------------------
//route Delivery staff
Route::get('/delivery-staff/orders', [DeliveryStaffController::class, 'index'])->name('delivery-staff.orders');
Route::put('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'updateStatus'])->name('delivery-staff.orders.updateStatus');
Route::get('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'show'])->name('delivery-staff.orders.show');
// End route của Delivery staff
//------------------------------------------------------------------------------------------
//route Admin
// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/accounts', [AccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/admin/accounts/create', [AccountController::class, 'create'])->name('admin.accounts.create');
    Route::post('/admin/accounts', [AccountController::class, 'store'])->name('admin.accounts.store');
    Route::get('/admin/accounts/{id}/edit', [AccountController::class, 'edit'])->name('admin.accounts.edit');
    Route::put('/admin/accounts/{id}', [AccountController::class, 'update'])->name('admin.accounts.update');
    Route::delete('/admin/accounts/{id}', [AccountController::class, 'destroy'])->name('admin.accounts.destroy');
// });
// End route của Admin
//------------------------------------------------------------------------------------------
// Các route đã được sắp xếp theo thứ tự coreflow


Route::get('/', [HomePage::class, 'index']);

Route::get('/NaturalDiamondPage', [NaturalDiamondPage::class, 'index']);

Route::get('/LabDiamondPage', [LabDiamondPage::class, 'index']);

// Route::get('/DetailDiamondPage/{id}', [DetailDiamond::class, 'index']);

Route::get('/NaturalDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('diamond.show');

Route::get('/LabDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('labdiamond.show');

Route::get('/ListShell', [ListShell::class, 'index']);

Route::get('/ListShell/{id}/show', [DetailShell::class, 'show'])->name('shell.show');

// Route::get('/DetailShell', [DetailShell::class, 'index']);


// Route::get('/CompletedProduct/{id1}/{id2}/show', [CompletedProduct::class, 'show'])->name('completedproduct.show');

Route::get('/Cart', [Cart::class, 'index']) -> name('cart.index');

Route::post('/Cart/add', [Cart::class, 'add'])->name('cart.add');

Route::delete('/Cart/remove/{index}', [Cart::class, 'remove'])->name('cart.remove');

// Route::get('/Payment', [Payment::class, 'index']);
Route::get('/Payment', [Cart::class, 'payment'])->name('payment.page');

Route::post('/orders/store', [OrderCustomerController::class, 'store'])->name('orders.store');

Route::get('/PaymentSuccessful', [PaymentSuccessful::class, 'index']);
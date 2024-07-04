<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Customer\HomeController;
// use App\Http\Controllers\NaturalDiamondPage;
// use App\Http\Controllers\LabDiamondPage;
// use App\Http\Controllers\DetailDiamond;
use App\Http\Controllers\Customer\ListProductController;
use App\Http\Controllers\Customer\DetailProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Customer\OrderController;

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
    
Route::get('/home-manager', [ManagerController::class, 'homeManager'])->name('manager.home');

Route::get('/manager_employees/{id}/detail', [ManagerController::class, 'showEmployeeDetail'])->name('manager.showEmployeeDetail');
Route::put('/manager_employees/{id}/update', [ManagerController::class, 'updateEmployee'])->name('manager.updateEmployee');
Route::put('/manager_orders/{id}/update_status', [ManagerController::class, 'updateOrderStatus'])->name('manager.updateOrderStatus');
Route::get('/manager_orders/{id}/detail', [ManagerController::class, 'showOrderDetail'])->name('manager.showOrderDetail');
Route::delete('/manager_orders/{id}/delete', [ManagerController::class, 'destroyOrder'])->name('manager.destroyOrder');
Route::get('/manager_orders/search', [ManagerController::class, 'searchOrdersAjax'])->name('manager.searchOrdersAjax');
Route::get('/products/create', [ManagerController::class, 'createProduct'])->name('manager.createProduct');
Route::post('/products', [ManagerController::class, 'storeProduct'])->name('manager.storeProduct');
Route::get('/products/edit/{id}', [ManagerController::class, 'editProduct'])->name('manager.editProduct');
Route::delete('/products/delete/{id}', [ManagerController::class, 'destroyProduct'])->name('manager.destroyProduct');
Route::put('/products/update/{id}', [ManagerController::class, 'updateProduct'])->name('manager.updateProduct');
Route::get('/home-manager/search', [ManagerController::class, 'searchOrdersAjax'])->name('manager.searchOrdersAjax');

// End route manager
//------------------------------------------------------------------------------------------
// Route của sale staff '/home-salestaff'
Route::get('/home-salestaff', [SaleStaffController::class, 'homeSalestaff'])->name('salestaff.home');
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


Route::get('/Login', [Login::class, 'login']);

// Trang Login
Route::get('/Login', function () {
    return view('Login_Register_ForgotPass/Login/Login');
});


// Trang HomePage
Route::get('/', [HomeController::class, 'index']);

// Route::get('/NaturalDiamondPage', [NaturalDiamondPage::class, 'index']);

// Route::get('/LabDiamondPage', [LabDiamondPage::class, 'index']);

// Route::get('/NaturalDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('diamond.show');

// Route::get('/LabDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('labdiamond.show');

// Trang danh sách sản phẩm
Route::get('/ListProduct', [ListProductController::class, 'index']);

Route::get('/filter-products', [ListProductController::class, 'filterProducts']);

// Trang chi tiết sản phẩm
Route::get('/Product/{id}', [DetailProductController::class, 'show'])->name('product.show');

// Trang giỏ hàng
Route::get('/Cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/Cart/add', [CartController::class, 'add'])->name('cart.add');

Route::delete('/Cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove');

// Trang thanh toán
Route::get('/Payment', [CartController::class, 'payment'])->name('payment.page');

// Lưu trữ order
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');

// Trang thanh toán thành công
Route::get('/PaymentSuccessful', [PaymentSuccessful::class, 'index']);

Route::get('/IntroduceDiamondGIA', function () {
    return view('Information.IntroduceDiamondGIA.IntroduceDiamondGIA');
});

Route::get('/DoNi', function () {
    return view('Information.DoNi.DoNi');
});

Route::get('/PriceDiamond', function () {
    return view('Information.PriceDiamond.PriceDiamond');
});

Route::get('/PriceGold', function () {
    return view('Information.PriceGold.PriceGold');
});

Route::get('/Huong-dan-doi-tra', function () {
    return view('Information.Service.Warranty-recall');
});

Route::get('/Chinh-sach-bao-mat', function () {
    return view('Information.Service.ChinhSachBaoMat');
});

Route::get('/Lien-he', function () {
    return view('Information.Service.Contact');
});

Route::get('/Chinh-sach-mua-hang', function () {
    return view('Information.Service.ChinhSachMuaHang');
});
<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Auth\WebAuthController;
use App\Http\Controllers\Customer\CartController;
// use App\Http\Controllers\NaturalDiamondPage;
// use App\Http\Controllers\LabDiamondPage;
// use App\Http\Controllers\DetailDiamond;
use App\Http\Controllers\Customer\DetailProductController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ListProductController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PurchaseOrderController;
use App\Http\Controllers\DeliveryStaff\DeliveryStaffController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\SaleStaff\SaleStaffController;
use Illuminate\Support\Facades\Route;

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
Route::put('/pricelist/update/{id}', [ManagerController::class, 'updatePricelist'])->name('manager.updatePricelist');
Route::get('/pricelist/create', [ManagerController::class, 'createPrice'])->name('manager.createPrice');
Route::post('/pricelist', [ManagerController::class, 'storePrice'])->name('manager.storePrice');
Route::delete('/pricelist/delete/{id}', [ManagerController::class, 'destroyPrice'])->name('manager.destroyPrice');

// End route manager
//------------------------------------------------------------------------------------------
// Route của sale staff '/home-salestaff'
// Route::get('/home-salestaff', [SaleStaffController::class, 'homeSalestaff'])->name('salestaff.home');
// Route::put('/salestaff_orders/{id}/update_status', [SaleStaffController::class, 'updateOrderStatus'])->name('salestaff.updateOrderStatus');
// Route::get('/salestaff/{id}/detail', [SaleStaffController::class, 'showOrderDetail'])->name('salestaff.showOrderDetail');

// End route của sale staff
//------------------------------------------------------------------------------------------
//route Delivery staff
Route::get('/home-deliverystaff', [DeliveryStaffController::class, 'index'])->name('delivery-staff.orders');
Route::put('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'updateStatus'])->name('delivery-staff.orders.updateStatus');
Route::get('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'show'])->name('delivery-staff.orders.show');
// End route của Delivery staff
//------------------------------------------------------------------------------------------
//route Admin
// Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/home-admin', [AccountController::class, 'index'])->name('admin.accounts.index');
Route::get('/admin/accounts/create', [AccountController::class, 'create'])->name('admin.accounts.create');
Route::post('/admin/accounts', [AccountController::class, 'store'])->name('admin.accounts.store');
Route::get('/admin/accounts/{id}/edit', [AccountController::class, 'edit'])->name('admin.accounts.edit');
Route::put('/admin/accounts/{id}', [AccountController::class, 'update'])->name('admin.accounts.update');
Route::delete('/admin/accounts/{id}', [AccountController::class, 'destroy'])->name('admin.accounts.destroy');
Route::get('/admin_employees/{id}/detail', [AccountController::class, 'showEmployeeDetail'])->name('admin.showEmployeeDetail');
Route::put('/admin_employees/{id}/update', [AccountController::class, 'updateEmployee'])->name('admin.updateEmployee');
Route::get('/admin_employees/add_new_employee', [AccountController::class, 'addNewEmployee'])->name('admin.addNewEmployee');
Route::post('/admin_employees/store_new_employee', [AccountController::class, 'storeNewEmployee'])->name('admin.storeNewEmployee');
Route::delete('/admin_employees/{id}/delete', [AccountController::class, 'destroyEmployee'])->name('admin.destroyEmployee');
Route::get('/admin_customers/{id}/detail', [AccountController::class, 'showCustomerDetail'])->name('admin.showCustomerDetail');
Route::put('/admin_customers/{id}/update', [AccountController::class, 'updateCustomer'])->name('admin.updateCustomer');
Route::delete('/admin_customers/{id}/delete', [AccountController::class, 'destroyCustomer'])->name('admin.destroyCustomer');

// });
// End route của Admin
//------------------------------------------------------------------------------------------
// Các route đã được sắp xếp theo thứ tự coreflow

// Route::get('/Login', [Login::class, 'login']);

// // Trang Login
// Route::get('/Login', function () {
//     return view('Login_Register_ForgotPass/Login/Login');
// });

// Trang HomePage
Route::get('/', [HomeController::class, 'index'])->name("homePage");

// Route::get('/NaturalDiamondPage', [NaturalDiamondPage::class, 'index']);

// Route::get('/LabDiamondPage', [LabDiamondPage::class, 'index']);

// Route::get('/NaturalDiamondPage/{id}/show', [DetailDiamond::class, 'show'])->name('diamond.show');

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

Route::get('/Giay-chung-nhan', function () {
    return view('Information.Service.GiayChungNhan');
});

Route::get('/Gioi-thieu', function () {
    return view('Information.Service.GioiThieu');
});

Route::get('/Bao-quan-trang-suc', function () {
    return view('Information.Service.BaoQuanTrangSuc');
});

// //==================================================Auth=======================================================

Route::get('register', [WebAuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [WebAuthController::class, 'register']);
Route::get('login', [WebAuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [WebAuthController::class, 'login']);
Route::post('logout', [WebAuthController::class, 'logout'])->name('logout');

// Các route yêu cầu đăng nhập
// Routes requiring authentication
Route::middleware('auth.token')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name("homePage");
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

    //Trang xem đơn hàng customer
    Route::get('/Purchase', [PurchaseOrderController::class, 'index'])->name('customer.orders');
});

Route::middleware(['auth.token', 'role:manager'])->group(function () {
    // Thêm các route khác cho manager ở đây
    // Route::get('/', [HomeController::class, 'index'])->name("homePage");
    //Trang Home của Manager
    Route::get('/home-manager', [ManagerController::class, 'homeManager'])->name('manager.home');

    //Trang thông tin cho Employee
    Route::get('/manager_employees/{id}/detail', [ManagerController::class, 'showEmployeeDetail'])->name('manager.showEmployeeDetail');

    Route::put('/manager_employees/{id}/update', [ManagerController::class, 'updateEmployee'])->name('manager.updateEmployee');

    //CRUD cho order
    //Trang update cho đơn hàng
    Route::put('/manager_orders/{id}/update_status', [ManagerController::class, 'updateOrderStatus'])->name('manager.updateOrderStatus');

    //Trang xem thông tin đơn hàng
    Route::get('/manager_orders/{id}/detail', [ManagerController::class, 'showOrderDetail'])->name('manager.showOrderDetail');

    //Trang xoá đơn hàng
    Route::delete('/manager_orders/{id}/delete', [ManagerController::class, 'destroyOrder'])->name('manager.destroyOrder');

    //Chức năng tìm kiếm cho đơn hàng
    Route::get('/manager_orders/search', [ManagerController::class, 'searchOrdersAjax'])->name('manager.searchOrdersAjax');

    //CRUD cho sản phẩm
    //Trang thêm sản phẩm mới
    Route::get('/products/create', [ManagerController::class, 'createProduct'])->name('manager.createProduct');

    //Lưu xuống database
    Route::post('/products', [ManagerController::class, 'storeProduct'])->name('manager.storeProduct');

    //Trang chỉnh sửa
    Route::get('/products/edit/{id}', [ManagerController::class, 'editProduct'])->name('manager.editProduct');

    //Lưu xuống database
    Route::put('/products/update/{id}', [ManagerController::class, 'updateProduct'])->name('manager.updateProduct');

    //Ẩn sản phẩm
    Route::put('/products/delete/{id}', [ManagerController::class, 'destroyProduct'])->name('manager.destroyProduct');
    
    //Chức năng tìm kiếm cho đơn hàng
    Route::get('/home-manager/search', [ManagerController::class, 'searchOrdersAjax'])->name('manager.searchOrdersAjax');

    //CRUD cho bảng giá
    //
    Route::put('/pricelist/update/{id}', [ManagerController::class, 'updatePricelist'])->name('manager.updatePricelist');

    //Trang tạo bảng giá
    Route::get('/pricelist/create', [ManagerController::class, 'createPrice'])->name('manager.createPrice');

    //Lưu xuống database
    Route::post('/pricelist', [ManagerController::class, 'storePrice'])->name('manager.storePrice');

    //Trang xoá bảng giá
    Route::delete('/pricelist/delete/{id}', [ManagerController::class, 'destroyPrice'])->name('manager.destroyPrice');

    //CRUD cho viên kim cương chính
    //Trang tạo viên kim cương
    Route::get('/maindiamond/create', [ManagerController::class, 'createMainDiamond'])->name('manager.createMainDiamond');

    //Lưu xuống database
    Route::post('/maindiamond/store', [ManagerController::class, 'storeMainDiamond'])->name('manager.storeMainDiamond');

    //Trang chính sửa
    Route::get('/maindiamond/edit/{id}', [ManagerController::class, 'editMainDiamond'])->name('manager.editMainDiamond');

    //Lưu xuống database
    Route::put('/maindiamond/update/{id}', [ManagerController::class, 'updateMainDiamond'])->name('manager.updateMainDiamond');

    //Đổi status thành 0
    Route::delete('/maindiamond/delete/{id}', [ManagerController::class, 'deleteMainDiamond'])->name('manager.destroyMainDiamond');

    //CRUD cho kim cương phụ
    //Trang tạo kim cương phụ
    Route::get('/exdiamond/create', [ManagerController::class, 'createExDiamond'])->name('manager.createExDiamond');

    //Lưu xuống database
    Route::post('/exdiamond/store', [ManagerController::class, 'storeExDiamond'])->name('manager.storeExDiamond');

    //Trang chỉnh sửa
    Route::get('/exdiamond/edit/{id}', [ManagerController::class, 'editExDiamond'])->name('manager.editExDiamond');

    //Lưu xuống database
    Route::put('/exdiamond/update/{id}', [ManagerController::class, 'updateExDiamond'])->name('manager.updateExDiamond');

    //Đổi status thành 0
    Route::delete('/exdiamond/delete/{id}', [ManagerController::class, 'deleteExDiamond'])->name('manager.destroyExDiamond');

    //CRUD cho vỏ kim cương
    //Trang tạo vỏ kim cương
    Route::get('/diamondshell/create', [ManagerController::class, 'createDiamondShell'])->name('manager.createDiamondShell');

    //Lưu xuống database
    Route::post('/diamondshell/store', [ManagerController::class, 'storeDiamondShell'])->name('manager.storeDiamondShell');

    //Trang chỉnh sửa
    Route::get('/diamondshell/edit/{id}', [ManagerController::class, 'editDiamondShell'])->name('manager.editDiamondShell');

    //Lưu xuống database
    Route::put('/diamondshell/update/{id}', [ManagerController::class, 'updateDiamondShell'])->name('manager.updateDiamondShell');

    //Đổi status thành 0
    Route::delete('/diamondshell/delete/{id}', [ManagerController::class, 'deleteDiamondShell'])->name('manager.destroyDiamondShell');

    //CRUD cho nguyên liệu vỏ kim cương
    //Trang thêm nguyên liệu
    Route::get('/material/create', [ManagerController::class, 'createMaterial'])->name('manager.createMaterial');
    
    //Lưu xuống database
    Route::post('/material/store', [ManagerController::class, 'storeMaterial'])->name('manager.storeMaterial');

    //Trang chỉnh sửa
    Route::get('/material/edit/{id}', [ManagerController::class, 'editMaterial'])->name('manager.editMaterial');

    //Lưu xuống database
    Route::put('/material/update/{id}', [ManagerController::class, 'updateMaterial'])->name('manager.updateMaterial');

    //Đổi status thành 0
    Route::delete('/material/delete/{id}', [ManagerController::class, 'deleteMaterial'])->name('manager.destroyMaterial');
});

Route::middleware(['auth.token', 'role:salestaff'])->group(function () {
    // Thêm các route khác cho manager ở đây
    // Route::get('/', [HomeController::class, 'index'])->name("homePage");
    Route::get('/home-salestaff', [SaleStaffController::class, 'homeSalestaff'])->name('salestaff.home');
    Route::put('/salestaff_orders/{id}/update_status', [SaleStaffController::class, 'updateOrderStatus'])->name('salestaff.updateOrderStatus');
    Route::get('/salestaff/{id}/detail', [SaleStaffController::class, 'showOrderDetail'])->name('salestaff.showOrderDetail');
});

Route::middleware(['auth.token', 'role:deliverystaff'])->group(function () {
    Route::get('/home-deliverystaff', [DeliveryStaffController::class, 'index'])->name('delivery-staff.orders');
    Route::put('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'updateStatus'])->name('delivery-staff.orders.updateStatus');
    Route::get('/delivery-staff/orders/{id}', [DeliveryStaffController::class, 'show'])->name('delivery-staff.orders.show');
});

Route::middleware(['auth.token', 'role:admin'])->group(function () {
    // Thêm các route khác cho manager ở đây
    // Route::get('/', [HomeController::class, 'index'])->name("homePage");
    Route::get('/home-admin', [AccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/admin/accounts/create', [AccountController::class, 'create'])->name('admin.accounts.create');
    Route::post('/admin/accounts', [AccountController::class, 'store'])->name('admin.accounts.store');
    Route::get('/admin/accounts/{id}/edit', [AccountController::class, 'edit'])->name('admin.accounts.edit');
    Route::put('/admin/accounts/{id}', [AccountController::class, 'update'])->name('admin.accounts.update');
    Route::delete('/admin/accounts/{id}', [AccountController::class, 'destroy'])->name('admin.accounts.destroy');
    Route::get('/admin_employees/{id}/detail', [AccountController::class, 'showEmployeeDetail'])->name('admin.showEmployeeDetail');
    Route::put('/admin_employees/{id}/update', [AccountController::class, 'updateEmployee'])->name('admin.updateEmployee');
    Route::get('/admin_employees/add_new_employee', [AccountController::class, 'addNewEmployee'])->name('admin.addNewEmployee');
    Route::post('/admin_employees/store_new_employee', [AccountController::class, 'storeNewEmployee'])->name('admin.storeNewEmployee');
    Route::delete('/admin_employees/{id}/delete', [AccountController::class, 'destroyEmployee'])->name('admin.destroyEmployee');
    Route::get('/admin_customers/{id}/detail', [AccountController::class, 'showCustomerDetail'])->name('admin.showCustomerDetail');
    Route::put('/admin_customers/{id}/update', [AccountController::class, 'updateCustomer'])->name('admin.updateCustomer');
    Route::delete('/admin_customers/{id}/delete', [AccountController::class, 'destroyCustomer'])->name('admin.destroyCustomer');
});
<?php

use App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\NaturalDiamondPage;
// use App\Http\Controllers\LabDiamondPage;
// use App\Http\Controllers\DetailDiamond;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Login;
use App\Http\Controllers\PaymentSuccessful;
use App\Http\Controllers\OrderController;

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
// Trang Login
Route::get('/Login', [Login::class, 'login']);

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
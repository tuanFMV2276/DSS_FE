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
use App\Http\Controllers\ProductController;


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
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/employees/destroy/{id}', [EmployeeController::class, 'destroy']);
Route::resource('products', 'ProductController');
// Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products', [ProductController::class, 'index']);

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
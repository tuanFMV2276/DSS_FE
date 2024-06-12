<?php

use App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
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
// Các route đã được sắp xếp theo thứ tự coreflow



//(optional)
Route::get('/Login', function () {
    return view('Login_Hoa/Login');
});



//từ trang này sẽ qua được  2 trang NaturalDiamondPage,LabDiamondPage
Route::get('/', function () {
    return view('HomePage_Hoa/HomePage');
});

//từ trang này sẽ qua được DetailDiamondPage
Route::get('/NaturalDiamondPage', function () {
    return view('NaturalDiamondPage_Hoa/NaturalDiamondPage');
});

//từ trang này sẽ qua được DetailDiamondPage
Route::get('/LabDiamondPage', function () {
    return view('LabDiamondPage_Hoa/LabDiamondPage');
});

// Route::get('/', function () {
//     return view('HomePage_Hoa/HomePage');
// });

// Route::get('/Login', function () {
//     return view('Login_Hoa/Login');
// });

// Route::get('/Register', function () {
//     return view('Register_Hoa/Register');
// });


// Route::get('/NaturalDiamondPage', function () {
//     return view('NaturalDiamondPage_Hoa/NaturalDiamondPage');
// });

// Route::get('/LabDiamondPage', function () {
//     return view('LabDiamondPage_Hoa/LabDiamondPage');
// });


//từ trang này sẽ qua được 2 trang cartpage,ListShell
Route::get('/DetailDiamondPage', function () {
    return view('DetailDiamond_Hoa/DetailDiamondPage');
});

//từ trang này sẽ qua được DetailShell
Route::get('/ListShell', function(){
    return view('Quan_ListShell/ListShell');
});

//từ trang này sẽ qua được CompletedProduct
Route::get('/DetailShell', function () {
    return view('DetailShell_Manh/DetailShell');
});

//từ trang này sẽ qua được cartpage
Route::get('/CompletedProduct', function () {
    return view('CompletedProduct_Hoa/CompletedProduct');
});

//từ trang này sẽ qua được payment
Route::get('/Cart', function () {
    return view('Cart_Hoa/CartPage');
});

//từ trang này sẽ qua này PaymentSuccessful
Route::get('/Payment', function () {
    return view('Payment_Hoa/Payment');
});



// //các trang này để coi giỏ hàng và tiến hành thanh toán
// Route::get('/cartpage', [PaymentController::class, 'CartPage'])->name('CartPage');
// Route::get('/cartpage/payment1', [PaymentController::class, 'Payment1'])->name('Payment1');
// Route::get('/cartpage/payment2', [PaymentController::class, 'Payment2'])->name('Payment2');
// Route::get('/cartpage/payment3', [PaymentController::class, 'Payment3'])->name('Payment3');

Route::get('/PaymentSuccessful', function () {
    return view('PaymentSuccessful_Hoa/PaymentSuccessful');
});
// route của sale staff
Route::get('/HomeSaleStaff', function () {
    return view('HomeSaleStaff_Manh/HomeSaleStaff');
});
// route của delivery staff
Route::get('/DeliveryStaffPage', function () {
    return view('DeliveryStaffPage_Hoa/DeliveryStaffPage');
});

//route phụ của customer
Route::get('/DoNi', function () {
    return view('DoNi_Manh/DoNi');
});
Route::get('/PriceGold', function () {
    return view('PriceGold_Manh/PriceGold');
});
Route::get('/PriceDiamond', function () {
    return view('PriceDiamond_Manh/PriceDiamond');
});

 Route::get('/customer', [Customer::class, 'index']);

// Route::get('/author', [ViewsController::class, 'index'])->name('author.index');

// Route::get('/author/create', [ViewsController::class, 'create'])->name('author.create');

// Route::get('/author/{id}/edit', [ViewsController::class, 'edit'])->name('author.edit');

// Route::Post('/author/store', [ViewsController::class, 'store'])->name('author.store');

// Route::put('/author/{id}}', [ViewsController::class, 'update'])->name('author.update');

// Route::delete('/author/{id}}', [ViewsController::class, 'destroy'])->name('author.destroy');

// Route::get('/CompletedProduct', function () {
//     return view('CompletedProduct_Hoa/CompletedProduct');
// });

// Route::get('/', function () {
//     return view('DeliveryStaffPage_Hoa/DeliveryStaffPage');
// });

// Route::get('/PaymentSuccessful', function () {
//     return view('PaymentSuccessful_Hoa/PaymentSuccessful');
// });

// Route::get('/IntroduceDiamondGIA', function () {
//     return view('IntroduceDiamondGIA_Hoa/IntroduceDiamondGIA');
// });


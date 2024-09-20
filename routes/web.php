<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserpageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripePaymentController;

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
Auth::routes();

Route::get('/', [UserpageController::class, 'userpage'])->name('homepage');



Route::middleware(['admin'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::view('/catagory', 'admin.addcategory')->name('displayform');
    Route::post('/addcatagory', [NewuserController::class, 'addcatagory'])->name('add.catagory');
    Route::get('/newcatagory', [NewuserController::class, 'index'])->name('view.catagory');
    Route::get('/newcatagory/{id}', [NewuserController::class, 'getCatagory'])->name('catagory');
    Route::get('/updatecatagory/{id}', [NewuserController::class, 'fetchData'])->name('fetchdata.catagory');
    Route::post('/update/{id}', [NewuserController::class, 'updateCatagory'])->name('update.catagory');
    Route::get('/delete/{id}', [NewuserController::class, 'deleteCatagory'])->name('catagory_delete');

});

Route::get('/product', [ProductController::class, 'productform'])->name('productform')->middleware('admin');
Route::post('/addproduct', [ProductController::class, 'addproduct'])->name('add.product')->middleware('admin');
Route::get('/newproduct', [ProductController::class, 'index'])->name('view.product')->middleware('admin');
Route::get('/newproduct/{id}', [ProductController::class, 'getProduct'])->name('product')->middleware('admin');
Route::get('/updateproduct/{id}', [ProductController::class, 'fetchData'])->name('fetchdata.product')->middleware('admin');
Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('update.product')->middleware('admin');
Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product')->middleware('admin');

Route::middleware('login')->group(function () {
    Route::get('/order', [UserpageController::class, 'order_placed'])->name('view.order');
    Route::get('/deliver/{id}', [UserpageController::class, 'deliver'])->name('delivered');
    Route::get('/homeuser', [HomeController::class, 'index']);
    Route::get('/productdetails/{id}', [UserpageController::class, 'productDetails'])->name('product.details');
    Route::post('/addcart/{id}', [UserpageController::class, 'add_cart'])->name('cart');
    Route::get('/showcart', [UserpageController::class, 'show_cart'])->name('show.cart');
    Route::get('/removecart/{id}', [UserpageController::class, 'remove_cart'])->name('remove.cart');
    Route::get('/cashorder', [UserpageController::class, 'cash_order'])->name('cash.order');
    Route::get('/search', [UserpageController::class, 'searchdata'])->name('search');
    Route::get('/dashboard', [UserpageController::class, 'dashboard'])->name('dashboard');
    Route::get('/showorder', [UserpageController::class, 'show_order'])->name('showorder');
    Route::get('/cancelorder/{id}', [UserpageController::class, 'cancel_order'])->name('cancel.order');
    Route::get('/myorder', [UserpageController::class, 'my_order'])->name('myorder');
    Route::get('/print_pdf/{id}', [UserpageController::class, 'print_pdf'])->name('print.pdf');

});
Route::get('/product_search', [UserpageController::class, 'product_search'])->name('product_search');


Route::middleware('login')->group(function () {
    Route::controller(StripePaymentController::class)->group(function () {

        Route::get('/stripe/{Total_Price}', 'stripe')->name('stripe');
        Route::post('stripe/{Total_Price}', 'stripePost')->name('stripe.post');

    });

});

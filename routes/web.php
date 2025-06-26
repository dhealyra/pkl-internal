<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// DASAR
// DASAR
// ROUTE
// Route::get('/', function () {
//     return view('layouts.frontend');
// });

// // route basic
// Route::get('about', function(){
//     return 'ini Halaman about';
// });

// Route::get('profile', function() {
//     return view('dasar.profile');
// });

// // route Parameter -> tanda : {}
// Route::get('produk/{namaproduk}', function($a) {
//     return 'Saya Membeli <b>'.$a.'</b>';
// });

// Route::get('beli/{barang}/{jumlah}', function($a,$b) {
//     return view('dasar.beli', compact('a', 'b'));
// });

// // route opsional parameter
// Route::get('kategori/{namakategori?}', function($nama = null) {
//     if ($nama) {
//         return 'Anda memilih kategori : '.$nama;
//     } else {
//         return 'Anda belum memilih kategori';
//     }
// });

// // END 
// // DASAR
// // INI

// // LATIHAN OPSIONAL PARAM
// Route::get('promo/{barang?}/{kode?}', function($a=null, $b=null ) {
//     return view('dasar.promo', compact('a', 'b'));    
// });

// // route SISWA
// Route::get('siswa', [MyController::class, 'index']);
// Route::get('siswa/create', [MyController::class, 'create']);
// Route::post('/siswa', [MyController::class, 'store']);
// Route::get('siswa/{id}', [MyController::class, 'show']);
// Route::get('siswa/{id}/edit',[MyController::class, 'edit']);
// Route::put('siswa/{id}', [MyController::class, 'update']);
// Route::delete('siswa/{id}', [MyController::class, 'destroy']);

// Route Guest/tamu
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about', [FrontendController::class, 'about']);

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// orders
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// review
Route::post('/product/{product}/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');

Auth::routes();
// Route::get('/product', [FrontendController::class, 'product']);
// Route::get('/cart', [FrontendController::class, 'cart']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE UNTUK ADMIN
// ATAU BACKEND
Route::group(['prefix'=>'admin', 'as'=> 'backend.', 'middleware'=>['auth', Admin::class]], function() {
    Route::get('/', [BackendController::class, 'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', BackendOrderController::class);
    Route::put('orders/{id}/status', [BackendOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
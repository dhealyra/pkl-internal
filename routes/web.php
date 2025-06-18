<?php

use Illuminate\Support\Facades\Route;


// DASAR
// DASAR
// ROUTE
Route::get('/', function () {
    return view('welcome');
});

// route basic
Route::get('about', function(){
    return 'ini Halaman about';
});

Route::get('profile', function() {
    return view('profile');
});

// route Parameter -> tanda : {}
Route::get('produk/{namaproduk}', function($a) {
    return 'Saya Membeli <b>'.$a.'</b>';
});

Route::get('beli/{barang}/{jumlah}', function($a,$b) {
    return view('beli', compact('a', 'b'));
});

// route opsional parameter
Route::get('kategori/{namakategori?}', function($nama = null) {
    if ($nama) {
        return 'Anda memilih kategori : '.$nama;
    } else {
        return 'Anda belum memilih kategori';
    }
});

// END 
// DASAR
// INI

// LATIHAN OPSIONAL PARAM
Route::get('promo/{barang?}/{kode?}', function($a=null, $b=null ) {
    return view('promo', compact('a', 'b'));
});
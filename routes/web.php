<?php

use App\Http\Controllers\contact_controller;
use App\Http\Controllers\Products;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shop_controller;
use App\Http\Controllers\welcome_controller;
use App\Http\Middleware\Admin_check;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ===== NAV
Route::get('/', [welcome_controller::class, 'index']);
Route::get('/shop', [shop_controller::class, 'index']);
Route::view('/about', 'about');
Route::get('/contact', [Contact_controller::class, 'index']);


Route::middleware(['auth', Admin_check::class])->prefix('admin')->group(function() {

    // ===== PRODUCT
    Route::view('/add-product', 'add_product');

    Route::controller(Products::class)->prefix('/product')->name('product.')->group(function () {
        Route::get('/all', 'all_products')->name('all');
        Route::get('/edit/{product}', 'edit_product')->name('edit');
        Route::get('/delete/{product}', 'delete_product')->name('delete');
        Route::post('/save', 'save_product')->name('save');
        Route::post('/update/{product}', 'update_product')->name('update');
    });

    // ===== CONTACT
    Route::controller(Contact_controller::class)->prefix('/contact')->name('contact.')->group(function () {
        Route::get('/all', 'all_contacts')->name('all');
        Route::get('/edit/{contact}', 'edit_contact')->name('edit');
        Route::get('/delete/{contact}', 'delete_contact')->name('delete');
        Route::post('/save', 'save_contact')->name('save');
        Route::post('/update/{contact}', 'update_contact')->name('update');
    });
});


require __DIR__.'/auth.php';

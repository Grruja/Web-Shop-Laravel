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
    
    Route::controller(Products::class)->group(function () {
        Route::post('/save-product', 'save_product')->name('save_product');

        Route::get('/all-products', 'all_products')->name('all_products');

        Route::get('/edit-product/{product}', 'edit_product')->name('edit_product');
        Route::post('/update-product/{product}', 'update_product')->name('update_product');

        Route::get('/delete-product/{product}', 'delete_product')->name('delete_product');
    });

    // ===== CONTACT
    Route::controller(Contact_controller::class)->group(function () {
        Route::post('/save-contact', 'save_contact')->name('save_contact');

        Route::get('/all-contacts', 'all_contacts')->name('all_contacts');

        Route::get('/edit-contact/{contact}', 'edit_contact')->name('edit_contact');
        Route::post('/update-contact/{contact}', 'update_contact')->name('update_contact');

        Route::get('/delete-contact/{contact}', 'delete_contact')->name('delete_contact');
    });
});


require __DIR__.'/auth.php';

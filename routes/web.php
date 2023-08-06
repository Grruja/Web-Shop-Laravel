<?php

use App\Http\Controllers\contact_controller;
use App\Http\Controllers\Products;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\shop_controller;
use App\Http\Controllers\welcome_controller;
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

Route::get('/', [welcome_controller::class, 'index']);


Route::get('/shop', [shop_controller::class, 'index']);


Route::view('/about', 'about');


Route::get('/contact', [contact_controller::class, 'index']);


Route::middleware(['auth', \App\Http\Middleware\Admin_check::class])->prefix('admin')->group(function() {
    Route::get('/all-products', [Products::class, 'all_products'])
        ->name('all_products');

    Route::get('/delete-product/{product}', [Products::class, 'delete_product'])
        ->name('delete_product');

    Route::get('/edit-product/{product}', [Products::class, 'edit_product'])
        ->name('edit_product');

    Route::post('/update-product/{product}', [Products::class, 'update_product'])
        ->name('update_product');


    Route::view('/add-product', 'add_product');

    Route::post('/save-product', [Products::class, 'save_product'])
        ->name('save_product');


    Route::post('/send-contact', [contact_controller::class, 'send_contact']);


    Route::get('/all-contacts', [contact_controller::class, 'get_all_contacts']);

    Route::get('/delete-contact/{contact}', [contact_controller::class, 'delete_contact'])
        ->name('delete_contact');
});


require __DIR__.'/auth.php';

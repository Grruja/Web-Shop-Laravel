<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\welcome_controller::class, 'index']);

Route::get('/shop', [\App\Http\Controllers\shop_controller::class, 'index']);

Route::get('/admin/all-products', [\App\Http\Controllers\Products::class, 'all_products'])
    ->name('all_products');
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\Products::class, 'delete_product'])
    ->name('delete_product');
Route::get('/admin/edit-product/{product}', [\App\Http\Controllers\Products::class, 'edit_product'])
    ->name('edit_product');
Route::post('/admin/update-product/{product}', [\App\Http\Controllers\Products::class, 'update_product'])
    ->name('update_product');
Route::view('/admin/add-product', 'add_product');
Route::post('/save-product', [\App\Http\Controllers\Products::class, 'save_product'])
    ->name('save_product');

Route::view('/about', 'about');

Route::get('/contact', [\App\Http\Controllers\contact_controller::class, 'index']);
Route::post('/send-contact', [\App\Http\Controllers\contact_controller::class, 'send_contact']);
Route::get('/admin/all-contacts', [\App\Http\Controllers\contact_controller::class, 'get_all_contacts']);
Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\contact_controller::class, 'delete_contact'])
    ->name('delete_contact');

require __DIR__.'/auth.php';

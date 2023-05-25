<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\config\ConfigurationController;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\UserProfileController\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Checkout\CheckoutController;

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

Route::get('/', function () {
    return view('index');
});
Route::resource('/register', RegisteredUserController::class);
Route::resource('/', IndexController::class);
Route::resource('/cart', CartController::class);
Route::get('/cart/add-product/{id}',[CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'pay'])->name('checkout.pay');
Route::delete('cart/remove-product/{nombre}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::middleware('auth')->group(function () {
    Route::resource('/profile', UserProfileController::class);
    Route::get('/configuration/create', [ConfigurationController::class, 'create'])->name('configuration.create');
    Route::get('/configuration/changePass', [ConfigurationController::class, 'changePass'])->name('configuration.changePass');
    Route::get('/configuration/changeEmail', [ConfigurationController::class, 'changeEmail'])->name('configuration.changeEmail');
    Route::post('/configuration/storePass', [ConfigurationController::class, 'storePass'])->name('configuration.storePass');
    Route::post('/configuration/storeEmail', [ConfigurationController::class, 'storeEmail'])->name('configuration.storeEmail');
});
Route::resource('/product',ProductController::class);
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('/admin', AdminController::class);
});

require __DIR__.'/auth.php';

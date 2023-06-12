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
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Discount\DiscountController;
use App\Http\Controllers\Especifications\EspecificationsController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\User\UserController;

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
Route::get('/cart',  [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add-product/{id}',[CartController::class, 'addToCart'])->name('cart.addToCart');
Route::middleware(['auth', 'cartHasProducts'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'pay'])->name('checkout.pay');
});
Route::delete('cart/remove-product/{nombre}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart/destroyAll', [CartController::class, 'destroyAll'])->name('cart.destroyAll');
Route::get('/order',[OrderController::class,'index'])->name('order.index');
Route::middleware('auth')->group(function () {
    Route::resource('/user',UserController::class);
    Route::resource('/profile', UserProfileController::class);
    Route::get('/configuration/create', [ConfigurationController::class, 'create'])->name('configuration.create');
    Route::get('/configuration/changePass', [ConfigurationController::class, 'changePass'])->name('configuration.changePass');
    Route::get('/configuration/changeEmail', [ConfigurationController::class, 'changeEmail'])->name('configuration.changeEmail');
    Route::post('/configuration/storePass', [ConfigurationController::class, 'storePass'])->name('configuration.storePass');
    Route::post('/configuration/storeEmail', [ConfigurationController::class, 'storeEmail'])->name('configuration.storeEmail');
    Route::resource('/comment',CommentController::class);
    Route::get('/purchase-confirmation', function () {
        return view('emails.purchase_confirmation');
    })->name('purchase.confirmation');
});
Route::resource('/product',ProductController::class);
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('/admin', AdminController::class);
    Route::post('/admin/restock/{product}',[ProductController::class,'restockRequest'])->name('product.restockRequest');
    Route::get('/admin/restock-rejected/{product}',[ProductController::class,'restockRejected'])->name('product.restockRejected');
    Route::get('/admin/restock-accepted/{product}/{cantidad}',[ProductController::class,'restock'])->name('product.restock');
    Route::resource('/seller',SellerController::class);
    Route::resource('/especificacion',EspecificationsController::class);
    Route::resource('/discount',DiscountController::class);

});

require __DIR__.'/auth.php';

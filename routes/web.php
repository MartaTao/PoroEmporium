<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController\UserProfileController;
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

Route::get('/', function () {
    return view('index');
});
Route::resource('/register', RegisteredUserController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/profile', UserProfileController::class);
    Route::get('/configuration/create', [ConfigurationController::class, 'create'])->name('configuration.create');
    Route::get('/configuration/changePass', [ConfigurationController::class, 'changePass'])->name('configuration.changePass');
    Route::get('/configuration/changeEmail', [ConfigurationController::class, 'changeEmail'])->name('configuration.changeEmail');
    Route::post('/configuration/storePass', [ConfigurationController::class, 'storePass'])->name('configuration.storePass');
    Route::post('/configuration/storeEmail', [ConfigurationController::class, 'storeEmail'])->name('configuration.storeEmail');
});
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::resource('/admin', AdminController::class);
});

require __DIR__.'/auth.php';

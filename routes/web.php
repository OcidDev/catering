<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardMerchantController;






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

Route::redirect('/', '/login');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();


Route::prefix('user')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboarduser.index');
    });
    Route::resource('dashboarduser', DashboardUserController::class);
    Route::resource('cart', CartController::class);
    Route::resource('checkout', CheckoutController::class);


    Route::resource('profile', UserProfileController::class);
});

Route::prefix('merchant')->group(function (){
    Route::get('/', function () {
        return redirect()->route('dashboardmerchant.index');
    });
    Route::resource('dashboardmerchant', DashboardMerchantController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('menu', MenusController::class);
    Route::resource('order', OrderController::class);
});

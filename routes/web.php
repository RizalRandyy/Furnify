<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductCustomerController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('customer')->name('customer.')->group(function (){
    Route::resource('products', ProductCustomerController::class);

    Route::get('/category/{category}', [DashboardController::class, 'show'])->name('category.show');
});

Route::prefix('superAdmin')->name('superAdmin.')->group(function (){
    Route::resource('products', ProductAdminController::class)->middleware('role:superAdmin|admin');
    Route::resource('orders', OrderController::class)->middleware('role:superAdmin|admin');
    Route::resource('users', UserController::class)->middleware('role:superAdmin');
    Route::resource('categories', CategoryController::class)->middleware('role:superAdmin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('favorite', FavoriteController::class);
    Route::resource('shoppingCart', ShoppingCartController::class);
    Route::resource('checkout', CheckoutController::class);
});

// AJAXXX
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::put('/shoppingCartDashboardAdd', [ShoppingCartController::class, 'dashboardStore'])->name('dashboard.shoppingCartAdd');

require __DIR__ . '/auth.php';

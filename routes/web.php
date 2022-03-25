<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('', 'index')->name('home');
    Route::get('shop-grid', 'shop_grid')->name('shop_grid');
    Route::get('shop-details/{id}', 'shop_details')->name('shop_details');
    Route::post('shop-details/{id}', 'store')->name('shop_details.store');
    Route::get('shoping-cart', 'shoping_cart')->name('shoping_cart');
    Route::get('checkout', 'checkout')->name('checkout');
    Route::get('blog-details', 'blog_details')->name('blog_details');
    Route::get('blog', 'blog')->name('blog');
    Route::get('contact', 'contact')->name('contact');
    Route::get('profile', 'profile')->name('profile');
});

Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\AdminRight'], function () {
    Route::get('', [AdminController::class, 'index'])->name('admin');
    Route::get('file', [AdminController::class, 'file'])->name('admin.file');
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'orders' => OrderController::class,
        'blogs' => BlogController::class,
        'orderdetail' => OrderDetailController::class,
        'banner' => BannerController::class,
        'accounts' => AccountController::class,
    ]);
    Route::get('accountsearch', [AccountController::class, 'search'])->name('accounts.search');
});

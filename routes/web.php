<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
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

Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('shop-grid', [App\Http\Controllers\HomeController::class, 'shop_grid'])->name('shop_grid');
Route::get('shop-details', [App\Http\Controllers\HomeController::class, 'shop_details'])->name('shop_details');
Route::get('shoping-cart', [App\Http\Controllers\HomeController::class, 'shoping_cart'])->name('shoping_cart');
Route::get('checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::get('blog-details', [App\Http\Controllers\HomeController::class, 'blog_details'])->name('blog_details');
Route::get('blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'admin'], function () {
    Route::get('', [AdminController::class, 'index'])->name('admin');
    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'orders' => OrderController::class,
        'blogs' => BlogController::class,
        'orderdetail' => OrderDetailController::class,
        'banner' => BannerController::class,
        'accounts' => AccountController::class,
    ]);
});

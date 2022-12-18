<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admins',AdminController::class);
Route::resource('admin_orders',AdminOrderController::class);
Route::resource('carts',CartController::class);
Route::resource('details',DetailsController::class);
Route::resource('orders.items', ItemsController::class);
Route::resource('orders',OrderController::class);
Route::resource('products',ProductController::class);
Route::resource('users', UserController::class);




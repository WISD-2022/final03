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
use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

#首頁
Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
#登出
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');
#修改會員資料
Route::get('/user/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
#更新會員資料
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
#產品詳細資訊
Route::get('/product/detail/{id}',[\App\Http\Controllers\ProductController::class,'show'])->name('product.detail');

Route::resource('admins',AdminController::class);
Route::resource('admin_orders',AdminOrderController::class);
Route::resource('carts',CartController::class);
Route::resource('details',DetailsController::class);
Route::resource('orders.items', ItemsController::class);
Route::resource('orders',OrderController::class);
Route::resource('products',ProductController::class);
Route::resource('users', UserController::class);
Route::resource('home',HomeController::class);


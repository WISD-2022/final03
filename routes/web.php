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
use App\Http\Controllers\AdminDashboardController;
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
#產品頁面
Route::get('/product/index',[\App\Http\Controllers\ProductController::class,'index'])->name('product.index');
#產品詳細資訊
Route::get('/product/index/detail/{id}',[\App\Http\Controllers\ProductController::class,'show'])->name('product.detail');
#商品加入購物車
Route::post('/cart/store',[\App\Http\Controllers\CartController::class,'store'])->name('cart.store');
#購物車頁面
Route::get('/cart/index',[\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
#從購物車刪除商品
Route::delete('/cart/destroy/{id}',[\App\Http\Controllers\CartController::class,'destroy'])->name('cart.destroy');
#前往結帳頁面
Route::get('/cart/finish',[\App\Http\Controllers\CartController::class,'finish'])->name('cart.finish');
#完成訂單
Route::get('/cart/clear',[\App\Http\Controllers\CartController::class,'clear'])->name('cart.clear');
#訂單頁面
Route::get('/order/history',[\App\Http\Controllers\OrderController::class,'index'])->name('order.history');
#單筆訂單詳細頁面
Route::get('/order/detail/{id}',[\App\Http\Controllers\OrderController::class,'show'])->name('order.detail');

#登出
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');
#修改會員資料
Route::get('/user/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
#更新會員資料
Route::patch('/user/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');




#後台管理
Route::group(['prefix' => 'admin'], function() {
    #首頁
    Route::get('/',[AdminDashboardController::class,'index'])->name('admin.dashboard.index');
    #商品列表
    Route::get('products',[AdminController::class,'index'])->name('admin.products.index');
    #增加商品
    Route::get('products/create',[AdminController::class,'create'])->name('admin.products.create');
    #儲存新商品資訊
    Route::post('products/store',[AdminController::class,'store'])->name('admin.products.store');
    #編輯商品資訊
    Route::get('products/{id}/edit',[AdminController::class,'edit'])->name('admin.products.edit');
    Route::patch('products/{product}',[AdminController::class,'update'])->name('admin.products.update');
    #刪除商品
    Route::delete('products/{product}',[AdminController::class,'destroy'])->name('admin.products.destroy');
    #訂單列表
    Route::get('orders',[AdminOrderController::class,'index'])->name('admin.orders.index');
    #編輯訂單狀態
    Route::get('orders/{id}/edit',[AdminOrderController::class,'edit'])->name('admin.orders.edit');
    Route::patch('orders/{order}',[AdminOrderController::class,'update'])->name('admin.orders.update');
    #刪除訂單
    Route::delete('orders/{order}',[AdminOrderController::class,'destroy'])->name('admin.orders.destroy');
});

Route::resource('admins',AdminController::class);
Route::resource('admin_orders',AdminOrderController::class);
Route::resource('carts',CartController::class);
Route::resource('details',DetailsController::class);
Route::resource('orders.items', ItemsController::class);
Route::resource('orders',OrderController::class);
Route::resource('products',ProductController::class);
Route::resource('users', UserController::class);
Route::resource('home',HomeController::class);


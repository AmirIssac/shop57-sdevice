<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth','admin']] , function(){
    Route::get('/new-item',[App\Http\Controllers\ItemController::class, 'add'])->name('add.item');
    Route::get('/view-items',[App\Http\Controllers\ItemController::class, 'viewItems'])->name('view.items');
    Route::get('/edit/item/{item_id}',[App\Http\Controllers\ItemController::class, 'edit'])->name('edit.item');
    Route::post('/store-item',[App\Http\Controllers\ItemController::class, 'store'])->name('store.item');
    Route::post('/update/item/{item_id}',[App\Http\Controllers\ItemController::class, 'update'])->name('update.item');
    Route::get('/view-orders',[App\Http\Controllers\OrderController::class, 'view'])->name('view.orders');
    Route::get('/view-order/{order_id}',[App\Http\Controllers\OrderController::class, 'showOrder'])->name('view.order');
    Route::get('/print-invoice/{order_id}',[App\Http\Controllers\OrderController::class, 'print'])->name('print.invoice');
});
Route::group(['middleware'=>['auth']] , function(){
    Route::get('/', [App\Http\Controllers\Controller::class, 'home']);
    Route::post('/submit-order',[App\Http\Controllers\OrderController::class, 'submit'])->name('submit.order');
});

Route::get('/check/new/orders/',[App\Http\Controllers\OrderController::class, 'checkNewOrders'])->name('check.new.orders');

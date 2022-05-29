<?php

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

Route::get('/', [App\Http\Controllers\Controller::class, 'home']);

Route::get('/new-item',[App\Http\Controllers\ItemController::class, 'add'])->name('add.item');
Route::post('/store-item',[App\Http\Controllers\ItemController::class, 'store'])->name('store.item');

Route::post('/submit-order',[App\Http\Controllers\OrderController::class, 'submit'])->name('submit.order');


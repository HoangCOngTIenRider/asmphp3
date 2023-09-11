<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\KhoahocController;
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

Route::get('/',[ KhoahocController::class,'listHome'])->name('home');
Route::middleware(['auth','check.role'])->group(function(){
Route::get('/category/list',[App\Http\Controllers\CategoryController::class,'list'])->name('route_category_list');
Route::match(['POST','GET'],'/category/add',[App\Http\Controllers\CategoryController::class,'add'])
->name('route_category_add');
Route::match(['POST','GET'],'/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])
->name('route_category_edit');
Route::get('/category/delete/{id}',[App\Http\Controllers\CategoryController::class,'delete'])
->name('route_category_delete');
//user
Route::match(['POST','GET'],'/user/list',[App\Http\Controllers\UserController::class,'list'])
->name('route_user_list');
Route::match(['POST','GET'],'/user/edit/{id}',[App\Http\Controllers\UserController::class,'edit'])
->name('route_user_edit');
//khoa_hoc
Route::match(['POST','GET'],'/khoa_hoc/add',[App\Http\Controllers\KhoahocController::class,'add'])
->name('route_khoa_hoc_add');
Route::get('/khoa_hoc/list',[App\Http\Controllers\KhoahocController::class,'list'])->name('route_khoa_hoc_list');
Route::match(['POST','GET'],'/khoa_hoc/edit/{id}',[App\Http\Controllers\KhoahocController::class,'edit'])
->name('route_khoa_hoc_edit');
Route::get('/khoa_hoc/delete/{id}',[App\Http\Controllers\KhoahocController::class,'delete'])
->name('route_khoa_hoc_delete');
});
//client
Route::get('/HomeClient',[ ClientController::class,'homeclient'])->name('home_client');
Route::get('/cart/{id}',[ ClientController::class,'addToCart'])->name('add_to_cart');
//login 
Route::match(['GET','POST'],'/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::match(['GET','POST'],'/sign_up',[App\Http\Controllers\Auth\LoginController::class,'sign_up'])->name('sign_up');

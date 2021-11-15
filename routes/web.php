<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin/', 'middleware' => ['role:admin']], function(){
    Route::get('dashboard' , [AdminController::class, 'dashboard'])->name('adminDash');
});

Route::group(['prefix' => 'user/', 'middleware' => ['role:manger|user|viewer']], function(){
    Route::get('dashboard' , [UserController::class, 'dashboard'])->name('userDash');

});

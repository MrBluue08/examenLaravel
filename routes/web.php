<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/registerForm', [UserController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/user/login/{error?}',[UserController::class,'login'])->name('login');

Route::post('/auth',[UserController::class,'auth'])->name('auth');

Route::group(['middleware' => 'user'], function(){
    Route::get('/user/main',[UserController::class,'main'])->name('main');    
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});


<?php

use App\Http\Controllers\CasalController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
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

Route::get('/user/login/{error?}',[UserController::class,'login'])->name('login');

Route::post('/auth',[UserController::class,'auth'])->name('auth');

Route::group(['middleware' => 'user'], function(){
    Route::get('/user/main',[CasalController::class,'listCasals'])->name('main');    
    Route::get('/user/casalForm/{casalId}',[CasalController::class,'casalForm'])->name('edit.casal.form');    
    Route::post('/user/updateCasal', [CasalController::class, 'updateCasal'])->name('updateCasal');
    Route::get('/user/deleteCasal/{casalId}',[CasalController::class,'deleteCasal'])->name('deleteCasal'); 
    Route::get('/user/addCasal', [CasalController::class, 'addCasalForm'])->name('add.casal.form'); 
    Route::post('/user/addCasal', [CasalController::class, 'addCasal'])->name('add.casal');  
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});


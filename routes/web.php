<?php

use App\Http\Controllers\RegisterController as ControllersRegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/',[ControllersRegisterController::class,'index']);
Route::post('register',[ControllersRegisterController::class,'storeUser'])->name('storeUser');

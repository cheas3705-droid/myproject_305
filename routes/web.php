<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.login');
})->name('login.lihat');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('layouts.app');
    })->name('dashboard');
});
Route::get('/register', [UserController::class, 'registerLihat'])->name('register.lihat');
Route::post('/register/submit',[UserController::class, 'registerSubmit'])->name('register.submit');
Route::get('/login',[UserController::class, 'loginLihat'])->name('login.lihat');
Route::post('/login/submit',[UserController::class, 'loginSubmit'])->name('login.submit');
Route::post('/logout',[UserController::class, 'logout'])->name('logout');


// Route::get("/category",[CategoryController::class],"index");
// Route::get("/category/create",[CategoryController::class],"create");
// Route::get("/category",[CategoryController::class],"store");
Route::resource("category",CategoryController::class);

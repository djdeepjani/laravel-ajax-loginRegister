<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\GoogleController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/register',[LoginController::class,'register'])->name('register');

Route::post('/register-submit',[LoginController::class,'store'])->name('register.store');
Route::post('/login/attempt',[LoginController::class,'attemptLogin'])->name('login.attemptlogin');

Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('/home',[HomeController::class,'index'])->name('dashboard');
});

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('auth/google',[GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);
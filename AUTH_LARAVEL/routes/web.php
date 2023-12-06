<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
// main home page
Route::get('/', [UserController::class,"index"])->name("home");
// user/home signup routes
Route::get('/Signup', [UserController::class,"create"])->name("home.signup");
Route::post('/Signup', [UserController::class,"USerRegister"])->name("home.signup.register");
// user/home loginroutes
Route::get('/login', [UserController::class,"LOGIN"])->name("home.login");
Route::post('/login', [UserController::class,"loginCheck"])->name("home.login.post");

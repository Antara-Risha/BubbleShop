<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Customer\AvailableItemController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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


Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('register', [RegisterController::class, 'index'])->name('registerForm');
Route::post('register', [RegisterController::class, 'register'])->name('register');



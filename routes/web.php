<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {//
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// Route::get('/signup', function () {
//     return view('signup');
// })->name('signup');
// Route::post('signup',[authcontroller::class,'index'])->name('authcontroller.signup');
// Route::post('check',[authcontroller::class,'check'])->name('authcontroller.check');

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('register', [RegisterController::class, 'index'])->name('registerForm');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');





// Route::get('/customerDashboard', function () {
//     return view('customerDashboard');
// });

// Route::get('/adminDashboard', function () {
//     return view('test');
// });

Route::get('/items', function () {
    return view('items');
});
Route::post('/items',[ItemsController::class,'addItems']);

// Route::resource('users', PhotoController::class);


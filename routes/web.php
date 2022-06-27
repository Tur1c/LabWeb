<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminOfficeController;

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
    return view('home');
})->name('home_page');

Route::get("/login", [UserController::class, "index_login"])->name("login_page");
Route::post("/login", [UserController::class, "login"])->name("login");

Route::get("/register", [UserController::class, "index_register"])->name("register_page");
Route::post("/register", [UserController::class, "register"])->name("register");

Route::get('/logout', [UserController::class, "logout"])->name("logout");

Route::get('/search', [PropertyController::class, "search"])->name("search");

Route::get('/about-us', [OfficeController::class, "index"])->name("about_us");

Route::get('/buy', [PropertyController::class, "buy"])->name("buy");

Route::get('/rent', [PropertyController::class, "rent"])->name("rent");

Route::resource('/company', AdminOfficeController::class)->middleware("admin");

Route::resource('/real-estate', PropertyController::class)->middleware("admin");

Route::post('/add-cart', [CartController::class, "add"])->name('cart_store');

Route::resource('/cart', CartController::class);

Route::get('/cart-finish/{id}', [CartController::class, "finish"])->name('finish', 'id');

Route::get('/checkout', [CartController::class, "checkout"])->name('checkout');


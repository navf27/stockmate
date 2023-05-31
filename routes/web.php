<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

// Auth router
Route::get('/register', [AuthController::class, 'registerView'])->name('auth.register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::get('/login', [AuthController::class, 'loginView'])->name('auth.login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// User router
Route::get('/users', [UserController::class, 'index'])->middleware('admin');
Route::post('/users/store', [UserController::class, 'store'])->middleware('auth');
Route::post('/users/{id}/upd', [UserController::class, 'update'])->middleware('auth');
Route::get('/users/{id}/del', [UserController::class, 'destroy'])->middleware('auth');

// Profile router
Route::get('/users/{id}/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::put('/users/{id}/profile/upd', [ProfileController::class, 'updating'])->middleware('auth')->name('profile.update');

// Category router
Route::get('/categories', [CategoryController::class, 'index'])->middleware('auth')->name('category.index');
Route::post('/categories/store', [CategoryController::class, 'store'])->middleware('auth');
Route::post('/categories/{id}/upd', [CategoryController::class, 'update'])->middleware('auth');
Route::get('/categories/{id}/del', [CategoryController::class, 'destroy'])->middleware('auth');

// Product router
Route::get('/products', [ProductController::class, 'index'])->middleware('auth')->name('product.index');
Route::post('/products/store', [ProductController::class, 'store'])->middleware('auth');
Route::post('/products/{id}/upd', [ProductController::class, 'update'])->middleware('auth');
Route::get('/products/{id}/del', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/products/export', [ProductController::class, 'export'])->middleware('auth')->name('export.excel');
Route::post('/products/import', [ProductController::class, 'import'])->middleware('auth')->name('import.excel');

// Dashboard router
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home')->middleware('auth');

// Mailer router


// Home router
Route::get('/', function(){
    return view('home.home');
})->name('home');

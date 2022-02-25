<?php

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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('productStore');
Route::put('/products/{product}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'purge']);

Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags');
Route::post('/tags', [App\Http\Controllers\TagController::class, 'store'])->name('tagStore');
Route::put('/tags/{tag}', [App\Http\Controllers\TagController::class, 'update']);
Route::delete('/tags/{tag}', [App\Http\Controllers\TagController::class, 'purge']);

Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

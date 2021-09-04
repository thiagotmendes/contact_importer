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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Contact route group
 */
Route::prefix('/contact')->group(function (){
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::get('/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contact-create');
    Route::post('/store', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact-store');
});

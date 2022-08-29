<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LangController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::GET('/', [RouteController::class, 'index'])->name('home');
Route::GET('/dashboard', [RouteController::class, 'redirectToHome'])->name('dashboard');

//Route::GET('/change/lang/{lang}', [LangController::class, 'change'])->name('lang.change');

//Route::middleware('auth')->group(function () {
//    Route::GET('/add/user', [UserController::class, 'create'])->name('user.create');
//    Route::POST('/add/user', [UserController::class, 'store'])->name('user.store');
//
//    Route::GET('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
//    Route::POST('/user/{id}/edit', [UserController::class, 'update'])->name('user.update');
//
//    Route::POST('/user/{id}/delete', [UserController::class, 'changeStatus'])->name('user.status.change');
//
//    // admin accessible routes
//    Route::middleware('is.admin')->group(function () {
//        Route::GET('/quotes', [QuoteController::class, 'index'])->name('quotes.all.show');
//
//        Route::GET('/add/quote', [QuoteController::class, 'create'])->name('quote.create');
//        Route::POST('/add/quote', [QuoteController::class, 'store'])->name('quote.store');
//
//        Route::GET('/quote/{id}/edit', [QuoteController::class, 'edit'])->name('quote.edit');
//        Route::POST('/quote/{id}/edit', [QuoteController::class, 'update'])->name('quote.update');
//
//        Route::POST('/quote/{id}/delete', [QuoteController::class, 'changeStatus'])->name('quote.status.change');
//
//        Route::GET('/users', [UserController::class, 'index'])->name('users.all.show');
//    });
//});

require __DIR__.'/auth.php';

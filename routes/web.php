<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\QuoteController;

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

Route::middleware('auth')->group(function () {
    Route::GET('/add/quote', [QuoteController::class, 'create'])->name('quote.add');
});



require __DIR__.'/auth.php';

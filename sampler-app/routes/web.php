<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookCheckController;

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

Route::get('/dashboard', [BookController::class, 'indexWeb'])->middleware(['auth'])->name('dashboard');

Route::get('/book-check/{id}', [BookCheckController::class, 'index'])->middleware(['auth'])->name('book-check');

Route::post('/book-check', [BookCheckController::class, 'store'])->middleware(['auth'])->name('book-checked');

require __DIR__.'/auth.php';

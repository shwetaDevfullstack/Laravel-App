<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;

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

// Route::get('/dashboard', function () {
//     // $request = Route::get('/api/books/');
//     // $request->headers->set('Authorization', 'Bearer', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiZmE1NmJiNjZmODRjMzRlOTQ5N2YwOTIyZmI1ZGEzOGUzOGI4NzQwMzY4NmExYTI5NDQzMjY3MDM5MGJlY2NhNzU4YzNiMWE3MDQ0MjYzYWIiLCJpYXQiOjE2MTM0MTk4NjksIm5iZiI6MTYxMzQxOTg2OSwiZXhwIjoxNjQ0OTU1ODY5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.paaMSJIVTtqZG8yT3pT63arHj74oDHqKGu41_VDp48u1rVNEKXzXbOXl3_wK3zdw8vNC1jqqpV9tbTT894rklyplhYJDXs8qJtvGes-xTDM-6CODd2EGn5632w61QndyFsFEGYtnvFNqdLoe1tqDfAg5vLYJaAvVJcsZptypyWpIk3PTbniQuEuUDQbOJyRLAKUarjk0AR5o31Anysfe6iIhDWxK1slqO9ELwz0-ruEBbbGxoWGaqedWNfChVNWWiGs2AAAQAgu2v6rA29aTibJ8cvxCaCt_o8eoI8fYlY2bYnAy4KQnO8oQhNHZENUwVogQJHBbNRWdscwK1XMXw-uxrpYvRF_idHrcuHCzwrvHoW03di3wwdlDQazU5ZVMUDMInRTzJVNYjgj5R7UP7azxCCUb48BxLRQrJFy538wGNZ1MmwEjJ4JaZmEZJa_EDxqDG1TzQA0c70BBQU9dXvXSwgk-squp4Cmoc76RbiXKT7z58I30H4zNKqWwFsrA1Wv1B06q_rE9KyUFfA2P7emFihA_VIT3BOA1K-f-x0cG0cXrs5XRvcYuz8InhhgG40TtFZZbLIY7cTxa5CClYInId_muePGe_OLcVuiJx2ZeSlrlpjR3n-Uz5r3eNDM-8RIe5LuPK4no7cO5GYPClOkLYEpKYkZ1pW1TsS5aYLw');
//     // $response = Route::dispatch($request);
//     // var_dump($response->getContent());
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

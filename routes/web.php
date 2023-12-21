<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('master');
})->name("route.master");


Route::prefix('login')->middleware('authchecklogin')->group(function () {
    Route::get('/', [loginController::class, 'show'])->name('route.login');
    Route::post('/process', [loginController::class, 'login'])->name('route.login.process');
});
Route::get('/logout', [loginController::class, 'logout'])->name('route.logout');

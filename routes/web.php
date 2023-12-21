<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\lophocController;
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

Route::prefix('qllophoc')->group(function () {
    Route::get('/', [lophocController::class, 'show'])->name('route.lophoc');
    Route::get('/chitietlophoc/{id}', [lophocController::class, 'chitiet'])->name('route.lophoc.chitiet');
    Route::post('/addStudent/{id}', [lophocController::class, 'addStudent'])->name('route.lophoc.addStudent');
});

Route::prefix('login')->middleware('authchecklogin')->group(function () {
    Route::get('/', [loginController::class, 'show'])->name('route.login');
    Route::post('/process', [loginController::class, 'login'])->name('route.login.process');
});
Route::get('/logout', [loginController::class, 'logout'])->name('route.logout');

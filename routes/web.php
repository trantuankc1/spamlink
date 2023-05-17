<?php

use App\Http\Controllers\SpamlinkController;
use Illuminate\Support\Facades\DB;
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
Route::get('/', [\App\Http\Controllers\LoginController::class, 'login']);
Route::prefix('spam-link')->middleware('checklogin')->group(function () {
    Route::get('/', [SpamlinkController::class, 'index'])->name('index');
    Route::get('/create', [SpamlinkController::class, 'create'])->name('create_spamlink');
    Route::post('/create', [SpamlinkController::class, 'store'])->name('process_create');
    Route::delete('/delete/{id}', [SpamlinkController::class, 'delete'])->name('delete');
    Route::get('edit/{id}', [SpamlinkController::class, 'edit'])->name('edit');
    Route::put('edit/{id}', [SpamlinkController::class, 'update'])->name('update');
    Route::get('/link{id}', [SpamlinkController::class, 'click'])->name('click');
});
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'process'])->name('process');

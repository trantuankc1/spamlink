<?php

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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

Route::prefix('links')->middleware('checklogin')->group(function (){
    Route::get('/', [\App\Http\Controllers\LinkController::class, 'index'])->name('links.index');
    Route::get('/create', [\App\Http\Controllers\LinkController::class,'create'])->name('links.create');
    Route::delete('/delete{id}', [\App\Http\Controllers\LinkController::class, 'delete'])->name('delete');
    Route::get('edit/{id}', [\App\Http\Controllers\LinkController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [\App\Http\Controllers\LinkController::class, 'update'])->name('update');

    Route::post('/shorten-url', function (Request $request) {
        $originalUrl = $request->input('url');
        $code = Str::random(8); // Tạo một đoạn mã ngẫu nhiên (8 ký tự)

        // Lưu đoạn mã ngắn và đường dẫn gốc vào cơ sở dữ liệu
        ShortLink::create([
            'code' => $code,
            'original_url' => $originalUrl
        ]);

        return redirect()->route('links.index');
    })->name('create_code');

    Route::get('/{code}', function ($code) {
        $shortLink = ShortLink::where('code', $code)->first();

        if ($shortLink) {
            $link = ShortLink::where('code', $code)->firstOrFail();
            $link->traffic++;
            $link->save();
            return redirect()->away($shortLink->original_url);
        } else {
            abort(404);
        }

    })->name('code');
});

Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'process'])->name('process');

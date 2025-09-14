<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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


Route::get('/', [TestController::class, 'index']);

Route::post('/confirm', [TestController::class, 'confirm']);

Route::post('/thanks', [TestController::class, 'store']);

// ログインした後のルーティング
Route::middleware('auth')->group(function () {
    Route::get('/admin', [TestController::class, 'admin']);
    Route::post('/admin/register', [TestController::class, 'adminaftreregister']);
    Route::get('/admin/search', [TestController::class, 'search']);
    Route::delete('/admin/delete', [TestController::class, 'destroy']);
});





Route::get('/register', [TestController::class, 'register']);

// /registerのヘッダーのログインボタン
Route::get('/login', [TestController::class, 'login']);

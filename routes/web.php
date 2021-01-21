<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoChatController;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('video_chat', [VideoChatController::class,'index']);
    Route::post('auth/video_chat', [VideoChatController::class,'auth']);
});

// Route::post('/video/call-user', [VideoChatController::class,'callUser']);
// Route::post('/video/accept-call', [VideoChatController::class,'acceptCall']);
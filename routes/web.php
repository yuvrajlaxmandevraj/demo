<?php

use App\Http\Controllers\IpDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::resource('post', PostController::class);
Route::get('/my-ip-details', [IpDetailController::class, 'index'])->name('ip-details');
Route::get('/open-context-ids', [HomeController::class, 'getOpenContextIds'])->name('open-context-ids');
Route::get('/send-mail', [HomeController::class, 'sendMail'])->name('send-email');
Route::get('/email-send-success', [HomeController::class, 'sendMailSuccess'])->name('email-send-success');
Route::post('/send-mail', [HomeController::class, 'postMail'])->name('email-send');

Route::middleware(['request.validator'])->group(function () {
    Auth::routes();
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

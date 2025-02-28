<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    // Route::resource('post-api', PostController::class);
});
Route::get('/token', [HomeController::class, 'token'])->name('token');

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->tokens->delete();
    return response()->json(['message' => 'Logged out successfully']);
});

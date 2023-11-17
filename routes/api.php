<?php

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

Route::prefix('v1')->group(function() {
    Route::middleware(['auth', 'web'])->group(function() {
        Route::resource('workspace', \App\Http\Controllers\workspace\WorkspaceController::class);
        Route::resource('token', \App\Http\Controllers\token\TokenController::class);
    });

    Route::middleware(['guest'])->group(function() {
       Route::resource('login', \App\Http\Controllers\auth\AuthController::class)
           ->only(['index', 'store']);
    });
});

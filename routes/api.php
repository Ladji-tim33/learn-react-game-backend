<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgressionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/progression', [ProgressionController::class, 'show']);
    Route::post('/progression', [ProgressionController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

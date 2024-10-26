<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\LogRequestS10Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// sem 11
Route::middleware(LogRequestS10Middleware::class)->group(function () {
    Route::get('/log_ip_s11', function () {
        return response()->json(['status' => 'success']);
    });
});

Route::get('/users', [UsersController::class, 'index']);
Route::get('/users/{user}', [UsersController::class, 'show']);

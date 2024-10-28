<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\LogRequestS10Middleware;
use App\Mail\BookingCompletedMailing;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

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

// sem 12
Route::get('/book_s12', function () {
    $email = 'nataliya.yadykina.sub@yandex.ru';
    Mail::to($email)->send(new BookingCompletedMailing());
    return response()->json(['status' => 'success']);
});

Route::get('/test_telegram_s12', function () {
    Http::withOptions(['verify' => false])->post('https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage', [
        'chat_id' => env('TELEGRAM_CHANNEL_ID'),
        'parse_mode' => 'HTML',
        'text' => 'Test message from Laravel application'
    ]);

    return response()->json(['status' => 'success']);
});

Route::get('/debug_sentry_s12', function () {
    throw new Exception('Test Sentry error');
});

Route::get('/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/callback', [AuthController::class, 'handleProviderCallback']);

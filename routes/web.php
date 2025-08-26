<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\SettingController;

Route::get('/toggle-theme', function () {
    $theme = Session::get('theme', 'light') === 'light' ? 'dark' : 'light';
    Session::put('theme', $theme);
    return back();
})->name('toggle.theme');

Route::get('/lang/{locale}', [SettingController::class, 'langSwitch'])->name('lang.switch');

// Route::get('lang/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'id'])) {
//         App::setLocale($locale);
//     }
//     return back();
// })->name('lang.switch');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);

    Route::resource('products', ProductController::class);
});

Route::get('/', function () {
    return view('welcome');
});

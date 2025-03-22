<?php

use App\Http\Controllers\Dashboard\checkPasswordController;
use App\Http\Middleware\CheckPassword;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('user.login');

        Route::get('/outside-schedule', function () {
            return view('Dashboard.outside-schedule');
        })->name('outside-schedule');

        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->name('admin.login');

        Route::get('dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->name('admin.dashboard');


        Route::group(['middleware' => 'auth:admin'], (function () {
            Route::get('enter-password-route', [checkPasswordController::class, 'enterPassword'])->name('enter-password-route');
            Route::post('check.password', [checkPasswordController::class, 'checkPassword'])->name('check.password');

        }));
        require __DIR__ . '/auth.php';
    }
);

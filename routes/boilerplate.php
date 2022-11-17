<?php

use App\Http\Controllers\Boilerplate\Auth\ForgotPasswordController;
use App\Http\Controllers\Boilerplate\Auth\LoginController;
use App\Http\Controllers\Boilerplate\Auth\RegisterController;
use App\Http\Controllers\Boilerplate\Auth\ResetPasswordController;
use App\Http\Controllers\Boilerplate\DatatablesController;
use App\Http\Controllers\Boilerplate\ImpersonateController;
use App\Http\Controllers\Boilerplate\LanguageController;
use App\Http\Controllers\Boilerplate\Logs\LogViewerController;
use App\Http\Controllers\Boilerplate\Select2Controller;
use App\Http\Controllers\Boilerplate\Users\RolesController;
use App\Http\Controllers\Boilerplate\Users\UsersController;

Route::group([
    'prefix'     => config('boilerplate.app.prefix', ''),
    'domain'     => config('boilerplate.app.domain', ''),
    'middleware' => ['web', 'boilerplate.locale'],
    'as'         => 'boilerplate.',
], function () {
    // Logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Language switch
    if (config('boilerplate.locale.switch', false)) {
        Route::post('language', [LanguageController::class, 'switch'])->name('lang.switch');
    }

    // Frontend
    Route::group(['middleware' => ['boilerplate.guest']], function () {
        // Login
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.post');

        // Registration
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.post');

        // Password reset
        Route::prefix('password')->as('password.')->group(function () {
            Route::get('request', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
            Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
            Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
            Route::post('reset', [ResetPasswordController::class, 'reset'])->name('reset.post');
        });

        // First login
        Route::get('connect/{token?}', [UsersController::class, 'firstLogin'])->name('users.firstlogin');
        Route::post('connect/{token?}', [UsersController::class, 'firstLoginPost'])->name('users.firstlogin.post');
    });

    // Email verification
    Route::controller(RegisterController::class)->prefix('email')->middleware('boilerplate.auth')->as('verification.')->group(function () {
        Route::get('verify', 'emailVerify')->name('notice');
        Route::get('verify/{id}/{hash}', 'emailVerifyRequest')->name('verify');
        Route::post('verification-notification', 'emailSendVerification')->name('send');
    });

    // Backend
    Route::group(['middleware' => ['boilerplate.auth', 'ability:admin,backend_access', 'boilerplate.emailverified']], function () {
        // Impersonate another user
        if (config('boilerplate.app.allowImpersonate', false)) {
            Route::controller(ImpersonateController::class)->prefix('impersonate')->as('impersonate.')->group(function () {
                Route::post('/', 'impersonate')->name('user');
                Route::get('stop', 'stopImpersonate')->name('stop');
                Route::post('select', 'selectImpersonate')->name('select');
            });
        }

        // Dashboard
        Route::get('/', [config('boilerplate.menu.dashboard'), 'index'])->name('dashboard');

        // Session keep-alive
        Route::post('keep-alive', [UsersController::class, 'keepAlive'])->name('keepalive');

        // Datatables
        Route::post('datatables/{slug}', [DatatablesController::class, 'make'])->name('datatables');
        Broadcast::channel('dt.{name}.{signature}', function ($user, $name, $signature) {
            return channel_hash_equals($signature, 'dt', $name);
        });

        // Select2
        Route::post('select2', [Select2Controller::class, 'make'])->name('select2');

        // Roles and users
        Route::resource('roles', RolesController::class)->except('show')->middleware(['ability:admin,roles_crud']);
        Route::resource('users', UsersController::class)->middleware('ability:admin,users_crud')->except('show');

        // Profile
        Route::controller(UsersController::class)->prefix('userprofile')->as('user.')->group(function () {
            Route::get('/', 'profile')->name('profile');
            Route::post('/', 'profilePost')->name('profile.post');
            Route::post('settings', 'storeSetting')->name('settings');
            Route::get('avatar/url', 'getAvatarUrl')->name('avatar.url');
            Route::post('avatar/upload', 'avatarUpload')->name('avatar.upload');
            Route::post('avatar/gravatar', 'getAvatarFromGravatar')->name('avatar.gravatar');
            Route::post('avatar/delete', 'avatarDelete')->name('avatar.delete');
        });

        // Logs
        if (config('boilerplate.app.logs', false)) {
            Route::controller(LogViewerController::class)->prefix('logs')->as('logs.')->middleware('ability:admin,logs')->group(function () {
                Route::get('/', 'index')->name('dashboard');
                Route::prefix('list')->group(function () {
                    Route::get('/', 'listLogs')->name('list');
                    Route::delete('delete', 'delete')->name('delete');
                    Route::prefix('{date}')->group(function () {
                        Route::get('/', 'show')->name('show');
                        Route::get('download', 'download')->name('download');
                        Route::get('{level}', 'showByLevel')->name('filter');
                    });
                });
            });
        }
    });
});

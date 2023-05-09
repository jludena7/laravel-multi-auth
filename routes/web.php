<?php

use App\Http\Controllers\Internal\Security\Auth\ForgotPasswordController as IntForgotPasswordController;
use App\Http\Controllers\Internal\Security\Auth\LoginController as IntLoginController;
use App\Http\Controllers\Internal\Security\Auth\ResetPasswordController as IntResetPasswordController;
use App\Http\Controllers\Internal\Security\DashboardController;
use App\Http\Controllers\Site\Account\Auth\ForgotPasswordController as WbForgotPasswordController;
use App\Http\Controllers\Site\Account\Auth\LoginController as WbLoginController;
use App\Http\Controllers\Site\Account\Auth\RegisterUserController as WbRegisterUserController;
use App\Http\Controllers\Site\Account\Auth\ResetPasswordController as WbResetPasswordController;
use App\Http\Controllers\Site\Account\InboxController;
use App\Http\Controllers\Site\Content\PageController;
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


Route::name('site.')->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('content.page.home');
    Route::get('/account', [WbLoginController::class, 'create'])->name('account.auth.login.create');
    Route::get('/account/auth/login', [WbLoginController::class, 'create'])->name('account.auth.login.create');
    Route::post('/account/auth/login', [WbLoginController::class, 'store'])->name('account.auth.login.store')->middleware(['middleware' => 'throttle:3,1']);
    Route::delete('/account/auth/login', [WbLoginController::class, 'destroy'])->name('account.auth.login.destroy');
    Route::get('/account/auth/forgot-password', [WbForgotPasswordController::class, 'create'])->name('account.auth.forgot-password.create');
    Route::post('/account/auth/forgot-password', [WbForgotPasswordController::class, 'store'])->name('account.auth.forgot-password.store')->middleware(['middleware' => 'throttle:3,1']);
    Route::get('/account/auth/reset-password/{token}', [WbResetPasswordController::class, 'create'])->name('account.auth.reset-password.create');
    Route::post('/account/auth/reset-password', [WbResetPasswordController::class, 'store'])->name('account.auth.reset-password.store')->middleware(['middleware' => 'throttle:3,1']);
    Route::get('/account/auth/register-user', [WbRegisterUserController::class, 'create'])->name('account.auth.register-user.create');
    Route::post('/account/auth/register-user', [WbRegisterUserController::class, 'store'])->name('account.auth.register-user.store');
    Route::get('/account/auth/verification/verify', [WbRegisterUserController::class, 'verify'])->name('account.auth.verification.verify');
});

Route::middleware(['auth:site'])->name('site.')->group(function () {
    Route::get('/account/inbox/main', [InboxController::class, 'main'])->name('account.inbox.main');
});

Route::name('internal.')->prefix('internal')->group(function () {
    Route::get('/', [IntLoginController::class, 'create'])->name('security.auth.login.create');;
    Route::get('/security/auth/login', [IntLoginController::class, 'create'])->name('security.auth.login.create');
    Route::post('/security/auth/login', [IntLoginController::class, 'store'])->name('security.auth.login.store')->middleware(['middleware' => 'throttle:3,1']);
    Route::delete('/security/auth/login', [IntLoginController::class, 'destroy'])->name('security.auth.login.destroy');
    Route::get('/security/auth/forgot-password', [IntForgotPasswordController::class, 'create'])->name('security.auth.forgot-password.create');
    Route::post('/security/auth/forgot-password', [IntForgotPasswordController::class, 'store'])->name('security.auth.forgot-password.store')->middleware(['middleware' => 'throttle:3,1']);
    Route::get('/security/auth/reset-password/{token}', [IntResetPasswordController::class, 'create'])->name('security.auth.reset-password.create');
    Route::post('/security/auth/reset-password', [IntResetPasswordController::class, 'store'])->name('security.auth.reset-password.store')->middleware(['middleware' => 'throttle:3,1']);
});

Route::middleware(['auth:internal'])->name('internal.')->prefix('internal')->group(function () {
    Route::get('/security/dashboard/main', [DashboardController::class, 'main'])->name('security.dashboard.main');
});

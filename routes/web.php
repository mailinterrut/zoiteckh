<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PrivilegesController;
use App\Http\Controllers\AccountController;

Route::get('/css/{filename}', function ($filename) {
    return response()->file(public_path('css/' . $filename))->header('Content-Type', 'text/css');
});

Route::get('/js/{filename}', function ($filename) {
    return response()->file(public_path('js/' . $filename))->header('Content-Type', 'application/javascript');
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
})->name('layouts.app');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('layouts.app');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
    Route::put('/account/settings/update', [AccountController::class, 'update'])->name('account.settings.update');

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/users', [UsersController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::put('/users/{user}/activate', [UsersController::class, 'activate'])->name('users.activate');
        Route::put('/users/{user}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');

        Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');

        Route::get('/privileges', [PrivilegesController::class, 'index'])->name('privileges.index');
        Route::get('/privileges/create', [PrivilegesController::class, 'create'])->name('privileges.create');
        Route::post('/privileges', [PrivilegesController::class, 'store'])->name('privileges.store');
        Route::get('/privileges/{privilege}/edit', [PrivilegesController::class, 'edit'])->name('privileges.edit');
        Route::put('/privileges/{privilege}', [PrivilegesController::class, 'update'])->name('privileges.update');
        Route::delete('/privileges/{privilege}', [PrivilegesController::class, 'destroy'])->name('privileges.destroy');
    });
});
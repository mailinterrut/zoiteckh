<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PrivilegesController;
use App\Http\Controllers\AccountController;
 

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

// Authentication Routes

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request')->middleware('guest');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('guest');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset')->middleware('guest');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update')->middleware('guest');

// Protected Routes

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/account', [AccountController::class, 'index'])->name('account.index');
        Route::get('/account/settings', [AccountController::class, 'settings'])->name('account.settings');
        Route::put('/account/settings/update', [AccountController::class, 'update'])->name('account.settings.update');
    });
    // Add more protected routes here...
    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/privileges', [PrivilegesController::class, 'index'])->name('privileges.index');
        Route::get('/privileges/create', [PrivilegesController::class, 'create'])->name('privileges.create');
        Route::post('/privileges', [PrivilegesController::class, 'store'])->name('privileges.store');
        Route::get('/privileges/{privilege}/edit', [PrivilegesController::class, 'edit'])->name('privileges.edit');
        Route::put('/privileges/{privilege}', [PrivilegesController::class, 'update'])->name('privileges.update');
        Route::delete('/privileges/{privilege}', [PrivilegesController::class, 'destroy'])->name('privileges.destroy');
    });
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
 
    });

});
 
// Other Routes
 

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

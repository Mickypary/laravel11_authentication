<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('dashboard-user', [WebsiteController::class, 'dashboard_user'])->name('dashboard-user')->middleware('auth', 'user');
Route::get('login', [WebsiteController::class, 'login'])->name('login');
Route::post('login__', [WebsiteController::class, 'login__'])->name('login__');
Route::get('registration', [WebsiteController::class, 'registration'])->name('registration');
Route::post('registration__', [WebsiteController::class, 'registration__'])->name('registration__');
Route::get('registration/verify/{token}/{email}', [WebsiteController::class, 'verify_email']);
Route::get('logout', [WebsiteController::class, 'logout'])->name('logout');
Route::get('forget_password', [WebsiteController::class, 'forget_password'])->name('forget-password');
Route::post('forget-password__', [WebsiteController::class, 'forget_password__'])->name('forget-password__');
Route::get('reset-password/{token}/{email}', [WebsiteController::class, 'reset_password'])->name('reset-password');
Route::post('reset-password__', [WebsiteController::class, 'reset_password__'])->name('reset-password__');





/* Admin */
Route::get('admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::post('admin/login__', [AdminController::class, 'login__'])->name('admin_login__');
Route::group(['middleware' => 'admin:admin'], function () {
  Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
  Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin_settings');
});

// Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin_settings')->middleware('admin:admin');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin_logout');

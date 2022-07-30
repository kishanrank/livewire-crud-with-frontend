<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Livewire\Admin\Users;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/post-login',  [LoginController::class, 'login'])->name('postLogin');
Route::get('/logout',  [LoginController::class, 'logout'])->name('logout');

Route::get('/register',  [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/post-register',  [RegisterController::class, 'register'])->name('postRegister');

//Forgot Password
Route::get('/forgot/password',  [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
Route::post('/password/email',  [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Password
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/dashboard',  [HomeController::class, 'index'])->name('dashboard');
        Route::get('/users',  [UserController::class, 'index'])->name('users');
        Route::get('/books',  [BookController::class, 'index'])->name('books');
    });
});

// Route::get('/admin/users',  Users::class)->name('admin.users');

Route::get('/', [ControllersHomeController::class, 'index'])->name('home');
Route::get('/favorites', [ControllersHomeController::class, 'favorites'])->name('favorites');
Route::get('/read-more/book/{id}', [ControllersHomeController::class, 'readBook'])->name('book.readmore')->middleware('auth');
Route::get('/profile', [ControllersHomeController::class, 'profile'])->name('profile')->middleware('auth');

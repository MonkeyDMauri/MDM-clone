<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

// SIGNIN LOGIN ROUTES

// this route sends user to login page.
Route::get('/', function () {
    return view('signin_login.login');
})->name('login.page');


// this route sends user to signin page.
Route::get('/signin-page', function () {
    return view('signin_login.signin');
})->name('signin.page');


// This route triggers the sign in process.
Route::post('/user-signin', [UserController::class, 'signIn'])->name('user.signin');

// This route triggers the log in process.
Route::post('/user-login', [UserController::class,'logIn'])->name('user.login');

//PASSWORD RESET ALGORITHM

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class,'store'])->name('password.update');
<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
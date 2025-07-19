<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signin_login.login');
})->name('login.page');

Route::get('/signin-page', function () {
    return view('signin_login.signin');
})->name('signin.page');

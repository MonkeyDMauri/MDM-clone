<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PostController;
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

// =============
// HOME ROUTES
// ==============

// Go to home page
Route::get('/home-section', function () {
    return view('home.home');
})->name('home.section');

// Go to people page.
Route::get('/people-section', function () {
    return view('home.people');
})->name('people.section');

Route::get('/profile-section', function () {
    return view('home.profile-page');
})->name('profile.section');

// This request will come from a JS fetch request to get all posts.
Route::get('/get-posts', [PostController::class, 'getPosts'])->name('post.get');

// Route to trigger logout.
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');


// ========================
// PROFILE SECTION ROUTES 
// ========================

// This route is called by JS fetch request to get all posts that the current user has created.
Route::get('/get-my-posts', [UserController::class, 'getPosts']);

// This route is called when user submits "edit profile" form.
Route::post('/edit-profile', [UserController::class, 'editProfile'])->name('profile.edit');

// POST: this route is called when a user tries to create a post.
Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');
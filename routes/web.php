<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMw;
use App\Http\Controllers\AdminController;
Route::get('posts', [PostController::class, 'showPosts']);
Route::get('good/{id}', [PostController::class, 'getPost']);
Route::get('create/category', [PostController::class, 'showPostCategory']);

Route::match(['post', 'get'],'create/create', [PostController::class, 'showPostForm'])->middleware(AuthMw::class);
Route::match(['get', 'post'],'upload/', [PostController::class, 'createPost'])->middleware(AuthMw::class);


Route::get('register', [AuthController::class, 'showRegForm']);
Route::get('reg', [AuthController::class, 'regUSer']);
Route::match(['get', 'post'], 'reg', [AuthController::class, 'regUser']);
Route::get('login', [AuthController::class, 'showLoginForm']);
Route::match(['get', 'post'], 'log', [AuthController::class, 'AuthorizeUser']);


Route::match(['get', 'post'],'search/', [PostController::class, 'search']);
Route::match(['get', 'post'],'search/good/{id}', [PostController::class, 'getPost']);


Route::get('user/{id}', [PostController::class, 'profileGoods'])->middleware(AuthMw::class);


Route::match(['get', 'post'],'delete/{id}', [PostController::class, 'deleteFromOwner'])->middleware(AuthMw::class);

Route::get('dboard', [AdminController::class, 'adminGetPosts'])->middleware(AuthMw::class);

Route::match(['get', 'post'],'del/{id}', [AdminController::class, 'adminDeletePost'])->middleware(AuthMw::class);
Route::match(['get', 'post'],'allow/{id}', [AdminController::class, 'adminAllowPost'])->middleware(AuthMw::class);
Route::get('users', [AdminController::class, 'adminGetUsers'])->middleware(AuthMw::class);
Route::match(['get', 'post'],'ban/{id}', [AdminController::class, 'adminBanUser'])->middleware(AuthMw::class);
Route::match(['get', 'post'],'unban/{id}', [AdminController::class, 'adminUnbanUser'])->middleware(AuthMw::class);

Route::match(['GET', 'POST'],'ch/{id}', [AdminController::class, 'getUserInfo'])->middleware(AuthMw::class);

Route::match(['GET', 'POST'],'sets/{id}', [AuthController::class, 'setUpForm'])->middleware(AuthMw::class);
Route::match(['GET', 'POST'],'changePost/{id}', [PostController::class, 'changeFromOwner'])->middleware(AuthMw::class);
Route::match(['GET', 'POST'],'editDb/{id}', [AdminController::class, 'changeFromAdmin'])->middleware(AuthMw::class);


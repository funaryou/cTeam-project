<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix("/rehem")->group(function(){
    Route::get("/main", [AccountController::class, "top"])->name("top")->middleware('auth');
    Route::get("/profile", [AccountController::class, "profile"])->name("profile")->middleware('auth');
    Route::get("/record", [AccountController::class, "record"])->name("record")->middleware('auth');
    Route::post("/", [AccountController::class, "day_record"])->name("day_record")->middleware('auth');
});


Route::prefix("/account")->group(function(){
    Route::get('/register', [AccountController::class, 'register'])->name('register');
    Route::post('/register', [AccountController::class, 'create_account'])->name("create_account");
    Route::get('/login', [LoginController::class, 'LoginForm'])->name('login'); // GETメソッドを追加
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // ログイン処理用POSTメソッド
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::prefix("/test")->group(function(){
    Route::get('/post', [PostController::class, 'test'])->name('test')->middleware('auth');
    Route::post('/post', [PostController::class, 'store'])->name('store')->middleware('auth'); 
});

// aaa


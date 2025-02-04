<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

#->middleware('auth')

Route::prefix("/rehem")->group(function(){
    Route::get("/main", [AccountController::class, "top"])->name("top");
    Route::get("/{id}/profile", [AccountController::class, "profile"])->name("profile");
    Route::get("/{id}/prof_update", [AccountController::class, "prof_update"])->name("prof_update");
    Route::get("/{id}/edit", [AccountController::class, "edit"])->name("edit");
    Route::get("/record", [AccountController::class, "record"])->name("record");
    Route::post("/day_record", [AccountController::class, "day_record"])->name("day_record");
    Route::post('/recode', [RecodeGetController::class, 'recode_get'])->name('recode_get');
    Route::post("/", [AccountController::class, "day_record"])->name("day_record");
});


Route::prefix("/account")->group(function(){
    Route::get('/register', [AccountController::class, 'register'])->name('register');
    Route::post('/register', [AccountController::class, 'create_account'])->name("create_account");
    Route::get('/login', [LoginController::class, 'LoginForm'])->name('LoginForm'); // GETメソッドを追加
    Route::post('/login', [LoginController::class, 'login'])->name('login'); // ログイン処理用POSTメソッド
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/guest', [LoginController::class, 'view_guest'])->name('view_guest');
    Route::post('/guest', [LoginController::class, 'guest'])->name('guest');
});



Route::prefix("/test")->group(function(){
    Route::get('/post', [PostController::class, 'test'])->name('test')->middleware('auth');
    Route::post('/post', [PostController::class, 'store'])->name('store')->middleware('auth'); 
});

// aaa


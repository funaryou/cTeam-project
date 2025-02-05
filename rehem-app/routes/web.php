<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AccountController::class, 'landing'])->name('landing');

Route::prefix("/rehem")->group(function(){
    Route::get("/main", [AccountController::class, "top"])->name("top")->middleware('auth');
    Route::get("/{id}/profile", [AccountController::class, "profile"])->name("profile")->middleware('auth');
    Route::get("/{id}/prof_update", [AccountController::class, "prof_update"])->name("prof_update")->middleware('auth');
    Route::get("/{id}/edit", [AccountController::class, "edit"])->name("edit")->middleware('auth');
    Route::get("/record", [AccountController::class, "record"])->name("record")->middleware('auth');
    Route::post('/post/store', [PostController::class, 'post_store'])->name('rehem.post_store')->middleware('auth');
    // Route::post('/post/likes', [PostController::class, 'likes'])->name('rehem.post_likes')->middleware('auth');
    Route::get("/record", [AccountController::class, "record"])->name("record")->middleware('auth');
    Route::post("/day_record", [AccountController::class, "day_record"])->name("day_record")->middleware('auth');
    Route::post('/recode', [RecodeGetController::class, 'recode_get'])->name('recode_get')->middleware('auth');
    Route::post("/", [AccountController::class, "day_record"])->name("day_record")->middleware('auth');
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



// Route::prefix("/test")->group(function(){
//     Route::get('/post', [PostController::class, 'test'])->name('test')->middleware('auth');
//     Route::post('/post', [PostController::class, 'store'])->name('store')->middleware('auth'); 
// });

// aaa


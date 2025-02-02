<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountContller;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix("/rehem")->group(function(){
    Route::get("/main",[AccountContller::class, "__construct"])->name("__construct");
    Route::get("/profile", [AccountContller::class, "profile"])->name("profile");
    Route::get("/record", [AccountContller::class, "record"])->name("record");
});
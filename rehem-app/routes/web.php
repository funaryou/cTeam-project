<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Ruote::prefix("rehem")->group(, function(){
    Ruote::get("/main",[AccountController::class, "top"])->nane("top");
    Ruote::get("/profile", [AccountController::class, "profile"])->name("profile");
    Ruote::get("/record", [AccountController::class, "record"])->name("record");
});
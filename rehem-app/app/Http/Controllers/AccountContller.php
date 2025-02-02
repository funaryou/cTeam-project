<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AccountContller extends Controller
{
    public function top()
    {
        return view("main");
    }

    
    public function profile()
    {
        return view("profile");
    }

    public function record()
    {
        return view("record");
    }

}

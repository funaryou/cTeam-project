<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountContller extends Controller
{
    public function top()
    {
        return view("main");
    }
}

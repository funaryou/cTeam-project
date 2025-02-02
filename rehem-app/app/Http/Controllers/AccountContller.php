<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;



class AccountContller extends Controller
{
    public function top()
    {
        return view("main");
    }

    // public function __construct()
    // {
    //     $this->account_db = function (){
    //         $accounts = Account::all();
    //         return redirect()->route("post");
    //     };
    // }

    // public function post()
    // {
    //     $account = ($this->account_db)();

    //     return redirect()->route("views.main");
    // }





    
    public function profile()
    {
        return view("profile");
    }

    //記録用

    public function record()
    {
        return view("record");
    }

    public function day_record()
    {
        return view("main", compact("account"));
    }

}

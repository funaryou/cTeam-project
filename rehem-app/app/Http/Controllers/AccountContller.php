<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model\AccountContller;


class AccountContller extends Controller
{
    public function top()
    {
        public function interface(){
            $account = AccountContller::all();
            return redirect()->route("post");
        }

        // りょうまのとこ
        public function post(){

        }
    }
}

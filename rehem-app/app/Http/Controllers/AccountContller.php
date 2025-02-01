<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model\AccountContller;


class AccountContller extends Controller
{
    class mainFanction{

        $account_db = function interface(){
            $account = AccountContller::all();
            return redirect()->route("post");
        }

        // りょうまのとこですよ
        function post($account_db){

            

        }
        
    }
    
}

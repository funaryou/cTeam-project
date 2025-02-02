<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
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

    public function record()
    {
        return view("record");
    }

    public function register()
    {
        return view("account.register");
    }

    public function create_account(Request $request)
    {
        $request->validate([
            "user_name" => 'required|string|max:255|unique:accounts',
            "email" => 'required|string|email|max:255|unique:accounts',
            'password' => 'required|string|min:8|confirmed',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profilePicPath = null;

        if ($request->hasFile('profile_pic')) {
            
            $profilePicPath = $request->file('profile_pic')->store('profile_pics', 'public'); // publicストレージに保存
        } else {
            
            $profilePicPath = 'default_profile_picture.png';
        }

        Account::create([
            "user_name" => $request->user_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "profile_pic" => $profilePicPath, 

        ]);
        
        return redirect('/rehem/main')->with('success', 'アカウントが作成されました。');

    }
}

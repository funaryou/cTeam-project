<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('account.login'); 
    }

    // ログイン処理
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $account = Account::where('email', $request->email)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            Auth::login($account); 
            return redirect('/rehem/main');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect('/account/login'); 
    }
}
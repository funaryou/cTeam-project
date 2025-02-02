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
        $user = Auth::user();
        return view('account.login',compact('user')); 
    }

    // ログイン処理
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $account = Account::where('email', $request->email)->first();
    
        if ($account) {
            if (Hash::check($request->password, $account->password)) {
                Auth::login($account); 
                \Log::info('User logged in: ' . $account->email);
                return redirect('/rehem/main'); // ログイン成功時のリダイレクト
            } else {
                \Log::warning('Password mismatch for: ' . $request->email);
                \Log::info('Input password: ' . $request->password);
                \Log::info('Stored password hash: ' . $account->password);
            }
        } else {
            \Log::warning('No account found for: ' . $request->email);
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
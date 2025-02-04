<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Session;


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
                \Log::info('User logged in: ' . $account->email);
                Auth::login($account); 
                session()->regenerate();
                return redirect()->intended('rehem/main'); // ログイン成功時のリダイレクト
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

    // // ログアウト処理
    // public function logout(Request $request)
    // {
    //     Auth::logout(); 
    //     return redirect('/account/login'); 
    // }

    //     public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);
    //     // dd($credentials);
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('rehem.main');
    //     } else{
    //         return back()->withErrors([
                
    //             'email' => 'The provided credentials do not match our records.'
    //         ]);
    //     } 
        

    // }
    public function view_guest ()
    {
        return view("account.guest");
    }


}
<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Activity;


class AccountController extends Controller
{
    public function top()
    {
        $account = Auth::user();


        $sevenDaysAgo = Carbon::now()->subDays(6)->startOfDay();
        $today = Carbon::now()->endOfDay();

        $activityCounts = Activity::selectRaw('DATE(record_at) as date, SUM(daily_aerobic) as total_aerobic, SUM(daily_anoxic) as total_anoxic')
            ->whereBetween('record_at', [$sevenDaysAgo, $today])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // `main.blade.php` に `$activityCounts` を渡す
        // return view('main', );

        return view("main",compact('activityCounts'), compact('account'));
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

    public function profile($id)
    {
        $account = Account::find($id);
        
        return view("profile", compact("account"));
    }


    public function prof_update(Request $request, $id)
    {
        $account = Account::find($id);
        $account->update([
            "user_name" => $request->input('user_name')?: $account->user_name,
            "profile_word" => $request->input('profile_word', "") ?: $account->profile_word,
            "stature" => $request->input('stature')?: $account->stature,
            "weight" => $request->input('weight')?: $account->weight,
            "target" => $request->input('target')?: $account->target,
            "lifestyle" => $request->input('lifestyle')?: $account->lifestyle,
        ]);

        return redirect()->route("profile",['id' => $id]);
    }

    public function edit($id)
    {
        $account = Account::find($id);

        return view("prof_update", compact("account"));
    }





    public function record()
    {
        $account = Auth::user();
        
        return view("record", compact("account"));
    }

    public function day_record(Request $request) {

        $user = Auth::user();

        if ($request->input('oxy') == "aerobic" ) {
            Activity::create([
                "daily_aerobic" => $request-> input("value"),
                "daily_anoxic" => 0,
                "author_id" => $user->id,
            ]);
        } else {
            Activity::create([
                "daily_aerobic" => 0,
                "daily_anoxic" => $request-> input("value"),
                "author_id" => $user->id,
            ]);
        }
        return view("rehem.main");

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
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif.svg|max:2048',
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

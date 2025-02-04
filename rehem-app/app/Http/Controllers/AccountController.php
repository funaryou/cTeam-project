<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Activity;
use App\Models\Post;
use Carbon\Carbon;


class AccountController extends Controller
{
    public function top()
    {
        $posts = Post::all();
        $account = Auth::user();

    $sevenDaysAgo = Carbon::now()->subDays(6)->startOfDay();
    $today = Carbon::now()->endOfDay();

    // ① DBからデータ取得（日付ごとに集計）
    $activityData = Activity::selectRaw('DATE(record_at) as date, SUM(daily_aerobic) as total_aerobic, SUM(daily_anoxic) as total_anoxic')
        ->whereBetween('record_at', [$sevenDaysAgo, $today])
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get()
        ->keyBy('date'); // 日付をキーにする

    // ② 7日分の日付を作成し、データがない日は 0 で補完
    $dates = collect();
    for ($i = 6; $i >= 0; $i--) {
        $date = Carbon::now()->subDays($i)->toDateString();
        $dates[$date] = [
            'date' => $date,
            'total_aerobic' => $activityData[$date]->total_aerobic ?? 0,
            'total_anoxic' => $activityData[$date]->total_anoxic ?? 0,
        ];
    }

    // ③ Laravel に渡すデータを修正
    $activityCounts = $dates->values(); // コレクションを配列に変換

    // 今日のデータ
    $activityCountsToday = Activity::selectRaw('SUM(daily_aerobic) as total_aerobic, SUM(daily_anoxic) as total_anoxic')
        ->whereDate('record_at', Carbon::today())
        ->first();

        return view("main",compact('activityCounts', 'account', 'activityCountsToday',"posts"));
    }

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
        $account = $user;

        if ($request->input('oxy') == "aerobic" ) {
            Activity::create([
                "daily_aerobic" => $request-> input("value"),
                "daily_anoxic" => 0,
                "author_id" => $user->id,
                "record_at" => now()->toDateString(),
                "created_at" => now(),
                "updated_at" => now(), // ここでタイムスタンプを指定
            ]);
        } else {
            Activity::create([
                "daily_aerobic" => 0,
                "daily_anoxic" => $request-> input("value"),
                "author_id" => $user->id,
                "record_at" => now()->toDateString(),
                "created_at" => now(),
                "updated_at" => now(), // ここでタイムスタンプを指定
            ]);
        }
        return redirect('/rehem/main');

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

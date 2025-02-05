<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;



class PostController extends Controller
{
    // public function test()
    // {
    //     $posts = Post::all();
    //     return view("test_views.post",compact("posts"));
    // }
    
    public function post_store(Request $request) {
        $user = Auth::user();
        // dd($user);
        $account = $user;

        Post::create([
            "content" => $request->input('content')?: "" ,
            "author_id" => $user->id,
            "created_at" => now(),
            "updated_at" => now(),
            "random_num" => rand(1, 100000),
        ]);
        
        return redirect('/rehem/main');
    }

    // public function likes(Request $request,$id)
    // {
    //     $user = Auth::user();
    //     $PostID = Task::find($id);

    //     $PostID->update([
    //         "account_id" => ,
    //     ]);
    // }


}
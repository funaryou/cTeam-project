<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;


class PostController extends Controller
{
    public function test()
    {
        $posts = Post::all();
        return view("test_views.post",compact("posts"));
    }
    public function store(Request $request) {
        $authorId = auth()->id(); 
        Post::create([
            "content" => $request->content,
            "author_id" => $authorId,
        ]);
    }


}
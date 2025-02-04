<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;
use App\Models\Activity;


class RecodeGetController extends Controller
{
    public function get_recode(Request $request) {

        Activity::create([
            "value" => $request-> $,
            "author_id" => $request->,
        ]);
    }


}
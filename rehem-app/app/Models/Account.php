<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ["user_name", "profile_pic", "weekly_total", "profile_word", "birthday",
                            "stature", "weight", "follow", "follower", "target", "lifestyle",
                            "daily_aerobic", "daily_anoxic", "exercise_time"]
}

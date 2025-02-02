<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $fillable = [
        "user_name", 
        "email",
        "password",
        "profile_pic", 
        "weekly_total", 
        "profile_word", 
        "birthday_year",
        "birthday_month",
        "birthday_day",
        "stature", 
        "weight", 
        "follow", 
        "follower", 
        "target", 
        "lifestyle",
        "daily_aerobic", 
        "daily_anoxic", 
        "exercise_time"
    ];

    protected $attributes = [
        "daily_aerobic" => 0,
        "daily_anoxic" => 0,
        "exercise_time" => 0,
        "weekly_total" => 0,
        "profile_word" => "",
        "birthday_year" => 0,
        "birthday_day" => 0,
        "birthday_month" => 0,
        "stature" => 0,
        "weight" => 0,
        "follow" => 0,
        "follower" => 0,
        "target" => 0,
        "lifestyle" => "",
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }
}

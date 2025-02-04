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
    ];

    protected $attributes = [
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
    
    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id', 'id'); // 'user_id'はセッションテーブルの外部キー
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes');
    }

    public function activites()
    {
        return $this->hasMany(Activity::class, 'author_id');
    }
}

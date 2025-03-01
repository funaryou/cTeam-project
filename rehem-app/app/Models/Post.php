<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["id", "content", "author_id","random_num"]; // liked_byを削除

    public function author()
    {
        return $this->belongsTo(Account::class, 'author_id');
    }

    public function likedBy()
    {
        return $this->belongsToMany(Account::class, 'likes');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["id","content","author_id","liked_by"]; // authorをauthor_idに変更

    public function author()
    {
        return $this->belongsTo(Account::class, 'author_id');
    }
}

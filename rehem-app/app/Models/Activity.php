<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'daily_aerobic',
        'dairy_anoxic',
        'record_at',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Account::class, 'author_id');
    }
}
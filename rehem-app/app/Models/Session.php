<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions'; // セッションテーブルを指定

    protected $fillable = ['id', 'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity'];

    // アカウントとのリレーションを定義
    public function account()
    {
        return $this->belongsTo(Account::class, 'user_id', 'id'); // 'user_id'はアカウントテーブルの外部キー
    }
}
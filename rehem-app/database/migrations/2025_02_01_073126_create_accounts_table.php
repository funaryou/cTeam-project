<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string("user_name")->unique();
            $table->string("email")->unique();
            $table->string("password");
            $table->text("profile_pic");
            $table->integer("daily_aerobic");
            $table->integer("daily_anoxic");
            $table->integer("weekly_total");
            $table->text("profile_word");
            $table->integer("birthday_year");
            $table->integer("birthday_day");
            $table->integer("birthday_month");
            $table->integer("stature");
            $table->integer("weight");
            $table->integer("follow");
            $table->integer("follower");
            $table->string("target");
            $table->text("lifestyle");
            $table->integer("exercise_time");
            $table->timestamps();
        });
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // セッションID
            $table->foreignId('user_id')->nullable()->index(); // ユーザーID（オプション）
            $table->string('ip_address', 45)->nullable(); // IPアドレス
            $table->text('user_agent')->nullable(); // ユーザーエージェント
            $table->longText('payload'); // セッションデータ
            $table->integer('last_activity')->index(); // 最後のアクティビティのタイムスタンプ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};

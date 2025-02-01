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
            $table->string("user_name");
            $table->img("profile_pic");
            $table->int("daily_aerobic");
            $table->int("daily_anoxic");
            $table->int("weekly_total");
            $table->text("profile_word");
            $table->int("birthday");
            $table->int("stature");
            $table->int("weight");
            $table->int("follow");
            $table->int("follower");
            $table->string("target");
            $table->text("lifestyle");
            $table->int("exercise_time");
            $table->timestamps();
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

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
            $table->text("profile_pic");
            $table->integer("daily_aerobic");
            $table->integer("daily_anoxic");
            $table->integer("weekly_total");
            $table->text("profile_word");
            $table->integer("birthday");
            $table->integer("stature");
            $table->integer("weight");
            $table->integer("follow");
            $table->integer("follower");
            $table->string("target");
            $table->text("lifestyle");
            $table->integer("exercise_time");
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

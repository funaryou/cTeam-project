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
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn(['weekly_total','daily_aerobic','daily_anoxic','exercise_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->integer('weekly_total')->nullable();
            $table->integer('daily_aerobic')->nullable();
            $table->integer('daily_anoxic')->nullable();
            $table->integer('exercise_time')->nullable();
        });
    }
};

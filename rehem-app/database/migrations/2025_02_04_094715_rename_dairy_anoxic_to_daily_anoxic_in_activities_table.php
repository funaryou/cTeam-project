<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->renameColumn('dairy_anoxic', 'daily_anoxic'); // 'dairy_anoxic' を 'daily_anoxic' に変更
        });
    }

    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->renameColumn('daily_anoxic', 'dairy_anoxic'); // ロールバック時に逆の変更を行う
        });
    }
};

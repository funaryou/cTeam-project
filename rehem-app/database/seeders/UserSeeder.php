<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Account;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        $profilePicPath = 'default_profile_picture.png';
        Account::insert([
        [
            'user_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpass'),
            "profile_pic" => $profilePicPath, 
            "daily_aerobic" => 0,
            "daily_anoxic" => 0,
            "exercise_time" => 0,
            "weekly_total" => 0,
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
        ],
        [
            'user_name' => 'member',
            'email' => 'member@example.com',
            'password' => Hash::make('memberpass'),
            "profile_pic" => $profilePicPath, 
            "daily_aerobic" => 0,
            "daily_anoxic" => 0,
            "exercise_time" => 0,
            "weekly_total" => 0,
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
        ],
        [
            'user_name' => 'creator',
            'email' => 'creator@example.com',
            'password' => Hash::make('creatorpass'),
            "profile_pic" => $profilePicPath, 
            "daily_aerobic" => 0,
            "daily_anoxic" => 0,
            "exercise_time" => 0,
            "weekly_total" => 0,
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
        ],
        [
            'user_name' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => 'testtest1234',
            "profile_pic" => $profilePicPath, 
            "daily_aerobic" => 0,
            "daily_anoxic" => 0,
            "exercise_time" => 0,
            "weekly_total" => 0,
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
        ],
        ]);
    }
}
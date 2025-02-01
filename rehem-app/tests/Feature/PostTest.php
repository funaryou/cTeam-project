<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase; // データベースをリフレッシュするトレイト

    /** @test */
    public function it_can_create_a_post_with_author()
    {
        // アカウントを作成
        $account = Account::create([
            'user_name' => 'test_user',
            'profile_pic' => 'path/to/pic.jpg',
            'daily_aerobic' => 30,
            'daily_anoxic' => 20,
            'weekly_total' => 100,
            'profile_word' => 'Hello!',
            'birthday' => 1990,
            'stature' => 170,
            'weight' => 70,
            'follow' => 10,
            'follower' => 5,
            'target' => 'Fitness',
            'lifestyle' => 'Active',
            'exercise_time' => 60,
        ]);

        // ポストを作成
        $post = Post::create([
            'content' => 'This is a test post.',
            'author_id' => $account->id,
            'liked_by' => json_encode([]),
        ]);

        // ポストが正しく作成されたか確認
        $this->assertEquals('This is a test post.', $post->content);
        $this->assertEquals($account->id, $post->author_id);
        $this->assertEquals('test_user', $post->author->user_name);
    }

    /** @test */
    public function it_can_like_a_post()
    {
        // アカウントを作成
        $account = Account::create([
            'user_name' => 'test_user',
            'profile_pic' => 'path/to/pic.jpg',
            'daily_aerobic' => 30,
            'daily_anoxic' => 20,
            'weekly_total' => 100,
            'profile_word' => 'Hello!',
            'birthday' => 1990,
            'stature' => 170,
            'weight' => 70,
            'follow' => 10,
            'follower' => 5,
            'target' => 'Fitness',
            'lifestyle' => 'Active',
            'exercise_time' => 60,
        ]);

        // ポストを作成
        $post = Post::create([
            'content' => 'This is a test post.',
            'author_id' => $account->id,
        ]);

        // ポストにいいねを追加
        $post->likedBy()->attach($account->id);

        // いいねしたアカウントを取得
        $likedAccounts = $post->likedBy;

        // いいねが正しく追加されたか確認
        $this->assertCount(1, $likedAccounts);
        $this->assertEquals('test_user', $likedAccounts[0]->user_name);
    }
}
@extends('layouts.base')

@section('content')
     <section class="userProfile">
        <article class="upperSection">
            <div class="uesrIcon"></div>
            <div class="wrapper">
                <p class="name">なかやまきんに君</p>
                <p class="message">筋トレ大好き</p>
            </div>
            <a href="" class="commonButton edit">プロフィールを編集</a>
        </article>
        <div class="divider"></div>
        <article class="lowerSection">
            <div class="userInfomation">
                <h2 class="title">プロフィール</h2>
                <table>
                    <tr>
                        <th>生年月日</th><td>2xxx年x月x日</td>
                    </tr>
                    <tr>
                        <th>性別</th><td>男女</td>
                    </tr>
                    <tr>
                        <th>身長</th><td>300cm</td>
                    </tr>
                    <tr>
                        <th>体重</th><td>500kg</td>
                    </tr>
                </table>
            </div>
            <div class="wrapper">
                <div class="follower">
                    <h2 class="title">友達</h2>
                    <div class="wrapper">
                        <div class="count">
                            <p class="followerCounter">3</p>
                            <p>フォロー中</p>
                        </div>
                        <div class="count">
                            <p class="followerCounter">3</p>
                            <p>フォロワー</p>
                        </div>
                    </div>
                </div>
                <div class="goal">
                    <h2 class="title">ゴール</h2>
                    <table>
                        <tr>
                            <th>目標</th><td>バッキバキになる</td>
                        </tr>
                        <tr>
                            <th>運動習慣</th><td>プッシュアップ20000回</td>
                        </tr>
                    </table>
                </div>
            </div>
        </article>
     </section>
@endsection
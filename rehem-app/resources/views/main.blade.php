@extends('layouts.base')

@section('content')
    <section class="record">
        <div class="graph"></div>
        <div class="indicator">
            <div class="wrapper">
                <div class="todayTotal">
                    <p class="title">今日</p>
                    <p class="count">20時間</p>
                </div>
                <div class="weeklyTotal">
                    <p class="title">今週</p>
                    <p class="count">100時間</p>
                </div>
            </div>
            <div class="wrapper">
                <div class="oxygenPacentage">
                    <p class="aerobic">有酸素 20%</p>
                    <p class="anoxic">無酸素 80%</p>
                </div>
                <a href="{{ route('record') }}" class="commonXLButton">筋トレした！</a>
            </div>
        </div>
    </section>
    <section class="post">
        <article class="postForm">
            <div class="postFormItem">
                <div class="wrapper">
                    <div class="userIcon"></div>
                    <input class="postInput" type="text" placeholder="いま何してる？">
                </div>
                <button class="commonButton" type="submit">投稿する</button>
            </div>
        </article>
        <article class="postFeed">
            <ul>
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <!-- for文で繰り返し -->
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <li class="postCard">
                    <div class="wrapper">
                        <div class="userIcon"></div>
                        <div class="likeIndicator">
                            <p class="likeCount">270</p>
                            <button class="likeButton"></button>
                        </div>
                    </div>
                    <p class="postContent">テキストテキストテキストテキストテキストテキスト</p>
                    <div class="divider"></div>
                </li>
                <!-- for文で繰り返し -->
            </ul>
        </article>
        <article class="switchFollow">
            <button class="switchToAllButton active">全て</button>
            <button class="switchToFollowerButton">フォロー中</button>
        </article>
    </section>
@endsection
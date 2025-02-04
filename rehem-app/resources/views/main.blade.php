@extends('layouts.base')

@section('content')
    <section class="record">
        <div class="graph">
            <canvas id="activityChart"></canvas>
        </div>
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
                    <div class="wrapper">
                        <div class="aerobicIcon icon"></div>
                        <p class="aerobic">有酸素 20%</p>
                    </div>
                    <div class="wrapper">
                        <div class="anoxicIcon icon"></div>
                        <p class="anoxic">無酸素 80%</p>
                    </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const labels = @json($activityCounts->pluck('date'));
            const aerobicData = @json($activityCounts->pluck('total_aerobic'));
            const anoxicData = @json($activityCounts->pluck('total_anoxic'));

            const ctx = document.getElementById('activityChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: '有酸素運動',
                            data: aerobicData,
                            borderColor: 'blue',
                            fill: false
                        },
                        {
                            label: '無酸素運動',
                            data: anoxicData,
                            borderColor: 'red',
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
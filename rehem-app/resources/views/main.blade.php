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
                    <p class="count">{{$activityCountsToday->total_aerobic}}</p>
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
        const data = {
            labels: [
                @foreach($activityCounts as $activity)
                    "{{ $activity->date }}", 
                @endforeach
            ], // 日付のラベル

            datasets: [
                {
                    label: "有酸素",
                    data: [
                        @foreach($activityCounts as $activity)
                            {{ $activity->total_aerobic }},
                        @endforeach
                    ],  // 有酸素データ
                    backgroundColor: "#59C3DC", // 有酸素の棒色
                },
                {
                    label: "無酸素",
                    data: [
                        @foreach($activityCounts as $activity)
                            {{ $activity->total_anoxic }},
                        @endforeach
                    ],  // 無酸素データ
                    backgroundColor: "#134074", // 無酸素の棒色
                }
            ],
        };

        // グラフの設定
        const options = {
            // responsive: false,
            title: {
                display: true,
                text: "有酸素と無酸素の積み上げ棒グラフ",
                fontSize: 20,
            },
            legend: {
                display: true,
                position: "top",
            },
            layout: {
                padding: {
                    left: 10,
                    right: 20,
                    top: 10,
                    bottom: 10,
                },
            },
            scales: {
                y: {
                    stacked: true,
                    ticks: {
                        beginAtZero: true,
                        stepSize: 20,
                        max: 250,
                        min: 0,
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "時間 (分)",
                        fontSize: 15,
                    },
                },
                x: {
                    stacked: true,
                    scaleLabel: {
                        display: true,
                        labelString: "日付",
                        fontSize: 15,
                    },
                    gridLines: {
                        display: false,
                    },
                }
            },
            elements: {
                bar: {
                    borderRadius: 10,  // ここでバーの角を丸くする
                }
            },
            maintainAspectRatio: false,
        };

        // canvasにグラフを描画
        const ctx = document.querySelector("#activityChart");
        const activityChart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options,
        });
    </script>
@endsection
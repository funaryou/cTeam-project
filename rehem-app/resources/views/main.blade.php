@extends('layouts.base')

@section('content')
    <section class="record">
        <div class="graph">
            <canvas id="activityChart"></canvas>
        </div>
        <div class="wrapper">
            <div class="indicator">
                <div class="wrapper">
                    <div class="todayTotal">
                        <p class="title">今日</p>
                        <p class="count">@formatTime($total_sum)</p>
                    </div>
                    <div class="weeklyTotal">
                        <p class="title">今週</p>
                        <p class="count">@formatTime($weeklyTotals->total)</p>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="oxygenPacentage">
                        <div class="wrapper">
                            <div class="aerobicIcon icon"></div>
                            <div class="aerobic textWrapper"><h2>{{$aerobicPercent}}%</h2><p>有酸素</p></div>
                        </div>
                        <div class="wrapper">
                            <div class="anoxicIcon icon"></div>
                            <div class="anoxic textWrapper"><h2>{{$anoxicPercent}}%</h2><p>無酸素</p></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="recordCard">
                <h2>記録しよう！</h2>
                <p class="description">運動した時間を記録することで日々のモチベーションをアップしよう</p>
                <a href="{{ route('record') }}" class="commonXLButton"><div class="icon record"></div><p>筋トレした！</p></a>
            </div>
        </div>
    </section>
    <section class="post">
        <article class="postForm">
            <form method="POST" action="{{ route('rehem.post_store') }}">
                @csrf
                <div class="postFormItem">
                    <div class="wrapper">
                        <div class="userIcon">
                            <img class="userIcon" src="{{ asset('storage/' . $account->profile_pic ) }}" alt="#">
                        </div>
                        <input class="postInput" type="text" name="content" value="{{ old('content') }}" placeholder="今何してる？" required>
                    </div>
                    <button class="commonButton" type="submit"><div class="icon post"></div><p>投稿する</p></button>
                </div>
            </form>
        </article>
        <article class="postFeed">
            <ul>
                @foreach ($posts as $post)
            
                    <li class="postCard">
                        <div class="wrapper">
                            <a href="{{ route('profile', ['id' => $post->author->id]) }}" class="user">
                                <div class="userIcon">
                                    <img class="userIcon" src="{{ asset('storage/' . $post->author->profile_pic ) }}" alt="#">
                                </div>
                                <p>{{ $post->author->user_name}}</p>
                            </a>
                            
                            <div class="likeIndicator">
                                <p class="likeCount">{{ $post["likes"] }}</p>
                            </div>
                        </div>
                        <p class="postContent">{{ $post["content"] }}</p>
                        <div class="divider"></div>
                    </li>
            
                @endforeach
            </ul>
            {{-- <ul>
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
            </ul> --}}
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
                    "{{ $activity["date"] }}", 
                @endforeach
            ], // 日付のラベル

            datasets: [
                {
                    label: "有酸素",
                    data: [
                        @foreach($activityCounts as $activity)
                            {{ $activity["total_aerobic"] }},
                        @endforeach
                    ],  // 有酸素データ
                    backgroundColor: "#59C3DC", // 有酸素の棒色
                },
                {
                    label: "無酸素",
                    data: [
                        @foreach($activityCounts as $activity)
                            {{ $activity["total_anoxic"] }},
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
        console.log(data);
        const ctx = document.querySelector("#activityChart");
        const activityChart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options,
        });
    </script>
@endsection
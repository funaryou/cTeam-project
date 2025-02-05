@extends('layouts.base')

@section('content')
    <div class="profileWrapper">
        <section class="userProfile">
            <article class="upperSection">
                <div class="uesrIcon">
                    <img class="uesrIcon" src="{{ asset('storage/' . $account->profile_pic ) }}" alt="#">
                </div>
                <div class="wrapper">
                    <p class="name">{{ $account->user_name}}</p>
                    <p class="message">{{ $account->profile_word}}</p>
                </div>
                @auth
                    @if (auth()->id() == $account->id)
                        <a href="{{ route('edit', ['id' => $account->id]) }}" class="commonButton edit">
                            <div class="icon edit"></div>
                            <p>
                                プロフィールを編集
                            </p>
                        </a>
                    @endif
                @endauth
            </article>
            <div class="divider"></div>
            <article class="lowerSection">
                <div class="userInfomation">
                    <h2 class="title">プロフィール</h2>
                    <table>
                        <tr>
                            <th>生年月日</th><td>{{ $account->age }} 歳</td>
                        </tr>
                        <tr>
                            <th>身長</th><td>{{$account->stature}}cm</td>
                        </tr>
                        <tr>
                            <th>体重</th><td>{{$account->weight}}kg</td>
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
                                <th>目標</th><td>{{$account->target}}</td>
                            </tr>
                            <tr>
                                <th>運動習慣</th><td>{{$account->lifestyle}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </article>
        </section>
        <section class="record onProfile">
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
            </div>
        </section>
    </div>

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
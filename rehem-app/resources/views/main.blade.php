<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rehem Dashboard</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">    
</head>
<body>
    <header class="sidebar">
        <ul class="nav">
            <li class="home navItem"><a href=""></a></li>
            <div class="divider"></div>
            <li class="addRecord navItem"><a href=""></a></li>
            <div class="divider"></div>
            <li class="profile navItem"><a href=""></a></li>
        </ul>
    </header>
    <main>
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
                    <a href="" class="recordButton">筋トレした！</a>
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
                    <button class="postButton" type="submit">投稿する</button>
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
    </main>
</body>
</html>
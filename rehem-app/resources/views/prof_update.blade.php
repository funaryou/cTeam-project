@extends('layouts.base')

@section('content')
     <form action="{{route("prof_update", ["id" => $account->id])}}" class="userProfile">
        <article class="upperSection">
            <div class="uesrIcon"></div>
            <div class="wrapper">
                <p class="name"><input name="user_name" type="text" placeholder="{{$account->user_name}}"></p>
                <p class="message"><input name="profile_word" placeholder="{{$account->profile_word}}"></input></p>
            </div>
            <div class="buttonWrapper">
                <button type="submit" class="commonButton edit">変更を確定</button>
                <a href="{{route("profile", ["id" => $account->id])}}" class="commonButton cancel">キャンセル</a>
            </div>
        </article>
        <div class="divider"></div>
        <article class="lowerSection">
            <div class="userInfomation">
                <h2 class="title">プロフィール</h2>
                <table>
                    <tr>
                        <th>生年月日</th><td><input name="age" type="text" placeholder="{{$account->age}}"></td>
                    </tr>
                    <tr>
                        <th>身長</th><td><input name="stature" type="text" placeholder="{{$account->stature}}"></td>
                    </tr>
                    <tr>
                        <th>体重</th><td><input name="weight" type="text" placeholder="{{$account->weight}}"></td>
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
                            <th>目標</th><td><input name="target" type="text" placeholder="{{$account->target}}"></td>
                        </tr>
                        <tr>
                            <th>運動習慣</th><td><input name="lifestyle" type="text" placeholder="{{$account->lifestyle}}"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </article>
     </form>
@endsection
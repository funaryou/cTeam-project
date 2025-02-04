<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">   
</head>
<body>
    <main class="login">
        <section class="loginCard">
            <h2 class="banner">login</h2>
            <form class="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <p>
                    mailaddress:
                    <input type="email" name="email" required>
                </p>

                <p>
                    password:
                    <input type="password" name="password" required>
                </p>

                <button class="commonButton" type="submit">ログイン</button>
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
            
            @if ($user)
                <p>User Name: {{ $user->user_name }}</p>
                <!-- 他のユーザー情報も表示できます -->
            @else
                <p>No user is logged in.</p>
            @endif

            <a href="{{ route('logout') }}">Logout</a>
        </section>
    </main>
</body>
</html>
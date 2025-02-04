<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <h2 class="banner">register</h2>

            <form class="loginForm" method="POST" action="{{ url('account/register') }}" enctype="multipart/form-data">
                @csrf
                <p>
                    user_name:
                    <input type="text" name="user_name">
                </p>

                <p>
                    email:
                    <input type="email" name="email" required>
                </p>

                <p>
                    password:
                    <input type="password" name="password" required>
                </p>

                <p>
                    password_check:
                    <input type="password" name="password_confirmation" required>
                </p>

                <p>
                    profile_picture:
                    <input type="file" name="profile_pic">
                </p>

                <button class="commonButton" type="submit"> create </button>

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
        </section>
    </main>
</body>
</html>
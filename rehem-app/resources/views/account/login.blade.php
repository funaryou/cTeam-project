<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    login 
    <form method="POST" action="{{ route('login') }}">
        @csrf
        mailaddress:
        <input type="email" name="email" required>

        password:
        <input type="password" name="password" required>

        <button type="submit">login</button>
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
    <p>Email: {{ $user->email }}</p>
    <p>Profile Picture: <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture"></p>
    <!-- 他のユーザー情報も表示できます -->
@else
    <p>No user is logged in.</p>
@endif

<a href="{{ route('logout') }}">Logout</a>

</body>
</html>
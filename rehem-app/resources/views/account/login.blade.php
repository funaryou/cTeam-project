<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    login 
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        mailaddress:
        <input type="email" name="email" required>

        password:
        <input type="password" name="password" required>

        <button type="submit">login</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
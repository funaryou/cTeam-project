<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    register

    <form method="POST" action="{{ url('account/register') }}" enctype="multipart/form-data">
        @csrf
        user_name:
        <input type="text" name="user_name">

        email:
        <input type="email" name="email" required>

        password:
        <input type="password" name="password" required>

        password_check:
        <input type="password" name="password_confirmation" required>

        profile_picture:
        <input type="file" name="profile_pic">

        <button type="submit"> create </button>

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

</body>
</html>
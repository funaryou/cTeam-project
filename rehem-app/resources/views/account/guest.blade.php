<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guest</title>
</head>
<body>
    guest login  
    <form action="{{ route('guest') }}" method="POST">
        @csrf
        <button type="submit">ゲストとしてログイン</button>
    </form>

</body>
</html>
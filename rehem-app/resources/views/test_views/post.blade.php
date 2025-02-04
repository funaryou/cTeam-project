{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    test
    <form method="POST" action="{{ route("rehem.post_store") }}">
        @csrf
        <br>
        content:<textarea placeholder="新規POST" name="content"></textarea>
        <button type="submit">post</button>
    </form>

    @foreach ($posts as $post)
        
    
    <ul>
        <li>
            {{ $post->author ? $post->author->user_name : 'Unknown Author' }}  <!--←user name -->
            {{ $post["content"] }}<!--post内容 -->
            
        </li>
    </ul>

    @endforeach
</body>
</html> --}}
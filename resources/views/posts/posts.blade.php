<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @foreach ($posts as $key => $post)
        <li> <a href="/posts/{{ $post->id }}"> {{ $post->title }} </a> </li>
    @endforeach
</body>
</html>
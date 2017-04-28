<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<h1> {{ $post->id }} </h1>
	<p> {{ $post->name }} </p>
	<p> {{ $post->description }} </p>
	<p> {{ $post->short_description }} </p>
	<p> {{ $post->visits }} </p>
	<img src="{{ $post->photo_url }}" />
</body>
</html>
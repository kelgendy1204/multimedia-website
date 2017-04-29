<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title></title>
</head>
<body>
	<h1> id - {{ $post->id }} </h1>
	<p> name - {{ $post->title }} </p>
	<p> description - {{ $post->description }} </p>
	<p> short_description - {{ $post->short_description }} </p>
	<p> visits - {{ $post->visits }} </p>
	<p> Visible - {{ $post->visible }} </p>
	<p> Pinned - {{ $post->pinned }} </p>
	<p> Category - {{ $category }} </p>
	<img src="{{ $post->photo_url }}" />
</body>
</html>
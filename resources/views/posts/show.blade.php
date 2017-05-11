@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	<div class="download">
		@if ($subpost)
			<div class="right">
				<a href="/posts/{{$post->id}}/online/{{$subpost->id}}"><img src="/dist/images/second/01.svg"></a>
			</div>
		@endif
		<div class="left"><a href="/posts/{{$post->id}}/download"><img src="/dist/images/second/02.svg"></a></div>
	</div>
@endsection
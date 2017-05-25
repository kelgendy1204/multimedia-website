@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	<div class="download">
		@if ($subpost)
			<div class="right">
				<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}"><img src="/dist/images/second/01.svg"></a>
			</div>
		@endif
		<div class="left"><a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist/images/second/02.svg"></a></div>
	</div>
@endsection
@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	<div class="post_description">
		{!! $post->long_description !!}
	</div>
	<div class="download">
		@if ($subpost)
			<div class="right">
				<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}"><img src="/dist_v2/images/second/01.svg" alt="online watch"/></a>
			</div>
		@endif
		@if ($post->download_page || $post->downloadlinks()->count())
			<div class="left"><a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist_v2/images/second/02.svg" alt="downloads" /></a></div>
		@endif
	</div>
@endsection
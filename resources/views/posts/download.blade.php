@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	<div class="downloadlinks">
		{!! $post->download_page !!}
	</div>
@endsection
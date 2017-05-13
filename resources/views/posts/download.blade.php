@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	@if (!empty($post->download_page))
		<div class="download_desc">
			{!! $post->download_page !!}
		</div>
	@endif
	<div class="downloadlinks">
		<div class="link">
			<h3>ep name</h3>
			<ul>
				<li><a href="#">server</a></li>
				<li><a href="#">server</a></li>
				<li><a href="#">server</a></li>
				<li><a href="#">server</a></li>
				<li><a href="#">server</a></li>
			</ul>
		</div>
	</div>
@endsection
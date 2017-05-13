@extends('layouts.showpost')

@section('content')
	<div class="img"><img src="{{ $post->photo_url }}"></div>
	@if (!empty($post->download_page))
		<div class="download_desc">
			{!! $post->download_page !!}
		</div>
	@endif
	<div class="downloadlinks">
{{-- 		@foreach ($downloadlinks as $downloadlink)
			<div class="link">
				<h3>{{$downloadlink->name}}</h3>
				@foreach ($downloadlink->downloadservers as $downloadserver)
					<li><a href="{{$downloadserver->link}}">{{$downloadserver->name}}</a></li>
				@endforeach
			</div>
		@endforeach --}}
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
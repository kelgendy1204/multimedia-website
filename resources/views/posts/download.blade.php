@extends('layouts.showpost')

@section('content')

	<div class="img"><img src="{{ $post->photo_url }}"></div>

	@if (!empty($post->download_page))
		<div class="download_desc">
			{!! $post->download_page !!}
		</div>
	@endif


	@if (!empty($downloadlinks))
		<div class="downloadlinks">
			@foreach ($downloadlinks as $downloadlink)
				@if (count($downloadlink->downloadservers) > 0)
					<div class="link">
						<h3>{{$downloadlink->name}}</h3>
						<ul>
							@foreach ($downloadlink->downloadservers as $downloadserver)
								<li><a href="{{$downloadserver->link}}" target="_blank">{{$downloadserver->name}}</a></li>
							@endforeach
						</ul>
					</div>
				@endif
			@endforeach
		</div>
	@endif

	@include('layouts.randomposts', ['classname' => 'downloadpage'])

@endsection
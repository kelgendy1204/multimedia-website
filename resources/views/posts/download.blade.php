@extends('layouts.showpost')

@section('content')

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=282317058844945";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

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

	<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>

@endsection
@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{ route('download', ['postdesc' => $post->description]) }}" />
@endsection

@section('content')
<div class="pagescontainer">

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=282317058844945";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div class="img downloadpage"><img src="{{ $post->photo_url }}"></div>

	<div class="otherlinks">

		@if (isset($latestsubpost))
			<div class="otherlink">
				<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $latestsubpost->title])}}"><img src="/dist_v6/images/second/3.svg" alt="online watch"/></a>
			</div>
		@endif

		@if (isset($latestplaylist))
			<div class="otherlink">
				<a href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $latestplaylist->title])}}"><img src="/dist_v6/images/second/2.svg" alt="Playlist"/></a>
			</div>
		@endif

	</div>

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

	@include('partials.randomposts', ['classname' => 'downloadpage'])

	<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>
</div>
@endsection
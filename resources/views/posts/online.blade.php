@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $activesubpost->title])}}" />
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

	<div class="page">
		<div class="servers">
			@foreach ($servers as $key=>$server)
				<a class="{{ $key == 0 ? "active" : "" }}" href="{{$server->link}}">{{$server->name}}</a>
			@endforeach
		</div>
		<div class="watch">
			<iframe width="100%" height="100%" frameborder="0" allowfullscreen src="{{count($servers) ? $servers[0]->link : ""}}"></iframe>
		</div>
		<div class="share-title">
			<h2 class="titlee">{{ (isset($activesubpost) && (count($subposts) > 1)) ? $activesubpost->title : ''}} </h2>
			<div class="share">
				<a class="socitem google-plus">
					<div class="g-plus" data-action="share" data-href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $activesubpost->title])}}" data-height="24"></div>
				</a>
				<a class="socitem twitter" href="https://twitter.com/intent/tweet?url={{route('showpost', ['postdesc' => $post->description])}}&text={{$post->title}}&hashtags={{$post->key_words}}"></a>
				<a class="socitem facebook"></a>
			</div>
		</div>

		<div class="otherlinks">
			@if ($post->downloadlinks()->count())
				<div class="otherlink">
					<a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist_v6/images/second/4.svg" alt="downloads" /></a>
				</div>
			@endif

			@if (isset($latestplaylist))
				<div class="otherlink">
					<a href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $latestplaylist->title])}}"><img src="/dist_v6/images/second/2.svg" alt="Playlist"/></a>
				</div>
			@endif
		</div>

		@if (count($subposts) > 1)
			<div class="new-topic">
				@if ($post->category->name_en == "arabic series" || $post->category->name_en == "tv" || $post->category->name_en == "english series")
					<div class="title-topic">
						الحلقات
					</div>
				@else
					<div class="title-topic">
						النسخ
					</div>
				@endif
				<div class="border-topic">
					@foreach ($subposts as $subpost)
						<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}">
							@if (isset($subpost->photo_url))
								<div class="topic-img" style="background-image: url('{{$subpost->photo_url}}')"> </div>
							@else
								<div class="topic-img" style="background-image: url('{{$post->photo_url}}')"> </div>
							@endif
							<p>{{$subpost->title}}</p>
						</a>
					@endforeach
				</div>
			</div>
		@endif

		@include('partials.randomposts', ['classname' => ''])

		<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>

	</div>

	<script>
		(function () {
			var serverLinks = document.querySelectorAll('.servers >a');
			var iframe = document.querySelector('iframe');
			serverLinks.forEach(function (item) {
				item.addEventListener('click', function(e){
					e.preventDefault();
					document.querySelector('.servers >a.active').classList.remove('active');
					iframe.src = this.href;
					this.classList.add('active');
				});
			});

			document.querySelector('.socitem.facebook').onclick = function() {
				window.open("https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}", "pop", "width=600, height=400, scrollbars=no");
				return false;
			};
		}());
	</script>
</div>
@endsection
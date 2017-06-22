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
{{-- 		<div class="playlists">
			<script type="text/javascript" src="/dist_v5/uncompiled/soundmanager2-nodebug-jsmin.js"></script>
			<div class="sm2-bar-ui playlist-open">
				<div class="bd sm2-main-controls">
					<div class="sm2-inline-texture"></div>
					<div class="sm2-inline-gradient"></div>
					<div class="sm2-inline-element sm2-button-element">
						<div class="sm2-button-bd">
							<a href="#play" class="sm2-inline-button sm2-icon-play-pause">Play / pause</a>
						</div>
					</div>
					<div class="sm2-inline-element sm2-inline-status">
						<div class="sm2-playlist">
							<div class="sm2-playlist-target">
								<noscript><p>JavaScript is required.</p></noscript>
							</div>
						</div>
						<div class="sm2-progress">
							<div class="sm2-row">
							<div class="sm2-inline-time">0:00</div>
							<div class="sm2-progress-bd">
								<div class="sm2-progress-track">
								<div class="sm2-progress-bar"></div>
								<div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
								</div>
							</div>
							<div class="sm2-inline-duration">0:00</div>
							</div>
						</div>
					</div>
					<div class="sm2-inline-element sm2-button-element sm2-volume">
						<div class="sm2-button-bd">
							<span class="sm2-inline-button sm2-volume-control volume-shade"></span>
							<a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
						</div>
					</div>
					<div class="sm2-inline-element sm2-button-element">
						<div class="sm2-button-bd">
							<a href="#prev" title="Previous" class="sm2-inline-button sm2-icon-previous">&lt; previous</a>
						</div>
					</div>
					<div class="sm2-inline-element sm2-button-element">
						<div class="sm2-button-bd">
							<a href="#next" title="Next" class="sm2-inline-button sm2-icon-next">&gt; next</a>
						</div>
					</div>
				</div>
				<div class="bd sm2-playlist-drawer sm2-element">
					<div class="sm2-inline-texture">
						<div class="sm2-box-shadow"></div>
					</div>
					<div class="sm2-playlist-wrapper">
						<ul class="sm2-playlist-bd">
							<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20LA%20%28Prod%20Chin%20Injetti%29.mp3"><b>SonReal</b> - LA</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20People%20Asking.mp3"><b>SonReal</b> - People Asking</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20Already%20There%20Remix%20ft.%20Rich%20Kidd%2C%20Saukrates.mp3"><b>SonReal</b> - Already There Remix ft. Rich Kidd, Saukrates</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/The%20Fugitives%20-%20Graffiti%20Sex.mp3"><b>The Fugitives</b> - Graffiti Sex</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/Adrian%20Glynn%20-%20Seven%20Or%20Eight%20Days.mp3"><b>Adrian Glynn</b> - Seven Or Eight Days</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/SonReal%20-%20I%20Tried.mp3"><b>SonReal</b> - I Tried</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/gong-192kbps.mp3">32" Gong Sounds (rubber + standard mallets)</a></li>
							<li><a href="http://freshly-ground.com/data/audio/mpc/20060826%20-%20Armstrong.mp3">Armstrong Beat</a></li>
							<li><a href="http://freshly-ground.com/data/audio/mpc/20090119%20-%20Untitled%20Groove.mp3">Untitled Groove</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/birds-in-kauai-128kbps-aac-lc.mp4">Birds In Kaua'i (AAC)</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/20130320%20-%20Po%27ipu%20Beach%20Waves.ogg">Po'ipu Beach Waves (OGG)</a></li>
							<li><a href="http://freshly-ground.com/data/audio/sm2/bottle-pop.wav">A corked beer bottle (WAV)</a></li>
							<li><a href="../../demo/_mp3/rain.mp3">Rain</a></li>
						</ul>
					</div>
					<div class="sm2-extra-controls">
						<div class="bd">
							<div class="sm2-inline-element sm2-button-element">
								<a href="#prev" title="Previous" class="sm2-inline-button sm2-icon-previous">&lt; previous</a>
							</div>
							<div class="sm2-inline-element sm2-button-element">
								<a href="#next" title="Next" class="sm2-inline-button sm2-icon-next">&gt; next</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="playlist-pic" style="background-image: url('{{$post->photo_url}}')"></div>
		</div>
		<script type="text/javascript" src="/dist_v5/js/online.js"></script>
--}}

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
							<div class="topic-img" style="background-image: url('{{$post->photo_url}}')"> </div>
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
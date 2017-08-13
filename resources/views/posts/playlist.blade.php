@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $activeplaylist->title])}}" />
@endsection

@section('content')
<div class="internal-pages-container">

	<div class="internalpages_right side-bans">
		@if ($advertisements->get('internalpages_right') && $advertisements->get('internalpages_right')->photo_url && $advertisements->get('internalpages_right')->link)
		<a href="{{$advertisements->get('internalpages_right')->link}}" target="_blank">
			<div class="image" style="background-image: url({{$advertisements->get('internalpages_right')->photo_url}})">
			</div>
		</a>
		@endif
	</div>

	<div class="pagescontainer internal-pages">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=282317058844945";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script type="text/javascript" src="/dist_v6/uncompiled/soundmanager2-nodebug-jsmin.js"></script>
		{{-- <script type="text/javascript" src="/dist_v6/uncompiled/soundmanager2.js"></script> --}}

		<div class="page">
			<div class="playlists">
				<div class="sm2-bar-ui playlist-open">
					<div class="bd sm2-main-controls">
						<div class="sm2-inline-texture"></div>
						{{-- <div class="sm2-inline-gradient"></div> --}}
						<div class="sm2-inline-element sm2-button-element">
							<div class="sm2-button-bd play">
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
											<div class="sm2-progress-ball">
												<div class="icon-overlay"></div>
											</div>
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
					<div class="lower-playlist">
						<div class="bd sm2-playlist-drawer sm2-element">
							<div class="sm2-inline-texture">
								<div class="sm2-box-shadow"></div>
							</div>
							<div class="sm2-playlist-wrapper">
								<ul class="sm2-playlist-bd">
									@foreach ($activeplaylist->audios as $audio)
										<li><a href="{{$audio->link}}"><b>{{$activeplaylist->title}}</b> - {{$audio->name}}</a></li>
									@endforeach
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
						@if (isset($activeplaylist->photo_url))
							<img class="playlist-pic" src="{{$activeplaylist->photo_url}}" alt="{{$post->description}}" />
						@else
							<img class="playlist-pic" src="{{$post->photo_url}}" alt="{{$post->description}}" />
						@endif
					</div>
				</div>
			</div>
			<script type="text/javascript" src="/dist_v6/js/playlist.js"></script>

			<div class="share-title">
				<h2 class="titlee">{{ (isset($activeplaylist) && (count($playlists) > 1)) ? $activeplaylist->title : ''}} </h2>
				<div class="share">
					<a class="socitem google-plus">
						<div class="g-plus" data-action="share" data-href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $activeplaylist->title])}}" data-height="24"></div>
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

				@if (isset($latestsubpost))
					<div class="otherlink">
						<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $latestsubpost->title])}}"><img src="/dist_v6/images/second/3.svg" alt="online watch"/></a>
					</div>
				@endif
			</div>

			@if (count($playlists) > 1)
				<div class="new-topic">
					<div class="title-topic">
						ألبومات
					</div>
					<div class="border-topic">
						@foreach ($playlists as $playlist)
							<a href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $playlist->title])}}">
								@if (isset($playlist->photo_url))
									<div class="topic-img" style="background-image: url('{{$playlist->photo_url}}')"> </div>
								@else
									<div class="topic-img" style="background-image: url('{{$post->photo_url}}')"> </div>
								@endif
								<p>{{$playlist->title}}</p>
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
				document.querySelector('.socitem.facebook').onclick = function() {
					window.open("https://www.facebook.com/sharer/sharer.php?u={{Request::fullUrl()}}", "pop", "width=600, height=400, scrollbars=no");
					return false;
				};
			}());
		</script>
	</div>
	<div class="internalpages_left side-bans">
		@if ($advertisements->get('internalpages_left') && $advertisements->get('internalpages_left')->photo_url && $advertisements->get('internalpages_left')->link)
		<a href="{{$advertisements->get('internalpages_left')->link}}" target="_blank">
			<div class="image" style="background-image: url({{$advertisements->get('internalpages_left')->photo_url}})">
			</div>
		</a>
		@endif
	</div>
</div>
@endsection
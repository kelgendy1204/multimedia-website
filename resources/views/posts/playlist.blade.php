@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $activeplaylist->title])}}" />
@endsection

@section('content')
@if ($advertisements->get('home_top') && $advertisements->get('home_top')->photo_url && $advertisements->get('home_top')->link)
	<div class="home_top">
		<a href="{{$advertisements->get('home_top')->link}}" class="home_top_link" target="_blank">
			<div class="imgbg_animated" data-audio="/audio/1.mp3" style="background-image: url({{$advertisements->get('home_top')->photo_url}})">
			</div>
		</a>
	</div>
@endif
<div class="internal-pages-container">

	<div class="internalpages_right side-bans">

{{-- 		@if ($advertisements->get('internalpages_right') && $advertisements->get('internalpages_right')->photo_url && $advertisements->get('internalpages_right')->link)
		<a href="{{$advertisements->get('internalpages_right')->link}}" target="_blank">
			<div class="image" style="background-image: url({{$advertisements->get('internalpages_right')->photo_url}})">
			</div>
		</a>
		@endif --}}


		<a href="#" target="_blank">
			<div class="image" style="background-image: none;">
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/E085DD837BD2" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/14DC37504671" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/6D24A90B874F" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/777376426B85" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/02A6C941BE9C" style="overflow:hidden;width:125px;height:125px;"></iframe>
			</div>
		</a>

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
		<script type="text/javascript" src="/dist/uncompiled/soundmanager2-nodebug-jsmin.js"></script>
		{{-- <script type="text/javascript" src="/dist/uncompiled/soundmanager2.js"></script> --}}

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
									@if (count($activeaudios) > 0)
										@foreach ($activeaudios as $audio)
											<li><a href="{{$audio->link}}"><b>{{$activeplaylist->title}}</b> - {{$audio->name}}</a></li>
										@endforeach
									@endif
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
			<script type="text/javascript" src="/dist/js/playlist-9fc62b9738.js"></script>

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
						<a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist/images/second/4.svg" alt="downloads" /></a>
					</div>
				@endif

				@if (isset($latestsubpost))
					<div class="otherlink">
						<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $latestsubpost->title])}}"><img src="/dist/images/second/3.svg" alt="online watch"/></a>
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

			<div id="jubna3225" style="width: 850px;"></div>
			<script type="text/javascript">
				(function() {
				var params =
				{
				id: "6a7f8504-28a81cb9-00341c33-1176318a",
				d: "YWJvdWRjcm0uY29t",
				cb: ((new Date()).valueOf().toString())
				};
				var qs="";
				for(var key in params){qs+=key+"="+params[key]+"&"}
				qs=qs.substring(0,qs.length-1);
				var s = document.createElement("script");
				s.type= "text/javascript";
				s.setAttribute("data-cfasyn", "false");
				s.src = "https://jubna.com/ar/api/widget/3225?" + qs;
				s.async = true;
				document.getElementById("jubna3225").appendChild(s);
				})();
			</script>

			@include('partials.randomposts', ['classname' => ''])

			<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>

		</div>
	</div>
	<div class="internalpages_left side-bans">
		{{-- 		@if ($advertisements->get('internalpages_left') && $advertisements->get('internalpages_left')->photo_url && $advertisements->get('internalpages_left')->link)
		<a href="{{$advertisements->get('internalpages_left')->link}}" target="_blank">
			<div class="image" style="background-image: url({{$advertisements->get('internalpages_left')->photo_url}})">
			</div>
		</a>
		@endif --}}

		<a href="#" target="_blank">
			<div class="image" style="background-image: none;">
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/E085DD837BD2" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/14DC37504671" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/6D24A90B874F" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/777376426B85" style="overflow:hidden;width:125px;height:125px;"></iframe>
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/02A6C941BE9C" style="overflow:hidden;width:125px;height:125px;"></iframe>
			</div>
		</a>

	</div>
</div>
@endsection
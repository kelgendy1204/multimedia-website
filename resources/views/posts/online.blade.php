@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $activesubpost->title])}}" />
@endsection

@section('content')
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
				<div id="jubna3194"></div>
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
					s.src = "https://jubna.com/ar/api/widget/3194?" + qs;
					s.async = true;
					document.getElementById("jubna3194").appendChild(s);
					})();
				</script>
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

		<div class="page">
			<div class="servers">
				@foreach ($servers as $key=>$server)
					<a class="{{ $key == 0 ? "active" : "" }}" href="{{$server->link}}">{{$server->name}}</a>
				@endforeach
			</div>
			<div class="watch">
				<div class="your-video">
					<button class="close-video">X</button>
					<video autoplay>
						<source src="/videos/video1.mp4" type="video/mp4" />
					</video>
				</div>
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

		<script src="/dist_v6/js/online.js"></script>
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
				<div id="jubna3194"></div>
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
					s.src = "https://jubna.com/ar/api/widget/3194?" + qs;
					s.async = true;
					document.getElementById("jubna3194").appendChild(s);
					})();
				</script>
			</div>
		</a>

	</div>
</div>
@endsection
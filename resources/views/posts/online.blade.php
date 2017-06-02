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
				<a class="socitem google-plus"></a>
				<a class="socitem twitter"></a>
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

		@include('layouts.randomposts', ['classname' => ''])

		<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>

	</div>

	{{-- <script type="text/javascript" src="/dist_v2/js/online-e1692be55a.js"></script> --}}

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

			document.querySelector('.socitem.google-plus').onclick = function() {
				window.open('https://plus.google.com/share?url={{Request::fullUrl()}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
				return false;
			};

			document.querySelector('.socitem.twitter').onclick = function() {
				window.open('https://twitter.com/share?url={{Request::fullUrl()}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
				return false;
			};


		}());
	</script>
@endsection
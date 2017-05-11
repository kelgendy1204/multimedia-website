@extends('layouts.showpost')

@section('content')
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
			<a class="titlee">{{ isset($activesubpost)? $activesubpost->title : ''}} </a>
			<div class="share">
				<a class="instgram"><img alt="" src="/dist/images/in.svg"></a>
				<a class="google-plus"><img alt="" src="/dist/images/g.svg"></a>
				<a class="twitter"><img alt="" src="/dist/images/t.svg"></a>
				<a class="facebook"><img alt="" src="/dist/images/f.svg"></a>
			</div>
		</div>

		@if (count($subposts))
			<div class="new-ep">
				<div class="title-ep">الحلقات</div>
				<div class="border-ep">
					@foreach ($subposts as $subpost)
						<a href="/posts/{{$post->id}}/online/{{$subpost->id}}"><img alt="{{isset($subpost)? $subpost->title : ''}}" src="{{$post->photo_url}}"><p>{{isset($subpost)? $subpost->title : ''}}</p></a>
					@endforeach
				</div>
			</div>
		@endif

		<div class="old-topic">
			<div class="title-topic">مواضيع مهمة</div>
			<div class="border-topic">
				@foreach ($randomPosts as $randomPost)
					<a href="/posts/{{$randomPost->id}}"><img alt="{{$randomPost->description}}" src="{{$randomPost->photo_url}}"></a>
				@endforeach
			</div>
		</div>
	</div>
	{{-- <script type="text/javascript" src="/dist/js/online.js"></script> --}}
	<script>
		(function () {
			var serverLinks = document.querySelectorAll('.servers >a');
			var iframe = document.querySelector('iframe');
			serverLinks.forEach(function (item) {
				item.addEventListener('click', function(e){
					e.preventDefault();
					iframe.src = this.href;
				});
			});
		}());
	</script>
@endsection
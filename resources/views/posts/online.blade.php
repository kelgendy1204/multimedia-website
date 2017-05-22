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
			<h2 class="titlee">{{ (isset($activesubpost) && (count($subposts) > 1)) ? $activesubpost->title : ''}} </h2>
			<div class="share">
				<a class="socitem google-plus"></a>
				<a class="socitem twitter"></a>
				<a class="socitem facebook"></a>
			</div>
		</div>

		@if (count($subposts) > 1)
			<div class="new-topic">
				<div class="title-topic">الحلقات</div>
				<div class="border-topic">
					@foreach ($subposts as $subpost)
						<a href="/posts/{{$post->id}}/online/{{$subpost->id}}">
							<div class="topic-img" style="background-image: url('{{$post->photo_url}}')"> </div>
							<p>{{$subpost->title}}</p>
						</a>
					@endforeach
				</div>
			</div>
		@endif

		@include('layouts.randomposts', ['classname' => ''])

	</div>
	{{-- <script type="text/javascript" src="/dist/js/online.js"></script> --}}
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
				window.open("https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}", "pop", "width=600, height=400, scrollbars=no");
				return false;
			};

			document.querySelector('.socitem.google-plus').onclick = function() {
				window.open('https://plus.google.com/share?url={{Request::url()}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
				return false;
			};

			document.querySelector('.socitem.twitter').onclick = function() {
				window.open('https://twitter.com/share?url={{Request::url()}}', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
				return false;
			};


		}());
	</script>
@endsection
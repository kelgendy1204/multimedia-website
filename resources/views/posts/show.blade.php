@extends('layouts.showpost')

@section('content')
	<div class="postdetails">
		<div class="post_description">
			<div class="descriptioncontent">
				<div class="long_description">
					{!! $post->long_description !!}
				</div>
			</div>
		</div>
		<div class="img" style="background-image: url({{ $post->photo_url }})"></div>
	</div>
	<div class="share-title firstpage">
		<div class="share">
			<a class="socitem google-plus"></a>
			<a class="socitem twitter"></a>
			<a class="socitem facebook"></a>
		</div>
	</div>
	<div class="download">
		@if ($subpost)
			<div class="right">
				<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}"><img src="/dist_v2/images/second/01.svg" alt="online watch"/></a>
			</div>
		@endif
		@if ($post->download_page || $post->downloadlinks()->count())
			<div class="left"><a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist_v2/images/second/02.svg" alt="downloads" /></a></div>
		@endif
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
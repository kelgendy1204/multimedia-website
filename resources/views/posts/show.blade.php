@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{ route('showpost', ['postdesc' => $post->description]) }}" />
@endsection

@section('content')
<div class="pagescontainer firstpage">
	<div class="firstpagecontainer">
		<div class="home_right side-bans">
			@if ($advertisements->get('home_right'))
			<a href="{{$advertisements->get('home_right')->link}}" target="_blank">
				<div class="image" style="background-image: url({{$advertisements->get('home_right')->photo_url}})">
				</div>
			</a>
			@endif
		</div>
		<div class="postdetailscontainer">
			<div class="postdetails {{$post->long_description ? "" : "nodesc"}}">
				@if ($post->long_description)
					<div class="post_description">
						<div class="descriptioncontent">
							<div class="long_description">
								{!! $post->long_description !!}
							</div>
						</div>
					</div>
				@endif
				<div class="img" style="background-image: url({{ $post->photo_url }})"></div>
			</div>
			<div class="share-title firstpage">
				<div class="share">

					<a class="socitem google-plus">
						<div class="g-plus" data-action="share" data-href="{{route('showpost', ['postdesc' => $post->description])}}" data-height="24"></div>
					</a>

					<a class="socitem twitter" href="https://twitter.com/intent/tweet?url={{route('showpost', ['postdesc' => $post->description])}}&text={{$post->title}}&hashtags={{$post->key_words}}"></a>

					<a class="socitem facebook"></a>

				</div>
			</div>
			<div class="download">
				@if ($subpost)
					<div class="right">
						<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}"><img src="/dist_v5/images/second/01.svg" alt="online watch"/></a>
					</div>
				@endif
				@if ($post->download_page || $post->downloadlinks()->count())
					<div class="left"><a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist_v5/images/second/02.svg" alt="downloads" /></a></div>
				@endif
			</div>

			<script>
				(function () {
					document.querySelector('.socitem.facebook').onclick = function() {
						window.open("https://www.facebook.com/sharer/sharer.php?u={{route('showpost', ['postdesc' => $post->description])}}", "pop", "width=600, height=400, scrollbars=no");
						return false;
					};
				}());
			</script>
		</div>
		<div class="home_right side-bans">
			@if ($advertisements->get('home_right'))
			<a href="{{$advertisements->get('home_right')->link}}" target="_blank">
				<div class="image" style="background-image: url({{$advertisements->get('home_right')->photo_url}})">
				</div>
			</a>
			@endif
		</div>
	</div>
</div>
@endsection
@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{ route('showpost', ['postdesc' => $post->description]) }}" />
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
<div class="pagescontainer firstpage">
	<div class="firstpagecontainer">


		<div class="showpost_right side-bans">
{{-- 			@if ($advertisements->get('showpost_right') && $advertisements->get('showpost_right')->photo_url && $advertisements->get('showpost_right')->link)
			<a href="{{$advertisements->get('showpost_right')->link}}" target="_blank">
				<div class="image" style="background-image: url({{$advertisements->get('showpost_right')->photo_url}})">
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
						<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $subpost->title])}}"><img src="/dist/images/second/3.svg" alt="online watch"/></a>
					</div>
				@endif

				@if ($playlist)
					<div class="middle">
						<a href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $playlist->title])}}"><img src="/dist/images/second/2.svg" alt="Playlist"/></a>
					</div>
				@endif

				@if ($post->download_page || $post->downloadlinks()->count())
					<div class="left"><a href="{{route('download', ['postdesc' => $post->description])}}"><img src="/dist/images/second/4.svg" alt="downloads" /></a></div>
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
		<div class="showpost_left side-bans">

{{-- 			@if ($advertisements->get('showpost_left') && $advertisements->get('showpost_left')->photo_url && $advertisements->get('showpost_left')->link)
			<a href="{{$advertisements->get('showpost_left')->link}}" target="_blank">
				<div class="image" style="background-image: url({{$advertisements->get('showpost_left')->photo_url}})">
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
</div>
@endsection
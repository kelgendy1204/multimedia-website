@extends('layouts.showpost')

@section('canonical')
	<link rel="canonical" href="{{ route('download', ['postdesc' => $post->description]) }}" />
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

		<div class="img downloadpage"><img src="{{ $post->photo_url }}"></div>

		<div class="otherlinks">

			@if (isset($latestsubpost))
				<div class="otherlink">
					<a href="{{route('online', ['postdesc' => $post->description, 'subposttitle' => $latestsubpost->title])}}"><img src="/dist_v6/images/second/3.svg" alt="online watch"/></a>
				</div>
			@endif

			@if (isset($latestplaylist))
				<div class="otherlink">
					<a href="{{route('playlist', ['postdesc' => $post->description, 'playlisttitle' => $latestplaylist->title])}}"><img src="/dist_v6/images/second/2.svg" alt="Playlist"/></a>
				</div>
			@endif

		</div>

		@if (!empty($post->download_page))
			<div class="download_desc">
				{!! $post->download_page !!}
			</div>
		@endif


		@if (!empty($downloadlinks))
			<div class="downloadlinks">
				@foreach ($downloadlinks as $downloadlink)
					@if (count($downloadlink->downloadservers) > 0)
						@if ($downloadlink->photo_url)
							<div class="linkimg-container">
								<img src="{{$downloadlink->photo_url}}" />
							</div>
						@endif
						<div class="link">
							<h3>{{$downloadlink->name}}</h3>
							<ul>
								@foreach ($downloadlink->downloadservers as $downloadserver)
									<li><a href="{{$downloadserver->link}}" target="_blank">{{$downloadserver->name}}</a></li>
								@endforeach
							</ul>
						</div>
					@endif
				@endforeach
			</div>
		@endif

		@include('partials.randomposts', ['classname' => 'downloadpage'])

		<div class="fb-comments" data-href="{{ route('showpost', ['postdesc' => $post->description]) }}" data-width="100%" data-numposts="10" order_by="social"></div>
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
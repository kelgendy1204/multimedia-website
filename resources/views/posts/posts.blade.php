<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Mazika2day</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="dist/css/home.css">
	</head>
	<body>
		<div class="mainpage">
			<header>
				<div class="elementscontainer">
					<div class="block-header">
						<div class="right">
							<a class="default1"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>الرئيسية</p></div></a>
							<a class="default2"><div class="pic"><img src="dist/images/montadayat.svg"></div><div class="content"><p>المنتديات</p></div></a>
						</div>
						<div class="left">
							<a class="instgram"><img src="dist/images/instgram.svg"></a>
							<a class="google-plus"><img src="dist/images/google.svg"></a>
							<a class="twitter"><img src="dist/images/twitter.svg"></a>
							<a class="facebook"><img src="dist/images/facebook.svg"></a>
						</div>
					</div>
				</div>
			</header>
			<section>
				<div class="banner"><img src="dist/images/banner.jpg"></div>
				<div class="sectioncontainer">
					<div class="elementscontainer">
						<div class="container-header">
							<div class="section">
								@foreach ($categories as $category)
									@include('layouts.categorylayout')
								@endforeach
							</div>
						</div>
					</div>
					<div class="elementscontainer">
						@if ($advertisements->get('home_top'))
							<a class="ads"><img src="{{$advertisements->get('home_top')->photo_url}}" alt="{{$advertisements->get('home_top')->name}}"></a>
						@endif
						<div class="center-search">
							<div class="search">
								<div class="section">
									<form method="get" action="{{Request::url()}}">
										<input name="search" type="text" placeholder="بـــحـــث" />
										<button class="logo">
											<img src="/dist/images/search-icon.svg">
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="list-container">
					@if ($advertisements->get('home_right'))
						<a class="ads-right"><img src="{{$advertisements->get('home_right')->photo_url}}" alt="{{$advertisements->get('home_right')->name}}"></a>
					@endif
					<div class="elementscontainer">
						<div class="items">
							@foreach ($posts as $post)
								@include('layouts.postlayout')
							@endforeach
						</div>
					</div>
					@if ($advertisements->get('home_left'))
						<a class="ads-left"><img src="{{$advertisements->get('home_left')->photo_url}}" alt="{{$advertisements->get('home_left')->name}}"></a>
					@endif
				</div>
				<div class="elementscontainer">
					@if ($advertisements->get('home_bottom'))
						<a class="ads"><img src="{{$advertisements->get('home_bottom')->photo_url}}" alt="{{$advertisements->get('home_bottom')->name}}"></a>
					@endif
				</div>
			</section>
			{{ $posts->appends($parameters)->links() }}
			<footer>
				<div class="elementscontainer">
					<div class="block-footer">
						<div class="content"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>
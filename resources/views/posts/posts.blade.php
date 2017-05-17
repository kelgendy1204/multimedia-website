<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Mazika2day</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="dist/css/home.css" />
{{-- 		<script
		  src="https://code.jquery.com/jquery-2.2.4.js"
		  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
		  crossorigin="anonymous"></script> --}}
	</head>
	<body>
		<div class="mainpage">


			<header>
				<div class="elementscontainer">
					<div class="right">

						<a class="menu" href="#">
							<div class="nav-icon">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>

						<a class="headercontent"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>الرئيسية</p></div></a>

						<a class="headercontent"><div class="pic"><img src="dist/images/montadayat.svg"></div><div class="content"><p>المنتديات</p></div></a>

					</div>
					<div class="left">
						<a class="socitem">
							<div class="soc-img google-plus"></div>
						</a>
						<a class="socitem">
							<div class="soc-img twitter"></div>
						</a>
						<a class="socitem">
							<div class="soc-img facebook"></div>
						</a>
					</div>
				</div>

				<div class="elementscontainer mobile">
					@if (count($categories))
						<ul>
							@foreach ($categories as $category)
									<li><a href="">{{$category->name}}</a></li>
							@endforeach
						</ul>
					@endif
				</div>

			</header>


			<section>
				<div class="elementscontainer">
					<div class="img-banner"></div>

					<div class="category_search">
						<ul class="container-header">
							@foreach ($categories as $category)
								<li>
									@include('layouts.categorylayout')
								</li>
							@endforeach
						</ul>

						<div class="search">
							<form method="get" action="{{Request::url()}}">
								<input name="search" type="text" placeholder="ابـــحـــث" />
								<button class="logo"></button>
							</form>
						</div>

						@if ($advertisements->get('home_top'))
							<a href="{{$advertisements->get('home_top')->link}}" class="home_top">
								<div style="background-image: url({{$advertisements->get('home_top')->photo_url}})">
								</div>
							</a>
						@endif
					</div>

					<div class="posts-container">

						@if ($advertisements->get('home_right'))
							<a href="{{$advertisements->get('home_right')->link}}" class="home_right side-bans">
								<div style="background-image: url({{$advertisements->get('home_right')->photo_url}})">
								</div>
							</a>
						@endif

						<div class="items">
							@foreach ($posts as $post)
								@include('layouts.postlayout')
							@endforeach
						</div>

						@if ($advertisements->get('home_left'))
							<a href="{{$advertisements->get('home_left')->link}}" class="home_left side-bans">
								<div style="background-image: url({{$advertisements->get('home_left')->photo_url}})">
								</div>
							</a>
						@endif
					</div>


					<div class="pagination-ban">

						@if ($advertisements->get('home_bottom'))
							<a href="{{$advertisements->get('home_bottom')->link}}" class="home_bottom">
								<div style="background-image: url({{$advertisements->get('home_bottom')->photo_url}})">
								</div>
							</a>
						@endif

						{{ $posts->appends($parameters)->links() }}

					</div>


				</div>
			</section>



			<footer>
				<div class="elementscontainer">
					<div class="copy">
						<div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
					</div>
				</div>
			</footer>


		</div>
		<script type="text/javascript" src="dist/js/home.js"></script>
	</body>
</html>
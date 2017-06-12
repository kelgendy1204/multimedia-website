<a href="{{route('postsbycategory', ['categoryname' => $category->name])}}" class="category {{ $category->color }}">
	<div class="pic" style="background-image: url({{$category->photo_url}})"></div>
	<div class="content">
		<h2>{{ $category->name }}</h2>
	</div>
</a>

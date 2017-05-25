<a href="{{route('postsbycategory', ['categoryname' => $category->name])}}" class="category {{ $category->color }}">
	<div class="pic" style="background-image: url({{$category->photo_url}})"></div>
	<div class="content">
		<p>{{ $category->name }}</p>
	</div>
</a>

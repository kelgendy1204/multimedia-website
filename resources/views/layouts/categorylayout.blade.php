<a href="{{Request::url()}}?category={{$category->name_en}}" class="category {{ $category->name_en }}">
	<div class="pic" style="background-image: url({{$category->photo_url}})"></div>
	<div class="content">
		<p>{{ $category->name }}</p>
	</div>
</a>

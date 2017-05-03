<a href="{{Request::url()}}?category={{$category->name_en}}" class="categories {{ $category->name_en }}">
	<div class="pic">
		<img src="{{ $category->photo_url }}">
	</div>
	<div class="content">
		<p>{{ $category->name }}</p>
	</div>
</a>
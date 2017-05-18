<div class="new-topic{{" " . $classname}}">
	<div class="title-topic">مواضيع مهمة</div>
	<div class="border-topic">
		@foreach ($randomPosts as $randomPost)
			<a href="/posts/{{$randomPost->id}}">
				<div class="topic-img" style="background-image: url('{{$randomPost->photo_url}}')"></div>
			</a>
		@endforeach
	</div>
</div>
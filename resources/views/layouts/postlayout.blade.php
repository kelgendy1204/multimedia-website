<a href="{{Request::url()}}/posts/{{$post->id}}" class="item {{$post->category_name_en}}">
	<img src="{{$post->photo_url}}">
	<p>{{$post->title}}</p>
</a>
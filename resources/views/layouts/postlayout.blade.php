<a href="{{Request::url()}}/posts/{{$post->id}}" class="item {{$post->category_name_en}}">
	<img src="{{$post->photo_url}}" alt="{{$post->title}}">
	<p>{{$post->title}}</p>
</a>
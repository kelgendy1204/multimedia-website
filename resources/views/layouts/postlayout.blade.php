<a href="{{ route('showpost', ['postdesc' => $post->description]) }}" class="item {{$post->category_color}}">
	<div class="post-img" style="background-image: url('{{$post->photo_url}}')"></div>
	<h3>{{$post->title}}</h3>
</a>
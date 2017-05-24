<a href="{{ route('postshome', ['postdesc' => $post->description]) }}" class="item {{$post->category_color}}">
	<div class="post-img" style="background-image: url('{{$post->photo_url}}')"></div>
	<p>{{$post->title}}</p>
</a>
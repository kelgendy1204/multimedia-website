<a href="{{ $post->alt_link ? route('showaltpost', ['postdesc' => $post->description, 'num' => $post->alt_link]) : route('showpost', ['postdesc' => $post->description])}}" class="item {{$post->category_color}}">
	<div class="post-img" style="background-image: url('{{$post->photo_url}}')"></div>
	<h3>{{$post->title}}</h3>
</a>
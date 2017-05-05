@extends('layouts.showpost')

@section('content')
	<div class="downloadlinks">
		{!! $post->download_page !!}
	</div>
@endsection
@extends('layouts.showpost')

@section('content')
	<div class="linkcontainer">
		@isset ($link)
			<a href="{{$link}}">
				go to link
			</a>
		@endisset
		@isset ($hash)
			<a href="{{ "/getlink/" . $hash}}">
				generate the link
			</a>
		@endisset
	</div>
@endsection
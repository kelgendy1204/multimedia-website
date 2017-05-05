@extends('layouts.showpost')

@section('content')
    <div class="download">
        <div class="right"><a href="/posts/{{$post->id}}/online"><img src="/dist/images/second/01.svg"></a></div>
        <div class="left"><a href="/posts/{{$post->id}}/download"><img src="/dist/images/second/02.svg"></a></div>
    </div>
@endsection
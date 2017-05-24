@extends('layouts.links')

@section('content')
    @isset ($link)
        <div class="top getlink">
            <div class="left"></div>
            <div class="right"></div>
        </div>
        <a href="{{$link}}" target="_blank">
            Go To Link
        </a>
        <div class="bottom getlink">
            <div class="left"></div>
            <div class="right"></div>
        </div>
    @endisset
    @isset ($hash)
        <div class="top">
        </div>
        <a href="{{ "/getlink/" . $hash}}">
            Generate The Link
        </a>
        <div class="bottom ">
        </div>
    @endisset
@endsection
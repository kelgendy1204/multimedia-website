@extends('layouts.links')

@section('content')
    @isset ($link)
        <a href="{{$link}}" target="_blank">
            go to link
        </a>
    @endisset
    @isset ($hash)
    <a href="{{ "/getlink/" . $hash}}">
        generate the link
    </a>
    @endisset
@endsection
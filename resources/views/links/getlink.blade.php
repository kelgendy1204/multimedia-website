@extends('layouts.links')

@section('content')
    @isset ($link)
        <div class="top getlink">
            <div class="right">
                @if ($advertisements->get('getlinks_top_right') && $advertisements->get('getlinks_top_right')->photo_url && $advertisements->get('getlinks_top_right')->link)
                <a href="{{$advertisements->get('getlinks_top_right')->link}}" target="_blank">
                    <div class="img-container image-s">
                        <img src="{{$advertisements->get('getlinks_top_right')->photo_url}}">
                    </div>
                </a>
                @endif
            </div>
            <div class="left">
                @if ($advertisements->get('getlinks_top_left') && $advertisements->get('getlinks_top_left')->photo_url && $advertisements->get('getlinks_top_left')->link)
                <a href="{{$advertisements->get('getlinks_top_left')->link}}" target="_blank">
                    <div class="img-container image-s">
                        <img src="{{$advertisements->get('getlinks_top_left')->photo_url}}">
                    </div>
                </a>
                @endif
            </div>
        </div>
        <a href="{{$link}}" target="_blank" class="linkbtn">
            Go To Link
        </a>
        <div class="bottom getlink">
            <div class="right">
                @if ($advertisements->get('getlinks_bottom_right') && $advertisements->get('getlinks_bottom_right')->photo_url && $advertisements->get('getlinks_bottom_right')->link)
                <a href="{{$advertisements->get('getlinks_bottom_right')->link}}" target="_blank">
                    <div class="img-container image-s">
                        <img src="{{$advertisements->get('getlinks_bottom_right')->photo_url}}">
                    </div>
                </a>
                @endif
            </div>
            <div class="left">
                @if ($advertisements->get('getlinks_bottom_left') && $advertisements->get('getlinks_bottom_left')->photo_url && $advertisements->get('getlinks_bottom_left')->link)
                <a href="{{$advertisements->get('getlinks_bottom_left')->link}}" target="_blank">
                    <div class="img-container image-s">
                        <img src="{{$advertisements->get('getlinks_bottom_left')->photo_url}}">
                    </div>
                </a>
                @endif
            </div>
        </div>
    @endisset
    @isset ($hash)
        <div class="top">
            @if ($advertisements->get('links_top') && $advertisements->get('links_top')->photo_url && $advertisements->get('links_top')->link)
            <a href="{{$advertisements->get('links_top')->link}}" target="_blank">
                <div class="img-container image-h">
                    <img src="{{$advertisements->get('links_top')->photo_url}}">
                </div>
            </a>
            @endif
        </div>
        <a href="{{ "/getlink/" . $hash}}" class="linkbtn">
            Generate The Link
        </a>
        <div class="bottom ">
            @if ($advertisements->get('links_bottom') && $advertisements->get('links_bottom')->photo_url && $advertisements->get('links_bottom')->link)
            <a href="{{$advertisements->get('links_bottom')->link}}" target="_blank">
                <div class="img-container image-h">
                    <img src="{{$advertisements->get('links_bottom')->photo_url}}">
                </div>
            </a>
            @endif
        </div>
    @endisset
@endsection
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
        <div id="jubna3225" style="width: 850px;"></div>
        <script type="text/javascript">
            (function() {
            var params =
            {
            id: "6a7f8504-28a81cb9-00341c33-1176318a",
            d: "YWJvdWRjcm0uY29t",
            cb: ((new Date()).valueOf().toString())
            };
            var qs="";
            for(var key in params){qs+=key+"="+params[key]+"&"}
            qs=qs.substring(0,qs.length-1);
            var s = document.createElement("script");
            s.type= "text/javascript";
            s.setAttribute("data-cfasyn", "false");
            s.src = "https://jubna.com/ar/api/widget/3225?" + qs;
            s.async = true;
            document.getElementById("jubna3225").appendChild(s);
            })();
        </script>
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
        <div id="jubna3225" style="width: 850px;"></div>
        <script type="text/javascript">
            (function() {
            var params =
            {
            id: "6a7f8504-28a81cb9-00341c33-1176318a",
            d: "YWJvdWRjcm0uY29t",
            cb: ((new Date()).valueOf().toString())
            };
            var qs="";
            for(var key in params){qs+=key+"="+params[key]+"&"}
            qs=qs.substring(0,qs.length-1);
            var s = document.createElement("script");
            s.type= "text/javascript";
            s.setAttribute("data-cfasyn", "false");
            s.src = "https://jubna.com/ar/api/widget/3225?" + qs;
            s.async = true;
            document.getElementById("jubna3225").appendChild(s);
            })();
        </script>
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
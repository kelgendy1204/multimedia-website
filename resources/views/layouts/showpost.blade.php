<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/dist/css/home.css">
    </head>
    <body>
        <div class="insidepage">
            <header>
                <div class="second-block-header">
                    <div class="title-right">
                    @isset ($category)
                        <a>{{ $category->name }}</a>
                        <a><img src="{{$category->photo_url}}"></a>
                    @endisset
                    </div>
                    <div class="title-left">
                        <a> MaZiKa<span>2</span>daY</a>
                    </div>
                </div>
            </header>
            <section>
                @isset ($post)
                    <h1 class="title">
                        {{ $post->description }} {{ isset($activesubpost) ? " - " . $activesubpost->title : ''}}
                    </h1>
                @endisset
                <div class="pagescontainer">
                    @yield('content')
                </div>
            </section>
            <footer>
                <div class="block-footer">
                    <div class="content"><div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
                </div>
            </footer>

        </div>
    </body>
</html>
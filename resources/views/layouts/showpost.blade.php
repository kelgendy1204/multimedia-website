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
        <header class="second">
            <div class="second-block-header">
                <div class="title-right">
                    <a>{{ $category->name }}</a>
                    <a><img src="{{$category->photo_url}}"></a>
                </div>
                <div class="title-left">
                    <a> MaZiKa<span>2</span>daY  </a>
                </div>
            </div>
        </header>
        <section>
            <div class="sectioncontainer2">
                <div class="title"><p>{{ $post->description }}</p></div>
                <div class="img"><img src="{{ $post->photo_url }}"></div>
                @yield('content')
            </div>
        </section>
        <footer>
            <div class="block-footer">
                <div class="content"><div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
            </div>
        </footer>
    </body>
</html>
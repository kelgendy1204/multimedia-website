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
    <body class="page">
        <div class="insidepage">
            <header>
                <a>
                    <h1>
                        @isset ($category)
                            {{ $category->name }}
                            <img src="{{$category->photo_url}}">
                        @endisset
                    </h1>
                </a>
                <a class="logo" href="/"><img src="/dist/images/logo.svg" /></a>
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
                <div class="copy"><div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
            </footer>
        </div>
    </body>
</html>
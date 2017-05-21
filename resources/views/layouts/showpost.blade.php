<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="canonical" href="{{URL::to('/')}}" />
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" href="/dist/css/home.css">
    </head>
    <body class="page">
        <div class="insidepage">
            <header>
                @isset ($category)
                    <a href="{{URL::to('/')}}?category={{$category->name_en}}">
                        <h1>
                            {{ $category->name }}
                            <img src="{{$category->photo_url}}">
                        </h1>
                    </a>
                @endisset
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
                <div class="elementscontainer">
                    <div class="copy">
                        <div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
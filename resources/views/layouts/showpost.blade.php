<!doctype html>
<html lang="ar">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta http-equiv="Cache-control" content="public" />
        <title>{{$post->title}}</title>
        <meta name="description" content="{{$post->meta_description}}" />
        <meta name="keywords" content="{{$post->key_words}}" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#ffffff" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <link rel="manifest" href="/manifest.json" />
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
        @yield('canonical')

        <!-- markup for facebook -->
        <meta property="fb:app_id" content="282317058844945" />
        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{$post->title}}" />
        <meta property="og:description" content="{{$post->meta_description}}" />
        <meta property="og:image" content="{{URL::to('/')}}{{$post->photo_url}}" />

        <!-- markup for Google+ -->
        <meta itemprop="name" content="{{$post->title}}" />
        <meta itemprop="description" content="{{$post->meta_description}}" />
        <meta itemprop="image" content="{{URL::to('/')}}{{$post->photo_url}}" />

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="{{$post->title}}" />
        <meta name="twitter:description" content="{{$post->meta_description}}" />
        <meta name="twitter:image" content="{{URL::to('/')}}{{$post->photo_url}}" />

        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css" />

        <link rel="stylesheet" href="/dist_v6/css/home-1aa6fd11dd.css" />

        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

        @if ($scripts->value)
          {!! $scripts->value !!}
        @else
          <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-6197253-1', 'auto');
            ga('send', 'pageview');

            var zwaar_day = new Date();
            zwaar_day = zwaar_day.getDate();
            document.write("<script type='text\/javascript' src='" + (location.protocol == 'https:' ? 'https:' : 'http:') + "//code.zwaar.org\/pcode/code-673.js?day=" + zwaar_day + "'><\/script>");
          </script>
          <script type="text/javascript" src="//go.oclaserver.com/apu.php?zoneid=874590"></script>
        @endif

    </head>
    {{-- <body class="page {{ isset($_COOKIE['color']) ? $_COOKIE['color'] : ''}}"> --}}
    <body class="page">
        <div class="insidepage">
            <header>
                @isset ($category)
                    <div>
                        <a href="{{route('postsbycategory', ['categoryname' => $category->name])}}">
                            <p>
                                <strong>{{ $category->name }}</strong>
                            </p>
                            <img class="cat-img" src="{{$category->photo_url}}" alt="category" />
                        </a>
                    </div>
                @endisset
                <div class="logo">
                    <a href="{{URL::to('/')}}">
                        <img src="/dist_v6/images/logo.svg" alt="logo" />
                    </a>
                </div>
            </header>
            <section>
                <ul class="category-container">
                    <li>
                        <a href="{{url('/')}}" class="category">
                            <div class="pic" style="background-image: url(/dist_v6/images/home.svg)"></div>
                            <div class="content">
                                <h2>الرئيسية</h2>
                            </div>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    <li>
                        @include('partials.categorylayout')
                    </li>
                    @endforeach
                </ul>
                @isset ($post)
                    <h1 class="title">
                        {{ $post->description }} {{ isset($activesubpost) ? " - " . $activesubpost->title : ''}}
                    </h1>
                @endisset
                @yield('content')
            </section>
            <footer>
                <div class="elementscontainer">
                    <div class="copy">
                       <a href="{{URL::to('/')}}" class="pic"><img src="/dist_v6/images/home.svg" alt="homepage"></a><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
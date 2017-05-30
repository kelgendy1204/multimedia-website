<!doctype html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta http-equiv="Cache-control" content="public" />
        <title>{{$post->title}}</title>
        <meta name="description" content="{{$post->meta_description}}">
        <meta name="keywords" content="{{$post->key_words}}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="canonical" href="{{Request::fullUrl()}}" />

        <meta property="og:url" content="{{Request::fullUrl()}}" />
        <meta property="og:title" content="{{$post->title}}" />
        <meta property="og:description" content="{{$post->meta_description}}" />
        <meta property="og:image" content="{{URL::to('/')}}{{$post->photo_url}}" />


    {{-- <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="The Name or Title Here">
        <meta itemprop="description" content="This is the page description">
        <meta itemprop="image" content="http://www.example.com/image.jpg">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="Page Title">
        <meta name="twitter:description" content="Page description less than 200 characters">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="http://www.example.com/image.jpg">
        <meta name="twitter:data1" content="$3">
        <meta name="twitter:label1" content="Price">
        <meta name="twitter:data2" content="Black">
        <meta name="twitter:label2" content="Color">

        <!-- Open Graph data -->
        <meta property="og:title" content="Title Here" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.example.com/" />
        <meta property="og:image" content="http://example.com/image.jpg" />
        <meta property="og:description" content="Description Here" />
        <meta property="og:site_name" content="Site Name, i.e. Moz" />
        <meta property="og:price:amount" content="15.00" />
        <meta property="og:price:currency" content="USD" /> --}}

        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
        <link rel="stylesheet" href="/dist_v2/css/home.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-6197253-1', 'auto');
          ga('send', 'pageview');
        </script>
    </head>
    <body class="page">
        <div class="insidepage">
            <header>
                @isset ($category)
                    <div>
                        <h1>
                            <a href="{{route('postsbycategory', ['categoryname' => $category->name])}}">
                                {{ $category->name }}
                                <img src="{{$category->photo_url}}" alt="category" />
                            </a>
                        </h1>
                    </div>
                @endisset
                <div class="logo">
                    <a href="{{URL::to('/')}}">
                        <img src="/dist_v2/images/logo.svg" alt="logo" />
                    </a>
                </div>
            </header>
            <section>
                <ul class="category-container">
                    <li>
                        <a href="{{url('/')}}" class="category">
                            <div class="pic" style="background-image: url(/dist_v2/images/home.svg)"></div>
                            <div class="content">
                                <p>الرئيسية</p>
                            </div>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    <li>
                        @include('layouts.categorylayout')
                    </li>
                    @endforeach
                </ul>
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
                       <a href="{{URL::to('/')}}" class="pic"><img src="/dist_v2/images/home.svg" alt="homepage"></a><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
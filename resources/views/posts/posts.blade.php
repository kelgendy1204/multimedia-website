<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta http-equiv="Cache-control" content="public" />
        @if (isset($category))
            <title>
                مزيكا تو داي | {{$category->name}}
            </title>
            <meta property="og:title" content="مزيكا تو داي | {{$category->name}}" />
        @else
            <title>
                مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي
            </title>
            <meta property="og:title" content="مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي" />
        @endif

        @if (isset($category))
            <meta name="description" content="{{$category->meta_description}}">
            <meta name="keywords" content="{{$category->key_words}}">
            <meta property="og:description" content="{{$category->meta_description}}" />
        @else
            <meta name="description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة">
            <meta name="keywords" content="مشاهدة افلام مباشرة, مشاهدة افلام اون لاين عربى و اجنبى, تحميل واستماع اغانى عربية, اغاني شعبي مشاهدة مباشرة مسلسلات عربية, مشاهدة مسلسلات رمضان اون لاين,مشاهدة مباريات اون لاين, كليبات, اسلاميات, برامج, العاب, برامج الموبايل, العاب الموبايل, نغمات, عروض مصارعة, افلام مترجمة">
            <meta property="og:description" content="مشاهدة افلام مباشرة, مشاهدة افلام اون لاين عربى و اجنبى, تحميل واستماع اغانى عربية, اغاني شعبي مشاهدة مباشرة مسلسلات عربية, مشاهدة مسلسلات رمضان اون لاين,مشاهدة مباريات اون لاين, كليبات, اسلاميات, برامج, العاب, برامج الموبايل, العاب الموبايل, نغمات, عروض مصارعة, افلام مترجمة" />
        @endif

        <meta property="og:url" content="{{ Request::url() }}" />
        {{-- <meta property="og:image" content="{{$post->photo_url}}" /> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="canonical" href="{{Request::url()}}" />
        <link rel="stylesheet" href="/dist/css/home.css" />
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-6197253-1', 'auto');
          ga('send', 'pageview');
        </script>
    </head>
    <body>
        <div class="mainpage">
            <header>
                <div class="elementscontainer">
                    <div class="right">
                        <a class="menu" href="#">
                            <div class="nav-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <a class="headercontent" href="{{URL::to('/')}}"><div class="pic"><img src="/dist/images/home.svg"></div><div class="content"><p>الرئيسية</p></div></a>
                        <a class="headercontent" href="http://forums.mazika2day.com"><div class="pic"><img src="/dist/images/montadayat.svg"></div><div class="content"><p>المنتديات</p></div></a>
                    </div>
                    <div class="left">
                        <a href="https://plus.google.com/u/0/102472960087719695753" target="_blank" class="socitem">
                            <div class="soc-img google-plus"></div>
                        </a>
                        <a href="https://twitter.com/Mazika2dayGmai" target="_blank" class="socitem">
                            <div class="soc-img twitter"></div>
                        </a>
                        <a href="https://www.facebook.com/mazika2day.com.official" target="_blank" class="socitem">
                            <div class="soc-img facebook"></div>
                        </a>
                        <a class="logo" href="{{URL::to('/')}}">
                            <img src="/dist/images/logo.svg" />
                        </a>
                    </div>
                </div>

                <div class="elementscontainer mobile">
                    @if (count($categories))
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{route('postsbycategory', ['categoryname' => $category->name])}}">
                                    <div class="category-img" style="background-image: url({{$category->photo_url}})"></div>
                                    {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>

            </header>


            <section>
                <div class="elementscontainer">
                    <div class="img-banner"></div>

                    <div class="category_search">
                        <ul class="category-container">
                            @foreach ($categories as $category)
                            <li>
                                @include('layouts.categorylayout')
                            </li>
                            @endforeach
                        </ul>

                        <div class="search">
                            <form method="get" action="{{Request::url()}}">
                                <input name="search" type="text" placeholder="ابـــحـــث" />
                                <button class="logo"></button>
                            </form>
                        </div>

                        @if ($advertisements->get('home_top'))
                        <a href="{{$advertisements->get('home_top')->link}}" class="home_top">
                            <div style="background-image: url({{$advertisements->get('home_top')->photo_url}})">
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="posts-container">
                        @if ($advertisements->get('home_right'))
                        <a href="{{$advertisements->get('home_right')->link}}" class="home_right side-bans">
                            <div style="background-image: url({{$advertisements->get('home_right')->photo_url}})">
                            </div>
                        </a>
                        @endif
                        <div class="items">
                            @foreach ($posts as $post)
                                @include('layouts.postlayout')
                            @endforeach
                        </div>
                        @if ($advertisements->get('home_left'))
                        <a href="{{$advertisements->get('home_left')->link}}" class="home_left side-bans">
                            <div style="background-image: url({{$advertisements->get('home_left')->photo_url}})">
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="pagination-ban">
                        @if ($advertisements->get('home_bottom'))
                        <a href="{{$advertisements->get('home_bottom')->link}}" class="home_bottom">
                            <div style="background-image: url({{$advertisements->get('home_bottom')->photo_url}})">
                            </div>
                        </a>
                        @endif
                        {{ $posts->appends($parameters)->links() }}
                    </div>
                </div>
            </section>
            <footer>
                <div class="elementscontainer">
                    <div class="copy">
                        <a href="{{URL::to('/')}}" class="pic"><img src="/dist/images/home.svg"></a><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
                    </div>
                </div>
            </footer>
        </div>
        <script type="text/javascript" src="/dist/js/home.js"></script>
    </body>
</html>
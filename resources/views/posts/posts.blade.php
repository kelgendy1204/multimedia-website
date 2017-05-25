<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @if (isset($category))
            <title>
                مزيكا تو داي | {{$category->name}}
            </title>
        @else
            <title>
                مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي
            </title>
        @endif

        @if (isset($category))
            <meta name="description" content="{{$category->meta_description}}">
            <meta name="keywords" content="{{$category->key_words}}">
        @else
            <meta name="description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة">
            <meta name="keywords" content="مشاهدة افلام مباشرة, مشاهدة افلام اون لاين عربى و اجنبى, تحميل واستماع اغانى عربية, اغاني شعبي مشاهدة مباشرة مسلسلات عربية, مشاهدة مسلسلات رمضان اون لاين,مشاهدة مباريات اون لاين, كليبات, اسلاميات, برامج, العاب, برامج الموبايل, العاب الموبايل, نغمات, عروض مصارعة, افلام مترجمة">
        @endif

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/dist/css/home.css" />
        <link rel="canonical" href="{{Request::url()}}">
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
                        <ul class="container-header">
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
@extends('layouts.home')

@section('content')
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
                    <a class="headercontent" href="{{URL::to('/')}}"><div class="pic"><img src="/dist_v6/images/home.svg" alt="homepage"></div><div class="content"><p>الرئيسية</p></div></a>
                    <a class="headercontent" href="http://forums.mazika2day.com"><div class="pic"><img src="/dist_v6/images/montadayat.svg" alt="forum"></div><div class="content"><p>المنتديات</p></div></a>
                    <a class="headercontent" href="mailto:mado.mazika2day@gmail.com" target="_top"><div class="pic"><img src="/dist_v6/images/home.svg" alt="forum"></div><div class="content"><p>ارسل الينا</p></div></a>
                </div>
                <div class="center">
                    <button class="colorbtn grey" data-color="grey"></button>
                    <button class="colorbtn pink" data-color="pink"></button>
                    <button class="colorbtn blue" data-color="blue"></button>
                    <button class="colorbtn orange" data-color="orange"></button>
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
                        <img src="/dist_v6/images/logo.svg" alt="logo"/>
                    </a>
                </div>
            </div>

            <div class="elementscontainer mobile">
                @if (count($categories))
                <ul>
                    <li>
                        <a href="{{route('home')}}">
                            <div class="category-img" style="background-image: url(/dist_v6/images/home.svg)"></div>
                            <p>الرئيسية</p>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{route('postsbycategory', ['categoryname' => $category->name])}}">
                                <div class="category-img" style="background-image: url({{$category->photo_url}})"></div>
                                <p>{{$category->name}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>

        </header>


        <section>
            <div class="elementscontainer">

                @if (isset($activecategory))
                    <div class="img-banner" style="{{ $activecategory->category_banner ? 'background-image: url(' . $activecategory->category_banner . ')' : '' }}"></div>
                @else
                    <div class="img-banner" style="{{ $home_banner->value ? 'background-image: url(' . $home_banner->value . ')' : '' }}"></div>
                @endif

                <div class="category_search">
                    <ul class="category-container">
                        @foreach ($categories as $category)
                        <li>
                            @include('partials.categorylayout')
                        </li>
                        @endforeach
                    </ul>

                    <div class="search">
                        <form method="get" action="{{Request::url()}}">
                            <input name="search" type="text" placeholder="ابـــحـــث" />
                            <button class="logo"></button>
                        </form>
                    </div>

                    @if ($advertisements->get('home_top') && $advertisements->get('home_top')->photo_url && $advertisements->get('home_top')->link)
                        <div class="home_top">
                            <a href="{{$advertisements->get('home_top')->link}}" class="home_top_link" target="_blank">
                                <div class="imgbg_animated" style="background-image: url({{$advertisements->get('home_top')->photo_url}})">
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="posts-container">
                @if ($advertisements->get('home_right') && $advertisements->get('home_right')->photo_url && $advertisements->get('home_right')->link)
                    <div class="home_right side-bans">
                        <a href="{{$advertisements->get('home_right')->link}}" target="_blank">
                            <div class="image" style="background-image: url({{$advertisements->get('home_right')->photo_url}})">
                            </div>
                        </a>
                    </div>
                @endif
                <div class="items">
                    @foreach ($posts as $post)
                        @include('partials.postlayout')
                    @endforeach
                </div>
                @if ($advertisements->get('home_left') && $advertisements->get('home_left')->photo_url && $advertisements->get('home_left')->link)
                    <div class="home_left side-bans">
                        <a href="{{$advertisements->get('home_left')->link}}" target="_blank">
                            <div class="image" style="background-image: url({{$advertisements->get('home_left')->photo_url}})">
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <div class="pagination-ban elementscontainer">
                @if ($advertisements->get('home_bottom') && $advertisements->get('home_bottom')->photo_url && $advertisements->get('home_bottom')->link)
                    <div class="home_bottom">
                        <a href="{{$advertisements->get('home_bottom')->link}}" class="home_bottom_link" target="_blank">
                            <div class="imgbg_animated" style="background-image: url({{$advertisements->get('home_bottom')->photo_url}})">
                            </div>
                        </a>
                    </div>
                @endif
                {{ $posts->appends($parameters)->links() }}
            </div>
        </section>
        <footer>
            <div class="elementscontainer">
                <div class="copy">
                    <a href="{{URL::to('/')}}" class="pic"><img src="/dist_v6/images/home.svg" alt="homepage"></a><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="/dist_v6/js/home-c1916ba71c.js"></script>
@endsection

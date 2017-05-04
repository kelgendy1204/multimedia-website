{{-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @foreach ($posts as $key => $post)
        <li> <a href="/posts/{{ $post->id }}"> {{ $post->title }} </a> </li>
    @endforeach
</body>
</html> --}}


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="dist/css/home.css">
    </head>
    <body>
        <header>
            <div class="elementscontainer">
                <div class="block-header">
                    <div class="right">
                        <a href="{{Request::url()}}" class="default1"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>الرئيسية</p></div></a>
                        <a class="default2"><div class="pic"><img src="dist/images/montadayat.svg"></div><div class="content"><p>المنتديات</p></div></a>
                    </div>
                    <div class="center">
                        <a class="instgram"><img src="dist/images/instgram.svg"></a>
                        <a class="google-plus"><img src="dist/images/google.svg"></a>
                        <a class="twitter"><img src="dist/images/twitter.svg"></a>
                        <a class="facebook"><img src="dist/images/facebook.svg"></a>
                    </div>
                    <div class="left">
                        <div class="default1">
                            <div class="right"><div class="cir"></div></div>
                            <div class="left"><input type="text" placeholder="اسم المستخدم"></div>
                        </div>
                        <div class="default2">
                            <div class="right"><input type="text" placeholder="كلمة المرور"></div>
                            <div class="left"><div class="cir"></div></div>
                        </div>
                        <a class="default3"><p>تسجيل دخول</p></a>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <div class="banner"><img src="dist/images/banner.jpg"></div>
            <div class="sectioncontainer">
                <div class="elementscontainer">
                    <div class="container-header">
                        <div class="section">
                            @foreach ($categories as $category)
                                @include('layouts.categorylayout')
                            @endforeach
                        </div>
                        <div class="search">
                            <div class="section">
                                <form method="get" action="{{Request::url()}}">
                                    <input name="search" type="text" placeholder="بـــحـــث">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementscontainer">
                <a class="ads"><img src="{{$advertisements->get('home_top')->photo_url}}" alt="{{$advertisements->get('home_top')->name}}"></a>
            </div>
            <div class="list-container">
                <a class="ads-right"><img src="{{$advertisements->get('home_right')->photo_url}}" alt="{{$advertisements->get('home_right')->name}}"></a>
                <div class="elementscontainer">
                    <div class="items">
                        @foreach ($posts as $post)
                            @include('layouts.postlayout')
                        @endforeach
                    </div>
                </div>
                <a class="ads-left"><img src="{{$advertisements->get('home_left')->photo_url}}" alt="{{$advertisements->get('home_left')->name}}"></a>
            </div>
            <div class="elementscontainer">
                <a class="ads"><img src="{{$advertisements->get('home_bottom')->photo_url}}" alt="{{$advertisements->get('home_bottom')->name}}"></a>
            </div>
        </section>
        <div class="pagination">
            {{ $posts->appends($parameters)->links() }}
        </div>
        <footer>
            <div class="elementscontainer">
                <div class="block-footer">
                    <div class="content"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
                </div>
            </div>
        </footer>
    </body>
</html>
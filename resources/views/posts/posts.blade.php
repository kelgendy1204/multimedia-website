<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @foreach ($posts as $key => $post)
        <li> <a href="/posts/{{ $post->id }}"> {{ $post->title }} </a> </li>
    @endforeach
</body>
</html>

{{--
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
                        <a class="default1"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>الرئيسية</p></div></a>
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
                            <a class="song"><div class="pic"><img src="dist/images/icons/aghani.svg"></div><div class="content"><p>أغانى</p></div></a>
                            <a class="movies"><div class="pic"><img src="dist/images/icons/aflam.svg"></div><div class="content"><p>افلام</p></div></a>
                            <a class="games"><div class="pic"><img src="dist/images/icons/al3ab.svg"></div><div class="content"><p>ألعاب</p></div></a>
                            <a class="app"><div class="pic"><img src="dist/images/icons/brameg.svg"></div><div class="content"><p>برامـــج</p></div></a>
                            <a class="tv"><div class="pic"><img src="dist/images/icons/tv.svg"></div><div class="content"><p>Tv</p></div></a>
                            <a class="wwe"><div class="pic"><img src="dist/images/icons/wwe-1200x1200.png"></div><div class="content"><p>  المصارعـــة </p></div></a>
                            <a class="other"><div class="pic"><img src="dist/images/icons/okhra.svg"></div><div class="content"><p>منوعــات</p></div></a>
                        </div>
                        <div class="search">
                            <div class="section"><input type="text" placeholder="بـــحـــث"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementscontainer">
                <a class="ads"><img src="dist/images/ads/12.jpg"></a>
            </div>
            <div class="list-container">
                <a class="ads-right"><img src="dist/images/ads/123.PNG"></a>
                <div class="elementscontainer">
                    <div class="items">
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item song"><img src="dist/images/items/1.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item movies"><img src="dist/images/items/2.jpg"><p>فيلم صابر جوجل بطولة محمد رجب و سارة سلامة نسخه HDRip</p></a>
                        <a class="item app"><img src="dist/images/items/3.jpg"><p>Split 2016 480p & 720p BluRay مترجم</p></a>
                        <a class="item tv"><img src="dist/images/items/4.jpg"><p>البوم نانسي عجرم -حاسه بيك 2017 Cd Q 320Kpbs</p></a>
                        <a class="item wwe"><img src="dist/images/items/5.jpg"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                        <a class="item other"><img src="dist/images/items/6.jpg"><p>sleepless 2017 720p WEB-DL مترجم </p></a>
                        <a class="item games"><img src="dist/images/items/7.png"><p>اغنية اصالة نصري - لا تروح CD Q 320 Kbps</p></a>
                    </div>
                </div>
                <a class="ads-left"><img src="dist/images/ads/123.PNG"></a>
            </div>
            <div class="elementscontainer">
                <a class="ads"><img src="dist/images/ads/12.jpg"></a>
            </div>
        </section>
        <footer>
            <div class="elementscontainer">
                <div class="block-footer">

                    <div class="content"><div class="pic"><img src="dist/images/home.svg"></div><div class="content"><p>جميع الحقوق محفوظة  لدى منتديات مزيكا تو داي</p></div></div>
                </div>
            </div>
        </footer>
    </body>
</html> --}}
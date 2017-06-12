<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta http-equiv="Cache-control" content="public" />
        @if (isset($category))
            <title>
                مزيكا تو داي | {{$category->name}}
            </title>
            <meta property="og:title" content="مزيكا تو داي | {{$category->name}}" />
            <meta name="twitter:title" content="مزيكا تو داي | {{$category->name}}" />
            <meta itemprop="name" content="مزيكا تو داي | {{$category->name}}" />
        @else
            <title>
                مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي
            </title>
            <meta property="og:title" content="مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي" />
            <meta name="twitter:title" content="مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي" />
            <meta itemprop="name" content="مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي" />
        @endif

        @if (isset($category))
            <meta name="keywords" content="{{$category->key_words}}" />
            <meta name="description" content="{{$category->meta_description}}" />
            <meta property="og:description" content="{{$category->meta_description}}" />
            <meta itemprop="description" content="{{$category->meta_description}}" />
            <meta name="twitter:description" content="{{$category->meta_description}}" />
        @else
            <meta name="description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة" />
            <meta property="og:description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة" />
            <meta itemprop="description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة" />
            <meta name="twitter:description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة" />
            <meta name="keywords" content="مشاهدة افلام مباشرة, مشاهدة افلام اون لاين عربى و اجنبى, تحميل واستماع اغانى عربية, اغاني شعبي مشاهدة مباشرة مسلسلات عربية, مشاهدة مسلسلات رمضان اون لاين,مشاهدة مباريات اون لاين, كليبات, اسلاميات, برامج, العاب, برامج الموبايل, العاب الموبايل, نغمات, عروض مصارعة, افلام مترجمة" />
        @endif

        <meta property="fb:app_id" content="282317058844945" />
        <meta property="og:url" content="{{ Request::fullUrl() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{URL::to('/')}}/dist_v5/images/banner2.jpg" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:image" content="{{URL::to('/')}}/dist_v5/images/banner2.jpg" />
        <meta itemprop="image" content="{{URL::to('/')}}/dist_v5/images/banner2.jpg" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#ffffff" />
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <link rel="manifest" href="/manifest.json" />
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
        <link rel="canonical" href="{{ Request::fullUrl() }}" />
        <link rel="stylesheet" href="/dist_v5/css/home.css" />
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
    </head>
    <body class="{{ isset($_COOKIE['color']) ? $_COOKIE['color'] : ''}}">
        @yield('content')
    </body>
</html>
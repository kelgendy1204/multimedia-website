<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="canonical" href="{{URL::to('/')}}" />
        <title>
            مزيكا تو داي | مشاهدة افلام مباشرة اعربي واجنبي - مشاهدة افلام اون لاين - تحميل واستماع اغاني عربي
        </title>

        @if ($description->value)
          <meta name="description" content="{{ $description->value }}">
        @else
          <meta name="description" content="مشاهدة و تحميل افلام عربي و اجنبي, مشاهدة و تحميل مسلسلات عربي و اجنبي, تحميل واستماع اغاني عربية, تحميل العاب, تحميل برامج, مشاهدة و تحميل مباريات و مصارعة">
        @endif

        @if ($keywords->value)
          <meta name="keywords" content="{{ $keywords->value }}">
        @else
          <meta name="keywords" content="مشاهدة افلام مباشرة, مشاهدة افلام اون لاين عربى و اجنبى, تحميل واستماع اغانى عربية, اغاني شعبي مشاهدة مباشرة مسلسلات عربية, مشاهدة مسلسلات رمضان اون لاين,مشاهدة مباريات اون لاين, كليبات, اسلاميات, برامج, العاب, برامج الموبايل, العاب الموبايل, نغمات, عروض مصارعة, افلام مترجمة">
        @endif

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#ffffff">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" href="/dist/css/home.css" />

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
    {{-- <body class="page links {{ isset($_COOKIE['color']) ? $_COOKIE['color'] : ''}}"> --}}
    <body class="page links">
        <div class="insidepage">
            <header>
                <div class="logo">
                    <a href="/"><img src="/dist/images/logo.svg" alt="logo" /></a>
                </div>
            </header>
            <section>
                <div class="pagescontainer">
                    @yield('content')
                </div>
            </section>
        </div>
    </body>
</html>
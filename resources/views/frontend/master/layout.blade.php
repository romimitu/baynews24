<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') Baynews24 | বেনিউজ২৪ | বাংলাদেশের Latest News</title>
        
        <meta name="google-site-verification" content="7WH9arbTzUJsMjRWZ5HYIn3sXLHPrl5Id7sI_11_0Y"/>
        @yield('og')
        <link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.ico">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/cubeportfolio.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css?v=').time()}}">
        <link rel="stylesheet" href="{{asset('frontend/css/developer.css?v=').time()}}">
        <link rel="stylesheet" href="{{asset('css/style.css?v=').time()}}">
        <script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="{{asset('frontend/js/popper.min.js')}}"></script>
        <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/js/jquery.cubeportfolio.min.js')}}"></script>
        <script src="{{asset('frontend/js/plugins.js')}}"></script>
        <script src="{{asset('frontend/js/main.js')}}"></script>
        <script src="{{asset('js/jquery_bangla_date_picker.js')}}"></script>
        <script src="{{asset('js/local_bn.js')}}"></script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQ9BW59');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQ9BW59"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @include('frontend.master.header')
        @yield('content')
        @include('frontend.master.footer')
    </body>
    <script src="/frontend/js/homepage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function() {
            let searchParams = new URLSearchParams(window.location.search);
            let param = searchParams.get('date');
            $("#datepicker").datepicker({
                onSelect: function(date) {
                    $("#form-archiveDate").submit();
                },
                altField: "#archiveDate",
                dateFormat: 'yy-mm-dd',
                changeMonth: false,
                changeYear: false,
                maxDate: new Date
            }).datepicker('setDate', param);
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7XPDJXZ9X8"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-7XPDJXZ9X8');
    </script>
    @yield('script')
</html>
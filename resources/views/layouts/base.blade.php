<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <base href="{{ route('homePage') }}">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    {{--<title>{{ $title ?? $titleDefault }}</title>--}}
    <title>{{ $title ?? "Моя страница" }}</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic|Roboto:400,700,500|Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/main.css?1" />
    @yield('head_styles')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    @yield('head_scripts')
</head>
<body>
    @yield('header')
    @yield('search_panel')
    @yield('content')
    @yield('footer_links')
    @yield('footer_copyright')
    @section('bottom_scripts')
    <script src="assets/js/main.js"></script>
    <script>
        $(function () {
            var currentUrl = '';
            if ('{{ request()->path() }}' === '/') {
                currentUrl = '{{ request()->path() }}';
            } else {
                currentUrl = '/' + '{{ request()->path() }}';
            }

            $('.navigation li').each(function () {
                var link = $(this).find('a').attr('href');
                console.log(link.split('/').length);
                if(link === currentUrl){
                    if(link.split('/').length >= 3){
                        $(this).parent().parent().addClass('active');
                    } else {
                        $(this).addClass('active');
                    }
                }
            });
        });
    </script>
    @show
    @yield('app_scripts')
</body>
</html>
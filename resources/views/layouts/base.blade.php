<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    {{--<base href="{{ route('site.main.index') }}">--}}
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    {{--<title>{{ $title ?? $titleDefault }}</title>--}}
    <title>{{ $title ?? "Моя страница" }}</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic|Roboto:400,700,500|Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/css/main.css?1" />
    @section('hed_styles')
    @show

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    @section('hed_scripts')
    @show
</head>

<body>
@section('header')
@show

@section('search_panel')
@show

@section('content')
@show

@section('footer_links')
@show

@section('footer_copyright')
@show

@section('bottom_scripts')
    <script src="/assets/js/main.js"></script>
@show

@section('app_scripts')
@show
</body>
</html>
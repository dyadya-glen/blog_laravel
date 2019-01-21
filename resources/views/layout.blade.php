<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            *, ::after, ::before {
                box-sizing: border-box;
            }

            label {
                display: inline-block;
                margin-bottom: .5rem;
                font-size: 1rem;
                font-weight: 600;
                line-height: 1.5;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-control {
                display: block;
                width: 100%;
                min-width: 235px;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn {
                display: inline-block;
                font-weight: 400;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border: 1px solid transparent;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: .25rem;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                cursor: pointer;
            }

            a.btn {
                text-decoration: none;
            }

            .btn-primary:hover {
                color: #fff;
                background-color: #0069d9;
                border-color: #0062cc;
            }

            .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-sign {
                position: fixed;
                width: 100%;
                padding: 40px;
                text-align: right;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                z-index: 1000;
            }

            .nav-link {
            display: block;
            padding: .5rem 1rem;
            font-size: 1.3rem;
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }

            .nav-link--underline > span{
            border-bottom: 2px solid #007bff;
            transition: border-bottom-color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }

            .nav-link:hover {
            color: #0056b3;
            }

            .nav-link:hover > span {
            border-bottom-color: #0056b3;
            }
        </style>
    </head>
    <body>
    @yield('content')
    </body>
</html>

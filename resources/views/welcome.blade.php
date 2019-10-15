<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                /*background-color: #fff;*/
                color: #fff; /*#636b6f*/
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .fc-bg-primary {
                background-color: #00c1d5;
            }

            .fc-bg-img {
                background-image: url('{{ asset('assets/img/fc-bg-img.jpeg') }}');
                background-size: cover;
                background-position: top center;
                -webkit-filter: brightness(95%); /* Safari 6.0 - 9.0 */
                filter: brightness(95%);
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

            .links > a {
                color: #fff; /*#636b6f*/
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
        </style>
    </head>
    <body>
    <div class="page-header header-filter fc-bg-img">
{{--    style="background-image: url('{{ asset('assets/img/bg7.jpg') }}'); background-size: cover; background-position: top center;"--}}
    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links fc-bg-primary">
                    @auth
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content fc-bg-primary">
                <div class="title m-b-md">
                    {{ config('app.name') }}
                </div>

                <div class="links">
                    <a href="javascript:void(0);">The Problem</a>
                    <a href="javascript:void(0);">Our Hubs</a>
                    <a href="javascript:void(0);">News</a>
                    <a href="javascript:void(0);">About Us</a>
{{--                    <a href="https://laravel.com/docs">Docs</a>--}}
{{--                    <a href="https://laracasts.com">Laracasts</a>--}}
{{--                    <a href="https://laravel-news.com">News</a>--}}
{{--                    <a href="https://blog.laravel.com">Blog</a>--}}
{{--                    <a href="https://nova.laravel.com">Nova</a>--}}
{{--                    <a href="https://forge.laravel.com">Forge</a>--}}
{{--                    <a href="https://vapor.laravel.com">Vapor</a>--}}
{{--                    <a href="https://github.com/laravel/laravel">GitHub</a>--}}
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <title>Artemisa | @yield('title', 'Default')</title>
    </head>

    <style>
        body{
            text-align:center;
        }

        .content{
            width:80%;
            margin: 0 auto;
            display:flex;
        }
    </style>

    <body>
        <section class="content">
            @yield("header")
        </section>

        <section class="content">
            @yield("information")
        </section>

        <section class="content">
            @yield("footer")
        </section>
    <body>
</html>

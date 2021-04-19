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
        }

        #information{
            margin-top:20px;
            display:flex;
            justify-content:center;
        }
    </style>

    <body>
        <!-- <section class="content" id="header">
            @yield("header")
        </section> -->

        <section class="content" id="information">
            @yield("information")
        </section>

        <section class="content" id="footer">
            @yield("footer")
        </section>
    <body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/images/others/favicon.png') }}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


        <title>Artemisa | @yield('title', 'Default')</title>
    </head>

    <style>
        body{
 /*            text-align:center;
            margin-left: 100px;
 */        }

        .pat{
            display: block;
        }

        .content{
            width:100%;
            margin:auto;
/*             margin-left: 20px;
 */        }

        #information{
            margin-top:20px;
            display:flex;
            justify-content:center;
        }

        #filters{
            display:flex;
        }

        .dropbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .administration{
            margin-left: 18px;
            margin-right: 18px;
        }
    </style>
    <body>
        <section class="content" id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div  class="container" style=" width:100%;">

                    <a class="navbar-brand" href="/museums" style="padding-top: 10px">Artemisa</a>
                    <div class="dropdown" style="padding-top: 10px; padding-right:10em">
                        <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle"
                        id="dropdownNavLink" data-bs-toggle="dropdown" style="width: 35px !important; height: 35px !important; padding-top:1px" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink" style="">
                        <li><a class="dropdown-item" href="/authors">Authors</a></li>
                        <li><a class="dropdown-item" href="/museums">Museums</a></li>
                        <li><a class="dropdown-item" href="/aboutUs">About us</a></li>
                        </ul>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            @if (Auth::check() && Auth::user()->type == "admin")
                            <li class="nav-item">
                                <form name="admin" class="administration" style="display: flex; margin-top: 22px">
                                    <select name="action">
                                        <option hidden default value="/museums">Admin</option>
                                        <optgroup label="Users">
                                            <!-- <option value="/users/create">Create</option> -->
                                            <option value="/users/update">Update</option>
                                            <option value="/users/delete">Delete</option>
                                        </optgroup>
                                        <optgroup label="Authors">
                                            <option value="/authors/create">Create</option>
                                            <option value="/authors/update">Update</option>
                                            <option value="/authors/delete">Delete</option>
                                        </optgroup>
                                        <optgroup label="Artworks">
                                            <option value="/artworks/create">Create</option>
                                            <option value="/artworks/update">Update</option>
                                            <option value="/artworks/delete">Delete</option>
                                        </optgroup>
                                        <optgroup label="Collections">
                                            <option value="/collections/create">Create</option>
                                            <option value="/collections/update">Update</option>
                                            <option value="/collections/delete">Delete</option>
                                        </optgroup>
                                        <optgroup label="Museums">
                                            <option value="/museums/create">Create</option>
                                            <option value="/museums/update">Update</option>
                                            <option value="/museums/delete">Delete</option>
                                        </optgroup>
                                    </select>
                                    <input type="button" value="Go" onclick=window.open(admin.action.value)>
                                </form>
                            </li>
                        @endif
                        <!-- </ul> -->

                        <form class="d-flex"  >
                            <section class="container" id="filters" style="width:1200px; text-align:right;">
                                @yield("filters")
                                @if (Auth::check())
                                    <!-- Botón user logeado -->
                                    <div id="profile" class="dropdown" style="margin-top: 22px; display: flex; padding-left:20%; ">
                                        <button class="btn btn-primary" type="button" data-toggle="dropdown" >{{Auth::user()->name}}
                                        <span class="caret"></span></button>
                                        <ul id="subprofile" class="dropdown-menu">
                                            <li><a href="/users/{{Auth::user()->id}}">Profile</a></li>
                                            <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                <!-- botón para logear o registrarse -->
                                <div class="container-fluid" style="margin-top: 22px; display: flex; padding-left:20%;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                </div>
                                @endif
                            </section>
                        </form>
                    </ul>
                    </div>
                </div>
            </nav>

        </section>

        <section class="content" id="information">
            @yield("information")
        </section>

        <section class="content" id="footer">
            @yield("footer")
        </section>
    <body>
</html>


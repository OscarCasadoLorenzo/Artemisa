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
        <script src="https://kit.fontawesome.com/177edab996.js" crossorigin="anonymous"></script>

        <title>Artemisa | @yield('title', 'Default')</title>

    </head>

    <style>
        *{
            margin:0px;
            box-sizing:border-box;
        }

        body{
            font-family:sans-serif;
            padding: 90px 20px 0; 
            position:relative;
        }

        .header{
            background-color:#337ab7;
            position:fixed;
            width:100%;
            top:0;
            left:0;
            height:80px;
        }

        .nav{
            display:flex;
            justify-content:space-between;
            margin: 0 auto;
        }

        .nav-menu-link{
            color: white;
            border-radius:3px;
            padding: 8px 12px;
        }

        .nav-menu-link:hover,
        .nav-menu-link_active{
            text-decoration:none;
            color:white;
            background-color: #034574;
            transition:0.5s;
        }

        .logo{
            font-size: 30px;
            font-weight:bold;
            padding: 0 40px;
            line-height:80px;
            color:white;
            
        }

        .logo:hover{
            color:white;
            text-decoration:none;
        }

        .nav-menu{
            display:flex;
            margin-right:40px;
            list-style:none;
        }

        .nav-menu-item{
            font-size: 18px;
            margin: 0 10px;
            line-height: 80px;
            text-transform: uppercase;
            width: max-content;
        }

        .nav-toggle{
            background:none;
            border:none;
            color:white;
            font-size:30px;
            padding: 0 20px;
            line-height: 60px;

            display:none;
        }

        @media (max-width: 768px){
            
            body{
                padding-top: 70px;
            }

            .header{
                height:60px;
            }

            .logo{
                font-size: 25px;
                padding: 0 20px;
                line-height:60px;                
            }

            .nav-menu{
                flex-direction: column;
                margin-right:20px;
                background-color: #2c3e50;
                position:fixed;
                left:0;
                top: 60px;
                width:100%;
                align-items:center;
                padding:20px 0;

                height: calc(100% - 60px);
                overflow-y: auto;

                left: 100%;
                transition: left 0.3s;
            }

            .nav-menu-item{
                line-height: 70px;
            }

            .nav-menu-link:hover,
            .nav-menu-link_active{
                color: #83c5f7;
                background: none
            }

            .nav-menu_visible{
                left: 0;
            }

            .nav-toggle{
                display:block;
            }
        }

        #information{
            position:absolute;
            z-index:-50;
        }


    </style>        

    <body>
        <section class="header">

        <nav class = "nav">
            <a href="/museums" class="logo">ARTEMISA</a>
            <button class="nav-toggle ">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li class = "nav-menu-item"><a href="/authors" class="nav-menu-link">Authors</a>
                <li class = "nav-menu-item"><a href="/museums" class="nav-menu-link">Museums</a>
                <li class = "nav-menu-item"><a href="/aboutUs" class="nav-menu-link">About us</a>
            
            @if (Auth::check() && Auth::user()->type == "admin")
                            <li class="nav-item">
                                <form name="admin" class="administration" style="display: flex; margin-top: 22px">
                                    <select name="action">
                                        <option hidden default value="/museums">Admin</option>
                                        <optgroup label="Users">

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

                @if (Auth::check())
                    <li class="nav-menu-item">
                        <a class="nav-menu-link" href="/users/{{Auth::user()->id}}">Profile</a>
                    </li>
                    
                    <li class="nav-menu-item">
                        <a class="nav-menu-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            
            </ul>
        </nav> 
        </section>

        <section class="content" id="information">
            @yield("filters")
            @yield("information")
        </section>

        <section class="content" id="footer">
            @yield("footer")
        </section>

        <script>
            const navToggle = document.querySelector(".nav-toggle")
            const navMenu = document.querySelector(".nav-menu")

            navToggle.addEventListener("click", () => {
                navMenu.classList.toggle("nav-menu_visible");
            });
        </script>
    <body>
</html>


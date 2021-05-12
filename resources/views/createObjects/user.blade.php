@extends("templates.main")
<style>
    body{ 
            background-image: url("images/others/wallpaper.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
@section('title', 'Create user')

@section('information')

<head>
        <meta charset="utf-8">
        <title>Users</title>
    </head>
    <body>
        <div class ="container">

        <h1>Create new user</h1>
        <form action="/users" method="post">
            @csrf
            <label for="nm">Name</label>
            <input type="text" id="nm" name="name" autofocus>
            </br>
            <label for="fs">First Surname</label>
            <input type="text" id="fs" name="surname1" autofocus>
            </br>
            <label for="ss">Second Surname</label>
            <input type="text" id="ss" name="surname2" autofocus>
            </br>
            <label for="bd">Birth Date</label>
            <input type="date" id="bd" name="birth_date" autofocus>
            </br>
            <label for="lc">Location</label>
            <input type="text" id="lc" name="location" autofocus>
            </br>
            <label for="ad">Address</label>
            <input type="text" id="ad" name="address" autofocus>
            </br>
            <label for="em">Email</label>
            <input type="email" id="em" name="email" autofocus>
            </br>
            <label for="pw">Password</label>
            <input type="password" id="pw" name="password" autofocus>
            </br>
            
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        </div>
    </body>
@endsection

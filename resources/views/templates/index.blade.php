@extends("templates.main")
<style>
    body{ 
            background-image: url("images/others/wallpaper.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
</style>
@section('title', 'Index')


@section('information')

<div class="container">
    <div class="login">
    <form action="/users/login" method="post">
            @csrf
            <label for="em">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="email" id="em" name="email" autofocus>
            </br>
            </br>
            <label for="pw">Password</label>
            <input type="password" id="pw" name="password" autofocus>
            </br>
            </br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
    <div class="register">
        <a href="/users/create" style="display:block">Register</a>
    </div>
</div>

@endsection
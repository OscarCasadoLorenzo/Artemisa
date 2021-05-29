@extends('templates.main')

@section('title', 'Delete users')
<style>
    #ia{
        margin-left: auto;
        margin-right: auto;
        width: auto;
    }
</style>
@section('information')
@if($errors->any())
    <h4 style="float:right;margin-right:10%;color:green;">@if($errors->first() == "ELIMINADO CON EXITO")DELETED SUCCESSFULLY @endif</h4>
@endif
@if (Auth::check() && Auth::User()->type == "admin")
    <body>
        <div class ="container" style=" margin-left:15%; margin-top:2%; text-align:center">

        <h1>Delete an user:</h1>
        <form method="POST" action="/users">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="user_id" id="ia" class="form-control">
                    <option value="">Choose an User</option>
                    @foreach ($users as $user)
                    <option value="{{$user['id']}}">{{$user['email']}}</option>
                    @endforeach
                </select>
            </div>

            </br>

            <button class="btn btn-primary" type="submit">Delete</button>
        </form>
        </div>
    </body>
    @else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection

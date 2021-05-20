@extends('templates.main')

@section('title', 'Create museum')

@section('information')
@if (Auth::check() && Auth::User()->type == "admin")

<style>
    div ul{
        margin:auto;
        width:60%;
        text-align: center;
    }
</style>

    <body>
        <div class ="container" style="text-align:center; margin:17%; margin-top:1%">


        <h1>Create new museum</h1>
        <form action="/museums" method="post" enctype="multipart/form-data">
            @csrf
            </br>
            <div class="form-group">
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" autofocus value="{{ old('name') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="lc">Location</label>
                <input type="text" id="lc" name="location" autofocus value="{{ old('location') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="ad">Address</label>
                <input type="text" id="ad" name="address" autofocus value="{{ old('address') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="em">Email</label>
                <input type="email" id="em" name="email" autofocus value="{{ old('email') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" id="img" name="imgRoute" autofocus style="margin-left:30%" value="{{ old('imgRoute') }}">
            </div>
            </br>
            <button class="btn btn-primary"  type="submit">Submit</button>
        </br>
        <div class="container">
        </br>
            @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert" style="width:auto;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
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




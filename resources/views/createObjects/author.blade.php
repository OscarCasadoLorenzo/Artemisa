@extends('templates.main')

@section('title', 'Create author')

@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
@if($errors->any())
    <h4 style="float:right;margin-right:10%;color:green;">@if($errors->first() == "Autor creado correctamente")CREATED SUCCESSFULLY @endif</h4>
@endif
    <body>
        <div class ="container" style=" margin-left:15%; margin-top:2%; text-align:center">

        <h1>Create new author</h1>
        <form action="/authors" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" autofocus value="{{ old('name') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="nc">Nacionality</label>
                <input type="text" id="nc" name="nacionality" autofocus value="{{ old('nacionality') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="bd">Year date</label>
                <input type="number" id="bd" name="birth_date"  min="0" max="2500" autofocus value="{{ old('birth_date') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="mv">Artistic movement&nbsp;&nbsp;</label>
                <input type="text" id="mv" name="movement" autofocus value="{{ old('movement') }}">
            </div>
            </br>
            </br>
            <div class="form-group" >
                <label for="img">Image</label>
                <input type="file" id="img" name="imgRoute" autofocus style="margin-left:30%;" value="{{ old('imgRoute') }}">
            </div>
            </br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        @if(count($errors) > 0 && $errors->first() != "Autor creado correctamente")
    <div class="alert alert-danger" role="alert" style="width:auto;">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
        </div>
        </br>
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

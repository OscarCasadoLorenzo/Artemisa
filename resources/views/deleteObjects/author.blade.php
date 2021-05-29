@extends('templates.main')

@section('title', 'Delete author')
<style>
    #ia{
        margin-left: auto;
        margin-right: auto;
        width: auto;
    }
</style>
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
    <body>
    @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "ELIMINADO CON EXITO")DELETED SUCCESSFULLY @endif</h4>
    @endif
        <div class ="container" style=" margin-left:15%; margin-top:2%; text-align:center">

        <h1>Delete an author:</h1>
        <form method="POST" action="/authors">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="author_id" id="ia" class="form-control">
                    <option value="">Choose an Author</option>
                    @foreach ($authors as $author)
                    <option value="{{$author['id']}}">{{$author['name']}}</option>
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

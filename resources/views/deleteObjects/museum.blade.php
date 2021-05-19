@extends('templates.main')

@section('title', 'Delete museums')
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
        <div class ="container">

        <h1>Delete a museum:</h1>
        <form method="POST" action="/museums">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="museum_id" id="ia" class="form-control">
                    <option value="">Choose an Museum</option>
                    @foreach ($museums as $museum)
                    <option value="{{$museum['id']}}">{{$museum['name']}}</option>
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

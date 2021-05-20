@extends('templates.main')

@section('title', 'Delete collection')
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
        <div class ="container" style=" margin-left:15%; margin-top:2%; text-align:center">

        <h1>Delete a collection:</h1>
        <form method="POST" action="/collections">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="collection_id" id="ia" class="form-control">
                    <option value="">Choose a Collection</option>
                    @foreach ($collections as $collection)
                    <option value="{{$collection['id']}}">{{$collection['name']}}</option>
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

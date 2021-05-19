<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Collections</title>
    </head>
    @if (Auth::check() && Auth::User()->type == "admin")
    <body>
        <h1>Create new collection</h1>
        <form action="/collections" method="post">
            @csrf
            <div class="form-group">
                <label for="nm">Name&nbsp;</label>
                <input type="text" id="nm" name="name" autofocus value="{{ old('imgRoute') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="im">Museo&nbsp;</label>
                <select name="museum_id" id="im" class="form-control">
                    <option value="">Choose a museum</option>
                    @foreach ($museums as $museum)
                    <option value="{{$museum['id']}}">{{$museum['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <button class="btn btn-primary" type="submit">Submit</button>

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
    </body>
@else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
</html>

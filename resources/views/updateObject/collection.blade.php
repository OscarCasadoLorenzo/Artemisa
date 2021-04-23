<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Collections</title>
    </head>
    <body>
        <h1>Create new collection</h1>
        <form action="/collections" method="post">
            @csrf
            <div class="form-group">
                <label for="nm">Name&nbsp;</label>
                <input type="text" id="nm" name="name" autofocus>
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
        </form>
    </body>
</html>

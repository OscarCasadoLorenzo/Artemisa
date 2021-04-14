@extends('templates.main')

@section('information')
    <body>
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

            <button type="submit">Delete</button>
        </form>

    </body>
@endsection

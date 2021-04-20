@extends('templates.main')

@section('title', 'Delete museums')

@section('information')
    <body>
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

            <button type="submit">Delete</button>
        </form>

    </body>
@endsection

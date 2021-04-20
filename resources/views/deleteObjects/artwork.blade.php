@extends('templates.main')

@section('title', 'Delete artwork')

@section('information')
    <body>
        <h1>Delete an artwork:</h1>
        <form method="POST" action="/artworks">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="user_id" id="ia" class="form-control">
                    <option value="">Choose an Artwork</option>
                    @foreach ($artworks as $artwork)
                    <option value="{{$artwork['id']}}">{{$artwork['title']}}</option>
                    @endforeach
                </select>
            </div>

            </br>

            <button type="submit">Delete</button>
        </form>

    </body>
@endsection

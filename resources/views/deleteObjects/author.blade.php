@extends('templates.main')

@section('title', 'Delete author')

@section('information')
    <body>
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

            <button type="submit">Delete</button>
        </form>

    </body>
@endsection

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
    <body>
        <div class ="container">

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
@endsection

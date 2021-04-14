@extends('templates.main')

@section('information')
    <body>
        <h1>Delete an artwork:</h1>
        <form method="POST" action="/artworks">
            @csrf @method('DELETE')

            <div class="form-group">
                <label for="tt">Introduce an artwork's id</label>
                <input type="number" id="tt" name="id" autofocus>
            </div>
            </br>

            <button type="submit">Eliminar</button>
        </form>

    </body>
@endsection

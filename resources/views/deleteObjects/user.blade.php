@extends('templates.main')

@section('title', 'Delete users')

@section('information')
    <body>
        <h1>Delete an user:</h1>
        <form method="POST" action="/users">
            @csrf @method('DELETE')

            </br>

            <div class="form-group">

                <select name="user_id" id="ia" class="form-control">
                    <option value="">Choose an User</option>
                    @foreach ($users as $user)
                    <option value="{{$user['id']}}">{{$user['email']}}</option>
                    @endforeach
                </select>
            </div>

            </br>

            <button type="submit">Delete</button>
        </form>

    </body>
@endsection

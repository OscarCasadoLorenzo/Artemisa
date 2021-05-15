
@extends('templates.main')

@section('title', 'Create collection')
<style>
    #im{
        margin-left: auto;
        margin-right: auto;
        width: auto;
    }
</style>

@section('information')
    <head>
        <meta charset="utf-8">
        <title>Collections</title>
    </head>
    <body>
        <div class ="container">

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
                    <option value="">Escoge museo</option>
                    @foreach ($museums as $museum)
                    <option value="{{$museum['id']}}">{{$museum['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <button class="btn btn-primary"  type="submit">Submit</button>

            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert" style="width:auto;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
        </div>
    </body>
@endsection

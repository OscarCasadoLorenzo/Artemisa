@extends('templates.main')
@section('information')
<body>
    <h1 style="position:absolute;left:40%">Update Author</h1>
    @if($errors->any())
        <h4 style="position:absolute;right:30%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")ACTUALIZADO CON EXITO @endif</h4>
    @endif
    <form method="POST" action="{{route('artwork.update')}}" >
    @csrf
        <div style="position:absolute;top:25%;left:35%;width: 500px;">
            <input type="text" id="tt" name="title" value="{{old('title')}}">
            <input type="text" id="movement" name="movement" value="{{old('movement')}}" placeholder="Movement">  
            <input type="text" id="genre" name="genre" value="{{old('genre')}}" placeholder="Genre">
            <input type="text" id="dm" name="dimensions" value="{{old('dimensions')}}" placeholder="Dimensions">
            <input type="number" id="yr" name="year" value="{{old('year')}}" placeholder="YYYY">
            <select name="author_id" id="ia" class="form-control">
                <option value="">Choose an author</option>
                @foreach ($authors as $author)
                <option value="{{$author['id']}}" @if (old('author_id') == $author['id']) selected="selected" @endif >{{$author['name']}}</option>
                @endforeach
            </select>
            <select name="collection_id" id="ic" class="form-control">
                <option value="">Choose a Collection</option>
                @foreach ($collections as $collection)
                <option value="{{$collection['id']}}" @if (old('collection_id') == $collection['id']) selected="selected" @endif>{{$collection['name']}}</option>
                @endforeach
            </select>
            <input type="file" id="img" name="imgRoute" value="{{old('img')}}" placeholder="Route of image">
            </br>

            <button class="btn btn-primary" type="submit">Submit</button>
        </div>

        </br> </br>
    @if(count($errors) > 0 && $errors->first() != "ACTUALIZADO CON EXITO")
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
@endsection

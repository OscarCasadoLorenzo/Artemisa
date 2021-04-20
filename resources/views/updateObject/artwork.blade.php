@extends('templates.main')

@section('information')
    <body>
        <h1>Create new artwork</h1>
        <form action="/artworks" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tt">Title</label>
                <input type="text" id="tt" name="title" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="mv">Artistic movement</label>
                <input type="text" id="mv" name="movement" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="gr">Genre</label>
                <input type="text" id="gr" name="genre" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="dm">Dimensions</label>
                <input type="text" id="dm" name="dimensions" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="yr">Year</label>
                <input type="number" id="yr" name="year" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="at">Author</label>
                <select name="author_id" id="ia" class="form-control">
                    <option value="">Escoge Autor</option>
                    @foreach ($authors as $author)
                    <option value="{{$author['id']}}">{{$author['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">                
                <label for="ct">Collection</label>
                <select name="collection_id" id="ic" class="form-control">
                    <option value="">Escoge Colección</option>
                    @foreach ($collections as $collection)
                    <option value="{{$collection['id']}}">{{$collection['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">                
                <label for="img">Image</label>
                <input type="file" id="img" name="imgRoute" autofocus>
            </div>    
            </br>
            
            <button type="submit">Submit</button>
        </form>
    </body>
@endsection
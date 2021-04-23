@extends('templates.main')
<style>
    #select{
        margin-left: auto;
        margin-right: auto;
        width: auto;
    }
</style>
@section('title', 'Create artwork')

@section('information')
    <body>
        <div class ="container">

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
                <select name="author_id" id ="select" class="form-control">
                    <option value="">Choose an Author</option>
                    @foreach ($authors as $author)
                    <option value="{{$author['id']}}">{{$author['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">
                <label for="ct">Collection</label>
                <select name="collection_id" id ="select" class="form-control">
                    <option value="">Choose a Collection</option>
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

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        </div>
    </body>
@endsection

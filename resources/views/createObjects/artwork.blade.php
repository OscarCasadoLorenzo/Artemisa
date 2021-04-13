<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artworks</title> 
    </head>
    <body>
        <h1>Create new artwork</h1>
        <form action="/artworks" method="post">
            @csrf
            <div class="form-group">
                <label for="tt">Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="tt" name="title" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="mv">Artistic movement</label>
                <input type="text" id="mv" name="movement" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="gr">Genre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="gr" name="genre" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="dm">Dimensions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="dm" name="dimensions" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="yr">Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="number" id="yr" name="year" autofocus>
            </div>
            </br>
            <div class="form-group">                
                <label for="at">Author&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;</label>
                <select name="author_id" id="ia" class="form-control">
                    <option value="">Escoge Autor</option>
                    @foreach ($authors as $author)
                    <option value="{{$author['id']}}">{{$author['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">                
                <label for="ct">Collection&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select name="collection_id" id="ic" class="form-control">
                    <option value="">Escoge Colección</option>
                    @foreach ($collections as $collection)
                    <option value="{{$collection['id']}}">{{$collection['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">                
                <label for="img">Imagen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;</label>
                <input type="file" id="img" name="imgRoute" autofocus>
            </div>    
            </br>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
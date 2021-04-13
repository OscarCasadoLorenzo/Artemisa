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
            <label for="tt">Title</label>
            <input type="text" id="tt" name="title" autofocus>
            
            <label for="mv">Artistic movement</label>
            <input type="text" id="mv" name="movement" autofocus>
            
            <label for="gr">Genre</label>
            <input type="text" id="gr" name="genre" autofocus>
            
            <label for="dm">Dimensions</label>
            <input type="text" id="dm" name="dimensions" autofocus>

            <label for="yr">Year</label>
            <input type="number" id="yr" name="year" autofocus>

            <label for="at">Author</label>
            <input type="text" id="at" name="author" autofocus>

            <label for="ct">Collection</label>
            <input type="text" id="ct" name="collection" autofocus>
            
            <label for="img">Imagen</label>
            <input type="text" id="img" name="imgRoute" autofocus>
            
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
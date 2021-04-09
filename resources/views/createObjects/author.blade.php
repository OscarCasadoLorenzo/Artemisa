<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Museums</title> 
    </head>
    <body>
        <h1>Create new author</h1>
        <form action="/authors" method="post">
            @csrf
            <label for="nm">Name</label>
            <input type="text" id="nm" name="name" autofocus>
            
            <label for="nc">Nacionality</label>
            <input type="text" id="nc" name="nacionality" autofocus>
            
            <label for="bd">Birth date</label>
            <input type="number" id="bd" name="birth_date" autofocus>
            
            <label for="mv">Artistic movement</label>
            <input type="text" id="mv" name="movement" autofocus>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>
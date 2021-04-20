@extends('templates.main')

@section('information')
    <body>
        <h1>Create new author</h1>
        <form action="/authors" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">    
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" autofocus>
            </div>
            </br>
            <div class="form-group">       
                <label for="nc">Nacionality</label>
                <input type="text" id="nc" name="nacionality" autofocus>
            </div>
            </br>
            <div class="form-group">       
                <label for="bd">Birth date</label>
                <input type="number" id="bd" name="birth_date" autofocus>
            </div>
            </br>
            <div class="form-group">       
                <label for="mv">Artistic movement&nbsp;&nbsp;</label>
                <input type="text" id="mv" name="movement" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="ew">WikiLink</label>
                <input type="text" id="ew" name="eWiki" autofocus>
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
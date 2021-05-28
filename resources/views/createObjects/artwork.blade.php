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
@if (Auth::check() && Auth::User()->type == "admin")
    <body>
        <div class ="container" style="text-align:center; margin:17%; margin-top:1%">
        @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "CREADO CON EXITO")CREATED SUCCESSFULLY @endif</h4>
    @endif
        <h1 >Create new artwork</h1></br>
        <form action="/artworks" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tt">Title</label>
                <input type="text" id="tt" name="title" autofocus value="{{ old('title') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="mv">Artistic movement</label>
                <input type="text" id="mv" name="movement" autofocus value="{{ old('movement') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="gr">Genre</label>
                <input type="text" id="gr" name="genre" autofocus value="{{ old('genre') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="dm">Dimensions</label>
                <input type="text" id="dm" name="dimensions" autofocus placeholder="24.5x12m" value="{{ old('dimensions') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="yr">Year</label>
                <input type="number" id="yr" name="year" autofocus value="{{ old('year') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="at">Author</label>
                <select name="author_id" id ="select" class="form-control">
                    <option value="">Choose an Author</option>
                    @foreach ($authors as $author)
                    <option value="{{$author['id']}}" @if (old('author_id') == $author['id']) selected="selected" @endif >{{$author['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">
                <label for="ct">Collection</label>
                <select name="collection_id" id ="select" class="form-control">
                    <option value="">Choose a Collection</option>
                    @foreach ($collections as $collection)
                    <option value="{{$collection['id']}}" @if (old('collection_id') == $collection['id']) selected="selected" @endif >{{$collection['name']}}</option>
                    @endforeach
                </select>
            </div>
            </br>
            <div class="form-group">
                <label for="img">Image</label>
                <input style="margin-left:28%;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}" ></br>
            </div>
            </br>

            <button class="btn btn-primary" type="submit">Submit</button>
            <div id="preview" style="position:absolute;top:25%;right:50%;">
            
            </div>
            @if(count($errors) > 0 && $errors->first() != "CREADO CON EXITO")
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
    <script>
// Funcion para previsualizar la imagen
function preview(e)
{
	if(e.files && e.files[0])
	{
        // Inicializamos un FileReader. permite que las aplicaciones web lean
        // ficheros (o información en buffer) almacenados en el cliente de forma
        // asíncrona
        var reader=new FileReader();

        // El evento onload se ejecuta cada vez que se ha leido el archivo
        // correctamente
        reader.onload=function(e) {
            document.getElementById("preview").innerHTML="<img src='"+e.target.result+"'style='max-width: 30%;'>";
        }
        // El evento onerror se ejecuta si ha encontrado un error de lectura
        reader.onerror=function(e) {
            document.getElementById("preview").innerHTML="Error de lectura";
        }
        // indicamos que lea la imagen seleccionado por el usuario de su disco duro
        reader.readAsDataURL(e.files[0]);
	}
}
</script>
@else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection

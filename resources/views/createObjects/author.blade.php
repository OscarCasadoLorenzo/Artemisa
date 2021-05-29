@extends('templates.main')

@section('title', 'Create author')

@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
@if($errors->any())
    <h4 style="float:right;margin-right:10%;color:green;">@if($errors->first() == "Autor creado correctamente")CREATED SUCCESSFULLY @endif</h4>
@endif
    <body>
        <div class ="container" style=" margin-left:15%; margin-top:2%; text-align:center">

        <h1>Create new author</h1>
        <form action="/authors" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" value="{{ old('name') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="nc">Nacionality</label>
                <input type="text" id="nc" name="nacionality" value="{{ old('nacionality') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="bd">Year date</label>
                <input type="number" id="bd" name="birth_date"  min="0" max="2500" value="{{ old('birth_date') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="mv">Artistic movement&nbsp;&nbsp;</label>
                <input type="text" id="mv" name="movement" value="{{ old('movement') }}">
            </div>
            </br>
            </br>
            <div class="form-group" >
                <label for="img">Image</label>
                <input style="margin-left:30%;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}"></br>
            </div>
            </br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
        @if(count($errors) > 0 && $errors->first() != "Autor creado correctamente")
        <div class="alert alert-danger" role="alert" style="width:auto;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div id="preview" style="position:absolute;top:15%;right:50%;left:10%; text-align: left; width:300px; height:200px">

        </div>
        </div>
        </br>
    </body>
<script>
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
            document.getElementById("preview").innerHTML="<img src='"+e.target.result+"'style='max-width:300px;'>";
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

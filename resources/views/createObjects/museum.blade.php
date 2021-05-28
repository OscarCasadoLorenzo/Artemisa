@extends('templates.main')

@section('title', 'Create museum')

@section('information')
@if (Auth::check() && Auth::User()->type == "admin")

<style>
    div ul{
        margin:auto;
        width:60%;
        text-align: center;
    }
</style>

    <body>
        <div class ="container" style="text-align:center; margin:17%; margin-top:1%">
        @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "CREADO CON EXITO")CREATED SUCCESSFULLY @endif</h4>
    @endif

        <h1>Create new museum</h1>
        <form action="/museums" method="post" enctype="multipart/form-data">
            @csrf
            </br>
            <div class="form-group">
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" autofocus value="{{ old('name') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="lc">Location</label>
                <input type="text" id="lc" name="location" autofocus value="{{ old('location') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="ad">Address</label>
                <input type="text" id="ad" name="address" autofocus value="{{ old('address') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="em">Email</label>
                <input type="email" id="em" name="email" autofocus value="{{ old('email') }}">
            </div>
            </br>
            <div class="form-group">
                <label for="img">Image</label>
                <input style="margin-left:28%;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}" ></br>
            </div>
            </br>
            <button class="btn btn-primary"  type="submit">Submit</button>
        </br>
        <div id="preview" style="position:absolute;top:25%;right:50%;">
 
        </div>
        <div class="container">
        </br>
            @if(count($errors) > 0 && $errors->first() != "CREADO CON EXITO") 
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




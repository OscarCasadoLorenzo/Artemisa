@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Update Museum</h1>
    <form method="POST" action="{{route('museum.update')}}" enctype="multipart/form-data">
    @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")UPDATED SUCCESSFULLY @endif</h4>
    @endif
    @csrf
        </br>
        <div style="float:center; margin-right:35%; margin-left:35%;">
        <select  name="museum_id" id="museum_id" class="form-control">
                <option value="-1">Choose a museum</option>
                @foreach ($museums as $museum)
                <option value="{{$museum['id']}}">{{$museum['name']}}</option>
                @endforeach
            </select>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}"/>
        <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{ old('location') }}"/>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address') }}"/>
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}"/>
        <input style="width: 400px;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}" placeholder="Route of image"></br>
        </br>
        <button class="btn btn-primary" type="submit" style="text-align:center">Update</button>
    </br>
    <div class="container">
    </br>
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
        </div>
        <div id="preview" style="position:absolute;top:25%;right:50%;">
 
        </div>


    </form>
</body>
<script type=text/javascript>
$('#museum_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetailsMuseum", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#location').val(response.location);
                $('#address').val(response.address);
                $('#name').val(response.name);
                $('#email').val(response.email);
                $('#imgRoute').val('');

            }
            else{
                $('#location').val('');
                $('#address').val('');
                $('#name').val('');
                $('#email').val('');
                $('#imgRoute').val('');
            }
        }
    });
    document.getElementById("preview").innerHTML="";
});
</script>
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


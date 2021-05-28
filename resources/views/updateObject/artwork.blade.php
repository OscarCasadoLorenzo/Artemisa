@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body style="">
    <h1 style="margin-left:30%;">Update Artwork</h1>
    @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")UPDATED SUCCESSFULLY @endif</h4>
    @endif
    <form method="POST" action="{{route('artwork.update')}}" enctype="multipart/form-data">
    @csrf
        <div class="container" style=" margin:25%; margin-top:1%;">

            <select name="id" style="width: 400px;" id="id" class="form-control">
                <option value="-1">Choose an Artwork</option>
                @foreach ($artworks as $artwork)
                <option value="{{$artwork['id']}}" @if (old('id') == $artwork['id']) selected="selected" @endif >{{$artwork['title']}}</option>
                @endforeach
            </select>
            <input type="text" style="width: 400px;" id="title" name="title" value="{{old('title')}}" placeholder="title">  </br>
            <input type="text" style="width: 400px;" id="movement" name="movement" value="{{old('movement')}}" placeholder="Movement">  </br>
            <input type="text" style="width: 400px;" id="genre" name="genre" value="{{old('genre')}}" placeholder="Genre"></br>
            <input type="text" style="width: 400px;" id="dimensions" name="dimensions" value="{{old('dimensions')}}" placeholder="Dimensions"></br>
            <input type="number" style="width: 400px;" id="year" name="year" value="{{old('year')}}" placeholder="YYYY"></br>
            <select name="author_id" style="width: 400px;" id="author_id" class="form-control">
                <option style="display:none"> </option>
                @foreach ($authors as $author)
                <option value="{{$author['id']}}" @if (old('author_id') == $author['id']) selected="selected" @endif >{{$author['name']}}</option>
                @endforeach
            </select>
            <select style="width: 400px;" name="collection_id" id="collection_id" class="form-control">
                <option style="display:none"> </option>
                @foreach ($collections as $collection)
                <option value="{{$collection['id']}}" @if (old('collection_id') == $collection['id']) selected="selected" @endif>{{$collection['name']}}</option>
                @endforeach
            </select>
            </br> </br>
            @if(count($errors) > 0 && $errors->first() != "ACTUALIZADO CON EXITO")
            <div class="alert alert-danger" role="alert" style="width:auto;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            </br>
            <input style="width: 400px;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}" placeholder="Route of image"></br>
            <button class="btn btn-primary" type="submit">Submit</button>
    </div>
            <div id="preview" style="position:absolute;top:25%;right:50%;">

            </div>
    </form>
</body>
<script type=text/javascript>
$('#id').change(function(){
    var id = $(this).val();
    var url = '{{route("getDetailsArtwork", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#title').val(response.title);
                $('#movement').val(response.movement);
                $('#genre').val(response.genre);
                $('#dimensions').val(response.dimensions);
                $('#year').val(response.year);
                $('#author_id').val(response.author_id);
                $('#collection_id').val(response.collection_id);
                $('#imgRoute').val('');
            }
            else{
                $('#title').val(response.movement);
                $('#movement').val('');
                $('#genre').val('');
                $('#dimensions').val('');
                $('#year').val('');
                $('#author_id').val('');
                $('#collection_id').val('');
                $('#imgRoute').val('');
            }
        }
    });
    document.getElementById("preview").innerHTML="";
});
</script>
<!--No hay que reinventar tampoco la rueda-->
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

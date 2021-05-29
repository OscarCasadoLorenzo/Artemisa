@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body style="text-align: center;">
    <h1>Update Author</h1>
    @if($errors->any())
    <h4 style="position:absolute;right:30%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")UPDATED SUCCESSFULLY @endif</h4>
    @endif
    <form method="POST" action="{{route('author.update')}}" enctype="multipart/form-data">
    @csrf
        </br>
        <div  style=" margin:30%; margin-top:1%;">
        <select  name="author_id" id="author_id" class="form-control" style="width: auto;">
                <option value="-1">Choose an Author</option>
                @foreach ($authors as $author)
                <option value="{{$author['id']}}">{{$author['name']}}</option>
                @endforeach
            </select>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
        <input type="text" class="form-control" id="movement" name="movement" placeholder="Movement"/>
        <input type="text" class="form-control" id="nacionality" name="nacionality" placeholder="Nacionality"/>
        <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Year of birth"/>
        <input style="width: 400px;" type="file" id="imgRoute" onchange="preview(this)" name="imgRoute" accept="image/png" value="{{old('imgRoute')}}" placeholder="Route of image"></br>
        </br>
        <button class="btn btn-primary" type="submit" >Update</button>
        </br>
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
        <div id="preview" style="position:absolute;top:15%;right:50%;left:10%; text-align: left; width:300px; height:200px">


 </div>

        </div>
    </form>
</body>
<script type=text/javascript>
$('#author_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetailsAuthor", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#movement').val(response.movement);
                $('#nacionality').val(response.nacionality);
                $('#name').val(response.name);
                $('#birth_date').val(response.birth_date);
                $('#imgRoute').val('');
            }
            else{
                $('#movement').val('');
                $('#nacionality').val('');
                $('#name').val('');
                $('#birth_date').val('');
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

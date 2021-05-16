@extends('templates.main')
@section('information')
<body>
    <h1 style="position:absolute;left:35%">Update Author</h1>
    @if($errors->any())
    <h4 style="position:absolute;right:30%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")ACTUALIZADO CON EXITO @endif</h4>
    @endif
    <form method="POST" action="{{route('author.update')}}" >
    @csrf
        </br>
        <div style="position:absolute;top:10%;right:40%;width: 500px;">
        <select  name="author_id" id="author_id" class="form-control">
                <option value="-1">Choose an Author</option>
                @foreach ($authors as $author)
                <option value="{{$author['id']}}">{{$author['name']}}</option>
                @endforeach
            </select>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
        <input type="text" class="form-control" id="movement" name="movement" placeholder="Movement"/>
        <input type="text" class="form-control" id="nacionality" name="nacionality" placeholder="Nacionality"/>
        <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Date of birth"/>
        <input type="text" class="form-control" id="eWiki" name="eWiki" placeholder="eWiki"/>
        <input type="text" class="form-control" id="imgRoute" name="imgRoute" placeholder="imgRoute"/>
        <!--<input type="text" class="form-control" id="type" />-->
        </br>
        <button class="btn btn-primary" type="submit" >Update</button>
        </div>

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
                $('#imgRoute').val(response.imgRoute);
                $('#eWiki').val(response.eWiki);

            }
            else{
                $('#movement').val('');
                $('#nacionality').val('');
                $('#name').val('');
                $('#birth_date').val('');
                $('#imgRoute').val('');
                $('#eWiki').val('');
            }
        }
    });
});

</script>
@endsection

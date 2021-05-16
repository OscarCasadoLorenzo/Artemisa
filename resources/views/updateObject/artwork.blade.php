@extends('templates.main')
@section('information')
<body>
    <h1 style="position:absolute;left:40%">Update Artwork</h1>
    @if($errors->any())
        <h4 style="position:absolute;right:30%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")ACTUALIZADO CON EXITO @endif</h4>
    @endif
    <form method="POST" action="/artworks/update">
    @csrf
        <div style="position:absolute;top:17%;left:35%;">

            <select name="id" style="width: 400px;" id="id" class="form-control">
                <option value="">Choose an Artwork</option>
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
                <option value="">Choose an author</option>
                @foreach ($authors as $author)
                <option value="{{$author['id']}}" @if (old('author_id') == $author['id']) selected="selected" @endif >{{$author['name']}}</option>
                @endforeach
            </select>
            <select style="width: 400px;" name="collection_id" id="collection_id" class="form-control">
                <option value="">Choose a Collection</option>
                @foreach ($collections as $collection)
                <option value="{{$collection['id']}}" @if (old('collection_id') == $collection['id']) selected="selected" @endif>{{$collection['name']}}</option>
                @endforeach
            </select></br>
            <input style="width: 400px;" type="file" id="img" name="imgRoute" value="{{old('img')}}" placeholder="Route of image"></br>
            <button class="btn btn-primary" type="submit">Submit</button>
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

            }
            else{
                $('#title').val(response.movement);
                $('#movement').val('');
                $('#genre').val('');
                $('#dimensions').val('');
                $('#year').val('');
                $('#author_id').val('');
                $('#collection_id').val('');
            }
        }
    });
});

</script>
@endsection

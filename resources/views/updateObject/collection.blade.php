@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Update Collection</h1>
    <form method="POST" action="{{route('museum.update')}}">
    @if($errors->any())
        <h4 style="color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")ACTUALIZADO CON EXITO @endif</h4>
    @endif
    @csrf
        </br>
        <div style="float:center; margin-right:35%; margin-left:35%;">
        <select  name="collection_id" id="collection_id" class="form-control">
            <option value="-1">Choose a collection</option>
            @foreach ($collections as $collection)
            <option value="{{$collection['id']}}">{{$collection['name']}}</option>
            @endforeach
        </select>
        <h4 style="padding:1em; text-align:center;"> ARTWORKS </h3>
        <div class="form-group1" style=" box-shadow: 5px 10px 8px #888888; border: 1px solid; margin:4px; width: 500px; height: 200px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            @foreach($artworks as $artwork)
                <div class="artwork">
                    <label>
                        <input type="checkbox" class="art" value="{{$artwork['id']}}">
                        {{$artwork['title']}}
                    </label>
                </div>
            @endforeach
        </div>
        <h4 style="padding:1em; text-align:center;"> MUSEUMS </h3>
            <div class="form-group2" style="box-shadow: 5px 10px 8px #888888; border: 1px solid; margin:4px;width: 500px; height: auto; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            @foreach($museums as $museum)
                <div class="museum">
                    <label>
                        <input type="radio" name="mus" value="{{$museum['id']}}">
                        {{$museum['name']}}
                    </label>
                </div>
            @endforeach
        </div>
        </br>
        <button class="btn btn-primary" type="submit" style="text-align:center">Update</button>
        </br>
    </div>
    </form>
</body>
<script type=text/javascript>
$('#collection_id').change(function(){
    var elements = document.getElementsByClassName("art");
    var id = $(this).val();
    if(id != -1)
    {
        var url = '{{ route("getDetailsCollection", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response){
                if(response != null){
                    for (var i = 0, len = elements.length; i < len; i++) {
                        elements[i].checked = true; //TODO Relaciones
                    }
                }
            }
        });
    }
    else{
        for (var i = 0, len = elements.length; i < len; i++) {
                        elements[i].checked = false;
                    }
    }
});
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

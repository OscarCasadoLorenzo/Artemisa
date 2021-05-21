@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Update Collection</h1>
    <form method="POST" action="{{route('collections.update')}}" >
    @csrf
    @if($errors->any())
    <h4 style="float:right;margin-right:20%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")UPDATED SUCCESSFULLY @endif</h4>
    @endif
        </br>
        <div style="float:center; margin-right:35%; margin-left:35%;">
        <select  name="collection_id" id="collection_id" class="form-control">
            <option value="-1">Choose a collection</option>
            @foreach ($collections as $collection)
            <option value="{{$collection['id']}}" >{{$collection['name']}}</option>
            @endforeach
        </select>
        <input type="text" class="form-control" id="name" name="name" placeholder="Collection Name" value="{{ old('name') }}"/>
        ARTWORKS
        <div class="form-group1" style="margin:4px, 4px; padding:4px; width: 500px; height: 200px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            <table id="table" name="table">
                @foreach($artworks as $artwork)
                    <tr class="artwork">
                        <td><label>
                            <input type="checkbox" id="{{'check'.$artwork['id']}}"  name="art[]" class="art" value="{{$artwork['id']}}">
                            {{$artwork['title']}}
                        </td>
                        <td id="{{'collect'.$artwork['id']}}" style="visibility:hidden;">
                            <select  id="{{'collectSub'.$artwork['id']}}" name="{{'collectSub'.$artwork['id']}}" id="collection_id" class="form-control">
                            <option selected="selected" value="-2">Choose</option>
                            @foreach ($collections as $collection)
                            <option value="{{$collection['id']}}">{{$collection['name']}}</option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    </div>
                @endforeach
            </table>
        </div>
        MUSEUMS
        <div class="form-group2" style="margin:4px, 4px; padding:4px; width: 500px; height: 110px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            @foreach($museums as $museum)
                <div class="museum">
                    <label>
                        <input type="radio" id="{{'museo'.$museum['id']}}" name="museum" value="{{$museum['id']}}">
                        {{$museum['name']}}
                    </label>
                </div>
            @endforeach
        </div>
        </br>
        <button class="btn btn-primary" type="submit" style="text-align:center">Update</button>
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
    </form>
</body>
<script type=text/javascript>
$('#collection_id').change(function(){
    var elements = document.getElementsByClassName("art");
    var id = $(this).val();
    if(id != -1)
    {
        var url = '{{ route("getDetailsCollection", ":id") }}';
        var url2 = '{{ route("collectionArtworks", ":id") }}';
        url = url.replace(':id', id);
        url2 = url2.replace(':id', id);
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response){
                if(response != null){
                    document.getElementById('museo'+response.museum_id).checked = true;
                    $('#name').val(response.name);
                    $.ajax({
                        url: url2,
                        type: 'get',
                        dataType: 'json',
                        success: function(response2){
                            result = response2;
                            if(response2 != null){
                                for (var i = 0, len = elements.length; i < len; i++) {
                                    for(var j = 0, len2 = response2.length; j < len2; j++)
                                    {
                                        document.getElementById('collect'+elements[i].value).style.visibility = "hidden";
                                        $test = document.getElementById('collectSub'+elements[i].value);
                                        $test.options[0].value = "-2";
                                        elements[i].removeEventListener("click",unhide);
                                        elements[i].checked = false;
                                        if(elements[i].value == response2[j].id)
                                        {
                                            elements[i].checked = true; 
                                            document.getElementById('collectSub'+elements[i].value).options[0].value = "-1";
                                            elements[i].addEventListener("click",unhide);
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }
        });
    }
    else{
        for (var i = 0, len = elements.length; i < len; i++) {
                        elements[i].checked = false;
                    }
        $('#name').val("");
    }
});
</script>
<script type=text/javascript>
function unhide(event) {
    obj = event.currentTarget;
    if (obj.checked) 
    {
        document.getElementById('collect'+obj.value).style.visibility = "hidden";
    } 
    else 
    {
        document.getElementById('collect'+obj.value).style.visibility = "visible";
        document.getElementById('collectSub'+obj.value).selectedIndex = 0; 
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
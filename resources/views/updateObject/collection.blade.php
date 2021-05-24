@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")

<style>
select option[disabled] {
    display: none;
}
</style>

<body @if(!is_null(old('art'))) onLoad="launcher()" @endif>
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
            <option value="{{$collection['id']}}" @if($collection['id'] == old('collection_id'))) selected @endif >{{$collection['name']}}</option>
            @endforeach
        </select>
        </br>
        <input type="text" class="form-control" id="name" name="name" placeholder="Collection Name" value="{{ old('name') }}"/>
        <h4 style="padding:1em; text-align:center;"> ARTWORKS </h3>
            <div class="form-group1" style="box-shadow: 5px 10px 8px #888888; border: 1px solid; margin:4px; width: 500px; height: 200px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
                <table id="table" name="table">
                @foreach($artworks as $artwork)
                    <tr class="artwork">
                        <td><label>
                            <input type="checkbox" id="{{'check'.$artwork['id']}}"  name="art[]" class="art" value="{{$artwork['id']}}"
                                 @if(!is_null(old('art')) && in_array($artwork['id'], old('art'))) checked="checked"
                                 @endif >
                            {{$artwork['title']}}
                        </td>
                        @if(!is_null(old('art')) && !in_array($artwork['id'], old('art')) && $artwork['collection_id'] == old('collection_id'))
                        <td id="{{'collect'.$artwork['id']}}">
                        @else
                        <td id="{{'collect'.$artwork['id']}}" style="visibility:hidden;">
                        @endif
                            <select  id="{{'collectSub'.$artwork['id']}}" name="{{'collectSub'.$artwork['id']}}" id="collection_id" class="form-control">

                            <option selected="selected" value="-2">Choose</option>
                            @foreach ($collections as $collection)
                            <option value="{{$collection['id']}}" @if($collection['id'] == old('collectSub'.$artwork['id'])) selected @endif >{{$collection['name']}}</option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    </div>
                @endforeach
            </table>
        </div>
        <h4 style="padding:1em; text-align:center;"> MUSEUMS </h3>
            <div class="form-group2" style="box-shadow: 5px 10px 8px #888888; border: 1px solid; margin:4px;width: 500px; height: auto; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            @foreach($museums as $museum)
                <div class="museum">
                    <label>
                        <input type="radio" id="{{'museo'.$museum['id']}}" name="museum" value="{{$museum['id']}}" @if(old('museum') == $museum['id']) checked @endif>
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
                                        $hidden = document.getElementById('collectSub'+elements[i].value);
                                        $hidden.options[0].value = "-2";
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
        for (var i = 0, len = elements.length; i < len; i++)
                        elements[i].checked = false;
        ele = document.getElementsByName("museum");
        for(var i=0;i<ele.length;i++)
                ele[i].checked = false;
        $('#name').val("");
    }
});
</script>
<script>
function launcher() {
    var elements = document.getElementsByClassName("art");
    var url = '{{ route("collectionArtworks", ":id") }}';
    url = url.replace(':id', document.getElementById("collection_id").value);
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            debugger;
            for (var i = 0, len = elements.length; i < len; i++) {
                if(document.getElementById('collect'+elements[i].value).style.visibility != "hidden") elements[i].addEventListener("click",unhide);
                else if(elements[i].checked)
                {
                    for(var j = 0, len = response.length; j < len; j++)
                    if(response[j].id == elements[i].value)
                    {
                        elements[i].addEventListener("click",unhide);
                        break;
                    }
                    
                } 
            }   
        }
    });
}
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

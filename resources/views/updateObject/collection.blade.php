@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Update Collection</h1>
    <form method="POST" action="{{route('museum.update')}}">
    @if($errors->any())
        <h4 style="position:absolute;left:60%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")ACTUALIZADO CON EXITO @endif</h4>
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
        ARTWORKS
        <div class="form-group1" style="margin:4px, 4px; padding:4px; width: 500px; height: 200px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            <table>
                @foreach($artworks as $artwork)
                    <tr class="artwork">
                        <td><label>
                            <input type="checkbox" class="art" value="{{$artwork['id']}}">
                            {{$artwork['title']}}
                        </td>
                        <td id="{{'collect'.$artwork['id']}}" style="visibility:hidden;">
                            <select  id="{{'collectSub'.$artwork['id']}}" name="{{'collectSub'.$artwork['id']}}" id="collection_id" class="form-control">
                            <option selected="selected" value="-1">Choose</option>
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
        var url2 = '{{ route("collectionArtworks", ":id") }}';
        url = url.replace(':id', id);
        url2 = url2.replace(':id', id);
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function(response){
                if(response != null){
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
                                        document.getElementById('collect'+elements[i].value).value = "-1";
                                        if(elements[i].value == response2[j].id)
                                        {
                                            elements[i].checked = true; 
                                            elements[i].addEventListener("click",unhide);
                                            break;
                                        }
                                        else
                                        {
                                            elements[i].removeEventListener("click",unhide);
                                            elements[i].checked = false;
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
                        elements[i].checked = true;
                    }
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
        debugger;
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
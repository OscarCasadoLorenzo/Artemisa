@extends('templates.main')
@section('information')
<body>
    <h1 style="position:absolute;left:35%">Update Museum</h1>
    <form method="POST" action="{{route('museum.update')}}" >
    @csrf
        </br>
        <div style="position:absolute;top:10%;right:40%;width: 500px;">
        <select  name="museum_id" id="museum_id" class="form-control">
                <option value="-1">Choose a museum</option>
                @foreach ($museums as $museum)
                <option value="{{$museum['id']}}">{{$museum['name']}}</option>
                @endforeach
            </select>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name"/>
        <input type="text" class="form-control" id="location" name="location" placeholder="Location"/>
        <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
        <input type="text" class="form-control" id="email" name="email" placeholder="email"/>
        <input type="text" class="form-control" id="imgRoute" name="imgRoute" placeholder="imgRoute"/>
        <!--<input type="text" class="form-control" id="type" />-->
        </br>
        <button type="submit" >Update</button>
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
                $('#imgRoute').val(response.imgRoute);

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
});

</script>
@endsection


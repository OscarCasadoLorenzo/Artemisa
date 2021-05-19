@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Update Museum</h1>
    <form method="POST" action="{{route('museum.update')}}" >
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
        <input type="text" class="form-control" id="imgRoute" name="imgRoute" placeholder="imgRoute" value="{{ old('imgRoute') }}"/>
        <!--<input type="text" class="form-control" id="type" />-->
        </br>
        <button class="btn btn-primary" type="submit" style="text-align:center">Update</button>
    </br>
    <div class="container">
    </br>
        @if(count($errors) > 0)
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
@else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection


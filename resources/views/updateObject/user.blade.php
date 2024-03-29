@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")


<body>
    <h1 style="text-align:center">Update User</h1>
    @if($errors->any())
    <h4 style="float:right;margin-right:10%;color:green;">@if($errors->first() == "ACTUALIZADO CON EXITO")UPDATED SUCCESSFULLY @endif</h4>
    @endif
    <form method="POST" action="{{route('user.update')}}">
    @csrf
        </br>
        <div style="margin-left:25%; margin-right:25%; ">
        <select  name="user_id" id="user_id" class="form-control" style="width: auto;">
                <option value="-1">Choose an User</option>
                @foreach ($users as $user)
                <option value="{{$user['id']}}"  @if (old('user_id') == $user['id']) selected="selected" @endif > {{$user['email']}}</option>
                @endforeach
            </select>
        <table>
        <tr>
        <td><input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}"/></td>
        <td><input type="text" class="form-control" id="surname1" name="surname1" placeholder="First surname" value="{{old('surname1')}}"/></td>
        <td><input type="text" class="form-control" id="surname2" name="surname2" placeholder="Second surname" value="{{old('surname2')}}"/></td>
        <tr>
        </table>
        <input type="date" class="form-control" style="width:auto" id="birth_date" name="birth_date" placeholder="Date of birth" value="{{old('birth_date')}}"/>
        <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{old('location')}}"/>
        <select  name="type" id="type" class="form-control" style="width: auto;">
                <option style="display:none"> </option>
                <option value="visitor" @if (old('type') == "visitor") selected="selected" @endif >visitor</option>
                <option value="admin" @if (old('type') == "admin") selected="selected" @endif>admin</option>
        </select>
        <!--<input type="text" class="form-control" id="type" />-->
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{old('email')}}"/>
        <input type="password" class="form-control" id="aPassword" name="aPassword" placeholder="Old password" value="{{old('aPassword')}}"/>
        <input type="password" class="form-control" id="nPassword" name="nPassword" placeholder="New password" value="{{old('nPassword')}}"/>
        <input type="password" class="form-control" id="nPassword2" name="nPassword2" placeholder="Repeat your new password" value="{{old('nPassword2')}}"/>
        </br>
        <button class="btn btn-primary" type="submit" >Update</button>

    </br> </br>
<div class="container">
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
        </div>




    </form>
</body>
<script type=text/javascript>
$('#user_id').change(function(){
    var id = $(this).val();
    var url = '{{ route("getDetailsUser", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#name').val(response.name);
                $('#surname1').val(response.surname1);
                $('#surname2').val(response.surname2);
                $('#birth_date').val(response.birth_date);
                $('#location').val(response.location);
                $('#type').val(response.type);
                $('#email').val(response.email);

            }
            else{
                $('#name').val('');
                $('#surname1').val('');
                $('#surname2').val('');
                $('#birth_date').val('');
                $('#location').val('');
                $('#type').val('');
                $('#email').val('');
            }
            $('#aPassword').val('');
            $('#nPassword').val('');
            $('#nPassword2').val('');
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

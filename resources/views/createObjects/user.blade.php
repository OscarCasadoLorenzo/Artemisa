@extends("templates.main")
<style>
    body{
            background-image: url("images/others/wallpaper.jpg") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
    form{
        text-align: right;
    }

    div ul{
        margin:auto;
        width:60%;
        text-align: center;
    }
</style>
@section('title', 'Create user')

@section('information')



    <div class="container">


        <form action="/users" method="post">
            @csrf
        <div class="col-md-7 mb-3">
            <label for="nm">Name</label>
            <input type="text" id="nm" name="name" autofocus value="{{ old('name') }}">
        </div>

        <div class="col-md-7 mb-3">
            <label for="fs">First Surname</label>
            <input type="text" id="fs" name="surname1" autofocus value="{{ old('surname1') }}">
        </div>

        <div class="col-md-7 mb-3">
            <label for="ss">Second Surname</label>
            <input type="text" id="ss" name="surname2" autofocus value="{{ old('surname2') }}">
        </div>

        <div class="col-md-7 mb-3">
            <label for="bd">Birth Date</label>
            <input type="date" id="bd" name="birth_date" autofocus value="{{ old('birth_date') }}">
        </div>

        <div class="col-md-7 mb-3">
            <label for="lc">Location</label>
            <input type="text" id="lc" name="location" autofocus value="{{ old('location') }}">
        </div>
        <div class="col-md-7 mb-3">
            <label for="em">Email</label>
            <input type="email" id="em" name="email" autofocus value="{{ old('email') }}">
        </div>
        <div class="col-md-7 mb-3">
            <label for="pw">Password</label>
            <input type="password" id="pw" name="password" autofocus value="{{ old('password') }}">
        </div>

        <div class="col-md-6 mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>

        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert" style="width:auto;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        </form>
    </div>
@endsection

@extends("templates.main")

@section('title', 'Artwork xxx')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($user->imgRoute)}} alt="">
        </div>



    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$user->name}} {{$user->surname1}} {{$user->surname2}}</h1>
        <p>Birth date: {{$user->birth_date}}</p>
        <p>Location: {{$user->location}}</p>
        <p>Type: {{$user->type}}</p>
        <p>Email: {{$user->email}}</p>

    </div>
    <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->




    </div>
    <!-- /.container -->
@endsection

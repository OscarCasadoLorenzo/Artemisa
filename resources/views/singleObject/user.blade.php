@extends("templates.main")

@section('title', 'User')

@section('information')
@if (Auth::check())
<style>
 .img-fluid{
        width:1000px !important;
        object-fit:fill;
    }

</style>
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
        
    </div>
    <!-- /.col-md-4 -->
    </br>




    <div style="display:flex; text-align:center">
        @foreach($artworks as $artwork)
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <a href="/artworks/{{$artwork->id}}">
                        <img
                            src= {{asset($artwork->imgRoute)}}
                            class="img-fluid"
                            style="width: 200px; height: 150px;"
                        />
                    </a>

                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </div>

                <div class="card-body">
                    <h5 class="card-title">{{$artwork->title}}</h5>
                    <a href="/artworks/{{$artwork->id}}" class="btn btn-primary">More info</a>
                </div>
            </div>
        @endforeach
        </br>

    </div>
    <div class="d-flex" style= "display:flex, margin-top:30px">
            <div class="mx-auto">
                {{$artworks->links()}}
            </div>
    </div>
    <!-- /.row -->




    </div>
    @else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection

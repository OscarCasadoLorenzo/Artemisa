@extends("templates.main")

@section('title', 'Collection')

@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">

    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$collection->name}}</h1>


        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <h2 class="text-white m-0">View Artworks</h2>
            </br>
                <a class="btn btn-primary" href="/museums/{{$collection->museum_id}}/collections/{{$collection->id}}/artworks">WikiArt</a>

            </div>
            </div>


    </div>
    <!-- /.col-md-4 -->
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

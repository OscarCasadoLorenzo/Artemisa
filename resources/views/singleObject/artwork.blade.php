@extends("templates.main")

@section('title', 'Artwork')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
    <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($artwork->imgRoute)}} alt="">
    </div>


    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$artwork->title}}</h1>
        <p>Movement: {{$artwork->movement}}</p>
        <p>Genre: {{$artwork->genre}}</p>
        <p>Dimensions: {{$artwork->dimensions}}</p>
        <p>Year: {{$artwork->year}}</p>
        <p>Dimensions: {{$artwork->dimensions}}</p>
        <p>eWiki: {{$artwork->eWiki}}</p>

    </div>
    <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
    <div class="card-body">
        <h2 class="text-white m-0">View Author</h2>
    </br>
        <a class="btn btn-primary" href="/authors/{{$author->id}}">WikiArt</a>

    </div>
    </div>



    </div>
    <!-- /.container -->
@endsection

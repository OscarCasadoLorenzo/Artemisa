@extends("templates.main")

@section('title', 'Author')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
    <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($author->imgRoute)}} alt="">
    </div>


    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$author->name}}</h1>
        <p>Nationality: {{$author->nacionality}}</p>
        <p>Birth date: {{$author->birth_date}}</p>
        <p>Movement: {{$author->movement}}</p>


    </div>
    <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    </div>

    <!-- /.container -->
 
        
    <div class="row">
        @foreach($artworks as $artwork)
            <!-- Content Row -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">{{$artwork->name}}</h2>
                                <img src= {{asset($artwork->imgRoute)}} class="img-fluid" style="width: 200px; height: 400px;"/>
                        </div>
                        <div class="card-footer">
                            <a href="/artworks/{{$artwork->id}}" class="btn btn-primary btn-sm">Info</a>
                        </div>
                    </div>
                </div>
        @endforeach
</div>
@endsection

    

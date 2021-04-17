@extends("templates.main")

@section('title', 'Museo xxx')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
    <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($museum->imgRoute)}} alt="">
    </div>

    
    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$museum->name}}</h1>
        <p>Location: {{$museum->location}}</p>
        <p>Address: {{$museum->address}}</p>
        <p>Email: {{$museum->email}}</p>
        <a class="btn btn-primary" href="#">WikiArt</a>
    </div>
    <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
    <div class="card-body">
        <h3 class="text-white m-0">{{$museum->name}}'s Collections</h3>
    </div>
    </div>
    <!-- pruebas sort -->
                    <form action="/filterCollection" method="get">
                        <input type="radio" name="OPCION" value="1"> Identificador&nbsp;
                        <input type="radio" name="OPCION" value="2"> Nombre&nbsp;
                        <input type="radio" name="OPCION" value="3"> Ultimas novedades&nbsp;
                        <input type="hidden" name="museo" value="{{$museum->id}}">
                        <button type="submit" class="btn btn-primary"> Ordenar </button>
                    </form>
    </br>

    
    <div class="row">
        @foreach($collections as $collection)
            <!-- Content Row -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">{{$collection->name}}</h2>
                        </div>
                        <div class="card-footer">
                            <a href="/museums/{{$museum->id}}/collections/{{$collection->id}}/artworks" class="btn btn-primary btn-sm">See artworks</a>
                        </div>
                    </div>
                </div>
        
        @endforeach
    </div>

    </div>
    <!-- /.container -->
@endsection
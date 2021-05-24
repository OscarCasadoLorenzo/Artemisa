@extends("templates.main")

@section('title', 'Author')

<style>
    #information{
        display:block !important;
    }

    #ficha{
        display:flex;
        margin-bottom:40px;
    }

    .obras{
        display:flex;
        margin-top:40px;
        margin:auto;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .img-fluid{
        width:400px;
        height:150px !important;
        object-fit:fill;
    }
</style>

@section('information')
    <div id=ficha style="display:flex;
    justify-content:center;">
        <div class="col-lg-7" style = "width:auto;">
            <img class="img" src={{asset($author->imgRoute)}} alt="" style="width:60%; height:auto; border-radius:35%; max-height:700px; min-height: 350px; min-width:300px">
        </div>


        <!-- /.col-lg-8 -->
        <div class="col-lg-5">
        </br></br>
            <h1 class="font-weight-light">{{$author->name}}</h1>
            <p>Nationality: {{$author->nacionality}}</p>
            <p>Birth date: {{$author->birth_date}}</p>
            <p>Movement: {{$author->movement}}</p>
        </div>
    </div>

    <h2>Obras:</h2> </br>
    <div class="obras" style="display:flex;
    justify-content:center;">
        @foreach($artworks as $artwork)
            <!-- Content Row -->
                <div class="col-md-4 mb-5" style="text-align: center;">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$artwork->title}}</h5>
                                <img src= {{asset($artwork->imgRoute)}} class="img-fluid" style="width:auto; height:60%; max-height:350px; min-height: 175px; min-width:150px"/>
                        </div>
                        <div class="card-footer">
                            <a href="/artworks/{{$artwork->id}}" class="btn btn-primary btn-sm">See about</a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection



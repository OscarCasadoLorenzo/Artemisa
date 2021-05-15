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

    <div id=ficha>
        <div class="col-lg-7" style = "width:25%;">
            <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($author->imgRoute)}} alt="" style="width: 300px; height: 300px !important;">
        </div>


        <!-- /.col-lg-8 -->
        <div class="col-lg-5">
            <h1 class="font-weight-light">{{$author->name}}</h1>
            <p>Nationality: {{$author->nacionality}}</p>
            <p>Birth date: {{$author->birth_date}}</p>
            <p>Movement: {{$author->movement}}</p>
        </div>
    </div>
 
        
    <div class="obras">
        @foreach($artworks as $artwork)
            <!-- Content Row -->
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{$artwork->title}}</h5>
                                <img src= {{asset($artwork->imgRoute)}} class="img-fluid" style="width: 200px; height: 400px;"/>
                        </div>
                        <div class="card-footer">
                            <a href="/artworks/{{$artwork->id}}" class="btn btn-primary btn-sm">See about</a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection

    

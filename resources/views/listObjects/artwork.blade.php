@extends("templates.main")

@section('title', 'Artworks')


@section('information')
<style>
    .img-fluid{
        width:auto !important;
        height: 400px !important;
        object-fit:fill;
    }

    .grid-container{
        display:grid;
        grid-template-columns: 33% 33% 33%;
        text-align:center;
    }

    .grid-item{
        text-align:center;
        display:flex;
    }
</style>


    <div class="grid-container">
        @foreach($artworks as $artwork)
            <div class="grid-item">
                <div class="card" style="margin:10px;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <a href="/artworks/{{$artwork->id}}">
                            <img
                                src= {{asset($artwork->imgRoute)}}
                                class="img-fluid"
                                style=" text-align:center;"
                            />
                        </a>

                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{$artwork->title}}</h5>
                        <a href="/artworks/{{$artwork->id}}" class="btn btn-primary">More info</a>

                    </div>
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
@endsection

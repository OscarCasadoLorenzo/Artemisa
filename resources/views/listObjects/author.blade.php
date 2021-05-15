@extends("templates.main")

@section('title', 'Authors')


<style>
.img-fluid{
    width:400px;
    height:150px !important;
    object-fit:fill;
}


#information{
    display:block !important;
}

#autores{
    display:flex;
    justify-content:center;
}

</style>

@section('filters')
    @include ("filters.author")
@endsection

@section('information')
    <div id="autores">
    @foreach($authors as $author)
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <a href="/museums/{{$author->id}}">
                    <img
                        src= {{asset($author->imgRoute)}}
                        class="img-fluid"
                        style="width: 200px; height: 400px;"
                    />
                </a>

                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$author->name}}</h5>
                <a href="/authors/{{$author->id}}" class="btn btn-primary">More info</a>
            </div>
        </div>
    @endforeach
    </div>


    <div class="d-flex" style= "margin-top:30px">
    <div class="mx-auto">
        {{$authors->links()}}
    </div>
</div>

@endsection

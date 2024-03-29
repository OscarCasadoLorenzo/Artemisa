@extends("templates.main")

@section('title', 'Museums')

<style>
    .img-fluid{
        width:1000px !important;
        object-fit:fill;
    }

    .grid-container{
        display:grid;
        grid-template-columns: 50% 50%;
    }

    .grid-item{
        display:flex;
    }
</style>

@section('filters')
    @include ("filters.museum")
@endsection

@section('information')

    <div class="grid-container">
        @foreach($museums as $museum)
            <div class="grid-item">
                <div class="card" style="margin:10px;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="margin:15px">
                        <a href="/museums/{{$museum->id}}">
                            <img
                                src= {{asset($museum->imgRoute)}}
                                class="img-fluid"
                                style="width:auto;"
                            />
                        </a>

                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                    </div>

                    <div class="card-body" style = "text-align:center;">
                        <h5 class="card-title">{{$museum->name}}</h5>
                        <p class="card-text">{{$museum->location}}</p>
                        <a href="/museums/{{$museum->id}}" class="btn btn-primary">Show collections</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

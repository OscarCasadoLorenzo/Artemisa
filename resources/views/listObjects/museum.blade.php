@extends("templates.main")

@section('title', 'Museums')

<style>
    .img-fluid{
        width:1200px;
        height:450px !important;
        object-fit:fill;
    }
</style>
@section('filters')
    @include ("filters.museum")
@endsection

@section('information')

    @foreach($museums as $museum)
        <div class="card" style="display:flex;  margin:10px; ">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="margin:15px">
                <a href="/museums/{{$museum->id}}">
                    <img
                        src= {{asset($museum->imgRoute)}}
                        class="img-fluid"
                        style="width: 100%;
                        height: auto;"
                    />
                </a>

                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$museum->name}}</h5>
                <p class="card-text"> Location: {{$museum->location}}</p>
                <a href="/museums/{{$museum->id}}" class="btn btn-primary">Show collections</a>
            </div>
        </div>
    @endforeach
@endsection

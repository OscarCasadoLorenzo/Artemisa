@extends("templates.main")

@section('title', 'Obras de arte')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    @foreach($artworks as $artwork)
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <a href="/museums/{{$artwork->id}}">
                    <img
                        src= {{asset($artwork->imgRoute)}}
                        class="img-fluid"
                        style="width: 200px; height: 150px;"
                    />
                </a>

                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$artwork->title}}</h5>
                <a href="/museums/{/collections" class="btn btn-primary">More info</a>
            </div>
        </div>
    @endforeach
    {{$artworks->links()}}
@endsection
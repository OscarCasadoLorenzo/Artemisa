@extends("templates.main")

@section('title', 'Museums')

@section('filters')
    @include ("filters.museum")
@endsection

@section('information')

    @foreach($museums as $museum)
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <a href="/museums/{{$museum->id}}">
                    <img
                        src= {{asset($museum->imgRoute)}}
                        class="img-fluid"
                        style="width: 650px; height: 400px;"
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

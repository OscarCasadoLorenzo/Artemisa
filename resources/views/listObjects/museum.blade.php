@extends("templates.main")

@section('title', 'Museos')

@section('header')
    @include ("templates.navbar")
@endsection

@section('information')
    @foreach($museums as $museum)
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img
                    src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                    class="img-fluid"
                />
                <a href="/museums/{{$museum->id}}">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
            </div>

            <div class="card-body">
                <h5 class="card-title">{{$museum->name}}</h5>
                <p class="card-text"> Location: {{$museum->location}}</p>
                <a href="/museums/{{$museum->id}}/collections" class="btn btn-primary">Show collections</a>
            </div>
        </div>
    @endforeach
@endsection
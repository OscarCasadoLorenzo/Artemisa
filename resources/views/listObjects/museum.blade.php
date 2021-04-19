@extends("templates.main")

@section('title', 'Museos')

@section('header')
    @include ("templates.navbar")
@endsection
@section('information')
<div class="col-sm-2">
    <form action="/busqueda" method="get">
        <h5> Nombre<input type="text" name="name"> </h5>
        <h5> Localización<input type="text" name="location"> </h5>                        
        <br/>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form >
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                <a href="/museums/{{$museum->id}}/collections" class="btn btn-primary">Show collections</a>
            </div>
        </div>
    @endforeach
@endsection
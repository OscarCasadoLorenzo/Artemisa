@extends("templates.main")

@section('title', 'Artwork')


@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<style>
    #swapHeart > span {
    color: red;
    font-size:20px;
    }

    #swapHeart:active {
    box-shadow: none;
    }

    #swapHeart:active, #swapHeart:hover, #swapHeart:focus {
    background-color:white;
    }

    #swapHeart{
        margin: 0 auto;
        display: block;
    }
</style>

<script>
    jQuery(function($) {
  $('#swapHeart').on('click', function() {
    var $el = $(this),
      textNode = this.lastChild;
    $el.find('span').toggleClass('glyphicon-heart glyphicon-heart-empty');
    $el.toggleClass('swap');
  });
});
</script>
    <!-- Page Content -->
    <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
    <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src={{asset($artwork->imgRoute)}} alt="">
    </div>


    <!-- /.col-lg-8 -->
    <div class="col-lg-5">
        <h1 class="font-weight-light">{{$artwork->title}}</h1>
    </br>
        <p>Movement: {{$artwork->movement}}</p>
        <p>Genre: {{$artwork->genre}}</p>
        <p>Dimensions: {{$artwork->dimensions}}</p>
        <p>Year: {{$artwork->year}}</p>
        <p>Dimensions: {{$artwork->dimensions}}</p>
        <!-- aqui va el corazoncito -->
        @if(Auth::check())
        <form method="POST" action="{{ route('fav') }}">
            @csrf
            <input type="hidden" name="id_user" value="{{Auth::User()->id}}">
            <input type="hidden" name="id_artwork" value="{{$artwork->id}}">
            <button type="submit" id="swapHeart" class="btn btn-default swap">
                @if($corazon == 0)
                    <span class="glyphicon glyphicon-heart-empty"></span>
                @else
                    <span class="glyphicon glyphicon-heart"></span>
                @endif
            </button>
        </form>
        @endif
    </div>
    <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
    <div class="card-body">
        <!-- <a class="btn btn-primary" href="/authors/{{$author->id}}"> <h2 class="text-white m-0">View Author</h2> </a> -->
        <h2>Author</h2>
        <a class="btn btn-primary" href="/authors/{{$author->id}}"> <h2 class="text-white m-0">{{$author->name}}</h2> </a>
        <h2>Museum</h2>
        <a class="btn btn-primary" href="/museums/{{$museum->id}}"> <h2 class="text-white m-0">{{$museum->name}}</h2> </a>
    </div>
    </div>



    </div>
    @else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection

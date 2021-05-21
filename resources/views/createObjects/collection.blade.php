@extends('templates.main')
@section('information')
@if (Auth::check() && Auth::User()->type == "admin")
<body>
    <h1 style="text-align:center;">Create Collection</h1>
    <form method="POST" action="{{route('collection.save')}}" >
    @csrf
    @if($errors->any())
    <h4 style="float:right;margin-right:20%;color:green;">@if($errors->first() == "Collection Created") Collection Created @endif</h4>
    @endif
        </br>
        <div style="float:center; margin-right:35%; margin-left:35%;">
        <input type="text" class="form-control" id="name" name="name" placeholder="Collection Name" value="{{old('name')}}"/>
        ARTWORKS
        <div class="form-group1" style="margin:4px, 4px; padding:4px; width: 500px; height: 200px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            <table id="table" name="table">
                @foreach($artworks as $artwork)
                    <tr class="artwork">
                        <td><label>
                            <input type="checkbox" id="{{'check'.$artwork['id']}}"  name="art[]" class="art" value="{{$artwork['id']}}">
                            {{$artwork['title']}}
                    </tr>
                    </div>
                @endforeach
            </table>
        </div>
        MUSEUMS
        <div class="form-group2" style="margin:4px, 4px; padding:4px; width: 500px; height: 110px; overflow-x: hidden; overflow-y: auto; text-align:justify;">
            @foreach($museums as $museum)
                <div class="museum">
                    <label>
                        <input type="radio" id="{{'museo'.$museum['id']}}" name="museum" value="{{$museum['id']}}">
                        {{$museum['name']}}
                    </label>
                </div>
            @endforeach
        </div>
        </br>
        <button class="btn btn-primary" type="submit" style="text-align:center">Create</button>
        </br>
        @if(count($errors) > 0 && $errors->first() != "Collection Created")
        <div class="alert alert-danger" role="alert" style="width:auto;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    </form>
</body>
@else
<body>
    <div>
        <h3>Access Denied, please log in</h3>
        <a href="/login">Login</a>
    </div>
</body>
@endif
@endsection
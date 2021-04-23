@extends('templates.main')

@section('title', 'Create museum')

@section('information')
    <body>
        <div class ="container">

        <h1>Create new museum</h1>
        <form action="/museums" method="post" enctype="multipart/form-data">
            @csrf
            </br>
            <div class="form-group">
                <label for="nm">Name</label>
                <input type="text" id="nm" name="name" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="lc">Location</label>
                <input type="text" id="lc" name="location" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="ad">Address</label>
                <input type="text" id="ad" name="address" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="em">Email</label>
                <input type="email" id="em" name="email" autofocus>
            </div>
            </br>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" id="img" name="imgRoute" autofocus>
            </div>
            </br>
            <button class="btn btn-primary"  type="submit">Submit</button>
        </form>
        </div>
    </body>
@endsection




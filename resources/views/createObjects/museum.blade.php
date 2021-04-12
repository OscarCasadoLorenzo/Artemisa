@extends('templates.main')

@section('information')
    <body>
        <h1>Create new museum</h1>
        <form action="/museums" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nm">Name</label>
            <input type="text" id="nm" name="name" autofocus>
            
            <label for="lc">Location</label>
            <input type="text" id="lc" name="location" autofocus>
            
            <label for="ad">Address</label>
            <input type="text" id="ad" name="address" autofocus>
            
            <label for="em">Email</label>
            <input type="email" id="em" name="email" autofocus>
            
            <label for="img">Image</label>
            <input type="file" id="img" name="imgRoute" autofocus>

            <button type="submit">Submit</button>
        </form>
    </body>
@endsection




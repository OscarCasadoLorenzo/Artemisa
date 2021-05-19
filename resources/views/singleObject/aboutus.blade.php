@extends("templates.main")

@section('title', 'Artwork')


@section('information')

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


<div class="container">
    <div class="row align-items-center my-5">

        <div>
            <div>
                <h2>
                <div class="content">What's this all about?</div>
                </h2>
            </div>
        </div>
        <div>
            <div>
                <div>
                <div class="content">If you're reading this, chances are that you're stuck inside right now due to the Coronavirus outbreak. There are plenty of reasons why it can be frustrating to be stuck at home, one of which is that you can't get out and explore the world around you. 
                <div>
            </div> 
        <br>
        Artemisa aims to make up for this by letting you tour the world's most famous virtual museums.
        </div>

        <div>
            <div>
                <div>
                    <h2><div class="content">What's a virtual museum?</div></h2>
                </div>
            </div>
            <div>
            <div>
            <div>
            <div class="content">A virtual museum is a digitised version of a real-life museum. Many virtual museums offer virtual tours, which let you walk through the museum and examine different artefacts as if you were there in person. Other virtual museums don't offer virtual tours, but do let you explore huge parts of their collections online.</div></div></div></div></div>

            <div><div><div><h2><div class="content">Got it, but why would I actually do this?</div></h2></div></div><div><div><div><div class="content">Different people get different things from the idea of a virtual museum. <div></div>
<br>For some, virtual museums offer something to do during a lockdown that's not just binge-watching Netflix. For others, visiting virtual museums around the globe offers some of the benefits of travelling; being able to see other cultures, and learn about things outside of your immediate experience. <br><br>If you haven't tried visiting a virual museum, give it a go and see what appeals to you!</div></div></div></div></div>

    </div>
</div>
@endsection

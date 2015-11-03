@extends('commentary.master')
@section('content')
<div class="container">
    <aside class="col-md-3 well left">
        <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
    </aside>

    <!--INDEX-->
    <div class="container  workArea col-md-9" id="index">
        <div class="content col-md-12">
            <h2>{{$match->title}}</h2>
            <p>{{$match->date}} | Updated by {{$match->author}}</p>
            <blockquote>{{$match->description}}</blockquote>

            <p>
                @foreach($match->commentaries as $comments)
                    <span>{{$comments->time.": "}}</span>
                    <span>{{$comments->commentary}}</span><hr>
            @endforeach
            </p>
        </div>
    </div>

</div>
<script>
    document.getElementById("title").innerHTML = "Match Details";
</script>
@stop
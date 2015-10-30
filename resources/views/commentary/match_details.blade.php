@extends('commentary.master')
@section('content')
<div class="container">
    <aside class="col-md-3 well left">
        <ul>
            <li><a href="/" id="newMatchLab">Back To Home</a></li>
        </ul>
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
@stop
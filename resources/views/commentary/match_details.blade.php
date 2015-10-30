@extends('master')
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
            <h2>Title of the match</h2>
            <p>Date | Updated by Author</p>
            <blockquote>Description</blockquote>

            <p>
                <b id="time">Time:</b>
                <span id="commentary">Commentary</span>
            </p>
        </div>
    </div>

</div>
@stop
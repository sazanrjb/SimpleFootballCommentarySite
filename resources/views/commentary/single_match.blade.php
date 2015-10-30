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
                @if(Session::has('notice'))
                    <p class="alert alert-info">{{Session::get('notice')}}</p>
                    @endif
                <h2>{{$match->title}}</h2>
                <p>{{$match->date}} | Updated by {{$match->author}}</p>
                <blockquote>{{$match->description}}</blockquote>

                <p>
                    {!! Form::open(array('route'=>'commentary.store','id'=>'1')) !!}
                    <span>Time</span>
                    <input type="number" name="time" placeholder="Time" class="form-control">
                    <span id="commentary">Commentary</span>
                    <textarea name="commentary" class="form-control" placeholder="Commentary"></textarea>
                    <input type="hidden" name="mid" value="{{$match->id}}">
                    <input type="submit" value="Submit">
                    {!! Form::close() !!}
                </p>
            </div>
        </div>

    </div>
@stop
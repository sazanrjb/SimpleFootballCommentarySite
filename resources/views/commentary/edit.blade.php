@extends('commentary.master')

@section('content')

    <div class="container">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
            <ul>
                <li><a href="#" id="newMatchLab">New Match</a></li>
                <li><a href="#" id="pausedMatchesLab">Paused Matches</a></li>
                <li><a href="#" id="runningMatchesLab">Running Matches</a></li>
                <li><a href="#" id="closedMatchesLab">Closed Matches</a></li>
            </ul>
        </aside>

        <!--NEW MATCH-->
        <div class="container workArea col-md-9" id="editDetails">
            <div class="content col-md-12">
                {!! Form::open(array("action"=>array('MatchController@update_detail','id'=>$match->id),"method"=>"post")) !!}
                Title <input type="text" name="title" class="form-control" value="{{$match->title}}" placeholder="Title">
                Date <input type="text" name="date" class="form-control  datepicker" value="{{date('m/d/Y',strtotime($match->date))}}" placeholder="Date">
                Status <select name="status" class="form-control">
                    <option value="paused">Paused</option>
                    <option value="running">Running</option>
                </select>
                Description <textarea class="form-control" name="description"  placeholder="Description">{{$match->description}}</textarea>
                Update by <select name="author" class="form-control">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}} [{{$author->username}}]</option>
                    @endforeach
                </select> <br>
                <input type="submit" value="submit" class="form-control btn btn-info">
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END OF NEW MATCH-->
    </div>

@stop


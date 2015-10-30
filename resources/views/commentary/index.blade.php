@extends('commentary.master')

@section('content')

    <div class="container">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
            @if(\Illuminate\Support\Facades\Auth::check())
                <ul>
                    <li><a href="#" id="newMatchLab">New Match</a></li>
                    <li><a href="#" id="pausedMatchesLab">Paused Matches</a></li>
                    <li><a href="#" id="runningMatchesLab">Running Matches</a></li>
                    <li><a href="#" id="closedMatchesLab">Closed Matches</a></li>
                </ul>
            @endif
        </aside>

        @if(\Illuminate\Support\Facades\Auth::check())
                <!--INDEX-->
        <div class="container  workArea col-md-9" id="index">
            @if(Session::has('notice'))
                <p class="alert alert-info">{{Session::get('notice')}}</p>
            @endif

            @foreach($errors->all() as $error)
                <p class="alert alert-info">{{$error}}</p>
            @endforeach
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Total Matches</th>
                        <th>Paused Matches</th>
                        <th>Running Matches</th>
                        <th>Closed Matches</th>
                    </tr>
                    <tr>
                        <td>{{\App\Match::count()}}</td>
                        <td>{{\App\Match::where('status','=','paused')->count()}}</td>
                        <td>{{\App\Match::where('status','=','running')->count()}}</td>
                        <td>{{\App\Match::where('status','=','closed')->count()}}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!--NEW MATCH-->
        <div class="container workArea col-md-9" id="newMatch">
            <div class="content col-md-12">
                {!! Form::open(array('route'=>'match.store')) !!}
                Title <input type="text" name="title" class="form-control" placeholder="Title">
                Date <input type="text" name="date" class="form-control datepicker" placeholder="Date">
                Status <select name="status" class="form-control">
                    <option value="paused">Paused</option>
                    <option value="running">Running</option>
                </select>
                Description <textarea class="form-control" name="description" placeholder="Description"></textarea>
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

        <!--PAUSED MATCHES-->
        <div class="container workArea col-md-9" id="pausedMatches">
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Match</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($matches as $match)
                        @if($match->status == "paused" && $match->count()>0)
                            <tr>
                                <td>{{$match->title}}</td>
                                <td>{{$match->description}}</td>
                                <td>{{$match->date}}</td>
                                <td><a href="/edit_details/{{$match->id}}"> <i class="glyphicon glyphicon-edit text-info"> </i>Edit</a> |
                                    {!! Form::open(array('route'=>array('match.destroy','id'=>$match->id),'method'=>'delete')) !!}
                                    {!! Form::submit('Delete',array('class'=>'btn')) !!}
                                    {!! Form::close() !!} | <a href="/setrunning/{{$match->id}}">
                                        <i class="glyphicon glyphicon-star text-muted"> </i>Set Running</a></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END OF PAUSED MATCHES-->


        <!--RUNNING MATCHES-->
        <div class="container workArea col-md-9" id="runningMatches">
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Match</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($matches as $match)
                        @if($match->status == "running" && $match->count()>0)
                            <tr>
                                <td>
                                {!! HTML::linkRoute('match.index',$match->title,array('id'=>$match->id)) !!}
                                <td>{{$match->description}}</td>
                                <td>{{$match->date}}</td>
                                <td>
                                    {{--{!! Form::open(array('route'=>array('match.edit',$match->id))) !!}--}}
                                    {{--<input type="submit" value="Update" class="btn btn-primary text-info"> |--}}
                                    {{--{!! Form::close() !!}--}}
                                    {!! HTML::linkRoute('match.edit', 'Update',array('id'=>$match->id),['class'=>'glyphicon glyphicon-edit']) !!}
                                    {!! Form::open(array('route'=>array('match.destroy','id'=>$match->id),'method'=>'delete')) !!}
                                    {!! Form::submit('Delete',array('class'=>'btn')) !!}
                                    {!! Form::close() !!}
                                    <a href="/closematch/{{$match->id}}"> <i class="glyphicon glyphicon-remove text-danger"> </i>Close</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END OF RUNNING MATCHES-->

        <!--CLOSED MATCHES-->
        <div class="container workArea col-md-9" id="closedMatches">
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Match</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach($matches as $match)
                        @if($match->status == "closed" && $match->count()>0)
                            <tr>
                                <td>{!! HTML::link('/match_detail/'.$match->id,$match->title) !!}</td>
                                <td>{{$match->description}}</td>
                                <td>{{$match->date}}</td>
                                <td> <a href="#"> <i class="glyphicon glyphicon-remove text-danger"> </i>Delete</a></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END OF CLOSED MATCHES-->
                @else
                        <!--RUNNING MATCHES-->
        <div class="container workArea col-md-9">
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Match</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                    @foreach($matches as $match)
                        @if($match->status == "running" && $match->count()>0)
                            <tr>
                                <td>
                                {!! HTML::linkRoute('match.index',$match->title,array('id'=>$match->id)) !!}
                                <td>{{$match->description}}</td>
                                <td>{{$match->date}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END OF RUNNING MATCHES-->
                @endif


    </div>

@stop


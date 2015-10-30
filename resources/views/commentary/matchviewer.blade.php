@extends('commentary.master')
@section('content')
    <div class="container" onload="hello()">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
        </aside>

        <!--INDEX-->
        <div class="container  workArea col-md-9" id="index" >

            <div class="content col-md-12">

                @if(Session::has('notice'))
                    <p class="alert alert-info">{{Session::get('notice')}}</p>
                @endif
                <h2>{{$match->title}}</h2>
                <p>{{$match->date}} | Updated by {{$match->users->name}}</p>
                <blockquote>{{$match->description}}</blockquote>
                    {{--<button id="getc" class="glyphicon glyphicon-refresh"></button>--}}
                    <script>

                        setTimeout("location.reload(true);",3000);

                            {{--$.ajax({--}}
                                {{--url: "/getCommentary",--}}
                                {{--method: "get",--}}
                                {{--data: ({id: '{{$match->id}}'}),--}}
                                {{--success: function (results) {--}}
                                    {{--$('#cArea').html(results);--}}
                                {{--}--}}
                            {{--})--}}


                        window.onload = function(){
                            $.ajax({
                                url: "/getCommentary",
                                method: "get",
                                data: ({id: '{{$match->id}}'}),
                                success: function (results) {
                                    $('#cArea').html(results);
                                }
                            })
                        }
                    </script>
                            <p>
                                    <span id="cArea"></span>
                                    <p></p>
                            </p>
            </div>
        </div>

    </div>
    {{--<script>--}}

        {{--getCommentary('{{$match->id}}');--}}
        {{--function getCommentary(id){--}}
            {{--$.ajax({--}}
                {{--url: "/getCommentary",--}}
                {{--method: "post",--}}
                {{--data: ({id : '{{$match->id}}'}),--}}
                {{--success: function(results){--}}
                    {{--console.log(results);--}}
                {{--}--}}
            {{--})--}}


        {{--}--}}
    {{--</script>--}}
    {!!HTML::script('js/jquery-1.11.3.min.js')!!}

@stop
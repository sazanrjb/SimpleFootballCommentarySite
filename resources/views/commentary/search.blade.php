@extends('commentary.master')

@section('content')

    <div class="container">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
        </aside>

        <!--RUNNING MATCHES-->
        <div class="container workArea col-md-9">
            <div class="content col-md-12">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Match</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                    @foreach($items as $item)
                        @if($item->count()>0)
                            <tr>
                                <td>
                                {!! HTML::linkRoute('match.index',$item->title,array('id'=>$item->id)) !!}
                                <td>{{$item->description}}</td>
                                <td>{{$item->date}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END OF RUNNING MATCHES-->


    </div>
    <script>
        document.getElementById("title").innerHTML = "Search";
    </script>
@stop


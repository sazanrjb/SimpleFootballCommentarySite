<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/jquery-ui.min.css') !!}
    {!! HTML::style('css/custom.css') !!}
</head>
<body>
<div class="container wrapper">
    <header>
        <h2 style="float: left;"><a href="/" class="text-warning">Simple Football Commentary System</a></h2>

        <p>
            <button class="btn btn-primary" style="margin-top: 20px; float: right;" id="searchButton">Search</button>

        <div style="margin-top: 20px; float: right;" id="searchArea">
            {!! Form::open(array('action'=>'MatchController@search','method'=>'post')) !!}
                <input type="text" name="search" id="search" placeholder="Search Matches">
                {!! Form::submit('Search',array('class'=>'btn btn-primary')) !!}
            {!! Form::close() !!}
        </div>

        </p><br><br>
        <h3>
            @if(\Illuminate\Support\Facades\Auth::check())
                <blockquote class="text-warning text-left">Admin Area</blockquote>
                {!! HTML::link('/users','Manage Users',['class'=>'btn btn-info']) !!}
                {!! HTML::link('/logout','Logout',['class'=>'btn btn-success']) !!}
                {!! HTML::link('/changepassword','Change Password',['class'=>'btn btn-danger']) !!}

                @else
                {!! HTML::link('/login','Login',['class'=>'btn btn-success']) !!}
            @endif

        </h3>
    </header>
    <hr>

    @yield('content')

    <hr>
    <footer class="text-center well">
        &copy; sazanrjb | <a href="/">Simple Football Commentary System</a>
    </footer>
</div>
</body>
{!!HTML::script('js/jquery-1.11.3.min.js')!!}
{!!HTML::script('js/jquery-ui.min.js')!!}
{!! HTML::script('js/angular-resource.min.js') !!}
{!! HTML::script('js/angular-route.min.js') !!}
{!!HTML::script('js/custom.js')!!}

</html>
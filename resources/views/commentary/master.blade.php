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
        <h2 style="float: left;"><a href="/">Simple Football Commentary System</a></h2>

        <p>
            <button class="btn btn-primary" style="margin-top: 20px; float: right;" id="searchButton">Search</button>

        <div style="margin-top: 20px; float: right;" id="searchArea">
            <form>
                <input type="text" name="search" id="search" placeholder="Search Matches">
                <button class="btn btn-primary">Search</button>
            </form>
        </div>

        </p><br><br>
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
{!!HTML::script('js/custom.js')!!}

</html>
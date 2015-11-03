
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class="container">
        <div class="col-md-4">

        </div>
        <div class="col-md-4 well">
            {!!Form::open(array('action'=>'LoginController@dologin'))!!}

            <blockquote>MEMBERS LOGIN</blockquote>
            Username <input type="text" name="username" placeholder="Username" class="form-control">
            Password <input type="password" name="password"  placeholder="Password" class="form-control"><br>
                <input type="submit" value="Login" class="btn btn-primary">
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>

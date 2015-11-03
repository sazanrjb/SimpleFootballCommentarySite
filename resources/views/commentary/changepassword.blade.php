@extends('commentary.master')
@section('content')
    <div class="container">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
        </aside>

        <!--INDEX-->
        <div class="container  workArea col-md-9" id="index">
            <div class="content col-md-12" ng-app="myApp" ng-controller="myController">

                @foreach($errors->all() as $error)
                    <p class="alert alert-info">{{$error}}</p>
                @endforeach

                @if(Session::has('notice'))
                    <p class="alert alert-info">{{Session::get('notice')}}</p>
                    @endif
                {!! Form::open(array('action'=>'UserController@doChangePassword','method'=>'post')) !!}
                    Old Password<input type="password" name="oldPassword" placeholder="Old Password" class="form-control">
                    New Password<input type="password" name="newPassword" placeholder="New Password" class="form-control">
                    Confirm Password<input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control"><br>
                    <button class="btn btn-primary" ng-click="changePassword()">Change Password</button>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

    <script>
        document.getElementById("title").innerHTML = "Change Password";
    </script>
@stop
@extends('commentary.master')
@section('content')
    <div class="container">
        <aside class="col-md-3 well left">
            <button class="glyphicon glyphicon-home form-control text-info" id="home">Home</button>
        </aside>

        <!--INDEX-->
        <div class="container  workArea col-md-9" id="index">
            <div class="content col-md-12" ng-app="myApp" ng-controller="myController">
                <h3 ng-show="edit">Create New User</h3>
                <button class="btn btn-primary" ng-click="createUser()" ng-hide="edit">Create new User</button>
                <h3 ng-hide="edit">Edit User</h3>
                <form name="myForm">

                    Name<input type="text" name="name" placeholder="Name" ng-model="name" class="form-control">
                    Username<input type="text" name="username" placeholder="Username" ng-model="username" class="form-control"><br>
                    <button class="btn btn-primary" ng-click="insert()"><% toggleSubmit %></button>
                </form>
                <br>
                <table class="table table-striped table-responsive">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    <tr ng-repeat="info in infos">
                        <td><% info.id %></td>
                        <td><% info.name %></td>
                        <td><% info.username %></td>
                        <td><button class="btn btn-primary" ng-click="editUser(info.id)">Edit</button>
                        <button class="btn btn-primary" ng-click="deleteUser(info.id)">Delete</button></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    {!! HTML::script('js/angular.min.js') !!}

    <script>

        var app = angular.module('myApp',['ngResource'],function($interpolateProvider){
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

        app.controller('myController',function($scope,$http){
            $scope.toggleSubmit = "Create";
            $scope.edit=true;

            select();
            function select(){
                $scope.name = "";
                $scope.username = "";
                $http.get("/getusers")
                        .success(function(response){
                           $scope.infos = response.record;
                        });
            }

            var uid;
            $scope.editUser = function(id){
                if(id == 'new'){
                    $scope.edit = true;
                    $scope.toggleSubmit = "Create";

                }else{
                    $scope.edit = false;
                    $scope.toggleSubmit = "Edit";

                    angular.forEach($scope.infos,function(value,key){
                       if(id == value.id){
                           uid = id;
                           $scope.id = value.id;
                           $scope.name = value.name;
                           $scope.username = value.username;
                       }
                    });
                }
            }

            $scope.insert = function(){
                if($scope.toggleSubmit == 'Create'){
                    $http.post('/insertuser',{
                        name: $scope.name,username:$scope.username
                    }).success(function(data,status,headers,config){
                        select();
//                        console.log(data);
                    })
                }else{
                    $http.post('/updateuser',{
                        id:$scope.id,name:$scope.name,username:$scope.username
                    }).success(function(data,status,headers,config){
                        select();
//                        console.log($scope.id);
                    })
                }
            }

            $scope.deleteUser = function(id){
                $http.post('/deleteuser',{
                    id:id
                }).success(function(data,status,headers,config){
                    select();
                })
            }

            $scope.createUser = function(){
                $scope.name = "";
                $scope.username = "";
                $scope.edit = "true";
                $scope.toggleSubmit = "Create";
            }

        })

    </script>
@stop
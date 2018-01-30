<!DOCTYPE html >
<html lang="en">
<head >

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
    <title>Регистрация нового пользователя</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head >


<body ng-app="myApp2" >
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular.js"></script>
@include('header')
<div ng-controller="ExampleController2">
    <form ng-submit="user-form" method="POST" action="{{route('registrationUser')}}">
        <div class="form-group">
            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">Фамилия</label>
                <input type="text" ng-model="fam" name="fam" required></div>
            <div class="form-group">   <label for="firstName" class="col-sm-3 control-label">Имя</label>
                <input type="text" name="im" required></div>
            <div class="form-group">   <label for="firstName" class="col-sm-3 control-label">Отчество</label>
                <input type="text" name="ot" required></div>
            <div class="form-group">     <label for="firstName" type="phone" class="col-sm-3 control-label">Номер телефона </label>
                <input type="text" name="phone" pattern="[0-9]{2,32}" required></div>



                <label for="firstName" class="col-sm-3 control-label">  Логин </label>
                <input type="text" name="log" ng-model="mobile"   required pattern="[a-zA-Z ]*">

            </div>
            <!--  <span class="help-block" ng-show="errors.log[0]"><p>Только английский</p></span>-->
            <div class="form-group" ng-class="{'has-error':user-form.firstName.$invalid && formSunmitted}">
                <label for="firstName" class="col-sm-3 control-label">    Пароль </label>
                <input type="text" name="pass" ng-minlength="8"  required pattern="[/^[A-Za-z0-9]+$/]{8,32}$ " >
                <div ng-show="user-form.pass.$error.pattern && buttonclicked"></div>
                <label for="firstName" class="col-sm-3 control-label">    Пароль </label>
                <input type="text" name="pass-repiat" ng-minlength="8" ng-pattern="regex" required pattern="[a-zA-Z]{8,32}" >
            </div>
            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label">     Дата рождения </label>
                <input type="date" name="date" ng-minlength="8" ng-pattern="regex"   >
            </div>

            <div class="form-group">
                <label for="firstName" class="col-sm-3 control-label"> Должность: </label>
                <select ng-model="selectedName" ng-options="x for x in names" name="position" id="singleSelect">
                    @foreach($position as $positions)
                        <option value="{{$positions->position}}"->{{$positions->position}} </option>
                    @endforeach
                </select>
            </div>
            <button ng-click='SaveUser()' name="Регистрация"  class="btn btn-primary col-sm-offset-3">Регисрация</button>
            {{ csrf_field() }}
        <div ng-show="user-form.pass.$error.pattern && buttonclicked">Name doesn't match pattern!</div>


    </form>

</div>
<p><a class="btn" type="button" href="{{route('usersList',['id'=>$user->log])}}" role="button">Назад</a></p>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script>
    (function() {
        var app = angular.module('myApp2', ['ngRoute', 'ngMessages','ngResource']);
        $scope.positions = '';
        app.controller('ExampleController2', function ($scope) {
            $scope.positions = Positions;

        $scope.showMessage = function(input) {
            var show = input.$invalid && (input.$dirty || input.$touched);
            return show;
        };
        $scope.SaveUser= function () {
            $scope.buttonclicked = true;

        };
    })
</script>



@include('footer')
</body>

</html>
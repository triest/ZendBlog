<!DOCTYPE html >
<html lang="en">
<head >

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js"></script>
    <script src="https://code.angularjs.org/1.3.0-rc.2/angular-messages.js"></script>
    <title>Создание нового пользователя.</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{assert('css/from_style.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
    <!-- Custom styles for this template -->


</head >
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>


<p>A user with such login already exists.</p>
<p><a class="btn" type="button" href="{{route('registrationUser')}}" role="button"><button>Вернуться на страницу регистрации.</button></a></p>


<p><a class="btn" type="button" href="{{route('usersList')}}" role="button">Назад</a></p>
<script>
    (function() {
        var app = angular.module("angularApp4", ['ngAnimate'])
            .controller("myConfigGenCtrl", function ($scope) {

                $scope.subnet = '';

            });
    })
</script>




</body>

</html>
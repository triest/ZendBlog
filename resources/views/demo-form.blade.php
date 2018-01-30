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


<div>
    <form name="form" ng-app method="POST" action="{{route('registrationUser')}}">


        <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">Фамилия</label>
            <input type="text" ng-model="fam" name="fam" required></div>
        <div class="form-group">   <label for="firstName" class="col-sm-3 control-label">Имя</label>
            <input type="text" name="im" required></div>
        <div class="form-group">   <label for="firstName" class="col-sm-3 control-label">Отчество</label>
            <input type="text" name="ot" required></div>
        <div class="form-group">     <label for="firstName" type="phone" class="col-sm-3 control-label">Номер телефона </label>
            <input type="text" name="phone" pattern="[0-9]{2,32}" required></div>

            <div class="form-group">
                <div class="control-group"
                     ng-class="{true: 'error'}[submitted && form.log.$invalid]">
                    <label for="log"
                           class="col-sm-3 control-label">Логин:</label>
                    <input type="text"
                           name="log"
                           ng-model="mobile"
                           required
                           ng-pattern="/[A-Za-z]/"
                           id="log">
                    <span class="help-inline"
                          ng-show="submitted && form.log.$error.required">Обязательное поле.</span>
                    <div class="custom-error"
                         ng-show="form.log.$error.pattern">Только латинские буквы</div>
                </div>
            </div>

            <div class="form-group">
                <div class="control-group"
                     ng-class="{true: 'error'}[submitted && form.pas.$invalid]">
                    <label for="pas"
                           class="col-sm-3 control-label">Пароль</label>
                    <input type="text"
                           name="pas"
                           ng-model="mobile2"
                           required
                           ng-pattern="/[A-Za-z]/"
                           id="pas">
                    <span class="help-inline"
                          ng-show="submitted && form.pas.$error.required">Обязательное поле.</span>
                    <span class="help-inline"
                          ng-show="submitted && form.pas.$error.pattern">Только латинские буквы и цифры</span>
                    <div class="custom-error"
                         ng-show="form.pas.$error.pattern">Только латинские буквы</div>
                </div>
            </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">     Дата рождения </label>
            <input type="date" name="date" ng-minlength="8" ng-pattern="regex"   >
        </div>
     <div ng-app="myApp4">
         <div ng-controller="ExampleController2">
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label"> Должность: </label>
            <select ng-model="selectedName" ng-options="x for x in names" name="position" id="singleSelect">
                @foreach($positions as $position)
                    <option value="{{$position->position}}"->{{$position->position}} </option>
                @endforeach
            </select>
        </div>
         </div>
     </div>
        <button ng-click='SaveUser()' name="Регистрация"  class="btn btn-primary col-sm-offset-3">Регисрация</button>
        {{ csrf_field() }}

    </form>
</div>
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
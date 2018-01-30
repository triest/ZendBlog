<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Редактирование пользователя</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <link href="{{assert('css/from_style.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
</head>

<body>
@include('header')

@section('content')

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
        <!-- Example row of columns -->

        <hr>

        <!-- /container -->
        <br>
        <div ng-app="registrApp" >
            <div ng-controller="ExampleController">
                <div class="container">
                    <form name="user-form" method="POST" action="{{route('userchange2')}}">
                        <div class="form-group">
                            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">
                                    Фамилия
                                </label>
                                <input type="text" ng-model="fam" value="{{$user->fam}}" name="fam" required>
                            </div>

                            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">
                                    Имя
                                </label><input type="text" name="im" value="{{$user->im}}" required><br>
                            </div>
                            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">
                                    Отчество </label>
                                <input type="text" name="ot" value="{{$user->ot}}" required> </div>

                            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">
                                    Номер телефона </label><input type="phone" name="phone" value="{{$user->phone}}" required><br></div>



                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label"> Должность: </label>
                                <select ng-model="selectedName" ng-options="x for x in names" name="position" id="singleSelect">
                                    @foreach($positions as $position)
                                        <option value="{{$position->position}}"->{{$position->position}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">Старый логин </label>
                                <input type="text" name="log2" ng-model="mobile"  value="{{$user->log}}" required pattern="[a-zA-Z ]*" readonly></div>

                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">
                                    Новый логин </label><input type="text" name="log" ng-model="mobile"  value="{{$user->log}}" required pattern="[a-zA-Z ]*" ></div>


                            <div class="form-group">  <label for="firstName" class="col-sm-3 control-label">
                                    Пароль</label> <input type="text" name="pass" ng-minlength="8" ng-pattern="regex" required pattern="[a-zA-Z]{8,32}" >
                            </div>


                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">     Дата рождения </label>
                                <input type="date" name="date" ng-minlength="8" ng-pattern="regex"  value="{{$user->date}}" >
                            </div>

                            <button ng-click='SaveUser()' name="Регистрация">Регисрация</button>
                            {{ csrf_field() }}
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <p><a class="btn" type="button" href="{{route('usersList',[])}}" role="button">Назад</a></p>

    </div>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    @include('footer')
</body>
</html>
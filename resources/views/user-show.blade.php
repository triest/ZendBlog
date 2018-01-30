<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Профиль пользователя</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <!-- Bootstrap core CSS -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
    <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
    <!-- Custom styles for this template -->
<!--   <link href="jumbotron.css" rel="stylesheet"> -->
<!--   <link href="jumbotron.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('css/jumbotron.css') }}" />
</head>

<body>
@include('header')

<main role="main">

    @section('content')

        <!-- Main jumbotron for a primary marketing message or call to action -->


        <div class="container">
            <!-- Example row of columns -->
            <div class="row">

                <div class="col-md-4">
                    <p> Фамилия: {{$user->fam}}</p>
                    <p> Имя: {!! $user->im!!} </p>
                    <p>Отчество: {!! $user->ot!!} </p>
                    <p>Телефон: {!! $user->phone!!}</p>
                    <p>Логин:{!! $user->log!!}</p>
                    <p>Дата рождения:{!!$user->date!!}<p>
                    <p>Должность:{!!$user->date!!}</p>
                </div>

            </div>

            <hr>
            <p><a class="btn" type="button" href="{{route('userchange',['id'=>$user->log])}}" role="button">Редактирование пользователя</a></p>
            <p><a class="btn" type="button" href="{{route('usersList',['id'=>$user->log])}}" role="button">Назад</a></p>
        </div> <!-- /container -->

</main>

<footer class="container">
    <p>&copy; Company 2017</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>


@include('footer')
</body>
</html>

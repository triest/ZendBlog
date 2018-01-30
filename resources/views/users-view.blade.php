<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Список пользователей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <!-- Bootstrap core CSS -->
<!--
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <!-- Custom styles for this template -->

    <link href="{{ URL::asset('css/jumbotron.css') }}"  rel="stylesheet">
    <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
    <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
     <script src="{{URL::asset('js/tableScript.js') }}"></script>

</head>

<body>
@include('header')
<!--
 //шаблон master
@section('content')
    -->
    <!-- Main jumbotron for a primary marketing message or call to action -->



    <div class="container">
        <!-- Example row of columns -->
        <div  ng-app="main"  ng-controller="MainCtrl">
            <div class="wrapper">
                <p><a class="btn" type="button" href="{{route('registrationUser')}}" role="button"><button>Регистрация нового пользователя</button></a></p>



        <table class="table table-hover table-bordered user" show-filter="true">
            <thead>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Должность</th>
            <th>

            </th>
            </thead>
        <div class="row">
            <tbody>
           @foreach($articles as $user)
                <tr title="'fam'" filter="{ fam: 'text'}" sortable="'name'">
                    <td>  {{$user->fam}} </td>
                    <td> {!! $user->im!!} </td>
                    <td>  {!! $user->ot!!} </td>
                    <td> {!! $user->date!!}</td>
                    <td> {!! $user->position!!}</td>
                    <td>
                        <label></label>
                        <a class="btn btn-secondary" href="{{route('userShow',['id'=>$user->log])}}" role="button">Подробнее</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </div>
        </table>
        <hr>
        </div>
    </div> <!-- /container -->
  </div>

    </main>

    <script type="text/javascript">
      $('user').DataTable({
          select:true
      })
    </script>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    @include('footer')
    </body>
    </html>


angular.module('registrApp', [ngMessages])

    .controller('ExampleController', ['$scope','ngAnimate', function($scope) {
        $scope.fam=''
        $scope.SaveUser=function () {
            $scope.master=$scope.fam;
            $scope.regex = '^[a-zA-Z0-9._-]+$';
        };

    }]);


angular.module('registrApp', [])

    .controller('ExampleController', ['$scope', function($scope) {
        $scope.fam=''
        $scope.SaveUser=function () {
            $scope.master=$scope.fam;

        };
    }]);

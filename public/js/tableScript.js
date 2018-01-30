/**
 * Created by triest on 05.11.2017.
 */
var app = angular.module('main', ['ngTable']);

app.controller('MainCtrl', function($scope, $http, $filter, ngTableParams) {

    $scope.completedQueries = [{"key":"abc000","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc001","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc002","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":true},{"key":"abc003","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc004","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":true},{"key":"abc005","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc006","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc007","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc008","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc009","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc010","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc011","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc012","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":true},{"key":"abc013","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc014","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc015","lastRun":123,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":true},{"key":"abc016","lastRun":1234,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false},{"key":"abc017","lastRun":111111111,"lastSuccessfulTime":9999,"elapsedTime":456,"rows":10,"failed":false}];
    $scope.filter = {
        key: undefined,
        failed: undefined
    };
    $scope.tableParams =  new ngTableParams({
        page: 1,
        count: 10,
        filter: $scope.filter
    }, {
        debugMode: true,
        total: $scope.completedQueries.length,
        getData: function($defer, params) {
            var orderedData = params.sorting() ? $filter('orderBy')($scope.completedQueries, params.orderBy()) : data;
            orderedData	= $filter('filter')(orderedData, params.filter());
            params.total(orderedData.length);
            $defer.resolve(orderedData.slice((params.page() - 1) * params.count(), params.page() * params.count()));
        }
    });
});

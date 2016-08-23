app.controller('WebScraperController',
    ['$scope', 'stocksScraperService', function(scope, stocks) {
    var stockCodes = ['AC', 'AP', 'JFC', 'MBT', 'SMPH'];
    scope.stocksData = [];

    angular.forEach(stockCodes, function(code) {
        stocks.get(code).then(function(response) {
            scope.stocksData.push(response.data);
        }, function() {
            console.log('error');
        });
    });
}]);
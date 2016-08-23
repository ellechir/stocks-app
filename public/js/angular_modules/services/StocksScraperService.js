app.service('stocksScraperService',
    ['$http', function(http) {
    var self = this;

    self.get = function(stockCode) {
        return http({
            method: 'GET',
            url: '/api/get-data/' + stockCode
        });
    };
}]);
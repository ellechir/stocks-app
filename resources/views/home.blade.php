@extends('layouts.app')

@section('content')
<div class="container" ng-controller="WebScraperController">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Stocks List</div>

                <div class="panel-body">
                    <div class="loading" ng-show="!stocksData.length">
                        <img src="img/loading.gif" class="center-block" />
                    </div>
                    <table class="table table-bordered" ng-show="stocksData.length">
                        <thead>
                            <tr>
                                <td>Company Name</td>
                                <td>Stock Code</td>
                                <td>Quote</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in stocksData">
                                <td>@{{ data.name }}</td>
                                <td>@{{ data.code }}</td>
                                <td>@{{ data.quote }} @{{ data.symbol }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="js/angular_modules/services/StocksScraperService.js"></script>
    <script src="js/angular_modules/controllers/WebScraperController.js"></script>
@endsection



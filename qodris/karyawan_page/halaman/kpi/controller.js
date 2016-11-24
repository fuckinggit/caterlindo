// angular js codes will be here
	var app = angular.module('myApp', []);
	app.controller("kpiCtrl", function ($scope,$http) {
    $scope.msg = "KEY PERFORMANCE INDICATOR";
	$scope.getKpi = function(){
			$http.get('halaman/kpi/data.php?act=lihat&modul=kpi').success(function(response){
				$scope.kpi = response;
				$scope.isi = response.nilai;
			});
	}
	
	$scope.getTotal = function(){
			$http.get('halaman/kpi/data.php?act=lihat&modul=total').success(function(response){
				$scope.total = response;
				 
			});
	}
	
});
  
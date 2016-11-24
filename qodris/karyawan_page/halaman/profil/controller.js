// angular js codes will be here
	var app = angular.module('myApp', []);
	app.controller("Controller", function ($scope,$http) {
    $scope.msg = "Profil";
	$scope.getProfil = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=profil').success(function(response){
				$scope.names = response;  			 
			});
	}
	$scope.getPendidikan = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=pendidikan').success(function(response){
				$scope.pendidikan = response;  			 
			});
	}
	$scope.getPengalaman = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=pengalaman').success(function(response){
				$scope.pengalaman = response;  			 
			});
	}
	$scope.getKeahlian = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=keahlian').success(function(response){
				$scope.keahlian = response;  			 
			});
	}
	$scope.getBahasa = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=bahasa').success(function(response){
				$scope.bahasa = response;  			 
			});
	}
	$scope.getDarurat = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=darurat').success(function(response){
				$scope.darurat = response;  			 
			});
	}
	$scope.getTanggungan = function(){
			$http.get('halaman/profil/act.php?act=lihat&modul=tanggungan').success(function(response){
				$scope.tanggungan = response;  			 
			});
	}
});
  
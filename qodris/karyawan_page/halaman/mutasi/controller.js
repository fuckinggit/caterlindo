// angular js codes will be here
	var app = angular.module('myApp', []);
	app.controller("mutasiCtrl", function ($scope,$http) {
    $scope.msg = "Mutasi Pegawai";
	$scope.getMutasi = function(){
			$http.get('halaman/mutasi/data.php?act=lihat&modul=mutasi').success(function(response){
				$scope.mutasi = response;
			});
	}
	$scope.getStatus = function(){
			$http.get('halaman/mutasi/data.php?act=lihat&modul=status').success(function(response){
				$scope.nik = response.nik_karyawan;
				$scope.bagian = response.nm_bagian;
				$scope.jabatan = response.nm_jabatan;
			});
	}
	
});
  
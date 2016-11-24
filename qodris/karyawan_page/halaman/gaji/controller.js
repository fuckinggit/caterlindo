// angular js codes will be here
	var app = angular.module('myApp', []);
	app.controller("gajiCtrl", function ($scope,$http) {
    $scope.msg = "GAJI SAYA";
		
		var previousMonth = new Date()
		previousMonth.setMonth(previousMonth.getMonth() - 1);
		$scope.pmonth = previousMonth;
		
	
	
	$scope.getGaji = function(){
			$http.get('halaman/gaji/data.php?act=lihat&modul=gaji').success(function(response){
				$scope.gaji = response;
				 
			});
	}
	$scope.getTotal = function(){
			$http.get('halaman/gaji/data.php?act=lihat&modul=total').success(function(response){
				$scope.total = response;
				 
			});
	}
});
 app.directive('currency', ['$filter', function ($filter) {
    return {
        require: 'ngModel',
        link: function (elem, $scope, attrs, ngModel) {
            ngModel.$formatters.push(function (val) {
                return $filter('currency')(val)
            });
            
        }
    }
}])
// angka to word
app.filter('terbilang', function() {
  function isInteger(x) {
        return x % 1 === 0;
    }

  
  return function(value) {
    if (value && isInteger(value))
      return  toWords(value);
    
    return value;
  };

});


var th = ['','Ribu','Juta', 'Milayar','triliun'];
var dg = ['Nol','Satu','Dua','Tiga','Empat', 'Lima','Enam','Tujuh','Delapan','Sembilan']; 
var tn = ['Sepuluh','Sebelas','Duabelas','Tiga Belas', 'Empat Belas','Lima Belas','Enam Belas', 'Tujuh Belas','Delapan Belas','Sembilan Belas'];
var tw = ['Dua Puluh','Tiga Puluh','Empat Puluh','Lima Puluh', 'Enam Puluh','Tujuh Puluh','Delapan Puluh','Sembilan Puluh']; 


function toWords(s)
{  
    s = s.toString(); 
    s = s.replace(/[\, ]/g,''); 
    if (s != parseFloat(s)) return 'Nilai Tidak Terbaca'; 
    var x = s.indexOf('.'); 
    if (x == -1) x = s.length; 
    if (x > 15) return 'Nilai Terlalu Besar'; 
    var n = s.split(''); 
    var str = ''; 
    var sk = 0; 
    for (var i=0; i < x; i++) 
    {
        if ((x-i)%3==2) 
        {
            if (n[i] == '1') 
            {
                str += tn[Number(n[i+1])] + ' '; 
                i++; 
                sk=1;
            }
            else if (n[i]!=0) 
            {
                str += tw[n[i]-2] + ' ';
                sk=1;
            }
        }
        else if (n[i]!=0) 
        {
            str += dg[n[i]] +' '; 
            if ((x-i)%3==0) str += 'Ratus ';
            sk=1;
        }


        if ((x-i)%3==1)
        {
            if (sk) str += th[(x-i-1)/3] + ' ';
            sk=0;
        }
    }
    if (x != s.length)
    {
        var y = s.length; 
        str += 'point '; 
        for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';
    }
    return str.replace(/\s+/g,' ');
}

window.toWords = toWords;
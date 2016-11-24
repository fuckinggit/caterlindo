<?php 
session_start();
?>
<div ng-app="myApp" ng-controller="kpiCtrl">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>
			<li class="active">KPI</li>
		</ul><!-- /.breadcrumb -->

		  
	</div>


	<!-- /section:settings.box -->
	<div class="page-header">
		<h1>
			Halaman {{msg}}
			<!--<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				
			</small>-->
		</h1>
	 
	</div><!-- /.page-header -->

	<div class="row" >
		<div class="col-xs-12">	 
		<!-- PAGE CONTENT BEGINS -->
			<div class="clearfix">
				<!--includekan pengumuman disini-->
				<?php include "halaman/pengumuman/index.php"; ?>
			</div>
			<div class="hr dotted"></div>
			<div class="widget-box widget-color-orange">
				<div class="widget-header">
					<h4 class="widget-title lighter smaller">Perolehan KPI</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main ">
						<div class="profile-user-info profile-user-info-striped">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="2%" class="center">#</th>
										<th class="center">Komponen KPI</th>
										<th class="center">Nilai</th>
									</tr>
								</thead>
								<tbody ng-init="getKpi()">
									<tr ng-repeat="a in kpi">
										<td class="center">{{$index + 1}}</td>
										<td>{{a.nm_komponen}}</td>
										<td class="center">{{a.nilai}}</td>										 
									</tr>
								</tbody>
								<tfoot>
									<tr ng-init="getTotal()">
										<th width="2%" class="center">#</th>
										<th class="center">Total</th>
										<th class="center" colspan="2">{{total}}</th>
									</tr> 
								</tfoot>
							</table>
							<table class="table table-striped table-bordered">
								<tbody ng-init="getTotal()">
									<th width="8%">Hasil :</th>
									<th class="left" colspan="2" ng-if="total >= 0 && total <= 11">Tidak Memuaskan</th>
									<th class="left" colspan="2" ng-if="total >= 12 && total <= 22">Butuh Pengembangan</th>
									<th class="left" colspan="2" ng-if="total >= 23 && total <= 33">Efektif / Kompeten</th>
									<th class="left" colspan="2" ng-if="total >= 34 && total <= 44">Melampaui Yang Diharapkan</th>
									<th class="left" colspan="2" ng-if="total >= 45 && total <= 55">Istimewa</th>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>
</div>
<script type="text/javascript" src="libs/js/angular/angular.min.js"></script>
<script type="text/javascript" src="halaman/kpi/controller.js"></script>
<?php
@session_start();
//error_reporting(0);

include('koneksi.php');
include('../objects/class.crud.php');

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
?>
 
		
<?php
if(isset($_POST['idProvinsi'])) {
	?>
	<div class="pull-right">
		<button type="submit" class="btn btn-primary pull-left mb" id="btnTambahKota" onclick="Tambah('<?php echo $_POST['selProvinsi']; ?>')" name="btnTambah" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data Provinsi
		</button>
	</div> 
	<table id="dataTableKota" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="width:1%;">No.</th> 
				<th style="width:20%;">Provinsi</th> 
				<th style="width:20%;">Kota</th> 
				<th style="width:2%;">Aksi</th> 
			</tr>
		</thead>
					 
		<tbody >	
			<?php
			$data = array('where' => array('fc_kdprop' => $_POST['idProvinsi']));
			$no = 0;
			$dataKota = $crud->read('tm_kota', $data);
			if(!empty($dataKota)){
				foreach($dataKota as $kota) {
					extract($kota);
					$no++;
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td>
							<?php 
							$provinsi = $crud->read('tm_prop',array('where'=>array('fc_kdprop'=>$fc_kdprop)));
								if(!empty($provinsi)){
									foreach($provinsi as $prov){
										echo $prov['fv_nmprop'];
									}
								}
							?>
						</td>
						<td><?php echo $fv_nmkota; ?></td>
						<td align="center">
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									Opsi <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="javascript:void(0);" onclick="editKota('<?php echo $fc_id; ?>')">
										<i class="fa fa-pencil"></i> Edit
									</a></li>
									<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapus('hapusKota','<?php echo $fc_id; ?>'):false;">
										<i class="fa fa-times"></i> Hapus
									</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>	
	<?php
}

if(isset($_POST['selProvinsi'])) {
	?>
	<div class="col-md-12">
		<div class="pull-right">
			<button type="submit" class="btn btn-primary pull-left mb" id="btnTambahKota" onclick="Tambah('<?php echo $_POST['selProvinsi']; ?>')" name="btnTambah" style="margin-left:1%;">
				<i class="fa fa-plus"></i> Tambah Data Kota 
			</button>
		</div>
	</div>
	<table id="dataTableKota" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th style="width:1%;">No.</th> 
				<th style="width:20%;">Provinsi</th> 
				<th style="width:20%;">Kota</th> 
				<th style="width:2%;">Aksi</th> 
			</tr>
		</thead>
		<tbody >	
			<?php
			$data = array('where' => array('fc_kdprop' => $_POST['selProvinsi']));
			$no = 0;
			$dataKota = $crud->read('tm_kota', $data);
			if(!empty($dataKota)){
				foreach($dataKota as $kota) {
					extract($kota);
					$no++; 
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td>
							<?php 
							$provinsi = $crud->read('tm_prop',array('where'=>array('fc_kdprop'=>$fc_kdprop)));
								if(!empty($provinsi)){
									foreach($provinsi as $prov){
										echo $prov['fv_nmprop'];
									}
								}
							?>
						</td>
						<td><?php echo $fv_nmkota; ?></td>
						<td align="center">
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									Opsi <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="javascript:void(0);" onclick="editKota('<?php echo $fc_id; ?>')">
										<i class="fa fa-pencil"></i> Edit
									</a></li>
									<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapus('hapusKota','<?php echo $fc_id; ?>'):false;">
										<i class="fa fa-times"></i> Hapus
									</a></li>
								</ul>
							</div>
						</td>
					</tr>		
				<?php
			}
		}
		?>
		</tbody>
	</table>
	<?php
}
?>
<script>
$('#dataTableKota').dataTable({
	"ordering" : false,
	"language" : {
		"lengthMenu" : "Tampilkan _MENU_ data",
		"zeroRecords" : "Maaf tidak ada data yang ditampilkan!",
		"info" : "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
		"infoEmpty" : "Tidak ada data yang ditampilkan",
		"search" : "Cari :",
		"paginate": {
			"first":      '<span class="glyphicon glyphicon-fast-backward"></span>',
			"last":       '<span class="glyphicon glyphicon-fast-forward"></span>',
			"next":       '<span class="glyphicon glyphicon-forward"></span>',
			"previous":   '<span class="glyphicon glyphicon-backward"></span>'
		}
	}
});
</script>
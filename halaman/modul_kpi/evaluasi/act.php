<?php
$path = '../../../';
$link = 'p=evaluasi_data&idmenu=19';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_karyawan';
$p_key = 'kd_karyawan';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">NIK Karyawan</th>
					<th style="width:10%;">Nama Karyawan</th>
					<th style="width:5%;">Jenis Kelamin</th>
					<th style="width:5%;">Status Nikah</th>
					<th style="width:5%;">No Telp</th>
					<th style="width:1%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>">
				<?php
				$no = 0;
				$hasil = $crud->read($tbl);
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nik_karyawan']; ?></td>
							<td><?php echo $row['nm_karyawan']; ?></td>
							<td><?php echo jekel($row['jekel']); ?></td>
							<td><?php echo statusNikah($row['status_nikah']); ?></td>
							<td><?php echo $row['telp_rumah']; ?></td>
							<td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li>
										<!-- <li class="divider"></li>
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
											<i class="fa fa-pencil"></i> Edit
										</a></li>
										<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
											<i class="fa fa-times"></i> Hapus
										</a></li> -->
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
		include_once $path.'config/dataTable.php';
	}
	exit;
}
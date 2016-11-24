<?php
$path = '../../../';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tm_prop';
$p_key = 'fc_kdprop';

if(isset($_POST['act']) && !empty($_POST['act'])){
    if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:20%;">Provinsi</th>
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
							<td><?php echo $row['fv_nmprop']; ?></td>
							<td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<!-- <li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li> -->
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
											<i class="fa fa-pencil"></i> Edit
										</a></li>
										<li class="divider"></li>
										<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
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
		include_once $path.'config/dataTable.php';
    } if ($_POST['act'] == 'edit') {
		$data['where'] = array('fc_id' => $_POST['id']);
        $data['return_type'] = 'single';
        $detail = $crud->read($tbl, $data);
        echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
        if(!empty($_POST['id'])){
            $condition = array('fc_id' => $_POST['id']);
            $delete = $crud->delete($tbl,$condition);
			
			if ($delete) {
				$err = '<div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Berhasil!</strong> Aksi Hapus Berhasil.
				</div>';
			} else {
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Gagal Hapus, Kesalahan sistem!
				</div>';
			}

			echo $err;
        }
    } if ($_POST['act'] == 'hapusKota'){
        if(!empty($_POST['id'])){
            $condition = array('fc_id' => $_POST['id']);
            $delete = $crud->delete('tm_kota',$condition);
			
			if ($delete) {
				$err = '<div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Berhasil!</strong> Aksi Hapus Berhasil.
				</div>';
			} else {
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Gagal Hapus, Kesalahan sistem!
				</div>';
			}

			echo $err;
        }
    } if ($_POST['act'] == 'editKota') {
        $detail = $crud->read('tm_kota a,tm_prop b', array('where_kolom' => array('a.fc_kdprop' => 'b.fc_kdprop'),'where' => array('a.fc_id' => $_POST['id']),'return_type' => 'single'));
        echo json_encode($detail);
	}
	
    exit;
}
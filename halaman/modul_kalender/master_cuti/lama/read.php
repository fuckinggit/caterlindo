<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tm_cuti';
$p_key = 'kd_cuti';

if(isset($_POST['act']) && !empty($_POST['act'])){
    if($_POST['act'] == 'lihat'){
		$no = 0;
		$hasil = $crud->read($tbl);
		
		if (!empty($hasil)) {
			foreach($hasil as $row) {
				$no++;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['nm_cuti']; ?></td>
					<td><?php echo namaBagian('../../../', $row['kd_bagian']); ?></td>
					<td><?php echo namaJabatan('../../../', $row['kd_jabatan']); ?></td>
					<td><?php echo $row['thn_periode']; ?></td>
					<td><?php echo $row['lama_cuti']; ?></td>
					<td align="center">
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								Opsi <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li>
								<li class="divider"></li>
								<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
									<i class="fa fa-pencil"></i> Edit
								</a></li>
								<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
									<i class="fa fa-times"></i> Hapus
								</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php
			}
		} else {
			$jum = 8;
			?>
			<tr>
				<td colspan="<?php echo $jum; ?>" align="center">Tidak ada data yang ditampilkan!</td>
			</tr>
			<?php
		}
    } if ($_POST['act'] == 'edit') {
		$data['where'] = array($p_key=>$_POST['id']);
        $data['return_type'] = 'single';
        $detail = $crud->read($tbl, $data);
        echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
        if(!empty($_POST['id'])){
            $condition = array($p_key => $_POST['id']);
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
    }
    exit;
}
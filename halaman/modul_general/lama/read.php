<?php
include_once '../../config/koneksi.php';
include_once '../../objects/class.crud.php';
include_once '../../config/oop.fungsi.php';
include_once '../../config/link.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_general_affair';

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
					<td><?php echo $row['nm_general']; ?></td>
					<td><?php echo $row['tipe']; ?></td>
					<td><?php echo $row['tgl_mulai']; ?></td>
					<td><?php echo $row['tgl_akhir']; ?></td>
					<td><?php echo statusGeneral($row['status']); ?></td>
					<td align="center">
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								Opsi <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="?p=general_data&v=detail&id=<?php echo $row['kd_general']; ?>"><i class="fa fa-book"></i> Detail</a></li>
								<li class="divider"></li>
								<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row['kd_general']; ?>')">
									<i class="fa fa-pencil"></i> Edit
								</a></li>
								<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['kd_general']; ?>'):false;">
									<i class="fa fa-times"></i> Hapus
								</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php
			}
		} else {
			$jum = 7;
			?>
			<tr>
				<td colspan="<?php echo $jum; ?>" align="center">Tidak ada data yang ditampilkan!</td>
			</tr>
			<?php
		}
    } if ($_POST['act'] == 'edit') {
		$data['where'] = array('kd_general'=>$_POST['id']);
        $data['return_type'] = 'single';
        $detail = $crud->read($tbl, $data);
        echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
        if(!empty($_POST['id'])){
            $condition = array('kd_general' => $_POST['id']);
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
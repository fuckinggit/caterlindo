<?php
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_pengalaman_kerja';

if(isset($_POST['act']) && !empty($_POST['act'])){
    if($_POST['act'] == 'lihat'){
       $no = 0;
		$hasil = $crud->read($tbl,array('where'=>array('kd_karyawan'=>$_POST['id'])));
		
		if (!empty($hasil)) {
			foreach($hasil as $row) {
				$no++;
				?>
				<tr style="text-align:left;">
					<td><?php echo $no; ?></td>
					 
					<td><?php echo $row['nm_perusahaan']; ?></td>
					<td><?php echo $row['nm_jabatan'];?></td>
					<td><?php echo $row['tgl_masuk'];?></td>
					<td><?php echo $row['tgl_keluar'];?></td>
					<td><?php echo $row['komentar'];?></td>
					<td align="center">
						<a href="javascript:void(0);" class="btn btn-warning" onclick="editForm('<?php echo $row['id']; ?>')">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['id']; ?>'):false;">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
				<?php
			}
		} else {
			$jum = 9;
			?>
			<tr>
				<td colspan="<?php echo $jum; ?>" align="center">Tidak ada data yang ditampilkan!</td>
			</tr>
			<?php
		}
    } if ($_POST['act'] == 'edit') {
		$data['where'] = array('id'=>$_POST['id']);
        $data['return_type'] = 'single';
        $detail = $crud->read($tbl, $data);
        echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
        if(!empty($_POST['id'])){
            $condition = array('id' => $_POST['id']);
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
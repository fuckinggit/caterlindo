<?php
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';
$database = new Database();
$db = $database->getKoneksi();
$var = 'RiwayatPendidikan';

$crud = new Crud($db);
$tbl = 'td_karyawan_riwayat_pendidikan a,tb_pendidikan b';

if(isset($_POST['act']) && !empty($_POST['act'])){
    if($_POST['act'] == 'lihat'){
       $no = 0;
		$hasil = $crud->read($tbl,array('select'=>'a.id,a.kd_pendidikan,b.lvl_pendidikan,a.nm_institusi,a.program_studi,a.lama_studi,a.gpa,a.thn_mulai,a.thn_akhir', 'where'=>array('a.kd_karyawan'=>$_POST['kd_karyawan']),'where_kolom'=>array('a.kd_pendidikan'=>'b.kd_pendidikan')));
		
		if (!empty($hasil)) {
			foreach($hasil as $row) {
				$no++;
				?>
				<tr style="text-align:left;">
					<td><?php echo $no; ?></td>
					 
					<td><?php echo $row['lvl_pendidikan']; ?></td>
					<td><?php echo $row['nm_institusi'];?></td>
					<td><?php echo $row['program_studi'];?></td>
					<td><?php echo $row['lama_studi'];?></td>
					<td><?php echo $row['gpa'];?></td>
					<td><?php echo $row['thn_mulai'];?></td>
					<td><?php echo $row['thn_akhir'];?></td>
					<td align="center">
						<a href="javascript:void(0);" class="btn btn-warning" onclick="editForm<?php echo $var; ?>('<?php echo $row['id']; ?>')">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData<?php echo $var; ?>('hapus','<?php echo $row['id']; ?>'):false;">
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
		$data['select'] = 'a.id,a.kd_pendidikan,b.lvl_pendidikan,a.nm_institusi,a.program_studi,a.lama_studi,a.gpa,a.thn_mulai,a.thn_akhir';
		$data['where'] = array('a.kd_karyawan'=>$_POST['kd_karyawan'],'a.id'=>$_POST['id']);
		$data['where_kolom'] = array('a.kd_pendidikan'=>'b.kd_pendidikan');
        $data['return_type'] = 'single';
        $detail = $crud->read($tbl, $data);
        echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
        if(!empty($_POST['id'])){
            $condition = array('id' => $_POST['id']);
            $delete = $crud->delete('td_karyawan_riwayat_pendidikan',$condition);
			
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
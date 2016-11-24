<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_hari_libur';
$p_key = 'id';

if(isset($_POST['act']) && !empty($_POST['act'])){
    if($_POST['act'] == 'lihat'){
		$no = 0;
		$result = "SELECT * FROM ".$tbl." WHERE SUBSTR(tgl_libur, 7, 4) = '".date('Y')."'";	
		$stmt= $db->prepare($result);
		$stmt->bindParam(1, $selTgl);
		$selTgl = date('Y');
		$stmt->execute();
		$jml_kolom = $stmt->rowCount();
		
		if ($jml_kolom > 0) {
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$no++;
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row['tgl_libur']; ?></td>
					<td><?php echo $row['deskripsi']; ?></td>
					<td align="center">
						<div class="btn-group">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								Opsi <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<!-- <li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row['id']; ?>"><i class="fa fa-book"></i> Detail</a></li> -->
								<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row['id']; ?>')">
									<i class="fa fa-pencil"></i> Edit
								</a></li>
								<li class="divider"></li>
								<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['id']; ?>'):false;">
									<i class="fa fa-times"></i> Hapus
								</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php
			}
		} else {
			$jum = 4;
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
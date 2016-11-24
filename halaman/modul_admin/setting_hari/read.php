<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

				?>
				<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hkbulan">
							Jumlah Hari Kerja Perbulan
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" value="<?php echo  ?>" id="hkbulan" name="hkbulan" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="hkminggu">
							Jumlah Hari Kerja Perminggu
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="hkminggu" name="hkminggu" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="jambulan">
							Jumlah Jam Kerja Perbulan
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="jambulan" name="jambulan" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="jamminggu">
							Jumlah Hari Kerja Perminggu
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="jamminggu" name="jamminggu" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="kuotacuti">
							Kuota Cuti pribadi
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="kuotacuti" name="kuotacuti" class="form-control" >
						</div>
					</div>
					<hr />
					<div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<button type="button" name="btnSimpan" id="btnSimpan" class="btn btn-warning">Simpan</button>
							<button type="button" name="btnUbah" id="btnUbah" class="btn btn-warning">Ubah</button>
						</div>
					</div>
				<?php
			 
    } if ($_POST['act'] == 'edit') {
		$data['where'] = array('id' => $_POST['id']);
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
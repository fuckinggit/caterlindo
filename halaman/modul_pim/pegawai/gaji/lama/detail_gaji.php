<div class="col-md-12 col-sm-12"  <?php if($_GET['sts']<>'tambah') {echo 'style="display:none;"';}?> id="formTambah">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<form id="formInput" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idGaji">
					Jenis Gaji<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="txtIdKaryawan">
					<select onchange="showGaji(this.value)" class="form-control" id="idGaji" name="selGaji" required="required">
						<option value="">-- Jenis Gaji --</option>
						<?php
						$gaji = $crud->read('tm_gaji');
						if (!empty($gaji)) {
							foreach($gaji as $dGaji) {
								echo '<option value="'.$dGaji['kd_gaji'].'" >'.$dGaji['nm_gaji'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idFrekuensi">
					Frekuensi Gaji <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idFrekuensi" name="selFrekuensi" required="required">
						<option value="">-- Frekuensi --</option>
						<option value="0">PerJam</option>
						<option value="1">Harian</option>
						<option value="2">Mingguan</option>
						<option value="3">Bulanan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJumlah">
					Jumlah Gaji (Rp) <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idJumlah" name="jml" type="number" class="form-control" required="required">
				</div>
				<div style="float:left" id="idRangeGaji"></div>
			</div>	
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idCatatan">
					Catatan 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea id="idCatatan" name="catat" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTipe">
					Tipe Gaji 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idTipe" name="selTipe" onchange="showDeposit(this.value)" required="required">
						<option value="">-- Tipe Gaji --</option>
						<option value="0">Tunai</option>
						<option value="1">Transfer</option>
					</select>
				</div>
			</div>
			<div id="detailDeposit" style="display:none;">
				<div class="grey-header">
					<h5>Detail Deposit</h5>				
				</div>
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBank">
						Nama Bank
					</label>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<select class="form-control" id="idBank" name="selBank">
							<option value="">-- Nama Bank --</option>
							<?php
							$bank = $crud->read('tb_bank');
							if (!empty($bank)) {
								foreach($bank as $dbank) {
									echo '<option value="'.$dbank['kd_bank'].'" >'.$dbank['nm_bank'].'</option>';
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNoRek">
						Nomor Akun
					</label>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<input type="text" id="idNoRek" name="norek" class="form-control">
					</div>
				</div>
			</div>
			 
			<hr />
			<div class="ln_solid"></div>
			<div class="form-group">
				<div style="margin-bottom:2%; float:right; margin-right:2%;">
					<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>
				</div>
			</div>
		</form>
	</div><!-- /grey-panel -->
</div>

<div class="col-md-12 col-sm-12"  <?php if($_GET['sts']<>'tambah') {echo 'style="display:none;"';}?> id="formEdit">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<form id="formEdit" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="gajiEdit">
					Jenis Gaji<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="txtIdKaryawan">
					<input type="hidden" id="idKodeGaji" name="txtId">
					<select onchange="showGaji(this.value)" class="form-control" id="gajiEdit" name="selGaji" required="required">
						<option value="">-- Jenis Gaji --</option>
						<?php
						$gaji = $crud->read('tb_gaji');
						if (!empty($gaji)) {
							foreach($gaji as $dGaji) {
								echo '<option value="'.$dGaji['kd_gaji'].'" >'.$dGaji['nm_gaji'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="frekuensiEdit">
					Frekuensi Gaji <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="frekuensiEdit" name="selFrekuensi" required="required">
						<option value="">-- Frekuensi --</option>
						<option value="0">PerJam</option>
						<option value="1">Harian</option>
						<option value="2">Mingguan</option>
						<option value="3">Bulanan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="jumlahEdit">
					Jumlah Gaji (Rp) <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="jumlahEdit" name="jml" type="number" class="form-control" required="required">
				</div>
				<div style="float:left" id="idRangeGajiEdit"></div>
			</div>	
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="catatanEdit">
					Catatan 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea id="catatanEdit" name="catat" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tipeEdit">
					Tipe Gaji 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="tipeEdit" name="selTipe" onchange="showDeposit(this.value)" required="required">
						<option value="">-- Tipe Gaji --</option>
						<option value="0">Tunai</option>
						<option value="1">Transfer</option>
					</select>
				</div>
			</div>
			<div id="detailDepositEdit" style="display:none;">
				<div class="grey-header">
					<h5>Detail Deposit</h5>				
				</div>
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12" for="bankEdit">
						Nama Bank
					</label>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<select class="form-control" id="bankEdit" name="selBank">
							<option value="">-- Nama Bank --</option>
							<?php
							$bank = $crud->read('tb_bank');
							if (!empty($bank)) {
								foreach($bank as $dbank) {
									echo '<option value="'.$dbank['id'].'" >'.$dbank['nm_bank'].'</option>';
								}
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-2 col-sm-2 col-xs-12" for="noRekEdit">
						Nomor Akun
					</label>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<input type="text" id="noRekEdit" name="norek" class="form-control">
					</div>
				</div>
			</div>
			 
			<hr />
			<div class="ln_solid"></div>
			<div class="form-group">
				<div style="margin-bottom:2%; float:right; margin-right:2%;">
					<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>
				</div>
			</div>
		</form>
	</div><!-- /grey-panel -->
</div>
 
<div class="col-md-12 col-sm-12 mb" id="bacaData">
	<div class="grey-panel donut-chart" style="margin-bottom:2%; float:right;">
		<div class="grey-header">
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<div id="idAlert"></div>
		<button type="submit" class="btn btn-info pull-left mb" id="btnTambah" name="btnTambah" onClick="showForm()" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</button>
		<table class="table table-striped table-advanced table-hover">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:8%;">Nama Gaji</th>
					<th style="width:7%;">Frekuensi Gaji</th>
					<th style="width:5%;">Jumlah Gaji</th>
					<th style="width:5%;">Keterangan</th>
					<th style="width:7%;">Tipe Gaji</th>
					<th style="width:5%;">Nama Bank</th>
					<th style="width:8%;">No Rekening</th>
					<th style="width:10%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData">
				<?php
				$no = 0;
				$hasil = $crud->read('td_karyawan_gaji ',array('where'=>array('kd_karyawan'=>$_GET['id'])));
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td>
								<?php
								$hasil_gaji = $crud->read('tb_gaji',array('where' => array('kd_gaji'=>$row['kd_gaji']),
								'return_type'=>'single'));
								if(!empty($hasil_gaji)){
									echo $hasil_gaji['nm_gaji'];
								}
								?>
							</td>
							<td><?php echo detFrekuensi($row['frekuensi']); ?></td>
							<td><?php echo formatRupiah($row['jml_gaji']); ?></td>
							<td><?php echo $row['keterangan']; ?></td>
							<td><?php echo tipeGaji($row['tipe_gaji']); ?></td>
							<td>			
								<?php
								$hasil_bank = $crud->read('tb_bank', array('where' => array('id' => $row['kd_bank']),
								'return_type'=>'single'));
								if(!empty($hasil_bank)){
									echo $hasil_bank['nm_bank'];
								}
								?>
							</td>
							<td><?php echo $row['no_rekening']; ?></td>
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
				?>
			</tbody>
		</table>
		
	</div><!-- /grey-panel -->
</div>

<script>
function showForm() {
	$('#formTambah').fadeIn(1000);
	$('#btnTambah').hide();
	$('#formEdit').hide();
}
function hideForm() {
	$('#formTambah').hide();
	$('#formEdit').hide();
	$('#btnTambah').fadeIn(1000);
	
	document.getElementById("idGaji").removeAttribute("required");
	document.getElementById("idFrekuensi").removeAttribute("required");
	document.getElementById("idJumlah").removeAttribute("required");
	document.getElementById("idTipe").removeAttribute("required");
}

function showDeposit(val) {
	if (val == '0') {
		$('#detailDeposit').hide();
	} if (val == '1') {
		$('#detailDeposit').fadeIn(1000);
	} else {
		$('#detailDeposit').hide();
	}
}

function showGaji(str) {
    if (str == "") {
        document.getElementById("idRangeGaji").innerHTML = "";
        document.getElementById("idRangeGajiEdit").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idRangeGaji").innerHTML = this.responseText;
                document.getElementById("idRangeGajiEdit").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","halaman/modul_pim/pegawai/gaji/getRangeGaji.php?q="+str,true);
        xmlhttp.send();
    }
}

function lihatData(){
    $.ajax({
        type: 'POST',
        url: 'halaman/modul_pim/pegawai/gaji/read.php',
        data: 'act=lihat&id=<?php echo $_GET['id']; ?>&'+$("#formTambah").serialize(),
        success:function(html){
			$('#tabelData').html(html);
        }
    });
}

function editForm(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: 'halaman/modul_pim/pegawai/gaji/read.php',
        data: 'act=edit&id='+id,
        success:function(data){
            $('#formEdit').slideUp(500, 'swing');
            $('#formEdit').slideDown(500);
            $('#idKodeGaji').val(data.id);
            $('#gajiEdit').val(data.kd_gaji);
            $('#frekuensiEdit').val(data.frekuensi);
            $('#jumlahEdit').val(data.jml_gaji);
            $('#catatanEdit').val(data.keterangan);
            $('#tipeEdit').val(data.tipe_gaji);
            $('#bankEdit').val(data.kd_bank);
            $('#noRekEdit').val(data.no_rekening);
			showGaji(data.kd_gaji);
			
			if (data.tipe_gaji == '1') {
				document.getElementById('detailDepositEdit').removeAttribute('style');
			} if (data.tipe_gaji == '0') {
				$('#detailDepositEdit').fadeOut();
			}
        }
    });
}

$(document).on('submit', '#formInput', function() {
    $.post("halaman/modul_pim/pegawai/gaji/input.php", $(this).serialize())
        .done(function(data) {
			$('#idAlert').html(data);
            $('#bacaData').show();
            $('#formTambah').hide();
			$('#btnTambah').fadeIn(1000);
			lihatData();
        });
		
    return false;
});

$(document).on('submit', '#formEdit', function() {
    $.post("halaman/modul_pim/pegawai/gaji/edit.php", $(this).serialize())
        .done(function(data) {
			$('#idAlert').html(data);
            $('#bacaData').show();
            $('#formEdit').hide();
			$('#btnTambah').fadeIn(1000);
			lihatData();
        });
             
    return false;
});

function hapusData(act,id) {
	$.post("halaman/modul_pim/pegawai/gaji/read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert').html(data);
			$('#bacaData').show();
			lihatData();
		});
}
</script>

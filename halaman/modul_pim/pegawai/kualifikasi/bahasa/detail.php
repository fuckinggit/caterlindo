<?php
$var = 'Bahasa'; // Yang diganti
$judul = 'Bahasa'; // Yang diganti
$uri = 'halaman/modul_pim/pegawai/kualifikasi/';
$uri .= 'bahasa'; // Yang diganti
$uri .= '/';
?>
<div class="col-md-12 col-sm-12" <?php echo 'style="display:none;"'; ?> id="formTambah<?php echo $var; ?>">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm<?php echo $var; ?>()">Close</button>
			</div>
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<form id="formInput<?php echo $var; ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<input type="hidden" name="kd_karyawan" id="kd_karyawan<?php echo $var; ?>" value="<?php echo $_GET['id']; ?>">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="bahasa<?php echo $var; ?>">
					Bahasa <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<select class="form-control" id="bahasa<?php echo $var; ?>" name="bahasa" required="required">
						<option value="">-- Bahasa --</option>
						<?php
						$bahasa = $crud->read('tb_bahasa');
						if (!empty($bahasa)) {
							foreach($bahasa as $dbahasa) {
								echo '<option value="'.$dbahasa['kd_bahasa'].'" >'.$dbahasa['nm_bahasa'].'</option>';
							}
						}
						?>
					</select>
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="keahlian<?php echo $var; ?>">
					Keahlian 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="keahlian<?php echo $var; ?>" name="keahlian" required="required">
						<option value="">-- Keahlian --</option>
						<option value="0">Menulis</option>
						<option value="1">Komunikasi</option>
						<option value="2">Membaca</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="kefasihan<?php echo $var; ?>">
					Kefasihan 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="keahlian<?php echo $var; ?>" name="kefasihan" required="required">
						<option value="">-- Kefasihan --</option>
						<option value="0">Buruk</option>
						<option value="1">Cukup</option>
						<option value="2">Baik</option>
						<option value="3">Sangat Baik</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="catatan<?php echo $var; ?>">
					Catatan  
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<Textarea class="form-control" name="catatan" id="catatan<?php echo $var; ?>"></Textarea>
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

<div class="col-md-12 col-sm-12" <?php echo 'style="display:none;"'; ?> id="formEdit<?php echo $var; ?>">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm<?php echo $var; ?>()">Close</button>
			</div>
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<form id="formEdit<?php echo $var; ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<input type="text" name="kode" id="kodeEdit<?php echo $var; ?>">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="kdbahasaEdit<?php echo $var; ?>">
					Bahasa <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<select class="form-control" id="kdbahasaEdit<?php echo $var; ?>" name="bahasa" required="required">
						<option value="">-- Bahasa --</option>
						<?php
						$bahasa = $crud->read('tb_bahasa');
						if (!empty($bahasa)) {
							foreach($bahasa as $dbahasa) {
								echo '<option value="'.$dbahasa['kd_bahasa'].'" >'.$dbahasa['nm_bahasa'].'</option>';
							}
						}
						?>
					</select>
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="keahlianEdit<?php echo $var; ?>">
					Keahlian 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="keahlianEdit<?php echo $var; ?>" name="keahlian" required="required">
						<option value="">-- Keahlian --</option>
						<option value="0">Menulis</option>
						<option value="1">Komunikasi</option>
						<option value="2">Membaca</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="kefasihanEdit<?php echo $var; ?>">
					Kefasihan 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="kefasihanEdit<?php echo $var; ?>" name="kefasihan" required="required">
						<option value="">-- Kefasihan --</option>
						<option value="0">Buruk</option>
						<option value="1">Cukup</option>
						<option value="2">Baik</option>
						<option value="3">Sangat Baik</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="catatanEdit<?php echo $var; ?>">
					Catatan  
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<Textarea class="form-control" name="catatan" id="catatanEdit<?php echo $var; ?>"></Textarea>
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
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<div id="idAlert<?php echo $var; ?>"></div>
		<button type="submit" class="btn btn-info pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" onClick="showForm<?php echo $var; ?>()" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</button>
		<table class="table table-striped table-advanced table-hover">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:7%;">Bahasa</th>
					<th style="width:7%;">Keahlian</th>
					<th style="width:7%;">Kefasihan</th>
					<th style="width:3%;">Catatan</th>
					<th style="width:5%"> Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>"></tbody>
		</table>
		
	</div><!-- /grey-panel -->
</div>

<script>
$(document).ready(function(){
	lihatData<?php echo $var; ?>();
});

function showForm<?php echo $var; ?>() {
	// Fungsi Paten
	 
	$('#formTambah<?php echo $var; ?>').fadeIn(1000);
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#formEdit<?php echo $var; ?>').hide();
}
function hideForm<?php echo $var; ?>() {
	// Fungsi Paten
	$('#formTambah<?php echo $var; ?>').hide();
	$('#formEdit<?php echo $var; ?>').hide();
	$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
	
	// Dibawah untuk membuang set required pada form, sehinnga tidak menampilkan error pada log
	document.getElementById("bahasa<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("keahlian<?php echo $var; ?>").removeAttribute("required");
	 
}

function lihatData<?php echo $var; ?>(){
    $.ajax({
        type: 'POST',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=lihat&kd_karyawan=<?php echo $_GET['id']; ?>&'+$("#formTambah<?php echo $var; ?>").serialize(),
        success:function(html){
			$('#tabelData<?php echo $var; ?>').html(html);
        }
    });
}

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>input.php", $(this).serialize())
        .done(function(data) {
			$('#idAlert<?php echo $var; ?>').html(data);
            $('#bacaData<?php echo $var; ?>').show();
            $('#formTambah<?php echo $var; ?>').hide();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData<?php echo $var; ?>();
        });
		
    return false;
});

function editForm<?php echo $var; ?>(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id+'&kd_karyawan=<?php echo $_GET['id']; ?>',
        success:function(data){
            $('#formEdit<?php echo $var; ?>').slideUp(500, 'swing');
            $('#formEdit<?php echo $var; ?>').slideDown(500);
			
			$('#kodeEdit<?php echo $var; ?>').val(data.id);
            $('#kdbahasaEdit<?php echo $var; ?>').val(data.kd_bahasa);
            $('#keahlianEdit<?php echo $var; ?>').val(data.keterangan);
            $('#kefasihanEdit<?php echo $var; ?>').val(data.kefasihan);
            $('#catatanEdit<?php echo $var; ?>').val(data.komentar);
            
        }
    });
}

$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
        .done(function(data) {
			$('#idAlert<?php echo $var; ?>').html(data);
            $('#bacaData<?php echo $var; ?>').show();
            $('#formEdit<?php echo $var; ?>').hide();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData<?php echo $var; ?>();
        });
             
    return false;
});

function hapusData<?php echo $var; ?>(act,id) {
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData<?php echo $var; ?>();
		});
}
</script>

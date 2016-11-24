<?php
$var = 'PengalamanKerja'; // Yang diganti
$judul = 'Pengalaman Kerja'; // Yang diganti
$uri = 'halaman/modul_pim/pegawai/kualifikasi/';
$uri .= 'pengalaman_kerja'; // Yang diganti
$uri .= '/';
?>
<div class="col-md-12 col-sm-12" <?php echo 'style="display:none;"'; ?> id="formTambah<?php echo $var; ?>">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<form id="formInput<?php echo $var; ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<input type="hidden" name="kd_karyawan" id="kd_karyawan<?php echo $var; ?>" value="<?php echo $_GET['id']; ?>">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idperusahaan<?php echo $var; ?>">
					Nama Perusahaan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idperusahaan<?php echo $var; ?>" name="idperusahaan" class="form-control" required="required">
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="jabatan<?php echo $var; ?>">
					Jabatan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idjabatan<?php echo $var; ?>" name="jabatan" class="form-control" required="required">
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tglmasuk<?php echo $var; ?>">
					Tgl Masuk 
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idtglmasuk<?php echo $var; ?>" name="tglmasuk" class="form-control dateRangePicker"  >
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tglkeluar<?php echo $var; ?>">
					Tgl Keluar 
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idtglkeluar<?php echo $var; ?>" name="tglkeluar" class="form-control dateRangePicker"  >
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="komentar<?php echo $var; ?>">
					Komentar  
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
				<textArea id="komentar<?php echo $var; ?>" name="komentar" class="form-control"></textarea>					
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
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<form id="formEdit<?php echo $var; ?>" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<input type="hidden" name="kode" id="kodeEdit<?php echo $var; ?>">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idperusahaanEdit<?php echo $var; ?>">
					Nama Perusahaan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idperusahaanEdit<?php echo $var; ?>" name="idperusahaan" class="form-control" required="required">
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="jabatanEdit<?php echo $var; ?>">
					Jabatan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idjabatanEdit<?php echo $var; ?>" name="jabatan" class="form-control" required="required">
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tglmasukEdit<?php echo $var; ?>">
					Tgl Masuk 
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="tglmasukEdit<?php echo $var; ?>" name="tglmasuk" class="form-control dateRangePicker"  >
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tglkeluarEdit<?php echo $var; ?>">
					Tgl Keluar 
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="tglkeluarEdit<?php echo $var; ?>" name="tglkeluar" class="form-control dateRangePicker"  >
				</div>				 
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="komentarEdit<?php echo $var; ?>">
					Komentar  
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
				<textArea id="komentarEdit<?php echo $var; ?>" name="komentar" class="form-control"></textarea>					
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
		<button type="submit" class="btn btn-info pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" onClick="showForm()" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</button>
		<table class="table table-striped table-advanced table-hover">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:7%;">Nama Perusahaan</th>
					<th style="width:7%;">Jabatan</th>
					<th style="width:2%;">Tgl Masuk</th>
					<th style="width:2%;">Tgl Keluar</th>
					<th style="width:10%;">Komentar</th>
					<th style="width:5%"> Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>"></tbody>
		</table>
		
	</div><!-- /grey-panel -->
</div>

<script>
$(document).ready(function(){
	lihatData();
});

function showForm() {
	// Fungsi Paten
	document.getElementById("idperusahaan<?php echo $var; ?>").value = ""; 
	$('#formTambah<?php echo $var; ?>').fadeIn(1000);
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#formEdit<?php echo $var; ?>').hide();
}
function hideForm() {
	// Fungsi Paten
	$('#formTambah<?php echo $var; ?>').hide();
	$('#formEdit<?php echo $var; ?>').hide();
	$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
	
	// Dibawah untuk membuang set required pada form, sehinnga tidak menampilkan error pada log
	document.getElementById("idperusahaan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idjabatan<?php echo $var; ?>").removeAttribute("required");
	 
}

function lihatData(){
    $.ajax({
        type: 'POST',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=lihat&id=<?php echo $_GET['id']; ?>&'+$("#formTambah<?php echo $var; ?>").serialize(),
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
			lihatData();
        });
		
    return false;
});

function editForm(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id,
        success:function(data){
            $('#formEdit<?php echo $var; ?>').slideUp(500, 'swing');
            $('#formEdit<?php echo $var; ?>').slideDown(500);
			
			$('#kodeEdit<?php echo $var; ?>').val(data.id);
            $('#idperusahaanEdit<?php echo $var; ?>').val(data.nm_perusahaan);
            $('#idjabatanEdit<?php echo $var; ?>').val(data.nm_jabatan);
            $('#tglmasukEdit<?php echo $var; ?>').val(data.tgl_masuk);
            $('#tglkeluarEdit<?php echo $var; ?>').val(data.tgl_keluar);
            $('#komentarEdit<?php echo $var; ?>').val(data.komentar);
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
			lihatData();
        });
             
    return false;
});

function hapusData(act,id) {
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}
</script>

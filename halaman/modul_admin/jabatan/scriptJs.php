<script>
// Saat dokumen pertama diload
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

// Ketika select unit diubah
$(document).on('change', '#idNamaUnit<?php echo $var; ?>', function(){
	var kd_unit = document.getElementById("idNamaUnit<?php echo $var; ?>").value;
	dapatBagian(kd_unit);
});


// Function untuk mengambil option dari select bagian
function dapatBagian(kd_unit, kd_bagian){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectDinamis.php",
		data: "act=pilihBagian&kd_unit="+kd_unit+"&kodeBag="+kd_bagian,
		success: function(msg){
			if(msg == ''){
				document.getElementById("idNamaBagian<?php echo $var; ?>").innerHTML='<option value="">-- Pilih Bagian --</option>';
			}
			else{
				document.getElementById("idNamaBagian<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
}

// Reset bos, iso moco po ra!!!
function reset() {
	document.getElementById("idKdJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idNamaUnit<?php echo $var; ?>").value = '';
	document.getElementById("idNamaBagian<?php echo $var; ?>").value = '';
	document.getElementById("idNamaJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idDeskripsi<?php echo $var; ?>").value = '';
	document.getElementById("idSpesifikasi<?php echo $var; ?>").value = '';
	document.getElementById("idCatatan<?php echo $var; ?>").value = '';
	document.getElementById("idGaji<?php echo $var; ?>").value = '';
	document.getElementById("idFrekuensi<?php echo $var; ?>").value = '';
	document.getElementById("idJmlGaji<?php echo $var; ?>").value = '';
	document.getElementById("idTipe<?php echo $var; ?>").value = '';
}

// Untuk menghapus attribute required dari form
function removeAtt() {
	document.getElementById("idKdJabatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaUnit<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaJabatan<?php echo $var; ?>").removeAttribute("required");
}


// Iki mbuh kangge opo ra -_-
function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

// Saat btn tambah diklik
$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	reset();
	document.getElementsByTagName("form")[0].setAttribute("id", "formInput<?php echo $var; ?>");
	$('#form<?php echo $var; ?>').fadeIn(1000);
	$('#formGaji<?php echo $var; ?>').hide();
	$('#formJabatan<?php echo $var; ?>').slideDown();
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#bacaData<?php echo $var; ?>').hide();
});

// event btn lanjut diform
$(document).on('click', '#idBtnLanjut<?php echo $var; ?>', function(){
	$('#formJabatan<?php echo $var; ?>').hide();
	$('#formGaji<?php echo $var; ?>').slideDown();
});

// event btn kembali diform
$(document).on('click', '#idBtnKembali<?php echo $var; ?>', function(){
	$('#formGaji<?php echo $var; ?>').hide();
	$('#formJabatan<?php echo $var; ?>').slideDown();
});

// fungsi ketika btn close diklik
function hideForm() {
	// Fungsi Paten
	reset();
	$('#form<?php echo $var; ?>').slideUp();
	$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
	$('#bacaData<?php echo $var; ?>').fadeIn(1000);
	removeAtt();
}

// fungsi untuk melihat data dari tabel
function lihatData(){
    $('#tabelData<?php echo $var; ?>').fadeOut('slow', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $uri; ?>act.php',
			data: 'act=lihat',
			success:function(html){
				$('#tabelData<?php echo $var; ?>').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData<?php echo $var; ?>').fadeIn('slow');
    });
}

// saat form input disubmit maka akan melakukan act berikut ini
$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
	$('#idImgLoader').show();
    $.post("<?php echo $uri; ?>act.php?act=input", $(this).serialize())
        .done(function(data) {
			reset();
            $('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
             
    return false;
});

// fungsi ketika btn edit diklik, maka input value diform akan diisi
function editForm(id){
	document.getElementsByTagName("form")[0].setAttribute("id", "formEdit<?php echo $var; ?>");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
			dapatBagian(data.kd_unit, data.kd_bagian);
            $('#idKdJabatan<?php echo $var; ?>').val(data.kd_jabatan);
            $('#idNamaUnit<?php echo $var; ?>').val(data.kd_unit);
            $('#idNamaBagian<?php echo $var; ?>').val(data.kd_bagian);
            $('#idNamaJabatan<?php echo $var; ?>').val(data.nm_jabatan);
            $('#idDeskripsi<?php echo $var; ?>').val(data.deskripsi);
            $('#idSpesifikasi<?php echo $var; ?>').val(data.spesifikasi);
            $('#idCatatan<?php echo $var; ?>').val(data.catatan);
        }
    });
}

// Ketika form edit disubmit
$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>act.php?act=actEdit", $(this).serialize())
        .done(function(data) {
			reset();
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
    return false;
});

// Fungsi untuk hapus data
function hapusData(act,id) {
	$.post("<?php echo $uri; ?>act.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}
</script>
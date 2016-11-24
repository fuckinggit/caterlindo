<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function reset() {
	document.getElementById("idPegawai<?php echo $var; ?>").value = '';
	document.getElementById("idNamaBagian<?php echo $var; ?>").value = '';
	document.getElementById("idNamaJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idNikPegawai<?php echo $var; ?>").value = '';
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idPhoto<?php echo $var; ?>").value = '';
	document.getElementById("idAdmin<?php echo $var; ?>").value = '';
	document.getElementById("idUsername<?php echo $var; ?>").value = '';
	document.getElementById("idPass<?php echo $var; ?>").value = '';
	document.getElementById("idPassKonfirm<?php echo $var; ?>").value = '';
	document.getElementById("idTipe<?php echo $var; ?>").value = '';
	document.getElementById("idStatus<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNamaBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaJabatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNikPegawai<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idPhoto<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idUsername<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idPass<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idPassKonfirm<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTipe<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idStatus<?php echo $var; ?>").removeAttribute("required");
}

$(document).on('change', '#idNamaBagian<?php echo $var; ?>', function(){
	var kd_bagian = document.getElementById("idNamaBagian<?php echo $var; ?>").value;
	pilihJabatan(kd_bagian);
	generateNik(kd_bagian);
});

function pilihJabatan(kd_bagian, kd_jabatan){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectDinamis.php",
		data: "kd_bagian="+kd_bagian+"&kd_jabatan="+kd_jabatan,
		success: function(msg){
			if(msg == ''){
				document.getElementById("idNamaJabatan<?php echo $var; ?>").innerHTML='<option value="">-- Pilih Jabatan --</option>';
			}
			else{
				document.getElementById("idNamaJabatan<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
};

function generateNik(kd_bagian){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/nikGenerator.php",
		data: "txtKdBagian="+kd_bagian,
		success: function(msg){
			if(msg == ''){
				document.getElementById("idNikPegawai<?php echo $var; ?>").innerHTML='';
			}
			else{
				//document.getElementById("idNikPegawai<?php echo $var; ?>").val=msg;
				$("#idNikPegawai<?php echo $var; ?>").val(msg);
			}
		}
	});
};

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	reset();
	document.getElementsByTagName("form")[0].setAttribute("id", "formInput<?php echo $var; ?>");
	$('#form<?php echo $var; ?>').fadeIn(1000);
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#bacaData<?php echo $var; ?>').hide();
});

function hideForm() {
	// Fungsi Paten
	reset();
	$('#form<?php echo $var; ?>').slideUp();
	$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
	$('#bacaData<?php echo $var; ?>').fadeIn(1000);
	removeAtt();
}

function lihatData(){
    $('#tabelData<?php echo $var; ?>').fadeOut('slow', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $uri; ?>act.php',
			data: 'act=lihat&id=<?php echo $_SESSION['kd_karyawan']; ?>',
			success:function(html){
				$('#tabelData<?php echo $var; ?>').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData<?php echo $var; ?>').fadeIn('slow');
    });
}

$(document).on('submit', '#formInput<?php echo $var; ?>', function(e) {
	e.preventDefault();
	$.ajax({
		url: "<?php echo $uri; ?>act.php?act=input",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){				 
			reset();
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
		} 	        
	});
	return false;
});

/* $(document).on('submit', '#formInput<?php echo $var; ?>', function() {
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
}); */

function editForm(id, kd_negara, kd_provinsi, kd_kota){
	document.getElementsByTagName("form")[0].setAttribute("id", "formEdit<?php echo $var; ?>");
    pilihProvinsi(kd_negara, kd_provinsi);
    pilihKota(kd_provinsi, kd_kota);
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
			$("#idKode<?php echo $var; ?>").val(data.kd_lokasi_perusahaan);
			$("#idNama<?php echo $var; ?>").val(data.nm_lokasi_perusahaan);
			$("#idNegara<?php echo $var; ?>").val(data.kd_negara);
			$("#idProvinsi<?php echo $var; ?>").val(data.kd_provinsi);
			$("#idKota<?php echo $var; ?>").val(data.kd_kota);
			$("#idKdPos<?php echo $var; ?>").val(data.alamat);
			$("#idAlamat<?php echo $var; ?>").val(data.kd_pos);
			$("#idTelp<?php echo $var; ?>").val(data.no_telp);
			$("#idFax<?php echo $var; ?>").val(data.no_fax);
			$("#idCat<?php echo $var; ?>").val(data.catatan);
        }
    });
}

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

function hapusData(act,id) {
	$.post("<?php echo $uri; ?>act.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}

function pilihKota(val, vil){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectKotaProvinsi.php",
		data: "selProvinsi="+val+"&selKota="+vil,
		success: function(msg){
			if(msg == ''){
				alert('Tidak ada data Kota');
			}
			else{
				document.getElementById("idKota<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
};

function pilihProvinsi(val, vil){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectProvinsi.php",
		data: "selNegara="+val+"&selProvinsi="+vil,
		success: function(msg){
			if(msg == ''){
				alert('Tidak ada data Provinsi');
			}
			else{
				document.getElementById("idProvinsi<?php echo $var; ?>").innerHTML=msg;
				document.getElementById("idKota<?php echo $var; ?>").innerHTML='<option value="">-- Pilih Kota --</option>';
			}
		}
	});
};
</script>
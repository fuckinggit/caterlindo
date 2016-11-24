<script>
$(document).ready(function(){
	setAtt();
	editForm('<?php echo $_GET['id']; ?>');
	$('#idBtnSimpan').hide();
	$('#idBtnClose').hide();
});

// Ketika select unit diubah
$(document).on('change', '#idSubUnit<?php echo $var; ?>', function(){
	var kd_unit = document.getElementById("idSubUnit<?php echo $var; ?>").value;
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
				document.getElementById("idBagian<?php echo $var; ?>").innerHTML='<option value="">-- Pilih Bagian --</option>';
			}
			else{
				document.getElementById("idBagian<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
}
$(document).on('change', '#idBagian<?php echo $var; ?>', function(){
	var kd_bagian = document.getElementById("idBagian<?php echo $var; ?>").value;
	pilihJabatan(kd_bagian);
	buatNik(kd_bagian);
});

$(document).on('change', '#idJabatan<?php echo $var; ?>', function(){
	var kd_jabatan = document.getElementById("idJabatan<?php echo $var; ?>").value;
	dapatSpek(kd_jabatan);
});

function dapatSpek(kd_jabatan) {
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectDinamis.php",
		data: "act=dapatSpek&kd_jabatan="+kd_jabatan,
		success: function(msg){
			if(msg == ''){
				$('#idSpesifikasi<?php echo $var; ?>').val('');
			}
			else{
				$('#idSpesifikasi<?php echo $var; ?>').val(msg);
			}
		}
	});
}

function pilihJabatan(kd_bagian, kd_jabatan){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectDinamis.php",
		data: "kd_bagian="+kd_bagian+"&kd_jabatan="+kd_jabatan,
		success: function(msg){
			if(msg == ''){
				document.getElementById("idJabatan<?php echo $var; ?>").innerHTML='<option value="">-- Pilih Jabatan --</option>';
			}
			else{
				document.getElementById("idJabatan<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
};

function buatNik(kd_bagian){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/nikGenerator.php",
		data: "act=ubahBagian&kdKaryawan=<?php echo $_GET['id']; ?>&txtKdBagian="+kd_bagian,
		success: function(msg){
			if(msg == ''){
				$('#idNik<?php echo $var; ?>').val('');
			}
			else{
				$('#idNik<?php echo $var; ?>').val(msg);
			}
		}
	});
};

$(document).on('click', '#idBtnEdit', function(){
	removeDis();
	$('#idBtnEdit').hide();
	$('#idBtnSimpan').slideDown();
	$('#idBtnClose').slideDown();
});

$(document).on('click', '#idBtnClose', function(){
	setAtt();
	editForm('<?php echo $_GET['id']; ?>');
	$('#idBtnEdit').slideDown();
	$('#idBtnSimpan').hide();
	$('#idBtnClose').slideUp();
});

function removeReq() {
	document.getElementById("idBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idJabatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idSpesifikasi<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idStatus<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idKatKerja<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTglMasuk<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idSubUnit<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idLokasi<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idKontrakMulai<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idKontrakHabis<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idDetailKontrak<?php echo $var; ?>").removeAttribute("required");
}

function removeDis() {
	document.getElementById("idBagian<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idJabatan<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idSpesifikasi<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idStatus<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idKatKerja<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idTglMasuk<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idSubUnit<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idLokasi<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idKontrakMulai<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idKontrakHabis<?php echo $var; ?>").removeAttribute("disabled");
	document.getElementById("idDetailKontrak<?php echo $var; ?>").removeAttribute("disabled");
}

function setAtt() {
	document.getElementById("idBagian<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idJabatan<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idSpesifikasi<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idStatus<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idKatKerja<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idTglMasuk<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idSubUnit<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idLokasi<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idKontrakMulai<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idKontrakHabis<?php echo $var; ?>").setAttribute("disabled", "disabled");
	document.getElementById("idDetailKontrak<?php echo $var; ?>").setAttribute("disabled", "disabled");
}

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
	$('#idImgLoader').show();
    $.post("<?php echo $uri; ?>act.php?act=input&id=<?php echo $_GET['id']; ?>", $(this).serialize())
        .done(function(data) {
			setAtt();
			$('#idBtnEdit').slideDown();
			$('#idBtnSimpan').hide();
			$('#idBtnClose').hide();
			$('#idAlert<?php echo $var; ?>').html(data);
        });
             
    return false;
});

function editForm(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			dapatBagian(data.kd_unit, data.kd_bagian);
			pilihJabatan(data.kd_bagian, data.kd_jabatan);
			dapatSpek(data.kd_jabatan);
			
            $('#idSubUnit<?php echo $var; ?>').val(data.kd_unit);
            $('#idBagian<?php echo $var; ?>').val(data.kd_bagian);
            $('#idNik<?php echo $var; ?>').val(data.nik_karyawan);
            $('#idJabatan<?php echo $var; ?>').val(data.kd_jabatan);
            $('#idStatus<?php echo $var; ?>').val(data.kd_status_kerja);
            $('#idKatKerja<?php echo $var; ?>').val(data.kd_kat_pekerjaan);
            $('#idTglMasuk<?php echo $var; ?>').val(data.tgl_masuk);
            $('#idLokasi<?php echo $var; ?>').val(data.kd_lokasi_perusahaan);
            $('#idKontrakMulai<?php echo $var; ?>').val(data.tgl_mulai_kontrak);
            $('#idKontrakHabis<?php echo $var; ?>').val(data.tgl_habis_kontrak);
            $('#idDetailKontrak<?php echo $var; ?>').val(data.det_kontrak);
        }
    });
}
</script>
<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

$(document).on('change', '#idBagian<?php echo $var; ?>', function(){
	var kd_bagian = document.getElementById("idBagian<?php echo $var; ?>").value;
	pilihJabatan(kd_bagian);
	buatNik(kd_bagian);
});

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

function reset() {
	pilihJabatan();
	document.getElementById("idBagian<?php echo $var; ?>").value = '';
	document.getElementById("idNik<?php echo $var; ?>").value = '';
	document.getElementById("idJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idSpesifikasi<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idJabatan<?php echo $var; ?>").removeAttribute("required");
}

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	reset();
	dataKini('<?php echo $_GET['id']; ?>');
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
			data: 'act=lihat&id=<?php echo $_GET['id']; ?>',
			success:function(html){
				$('#tabelData<?php echo $var; ?>').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData<?php echo $var; ?>').fadeIn('slow');
    });
}

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

function dataKini(id) {
	$.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=dataKini&id='+id,
        success:function(data){
			pilihJabatan(data.kd_bagian, data.kd_jabatan);
			
            $('#idBagian<?php echo $var; ?>').val(data.kd_bagian);
            $('#idNik<?php echo $var; ?>').val(data.nik_karyawan);
            $('#idJabatan<?php echo $var; ?>').val(data.kd_jabatan);
            $('#idSpesifikasi<?php echo $var; ?>').val(data.spesifikasi);
        }
    });
}
</script>
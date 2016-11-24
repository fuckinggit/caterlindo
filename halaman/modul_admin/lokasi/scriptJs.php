<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function reset() {
	document.getElementById("idKode<?php echo $var; ?>").value = '';
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idNegara<?php echo $var; ?>").value = '';
	document.getElementById("idProvinsi<?php echo $var; ?>").value = '';
	document.getElementById("idKota<?php echo $var; ?>").value = '';
	document.getElementById("idKdPos<?php echo $var; ?>").value = '';
	document.getElementById("idAlamat<?php echo $var; ?>").value = '';
	document.getElementById("idTelp<?php echo $var; ?>").value = '';
	document.getElementById("idFax<?php echo $var; ?>").value = '';
	document.getElementById("idCat<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNegara<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idProvinsi<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idKota<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idKdPos<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idAlamat<?php echo $var; ?>").removeAttribute("required");
}

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
			data: 'act=lihat&id=<?php echo $_GET['id']; ?>&'+$("#form<?php echo $var; ?>").serialize(),
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
			$("#idKdPos<?php echo $var; ?>").val(data.kd_pos);
			$("#idAlamat<?php echo $var; ?>").val(data.alamat);
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
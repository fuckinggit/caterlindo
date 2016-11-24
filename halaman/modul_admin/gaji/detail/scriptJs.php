<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

$(document).on('change', '#idNamaBagian<?php echo $var; ?>', function(){
	var kd_bagian = document.getElementById("idNamaBagian<?php echo $var; ?>").value;
	pilihJabatan(kd_bagian);
});

$(document).on('keyup', '#idJml<?php echo $var; ?>', function(){
	var jml_gaji = document.getElementById("idJml<?php echo $var; ?>").value;
	checkGaji(jml_gaji);
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

function checkGaji(gaji) {
	if (gaji == "") {
        document.getElementById("idAlertJumlah").innerHTML = "";
        return;
	} else {
		$.post("<?php echo $uri; ?>/checkGaji.php", {'kd_gaji' : '<?php echo $_GET['id']; ?>', 'gaji' : $('#idJml<?php echo $var; ?>').val()})
			.done(function(data){
				$('#idAlertJumlah').html(data);
			});
	}
}

function reset() {
	document.getElementById("idNamaBagian<?php echo $var; ?>").value = '';
	document.getElementById("idNamaJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idJml<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNamaBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaJabatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idJml<?php echo $var; ?>").removeAttribute("required");
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

function editForm(id, id_bagian, id_jabatan){
	pilihJabatan(id_bagian, id_jabatan);
	document.getElementsByTagName("form")[0].setAttribute("id", "formEdit<?php echo $var; ?>");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
            $('#idKdDetail<?php echo $var; ?>').val(data.id);
            $('#idNamaBagian<?php echo $var; ?>').val(data.kd_bagian);
            $('#idNamaJabatan<?php echo $var; ?>').val(data.kd_jabatan);
            $('#idJml<?php echo $var; ?>').val(data.nilai_gaji);
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
</script>
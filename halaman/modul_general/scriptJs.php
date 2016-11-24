<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function reset() {
	document.getElementById("idKdGeneral<?php echo $var; ?>").value = '';
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idTipe<?php echo $var; ?>").value = '';
	document.getElementById("idTglMulai<?php echo $var; ?>").value = '';
	document.getElementById("idTglAkhir<?php echo $var; ?>").value = '';
	document.getElementById("idStatus<?php echo $var; ?>").value = '';
	document.getElementById("idReminder<?php echo $var; ?>").value = '';
	document.getElementById("idFile<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTipe<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTglMulai<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTglAkhir<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idStatus<?php echo $var; ?>").removeAttribute("required");
}

function showReminder(status) {
	if (status == '0') {
		$('#idFormReminder').slideUp();
	} if (status == '1') {
		$('#idFormReminder').slideDown();
	} else {
		$('#idFormReminder').slideUp();
	}
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
			
			$('#idKdGeneral<?php echo $var; ?>').val(data.kd_general);
			$('#idNama<?php echo $var; ?>').val(data.nm_general);
            $('#idTipe<?php echo $var; ?>').val(data.tipe);
            $('#idTglMulai<?php echo $var; ?>').val(data.tgl_mulai);
            $('#idTglAkhir<?php echo $var; ?>').val(data.tgl_akhir);
            $('#idStatus<?php echo $var; ?>').val(data.status);
            $('#idReminder<?php echo $var; ?>').val(data.tgl_reminder);
			showReminder(data.status);
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
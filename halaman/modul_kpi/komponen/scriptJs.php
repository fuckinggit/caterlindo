<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function reset() {
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idNilaiMin<?php echo $var; ?>").value = '';
	document.getElementById("idNilaiMax<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNilaiMin<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNilaiMax<?php echo $var; ?>").removeAttribute("required");
}

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	$("#idDivFile").fadeOut();
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
			url: '<?php echo $uri; ?>read.php',
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
    $.post("<?php echo $uri; ?>input.php", $(this).serialize())
        .done(function(data) {
			reset();
            $('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
             
    return false;
});

function editForm(id){
	document.getElementsByTagName("form")[0].setAttribute("id", "formEdit<?php echo $var; ?>");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
            $('#idKdKpi<?php echo $var; ?>').val(data.kd_kpi);
            $('#idNama<?php echo $var; ?>').val(data.nm_komponen);
            $('#idNilaiMin<?php echo $var; ?>').val(data.nilai_min);
            $('#idNilaiMax<?php echo $var; ?>').val(data.nilai_max);
        }
    });
}

$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
        .done(function(data) {
			reset();
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
    return false;
});

function hapusData(act,id) {
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}
</script>
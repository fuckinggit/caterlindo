<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

$(document).on('change', '#idNamaBagian<?php echo $var; ?>', function(){
	var kd_bagian = document.getElementById("idNamaBagian<?php echo $var; ?>").value;
	pilihJabatan(kd_bagian);
});

function pilihJabatan(val){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectDinamis.php",
		data: "kd_bagian="+val,
		success: function(msg){
			if(msg == ''){
				alert('Tidak ada data!');
			}
			else{
				document.getElementById("idJabatan<?php echo $var; ?>").innerHTML=msg;
			}
		}
	});
};

function reset() {
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idNamaBagian<?php echo $var; ?>").value = '';
	document.getElementById("idJabatan<?php echo $var; ?>").value = '';
	document.getElementById("idThnPeriode<?php echo $var; ?>").value = '';
	document.getElementById("idLamaCuti<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idNamaBagian<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idJabatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idThnPeriode<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idLamaCuti<?php echo $var; ?>").removeAttribute("required");
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
			$('#idAlert<?php echo $var; ?>').html(data);
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
			
            $('#idKdCuti<?php echo $var; ?>').val(data.kd_cuti);
            $('#idNama<?php echo $var; ?>').val(data.kd_bagian);
            $('#idNamaBagian<?php echo $var; ?>').val(data.kd_jabatan);
            $('#idJabatan<?php echo $var; ?>').val(data.nm_cuti);
            $('#idThnPeriode<?php echo $var; ?>').val(data.thn_periode);
            $('#idLamaCuti<?php echo $var; ?>').val(data.lama_cuti);
        }
    });
}

$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
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
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}
</script>
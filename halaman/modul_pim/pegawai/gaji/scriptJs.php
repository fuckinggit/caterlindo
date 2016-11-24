<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function showGaji(str) {
    if (str == "") {
        document.getElementById("idRangeGaji<?php echo $var; ?>").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idRangeGaji<?php echo $var; ?>").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo $uri; ?>getRangeGaji.php?q="+str,true);
        xmlhttp.send();
    }
}

$(document).on('keyup', '#idJumlah<?php echo $var; ?>', function(){
	var jml_gaji = document.getElementById("idJumlah<?php echo $var; ?>").value;
	checkGaji(jml_gaji);
});

function checkGaji(gaji) {
	if (gaji == "") {
        document.getElementById("idAlertJumlah").innerHTML = "";
        return;
	} else {
		$.post("<?php echo $uri; ?>/checkGaji.php", {'kd_gaji' : $('#idGaji<?php echo $var; ?>').val(), 'gaji' : $('#idJumlah<?php echo $var; ?>').val()})
			.done(function(data){
				$('#idAlertJumlah').html(data);
			});
	}
}

function reset() {
	document.getElementById("idGaji<?php echo $var; ?>").value = '';
	document.getElementById("idFrekuensi<?php echo $var; ?>").value = '';
	document.getElementById("idJumlah<?php echo $var; ?>").value = '';
	document.getElementById("idCatatan<?php echo $var; ?>").value = '';
	document.getElementById("idTipe<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idGaji<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idFrekuensi<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idJumlah<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idCatatan<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTipe<?php echo $var; ?>").removeAttribute("required");
}

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	reset();
	showGaji();
	checkGaji();
	document.getElementsByTagName("form")[0].setAttribute("id", "formInput<?php echo $var; ?>");
	$('#form<?php echo $var; ?>').fadeIn(1000);
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#bacaData<?php echo $var; ?>').hide();
});

function hideForm() {
	// Fungsi Paten
	reset();
	showGaji();
	checkGaji();
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
			showGaji();
			checkGaji();
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
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
            $('#idKdGaji<?php echo $var; ?>').val(data.id);
            $('#idKdKaryawan<?php echo $var; ?>').val(data.kd_karyawan);
            $('#idGaji<?php echo $var; ?>').val(data.kd_gaji);
            $('#idFrekuensi<?php echo $var; ?>').val(data.frekuensi);
            $('#idJumlah<?php echo $var; ?>').val(data.jml_gaji);
            $('#idCatatan<?php echo $var; ?>').val(data.keterangan);
            $('#idTipe<?php echo $var; ?>').val(data.tipe_gaji);
            $('#idBank<?php echo $var; ?>').val(data.kd_bank);
            $('#idNoRek<?php echo $var; ?>').val(data.no_rekening);
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
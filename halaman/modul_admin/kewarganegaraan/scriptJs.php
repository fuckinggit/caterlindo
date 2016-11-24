<script>
$(document).ready(function(){
	lihatData();
	$('#bacaKota').hide();
	$('#idImgLoader').show();
	$('#bacaData<?php echo $var; ?>').show(1500);
	//$('#idImgLoader').show();
});
function LihatProvinsi(){
	$('#bacaData<?php echo $var; ?>').show(1500);
	$('#bacaKota').hide(1500);
}
function LihatKota(){
	$('#bacaKota').show(1500);
	$('#bacaData<?php echo $var; ?>').hide(1500);
}
function reset() {
	document.getElementById("nama<?php echo $var; ?>").value = '';
	document.getElementById("kota").value = '';
}

function removeAtt() {
	document.getElementById("nama<?php echo $var; ?>").removeAttribute("required");	
	document.getElementById("kota").removeAttribute("required");	
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
	$('#formKota').hide();
	removeAtt();
}

function hideinKota(){
	reset();
	removeAtt();
	$('#formKota').hide(1500);
	$('#bacaKota').fadeIn(1000);
	$('#btnTambahKota').fadeIn(1000);
	
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
			$('#idImgLoader').hide();
        });
             
    return false;
});

$(document).on('submit', '#formInputKota', function() {
    $.post("<?php echo $uri; ?>inputKota.php", $(this).serialize())
        .done(function(data) {
            $('#formKota').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
			$('#bacaKota').fadeIn(1000);
			$('#btnTambahKota').fadeIn(1000);
			pilihKotaTable(document.getElementById("kodeprov").value);
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

			$('#kode<?php echo $var; ?>').val(data.fc_id);
            $('#nama<?php echo $var; ?>').val(data.fv_nmprop);
            
			 
        }
    });
}

function editKota(id){
	document.getElementsByTagName("form")[1].setAttribute("id", "formEditKota");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=editKota&id='+id,
        success:function(data){
			$('#formKota').slideUp(500, 'swing');
            $('#formKota').slideDown(500);

			$('#kodeprov').val(data.fc_kdkota);
            $('#provinsi').val(data.fv_nmprop);
            $('#kota').val(data.fv_nmkota);
            
			 
        }
    });
}

function Tambah(id){
	document.getElementsByTagName("form")[1].setAttribute("id", "formInputKota");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id,
        success:function(data){
			reset();
			$('#formKota').slideUp(500, 'swing');
            $('#formKota').slideDown(500);
            $('#kodeprov').val(data.fc_kdprop);
            $('#provinsi').val(data.fv_nmprop);
        }
    });
}

$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
        .done(function(data) {
			reset();
			$('#form<?php echo $var; ?>').hide(1000);
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
    return false;
});
$(document).on('submit', '#formEditKota', function() {
    $.post("<?php echo $uri; ?>editKota.php", $(this).serialize())
        .done(function(data) {
			$('#formKota').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data);
			$('#bacaKota').fadeIn(1000);
			$('#btnTambahKota').fadeIn(1000);
			var idProvinsi = document.getElementById("idProvinsi").value;
			pilihKotaTable(idProvinsi);
        });
    return false;
});

function hapusData(act,id) {
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
		});
}
function hapus(act,id){
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#formKota').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
			$('#bacaKota').fadeIn(1000);
			$('#btnTambahKota').fadeIn(1000);
			pilihKotaTable(document.getElementById("idProvinsi").value);
		});
}

function pilihKotaTable(val){
	$.ajax({
		type: "POST",
		url: "config/selectKotaTable.php",
		data: "selProvinsi="+val,
		success: function(msg){
			if(msg == ''){
				alert('Tidak ada data Kota');
			}
			else{
				$('#bacaData2<?php echo $var; ?>').html(msg);
			}
		}
	});
};

</script>
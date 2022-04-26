<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols.="saluran,sumber,nama,telp,email,jenis,kegiatan";
?>

<input type="hidden" name="tablename" value="tmc_pservice_wal">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">
<input type="hidden" name="filenames" value="ktp">
<input type="hidden" name="kategori" value="wal">

<div class="row mb-2">
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Saluran Informasi</label>
			<select name="saluran" class="form-select" placeholder="">
				<option value="Call Center">Call Center</option>
				<option value="Email">Email</option>
				<option value="Medsos">Medsos</option>
				<option value="Mobile Apps">Mobile Apps</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Sumber Informasi</label>
			<select name="sumber" class="form-select" placeholder="">
				<option value="Individu">Individu</option>
				<option value="Kelompok Masyarakat">Kelompok Masyarakat</option>
				<option value="Instansi Pemerintah">Instansi Pemerintah</option>
				<option value="Instansi Swasta">Instansi Swasta</option>
				<option value="Akademisi">Akademisi</option>
			</select>
		</div>
	</div>
</div>
<div class="row mb-2">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Nama</label>
			<input type="text" name="nama" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Telp.</label>
			<input type="text" name="telp" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Email</label>
			<input type="text" name="email" class="form-control" placeholder="" >
		</div>
	</div>
</div>
<div class="row mb-2">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Jenis</label>
			<select name="jenis" class="form-select" placeholder="">
				<option value="Pribadi">Pribadi</option>
				<option value="Bisnis">Bisnis</option>
				<option value="Sosial">Sosial</option>
				<option value="Ormas">Ormas</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Kegiatan</label>
			<input type="text" name="kegiatan" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Copy KTP</label>
			<input type="file" name="ktp" class="form-control" placeholder="" >
		</div>
	</div>
</div>
<div class="row mb-2 hidden">
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Copy SIM Lama</label>
			<input type="file" name="sim" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Copy Sertifikat Sekolah Mengemudi</label>
			<input type="file" name="sertifikat" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Copy Cek Kesehatan</label>
			<input type="file" name="kesehatan" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Copy Bukti Lunas Adm.</label>
			<input type="file" name="lunas" class="form-control" placeholder="" >
		</div>
	</div>
</div>


<script>
function mappicker(lat,lng){
	window.open(base_url+"map?lat="+$(lat).val()+"&lng="+$(lng).val(),"MapWindow","width=830,height=500,location=no").focus();
}

jvalidate = $("#myf").validate({
    rules :{
        "formulir" : {
            required : true
        },
		"dasar" : {
            required : true
        },
		"nomor" : {
			required : true
		},
		"tempat" : {
			required : true
		},
		"tanggal" : {
			required : true
		}
    }});

$("#btn_save").show();
$(".dasar").show();
$(".nomor").show();

datepicker(true);
timepicker();
$(".select2").select2();

$(".is-invalid").removeClass("is-invalid");
$(".is-valid").removeClass("is-valid");

function safeform(thef){
	sendData('#myf','PublicService/save_permohonan');
}
function lainnyabukan(tv){
	if(tv=='Lainnya'){
		$(".lainnya").show();
	}else{
		$("#lainnya").val("");
		$(".lainnya").hide();
	}
}
</script>
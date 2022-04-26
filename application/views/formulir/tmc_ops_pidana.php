<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,dasar,nomor,";
$cols.="namajalan,lat,lng,jenis,korban,penindakan,ket,tindakan,jam,";
$cols.="instansi1,petugas1,instansi2,petugas2,instansi3,petugas3,instansi4,petugas4";
?>

<input type="hidden" name="tablename" value="tmc_ops_pidana">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Nama Jalan</label>
			<input type="text" name="namajalan" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Latitude</label>
			<input type="text" id="lat" name="lat" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Longitude</label>
			<input type="text" id="lng" name="lng" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<div class="form-group">
			<label class="form-label">&nbsp;</label>
			<button type="button" class="btn btn-danger" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker"></i></button>
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Jam</label>
			<input type="text" name="jam" class="form-control timepicker" placeholder="" >
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Tindak Pidana</label>
			<select name="jenis" class="form-select" placeholder="">
<?php for($i=0;$i<count($pidana);$i++){?>
<option value="<?php echo $pidana[$i]['val']?>"><?php echo $pidana[$i]['txt']?></option>
<?php }?>
				<!--option value="Jambret">Jambret</option>
				<option value="Bajing Loncat">Bajing Loncat</option>
				<option value="Begal">Begal</option-->
			</select>
		</div> 
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Korban</label>
			<select name="korban" class="form-select" placeholder="">
				<option value="Pengemudi R2">Pengemudi R2</option>
				<option value="Pengemudi R4 Pribadi">Pengemudi R4 Pribadi</option>
				<option value="Pengemudi Angkutan Barang">Pengemudi Angkutan Barang</option>
				<option value="Pengemudi Angkutan Umum">Pengemudi Angkutan Umum</option>
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Cara Bertindak</label>
			<select name="tindakan" class="form-select" placeholder="">
				<option value="Pre Ventif">Pre Ventif</option>
				<option value="Pre Entif">Pre Entif</option>
				<option value="Represif">Represif</option>
				<option value="Kuratif">Kuratif</option>
				<option value="Rehabilitasi">Rehabilitasi</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Kategori Penindakan</label>
			<select name="penindakan" class="form-select" placeholder="">
				<option value="Turjagwali">Turjagwali</option>
				<option value="Monitoring">Monitoring</option>
				<option value="Sosialisasi">Sosialisasi</option>
				<option value="Publikasi">Publikasi</option>
				<option value="Teguran">Teguran</option>
				<option value="Rekayasa Lalin">Rekayasa Lalin</option>
				<option value="Tilang">Tilang</option>
				<option value="Penangkapan">Penangkapan</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Keterangan CB</label>
			<textarea name="ket" class="form-control" placeholder="" ></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Instansi 1</label>
			<select name="instansi1" class="form-select" placeholder="">
				<option value=""></option>
				<option value="Lantas">Lantas</option>
				<option value="PSC">PSC</option>
				<option value="Dishub">Dishub</option>
				<option value="PU">PU</option>
				<option value="BPJT">BPJT</option>
				<option value="SatpolPP">SatpolPP</option>
				<option value="TNI">TNI</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Nama/CallSign 1</label>
			<input type="text" name="petugas1" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Instansi 2</label>
			<select name="instansi2" class="form-select" placeholder="">
				<option value=""></option>
				<option value="Lantas">Lantas</option>
				<option value="PSC">PSC</option>
				<option value="Dishub">Dishub</option>
				<option value="PU">PU</option>
				<option value="BPJT">BPJT</option>
				<option value="SatpolPP">SatpolPP</option>
				<option value="TNI">TNI</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Nama/CallSign 2</label>
			<input type="text" name="petugas2" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Instansi 3</label>
			<select name="instansi3" class="form-select" placeholder="">
				<option value=""></option>
				<option value="Lantas">Lantas</option>
				<option value="PSC">PSC</option>
				<option value="Dishub">Dishub</option>
				<option value="PU">PU</option>
				<option value="BPJT">BPJT</option>
				<option value="SatpolPP">SatpolPP</option>
				<option value="TNI">TNI</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Nama/CallSign 3</label>
			<input type="text" name="petugas3" class="form-control" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Instansi 4</label>
			<select name="instansi4" class="form-select" placeholder="">
				<option value=""></option>
				<option value="Lantas">Lantas</option>
				<option value="PSC">PSC</option>
				<option value="Dishub">Dishub</option>
				<option value="PU">PU</option>
				<option value="BPJT">BPJT</option>
				<option value="SatpolPP">SatpolPP</option>
				<option value="TNI">TNI</option>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Nama/CallSign 4</label>
			<input type="text" name="petugas4" class="form-control" placeholder="" >
		</div>
	</div>
</div>

<script>
function mappicker(lat,lng){
	window.open(base_url+"map?lat="+$(lat).val()+"&lng="+$(lng).val(),"MapWindow","width=830,height=500,location=no").focus();
}
function lainnyabukan(tv){
	if(tv=='Lainnya'){
		$(".lainnya").show();
	}else{
		$("#lainnya").val("");
		$(".lainnya").hide();
	}
}
function macetgak(tv){
	if(tv=='Macet'){
		$(".macet").show();
	}else{
		$("#penyebab").val("");
		$("#penyebabd").val("");
		$("#lainnya").val("");
		$(".lainnya").hide();
		$(".macet").hide();
	}
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
		"namajalan" : {
			required : true
		}
    }});

$("#btn_save").show();
$(".dasar").show();
$(".nomor").show();

datepicker(true);
timepicker();
macetgak('');

	$(".is-invalid").removeClass("is-invalid");
	$(".is-valid").removeClass("is-valid");

</script>
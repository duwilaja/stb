<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols.="tglsuluh,jam,kategori,sasaran,media,lokasi,lat,lng,audien,doc,kesimpulan,foto";
?>
<input type="hidden" name="path" value="rengiat_suluh">

<input type="hidden" name="tablename" value="rengiat_suluh">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<input type="hidden" name="tgl" value="<?php echo date('Y-m-d')?>">
<input type="hidden" name="foto" value="">
<input type="hidden" name="kesimpulan" value="">
<input type="hidden" name="doc" value="">


<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Tanggal Penyuluhan</label>
			<input type="text" id="tglsuluh" name="tglsuluh" class="form-control datepicker" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Jam</label>
			<input type="text" id="jam" name="jam" class="form-control timepicker" placeholder="" >
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Kategori</label>
			<select name="kategori" class="form-select" placeholder="">
				<option value=""></option>
<?php for($i=0;$i<count($kategori);$i++){?>
<option value="<?php echo $kategori[$i]['val']?>"><?php echo $kategori[$i]['txt']?></option>
<?php }?>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Sasaran</label>
			<select name="sasaran" class="form-select" placeholder="">
				<option value=""></option>
<?php for($i=0;$i<count($sasaran);$i++){?>
<option value="<?php echo $sasaran[$i]['val']?>"><?php echo $sasaran[$i]['txt']?></option>
<?php }?>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Media</label>
			<select name="media" class="form-select" placeholder="">
				<option value=""></option>
<?php for($i=0;$i<count($media);$i++){?>
<option value="<?php echo $media[$i]['val']?>"><?php echo $media[$i]['txt']?></option>
<?php }?>
			</select>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Lokasi</label>
			<input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="" >
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
			<label class="form-label">Jml.Audien</label>
			<input type="text" id="audien" name="audien" class="form-control" placeholder="" >
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-5">
		<div class="form-group dfiles">
			<label class="form-label">Dokumen</label>
			<input type="file" name="fdoc[]" class="form-control dfile" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<label class="form-label">&nbsp;</label>
		<button type="button" class="btn btn-icon btn-facebook" onclick="$('.dfiles').append($('.dfile').clone().removeClass('dfile'));"><i class="fa fa-copy"></i></button>
	</div>
	<div class="col-sm-6 col-md-5">
		<div class="form-group kfiles">
			<label class="form-label">Kesimpulan</label>
			<input type="file" name="fkesimpulan[]" class="form-control kfile" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<label class="form-label">&nbsp;</label>
		<button type="button" class="btn btn-icon btn-facebook" onclick="$('.kfiles').append($('.kfile').clone().removeClass('kfile'));"><i class="fa fa-copy"></i></button>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="form-group ffiles">
			<label class="form-label">Foto/Video</label>
			<input type="file" name="ffoto[]" class="form-control ffile" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<label class="form-label">&nbsp;</label>
		<button type="button" class="btn btn-icon btn-facebook" onclick="$('.ffiles').append($('.ffile').clone().removeClass('ffile'));"><i class="fa fa-copy"></i></button>
	</div>
</div>


<script>
function mappicker(lat,lng){
	window.open(base_url+"map?lat="+$(lat).val()+"&lng="+$(lng).val(),"MapWindow","width=830,height=500,location=no").focus();
}
function jenischanged(tv){
	if(tv=='Yan Aduan'){
		$(".aduan").show();
	}else{
		$("#jenisd").val("");
		$(".aduan").hide();
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
		"lat" : {
			required : true
		},
		"lng" : {
			required : true
		}
    }});

$("#btn_save").show();
$(".dasar").show();
$(".nomor").show();

datepicker(true);
timepicker();

$(".is-invalid").removeClass("is-invalid");
$(".is-valid").removeClass("is-valid");

</script>
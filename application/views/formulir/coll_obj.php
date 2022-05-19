<?php defined('BASEPATH') or exit('No direct script access allowed');

$cols = "nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols .= "jam,detil,nama,lat,lng";
?>
<input type="hidden" name="path" value="coll_obj">

<input type="hidden" name="tablename" value="coll_obj">
<input type="hidden" name="fieldnames" value="<?php echo $cols ?>">

<!--input type="hidden" name="tgl" value="<?php echo date('Y-m-d') ?>"-->

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Tanggal</label>
			<input readonly type="text" id="tgl" name="tgl" class="form-control" placeholder="[auto]" value="<?php echo date('Y-m-d') ?>">
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Jam</label>
			<input readonly type="text" id="jam" name="jam" class="form-control" placeholder="[auto]" value="<?php echo date('H:i:s') ?>">
		</div>
	</div>
	<div class="col-sm-6 col-md-5">
		<div class="form-group">
			<label class="form-label">Nama</label>
			<input type="text" id="nama" name="nama" class="form-control" placeholder="">
		</div>
	</div>
</div>
<div class="row">

	<div class="col-sm-6 col-md-6">
		<div class="form-group">
			<label class="form-label">Latitude</label>
			<input type="text" id="lat" name="lat" class="form-control" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-5">
		<div class="form-group">
			<label class="form-label">Longitude</label>
			<input type="text" id="lng" name="lng" class="form-control" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<div class="form-group">
			<label class="form-label">&nbsp;</label>
			<button type="button" class="btn btn-danger" onclick="mappicker('#lat','#lng');"><i class="fa fa-map-marker"></i></button>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
		<div class="form-group">
			<label class="form-label">Detil</label>
			<textarea id="detil" name="detil" class="form-control" placeholder=""></textarea>
		</div>
	</div>

</div>
<!--div class="row">
	<div class="col-sm-6 col-md-5">
		<div class="form-group">
			<label class="form-label">Uraian</label>
			<textarea id="uraian" name="uraian" class="form-control" placeholder="" ></textarea>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="form-group files">
			<label class="form-label">Foto/Video</label>
			<input type="file" name="uploadedfile[]" class="form-control file" placeholder="" >
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<label class="form-label">&nbsp;</label>
		<button type="button" class="btn btn-icon btn-facebook" onclick="$('.files').append($('.file').clone().removeClass('file'));"><i class="fa fa-copy"></i></button>
	</div>
</div-->


<script>
	function mappicker(lat, lng) {
		window.open(base_url + "map?lat=" + $(lat).val() + "&lng=" + $(lng).val(), "MapWindow", "width=830,height=500,location=no").focus();
	}

	function jenischanged(tv) {
		if (tv == 'Yan Aduan') {
			$(".aduan").show();
		} else {
			$("#jenisd").val("");
			$(".aduan").hide();
		}
	}
	jvalidate = $("#myf").validate({
		rules: {
			"formulir": {
				required: true
			},
			"dasar": {
				required: true
			},
			"nomor": {
				required: true
			},
			"lat": {
				required: true
			},
			"lng": {
				required: true
			}
		}
	});

	$("#btn_save").show();
	$(".dasar").show();
	$(".nomor").show();

	datepicker(true);
	timepicker();

	$(".is-invalid").removeClass("is-invalid");
	$(".is-valid").removeClass("is-valid");
</script>
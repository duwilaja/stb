<?php defined('BASEPATH') or exit('No direct script access allowed');

$cols = "nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols .= "jam,aksi,pelaku,md,lb,lr,lokasi,lat,lng,uraian,uploadedfile,korban";
?>
<input type="hidden" name="path" value="lapsit_ketahanan">

<input type="hidden" name="tablename" value="lapsit_ketahanan">
<input type="hidden" name="fieldnames" value="<?php echo $cols ?>">

<!--input type="hidden" name="tgl" value="<?php echo date('Y-m-d') ?>"-->

<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Tanggal</label>
			<input type="text" id="tgl" name="tgl" class="form-control datepicker" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Jam</label>
			<input type="text" id="jam" name="jam" class="form-control timepicker" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Aksi</label>
			<select name="aksi" class="form-select" placeholder="">
				<option value=""></option>
				<?php for ($i = 0; $i < count($aksi); $i++) { ?>
					<option value="<?php echo $aksi[$i]['val'] ?>"><?php echo $aksi[$i]['txt'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Pelaku</label>
			<select name="pelaku" class="form-select" placeholder="">
				<option value=""></option>
				<?php for ($i = 0; $i < count($pelaku); $i++) { ?>
					<option value="<?php echo $pelaku[$i]['val'] ?>"><?php echo $pelaku[$i]['txt'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="form-group">
			<label class="form-label">Lokasi</label>
			<input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Latitude</label>
			<input type="text" id="lat" name="lat" class="form-control" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
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
	<div class="col-sm-6 col-md-3">
		<div class="form-group">
			<label class="form-label">Korban</label>
			<select name="korban" id="korban" class="form-select" placeholder="" onchange="adatidak(this.value)">
				<option value="Tidak Ada">Tidak Ada</option>
				<option value="Ada">Ada</option>
			</select>
		</div>
	</div>
</div>
<div class="row korban">
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">Meninggal</label>
			<input type="text" id="md" name="md" class="form-control korbanv" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">L.Berat</label>
			<input type="text" id="lb" name="lb" class="form-control korbanv" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-2">
		<div class="form-group">
			<label class="form-label">L.Ringan</label>
			<input type="text" id="lr" name="lr" class="form-control korbanv" placeholder="">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="form-group">
			<label class="form-label">Uraian</label>
			<textarea id="uraian" name="uraian" class="form-control" placeholder=""></textarea>
		</div>
	</div>
	<div class="col-sm-6 col-md-5">
		<div class="form-group files">
			<label class="form-label">Foto/Video</label>
			<input type="file" name="uploadedfile[]" class="form-control file" placeholder="">
		</div>
	</div>
	<div class="col-sm-6 col-md-1">
		<label class="form-label">&nbsp;</label>
		<button type="button" class="btn btn-icon btn-facebook" onclick="$('.files').append($('.file').clone().removeClass('file'));"><i class="fa fa-copy"></i></button>
	</div>
</div>


<script>
	function mappicker(lat, lng) {
		window.open(base_url + "map?lat=" + $(lat).val() + "&lng=" + $(lng).val(), "MapWindow", "width=830,height=500,location=no").focus();
	}

	function adatidak(tv) {
		if (tv == 'Ada') {
			$(".korban").show();
		} else {
			$(".korbanv").val("0");
			$(".korban").hide();
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

	function contentcallback() {
		adatidak('');
	}

	function reccallback() {
		adatidak($("#korban").val());
	}
</script>
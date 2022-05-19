<?php defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-md-8">
				<h5 class="titel_rekap"><?php echo $this->input->get("t") == '' ? $this->input->get("t") : "-" ?></h5>
				<span>Hasil Rekapitulasi Data
				</span>
			</div>

			<div class="col-md-4">
				<div id="pilih_rekapx"></div>
			</div>
		</div>
	</div>
	<div class="card-body" style="padding-top:20px;">
		<div class="filter">
			<div class="row">
				<div class="col-md-3">
					<div class="mb-1">Dari</div>
					<input type="text" placeholder="...." class="form-control datepicker" id="fdate">
				</div>
				<div class="col-md-3">
					<div class="mb-1">Sampai</div>
					<input type="text" placeholder="...." class="form-control datepicker" id="tdate">
				</div>
				<div class="col-md-2">
					<a href="#" title="Refresh" style="position: absolute;left:0;bottom:0;" class="btn btn-info" onclick="reload_table();"><i class="fe fe-refresh-cw"></i> Filter</a>
				</div>
				<div class="col-md-2">
					<a class="btn btn-icon btn-success" style="position: absolute;left:0;bottom:0;" href="JavaScript:;" data-fancybox="" data-type="iframe" data-src="edit?i=0&t=<?php echo $view ?>">Create</a>
				</div>
			</div>
		</div>
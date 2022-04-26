<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols.="tanggal,jumlah,jenis";
?>

<input type="hidden" name="tablename" value="tmc_data_pengemudi">
<input type="hidden" name="fieldnames" value="<?php echo $cols?>">

<style>
	#map {
		width: 100%;
		height: 400px;
	}
</style>


<button type="button" class="btn btn-primary pull-right" onclick="showModal(0);"><i class="fa fa-plus"></i></button>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table id="mytbl" class="table table-striped table-bordered w-100">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Jumlah</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left modal_form">
  <div role="document" class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header"><strong id="exampleModalLabel" class="modal-title">Jumlah Pengemudi</strong>
		<button type="button" data-bs-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">x</span></button>
	  </div>
	  <div class="modal-body">
		<!--p>Lorem ipsum dolor sit amet consectetur.</p-->
		<!--form id="myf" class="form-horizontal"-->		
		  <div class="row">
			<div class="form-group col-md-12">
				<label class="form-label">Tanggal</label>
				<input type="text" name="tanggal" id="tanggal" class="form-control datepicker" placeholder="" >
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Jenis Lisensi</label>
				<select id="jenis" name="jenis" class="form-select" placeholder="">
					<option value="A">A</option>
					<option value="B1">B1</option>
					<option value="B2">B2</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="A Umum">A Umum</option>
					<option value="B1 Umum">B1 Umum</option>
					<option value="B2 Umum">B2 Umum</option>
					<option value="Internasional">Internasional</option>
				</select>
			</div>
		  </div>
		  <div class="row">
			<div class="form-group col-md-12">
				<label>Jumlah</label>
				<input type="text" id="jumlah" name="jumlah" placeholder="..." class="form-control">
			</div>
		  </div>
		  
		<!--/form-->
	  </div>
	  <div class="modal-footer">
	    <button type="button" class="btn btn-danger" id="bdel"  onclick="sendData('#myf','laporan/dele');">Delete</button>
		<button type="button" class="btn btn-success" id="btnsv" onclick="simpanlah();">Save</button>
		<button type="button" data-bs-dismiss="modal" class="btn btn-default">Close</button>
		
	  </div>
	</div>
  </div>
</div>

<script>
var map,mytbl,markers;

function showModal(id){
	if(id==0){
		$("#tanggal").val("");
		$("#jumlah").val("");
		$("#rowid").val(0);
		$("#bdel").hide();
		$("#myModal").modal("show");
	}else{
		$.ajax({
			type: 'POST',
			url: base_url+'laporan/datas',
			data: {q:'pengemudi',id:id},
			success: function(data){
				$("#bdel").show();
				var json = JSON.parse(data);
				console.log(json);
				$.each(json[0],function (key,val){
					$('#'+key).val(val);
				})
				$("#myModal").modal("show");
			},
			error: function(xhr){
				log('Please check your connection'+xhr);
				alrt("Failed retrieving data","error");
			}
		});
	}
	
}

function senddatacallback(f){
	mytbl.ajax.reload();
}

$(document).ready(function(){
	mytbl = $("#mytbl").DataTable({
		serverSide: true,
		processing: true,
		searching: true,
		buttons: ['copy', 'csv'],
		stateSave: true,
		bDestroy: true,
		ordering: false,
		ajax: {
			type: 'POST',
			url: base_url+'laporan/dttbl',
			data: function (d) {
				d.q= '<?php echo base64_encode("select tanggal,concat('<a href=# onclick=showModal(',rowid,');>',jenis,'</a>') as jns,jumlah from tmc_data_pengemudi order by rowid desc"); ?>';
			}
		},
		initComplete: function(){
			//dttbl_buttons(); //for ajax call
		}
	});
	
	$(".<?php echo $frid?>").attr("disabled",true);
});

jvalidate = $("#myf").validate({
    rules :{
        "jalan" : {
			required : true
		}
    }});
	
	datepicker(true);
</script>
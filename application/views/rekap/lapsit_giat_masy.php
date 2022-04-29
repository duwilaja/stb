<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols="nrp,tgl,jenis,tglmulai,tglselesai,jammulai,jamselesai,lokasi,lat,lng,'' as btnset,rowid";
$tname="lapsit_giat_masy";
?>

<?php $this->load->view('rekap/incl/head_rekap');?>
		<div class="table-responsive mt-4">
			<table id="mytbl" class="table table-striped table-bordered w-100">
				<thead>
					<tr>
						<th>NRP</th>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Mulai Tgl</th>
						<th>Sampai Tgl</th>
						<th>Mulai Jam</th>
						<th>Sampai Jam</th>
						<th>Lokasi</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
var  mytbl;
function load_table(){
	mytbl = $("#mytbl").DataTable({
		serverSide: true,
		processing: true,
		searching: false,
		ordering:false,
		buttons: ['copy', {extend : 'excelHtml5', messageTop: $(".judul").text()}],
		ajax: {
			type: 'POST',
			url: '<?php echo base_url()?>rekap/datatable',
			data: function (d) {
				d.cols= '<?php echo base64_encode($cols); ?>',
				d.tname= '<?php echo base64_encode($tname); ?>',
				d.orders= '<?php echo base64_encode("tgl desc, rowid desc"); ?>',
				d.ismap= true,
				d.isedit= true,
				d.fdate= $('#fdate').val(),
				d.tdate= $('#tdate').val();
			}
		},
		initComplete: function(){
			dttbl_buttons(); //for ajax call
		}
	});
	datepicker();
}

function contentcallback(){
	load_table();
}

function reload_table(){
	mytbl.ajax.reload();
}
</script>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$cols="nrp,unit,polda,polres,dinas,subdinas,tgl,";
$cols="'' as btnset,nrp,tgl,tglwal,jam,obj,nama,kategori,lokasi,lat,lng,giat,ambang,rowid";
$tname="rengiat_wal";
?>

<?php $this->load->view('rekap/incl/head_rekap');?>
		<div class="table-responsive mt-4">
			<table id="mytbl" class="table table-striped table-bordered w-100">
				<thead>
					<tr>
						<th></th>
						<th>ID/NRP</th>
						<th>Tanggal</th>
						<th>Tgl Pengawalan</th>
						<th>Jam</th>
						<th>Obyek</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Lokasi</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th>Kegiatan</th>
						<th>Ambang Gangguan</th>
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
				//d.isfile= true,
				//d.filefields= "uploadedfile",
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
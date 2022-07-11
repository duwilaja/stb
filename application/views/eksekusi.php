<style>
.activity-timeline .media .activity-line {
    margin: 0 auto;
    left: 21px;
}
</style>
<input type="hidden" name="pengaduan_id" id="pengaduan_id" value="<?=$this->input->get('id');?>">
<input type="hidden" name="task_id" id="task_id">
<div class="container-fluid">
    <div class="row">
        <div class="col call-chat-sidebar col-sm-12">
            <div class="card">
              <div class="card-body chat-body">
                <div class="chat-box">
                  <!-- Chat left side Start-->
                  <div class="chat-left-aside">
                    <div class="media"><img class="rounded-circle user-image" src="cuba/assets/images/user/12.png" alt="">
                      <div class="about">
                        <div class="name f-w-600"><?= $session['nama'];?></div>
                        <div class="status"><?= $session['pangkat'];?></div>
                      </div>
                    </div>
                    <div class="people-list" id="people-list">
                    <ul class="nav nav-pills" id="pills-icontab" role="tablist">
                      <li class="nav-item active"><a class="nav-link btn btn-success" id="pills-person-pill" data-bs-toggle="pill" href="#pills-person" role="tab" aria-controls="pills-person" aria-selected="true" style="padding: .5rem 1rem!important; margin-right:3px!important;"><i class="icofont icofont-users-alt-2" style="margin-right: 0px !important;"></i></a></li>
                      <!--li class="nav-item"><a class="nav-link btn btn-secondary" id="pills-instansi-pill" data-bs-toggle="pill" href="#pills-instansi" role="tab" aria-controls="pills-instansi" aria-selected="true" style="padding: .5rem 1rem!important; margin-right:3px!important;"><i class="icofont icofont-ui-home" style="margin-right: 0px !important;"></i></a></li>
                      <li class="nav-item"><a class="nav-link btn btn-primary" id="pills-kendaraan-tab" data-bs-toggle="pill" href="#pills-kendaraan" role="tab" aria-controls="pills-kendaraan" aria-selected="true" style="padding: .5rem 1rem!important; margin-right:3px!important;"><i class="icofont icofont-car-alt-4" style="margin-right: 0px !important;"></i></a></li-->
                      <li class="nav-item"><a class="nav-link btn btn-warning" onclick="list_petugas()" data-bs-toggle="pill" href="#" role="tab" aria-controls="pills-k" aria-selected="true" style="padding: .5rem 1rem!important; margin-right:3px!important;"><i class="icofont icofont-refresh" style="margin-right: 0px !important;"></i></a></li>
                    </ul>
                    <div class="tab-content" id="pills-icontabContent" style="overflow:hidden;height:90%;">
                      <div class="tab-pane fade show active" id="pills-person" role="tabpanel" aria-labelledby="pills-person-tab">                       
                          <div class="search">
                            <form class="theme-form">
                              <div class="mb-3">
                                <input class="form-control" onkeyup="filter_petugas(this.value)" type="text" placeholder="Search"><i class="fa fa-search"></i>
                              </div>
                            </form>
                          </div>
                          <ul class="list" id="list_petugas" style="height:400px;">
						  <?php 
						  $ico=base_url().'cuba/assets/images/user.jpg';
						  //foreach($p as $r){
						  ?>
                            <!--li class="clearfix"><img class="rounded-circle user-image" src="<?php echo $ico ?>" alt="">
							  <div class="status-circle online"></div>
							  <div class="row">
								  <a href="#" onclick="" class="col-8">
									  <div class="name">Nama</div>
									  <div class="status">10 Km</div>
								  </a>
								  <div class="col-2">
									<a href="#" class="btn btn-success" onclick="" style="padding: .2rem .4rem!important;"><i class="fa fa-plus"></i></a>
								  </div>
							  </div>
						    </li-->
						  <?php //}
						  ?>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="pills-instansi" role="tabpanel" aria-labelledby="pills-instansi-tab">                       
                          <div class="search">
                            <form class="theme-form">
                              <div class="mb-3">
                                <input class="form-control" onkeyup="filter_instansi(this.value)" type="text" placeholder="Search"><i class="fa fa-search"></i>
                              </div>
                            </form>
                          </div>
                          <ul class="list" id="list_instansi" style="height:400px;">
							<li class="clearfix"><img class="rounded-circle user-image" src="<?php echo base_url()?>cuba/assets/images/logo-army2.png" alt="">
							  <div class="status-circle online"></div>
							  <div class="row">
								  <div class="col-8">
									  <div class="name">Instansi</div>
									  <div class="status">12 Km</div>
								  </div>
								  <div class="col-2">
									  <a href="#" class="btn btn-success" style="padding: .2rem .4rem!important;"><i class="fa fa-plus"></i></a>
								  </div>
							  </div>
							</li>
                          </ul>
                      </div>
                      <div class="tab-pane fade" id="pills-kendaraan" role="tabpanel" aria-labelledby="pills-kendaraan-tab">                       
                          <div class="search">
                            <form class="theme-form">
                              <div class="mb-3">
                                <input class="form-control" onkeyup="filter_realtime_car(this.value)" type="text" placeholder="Search"><i class="fa fa-search"></i>
                              </div>
                            </form>
                          </div>
                          <ul class="list" id="list_realtime_car" style="height:400px;">
                          </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                  <!-- Chat left side Ends-->
                </div>
              </div>
            </div>
          </div>
        <div class="col call-chat-body">
            <div class="card">
                <div class="card-body p-0" style="overflow: hidden;">
                    <div class="row chat-box" >
                        <!-- Chat right side start-->
                        <div class="col pe-0 chat-right-aside" style="max-width :100%!important;flex: 0 0 100%!important;">
                            <!-- chat start-->
                            <div class="chat">
                                <!-- chat-header start-->
                                <div class="chat-header clearfix">
                                    <div class="about">
                                        <div class="name" id="judul"><?php echo $d['lokasi']?></div>
                                        <div>
                                            <span class="badge badge-danger" id="kategori"><?php echo $t?></span>
                                            <span id="tstatus"><?php echo $d['status']?></span>
                                        </div>
                                    </div>
                                    <ul class="list-inline float-start float-sm-end chat-menu-icons">
                                        <!-- <li class="list-inline-item"><a href="#"><i class="icon-search"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="icon-clip"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="icon-video-camera"></i></a></li> -->
                                        <li class="list-inline-item me-4"><a href="#" data-bs-toggle="modal" data-bs-target="#updateModal" class="btn btn-warning">Update</a></li>
                                        <li class="list-inline-item me-4"><a href="#" data-bs-toggle="modal" data-bs-target="#detailModal" class="btn btn-danger" onclick="reload_table()">Detail</a></li>
                                    </ul>
                                </div>
                                <!-- chat-header end-->
                                <div class="chat-history chat-msg-box custom-scrollbar p-0" style="overflow-y:hidden;height:548px;">
                                <iframe src="<?php echo (base_url("peta").'?id='.$id.'&t='.$t) ?>"
                                    id="myframe"
                                    frameborder="0" 
                                    marginheight="0" 
                                    marginwidth="0" 
                                    width="100%" 
                                    height="100%" 
                                    scrolling="auto">
								</iframe>
                                </div>
                                <!-- end chat-history-->
                                <!-- <div class="chat-message clearfix">
                                    <div class="row">
                                        <div class="col-xl-12 d-flex">
                                            <div class="smiley-box bg-primary">
                                                <div class="picker"><img src="<?=$template;?>assets/images/smiley.png" alt=""></div>
                                            </div>
                                            <div class="input-group text-box">
                                                <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
                                                <button class="input-group-text btn btn-primary" type="button">SEND</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- end chat-message-->
                                <!-- chat end-->
                                <!-- Chat right side ends-->
                            </div>
                        </div>
                        <div class="col ps-0 chat-menu d-none" style="position: absolute;background: #FFF;right:0;top:13%;" id="list_detail">
                            <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist" style="margin-bottom:0px!important;">
                                <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-selected="true">ASSIGN</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-selected="false">STATUS</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="contact-info-tab" data-bs-toggle="tab" href="#info-contact" role="tab" aria-selected="false">INFO</a>
                                    <div class="material-border"></div>
                                </li>
                            </ul>
                            <div class="tab-content" id="info-tabContent">
                                <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                                    <div class="people-list">
                                        <ul class="list" id="list_assign">
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                                  <div class="timelines pt-4" style="height: 400px;overflow:auto;">
                                        <div class="activity-timeline" id="status_timeline">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="info-contact" role="tabpanel" aria-labelledby="contact-info-tab">
                                    <div class="user-profile">
                                        <div class="image">
                                            <!-- <div class="avatar text-center"><img alt="" src="<?=$template;?>assets/images/user/2.png"></div>
                                            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div> -->
                                        </div>
                                        <div class="text-center mt-2">
                                            <h6 id="tanggal_pengaduan" style="font-size: 14px; color:#999;">-</h6>
                                        </div>
                                        <div class="user-content text-center">
                                            <h5 class="text-uppercase"><span class="badge badge-secondary" id="kategori_pengaduan">-</span></h5>
                                            <h6 class="text-uppercase text-muted" id="nama_pelapor" style="color:#999 !important;">-</h6>
                                            <hr>
                                            <div class="text-center" style="height: 10hv;height: 300px;overflow: auto;">
                                                <p id="keterangan_pengaduan" class="mb-4" style="font-size:14px;color:#999;">-</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="form_update">
        <input type="hidden" name="pengaduan_id" id="" value="<?=$this->input->get('id');?>">
            <div class="mb-3">
                <!-- Untuk update tiket -->
                <label for="Status" class="form-label">Status</label>
                <!-- <select name="status" class="form-control" id="ustatus" required> -->
                <select name="status" class="form-control" id="status" required>
                    <option value="">--Pilih Status--</option>
                    <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                    <option value="Sudah Dikonfirmasi">Sudah Dikonfirmasi</option>
                    <option value="Ditangani">Ditangani</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Batal">Batal</option>
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <textarea name="ket" id="" cols="30" rows="5" class="form-control"></textarea>
            </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="apdetkeun();" class="btn btn-primary">Update</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal Detail-->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailLabel">Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
			<table id="tabelku" class="table table-striped table-bordered w-100">
				<thead>
					<tr>
						<th>Petugas</th>
						<th>Status</th>
						<th>Ditugaskan Oleh</th>
						<th>Pada</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
      </div>
    </div>
  </div>
</div>

<!--div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div-->

<script>
var base_url = '<?= base_url() ?>';
var lat=<?php echo $d['lat']?>;
var lng=<?php echo $d['lng']?>;
var t='<?php echo $t?>';
var rowid='<?php echo $d['rowid']?>';

function list_petugas(){
	$.ajax({
			type: 'POST',
			url: base_url+'laporan/petugas',
			data: {t:t,lat:lat,lon:lng},
			success: function(data){
				//log(data);
				var d=JSON.parse(data);
				var ss='';
				for(var ri=0;ri<d.length;ri++){
					var r=d[ri];
					log(r);
					ss+='<li class="clearfix"><img class="rounded-circle user-image" src="<?php echo $ico ?>" alt="">'+
							  '<div class="status-circle online"></div>'+
							  '<div class="row">'+
								  '<a href="#" onclick="" class="col-8">'+
									  '<div class="name">'+r['nama']+'</div>'+
									  '<div class="status">'+r['jarak']+' Km</div>'+
								  '</a>'+
								  '<div class="col-2">'+
									'<a title="Tugaskan" href="#" class="btn btn-success" onclick="tugaskeun(\''+r['nrp']+'\');" style="padding: .2rem .4rem!important;"><i class="fa fa-plus"></i></a>'+
								  '</div>'+
							  '</div>'+
						    '</li>';
				}
				if(ss=='')ss='<li>Petugas tidak ditemukan</li>';
				//log(ss);
				$("#list_petugas").html(ss);
			},
			error: function(xhr){
				alrt('Please check your connection','error','Error');
			}
		});
}
function tugaskeun(nrp){
	$("#status").val("Menunggu Konfirmasi");
	var data={t:t,nrp:nrp,id:rowid};
	var url=base_url+'laporan/tugaskeun';
	kirimkeun(url,data);
}
function apdetkeun(){
	var data={t:t,stt:$("#status").val(),id:rowid};
	var url=base_url+'laporan/apdetkeun';
	kirimkeun(url,data);
}
function kirimkeun(url,data){
	$.ajax({
		type: 'POST',
		url: url,
		data: data,
		success: function(data){
			//log(data);
			var d=JSON.parse(data);
			alrt(d['msg'],d['typ']);
			list_petugas();
			$("#tstatus").html($("#status").val());
		},
		error: function(xhr){
			alrt('Please check your connection','error','Error');
		}
	});
}
var mytbl;
function load_table(){
	mytbl = $("#tabelku").DataTable({
		serverSide: true,
		processing: true,
		searching: false,
		ordering:false,
		//buttons: ['copy', {extend : 'excelHtml5', messageTop: $(".judul").text()}],
		ajax: {
			type: 'POST',
			url: '<?php echo base_url()?>rekap/datatable',
			data: function (d) {
				d.cols= '<?php echo base64_encode("petugas,status,oleh,dtm,'' as btnset,rowid"); ?>',
				d.tname= '<?php echo base64_encode("penugasan"); ?>',
				d.orders= '<?php echo base64_encode("rowid desc"); ?>',
				d.isjob= true,
				d.trid= rowid,
				d.t=t;
			}
		},
		initComplete: function(){
			//dttbl_buttons(); //for ajax call
		}
	});
//	datepicker();
}
function reload_table(){
	mytbl.ajax.reload();
}

function thispage_ready(){
	list_petugas();
	$("#status").val("<?php echo $d["status"]?>");
	load_table();
}
</script>
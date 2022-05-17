<input type="hidden" value="Zoom_in" id="zoomInOut">
  <input type="hidden" value="" id="objectZoom">
  <input type="hidden" value="" id="objectZoomSecond">
  <!-- Modal -->
  <div class="modal fade" id="modal_progress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
            Calling ...
        </div>
      </div>
    </div>
  </div>
    
    <div class="container demo">
        
        <!-- Modal -->
        <div class="modal modal-left left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="head" style="border-bottom: 1px #DDD solid;padding: 15px 15px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close" style="text-align:left;"><span aria-hidden="true" id="myModalLabel">KEMBALI</span></button> 
                                </div>
                                <div class="col-md-4">
                                    <button  class="btn btn-sm btn-outline-warning" ><span aria-hidden="true" id="myModalLabel">PENDING</span></button> 
                                </div>
                            </div>
                        </div>
                        <div class="tab_" style="padding: 0px 15px;margin-top: 5px;">
                            <div id="exTab2">	
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#1" data-toggle="tab" aria-expanded="true">Detail</a>
                                    </li>
                                    <li class=""><a href="#2" data-toggle="tab" aria-expanded="false">Bantuan</a>
                                    </li>
                                    <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">Riwayat</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="1">
                                        <div class="body" style="padding: 5px;margin-top: 15px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="txt-nama">Sahrul Rizal</div>
                                                            <div class="txt-label c-abu">Pelapor</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="txt-date text-right">
                                                        <div class="txt-tgl">03 Maret 2021</div>
                                                        <div class="txt-jam c-abu">10:10:00</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="list-gambar mt-4">
                                                        <div class="row">
                                                            <div class="col-md-12"><img src="https://malangvoice.com/wp-content/uploads/2016/01/Lokasi-kejadian-kecelakaan2.jpg" alt=""></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-5">
                                                    <p><b>Pesan</b></p>
                                                    <div>
                                                        Telah terjadi kecalakaan di jalan juanda hj.nangka pada pukul 09:50 WIB tadi, korban mengalami luka sedang dan ada korban yang tidak sadarkan diri, mohon bantuannya segera untuk mengamankan lokasi kejadiaan dan mengevakuasi korban, terima kasih. 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="2">
                                        <div class="tab_1 mt-3">
                                            <div id="exTab2">	
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#polisi" data-toggle="tab" aria-expanded="true">Pos Polisi</a></li>
                                                    <li class=""><a href="#ambulan" data-toggle="tab" aria-expanded="false">Rumah Sakit</a></li>
                                                    <li class=""><a href="#dishub" data-toggle="tab" aria-expanded="false">Dishub</a></li>
                                                </ul>
                                                <div class="tab-content ">
                                                    <div class="tab-pane active" id="polisi">
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Patwal</div>
                                                                                <div style="font-size: 10px;">71021</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Korlantas</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 13:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">1450 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">On Going</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm" onclick="jalankan('polisi')">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Patwal</div>
                                                                                <div style="font-size: 10px;">81021</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Korlantas</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 12:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">1692 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="tab-pane" id="ambulan">
                                                        
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Ambulan</div>
                                                                                <div style="font-size: 10px;">B 761 HAS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Rs Slamet Riyadi</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 12:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">892 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">On Going</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm" onclick="jalankan('ambulan')">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Ambulan</div>
                                                                                <div style="font-size: 10px;">B 511 JIS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>RS Kasih Ibu</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 14:80:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">998 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="dishub">
                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Kendaraan</div>
                                                                                <div style="font-size: 10px;">B 261 HAS</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Dishub Surakarta</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 17:00:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">3892 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div>Kendaraan</div>
                                                                                <div style="font-size: 10px;">71121</div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div>Dishub Surakarta</div>
                                                                                <div style="font-size: 10px;">20 Maret 2021, 14:50:11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="info-jarak">4992 meter dari lokasi kejadian</div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="row mt-4">
                                                                            <div class="col-md-6">
                                                                                <button class="btn btn-sm">-</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Lokasi</button>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button class="btn btn-sm">Call</button>
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
                                    <div class="tab-pane" id="3">
                                        <div class="list-rwy mt-4">
                                            <div class="list mb-2 pb-2" style="border-bottom: solid 1px #DDD;">
                                                <div><b>Ambulan (B 761 HAS)</b></div>
                                                <div style="font-size:11px;color:#999;">20 Maret 2021, 14:15:11</div>
                                                <div class="txt-status">Menuju lokasi kejadian</div>
                                            </div>
                                            <div class="list mb-2 pb-2" style="border-bottom: solid 1px #DDD;">
                                                <div><b>Patwal (71021)</b></div>
                                                <div style="font-size:11px;color:#999;">20 Maret 2021, 13:45:11</div>
                                                <div class="txt-status">Menuju lokasi kejadian</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        
    </div>

    <div class="btn-slider" style="display: none;">
      <span style="font-size: 15px;">Index <i class="fa fa-angle-double-right"></i></span>
    </div>
    <div class="sidebar">
      <div class="mx-5 my-5">
        <h4>Index</h4>
        <div class="border-bottom pb-3">
          <ul class="nav nav-pills mb-3 side" id="pills-tab" role="tablist">
            <li class="nav-item mb-2" role="presentation">
              <a class="nav-link" id="trend-data-tab" onclick="iframe('./statistik/trend_data?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#trend-data" role="tab" aria-controls="trend-data" aria-selected="false">Trend Data</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="case-fatality-rate-tab" onclick="iframe('./statistik/case_fatality_rate?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#case-fatality-rate" role="tab" aria-controls="case-fatality-rate" aria-selected="false">Case Fatality Rate</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="fatality-index-tab" onclick="iframe('./statistik/fatality_index?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#fatality-index" role="tab" aria-controls="fatality-index" aria-selected="false">Fatality Index</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-kinerja-tab"  onclick="iframe('./statistik/index_kinerja?kode=4e82f33ca4254486e3e19d8755881ee6')"  data-toggle="pill" href="#index-kinerja" role="tab" aria-controls="index-kinerja" aria-selected="false">Index Kinerja</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-ketertiban-tab" onclick="iframe('./statistik/ketertiban?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#index-ketertiban" role="tab" aria-controls="index-ketertiban" aria-selected="false">Index Ketertiban</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-kecelakaan-tab" onclick="iframe('./statistik/kecelakaan?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#index-kecelakaan" role="tab" aria-controls="index-kecelakaan" aria-selected="false">Index Kecelakaan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-keamanan-tab" onclick="iframe('./statistik/keamanan?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#index-keamanan" role="tab" aria-controls="index-keamanan" aria-selected="false">Index Keamanan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="index-keselamatan-tab" onclick="iframe('./statistik/keselamatan?kode=4e82f33ca4254486e3e19d8755881ee6')" data-toggle="pill" href="#index-keselamatan" role="tab" aria-controls="index-keselamatan" aria-selected="false">Index Keselamatan</a>
            </li>
          </ul>
        </div>
        <div class="tab-content mt-4" id="pills-tabContent">
          <div class="konten-sider">
            <iframe  id="cek_iframe" width="100%" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="jml_data_group" id="jml_data_group">
      
    </div>
    <div class="modal fade" id="vipModal" tabindex="-1" aria-labelledby="vipModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="vipModalLabel">VIP</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Obyek Pengawalan</th>
                  <th>Nama Pejabat</th>
                  <th>Dari</th>
                  <th>Ke</th>
                  <th>Perwira Wasdal</th>
                  <th>Anggota 1</th>
                  <th>Anggota 2</th>
                  <th>Anggota 3</th>
                </tr>
              </thead>
              <tbody id="tbl_detail_vip"></tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="filter_data" id="menu-filter" onclick="fltr()" style="display: none">
      <span>Filter&nbsp;&nbsp;<i class="fa fa-search"></i></span>
    </div>
    <div class="heat_data" id="menu-trfflow" onclick="trfflow()" style="display: none">
      <span>Arus Lalin &nbsp;&nbsp;&nbsp;</span>
      <div id="trff"></div>
    </div>
    <div class="heat_kecelakaan" id="menu-trfkcl" onclick="trfkcl()" style="display: none">
      <span>Area Rawan Kecelakaan &nbsp;&nbsp;&nbsp;</span>
      <div id="trfk"></div>
    </div>
    <div class="content-filter d-none">
      <!-- <div class="row"> -->
        <!-- <div class="col-6"> -->
          <div class="card">
            <div class="card-header">
              <span>Filter Date Range</span>
            </div>
            <div class="card-body">
              <form action="javascript:void(0);" method="post" id="filter_data">
                <div class="row">
                  <div class="col-md-6" style="width:200px">
                    <div class="form-group">
                      <label for="f_date_from" class="">Start Date</label>
                      <input type="date" class="form-control" id="f_date_from">
                    </div>
                  </div>
                  <div class="col-md-6" style="width:200px">
                    <div class="form-group">
                      <label for="f_date_from" class="">To Date</label>
                      <input type="date" class="form-control" id="f_date_to">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <!-- </div> -->
        <!-- <div class="col-6"> -->
          <!-- <div class="card">
            <div class="card-header">
              <span>Cari Kendaraan</span>
            </div>
            <div class="card-body">
              <form action="javascript:void(0);" method="post" id="filter_data_kendaraan">
                    <div class="form-group">
                      <label for="" class="">Nopol</label>
                      <input type="input" class="form-control" name="nopol" id="nopol">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
              </form>
            </div>
          </div> -->
          <!-- <div class="card">
            <div class="card-header">
              <span>Cari Petugas</span>
            </div>
            <div class="card-body">
              <form action="javascript:void(0);" method="post" id="filter_data_petugas">
                    <div class="form-group">
                      <label for="" class="">Nama Petugas</label>
                      <input type="input" class="form-control" name="petugas" id="petugas">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
              </form>
            </div>
          </div> -->
        <!-- </div> -->
      <!-- </div> -->
    </div>
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" id="form_filter_data">
              <div class="form-group">
                <label for="tgl">Tanggal Mulai</label>
                <input type="date" class="form-control" id="f_date_from">
              </div>
              <div class="form-group">
                <label for="tgl">Tanggal Sampai</label>
                <input type="date" class="form-control" id="f_date_to">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Filter</button>
          </div>
        </div>
      </div>
    </div> -->
    <div id="mapid"></div>
    <div class="floating-panel" id="menu-panel"  style="display: none">
      <div class="row">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons text-white mx-1" id="pills-car-tab" data-toggle="pill" onclick="get_allIndicar()" href="#pills-car" role="tab" aria-controls="pills-car" aria-selected="false"><img src="<?=base_url()?>my/satupeta/car1.png" alt="" style="width:60px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons mx-1" id="pills-maps-tab" data-toggle="pill" href="#pills-maps" role="tab" aria-controls="pills-maps" aria-selected="false"><img src="<?=base_url()?>my/satupeta/location1.png" alt="" style="width:60px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons text-white mx-1" id="pills-cctv-tab" data-toggle="pill" href="#pills-cctv" role="tab" aria-controls="pills-cctv" aria-selected="false"><img src="<?=base_url()?>my/satupeta/cctv1.png" alt="" style="width:60px;"></a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link active icons text-white mx-1" id="pills-more-tab" data-toggle="pill" href="#pills-more" role="tab" aria-controls="pills-more" aria-selected="false"><img src="<?=base_url()?>my/satupeta/more.png" alt="" style="width:60px;"></a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane panel2 fade" id="pills-maps" role="tabpanel" aria-labelledby="pills-maps-tab">
            <div class="row">
            <div class="col-md-4 col-sm-4 pr-1" style="height:320px;overflow-y:auto;">
                <?php foreach ($lokasi as $v) { ?>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-maps-police-tab" onclick="lokasi('<?=$v->kategori_static?>')" data-toggle="pill" href="#v-maps-police" role="tab" aria-controls="v-maps-police" aria-selected="false">
                      <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/polri.png" alt="image" style="background-color:white!important;"> -->
                      <div class="wrapper ml-3">
                        <p class="mb-0"><?=$v->kategori_static;?></p>
                      </div>
                  </a>
                  <?php } ?>
              </div>
              <div class="col-md-8 col-sm-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-maps-police" role="tabpanel" aria-labelledby="v-maps-police-tab">
                  <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps" onchange="check_lokasi('polisi')"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_lokasi_all" style="height:320px;overflow-y:auto;">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-maps-damkar" role="tabpanel" aria-labelledby="v-maps-damkar-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps_damkar" onchange="check_lokasi('damkar')"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_lokasi_damkar">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-maps-dishub" role="tabpanel" aria-labelledby="v-maps-dishub-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps_dishub" onchange="check_lokasi('dishub')"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_lokasi_dishub">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-maps-rumah_sakit" role="tabpanel" aria-labelledby="v-maps-rumah_sakit-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_maps_rumah_sakit" onchange="check_lokasi('rumah_sakit')"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                      <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_lokasi_rumah_sakit">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-cctv" role="tabpanel" aria-labelledby="pills-cctv-tab">
            <div class="row">
              <div class="col-md-4 col-sm-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-cctv-korlantas-tab" onclick="cctv('korlantas')" data-toggle="pill" href="#v-cctv-korlantas" role="tab" aria-controls="v-cctv-korlantas" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/korlantas.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Korlantas</p>
                      </div>
                  </a>
                  <a class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-cctv-dishub-tab" onclick="cctv('dishub')" data-toggle="pill" href="#v-cctv-dishub" role="tab" aria-controls="v-cctv-dishub" aria-selected="false">
                      <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/dishubb.png" alt="image" style="background-color:white!important;">
                      <div class="wrapper ml-3">
                        <p class="mb-0">
                        Dishub</p>
                      </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-cctv-korlantas" role="tabpanel" aria-labelledby="v-cctv-korlantas-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_cctv_korlantas" onchange="check_cctv('korlantas')"><span class="ml-3">All</span>
                      </div>
                      <!-- <form action="javascript:void(0);" id="search-cctv"> -->
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Cari CCTV" id="search-cctv-korlantas" onkeyup="search_cctv('korlantas')">
                        </div>
                        <!-- <span class="col-auto">
                          <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                        </span> -->
                      <!-- </form> -->
                    </div>
                    <div class="mt-2 text-left pt-2 border-top list_cctv" id="list_cctv_korlantas">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-cctv-dishub" role="tabpanel" aria-labelledby="v-cctv-dishub-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox" name="" id="select_all_cctv_dishub" onchange="check_cctv('dishub')"><span class="ml-3">All</span>
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Cari CCTV" id="search-cctv-dishub" onkeyup="search_cctv('dishub')">
                      </div>
                      <!-- <span class="col-auto">
                        <button class="btn btn-secondary" type="button"><i class="fe fe-search"></i></button>
                      </span> -->
                    </div>
                    <div class="mt-2 text-left pt-2 border-top list_cctv" id="list_cctv_dishub">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane panel2 fade" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab">
          <div class="card">
            <div class="card-header">
              <span>Cari Kendaraan</span>
            </div>
            <div class="card-body text-left">
              <form action="javascript:void(0);" method="post" id="filter_data_kendaraan">
                    <div class="form-group">
                      <label for="" class="">Nama Kendaraan</label>
                      <style>
                        .select2-container--default .select2-selection--single {
                              height: 3.375rem!important;
                          }
                      </style>
                      <select name="" id="list_kendaraan" class="form-control">
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
              </form>
            </div>
          </div>
            <div class="card">
              <div class="card-header"><h5>Icon Kendaraan</h5></div>
              <div class="card-body text-left">
                <div class="row">
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-polisi.png')?>" alt=""> Polisi</div>
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-damkar.png')?>" alt=""> Damkar</div>
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-dishub.png')?>" alt=""> Dishub</div>
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-satpolpp.png')?>" alt=""> Satpol PP</div>
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-ambulan.png')?>" alt=""> Dinkes</div>
                  <div class="col-4 mb-5"><img src="<?= base_url('my/satupeta/car-bpbd.png')?>" alt=""> BPBD</div>
                </div>
              </div>
            </div>
            <!-- <div class="row"> -->
              <!-- <div class="col-md-12 col-sm-12 pr-1 text-left">
                <ul>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-polisi.png')?>" alt=""> Polisi</li>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-damkar.png')?>" alt=""> Damkar</li>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-dishub.png')?>" alt=""> Dishub</li>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-satpolpp.png')?>" alt=""> Satpol PP</li>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-ambulan.png')?>" alt=""> Dinkes</li>
                  <li class="mb-4"><img src="<?= base_url('my/satupeta/car-bpbd.png')?>" alt=""> BPBD</li>
                </ul>
              </div> -->
        </div>
        <div class="tab-pane fade" id="pills-more" role="tabpanel" aria-labelledby="pills-more-tab">
          <div id="vip" class="panel2 d-none" style="right:60px; z-index=10;">
            <div class="row">
              <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-vip-tab" onclick="vip()" data-toggle="pill" href="#v-vip" role="tab" aria-controls="v-vip" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/vvip.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Ren VIP</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-vip" role="tabpanel" aria-labelledby="v-vip-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <button id="hapusVip" class="btn btn-primary">Clear</button>
                      </div>
                      <!-- <div class="col">
                        <input type="date" class="form-control" placeholder="">
                      </div> -->
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_vip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rawan" class="panel2 d-none" style="right:60px; z-index=10;">
            <div class="row">
              <div class="col-md-4 col-sm-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-laka-tab" onclick="rawan('Rawan Laka')" data-toggle="pill" href="#v-laka" role="tab" aria-controls="v-laka" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-laka.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Laka</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-macet-tab" onclick="rawan('Rawan Macet')" data-toggle="pill" href="#v-macet" role="tab" aria-controls="v-macet" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-macet.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Macet</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-longsor-tab" onclick="rawan('Rawan Longsor')" data-toggle="pill" href="#v-longsor" role="tab" aria-controls="v-longsor" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-longsor.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Longsor</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-banjir-tab" onclick="rawan('Rawan Banjir')" data-toggle="pill" href="#v-banjir" role="tab" aria-controls="v-banjir" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-banjir.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Banjir</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-pohon-tumbang-tab" onclick="rawan('Rawan Pohon Tumbang')" data-toggle="pill" href="#v-pohon-tumbang" role="tab" aria-controls="v-pohon-tumbang" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-pohontumbang.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Pohon Tumbang</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-tindak-pidana-tab" onclick="rawan('Rawan Tindak Pidana')" data-toggle="pill" href="#v-tindak-pidana" role="tab" aria-controls="v-tindak-pidana" aria-selected="false">
                    <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-tindakpidana.png" alt="image" style="background-color:white!important;">
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Tindak Pidana</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-laka" role="tabpanel" aria-labelledby="v-laka-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_laka" onchange="check_rawan('laka','./my/satupeta/rawan-laka.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_laka">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-macet" role="tabpanel" aria-labelledby="v-macet-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_macet" onchange="check_rawan('macet','./my/satupeta/rawan-macet.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_macet">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-longsor" role="tabpanel" aria-labelledby="v-longsor-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_longsor" onchange="check_rawan('longsor','./my/satupeta/rawan-longsor.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_longsor">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-banjir" role="tabpanel" aria-labelledby="v-banjir-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_banjir" onchange="check_rawan('banjir','./my/satupeta/rawan-banjir.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_banjir">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pohon-tumbang" role="tabpanel" aria-labelledby="v-pohon-tumbang-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_pohon_tumbang" onchange="check_rawan('pohon_tumbang','./my/satupeta/rawan-pohontumbang.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_pohon_tumbang">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-tindak-pidana" role="tabpanel" aria-labelledby="v-tindak-pidana-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col-3">
                        <input type="checkbox"  id="select_all_rawan_tindak_pidana" onchange="check_rawan('tindak_pidana','./my/satupeta/rawan-tindakpidana.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_tindak_pidana">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="rengiat" class="panel2 d-none" style="right:60px; z-index=10;">
            <div class="row">
              <div class="col-md-4 col-sm-4 pr-1">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-prs-tab" onclick="rengiat('PAM Road Savety')" data-toggle="pill" href="#v-prs" role="tab" aria-controls="v-prs" aria-selected="false">
                    <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-laka.png" alt="image" style="background-color:white!important;"> -->
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      PAM Road Safety</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-rsc-tab" onclick="rengiat('Road Savety Campaign')" data-toggle="pill" href="#v-rsc" role="tab" aria-controls="v-rsc" aria-selected="false">
                    <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-longsor.png" alt="image" style="background-color:white!important;"> -->
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Road Safety Campaign</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-sosialisasi-tab" onclick="rengiat('Sosialisasi')" data-toggle="pill" href="#v-sosialisasi" role="tab" aria-controls="v-sosialisasi" aria-selected="false">
                    <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-banjir.png" alt="image" style="background-color:white!important;"> -->
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Sosialisasi</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-publikasi-tab" onclick="rengiat('Publikasi')" data-toggle="pill" href="#v-publikasi" role="tab" aria-controls="v-publikasi" aria-selected="false">
                    <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-pohontumbang.png" alt="image" style="background-color:white!important;"> -->
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Publikasi</p>
                    </div>
                  </a>
                  <a  class="nav-link list d-flex align-items-center border-bottom border-right py-3" id="v-rss-tab" onclick="rengiat('Survey')" data-toggle="pill" href="#v-rss" role="tab" aria-controls="v-rss" aria-selected="false">
                    <!-- <img class="avatar avatar-md brround" src="<?= base_url();?>my/satupeta/rawan-tindakpidana.png" alt="image" style="background-color:white!important;"> -->
                    <div class="wrapper ml-3">
                      <p class="mb-0">
                      Road Safety Survay</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8 pl-0">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade" id="v-prs" role="tabpanel" aria-labelledby="v-prs-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col">
                        <input type="checkbox"  id="select_all_rengiat_laka" onchange="check_rengiat('laka','./my/satupeta/rawan-laka.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_prs">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-rsc" role="tabpanel" aria-labelledby="v-rsc-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col">
                        <input type="checkbox"  id="select_all_rawan_rsc" onchange="check_rengiat('rsc','./my/satupeta/rawan-longsor.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_rsc">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-sosialisasi" role="tabpanel" aria-labelledby="v-sosialisasi-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col">
                        <input type="checkbox"  id="select_all_rawan_sosialisasi" onchange="check_rengiat('sosialisasi','./my/satupeta/rawan-banjir.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_sosialisasi">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-publikasi" role="tabpanel" aria-labelledby="v-publikasi-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col">
                        <input type="checkbox"  id="select_all_rawan_publikasi" onchange="check_rengiat('publikasi','./my/satupeta/rawan-pohontumbang.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_publikasi">
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-rss" role="tabpanel" aria-labelledby="v-rss-tab">
                    <div class="ml-2 row mx-0" style="text-align:left!important;">
                      <div class="col">
                        <input type="checkbox"  id="select_all_rawan_tindak_pidana" onchange="check_rengiat('rss','./my/satupeta/rawan-tindakpidana.png')"><span class="ml-3">All</span>
                      </div>
                    </div>
                    <div class="mt-2 text-left pt-2 border-top" id="list_rss">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel3">
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>VVIP</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('vvip')"><img src="<?=base_url()?>my/satupeta/vvip.png" alt=""></a>
              <div id="cvvip"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Blackspot</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('black_spot')"><img src="<?=base_url()?>my/satupeta/blackspot.png" alt=""></a>
              <div id="cbs"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Trouble Spot</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('trouble_spot')"><img src="<?=base_url()?>my/satupeta/troublespot.png" alt=""></a>
              <div id="cts"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Rawan</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('rawan')"><img src="<?=base_url()?>my/satupeta/ambanggangguan1.png" alt=""></a>
              <div id="cr"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Ambang Gangguan</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('ambang_gangguan')"><img src="<?=base_url()?>my/satupeta/ambanggangguan.png" alt=""></a>
              <div id="cag"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Traffic Counting</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('cctv','traffic_counting')"><img src="<?=base_url()?>my/satupeta/trafficcounting.png" alt=""></a>
              <div id="ctco"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Traffic Category</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('cctv','traffic_category')"><img src="<?=base_url()?>my/satupeta/trafficcategory.png" alt=""></a>
              <div id="ctca"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Average Speed</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('cctv','average_speed')"><img src="<?=base_url()?>my/satupeta/avgspeed.png" alt=""></a>
              <div id="cas"></div>
            </div>
            <!-- <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Length Ocupantion</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('cctv','length_ocupantion')"><img src="<?=base_url()?>my/satupeta/lengthocc.png" alt=""></a>
              <div id="clo"></div>
            </div> -->
            <!-- <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Face Recognation</span></a>
              <a class="button_bLeft slidebttn"><img src="<?=base_url()?>my/satupeta/facerecog.png" alt=""></a>
              <div id="cfr"></div>
            </div> -->
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Ren Giat</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('rengiat')"><img src="<?=base_url()?>my/satupeta/giatmasyarakat1.png" alt=""></a>
              <div id="rg"></div>
            </div>
            <div class="button_wrap mb-3">
              <a class="button_aLeft"><span>Giat Masyarakat</span></a>
              <a class="button_bLeft slidebttn" onclick="show_titik('giat_masyarakat')"><img src="<?=base_url()?>my/satupeta/giatmasyarakat.png" alt=""></a>
              <div id="cgm"></div>
            </div>
          </div>
        </div>
    </div>
    <!-- <audio id="audio" src="<?= base_url('my/audio/audio.mp3')?>" autostart="true" ></audio> -->
    <audio id="myAudio">
  <source src="<?= base_url('my/audio/audio.mp3')?>" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<?php
$page_title = isset($title)?$title:"";
$base_url = base_url();
//$avatar=$session['unit']!=''?$session['unit'].'.png':'sm.png';
//$avatar=$base_url.'my/images/'.$avatar;
$avatar=$base_url.'my/images/sm.png';
$farr=glob('./uploads/avatars/'.$session['nrp'].'.*');
if(count($farr)>0&&$session['nrp']!=''){
	$avatar=$farr[0];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo $base_url;?>cuba/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $base_url;?>cuba/assets/images/favicon.png" type="image/x-icon">
    <title>Smart Management</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/scrollbar.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo $base_url;?>cuba/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>cuba/assets/css/responsive.css">
	
	<!-- Select2 css -->
		<link href="<?php echo $base_url;?>my/vendor/select2/select2.min.css" rel="stylesheet" />
	<!-- datatables CSS-->
		<!--link rel="stylesheet" href="my/vendor/datatables/datatables.min.css"-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/datatables-buttons/css/buttons.bootstrap4.min.css">
		
		<!-- bootstrap CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/bootstrap/css/yearpicker.css">
		
		<!-- fancybox CSS-->
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/leaflet/leaflet.css" />
		<link rel="stylesheet" href="<?php echo $base_url;?>my/vendor/leaflet/leaflet.awesome-markers.css" />
		
	
	<style type="text/css">
		.hidden{
			display: none;
		}
	</style>
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Cuba .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span></div><i class="close-search"
                                    data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="#"><img class="img-fluid"
                                src="<?php echo $base_url;?>cuba/assets/images/logo/logo.png" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i></div>
                </div>
                <div class="left-header col horizontal-wrapper ps-0">
                    <ul class="horizontal-menu">
                        <!-- <li class="level-menu outside"><a class="nav-link" href="#!"><i
                                    data-feather="inbox"></i><span>Level Menu</span></a>
                            <ul class="header-level-menu menu-to-be-close">
                                <li><a href="file-manager.html" data-original-title="" title=""> <i
                                            data-feather="git-pull-request"></i><span>File manager </span></a></li>
                                <li><a href="#!" data-original-title="" title=""> <i
                                            data-feather="users"></i><span>Users</span></a>
                                    <ul class="header-level-sub-menu">
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user"></i><span>User Profile</span></a></li>
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user-minus"></i><span>User Edit</span></a></li>
                                        <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                    data-feather="user-check"></i><span>Users Cards</span></a></li>
                                    </ul>
                                </li>
                                <li><a href="kanban.html" data-original-title="" title=""> <i
                                            data-feather="airplay"></i><span>Kanban Board</span></a></li>
                                <li><a href="bookmark.html" data-original-title="" title=""> <i
                                            data-feather="heart"></i><span>Bookmark</span></a></li>
                                <li><a href="social-app.html" data-original-title="" title=""> <i
                                            data-feather="zap"></i><span>Social App </span></a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">

                        <li> <span class="header-search"><i data-feather="search"></i></span></li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a>
                        </li>
                        <li class="profile-nav onhover-dropdown p-0 me-0">
                            <div class="media profile-media"><img class="b-r-10"
                                    src="<?php echo $avatar?>" alt="" style="width:37px;height:37px;">
                                <div class="media-body"><span><?php echo isset($session)?$session['nrp']:""?></span>
                                    <p class="mb-0 font-roboto"><?php echo isset($session)?$session['unit']:""?> <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="<?php echo $base_url?>profile"><i data-feather="user"></i><span>Account </span></a></li>
                                <li><a href="<?php echo $base_url?>login/out"><i data-feather="log-out"> </i><span>Log out</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
                <script class="empty-template"
                    type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                                src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                                src="../assets/images/logo/logo_dark.png" alt=""></a>
                        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                            </i></div>
                    </div>
                    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                src="../assets/images/logo/logo-icon.png" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="<?php echo $base_url;?>home"><img class="img-fluid"
                                            src="<?php echo $base_url;?>cuba/assets/images/logo/logo-icon.png" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Formulir</h6>
                                        <p><?php echo isset($session)?$session['unit']:""?></p>
                                    </div>
                                </li>
								<?php
								if(isset($formulir)){
									for($i=0;$i<count($formulir);$i++){
								?>
								<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="#" onclick="ambil_isi('<?php echo $formulir[$i]['v']?>');">
                                        <i data-feather="file-text"></i>
                                        <span><?php echo $formulir[$i]['t']?></span>
                                    </a>
                                </li>
								<?php 
									}
								}?>
<div class="hidden">                                
								<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="form-cctv-analytic.html">
                                        <i data-feather="video"></i>
                                        <span>CCTV & Analytic</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="form-data-collecting.html">
                                        <i data-feather="file-text"></i>
                                        <span>Data Collecting</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="form-lapsit.html">
                                        <i data-feather="layers"></i>
                                        <span>Lapsit</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="form-rengiat.html">
                                        <i data-feather="calendar"></i>
                                        <span>RenGiat</span>
                                    </a>
                                </li>
</div>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6>Rekap</h6>
                                        <p><?php echo isset($session)?$session['unit']:""?></p>
                                    </div>
                                </li>
								<?php
								if(isset($rekap)){
									for($i=0;$i<count($rekap);$i++){
								?>
								<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="#" onclick="ambil_isi('<?php echo $rekap[$i]['v']?>','rekap');">
                                        <i data-feather="file-text"></i>
                                        <span><?php echo $rekap[$i]['t']?></span>
                                    </a>
                                </li>
								<?php 
									}
								}?>
<div class="hidden">
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="rekap-lapsit.html">
                                        <i data-feather="layers"></i>
                                        <span>Lapsit</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="rekap-interaksi.html">
                                        <i data-feather="users"></i>
                                        <span>Interaksi</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="rekap-publikasi.html">
                                        <i data-feather="globe"></i>
                                        <span>Publikasi</span>
                                    </a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="rekap-koordinasi.html">
                                        <i data-feather="map-pin"></i>
                                        <span>Koordinasi</span>
                                    </a>
                                </li>
</div>
                            </ul>
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-xl-12">
							<?php
							if(isset($formulir)&&isset($rekap)){
							?>
<form name="myf" id="myf">
<!--hidden-->
<input type="hidden" name="rowid" id="rowid" value="0" />
<input type="hidden" name="nrp" value="<?php echo $session['nrp']?>">
<input type="hidden" name="polda" value="<?php echo $session['polda']?>">
<input type="hidden" name="polres" value="<?php echo $session['polres']?>">
<input type="hidden" name="dinas" value="<?php echo $session['dinas']?>">
<input type="hidden" name="subdinas" value="<?php echo $session['subdinas']?>">
<input type="hidden" name="unit" value="<?php echo $session['unit']?>">
<input type="hidden" name="tgl" value="<?php echo date('Y-m-d')?>">

				<div id="isilaporan">
													<?php echo $contents;?>
				</div>
</form>
							<?php }else{?>
								<div class="col-sm-12">
								<?php echo $contents;?>
								</div>
							<?php }?>

                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap </p>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
    <script>
        localStorage.setItem('page-wrapper', 'compact-wrapper dark-sidebar');
    </script>
    <!-- latest jquery-->
    <script src="<?php echo $base_url;?>cuba/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo $base_url;?>cuba/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo $base_url;?>cuba/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo $base_url;?>cuba/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="<?php echo $base_url;?>cuba/assets/js/scrollbar/simplebar.js"></script>
    <script src="<?php echo $base_url;?>cuba/assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo $base_url;?>cuba/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo $base_url;?>cuba/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo $base_url;?>cuba/assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo $base_url;?>cuba/assets/js/script.js"></script>
    <!-- <script src="<?php echo $base_url;?>cuba/assets/js/theme-customizer/customizer.js"></script> -->
    <!-- login js-->
    <!-- Plugin used-->
	
	
<!-- FIREBASE -->
		<script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>

		<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
		<script src="<?= base_url('my/js_local/local.js');?>"></script>

	<!--Select2 js -->
	<script src="<?php echo $base_url;?>my/vendor/select2/select2.full.min.js"></script>
		
	<script src="<?php echo $base_url;?>my/vendor/bootstrap/js/moment.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/bootstrap/js/yearpicker.js"></script>
    
	<script src="<?php echo $base_url;?>my/vendor/datatables/datatables.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo $base_url;?>my/vendor/datatables-buttons/js/jszip.min.js"></script>
	
    <script src="<?php echo $base_url;?>my/vendor/swal2/sweetalert.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/jquery-fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo $base_url;?>my/vendor/chart.js/Chart.min.js"></script>
	
	<script src="<?php echo base_url();?>my/vendor/leaflet/leaflet.js"></script>
	<script src="<?php echo base_url();?>my/vendor/leaflet/leaflet.awesome-markers.min.js"></script>


	<?php if(@$js_local){ ?>
		<script src="<?= base_url('my/js_local/'.$js_local);?>"></script>
	<?php } ?>
    
	<!-- global vars -->
	<script>
	var ext='';
	var page='';
	var base_url='<?php echo $base_url;?>';
	</script>
	
	<!-- my own custom js -->
	<script src="<?php echo $base_url;?>my/js/custom_dw.js"></script>
	
<!-- this page's JavaScript -->
<script>
$(document).ready(function(){
	page_ready();
	if(typeof(thispage_ready)=='function'){
		thispage_ready();
	}
});

var jvalidate=null;

function simpanlah(){
	if(typeof(safeform)=="function"){
		safeform('#myf'); //sendData to the specific controller/function
	}else{
		sendData('#myf','laporan/save');
	}
}
function ambil_isi(v,f='laporan'){
	safeform=null;
	if(typeof(mytimer)=='number') clearTimeout(mytimer)
	//$(".btn-pill").attr("disabled",false);
	//reset_isi();
	if(v==''){
		alrt("Please select a formulir","error");
		return;
	}
	$("."+v).attr("disabled",true);
	$("#formulir").val(v);
	get_content(f+'/get_content',{id:v},'.ldr','#isilaporan');
}

</script>

</body>

</html>

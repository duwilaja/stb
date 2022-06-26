<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <!--Favicon -->
    <!-- <link rel="icon" href="<?php echo base_url();?>aronox/assets/images/brand/favicon.ico" type="image/x-icon"/> -->
    
    <!-- Style css -->
    <link href="<?php echo base_url().'aronox/assets/css/style.css';?>" rel="stylesheet" />
    
    
    <!-- P-scroll bar css-->
    <link href="<?php echo base_url().'aronox/assets/plugins/p-scroll/perfect-scrollbar.css';?>" rel="stylesheet" />
    
    <!---Icons css-->
    <link href="<?php echo base_url().'aronox/assets/plugins/iconfonts/icons.css';?>" rel="stylesheet" />
    <link href="<?php echo base_url().'aronox/assets/plugins/iconfonts/font-awesome/font-awesome.min.css';?>" rel="stylesheet">
    <link href="<?php echo base_url().'aronox/assets/plugins/iconfonts/plugin.css';?>" rel="stylesheet" />
    

    <!-- Select2 css -->
    <!--link href="<?php echo base_url().'aronox/assets/plugins/select2/select2.min.css';?>" rel="stylesheet" />
    
    <link href="<?php echo base_url().'aronox/assets/css/apexcharts.css';?>" rel="stylesheet" /-->
    
    <!-- bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/bootstrap/css/bootstrap-select.min.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/bootstrap/css/bootstrap-datetimepicker.min.css';?>">
    
    <!-- fancybox CSS-->
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/jquery-fancybox/jquery.fancybox.min.css';?>">
    
    <!-- leaflet CSS-->
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/leaflet/leaflet.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/leaflet/MarkerCluster.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/leaflet/MarkerCluster.Default.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'my/vendor/leaflet/leaflet.awesome-markers.css';?>">
    
    <!-- overwrite css -->
    <link href="<?php echo base_url().'my/css/custom.css';?>" rel="stylesheet" />
    
    <!-- Owl -->
    <!--link rel="stylesheet" href="<?php echo base_url('my/vendor/owl/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('my/vendor/owl/owl.theme.default.min.css')?>"-->
    
    
    <!-- Tabs css-->
    <!--link href="<?php echo base_url().'aronox/assets/plugins/tabs/style.css';?>" rel="stylesheet" /-->
    
    <!-- Select2 -->
    <!-- Owl -->
    <link rel="stylesheet" href="<?php echo base_url('my/vendor/select2/select2.min.css')?>">
    
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script> -->
    <!-- jsFiddle will insert css and js -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="<?=base_url().'my/satupeta/css/L.Control.Basemaps.css'?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?=base_url().'my/css/'.$css;?>">
</head>
<body>


  <?php 
  //echo "disini adalah ".json_encode($lokasi);
  $this->load->view($page);?>

<!-- Owl  -->
<!--script src="<?= base_url('my/vendor/owl/owl.carousel.min.js')?>"></script-->
<!--script src="<?= base_url()?>aronox/assets/js/popover.js"></script-->
<script src="<?=base_url().'my/satupeta/js/heatmap.js'?>"></script>
<script src="<?=base_url().'my/satupeta/js/leaflet-heatmap.js'?>"></script>
<script src="<?=base_url().'my/satupeta/js/L.Control.Basemaps-min.js'?>"></script>

<!-- select2 -->
<!--script src="<?= base_url('my/vendor/select2/select2.min.js')?>"></script-->
<!--script src="<?= base_url('my/vendor/leaflet/leaflet.smooth.wheel.js')?>"></script-->


<?php 
if (isset($js_array_top)) {
    foreach ($js_array_top as $v) {
        echo '<script src="my/js_local/'.$v.'"></script>';
    }
}
?>
<script>
var lokasiku=<?php echo json_encode($lokasi)?>;
</script>
<script src="<?=base_url().'my/js_local/'.$js_local;?>"></script>
<script>
/* $('#form_filter').submit(function (e) { 
    e.preventDefault();
    prom_get_vip().then(function (data) {
		list_vip();
	});
  });*/
//  alert('<?php echo ($iddant)?>');
</script>
<?php 
if (isset($js_array_bot)) {
    foreach ($js_array_bot as $v) {
        echo '<script src="my/js_local/'.$v.'"></script>';
    }
}
?>
<!-- Peitychart js-->
<!-- <script src="http://bbecquet.github.io/Leaflet.RotatedMarker/leaflet.rotatedMarker.js"></script> -->
<script src="<?=base_url().'my/satupeta/js/leaflet.rotatedMarker.js'?>"></script>

<!--script src="<?=base_url()?>my/js_local/satupeta/custom.js"></script-->


  </body>
</html>
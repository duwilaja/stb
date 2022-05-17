$(function(){
    // Enables popover
    $(".bot-popover").popover({
        trigger: 'focus',
        html : true, 
        sanitize: false,
        placement: 'bottom',
        content: function() {
        return '<iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen style="border:none">'+
                '</iframe>';    
        },
        title: function() {
          return `Camera`;
        }
    });
});

$('.owl-carousel').owlCarousel({
// loop:true,
margin:10,
nav:false,
dots:false,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },
    1000:{
        items:5
    }
}
})

$(document).ready(function(){
  $(".nav-link").click(function(){
      if ($(this).hasClass('active')){
          $('#' + this.hash.substr(1).toLowerCase()).toggleClass('active');
      }
  });
  
  //select all checkboxes
  $("#select_all_cctv_korlantas").change(function(){
    var status = this.checked;
    $('.check-cctv-korlantas').each(function(){
      this.checked = status;
    });
  });

  $('.check-cctv-korlantas').change(function(){ 
    if(this.checked == false){
      $("#select_all_cctv_korlantas")[0].checked = false;
    }
    
    if ($('.check-cctv-korlantas:checked').length == $('.check-cctv-korlantas').length ){ 
      $("#select_all_cctv_korlantas")[0].checked = true;
    }
  });

  $("#select_all_cctv_dishub").change(function(){
    var status = this.checked;
    $('.check-cctv-dishub').each(function(){
      this.checked = status;
    });
  });

  $('.check-cctv-dishub').change(function(){ 
    if(this.checked == false){
      $("#select_all_cctv_dishub")[0].checked = false;
    }
    
    if ($('.check-cctv-dishub:checked').length == $('.check-cctv-dishub').length ){ 
      $("#select_all_cctv_dishub")[0].checked = true;
    }
  });

  $("#select_all_rawan_laka").change(function(){
    var status = this.checked;
    $('.check-rawan-laka').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-laka').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_laka")[0].checked = false;
    }
    
    if ($('.check-rawan-laka:checked').length == $('.check-rawan-laka').length ){ 
      $("#select_all_rawan_laka")[0].checked = true;
    }
  });

  $("#select_all_rawan_macet").change(function(){
    var status = this.checked;
    $('.check-rawan-macet').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-macet').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_macet")[0].checked = false;
    }
    
    if ($('.check-rawan-macet:checked').length == $('.check-rawan-macet').length ){ 
      $("#select_all_rawan_macet")[0].checked = true;
    }
  });

  $("#select_all_rawan_longsor").change(function(){
    var status = this.checked;
    $('.check-rawan-longsor').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-longsor').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_longsor")[0].checked = false;
    }
    
    if ($('.check-rawan-longsor:checked').length == $('.check-rawan-longsor').length ){ 
      $("#select_all_rawan_longsor")[0].checked = true;
    }
  });

  $("#select_all_rawan_banjir").change(function(){
    var status = this.checked;
    $('.check-rawan-banjir').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-banjir').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_banjir")[0].checked = false;
    }
    
    if ($('.check-rawan-banjir:checked').length == $('.check-rawan-banjir').length ){ 
      $("#select_all_rawan_banjir")[0].checked = true;
    }
  });

  $("#select_all_rawan_pohon_tumbang").change(function(){
    var status = this.checked;
    $('.check-rawan-pohon_tumbang').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-pohon_tumbang').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_pohon_tumbang")[0].checked = false;
    }
    
    if ($('.check-rawan-pohon_tumbang:checked').length == $('.check-rawan-pohon_tumbang').length ){ 
      $("#select_all_rawan_pohon_tumbang")[0].checked = true;
    }
  });

  $("#select_all_rawan_tindak_pidana").change(function(){
    var status = this.checked;
    $('.check-rawan-tindak_pidana').each(function(){
      this.checked = status;
    });
  });

  $('.check-rawan-tindak_pidana').change(function(){ 
    if(this.checked == false){
      $("#select_all_rawan_tindak_pidana")[0].checked = false;
    }
    
    if ($('.check-rawan-tindak_pidana:checked').length == $('.check-rawan-tindak_pidana').length ){ 
      $("#select_all_rawan_tindak_pidana")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_cctv_dishub").change(function(){
    var status = this.checked;
    $('.check-cctv-dishub').each(function(){
      this.checked = status;
    });
  });

  $('.check-cctv-dishub').change(function(){ 
    if(this.checked == false){
      $("#select_all_cctv_dishub")[0].checked = false;
    }
    
    if ($('.check-cctv-dishub:checked').length == $('.check-cctv-dishub').length ){ 
      $("#select_all_cctv_dishub")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_maps_polisi").change(function(){
    var status = this.checked;
    $('.check-lokasi-polisi').each(function(){
      this.checked = status;
    });
  });

  $('.check-lokasi-polisi').change(function(){ 
    if(this.checked == false){
      $("#select_all_maps_polisi")[0].checked = false;
    }
    
    if ($('.check-lokasi-polisi:checked').length == $('.check-lokasi-polisi').length ){ 
      $("#select_all_maps_polisi")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_maps_damkar").change(function(){
    var status = this.checked;
    $('.check-lokasi-damkar').each(function(){
      this.checked = status;
    });
  });

  $('.check-lokasi-damkar').change(function(){ 
    if(this.checked == false){
      $("#select_all_maps_damkar")[0].checked = false;
    }
    
    if ($('.check-lokasi-damkar:checked').length == $('.check-lokasi-damkar').length ){ 
      $("#select_all_maps_damkar")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_maps_rumah_sakit").change(function(){
    var status = this.checked;
    $('.check-lokasi-rumah_sakit').each(function(){
      this.checked = status;
    });
  });

  $('.check-lokasi-rumah_sakit').change(function(){ 
    if(this.checked == false){
      $("#select_all_maps_rumah_sakit")[0].checked = false;
    }
    
    if ($('.check-lokasi-rumah_sakit:checked').length == $('.check-lokasi-rumah_sakit').length ){ 
      $("#select_all_maps_rumah_sakit")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_maps_dishub").change(function(){
    var status = this.checked;
    $('.check-lokasi-dishub').each(function(){
      this.checked = status;
    });
  });

  $('.check-lokasi-dishub').change(function(){ 
    if(this.checked == false){
      $("#select_all_maps_dishub")[0].checked = false;
    }
    
    if ($('.check-lokasi-dishub:checked').length == $('.check-lokasi-dishub').length ){ 
      $("#select_all_maps_dishub")[0].checked = true;
    }
  });

  //select all checkboxes
  $("#select_all_maps").change(function(){
    var status = this.checked;
    $('.check-lokasi-all').each(function(){
      this.checked = status;
    });
  });

  $('.check-lokasi-all').change(function(){ 
    if(this.checked == false){
      $("#select_all_maps")[0].checked = false;
    }
    
    if ($('.check-lokasi-all:checked').length == $('.check-lokasi-all').length ){ 
      $("#select_all_maps")[0].checked = true;
    }
  });
});
function tes(id,nama,ket){
  $('#profil').removeClass('d-none');
  $('#nama').html(nama);
  $('#ket').html(ket);
}
function tes2(id,nama,ket){
  $('#profil2').removeClass('d-none');
  $('#nama2').html(nama);
  $('#ket2').html(ket);
}
function tes3(id,nama,ket){
  $('#profil3').removeClass('d-none');
  $('#nama3').html(nama);
  $('#ket3').html(ket);
}
function tes4(id,nama,ket){
  $('#profil4').removeClass('d-none');
  $('#nama4').html(nama);
  $('#ket4').html(ket);
}

$(function() {
$('.slidebttn').hover(
            function () {
                var $this 		= $(this);
                var $slidelem 	= $this.prev();
                $slidelem.stop().animate({'width':'170px'},300);
                $slidelem.find('span').stop(true,true).fadeIn();
                $this.addClass('button_c');
            },
            function () {
                var $this 		= $(this);
                var $slidelem 	= $this.prev();
                $slidelem.stop().animate({'width':'40px'},200);
                $slidelem.find('span').stop(true,true).fadeOut();
                $this.removeClass('button_c');
            }
        );
});

$('.btn-slider').click(function(){
$(this).toggleClass("click");
$('.sidebar').toggleClass("show");
});

<?php

if (!function_exists('urai')) {
	function urai($v){
		$x = explode('|',$v);
		return $x;
	}
}

if (!function_exists('torp')) {
	function torp($v){
		$rp =  @stripos($v,',') ? $v  : @number_format($v,0,',',',');
		return 'Rp '.$rp;
	}
}

if (!function_exists('ctojson')) {
	function ctojson($data='',$status=false,$msg='Tidak Ada Data',$count=0){
		$data = [
			'data' => $data,
			'status' => $status,
			'msg' => $msg,
			'count' => $count 
		];
		
		return json_encode($data);
	}
}

if (!function_exists('rangeDate')) {
	function rangeDate($start,$end){
		$date = [];
		$period = new DatePeriod(
			new DateTime($start),
			new DateInterval('P1D'),
			new DateTime($end)
		);
		
		foreach ($period as $key => $value) {
			array_push($date,$value->format('Y-m-d'));
		}
		
		return $date;
	}
}

if (!function_exists('mingguDepan')) {
	function mingguDepan($n='1 weeks'){
		$minggu_depan = rangeDate(date('Y-m-d'),date('Y-m-d',strtotime($n)));
		return $minggu_depan;
	}
}

// Cek Data
if (!function_exists('cekData')) {
	function cekData($q,$field=''){
		if ($q->num_rows() > 0) {
			return $q->row()->$field;
		}else{
			return 0;
		}
	}
}

if (!function_exists('srlen')) {
	function srlen($n='')
	{
		$x = str_replace([0,1,2,3,4,5,6,7,8,9],['z%','x$','j#','k!','i`','u&','b*','a(','c)','f~_'],$n);
		$okz= base64_encode($x);
		return $okz;
	}
}

if (!function_exists('srlde')) {
	function srlde($okj='')
	{
		$nama = base64_decode($okj);
		$x = str_replace(['z%','x$','j#','k!','i`','u&','b*','a(','c)','f~_'],[0,1,2,3,4,5,6,7,8,9],$nama);
		return $x;
	}
}

if (!function_exists('subahdata')) {
 function subahdata($file='',$nama_field='',$nilai_baru='')
    {
        $c = '';
        $line = null;

        if ($nama_field == '' && $file == '') return false; 
        $file = "./sample/".$file;
        $lines = file( $file , FILE_IGNORE_NEW_LINES );
        
        // Cari line
        foreach ($lines as $l => $linesx) {
            $xx = explode('|',$linesx);
            
            if ($xx[0] == $nama_field) {
                $line = $l;
                break;
            }
        }
       
        if ($line == null) return false; 
       
        $x = explode('|',$lines[$line]);
        $x[1] = $nilai_baru;
        $c .= implode('|',$x);
        $lines[$line] = $c;
        file_put_contents($file , implode( "\n", $lines ) );

        return true;
	}
}

if (!function_exists('slistdata')) {
    function slistdata($file='',$nama_field='')
    {
        $c = '';
        $line = null;

        if ($nama_field == '' && $file == '') return false; 
        $file = "./sample/".$file;
        $lines = file( $file , FILE_IGNORE_NEW_LINES );
        
        // Cari line
        foreach ($lines as $l => $linesx) {
            $xx = explode('|',$linesx);
            
            if ($xx[0] == $nama_field) {
                $line = $l;
                break;
            }
        }
       
        if ($line == null) return false; 
       
        $x = explode('|',$lines[$line]);
        $kom = explode('^',$x[1]);
        return $kom;
	}
}

if (!function_exists('setStatus')) {
	function setStatus($s='')
	{
		if ($s == 0) return "Tidak Aktif";
		if ($s == 1) return "Aktif";
	}
}

if (!function_exists('inp')) {
	function inp()
	{
		return json_decode(file_get_contents("php://input"),true);
	}
}

if (!function_exists('calcHours')) {
	function calcHours($startdate,$enddate)
	{
		$datetime1 = new DateTime($startdate);
		$datetime2 = new DateTime($enddate);
		$interval = $datetime1->diff($datetime2);
		$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
		return $elapsed;

	}
}

if (!function_exists('calc_minute')) {
	function calc_minute($startdate,$enddate)
	{
		$to_time = strtotime($enddate);
		$from_time = strtotime($startdate);
		// return round(abs($to_time - $from_time) / 60,2);
		$menit = round(abs($to_time - $from_time) / 60,2);
		return $menit*60;
	}
}

if (!function_exists('gnrt_inp')) {
	 function gnrt_inp($i='',$inp=[])
    {
	   $obj = [];
		if ($i != '' && !empty($inp)) {
			foreach ($i as $k => $v) {
				if(!empty($inp[$k])) $obj[$inp[$k]] = $v;
			}
		}
	   return $obj;
    }
}


if (!function_exists('test')) {
	function test($where)
	{
		return date('Y-m-d H:i:s',strtotime($where));
	}
}

if (!function_exists('tgl_indo')) {
	 function tgl_indo($tanggal){
		$bulan = array (
		  1=>'Januari',
		  'Februari',
		  'Maret',
		  'April',
		  'Mei',
		  'Juni',
		  'Juli',
		  'Agustus',
		  'September',
		  'Oktober',
		  'November',
		  'Desember'
		);
		$tgl = explode(' ',$tanggal);
		$pecahkan = explode('-', $tgl[0]);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	   
		return @$pecahkan[2] . ' ' . @$bulan[ (int)$pecahkan[1] ] . ' ' . @$pecahkan[0]. ' ';
	  }
}

if (!function_exists('comboopts')){
	function comboopts($arrobj){
		$ret=array();
		foreach($arrobj as $d){
			$ret[$d->v] = $d->t;
		}
		return $ret;
	}
}
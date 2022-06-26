<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	public function __construct()
	{
        parent::__construct();
        // Your own constructor code
		
	}
	public function tes(){
			$retval=array('code'=>"403",'ttl'=>"Horee",'msgs'=>json_encode($this->input->post("gangguan")));
			echo json_encode($retval);
	}
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['formulir'] = comboopts($this->db->select('view_laporan as v,nama_laporan as t')->like('tipe','F')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->or_where("unit",$user["subdinas"])->order_by("nama_laporan")->get('formulir')->result());
			$data['title'] = "Formulir";
			
			$this->template->load('laporan',$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$data['rahasia'] = mt_rand(100000,999999);
			$arr = [
			'name'   => 'rahasia',
			'value'  => $data['rahasia'],                            
			'expire' => '3000',                                                                                   
			'secure' => TRUE
			];

			set_cookie($arr);
			$this->load->view('login',$data);
		}
    }

	public function view_upd()
	{
	
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['formulir'] = $this->db->select('view_laporan as v,nama_laporan as t')->like('tipe','F')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->order_by("nama_laporan")->get('formulir')->result_array();
			$data['rekap'] = $this->db->select('view_laporan as v,nama_laporan as t')->like('tipe','R')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->order_by("nama_laporan")->get('formulir')->result_array();
			
			$this->template->load("home",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']=$retval;
			$data['rahasia'] = mt_rand(100000,999999);
			$arr = [
			'name'   => 'rahasia',
			'value'  => $data['rahasia'],                            
			'expire' => '3000',                                                                                   
			'secure' => TRUE
			];

			set_cookie($arr);
			$this->load->view('login',$data);
		}
    }

    public function get_form()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$ret=$this->db->select('view_laporan as v,nama_laporan as t')->order_by("nama_laporan")->get('formulir')->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	public function get_content()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$id=$this->input->post('id');//this is the view
			
			//put all masterdatas needed here
			$data['dummy']="this is dummy data";
			
			if($id=='lapsit_giat_masy'){  //
				$data['jenis'] = ($this->db->select('val,txt')->where('grp','jenis_giat_masy')->get('lov')->result_array());
			}
			if($id=='lapsit_kamtibmas'){  //
				$data['jenis'] = ($this->db->select('val,txt')->where('grp','jenis_opr')->get('lov')->result_array());
				$data['cara'] = ($this->db->select('val,txt')->where('grp','caratindak')->get('lov')->result_array());
				$data['tindakan'] = ($this->db->select('val,txt')->where('grp','tindakan')->get('lov')->result_array());
			}
			if($id=='lapsit_wal'){  //
				$data['obj'] = ($this->db->select('val,txt')->where('grp','obj_wal')->get('lov')->result_array());
				$data['acara'] = ($this->db->select('val,txt')->where('grp','acara_wal')->get('lov')->result_array());
			}
			if($id=='lapsit_ricuh'){  //
				$data['kategori'] = ($this->db->select('val,txt')->where('grp','kat_ricuh')->get('lov')->result_array());
			}
			if($id=='lapsit_bencana'){  //
				$data['jenis'] = ($this->db->select('val,txt')->where('grp','jenis_bencana')->get('lov')->result_array());
				$data['bantuan'] = ($this->db->select('val,txt')->where('grp','jenis_bantuan')->get('lov')->result_array());
			}
			if($id=='lapsit_ketahanan'){  //
				$data['aksi'] = ($this->db->select('val,txt')->where('grp','jenis_aksi')->get('lov')->result_array());
				$data['pelaku'] = ($this->db->select('val,txt')->where('grp','jenis_pelaku')->get('lov')->result_array());
			}
			
			if($id=='rengiat_wal'){  //
				$data['obj'] = ($this->db->select('val,txt')->where('grp','obj_wal')->get('lov')->result_array());
				$data['ambang'] = ($this->db->select('val,txt')->where('grp','ambang_gangguan')->get('lov')->result_array());
				$data['acara'] = ($this->db->select('val,txt')->where('grp','acara_wal')->get('lov')->result_array());
			}
			if($id=='rengiat_suluh'){  //
				$data['kategori'] = ($this->db->select('val,txt')->where('grp','kategori_suluh')->get('lov')->result_array());
				$data['media'] = ($this->db->select('val,txt')->where('grp','media')->get('lov')->result_array());
				$data['sasaran'] = ($this->db->select('val,txt')->where('grp','sasaran')->get('lov')->result_array());
			}
			if($id=='coll_rawan'){  //
				$data['jenis'] = ($this->db->select('val,txt')->where('grp','kat_rawan')->get('lov')->result_array());
			}
			
			if($id=='emergency'){  //
				$data['jenis'] = ($this->db->select('val,txt')->where('grp','kat_emergency')->get('lov')->result_array());
			}
			
			$this->load->view("formulir/$id",$data); //load the view
			
		}else{
			echo "<script>alrt('Session Closed, please login','error','Error');</script>";
		}
	}
	
	private function uplots($fld,$path){
		$ret=array();
		// Count total files
        $countfiles = count($_FILES[$fld]['name']);
		// Looping all files
        for($i=0;$i<$countfiles;$i++){
			if(!empty($_FILES[$fld]['name'][$i])){
				// Define new $_FILES array - $_FILES['file']
				  $_FILES['file']['name'] = $_FILES[$fld]['name'][$i];
				  $_FILES['file']['type'] = $_FILES[$fld]['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES[$fld]['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES[$fld]['error'][$i];
				  $_FILES['file']['size'] = $_FILES[$fld]['size'][$i];
				
				if ( $this->upload->do_upload('file')){
						$ret[]= $path.'/'.$this->upload->data('file_name');
					}
			}
		}
		
		return implode(";",$ret);
	}
	
	public function save()
	{
		
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$rowid=$this->input->post("rowid");
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			$data=$this->input->post(explode(",",$fname));
			$aplo="";
			if(strpos($fname,"uploadedfile")!==false){
				//upload here
				$path="./uploads/".$this->input->post("path");
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
				//$config['file_name'] = $user['nrp'];
				$config['file_ext_tolower'] = true;
				//$config['overwrite'] = false;
				$m="";
				$this->load->library('upload', $config);
				
				$aplo =  $this->uplots('uploadedfile',$path);
				$data['uploadedfile']=$aplo;
			}
			if($tname=='rengiat_suluh'){
				$data=$this->rengiat_suluh($data,$rowid);
			}
			
			if($rowid==""||$rowid=="0"){
				$this->db->insert($tname,$data);
			}else{
				if($aplo=="" && isset($data['uploadedfile'])) {
					unset($data['uploadedfile']);
				}
				$this->db->update($tname,$data,"rowid=$rowid");
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	public function dele()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been deleted";
			$rowid=$this->input->post("rowid");
			$tname=$this->input->post('tablename');
			if($rowid!=""){
				$this->db->delete($tname,array('rowid' => $rowid));
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) deleted";
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	
	public function get_subq()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$id=$this->input->post('id');
			$cols=$this->input->post('cols');
			$tname=$this->input->post('tname');
			$where=$this->input->post('where');
			if($where!=""){
				$this->db->where(array($where=>$id));
			}
			$ret=$this->db->select($cols)->get($tname)->result();
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$ret);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>array());
			echo json_encode($retval);
		}
	}
	
	public function datas(){
		$q=$this->input->post("q");
		$id=$this->input->post("id");
		$sql="";
		switch($q){
			case "statusjalan": $sql="select lat,lng,concat(jalan,'-',status) as ttl,rowid from tmc_data_statusjalan"; 
			if($id!="") $sql="select * from tmc_data_statusjalan where rowid=$id";
			break;
		}
		
		$query=$this->db->query($sql);
		$output=$query->result();
		
		echo json_encode($output);
	}
	
	private function rengiat_suluh($d,$rowid){
		//upload here
		$path="./uploads/".$this->input->post("path").'/doc';
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
		//$config['file_name'] = $user['nrp'];
		$config['file_ext_tolower'] = true;
		//$config['overwrite'] = false;
		$this->load->library('upload', $config);
		
		$upl=$this->uplots('fdoc',$path);
		if($rowid==0||$rowid==""||$upl!=''){
			$d['doc']=$upl;
		}else{
			unset($d['doc']);
		}
		$path="./uploads/".$this->input->post("path").'/kesimpulan';
		$config['upload_path'] = $path;
		$this->upload->initialize($config);
		$upl=$this->uplots('fkesimpulan',$path);
		if($rowid==0||$rowid==""||$upl!=''){
			$d['kesimpulan']=$upl;
		}else{
			unset($d['kesimpulan']);
		}
		$path="./uploads/".$this->input->post("path").'/foto';
		$config['upload_path'] = $path;
		$this->upload->initialize($config);
		$upl=$this->uplots('ffoto',$path);
		if($rowid==0||$rowid==""||$upl!=''){
			$d['foto']=$upl;
		}else{
			unset($d['foto']);
		}
		return $d;
	}
	public function eksekusi()
    {
        $id = $this->input->get('id');
        $t = $this->input->get('t');
        $user=$this->session->userdata('user_data');
		//if ($id != '' && isset($user)) {
        if (isset($user)) {
            $data = [
                'title' => 'Eksekusi Pengaduan',
                'header' => 'Eksekusi',
                'js' => 'page/pengaduan/eksekusi.js',
                'link_view' => 'pengaduan/eksekusi'
            ];
			$data['formulir'] = $this->db->select('view_laporan as v,nama_laporan as t,grp')->like('tipe','F')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->order_by("nama_laporan")->get('formulir')->result_array();
			$data['rekap'] = $this->db->select('view_laporan as v,nama_laporan as t,grp')->like('tipe','R')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->order_by("nama_laporan")->get('formulir')->result_array();
            $data['grp'] = $this->db->distinct()->select('grp,icon')->like('tipe','R')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->order_by("grp")->get('formulir')->result_array();
            
			if($user["wasdal"]=="Y"){
				$data['units'] = $this->db->select('unit_id,unit_nam')->order_by("unit_nam")->get('unit')->result_array();
				$data['rekap'] = $this->db->select('view_laporan as v,nama_laporan as t,unit')->like('tipe','R')->where(array("isactive"=>"Y"))->order_by("unit,nama_laporan")->get('formulir')->result_array();
			}
			$data['session'] = $user;
			$data['id']=$id;
			$data['t']=$t;
			$data['d']=$this->db->where("rowid",$id)->get($t)->row_array();
			$this->template->load('eksekusi', $data);
        }
    }
	private function result_to_in($res,$fld){
		$ret=array('');
		foreach($res as $row){
			$ret[]=$row[$fld];
		}
		return $ret;
	}
	public function petugas(){
		$t = $this->input->post('t');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lon');
		
		$temp=$this->db->select("rowid")->where_not_in("status",array("Selesai","Batal"))->get($t)->result_array();
		$unfinished=$this->result_to_in($temp,'rowid');
		
        $temp=$this->db->select("petugas")->where('tname',$t)->where_in('trid',$unfinished)->get('penugasan')->result_array();
		$unavail=$this->result_to_in($temp,'petugas');
		
		$out=$this->db->select("nrp,nama,ST_Distance_Sphere(POINT(lng,lat),POINT($lng,$lat))/1000 as jarak")->where("mob","Y")->where_not_in('nrp',$unavail)->get("persons")->result_array();
		echo json_encode($out);
	}
	public function tugaskeun(){
		$id = $this->input->post('id');
        $t = $this->input->post('t');
        $nrp = $this->input->post('nrp');
        $user=$this->session->userdata('user_data');
		$out=array("msg"=>"Session closed. Please login","typ"=>"error");
		if (isset($user)) {
			$this->db->insert("penugasan",array("petugas"=>$nrp,"tname"=>$t,"trid"=>$id));
			$this->db->update($t,array("status"=>"Menunggu Konfirmasi"),"rowid=$id");
			$out=array("msg"=>"$nrp telah ditugaskan","typ"=>"success");
		}
		echo json_encode($out);
	}
	public function apdetkeun(){
		$id = $this->input->post('id');
        $t = $this->input->post('t');
        $stt = $this->input->post('stt');
        $user=$this->session->userdata('user_data');
		$out=array("msg"=>"Session closed. Please login","typ"=>"error");
		if (isset($user)) {
			$this->db->update($t,array("status"=>$stt),"rowid=$id");
			$out=array("msg"=>"Status diset $stt","typ"=>"success");
		}
		echo json_encode($out);
	}
	
	
/*yang lama*/	
	public function save_rengiat_vip()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$rowid=$this->input->post("rowid");
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			
			$data=$this->input->post(explode(",",$fname));
			if($rowid==""||$rowid=="0"){
				$rengiatid=time();
				$data=array_merge($data,array("rengiatid"=>$rengiatid));
				$this->db->insert($tname,$data);
			}else{
				//$this->db->update($tname,$data,"rowid=$rowid");
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
				//input detail here
				$nama=$this->input->post('nama'); $gangguan=$this->input->post('gangguan');
				$ejarak=$this->input->post('ejarak'); $ewaktu=$this->input->post('ewaktu');
				$transit=$this->input->post('transit'); $lat=$this->input->post('lat'); $lng=$this->input->post('lng');
				$dats=array();
				for($i=0;$i<count($nama);$i++){
					if($nama[$i]!=''){
						$dats[]=array("rengiatid"=>$rengiatid,"nour"=>$i+1,"nama"=>$nama[$i],"gangguan"=>$gangguan[$i],
							"ejarak"=>$ejarak[$i],"ewaktu"=>$ewaktu[$i],"transit"=>$transit[$i],"lat"=>$lat[$i],"lng"=>$lng[$i]);
					}
				}
				if(count($dats)>0){
					$this->db->insert_batch("tmc_rengiat_vip_route",$dats);
					$ret=$this->db->affected_rows();
					if($ret>0){
						$msgs.=" / $ret detail(s) saved";
					}
				}
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	public function save_ops_wal()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$rowid=$this->input->post("rowid");
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			
			$data=$this->input->post(explode(",",$fname));
			if($rowid==""||$rowid=="0"){
				$rengiatid=time();
				$data=array_merge($data,array("giatid"=>$rengiatid));
				$this->db->insert($tname,$data);
			}else{
				//$this->db->update($tname,$data,"rowid=$rowid");
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
				//input detail here
				$nama=$this->input->post('nama'); $ejarak=$this->input->post('ejarak'); $jarak=$this->input->post('jarak'); 
				$ewaktu=$this->input->post('ewaktu'); $waktu=$this->input->post('waktu'); $transit=$this->input->post('transit');
				$dats=array();
				for($i=0;$i<count($nama);$i++){
					if($nama[$i]!=''){
						$dats[]=array("giatid"=>$rengiatid,"nour"=>$i+1,"nama"=>$nama[$i],"jarak"=>$jarak[$i],"waktu"=>$waktu[$i],
							"ejarak"=>$ejarak[$i],"ewaktu"=>$ewaktu[$i],"transit"=>$transit[$i]);
					}
				}
				if(count($dats)>0){
					$this->db->insert_batch($tname."_route",$dats);
					$ret=$this->db->affected_rows();
					if($ret>0){
						$msgs.=" / $ret detail(s) saved";
					}
				}
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	public function save_ops_ec()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$msgs="No data has been saved";
			$rowid=$this->input->post("rowid");
			$tname=$this->input->post('tablename');
			$fname=$this->input->post('fieldnames');
			
			$data=$this->input->post(explode(",",$fname));
			if($rowid==""||$rowid=="0"){
				$rengiatid=time();
				$data=array_merge($data,array("giatid"=>$rengiatid));
				$data["dampak"]=implode(", ",$this->input->post('dampak'));
				$data["kebutuhan"]=implode(", ",$this->input->post('kebutuhan'));
				$this->db->insert($tname,$data);
			}else{
				//$this->db->update($tname,$data,"rowid=$rowid");
			}
			$ret=$this->db->affected_rows();
			if($ret>0){
				$msgs="$ret record(s) saved";
				//input detail here
				$nama=$this->input->post('nama'); $jenis=$this->input->post('jenis'); $alamat=$this->input->post('alamat'); 
				$cc=$this->input->post('cc'); $lat=$this->input->post('latx'); $lng=$this->input->post('lngx');
				$dats=array();
				for($i=0;$i<count($nama);$i++){
					if($nama[$i]!=''){
						$dats[]=array("giatid"=>$rengiatid,"nama"=>$nama[$i],"jenis"=>$jenis[$i],"alamat"=>$alamat[$i],
							"cc"=>$cc[$i],"lat"=>$lat[$i],"lng"=>$lng[$i]);
					}
				}
				if(count($dats)>0){
					$this->db->insert_batch($tname."_fas",$dats);
					$ret=$this->db->affected_rows();
					if($ret>0){
						$msgs.=" / $ret detail(s) saved";
					}
				}
			}
			$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
			echo json_encode($retval);
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
}

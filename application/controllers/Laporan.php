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
						$ret[]= $path.$this->upload->data('file_name');
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
			if(strpos($fname,"uploadedfile")){
				//upload here
				$path="./uploads/".$this->input->post("path");
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
				//$config['file_name'] = $user['nrp'];
				$config['file_ext_tolower'] = true;
				//$config['overwrite'] = false;
				$m="";
				$this->load->library('upload', $config);
				
				$data['uploadedfile'] =  $this->uplots('uploadedfile',$path);
			}
			
			if($rowid==""||$rowid=="0"){
				$this->db->insert($tname,$data);
			}else{
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
			$fname=$this->input->post('fieldnames');
			$data=$this->input->post(explode(",",$fname));
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
			case "rawan": $sql="select lat,lng,concat(jalan,'-',status) as ttl,rowid from tmc_data_rawan"; 
			if($id!="") $sql="select * from tmc_data_rawan where rowid=$id";
			break;
			case "darurat": $sql="select lat,lng,concat(jalan,'-',jenis) as ttl,rowid from tmc_data_darurat"; 
			if($id!="") $sql="select * from tmc_data_darurat where rowid=$id";
			break;
			case "gangguan": $sql="select lat,lng,concat(jalan,'-',status,'-',penyebab,'-',penyebabd) as ttl,rowid from tmc_data_gangguan"; 
			if($id!="") $sql="select * from tmc_data_gangguan where rowid=$id";
			break;
			case "jalan": $sql="select * from tmc_data_jalan"; 
			if($id!="") $sql="select * from tmc_data_jalan where rowid=$id";
			break;
			case "ec": $sql="select * from tmc_ops_ec"; 
			if($id!="") $sql="select * from tmc_ops_ec where rowid=$id";
			break;
			case "kendaraan": $sql="select * from tmc_data_kendaraan"; 
			if($id!="") $sql="select * from tmc_data_kendaraan where rowid=$id";
			break;
			case "pengemudi": $sql="select * from tmc_data_pengemudi"; 
			if($id!="") $sql="select * from tmc_data_pengemudi where rowid=$id";
			break;
		}
		
		$query=$this->db->query($sql);
		$output=$query->result();
		
		echo json_encode($output);
	}
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

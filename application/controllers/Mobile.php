<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pls_login');
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
	private function tablename($kategori){
		$tn="";
		switch($kategori){
			case "emergency": $tn="emergency"; break;
			case "bencana": $tn="lapsit_bencana"; break;
			case "giatmasy": $tn="lapsit_giat_masy"; break;
			case "kamtibmas": $tn="lapsit_kamtibmas"; break;
			//case "object": $tn="coll_obj"; break;
			//case "rawan": $tn="coll_rawan"; break;
		}
		return $tn;
	}
	private function fieldnames($kategori){
		$fn="";
		switch($kategori){
			case "emergency": $fn="nrp,tgl,jam,detil,lokasi,lat,lng,kategori,penyebab"; break;
			case "bencana": $fn="nrp,tgl,tgls,jam,jenis,bantuan,lokasi,lat,lng"; break;
			case "giatmasy": $fn="nrp,tgl,jenis,tglmulai,jammulai,tglselesai,jamselesai,lokasi,lat,lng"; break;
			case "kamtibmas": $fn="nrp,tgl,jam,jenis,lokasi,lat,lng,caratindak,tindakan,uraian,uploadedfile"; break;
			//case "object": $fn="nrp,tgl,jam,detil,nama,lat,lng"; break;
			//case "rawan": $fn="nrp,tgl,jam,detil,lokasi,lat,lng,kategori,penyebab"; break;
		}
		return $fn;
	}
	
	public function login(){
		$retval=array("code"=>"404","ttl"=>"Gagal","msgs"=>"User/Password salah");
		$nrp=trim($this->input->post("user"));
		$pwd=trim($this->input->post("passwd"));
		$this->db->where('nrp',$nrp);
		$this->db->where('pwd',md5($pwd));
		$acc=$this->db->get("accounts")->result_array();
		if(count($acc)>0){
			$retval=array("code"=>"403","ttl"=>"Gagal","msgs"=>"Anda tidak diijinkan mengakses. Silakan kontak admin untuk menambahkan akses anda");
			$this->db->where('nrp',$nrp);
			$this->db->where('isactive','Y');
			$this->db->where('mob','Y');
			$rs=$this->db->get("persons")->result_array();
			if(count($rs) > 0){
				$token=md5(uniqid(rand(), true)).md5(uniqid(rand(), true));
				$this->session->set_userdata('user_token',$token);
				$retval=array("code"=>"200","ttl"=>"OK","msgs"=>$token);
			}
		}
		
		echo json_encode($retval);
	}
	public function listofvalue(){
		$user=$this->session->userdata('user_token');
		$auth=$this->input->get_request_header('X-token', TRUE);
		if(isset($user)){
			if($auth==$user){
				$kategori=$this->input->post('kategori');
				$data=$this->db->select("val,txt")->where("grp",$kategori)->order_by("txt")->get("lov")->result_array();
				$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$data);
				echo json_encode($retval);
			}else{
				$retval=array('code'=>"403",'ttl'=>"Invalid session",'msgs'=>"Invalid token");
				echo json_encode($retval);
			}
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	public function send()
	{
		$user=$this->session->userdata('user_token');
		$auth=$this->input->get_request_header('X-token', TRUE);
		if(isset($user)){
			if($auth==$user){
				$msgs="Invalid input";
				$kategori=$this->input->post('form');
				$tname=$this->tablename($kategori);
				$fname=$this->fieldnames($kategori);
				if($fname!=""&&$tname!=""){
					$data=$this->input->post(explode(",",$fname));
					//upload here
					$path="./uploads/$fname/";
					$config['upload_path'] = $path; //"../sm-ci/uploads/publicservice/$kategori/";
					$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
					$config['file_ext_tolower'] = true;
					//$config['overwrite'] = false;
					$m="";
					if(isset($data['uploadedfile'])){
						$this->load->library('upload', $config);
						$data['uploadedfile'] =  $this->uplots('uploadedfile',$path);
					}
					$this->db->insert($tname,$data);
					$ret=$this->db->affected_rows();
					if($ret>0){
						$msgs="$ret data terkirim";
						//$this->send_notif_web($kategori);
					}
					$retval=array('code'=>"200",'ttl'=>"OK",'msgs'=>$msgs);
					echo json_encode($retval);
				}else{
					$retval=array('code'=>"401",'ttl'=>"Invalid Input",'msgs'=>"Form tidak ditemukan");
					echo json_encode($retval);
				}
			}else{
				$retval=array('code'=>"403",'ttl'=>"Invalid session",'msgs'=>"Invalid token");
				echo json_encode($retval);
			}
		}else{
			$retval=array('code'=>"403",'ttl'=>"Session closed",'msgs'=>"Please login");
			echo json_encode($retval);
		}
	}
	
	
}

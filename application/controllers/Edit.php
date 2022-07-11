<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}
	
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session']=$user;
			$data['i']=$this->input->get('i');
			$data['t']=$this->input->get('t');
			$data['v']=$this->getfrm($data['t']);
			$this->load->view('edit',$data);
		}else{
			echo "<h3>Invalid session, please login.</h3>";
		}
	}
	
	public function penugasan()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session']=$user;
			$id=$this->input->get('i');
			$data['penugasan']=$this->db->where('rowid',$id)->get('penugasan')->result_array();
			if(count($data['penugasan'])>0){
				$data['kasus']=$this->db->where("rowid",$data['penugasan'][0]['trid'])->get($data['penugasan'][0]['tname'])->result_array();
				if(count($data['kasus'])>0){$this->load->view('penugasan',$data);}
			}
			echo "<h3>Data not found.</h3>";
		}else{
			echo "<h3>Invalid session, please login.</h3>";
		}
	}
	
	public function get(){
		$user=$this->session->userdata('user_data');
		$ret=array();
		if(isset($user)){
			$id=$this->input->post('id');
			$t=$this->input->post('q');
			$ret=$this->db->where("rowid",$id)->get($t)->result_array();
		}
		$out=array("code"=>"200", "msgs"=>$ret);
		echo json_encode($out);
	}
	
	private function getfrm($v='')
	{
		return $this->db->where(array("view_laporan"=>$v))->get('formulir')->row();
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data = [
			'title' => 'SatuPeta',
			'css' => 'satupeta/custom.css',
			'page' => 'peta/satupeta.php',
			'js_array_top' => ['satupeta/heat.js'],
			'js_local' => 'satupeta/satupeta.js',
			'js_array_bot' => ['satupeta/vip.js','satupeta/rawan.js','satupeta/analytic.js','satupeta/rengiat.js'],
			'lokasi' => array()
		];

		$this->load->view('satupeta',$data);
	}
	
	public function datas(){
		$q=$this->input->post("q");
		$id=$this->input->post("id");
		$sql="";
		switch($q){
			case "coll_obj": $sql="select lat,lng,concat('(Object Vital) ',nama) as lokasi,detil as ket from $q"; 
			if($id!="") $sql="select * from $q where rowid=$id";
			break;
			case "coll_rawan": $sql="select lat,lng,concat('(Wilayah Rawan) ',lokasi) as lokasi,concat(kategori,' ',penyebab) as ket from $q"; 
			if($id!="") $sql="select * from $q where rowid=$id";
			break;
			case "emergency": $sql="select lat,lng,concat('(Emergency) ',lokasi) as lokasi,concat(kategori,' ',penyebab) as ket from $q"; 
			if($id!="") $sql="select * from $q where rowid=$id";
			break;
		}
		
		$query=$this->db->query($sql);
		$output=$query->result();
		
		echo json_encode($output);
	}

}

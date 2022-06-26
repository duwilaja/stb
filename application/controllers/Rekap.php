<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
	}

	private function select_formulir($v='')
	{
		$user=$this->session->userdata('user_data');
		if ($v != '') {
			return $this->db->select('view_laporan as v,nama_laporan as t')->like('tipe','R')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->or_where("unit",$user["subdinas"])->order_by("nama_laporan")->get('formulir')->row();
		}else{
			return comboopts($this->db->select('view_laporan as v,nama_laporan as t')->like('tipe','R')->where(array("unit"=>$user['unit'],"isactive"=>"Y"))->or_where("unit",$user["subdinas"])->order_by("nama_laporan")->get('formulir')->result());
		}
	}
	
	public function index()
	{
		$user=$this->session->userdata('user_data');
		if(isset($user)){
			$data['session'] = $user;
			$data['title'] = "Rekap";
			$data['formulir'] = $this->select_formulir();
			
			$this->template->load('rekap',$data);
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
			$d=$this->input->post('direktorat');
			if($d!='')$where['direktorat']=$d;
			$d=$this->input->post('sie');
			if($d!='')$where['sie']=$d;
			$d=$this->input->post('subdit');
			if($d!='')$where['subdit']=$d;
			$ret=$this->db->select('view_laporan as v,nama_laporan as t')->where($where)->get('formulir')->result();
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
			$id=$this->input->post('id');//this is the view
			
			//put all masterdatas needed here
			$data['dummy']="this is dummy data";
			$data['session']=$user;
			$data['view']=$id;
			
			$this->load->view("rekap/$id",$data); //load the view
			
		}else{
			echo "<script>alrt('Session Closed, please login','error','Error');</script>";
		}
	}
		
	public function datatable(){
		$user=$this->session->userdata('user_data');
		$data=array(); $data_assoc=array(); $semua=0;
		if(isset($user)){
			$tname=base64_decode($this->input->post('tname')); //tablename
			$cols=base64_decode($this->input->post('cols')); //column
			
			$isedit=base64_decode($this->input->post('isedit')); //is editable?
			
			$ismap=base64_decode($this->input->post('ismap')); //is map button active?
			$isverify=base64_decode($this->input->post('isverify')); //is verify button active?
			$isfile=base64_decode($this->input->post('isfile')); //is files active?
			$isexec=base64_decode($this->input->post('isexec')); //is files active?
			
			$where=array();
			$acol=explode(",",$cols);
			$ftgl=$this->input->post('ftgl')?$this->input->post('ftgl'):'tgl';
			
			//build where polda/polres
			if ($this->input->post('fdate') != '') {
				$where=array($ftgl.'>='=>$this->input->post('fdate')); //date('Y-m-d');
			}
			if ($this->input->post('tdate') != '') {
				$where=array_merge($where,array($ftgl.'<='=>$this->input->post('tdate'))); //date('Y-m-d');
			}
			//$d=$user['polres'];
			///if($d!='')
				//$where[$tname.'.polres']=$d;
			//$d=$user['polda'];
			//if($d!='')
				//$where[$tname.'.polda']=$d;
			
			$this->db->select($cols);
			//$this->db->from($tname);

			$order_p = $this->input->post('orders');
            $ord = "";
            if($order_p!=""){
                $ord = base64_decode($order_p);
            }
			$this->db->where($where);
			$semua=$this->db->count_all_results($tname,FALSE);
      
			if($ord!=''){
				$this->db->order_by($ord);
			}else{
				$this->db->order_by($acol[$this->input->post('order')[0]['column']], $this->input->post('order')[0]['dir']);
			}
			$this->db->limit($this->input->post('length'),$this->input->post('start'));
			$data_assoc=$this->db->get()->result_array();
			
			//$sme = $this->load->database('db_intan', TRUE);
			//$select =  $this->select_formulir($tname);

			for($i=0;$i<count($data_assoc);$i++){

				$lnk='';
				if($ismap){
					$lnk.='<a title="Map" class="btn btn-icon" onclick="mapview('.$data_assoc[$i]['lat'].','.$data_assoc[$i]['lng'].
					');"><i class="fa fa-map-marker"></i></a>';
					//$nm=isset($data_assoc[$i]['tit'])?$data_assoc[$i]['tit']:'';
					//$src='https://satupeta.elingsolo.com/satupeta?lokasi='.$data_assoc[$i]['lat'].','.$data_assoc[$i]['lng'].'&nama='.$nm.'&display=off';
					//$lnk='<a type="button" class="btn btn-icon btn-info" href="JavaScript:;" data-fancybox="" data-type="iframe" data-src="'.$src.'"><i class="fa fa-map-marker"></i></a><br />';
				}
				if($isverify){
					$lnkx=' <button type="button" class="btn btn-icon btn-warning" onclick="openmodal('.$data_assoc[$i]['rowid'].');"><i class="fa fa-check"></i></button>';
					if($tname=='tmc_pservice_langgar'){
						$lnkx=' <button type="button" class="btn btn-icon btn-warning" onclick="openmodal('.$data_assoc[$i]['rowid'].',\''.$data_assoc[$i]['langgar'].'\');"><i class="fa fa-check"></i></button>';
					}
					$lnk.=$lnkx;
				}
				if($isedit){
					$lnkx=base_url().'edit?i='.$data_assoc[$i]['rowid'].'&t='.$tname;
					$lnk.='<a title="Edit" class="btn btn-icon" href="JavaScript:;" data-fancybox="" data-type="iframe" data-src="'.$lnkx.'"><i class="fa fa-pencil"></i></a>';
				}
				if($isfile){
					$myfiles=explode(",",$this->input->post('filefields'));
					for($z=0;$z<count($myfiles);$z++){
						$data_assoc[$i][$myfiles[$z]]=$this->make_link($data_assoc[$i][$myfiles[$z]]);
					}
				}
				if($isexec){
					$lnkx=base_url("laporan").'/eksekusi?id='.$data_assoc[$i]['rowid'].'&t='.$tname;
					$lnk.='<a title="Exec" class="btn btn-icon" href="'.$lnkx.'"><i class="fa fa-arrow-right"></i></a>';
				}
				if($lnk!=''){
					$lnk.='<a title="Delete" class="btn btn-icon" onclick="confirmDeletex(\''.$data_assoc[$i]['rowid'].'\',\''.$tname.'\');"><i class="fa fa-times"></i></a>';
					$data_assoc[$i]['btnset']='<span>'.$lnk.'</span>';
				}
				$data[]=array_values($data_assoc[$i]);
			}
		}
		$output = array(
                        "draw" => $this->input->post('draw'),
                        "recordsTotal" => $semua,
                        "recordsFiltered" => $semua,
                        "data" => $data,
						"assoc" => $data_assoc
                );
        //output to json format
        echo json_encode($output);
	}
	
	private function make_link($links){
		$ret="";
		$alink=explode(";",$links);
		for($j=0;$j<count($alink);$j++){
			//$ret.='<a target="_blank" href="'.$alink[$j].'">Attachment '.($j+1).'</a>';
			if(trim($alink[$j])!=""){
				$ret.='<a href="JavaScript:;" data-fancybox="" data-type="iframe" data-src="'.$alink[$j].'">Attachment '.($j+1).'</a><br />';
			}
		}
		return $ret;
	}

}
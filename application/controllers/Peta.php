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

}

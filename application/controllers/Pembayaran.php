<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Pembayaran_act');
		$this->load->model('BuatKode_Act');
	}
	public function index(){
		if($this->session->userdata('LOGGED')){
			$this->MainAdmin->get_index();
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	public function v_pembayaran(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Pembayaran_act->get_pembayaran();
		$this->content = $this->load->view('pembayaran/index',$data,true);
		$this->index();

		
	}
	

	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Report_act');
	}
	public function index()
	{
//		$this->MainAdmin->get_index();
		if($this->session->userdata('LOGGED')){
			$this->MainAdmin->get_index();
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	public function pemasukan($tgl_awal="",$tgl_akhir=""){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		if(isset($tgl_awal) && isset($tgl_akhir)){
			$data['data'] = $this->Report_act->report_pemasukan_barang();
		}		
		$data['action'] = site_url().'/report/report_pemasukan';
		$this->content = $this->load->view('report/index',$data,true);
		$this->index();
	}
	public function transaksi($tgl_awal="",$tgl_akhir=""){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		if(isset($tgl_awal) && isset($tgl_akhir)){
			$data['data'] = $this->Report_act->report_transaksi();
		}		
		$data['action'] = site_url().'/report/report_transaksi';
		$this->content = $this->load->view('report/index',$data,true);
		$this->index();
	}
	
}

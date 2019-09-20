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
		$tgl_awal = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');
		if($tgl_awal != "" && $tgl_akhir != ""){			
			$data['data'] = $this->Report_act->report_pemasukan_barang($tgl_awal,$tgl_akhir);
		}	
		$data['action'] = site_url().'/report/pemasukan';
		$this->content = $this->load->view('laporan/lap_pemasukan',$data,true);
		$this->index();
	}
	public function transaksi($tgl_awal="",$tgl_akhir=""){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$tgl_awal = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');
		if($tgl_awal != "" && $tgl_akhir != ""){
			$data['data'] = $this->Report_act->report_transaksi($tgl_awal,$tgl_akhir)->result_array();
		}		
		$data['action'] = site_url().'/report/transaksi';
		$this->content = $this->load->view('laporan/lap_transaksi',$data,true);
		$this->index();
	}
	
}

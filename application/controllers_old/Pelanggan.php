<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Pelanggan_act');
		$this->load->model('BuatKode_Act');
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
	public function v_pelanggan(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Pelanggan_act->get_pelanggan();
		$this->content = $this->load->view('pelanggan/index',$data,true);
		$this->index();
	}
//	public function add_pelanggan(){
//		$data['kode_pelanggan'] = $this->BuatKode_Act->kode_pelanggan();
//		$data['action'] = site_url().'/pelanggan/store_pelanggan';		
//		$this->content = $this->load->view('pelanggan/form',$data,true);
//		$this->index();
//	}
//	function edit_pelanggan($id){	
//		$data['data'] = $this->Pelanggan_act->get_pelanggan($id);
//		$data['action'] = site_url().'/pelanggan/update_pelanggan/'.$id;
//		$this->content = $this->load->view('pelanggan/form',$data,true);
//		$this->index();
//	}
//	function store_pelanggan(){
//		$return = $this->Pelanggan_act->process_add();
//		if($return){
//			$data = "success";
//		}else{
//			$data = "error";
//		}
//		$this->session->set_flashdata('status', $data);
//		redirect('pelanggan/v_pelanggan');
//	}
//	function update_pelanggan($id){
//		$return = $this->Pelanggan_act->process_update($id);
//		if($return){
//			$data = "success";
//		}else{
//			$data = "error";
//		}
//		$this->session->set_flashdata('status', $data);
//		redirect('pelanggan/v_pelanggan');		
//	}
//	function delete_pelanggan($id){
//		$this->Pelanggan_act->process_delete($id);
//		redirect('pelanggan/v_pelanggan');
//	}
	
}

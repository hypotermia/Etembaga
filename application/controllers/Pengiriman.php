<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Pengiriman_act');
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
	public function v_pengiriman(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Pengiriman_act->get_pengiriman();
		$this->content = $this->load->view('pengiriman/index',$data,true);
		$this->index();
	}
	public function add_pengiriman(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_pengiriman'] = $this->BuatKode_Act->kode_pengiriman();
		$data['action'] = site_url().'/pengiriman/store_pengiriman';		
		$this->content = $this->load->view('pengiriman/form',$data,true);
		$this->index();
	}
	function edit_pengiriman($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Pengiriman_act->get_pengiriman($id);
		$data['action'] = site_url().'/pengiriman/update_pengiriman/'.$id;
		$this->content = $this->load->view('pengiriman/form',$data,true);
		$this->index();
	}
	function store_pengiriman(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Pengiriman_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('pengiriman/v_pengiriman');
	}
	function update_pengiriman($id){
		$return = $this->Pengiriman_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('pengiriman/v_pengiriman');		
	}
	function delete_pengiriman($id){
		$this->pengiriman_act->process_delete($id);
		redirect('pengiriman/v_pengiriman');
	}
	
}

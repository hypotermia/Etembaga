<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Ongkir_act');
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
	public function v_ongkir(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Ongkir_act->get_ongkir();
		$this->content = $this->load->view('ongkir/index',$data,true);
		$this->index();
	}
	public function add_ongkir(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_ongkir'] = $this->BuatKode_Act->kode_ongkir();
		$data['action'] = site_url().'/ongkir/store_ongkir';		
		$this->content = $this->load->view('ongkir/form',$data,true);
		$this->index();
	}
	function edit_ongkir($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Ongkir_act->get_ongkir($id);
		$data['action'] = site_url().'/ongkir/update_ongkir/'.$id;
		$this->content = $this->load->view('ongkir/form',$data,true);
		$this->index();
	}
	function store_ongkir(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Ongkir_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('ongkir/v_ongkir');
	}
	function update_ongkir($id){
		$return = $this->Ongkir_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('ongkir/v_ongkir');		
	}
	function delete_ongkir($id){
		$this->Ongkir_act->process_delete($id);
		redirect('ongkir/v_ongkir');
	}
	
}

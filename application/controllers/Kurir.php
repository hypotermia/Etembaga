<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Kurir_act');
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
	public function v_kurir(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Kurir_act->get_kurir();
		$this->content = $this->load->view('kurir/index',$data,true);
		$this->index();
	}
	public function add_kurir(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_kurir'] = $this->BuatKode_Act->kode_kurir();
		$data['action'] = site_url().'/kurir/store_kurir';		
		$this->content = $this->load->view('kurir/form',$data,true);
		$this->index();
	}
	function edit_kurir($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Kurir_act->get_kurir($id);
		$data['action'] = site_url().'/kurir/update_kurir/'.$id;
		$this->content = $this->load->view('kurir/form',$data,true);
		$this->index();
	}
	function store_kurir(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Kurir_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('kurir/v_kurir');
	}
	function update_kurir($id){
		$return = $this->Kurir_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('kurir/v_kurir');		
	}
	function delete_kurir($id){
		$this->Kurir_act->process_delete($id);
		redirect('kurir/v_kurir');
	}
	
}

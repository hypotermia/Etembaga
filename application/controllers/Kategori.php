<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Kategori_act');
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
	public function v_kategori(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Kategori_act->get_kategori();
		$this->content = $this->load->view('kategori/index',$data,true);
		$this->index();
	}
	public function add_kategori(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_kategori'] = $this->BuatKode_Act->kode_kategori();
		$data['action'] = site_url().'/kategori/store_kategori';		
		$this->content = $this->load->view('kategori/form',$data,true);
		$this->index();
	}
	function edit_kategori($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Kategori_act->get_kategori($id);
		$data['action'] = site_url().'/kategori/update_kategori/'.$id;
		$this->content = $this->load->view('kategori/form',$data,true);
		$this->index();
	}
	function store_kategori(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Kategori_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('kategori/v_kategori');
	}
	function update_kategori($id){
		$return = $this->Kategori_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('kategori/v_kategori');		
	}
	function delete_kategori($id){
		$this->Kategori_act->process_delete($id);
		redirect('kategori/v_kategori');
	}
	
}

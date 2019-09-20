<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Admin_act');
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
	public function v_admin(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Admin_act->get_admin();
		$this->content = $this->load->view('admin/index',$data,true);
		$this->index();
	}
	public function add_admin(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_admin'] = $this->BuatKode_Act->kode_admin();
		$data['action'] = site_url().'/admin/store_admin';		
		$this->content = $this->load->view('admin/form',$data,true);
		$this->index();
	}
	function edit_admin($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Admin_act->get_admin($id);
		$data['action'] = site_url().'/admin/update_admin/'.$id;
		$this->content = $this->load->view('admin/form',$data,true);
		$this->index();
	}
	function store_admin(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Admin_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('admin/v_admin');
	}
	function update_admin($id){
		$return = $this->Admin_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('admin/v_admin');		
	}
	function delete_admin($id){
		$this->Admin_act->process_delete($id);
		redirect('admin/v_admin');
	}
	
}

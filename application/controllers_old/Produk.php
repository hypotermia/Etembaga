<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Produk_act');
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
	public function v_produk(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Produk_act->get_produk();
		$this->content = $this->load->view('produk/index',$data,true);
		$this->index();
	}
	public function add_produk(){
		$data['kode_produk'] = $this->BuatKode_Act->kode_produk();
		$data['action'] = site_url().'/produk/store_produk';		
		$this->content = $this->load->view('produk/form',$data,true);
		$this->index();
	}
	function edit_produk($id){	
		$data['data'] = $this->Produk_act->get_produk($id);
		$data['action'] = site_url().'/produk/update_produk/'.$id;
		$this->content = $this->load->view('produk/form',$data,true);
		$this->index();
	}
	function store_produk(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Produk_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('produk/v_produk');
	}
	function update_produk($id){
		$return = $this->Produk_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('produk/v_produk');		
	}
	function delete_produk($id){
		$this->Produk_act->process_delete($id);
		redirect('produk/v_produk');
	}
	
}

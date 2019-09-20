<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_barang extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Pemasukan_barang_act');
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
	public function v_pemasukan_barang(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Pemasukan_barang_act->get_pemasukan_barang();
		$this->content = $this->load->view('barang_masuk/index',$data,true);
		$this->index();
	}
	public function add_pemasukan_barang(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['action'] = site_url().'/pemasukan_barang/store_pemasukan_barang';		
		$this->content = $this->load->view('barang_masuk/form',$data,true);
		$this->index();
	}
	function edit_pemasukan_barang($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Pemasukan_barang_act->get_pemasukan_barang($id);
		$data['action'] = site_url().'/pemasukan_barang/update_pemasukan_barang/'.$id;
		$this->content = $this->load->view('barang_masuk/form',$data,true);
		$this->index();
	}
	function store_pemasukan_barang(){
//		$data = $this->input->post('data');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Pemasukan_barang_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('pemasukan_barang/v_pemasukan_barang');
	}
	function update_pemasukan_barang($id){
//		$res['1']=$this->input->post('id_produk');
//		return print_r($res);
		$return = $this->Pemasukan_barang_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('pemasukan_barang/v_pemasukan_barang');		
	}
	function delete_pemasukan_barang($id){
		$this->Pemasukan_barang_act->process_delete($id);
		redirect('pemasukan_barang/v_pemasukan_barang');
	}
	
}

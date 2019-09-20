<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Pemesanan_act');
		$this->load->model('BuatKode_Act');
		$this->load->model('Produk_act');
		$this->load->model('Kurir_act');
		$this->load->model('Pengiriman_act');
	}
	public function index(){
		if($this->session->userdata('LOGGED')){
			$this->MainAdmin->get_index();
		}else{
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
	public function v_pemesanan(){
		if(($this->session->flashdata('status') != null)){
			$data['status'] = $this->session->flashdata('status');
		}
		$data['data'] = $this->Pemesanan_act->get_pemesanan();
		$this->content = $this->load->view('pemesanan/index',$data,true);
		$this->index();
	}
	public function add_pemesanan(){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));
		$data['kode_pemesanan'] = $this->BuatKode_Act->kode_pemesanan();
		$data['action'] = site_url().'/pemesanan/store_pemesanan';
		$data['action_dtl'] = site_url().'/pemesanan/store_dtl_pemesanan';
		$data['data_detail'] = array();
		$data['list_produk'] = array();
		$this->content = $this->load->view('pemesanan/form',$data,true);
		$this->index();
	}
	
	function edit_pemesanan($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Pemesanan_act->get_pemesanan($id);
		$data['action'] = site_url().'/pemesanan/update_pemesanan/'.$id;
		$this->content = $this->load->view('pemesanan/form',$data,true);
		$this->index();
	}
	
	function get_pemesanan($id){
//		$data = array('id_sekolah' => $this->session->userdata('id_sekolah'));		
		$data['data'] = $this->Pemesanan_act->get_pemesanan($id);
		$data['data_detail'] = $this->Pemesanan_act->get_dtl_pemesanan($id)->result_array();
		$data['list_produk'] = $this->Produk_act->get_produk();
		$data['action'] = site_url().'/pemesanan/update_pemesanan/'.$id;
		$data['action_dtl'] = site_url().'/pemesanan/store_dtl_pemesanan';
		$this->content = $this->load->view('pemesanan/form',$data,true);
		$this->index();
	}	
	function store_pemesanan(){
		$kode_pemesanan = $this->input->post('id_pemesanan');
//		$this->form_validation->set_rules('data[email]','Email','trim|required|is_unique[tb_sekolah.email]');
		$return = $this->Pemesanan_act->process_add();
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect("pemesanan/get_pemesanan/".$kode_pemesanan);
	}
	function update_pemesanan($id){
		$return = $this->Pemesanan_act->process_update($id);
		if($return){
			$data = "success";
		}else{
			$data = "error";
		}
		$this->session->set_flashdata('status', $data);
		redirect('pemesanan/v_pemesanan');		
	}
	function delete_pemesanan($id){
		$this->pemesanan_act->process_delete($id);
		redirect('pemesanan/v_pemesanan');
	}
	function store_dtl_pemesanan(){
		$id_pesanan = $this->input->post('id_pesanan');
		$id_produk = $this->input->post('id_produk');
		$jumlah = $this->input->post('jumlah');
		$item = $this->db->where('id_produk',$id_produk)
						  ->get('tb_produk')
						  ->row_array();		
		$subtotal = $jumlah * $item['harga_produk'];
		$data = array();
		$data['id_pesanan'] = $id_pesanan;
		$data['id_produk'] = $id_produk;
		$data['jumlah'] = $jumlah;
		$data['subtotal'] = $subtotal;
		print_r($data);
		$query = $this->db->insert('tb_pemesanandetail',$data);
		redirect('pemesanan/get_pemesanan/'.$id_pesanan);		
	}	
	function delete_dtl_pemesanan($id_pesanan,$id){
		$query = $this->db->delete('tb_pemesanandetail',array('id_detailpesanan'=>$id));
		redirect('pemesanan/get_pemesanan/'.$id_pesanan);						   
	}
	
	function preview_pesanan($id){	
		$data['data'] = $this->Pemesanan_act->get_pemesanan($id);
		$data['data_detail'] = $this->Pemesanan_act->get_dtl_pemesanan($id)->result_array();
		$data['data_pembayaran'] = $this->Pemesanan_act->get_dtl_pembayaran($id);
		$data['list_kurir'] = $this->Kurir_act->get_kurir()->result_array();
		$data['action'] = site_url().'/pemesanan/update_pemesanan/'.$id;
		$data['kode_pengiriman'] = $this->BuatKode_Act->kode_pengiriman();
//		$data['action_dtl'] = site_url().'/pemesanan/store_dtl_pemesanan';
		$this->content = $this->load->view('pemesanan/preview_pesanan',$data,true);
		$this->index();
	}
	function confirm_pesanan($id){
		$this->Pemesanan_act->confirm_pesanan($id);
		redirect('pemesanan/preview_pesanan/'.$id);
	}	
	function delivered_pesanan($id){
		$this->Pemesanan_act->delivered_pesanan($id);
		redirect('pemesanan/preview_pesanan/'.$id);
	}
	function cancel_pesanan($id){
		$this->Pemesanan_act->cancel_pesanan($id);
		redirect('pemesanan/preview_pesanan/'.$id);
	}
	function add_pengirim(){
		$id_pesanan = $this->input->post('id_pesanan');
		$this->Pengiriman_act->process_add();
		$this->Pemesanan_act->update_stock($id_pesanan);
		redirect('pemesanan/preview_pesanan/'.$id_pesanan);
	}
	
}

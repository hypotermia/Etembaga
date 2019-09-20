<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_act extends CI_Model {
	
	public function get_pemesanan($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_pemesanan');						 
		}else{
			$data = $this->db->where('id_pesanan',$id)
							  ->get('tb_pemesanan')
							  ->row_array();
		}
		return $data;
	}
	public function get_dtl_pemesanan($id){
//		$data = $this->db->where('id_pesanan',$id)
//						 ->get('tb_pemesanandetail');
		$query = "SELECT a.*,b.nama_produk FROM tb_pemesanandetail a, tb_produk b WHERE a.id_produk=b.id_produk AND a.id_pesanan = '$id'";
		$data = $this->db->query($query);
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$data['harga_pesanan'] = "1000";
		$query = $this->db->insert('tb_pemesanan',$data);
		return $query;	
	}
	public function process_update($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$data = $this->input->post('data');
		$query = $this->db->update('tb_pemesanan',$data,array('id_pesanan' => $id));
		return $query;
	}
	public function process_delete($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$query = $this->db->delete('tb_pemesanan',array('id_pesanan' => $id));
		return $query;
	}
}

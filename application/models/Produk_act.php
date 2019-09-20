<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_act extends CI_Model {
	
	public function get_produk($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_produk');						 
		}else{
			$data = $this->db->where('id_produk',$id)
							  ->get('tb_produk')
							  ->row_array();
		}
		return $data;
	}
	public function process_add($data=array()){
		$query = $this->db->insert('tb_produk',$data);
		return $query;	
	}
	public function process_update($id,$data=array()){
		// $data = $this->input->post('data');
		$query = $this->db->update('tb_produk',$data,array('id_produk' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_produk',array('id_produk' => $id));
		return $query;
	}
	
}

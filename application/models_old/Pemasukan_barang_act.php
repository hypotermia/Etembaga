<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_barang_act extends CI_Model {
	
	public function get_pemasukan_barang($id = ""){
		if($id == ""){			
			$data = $this->db->get('tb_barang_masuk');						 
		}else{
			$data = $this->db->where('id',$id)
							  ->get('tb_barang_masuk')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_barang_masuk',$data);
		return $query;	
	}
	public function process_update($id){
		$data = $this->input->post('data');
		$query = $this->db->update('tb_barang_masuk',$data,array('id' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_barang_masuk',array('id' => $id));
		return $query;
	}
}

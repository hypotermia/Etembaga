<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_act extends CI_Model {
	
	public function get_kategori($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_kategori');						 
		}else{
			$data = $this->db->where('id_kategori',$id)
							  ->get('tb_kategori')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_kategori',$data);
		return $query;	
	}
	public function process_update($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$data = $this->input->post('data');
		$query = $this->db->update('tb_kategori',$data,array('id_kategori' => $id));
		return $query;
	}
	public function process_delete($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$query = $this->db->delete('tb_kategori',array('id_kategori' => $id));
		return $query;
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_act extends CI_Model {
	
	public function get_kurir($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_kurir');						 
		}else{
			$data = $this->db->where('id_kurir',$id)
							  ->get('tb_kurir')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_kurir',$data);
		return $query;	
	}
	public function process_update($id){
		$data = $this->input->post('data');
		$query = $this->db->update('tb_kurir',$data,array('id_kurir' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_kurir',array('id_kurir' => $id));
		return $query;
	}
}

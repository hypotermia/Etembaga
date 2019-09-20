<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_act extends CI_Model {
	
	public function get_pengiriman($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_pengiriman');						 
		}else{
			$data = $this->db->where('id_pengirman',$id)
							  ->get('tb_pengiriman')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_pengiriman',$data);
		return $query;	
	}
	public function process_update($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$data = $this->input->post('data');
		$query = $this->db->update('tb_pengiriman',$data,array('id_pengiriman' => $id));
		return $query;
	}
	public function process_delete($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$query = $this->db->delete('tb_pengiriman',array('id_pengiriman' => $id));
		return $query;
	}
}

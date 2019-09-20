<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_act extends CI_Model {
	
	public function get_pelanggan($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_pelanggan');						 
		}else{
			$data = $this->db->where('id_pelanggan',$id)
							  ->get('tb_pelanggan')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_pelanggan',$data);
		return $query;	
	}
	public function process_update($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$data = $this->input->post('data');
		$query = $this->db->update('tb_pelanggan',$data,array('id_pelanggan' => $id));
		return $query;
	}
	public function process_delete($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$query = $this->db->delete('tb_pelanggan',array('id_pelanggan' => $id));
		return $query;
	}
}

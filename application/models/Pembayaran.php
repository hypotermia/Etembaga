<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_act extends CI_Model {
	
	public function get_pembayaran($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_pembayaran');						 
		}else{
			$data = $this->db->where('id_pembayaran',$id)
							  ->get('tb_pembayaran')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_pembayaran',$data);
		return $query;	
	}
	public function process_update($id){
		$data = $this->input->post('data');
		$query = $this->db->update('tb_pembayaran',$data,array('id_admin' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_pembayaran',array('id_admin' => $id));
		return $query;
	}
}

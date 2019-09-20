<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_act extends CI_Model {
	
	public function get_admin($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get_where('tb_administrator',array('role'=>'admin'));						 
		}else{
			$data = $this->db->where('id_admin',$id)
							  ->get('tb_administrator')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_administrator',$data);
		return $query;	
	}
	public function process_update($id){
		$data = $this->input->post('data');
		$query = $this->db->update('tb_administrator',$data,array('id_admin' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_administrator',array('id_admin' => $id));
		return $query;
	}
}

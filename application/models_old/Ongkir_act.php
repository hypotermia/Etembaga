<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir_act extends CI_Model {
	
	public function get_ongkir($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_biayakirim');						 
		}else{
			$data = $this->db->where('id_ongkir',$id)
							  ->get('tb_biayakirim')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$query = $this->db->insert('tb_biayakirim',$data);
		return $query;	
	}
	public function process_update($id){
		$data = $this->input->post('data');
		$query = $this->db->update('tb_biayakirim',$data,array('id_ongkir' => $id));
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_biayakirim',array('id_ongkir' => $id));
		return $query;
	}
}

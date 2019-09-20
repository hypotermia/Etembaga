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
	
}

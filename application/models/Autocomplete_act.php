<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete_act extends CI_Model{

	function get_all_produk(){
		$result=$this->db->get('tb_produk');
		return $result;
	}

	function search_produk($id_produk){
		$this->db->like('id_produk', $id_produk , 'both');
		$this->db->order_by('id_produk', 'ASC');
		$this->db->limit(10);
		return $this->db->get('tb_produk')->result();
	}

}
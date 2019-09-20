<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {
	var $content = "";
	public function __construct(){
		parent::__construct();
		$this->load->model('MainAdmin');
		$this->load->model('Autocomplete_act');
		error_reporting(0);
	}

	function get_autocomplete_produk(){
		if (isset($_GET['term'])) {
		  	$result = $this->Autocomplete_act->search_produk($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'id_produk'		=> $row->id_produk,
					'nama_produk'	=> $row->nama_produk,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}
	
}

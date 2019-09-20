<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainAdmin extends CI_Model {
	
	public function get_index($data = array())
	{
		if($this->content == ""){
//			$data['jumlah_jurusan'] = $this->db->get_where('tb_jurusan',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
//			$data['jumlah_prestasi'] = $this->db->get_where('tb_prestasi',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
//			$data['jumlah_sarana'] = $this->db->get_where('tb_sarana',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
//			$data['jumlah_biaya'] = $this->db->get_where('tb_biaya',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
//			$data['jumlah_guru'] = $this->db->get_where('tb_guru',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
//			$data['jumlah_ekskul'] = $this->db->get_where('tb_ekstrakurikuler',array('id_sekolah' => $this->session->userdata('id_sekolah')))->num_rows();
			//return print_r($data);
			$data = array();
			$this->content = $this->load->view('dasboard',$data,true);
		}
		$data = array('_header_' => $this->load->view('sidebar/header','',true),
					  '_content_' => $this->content,					  
					  '_footer_' => $this->load->view('sidebar/footer','',true)
					  );
		$this->parser->parse('index',$data);		
		//$this->load->view('welcome_message');
	}
}

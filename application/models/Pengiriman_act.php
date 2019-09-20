<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_act extends CI_Model {
	
	public function get_pengiriman($id = ""){
		$sql = "SELECT a.id_pengiriman,a.id_kurir,a.id_pesanan,a.status,b.nama_kurir,c.penerima,c.alamat_penerima FROM
				tb_pengiriman a, tb_kurir b, tb_pemesanan c WHERE a.id_kurir=b.id_kurir AND a.id_pesanan=c.id_pesanan";
		if($id == ""){			
			$data = $this->db->query($sql);						 
		}else{
			$data = $this->db->where('id_pengiriman',$id)
							  ->get('tb_pengiriman')
							  ->row_array();
		}
		return $data;
	}
	public function process_add(){
		$id_pengiriman = $this->input->post('id_pengiriman');
		$id_pesanan = $this->input->post('id_pesanan');
		$id_kurir = $this->input->post('id_kurir');
		
		
		$data_kirim['id_pengiriman'] = $id_pengiriman;
		$data_kirim['id_pesanan'] = $id_pesanan;
		$data_kirim['id_kurir'] = $id_kurir;
		$data_kirim['status'] = "on_process";
		$res = $this->db->insert('tb_pengiriman',$data_kirim);
		
		//update status di Pemesanan jadi on_process
		if($res){
			$query_upd = "UPDATE tb_pemesanan SET status='on_process' WHERE id_pesanan='$id_pesanan'";
			$run_query = $this->db->query($query_upd);			
		}
		
		return $res;	
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

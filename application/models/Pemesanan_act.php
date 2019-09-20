<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_act extends CI_Model {
	
	public function get_pemesanan($id = ""){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		if($id == ""){			
			$data = $this->db->get('tb_pemesanan');						 
		}else{
			$query = "SELECT A.*,B.id_kurir,C.*,D.biaya FROM tb_pemesanan A 
			LEFT JOIN tb_pengiriman B ON A.id_pesanan=B.id_pesanan 
			LEFT JOIN tb_biayakirim D ON A.id_ongkir=D.id_ongkir
			LEFT JOIN tb_kurir C ON B.id_kurir=C.id_kurir WHERE A.id_pesanan='$id'";
			$data = $this->db->query($query)
							 ->row_array();
		}
		return $data;
	}
	public function get_dtl_pemesanan($id){
//		$data = $this->db->where('id_pesanan',$id)
//						 ->get('tb_pemesanandetail');
		$query = "SELECT a.*,b.nama_produk,b.harga_produk FROM tb_pemesanandetail a, tb_produk b WHERE a.id_produk=b.id_produk AND a.id_pesanan = '$id'";
		$data = $this->db->query($query);
		return $data;
	}
	public function process_add(){
		$data = $this->input->post('data');
		$data['harga_pesanan'] = "1000";
		$query = $this->db->insert('tb_pemesanan',$data);
		return $query;	
	}
	public function process_update($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$data = $this->input->post('data');
		$query = $this->db->update('tb_pemesanan',$data,array('id_pesanan' => $id));
		return $query;
	}
	public function process_delete($id){
//		$id_sekolah = $this->session->userdata('id_sekolah');
		$query = $this->db->delete('tb_pemesanan',array('id_pesanan' => $id));
		return $query;
	}
	
	public function confirm_pesanan($id){
		$query = "UPDATE tb_pemesanan SET status='confirm' WHERE id_pesanan='$id'";
		$res = $this->db->query($query);
		return $res;
	}
	
	public function delivered_pesanan($id){
		$query = "UPDATE tb_pemesanan SET status='delivered' WHERE id_pesanan='$id'";		
		$res = $this->db->query($query);
		
		//update status di pengiriman
		$query_up = "UPDATE tb_pengiriman SET status='delivered' WHERE id_pesanan='$id'";
 		$this->db->query($query_up);
		return $res;
	}
	
	public function cancel_pesanan($id){
		$query = "UPDATE tb_pemesanan SET status='cancel' WHERE id_pesanan='$id'";		
		$res = $this->db->query($query);
		
		return $res;
	}
	
	public function get_dtl_pembayaran($id){
		$sql = "SELECT A.*,B.id_pesanan FROM tb_pembayaran A, tb_pemesanan B WHERE A.id_pesanan=B.id_pesanan AND A.id_pesanan='$id'";
		$query = $this->db->query($sql)->row_array();
		return $query;
	}
	
	public function update_stock($id){
		$sql = "SELECT * FROM tb_pemesanandetail WHERE id_pesanan='$id'";
		$res = $this->db->query($sql)->result();
		//update stock barang setelah on process
		if(count($res) > 0){
			foreach($res as $row){
				$sql_get = "SELECT stok_produk,terjual FROM tb_produk WHERE id_produk = '$row->id_produk'";
				$get_curren = $this->db->query($sql_get)
											->row();
				$stok_baru = $get_curren->stok_produk - $row->jumlah;
				$terjual_baru = $get_curren->terjual + $row->jumlah;
				$sql_upd = "UPDATE tb_produk SET stok_produk='$stok_baru', terjual='$terjual_baru' WHERE id_produk='$row->id_produk'";
				$result = $this->db->query($sql_upd);
			}
		}
		return $result;		
	}
}

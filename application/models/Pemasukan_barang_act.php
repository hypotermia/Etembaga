<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_barang_act extends CI_Model {
	
	public function get_pemasukan_barang($id = ""){
		$sql = "SELECT a.id,a.id_produk,a.tgl_masuk,a.jumlah,b.nama_produk FROM tb_barang_masuk a,tb_produk b WHERE a.id_produk=b.id_produk";
		if($id == ""){
			$data = $this->db->query($sql);						 
		}else{
			$sql .= " AND a.id='$id'";
			$data = $this->db->query($sql)->row_array();
		}
		return $data;
	}
	public function process_add(){
		$jumlah = $this->input->post('jumlah');
		$id_produk = $this->input->post('id_produk');
		$tgl_masuk = $this->input->post('tgl_masuk');
		
		$data['id_produk'] = $id_produk;
		$data['jumlah'] = $jumlah;
		$data['tgl_masuk'] = $tgl_masuk;
			
		$query = $this->db->insert('tb_barang_masuk',$data);
		
		$sql = "SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
		$produk = $this->db->query($sql)->row();
		$stok_sekarang = $produk->stok_produk + $jumlah;
		$update = "UPDATE tb_produk SET stok_produk='$stok_sekarang' WHERE id_produk='$id_produk'";
		$this->db->query($update);
		
		return $query;	
	}
	public function process_update($id){
		$jumlah = $this->input->post('jumlah');
		$id_produk = $this->input->post('id_produk');
		$tgl_masuk = $this->input->post('tgl_masuk');
		
//		$data['id_produk'] = $id_produk;
		$data['jumlah'] = $jumlah;
		$data['tgl_masuk'] = $tgl_masuk;
//		$data = $this->input->post('data');
		
		//mengembalikan stok//
		$sql1 = "SELECT jumlah FROM tb_barang_masuk WHERE id='$id'";
		$jumlah_old = $this->db->query($sql1)->row()->jumlah;
		$sql2 = "SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
		$prd = $this->db->query($sql2)->row();
		$stok_old = $prd->stok_produk - $jumlah_old;
		$update_stok_old = "UPDATE tb_produk SET stok_produk='$stok_old' WHERE id_produk='$id_produk'";
		$upd = $this->db->query($update_stok_old);
		//end
		
		//update stock baru//
		$query = $this->db->update('tb_barang_masuk',$data,array('id' => $id));		
		$sql = "SELECT * FROM tb_produk WHERE id_produk='$id_produk'";
		$produk = $this->db->query($sql)->row();
		$stok_sekarang = $produk->stok_produk + $jumlah;
		$update = "UPDATE tb_produk SET stok_produk='$stok_sekarang' WHERE id_produk='$id_produk'";
		$query = $this->db->query($update);
		return $query;
	}
	public function process_delete($id){
		$query = $this->db->delete('tb_barang_masuk',array('id' => $id));
		return $query;
	}
}

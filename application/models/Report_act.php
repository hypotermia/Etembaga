<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_act extends CI_Model {
	
	public function report_pemasukan_barang($tgl_awal,$tgl_akhir){
		$sql = "SELECT a.id_produk,a.tgl_masuk,a.jumlah,b.nama_produk FROM tb_barang_masuk a, tb_produk b WHERE a.id_produk=b.id_produk AND a.tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'";
		$query = $this->db->query($sql);
		return $query;	
	}
	
	public function report_transaksi($tgl_awal,$tgl_ahir){
		$sql = "SELECT a.id_pesanan, a.tgl_pesanan, a.penerima, a.alamat_penerima, a.total_harga, a.status, b.id_pengiriman, c.nama_kurir FROM tb_pemesanan a 
		LEFT JOIN tb_pengiriman b ON a.id_pesanan=b.id_pesanan 
		LEFT JOIN tb_kurir c ON b.id_kurir=c.id_kurir 
		WHERE a.tgl_pesanan BETWEEN '$tgl_awal' AND '$tgl_ahir'";
		$query = $this->db->query($sql);
		return $query;
	}
}

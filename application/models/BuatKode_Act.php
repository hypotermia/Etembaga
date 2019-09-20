<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuatKode_Act extends CI_Model {
	public function kode_kategori()   {
		  $this->db->select('RIGHT(tb_kategori.id_kategori,4) as kode', FALSE);
		  $this->db->order_by('id_kategori','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_kategori');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KTG-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_ongkir()   {
		  $this->db->select('RIGHT(tb_biayakirim.id_ongkir,4) as kode', FALSE);
		  $this->db->order_by('id_ongkir','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_biayakirim');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "BYK-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_kurir()   {
		  $this->db->select('RIGHT(tb_kurir.id_kurir,4) as kode', FALSE);
		  $this->db->order_by('id_kurir','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_kurir');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KUR-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_produk()   {
		  $this->db->select('RIGHT(tb_produk.id_produk,4) as kode', FALSE);
		  $this->db->order_by('id_produk','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_produk');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "PRD-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_pengiriman()   {
		  $this->db->select('RIGHT(tb_pengiriman.id_pengiriman,4) as kode', FALSE);
		  $this->db->order_by('id_pengiriman','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_pengiriman');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "KRM-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_admin()   {
		  $this->db->select('RIGHT(tb_administrator.id_admin,4) as kode', FALSE);
		  $this->db->order_by('id_admin','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_administrator');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "ADM-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_pelanggan()   {
		  $this->db->select('RIGHT(tb_pelanggan.id_pelanggan,4) as kode', FALSE);
		  $this->db->order_by('id_pelanggan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_pelanggan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "CUS-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	public function kode_pemesanan()   {
		  $this->db->select('RIGHT(tbl_pemesanan.id_pesanan,4) as kode', FALSE);
		  $this->db->order_by('id_pesanan','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tbl_pemesanan');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "INV-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
		public function kode_pembayaran()   {
		  $this->db->select('RIGHT(tb_pembayaran.id_pembayaran,4) as kode', FALSE);
		  $this->db->order_by('id_pembayaran','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('tb_pembayaran');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $kodejadi = "BYR-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}
	
	
}
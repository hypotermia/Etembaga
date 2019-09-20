<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainAdmin extends CI_Model {
	
	public function get_index($data = array())
	{
		if($this->content == ""){
			$data['jumlah_produk'] = $this->db->get('tb_produk')->num_rows();
			$data['jumlah_new_order'] = $this->db->get_where('tb_pemesanan',array('status' => 'draft'))->num_rows();
			$data['jumlah_new_confirm'] = $this->db->get_where('tb_pemesanan',array('status' => 'confirm'))->num_rows();
			$data['jumlah_new_shipping'] = $this->db->get_where('tb_pemesanan',array('status' => 'on_process'))
													->num_rows();
			$data['jumlah_new_customer'] = $this->db->get_where('tb_pelanggan')->num_rows();
			$sql = "SELECT A.id_pengiriman,A.status,B.id_pesanan,B.penerima,B.alamat_penerima,C.nama_kurir FROM tb_pengiriman A, tb_pemesanan B, tb_kurir C WHERE A.id_pesanan=B.id_pesanan AND a.id_kurir=C.id_kurir AND a.status='on_process'";
			$data['list_shipping'] = $this->db->query($sql)->result_array();
			$sql_pesanan = "SELECT * FROM tb_pemesanan WHERE status='draft'";
			$data['list_pesanan'] = $this->db->query($sql_pesanan)->result_array();
			 
//			$data = array();
			$this->content = $this->load->view('dasboard',$data,true);
		}
		$result = $this->db->get('tb_produk')->result();
		$produk = '';
		if (count($result) > 0) {
		    foreach ($result as $row){
				$produk .= '"'.$row->id_produk . '",';
			}		     	
		}
		$produk = substr($produk,0,-1);
		$dt['list_produk'] = $produk;
		$data = array('_header_' => $this->load->view('sidebar/header','',true),
					  '_content_' => $this->content,					  
					  '_footer_' => $this->load->view('sidebar/footer',$dt,true)
//					  'produk'=> $produk
					  );
		$this->parser->parse('index',$data);		
		//$this->load->view('welcome_message');
	}
}

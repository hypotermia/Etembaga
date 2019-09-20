<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_pemesanan extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PEMESANAN
    function index_get(){
        $id_pesanan = $this->get('id_pesanan'); //mengambil parameter
        if($d_pemesanan == ''){
            $kontak = $this->db->get('tb_pemesanan')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_pesanan', $id_pesanan); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_pemesanan')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA PEMESANAN
    function index_post(){
        $this->load->model('BuatKode_Act');
        $varid = $this->BuatKode_Act->kode_pemesanan();
        $data = array(
                    'id_pesanan'=>$varid,
                    'tgl_pesanan'=>date("Y-m-d"),
                    'total_harga'=>$this->input->post('total_harga'),
		            'penerima'=>$this->input->post('penerima'),
                    'alamat_penerima'=>$this->input->post('alamat_penerima'),
		            'id_pengiriman'=>$this->input->post('id_pengiriman'),
                    'id_ongkir'=>$this->input->post('id_ongkir'),
                    'id_pembayaran'=>$this->input->post('id_pembayaran'),
		            'id_pelanggan'=>$this->input->post('id_pelanggan'),
                    'id_kurir'=>$this->input->post('id_kurir')
                );
        $insert = $this->db->insert('tbl_pemesanan', $data); //insert ke db
        if($insert){
            $this->response(array('result'=>$data, 200));
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA PEMESANAN
    function index_put(){
        $id_pesanan = $this->put('id_pesanan');
        $data = array(
                    'id_pesanan'=>$this->put('id_pesanan'),
                    'tgl_pesanan'=>$this->put('tgl_pesanan'),
                    'harga_pesanan'=>$this->put('harga_pesanan'),
		            'penerima'=>$this->put('penerima'),
                    'alamat_penerima'=>$this->put('alamat_penerima'),
		            'id_pengiriman'=>$this->put('id_pengiriman'),
                    'id_ongkir'=>$this->put('id_ongkir'),
                    'id_pembayaran'=>$this->put('id_pembayaran'),
		            'id_pelanggan'=>$this->put('id_pelanggan'),
                    'id_kurir'=>$this->put('id_kurir')
                );
        $this->db->where('id_pesanan', $id_pesanan);
        $update = $this->db->update('tb_pemesanan', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA PEMESANAN
    function index_delete(){
        $id_pesanan = $this->delete('id_pesanan');
        $this->db->where('id_pesanan', $id_pesanan);
        $delete = $this->db->delete('tb_pemesanan');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_pemesananDetail extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PEMESANAN DETAIL
    function index_get(){
        $id_pelanggan = $this->input->get('id_pelanggan'); //mengambil parameter
        $cek_isi = $this->db->query("select a.subtotal,a.jumlah,b.nama_produk,b.harga_produk,b.photo,c.penerima,c.status,c.tgl_pesanan,e.tgl_bayar,e.status AS status_bayar from 
            tb_pemesanandetail a join tb_produk b on a.id_produk=b.id_produk 
            JOIN tbl_pemesanan c on c.id_pesanan=a.id_pesanan JOIN tb_pelanggan d 
            on d.id_pelanggan=c.id_pelanggan JOIN tb_pembayaran e on e.id_pesanan = c.id_pesanan

            where d.id_pelanggan ='" .$id_pelanggan."'")->result_array();
        //die($this->db->last_query());
        $this->response(array('status'=>'success','DetailPesanan'=>$cek_isi,'error'=>false), 200);
    }

    //UNTUK MENG INPUT DATA PEMESANAN
    function index_post(){
        $data = array(
                    //'id_detailpesanan'=>$this->post('id_detailpesanan'),
                    'jumlah'=>$this->post('jumlah'),
                    'id_pesanan'=>$this->post('id_pesanan'),
		            'subtotal'=>$this->post('subtotal'),
                    'id_produk'=>$this->post('id_produk')
                );
        $insert = $this->db->insert('tb_pemesanandetail', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA PEMESANAN DETAIL
    function index_put(){
        $id_detailpesanan = $this->put('id_detailpesanan');
        $data = array(
                    'id_detailpesanan'=>$this->put('id_detailpesanan'),
                    'jumlah'=>$this->put('jumlah'),
                    'id_pesanan'=>$this->put('id_pesanan'),
		            'subtotal'=>$this->put('subtotal'),
                    'id_produk'=>$this->put('id_produk')
                );
        $this->db->where('id_detailpesanan', $id_detailpesanan);
        $update = $this->db->update('tb_pemesanandetail', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA PEMESANAN DEATIL
    function index_delete(){
        $id_detailpesanan = $this->delete('id_detailpesanan');
        $this->db->where('id_detailpesanan', $id_detailpesanan);
        $delete = $this->db->delete('tb_pemesanandetail');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

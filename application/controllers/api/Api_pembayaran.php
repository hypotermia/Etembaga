<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_pembayaran extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PEMBAYARAN
    function index_get(){
        $id_pelanggan = $this->input->get('id_pelanggan'); //mengambil parameter
        $id_pesanan = $this->input->get('id_pesanan');
        $cek_isi = $this->db->query("select b.nama_produk,c.penerima,e.tgl_bayar,e.status from 
            tb_pemesanandetail a join tb_produk b on a.id_produk=b.id_produk 
            JOIN tbl_pemesanan c on c.id_pesanan=a.id_pesanan JOIN tb_pelanggan d 
            on d.id_pelanggan=c.id_pelanggan
            JOIN tb_pembayaran e on e.id_pesanan=c.id_pesanan
            where d.id_pelanggan='" .$id_pelanggan."' and c.id_pesanan='".$id_pesanan."' ")->result_array();
        //die($this->db->last_query());
        $this->response(array('status'=>'success','results'=>$cek_isi,'error'=>false), 200);
        //$this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA PEMBAYARAN
    function index_post(){
                $this->load->model('BuatKode_Act');
        $varid = $this->BuatKode_Act->kode_pembayaran();
        $data = array(
                    'id_pembayaran'=>$varid,
                    'tgl_bayar'=>date("Y-m-d"),
                    'jam_bayar'=>date("h:i:sa"),
		            'jumlah_bayar'=>$this->post('jumlah_bayar'),
                    'id_pesanan'=>$this->post('id_pesanan'),
                    'norek'=>$this->post('norek')

                );
        $insert = $this->db->insert('tb_pembayaran', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA PEMBAYARAN
    function index_put(){
        $id_pembayaran = $this->put('id_pembayaran');
        $data = array(
                    'id_pembayaran'=>$this->put('id_pembayaran'),
                    'tgl_bayar'=>$this->put('tgl_bayar'),
                    'jam_bayar'=>$this->put('jam_bayar'),
		            'biaya_ongkir'=>$this->put('biaya_ongkir'),
                    'id_produk'=>$this->put('id_produk')
                );
        $this->db->where('id_pembayaran', $id_pembayaran);
        $update = $this->db->update('tb_pembayaran', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA PEMBAYARAN
    function index_delete(){
        $id_pembayaran = $this->delete('id_pembayaran');
        $this->db->where('id_pembayaran', $id_pembayaran);
        $delete = $this->db->delete('tb_pembayaran');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

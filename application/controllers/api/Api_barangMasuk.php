<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_barangMasuk extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA BARANG MASUK
    function index_get(){
        $id = $this->get('id'); //mengambil parameter
        if($id == ''){
            $kontak = $this->db->get('tb_barang_masuk')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id', $id); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_barang_masuk')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA BARANG MASUK
    function index_post(){
        $data = array(
                    'id'=>$this->post('id'),
                    'id_produk'=>$this->post('id_produk'),
                    'tgl_masuk'=>$this->post('tgl_masuk'),
		    'jumlah'=>$this->post('jumlah')
                );
        $insert = $this->db->insert('tb_barang_masuk', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA BARANG MASUK
    function index_put(){
        $id = $this->put('id');
        $data = array(
                    'id'=>$this->put('id'),
                    'id_produk'=>$this->put('id_produk'),
                    'tgl_masuk'=>$this->put('tgl_masuk'),
		    'jumlah'=>$this->put('jumlah')
                );
        $this->db->where('id', $id);
        $update = $this->db->update('tb_barang_masuk', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA BARANG MASUK
    function index_delete(){
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('tb_barang_masuk');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

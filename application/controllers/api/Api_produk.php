<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_produk extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PRODUK 
    function index_get(){
        $id_produk = $this->input->get('id_produk'); //mengambil parameter
        if($id_produk == ''){
            $kontak = $this->db->get('tb_produk')->result_array(); //get('nama tabel di database')
        }else{
            $this->db->where('id_produk', $id_produk); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_produk')->result_array(); //mengambil data db
        }
        //die($this->db->last_query());
        $this->response(array('status'=>'success','semuaproduk'=>$kontak,'error'=>false), 200);
    }

    //UNTUK MENG INPUT DATA PRODUK 
    function index_post(){
                $this->load->model('BuatKode_Act');
        $varid = $this->BuatKode_Act->kode_produk();
        $data = array(
                    'id_produk'=>$varid,
                    'id_kategori'=>$this->input->post('id_kategori'),
                    'nama_produk'=>$this->input->post('nama_produk'),
		            'stok_produk'=>$this->input->post('stok_produk'),
		            'harga_produk'=>$this->input->post('harga_produk'),
		            'des_produk'=>$this->input->post('des_produk'),
		            'terjual'=>$this->input->post('terjual'),
                    'size'=>$this->input->post('size'),
		            'cart'=>$this->input->post('cart'),
                    'favorit'=>$this->input->post('favorit'),
                    'photo'=>$this->input->post('photo')

                );
        $insert = $this->db->insert('tb_produk', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA PRODUK 
    function index_put(){
        $id_produk = $this->put('id_produk');
        $data = array(
                    'id_produk'=>$this->put('id_produk'),
                    'id_kategori'=>$this->put('id_kategori'),
                    'nama_produk'=>$this->put('nama_produk'),
		    'stok_produk'=>$this->put('stok_produk'),
		    'harga_produk'=>$this->put('harga_produk'),
		    'des_produk'=>$this->put('des_produk'),
		    'terjual'=>$this->put('terjual'),
                    'size'=>$this->put('size'),
		    'cart'=>$this->put('cart'),
                    'favorit'=>$this->put('favorit')
                );
        $this->db->where('id_produk', $id_produk);
        $update = $this->db->update('tb_produk', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA PRODUK
    function index_delete(){
        $id_produk = $this->delete('id_produk');
        $this->db->where('id_produk', $id_produk);
        $delete = $this->db->delete('tb_produk');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

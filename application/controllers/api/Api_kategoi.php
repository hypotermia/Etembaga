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


    //UNTUK GET DATA KATEGORI 
    function index_get(){
        $id_kategori = $this->get('id_kategori'); //mengambil parameter
        if($id_kategori == ''){
            $kontak = $this->db->get('tb_kategori')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_kategori', $id_pkategori); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_kategori')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA KATEGORI
    function index_post(){
        $data = array(
                    'id_kategori'=>$this->post('id_kategori'),
                    'nama_kategori'=>$this->post('nama_kategori'),
                    'stok'=>$this->post('stok')
                );
        $insert = $this->db->insert('tb_kategori', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{z
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA Kategori
    function index_put(){
        $id_kategori = $this->put('id_kategori');
        $data = array(
                    'id_produk'=>$this->put('id_produk'),
                    'nama_kategori'=>$this->put('nama_kategori'),
                    'stok'=>$this->put('stok')
                );
        $this->db->where('id_kategori', $id_kategori);
        $update = $this->db->update('tb_kategori', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA KATEGORI
    function index_delete(){
        $id_kategori = $this->delete('id_kategori');
        $this->db->where('id_kategori', $id_produk);
        $delete = $this->db->delete('tb_kategori');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}

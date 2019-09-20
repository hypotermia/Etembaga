<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Api_pelanggan extends REST_Controller {

    function __construct($config = 'rest')
    {
        // Construct the parent class
        parent::__construct($config);
        // $this->load->database();
    }


    //UNTUK GET DATA PELANGGAN
    function index_get(){
        $id_produk = $this->get('id_pelanggan'); //mengambil parameter
        if($id_pelanggan == ''){
            $kontak = $this->db->get('tb_pelanggan')->result(); //get('nama tabel di database')
        }else{
            $this->db->where('id_pelanggan', $id_pelanggan); // where('field db nya','value yang di cari')
            $kontak = $this->db->get('tb_pelanggan')->result(); //mengambil data db
        }
        $this->response($kontak, 200);
    }

    //UNTUK MENG INPUT DATA PELANGGAN 
    function index_post(){
        $data = array(
                    'id_produk'=>$this->post('id_pelanggan'),
                    'nama_pelanggan'=>$this->post('nama_pelanggan'),
                    'username_pelanggan'=>$this->post('username_pelanggan'),
		    'pass_pelanggan'=>$this->post('pass_pelanggan'),
		    'alamat_pelanggan'=>$this->post('alamat_pelanggan'),
		    'kodepos_pel'=>$this->post('kodepos_pel'),
		    'kotapel'=>$this->post('kotapel'),
                    'provpel'=>$this->post('provpel'),
		    'email'=>$this->post('email'),
                    'notlp_pel'=>$this->post('notlp_pel')
                );
        $insert = $this->db->insert('tb_pelanggan', $data); //insert ke db
        if($insert){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }

    //UNTUK MENG UPDATE SALAH SATU DATA PELANGGAN 
    function index_put(){
        $id_pelanggan = $this->put('id_pelanggan');
        $data = array(
                    'id_produk'=>$this->put('id_pelanggan'),
                    'nama_pelanggan'=>$this->put('nama_pelanggan'),
                    'username_pelanggan'=>$this->put('username_pelanggan'),
		    'pass_pelanggan'=>$this->put('pass_pelanggan'),
		    'alamat_pelanggan'=>$this->put('alamat_pelanggan'),
		    'kodepos_pel'=>$this->put('kodepos_pel'),
		    'kotapel'=>$this->put('kotapel'),
                    'provpel'=>$this->put('provpel'),
		    'email'=>$this->put('email'),
                    'notlp_pel'=>$this->put('notlp_pel')
                );
        $this->db->where('id_pelanggan', $id_pelanggan);
        $update = $this->db->update('tb_pelanggan', $data);
        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status'=>'fail', 502));
        }
    }

    //UNTUK MENGHAPUS SALAH SATU DATA PELANGGAN
    function index_delete(){
        $id_pelanggan = $this->delete('id_pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $delete = $this->db->delete('tb_pelanggan');
        if($delete){
            $this->response(array('status'=>'success'), 201);
        }else{
            $this->response(array('status'=>'fail'), 502);
        }
    }
}
